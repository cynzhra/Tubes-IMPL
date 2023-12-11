<?php
include("koneksi.php");

    if (isset($_POST["register_btn"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm_password"];

        // Mengubah password agar menjadi kode acak
        $hashedpass = password_hash($password, PASSWORD_DEFAULT);

        // Validasi username
        $username = strtolower($username); // Mengubah semua huruf menjadi huruf kecil
        $username = str_replace(' ', '', $username); // Menghapus spasi

        // Memeriksa apakah username sudah ada dalam database
        $checkUser = "select username from login where username='$username' Limit 1";
        $cek = $koneksi->query($checkUser);

        // Memasukkan data kedalam database
        $register_query ="Insert into login (username, password, role) Values('$username', '$hashedpass', 'karyawan')";

        if($password == $confirm_password) {
            if($cek->num_rows > 0){
                header("location:login.php?pesan=username");
            } else{
                $register = $koneksi->query($register_query);
                if($register) {
                    header("location:login.php?pesan=register");
                } else {
                    header("location:login.php?pesan=salah");
                }
            }
        }else {
            header("location:login.php?pesan=salah_pass");
        }
    }