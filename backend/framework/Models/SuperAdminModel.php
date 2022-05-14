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
            ],
            $id
        );
    }
    public function get_admins(){
        global $db;
        return $db->get_list("Select id,lastname,firstname,middlename,branch,profile_pic from bro_accounts where is_admin = 1 order by lastname",[]);
    }
    public function create_leader($payload = [], $files)
    {
        global $db, $common, $account_model;

        $last_insert = $account_model->create_account($payload, $files);

        if (@$last_insert['error']) {
            return $last_insert;
        }

        return $this->assign_leader($last_insert);
    }

    // LIST OF PENDING ACCOUNTS
    public function get_pending_list()
    {
        global $db, $common, $account_model;
        return $db->get_list("SELECT tr.is_approved, acc.* 
                              FROM {$this->base_table} acc 
                              INNER JOIN bro_tribe tr ON acc.id = tr.member_pk 
                              WHERE acc.is_leader = ? AND tr.is_approved = ? AND acc.is_pastor = ? AND tr.leader_pk = ?", 
                              [0, 0, 0, 1]);
    }

    public function remove_admin($payload = [])
    {
        global $db;
        return $db->update("Update bro_accounts set is_admin = ? where id = ?",[$payload['status'],$payload['id']]);
    }
    public function verify_member($id = null)
    {
        global $db, $common, $account_model;
        return $account_model->update_account(['is_verified' => 1], $id);
    }
    public function get_assignee($payload = []){
        global $db;
        return $db->get_list("Select id,CONCAT(lastname,', ', firstname,' ',middlename) as fullname from bro_accounts where branch = ? and not is_pastor = 1 and id not in (Select id from bro_accounts where is_admin = 1) order by lastname",[$payload['branch']]);
    }
}

$admin_model = new SuperAdmin();