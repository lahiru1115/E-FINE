<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>E-FINE</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="sidebar close">
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
                        <img src="image/profile.jpg" alt="profileImg">
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
        <h3 class="i-name">
            Dashboard
        </h3>
        <div class="values">
            <div class="val-box">
                <span class="material-symbols-outlined">
                    <i class='bx bx-user'></i>
                </span>
                <div>
                    <h3>Remaining Points</h3>
                    <span>15</span>
                </div>
            </div>
            <div class="val-box">
                <span class="material-symbols-outlined">
                    <i class='bx bx-id-card'></i>
                </span>
                <div>
                    <h3>account Status</h3>
                    <span>active</span>
                </div>
            </div>

            <div class="val-box">
                <span class="material-symbols-outlined">
                    <i class='bx bxs-error'></i>
                </span>
                <div>
                    <h3>Total Violation</h3>
                    <span>10</span>
                </div>
            </div>



        </div>
        <h3 class="i-name">
            Pay Now
        </h3>
        <div class="board">
            <table class="overview-table" width="100%">
                <thead>
                    <td>Violation ID</td>
                    <td>Amount</td>
                    <td>Type</td>
                    <td>Remaining Days</td>
                    <td></td>
                </thead>
                <tbody>
                    <tr class="overview-tr">
                        <td>2000</td>
                        <td>2500.00</td>
                        <td>Crossing the double line</td>
                        <td>10 days remaining</td>
                        <td class="pay"><a href="#">PAY NOW</a></td>
                    </tr>
                    <tr class="overview-tr">
                        <td>
                            <a href="system-admin/law-add.php">01</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <script src="js/script.js"></script>

</body>

</html>