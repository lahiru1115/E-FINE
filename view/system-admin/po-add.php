<?php
include_once("sa-dbh.inc.php");
include_once("sa-head.php");
include_once("sa-sidebar.php");
include_once("sa-navbar.php");

$table = "police_officer";
$result = nextId($conn, $table);
$nextId = $result;

ob_start();
include "../../includes/main/alerts.inc.php";
$alert = ob_get_clean();
?>

<section class="home-section">

    <div class="content">

        <div class="title-bar">
            <div class="heading">
                <h1>Add New Police Officer</h1>
            </div>
        </div>

        <div class="container">
            <form method="post" action="../../includes/system-admin/po-add.inc.php">
                <table class="form po">
                    <tr>
                        <td><label>Police Officer Id</label></td>
                        <td><input type="text" name="id" id="id" class="disabled" disabled value=<?php echo $nextId; ?>></td>
                    </tr>
                    <tr>
                        <td><label>Name</label></td>
                        <td><input type="text" name="name" id="name"></td>
                    </tr>
                    <tr>
                        <td><label>Service No</label></td>
                        <td><input type="number" name="sNo" id="sNo" min="0"></td>
                    </tr>
                    <tr>
                        <td><label>Rank</label></td>
                        <td>
                            <input class="select" name="rank" id="select-rank" placeholder="Select your option">
                            <datalist id="rank">
                                <?php
                                $options = array("IGP", "SDIG", "DIG", "SSP", "SP", "ASP", "CIP", "IP", "SI", "PS 1", "PS 2", "PC 1", "PC 2", "PC 3", "PC 4");
                                foreach ($options as $option) {
                                    echo "<option value='" . $option . "'>" . $option . "</option>";
                                }
                                ?>
                            </datalist>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Police Station</label></td>
                        <td>
                            <input class="select" name="pStation" id="select-pStation" placeholder="Select your option">
                            <datalist id="pStation">
                                <?php
                                $options = array(
                                    "Colombo",
                                    "Gampaha",
                                    "Kalutara",
                                    "Kandy",
                                    "Matale",
                                    "Nuwara Eliya",
                                    "Galle",
                                    "Matara",
                                    "Hambantota",
                                    "Jaffna",
                                    "Kilinochchi",
                                    "Mannar",
                                    "Vavuniya",
                                    "Mullaitivu",
                                    "Batticaloa",
                                    "Ampara",
                                    "Trincomalee",
                                    "Kurunegala",
                                    "Puttalam",
                                    "Anuradhapura",
                                    "Polonnaruwa",
                                    "Badulla",
                                    "Moneragala",
                                    "Ratnapura",
                                    "Kegalle"
                                );
                                foreach ($options as $option) {
                                    echo "<option value='" . $option . "'>" . $option . "</option>";
                                }
                                ?>
                            </datalist>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Email Address</label></td>
                        <td><input type="text" name="email" id="email"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="btn-group">
                                <a href="po-view.php">
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

<script src="../../public/js/datalist-po.js"></script>