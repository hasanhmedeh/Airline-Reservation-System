<div class="admin_details_container">
    <h3 class="details_title text-primary">Flights</h3>

    <!-- live tiket table -->
    <table class="admin_table table">
        <thead>
            <tr>
                <th>Id</th>
                <th>flight</th>
                <th>airline</th>
                <th>flight price</th>
                <th>from</th>
                <th>to</th>
                <th>depature time</th>
                <th>arrival time</th>
                <th>available seats</th>
                <th>status</th>
            </tr>
        </thead>
        <tbody>
            <!-- get all flights -->
            <?php
                require_once "./../db_connection/db_connection.php";
                // Query
                $qry = "SELECT * FROM flightForAirline";

                // Get Result
                $result = odbc_exec($conn,$qry);
                $current = date("Y-m-d h:i:s");

                $count = 1;

                while ($flight = odbc_fetch_array($result))
                {
            ?>

            <tr>
                <td><?php echo $count; $count++; ?></td>
                <td><?php echo $flight['flight_name'] ?></td>
                <td><?php echo $flight['airline_name'] ?></td>
                <td><?php echo $flight['flight_price'] ?></td>
                <td><?php echo $flight['from_location'] ?></td>
                <td><?php echo $flight['to_location'] ?></td>
                <td><?php echo $flight['departure_time'] ?></td>
                <td><?php echo $flight['arrival_time'] ?></td>
                <td><?php echo $flight['total_seats'] ?></td>
                <td><?php 
                    if($flight['departure_time'] <= $current && $flight['arrival_time'] >= $current)
                        echo '<div style="width:20px; height: 20px; background-color: lightgreen; border-radius: 90%; box-shadow: 0 0 2px green"></div>';
                    else if($flight['departure_time'] <= $current && $flight['arrival_time'] <= $current)
                        echo '<div style="width:20px; height: 20px; background-color: red; border-radius: 90%; box-shadow: 0 0 2px red"></div>';
                    else
                        echo '<div style="width:20px; height: 20px; background-color: grey; border-radius: 90%; box-shadow: 0 0 2px grey"></div>';
                 ?></td>
            </tr>

            <?php 
                }
                odbc_free_result($result);

                // Close Connection
                odbc_close($conn);

             ?>
            
        </tbody>
    </table>
</div>