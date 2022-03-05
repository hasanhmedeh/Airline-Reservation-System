<?php
    $name= 'Ticket';
    require_once 'includes/header.php';
   
    require_once '../db_connection/db_connection.php';

    if(isset($_GET['Airline'])){
        $airlineName = $_GET['Airline'];
        $from = $_GET['from'];
        $to = $_GET['to'];
        $fromSeat = $_GET['fromSeat'];
        $toSeat = $_GET['toSeat']+$fromSeat;
        $time = $_GET['time'];
        $onlyOnce = 0;
    }
    
?>

<a href="home.php" class="doneFromTicket"><button>Done</button></a>

<div style="text-align: center; font-size: 2.5em; margin-top: 20px;"><h1>Print this ticket for future use</h1></div>

<div class="cardWrap">
    <div class="card cardLeft">
        <h1><?php echo $airlineName; ?> <span>AirLine</span></h1>
        <div class="title">
            <h2><?php echo $from; ?></h2>
            <span>LOCATION: From</span>
        </div>
        <div class="name">
            <h2><?php echo $to; ?></h2>
            <span>LOCATION: To</span>
        </div>
        <div>
            <div class="seat">
                <h2 style="text-align: center;"><?php
                    if(($toSeat - $fromSeat) > 1) {
                        echo "$fromSeat &nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp; $toSeat";
                    } else {
                        echo $toSeat;
                        $onlyOnce = 1;
                    }
                     ?></h2>
                <span><?php
                    if($onlyOnce){
                        echo "Seat Number";
                    } else {
                        echo "from seat - to seat";
                    }
                ?></span>
            </div>
            <div class="time">
                <h2 style="text-align: center;"><?php echo substr($time, 10, 9); ?></h2>
                <span>Departure Time</span>
            </div>
        </div>
        
        
    </div>
    <div class="card cardRight">
        <div class="eye"></div>
        <div class="number">
            <h3 style="text-align: center;"><?php
                        if(($toSeat - $fromSeat) > 1) {
                            echo "$fromSeat - $toSeat";
                        } else {
                            echo $toSeat;
                            $onlyOnce = 1;
                        }
                        ?></h3>
                    <span><?php
                        if($onlyOnce){
                            echo "Seat Number";
                        } else {
                            echo "from seat - to seat";
                        }
                    ?></span>
            </div>
        <div class="barcode"></div>
    </div>
</div>



<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>