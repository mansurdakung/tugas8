<?php 
// Memanggil file koneksi atau konfigurasi database
require 'conf/koneksi.php';

// Cek jika tombol submit diklik
if (isset($_POST["submit"])) {
    // Ambil data dari form
    $kdmik = $_POST['kdmik'];
    $matkul = $_POST['matkul'];
    $sks = $_POST['sks'];

    // Query untuk tambah data matkul
    $query = "INSERT INTO matkul (kdmik, matkul, sks) 
              VALUES ('$kdmik', '$matkul', '$sks')";

    // Eksekusi query
    if (mysqli_query($koneksi, $query)) {
        echo "
            <script>
                alert('Data berhasil disimpan');
                document.location.href = 'matkul.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal disimpan');
                document.location.href = 'matkul.php';
            </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mata Kuliah</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            color: #333;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"] {
            padding: 11px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            width: 90%;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 16px;
            width: 96%;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .form-group {
            margin-bottom: 10px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .required::after {
            content: "*";
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Form Tambah Matkul</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="kdmik" class="required">KDMik:</label>
                <input type="text" id="kdmik" name="kdmik" required>
            </div>
            <div class="form-group">
                <label for="matkul" class="required">Mata Kuliah:</label>
                <input type="text" id="matkul" name="matkul" required>
            </div>
            <div class="form-group">
                <label for="sks" class="required">SKS:</label>
                <input type="text" id="sks" name="sks" required>
            </div>
            <input type="submit" value="Simpan" name="submit">
        </form>
    </div>
</body>
</html>
