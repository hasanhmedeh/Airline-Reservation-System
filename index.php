<?php
    $pageName = "login_page";
    $pageTitle = "Login";
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

    $wronginput=0;

    //If data was submitted via a form POST request, then...
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        require_once 'db_connection/db_connection.php';
        $email = strtolower(trim($_POST['email']));
        $password = $_POST['password'];

        $getUser = "SELECT * FROM  loginAccount WHERE email = '$email' AND password = '$password'";
        $result = odbc_exec($conn, $getUser);
        $user = odbc_fetch_array($result);
        if($user){
            if($user['role']=='company'){
                $_SESSION['id'] = $user['airline_id'];
                $_SESSION['role'] = "company";
                header("Location: AirlineCompany.php");
            } else if($user['role']=='client'){
                $_SESSION['username'] = $user['passenger_username'];
                $_SESSION['role'] = "client";
                header("Location: user/home.php");
            } else if($user['role']=='admin'){
                $_SESSION['role'] = "admin";
                header("Location: admin/index.php");
            }
        } else {
            $wronginput=1;
        }
    }

?>

<div class="login-container">

    <div class="welcome" >
        <i class="fa fa-plane" aria-hidden="true"></i>
        <p>Reach your destination<br/>faster than a rocket</p>
    </div>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="username">Email: * </label>
        <div style="display: inline;">
            <i class="fa fa-user inputIcon" aria-hidden="true"></i>
            <input type="email" name="email" placeholder="Email" required value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['email'];?>">
        </div>

        <label for="password">Password: * </label>
        <div style="display: inline;">
            <i class="fa fa-lock inputIcon" aria-hidden="true"></i>
            <input type="password" name="password" placeholder="Password" required>
        </div>
        <?php if($wronginput){ ?>
            <p class="attention">Your Email or Password is incorrect.</p>
        <?php } ?>
        <input type="submit" name="login" value="Login">
        <hr width="100%">
        <p>Don't have an account ? <a href="signup.php">Signup</a></p>
    </form>
</div>

<?php 
    include_once 'assets/footer.php'
?>