<?php
include_once '../models/SchoolingModel.php';

$act = !empty($_GET['action']) ? $_GET['action'] : '';

switch ($act) {
    case 'get_user_schooling':
        echo json_encode(
            $common->create_response(
                "SchoolingController.php/?action=get_user_schooling",
                $school_model->get_user_schooling($_POST),
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

    case 'confirm_schooling':
        echo json_encode(
            $common->create_response(
                "SchoolingController.php/?action=confirm_schooling",
                $school_model->confirm_attendance($_GET['pk']),
                1
            )
        );
        break;

    case 'schooling_attendance':
        echo json_encode(
            $common->create_response(
                "SchoolingController.php/?action=schooling_attendance",
                $school_model->update_schooling($_GET['id'], $_POST),
                1
            )
        );
        break;

    case 'approve_schooling':
        echo json_encode(
            $common->create_response(
                "SchoolingController.php/?action=approve_schooling",
                $school_model->approve_schooling($_POST),
                1
            )
        );
        break;
    default:
        # code...
        break;
}
