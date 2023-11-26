<?php
session_start();
include('config/app.php');
include('controller/LoginController.php');
include("auth.php");
    if($_SESSION['auth']==false){
        header("location:login.php?pesan=belum_login");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <h1>Admin</h1>
    <form action="" method="POST">
        <button type="submit" name="logout_btn" class="btn btn-link">Logout</button>
    </form>
</body>
</html>