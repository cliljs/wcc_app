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
        $pk = (array_key_exists('pk',$payload)) ? $payload['pk'] : $_SESSION['pk'];
        return $db->get_list("SELECT * from {$this->base_table} 
                            WHERE created_by = ? 
                            ORDER BY mentor_date asc
                            ", [$pk]);
    }
}

$mentoring_model = new MentoringModel();
