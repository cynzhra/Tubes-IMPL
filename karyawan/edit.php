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
			$id_kyw = $_GET['id_kyw']; // assigment id_kyw dengan nilai id_kyw yang akan diedit
			$sql = mysqli_query($conn, "SELECT * FROM karyawan WHERE id_kyw='$id_kyw'"); // query untuk memilih entri data dengan nilai id_kyw terpilih
			if(mysqli_num_rows($sql) == 0){
				header("Location: data.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){ // jika tombol 'Save' dengan properti name="save" pada baris 135 ditekan
				$id_kyw = $_POST['id_kyw'];
				$nama_kyw = $_POST['nama_kyw'];
				$jk   = $_POST['jk'];
				$tempat_lahir = $_POST['tempat_lahir'];
				$tanggal_lahir = $_POST['tanggal_lahir'];
				$alamat_kyw	= $_POST['alamat_kyw'];
				$no_telp = $_POST['no_telp'];
				$jabatan = $_POST['jabatan'];
				$status	= $_POST['status'];
				
				$update = mysqli_query($conn, "UPDATE karyawan SET nama_kyw='$nama_kyw', jk='$jk', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', alamat_kyw='$alamat_kyw', no_telp='$no_telp', jabatan='$jabatan', status='$status' WHERE id_kyw='$id_kyw'") or die(mysqli_error()); // query untuk mengupdate nilai entri dalam database
				if($update){ // jika query update berhasil dieksekusi
					header("Location: edit.php?id_kyw=".$id_kyw."&pesan=sukses"); // tambahkan pesan=sukses pada url
				}else{ // jika query update gagal dieksekusi
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>'; // maka tampilkan 'Data gagal disimpan, silahkan coba lagi.'
				}
			}
			
			if(isset($_GET['pesan']) == 'sukses'){ // jika terdapat pesan=sukses sebagai bagian dari berhasilnya query update dieksekusi
				echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan.</div>'; // maka tampilkan 'Data berhasil disimpan.'
			}
		?>
			
		<div class="col-md-9 ml-sm-auto col-lg-10 px-md-4 content">
			<!-- bagian ini merupakan bagian form untuk mengupdate data yang akan dimasukkan ke database -->
			<form class="form-horizontal" action="" method="post">
				<div class="row mb-3">
					<label class="col-sm-2 control-label">ID Karyawan</label>
					<div class="col-sm-3">
						<input type="text" name="id_kyw" value="<?php echo $row ['id_kyw']; ?>" class="form-control" placeholder="id_kyw" required disabled>
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-sm-2 control-label">Nama Karyawan</label>
					<div class="col-sm-4">
						<input type="text" name="nama_kyw" value="<?php echo $row ['nama_kyw']; ?>" class="form-control" placeholder="nama_kyw" required>
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-sm-2 control-label">Jenis Kelamin</label>
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
					<label class="col-sm-2 control-label">Tempat Lahir</label>
					<div class="col-sm-4">
						<input type="text" name="tempat_lahir" value="<?php echo $row ['tempat_lahir']; ?>" class="form-control" placeholder="Tempat Lahir" required>
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-sm-2 control-label">Tanggal Lahir</label>
					<div class="col-sm-4">
						<input type="text" name="tanggal_lahir" value="<?php echo $row ['tanggal_lahir']; ?>" class="input-group datepicker form-control" date="" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" required>
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-sm-2 control-label">Alamat Karyawan</label>
					<div class="col-sm-3">
						<textarea name="alamat_kyw" class="form-control" placeholder="alamat_kyw"><?php echo $row ['alamat_kyw']; ?></textarea>
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-sm-2 control-label">No Telepon</label>
					<div class="col-sm-3">
						<input type="text" name="no_telp" value="<?php echo $row ['no_telp']; ?>" class="form-control" placeholder="No Telepon" required>
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-sm-2 control-label">Jabatan</label>
					<div class="col-sm-2">
						<select name="jabatan" class="form-control" required>
							<option value=""> - Jabatan Terbaru - </option>
							<option value="Helper">Helper</option>
							<option value="Operator">Operator</option>
							<option value="Leader">Leader</option>
							<option value="Staf">Staf</option>
                            <option value="Supervisor">Supervisor</option>
							<option value="Manager">Manager</option>
						</select>
					</div>
                    <div class="col-sm-3">
                    <b>Jabatan Sekarang :</b> <span class="label label-success"><?php echo $row['jabatan']; ?></span>
				    </div>
				</div>
				<div class="row mb-3">
					<label class="col-sm-2 control-label">Status</label>
					<div class="col-sm-2">
						<select name="status" class="form-control">
							<option value="">- Status Terbaru -</option>
                            <option value="Outsourcing">Outsourcing</option>
							<option value="Kontrak">Kontrak</option>
							<option value="Tetap">Tetap</option>
						</select> 
					</div>
                    <div class="col-sm-3">
                    <b>Status Sekarang :</b> <span class="label label-info"><?php echo $row['status']; ?></span>
				    </div>
                </div>
				<!--<div class="row mb-3">
					<label class="col-sm-3 control-label">Username</label>
					<div class="col-sm-2">
						<input type="text" name="username" value="<?php //echo $row['username']; ?>" class="form-control" placeholder="Username">
					</div>
				</div>
				<div class="row mb-3">
					<label class="col-sm-3 control-label">Password</label>
					<div class="col-sm-2">
						<input type="password" name="pass1" value="<?php //echo $row['password']; ?>" class="form-control" placeholder="Password">
					</div>
				</div>-->
				<div class="row mb-3">
					<div class="col-sm-6">
						<button type="submit" name="save" class="btn btn-primary" value="Simpan" data-toggle="tooltip" title="Simpan Data Karyawan">Simpan</button>
						<a href="data.php" class="btn btn-danger" data-toggle="tooltip" title="Batal">Batal</a>
					</div>
				</div>
			</form>
		</div> <!-- /.content -->
	</div> <!-- /.container -->