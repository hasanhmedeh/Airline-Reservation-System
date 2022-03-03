<?php
    if(isset($_GET['username']))
    {
        require_once "./../db_connection/db_connection.php";
        $username = $_GET['username'];
        // Query
        $qry = "DELETE FROM passenger WHERE passenger_username = '$username'";

        // Get Result
        $result = odbc_exec($conn,$qry);
        
        // Close Connection
        odbc_close($conn);

        header('Location: usersPage.php');
    }
?>