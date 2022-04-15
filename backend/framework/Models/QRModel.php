<?php

require_once '../../autoload.php';

class QRModel {
    private $base_table = 'bro_qr';

    public function validate_qr($qr = null)
    {
        global $db, $common;
        $result = $db->get_row("SELECT * FROM {$this->base_table} WHERE qr_code = ?", [$qr]);
        return !empty($result);
    }

    public function get_qr_details($pk = null)
    {
        global $db, $common;
        return $db->get_row("SELECT * FROM {$this->base_table} WHERE id = ?", [$pk]);
    }

    public function get_qr_lists()
    {
        global $db, $common;
        return $db->get_list("SELECT * FROM {$this->base_table}");
    }

    public function create_qr()
    {
        global $db, $common;
        $arr = [
            "qr_code"    => $this->generate_qr(),
            "branch"     => $_SESSION['branch'],
            "created_by" => $_SESSION['login_name'] 
        ];
        $fields = $common->get_insert_fields($arr);
        $last_id = $db->insert("INSERT INTO {$this->base_table} {$fields}", array_values($arr));
        return $this->get_qr_details($last_id);
    }

    private function generate_qr()
    {
        global $common;
        return strtotime(date('Y-m-d H:i:s')) . $_SESSION['branch'] . '_' . $common->generate_random();
    }

    public function update_qr($pk)
    {
        global $db, $common;
        $updated = $db->update("UPDATE {$this->base_table} SET qr_code = ? WHERE id = {$pk}", [$this->generate_qr()]);
        return $updated ? $this->get_qr_details($pk): false;
    }
}

$qr_model = new QRModel();