<?php
    include_once('controller/LoginController.php');

    $auth = new LoginController();
    if (isset($_POST['login_btn'])) {    
        $username = validateInput($db->conn, $_POST['username']);
        $password = validateInput($db->conn, $_POST['password']);

        $sql = $auth->userLogin($username, $password);
        if ($sql) {
            if($_SESSION['auth_role'] == 'admin'){
                redirect("Logged In Successfully", "admin.php");
            } else if($_SESSION['auth_role'] == "karyawan"){
                redirect("Logged In Successfully", "karyawan.php");
            }
        } else {
            redirect("Invalid username or password", "login.php?pesan=gagal");
        }
    }

    if(isset($_POST["logout_btn"])) {
        $cekLogout = $auth->logout();
        if($cekLogout) {
            redirect("Logged Out Successfully", "login.php?pesan=logout");
        }
    }
?>