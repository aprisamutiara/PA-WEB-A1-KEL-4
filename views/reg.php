<?php
    session_start();
    require "../db/db_connect.php";
    if(isset($_POST['submitregister'])){

        $first_name =  $_POST['first_name'];
        $last_name =  $_POST['last_name'];
        $date_birth =  $_POST['date_birth'];
        $email =  $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];


        $result = mysqli_query($conn, "SELECT * FROM login_user WHERE email = '$email'");

        if (!$result->num_rows > 0) {
          $stmt = $conn->prepare("INSERT INTO login_user (first_name, last_name, date_birth, email, username, password, confirm_password) VALUES (?, ?, ?, ?, ?, ?, ?)");
          $stmt->bind_param("sssssss", $first_name, $last_name, $date_birth, $email, $username, $password, $confirm_password);
          $stmt->execute();
  
          if ($stmt->affected_rows > 0) {
              echo "<script>alert('Congratulations, the registration is successful!')</script>";
              header("Location: login.php");
              exit;
          } else {
              echo "<script>alert('Oops! An error occurred, please try again!')</script>";
              die('Error: ' . $stmt->error);
          }
      } else {
          echo "<script>alert('Whoops! Email is already registered, please enter a new email!.')</script>";
      }
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Registration Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../css/reg.css">
  </head>
  <body>
    <div class="container">
      <h1 class="form-title">Registration</h1>
      <form action="" method="post">

        <div class="main-user-info">
          <div class="user-input-box">
            <label for="fullName">First Name</label>
            <input type="text" name="first_name" placeholder="First Name" required>
          </div>
          <div class="user-input-box">
            <label for="fullName">Last Name</label>
            <input type="text" name="last_name" placeholder="Last Name" required>
          </div>
          <div class="user-input-box">
            <label for="birthdate">Birthdate</label>
            <input type="date" name="date_birth" placeholder="Birthdate">
          </div>
          <div class="user-input-box">
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Enter Email">
          </div>
          <div class="user-input-box">
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="Enter Username">
          </div>
          <div class="user-input-box">
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Password">
          </div>
          <div class="user-input-box">
            <label for="confirmPassword">Confirm Password</label>
            <input type="password" name="confirm_password" placeholder="Confirm Password">
          </div>
        </div>
        <div class="form-submit-btn">
          <input type="submit" name="submitregister" value="Register">
        </div>
        <div class="login-register">
            <p>Already have an account?
                <a href="login.php" class="login-link"> Login </a>
            </p>
        </div>
      </form>
    </div>
  </body>
</html>