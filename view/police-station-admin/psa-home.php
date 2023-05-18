<!-- Not optimized -->

<?php
include_once("../system-admin/sa-dbh.inc.php");
include_once("../system-admin/sa-head.php");
include_once("../system-admin/sa-sidebar.php");
include_once("../system-admin/sa-navbar.php");
?>

<section class="home-section">
    <?php
    echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
    ?>
</section>