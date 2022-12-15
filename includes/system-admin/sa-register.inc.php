<?php

require_once('../dbh.inc.php');
require_once('../functions.inc.php');

$name = $_POST["name"];
$email = $_POST["email"];
$pwd = $_POST["pwd"];
$table = "system_admin";
$role = "System Admin";

if (isset($_POST["submit"])) {

    if (saRegEmptyInput($name, $email, $pwd) !== false) {
        header("location: ../../system-admin/register.php?error=emptyInput");
        exit();
    }

    if (invalidName($name) !== false) {
        header("location: ../../system-admin/register.php?error=invalidName");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../../system-admin/register.php?error=invalidEmail");
        exit();
    }

    if (invalidPwd($pwd) == false) {
        header("location: ../../system-admin/register.php?error=invalidPwd");
        exit();
    }

    if (emailExists($conn, $email, $table) !== false) {
        header("location: ../../system-admin/register.php?error=emailTaken");
        exit();
    } else {
        saAdd($conn, $name, $email);
        adminRegister($conn, $email, $pwd, $role, $table);
        header("location: ../../system-admin/register.php?error=none");
        exit();
    }
} else {
    header("location: ../../system-admin/register.php");
    exit();
}
