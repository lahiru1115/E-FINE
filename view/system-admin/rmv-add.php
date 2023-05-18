<?php
include_once("sa-dbh.inc.php");
include_once("sa-head.php");
include_once("sa-sidebar.php");
include_once("sa-navbar.php");

$table = "rmv_admin";
$result = nextId($con, $table);
$nextId = $result;

ob_start();
include "../../includes/main/alerts.inc.php";
$alert = ob_get_clean();
?>

<section class="home-section">

    <div class="content">

        <div class="title-bar">
            <div class="heading">
                <h1>Add New RMV Admin</h1>
            </div>
        </div>

        <div class="container">
            <form method="post" action="../../includes/system-admin/rmv-add.inc.php">
                <table class="form rmv">
                    <tr>
                        <td><label>RMV Admin Id</label></td>
                        <td><input type="text" name="id" id="id" class="disabled" disabled value=<?php echo $nextId; ?>></td>
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
                        <td colspan="2">
                            <div class="btn-group">
                                <a href="rmv-view.php">
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