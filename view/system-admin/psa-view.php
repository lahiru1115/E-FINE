<?php
include_once("sa-dbh.inc.php");
include_once("sa-head.php");
include_once("sa-sidebar.php");
include_once("sa-navbar.php"); ?>

<section class="home-section">

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
                    <?php
                    $table = "police_station_admin";
                    $result = viewAll($conn, $table);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) { ?>
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
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['province']; ?></td>
                                    <td><?php echo $row['district']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['addedBy']; ?></td>
                                    <td><?php echo $row['timestamp']; ?></td>
                                    <td><a href="law-viewMore.php?id=<?php echo $row['id']; ?>"><i class='bx bx-detail'></i></a></td>
                                    <td><a href="psa-edit.php?id=<?php echo $row['id']; ?>"><i class='bx bxs-edit'></i></a></td>
                                    <td><a href="deleteIssue.php?issueId=<?php echo $row['id']; ?>" onclick="return confirm('Delete?')"><i class="bx bx-trash delBtn"></i></a></td>
                                </tr>
                            </tbody>
                    <?php
                        }
                    }
                    ?>
                </table>
                <?php include("../../includes/main/alerts.inc.php"); ?>
            </div>
        </div>

    </div>

</section>