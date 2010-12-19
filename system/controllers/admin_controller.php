<?php

class AdminController extends ApplicationController {

    function before_filter() {
        if ($_SESSION['authenticated'] != true) {
            if ($_REQUEST['action'] != 'login') {
                redirect_to('admin', 'login');
            }
        }
    }

    function login() {
        if (sizeof($_REQUEST['login']) > 0) {
            if ($_REQUEST['login'] == "vmtraining" && $_REQUEST['loginp'] == "sport") {
                $_SESSION['authenticated'] = true;
                redirect_to('admin', 'index');
            }
            $this->error = "Anmeldung fehlgeschlagen";
        } else {

        }
    }

    function index() {
        $this->cms_contents = $this->DB->select("select * from cms_content order by cms_key ASC");
    }

    function nnew() {
        $this->event = Array();
    }

    function create() {
        $event_params = $_REQUEST['event'];
        foreach ($event_params as $i => $param) {
            $event_params[$i] = str_replace('"', '&quot;', $param);
        }
        $inserted_id = $this->DB->insert("INSERT INTO `events` (
`title` ,
`school_id` ,
`event_type_id` ,
`event_date`,
`time`,
`place`,
`hidden`
)
VALUES (
\"" . $event_params['title'] . "\",
\"" . $event_params['school_id'] . "\",
\"" . $event_params['event_type_id'] . "\",
\"" . $event_params['event_date'] . "\",
\"" . $event_params['time'] . "\",
\"" . $event_params['place'] . "\",
\"" . $event_params['hidden'] . "\"
);");
        redirect_to('admin', 'index', Array('open' => $inserted_id));
    }

    function edit() {
        $this->event = $this->DB->select_by_id("events", $_REQUEST['id']);
    }

    function update() {
        $event_params = $_REQUEST['event'];
        foreach ($event_params as $i => $param) {
            $event_params[$i] = str_replace('"', '&quot;', $param);
        }
        $this->DB->query("UPDATE `events` SET
`title` = \"" . $event_params['title'] . "\",
`school_id` = \"" . $event_params['school_id'] . "\",
`event_type_id` = \"" . $event_params['event_type_id'] . "\",
`event_date` = \"" . $event_params['event_date'] . "\",
`time` = \"" . $event_params['time'] . "\",
`place` = \"" . $event_params['place'] . "\",
`hidden` = \"" . $event_params['hidden'] . "\"
WHERE `id` = " . intval($event_params['id']) . " LIMIT 1 ;
");
        redirect_to('admin');
    }

    function destroy() {
        $event_id = $_REQUEST['id'];
        $this->DB->query("UPDATE `events` SET `deleted` = \"1\" WHERE `id` = " . intval($event_id) . " LIMIT 1;");
        redirect_to('admin');
    }

    function edit_cms_content() {
        $key = $_REQUEST['id'];
        $this->cms_content = $this->DB->select_by_attribute("cms_content", "cms_key", $key);
    }

    function update_cms_content() {
        $key = $_REQUEST['id'];
        $params = $_REQUEST['cms_content'];
        foreach ($params as $i => $param) {
            $params[$i] = str_replace('"', '&quot;', $param);
        }
        $this->cms_content = $this->DB->select_by_attribute("cms_content", "cms_key", $key);
        $this->DB->query("UPDATE `cms_content` SET
`content` = \"" . $params['content'] . "\"
WHERE `id` = " . $this->cms_content->id . " LIMIT 1 ;
");
        //redirect_to('admin');
        redirect_to('home', 'cms_content', Array("id" => $key));
    }

    function backup() {
        $this->backup_dir = BASE_DIR . SYSTEM_SLASH . "backup" . SYSTEM_SLASH . $this->backup_dir . date("Y-m-d_G-i-s");
        mkdir($this->backup_dir);
        chmod($this->backup_dir, 0775);

        $this->csv_exports = Array();
        $res_tables = $this->DB->query("show tables;");

        while ($row_table = mysql_fetch_array($res_tables)) {
            $table = $row_table[0];
            $this->csv_exports[$table] = Array();
            $this->csv_exports[$table][0] = Array();
            $res_fields = $this->DB->query("show columns from $table");
            while ($row_field = mysql_fetch_row($res_fields)) {
                $this->csv_exports[$table][0][] = $row_field[0];
            }

            $fields = implode(",", $this->csv_exports[$table][0]);
            $res_objects = $this->DB->query("select $fields from $table");
            while ($row_object = mysql_fetch_row($res_objects)) {
                $this->csv_exports[$table][] = $row_object;
            }
        }
    }

}

?>
