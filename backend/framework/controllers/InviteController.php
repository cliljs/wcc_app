<?php

include_once '../models/InviteModel.php';

$act = !empty($_GET['action']) ? $_GET['action'] : '';

switch ($act) {
    case 'create_invite':
        $json        = json_decode(file_get_contents('php://input'), true);
        $new_invites = $invite_model->create_invite($json);
        $response    = $common->create_response('InviteController.php/action=create_invite');

        if (@$new_invites['error']) {
            $response['msg'] = $new_invites['msg'];
        } else {
            $response['data']    =  $new_invites;
            $response['success'] =  1;
        }

        echo json_encode($response);
        break;

    case 'get_invite_list':
        echo json_encode(
            $common->create_response(
                "InviteController.php/action=get_invite_list",
                $invite_model->get_invite_list(),
                1
            )
        );
        break;
    
    case 'get_invite_details':
        echo json_encode(
            $common->create_response(
                "InviteController.php/action=get_invite_list",
                $invite_model->get_invite_details($_GET['id']),
                1
            )
        );
        break;
    
    default:
        break;
}