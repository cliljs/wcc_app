<?php

require_once '../../autoload.php';
require_once MODEL_PATH . 'SchoolingModel.php';

class EnrollmentModel {
    private $base_table = 'bro_enrollment';

    public function create_enrollment($payload = [])
    {
        global $db, $common;

        $arr = [
            "lesson_type" => $payload['lesson_type'],
            "user_pk"     => $_SESSION['pk']
        ];
        $fields  = $common->get_insert_fields($arr);
        $last_id = $db->insert("INSERT INTO {$this->base_table} {$fields}", array_values($arr));
        return $this->get_enrollment_details($last_id);
    }

    public function get_enrollment_details($pk = null)
    {
        global $db, $common;
        return $db->get_row("SELECT * FROM {$this->base_table} WHERE id = ?", [$pk]);
    }

    // for auth user
    public function get_enrollment_list()
    {
        global $db, $common;
        return $db->get_list("SELECT * FROM {$this->base_table} WHERE user_pk = ?", [$_SESSION['pk']]);
    }

    public function update_enrollment($pk, $payload = [])
    {
        global $db, $common;
        $update_fields = $common->get_update_fields($payload);
        $updated       = $db->update("UPDATE {$this->base_table} {$update_fields} WHERE id = {$pk}", array_values($payload));
        return $updated ? $this->get_enrollment_details($pk) : false;
    }

    public function remove_enrollment($pk = null)
    {
        global $db, $common;
        $tobe_deleted = $this->get_enrollment_details($pk);
        $deleted      = $db->update("DELETE FROM {$this->base_table} WHERE id = ?", [$pk]);
        return $deleted ? $tobe_deleted : false;
    }

    public function approve_user($pk = null)
    {
        global $db, $common, $school_model;
        $is_approved = $this->update_enrollment($pk, 
                                                [
                                                    'date_approved' => strtotime(date('Y-m-d H:i:s'))
                                                ]
                                            );
        if (!empty($is_approved)) {
           $lessons =  $db->get_list("SELECT id as lesson_pk FROM bro_lessons WHERE lesson_type = ?", [$is_approved['lesson_type']]);
           foreach ($lessons as $key => $lesson) {
             $school_model->create_schooling($lesson);      
           }
        }
        return true;
    }
}

$enroll_model = new EnrollmentModel();