<?php
require_once '../../autoload.php';
require_once MODEL_PATH . 'AccountModel.php';
require_once MODEL_PATH . 'NotificationModel.php';

class TribeModel
{

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

    // GET ROW FROM BASE TABLE
    public function get_tribe_details($pk = null)
    {
        global $db, $common;
        return $db->get_row("SELECT * FROM {$this->base_table} WHERE id = {$pk}");
    }

    public function transfer_disciple($pk, $query)
    {
        global $db, $common, $notif_model;
        $arr = [
            "new_leader"   => $query['new_leader_pk']
        ];
        $tribe_disciple = $db->get_row("SELECT member_pk FROM {$this->base_table} WHERE id = {$pk}");
        $updated = $db->update("UPDATE {$this->base_table} {$common->get_update_fields($arr)} WHERE id = {$pk}", array_values($arr));
        $leader_details = $common->get_fullname_id($query['new_leader_pk']);
        $notif_arr = [
            "sender_pk"   => $_SESSION['pk'],
            "receiver_pk" => 1,
            "subject_pk"  => $tribe_disciple['member_pk'],
            "caption"     => ' transferred to ' . $leader_details['fullname'],
            "action"      => 'TRANSFER',
            "table_pk"    => $pk
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

    public function get_leader_names($payload = [])
    {
        global $db, $common;
        $kwiri = (isset($payload["me"])) ? "AND NOT acc.id = " . $_SESSION['pk'] . " ORDER BY acc.firstname asc" : "ORDER BY acc.firstname asc";
        return $db->get_list(
            "SELECT REPLACE(CONCAT_WS(' ',acc.firstname,acc.middlename,acc.lastname),'  ',' ') AS fullname, acc.id
                            FROM bro_accounts acc 
                            WHERE acc.is_leader = ? 
                            {$kwiri}",
            [1]
        );
    }

    public function get_inviter_names($payload = [])
    {
        global $db, $common;
        return $db->get_list(
            "SELECT REPLACE(CONCAT_WS(' ',acc.firstname,acc.middlename,acc.lastname),'  ',' ') AS fullname, acc.id
                            FROM bro_accounts acc 
                            WHERE branch = ? OR is_pastor = 1 
                            ORDER BY acc.firstname asc",
            array_values($payload)
        );
    }

    // id = DISCIPLE ID ON BRO_TRIBE
    public function approve_disciple($payload = [])
    {
        global $db, $common, $account_model;
        $pumalag = true;
        $table_pk = $payload['table_pk'];
        $arr = ['is_approved' => $payload['decision']];

        try {
            if ($arr['is_approved'] == 0) {
                $notif_pk = $payload['id'];
                if ($payload['action'] == 'TRANSFER') {
                    //transfer
                    $db->update("Update {$this->base_table} set new_leader = 0, is_approved = 1 where id = ?", [$table_pk]);
                } else {
                    //signup
                    $db->update("Delete from {$this->base_table} where member_pk = ?", [$table_pk]);
                    $db->update("Delete from bro_accounts where id = ?", [$table_pk]);
                }
                $db->update("Delete from bro_notifications where id = ?", [$notif_pk]);
            } else {
                if ($payload['action'] == 'TRANSFER') {
                    //transfer
                    $notif_pk = $payload['id'];
                    $db->update("Update {$this->base_table} set leader_pk = new_leader, is_approved = 1 where id = ?", [$table_pk]);
                    $db->update("Update {$this->base_table} set new_leader = 0 where id = ?", [$table_pk]);
                    $db->update("Update bro_notifications set status = 1 where id = ?", [$notif_pk]);
                } else {
                    //signup
                    $db->update("UPDATE {$this->base_table} set is_approved = 1 WHERE id = ?", [$payload['table_pk']]);
                }
            }
        } catch (Exception $th) {
            $pumalag = false;
        }



        return $pumalag;
    }

    public function get_disciples()
    {
        global $db;
        $pk = isset($_GET['id']) ? $_GET['id'] : $_SESSION['pk'];
        $arr = [
            "param1"    =>  $pk,
            "param2"    =>  $pk
        ];
        return $db->get_list(
            "Select tr.leader_pk,acc.id,acc.profile_pic,REPLACE(CONCAT_WS(' ',acc.firstname,acc.middlename,acc.lastname),'  ',' ') AS fullname, (Select COUNT(id) from bro_tribe where leader_pk = tr.member_pk and is_approved = 1) as member_count  
        from bro_accounts acc 
        INNER JOIN {$this->base_table} tr 
        ON acc.id = tr.member_pk 
        WHERE tr.leader_pk = ? and is_approved = 1 and NOT tr.member_pk = ?",
            array_values($arr)
        );
    }
    public function tribe_attendance($payload = [])
    {
        global $db, $common;
        $retval = '<thead>';
        $pk = $_SESSION['pk'];
        $month = $payload['select_month'];
        $year = $payload['select_year'];

        $monthName   = date('F', mktime(0, 0, 0, $month, 10));
        $days = $common->getSundays($year, $month);

        $result = $db->get_list(
            "Select tr.member_pk,(Select CONCAT(firstname,' ',middlename,' ',lastname) from bro_accounts where id = tr.member_pk) as member_name from {$this->base_table} tr where tr.leader_pk = {$pk} and tr.is_approved = 1",
            []
        );

        $retval .= "<tr>";
        $retval .= '<th rowspan="2" style = "vertical-align:middle;">Member\'s Name</th>';
        $retval .= "<th class = 'text-center' colspan = '" . count($days) . "' style = 'font-weight: 900;'>$monthName $year</th>";
        $retval .= "</tr>";
        $retval .= "<tr>";
        foreach ($days as $day) {
            $retval .= "<td class = 'text-center'>$day</td>";
        }
        $retval .= "</tr>";
        $retval .= "</thead>";
        $retval .= "<tbody>";

        foreach ($result as $key => $value) {
            $member_pk = $value['member_pk'];
            
            $retval .= "<tr>";
            $retval .= "<td>" . $value['member_name'] . "</td>";
            foreach ($days as $day) {
                $arr = [
                    "sunday_date"   => $year . '-' . sprintf("%02d", $month) . "-" . sprintf("%02d", $day),
                    "account_pk"    => $member_pk
                ];

                $colorpower = '';
                $className = $year . "-" . sprintf("%02d", $month) . "-" . sprintf("%02d", $day);
                $row = $db->get_row("Select * from bro_attendance where sunday_date = ? and account_pk = ?",array_values($arr));
                if(empty($row)){
                    $colorpower = '#2c3e50';
                } else{
                    $colorpower = ($row["confirmed_by"] == 0) ? '#f39c12' : '#1abc9c';
                }
                $retval .= "<td class = 'text-center $className'><i class = 'fa fa-circle' style = 'color:{$colorpower}'></i></td>";
            }
            $retval .= "</tr>";
        }

        //$retval .= "</tr>";
        $retval .= "</tbody>";


        return $retval;
    }
    public function tribe_attendance_render($payload = [])
    {
        global $common;
        $retval = '';
        $month = $payload['select_month'];
        $year = $payload['select_year'];

        $monthName   = date('F', mktime(0, 0, 0, $month, 10));
        $days = $common->getSundays($year, $month);

        $retval .= "<tr>";
        $retval .= "<td class = 'text-center' colspan = '" . count($days) . "' style = 'font-weight: 900;'>$monthName, $year</td>";
        $retval .= "</tr>";
        $retval .= "<tr>";
        foreach ($days as $day) {
            $retval .= "<td class = 'text-center'>$day</td>";
        }
        $retval .= "</tr>";
        $retval .= "<tr>";
        foreach ($days as $day) {
            $className = $year . "-" . sprintf("%02d", $i) . "-" . sprintf("%02d", $day);
            $retval .= "<td class = 'text-center $className'><i class = 'fa fa-circle' style = 'color:#2c3e50'></i></td>";
        }

        $retval .= "</tr>";

        return $retval;
    }
}

$tribe_model = new TribeModel();
