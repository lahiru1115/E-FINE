<?php
require_once('/Localhost/E-FINE/config/db_conn.php');
require_once('/Localhost/E-FINE/functions/system-admin.func.php');

$id = $_POST["id"];
$act = $_POST["act"];
$part = $_POST["part"];
$chapter = $_POST["chapter"];
$section = $_POST["section"];
$title = $_POST["title"];
$law = $_POST["law"];
$fine = $_POST["fine"];
$points = $_POST["points"];

if (isset($_POST["submit"])) {

    if (lawEmptyInput($part, $chapter, $section, $title, $law, $fine, $points) !== false) {
        header("location: /E-FINE/view/system-admin/law-edit.php?error=emptyInput");
        exit();
    }

    lawUpdate($conn, $id, $act, $part, $chapter, $section, $title, $law, $fine, $points);
} else {
    header("location: /E-FINE/view/system-admin/law-view.php?error=stmtFailed");
    exit();
}
