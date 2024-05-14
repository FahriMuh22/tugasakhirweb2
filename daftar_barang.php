<?php include "koneksi.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.container {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

a.button {
    display: inline-block;
    text-align: right;
    padding: 10px 20px;
    background-color: #4caf50;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    margin-bottom: 10px;
}

a.button:hover {
    background-color: #45a049;
}

form {
    margin-bottom: 20px;
}

input[type="text"],
input[type="number"] {
    padding: 8px;
    border-radius: 5px;
    border: 1px solid #ccc;
    margin-right: 10px;
}

button[type="submit"] {
    padding: 8px 20px;
    border-radius: 5px;
    border: none;
    background-color: #4caf50;
    color: #fff;
    cursor: pointer;
}

button[type="submit"]:hover {
    background-color: #45a049;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

    </style>
</head>
<body>
    <div class="container">
        <h2>Daftar Barang</h2>
        <a href="tambah_barang.php" class="button">Tambah Barang</a>
        <form action="" method="GET">
            <input type="text" name="search" placeholder="Cari...">
            <button type="submit">Cari</button>
        </form>
        <table>
            <tr>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Kategori</th>
                <th>Lokasi</th>
                <th>Aksi</th>
            </tr>
            <?php
            $search = isset($_GET['search']) ? $_GET['search'] : '';
            $where = $search ? "WHERE nama_barang LIKE '%$search%' OR nama_kategori LIKE '%$search%' OR nama_lokasi LIKE '%$search%'" : '';

            $query = "SELECT barang.*, kategori.nama_kategori, lokasi.nama_lokasi FROM barang 
                      INNER JOIN kategori ON barang.kategori_id = kategori.id 
                      INNER JOIN lokasi ON barang.lokasi_id = lokasi.id $where";
            $result = $conn->query($query);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row['nama_barang']."</td>";
                    echo "<td><form action='update_barang.php' method='POST'><input type='number' name='jumlah' value='".$row['jumlah']."' min='0'><input type='hidden' name='id_barang' value='".$row['id']."'><button type='submit'>Update</button></form></td>";
                    echo "<td>".$row['nama_kategori']."</td>";
                    echo "<td>".$row['nama_lokasi']."</td>";
                    echo "<td><a href='hapus_barang.php?id=".$row['id']."'>Hapus</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Tidak ada barang</td></tr>";
            }
            ?>
        </table>
        <p>
            <a href="beranda.php" class="button">Kembali</a>
        </p>
    </div>
</body>
</html>
