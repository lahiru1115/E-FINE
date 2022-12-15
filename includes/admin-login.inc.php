<?php

require_once('dbh.inc.php');
require_once('functions.inc.php');

$email = $_POST["email"];
$pwd = $_POST["pwd"];
$table = "admin_login";

if (isset($_POST["submit"])) {

    if (loginEmptyInput($email, $pwd) !== false) {
        header("location: ../index.php?error=emptyInput");
        exit();
    } else {
        adminLogin($conn, $email, $pwd, $table);
    }
} else {
    header("location: ../system-admin/sa-home.php");
    exit();
}
