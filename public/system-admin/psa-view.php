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
                    <h1>Police Station Admins</h1>
                </div>
                <div class="btn-group">
                    <a href="psa-add.php"><button class="btn btn-primary">Add New</button></a>
                </div>
            </div>
            <div class="container">
                <div class="table">
                    <table>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Province</th>
                                <th>District</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Added by</th>
                                <th>Timestamp</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result = psaView($conn);
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['province']; ?></td>
                                        <td><?php echo $row['district']; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['addedBy']; ?></td>
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
                <?php include("../../include/main/errors.inc.php"); ?>
            </div>
        </div>

    </section>

</body>

</html>