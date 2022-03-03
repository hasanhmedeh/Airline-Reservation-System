<?php
    $pageName = "login_page";
    $pageTitle = "Signup";
    $bootStrapVersion = 4;
    include_once 'assets/head.php';

    if(isset($_SESSION['role'])){
        if($_SESSION['role']=='company'){
            header("Location: AirlineCompany.php");
        } else if($_SESSION['role']=='client'){
            header("Location: user/home.php");
        } else if($_SESSION['role']=='admin'){
            header("Location: admin/index.php");
        }
    }

    $success = 0;
    if(isset($_POST['signup'])){
        require_once "db_connection/db_connection.php";

        $fullname = $_POST['fullname'];
        $username = strtolower(trim($_POST['username']));
        $password = $_POST['password'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $balance = rand(100,10000);


        $createUser = "declare @credit_number int, @CVV int
        exec createPassenger '$username', '$fullname', '$phone','$email', '$password', $balance, @credit_number out, @CVV out";

        $success = odbc_exec($conn,$createUser);
        $_SESSION['username'] = $username;
        header("Location: user/home.php");
    }
?>

<div class="login-container">
    <span class="sign-up">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="fullname">Full Name: * </label>
            <input type="text" name="fullname" placeholder="Full name" required>

            <label for="username">Username: * </label>
            <input type="text" name="username" placeholder="Username" required>

            <label for="password">Password: * </label>
            <input type="password" name="password" placeholder="Password" required>
            <label for="confirmpassword">Confirm Password: * </label>
            <input type="password" name="confirmpassword" placeholder="Confirm Password" required>

            <label for="email">Email: * </label>
            <input type="email" name="email" placeholder="Your personal email" required>
            
            <label for="phone">Phone Number: * </label>
            <input type="text" name="phone" placeholder="Your phone number" required>
            <input type="submit" name="signup" value="Signup" >
            <hr width="100%">
            <p>Already have an account ? <a href="index.php">Login</a></p>
        </form>
    </span>
</div>

<?php 
    include_once 'assets/footer.php'
?>