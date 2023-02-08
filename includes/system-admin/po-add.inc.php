<?php

session_start();
require_once('../../db/dbh.php');
require_once('../../db/main.func.php');
require_once('../../db/system-admin.func.php');

$name = $_POST["name"];
$sNo = $_POST["sNo"];
$rank = $_POST["rank"];
$pStation = $_POST["pStation"];
$email = $_POST["email"];
$pwd = "abc123";
$table = "police_officer";
$role = "Police Officer";
$userId = $_SESSION["id"];

if (isset($_POST["submit"])) {

    if (poAddEmptyInput($name, $sNo, $email) !== false) {
        header("location: ../../public/system-admin/po/po-add.php?error=emptyInput");
        exit();
    }

    if (invalidName($name) !== false) {
        header("location: ../../public/system-admin/po/po-add.php?error=invalidName");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../../public/system-admin/po/po-add.php?error=invalidEmail");
        exit();
    }

    if (emailExists($conn, $email) !== false) {
        header("location: ../../public/system-admin/po/po-add.php?error=emailTaken");
        exit();
    } else {
        poAdd($conn, $name, $sNo, $rank, $pStation, $email, $userId);
        adminRegister($conn, $email, $pwd, $role, $table);
        header("location: ../../public/system-admin/po/po-add.php?error=none");
        exit();
    }
} else {
    header("location: ../../public/system-admin/po/po-add.php");
    exit();
}
