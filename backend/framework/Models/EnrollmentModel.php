<?php

require_once '../../autoload.php';
require_once MODEL_PATH . 'SchoolingModel.php';
require_once MODEL_PATH . 'NotificationModel.php';

class EnrollmentModel
{
    private $base_table = 'bro_enrollment';

    public function create_enrollment($payload = [])
    {
        global $db, $common, $notif_model;
        $completed = 1;
        $arr = [
            "lesson_type" => $payload['lesson_type'],
            "user_pk"     => $_SESSION['pk']
        ];

        try {
            $has_enrollment = $db->get_row("SELECT * FROM {$this->base_table} 
                                            WHERE lesson_type = ? AND user_pk = ?"
                                          , array_values($arr));

            if (!empty($has_enrollment)) {
                return 0;
            }

            switch ($arr['lesson_type']) {
                case "SOL1":
                    $check_requirements = $db->get_row("Select * from {$this->base_table} where user_pk = ? and lesson_type = 'LIFE_CLASS'", [$_SESSION['pk']]);
                    break;

                case "SOL2":
                    $check_requirements = $db->get_row("Select en.*,(Select COUNT(*) from bro_tribe where leader_pk = ? and is_approved = 1) as invite_count from {$this->base_table} en where user_pk = ? and lesson_type = 'SOL1' and is_graduated = 1", [$_SESSION['pk'], $_SESSION['pk']]);
                    break;
                case "SOL3":
                    $check_requirements = $db->get_row("Select en.*,(Select COUNT(*) from bro_cellgroup where user_pk = ?) as invite_count from {$this->base_table} en where user_pk = ? and lesson_type = 'SOL2' and is_graduated = 1", [$_SESSION['pk'], $_SESSION['pk']]);
                    break;
                case "RE_ENCOUNTER":
                    $check_requirements = $db->get_row("Select en.*,(Select COUNT(*) from bro_tribe where leader_pk = ? and is_approved = 1) as invite_count from {$this->base_table} en where user_pk = ? and lesson_type = 'SOL3' and is_graduated = 1", [$_SESSION['pk'], $_SESSION['pk']]);
                    break;
            }
          
            if (empty($check_requirements) && ($arr['lesson_type'] != 'LIFE_CLASS')) {
                return -1;
            }

            switch ($arr['lesson_type']) {
                case "SOL1":
                    if ($check_requirements["is_graduated"] == 0) {
                        $completed = -1;
                    }
                    break;

                case "SOL2":
                    if ($check_requirements['invite_count'] < 3) {
                        $completed = -1;
                    }
                    break;
                case "SOL3":
                    if ($check_requirements['invite_count'] < 3) {
                        $completed = -1;
                    }
                    break;
                case "RE_ENCOUNTER":
                    if ($check_requirements['invite_count'] < 12) {
                        $completed = -1;
                    }
                    break;
            }
            if ($completed == -1) return $completed;
            $fields  = $common->get_insert_fields($arr);
            $last_id = $db->insert("INSERT INTO {$this->base_table} {$fields}", array_values($arr));
            $notif_arr = [
                "sender_pk"   => $_SESSION['pk'],
                "receiver_pk" => 0,
                "subject_pk"  => $_SESSION['pk'],
                "caption"     => ' enrolled to ' . str_replace('_', ' ', $payload['lesson_type']),
                "action"      => 'ENROLL',
                "table_pk"    => $last_id
            ];
            $notif_model->create_notification($notif_arr);
        } catch (\Throwable $th) {
            $completed = 0;
        }
        return $completed;
    }

    public function get_enrollment_details($pk = null)
    {
        global $db, $common;
        return $db->get_row("SELECT * FROM {$this->base_table} WHERE id = ?", [$pk]);
    }

    public function get_badge()
    {
        global $db;
        return $db->get_row("Select lesson_type from {$this->base_table} where user_pk = ? and is_graduated = 1 ORDER by id desc LIMIT 1", [$_SESSION['pk']]);
    }

    // for auth user
    public function get_enrollment_list()
    {
        global $db, $common;
        return $db->get_list("SELECT * FROM {$this->base_table} WHERE user_pk = ?", [$_SESSION['pk']]);
    }

    public function update_enrollment($pk, $payload = [])
    {
        global $db, $common;
        $update_fields = $common->get_update_fields($payload);
        $updated       = $db->update("UPDATE {$this->base_table} {$update_fields} WHERE id = {$pk}", array_values($payload));
        return $updated ? $this->get_enrollment_details($pk) : false;
    }

    public function graduate($payload = [])
    {
        global $db;
        $is_completed = $db->get_list("Select * from bro_schooling where enrollment_pk = ? and ((attendance <> 1) OR date_approved is null)", [$payload["enroll_pk"]]);
        if (!empty($is_completed)) {
            return -1;
        }
        $updated  = $db->update("UPDATE {$this->base_table} SET is_graduated = 1 WHERE id = ?", array_values($payload));
        return $updated ? 1 : 0;
    }

    public function remove_enrollment($pk = null)
    {
        global $db, $common;
        $tobe_deleted = $this->get_enrollment_details($pk);
        $deleted      = $db->update("DELETE FROM {$this->base_table} WHERE id = ?", [$pk]);
        return $deleted ? $tobe_deleted : false;
    }

    public function get_pending_enrollment()
    {
        global $db, $common;
        return $db->get_list("SELECT be.* FROM {$this->base_table} be 
                            INNER JOIN bro_tribe bt ON be.user_pk = bt.member_pk
                            WHERE be.is_enrolled = 0 AND bt.leader_pk = ?", [$_SESSION['pk']]);
    }

    public function approve_user($payload = [])
    {
        global $db, $common, $school_model, $notif_model;
        $completed = true;
        try {

            $table_pk = $payload['table_pk'];
            $notif_pk = $payload['id'];
            $notif_details = $common->get_notif_details($notif_pk);
            $caption = '';
            if ($payload['decision'] == 0) {
                $is_disapproved = $this->remove_enrollment($table_pk);
                $caption = ' disapproved your enrollment';
            } else {
                $is_approved = $this->update_enrollment(
                    $table_pk,
                    [
                        
                        'is_enrolled'   => 1,
                        'date_approved' => strtotime(date('Y-m-d H:i:s'))
                    ]
                );

                if (!empty($is_approved)) {
                    $caption = ' approved your enrollment';
                    $lessons =  $db->get_list("SELECT id as lesson_pk,(Select user_pk from bro_enrollment where id = ?) as student_pk FROM bro_lessons WHERE lesson_type = ?", [$table_pk, $is_approved['lesson_type']]);

                    foreach ($lessons as $key => $lesson) {
                        $lesson["enrollment_pk"] = $table_pk;
                        $lesson["student_pk"] = $notif_details["subject_pk"];
                        $school_model->create_schooling($lesson);
                    }
                }
            }



            // PABALIK PAPUNTANG DISCIPLE ETO    
            $notif_arr = [
                "sender_pk"   => $_SESSION['pk'],
                "receiver_pk" => $notif_details['subject_pk'],
                "subject_pk"  => $_SESSION['pk'],
                "caption"     => $caption,
                "action"      => 'NONE',
                "table_pk"    => $table_pk,
                "status"      => 1
            ];
            $notif_model = $notif_model->create_notification($notif_arr);
        } catch (\Throwable $th) {
            $completed = false;
        }

        return $completed;
    }
}

$enroll_model = new EnrollmentModel();
