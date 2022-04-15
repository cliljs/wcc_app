<?php
include_once '../models/SchoolingModel.php';

$act = !empty($_GET['action']) ? $_GET['action'] : '';

switch ($act) {
    case 'get_user_schooling':
        echo json_encode(
            $common->create_response(
            "SchoolingController.php/?action=get_user_schooling",
             $school_model->get_user_schooling(),
             1
            )
        );
        break;
    
    default:
        # code...
        break;
}