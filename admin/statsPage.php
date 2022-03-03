<?php
    $pageName = "admin_page";
    $pageTitle = "admin panel";
    $bootStrapVersion = 6;
    require_once '../assets/head.php';
    require_once '../assets/navbar.php';
?>


<div class="admin_container">
    
    <?php
        include './layout.php';
        include './stats.php';
    ?>
</div>
