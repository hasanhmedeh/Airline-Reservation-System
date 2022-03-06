<?php 
      $pageName = "flight_page";
      $pageTitle = "Edit Flight";
      $bootStrapVersion = 6;
      
      require_once 'assets/head.php';
      require_once 'assets/navbar.php';


      if(isset($_POST['edit']))
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
        $departure = $departure_date . " " . $departure_time;
        $arrival = $arrival_date . " " . $arrival_time;

        $update = "UPDATE flight set flight_name ='$flight_name', from_location ='$from_location', to_location='$to_location ' , departure_time = '$departure', arrival_time='$arrival', total_seats='$total_seats' ,flight_price='$flight_price' where flight_id = $flight_id";

        odbc_exec($conn,$update);
        header('Location: AirlineCompany.php');
      }
      if(isset($_GET['flight_id']))
      {
        $flight_id = $_GET['flight_id'];
        $flight_name = $_GET['flight_name'];
        $from_location = $_GET['from_location'];
        $to_location = $_GET['to_location'];
        $departure_date = $_GET['departure_date'];
        $departure_time = $_GET['departure_time'];
        $arrival_date = $_GET['arrival_date'];
        $arrival_time = $_GET['arrival_time'];
        $total_seats = $_GET['total_seats'];
        $flight_price = $_GET['flight_price'];

      }
      else header("Location: AirlineCompany.php");
?>
<div class="container">

<figure class="text-center">
  <blockquote class="blockquote">
    <h1 class="airline_title">Edit Flight </h1>
  </blockquote>
  <figcaption class="blockquote-footer">
    <i class="fas fa-plane"></i> 
    <i class="fas fa-plane"></i> 
  </figcaption>
</figure>
<br>

<div class="container">

  <div class="myform">
      <form class="" id =" " method ="post" action="EditFlight.php">

      <input name="flight_id" type="hidden" value="<?php echo $flight_id ?>" />

      <div class ="row">
        <div class="form-group col-12 my-3">
            <input type="text" value="<?php echo $flight_name ?>" name="flight_name" class="form-control" placeholder="Flight name" required="required">
        </div>
      </div>
      

        <div class ="row">

          <div class="form-group col-6 my-3">
              
              <input type="text" value="<?php echo $from_location ?>" name="from_location" class="form-control" placeholder="from" required="required">
          </div>

          <div class="form-group col-6 my-3">
              
              <input type="text" value="<?php echo $to_location ?>" name="to_location" class="form-control" placeholder="to" required="required">
          </div>

        </div>

        <div class="row">
          <div class="form-group col-6 my-3">
              
              <input type="text" value="<?php echo $total_seats ?>" name ="total_seats" class="form-control" placeholder="Seats" required="required">
          </div>

          <div class="form-group col-6 my-3">
             
              <input type="text" value="<?php echo $flight_price ?>" name ="flight_price" class="form-control" placeholder="price" required="required">
          </div>

          <div class ="row">
            <div class="form-group col-6 my-3">
                <label >Departure Date</label>
                <input type="date" min="<?php echo date("Y-m-d"); ?>" value="<?php echo substr($departure_date, 0, 10) ?>" name="departure_date" class="form-control date"  placeholder="Departure Date" >
            </div>

            <div class="form-group col-6 my-3">
                <label >Departure Time</label>
                <input type="time" min="<?php echo date("H:i:s"); ?>" value="<?php echo substr($departure_time,1,5);?>" name="departure_time" class="form-control date" placeholder="Arrival Date">
            </div>
          </div>

          <div class ="row">
            <div class="form-group col-6 my-3">
                <label >Arrival Date</label>
                <input type="date" value="<?php echo substr($arrival_date, 0, 10) ?>" name="arrival_date" class="form-control date"  placeholder="Departure Date" >
            </div>

            <div class="form-group col-6 my-3">
                <label >Arrival time</label>
                <input type="time" value="<?php echo substr($arrival_time,1,5);?>" name="arrival_time" class="form-control date" placeholder="Arrival Date">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="form-group col-6">
            <input type ="submit" name="edit" class="btn btn-success my-3 " value="Edit">
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
