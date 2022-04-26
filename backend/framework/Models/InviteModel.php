<?php

require_once '../../autoload.php';
require_once MODEL_PATH . 'QRModel.php';

class InviteModel {
    private $base_table = 'bro_invites';
    
    public function create_invite($payload = [])
    {
        global $db, $common, $qr_model;
       
        //$is_qr_valid = $qr_model->validate_qr($payload['qr']);

        // if (!$is_qr_valid) {
        //     return ["error" => true, "msg" => "QR Not Valid"];
        // }
        if(isset($payload['bro'])){
            foreach ($payload['bro'] as $key => $inner) {
            foreach ($inner as $i_key => $name) {
                $arr = [
                    "date_invited" => date("Y-m-d"),
                    "inviter_pk"   => $_SESSION['pk'],
                    "invitee_name" => $name,
                    "invite_type"  => $i_key,
                ];
                $fields = $common->get_insert_fields($arr);
                $db->insert("INSERT INTO {$this->base_table} {$fields}", array_values($arr));
            }
            }
        }

        return true;
    }

    public function get_invite_list()
    {
        global $db, $common;
        return $db->get_list("SELECT id, invitee_name FROM {$this->base_table} WHERE inviter_pk = ?", [$_SESSION['pk']]);
    }

    public function get_invite_details($pk = null)
    {
        global $db, $common;
        return $db->get_row("SELECT * FROM {$this->base_table} WHERE id= ?", [$pk]);
    }
}

$invite_model = new InviteModel();