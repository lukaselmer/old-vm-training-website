<?php

function cms_content() {
    global $cms_content;
    include "system/sites/shared/cms_content.php";
}

function contact_form() {
    check_contact_form();
    include "system/sites/shared/contact.php";
}

function check_contact_form() {
    if ($_REQUEST['send'] == "1") { //If form filled out...
        $_REQUEST['error'] = "";
        $fields = Array('first_name', 'last_name', 'street', 'place', 'email', 'phone', 'subject', 'training_wishes', 'remarks');
        foreach ($fields as $f) {
            $$f = $_REQUEST[$f];
        }
        echo $first_name;

        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $subject = $_REQUEST['subject'];
        $message = $_REQUEST['message'];
        //check form imput
        if (strlen($first_name) == 0) {
            $_REQUEST['error'] = "Bitte geben Sie einen Vornamen an.";
            return;
        }
        if (strlen($last_name) == 0) {
            $_REQUEST['error'] = "Bitte geben Sie einen Nachnamen an.";
            return;
        }
        if (strlen($phone) < 10 && !valid_email($email)) {
            $_REQUEST['error'] = "Bitte geben Sie eine gültige Email Adresse oder eine gültige Telefonnummer an.";
            return;
        }

        $_REQUEST['send_success'] = true;
        $email_body = "";
        foreach ($fields as $f) {
            $email_body .= $f . ": " . $$f . "\n";
        }
        $email_body .= "Datum / Zeit: " . date("d.m.Y H:i");

        try {
            if (!@mail('lukas.elmer@gmail.com, admin@elmermx.ch', "Kontaktformular VM Training", $email_body)) {
                $_REQUEST['error'] = "Email konnte nicht gesendet werden.";
                $_REQUEST['send_success'] = false;
            }
        } catch (Exception $e) {
            $_REQUEST['error'] = "Email konnte nicht gesendet werden: $e";
            $_REQUEST['send_success'] = false;
        }
    }
}

function valid_email($email) {
    if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email)) {
        //list($username,$domain)=split('@',$email);
        return true;
    }
    return false;
}

function is_authenticated() {

    return $_SESSION['authenticated'] == true;
}

function authenticate($entered_username = '', $entered_password = '') {
    if ($_SESSION['authenticated']) {
        return true;
    }
    $users = Array('admin' => '9796f1274956a1a89101e9606caf286d', 'lukas.elmer' => '8ed27776e8764c912486b7a2a592ace9');
    foreach ($users as $username => $password) {
        if ($entered_username == $username && md5($username . $entered_password) == $password) {
            $_SESSION['authenticated'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            return true;
        }
    }
    return false;
}

function mouseover_hover() {
    echo ' onmouseover="$(this).addClassName(\'hover\'); return false;" onmouseout="$(this).removeClassName(\'hover\'); return false;"
        onclick="location.href=$(this).down(); return false;"';
}

function link_to($name, $controller = '', $action = 'index', $url_params=Array(), $html_params=Array(), $print=true) {
    $url = url_for($controller, $action, $url_params);
    if (sizeof($html_params) > 0) {
        $html_params_str = "";
        foreach ($html_params as $k => $v) {
            $v = str_replace('"', "\\\"", $v);
            $html_params_str .= " $k=\"$v\"";
        }
    }
    $str = "<a href=\"$url\"$html_params_str>$name</a>";
    if ($print) {
        echo $str;
    }
    return $str;
}

function active_class_for_navi($controller, $action = 'index', $url_params=Array()) {
    $active = true;
    //$url = url_for($controller, $action, $url_params);
    $url_params = aggregate_url_params($url_params);

    $req_contr = $_REQUEST['controller'];
    $req_action = $_REQUEST['action'];
    if (!$req_contr || $req_contr == "") {
        $req_contr = "home";
        $req_action = "index";
    }

    if ($controller && $controller != "") {
        if ($req_contr != $controller) {
            $active = false;
        }
    }
    if ($action && $action != "") {
        if ($req_action != $action) {
            $active = false;
        }
    }
    if (sizeof($url_params) > 0) {
        foreach ($url_params as $key => $value) {
            if ($_REQUEST[$key] != $value) {
                $active = false;
                break;
            }
        }
    }
    if ($active)
        echo " class=\"active\"";
}

function image_tag($img, $print=true) {
    $alt = split('\.', $img);
    $alt = ucwords($alt[0]);
    $str = "<img src=\"/public/images/$img\" alt=\"$alt\" />";
    if ($print) {
        echo $str;
    }
    return $str;
}

function clearer($print=true) {
    $str = "<div class=\"clearer\"></div>\n";
    if ($print) {
        echo $str;
    }
    return $str;
}

function aggregate_url_params($url_params) {
    if (is_array($url_params[0])) {
        $new_url_params = Array();
        foreach ($url_params as $url_param) {
            $new_url_params[$url_param[0]] = $url_param[1];
        }
        $url_params = $new_url_params;
    }
    return $url_params;
}

function url_for($controller = '', $action = 'index', $url_params=Array()) {
    $url_params = aggregate_url_params($url_params);
    if (!$controller || $controller == "") {
        $controller = $_REQUEST['controller'];
    }
    if (!$action || $action == "") {
        $action = $_REQUEST['action'];
    }
    $url = "/?action=$action&ln=" . $_REQUEST['ln'] . "";
    if ($controller != '') {
        $url .= "&controller=$controller";
    }

    if (sizeof($url_params) > 0) {
        foreach ($url_params as $key => $value) {
            $url .= '&' . $key . '=' . $value;
        }
    }
    return $url;
}

function redirect_to($controller = '', $action = 'index', $url_params=Array()) {
    header("Location: " . url_for($controller, $action, $url_params));
    exit;
}

function navi_link($name, $action) {
    echo '<li onclick="location.href=$(this).down()"><a href="?action=' . $action . '&ln=' . $_REQUEST['ln'] . '">' . $name . '</a></li>';
}

?>
