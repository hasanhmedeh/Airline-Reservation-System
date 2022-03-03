<div class="admin_details_container">
    <h3 class="details_title text-primary">Statistics</h3>
    <!-- open connection to the database -->
    <?php require_once "./../db_connection/db_connection.php"; ?>

    <div class="d-flex justify-content-around">

        <!-- total number of users -->
        <?php
            
            // Query
            $qry = "SELECT count(*) as total FROM loginAccount WHERE role = 'client'";

            // Get Result
            $result = odbc_exec($conn,$qry);

            $color = "green";
            $name = "Number of users";
            $data = odbc_fetch_array($result)['total'];
            include "statCard.php";
        ?>

        <!-- total number of companies -->
        <?php
            
            // Query
            $qry = "SELECT count(*) as total FROM loginAccount WHERE role = 'company'";

            // Get Result
            $result = odbc_exec($conn,$qry);

            $color = "blue";
            $name = "Number of companies";
            $data = odbc_fetch_array($result)['total'];
            include "statCard.php";
        ?>

    </div>

        <h3 class="details_title text-primary">Reservations Per Day</h3>

        <!-- number of reservations per day -->
        <table class="admin_table table">
        <thead>
            <tr>
                <th>passenger</th>
                <th>booking date</th>
                <th>number of reservations</th>
            </tr>
        </thead>
        <tbody>
            <!-- get all flights -->
            <?php
                require_once "./../db_connection/db_connection.php";
                // Query
                $qry = "SELECT * FROM nbOfReservationsInDay";

                // Get Result
                $result = odbc_exec($conn,$qry);
                while ($record = odbc_fetch_array($result))
                {
            ?>

            <tr>
                <td><?php echo $record['passenger_username'] ?></td>
                <td><?php echo $record['booking_date'] ?></td>
                <td><?php echo $record['nbReservedInDay'] ?></td>
            </tr>

            <?php 
                }
                odbc_free_result($result);
             ?>
            
        </tbody>
    </table>


        <h3 class="details_title text-primary">Company reservations</h3>

        <!-- number of reservations per day -->
        <table class="admin_table table">
        <thead>
            <tr>
                <th>passenger</th>
                <th>airline</th>
                <th>number of reservations</th>
            </tr>
        </thead>
        <tbody>
            <!-- get all flights -->
            <?php
                require_once "./../db_connection/db_connection.php";
                // Query
                $qry = "SELECT * FROM nbOfReservationsForCompany";

                // Get Result
                $result = odbc_exec($conn,$qry);
                while ($record = odbc_fetch_array($result))
                {
            ?>

            <tr>
                <td><?php echo $record['passenger_username'] ?></td>
                <td><?php echo $record['airline_name'] ?></td>
                <td><?php echo $record['nbReservations'] ?></td>
            </tr>

            <?php 
                }
                odbc_free_result($result);
             ?>
            
        </tbody>
    </table>


        <h3 class="details_title text-primary">Company Profits Per Day</h3>

        <!-- number of reservations per day -->
        <table class="admin_table table">
        <thead>
            <tr>
                <th>airline</th>
                <th>date</th>
                <th>profits</th>
            </tr>
        </thead>
        <tbody>
            <!-- get all flights -->
            <?php
                require_once "./../db_connection/db_connection.php";
                // Query
                $qry = "SELECT * FROM airlineCompanyProfits";

                // Get Result
                $result = odbc_exec($conn,$qry);
                while ($record = odbc_fetch_array($result))
                {
            ?>

            <tr>
                <td><?php echo $record['airline_name'] ?></td>
                <td><?php echo $record['date'] ?></td>
                <td><?php echo $record['profits'] ?></td>
            </tr>

            <?php 
                }
                odbc_free_result($result);
             ?>
            
        </tbody>
    </table>


    <!-- close the connection -->
    <?php 
        odbc_close($conn);
    ?>
</div>