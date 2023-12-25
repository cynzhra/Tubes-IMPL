<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
            background-color: #ecf0f1;
        }

        h1 {
            color: #000; /* Black color */
        }

        h2 {
            color: #3498db;
            border-bottom: 2px solid #3498db;
            padding-bottom: 5px;
            text-decoration: none; /* Remove underline */
        }

        h2:hover {
            text-decoration: none; /* Remove underline on hover */
        }

        h3 {
            color: #27ae60;
        }

        form {
            margin-bottom: 20px;
            background-color: #f2f2f2;
            border-radius: 10px;
            box-shadow: 0 0 16px rgba(0, 0, 0, 0.1);
            padding: 15px; /* Adjusted padding */
            text-align: center; /* Center-align the form */
        }

        label {
            display: block;
            margin-bottom: 8px; /* Adjusted margin */
            color: #333;
            font-size: 14px; /* Adjusted font size */
        }

        input[type="text"] {
            width: 40%; /* Adjusted width */
            padding: 8px; /* Adjusted padding */
            margin-bottom: 8px; /* Adjusted margin */
            box-sizing: border-box;
            font-size: 14px; /* Adjusted font size */
        }

        input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            padding: 10px 15px; /* Adjusted padding */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px; /* Adjusted font size */
            margin-left: 15px; /* Adjusted margin */
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }

    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
</head>
<body>
    <h1>Sistem Pelacakan Letak Barang | Lokasi Barang</h1>
    <h2>Hallo Karyawan! </h2>
    <h3>Selamat datang! </h3>
    <!-- Form untuk menambahkan lokasi barang -->
    <form action="tambah_lokasi.php" method="post">
        <label for="nama_lokasi">Nama Barang:</label>
        <input type="text" id="nama_lokasi" name="nama_lokasi" required>
        <input type="submit" value="Cari">
    </form>
</body>
</html>

