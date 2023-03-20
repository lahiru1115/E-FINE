<?php
include_once("sa-dbh.inc.php");
include_once("sa-head.php");

$table = "system_admin";
$result = nextId($conn, $table);
$nextId = $result;

ob_start();
include "../../includes/main/alerts.inc.php";
$alert = ob_get_clean();
?>

<div class="content content-bg">
    <div class="title-bar">
        <div class="heading">
            <h1>System Admin | Register</h1>
        </div>
    </div>
    <div class="container">
        <form method="post" action="../../includes/system-admin/sa-register.inc.php">
            <table class="form">
                <tr>
                    <td><label for="id">System Admin ID</label></td>
                    <td><input type="text" name="id" id="id" class="disabled" disabled value=<?php echo $nextId; ?>></td>
                </tr>
                <tr>
                    <td><label for="name">Name</label></td>
                    <td><input type="text" name="name" id="name"></td>
                </tr>
                <tr>
                    <td><label for="email">Email Address</label></td>
                    <td><input type="text" name="email" id="email"></td>
                </tr>
                <tr>
                    <td><label for="pwd">Password</label></td>
                    <td><input type="password" name="pwd" id="pwd"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="btn-group">
                            <a href="../../public/index.php">
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