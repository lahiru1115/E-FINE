<?php
session_start();

require_once('/Localhost/E-FINE/config/db_conn.php');
require_once('/Localhost/E-FINE/functions/system-admin.func.php');

define('PSA_EDIT_URL', '/E-FINE/view/system-admin/psa-edit.php');
define('PSA_VIEW_URL', '/E-FINE/view/system-admin/psa-view.php');

$id = $_POST["id"];
$email = $_POST["email"];
$user_id = $_SESSION["user_id"];

if (isset($_POST["submit"])) {

    if (psaUpdateEmptyInput($email) !== false) {
        header("location: " . PSA_EDIT_URL . "?error=emptyInput");
        exit();
    }

    psaUpdate($con, $email);
} else {
    header("location: " . PSA_VIEW_URL . "?error=stmtFailed");
    exit();
}
