<?php 
// Memanggil file koneksi atau konfigurasi database (gu.php dalam contoh ini)
require 'conf/koneksi.php';

// Cek jika tombol submit diklik
if (isset($_POST["submit"])) {
    // Ambil data dari form
    $nim = $_POST['nim'];
    $kdmik = $_POST['kdmik'];
    $nidn = $_POST['nidn'];
    $uts = $_POST['uts'];
    $uas = $_POST['uas'];
    $ruangan = $_POST['ruangan'];
    $tahun_ajaran = $_POST['tahun_ajaran'];

    // Query untuk tambah data krs
    $query = "INSERT INTO krs (nim, kdmik, nidn, uts, uas, ruangan, tahun_ajaran) 
              VALUES ('$nim', '$kdmik', '$nidn', '$uts', '$uas', '$ruangan', '$tahun_ajaran')";

    // Eksekusi query
    if (mysqli_query($koneksi, $query)) {
        echo "
            <script>
                alert('Data berhasil disimpan');
                document.location.href = 'krs.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal disimpan');
                document.location.href = 'krs.php';
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
    <title>Tambah Data KRS</title>
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
            padding: 7px;
            margin-bottom: 1px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            width: 95%;
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
            width: 95%;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .form-group {
            margin-bottom: 5px;
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
        <h1>Form Tambah Data KRS</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="nim" class="required">NIM:</label>
                <input type="text" id="nim" name="nim" required>
            </div>
            <div class="form-group">
                <label for="kdmik" class="required">KDMik:</label>
                <input type="text" id="kdmik" name="kdmik" required>
            </div>
            <div class="form-group">
                <label for="nidn" class="required">NIDN:</label>
                <input type="text" id="nidn" name="nidn" required>
            </div>
            <div class="form-group">
                <label for="uts" class="required">UTS:</label>
                <input type="text" id="uts" name="uts" required>
            </div>
            <div class="form-group">
                <label for="uas" class="required">UAS:</label>
                <input type="text" id="uas" name="uas" required>
            </div>
            <div class="form-group">
                <label for="ruangan" class="required">Ruangan:</label>
                <input type="text" id="ruangan" name="ruangan" required>
            </div>
            <div class="form-group">
                <label for="tahun_ajaran" class="required">Tahun Ajaran:</label>
                <input type="text" id="tahun_ajaran" name="tahun_ajaran" required>
            </div>
            <input type="submit" value="Simpan" name="submit">
        </form>
    </div>
</body>
</html>
