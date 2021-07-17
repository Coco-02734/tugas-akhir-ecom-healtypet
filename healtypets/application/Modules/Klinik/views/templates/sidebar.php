<div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item nav-profile">
                <a href="#" class="nav-link">
                    <div class="nav-profile-image">
                        <!-- foto profile -->
                        <img src="<?= base_url('assets/user/img/puskeswan/') . $bio_pus['gambar_profile']; ?>" alt="profile">
                        <span class="login-status online"></span>

                    </div>
                    <div class="nav-profile-text d-flex flex-column">
                        <span class="font-weight-bold mb-2"><?= $bio_pus['nama']; ?></span>
                        <span class="text-secondary text-small">Fasilitas Kesehatan</span>
                    </div>
                    <i class="mdi mdi-check-decagram text-success nav-profile-badge"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('klinik') ?>">
                    <span class="menu-title">Home</span>
                    <i class="mdi mdi-home menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                    <span class="menu-title">Produk Faskes</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-pill menu-icon"></i>
                </a>
                <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="<?= base_url('klinik/list_produk') ?>">List Produk</a></li>
                        <li class="nav-item"> <a class="nav-link" href="<?= base_url('klinik/tambah_produk') ?>">Tambah Produk</a></li>
                        <li class="nav-item"> <a class="nav-link" href="<?= base_url('klinik/transaksi_produk') ?>">Transaksi Produk</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
                    <span class="menu-title">Produk Klinik</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-hospital-building menu-icon"></i>
                </a>
                <div class="collapse" id="general-pages">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="<?= base_url('klinik/list_jadwal') ?>">List Jadwal Praktik</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="<?= base_url('klinik/tambah_jadwal') ?>">Tambah Jadwal Praktik</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="<?= base_url('klinik/daftar_janji') ?>">Daftar Janji</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('klinik/transaksi') ?>">
                    <span class="menu-title">Transaksi Klinik</span>
                    <i class="mdi mdi-chart-areaspline-variant menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('klinik/payout') ?>">
                    <span class="menu-title">Tarik Saldo</span>
                    <i class="mdi mdi-square-inc-cash menu-icon"></i>
                </a>
            </li>
        </ul>
    </nav>
    <div class="main-panel">