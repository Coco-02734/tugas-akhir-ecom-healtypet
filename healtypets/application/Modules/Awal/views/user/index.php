<div id="main">
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Profile : <?= $user['nama']; ?></h2>
                <ol>
                    <li><a href="<?= base_url('awal') ?>">Home</a></li>
                    <li>Halaman Profile</li>
                </ol>
            </div>

        </div>
    </section>

    <section id="hero" class="d-flex align-items-center">
        <div class="container" data-aos="fade-up">
            <div class="profile-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <img src="<?= base_url('assets/user/img/bg-user.png'); ?>" class="img1" alt="">
                                <img src="<?= base_url('assets/user/img/profil/') . $user['image']; ?>" class="img2" alt="">
                                <div class="file btn btn-lg btn">
                                    <i class="fa fa-pencil fa-2x text-light" id="editfoto"></i>
                                </div>
                                <div class="main-text">
                                    <h2><?= $user['nama']; ?></h2>
                                    <p><i class="fa fa-phone"></i> <?= $user['no_tlpn']; ?></p>
                                    <h6><i class="fa fa-envelope"></i> <?= $user['email']; ?></h6>
                                </div>
                                <hr>
                                <div class="socials">
                                    <a href="#editprofil" id="editProfile" class="text-danger">
                                        <h6><i class="fa fa-cog"> </i>Update Data Profile</h6>
                                    </a>
                                    <a href="<?= base_url('awal/auth/logout') ?>" class="text-danger">
                                        <h6><i class="fa fa-sign-out"></i>Logout / Keluar</h6>
                                    </a>

                                </div>
                            </div>
                        </div>
                        <?php
                        if ($bio_hewan) {
                            foreach ($bio_hewan as $pets) :
                        ?>
                                <div class="col-md-4">
                                    <div class="card">
                                        <img src="<?= base_url('assets/user/img/bg-user.png'); ?>" class="img1" alt="">
                                        <img src="<?= base_url('assets/user/img/peliharaan/') . $pets['img']; ?>" class="img2" alt="">
                                        <div class="main-text">
                                            <h2><?= $pets['nama']; ?></h2>
                                            <p><i class="fa fa-calendar"></i> <?= $pets['tgl_lahir']; ?></p>
                                        </div>
                                        <hr>
                                        <div class="socials">
                                            <a href="<?= base_url('awal/user/delete_pet/') . $pets['id_peliharaan']; ?>" id="editProfile" class="text-danger">
                                                <h6><i class="fa fa-cog"> </i>Hapus</h6>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                        <?php
                            endforeach;
                        }  ?>
                        <!-- tambah peliharaan -->
                        <div class="col-md-4">
                            <div class="card">
                                <img src="<?= base_url('assets/user/img/bg-user.png'); ?>" class="img1" alt="">
                                <a href="#" id="tambahPeliharaan">
                                    <img src="<?= base_url('assets/user/img/plus.jpg') ?>" class="img2" alt="">
                                </a>
                                <div class="main-text">
                                    <h3>Tambah Peliharaan</h3>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal profile user -->
<div class="modal fade" id="modalProfilUser" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="">
                <button type="button" class="close mr-3" data-dismiss="modal" aria-label="Close">
                    <h1 aria-hidden="true">&times;</h1>
                </button>
            </div>
            <div class="modal-body" style="margin-top: -30px;">
                <h2 class="modal-title text-center" id="staticBackdropLabel">Ubah Profil</h2>
                <form method="POST" action="<?= base_url('awal/user/edit_bio'); ?>" class="container mt-3 mb-5">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap </label>
                        <input type="nama" class="form-control" name="nama" id="nama" value="<?= $user['nama']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama">Kota </label>
                        <input type="nama" class="form-control" name="kota" id="nama" value="<?= $biodata['kota']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="nama">Provinsi </label>
                        <input type="nama" class="form-control" name="provinsi" id="nama" value="<?= $biodata['provinsi']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat Lengkap</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3"><?= $biodata['alamat']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="jns_kelamin">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin" id="jns_kelamin">
                            <option value="<?= $biodata['jenis_kelamin']; ?>"><?= $biodata['jenis_kelamin']; ?></option>
                            <option disabled>------------------------------------------------------</option>
                            <option value="LAKI-LAKI">Laki-Laki</option>
                            <option value="PEREMPUAN">Perempuan</option>
                        </select>
                    </div>

                    <center>
                        <button type="submit" class="btn btn-primary mb-3">Simpan Profil</button>
                    </center>
                    <!-- <h6 class="text-center"><a href="#" id="daftar">Belum punya akun ? Daftar</a></h6> -->
                </form>
            </div>

        </div>
    </div>
</div>
<!-- Modal tambah peliharaan user -->
<div class="modal fade" id="modalTambahPeliharaan" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="">
                <button type="button" class="close mr-3" data-dismiss="modal" aria-label="Close">
                    <h1 aria-hidden="true">&times;</h1>
                </button>
            </div>
            <div class="modal-body" style="margin-top: -30px;">
                <h2 class="modal-title text-center" id="staticBackdropLabel">Tambah Peliharaan</h2>
                <form method="POST" action="<?= base_url('awal/user/add_peliharaan'); ?>" class="container mt-3 mb-5" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama">Nama Peliharaan </label>
                        <input type="nama" class="form-control" name="nama" id="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Foto Peliharaan </label>
                        <input type="file" class="form-control" name="image" id="image" required>
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir </label>
                        <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" required>
                    </div>

                    <center>
                        <button type="submit" class="btn btn-primary mb-3">Simpan Data Peliharaan</button>
                    </center>
                    <!-- <h6 class="text-center"><a href="#" id="daftar">Belum punya akun ? Daftar</a></h6> -->
                </form>
            </div>

        </div>
    </div>
</div>
<!-- Modal profile foto -->
<div class="modal fade" id="modalFoto" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="">
                <button type="button" class="close mr-3" data-dismiss="modal" aria-label="Close">
                    <h1 aria-hidden="true">&times;</h1>
                </button>
            </div>
            <div class="modal-body" style="margin-top: -30px;">
                <h2 class="modal-title text-center" id="staticBackdropLabel">Ubah Foto</h2>
                <form method="POST" action="<?= base_url('awal/user/update_foto'); ?>" class="container mt-3 mb-5" enctype="multipart/form-data">
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <center>
                        <button type="submit" class="btn btn-primary mb-3 mt-3">Simpan Profil</button>
                    </center>
                    <!-- <h6 class="text-center"><a href="#" id="daftar">Belum punya akun ? Daftar</a></h6> -->
                </form>
            </div>

        </div>
    </div>
</div>