<!DOCTYPE html>
<html>
<head>
    <title>Lokasi Barang</title>
</head>
<body>
    <h1>Sistem Pelacakan Letak Barang | Lokasi Barang</h1>
    <h2>Data Barang</h2>
    <table border="1">
        <tr>
            <th>No. Kode</th>
            <th>Nama Lokasi</th>
            <th>Nama Barang</th>
            <th>Aksi</th>
        </tr>
        <?php
        // Data barang
        $data_barang = [
            ["no_kode" => 1, "nama_lokasi" => "contoh lokasi", "nama_barang" => "contoh barang", "aksi" => "<a href='update.php?id=1'>Update</a> | <a href='delete.php?id=1'>Delete</a>"],
            // ... tambahkan data barang lainnya disini
        ];

        foreach ($data_barang as $barang) {
            echo "<tr>";
            echo "<td>{$barang['no_kode']}</td>";
            echo "<td>{$barang['nama_lokasi']}</td>";
            echo "<td>{$barang['nama_barang']}</td>";
            echo "<td>{$barang['aksi']}</td>";
            echo "</tr>";
        }
        ?>
        <?php
        // Data barang
        $data_barang = [
            ["no_kode" => 2, "nama_lokasi" => "contoh lokasi", "nama_barang" => "contoh barang", "aksi" => "<a href='update.php?id=1'>Update</a> | <a href='delete.php?id=1'>Delete</a>"],
            // ... tambahkan data barang lainnya disini
        ];

        foreach ($data_barang as $barang) {
            echo "<tr>";
            echo "<td>{$barang['no_kode']}</td>";
            echo "<td>{$barang['nama_lokasi']}</td>";
            echo "<td>{$barang['nama_barang']}</td>";
            echo "<td>{$barang['aksi']}</td>";
            echo "</tr>";
        }
        ?>
        <?php
        // Data barang
        $data_barang = [
            ["no_kode" => 3, "nama_lokasi" => "contoh lokasi", "nama_barang" => "contoh barang", "aksi" => "<a href='update.php?id=1'>Update</a> | <a href='delete.php?id=1'>Delete</a>"],
            // ... tambahkan data barang lainnya disini
        ];

        foreach ($data_barang as $barang) {
            echo "<tr>";
            echo "<td>{$barang['no_kode']}</td>";
            echo "<td>{$barang['nama_lokasi']}</td>";
            echo "<td>{$barang['nama_barang']}</td>";
            echo "<td>{$barang['aksi']}</td>";
            echo "</tr>";
        }
        ?>
    </table>
    

    <h2>Tambah Lokasi Barang</h2>
    <!-- Form untuk menambahkan lokasi barang -->
    <form action="tambah_lokasi.php" method="post">
        <label for="nama_lokasi">Nama Lokasi:</label>
        <input type="text" id="nama_lokasi" name="nama_lokasi" required>
        <input type="submit" value="Tambah Lokasi">
    </form>
</body>
</html>