<?php

require_once('../dbh.inc.php');
require_once('../functions.inc.php');

$province = $_POST["province"];
$district = $_POST["district"];
$name = $_POST["name"];
$email = $_POST["email"];
$pwd = "abc123";
$table = "police_station_admin";
$role = "Police Station Admin";

if (isset($_POST["submit"])) {

    if (psaAddEmptyInput($name, $email) !== false) {
        header("location: ../../system-admin/psa-add.php?error=emptyInput");
        exit();
    }

    if (invalidName($name) !== false) {
        header("location: ../../system-admin/psa-add.php?error=invalidName");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../../system-admin/psa-add.php?error=invalidEmail");
        exit();
    }

    if (emailExists($conn, $email) !== false) {
        header("location: ../../system-admin/psa-add.php?error=emailTaken");
        exit();
    } else {
        psaAdd($conn, $province, $district, $name, $email);
        adminRegister($conn, $email, $pwd, $role, $table);
        header("location: ../../system-admin/psa-add.php?error=none");
        exit();
    }
} else {
    header("location: ../../system-admin/psa-add.php");
    exit();
}
