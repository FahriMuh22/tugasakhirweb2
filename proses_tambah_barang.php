<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proses Tambah Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-align: center;
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
            margin-bottom: 20px;
        }
        .message {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #dff0d8;
            border: 1px solid #3c763d;
            border-radius: 5px;
            color: #3c763d;
        }
        .error {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #f2dede;
            border: 1px solid #a94442;
            border-radius: 5px;
            color: #a94442;
        }
        a.button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4caf50;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 10px;
        }
        a.button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        include "koneksi.php";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama_barang = $_POST["nama_barang"];
            $jumlah = $_POST["jumlah"];
            $kategori_id = $_POST["kategori"];
            $lokasi_id = $_POST["lokasi"];

            $sql = "INSERT INTO barang (nama_barang, jumlah, kategori_id, lokasi_id) VALUES ('$nama_barang', $jumlah, $kategori_id, $lokasi_id)";

            if ($conn->query($sql) === TRUE) {
                echo "<div class='message'>Barang berhasil ditambahkan</div>"; 
            } else {
                echo "<div class='error'>Error: " . $sql . "<br>" . $conn->error . "</div>";
            }
        }

        $conn->close();
        ?>
        <a href="beranda.php" class="button">Kembali</a>
        <a href="daftar_barang.php" class="button">Lihat Daftar Barang</a>
    </div>
</body>
</html>
