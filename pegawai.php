<?php
//ciptakan object dari class Pegawai
$model = new Pegawai();
//panggil fungsi untuk menampilkan data pegawai
$data_pegawai = $model->dataPegawai();
/*
foreach ($data_pegawai as $row) {
    print $row['nip'] . "\t";
    print $row['nama'] . "\t";
    print $row['alamat'] . "\n";
}
*/
//beri session untuk hak akses halaman pegawai
$sesi = $_SESSION['MEMBER'];
if (isset($sesi)) {
?>
    <section class="section schedule">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h3>Daftar <span class="alternate">Pegawai</span></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a class="btn btn-primary btn-sm" href="index.php?hal=pegawai_form" role="button" title="Tambah Pegawai">
                        &nbsp;<i class="fa fa-plus" aria-hidden="true"></i>&nbsp;
                    </a>
                    <br /><br />
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">NIP</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Divisi</th>
                                <th scope="col">Jabatan</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($data_pegawai as $row) {
                            ?>
                                <tr>
                                    <th scope="row"><?= $no ?></th>
                                    <td><?= $row['nip'] ?></td>
                                    <td><?= $row['nama'] ?></td>
                                    <td><?= $row['gender'] ?></td>
                                    <td><?= $row['bagian'] ?></td>
                                    <td><?= $row['jab'] ?></td>
                                    <td><?= $row['alamat'] ?></td>
                                    <td>
                                        <form action="pegawai_controller.php" method="POST">
                                            <a href="index.php?hal=pegawai_detail&id=<?= $row['id'] ?>">
                                                <button type="button" class="btn btn-info btn-sm" title="Detail Pegawai">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </a>
                                            <a href="index.php?hal=pegawai_form&idedit=<?= $row['id'] ?>">
                                                <button type="button" class="btn btn-warning btn-sm" title="Ubah Pegawai">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </button>
                                            </a>
                                            <?php
                                            if ($sesi['role'] != 'staff') {
                                            ?>
                                                <button type="submit" class="btn btn-danger btn-sm" name="proses" value="hapus" onclick="return confirm('anda yakin data anda dihapus')" title="hapus Pegawai">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                </button>
                                                <input type="hidden" name="idx" value="<?= $row['id'] ?>">
                                            <?php
                                            }
                                            ?>
                                        </form>
                                    </td>
                                </tr>
                            <?php
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
<?php
} else {
    echo '<script>alert("Anda Terlarang Akses Halaman ini");history.back();</script>';
}
?>