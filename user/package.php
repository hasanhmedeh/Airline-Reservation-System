<?php
   $name= 'Package';
   require_once 'includes/header.php';

   require_once '../db_connection/db_connection.php';

   $query = "SELECT * FROM flight AS f , airlineCompany AS a WHERE a.airline_id = f.airline_id ORDER BY departure_time ASC";

   $result = odbc_exec($conn, $query);

?>


<div class="heading" style="background:url(images/header-bg-2.png) no-repeat">
   <h1>packages</h1>
</div>

<!-- packages section starts  -->

<section class="packages">

   <h1 class="heading-title">Find Your destination</h1>

   <div class="box-container">

      <?php $i=0; while($flights = odbc_fetch_array($result)){ $link = "images/img-".rand(1, 12).".jpg"?>
         <div class="box">
            <div class="image">
               <img src="<?php echo $link; ?>" alt="">
            </div>
            <div class="content">
               <h3><?php echo $flights['airline_name']." Airlines" ?></h3>
               <p><?php 
                  echo "Flight Name: " . $flights['flight_name'].'</br>'.
                        "From: " . $flights['from_location'].'</br>'.
                        "To: " . $flights['to_location'];
               ?></p>
               <?php 
                  for($j=0; $j<$flights['rate']; $j++){
                     echo '<i class="fas fas fa-star"></i>';
                  }
                ?>
               <br>
               <!-- Button trigger modal -->
               <button type="button" class="btn" data-toggle="modal" data-target="<?php echo "#book" . $flights['flight_id'] ?>">
               book now
               </button>

               <!-- Modal -->
               <div class="modal fade " id="<?php echo "book" . $flights['flight_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="font-size: 3em;">Book trip</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true" style="font-size: 2em;">&times;</span>
                        </button>
                        </div>
                        <form method="POST" action="reserve.php" id = "<?php echo "reserve". $flights['flight_id'] ?>">
                           <input type="number" min="1" max="<?php echo $flights['total_seats'] ?>" placeholder="number of seats" class="nbSeats_input" />
                        </form>
                        
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button 
                           form = "<?php echo "reserve". $flights['flight_id'] ?>"
                           type="submit"
                           name="reserve"
                           class="btn btn-primary"
                        >Save changes</button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      <?php $i++; } ?>

   </div>

   <div class="load-more"><span class="btn">load more</span></div>

</section>

<!-- packages section ends -->

<?php
   require_once 'includes/footer.php';
?>

<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>