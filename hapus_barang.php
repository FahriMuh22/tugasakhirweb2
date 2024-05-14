<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id_barang = $_GET['id'];

    // Kueri SQL untuk menghapus barang berdasarkan id
    $sql = "DELETE FROM barang WHERE id = $id_barang";

    if ($conn->query($sql) === TRUE) {
        // Redirect kembali ke halaman daftar_barang.php setelah penghapusan
        header("Location: daftar_barang.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
