<?php
require_once '../../autoload.php';


class MentoringModel
{
    private $base_table = 'bro_mentoring';

    public function create_mentoring($payload = [])
    {
        global $db, $common;
        $arr = [
            "mentor_date"   => $payload["mentoring_date_input"],
            "attendance"    => (isset($payload["mentoring_check"])) ? 1 : 0,
            "created_by"    => $_SESSION["pk"]
        ];
        $fields = $common->get_insert_fields($arr);
        return $db->insert("INSERT INTO {$this->base_table} {$fields}", array_values($arr));
    }

    public function remove_mentoring($pk)
    {
        global $db, $common;
        $deleted      = $db->delete("DELETE FROM {$this->base_table} WHERE id = {$pk}");
        return $deleted ? true : false;
    }

    public function get_mentoring($payload = [])
    {
        global $db, $common;
        $pk = (array_key_exists('pk', $payload)) ? $payload['pk'] : $_SESSION['pk'];
        return $db->get_list("SELECT * from {$this->base_table} 
                            WHERE created_by = ? 
                            ORDER BY mentor_date asc
                            ", [$pk]);
    }
    public function admin_mentoring($year = 0)
    {
        global $db;

        return $db->get_list("SELECT m.*,(Select CONCAT(lastname,', ',firstname,' ',middlename) from bro_accounts where id = m.created_by) as wccmember_name from {$this->base_table} m
                            WHERE YEAR(mentor_date) = ? 
                            ORDER BY mentor_date asc
                            ", [$year]);
    }
}

$mentoring_model = new MentoringModel();
