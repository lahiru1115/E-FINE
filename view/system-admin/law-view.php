<?php
include_once("sa-dbh.inc.php");
include_once("sa-head.php");
include_once("sa-sidebar.php");
include_once("sa-navbar.php"); ?>

<section class="home-section">

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
                        $table = "laws";
                        $result = viewAll($conn, $table);
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
                                    <td><a href="law-viewMore.php?id=<?php echo $row['id']; ?>"><i class='bx bx-detail'></i></a></td>
                                    <td><a href="law-edit.php?id=<?php echo $row['id']; ?>"><i class='bx bxs-edit'></i></a></td>
                                    <td><a href="../../includes/system-admin/law-delete.inc.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Delete?')"><i class="bx bx-trash delBtn"></i></a></td>
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