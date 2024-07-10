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

// Fungsi untuk mengubah data
function ubah($data) {
    global $koneksi;
    $nim = $data["nim"];
    $kdmik = $data["kdmik"];
    $nidn = $data["nidn"];
    $uts = $data["uts"];
    $uas = $data["uas"];
    $ruangan = $data["ruangan"];
    $tahun_ajaran = $data["tahun_ajaran"];

    $query = "UPDATE krs SET 
                kdmik = '$kdmik', 
                nidn = '$nidn', 
                uts = '$uts', 
                uas = '$uas', 
                ruangan = '$ruangan', 
                tahun_ajaran = '$tahun_ajaran' 
              WHERE nim = '$nim'";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
?>
