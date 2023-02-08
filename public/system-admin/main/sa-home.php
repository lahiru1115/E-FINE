<?php
session_start();
require_once('../../../db/dbh.php');
?>

<html>

<head>
    <title>E-FINE</title>
    <link rel="stylesheet/less" type="text/css" href="../../../css/main.less" />
    <link rel="stylesheet/less" type="text/css" href="../../../css/style.less" />
    <script type="text/javascript" src="../../../js/less.js"></script>
</head>

<body>

    <?php include("../../main/sidebar.php"); ?>

    <section class="home-section">

        <?php include("../../main/navbar.php"); ?>

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

        <div class="board">
            <table class="overview-table" width="100%">
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