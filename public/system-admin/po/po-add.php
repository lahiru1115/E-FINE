<?php
session_start();
require_once('../includes/dbh.inc.php');
require_once('../includes/functions.inc.php');
?>

<html>

<head>
    <title>E-FINE</title>
    <link rel="stylesheet/less" type="text/css" href="../../../css/main.less" />
    <script type="text/javascript" src="../../../js/less.js"></script>
</head>

<body>

    <?php include("sidebar.php"); ?>

    <section class="home-section">

        <?php include("navbar.php"); ?>

        <div class="content">
            <div class="title-bar">
                <div class="heading">
                    <h1>Add New Police Officer</h1>
                </div>
            </div>
            <div class="container">
                <form method="post" action="../includes/system-admin/po-add.inc.php">
                    <table class="form po">
                        <tr>
                            <td><label>Police Officer Id</label></td>
                            <td>
                                <?php
                                $table = "police_officer";
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
                            <td><label>Service No</label></td>
                            <td><input type="number" name="sNo" id="sNo" min="0"></td>
                        </tr>
                        <tr>
                            <td><label>Rank</label></td>
                            <td>
                                <select name="rank" id="rank">
                                    <option value="IGP">IGP</option>
                                    <option value="SDIG">SDIG</option>
                                    <option value="DIG">DIG</option>
                                    <option value="SSP">SSP</option>
                                    <option value="SP">SP</option>
                                    <option value="ASP">ASP</option>
                                    <option value="CIP">CIP</option>
                                    <option value="IP">IP</option>
                                    <option value="SI">SI</option>
                                    <option value="PS 1">PS 1</option>
                                    <option value="PS 2">PS 2</option>
                                    <option value="PC 1">PC 1</option>
                                    <option value="PC 2">PC 2</option>
                                    <option value="PC 3">PC 3</option>
                                    <option value="PC 4">PC 4</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Police Station</label></td>
                            <td>
                                <select name="pStation" id="pStation">
                                    <option value="Colombo">Colombo</option>
                                    <option value="Gampaha">Gampaha</option>
                                    <option value="Kalutara">Kalutara</option>
                                    <option value="Kandy">Kandy</option>
                                    <option value="Matale">Matale</option>
                                    <option value="Nuwara Eliya">Nuwara Eliya</option>
                                    <option value="Galle">Galle</option>
                                    <option value="Matara">Matara</option>
                                    <option value="Hambantota">Hambantota</option>
                                    <option value=" Jaffna"> Jaffna</option>
                                    <option value="Kilinochchi">Kilinochchi</option>
                                    <option value="Mannar">Mannar</option>
                                    <option value="Vavuniya">Vavuniya</option>
                                    <option value="Mullaitivu">Mullaitivu</option>
                                    <option value="Batticaloa">Batticaloa</option>
                                    <option value="Ampara">Ampara</option>
                                    <option value="Trincomalee">Trincomalee</option>
                                    <option value="Kurunegala">Kurunegala</option>
                                    <option value="Puttalam">Puttalam</option>
                                    <option value="Anuradhapura">Anuradhapura</option>
                                    <option value="Polonnaruwa">Polonnaruwa</option>
                                    <option value="Badulla">Badulla</option>
                                    <option value="Moneragala">Moneragala</option>
                                    <option value="Ratnapura">Ratnapura</option>
                                    <option value="Kegalle">Kegalle</option>
                                </select>
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
                                    <?php include("errors.php"); ?>
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