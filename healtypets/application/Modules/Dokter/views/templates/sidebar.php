<div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item nav-profile">
                <a href="#" class="nav-link">
                    <div class="nav-profile-image">
                        <!-- foto profile -->
                        <img src="<?= base_url('assets/user/img/dokter/') . $user['image']; ?>" alt="profile">
                        <span class="login-status online"></span>

                    </div>
                    <div class="nav-profile-text d-flex flex-column">
                        <span class="font-weight-bold mb-2"><?= $user['nama'] ?></span>
                        <span class="text-secondary text-small">Dokter Hewan</span>
                    </div>
                    <i class="mdi mdi-check-decagram text-success nav-profile-badge"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('dokter') ?>">
                    <span class="menu-title">Home</span>
                    <i class="mdi mdi-home menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                    <span class="menu-title">Transaksi</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-wallet menu-icon"></i>
                </a>
                <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="<?= base_url('dokter/transaksi') ?>">Transaksi dan Saldo</a></li>
                    </ul>

                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="<?= base_url('dokter/saldo') ?>">Tarik Saldo</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
                    <span class="menu-title">Pelayanan Chat</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-hospital-building menu-icon"></i>
                </a>
                <div class="collapse" id="general-pages">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="<?= base_url('dokter/pelayanan') ?>">List Pelayanan</a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#vaksin" aria-expanded="false" aria-controls="vaksin">
                    <span class="menu-title">Halaman Profile</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-face-profile menu-icon"></i>
                </a>
                <div class="collapse" id="vaksin">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="<?= base_url('dokter/profile') ?>">Ubah Profile dan Pelayanan</a></li>

                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('dokter/pelayanan') ?>">
                    <span class="menu-title">Chat</span>
                    <i class="mdi mdi-comment menu-icon"></i>
                </a>
            </li>

        </ul>
    </nav>
    <div class="main-panel">