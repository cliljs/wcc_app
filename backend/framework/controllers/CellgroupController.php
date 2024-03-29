<?php

include_once '../models/CellgroupModel.php';

$act = !empty($_GET['action']) ? $_GET['action'] : '';

switch ($act) {
    case 'add_cell':
        echo json_encode(
            $common->create_response(
                'CellgroupController/action=add_cell',
                $cellgroup_model->create_cellgroup($_POST),
                1
            )
        );
        break;

    case 'update_cell':
        echo json_encode(
            $common->create_response(
                'CellgroupController/action=update_cell',
                $cellgroup_model->update_cell_data($_GET['id'], $_POST),
                1
            )
        );
        break;

    case 'remove_cell':
        echo json_encode(
            $common->create_response(
                'CellgroupController/action=remove_cell',
                $cellgroup_model->remove_cell_data($_GET['id']),
                1
            )
        );
        break;

    case 'get_cell_list':
        echo json_encode(
            $common->create_response(
                'CellgroupController/action=get_cell_list',
                $cellgroup_model->get_cell_list($_GET),
                1
            )
        );
        break;
    case 'admin_cellgroup':
        echo json_encode(
            $common->create_response(
                'CellgroupController/action=admin_cellgroup',
                $cellgroup_model->admin_cellgroup($_GET['year']),
                1
            )
        );
        break;
    case 'get_cell_data':
        echo json_encode(
            $common->create_response(
                'CellgroupController/action=get_cell_data',
                $cellgroup_model->get_cell_data($_GET['id']),
                1
            )
        );
        break;
    case 'get_other_names':
        echo json_encode(
            $common->create_response(
                "CellgroupController.php/?action=get_other_names",
                $cellgroup_model->get_other_names(),
                1
            )
        );
        break;
    default:
        # code...
        break;
}
