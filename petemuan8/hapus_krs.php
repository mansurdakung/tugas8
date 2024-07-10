<?php
require_once('h.php'); // Pastikan koneksi.php diimpor sebelum menggunakan fungsi query

if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];

    // Query untuk menghapus data berdasarkan NIM
    $query = "DELETE FROM krs WHERE nim = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $nim);

    if ($stmt->execute()) {
        // Jika berhasil dihapus, redirect ke halaman utama dengan pesan sukses
        header("Location: krs.php?message=Data berhasil dihapus");
    } else {
        // Jika gagal, redirect ke halaman utama dengan pesan error
        header("Location: krs.php?message=Data gagal dihapus");
    }

    $stmt->close();
} else {
    // Jika tidak ada NIM yang dikirim, redirect ke halaman utama
    header("Location: krs.php");
}
$conn->close();
?>
