<?php
session_start();
require_once('/Localhost/E-FINE/config/db_conn.php');
require_once('/Localhost/E-FINE/functions/main.func.php');
require_once('/Localhost/E-FINE/functions/system-admin.func.php');

define('RMV_ADD_URL', '/E-FINE/view/system-admin/rmv-add.php');
define('RMV_VIEW_URL', '/E-FINE/view/system-admin/rmv-view.php');

$name = $_POST["name"];
$email = $_POST["email"];
$password = "abc123";
$table = "rmv_admin";
$user_role = "RMV Admin";
$user_id = $_SESSION["user_id"];

if (isset($_POST["submit"])) {

    if (psarmvAddEmptyInput($name, $email) !== false) {
        header("location: " . RMV_ADD_URL . "?error=emptyInput");
        exit();
    }

    if (invalidName($name) !== false) {
        header("location: " . RMV_ADD_URL . "?error=invalidName");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: " . RMV_ADD_URL . "?error=invalidEmail");
        exit();
    }

    if (emailExists($conn, $email) !== false) {
        header("location: " . RMV_ADD_URL . "?error=emailTaken");
        exit();
    } else {
        rmvAdd($conn, $name, $email, $user_id);
        adminRegister($conn, $email, $password, $user_role, $table);
        header("location: " . RMV_VIEW_URL . "?error=none");
        exit();
    }
} else {
    header("location: " . RMV_VIEW_URL . "?error=stmtFailed");
    exit();
}
