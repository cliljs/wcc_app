<?php
require_once '../../autoload.php';
require_once MODEL_PATH . 'TribeModel.php';
require_once MODEL_PATH . 'EnrollmentModel.php';
require_once MODEL_PATH . 'SchoolingModel.php';
class NotificationModel
{
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
            "table_pk"    => $payload['table_pk'],
            "notif_hash"  => $common->generate_random() . strtotime(date('Y-m-d H:i:s'))
        ];
        if (isset($payload['status'])) {
            $arr["status"]  = $payload["status"];
        }
        $fields  = $common->get_insert_fields($arr);
        $last_id = $db->insert("INSERT INTO {$this->base_table} {$fields}", array_values($arr));
        return $last_id > 0 ? $this->get_notif_details($last_id) : false;
    }

    public function get_notif_details($pk = null)
    {
        global $db, $common;
        return $db->get_row("SELECT * FROM {$this->base_table} WHERE id = ?", [$pk]);
    }

    public function get_notif_by_hash($hash = null) 
    {
        global $db, $common;
        return $db->get_row("SELECT * FROM {$this->base_table} WHERE notif_hash = ?", [$hash]);
    }

    public function get_notification_list($read)
    {
        global $db, $common;
        $criteria = ($_SESSION['is_admin'] == 1) ?
            "(receiver_pk = ? or receiver_pk = 0)" :
            "receiver_pk = ?";
        // $criteria .= ($read == 1) ? " or action = 'NONE'" : '';
        $kwiri = "SELECT id,date_created,sender_pk,action,caption,table_pk,(Select profile_pic from bro_accounts where id = n.subject_pk) as sender_pic, (Select CONCAT(firstname,' ',middlename,' ',lastname) from bro_accounts where id = n.subject_pk) as sender_name FROM {$this->base_table} n WHERE {$criteria} AND status = {$read} order by date_created desc";
        return $db->get_list($kwiri, [$_SESSION['pk']]);
    }

    public function update_notif($hash = null, $payload = [])
    {
        global $db, $common;
        $payload['date_updated'] = date('Y-m-d H:i:s');
        $update_fields = $common->get_update_fields($payload);
        $updated       = $db->update("UPDATE {$this->base_table} {$update_fields} WHERE notif_hash = {$hash}", array_values($payload));
        return $updated ? $this->get_notif_by_hash($hash) : false;
    }

    public function read_notif($pk = null)
    {
        global $db, $common;
        return $this->update_notif($pk, ["status" => 1]);
    }

    /* 
        @params payload
        id = notif pk
        sender_pk
        receiver_pk
        subject_pk
        table_pk
        caption
        action
        status
    */
    public function notification_decision($payload = [])
    {
        global $db, $common,$attendance_model, $tribe_model, $enroll_model,$school_model;
        $retval = false;
        switch ($payload['action']) {
            case 'TRANSFER':
            case 'SIGNUP':
                //$tribe_model->approve_disciple(["is_approved" => $payload['decision']], $payload['table_pk']);
                $retval = $tribe_model->approve_disciple($payload);
                break;

            case 'ENROLL':
                $retval = $enroll_model->approve_user($payload);
                break;

            case 'ATTENDANCE':
                $retval = $attendance_model->approve_attendance($payload);
                break;
            case 'TRAINING':
                $retval = $school_model->approve_schooling($payload);
                break;
            default:
                # code...
                break;
        }
        $this->read_notif($payload['id']);
        // @payload[id] = notif pk
        return $retval;
    }
}

$notif_model = new NotificationModel();
