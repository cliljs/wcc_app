<?php
include_once '../models/AccountModel.php';

$act = !empty($_GET['action']) ? $_GET['action'] : '';

switch ($act) {
    case 'create_account':
        $new_account = $account_model->create_account($_POST, $_FILES);
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
        $account = $account_model->get_account_details();
        $account['birthdate'] = date("F j, Y", strtotime($account['birthdate']));
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
    
    case 'account_login': 
        $auth_user = $account_model->login($_POST);
        $response  = $common->create_response("AccountController/action=account_login");

        if (@$auth_user['error']) {
            $response['msg'] = $auth_user['msg'];
        } else {
            $response['data']    = $auth_user;
            $response['success'] = 1;
        }

        echo json_encode($response);
        break;

    case 'account_logout': 
        $response  = $common->create_response(
            "AccountController/action=account_logout",
            session_destroy(),
            1
        );

        echo json_encode($response);
        break;
        
    default:
        break;
}