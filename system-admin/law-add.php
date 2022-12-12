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
                        <h1>Add New Traffic Violation Law</h1>
                    </div>
                </div>
                <div class="container">
                    <form method="post" action="../includes/system-admin/law-add.inc.php">
                        <table class="form law">
                            <tr>
                                <td><label>Violation Id</label></td>
                                <td>
                                    <?php
                                    $table = "laws";
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
                                <td><label>Act</label></td>
                                <td>
                                    <select name="act" id="act">
                                        <option value="Motor Traffic (AMENDMENT) Act, No. 8 of 2009">Motor Traffic (AMENDMENT) Act, No. 8 of 2009</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Part</label></td>
                                <td><input type="number" name="part" id="part" min="1"></td>
                            </tr>
                            <tr>
                                <td><label>Chapter</label></td>
                                <td><input type="number" name="chapter" id="chapter" min="1"></td>
                            </tr>
                            <tr>
                                <td><label>Section</label></td>
                                <td><input type="number" name="section" id="section" min="1"></td>
                            </tr>
                            <tr>
                                <td><label>Title</label></td>
                                <td><input type="text" name="title" id="title"></td>
                            </tr>
                            <tr>
                                <td><label>Law</label></td>
                                <td><textarea name="law" id="law" cols="50" rows="10"></textarea></td>
                            </tr>
                            <tr>
                                <td><label>Fine</label></td>
                                <td>
                                    <div class="currency">
                                        <input class="currency-symbol disabled" disabled value="Rs"></input>
                                        <input type="number" name="fine" id="fine" class="currency-input" min="0">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Points</label></td>
                                <td><input type="number" name="points" id="points" min="0" max="24"></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="btn-group">
                                        <button class="btn btn-secondary">Cancel</button>
                                        <button class="btn btn-primary" type="submit" name="submit">Save</button>
                                        <?php
                                        if (isset($_GET["error"])) {
                                            if ($_GET["error"] == "emptyInput") {
                                                echo "<p>Fill in all the fields!</p>";
                                            } else if ($_GET["error"] == "stmtFailed") {
                                                echo "<p>Something went wrong!</p>";
                                            } else if ($_GET["error"] == "none") {
                                                echo "<p>Message Sent!</p>";
                                            }
                                        }
                                        ?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </form>

                </div>
            </div>
        </div>
    </section>

    <script src="../js/script.js"></script>

</body>

</html>