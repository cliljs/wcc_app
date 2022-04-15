<?php
require_once '../../autoload.php';
require_once MODEL_PATH . 'TribeModel.php';

class AccountModel {
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

        if(empty($has_account) || $has_account['is_approved'] === 0) {
            return ['error' => true, "msg" => "Account does not exists"];
        }

        if (!password_verify($payload['password'], $has_account['password'])) {
            return ['error' => true, "msg" => "Password does not match"];
		}
        
        // DAGDAGAN MO NALANG MABOSS NEED MONG DETAILS
        $_SESSION['pk']         = $has_account['id'];
        $_SESSION['is_leader']  = $has_account['is_leader'];
        $_SESSION['is_pastor']  = $has_account['is_pastor'];
        $_SESSION['branch']     = $has_account['branch'];
        $_SESSION['leader_pk']  = $has_account['leader_pk'];
        $_SESSION['login_name'] = $has_account['firstname'] . ' ' . $has_account['middlename'] . ' ' . $has_account['lastname'];
        return $has_account;
    }

    // GENERAL ACCOUNT CREATION (PANG DISCIPLE PALANG ATA??)
    public function create_account($payload = [], $files)
    {
        global $db, $common, $tribe_model;

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
            "inviter_pk"     => $payload['inviter']
        ];

        $fields        = $common->get_insert_fields($arr);
        $last_id       = $db->insert("INSERT INTO {$this->base_table} {$fields}", array_values($arr));
        
        if (!empty($files)) {
           
            $update_fields = $common->get_update_fields(['profile_pic' => ""]);

            $profile_pic   = $common->upload($last_id, $files['profile_picture']);

            $db->update("UPDATE {$this->base_table} {$update_fields} WHERE id = {$last_id}", [$profile_pic]);
        }

        $tribe_model->create_leader([
            "leader_pk" => $leader_info['id'],
            "insert_id" => $last_id
        ]);
        
        return $last_id;
    }

    public function get_account_details()
    {
        global $db, $common;
        //bay pacheck nlng kung gagana sayo tong session based.
        //login ka muna sa portal bgo ka magtest sa insomnia. alam ko nabypass mo na ung session dati sa reservation api ntn eh
        //change ko muna tong query bay hnd ko kasi sure kung possible ba na may user account na walang instance sa bro_tribe
        // return $db->get_row("SELECT acc.*, tr.is_approved FROM {$this->base_table} acc
        //                      INNER JOIN bro_tribe tr ON acc.id = tr.member_pk
        //                      WHERE acc.id = ? AND tr.is_approved = ?", [$id, 1]);
        return $db->get_row("SELECT acc.*,
        (Select CONCAT(firstname,' ',middlename,' ',lastname) from {$this->base_table} where id = (Select leader_pk from bro_tribe where member_pk = ? and is_approved = 1)) as tlname 
        FROM {$this->base_table} acc WHERE acc.id = ?", [$_SESSION['pk'],$_SESSION['pk']]);
    }

    public function update_account($payload = [], $id = null)
    {
        global $db, $common;

        $update_fields = $common->get_update_fields($payload);
        $updated       = $db->update("UPDATE {$this->base_table} {$update_fields} WHERE id = {$id}", array_values($payload));

        return $updated ? $this->get_account_details($id): false;
    }
    
    public function delete_account($id = null)
    {
        global $db, $common;
        $result  = $this->get_account_details($id);
        $deleted =  $db->delete("DELETE FROM {$this->base_table} WHERE id = {$id}");

        return $deleted ? $result : false;
    }

    public function get_leader_names()
    {
        global $db, $common;
        return $db->get_list("SELECT tr.is_approved, acc.* 
                              FROM {$this->base_table} acc 
                              INNER JOIN bro_tribe tr ON acc.id = tr.member_pk 
                              WHERE acc.is_leader = ? AND tr.is_approved = ?",
                              [1, 1]);
    }
}

$account_model = new AccountModel();