<?php
session_start();
require_once('/Localhost/E-FINE/config/db_conn.php');
require_once('/Localhost/E-FINE/functions/main.func.php');
require_once('/Localhost/E-FINE/functions/system-admin.func.php');

$name = $_POST["name"];
$email = $_POST["email"];
$pwd = "abc123";
$table = "rmv_admin";
$role = "RMV Admin";
$userId = $_SESSION["id"];

if (isset($_POST["submit"])) {

    if (psarmvAddEmptyInput($name, $email) !== false) {
        header("location: /E-FINE/view/system-admin/rmv-add.php?error=emptyInput");
        exit();
    }

    if (invalidName($name) !== false) {
        header("location: /E-FINE/view/system-admin/rmv-add.php?error=invalidName");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: /E-FINE/view/system-admin/rmv-add.php?error=invalidEmail");
        exit();
    }

    if (emailExists($conn, $email) !== false) {
        header("location: /E-FINE/view/system-admin/rmv-add.php?error=emailTaken");
        exit();
    } else {
        rmvAdd($conn, $name, $email, $userId);
        adminRegister($conn, $email, $pwd, $role, $table);
        header("location: /E-FINE/view/system-admin/rmv-view.php?error=none");
        exit();
    }
} else {
    header("location: /E-FINE/view/system-admin/rmv-view.php?error=stmtFailed");
    exit();
}
