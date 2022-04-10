<?php
require_once '../../autoload.php';
require_once MODEL_PATH . 'AccountModel.php';

class TribeModel {

    private $base_table = 'bro_tribe';

    public function create_leader($payload = [])
    {
        global $db, $common;
        
        $tribe_info = [
            "leader_pk" => $payload['leader_pk'],
            "member_pk" => $payload['insert_id'],
        ];

        $tribe_fields = $common->get_insert_fields($tribe_info);
        return $db->insert("INSERT INTO {$this->base_table} {$tribe_fields}", array_values($tribe_info));
    }

    public function get_pending_disciple()
    {
        global $db, $common;
        
        return $db->get_list("SELECT acc.*, tr.is_approved FROM bro_accounts acc
                            INNER JOIN {$this->base_table} tr ON acc.id = tr.member_pk
                            WHERE tr.leader_pk = ? AND tr.is_approved = ?", [$_SESSION['pk'], 0]);
    }

    public function get_leader_names()
    {
        global $db, $common;
        return $db->get_list("SELECT REPLACE(CONCAT_WS(' ',acc.firstname,acc.middlename,acc.lastname),'  ',' ') AS fullname, acc.id
                            FROM bro_accounts acc 
                            INNER JOIN {$this->base_table} tr ON acc.id = tr.member_pk 
                            WHERE acc.is_leader = ? AND tr.is_approved = ?",
                            [1, 1]);
    }
    
    // id = DISCIPLE ID ON BRO_TRIBE
    public function approve_disciple($payload, $id)
    {
        global $db, $common, $account_model;

        $update_fields = $common->get_update_fields($payload);
        $updated       = $db->update("UPDATE {$this->base_table} {$update_fields} WHERE member_pk = {$id}", array_values($payload));

        return $updated ? $account_model->get_account_details($id) : false;
    }
}

$tribe_model = new TribeModel();
