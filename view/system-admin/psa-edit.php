<?php
include_once("sa-dbh.inc.php");
include_once("sa-head.php");
include_once("sa-sidebar.php");
include_once("sa-navbar.php");

$row = psaGetData($con);

ob_start();
include "../../includes/main/alerts.inc.php";
$alert = ob_get_clean();
?>

<section class="home-section">

    <div class="content">

        <div class="title-bar">
            <div class="heading">
                <h1>Edit Police Officer</h1>
            </div>
        </div>

        <div class="container">
        <form method="post" action="../../includes/system-admin/psa-edit.inc.php">
                <table class="form form-psa">
                    <tr>
                        <td><label>Police Station Id</label></td>
                        <td><input type="text" name="id" id="id" class="disabled" value="<?php echo $row['id']; ?>" readonly></td>

                    </tr>
                    <tr>
                        <td><label>Province</label></td>
                        <td><input class="text disabled" name="province" id="select-province" value="<?php echo $row['province']; ?>" readonly></td>
                    </tr>
                    <tr>
                        <td><label>District</label></td>
                        <td><input class="text disabled" name="district" id="select-district" value="<?php echo $row['district']; ?>" readonly></td>
                    </tr>
                    <tr>
                        <td><label>Police Station</label></td>
                        <td><input type="text" name="police_station" id="police_station" class="disabled" value="<?php echo $row['name']; ?>" readonly></td>
                    </tr>
                    <tr>
                        <td><label>Email Address</label></td>
                        <td><input type="text" name="email" id="email" value="<?php echo $row['email']; ?>"></td>
                    </tr>

                    <tr>
                        <td><label>Court Name</label></td>
                        <td>
                            <input class="disabled" name="court_name" id="select-court" value="<?php echo $row['email']; ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="btn-group">
                                <a href="psa-view.php">
                                    <div class="btn btn-secondary">Cancel</div>
                                </a>
                                <button class="btn btn-primary" type="submit" name="submit">Save</button>
                                <?php echo $alert; ?>
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
        </div>

    </div>

</section>