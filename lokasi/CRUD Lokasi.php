<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lokasi Barang</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
        }

        h2 {
            color: #3498db;
            border-bottom: 2px solid #3498db;
            padding-bottom: 5px;
            text-align: center;
            font-size: 18px;
            margin-top: 0;
            margin-bottom: 15px;
        }

        form {
            margin-bottom: 20px;
            margin: 0;
            padding: 10px;
            background-color: #f2f2f2;
            border-radius: 10px;
            box-shadow: 0 0 16px rgba(0, 0, 0, 0.1);
            max-width: 50%;
        }

        label {
            display: block;
            margin-bottom: 4px;
            color: #333;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #5DADE2; /* Lighter shade of blue */
            color: #fff;
            padding: 6px 12px; /* Smaller padding */
            border: none;
            border-radius: 3px; /* Smaller border radius */
            cursor: pointer;
            font-size: 14px; /* Smaller font size */
            margin: 10px 0 0 0;
        }

        input[type="submit"]:hover {
            background-color: #3498db; /* Original blue on hover */
        }

        div.dataTables_wrapper div.dataTables_filter {
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="container" style="margin-top: 20px">
        <div class="row">
            <div class="col-md-12">
                <h2 style="text-align: center;margin-bottom: 30px">Sistem Pelacakan Letak Barang | Lokasi</h2>
                <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th style="width: 10%;">Kode</th>
                            <th style="width: 25%;">Nama Lokasi</th>
                            <th style="width: 40%;">Nama Barang</th>
                            <th style="width: 20%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $conn = mysqli_connect("localhost", "root", "", "db_toko");

                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            }

                            $no = 0;
                            $ambil = mysqli_query($conn, "select * from lokasi");

                            while ($data = mysqli_fetch_array($ambil)) {
                                $no++;  
                        ?>
                                <tr>
                                    <td><?php echo $no;?></td>
                                    <td><?php echo $data[1];?></td>
                                    <td style="max-width: 25%; overflow: hidden; text-overflow: ellipsis;"><?php echo $data[2];?></td>
                                    <td style="max-width: 40%; overflow: hidden; text-overflow: ellipsis;"><?php echo $data[3];?></td> 
                                    <td style="text-align: center; max-width: 20%; overflow: hidden; text-overflow: ellipsis;">
                                        <button class="btn btn-sm btn-primary" onclick="edit_data(<?php echo $data['id'];?>)"><i class="glyphicon glyphicon-pencil"></i></button>
                                        <button class="btn btn-sm btn-danger" onclick="delete_data(<?php echo $data['id'];?>)"><i class="glyphicon glyphicon-trash"></i></button>
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
                <h2 id="tambah-title">Tambah Lokasi Barang</h2>
                <form action="tambah_lokasi.php" method="post">
                    <label for="nama_lokasi">Nama Lokasi:</label>
                    <input type="text" id="nama_lokasi" name="nama_lokasi" required>
                    <br>
                    <input type="submit" value="Tambah Lokasi">
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script>
</body>
</html>
