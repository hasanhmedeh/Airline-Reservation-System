<?php
    if(isset($_GET['company_id']))
    {
        require_once "./../db_connection/db_connection.php";
        $id = $_GET['company_id'];
        // Query
        $qry = "DELETE FROM airlineCompany WHERE airline_id = '$id'";

        // Get Result
        $result = odbc_exec($conn,$qry);
        
        // Close Connection
        odbc_close($conn);

        header('Location: airlineCompaniesPage.php');
    }
?>