<?php
session_start();
include ("config/app.php");
include("auth.php");
// $auth->isLoggedIn();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN-TOKO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="asset/css/style.css" rel="stylesheet">
</head>
<body>
  <div class="global-container">
    <div class="card login-form">
      <div class="card-body">
        <h1 class="card-title text-center"> LOGIN</h1>
        
      </div><?php 
        if(isset($_GET['pesan'])){
          if($_GET['pesan'] == "gagal"){
            echo "<div class='alert alert-danger' role='alert'>Invalid username or password</div>";
          }else if($_GET['pesan'] == "logout"){
            echo "<div class='alert alert-primary' role='alert'>You  successfully logged out</div>";
          }else if($_GET['pesan'] == "belum_login"){
            echo "<div class='alert alert-danger' role='alert'>You are not logged in yet</div>";
          }
        }
        ?>
      <div class="card-text">
        <form method="post" action="">
          <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Username</label>
            <input class="form-control" type="text" name="username" required>
          </div>
          <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Password</label>
            <input class="form-control" type="password" name="password" required>
          </div>
          <div class="mb-3">
            <button type="submit" name="login_btn" class="btn btn-login">Sign in</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>