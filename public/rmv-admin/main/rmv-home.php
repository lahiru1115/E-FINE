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
            RMV Admin
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
                </thead>
                <tbody>
                    <tr class="overview-tr">
                        <td>
                            <?php
                            echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
                            ?>
                        </td>
                        <td>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </section>

</body>

</html>