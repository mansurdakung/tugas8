<?php
// Memanggil file konfigurasi
require 'e.php';

// Ambil data di URL
if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];

    // Query data krs berdasarkan nim
    $krs = query("SELECT * FROM krs WHERE nim = '$nim'")[0];

    // Cek status tombol apakah sudah ditekan 
    if (isset($_POST["submit"])) {
        // Memanggil fungsi ubah
        if (ubah($_POST) > 0) {
            echo "
                <script>
                    alert('Data berhasil diubah');
                    document.location.href = 'krs.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data gagal diubah');
                    document.location.href = 'krs.php';
                </script>
            ";
        }
    }
} else {
    // Jika tidak ada parameter nim, kembali ke halaman krs
    header('Location: krs.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Ubah KRS</title>
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
        <h1 class="title">Form Ubah KRS</h1>
        <form action="" method="POST">
            <input type="hidden" name="nim" value="<?= $krs["nim"]; ?>">
            <div class="form-group">
                <label for="kdmik">KDMik:</label>
                <input type="text" class="form-control" id="kdmik" name="kdmik" value="<?= $krs["kdmik"]; ?>" required>
            </div>
            <div class="form-group">
                <label for="nidn">NIDN:</label>
                <input type="text" class="form-control" id="nidn" name="nidn" value="<?= $krs["nidn"]; ?>" required>
            </div>
            <div class="form-group">
                <label for="uts">UTS:</label>
                <input type="text" class="form-control" id="uts" name="uts" value="<?= $krs["uts"]; ?>" required>
            </div>
            <div class="form-group">
                <label for="uas">UAS:</label>
                <input type="text" class="form-control" id="uas" name="uas" value="<?= $krs["uas"]; ?>" required>
            </div>
            <div class="form-group">
                <label for="ruangan">Ruangan:</label>
                <input type="text" class="form-control" id="ruangan" name="ruangan" value="<?= $krs["ruangan"]; ?>" required>
            </div>
            <div class="form-group">
                <label for="tahun_ajaran">Tahun Ajaran:</label>
                <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran" value="<?= $krs["tahun_ajaran"]; ?>" required>
            </div>
            <button type="submit" class="btn" name="submit">Simpan</button>
        </form>
    </div>
</body>
</html>
