<?php
$sesi = $_SESSION['MEMBER'];
?>
<nav class="navbar main-nav border-less fixed-top navbar-expand-lg p-0">
    <div class="container-fluid p-0">
        <!-- logo -->
        <a class="navbar-brand" href="index.html">
            <img src="images/logo.png" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?hal=home">Home
                        <span>/</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?hal=about">About Us
                        <span>/</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?hal=kontak">Contact
                        <span>/</span>
                    </a>
                </li>
                <?php
                if (!isset($sesi)) { //---------------------jika belum/gagal login-----------------------
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login_form.php">Login</a>
                    </li>
                <?php
                } else { //---------------------jika berhasil login-----------------------
                ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#!" data-toggle="dropdown">Master Data <i class="fa fa-angle-down"></i><span>/</span></a>
                        <!-- Dropdown list -->
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="index.php?hal=pegawai">Pegawai</a></li>
                            <li><a class="dropdown-item" href="index.php?hal=divisi">Divisi</a></li>
                            <li><a class="dropdown-item" href="index.php?hal=jabatan">Jabatan</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#!" data-toggle="dropdown"><?= $sesi['fullname'] ?> <i class="fa fa-angle-down"></i></a>
                        <!-- Dropdown list -->
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="index.php?hal=member_profile">Profile</a></li>
                            <?php
                            if ($sesi['role'] == 'admin') { //----------------hanya untuk admin------------------
                            ?>
                                <li><a class="dropdown-item" href="index.php?hal=member">Kelola User</a></li>
                            <?php
                            }
                            ?>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>