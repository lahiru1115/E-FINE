<?php
include_once("sa-dbh.inc.php");
include_once("sa-head.php");
include_once("sa-sidebar.php");
include_once("sa-navbar.php");

$table = "police_station_admin";
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
                <h1>Add New Police Station Admin</h1>
            </div>
        </div>

        <div class="container">
            <form method="post" action="../../includes/system-admin/psa-add.inc.php">
                <table class="form psa">
                    <tr>
                        <td><label>Police Station Id</label></td>
                        <td><input type="text" name="id" id="id" class="disabled" disabled value=<?php echo $nextId; ?>></td>

                    </tr>
                    <tr>
                        <td><label>Province</label></td>
                        <td>
                            <select name="province" id="province">
                                <option value="Western Province">Western Province</option>
                                <option value="Central Province">Central Province</option>
                                <option value="North Central Province">North Central Province</option>
                                <option value="Northern Province">Northern Province</option>
                                <option value="Eastern Province">Eastern Province</option>
                                <option value="North Western Province">North Western Province</option>
                                <option value="Southern Province">Southern Province</option>
                                <option value="Uva Province">Uva Province</option>
                                <option value="Sabaragamuwa Province">Sabaragamuwa Province</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label>District</label></td>
                        <td>
                            <select name="district" id="district">
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
                        <td><label>Police Station Name</label></td>
                        <td><input type="text" name="name" id="name"></td>
                    </tr>
                    <tr>
                        <td><label>Email Address</label></td>
                        <td><input type="text" name="email" id="email"></td>
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