<?php

class DbClass {

    function select_or_create_by_attribute($table, $attribute, $value) {
        if (!$this->exists_by_attribute($table, $attribute, $value)) {
            $inserted_id = $this->insert("INSERT INTO `" . $table . "` (
`" . $attribute . "`
)
VALUES (
\"" . $value . "\"
);");
        }
        return $this->select_first("select * from $table where $attribute = \"" . $value . "\"");
    }

    function exists_by_attribute($table, $attribute, $value) {
        $res = mysql_query("select * from $table where $attribute = \"" . $value . "\"");
        return mysql_num_rows($res) >= 1;
    }

    function select($query) {
        $res = mysql_query($query);
        $objects = Array();
        while ($object = mysql_fetch_object($res)) {
            $objects[] = $object;
        }
        mysql_free_result($res);
        return $objects;
    }

    function select_first($query) {
        $objects = $this->select($query);
        return $objects[0];
    }

    function select_by_attribute($table, $attribute, $value) {
        return $this->select_first("select * from $table where $attribute = \"" . $value . "\"");
    }

    function select_by_id($table, $id) {
        return $this->select_by_attribute($table, 'id', intval($id));
    }

    function max($table, $field) {
        $res = mysql_query("select max($field) from $table");
        $objects = mysql_fetch_row($res);
        mysql_free_result($res);
        return $objects[0];
    }

    function insert($query) {
        mysql_query($query);
        return mysql_insert_id();
    }

    function update($query) {
        return mysql_query($query);
    }

    function query($query) {
        return mysql_query($query);
    }

    function delete($query) {
        return mysql_query($query);
    }

}

$DB = new DbClass();
?>