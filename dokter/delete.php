<?php
// Memanggil file koneksi database
require '../dbkoneksi.php';

// Memeriksa apakah parameter id telah diterima dari URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data dokter berdasarkan id
    $sql = "DELETE FROM dokter WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$id]);

    // Menampilkan alert setelah proses penghapusan selesai
    echo "<script>alert('Data berhasil dihapus.'); window.location='index.php';</script>";
    exit();
} else {
    echo "Parameter ID tidak ditemukan.";
    exit;
}
