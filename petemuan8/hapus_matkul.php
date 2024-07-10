<?php
// Memanggil file konfigurasi
require 'd.php';

// Cek apakah parameter kdmik ada
if (isset($_GET['kdmik'])) {
    $kdmik = $_GET['kdmik'];

    // Fungsi untuk menghapus data matkul berdasarkan kdmik
    function hapus($kdmik) {
        global $koneksi;
        $query = "DELETE FROM matkul WHERE kdmik = '$kdmik'";
        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    }

    // Memanggil fungsi hapus dan memberikan feedback ke pengguna
    if (hapus($kdmik) > 0) {
        echo "
            <script>
                alert('Data berhasil dihapus');
                document.location.href = 'matkul.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal dihapus');
                document.location.href = 'matkul.php';
            </script>
        ";
    }
} else {
    // Jika tidak ada parameter kdmik, kembali ke halaman matkul
    header('Location: matkul.php');
}
?>
