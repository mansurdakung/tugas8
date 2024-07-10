<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "belajarphp");

// Fungsi untuk mengambil data dari database
function query($query) {
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// Fungsi untuk mengubah data matkul
function ubah($data) {
    global $koneksi;

    $kdmik = htmlspecialchars($data["kdmik"]);
    $matkul = htmlspecialchars($data["matkul"]);
    $sks = htmlspecialchars($data["sks"]);

    $query = "UPDATE matkul SET
                matkul = '$matkul',
                sks = '$sks'
              WHERE kdmik = '$kdmik'";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
?>
