<?php
session_start();
include_once 'koneksi.php';
include_once 'models/Member.php';
//step 1 tangkap reques form login
$username = $_POST['username'];
$password = $_POST['password'];
//step 2 simpan ke array
$data = [
    $username, // ? 1
    $password, // ? 2
];
//step 3 proses otentikasi user
$model = new Member();
$rs = $model->cekLogin($data);
if (!empty($rs)) { //sukses login
    $_SESSION['MEMBER'] = $rs;
    //diarahkan ke suatu halaman
    header('location:index.php?hal=pegawai');
} else { //gagal login
    echo '<script>alert("User/Password Anda Salah!!!");history.back();</script>';
}
