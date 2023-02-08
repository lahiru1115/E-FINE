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
                    <h1>Add New RMV Admin</h1>
                </div>
            </div>
            <div class="container">
                <form method="post" action="../includes/system-admin/rmv-add.inc.php">
                    <table class="form rmv">
                        <tr>
                            <td><label>RMV Admin Id</label></td>
                            <td>
                                <?php
                                $table = "rmv_admin";
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