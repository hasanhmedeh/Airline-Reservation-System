<div class="admin_layout_container bg-dark text-secondary" style="height: 93vh;">
    <h3 class="admin_layout_title">Panel</h3>

    <?php
        $page = "dashboardPage.php";
        $admin_active_class = "";
        if($page == basename($_SERVER['PHP_SELF'])) 
            $admin_active_class = "active_menu";
        $title = "Dashboard";
        $icon = "fa-solid fa-gauge";
        include "./menuItem.php"
    ?>
    <br/>
    <h3 class="admin_layout_title">Features</h3>

    <?php
        $page = "usersPage.php";
        $admin_active_class = "";
        if($page == basename($_SERVER['PHP_SELF'])) 
            $admin_active_class = "active_menu";
        $title = "Users";
        $icon = "fas fa-user-circle";
        include "./menuItem.php"
    ?>

    <?php
        $page = "airlineCompaniesPage.php";
        $admin_active_class = "";
        if($page == basename($_SERVER['PHP_SELF'])) 
            $admin_active_class = "active_menu";
        $title = "Airline Companies";
        $icon = "fa-solid fa-jet-fighter";
        include "./menuItem.php"
    ?>

    <?php
        $page = "flightsPage.php";
        $admin_active_class = "";
        if($page == basename($_SERVER['PHP_SELF'])) 
            $admin_active_class = "active_menu";
        $title = "Flights";
        $icon = "fas fa-plane";
        include "./menuItem.php"
    ?>

    <?php
        $page = "statsPage.php";
        $admin_active_class = "";
        if($page == basename($_SERVER['PHP_SELF'])) 
            $admin_active_class = "active_menu";
        $title = "Stats";
        $icon = "fas fa-signal";
        include "./menuItem.php"
    ?>

    <!-- logout -->
    <a href="../logout.php" style="text-decoration: none;"><h4 class="logout">Logout</h4></a>
</div>