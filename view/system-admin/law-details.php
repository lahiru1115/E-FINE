<?php
include_once("sa-dbh.inc.php");
include_once("sa-head.php");
include_once("sa-sidebar.php");
include_once("sa-navbar.php");

$row = lawGetData($con);

ob_start();
include "../../includes/main/alerts.inc.php";
$alert = ob_get_clean();
?>

<section class="home-section">

    <div class="content">
        <div class="title-bar">
            <div class="heading">
                <h1><?php echo $row['title']; ?></h1>
            </div>
        </div>
        <div class="container">
            <form method="post" action="../../includes/system-admin/law-edit.inc.php">
                <table class="form form-law">
                    <tr>
                        <td><label>Violation Id</label></td>
                        <td><input type="text" name="id" id="id" class="disabled" value="<?php echo $row['id']; ?>" readonly></td>
                    </tr>
                    <tr>
                        <td><label>Act</label></td>
                        <td><input type="text" name="act" id="act" class="disabled" value="<?php echo $row['act']; ?>" readonly></td>
                    </tr>
                    <tr>
                        <td><label>Part</label></td>
                        <td><input type="number" name="part_number" id="part_number" min="1" class="disabled" value="<?php echo $row['part_number']; ?>" readonly></td>
                    </tr>
                    <tr>
                        <td><label>Chapter</label></td>
                        <td><input type="number" name="chapter_number" id="chapter_number" min="1" class="disabled" value="<?php echo $row['chapter_number']; ?>" readonly></td>
                    </tr>
                    <tr>
                        <td><label>Section</label></td>
                        <td><input type="number" name="section_number" id="section_number" min="1" class="disabled" value="<?php echo $row['section_number']; ?>" readonly></td>
                    </tr>
                    <tr>
                        <td><label>Title</label></td>
                        <td><input type="text" name="title" id="title" class="disabled" value="<?php echo $row['title']; ?>" readonly></td>
                    </tr>
                    <tr>
                        <td><label>Law</label></td>
                        <td><textarea name="law_text" id="law_text" cols="50" rows="10" class="disabled" readonly><?php echo $row['law_text']; ?></textarea></td>
                    </tr>
                    <tr>
                        <td><label>Fine</label></td>
                        <td>
                            <div class="currency">
                                <input class="currency-symbol disabled" disabled value="Rs"></input>
                                <input type="number" name="fine_amount" id="fine_amount" class="currency-input disabled" min="0" value="<?php echo $row['fine_amount']; ?>">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Points</label></td>
                        <td><input type="number" name="points_deducted" id="points_deducted" min="0" max="24" class="disabled" value="<?php echo $row['points_deducted']; ?>"></td>
                    </tr>
                    <!-- <tr>
                        <td colspan="2">
                            <div class="btn-group">
                                <a href="law-view.php">
                                    <div class="btn btn-secondary">Cancel</div>
                                </a>
                                <button class="btn btn-primary" type="submit" name="submit">Update</button>
                                <?php echo $alert; ?>
                            </div>
                        </td>
                    </tr> -->
                </table>
            </form>
        </div>
    </div>

</section>

<script src="../../public/js/datalist-law.js"></script>