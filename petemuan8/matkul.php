<?php 
require_once('header.php');
require_once('conf/koneksi.php'); // Pastikan koneksi.php diimpor sebelum menggunakan fungsi query

$matkul = query("SELECT kdmik, matkul, sks FROM matkul");
?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Mata Kuliah</h1>
<p class="mb-4">Data Mata Kuliah STMIK Lombok <br><a class="btn btn-primary" href="tambah_data_matkul.php">Tambah</a></p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Mata Kuliah</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>KDMik</th>
                        <th>Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                
                <tbody>
                <?php $no = 1; foreach ($matkul as $row) { ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row["kdmik"]; ?></td>
                        <td><?= $row["matkul"]; ?></td>
                        <td><?= $row["sks"]; ?></td>
                        <td>
                            <a href="ubah_matkul.php?kdmik=<?= $row["kdmik"]; ?>" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Ubah</a>
                            <a href="hapus_matkul.php?kdmik=<?= $row["kdmik"]; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"><i class="fa fa-trash"></i> Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
