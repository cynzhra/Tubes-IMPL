<?php

class LoginController{
    public function __construct(){
        $db = new Connection;
        $this->conn = $db->conn;
    }

    public function userLogin($username, $password){
        $sql = "select *from login where username = '$username' and password = '$password'";
        $result = $this->conn->query($sql);

        if($result->num_rows > 0){
            $data = $result->fetch_assoc();
            $this->userAuth($data);
            return true;
        }else{
            return false;
        }
    }

    public function userAuth($data){
        $_SESSION['auth'] = true;
        $_SESSION['auth_role'] = $data['role'];
        $_SESSION['auth_user']=[
            'username' => $data['username']
            // 'password'=> $data['password']
        ];
    }

    public function isLoggedIn(){
        if(isset($_SESSION['auth']) === TRUE){
            redirect('You are already Logged In', 'admin.php');
        }else{
            return false;
        }
    }

    public function logout(){
        if(isset($_SESSION['auth']) === TRUE){
            unset($_SESSION['auth']);
            unset($_SESSION['auth_user']);
            return true;
        }else{
            return false;
        }
    }
}