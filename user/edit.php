<?php
   $name= 'Edit';
   require_once 'includes/header.php';

   if(isset($_GET['username'])){
      $name=$_GET['name'];
      $username=$_GET['username'];
      $email=$_GET['email'];
      $phone=$_GET['phone'];
   } else if(isset($_POST['edit'])){
      $name=$_POST['fullname'];
      $username=$_SESSION['username'];
      $email=$_POST['email'];
      $phone=$_POST['phone'];
      $oldEmail = $_GET['email'];

      require_once '../db_connection/db_connection.php';
      if($oldEmail != $email){
         $query = "UPDATE passenger SET passenger_name = '$name', email = '$email', telphone_num = '$phone' WHERE passenger_username = " . "'" . $_SESSION['username'] . "'";
         echo $query;
         $query2 = "UPDATE loginAccount SET email = '$email' WHERE email = '$oldEmail'";
         odbc_exec($conn, $query);
         odbc_exec($conn, $query2);
      } else {
         $query = "UPDATE passenger SET passenger_name = '$name', telphone_num = '$phone' WHERE passenger_username = " . "'" . $_SESSION['username'] . "'";
         odbc_exec($conn, $query);
      }
      header("Location: profile.php");
   }else{
      header("Location: profile.php");
   }
?>



<div class="heading" style="background:url(images/header-bg-3.png) no-repeat">
   <h1>Edit Profile</h1>
</div>



<section class="booking">

   <h1 class="heading-title">Edit your profile!</h1>

   <form action="edit.php?email=<?php echo $email ?>" method="post" class="book-form">

      <div class="flex">
         <div class="inputBox">
            <span>Full name :</span>
            <input type="text" placeholder="full name" name="fullname" <?php echo "value='".$name."'"; ?>>
         </div>
        
         <div class="inputBox">
            <span>Email :</span>
            <input type="email" placeholder="email" name="email" value=<?php echo $email; ?>>
         </div>
         <div class="inputBox">
            <span>Phone Number :</span>
            <input type="text" placeholder="phone number" name="phone" value=<?php echo $phone; ?>>
         </div>
        
      </div>

      <div style="display: flex; flex-direction: row; gap:20px">
         <input onclick="history.back()" type="button" value="Cancel" class="btn" name="cancel">
         <input type="submit" value="Edit Information" class="btn" name="edit">
      </div>
   </form>

</section>



















<?php
  
   require_once 'includes/footer.php';


?>








<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>