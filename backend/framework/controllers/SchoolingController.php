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

    case 'get_schooling_details':
        echo json_encode(
            $common->create_response(
            "SchoolingController.php/?action=get_schooling_details",
             $school_model->get_schooling_details($_GET['pk']),
             1
            )
        );
        break;
    
    case 'create_schooling':
        echo json_encode(
            $common->create_response(
            "SchoolingController.php/?action=create_schooling",
             $school_model->create_schooling($_POST),
             1
            )
        );
        break;    
    
    case 'cofirm_schooling':
        echo json_encode(
            $common->create_response(
            "SchoolingController.php/?action=cofirm_schooling",
             $school_model->confirm_attendance($_GET['pk']),
             1
            )
        );
        break;
    
    default:
        # code...
        break;
}