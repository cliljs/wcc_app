<?php
require_once '../../autoload.php';
class Helpers
{

  public function get_notif_details($table_pk)
  {
    global $db;
    return $db->get_row("Select n.sender_pk,n.receiver_pk,n.subject_pk,
    (Select CONCAT(firstname,' ',middlename,' ',lastname) from bro_accounts where id = n.receiver_pk) as receiver_name,
    (Select CONCAT(firstname,' ',middlename,' ',lastname) from bro_accounts where id = n.sender_pk) as sender_name,
    (Select CONCAT(firstname,' ',middlename,' ',lastname) from bro_accounts where id = n.subject_pk) as subject_name 
    from bro_notifications n 
    where n.id = ?;", [$table_pk]);
  }
  public function get_fullname_id($user_pk)
  {
    global $db;
    return $db->get_row("Select CONCAT(firstname,' ',middlename,' ',lastname) as fullname from bro_accounts where id = ?", [$user_pk]);
  }
  public function get_insert_fields($arr)
  {
    $columns = "(" . implode(",", array_keys($arr)) . ")";
    $values  = implode(',', str_split(str_repeat("?", count($arr))));
    return "{$columns} VALUES ({$values})";
  }

  public function get_update_fields($arr)
  {
    $values =  implode("= ?,", array_keys($arr)) . '= ?';
    return "SET {$values}";
  }

  public function generate_random()
  {
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex(random_bytes(16)), 4));
  }

  public function get_array_key($arry, $find = null)
  {
    foreach ($arry as $key => $arr) {
      if ($key === $find) return $key;
    }
  }

  public function fn_print_die($string)
  {
    echo "<pre>";
    print_r($string);
    echo "</pre>";
    exit;
  }

  public function create_response($action = null, $data = null, $success = null)
  {
    return [
      "action"  => $action,
      "data"    => $data,
      "success" => $success,
    ];
  }
  function getSundays($y, $m)
  {
    $date = "$y-$m-01";
    $first_day = date('N', strtotime($date));
    $first_day = 7 - $first_day + 1;
    $last_day =  date('t', strtotime($date));
    $days = array();
    for ($i = $first_day; $i <= $last_day; $i = $i + 7) {
      $days[] = $i;
    }
    return  $days;
  }
  // FOR $_FILES UPLOAD
  public function upload($pk = null, $file = [])
  {
    // for now eto muna yung file path
    $uploadDirectory = UPLOAD_PATH .  "/images/";

    $errors = [];
    $path_parts = pathinfo($file['name']);

    $fileName      = $file['name'];
    $fileSize      = $file['size'];
    $fileTmpName   = $file['tmp_name'];
    $tick          = strtotime(date('Y-m-d H:i:s'));

    $uploadPath = $uploadDirectory . $pk . '_' . $tick . '.' . $path_parts['extension'];
    $filename_larns = $pk . '_' . $tick . '.' . $path_parts['extension'];
    if ($fileSize > 4000000) {
      $errors['has_error'] = 1;
      $errors['msg']       = "File exceeds maximum size (4MB)";

      return $errors;
    }

    $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

    if ($didUpload) {
      return $filename_larns;
    } else {
      return [
        "has_error" => true,
        "msg"       => "Something went wrong on File Upload"
      ];
    }
  }

  // FOR BASE 64 UPLOADS
  public function upload_new($upload_type = null, $file = [])
  {
    $decoded_base64 = base64_decode($file['file_temp']);
    $tick           = strtotime(date('Y-m-d H:i:s'));
    $file_name      = null;
    $original_path  = null;

    if ($upload_type === 'files') {
      $file_name     = "files/{$file['file_name']}_{$tick}.{$file['ext']}";
      $original_path = UPLOAD_PATH . $file_name;
    } else {
      $file_name     = "/images/{$file['file_name']}_{$tick}.{$file['ext']}";
      $original_path = UPLOAD_PATH . $file_name;
    }

    $file_size     = file_put_contents($original_path, $decoded_base64);

    return [
      "filename"       => $file_name,
      "filesize"       => $file_size,
      "created_by"     => $file['user_id'],
      "date_created"   => date('Y-m-d H:i:s'),
      "file_link"      => $file_name,
      "timestamp_tick" => $tick,
    ];
  }
}

$common = new Helpers();
