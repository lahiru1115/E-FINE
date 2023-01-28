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
</head>

<body>

    <?php include("sidebar.php"); ?>

    <section class="home-section">

        <?php include("navbar.php"); ?>

        <div class="content">
            <div class="title-bar">
                <div class="heading">
                    <h1>Police Officers</h1>
                </div>
                <div class="btn-group">
                    <a href="po-add.php"><button class="btn btn-primary">Add New</button></a>
                </div>
            </div>
            <div class="container">
                <div class="table">
                    <table>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Service No</th>
                                <th>Rank</th>
                                <th>Police Station</th>
                                <th>Email</th>
                                <th>Timestamp</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result = poView($conn);
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['sNo']; ?></td>
                                        <td><?php echo $row['rank']; ?></td>
                                        <td><?php echo $row['pStation']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['timestamp']; ?></td>
                                        <td><i class='bx bx-detail'></i></td>
                                        <td><i class='bx bxs-edit'></i></td>
                                        <td><i class='bx bx-trash'></i></td>
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

</body>

</html>