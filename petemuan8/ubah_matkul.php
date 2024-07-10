<?php 
// Memanggil file konfigurasi
require 'd.php';

// Ambil data di URL
$kdmik = $_GET["kdmik"];

// Query data matkul berdasarkan kdmik
$matkul = query("SELECT * FROM matkul WHERE kdmik = '$kdmik'")[0];

// Cek status tombol apakah sudah ditekan 
if (isset($_POST["submit"])) {
    // Menambahkan fungsi untuk mengubah data dengan fungsi ubah yang sudah dibuat di koneksi.php
    if (ubah($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil diubah');
                document.location.href = 'matkul.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal diubah');
                document.location.href = 'matkul.php';
            </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Ubah Mata Kuliah</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 50px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .title {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 2px solid #ddd;
            border-radius: 5px;
        }

        .form-control:focus {
            border-color: #007bff;
            outline: none;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            width: 100%;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="title">Form Ubah Mata Kuliah</h1>
        <form action="" method="POST">
            <input type="hidden" name="kdmik" value="<?= $matkul["kdmik"]; ?>">
            <div class="form-group">
                <label for="matkul">Mata Kuliah:</label>
                <input type="text" class="form-control" id="matkul" name="matkul" value="<?= $matkul["matkul"]; ?>" required>
            </div>
            <div class="form-group">
                <label for="sks">SKS:</label>
                <input type="text" class="form-control" id="sks" name="sks" value="<?= $matkul["sks"]; ?>" required>
            </div>
            <button type="submit" class="btn" name="submit">Simpan</button>
        </form>
    </div>
</body>
</html>
