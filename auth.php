<?php
    include_once('controller/RegisterController.php');
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

    if (isset($_POST["register_btn"])) {
        $username = validateInput($db->conn, $_POST["username"]);
        $password = validateInput($db->conn, $_POST["password"]);
        $confirm_password = validateInput($db->conn, $_POST["confirm_password"]);

        $register = new RegisterController();
        $result_password = $register->confirmPassword($password, $confirm_password);
        if($result_password) {
            $result_user = $register->isUserExist($username);
            if($result_user) {
                redirect("Already Username Exists", "login.php?pesan=username");
            } else {
                $register_query = $register->registration($username, $password);
                if($register_query) {
                    redirect("Registered Successfully", "login.php?pesan=register");
                } else {
                    redirect("Something Went Wrong", "login.php?pesan=salah");
                }
            }
        } else {
            redirect("Password and Confirm Password Does not match", "login.php?pesan=salah_pass");
        }
    }

    if(isset($_POST["logout_btn"])) {
        $cekLogout = $auth->logout();
        if($cekLogout) {
            redirect("Logged Out Successfully", "login.php?pesan=logout");
        }
    }
?>