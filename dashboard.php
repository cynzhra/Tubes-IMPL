<?php
session_start();
include 'koneksi.php';

if(!isset($_SESSION['role'])){
  header("location:login.php?pesan=belum_login");
}

// Menghitung jumlah karyawan
$query_jumlah_karyawan = "SELECT COUNT(*) as total_karyawan FROM karyawan";
$result_jumlah_karyawan = $conn->query($query_jumlah_karyawan);
$row_jumlah_karyawan = $result_jumlah_karyawan->fetch_assoc();
$total_karyawan = $row_jumlah_karyawan['total_karyawan'];

// Menghitung jumlah barang
$query_jumlah_barang = "SELECT COUNT(*) as total_barang FROM barang";
$result_jumlah_barang = $conn->query($query_jumlah_barang);
$row_jumlah_barang = $result_jumlah_barang->fetch_assoc();
$total_barang = $row_jumlah_barang['total_barang'];

// Menghitung jumlah lokasi
$query_jumlah_lokasi = "SELECT COUNT(*) as total_lokasi FROM lokasi";
$result_jumlah_lokasi = $conn->query($query_jumlah_lokasi);
$row_jumlah_lokasi = $result_jumlah_lokasi->fetch_assoc();
$total_lokasi = $row_jumlah_lokasi['total_lokasi'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="asset/css/style_dashboard.css">
</head>
<body>
    <!-- Navbar -->
    <?php include 'partial/head.php' ?>

    <!-- Sidebar -->
    <div class="card--container">
    <h2 class="main--title">Today's Data</h2>
    <div class="card--wrapper">
      <div class="payment--card light-red">
        <div class="card--header">
          <div class="amount">
            <span class="title">Data Karyawan</span>
            <span class="amount--value"><?= $total_karyawan; ?></span>
          </div>
          <i class="fas fa-user-alt icon dark-red"></i>
        </div>
        <span class="card-detail">*** *** ***</span>
      </div>
      <div class="payment--card light-blue">
        <div class="card--header">
          <div class="amount">
            <span class="title">Data Barang</span>
            <span class="amount--value"><?= $total_barang; ?></span>
          </div>
          <i class="fas fa-user-alt icon dark-blue"></i>
        </div>
        <span class="card-detail">*** *** ***</span>
      </div>
      <div class="payment--card light-green">
        <div class="card--header">
          <div class="amount">
            <span class="title">Data Lokasi</span>
            <span class="amount--value"><?= $total_barang; ?></span>
          </div>
          <i class="fas fa-user-alt icon dark-green"></i>
        </div>
        <span class="card-detail">*** *** ***</span>
      </div>
    </div>
  </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
