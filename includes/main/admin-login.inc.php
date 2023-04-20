<?php

require_once('/Localhost/E-FINE/config/db_conn.php');
require_once('/Localhost/E-FINE/functions/main.func.php');

define('INDEX_URL', '/E-FINE/public/index.php');
define('SA_HOME_URL', '/E-FINE/view/system-admin/sa-home.php');

$email = $_POST["email"];
$password = $_POST["password"];
$table = "admin_login";

if (isset($_POST["submit"])) {

    if (loginEmptyInput($email, $password) !== false) {
        header("location: " . INDEX_URL . "?error=emptyInput");
        exit();
    } else {
        adminLogin($conn, $email, $password, $table);
    }
} else {
    header("location: " . SA_HOME_URL);
    exit();
}
