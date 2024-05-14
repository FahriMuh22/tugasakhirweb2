<?php
$host = "localhost"; // Sesuaikan dengan host database Anda
$username = "pma"; // Sesuaikan dengan username database Anda
$password = ""; // Sesuaikan dengan password database Anda
$database = "inventory_db";

// Membuat koneksi
$conn = new mysqli($host, $username, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>