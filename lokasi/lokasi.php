<?php 
session_start();
include '../partial/head.php'; 
include '../koneksi.php';
if(!isset($_SESSION['role'])){
    header("location:../login.php?pesan=belum_login");
}

?>
<title>Data Lokasi</title>	
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<body>
    <div class="tabular--wrapper">
        <h3 class="main--title">Sistem Pelacakan Letak Barang | Lokasi Barang</h3>
        <!-- <form class="form-lokasi" action="tambah_lokasi.php" method="post">
            <input type="submit" value="Tambah Lokasi">
        </form> -->

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModal">
            Tambah Lokasi
        </button>

        <!-- Modal -->
        <div class="modal fade" id="tambahModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tambahModalLabel">Tambah Lokasi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="tambah_lokasi.php" method="post" id="tambahForm">
                    <div class="mb-3">
                        <label>Nama Lokasi</label>
                        <input type="text" name="nama_lokasi" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" form="tambahForm" class="btn btn-primary">Submit</button>
            </div>
            </div>
        </div>
        </div>
        
        <div class="table-container">
            <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Lokasi</th>
                        <th>Nama Lokasi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 0;
                        $ambil = mysqli_query($conn, "select * from lokasi ORDER BY nama_lokasi ASC");
                        
                        while ($data = mysqli_fetch_array($ambil)) {
                            $no++;  
                    ?>
                    
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $data[0];?></td>
                        <td><?php echo $data[1];?></td>
                        <!-- <td style="max-width: 25%; overflow: hidden; text-overflow: ellipsis;"><?php echo $data[2];?></td> -->
                        <td style="text-align: center; max-width: 20%; overflow: hidden; text-overflow: ellipsis;">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ubahModal" onclick="setData('<?= $data['0'] ?>', '<?= $data['1'] ?>')">
                            <i class="fa fa-pencil"></i>
                        </button>
                            <button class="btn btn-sm btn-danger" onclick="delete_data(<?php echo $data[0];?>)"><i class="fas fa-trash"></i></button>
                                <script type="text/javascript">
                                            $(document).ready( function () {
                                                $('#table_id').DataTable();
                                            } );

                                            function edit_data(id) {
                                                $.ajax({
                                                    type: 'GET',
                                                    url: 'update.php',
                                                    data: { id: id },
                                                    success: function (response) {
                                                        alert('Anda memilih untuk mengedit data dengan ID ' );
                                                    },
                                                    error: function (error) {
                                                        console.log(error);
                                                        alert('Terjadi kesalahan saat mengambil data untuk diedit.');
                                                    }
                                                });
                                            }

                                            function delete_data(id) {
                                                if (confirm('Apakah Anda yakin ingin menghapus data ini')) {
                                                    $.ajax({
                                                        type: 'POST',
                                                        url: 'delete.php', 
                                                        data: { id: id },
                                                        success: function(response) {
                                                            location.reload();
                                                        },
                                                        error: function(error) {
                                                            console.log(error);
                                                            alert('Terjadi kesalahan saat menghapus data.');
                                                        }
                                                    });
                                                }
                                            }
                                        </script>
                                        
                                    </td>
                                </tr>
                        <?php } ?>
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="ubahModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ubahModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="ubahModalLabel">Tambah Lokasi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="tambah_lokasi.php" method="post" id="ubahForm">
                    <div class="mb-3">
                        <label>Nama Lokasi</label>
                        <input type="text" name="nama_lokasi" id="ubahNamaLokasi" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" form="ubahForm" class="btn btn-primary">Submit</button>
            </div>
            </div>
        </div>
        </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );

        function setData(id, nama_lokasi) {
            ubahForm.action = 'update.php?id=' + id;
            ubahNamaLokasi.value = nama_lokasi;
        }

    </script>
    
</body>
</html>
