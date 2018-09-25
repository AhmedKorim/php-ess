<?php
require_once('db_credentials.php');

function confirmDbConnect() {
    if (mysqli_connect_errno()) {
        $msg = "DATABASE CONNECTIONS= FAILED :";
        $msg .= mysqli_connect_error();
        $msg .= "(" . mysqli_connect_errno() . ")";
        exit($msg);
    }
}

function db_connect() {
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    confirmDbConnect();
    return $connection;
}

function db_disconnect($connection) {
    if (isset($connection)) {
        mysqli_close($connection);
    }
}


?>