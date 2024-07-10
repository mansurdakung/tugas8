<?php
include('f.php');

// Ambil data mahasiswa yang akan diedit
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM mahasiswa WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
}

// Proses penyimpanan data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
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

    // Upload file gambar jika ada file baru
    if (!empty($gambar)) {
        if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file)) {
            $query = "UPDATE mahasiswa SET nim='$nim', nama='$nama', email='$email', jurusan='$jurusan', gambar='$gambar' WHERE id=$id";
        } else {
            echo "<script>alert('Gagal mengupload gambar');</script>";
        }
    } else {
        $query = "UPDATE mahasiswa SET nim='$nim', nama='$nama', email='$email', jurusan='$jurusan' WHERE id=$id";
    }

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data berhasil diperbarui');window.location='mahasiswa.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
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
        <h1>Edit Data Mahasiswa</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

            <label for="nim">NIM:</label>
            <input type="text" name="nim" id="nim" value="<?php echo $data['nim']; ?>" required>

            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" value="<?php echo $data['nama']; ?>" required>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?php echo $data['email']; ?>" required>

            <label for="jurusan">Jurusan:</label>
            <select name="jurusan" id="jurusan" required>
                <option value="">Pilih Jurusan</option>
                <option value="Teknik Informatika" <?php if($data['jurusan'] == 'Teknik Informatika') echo 'selected'; ?>>Teknik Informatika</option>
                <option value="Sistem Informasi" <?php if($data['jurusan'] == 'Sistem Informasi') echo 'selected'; ?>>Sistem Informasi</option>
                <!-- Tambahkan jurusan lain sesuai kebutuhan -->
            </select>

            <label for="gambar">Gambar:</label>
            <input type="file" name="gambar" id="gambar">

            <input type="submit" value="Perbarui">
        </form>
    </div>
</body>
</html>
