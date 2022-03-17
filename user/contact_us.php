<?php
   $name= 'Book';
   require_once 'includes/header.php';

   require_once '../db_connection/db_connection.php';
   
   $query = "SELECT DISTINCT flight_name, f.flight_id FROM ticket t, flight f WHERE f.flight_id = t.flight_id AND passenger_username = '". $_SESSION['username'] . "'";
   $result = odbc_exec($conn, $query);

   if(isset($_POST['feedback'])){
      $flight = $_POST['flight'];
      $message= $_POST['feedbackMessage'];
      $feedback=$flight.$message;
      $user = $_SESSION['username'];
      $date = date("Y-m-d");

      $giveFeedback = "INSERT INTO feedback VALUES ('$user', '$feedback', CONVERT(DATE, '$date'))";
      odbc_exec($conn, $giveFeedback);
   }

?>

<div class="heading" style="background:url(images/header-bg-3.png) no-repeat">
   <h1>YOUR FEEDBACK MATTER</h1>
</div>

<!-- booking section starts  -->

<section class="booking">
   <form action="contact_us.php" method="POST" class="book-form">

      <div class="flex">
         <div class="inputBox">
            <span>Your recent flights:</span>
            <select class="recentFlights" name="flight" required>
               <option value="business" selected>Choose a recent flight for feedback</option>
               <?php 
                  while($bookedFlights = odbc_fetch_array($result)){
               ?>
                     <option value="<?php echo $bookedFlights['flight_id']."#".$bookedFlights['flight_name']."#"; ?>"><?php echo $bookedFlights['flight_name'] ?></option>
               <?php } ?>
            </select>
         </div>

         <div class="inputBox">
            <span>Enter your feedback on a flight:</span>
            <textarea rows="9" class="feedback" name="feedbackMessage"></textarea>
         </div>
      </div>

      <input type="submit" value="Send Feedback" class="btn" name="feedback">

   </form>

</section>

<!-- booking section ends -->

















<?php
  
   require_once 'includes/footer.php';


?>








<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>