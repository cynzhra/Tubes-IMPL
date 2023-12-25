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
            margin-top: 20px; /* Adjusted margin-top */
            margin-bottom: 20px;
            background-color: #f2f2f2;
            border-radius: 10px;
            box-shadow: 0 0 16px rgba(0, 0, 0, 0.1);
            padding: 15px; /* Adjusted padding */
            text-align: left; /* Left-align the form */
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

        .image-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px; /* Adjusted margin-top */
        }

        .image-frame {
            width: 100px; /* Adjusted width */
            height: 100px; /* Adjusted height */
            border-radius: 50%;
            overflow: hidden;
            border: 2px solid #3498db;
        }

        .image-frame img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .details-column {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px; /* Adjusted margin-top */
        }

        .product-details {
            margin-top: 10px; /* Adjusted margin-top */
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
        .product-details {
        background-color: #ffffff; /* Set your desired background color */
        padding: 15px; /* Adjusted padding */
        border-radius: 10px; /* Adjusted border-radius */
        box-shadow: 0 0 16px rgba(0, 0, 0, 0.1); /* Adjusted box-shadow */
        text-align: left; /* Left-align the content */
        width: 60%; /* Adjusted width */
        margin: 0 auto; /* Center the element */
}
        .product-details {
            background-color: #ffffff; /* Set your desired background color */
            padding: 15px; /* Adjusted padding */
            border-radius: 10px; /* Adjusted border-radius */
            box-shadow: 0 0 16px rgba(0, 0, 0, 0.1); /* Adjusted box-shadow */
            text-align: left; /* Left-align the content */
            width: 60%; /* Adjusted width */
            margin: 0 auto; /* Center the element */
        }
        

    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
    
</head>
<body>
    <h1>Sistem Pelacakan Letak Barang | Lokasi Barang</h1>
    <h2>Barang </h2>
    <!-- Form untuk menambahkan lokasi barang -->
    <form action="search.php" method="post">
        <label for="nama_barang">Nama Barang:</label>
        <input type="text" id="nama_lokasi" name="nama_lokasi" required>
        
        <!-- Image container with circular frame -->
        <div class="image-container">
            <div class="image-frame">
                <!-- Placeholder image or dynamically loaded image source -->
                <img src="images/logo.jpg" alt="Logo">
            </div>
        </div>

        <!-- Column for product details -->
        <div class="details-column">
            <div class="product-details">
            <label for="Detail_barang">Detail Barang:</label>
                <strong>Nama Produk:</strong> Lorem Ipsum Product<br>
                <strong>Lokasi:</strong> - <br>
                <strong>Keterangan:</strong> - <br>
                <!-- Add more details as needed -->
            </div>
        </div>
    </form>
</body>
</html>
