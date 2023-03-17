<?php include("sa-dbh.inc.php"); ?>

<html>

<head>
    <?php include("sa-head.php"); ?>
</head>

<body>

    <?php include("sa-sidebar.php"); ?>

    <section class="home-section">

        <?php include("sa-navbar.php"); ?>

        <?php
        echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
        ?>

    </section>

</body>

</html>