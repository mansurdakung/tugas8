<?php
include('f.php');

// Proses penyimpanan data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $jurusan = $_POST['jurusan'];
    $gambar = $_FILES['gambar']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($gambar);
    
    // Buat direktori 'uploads' jika belum ada
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Upload file gambar
    if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file)) {
        $query = "INSERT INTO mahasiswa (nim, nama, email, jurusan, gambar) VALUES ('$nim', '$nama', '$email', '$jurusan', '$gambar')";
        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Data berhasil ditambahkan');window.location='mahasiswa.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan data');</script>";
        }
    } else {
        echo "<script>alert('Gagal mengupload gambar');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fc;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 30%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="email"],
        select {
            width: 95%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="file"] {
            padding: 10px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4e73df;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #2e59d9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tambah Data Mahasiswa</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="nim">NIM:</label>
            <input type="text" name="nim" id="nim" required>

            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" required>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>

            <label for="jurusan">Jurusan:</label>
            <select name="jurusan" id="jurusan" required>
                <option value="">Pilih Jurusan</option>
                <option value="Teknik Informatika">Teknik Informatika</option>
                <option value="Sistem Informasi">Sistem Informasi</option>
                <!-- Tambahkan jurusan lain sesuai kebutuhan -->
            </select>

            <label for="gambar">Gambar:</label>
            <input type="file" name="gambar" id="gambar" required>

            <input type="submit" value="Tambah">
        </form>
    </div>
</body>
</html>
