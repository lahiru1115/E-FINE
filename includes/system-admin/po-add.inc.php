<?php

require_once('../dbh.inc.php');
require_once('../functions.inc.php');

$name = $_POST["name"];
$sNo = $_POST["sNo"];
$rank = $_POST["rank"];
$pStation = $_POST["pStation"];
$email = $_POST["email"];
$pwd = "abc123";
$table = "police_officer";
$role = "Police Officer";

if (isset($_POST["submit"])) {

    if (poAddEmptyInput($name, $sNo, $email) !== false) {
        header("location: ../../system-admin/po-add.php?error=emptyInput");
        exit();
    }

    if (invalidName($name) !== false) {
        header("location: ../../system-admin/po-add.php?error=invalidName");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../../system-admin/po-add.php?error=invalidEmail");
        exit();
    }

    if (emailExists($conn, $email) !== false) {
        header("location: ../../system-admin/po-add.php?error=emailTaken");
        exit();
    } else {
        poAdd($conn, $name, $sNo, $rank, $pStation, $email);
        adminRegister($conn, $email, $pwd, $role, $table);
        header("location: ../../system-admin/po-add.php?error=none");
        exit();
    }
} else {
    header("location: ../../system-admin/po-add.php");
    exit();
}
