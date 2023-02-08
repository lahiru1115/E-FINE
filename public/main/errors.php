<?php
if (isset($_GET["error"])) {
	if ($_GET["error"] == "emptyInput") {
		echo "<p>Fill in all the fields!</p>";
	} else if ($_GET["error"] == "invalidLogin") {
		echo "<p>Invalid Email or Password!</p>";
	} else if ($_GET["error"] == "invalidName") {
		echo "<p>Invalid Name! Use only alphabet letters.</p>";
	} else if ($_GET["error"] == "invalidEmail") {
		echo "<p>Invalid Email!</p>";
	} else if ($_GET["error"] == "invalidPwd") {
		echo "<p>Password must be at least 4 characters!</p>";
	} else if ($_GET["error"] == "emailTaken") {
		echo "<p>Email is already taken!</p>";
	} else if ($_GET["error"] == "stmtFailed") {
		echo "<p>Something went wrong!</p>";
	} else if ($_GET["error"] == "cantDelete") {
		echo "<p>Can't delete at the moment!</p>";
	} else if ($_GET["error"] == "noData") {
		echo "<p>There are no data available!</p>";
	} else if ($_GET["error"] == "updated") {
		echo "<p>Updated!</p>";
	} else if ($_GET["error"] == "deleted") {
		echo "<p>Deleted!</p>";
	} else if ($_GET["error"] == "none") {
		echo "<p>Done!</p>";
	}
}
