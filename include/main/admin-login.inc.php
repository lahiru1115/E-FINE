<?php

require_once('../../database/db_conn.php');
require_once('../../database/main.func.php');

$email = $_POST["email"];
$pwd = $_POST["pwd"];
$table = "admin_login";

if (isset($_POST["submit"])) {

    if (loginEmptyInput($email, $pwd) !== false) {
        header("location: ../../index.php?error=emptyInput");
        exit();
    } else {
        adminLogin($conn, $email, $pwd, $table);
    }
} else {
    header("location: ../../public/system-admin/sa-home.php");
    exit();
}
