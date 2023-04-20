<?php
include_once("sa-dbh.inc.php");
include_once("sa-head.php");
include_once("sa-sidebar.php");
include_once("sa-navbar.php");

$row = lawGetData($conn);

ob_start();
include "../../includes/main/alerts.inc.php";
$alert = ob_get_clean();
?>

<section class="home-section">

    <div class="content">
        <div class="title-bar">
            <div class="heading">
                <h1>Edit Traffic Violation Law</h1>
            </div>
        </div>
        <div class="container">
            <form method="post" action="../../includes/system-admin/law-edit.inc.php">
                <table class="form form-law">
                    <tr>
                        <td><label>Violation Id</label></td>
                        <td><input type="text" name="id" id="id" class="disabled" readonly value="<?php echo $row['id']; ?>"></td>
                    </tr>
                    <tr>
                        <td><label>Act</label></td>
                        <td>
                            <input class="select" name="act" id="select-act" value="<?php echo $row['act']; ?>">
                            <datalist id="act">
                                <?php
                                $options = array("Motor Traffic (AMENDMENT) Act, No. 8 of 2009");
                                foreach ($options as $option) {
                                    echo "<option value='" . $option . "'>" . $option . "</option>";
                                }
                                ?>
                            </datalist>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Part</label></td>
                        <td><input type="number" name="part_number" id="part_number" min="1" value="<?php echo $row['part_number']; ?>"></td>
                    </tr>
                    <tr>
                        <td><label>Chapter</label></td>
                        <td><input type="number" name="chapter_number" id="chapter_number" min="1" value="<?php echo $row['chapter_number']; ?>"></td>
                    </tr>
                    <tr>
                        <td><label>Section</label></td>
                        <td><input type="number" name="section_number" id="section_number" min="1" value="<?php echo $row['section_number']; ?>"></td>
                    </tr>
                    <tr>
                        <td><label>Title</label></td>
                        <td><input type="text" name="title" id="title" value="<?php echo $row['title']; ?>"></td>
                    </tr>
                    <tr>
                        <td><label>Law</label></td>
                        <td><textarea name="law_text" id="law_text" cols="50" rows="10"><?php echo $row['law_text']; ?></textarea></td>
                    </tr>
                    <tr>
                        <td><label>Fine</label></td>
                        <td>
                            <div class="currency">
                                <input class="currency-symbol disabled" disabled value="Rs"></input>
                                <input type="number" name="fine_amount" id="fine_amount" class="currency-input" min="0" value="<?php echo $row['fine_amount']; ?>">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Points</label></td>
                        <td><input type="number" name="points_deducted" id="points_deducted" min="0" max="24" value="<?php echo $row['points_deducted']; ?>"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="btn-group">
                                <a href="law-view.php">
                                    <div class="btn btn-secondary">Cancel</div>
                                </a>
                                <button class="btn btn-primary" type="submit" name="submit">Update</button>
                                <?php echo $alert; ?>
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

</section>

<script src="../../public/js/datalist-law.js"></script>