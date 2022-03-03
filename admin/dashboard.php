<div class="admin_details_container">
    <h3 class="details_title text-primary">Dashboard</h3>

    <!-- choose cards that navigate to the chosen destinations -->
    <div class="row px-2">
        <?php
            $cardColor = "bg-primary";
            $title = "Users";
            $description = "With supporting text below as a natural lead-in to additional content.";
            $page = "usersPage.php";
            $buttonText = " Go To Users";
            include "./dashboard_card.php";
        ?>
        <?php
            $cardColor = "bg-secondary";
            $title = "Airline Companies";
            $description = "With supporting text below as a natural lead-in to additional content.";
            $page = "airlineCompaniesPage.php";
            $buttonText = " Go To Airline Companies";
            include "./dashboard_card.php";
        ?>
        <?php
            $cardColor = "bg-dark";
            $title = "Flights";
            $description = "With supporting text below as a natural lead-in to additional content.";
            $page = "flightsPage.php";
            $buttonText = " Go To Flights";
            include "./dashboard_card.php";
        ?>

        <?php
            $cardColor = "bg-info";
            $title = "Stats";
            $description = "With supporting text below as a natural lead-in to additional content.";
            $page = "statsPage.php";
            $buttonText = " View Stats";
            include "./dashboard_card.php";
        ?>
        
    </div>
    

</div>