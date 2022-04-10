<?php

include_once '../Models/AccountModel.php';

class SuperAdmin {
    private $base_table = 'bro_accounts';

    // TRIBE LEADER CREATION USING UPDATE
    public function assign_leader($id)
    {
        global $db, $common, $account_model;
        return $account_model->update_account(
            [
              'is_leader' => 1, 
              "ref_code" => $common->generate_random()
            ],
            $id
        );
    }
    public function get_leaders()
    {
        global $db, $common, $account_model;
        return $db->get_list("SELECT id,CONCAT(firstname,' ',middlename,' ',lastname) as fullname FROM {$this->base_table} order by fullname asc");
      
    }
    public function create_leader($payload = [])
    {
        global $db, $common, $account_model;

        $last_insert = $account_model->create_account($payload);

        if (@$last_insert['error']) {
            return $last_insert;
        }

        return $this->assign_leader($last_insert);
    }

    // LIST OF PENDING ACCOUNTS
    public function get_pending_list()
    {
        global $db, $common, $account_model;
        return $db->get_list("SELECT * FROM {$this->base_table} WHERE is_verified = ?", [0]);
    }

    public function verify_member($id = null)
    {
        global $db, $common, $account_model;
        return $account_model->update_account(['is_verified' => 1], $id);
    }
}

$admin_model = new SuperAdmin();