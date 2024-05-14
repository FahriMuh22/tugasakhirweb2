<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_barang = $_POST["id_barang"];
    $new_quantity = $_POST["jumlah"];

    // Perbarui jumlah barang di database
    $sql = "UPDATE barang SET jumlah = $new_quantity WHERE id = $id_barang";

    if ($conn->query($sql) === TRUE) {
        // Redirect kembali ke halaman daftar_barang.php setelah pembaruan berhasil
        header("Location: daftar_barang.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
