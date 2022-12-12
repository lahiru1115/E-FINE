<?php session_start();
require_once('../includes/dbh.inc.php');
require_once('../includes/functions.inc.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>E-FINE</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css'>
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <a href="dashboard.php"><i class='bx bx-taxi'></a></i>
            <span class="logo_name">E-Fine</span>
        </div>

        <ul class="nav-links">
            <div class="current">
                <li>
                    <a href="dashboard.php">
                        <i class='bx bx-grid-alt'></i>
                        <span class="link_name">Overview</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="dashboard.php">overview</a></li>
                    </ul>
                </li>
            </div>

            <li>
                <a href="pendingFines.php">
                    <i class='bx bx-error-circle'></i>
                    <span class="link_name">Pending Fines</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="pendingFines.php">Pending Fines</a></li>
                </ul>
            </li>


            <li>
                <a href="ViolationHistory.php">
                    <i class='bx bx-history'></i>
                    <span class="link_name">Violation History</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="ViolationHistory.php">Violation History</a></li>
                </ul>
            </li>

            <li>
                <div class="iocn-link">
                    <a href="Profile.php">
                        <i class='bx bx-user'></i>
                        <span class="link_name">Profile</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="Profile.php">Profile</a></li>
                    <li><a href="#">Change Details </a></li>

                </ul>
            </li>

            <li>
                <a href="ReportProblem.php">
                    <i class='bx bx-error'></i>
                    <span class="link_name">Report a Problem</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="ReportProblem.php">Report a Problem</a></li>
                </ul>
            </li>

            <li>
                <div class="profile-details">
                    <div class="profile-content">
                        <img src="image/profile.jpg" alt="">
                    </div>
                    <div class="name-job">
                        <div class="profile_name">Navindu </div>
                        <div class="job">20030400254</div>
                    </div>
                    <a href="./include/logout.php"><i class='bx bx-log-out'></i></a>
                </div>
            </li>
        </ul>

    </div>

    <section class="home-section">
        <div class="home-content">
            <i class='bx bx-menu'></i>
            <div class="right-side-items">
                <i class='bx bx-bell'></i>
                <div class="profile">
                    <img src="image/1.jpg" alt="">
                </div>
            </div>
        </div>
        <div>
            <div class="content">
                <div class="title-bar">
                    <div class="heading">
                        <h1>Traffic Violation Laws</h1>
                    </div>
                    <div class="btn-group">
                        <button class="btn btn-primary" type="submit" name="submit">Add New</button>
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
                    <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "cantUpdate") {
                            echo "<p class=\"warning\">Can't update the issue at the moment!</p>";
                        } else if ($_GET["error"] == "cantDelete") {
                            echo "<p class=\"warning\">Can't delete the issue at the moment!</p>";
                        } else if ($_GET["error"] == "notWorking") {
                            echo "<p class=\"success\">There are no issues available!</p>";
                        } else if ($_GET["error"] == "deleted") {
                            echo "<p class=\"success\">Issue details Deleted!</p>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <script src="../js/script.js"></script>

</body>

</html>