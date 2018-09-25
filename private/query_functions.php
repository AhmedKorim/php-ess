<?php
function getAll($db, $table = "subjects") {
    global $db;

    $sql = "SELECT * FROM  {$table}"
        . " ORDER  by position ASC ";
    $subject_set = mysqli_query($db, $sql);
    if (!$subject_set) {
        exit('DATABASE QUERY FAILED');
    }
    return $subject_set;
}

function getFromTable($db, $by = 'id', $val = '1', $table = "subjects") {
    global $id;
    $sql = "SELECT * FROM " . h($table) . " WHERE " . h($by);
    $sql .= " = " . $val;
    $subject_set = mysqli_query($db, $sql);
    if (!$subject_set) exit('DATABASE QUERY FAILED');
    $result = mysqli_fetch_assoc($subject_set);
    mysqli_free_result($subject_set);
    return $result;
}

function insetSubject($db, $menu_name, $position, $visible) {
    $sql = "INSERT INTO subjects (menu_name, position, visible) ";
    $sql .= "VALUES (";
    $sql .= "'" . $menu_name . "',";
    $sql .= "'" . $position . "',";
    $sql .= "'" . $visible . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    if ($result) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function editSubject($db, $subject, $id) {
    $sql = "UPDATE subjects SET ";
    $sql .= "menu_name = '" . $subject["menu_name"] . "',";
    $sql .= "position = '" . $subject["position"] . "',";
    $sql .= "visible = '" . $subject["visible"] . "'";
    $sql .= " WHERE id='" . $id . "'";
    $sql .= " LIMIT 1";
    $result = mysqli_query($db, $sql);
    if($result) return true;
    else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}
