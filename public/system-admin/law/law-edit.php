<?php
session_start();
require_once('../includes/dbh.inc.php');
require_once('../includes/functions.inc.php');
?>

<html>

<head>
    <title>E-FINE</title>
    <link rel="stylesheet/less" type="text/css" href="../css/main.less" />
    <script src="../js/less.js" type="text/javascript"></script>
</head>

<body>

    <?php include("sidebar.php"); ?>

    <section class="home-section">

        <?php include("navbar.php"); ?>

        <div class="content">
            <div class="title-bar">
                <div class="heading">
                    <h1>Edit Traffic Violation Law</h1>
                </div>
            </div>
            <div class="container">
                <form method="post" action="includes/system-admin/law-edit.inc.php">
                    <table class="form">
                        <tr>
                            <td><label>Violation Id</label></td>
                            <td><input type="text" name="province" id="province" class="disabled" disabled value="001"></td>
                        </tr>
                        <tr>
                            <td><label>Act</label></td>
                            <td>
                                <select name="act" id="act" class="disabled" disabled>
                                    <option value="">Select Menu</option>
                                    <option value="">Select Menu</option>
                                    <option value="">Select Menu</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Part</label></td>
                            <td><input type="number" name="province" id="province" class="disabled" disabled></td>
                        </tr>
                        <tr>
                            <td><label>Chapter</label></td>
                            <td><input type="number" name="province" id="province" class="disabled" disabled></td>
                        </tr>
                        <tr>
                            <td><label>Section</label></td>
                            <td><input type="number" name="province" id="province" class="disabled" disabled></td>
                        </tr>
                        <tr>
                            <td><label>Title</label></td>
                            <td><input type="text" name="province" id="province" class="disabled" disabled></td>
                        </tr>
                        <tr>
                            <td><label>Law</label></td>
                            <td><textarea name="law" id="law" cols="30" rows="10" class="disabled" disabled></textarea></td>
                        </tr>
                        <tr>
                            <td><label>Fine</label></td>
                            <td><input type="number" name="province" id="province"></td>
                        </tr>
                        <tr>
                            <td><label>Points</label></td>
                            <td><input type="number" name="province" id="province"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="btn-group">
                                    <a href="law-view.php">
                                        <div class="btn btn-secondary">Cancel</div>
                                    </a>
                                    <button class="btn btn-primary" type="submit" name="submit">Update</button>
                                    <?php
                                    if (isset($_GET["error"])) {
                                        if ($_GET["error"] == "emptyInput") {
                                            echo "<p>Fill in all the fields!</p>";
                                        } else if ($_GET["error"] == "cantUpdate") {
                                            echo "<p>Can't update the issue at the moment!</p>";
                                        } else if ($_GET["error"] == "cantDelete") {
                                            echo "<p>Can't delete the issue at the moment!</p>";
                                        } else if ($_GET["error"] == "notWorking") {
                                            echo "<p>There are no issues available!</p>";
                                        } else if ($_GET["error"] == "none") {
                                            echo "<p>Issue details Updated!</p>";
                                        } else if ($_GET["error"] == "deleted") {
                                            echo "<p>Issue details Deleted!</p>";
                                        }
                                    }
                                    ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </section>

</body>

</html>