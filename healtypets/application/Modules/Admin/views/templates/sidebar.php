<div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item nav-profile">
                <a href="#" class="nav-link">
                    <div class="nav-profile-image">
                        <!-- foto profile -->
                        <img src="<?= base_url('assets/klinik/') ?>images/faces/default.png" alt="profile">
                        <span class="login-status online"></span>

                    </div>
                    <div class="nav-profile-text d-flex flex-column">
                        <span class="font-weight-bold mb-2"><?= $user['nama']; ?></span>
                        <span class="text-secondary text-small">Admin</span>
                    </div>
                    <i class="mdi mdi-check-decagram text-success nav-profile-badge"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin') ?>">
                    <span class="menu-title">Home</span>
                    <i class="mdi mdi-home menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                    <span class="menu-title">Verifikasi Dokter</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-account-check menu-icon"></i>
                </a>
                <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin/verif_dokter') ?>">Verifikasi</a></li>
                        <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin/daftar_dokter') ?>">Daftar Dokter</a>
                        </li>

                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
                    <span class="menu-title">Verifikasi Faskes</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-hospital-building menu-icon"></i>
                </a>
                <div class="collapse" id="general-pages">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin/verif_faskes') ?>">Verifikasi Faskes</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin/daftar_faskes') ?>">Daftar Faskes</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#keuangan" aria-expanded="false" aria-controls="keuangan">
                    <span class="menu-title">Halaman Keuangan</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-wallet menu-icon"></i>
                </a>
                <div class="collapse" id="keuangan">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin/transaksi') ?>">Transaksi Total</a></li>
                        <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin/payout_reques') ?>">Daftar Reques Saldo</a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#berita" aria-expanded="false" aria-controls="berita">
                    <span class="menu-title">Halaman Website</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-apple-icloud menu-icon"></i>
                </a>
                <div class="collapse" id="berita">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin/iklan') ?>">Kelola Iklan</a></li>
                        <li class="nav-item"> <a class="nav-link" href="<?= base_url('admin/berita') ?>">Kelola Berita</a>
                        </li>

                    </ul>
                </div>
            </li>


        </ul>
    </nav>
    <div class="main-panel">