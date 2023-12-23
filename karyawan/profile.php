<?php 
session_start();
include("../partial/head.php"); // memanggil file header.php
include("../koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
if(!isset($_SESSION['role'])){
	header("location:../login.php?pesan=belum_login");
}
?>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<div class="tabular--wrapper">
		<h2>Data Karyawan &raquo; Biodata</h2>
		<hr />
			
			<?php
			$id_kyw = $_GET['id_kyw']; // mengambil data id_kyw dari id_kyw yang terpilih
			
			$sql = mysqli_query($conn, "SELECT * FROM karyawan WHERE id_kyw='$id_kyw'"); // query memilih entri id_kyw pada database
			if(mysqli_num_rows($sql) == 0){
				header("Location: data.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			
			if(isset($_GET['aksi']) == 'delete'){ // jika tombol 'Hapus Data' pada baris 75 ditekan
				$delete = mysqli_query($conn, "DELETE FROM karyawan WHERE id_kyw='$id_kyw'"); // query delete entri dengan nik terpilih
				if($delete){ // jika query delete berhasil dieksekusi
					echo '<div class="alert alert-danger alert-dismissable">><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil dihapus.</div>'; // maka tampilkan 'Data berhasil dihapus.'
				}else{ // jika query delete gagal dieksekusi
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal dihapus.</div>'; // maka tampilkan 'Data gagal dihapus.'
				}
			}
			?>
			<!-- bagian ini digunakan untuk menampilkan data karyawan -->
			<table class="table table-striped table-condensed">
				<tr>
					<th width="20%">ID Karyawan</th>
					<td><?php echo $row['id_kyw']; ?></td>
				</tr>
				<tr>
					<th>Nama Karyawan</th>
					<td><?php echo $row['nama_kyw']; ?></td>
				</tr>
				<tr>
					<th>Alamat</th>
					<td><?php echo $row['alamat_kyw']; ?></td>
				</tr>
			</table>
			
			<a href="data.php" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Kembali</a>
			<a href="edit.php?id_kyw=<?php echo $row['id_kyw']; ?>" class="btn btn-success"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit Data</a>
			<a href="profile.php?aksi=delete&id_kyw=<?php echo $row['id_kyw']; ?>" class="btn btn-danger" onclick="return confirm('Anda yakin akan mengahapus data <?php echo $row['nama_kyw']; ?>')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus Data</a>
		</div> <!-- /.content -->
	</div> <!-- /.container -->