<?php
    $name= 'Profile';
    require_once 'includes/header.php';
   
    require_once '../db_connection/db_connection.php';

    $query = "SELECT * FROM passenger WHERE passenger_username = '" . $_SESSION['username']."'";
    
    $result = odbc_exec($conn, $query);

    $user = odbc_fetch_array($result);

    if($user){
        $edit = "name=".$user['passenger_name']."&username=".$_SESSION['username']."&email=".$user['email']."&phone=".$user['telphone_num'];
    }

    $query = "SELECT DISTINCT f.flight_name, t.booking_date, f.from_location, f.to_location FROM ticket t, flight f WHERE f.flight_id = t.flight_id AND passenger_username = '".$_SESSION['username']."' ORDER BY t.booking_date DESC";
    
    $reservations = odbc_exec($conn, $query);

?>

<div class= "cont">
    <div class="profile-box">
        <a href="edit.php?<?php echo $edit;?>"><img src="images/editing.png" alt="" class="edit"></a>
        <a href="../logout.php"><img src="images/turn-off.png" alt="" class="log-out"></a>
        <img src="images/pic-4.png" class ="profile-pic" alt="">
        <h3><?php echo $user['passenger_name']; ?></h3>
        <p>Username: <?php echo $user['passenger_username']; ?></p>
        <p>Email: <?php echo $user['email']; ?></p>
        <p>Phone number: <?php echo $user['telphone_num']; ?></p>
        <div class="social-media">
            <a href="#"><img src="images/instagram.png" alt="" ></a>
            <a href="#"><img src="images/facebook.png" alt="" ></a>
            <a href="#"><img src="images/twitter.png" alt="" ></a>
        </div>
        <div>
            <h4>See your virtual credit card</h4>
            <div onclick="alert('vs')" style="margin-top: -30px;cursor: pointer; background-image: url(images/card.png); height: 150px; width: 100%; background-size:cover;"></div>
        </div>
        <div class="profile-bottom">
            <p>view visited countries</p>
            <div class="arrow">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <br>
    </div>
</div>

<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
    <h2 style="color: #1b63ff; font-weight: bold; text-decoration: underline; margin-bottom: 30px;">Your Previous Reservations: </h2>
    <table style="font-size: 1.7em;" class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Flight Name</th>
                <th scope="col">From Location</th>
                <th scope="col">To Location</th>
                <th scope="col">Date Of Booking</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; while($res = odbc_fetch_array($reservations)){ ?>
                <tr>
                    <th scope="row"><?php echo $i; ?></th>
                    <td><?php echo $res['flight_name']; ?></td>
                    <td><?php echo $res['from_location']; ?></td>
                    <td><?php echo $res['to_location']; ?></td>
                    <td><?php echo $res['booking_date']; ?></td>
                </tr>
            <?php $i++; } ?>
        </tbody>
    </table>
</div>


<div class="blackBackground"></div>

<?php
   require_once 'includes/footer.php';
?>


<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>