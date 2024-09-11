<?php
include_once 'koneksi.php';
include_once 'models/Pegawai.php';
//step 1 tangkap reques form
$nip = $_POST['nip'];
$nama = $_POST['nama'];
$gender = $_POST['gender'];
$foto = $_POST['foto'];
$tmp_lahir = $_POST['tmp_lahir'];
$tgl_lahir = $_POST['tgl_lahir'];
$jabatan = $_POST['jabatan'];
$divisi = $_POST['divisi'];
$alamat = $_POST['alamat'];
//step 2 simpan ke array
$data = [
    $nip, // ? 1
    $nama, // ? 2
    $gender, // ? 3
    $foto, // ? 4
    $tmp_lahir, // ? 5
    $tgl_lahir, // ? 6
    $jabatan, // ? 7
    $divisi, // ? 8
    $alamat // ? 9
];
//step 3 eksekusi tombol dengan mekanisme pdo
$model = new Pegawai();
$tombol = $_REQUEST['proses'];
switch ($tombol) {
    case 'simpan':
        $model->simpan($data);
        break;

    case 'ubah':
        //tangkap hidden field idx untuk klausa where id
        $data[] = $_POST['idx']; // ? 10 (kalusa where id=?)
        $model->ubah($data);
        break;

    case 'hapus':
        unset($data); //hapus 9 ? di atas
        //panggil method hapus data disertai tangkap hidden idx untuk klausa where id
        $model->hapus($_POST['idx']);
        break;

    default:
        header('Location: index.php?hal=pegawai');
        break;
}
//step 4 diarahkan ke suatu halaman
header('Location: index.php?hal=pegawai');
