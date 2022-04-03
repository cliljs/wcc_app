<?php

require_once '../../autoload.php';

 class AttendanceModel {
     private $base_table = 'bro_attendance';

     public function create_attendance($payload = [])
     {
        global $db, $common;

        $arr = [
            "sunday_date" => $payload['sunday_date'],
            "account_pk"  => $payload['account_pk'],
        ];

        $fields = $common->get_insert_fields($arr);
        return $db->insert("INSERT INTO {$this->base_table} {$fields}", array_values($arr));
     }

    //  GET INFORMATION OF SINGLE ATTENDANCE
     public function get_attendance($id = null)
     {
        global $db, $common;

        return $db->get_row("SELECT * FROM {$this->base_table} WHERE id = ?", [$id]);
     }
 
    //  ATTENDANCE LIST
     public function get_attendance_list($user_id = null)
     {
        global $db, $common;

        return $db->get_list("SELECT * FROM {$this->base_table} WHERE account_pk = ?", [$user_id]);
     }
 
     public function update_attendance($payload = [], $id = null)
     {
        global $db, $common;

        $update_fields = $common->get_update_fields($payload);
        $updated       = $db->update("UPDATE {$this->base_table} {$update_fields} WHERE id = {$id}", array_values($payload));

        return $updated ? $this->get_attendance($id) : false;
     }

     public function remove_attendance($id = null)
     {
        global $db, $common;
        $tobe_deleted = $this->get_attendance($id);
        $deleted      = $db->delete("DELETE FROM {$this->base_table} WHERE id = {$id}");
        return $deleted ? $tobe_deleted : false;
     }
 }

 $attendance_model = new AttendanceModel();