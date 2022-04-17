<?php
require_once '../../autoload.php';
require_once MODEL_PATH . 'NotificationModel.php';

class SchoolingModel {
    private $base_table = 'bro_schooling';

    public function create_schooling($payload = [])
    {
        global $db, $common;

        $arr = [
            "user_pk"     => $_SESSION['pk'],
            "lesson_pk"   => $payload['lesson_pk'],
            "leader_pk"   => $_SESSION['leader_pk'],
        ];
        $fields = $common->get_insert_fields($arr);
        return $db->insert("INSERT INTO {$this->base_table} {$fields}", array_values($arr));
    }

    public function update_schooling($id, $payload)
    {
        global $db, $common, $notif_model;
        $update_fields = $common->get_update_fields($payload);
        $updated       = $db->update("UPDATE {$this->base_table} {$update_fields} WHERE id = {$id}", array_values($payload));
      
        return $updated ? $this->get_schooling_details($id) : false;
    }

    public function confirm_attendance($pk)
    {
        global $db, $common, $notif_model;
        $arr = [
            "attendance"     => 1,
            "date_confirmed" => date('Y-m-d H:i:s')
        ];
        $updated_schooling = $this->update_schooling($pk, $arr);
        $notif_arr = [
            "sender_pk"   => $updated_schooling['leader_pk'],
            "receiver_pk" => $updated_schooling['user_pk'],
            "subject_pk"  => $updated_schooling['user_pk'],
            "caption"     => !empty($payload['caption']) ? $payload['caption'] : null,
            "action"      => 'SCHOOL',
        ];
        $notif_model->create_notification($notif_arr);

        return $updated_schooling;
    }

    public function get_user_schooling()
    {
        global $db, $common;
        return $db->get_list("SELECT bs.*, bl.lesson_title, bl.sequence
                              FROM {$this->base_table} as bs
                              INNER JOIN bro_lessons as bl ON bs.lesson_pk = bl.id
                              WHERE bs.user_pk = ?
                        ", [$_SESSION['pk']]);
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
}

$school_model = new SchoolingModel();