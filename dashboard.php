<?php
include 'config/app.php';
session_start();

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
    <?php include 'partial/head.php' ?>
</head>

<body>

    <!-- Navbar -->
    <?php include 'partial/navbar.php' ?>

    <!-- Sidebar -->
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column ">
                        <li class="nav-item ">
                            <a class="nav-link active text-dark" href="dashboard.php">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="barang.php">
                                Data Barang
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="lokasi.php">
                                Lokasi Barang
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="karyawan.php">
                                Data Karyawan
                            </a>
                        </li>
                        <!-- Add more sidebar items as needed -->
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 content pt-4">
                <div class="container mt-4">
                    <h2>Dashboard</h2>

                    <!-- Cards untuk menampilkan jumlah karyawan, barang, dan lokasi -->
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="card bg-secondary">
                                <div class="card-body">
                                    <h5 class="card-title">Jumlah Karyawan</h5>
                                    <p class="card-text"><?= $total_karyawan; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-body bg-warning">
                                    <h5 class="card-title">Jumlah Barang</h5>
                                    <p class="card-text"><?= $total_barang; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-body bg-success">
                                    <h5 class="card-title">Jumlah Lokasi</h5>
                                    <p class="card-text"><?= $total_lokasi; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
