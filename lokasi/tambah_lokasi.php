<?php

include("../koneksi.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_lokasi = $_POST['nama_lokasi'];

    // Prepared statement untuk menghindari SQL injection
    $query_tambah = "INSERT INTO lokasi (nama_lokasi) VALUES ('$nama_lokasi')";
    if ($conn->query($query_tambah) == TRUE) {
        header("Location: lokasi.php");
        exit();
    } else {
        echo "Error: " . $query_tambah . "<br>" . $conn->error;
    }
    

    // Tutup koneksi
    $stmt->close();
    $conn->close();
}
?>

