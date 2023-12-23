<?php
session_start(); 
include("../partial/head.php"); // memanggil file head.php 
include("../koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
if(!isset($_SESSION['role'])){
	header("location:login.php?pesan=belum_login");
}
?>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
	    <div class="tabular--wrapper">
			<h3 class="main--title">Data Karyawan</h3>
			<?php
				if(isset($_GET['aksi']) == 'delete'){ // mengkonfirmasi jika 'aksi' bernilai 'delete' merujuk pada baris 90 dibawah
					$id_kyw = $_GET['id_kyw']; // ambil nilai id_kyw
					$cek = mysqli_query($conn, "SELECT * FROM karyawan WHERE id_kyw='$id_kyw'"); // query untuk memilih entri dengan id_kyw yang dipilih
					if(mysqli_num_rows($cek) == 0){ // mengecek jika tidak ada entri id_kyw yang dipilih
						echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>'; // maka tampilkan 'Data tidak ditemukan.'
					}else{ // mengecek jika terdapat entri id_kyw yang dipilih
						$delete = mysqli_query($conn, "DELETE FROM karyawan WHERE id_kyw='$id_kyw'"); // query untuk menghapus
						if($delete){ // jika query delete berhasil dieksekusi
							echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>'; // maka tampilkan 'Data berhasil dihapus.'
						}else{ // jika query delete gagal dieksekusi
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>'; // maka tampilkan 'Data gagal dihapus.'
						}
					}
				}
			?>
			<!-- bagian ini untuk memfilter data berdasarkan status -->
			<div class="filter--wrapper">
			<div class="top-left">
        		<a href="tambah.php" class="button-link">Tambah Barang</a>
			</div>
				<form class="form-inline top-right" method="get">
					<div class="form-group">
						<select name="filter" class="form-control" onchange="form.submit()">
							<option value="0">Filter Data Karyawan</option>
							<?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  ?>
							<option value="Tetap" <?php if($filter == 'Tetap'){ echo 'selected'; } ?>>Tetap</option>
							<option value="Kontrak" <?php if($filter == 'Kontrak'){ echo 'selected'; } ?>>Kontrak</option>
							<option value="Outsourcing" <?php if($filter == 'Outsourcing'){ echo 'selected'; } ?>>Outsourcing</option>
						</select>
					</div>
				</form> <!-- end filter -->
			</div>
		
		<!-- Tabel Data Karyawan -->
        <div class="table-container">
            <table>
				<thead>
					<tr>
						<th>No</th>
						<th>ID Karyawan</th>
						<th>Nama Karyawan</th>
						<th>Jenis Kelamin</th>
						<th>Alamat Karyawan</th>
						<th>Tempat Lahir</th>
						<th>Tanggal Lahir</th>
						<th>Telephone</th>
						<th>Jabatan</th>
						<th>Status</th>
						<th>Tools</th>
					</tr>
				</thead>
                <tbody>
				<?php
					if($filter){
						$sql = mysqli_query($conn, "SELECT * FROM karyawan WHERE status='$filter' ORDER BY id_kyw ASC"); // query jika filter dipilih
					}else{
						$sql = mysqli_query($conn, "SELECT * FROM karyawan ORDER BY id_kyw ASC"); // jika tidak ada filter maka tampilkan semua entri
					}
					
					if(mysqli_num_rows($sql) == 0){ 
						echo '<tr><td colspan="11">Data Tidak Ada.</td></tr>'; // jika tidak ada entri di database maka tampilkan 'Data Tidak Ada.'
					}else{ // jika terdapat entri maka tampilkan datanya
						$no = 1; // mewakili data dari nomor 1
						while($row = mysqli_fetch_assoc($sql)){ // fetch query yang sesuai ke dalam array
							echo '
								<tr>
									<td>'.$no.'</td>
									<td>'.$row['id_kyw'].'</td>
									<td><a href="profile.php?id_kyw='.$row['id_kyw'].'">'.$row['nama_kyw'].'</a></td>
									<td>';
										if($row['jk'] == 'P'){
											echo 'Perempuan';
										} else{
											echo 'Laki-Laki';
										}
									echo'</td>
									<td>'.$row['tempat_lahir'].'</td>
									<td>'.$row['tanggal_lahir'].'</td>
									<td>'.$row['alamat_kyw'].'</td>
									<td>'.$row['no_telp'].'</td>
									<td>'.$row['jabatan'].'</td>
									<td>';
										if($row['status'] == 'Tetap'){
											echo '<span class="label label-success">Tetap</span>';
										}
										else if ($row['status'] == 'Kontrak' ){
											echo '<span class="label label-info">Kontrak</span>';
										}
										else if ($row['status'] == 'Outsourcing' ){
											echo '<span class="label label-warning">Outsourcing</span>';
										}
										echo '
									</td>
									<td>
										<a href="edit.php?id_kyw='.$row['id_kyw'].'" title="Edit Data" data-toggle="tooltip" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true">Edit</span></a>
										<a href="data.php?aksi=delete&id_kyw='.$row['id_kyw'].'" data-toggle="tooltip" onclick="return confirm("Apakah Anda yakin ingin menghapus data ini?")" class="btn btn-danger btn-sm">Hapus</a>
									</td>
								</tr>
							';
							$no++; // mewakili data kedua dan seterusnya
						}
					}
				?>
                </tbody>
            </table>
        </div>
    </div>
