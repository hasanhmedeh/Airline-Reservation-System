<?php
    print_r($_POST);
    if(isset($_POST['update']))
    {
        echo "rr";
        require_once './../db_connection/db_connection.php';
        $name = $_POST['name'];
        $phone_number = $_POST['phone_number'];
        $email =$_POST['email'];
        $password = $_POST['password'];
        $username = $_POST['username'];
        $sql = " UPDATE passenger 
        SET passenger_name = '$name', telphone_num = '$phone_number', email = '$email'
        WHERE passenger_username = '$username' ";
        $success = odbc_exec($conn,$sql);

        // header("Location: usersPage.php");
    }
?>