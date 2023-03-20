<?php
require_once('/Localhost/E-FINE/config/db_conn.php');
require_once('/Localhost/E-FINE/functions/main.func.php');
require_once('/Localhost/E-FINE/functions/system-admin.func.php');

$name = $_POST["name"];
$email = $_POST["email"];
$pwd = $_POST["pwd"];
$table = "system_admin";
$role = "System Admin";

if (isset($_POST["submit"])) {

    if (saAddEmptyInput($name, $email, $pwd) !== false) {
        header("location: /E-FINE/view/system-admin/sa-register.php?error=emptyInput");
        exit();
    }

    if (invalidName($name) !== false) {
        header("location: /E-FINE/view/system-admin/sa-register.php?error=invalidName");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: /E-FINE/view/system-admin/sa-register.php?error=invalidEmail");
        exit();
    }

    if (invalidPwd($pwd) == false) {
        header("location: /E-FINE/view/system-admin/sa-register.php?error=invalidPwd");
        exit();
    }

    if (emailExists($conn, $email) !== false) {
        header("location: /E-FINE/view/system-admin/sa-register.php?error=emailTaken");
        exit();
    } else {
        saAdd($conn, $name, $email);
        adminRegister($conn, $email, $pwd, $role, $table);
        header("location: /E-FINE/view/system-admin/sa-register.php?error=none");
        exit();
    }
} else {
    header("location: /E-FINE/view/system-admin/sa-register.php?error=stmtFailed");
    exit();
}
