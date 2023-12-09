<?php
include("asset/style.css");

if(isset($_SESSION['message'])){
    echo "<div class='alert alert-danger' role='alert'>".$_SESSION['message']."</div>";
    unset($_SESSION["message"]);
}