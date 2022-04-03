<?php
include_once "../../autoload.php";

class TestModel {

    public function test_insert($payload)
    {
        global $db, $common;

        $arr = [
            "username"     => $payload['username'],
            "password"     => $payload['password'],
            "date_created" => $payload['date_created'],
            "date_updated" => $payload['date_updated'],
        ];

        $insert_fields = $common->get_insert_fields($arr);

        return $db->insert("INSERT INTO ce_test {$insert_fields}", array_values($arr));
    }

    public function test_update($payload, $id)
    {
        global $db, $common;

        $update_fields = $common->get_update_fields($payload);
        
        return $db->update("UPDATE ce_test {$update_fields} WHERE id = {$id}", array_values($payload));
    }

    public function test_delete($id)
    {
        global $db, $common;

        return $db->update("DELETE FROM ce_test WHERE id = {$id}");
    }
}

$test_model = new TestModel();