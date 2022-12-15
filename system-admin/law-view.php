<?php
session_start();
require_once('../includes/dbh.inc.php');
require_once('../includes/functions.inc.php');
?>

<html>

<head>
    <title>E-FINE</title>
    <link rel="stylesheet" href="../css/main.css">
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
                                <th>Part</th>
                                <th>Chapter</th>
                                <th>Section</th>
                                <th>Title</th>
                                <th>Fine</th>
                                <th>Points</th>
                                <th>View</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result = lawView($conn);
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['act']; ?></td>
                                        <td><?php echo $row['part']; ?></td>
                                        <td><?php echo $row['chapter']; ?></td>
                                        <td><?php echo $row['section']; ?></td>
                                        <td><?php echo $row['title']; ?></td>
                                        <td><?php echo $row['fine']; ?></td>
                                        <td><?php echo $row['points']; ?></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
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