<?php

require_once('/Localhost/E-FINE/config/db_conn.php');
require_once('/Localhost/E-FINE/functions/main.func.php');

$email = $_POST["email"];
$pwd = $_POST["pwd"];
$table = "admin_login";

if (isset($_POST["submit"])) {

    if (loginEmptyInput($email, $pwd) !== false) {
        header("location: /E-FINE/public/index.php?error=emptyInput");
        exit();
    } else {
        adminLogin($conn, $email, $pwd, $table);
    }
} else {
    header("location: /E-FINE/view/system-admin/sa-home.php");
    exit();
}
