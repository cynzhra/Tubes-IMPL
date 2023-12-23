<?php 
session_start();
include("../partial/head.php"); // memanggil file head.php 
include("../koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
if(!isset($_SESSION['role'])){
	header("location:../login.php?pesan=belum_login");
}
?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
	<div class="card--container">
		<!-- Sidebar -->     
		<h2 class="main--title">Data Karyawan &raquo; Tambah Data</h2>
		<hr />
		<?php
			if(isset($_POST['add'])){ // jika tombol 'Simpan' dengan properti name="add" pada baris 137 ditekan
				$id_kyw = $_POST['id_kyw'];
				$nama_kyw = $_POST['nama_kyw'];
				$jk = $_POST['jk'];
				$tempat_lahir = $_POST['tempat_lahir'];
				$tanggal_lahir = $_POST['tanggal_lahir'];
				$alamat_kyw	= $_POST['alamat_kyw'];
				$no_telp = $_POST['no_telp'];
				$jabatan = $_POST['jabatan'];
				$status	= $_POST['status'];
				
				$insert = mysqli_query($conn, "INSERT INTO karyawan(id_kyw, nama_kyw, jk, tempat_lahir, tanggal_lahir, alamat_kyw, no_telp, jabatan, status) VALUES('$id_kyw','$nama_kyw', '$jk', '$tempat_lahir', '$tanggal_lahir', '$alamat_kyw', '$no_telp', '$jabatan', '$status')") or die(mysqli_error()); // query untuk menambahkan data ke dalam database
			
				if ($conn->query($insert) == TRUE) {
					header("Location: data.php");
					exit();
				} else {
					echo "Error: " . $insert . "<br>" . $conn->error;
				}
			}
		?>

		<div class="col-md-9 ml-sm-auto col-lg-10 px-md-4 content">
			<!-- bagian ini merupakan bagian form untuk menginput data yang akan dimasukkan ke database -->
			<form action="" method="post">
				<div class="row mb-3">
					<label class="col-sm-2 col-form-label">Nama Karyawan</label>
					<div class="col-sm-5">
						<input type="text" name="nama_kyw" class="form-control" placeholder="Nama Karyawan" required/>
						<input type="hidden" name="id_kyw" class="form-control">
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-form-label col-sm-2 pt-0">Jenis Kelamin</label>
					<div class="col-sm-2">
						<div class="form-check">
							<input class="form-check-input"  type="radio" name="jk" id="" value="L"><label class="form-check-label" for="flexCheckDisabled">Laki-Laki</label>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="form-check">
							<input class="form-check-input"  type="radio" name="jk" id="" value="P"><label class="form-check-label" for="flexCheckDisabled">Perempuan</label>
						</div>
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-form-label col-sm-2 pt-0">Tempat Lahir</label>
					<div class="col-sm-5">
						<input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" required>
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-form-label col-sm-2 pt-0">Tanggal Lahir</label>
					<div class="col-sm-5">
						<input type="date" name="tanggal_lahir" class="input-group datepicker form-control" date="" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" required>
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-form-label col-sm-2 pt-0">No Telepon</label>
					<div class="col-sm-5">
						<input type="text" name="no_telp" class="form-control" placeholder="No Telepon" required>
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-form-label col-sm-2 pt-0">Jabatan</label>
					<div class="col-sm-5">
						<select name="jabatan" class="form-select" required>
							<option value=""> Pilih Jabatan </option>
							<option value="Helper">Helper</option>
							<option value="Operator">Operator</option>
							<option value="Leader">Leader</option>
							<option value="Staf">Staf</option>
                            <option value="Supervisor">Supervisor</option>
							<option value="Manager">Manager</option>
						</select>
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-form-label col-sm-2 pt-0">Status</label>
					<div class="col-sm-5">
						<select name="status" class="form-select">
							<option value=""> Pilih Status </option>
                            <option value="Outsourcing">Outsourcing</option>
							<option value="Kontrak">Kontrak</option>
							<option value="Tetap">Tetap</option>
						</select>
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-form-label col-sm-2 pt-0">Alamat</label>
					<div class="col-sm-5">
						<textarea name="alamat_kyw" class="form-control" placeholder="Alamat" rows="3"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<button type="submit" name="add" class="btn btn-primary" value="Simpan" data-toggle="tooltip" title="Simpan Data Karyawan"> Simpan </button>
						<a href="data.php" class="btn btn-danger" data-toggle="tooltip" title="Batal">Batal</a>
					</div>
				</div>
			</form> <!-- /form -->
		</div> <!-- /.content -->
	</div> <!-- /.container -->
<?php 
include("../partial/footer.php"); // memanggil file footer.php
?>