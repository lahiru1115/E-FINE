<?php
$errors = array(
	"emptyInput" => "Fill in all the fields!",
	"invalidLogin" => "Invalid Email or Password!",
	"invalidName" => "Invalid Name! Use only alphabet letters.",
	"invalidEmail" => "Invalid Email!",
	"invalidPassword" => "Password must be at least 4 characters!",
	"emailTaken" => "Email already taken!",
	"stmtFailed" => "Something went wrong!",
	"cantDelete" => "Can't delete at the moment!",
	"cantUpdate" => "Can't update at the moment!",
	"updated" => "Successfully Updated!",
	"deleted" => "Successfully Deleted!",
	"none" => "Successfully Added!"
);

if (isset($_GET["error"]) && isset($errors[$_GET["error"]])) {
	$error = $errors[$_GET["error"]];
	$type = ($_GET["error"] == "updated" || $_GET["error"] == "deleted" || $_GET["error"] == "none") ? "success" : "warning";
	echo "<div class='alert alert-$type'>
            <svg><use xlink:href='#$type'></use></svg>
            <span>$error</span>
        </div>";
}
?>

<svg style="display: none;">
	<symbol id="success">
		<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
	</symbol>
	<symbol id="warning">
		<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
	</symbol>
</svg>