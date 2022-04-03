<?php
include_once '../models/AccountModel.php';

$act = !empty($_GET['action']) ? $_GET['action'] : '';

switch ($act) {
    case 'create_account':
        $new_account = $account_model->create_account($_POST);
        $response    = $common->create_response("AccountController/action=create_account");

        if (@$new_account['error']) {
            $response['msg'] = $new_account['msg'];

        } else {
            $response['data']    = $new_account;
            $response['success'] = 1;
        }

        echo json_encode($response);
        break;

    case 'get_account_profile':
        $account = $account_model->get_account_details($_GET['id']);
        
        echo json_encode(
            $common->create_response("AccountController/action=get_account_profile", $account, 1)
        );
        break;

    case 'update_account':
        $updated_account = $account_model->update_account($_POST, $_GET['id']);

        echo json_encode(
            $common->create_response("AccountController/action=update_account", $updated_account, 1)
        );
        break;

    case 'delete_account':
        $deleted_account = $account_model->delete_account($_GET['id']);

        echo json_encode(
            $common->create_response("AccountController/action=delete_account", $deleted_account, 1)
        );
        break;

    default:
        break;
}