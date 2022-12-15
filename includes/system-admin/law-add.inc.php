<?php

require_once('../dbh.inc.php');
require_once('../functions.inc.php');

$act = $_POST["act"];
$part = $_POST["part"];
$chapter = $_POST["chapter"];
$section = $_POST["section"];
$title = $_POST["title"];
$law = $_POST["law"];
$fine = $_POST["fine"];
$points = $_POST["points"];
$userId = $_SESSION["userId"];

if (isset($_POST["submit"])) {

    if (lawAddEmptyInput($part, $chapter, $section, $title, $law, $fine, $points) !== false) {
        header("location: ../../system-admin/law-add.php?error=emptyInput");
        exit();
    }

    lawAdd($conn, $act, $part, $chapter, $section, $title, $law, $fine, $points);
} else {
    header("location: ../../system-admin/law-add.php");
    exit();
}
