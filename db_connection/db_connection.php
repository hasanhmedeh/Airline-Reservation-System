<?php
    $database='AirLines';
    $username='admin';
    $password='admin';
    // $serverName = "DESKTOP-MHB88Q9\SQL_SERVER";
    $serverName = "DESKTOP-AVJR84N\SQLEXPRESS"; //for hasan

    if(!function_exists('getCurrentPage')){
        function getCurrentPage(){
            return  substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
        }
    }

    if(getCurrentPage()=="index.php" || getCurrentPage() == "signup.php"){
        $username='guest';
        $password='guest';
    } else if(getCurrentPage()=="AirlineCompany.php" || getCurrentPage()=="AddFlight.php" || getCurrentPage()=="EditFlight"){
        $username='airlineCompany';
        $password='airlineCompany';
    } else if(getCurrentPage()=="about.php" || getCurrentPage()=="contact_us.php" || getCurrentPage()=="edit.php"
            || getCurrentPage()=="home.php" || getCurrentPage()=="package.php" || getCurrentPage()=="profile.php"
            || getCurrentPage()=="reserve.php" || getCurrentPage()=="AddFlight.php"){
        $username='passenger';
        $password='passenger';
    }

    $connection_string = "DRIVER={SQL Server};SERVER=$serverName;DATABASE=$database";
    $conn= odbc_connect($connection_string, $username, $password);    
?>