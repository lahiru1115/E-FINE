<?php
session_start();
require_once('../../database/db_conn.php');
require_once('../../database/main.func.php');
require_once('../../database/system-admin.func.php');

$province = $_POST["province"];
$district = $_POST["district"];
$name = $_POST["name"];
$email = $_POST["email"];
$pwd = "abc123";
$table = "police_station_admin";
$role = "Police Station Admin";
$userId = $_SESSION["id"];

if (isset($_POST["submit"])) {

    if (psaAddEmptyInput($name, $email) !== false) {
        header("location: ../../public/system-admin/psa-add.php?error=emptyInput");
        exit();
    }

    if (invalidName($name) !== false) {
        header("location: ../../public/system-admin/psa-add.php?error=invalidName");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../../public/system-admin/psa-add.php?error=invalidEmail");
        exit();
    }

    if (emailExists($conn, $email) !== false) {
        header("location: ../../public/system-admin/psa-add.php?error=emailTaken");
        exit();
    } else {
        psaAdd($conn, $province, $district, $name, $email, $userId);
        adminRegister($conn, $email, $pwd, $role, $table);
        header("location: ../../public/system-admin/psa-add.php?error=none");
        exit();
    }
} else {
    header("location: ../../public/system-admin/psa-add.php");
    exit();
}
