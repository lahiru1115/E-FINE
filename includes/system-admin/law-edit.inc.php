<?php
session_start();
require_once('/Localhost/E-FINE/config/db_conn.php');
require_once('/Localhost/E-FINE/functions/system-admin.func.php');

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
    adminUpdateIssue($conn, $issueId, $status);
} else {
    header("location: ../admin/issue/viewIssue.php");
    exit();
}
