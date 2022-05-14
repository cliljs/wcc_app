<?php

require_once '../../autoload.php';
require_once MODEL_PATH . 'NotificationModel.php';
require_once MODEL_PATH . 'QRModel.php';
require_once MODEL_PATH . 'AccountModel.php';
class AttendanceModel
{
   private $base_table = 'bro_attendance';

   public function create_attendance($payload = [])
   {
      global $db, $common, $qr_model, $account_model, $notif_model;
      $valid = false;
      $arr = [
         "sunday_date" => date('Y-m-d'),
         "account_pk"  => $_SESSION['pk'],
      ];

      if (isset($payload['qr'])) {
         $valid = $qr_model->validate_qr($payload['qr']);
      } else {
         $bypass = [
            "tlusername"  => $payload["tlusername"],
            "tlpassword"  => $payload["tlpassword"]
         ];
         $valid = $account_model->validate_bypass($bypass);
      }

      if ($valid) {
         $fields = $common->get_insert_fields($arr);
         $last_id = $db->insert("INSERT INTO {$this->base_table} {$fields}", array_values($arr));
         $leader_pk = $common->get_user_leader($_SESSION['pk']);

         $localdate = date('Y-m-d');

         $notif_arr = [
            "sender_pk"   => $_SESSION['pk'],
            "receiver_pk" => 0,
            "subject_pk"  => $_SESSION['pk'],
            "caption"     => ' attended Sunday Celebration ' . $localdate,
            "action"      => 'ATTENDANCE',
            "table_pk"    => $last_id
         ];
         $notif_model->create_notification($notif_arr);
      }

      return $valid;
   }

   //  GET INFORMATION OF SINGLE ATTENDANCE
   public function get_attendance($id = null)
   {
      global $db, $common;
      return $db->get_row("SELECT * FROM {$this->base_table} WHERE id = ?", [$id]);
   }
   public function badge_attendance()
   {
      global $db;
      //echo 'Account PK: ' . $_SESSION['pk'];
      //echo 'Date: ' . date('Y-m-d');
      return $db->get_row("SELECT id FROM {$this->base_table} WHERE account_pk = ? and sunday_date = ?", [$_SESSION['pk'], date('Y-m-d')]);
   }

   //  ATTENDANCE LIST
   public function get_attendance_list($payload = [])
   {
      global $db, $common;
      $year = $payload['year'];
      $user_pk = (isset($payload['pk'])) ? $payload['pk'] : $_SESSION['pk'];
      return $db->get_list(
         "SELECT * FROM {$this->base_table} 
          WHERE YEAR(sunday_date) = ? AND account_pk = ?",
         [$year, $user_pk]
      );
   }
   public function render_table($year)
   {
      global $common;
      $retval = '';
      for ($i = 1; $i < 13; $i++) {
         $monthName   = date('F', mktime(0, 0, 0, $i, 10));
         $days = $common->getSundays($year, $i);

         $retval .= "<tr>";
         $retval .= "<td class = 'text-center' colspan = '5' style = 'font-weight: 900;'>$monthName</td>";
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
      }
      return $retval;
   }

   public function get_disciple_attendance($year)
   {
      global $db, $common;
      return $db->get_list(
         "SELECT * FROM {$this->base_table} 
                            WHERE YEAR(sunday_date) = ? AND confirmed_by = ?",
         [$year, $_SESSION['pk']]
      );
   }

   public function update_attendance($payload = [], $id = null)
   {
      global $db, $common, $notif_model;
      $update_fields = $common->get_update_fields($payload);
      $updated       = $db->update("UPDATE {$this->base_table} {$update_fields} WHERE id = {$id}", array_values($payload));

      return $updated ? $this->get_attendance($id) : false;
   }

   public function approve_attendance($payload = [])
   {
      global $db, $common, $notif_model;
      $caption = '';
      $completed = true;
      try {
         $notif_row = $notif_model->get_notif_details($payload['id']);
         $account_branch = $db->get_row("SELECT branch, is_admin FROM bro_accounts WHERE id = ?", [$notif_row['sender_pk']]);

         if ($_SESSION['branch'] !== $account_branch['branch'] && $_SESSION['is_admin'] == 1) {
            return ["error" => 1, "msg" => "nugawa mo dito bay"];
         }

         if ($payload['decision'] == 1) {
            $arr = [
               "confirmed_by" => $_SESSION['pk'],
               "date_confirmed" => date('Y-m-d'),
            ];
            $confirmed = $this->update_attendance($arr, $payload['table_pk']);
            $notif_arr = [
               "sender_pk"   => $_SESSION['pk'],
               "receiver_pk" => $confirmed['account_pk'],
               "subject_pk"  => $_SESSION['pk'],
               "caption"     => $caption . ' your Sunday Celebration Attendance',
               "action"      => 'NONE',
               "table_pk"    => $payload['table_pk']
            ];
            $notif_model->create_notification($notif_arr);
         } else {
            $confirmed = $db->update("Delete from {$this->base_table} where id = ?", [$payload['table_pk']]);
            $deleted = $db->update("Delete from bro_notifications where id = ?", [$payload['id']]);
         }
      } catch (\Throwable $th) {
         $completed = false;
      }



      return $completed;
   }

   public function remove_attendance($id = null)
   {
      global $db, $common;
      $tobe_deleted = $this->get_attendance($id);
      $deleted      = $db->delete("DELETE FROM {$this->base_table} WHERE id = {$id}");
      return $deleted ? $tobe_deleted : false;
   }
}

$attendance_model = new AttendanceModel();
