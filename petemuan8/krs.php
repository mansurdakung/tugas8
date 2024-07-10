<?php 
require_once('header.php');
require_once('conf/koneksi.php'); // Pastikan koneksi.php diimpor sebelum menggunakan fungsi query

$krs = query("SELECT nim, kdmik, nidn, uts, uas, ruangan, tahun_ajaran FROM krs");
?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data KRS</h1>
<p class="mb-4">Data Kartu Rencana Studi STMIK Lombok <br><a class="btn btn-primary" href="tambah_data_krs.php">Tambah</a></p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data KRS</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>KDMik</th>
                        <th>NIDN</th>
                        <th>UTS</th>
                        <th>UAS</th>
                        <th>Ruangan</th>
                        <th>Tahun Ajaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    
                </tfoot>
                <tbody>
                <?php $no = 1; foreach ($krs as $row) { ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row["nim"]; ?></td>
                        <td><?= $row["kdmik"]; ?></td>
                        <td><?= $row["nidn"]; ?></td>
                        <td><?= $row["uts"]; ?></td>
                        <td><?= $row["uas"]; ?></td>
                        <td><?= $row["ruangan"]; ?></td>
                        <td><?= $row["tahun_ajaran"]; ?></td>
                        <td>
                            <a href="ubah_krs.php?nim=<?= $row["nim"]; ?>" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Ubah</a>
                            <a href="hapus_krs.php?nim=<?= $row["nim"]; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"><i class="fa fa-trash"></i> Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
