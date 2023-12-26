<!DOCTYPE html>
<html lang="en">

    
<head>
    <?php include 'partial/head.php' ?>
</head>
<?php
include 'config/app.php';
session_start();

if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $lokasi = $_POST['lokasi'];

    $query_tambah = "INSERT INTO barang (nama_brg, harga_brg, stok_brg, lok_brg) VALUES ('$nama', '$harga', '$stok', '$lokasi')";
    if ($conn->query($query_tambah) === TRUE) {
        header("Location: barang.php");
        exit();
    } else {
        echo "Error: " . $query_tambah . "<br>" . $conn->error;
    }
}

// Fungsi edit barang
if (isset($_POST['edit'])) {
    $id_barang = $_POST['id_barang'];
    $nama_brg = $_POST['nama_brg'];
    $harga_brg = $_POST['harga_brg'];
    $stok_brg = $_POST['stok_brg'];
    $lok_brg = $_POST['lok_brg'];

    $query_edit = "UPDATE barang SET nama_brg='$nama_brg', harga_brg='$harga_brg', stok_brg='$stok_brg', lok_brg='$lok_brg' WHERE id_barang='$id_barang'";
    if ($conn->query($query_edit) === TRUE) {
        header("Location: barang.php");
        exit();
    } else {
        echo "Error: " . $query_edit . "<br>" . $conn->error;
    }
}

// Fungsi hapus barang
if (isset($_GET['hapus'])) {
    $id_hapus = $_GET['hapus'];

    $query_hapus = "DELETE FROM barang WHERE id_barang='$id_hapus'";
    if ($conn->query($query_hapus) === TRUE) {
        header("Location: barang.php");
        exit();
    } else {
        echo "Error: " . $query_hapus . "<br>" . $conn->error;
    }
}

// Ambil data barang dari database
$query = "SELECT * FROM barang";
$result = $conn->query($query);

$queryl = "SELECT * FROM lokasi";
$dlokasi = $conn->query($queryl);
$dlokasi1 = $conn->query($queryl);
$dd = $dlokasi->fetch_all(MYSQLI_ASSOC);
if (!$result) {
    die("Gagal mengambil data: " . $conn->error);
}
?>

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
                    <h2>Daftar Barang</h2>
                    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahModal">Tambah Barang</button>

                    <!-- Tabel untuk menampilkan data barang -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID Barang</th>
                                <th>Nama Barang</th>
                                <th>Harga Barang</th>
                                <th>Stok Barang</th>
                                <th>Lokasi Barang</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch_assoc()) : ?>
                                <tr>
                                    <td><?= $row['id_barang']; ?></td>
                                    <td><?= $row['nama_brg']; ?></td>
                                    <td><?= $row['harga_brg']; ?></td>
                                    <td><?= $row['stok_brg']; ?></td>
                                    <td><?= $row['lok_brg']; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal<?= $row['id_barang']; ?>">Edit</button>
                                        <a href="barang.php?hapus=<?= $row['id_barang']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">Hapus</a>
                                    </td>
                                </tr>

                                <!-- Modal Edit Barang -->
                                <div class="modal fade" id="editModal<?= $row['id_barang']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel">Edit Barang</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Form untuk mengedit barang -->
                                                <form action="" method="POST">
                                                    <input type="hidden" name="id_barang" value="<?= $row['id_barang']; ?>">
                                                    <div class="form-group">
                                                        <label for="edit_nama">Nama Barang:</label>
                                                        <input type="text" class="form-control" id="edit_nama" name="nama_brg" value="<?= $row['nama_brg']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="edit_harga">Harga Barang:</label>
                                                        <input type="number" class="form-control" id="edit_harga" name="harga_brg" value="<?= $row['harga_brg']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="edit_stok">Stok Barang:</label>
                                                        <input type="number" class="form-control" id="edit_stok" name="stok_brg" value="<?= $row['stok_brg']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="edit_lokasi">Lokasi Barang:</label>
                                                        <select name="lokasi" class="form-control" required id="">
                                                            <?php foreach ($dd as $key => $ro) { ?>
                                                                <option value="<?= $ro['nama_lok'] ?>"> <?= $ro['nama_lok'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <button type="submit" name="edit" class="btn btn-warning">Simpan Perubahan</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
                <!-- Content goes here -->
            </main>
            <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tambahModalLabel">Tambah Barang</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Form untuk menambah barang -->
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="nama">Nama Barang:</label>
                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga Barang:</label>
                                    <input type="number" class="form-control" id="harga" name="harga" required>
                                </div>
                                <div class="form-group">
                                    <label for="stok">Stok Barang:</label>
                                    <input type="number" class="form-control" id="stok" name="stok" required>
                                </div>
                                <div class="form-group">
                                    <label for="lokasi">Lokasi Barang:</label>
                                    <select name="lokasi" class="form-control" required id="">
                                        <?php while ($r = $dlokasi1->fetch_assoc()) : ?>
                                            <option value="<?= $r['nama_lok'] ?>"> <?= $r['nama_lok'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
