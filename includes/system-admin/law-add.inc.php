<?php

session_start();
require_once('../../db/dbh.php');
require_once('../../db/system-admin.func.php');

$act = $_POST["act"];
$part = $_POST["part"];
$chapter = $_POST["chapter"];
$section = $_POST["section"];
$title = $_POST["title"];
$law = $_POST["law"];
$fine = $_POST["fine"];
$points = $_POST["points"];
$userId = $_SESSION["id"];

if (isset($_POST["submit"])) {

    if (lawAddEmptyInput($part, $chapter, $section, $title, $law, $fine, $points) !== false) {
        header("location: ../../public/system-admin/law/law-add.php?error=emptyInput");
        exit();
    }

    lawAdd($conn, $act, $part, $chapter, $section, $title, $law, $fine, $points, $userId);
} else {
    header("location: ../../public/system-admin/law/law-add.php");
    exit();
}
