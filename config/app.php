<?php

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASSWORD','');
define('DB_DATABASE','db_toko');

define('SITE_URL', 'http://localhost/tubes_impl/');

include_once('Connection.php');
$db = new Connection;
$conn = $db->conn;

function base_url($sluggable) {
    echo SITE_URL . $sluggable;
}

function redirect($message, $page){
    $redirectTo = SITE_URL . $page;
    $_SESSION['message'] = "$message";
    header("Location: $redirectTo");
    exit(0);
}

function validateInput($dbcon, $input) {
    return mysqli_real_escape_string($dbcon, $input);
}
