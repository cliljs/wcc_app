<?php

include_once '../models/EnrollmentModel.php';

$act = !empty($_GET['action']) ? $_GET['action'] : '';

switch ($act) {
    case 'create_enrollment':
        echo json_encode(
            $common->create_response(
                "EnrollmentController.php/?action=create_enrollment",
                $enroll_model->create_enrollment($_POST),
                1
            )
        );
        break;
    
    case 'update_enrollment':
        echo json_encode(
            $common->create_response(
                "EnrollmentController.php/?action=update_enrollment",
                $enroll_model->update_enrollment($_GET['id'], $_POST),
                1
            )
        );
        break;
    
    case 'remove_enrollment':
        echo json_encode(
            $common->create_response(
                "EnrollmentController.php/?action=remove_enrollment",
                $enroll_model->remove_enrollment($_GET['id']),
                1
            )
        );
        break;
    
    case 'get_enrollment':
        echo json_encode(
            $common->create_response(
                "EnrollmentController.php/?action=get_enrollment",
                $enroll_model->get_enrollment_details($_GET['id']),
                1
            )
        );
        break;
    
    case 'get_enrollment_list':
        echo json_encode(
            $common->create_response(
                "EnrollmentController.php/?action=get_enrollment_list",
                $enroll_model->get_enrollment_list(),
                1
            )
        );
        break;

    case 'get_enrollment_list':
        echo json_encode(
            $common->create_response(
                "EnrollmentController.php/?action=get_enrollment_list",
                $enroll_model->get_enrollment_list(),
                1
            )
        );
        break;
    
    case 'approve_enrollment':
        echo json_encode(
            $common->create_response(
                "EnrollmentController.php/?action=approve_enrollment",
                $enroll_model->approve_user($_GET['id']),
                1
            )
        );
        break;
    
    default:
        break;
}