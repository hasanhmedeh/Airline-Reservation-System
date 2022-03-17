<?php 
      $pageName = "flight_page";
      $pageTitle = "Add Flight";
      $bootStrapVersion = 6;
    
      require_once 'assets/head.php';
      require_once 'assets/navbar.php';


      if(isset($_POST['create']))
      {
        require_once 'db_connection/db_connection.php';
        $flight_id = $_POST['flight_id'];
        $flight_name = $_POST['flight_name'];
        $from_location = $_POST['from_location'];
        $to_location = $_POST['to_location'];
        $departure_date= $_POST['departure_date'];
        $departure_time = $_POST['departure_time'];
        $arrival_date = $_POST['arrival_date'];
        $arrival_time = $_POST['arrival_time'];
        $total_seats = $_POST['total_seats'];
        $flight_price = $_POST['flight_price'];
        $id = $_SESSION['id'];
        $departure = $departure_date . " " . $departure_time;
        $arrival = $arrival_date . " " . $arrival_time;

        $insert = "INSERT into flight values($id,'$flight_name','$from_location','$to_location','$departure', '$arrival',$total_seats,$flight_price)";
        
        odbc_exec($conn,$insert);
        header('Location: AirlineCompany.php');
      }
?>
<div class="container">

<figure class="text-center">
  <blockquote class="blockquote">
    <h1 class="airline_title">Add Flight </h1>
  </blockquote>
  <figcaption class="blockquote-footer">
    <i class="fas fa-plane"></i> 
    <i class="fas fa-plane"></i> 
  </figcaption>
</figure>
<br>

<div class="container">

  <div class="myform">
      <form class="" id =" " method ="post" action="AddFlight.php">

      <input name="flight_id" type="hidden" value="<?php echo $flight_id ?>" />

      <div class ="row">
        <div class="form-group col-12 my-3">
            <input type="text" name="flight_name" class="form-control" placeholder="Flight name" required="required">
        </div>
      </div>
      

        <div class ="row">

          <div class="form-group col-6 my-3">
              
              <input type="text" name="from_location" class="form-control" placeholder="from" required="required">
          </div>

          <div class="form-group col-6 my-3">
              
              <input type="text" name="to_location" class="form-control" placeholder="to" required="required">
          </div>

        </div>

        <div class="row">
          <div class="form-group col-6 my-3">
              
              <input type="text" name ="total_seats" class="form-control" placeholder="Seats" required="required">
          </div>

          <div class="form-group col-6 my-3">
             
              <input type="text" name ="flight_price" class="form-control" placeholder="price" required="required">
          </div>
        
          <div class ="row">
            <div class="form-group col-6 my-3">
                <label >Departure Date</label>
                <input type="date" min="<?php echo date("Y-m-d"); ?>" name="departure_date" class="form-control date"  placeholder="Departure Date" >
            </div>

            <div class="form-group col-6 my-3">
                <label >Departure Time</label>
                <input type="time" name="departure_time" class="form-control date" placeholder="Arrival Date">
            </div>
          </div>
        </div>

        <div class="row">
          <div class ="row">
            <div class="form-group col-6 my-3">
                <label >Arrival Date</label>
                <input type="date" min="<?php echo date("Y-m-d"); ?>" name="arrival_date" class="form-control date"  placeholder="Departure Date" >
            </div>

            <div class="form-group col-6 my-3">
                <label >Arrival time</label>
                <input type="time" name="arrival_time" class="form-control date" placeholder="Arrival Date">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="form-group col-6">
            <input type ="submit" name="create" class="btn btn-success my-3 " value="Add">
          </div>

        </div>

      </form>
  </div>


</div>

<br>
<br>
<br>
<br>
</div>
<?php require_once 'assets/footer.php'; ?>
