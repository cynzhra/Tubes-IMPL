<?php
session_start();
include ("koneksi.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN-TOKO</title>
    <link rel="shortcut icon" href="asset/img/logo.png" type="image/x-icon">
    <link href="asset/css/style.css" rel="stylesheet">
</head>
<body>
  <div class="main">
      <?php 
        if(isset($_GET['pesan'])){
          if($_GET['pesan'] == "gagal"){
            echo "<div class='alert alert-danger' role='alert'>Invalid username or password</div>";
          }else if($_GET['pesan'] == "logout"){
            echo "<div class='alert alert-primary' role='alert'>You  successfully logged out</div>";
          }else if($_GET['pesan'] == "belum_login"){
            echo "<div class='alert alert-danger' role='alert'>You are not logged in yet</div>";
          }else if($_GET['pesan'] == "salah_pass"){
            echo "<div class='alert alert-danger' role='alert'>Password and Confirm Password Does not match</div>";
          }else if($_GET['pesan'] == "register"){
            echo "<div class='alert alert-primary' role='alert'>Registered Successfully</div>";
          }else if($_GET['pesan'] == "salah"){
            echo "<div class='alert alert-danger' role='alert'>Something Went Wrong</div>";
          }else if($_GET['pesan'] == "username"){
            echo "<div class='alert alert-danger' role='alert'>Already Username Exists</div>";
          }
        }
      ?>
    <input type="checkbox" id="chk" aria-hidden="true">
    <div class="signup">
      <form method="post" action="prosesRegister.php">
        <label for="chk" aria-hidden="true">Sign Up</label>
        <input class="form-control" type="text" name="username" placeholder="Username" required>
        <input class="form-control" type="password" name="password" placeholder="Password" required>
        <input class="form-control" type="password" name="confirm_password" placeholder="Password Confirm" required>
        <button type="submit" name="register_btn" class="btn btn-login">Sign Up</button>
      </form>
    </div>

    <div class="login">
      <form method="post" action="prosesLogin.php">
        <label for="chk" aria-hidden="true">Login</label>
        <input class="form-control" type="text" name="username" placeholder="Username" required>
        <input class="form-control" type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login_btn">Login</button>
      </form>
    </div>
  </div>
</body>
</html>