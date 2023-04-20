<?php
session_start();
require_once('/Localhost/E-FINE/config/db_conn.php');
require_once('/Localhost/E-FINE/functions/system-admin.func.php');

define('LAW_ADD_URL', '/E-FINE/view/system-admin/law-add.php');
define('LAW_VIEW_URL', '/E-FINE/view/system-admin/law-view.php');

$act = $_POST["act"];
$part_number = $_POST["part_number"];
$chapter_number = $_POST["chapter_number"];
$section_number = $_POST["section_number"];
$title = $_POST["title"];
$law_text = $_POST["law_text"];
$fine_amount = $_POST["fine_amount"];
$points_deducted = $_POST["points_deducted"];
$user_id = $_SESSION["user_id"];

if (isset($_POST["submit"])) {

    if (lawEmptyInput($part_number, $chapter_number, $section_number, $title, $law_text, $fine_amount, $points_deducted) !== false) {
        header("location: " . LAW_ADD_URL . "?error=emptyInput");
        exit();
    }

    lawAdd($conn, $act, $part_number, $chapter_number, $section_number, $title, $law_text, $fine_amount, $points_deducted, $user_id);
} else {
    header("location: " . LAW_VIEW_URL . "?error=stmtFailed");
    exit();
}
