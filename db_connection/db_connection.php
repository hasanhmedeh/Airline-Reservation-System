<?php
    $database='AirLines';
    $username='admin';
    $password='admin';
    $serverName = "DESKTOP-MHB88Q9\SQL_SERVER";
    $connection_string = "DRIVER={SQL Server};SERVER=$serverName;DATABASE=$database";
    $conn= odbc_connect($connection_string, $username, $password);    
?>