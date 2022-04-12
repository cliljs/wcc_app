<?php

include_once '../models/TribeModel.php';

$act = !empty($_GET['action']) ? $_GET['action'] : '';

switch ($act) {
    case 'tribe_names':
        echo json_encode(
            $common->create_response(
                "TribeController.php/?action=tribe_names",
                $tribe_model->get_leader_names(),
                1
            )
        );
        break;

    case 'tribe_pending_disciples':
        echo json_encode(
            $common->create_response(
                "TribeController.php/?action=tribe_pending_disciples",
                $tribe_model->get_pending_disciple(),
                1
            )
        );
        break;

    case 'tribe_approve_disciple':
        echo json_encode(
            $common->create_response(
                "TribeController.php/?action=tribe_approve_disciple",
                $tribe_model->approve_disciple($_POST, $_GET['id']),
                1
            )
        );
        break;
    case 'get_leader_names':
        echo json_encode(
            $common->create_response(
                "TribeController.php/?action=tribe_approve_disciple",
                $tribe_model->get_leader_names(),
                1
            )
        );
        break;
    default:
        # code...
        break;
}
