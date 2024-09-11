<?php
//ciptakan object dari class Member
$model = new Member();
//panggil fungsi untuk menampilkan data member
$data_member = $model->dataMember();
//beri session untuk hak akses halaman member
$sesi = $_SESSION['MEMBER'];
if (isset($sesi) && $sesi['role'] == 'admin') {
?>
    <section class="section schedule">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h3>Daftar <span class="alternate">Member</span></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a class="btn btn-primary btn-sm" href="index.php?hal=member_form" role="button" title="Tambah Member">
                        &nbsp;<i class="fa fa-plus" aria-hidden="true"></i>&nbsp;
                    </a>
                    <br /><br />
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Fullname</th>
                                <th scope="col">Email</th>
                                <th scope="col">Username</th>
                                <th scope="col">Role</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($data_member as $row) {
                            ?>
                                <tr>
                                    <th scope="row"><?= $no ?></th>
                                    <td><?= $row['fullname'] ?></td>
                                    <td><?= $row['email'] ?></td>
                                    <td><?= $row['username'] ?></td>
                                    <td><?= $row['role'] ?></td>
                                    <td>
                                        <form action="member_controller.php" method="POST">
                                            <a href="index.php?hal=member_detail&id=<?= $row['id'] ?>">
                                                <button type="button" class="btn btn-info btn-sm" title="Detail Member">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </a>
                                            <a href="index.php?hal=member_form&idedit=<?= $row['id'] ?>">
                                                <button type="button" class="btn btn-warning btn-sm" title="Ubah Member">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </button>
                                            </a>
                                            <button type="submit" class="btn btn-danger btn-sm" name="proses" value="hapus" onclick="return confirm('anda yakin data anda dihapus')" title="hapus Member">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </button>
                                            <input type="hidden" name="idx" value="<?= $row['id'] ?>">
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