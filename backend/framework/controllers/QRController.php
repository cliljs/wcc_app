<?php

include_once '../models/QRModel.php';

$act = !empty($_GET['action']) ? $_GET['action'] : '';

switch ($act) {
    case 'add_qr':
        echo json_encode(
            $common->create_response(
                "QRController.php/?action=add_qr",
                $qr_model->create_qr(),
                1
            )
        );
        break;
    
    case 'update_qr':
        echo json_encode(
            $common->create_response(
                "QRController.php/?action=update_qr",
                $qr_model->update_qr($_GET['id']),
                1
            )
        );
        break;
    
    case 'get_qr_details':
        echo json_encode(
            $common->create_response(
                "QRController.php/?action=get_qr_details",
                $qr_model->get_qr_details($_GET['id']),
                1
            )
        );
        break;
    
    case 'get_qr_list':
        echo json_encode(
            $common->create_response(
                "QRController.php/?action=get_qr_list",
                $qr_model->get_qr_lists(),
                1
            )
        );
        break;
    
    default:
        # code...
        break;
}
