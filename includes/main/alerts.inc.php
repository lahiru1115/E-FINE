<?php
if (isset($_GET["error"])) {
	if ($_GET["error"] == "emptyInput") {
		echo "<div class='alert alert-warning'>
					<svg><use xlink:href='#warning'></use></svg>
					<span>Fill in all the fields!</span>
				</div>";
	} else if ($_GET["error"] == "invalidLogin") {
		echo "<div class='alert alert-warning'>
					<svg><use xlink:href='#warning'></use></svg>
					<span>Invalid Email or Password!</span>
				</div>";
	} else if ($_GET["error"] == "invalidName") {
		echo "<div class='alert alert-warning'>
					<svg><use xlink:href='#warning'></use></svg>
					<span>Invalid Name! Use only alphabet letters.</span>
				</div>";
	} else if ($_GET["error"] == "invalidEmail") {
		echo "<div class='alert alert-warning'>
					<svg><use xlink:href='#warning'></use></svg>
					<span>Invalid Email!</span>
				</div>";
	} else if ($_GET["error"] == "invalidPwd") {
		echo "<div class='alert alert-warning'>
					<svg><use xlink:href='#warning'></use></svg>
					<span>Password must be at least 4 characters!</span>
				</div>";
	} else if ($_GET["error"] == "emailTaken") {
		echo "<div class='alert alert-warning'>
					<svg><use xlink:href='#warning'></use></svg>
					<span>Email already taken!</span>
				</div>";
	} else if ($_GET["error"] == "stmtFailed") {
		echo "<div class='alert alert-warning'>
					<svg><use xlink:href='#warning'></use></svg>
					<span>Something went wrong!</span>
				</div>";
	} else if ($_GET["error"] == "cantDelete") {
		echo "<div class='alert alert-warning'>
					<svg><use xlink:href='#warning'></use></svg>
					<span>Can't delete at the moment!</span>
				</div>";
	} else if ($_GET["error"] == "cantUpdate") {
		echo "<div class='alert alert-warning'>
					<svg><use xlink:href='#warning'></use></svg>
					<span>Can't update at the moment!</span>
				</div>";
	} else if ($_GET["error"] == "updated") {
		echo "<div class='alert alert-success'>
					<svg><use xlink:href='#success'></use></svg>
					<span>Successfully Updated!</span>
				</div>";
	} else if ($_GET["error"] == "deleted") {
		echo "<div class='alert alert-success'>
					<svg><use xlink:href='#success'></use></svg>
					<span>Successfully Deleted!</span>
				</div>";
	} else if ($_GET["error"] == "none") {
		echo "<div class='alert alert-success'>
					<svg><use xlink:href='#success'></use></svg>
					<span>Successfully Added!</span>
				</div>";
	}
} ?>

<svg style="display: none;">
	<symbol id="success">
		<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
	</symbol>
	<symbol id="warning">
		<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
	</symbol>
</svg>