<?php

require_once '../../autoload.php';
require_once MODEL_PATH . 'SchoolingModel.php';
require_once MODEL_PATH . 'NotificationModel.php';

class EnrollmentModel {
    private $base_table = 'bro_enrollment';

    public function create_enrollment($payload = [])
    {
        global $db, $common, $notif_model;

        $arr = [
            "lesson_type" => $payload['lesson_type'],
            "user_pk"     => $_SESSION['pk']
        ];
        $fields  = $common->get_insert_fields($arr);
        $last_id = $db->insert("INSERT INTO {$this->base_table} {$fields}", array_values($arr));
        $notif_arr = [
            "sender_pk"   => $_SESSION['pk'],
            "receiver_pk" => 0,
            "subject_pk"  => $_SESSION['pk'],
            "caption"     => !empty($payload['caption']) ? $payload['caption'] : null,
            "action"      => 'ENROLL',
            "table_pk"    => $last_id
        ];
        $notif_model = $notif_model->create_notification($notif_arr);
        return $this->get_enrollment_details($last_id);
    }

    public function get_enrollment_details($pk = null)
    {
        global $db, $common;
        return $db->get_row("SELECT * FROM {$this->base_table} WHERE id = ?", [$pk]);
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

    public function graduate()
    {
        global $db, $common;

        $updated  = $db->update("UPDATE {$this->base_table} SET is_graduated = 1 WHERE id = (Select id from {$this->base_table} where user_pk = ? and is_graduated = 0)", [$_SESSION['pk']]);
        return $updated ? true : false;
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

    public function approve_user($pk = null)
    {
        global $db, $common, $school_model, $notif_model;
        $is_approved = $this->update_enrollment($pk, 
                                                [
                                                    'is_enrolled'   => 1,
                                                    'date_approved' => strtotime(date('Y-m-d H:i:s'))
                                                ]
                                            );
        if (!empty($is_approved)) {
           $lessons =  $db->get_list("SELECT id as lesson_pk,(Select user_pk from bro_enrollment where id = ?) as student_pk FROM bro_lessons WHERE lesson_type = ?", [$pk,$is_approved['lesson_type']]);
           foreach ($lessons as $key => $lesson) {
             $school_model->create_schooling($lesson);      
           }

            // PABALIK PAPUNTANG DISCIPLE ETO    
           $notif_arr = [
                "sender_pk"   => $_SESSION['pk'],
                "receiver_pk" => 0,
                "subject_pk"  => $is_approved['user_pk'],
                "caption"     => !empty($payload['caption']) ? $payload['caption'] : null,
                "action"      => 'ENROLL',
                "table_pk"    => $pk
            ];
            $notif_model = $notif_model->create_notification($notif_arr);
        }
        return true;
    }
}

$enroll_model = new EnrollmentModel();