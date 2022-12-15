<?php
require_once('../includes/dbh.inc.php');
require_once('../includes/functions.inc.php');
?>

<html>

<head>
    <title>E-FINE</title>
    <link rel="stylesheet" href="../css/main.css">
</head>

<body>

    <div class="content">
        <div class="title-bar">
            <div class="heading">
                <h1>Register | System Admin</h1>
            </div>
        </div>
        <div class="container">
            <form method="post" action="../includes/system-admin/register.inc.php">
                <table class="form rmv">
                    <tr>
                        <td><label>System Admin Id</label></td>
                        <td>
                            <?php
                            $table = "system_admin";
                            $result = nextId($conn, $table);
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <input type="text" name="id" id="id" class="disabled" disabled value=<?php echo $row['id'] + 1 ?>>
                            <?php
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Name</label></td>
                        <td><input type="text" name="name" id="name"></td>
                    </tr>
                    <tr>
                        <td><label>Email Address</label></td>
                        <td><input type="text" name="email" id="email"></td>
                    </tr>
                    <tr>
                        <td><label>Password</label></td>
                        <td><input type="password" name="pwd" id="pwd"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="btn-group">
                                <button class="btn btn-secondary" type="submit" name="submit">Cancel</button>
                                <button class="btn btn-primary" type="submit" name="submit">Save</button>
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
            <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyInput") {
                    echo "<p>Fill in all the fields!</p>";
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
                } else if ($_GET["error"] == "none") {
                    echo "<p>You have registered!</p>";
                }
            }
            ?>
        </div>
    </div>

</body>

</html>