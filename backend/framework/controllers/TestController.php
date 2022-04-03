<?php
include_once "../Models/TestModel.php";

$act = !empty($_GET['action']) ? $_GET['action'] : "";

switch ($act) {
    case 'add':
            echo json_encode($test_model->test_insert($_POST));
            exit;
        break;
    case 'update':
            echo json_encode($test_model->test_update($_POST, $_GET['id']));
            exit;
        break;
    case 'delete':
            echo json_encode($test_model->test_delete($_GET['id']));
            exit;
        break;
    default:
        # code...
        break;
}