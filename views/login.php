<?php
    session_start();
    require "../db/db_connect.php";
    if(isset($_POST['submitLogin'])){
        
        $username =  $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $result = mysqli_query($conn, "SELECT * FROM login_user WHERE username='$username'");

        if($result->num_rows > 0){
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username'];
            if($row['username'] == "admin"){
                header("Location: admin_page.php");
            }else{
              echo"Anda berhasil login";
                header("Location: user_page.php");
            }
        }else{
            echo "<script>alert('Email or Password Incorrect')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="container">
        <h1 class="form-title">Login</h1>
        <form action="" method="post">
            <div class="user-input-box">
                <label for="username">Username</label>
                <input type="text" name="username" placeholder="Enter Username" required>
              </div>
              <div class="user-input-box">
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Enter Email" required>
              </div>
              <div class="user-input-box">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Password" required>
              </div>
              <div class="remember-forgot">
                <label><input type="checkbox">Remember Me</label>
                <a href="#">Forgot Your Password?</a>
            </div>
            <div class="form-submit-btn"> 
              <input type="submit" name="submitLogin" value="Login"><a href="index.php"></a>
            </div>
            <div class="login-register">
                <p>Don't have an account? <a href="reg.php" class="login-link">Register</a></p>
            </div>
        </form>
    </div>
</body>
</html>