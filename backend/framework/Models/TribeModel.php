<?php
require_once '../../autoload.php';
require_once MODEL_PATH . 'AccountModel.php';
require_once MODEL_PATH . 'NotificationModel.php';

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

    public function transfer_disciple($pk, $query)
    {
        global $db, $common, $notif_model;
        $arr = [
            "leader_pk"   => $query['new_leader_pk'],
            "is_approved" => 0
        ];
        $updated = $db->update("UPDATE {$this->base_table} {$common->get_update_fields($arr)} WHERE id = {$pk}", array_values($arr));
        $notif_arr = [
            "sender_pk"   => $_SESSION['pk'],
            "receiver_pk" => 1,
            "subject_pk"  => 1,
            "caption"     => !empty($payload['caption']) ? $payload['caption'] : null,
            "action"      => 'TRANSFER',
        ];
        $notif_model = $notif_model->create_notification($notif_arr);
        return $updated;
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
                            WHERE acc.is_leader = ? 
                            ORDER BY acc.firstname asc",
                            [1]);
    }

    public function get_inviter_names($payload = [])
    {
        global $db, $common;
        return $db->get_list("SELECT REPLACE(CONCAT_WS(' ',acc.firstname,acc.middlename,acc.lastname),'  ',' ') AS fullname, acc.id
                            FROM bro_accounts acc 
                            WHERE branch = ? OR is_pastor = 1 
                            ORDER BY acc.firstname asc",
                            array_values($payload));
    }
    
    // id = DISCIPLE ID ON BRO_TRIBE
    public function approve_disciple($payload, $id)
    {
        global $db, $common, $account_model;

        $update_fields       = $common->get_update_fields($payload);
        $updated             = $db->update("UPDATE {$this->base_table} {$update_fields} WHERE member_pk = {$id}", array_values($payload));
        $disciple_data       = $account_model->get_account_details($id);
        return $updated ? $disciple_data : false;
    }
   
    public function get_disciples()
    {
        global $db;
        $pk = isset($_GET['id']) ? $_GET['id'] : $_SESSION['pk'];
        $arr = [
            "param1"    =>  $pk,
            "param2"    =>  $pk
        ];
        return $db->get_list("Select tr.leader_pk,acc.id,acc.profile_pic,REPLACE(CONCAT_WS(' ',acc.firstname,acc.middlename,acc.lastname),'  ',' ') AS fullname, (Select COUNT(id) from bro_tribe where leader_pk = tr.member_pk and is_approved = 1) as member_count  
        from bro_accounts acc 
        INNER JOIN {$this->base_table} tr 
        ON acc.id = tr.member_pk 
        WHERE tr.leader_pk = ? and is_approved = 1 and NOT tr.member_pk = ?",
        array_values($arr));
    }
}

$tribe_model = new TribeModel();
