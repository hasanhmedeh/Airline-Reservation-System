<?php
    if(isset($_POST['update']))
    {
        print_r($_POST);
        require_once './../../db_connection/db_connection.php';
        $username = $_POST['username'];
        $name = $_POST['name'];
        $phone_number = $_POST['phone_number'];
        $email =$_POST['email'];
        $password = $_POST['password'];
        $sql = "UPDATE passenger SET passenger_name = '$name', email = '$email', telphone_num = '$phone_number' WHERE passenger_username = '$username' ";
        odbc_exec($conn,$sql);

        if(strlen($password) != 0) 
        {
            $sql = "UPDATE loginAccount SET password = '$password' WHERE passenger_username = '$username' ";
            odbc_exec($conn,$sql);
        }

        // Close Connection
        odbc_close($conn);
        header("Location: ../usersPage.php");
    }
?>
