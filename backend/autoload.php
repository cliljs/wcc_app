<?php
session_start();

define('CONTROLLER_PATH', rtrim(preg_replace('#[/\\\\]{1,}#', '/', realpath(dirname(__FILE__))), '/') . '/framework/controllers/');
define('DB_PATH', rtrim(preg_replace('#[/\\\\]{1,}#', '/', realpath(dirname(__FILE__))), '/') . '/framework/controllers/DatabaseController.php');
define('MODEL_PATH', rtrim(preg_replace('#[/\\\\]{1,}#', '/', realpath(dirname(__FILE__))), '/') . '/framework/models/');
define('UPLOAD_PATH', rtrim(preg_replace('#[/\\\\]{1,}#', '/', realpath(dirname(__FILE__))), '/') . '/framework/uploads/');
define('ENVIRONMENT', 'DEV');
date_default_timezone_set('Asia/Manila');
// DEPENDENCIES
include_once DB_PATH;
include_once CONTROLLER_PATH . 'HelperController.php';
$db = new DatabaseController();

// SERVES REQUEST CONTROLLER
$request_controller = basename(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));

if (file_exists(CONTROLLER_PATH . $request_controller)) {
    include_once  CONTROLLER_PATH .  $request_controller; 
} 
//$_SESSION['pk'] = 1;
// $common->fn_print_die($_SESSION);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);