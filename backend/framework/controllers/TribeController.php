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
                "TribeController.php/?action=get_leader_names",
                $tribe_model->get_leader_names($_GET),
                1
            )
        );
        break;
    case 'get_inviter_names':
        echo json_encode(
            $common->create_response(
                "TribeController.php/?action=get_inviter_names",
                $tribe_model->get_inviter_names($_POST),
                1
            )
        );
        break;

    case 'get_disciples':
        echo json_encode(
            $common->create_response(
                "TribeController.php/?action=get_disciples",
                $tribe_model->get_disciples($_GET),
                1
            )
        );
        break;

    case 'transfer_disciple':
        echo json_encode(
            $common->create_response(
                "TribeController.php/?action=transfer_disciple",
                $tribe_model->transfer_disciple($_GET['pk'], $_POST),
                1
            )
        );
        break;

    default:
        # code...
        break;
}
