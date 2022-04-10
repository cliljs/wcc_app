<?php

include_once '../Models/SuperAdminModel.php';

$act = !empty($_GET['action']) ? $_GET['action'] : '';

switch ($act) {
    case 'get_leaders':
        $get_leaders  = $admin_model->get_leaders();
        $response    = $common->create_response("SuperAdminController/action=get_leaders");

        if (@$new_leader['error']) {
            $response['msg'] = $get_leaders['msg'];

        } else {
            $response['data']    = $get_leaders;
            $response['success'] = 1;
        }

        echo json_encode($response);
        break;
    case 'create_leader':
        $new_leader  = $admin_model->create_leader($_POST);
        $response    = $common->create_response("SuperAdminController/action=create_leader");

        if (@$new_leader['error']) {
            $response['msg'] = $new_leader['msg'];

        } else {
            $response['data']    = $new_leader;
            $response['success'] = 1;
        }

        echo json_encode($response);
        break;
    
    case 'verify_member':
        $verified_member  = $admin_model->verify_member($_POST['id']);

        echo json_encode(
            $common->create_response("SuperAdminController/action=verify_member", $verified_member, 1)
        );
        break;
        
    case 'assign_leader':
        $new_leader  = $admin_model->assign_leader($_POST['id']);

        echo json_encode(
            $common->create_response("SuperAdminController/action=assign_leader", $new_leader, 1)
        );
        break;
 
    case 'get_pending':
        echo json_encode(
            $common->create_response("SuperAdminController/action=assign_leader", $admin_model->get_pending_list(), 1)
        );
        break;
 
    default:
        break;
}