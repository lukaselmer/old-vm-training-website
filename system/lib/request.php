<?php

session_start();

$action_name = sizeof($_REQUEST['action']) != 0 ? $_REQUEST['action'] : 'home';
$action_name = str_replace(".", "", $action_name);
$action_name = str_replace("/", "", $action_name);
$action_name = str_replace(" ", "", $action_name);
$action_name = str_replace(";", "", $action_name);
$action_name = str_replace(",", "", $action_name);
$_REQUEST['action'] = $action_name;

include('system/helpers/application_helper.php');

ob_start();
include('system/sites/' . $action_name . '.php');
$content = ob_get_contents();
ob_end_clean();

include("system/layouts/layout.php");
?>
