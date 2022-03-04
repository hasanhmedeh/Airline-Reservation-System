<?php
    $database='AirLines';
    $username='admin';
    $password='admin';
    // $serverName = "DESKTOP-MHB88Q9\SQL_SERVER";
    $serverName = "DESKTOP-AVJR84N\SQLEXPRESS"; //for hasan
    $connection_string = "DRIVER={SQL Server};SERVER=$serverName;DATABASE=$database";
    $conn= odbc_connect($connection_string, $username, $password);    
?>