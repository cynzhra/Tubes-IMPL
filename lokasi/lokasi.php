<?php 
session_start();
include '../partial/head.php'; 
include '../koneksi.php';
if(!isset($_SESSION['role'])){
    header("location:../login.php?pesan=belum_login");
}
if(isset($_GET['aksi']) == 'delete'){ // mengkonfirmasi jika 'aksi' bernilai 'delete' merujuk pada baris 90 dibawah
    $id_lok = $_GET['id_lok']; // ambil nilai id_lok
    $cek = mysqli_query($conn, "SELECT * FROM lokasi WHERE id_lok='$id_lok'"); // query untuk memilih entri dengan id_lok yang dipilih
    if(mysqli_num_rows($cek) == 0){ // mengecek jika tidak ada entri id_lok yang dipilih
        echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>'; // maka tampilkan 'Data tidak ditemukan.'
    }else{ // mengecek jika terdapat entri id_lok yang dipilih
        $delete = mysqli_query($conn, "DELETE FROM lokasi WHERE id_lok='$id_lok'"); // query untuk menghapus
        if($delete){ // jika query delete berhasil dieksekusi
            echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>'; // maka tampilkan 'Data berhasil dihapus.'
        }else{ // jika query delete gagal dieksekusi
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>'; // maka tampilkan 'Data gagal dihapus.'
        }
    }
}
?>
<title>Data Lokasi</title>	
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


<div class="tabular--wrapper">
    <h3 class="main--title">Sistem Pelacakan Letak Barang | Lokasi Barang</h3>
    <form class="form-lokasi" action="tambah_lokasi.php" method="post">
        <label for="nama_lokasi">Nama Lokasi:</label>
        <input type="text" id="nama_lokasi" name="nama_lokasi" required>
        <input type="submit" value="Tambah Lokasi">
    </form>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Lokasi</th>
                    <th>Nama Lokasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php
                // Data barang
                $no = 1;
                $sql = mysqli_query($conn, "SELECT * FROM lokasi"); 
                while($row = mysqli_fetch_assoc($sql)){
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['id_lok']; ?></td>
                <td><?= $row['nama_lokasi']; ?></td>
                <td>
                    <a href="edit.php?id_lok=<?php echo $row['id_lok']; ?>" class="btn btn-sm btn-success">Edit</a>
                    <a href="lokasi.php?aksi=delete&id_lok=<?php echo $row['id_lok']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin akan mengahapus data?')">Hapus</a>				
                </td>
            </tr>          
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</body>
