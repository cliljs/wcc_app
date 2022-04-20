<?php
require_once '../../autoload.php';

class NotificationModel {
    private $base_table = 'bro_notifications';

    public function create_notification($payload = [])
    {
        global $db, $common;
        $arr = [
            "sender_pk"   => $payload['sender_pk'],
            "receiver_pk" => $payload['receiver_pk'],
            "subject_pk"  => $payload['subject_pk'],
            "caption"     => !empty($payload['caption']) ? $payload['caption'] : null,
            "action"      => $payload['action'],
        ];
        $fields  = $common->get_insert_fields($arr);
        $last_id = $db->insert("INSERT INTO {$this->base_table} {$fields}", array_values($arr));
        return $last_id > 0 ? $this->get_notif_details($last_id) : false;
    }

    public function get_notif_details($pk = null)
    {
        global $db, $common;
        return $db->get_row("SELECT * FROM {$this->base_table} WHERE id = ?", [$pk]);
    }

    public function get_notification_list()
    {
        global $db, $common;
        $kwiri = ($_SESSION['is_admin'] == 1) ? 
        "SELECT id,date_created,sender_pk,action,(Select profile_pic from bro_accounts where id = n.subject_pk) as sender_pic, (Select CONCAT(firstname,' ',middlename,' ',lastname) from bro_accounts where id = n.subject_pk) as sender_name FROM {$this->base_table} n WHERE (receiver_pk = ? or receiver_pk = 0) order by date_created asc" : 
        "SELECT id,date_created,sender_pk,action,(Select profile_pic from bro_accounts where id = n.subject_pk) as sender_pic, (Select CONCAT(firstname,' ',middlename,' ',lastname) from bro_accounts where id = n.subject_pk) as sender_name FROM {$this->base_table} n WHERE receiver_pk = ? order by date_created asc";

        return $db->get_list($kwiri, [$_SESSION['pk']]);
    }

    public function update_notif($pk = null, $payload = [])
    {
        global $db, $common;
        $payload['date_updated'] = date('Y-m-d H:i:s'); 
        $update_fields = $common->get_update_fields($payload);
        $updated       = $db->update("UPDATE {$this->base_table} {$update_fields} WHERE id = {$pk}", array_values($payload));
        return $updated ? $this->get_notif_details($pk) : false;
    }

    public function read_notif($pk = null)
    {
        global $db, $common;
        return $this->update_notif($pk, ["status" => 1]);
    }

    public function notification_decision($payload=[]){
        //payload nito decision(1/0), tska notif_pk
        //select mo muna ano ung action nung notif(ENROLL/SIGNUP/etc...)
        //switch mo ung action para alam mo kung anong table ung iuupdate
        //e.g: action=SIGNUP, approve mo ung signup nya sa bro_tribes, action=ENROLL, set mo ung is_enrolled nya sa bro_enrollment
        
    }
}

$notif_model = new NotificationModel();