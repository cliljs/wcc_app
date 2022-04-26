<?php
include_once '../models/AttendanceModel.php';
include_once '../models/InviteModel.php';

$act = !empty($_GET['action']) ? $_GET['action'] : '';

switch ($act) {
    case 'create_attendance':
        $valid = $attendance_model->create_attendance($_POST);
        if($valid){
            $new_invite =  $invite_model->create_invite($_POST);
        } else{
            $new_invite = false;
        }
        echo json_encode(
            $common->create_response(
                'AttendanceController.php/?action=create_attendance',
                $new_invite,
                1
            )
        );
        break;

    case 'update_attendance':
        echo json_encode(
            $common->create_response(
                'AttendanceController.php/?action=update_attendance',
                $attendance_model->update_attendance($_POST, $_GET['id']),
                1
            )
        );
        break;
 
    case 'approve_attendance':
        echo json_encode(
            $common->create_response(
                'AttendanceController.php/?action=update_attendance',
                $attendance_model->approve_attendance($_GET['id']),
                1
            )
        );
        break;
 
    case 'remove_attendance':
        echo json_encode(
            $common->create_response(
                'AttendanceController.php/?action=remove_attendance',
                $attendance_model->remove_attendance($_GET['id']),
                1
            )
        );
        break;

    case 'get_attendance_details':
        echo json_encode(
            $common->create_response(
                'AttendanceController.php/?action=get_attendance_details',
                $attendance_model->get_attendance($_GET['id']),
                1
            )
        );
        break;

    case 'get_attendance_list':
        echo json_encode(
            $common->create_response(
                'AttendanceController.php/?action=get_attendance_list',
                $attendance_model->get_attendance_list($_GET['year']),
                1
            )
        );
        break;

    case 'get_disciple_attendance':
        echo json_encode(
            $common->create_response(
                'AttendanceController.php/?action=get_disciple_attendance',
                $attendance_model->get_disciple_attendance($_GET['year']),
                1
            )
        );
        break;

    case 'render_table':
        echo json_encode(
            $common->create_response(
                'AttendanceController.php/?action=render_table',
                $attendance_model->render_table($_GET['year']),
                1
            )
        );
        break;
    default:
        # code...
        break;
}
