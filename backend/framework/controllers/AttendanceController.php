<?php
include_once '../models/AttendanceModel.php';

$act = !empty($_GET['action']) ? $_GET['action'] : '';

switch ($act) {
    case 'create_attendance':
        
       echo json_encode(
           $common->create_response(
               'AttendanceController.php/?action=create_attendance',
               $attendance_model->create_attendance($_POST),
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
    
    default:
        # code...
        break;
}