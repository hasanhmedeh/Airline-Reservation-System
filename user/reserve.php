<?php 
    session_start();
    if(isset($_POST['reserve']) && isset($_GET['flight_id'])){
        $flight_id = $_GET['flight_id'];
        $totalSeats = $_GET['totalSeats'];
        $numOfSeats = $_POST['seatsNum'];
        $class = $_POST['class'];
        $date = date("d-m-Y");
        $airlineId = $_GET['airline_id'];
        $price = $_GET['price'];
        $extraPrice = 0;
        $user = $_SESSION['username'];

        require_once '../db_connection/db_connection.php';
        
        if($class == 'economic'){
            $extraPrice = 150;
        } else if($class == 'firstClass'){
            $extraPrice = 300;
        }
        
        $getCreditCard="SELECT * FROM airlineCompany WHERE airline_id = $airlineId";
        $result = odbc_exec($conn, $getCreditCard);
        $creditCardNumber = odbc_fetch_array($result)['credit_number'];

        $getUserCreditCard="SELECT * FROM passenger WHERE passenger_username = '$user'";
        $result = odbc_exec($conn, $getUserCreditCard);
        $userCCN = odbc_fetch_array($result)['credit_number'];

        $totalBalance = intval($price)+intval($extraPrice);

        for($i=0; $i<$numOfSeats; $i++, $totalSeats--){
            $query = "INSERT INTO ticket (flight_id, passenger_username, seat_num, ticket_class, booking_date) VALUES($flight_id,'".
                    $_SESSION['username']."',$totalSeats,'$class',CONVERT(DATE, '$date'))";
            odbc_exec($conn, $query);
            if($class != 'business'){
                //take more money from passenger
                $takeMore = "UPDATE creditCard SET balance -= 300 WHERE credit_number = '$userCCN'";
                odbc_exec($conn, $takeMore);
                //update the company balance
                $giveCompany = "UPDATE creditCard SET balance += $totalBalance WHERE credit_number = '$creditCardNumber'";
                odbc_exec($conn, $giveCompany);
            }
        }
        
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }
?>