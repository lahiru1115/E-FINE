<?php
session_start();
require_once('/Localhost/E-FINE/config/db_conn.php');
require_once('/Localhost/E-FINE/functions/main.func.php');
require_once('/Localhost/E-FINE/functions/system-admin.func.php');

define('PO_ADD_URL', '/E-FINE/view/system-admin/po-add.php');
define('PO_VIEW_URL', '/E-FINE/view/system-admin/po-view.php');

$name = $_POST["name"];
$service_number = $_POST["service_number"];
$rank = $_POST["rank"];
$police_station = $_POST["police_station"];
$email = $_POST["email"];
$password = "abc123";
$table = "police_officer";
$user_role = "Police Officer";
$user_id = $_SESSION["user_id"];

if (isset($_POST["submit"])) {

    if (poAddEmptyInput($name, $service_number, $email) !== false) {
        header("location: " . PO_ADD_URL . "?error=emptyInput");
        exit();
    }

    if (invalidName($name) !== false) {
        header("location: " . PO_ADD_URL . "?error=invalidName");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: " . PO_ADD_URL . "?error=invalidEmail");
        exit();
    }

    if (emailExists($con, $email) !== false) {
        header("location: " . PO_ADD_URL . "?error=emailTaken");
        exit();
    } else {
        poAdd($con, $name, $service_number, $rank, $police_station, $email, $user_id);
        adminRegister($con, $email, $password, $user_role, $table);
        header("location: " . PO_VIEW_URL . "?error=none");
        exit();
    }
} else {
    header("location: " . PO_VIEW_URL . "?error=stmtFailed");
    exit();
}
