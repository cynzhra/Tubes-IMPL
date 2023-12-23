<?php
include '../koneksi.php';
session_start();

if(!isset($_SESSION['role'])){
  header("location:login.php?pesan=belum_login");
}

if (isset($_POST['tambah'])) {
    $id_barang = $_POST['id_barang'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $lokasi = $_POST['lokasi'];

    $query_tambah = "INSERT INTO barang (id_barang, nama_brg, harga_brg, stok_brg, lok_brg) VALUES ('$id_barang', '$nama', '$harga', '$stok', '$lokasi')";
    if ($conn->query($query_tambah) == TRUE) {
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

    <!-- Navbar -->
    <?php include '../partial/head.php' ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <div class="tabular--wrapper">
        <h3 class="main--title">Data Barang</h3>
        <button type="button" class="btn btn-modal mb-2" data-toggle="modal" data-target="#tambahModal">Tambah Barang</button>

        <div class="table-container">
            <table>
                <thead>
                <tr>
                    <th>No</th>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga Barang</th>
                    <th>Stok Barang</th>
                    <th>Lokasi Barang</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['id_barang']; ?></td>
                        <td><?= $row['nama_brg']; ?></td>
                        <td><?= $row['harga_brg']; ?></td>
                        <td><?= $row['stok_brg']; ?></td>
                        <td><?= $row['lok_brg']; ?></td>
                        <td>
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editModal<?= $row['id_barang']; ?>">Edit</button>
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
                                <!-- Form untuk mengedit barang -->
                                <form action="" method="POST">
                                    <div class="modal-body">
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
                                            <select name="lok_brg" class="form-control" required id="">
                                                <?php foreach ($dd as $key => $ro) { ?>
                                                <option value="<?= $ro['nama_lokasi'] ?>"> <?= $ro['nama_lokasi'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="edit" class="btn btn-primary">Simpan Perubahan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
     

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
                                    <input type="hidden" class="form-control" id="nama" name="id_barang" required>
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
                                            <option value="<?= $r['nama_lokasi'] ?>"> <?= $r['nama_lokasi'] ?></option>
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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
 
</body>

</html>