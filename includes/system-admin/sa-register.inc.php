<?php

require_once('../../db/dbh.php');
require_once('../../db/main.func.php');
require_once('../../db/system-admin.func.php');

$name = $_POST["name"];
$email = $_POST["email"];
$pwd = $_POST["pwd"];
$table = "system_admin";
$role = "System Admin";

if (isset($_POST["submit"])) {

    if (saAddEmptyInput($name, $email, $pwd) !== false) {
        header("location: ../../public/system-admin/main/register.php?error=emptyInput");
        exit();
    }

    if (invalidName($name) !== false) {
        header("location: ../../public/system-admin/main/register.php?error=invalidName");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../../public/system-admin/main/register.php?error=invalidEmail");
        exit();
    }

    if (invalidPwd($pwd) == false) {
        header("location: ../../public/system-admin/main/register.php?error=invalidPwd");
        exit();
    }

    if (emailExists($conn, $email, $table) !== false) {
        header("location: ../../public/system-admin/main/register.php?error=emailTaken");
        exit();
    } else {
        saAdd($conn, $name, $email);
        adminRegister($conn, $email, $pwd, $role, $table);
        header("location: ../../public/system-admin/main/register.php?error=none");
        exit();
    }
} else {
    header("location: ../../public/system-admin/main/register.php");
    exit();
}
