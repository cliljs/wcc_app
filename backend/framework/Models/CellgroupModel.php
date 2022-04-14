<?php

require_once '../../autoload.php';

class CellGroupModel {
    private $base_table = 'bro_cellgroup';

    public function create_cellgroup($payload = [])
    {
        global $db, $common;

        $arr = [
            "user_pk"     => $payload['user_pk'],
            "event_date"  => $payload['event_date'],
            "event_time"  => $payload['event_time'],
            "event_place" => $payload['event_place'],
            "member_name" => $payload['member_name'],
        ];

        $fields = $common->get_insert_fields($arr);

        return $db->insert("INSERT INTO {$this->base_table} {$fields}", array_values($arr));
    }

    public function get_cell_list()
    {
        global $db, $common;
        // ganto muna sa ngayon alaws criteria
        return $db->get_list("SELECT * FROM {$this->base_table}");
    }

    public function get_cell_data($pk = null)
    {
        global $db, $common;
        return $db->get_row("SELECT * FROM {$this->base_table} WHERE id = ?", [$pk]);
    }

    public function update_cell_data($pk = null, $payload = [])
    {
        global $db, $common;
        $update_fields = $common->get_update_fields($payload);
        $updated       = $db->update("UPDATE {$this->base_table} {$update_fields} WHERE id = {$pk}", array_values($payload));
        return $updated ? $this->get_cell_data($pk) : false;
    }

    public function remove_cell_data($pk = null)
    {
       global $db, $common;
       $tobe_deleted = $this->get_cell_data($pk);
       $deleted      = $db->delete("DELETE FROM {$this->base_table} WHERE id = {$pk}");
       return $deleted ? $tobe_deleted : false;
    }
}

$cellgroup_model = new CellGroupModel();