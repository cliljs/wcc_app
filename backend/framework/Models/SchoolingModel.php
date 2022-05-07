<?php
require_once '../../autoload.php';
require_once MODEL_PATH . 'NotificationModel.php';

class SchoolingModel
{
    private $base_table = 'bro_schooling';

    public function create_schooling($payload = [])
    {
        global $db, $common;

        $arr = [
            "user_pk"     => $payload['student_pk'],
            "lesson_pk"   => $payload['lesson_pk'],
            "enrollment_pk"   => $payload['enrollment_pk']

        ];
        $fields = $common->get_insert_fields($arr);
        return $db->insert("INSERT INTO {$this->base_table} {$fields}", array_values($arr));
    }

    public function update_schooling($id, $payload)
    {
        global $db, $common, $notif_model;
        $completed = true;
        try {
            $db->setCommit(false);
            $payload['date_confirmed'] = date('Y-m-d G:i:s');

            $lead_pk = $common->get_user_leader($_SESSION['pk'])['leader_pk'];

            $lesson_info = $common->get_lesson_details($payload['lesson_pk']);
            $lesson_type = $lesson_info['lesson_type'];
            $lesson_title = $lesson_info['lesson_title'];

            unset($payload['lesson_pk']);
            if ($payload['attendance'] == 1) {
                $update_fields = $common->get_update_fields($payload);
                $updated       = $db->update("UPDATE {$this->base_table} {$update_fields} WHERE id = {$id}", array_values($payload));
                $notif_arr = [
                    "sender_pk"   => $_SESSION['pk'],
                    "receiver_pk" => $lead_pk,
                    "subject_pk"  => $_SESSION['pk'],
                    "caption"     => ' attended ' . $lesson_type . ' - ' . $lesson_title,
                    "action"      => 'TRAINING',
                    "table_pk"    => $id
                ];
                $notified = $notif_model->create_notification($notif_arr);
                if (!$notified || !$updated) {
                    $completed = false;
                }
            } else {
                $updated = $db->update("Update {$this->base_table} set attendance = null where id = ?", [$id]);
                $notified = $db->update("Delete from bro_notifications where table_pk = ?", [$id]);
                if (!$notified || !$updated) {
                    $completed = false;
                }
            }
        } catch (\Throwable $th) {
            echo $th;
            $completed = false;
        }
        if ($completed) {
            $db->commitTransaction();
        } else {
            $db->rollbackTransaction();
        }
        return $completed;
    }

    public function confirm_attendance($pk)
    {
        global $db, $common, $notif_model;
        $arr = [
            "leader_pk"     => $_SESSION['pk'],
            "date_approved" => date('Y-m-d H:i:s')
        ];
        $updated_schooling = $this->update_schooling($pk, $arr);
        return $updated_schooling;
    }

    public function get_user_schooling($payload = [])
    {
        global $db, $common;
        $user_pk = (array_key_exists('user_pk', $payload)) ? $payload['user_pk'] : $_SESSION['pk'];
     
        $has_enrollment = $db->get_row("SELECT * FROM bro_enrollment 
                                        WHERE lesson_type = ? AND user_pk = ? AND is_enrolled = ?",
                                         [$user_pk, $payload['lesson_type'], 1]);
        
        if (empty($has_enrollment)) {
            return 0;
        }

        return $db->get_list("SELECT bs.*, bl.lesson_title, bl.sequence, (Select CONCAT(firstname,' ',middlename,' ',lastname) from bro_accounts where id = bs.leader_pk) as approve_name
                              FROM {$this->base_table} as bs
                              INNER JOIN bro_lessons as bl ON bs.lesson_pk = bl.id
                              WHERE bs.user_pk = ? AND bl.lesson_type = ? 
                              ORDER BY bl.sequence
                            ", [$user_pk, $payload['lesson_type']]);
    }

    public function get_schooling_details($pk = null)
    {
        global $db, $common;
        return $db->get_row("SELECT bs.*, bl.lesson_title, bl.sequence
                              FROM {$this->base_table} AS bs
                              INNER JOIN bro_lessons AS bl ON bs.lesson_pk = bl.id
                              WHERE bs.id = ?
                        ", [$pk]);
    }

    public function approve_schooling($payload)
    {
        global $db, $notif_model, $common;
        $completed = true;
        $caption = '';
        $localdate = date('Y-m-d H:i:s');
        try {
            $notif_details = $common->get_notif_details($payload['id']);
            if ($payload['decision'] == 0) {
                $updated = $db->update("UPDATE {$this->base_table} SET attendance = null, date_approved = null WHERE id = ?", [$payload['table_pk']]);
                $deleted = $db->update("Delete from bro_notifications where id = ?", [$payload['id']]);
                $caption = ' disapproved ';
            } else {
                $updated = $db->update("UPDATE {$this->base_table} SET leader_pk = ?, date_approved = ? WHERE id = ?", [$_SESSION['pk'],$localdate, $payload['table_pk']]);
                $deleted = $db->update("Update bro_notifications set status = 1, date_updated = ? where id = ?", [$localdate, $payload['id']]);
                $caption = ' approved ';
            }
            $notif_arr = [
                "sender_pk"   => $_SESSION['pk'],
                "receiver_pk" => $notif_details['sender_pk'], //user pk
                "subject_pk"  => $_SESSION['pk'],
                "caption"     => $caption . 'your training attendance',
                "action"      => 'NONE',
                "table_pk"    => 0,
                "status"      => 1
            ];
            $notified = $notif_model->create_notification($notif_arr);

            if (!$notified || !$updated || !$deleted) {
                $completed = false;
            }
        } catch (\Throwable $th) {
            echo $th;
            $completed = false;
        }



        return $completed;
    }
}

$school_model = new SchoolingModel();
