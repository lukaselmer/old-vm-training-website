<?php

session_start();

$action_name = sizeof($_REQUEST['action']) != 0 ? $_REQUEST['action'] : 'home';
$action_name = str_replace(".", "", $action_name);
$action_name = str_replace("/", "", $action_name);
$action_name = str_replace("\\", "", $action_name);
$action_name = str_replace(" ", "", $action_name);
$action_name = str_replace(";", "", $action_name);
$action_name = str_replace(",", "", $action_name);
$_REQUEST['action'] = $action_name;
$_REQUEST['ln'] = ($_REQUEST['ln'] == 'en' ? 'en' : ($_REQUEST['ln'] == 'de' ? 'de' : (substr($_SERVER["HTTP_ACCEPT_LANGUAGE"], 0, 2) == 'en' ? 'en' : 'de')));
include('system/helpers/application_helper.php');
include('system/controllers/application_controller.php');
include('system/lib/models/db.php');

if ($_REQUEST['controller'] == 'admin') {
    include('system/controllers/admin_controller.php');
    $controller = new AdminController();
    global $controller;
    $controller->$action_name();
} else {
    global $DB;
    $cms_content = $DB->select_by_attribute("cms_content", "cms_key", $action_name . "_" . $_REQUEST['ln']);
}

ob_start();

$template_name = 'system/sites/' . (($_REQUEST['controller'] == 'admin') ? "admin" : $_REQUEST['ln']) . '/' . $action_name . '.php';
if (!@include($template_name)) {
    echo "<h1>Seite nicht gefunden / Page not found</h1><a href=\"/\">Zur Startseite / To the home page</a>";
}
$content = ob_get_contents();
ob_end_clean();

include("system/layouts/layout.php");
?>
