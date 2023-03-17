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
                                        <td><?php echo $row['serviceNo']; ?></td>
                                        <td><?php echo $row['rank']; ?></td>
                                        <td><?php echo $row['policeStation']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['timestamp']; ?></td>
                                        <td><a href="law-viewMore.php?id=<?php echo $row['id']; ?>"><i class='bx bx-detail'></i></a></td>
                                        <td><a href="po-edit.php?id=<?php echo $row['id']; ?>"><i class='bx bxs-edit'></i></a></td>
                                        <td><a href="deleteIssue.php?issueId=<?php echo $row['id']; ?>" onclick="return confirm('Delete?')"><i class="bx bx-trash delBtn"></i></a></td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php include("../../includes/main/alerts.inc.php"); ?>
                </div>
            </div>
        </div>

    </section>

</body>

</html>