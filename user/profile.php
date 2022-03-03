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



<?php
   require_once 'includes/footer.php';
?>


<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>