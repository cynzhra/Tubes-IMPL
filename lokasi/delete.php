<?php
// delete.php

$conn = mysqli_connect("localhost", "root", "", "db_toko");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    $delete_query = "DELETE FROM lokasi WHERE id = $id";

    if (mysqli_query($conn, $delete_query)) {
        echo "Data berhasil dihapus";
    } else {
        echo "Error: " . $delete_query . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
