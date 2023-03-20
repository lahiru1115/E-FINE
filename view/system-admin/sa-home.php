<!-- Not optimized -->

<?php
include_once("sa-dbh.inc.php");
include_once("sa-head.php");
include_once("sa-sidebar.php");
include_once("sa-navbar.php");
?>

<section class="home-section">
    <?php
    echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
    ?>
</section>