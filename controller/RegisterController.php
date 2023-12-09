<?php
// include("config/app.php");

class RegisterController{
    public function __construct(){
        $db = new Connection();
        $this->conn = $db->conn;
    }

    public function registration($username, $password){
        $register_query ="Insert into login (username, password, role) Values('$username', '$password', 'karyawan')";
        $result = $this->conn->query($register_query);
        return $result;
    }

    public function isUserExist($username){
        $checkUser = "select username from login where username='$username' Limit 1";
        $result = $this->conn->query($checkUser);
        if($result->num_rows > 0){
            return true;
        }else{
            return false;
        }
    }
    public function confirmPassword($password, $confirm_password){
        if($password == $confirm_password){
            return true;
        }else{
            return false;
        }
    }

}
?>