<?php

require_once '../../autoload.php';
require_once MODEL_PATH . 'NotificationModel.php';

class AttendanceModel
{
   private $base_table = 'bro_attendance';

   public function create_attendance()
   {
      global $db, $common;
      $arr = [
         "sunday_date" => date('Y-m-d'),
         "account_pk"  => $_SESSION['pk'],
      ];
      //add dito ng route ng invites
      $fields = $common->get_insert_fields($arr);
      return $db->insert("INSERT INTO {$this->base_table} {$fields}", array_values($arr));
   }

   //  GET INFORMATION OF SINGLE ATTENDANCE
   public function get_attendance($id = null)
   {
      global $db, $common;
      return $db->get_row("SELECT * FROM {$this->base_table} WHERE id = ?", [$id]);
   }

   //  ATTENDANCE LIST
   public function get_attendance_list($year)
   {
      global $db, $common;
      return $db->get_list(
         "SELECT * FROM {$this->base_table} 
          WHERE YEAR(sunday_date) = ? AND account_pk = ?",
         [$year, $_SESSION['pk']]
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

   public function approve_attendance($pk)
   {
      global $db, $common, $notif_model;
      $arr = [
         "confirmed_by" => $_SESSION['pk'],
         "date_confirmed" => date('Y-m-d'),
      ];
      $confirmed = $this->update_attendance($arr, $pk);
      $notif_arr = [
         "sender_pk"   => $_SESSION['pk'],
         "receiver_pk" => $confirmed['account_pk'],
         "subject_pk"  => $confirmed['account_pk'],
         "caption"     => !empty($payload['caption']) ? $payload['caption'] : null,
         "action"      => 'ATTENDANCE',
     ];
     $notif_model->create_notification($notif_arr);
     return $confirmed;
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
