<?php

include_once '../Models/SuperAdminModel.php';

$act = !empty($_GET['action']) ? $_GET['action'] : '';

switch ($act) {

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
    case 'remove_admin':

        echo json_encode(
            $common->create_response("SuperAdminController/action=remove_admin", $admin_model->remove_admin($_POST), 1)
        );
        break;
    case 'get_pending':
        echo json_encode(
            $common->create_response("SuperAdminController/action=assign_leader", $admin_model->get_pending_list(), 1)
        );
        break;
    case 'get_admins':
        echo json_encode(
            $common->create_response("SuperAdminController/action=get_admins", $admin_model->get_admins(), 1)
        );
        break;
    case 'get_members':
        echo json_encode(
            $common->create_response("SuperAdminController/action=get_members", $admin_model->get_members(), 1)
        );
        break;
    case 'get_assignee':
        echo json_encode(
            $common->create_response("SuperAdminController/action=get_assignee", $admin_model->get_assignee($_POST), 1)
        );
        break;
    case 'validate_user':
        echo json_encode(
            $common->create_response("SuperAdminController/action=validate_user", $admin_model->validate_user($_GET['id']), 1)
        );
        break;
    default:
        break;
}
