<?php include("sa-dbh.inc.php"); ?>

<html>

<head>
<?php include("sa-head.php"); ?>
</head>

<body>

    <?php include("sa-sidebar.php"); ?>

    <section class="home-section">

        <?php include("sa-navbar.php"); ?>

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
                                        <td>
                                            <a><i class="bx bx-trash delBtn"></i></a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <?php include("../../include/main/errors.inc.php"); ?>
            </div>
        </div>

    </section>

</body>

</html>