<?php

require_once('/Localhost/E-FINE/config/db_conn.php');
require_once('/Localhost/E-FINE/functions/main.func.php');

define('INDEX_URL', '/E-FINE/public/index.php');

$email = $_POST["email"];
$password = $_POST["password"];

if (isset($_POST["submit"])) {

    if (loginEmptyInput($email, $password) !== false) {
        header("location: " . INDEX_URL . "?error=emptyInput");
        exit();
    } else {
        userLogin($con, $email, $password);
    }
} else {
    header("location: " . INDEX_URL);
    exit();
}
