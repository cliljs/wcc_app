<?php
require_once '../../autoload.php';
require_once MODEL_PATH . 'TribeModel.php';
require_once MODEL_PATH . 'NotificationModel.php';

class AccountModel
{
    private $base_table = 'bro_accounts';

    // @params $name = fullname
    private function get_leader_by_pk($pk = null)
    {
        global $db, $common;
        return $db->get_row("SELECT CONCAT(firstname, ' ', middlename, ' ', lastname) AS fullname, id
                            FROM {$this->base_table} WHERE id = ? AND is_leader = ?", [$pk, 1]);
    }

    private function create_hash($password)
    {
        $bcrypt_options = [
            'cost' => 12,
        ];
        return password_hash($password, PASSWORD_BCRYPT, $bcrypt_options);
    }

    public function login($payload = [])
    {
        global $db, $common;

        $has_account = $db->get_row("SELECT acc.*, tr.is_approved, tr.leader_pk FROM {$this->base_table} acc
                                    INNER JOIN bro_tribe tr ON acc.id = tr.member_pk
                                    WHERE acc.username = ?", [$payload['username']]);

        if (empty($has_account) || $has_account['is_approved'] === 0) {
            return ['error' => true, "msg" => "Account does not exists"];
        }

        if (!password_verify($payload['password'], $has_account['password'])) {
            return ['error' => true, "msg" => "Password does not match"];
        }

        // DAGDAGAN MO NALANG MABOSS NEED MONG DETAILS
        $_SESSION['pk']         = $has_account['id'];
        $_SESSION['is_leader']  = $has_account['is_leader'];
        $_SESSION['is_pastor']  = $has_account['is_pastor'];
        $_SESSION['is_admin']   = $has_account['is_admin'];
        $_SESSION['branch']     = $has_account['branch'];
        $_SESSION['leader_pk']  = $has_account['leader_pk'];
        $_SESSION['login_name'] = $has_account['firstname'] . ' ' . $has_account['middlename'] . ' ' . $has_account['lastname'];

        $_SESSION['username']  = $has_account['username'];

        $_SESSION['firstname']  = $has_account['firstname'];
        $_SESSION['middlename']  = $has_account['middlename'];
        $_SESSION['lastname']  = $has_account['lastname'];

        $_SESSION['address']  = $has_account['address'];
        $_SESSION['contact']  = $has_account['contact'];
        $_SESSION['birthdate']  = $has_account['birthdate'];
        return $has_account;
    }

    // GENERAL ACCOUNT CREATION (PANG DISCIPLE PALANG ATA??)
    public function create_account($payload = [], $files)
    {
        global $db, $common, $tribe_model, $notif_model;

        $username_exists = $db->get_row("SELECT * FROM bro_accounts WHERE username = ?", [$payload['username']]);

        if (!empty($username_exists)) {
            return ["error" => true, "msg" => "Username Already Exists"];
        }

        $leader_info = $this->get_leader_by_pk($payload['leader_name']);

        if (empty($leader_info)) {
            return ["error" => true, "msg" => "Tribe Leader name does not exists"];
        }

        $arr = [
            "username"   => $payload['username'],
            "password"   => $this->create_hash($payload['password']),
            "lastname"   => $payload['lastname'],
            "firstname"  => $payload['firstname'],
            "middlename" => $payload['middlename'],
            "gender"     => $payload['gender'],
            "address"    => $payload['address'],
            "birthdate"  => $payload['birthdate'],
            "contact"    => $payload['contact'],
            "branch"     => $payload['branch'],
            "inviter_pk" => $payload['inviter']
        ];

        $fields        = $common->get_insert_fields($arr);
        $last_id       = $db->insert("INSERT INTO {$this->base_table} {$fields}", array_values($arr));
       
        if ($files['profile_picture']['error'] != 4) {
            $update_fields = $common->get_update_fields(['profile_pic' => ""]);
            $profile_pic   = $common->upload($last_id, $files['profile_picture']);
            $db->update("UPDATE {$this->base_table} {$update_fields} WHERE id = {$last_id}", [$profile_pic]);
        }

        $tribe_pk =  $tribe_model->create_leader([
            "leader_pk" => $leader_info['id'],
            "insert_id" => $last_id
        ]);

        $notif_arr = [
            "sender_pk"   => $last_id,
            "receiver_pk" => $leader_info['id'],
            "subject_pk"  => $last_id,
            "caption"     => ' registered a new account under your tribe',
            "action"      => 'SIGNUP',
            "table_pk"    => $tribe_pk
        ];
        $notif_model = $notif_model->create_notification($notif_arr);
        return $last_id;
    }

    public function get_account_details()
    {
        global $db;
        return $db->get_row("SELECT acc.*,
        (Select CONCAT(firstname,' ',middlename,' ',lastname) from {$this->base_table} where id = (Select leader_pk from bro_tribe where member_pk = ? and is_approved = 1)) as tlname 
        FROM {$this->base_table} acc WHERE acc.id = ?", [$_SESSION['pk'], $_SESSION['pk']]);
    }

    public function validate_bypass($payload = []){
        global $db, $common;
        $valid = true;
        $has_account = $db->get_row("SELECT * from {$this->base_table} where username = ? and is_leader = 1", [$payload['tlusername']]);

        if (empty($has_account)) {
            $valid = false;
        }

        if (!password_verify($payload['tlpassword'], $has_account['password'])) {
            $valid = false;
        }
        return $valid;
    }
    public function get_headers()
    {
        global $db;
        return $db->get_row("SELECT COUNT(id) as invite_count,(Select lesson_type from bro_enrollment where user_pk = ? and is_enrolled = 1 order by id desc LIMIT 1) as current_lesson from {$this->base_table} where inviter_pk = ?", [$_SESSION['pk'], $_SESSION['pk']]);
    }
    public function update_account($payload = [], $id = null, $files)
    {
        global $db, $common;
        unset($payload['profile_picture']);
        unset($payload['confirm_password']);
        $filtered = array_filter($payload);
        if(isset($payload['password'])){
            $filtered['password']   = $this->create_hash($payload['password']);
        }
       
        $update_fields = $common->get_update_fields($filtered);
        $updated       = $db->update("UPDATE {$this->base_table} {$update_fields} WHERE id = {$id}", array_values($filtered));
        if ($files['profile_picture']['error'] != 4) {
            $update_fields = $common->get_update_fields(['profile_pic' => ""]);
            $profile_pic   = $common->upload($_SESSION['pk'], $files['profile_picture']);
            $db->update("UPDATE {$this->base_table} {$update_fields} WHERE id = {$_SESSION['pk']}", [$profile_pic]);
        }

        $has_account =  $this->get_account_details($id);
        $_SESSION['login_name'] = $has_account['firstname'] . ' ' . $has_account['middlename'] . ' ' . $has_account['lastname'];
        $_SESSION['username']  = $has_account['username'];
        $_SESSION['firstname']  = $has_account['firstname'];
        $_SESSION['middlename']  = $has_account['middlename'];
        $_SESSION['lastname']  = $has_account['lastname'];
        $_SESSION['address']  = $has_account['address'];
        $_SESSION['contact']  = $has_account['contact'];
        $_SESSION['birthdate']  = $has_account['birthdate'];

        return $updated ? $has_account : false;
    }

    public function delete_account($id = null)
    {
        global $db, $common;
        $result  = $this->get_account_details($id);
        $deleted =  $db->delete("DELETE FROM {$this->base_table} WHERE id = {$id}");

        return $deleted ? $result : false;
    }
    public function reset_password($id = null)
    {
        global $db, $common;
        $new_password = $this->create_hash('12345');
        $deleted =  $db->update("Update {$this->base_table} set password = ? WHERE id = {$id}",[$new_password]);

        return $deleted ? true : false;
    }
    public function get_leader_names()
    {
        global $db, $common;
        return $db->get_list(
            "SELECT tr.is_approved, acc.* 
                              FROM {$this->base_table} acc 
                              INNER JOIN bro_tribe tr ON acc.id = tr.member_pk 
                              WHERE acc.is_leader = ? AND tr.is_approved = ?",
            [1, 1]
        );
    }
}

$account_model = new AccountModel();
