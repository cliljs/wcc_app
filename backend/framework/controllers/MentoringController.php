<?php
include_once '../models/MentoringModel.php';

$act = !empty($_GET['action']) ? $_GET['action'] : '';

switch ($act) {
    case 'get_mentoring':
        echo json_encode(
            $common->create_response(
                "MentoringController.php/?action=get_mentoring",
                $mentoring_model->get_mentoring($_GET),
                1
            )
        );
        break;

    case 'create_mentoring':
        echo json_encode(
            $common->create_response(
                "MentoringController.php/?action=create_mentoring",
                $mentoring_model->create_mentoring($_POST),
                1
            )
        );
        break;

    case 'remove_mentoring':
        echo json_encode(
            $common->create_response(
                "MentoringController.php/?action=remove_mentoring",
                $mentoring_model->remove_mentoring($_GET['pk']),
                1
            )
        );
        break;

    default:
        # code...
        break;
}
