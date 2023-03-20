<?php
include_once("sa-dbh.inc.php");
include_once("sa-head.php");
include_once("sa-sidebar.php");
include_once("sa-navbar.php");

$table = "laws";
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
                <h1>Add New Traffic Violation Law</h1>
            </div>
        </div>
        <div class="container">
            <form method="post" action="../../includes/system-admin/law-add.inc.php">
                <table class="form form-law">
                    <tr>
                        <td><label>Violation Id</label></td>
                        <td><input type="text" name="id" id="id" class="disabled" disabled value=<?php echo $nextId; ?>></td>
                    </tr>
                    <tr>
                        <td><label>Act</label></td>
                        <td>
                            <select name="act" id="act">
                                <option value="Motor Traffic (AMENDMENT) Act, No. 8 of 2009">Motor Traffic (AMENDMENT) Act, No. 8 of 2009</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Part</label></td>
                        <td><input type="number" name="part" id="part" min="1"></td>
                    </tr>
                    <tr>
                        <td><label>Chapter</label></td>
                        <td><input type="number" name="chapter" id="chapter" min="1"></td>
                    </tr>
                    <tr>
                        <td><label>Section</label></td>
                        <td><input type="number" name="section" id="section" min="1"></td>
                    </tr>
                    <tr>
                        <td><label>Title</label></td>
                        <td><input type="text" name="title" id="title"></td>
                    </tr>
                    <tr>
                        <td><label>Law</label></td>
                        <td><textarea name="law" id="law" cols="50" rows="10"></textarea></td>
                    </tr>
                    <tr>
                        <td><label>Fine</label></td>
                        <td>
                            <div class="currency">
                                <input class="currency-symbol disabled" disabled value="Rs"></input>
                                <input type="number" name="fine" id="fine" class="currency-input" min="0">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Points</label></td>
                        <td><input type="number" name="points" id="points" min="0" max="24"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="btn-group">
                                <a href="law-view.php">
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