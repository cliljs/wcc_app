<?php
require_once '../../autoload.php';

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

    public function get_user_schooling()
    {
        global $db, $common;
        return $db->get_list("SELECT bs.*, bl.lesson_title, bl.sequence
                              FROM {$this->base_table} as bs
                              INNER JOIN bro_lessons as bl ON bs.lesson_pk = bl.id
                              WHERE bs.user_pk = ?
                        ", [$_SESSION['pk']]);
    }
}

$school_model = new SchoolingModel();