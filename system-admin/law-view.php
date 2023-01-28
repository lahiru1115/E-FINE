<?php
session_start();
require_once('../includes/dbh.inc.php');
require_once('../includes/functions.inc.php');
?>

<html>

<head>
    <title>E-FINE</title>
    <link rel="stylesheet/less" type="text/css" href="../css/main.less" />
    <script src="../js/less.js" type="text/javascript"></script>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>

    <?php include("sidebar.php"); ?>

    <section class="home-section">

        <?php include("navbar.php"); ?>

        <div class="content">
            <div class="title-bar">
                <div class="heading">
                    <h1>Traffic Violation Laws</h1>
                </div>
                <div class="btn-group">
                    <a href="law-add.php"><button class="btn btn-primary">Add New</button></a>
                </div>
            </div>
            <div class="container">
                <div class="table">
                    <table>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Act</th>
                                <th>Title</th>
                                <th>Fine</th>
                                <th>Points</th>
                                <th>Timestamp</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result = lawView($conn);
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php if (strlen($row['act']) > 50) {
                                                echo substr($row['act'], 0, 50) . "...";
                                            } else {
                                                echo $row['act'];
                                            } ?></td>
                                        <td><?php if (strlen($row['title']) > 100) {
                                                echo substr($row['title'], 0, 100) . "...";
                                            } else {
                                                echo $row['title'];
                                            } ?></td>
                                        <td><?php echo $row['fine']; ?></td>
                                        <td><?php echo $row['points']; ?></td>
                                        <td><?php echo $row['timestamp']; ?></td>
                                        <td><i class='bx bx-detail'></i></td>
                                        <td><i class='bx bxs-edit'></i></td>
                                        <td><a data-toggle="modal" data-target="#my-modal"><i class='bx bx-trash'></i></a></td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <?php include("errors.php"); ?>
            </div>
        </div>

    </section>

    <div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <?php include("delete-model.php"); ?>
    </div>

</body>

</html>