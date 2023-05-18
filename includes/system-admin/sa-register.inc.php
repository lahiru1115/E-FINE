<?php
require_once('/Localhost/E-FINE/config/db_conn.php');
require_once('/Localhost/E-FINE/functions/main.func.php');
require_once('/Localhost/E-FINE/functions/system-admin.func.php');

define('SA_REG_URL', '/E-FINE/view/system-admin/sa-register.php');

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$table = "system_admin";
$user_role = "System Admin";

if (isset($_POST["submit"])) {

    if (saAddEmptyInput($name, $email, $password) !== false) {
        header("location: " . SA_REG_URL . "?error=emptyInput");
        exit();
    }

    if (invalidName($name) !== false) {
        header("location: " . SA_REG_URL . "?error=invalidName");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: " . SA_REG_URL . "?error=invalidEmail");
        exit();
    }

    if (invalidPassword($password) == false) {
        header("location: " . SA_REG_URL . "?error=invalidPassword");
        exit();
    }

    if (emailExists($con, $email) !== false) {
        header("location: " . SA_REG_URL . "?error=emailTaken");
        exit();
    } else {
        saAdd($con, $name, $email);
        userRegister($con, $email, $password, $user_role, $table);
        header("location: " . SA_REG_URL . "?error=none");
        exit();
    }
} else {
    header("location: " . SA_REG_URL . "?error=stmtFailed");
    exit();
}
