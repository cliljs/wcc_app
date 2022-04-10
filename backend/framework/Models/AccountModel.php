<?php
require_once '../../autoload.php';
class AccountModel {
    private $base_table = 'bro_accounts';

    // @params $name = fullname
    private function get_leader_by_fullname($name = null)
    {
        global $db, $common;

        return $db->get_row("SELECT CONCAT(firstname, ' ', lastname) AS fullname, id
                            FROM {$this->base_table} WHERE CONCAT(firstname, ' ', lastname) = ? AND is_leader = ?", [$name, 1]);
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

        $has_account = $db->get_row("SELECT * FROM {$this->base_table} WHERE username = ?", [$payload['username']]);

        if(empty($has_account) || $has_account['is_verified'] < 1) {
            return ['error' => true, "msg" => "Account does not exists"];
        }

        if (!password_verify($payload['password'], $has_account['password'])) {
            return ['error' => true, "msg" => "Password does not match"];
		}

        return $has_account;
    }

    // GENERAL ACCOUNT CREATION (PANG DISCIPLE PALANG ATA??)
    public function create_account($payload = [], $files)
    {
        global $db, $common;

        $username_exists = $db->get_row("SELECT * FROM bro_accounts WHERE username = ?", [$payload['username']]);

        if (!empty($username_exists)) {
            return ["error" => true, "msg" => "Username Already Exists"];
        }

        $leader_info = $this->get_leader_by_fullname($payload['leader_name']);
        
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
        ];

        $fields        = $common->get_insert_fields($arr);
        $last_id       = $db->insert("INSERT INTO {$this->base_table} {$fields}", array_values($arr));
        
        if (!empty($files)) {
            $update_fields = $common->get_update_fields(['profile_pic' => ""]);
            $profile_pic   = $common->upload($last_id, $files[0]);

            $db->update("UPDATE {$this->base_table} {$update_fields} WHERE id = {$last_id}", [$profile_pic]);
        }

        $tribe_info = [
            "leader_pk" => $leader_info['id'],
            "member_pk" => $last_id,
        ];

        $tribe_fields = $common->get_insert_fields($tribe_info);
        $db->insert("INSERT INTO {$this->base_table} {$tribe_fields}", array_values($tribe_info));
        
        return $last_id;
    }

    public function get_account_details($id = null)
    {
        global $db, $common;

        return $db->get_row("SELECT * FROM {$this->base_table} WHERE id = ?", [$id]);
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
}

$account_model = new AccountModel();