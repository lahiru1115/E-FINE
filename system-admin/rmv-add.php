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
                        <h1>Add New RMV Admin</h1>
                    </div>
                </div>
                <div class="container">
                    <form method="post" action="includes/system-admin/law-add.inc.php">
                        <table class="form rmv">
                            <tr>
                                <td><label>RMV Admin Id</label></td>
                                <td><input type="text" name="rmvId" id="rmvId" class="disabled" disabled value="001"></td>
                            </tr>
                            <tr>
                                <td><label>Name</label></td>
                                <td><input type="text" name="name" id="name"></td>
                            </tr>
                            <tr>
                                <td><label>Email Address</label></td>
                                <td><input type="email" name="email" id="email"></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="btn-group">
                                        <button class="btn btn-secondary" type="submit" name="submit">Cancel</button>
                                        <button class="btn btn-primary" type="submit" name="submit">Save</button>
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