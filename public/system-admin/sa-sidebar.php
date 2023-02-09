<?php include("sa-dbh.inc.php"); ?>

<html>

<head>
    <?php include("sa-head.php"); ?>
</head>

<body>

    <div class="sidebar">
        <div class="logo">
            <i class='bx bx-menu'></i>
            <a href="sa-home.php">
                <img src="assets/logo.png">
            </a>
        </div>

        <ul class="nav-links">
            <div class="current">
                <li>
                    <a href="sa-home.php">
                        <i class='bx bx-grid-alt'></i>
                        <span class="link_name">Overview</span>
                        <ul class="sub-menu blank">
                            <li><a class="link_name">Overview</a></li>
                        </ul>
                    </a>
                </li>
            </div>

            <li>
                <a href="law-view.php">
                    <i class='bx bx-error-circle'></i>
                    <span class="link_name">Traffic Laws</span>
                    <ul class="sub-menu blank">
                        <li><a class="link_name">Traffic Laws</a></li>
                    </ul>
                </a>
            </li>

            <li>
                <a href="po-view.php">
                    <i class='bx bx-error-circle'></i>
                    <span class="link_name">Police Officer</span>
                    <ul class="sub-menu blank">
                        <li><a class="link_name">Police Officer</a></li>
                    </ul>
                </a>
            </li>

            <li>
                <a href="psa-view.php">
                    <i class='bx bx-error-circle'></i>
                    <span class="link_name">Police Station</span>
                    <ul class="sub-menu blank">
                        <li><a class="link_name">Police Station</a></li>
                    </ul>
                </a>
            </li>

            <li>
                <a href="rmv-view.php">
                    <i class='bx bx-error-circle'></i>
                    <span class="link_name">RMV Admin</span>
                    <ul class="sub-menu blank">
                        <li><a class="link_name">RMV Admin</a></li>
                    </ul>
                </a>
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
                <div class="profile-details">
                    <!-- <div class="profile-content">
                        <img src="image/profile.jpg" alt="profileImg">
                    </div> -->
                    <div class="name-job">
                        <div class="profile_name">Lahiru</div>
                        <div class="job">lahirudissanayake15@gmail.com</div>
                    </div>
                    <a href="../include/logout.php"><i class='bx bx-log-out'></i></a>
                </div>
            </li>
        </ul>
    </div>

    <script src="js/sidebar.js"></script>

</body>

</html>