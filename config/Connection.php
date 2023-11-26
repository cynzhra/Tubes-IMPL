<?php

class Connection {
 
    // jika memanggil class ini akan memanggil koneksi db
    public function __construct(){
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
        if ($conn->connect_error) {
            die("<h1>Database Connection Failed</h1>". $conn->connect_error);
        }      
        // echo"Database Connected Succesfully";
        return $this->conn = $conn;
    }
}

?>