<?php
session_start();
require_once('../includes/dbh.inc.php');
require_once('../includes/functions.inc.php');
?>

<html>

<head>
    <title>E-FINE</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet/less" type="text/css" href="../css/main.less" />
    <script src="../js/less.js" type="text/javascript"></script>
</head>

<body>

    <?php include("sidebar.php"); ?>

    <section class="home-section">

        <?php include("navbar.php"); ?>

        <h3 class="i-name">
            System Admin
        </h3>

        <div class="values">
            <div class="val-box">
                <span class="material-symbols-outlined">
                    <i class='bx bx-user'></i>
                </span>
                <div>
                    <h3>Total Traffic Laws</h3>
                    <span>15</span>
                </div>
            </div>
            <div class="val-box">
                <span class="material-symbols-outlined">
                    <i class='bx bx-id-card'></i>
                </span>
                <div>
                    <h3>Total Police Officers</h3>
                    <span>56</span>
                </div>
            </div>

            <div class="val-box">
                <span class="material-symbols-outlined">
                    <i class='bx bxs-error'></i>
                </span>
                <div>
                    <h3>Total Police Stations</h3>
                    <span>10</span>
                </div>
            </div>
        </div>

    </section>

</body>

</html>