<?php

require_once('../dbh.inc.php');
require_once('../functions.inc.php');

$name = $_POST["name"];
$email = $_POST["email"];
$pwd = "abc123";
$table = "rmv_admin";
$role = "RMV Admin";

if (isset($_POST["submit"])) {

    if (rmvAddEmptyInput($name, $email) !== false) {
        header("location: ../../system-admin/rmv-add.php?error=emptyInput");
        exit();
    }

    if (invalidName($name) !== false) {
        header("location: ../../system-admin/rmv-add.php?error=invalidName");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../../system-admin/rmv-add.php?error=invalidEmail");
        exit();
    }

    if (emailExists($conn, $email) !== false) {
        header("location: ../../system-admin/rmv-add.php?error=emailTaken");
        exit();
    } else {
        rmvAdd($conn, $name, $email);
        adminRegister($conn, $email, $pwd, $role, $table);
        header("location: ../../system-admin/rmv-add.php?error=none");
        exit();
    }
} else {
    header("location: ../../system-admin/rmv-add.php");
    exit();
}
