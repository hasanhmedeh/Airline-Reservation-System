<?php
   $name= 'Home';
   require_once 'includes/header.php';

   require_once '../db_connection/db_connection.php';

   $query = "SELECT * FROM flight AS f , airlineCompany AS a WHERE a.airline_id = f.airline_id ORDER BY departure_time ASC";

   $result = odbc_exec($conn, $query);

?>

<!-- home section starts  -->

<section class="home">

   <div class="swiper home-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide" style="background:url(images/home-slide-1.jpg) no-repeat">
            <div class="content">
               <span>explore, discover, travel</span>
               <h3>travel arround the world</h3>
               <a href="package.php" class="btn">discover more</a>
            </div>
         </div>

         <div class="swiper-slide slide" style="background:url(images/home-slide-2.jpg) no-repeat">
            <div class="content">
               <span>explore, discover, travel</span>
               <h3>discover the new places</h3>
               <a href="package.php" class="btn">discover more</a>
            </div>
         </div>

         <div class="swiper-slide slide" style="background:url(images/home-slide-3.jpg) no-repeat">
            <div class="content">
               <span>explore, discover, travel</span>
               <h3>make your tour worthwhile</h3>
               <a href="package.php" class="btn">discover more</a>
            </div>
         </div>
         
      </div>

      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>

   </div>

</section>

<!-- home section ends -->

<!-- services section starts  -->

<section class="services">

   <h1 class="heading-title"> our services </h1>

   <div class="box-container">

      <div class="box">
         <img src="images/icon-1.png" alt="">
         <h3>adventure</h3>
      </div>

      <div class="box">
         <img src="images/icon-2.png" alt="">
         <h3>tour guide</h3>
      </div>

      <div class="box">
         <img src="images/icon-3.png" alt="">
         <h3>trekking</h3>
      </div>

      <div class="box">
         <img src="images/icon-4.png" alt="">
         <h3>camp fire</h3>
      </div>

      <div class="box">
         <img src="images/icon-5.png" alt="">
         <h3>off road</h3>
      </div>

      <div class="box">
         <img src="images/icon-6.png" alt="">
         <h3>camping</h3>
      </div>

   </div>

</section>

<!-- services section ends -->

<!-- home about section starts  -->

<section class="home-about">

   <div class="image">
      <img src="images/about-img.jpg" alt="">
   </div>

   <div class="content">
      <h3>about us</h3>
      <p>we aim to give the traveler a great and easy booking experience in no time where each company offers their trips and you'll be able to choose the one that suits you the most based on the price , the offer and the place that you like to visit </p>
      <a href="about.php" class="btn">read more</a>
   </div>

</section>

<!-- home about section ends -->

<!-- home packages section starts  -->

<section class="home-packages">

   <h1 class="heading-title"> our packages </h1>

   <div class="box-container">

      <?php $i=0; while($flights = odbc_fetch_array($result)){ if($i>=3) break; $link = "images/img-".rand(1, 12).".jpg"?>
         <div class="box">
            <div class="image">
               <img src="<?php echo $link; ?>" alt="">
            </div>
            <div class="content">
               <h3><?php echo $flights['airline_name']." Airlines" ?></h3>
               <p><?php 
                  echo "Flight Name: " . $flights['flight_name'].'</br>'.
                        "From: " . $flights['from_location'].'</br>'.
                        "To: " . $flights['to_location'].'</br>'.
                        "Seats Left: ". $flights['total_seats'];
               ?></p>
               <?php 
                  for($j=0; $j<$flights['rate']; $j++){
                     echo '<i class="fas fas fa-star"></i>';
                  }
                ?>
               <br>
               <!-- Button trigger modal -->
               <button <?php if($flights['total_seats'] == 0) echo 'disabled style="cursor: not-allowed"'; ?> type="button" class="btn" data-toggle="modal" data-target="<?php echo "#book" . $flights['flight_id'] ?>">
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
                        <form method="POST" action="reserve.php?flight_id=<?php 
                           echo $flights['flight_id'];?>&totalSeats=<?php echo $flights['total_seats'];?>
                           &airline_id=<?php echo $flights['airline_id'] ?>
                           &price=<?php echo $flights['flight_price'] ?>" id = "<?php echo "reserve". $flights['flight_id'] ?>">
                           <input type="number" name="seatsNum" min="1" max="<?php echo $flights['total_seats'] ?>" placeholder="number of seats" class="nbSeats_input" required/>
                           
                           <select class="nbSeats_input" name="class" required>
                              <option value="business" selected>Choose your flight Class</option>
                              <option value="business" >Business Class</option>
                              <option value="economic" >Economic Class (+150$)</option>
                              <option value="firstClass" >First Class (+300$)</option>
                           </select>

                        </form>
                        <!-- option business or econ -->
                        <p>Price/ticket: <?php echo $flights['flight_price'] ?>$ </br> (Economic: +150$)</br>(First Class: +300$)</p>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button 
                           form = "<?php echo "reserve". $flights['flight_id'] ?>"
                           type="submit"
                           name="reserve"
                           class="btn btn-primary"
                        >Buy Tickets</button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      <?php $i++; } ?>   
   </div>


   <div class="load-more"> <a href="package.php" class="btn">load more</a> </div>

</section>

<!-- home packages section ends -->

<!-- home offer section starts  -->

<section class="home-offer">
   <div class="content">
      <h3>upto 50% off</h3>
      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iure tempora assumenda, debitis aliquid nesciunt maiores quas! Magni cumque quaerat saepe!</p>
      <a href="package.php" class="btn">book now</a>
   </div>
</section>

<!-- home offer section ends -->









<?php
   require_once 'includes/footer.php';
?>


<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>