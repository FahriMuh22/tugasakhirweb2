<?php include "koneksi.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"],
        input[type="button"] {
            width: 100%;
            padding: 10px;
            background-color: red;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="container">
        <h2>Tambah Barang</h2>
        <form action="proses_tambah_barang.php" method="POST">
            <label for="nama_barang">Nama Barang:</label><br>
            <input type="text" id="nama_barang" name="nama_barang"><br>
            <label for="jumlah">Jumlah:</label><br>
            <input type="number" id="jumlah" name="jumlah"><br>
            <label for="kategori">Kategori:</label><br>
            <select id="kategori" name="kategori">
                <?php
                $query = "SELECT * FROM kategori";
                $result = $conn->query($query);
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='".$row['id']."'>".$row['nama_kategori']."</option>";
                }
                ?>
            </select><br>
            <label for="lokasi">Lokasi:</label><br>
            <select id="lokasi" name="lokasi">
                <?php
                $query = "SELECT * FROM lokasi";
                $result = $conn->query($query);
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='".$row['id']."'>".$row['nama_lokasi']."</option>";
                }
                ?>
            </select><br><br>
            <input type="submit" value="Tambah"> 
            <p>
            <input type="button" value="Kembali" onclick="window.history.back()">
            </p>
            

        </form>
    </div>
</body>
</html>
