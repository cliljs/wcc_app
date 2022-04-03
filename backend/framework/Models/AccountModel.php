<?php
require_once '../../autoload.php';
class AccountModel {
    private $base_table = 'bro_accounts';

    // GENERAL ACCOUNT CREATION (PANG DISCIPLE PALANG ATA??)
    public function create_account($payload = [])
    {
        global $db, $common;

        $username_exists = $db->get_row("SELECT * FROM bro_accounts WHERE username = ?", [$payload['username']]);

        if (!empty($username_exists)) {
            return ["error" => true, "msg" => "Username Already Exists"];
        }

        $leader_info = $this->get_leader_by_ref($payload['ref_code']);

        if (empty($leader_info)) {
            return ["error" => true, "msg" => "Referral Code Does not Exists"];
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
            "leader_pk"  => $leader_info['id'],
        ];

        $fields = $common->get_insert_fields($arr);

        return $db->insert("INSERT INTO {$this->base_table} {$fields}", array_values($arr));
    }

    private function get_leader_by_ref($ref_code = null)
    {
        global $db, $common;

        return $db->get_row("SELECT * FROM {$this->base_table} WHERE ref_code = ?", [$ref_code]);
    }

    private function create_hash($password)
	{
		$bcrypt_options = [
			'cost' => 12,
		];
		
		return password_hash($password, PASSWORD_BCRYPT, $bcrypt_options);
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