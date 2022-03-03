<?php
    if(isset($_POST['update']))
    {
        require_once './../../db_connection/db_connection.php';
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email =$_POST['email'];
        $password = $_POST['password'];
        $sql = "UPDATE airlineCompany SET airline_name = '$name', email = '$email' WHERE airline_id = '$id' ";
        echo odbc_exec($conn,$sql);

        if(strlen($password) != 0) 
        {
            $sql = "UPDATE loginAccount SET password = '$password' WHERE airline_id = '$id' ";
            odbc_exec($conn,$sql);
        }

        // Close Connection
        odbc_close($conn);
        header("Location: ../airlineCompaniesPage.php");
    }
?>
