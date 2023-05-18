<?php
session_start();
require_once('/Localhost/E-FINE/config/db_conn.php');
require_once('/Localhost/E-FINE/functions/main.func.php');
require_once('/Localhost/E-FINE/functions/system-admin.func.php');

define('PSA_ADD_URL', '/E-FINE/view/system-admin/psa-add.php');
define('PSA_VIEW_URL', '/E-FINE/view/system-admin/psa-view.php');

$province = $_POST["province"];
$district = $_POST["district"];
$police_station = $_POST["police_station"]; 
$email = $_POST["email"];
$court_name = $_POST["court_name"];
$password = "abc123";
$table = "police_station_admin";
$user_role = "police_station";
$user_id = $_SESSION["user_id"];


if (isset($_POST["submit"])) {

    if (psaAddEmptyInput($police_station, $email) !== false) {
        header("location: " . PSA_ADD_URL . "?error=emptyInput");
        exit();
    }

    if (invalidName($police_station) !== false) {
        header("location: " . PSA_ADD_URL . "?error=invalidName");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: " . PSA_ADD_URL . "?error=invalidEmail");
        exit();
    }

    if (emailExists($con, $email) !== false) {
        header("location: " . PSA_ADD_URL . "?error=emailTaken");
        exit();
    } else {
        psaAdd($con, $province, $district, $police_station, $email, $court_name, $user_id);
        userRegister($con, $email, $password, $user_role, $table);
        header("location: " . PSA_VIEW_URL . "?error=none");
        exit();
    }
} else {
    header("location: " . PSA_VIEW_URL . "?error=stmtFailed");
    exit();
}
