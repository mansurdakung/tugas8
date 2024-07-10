<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "belajarphp");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

function tambah($data) {
    global $conn;
    $nama_dosen = htmlspecialchars($data["nama_dosen"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $tlp = htmlspecialchars($data["tlp"]);
    $gelar = htmlspecialchars($data["gelar"]);
    $email = htmlspecialchars($data["email"]);

    $query = "INSERT INTO dosen (nama_dosen, alamat, tlp, gelar, email) VALUES ('$nama_dosen', '$alamat', '$tlp', '$gelar', '$email')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
?>
