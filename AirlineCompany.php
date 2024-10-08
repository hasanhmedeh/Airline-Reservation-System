<?php 
    $pageName = "flight_page";
    $pageTitle = "View Flights";
    $bootStrapVersion = 6;

    require_once 'assets/head.php';
    require_once 'assets/navbar.php';
    require_once 'db_connection/db_connection.php';

    
    if(isset($_GET['flight_id']))
    {
        $id = $_GET['flight_id'];
        $update = "DELETE FROM flight where flight_id = $id";
        odbc_exec($conn,$update);
        header("Location: AirlineCompany.php");
    }

    $query = "SELECT * FROM creditCard c, airlineCompany a WHERE airline_id = '". $_SESSION['id'] ."' AND c.credit_number = a.credit_number";
    
    $result = odbc_exec($conn, $query);
    $creditInfo = odbc_fetch_array($result);
?>
<div class="container">

<a class="floatingBtn" href="AddFlight.php"><i class="fas fa-plus "></i></a>
<a class="floatingLogout" href="logout.php"><i class="fa fa-power-off" aria-hidden="true"></i></a>

<figure class="text-center">
  <blockquote class="blockquote">
    <h3 class="airline_subtitle">Welcome <?php 
        $id = $_SESSION['id'];
        $getAirline = "SELECT airline_name from airlineCompany where airline_id = $id";
        $airline = odbc_exec($conn,$getAirline);
        echo odbc_fetch_array($airline)['airline_name'];
     ?> </h3>
  </blockquote>
  <figcaption class="blockquote-footer">
    Here's Your Flights <i class="fas fa-plane"></i> 
  </figcaption>
</figure>

<table class="table table-dark table-hover" >
    <thead>
    <tr class="text-center">
        <th>Flight Name</th>
        <th>From</th>
        <th>To</th>
        <th>Departure Time <i class="fas fa-plane-departure"></i> </th>
        <th>Arrival Time <i class ="fas fa-plane-arrival"></i></th>
        <th>Total Seats </th>
        <th>Price </th>
        <th>Actions </th>
    </tr>
    </thead>
    <tbody>
        <?php
            $airline_id = $_SESSION['id'];
            $qry = "SELECT flight_id ,flight_name ,from_location , to_location , departure_time , arrival_time , total_seats ,flight_price
            FROM flight 
            WHERE airline_id = '$airline_id'";

            $result = odbc_exec($conn,$qry);

            while ($flights = odbc_fetch_array($result))
            {
        
        ?>
        <tr>
            <td><?php echo $flights['flight_name'] ?></td>
            <td><?php echo $flights['from_location'] ?></td>
            <td><?php echo $flights['to_location'] ?></td>
            <td><?php echo $flights['departure_time'] ?></td>
            <td><?php echo $flights['arrival_time'] ?></td>
            <td><?php echo $flights['total_seats'] ?></td>
            <td><?php echo $flights['flight_price'] ?></td>
            <td>
                <a class="btn btn-secondary" href="EditFlight.php?flight_id=<?php echo $flights['flight_id'];?>&from_location=<?php echo $flights['from_location'];?>&to_location=<?php echo $flights['to_location'];?>&departure_date=<?php echo substr($flights['departure_time'],0,10);?>&departure_time=<?php echo substr($flights['departure_time'],10,22);?>&arrival_date=<?php echo substr($flights['arrival_time'],0,10);?>&arrival_time=<?php echo substr($flights['arrival_time'],10,22);?>&total_seats=<?php echo $flights['total_seats'];?>&flight_price=<?php echo $flights['flight_price'];?>&flight_name=<?php echo $flights['flight_name'] ?>" role="button">Edit</a>
                <a class="btn btn-danger" href="AirlineCompany.php?flight_id=<?php echo $flights['flight_id'];?>" role="button">Delete</a>
            </td>
        </tr>
    </tbody>

    <?php } ?>
    
    <div class="creditCard">
        <div class="title">
            <h3>VIRTUAL CREDIT CARD</h3>
        </div>
        <div class="number">
            <p><?php echo $creditInfo['credit_number']; ?></p>
        </div>
        <div class="CVVEx">
            <p class="expiry"><span>EXPIRY DATE: </span> <span><?php echo substr($creditInfo['expiry_date'], 0, 7); ?></span></p>
            <p class="CVV"><span>CVV: </span> <span><?php echo $creditInfo['CVV']; ?></span></p>
        </div>
        <div class="nameBalance">
            <p class="name"><?php echo $creditInfo['airline_name']; ?></p>
            <p class="balance"><span>Balance: &nbsp;</span><?php echo $creditInfo['balance']; ?>$</p>
        </div>
    </div>
    
    <div onclick="$('.creditCard').toggle(); $('.blackBackground').toggle();" class="blackBackground"></div>

    <?php

        odbc_free_result($result);

        // Close Connection
        odbc_close($conn);
    ?>

</table>
</div>






<br>
<br>
<br>
<br>
<?php require_once 'assets/footer.php'; ?>