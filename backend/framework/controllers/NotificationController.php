<?php

include_once '../models/NotificationModel.php';

$act = !empty($_GET['action']) ? $_GET['action'] : '';

switch ($act) {
    case 'get_user_notifications':
        echo json_encode(
            $common->create_response(
                "NotificationController.php/?action=get_user_notifications",
                $notif_model->get_notification_list(),
                1
            )
        );
        break;
    
    default:
        # code...
        break;
}