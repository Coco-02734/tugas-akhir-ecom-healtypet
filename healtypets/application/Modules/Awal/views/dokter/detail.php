<main id="main">
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Tanya Dokter</h2>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Tanya Dokter / <?= $dokter['nama']; ?></li>
                </ol>
            </div>

        </div>
    </section>
    <section class="breadcrumbs">
        <div class="container">
            <div class="card">
                <div class="kotak card-body">
                    <center>
                        <img src="<?= base_url('assets/user/img/dokter/') . $dokter['image']; ?>" width="80px" height="80px" class="rounded-circle img-dokter" alt="dokter">
                        <h5 class="nama-dokter"><?= $dokter['nama']; ?></h5>
                        <h6>Dokter Hewan</h6>
                        <h6 class="ket-dokter">Rp <?= number_format($dokter['harga'], 2, ',', '.'); ?></h6>
                        <i class="bx bx-like">
                            <span class="ket-bawah">
                                <?php if ($dokter['bintang'] == 0) {
                                ?>
                                    Baru
                                <?php } else { ?>
                                    <?= $dokter['bintang']; ?>%
                                <?php } ?>
                            </span>
                        </i>
                        <i class="bx bxs-badge-check ml-4 text-primary">
                            <span class="ket-bawah"><?= $dokter['jam_kerja']; ?> tahun</span>
                        </i>
                        <hr>
                    </center>
                    <div class="keterangan-dokter">
                        <div class="row">
                            <div class="col-md-6 text-right">
                                <img src="<?= base_url('assets/user/img/graduate.webp') ?>" width="40px" alt="">
                            </div>
                            <div class="col-md-6 text-left">
                                <p>
                                    Lulusan dari :
                                    <br>
                                    <?= $dokter['lulusan'] . ' - ' .
                                        $dokter['tahun_lulus']; ?>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 text-right">
                                <img src="<?= base_url('assets/user/img/STR.webp') ?>" width="40px" alt="">
                            </div>
                            <div class="col-md-6 text-left">
                                <p>
                                    Nomor STR :
                                    <br>
                                    <?= $dokter['id_sk']; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php
                    if ($user) {
                        if ($dokter['status'] == 0) { ?>
                            <a href="" class="btn btn-secondary btn-lg btn-block disabled">offline</a>
                        <?php } else { ?>
                            <a href="<?= base_url('awal/dokter/cek_transaksi/') . $dokter['id_dokter']; ?>" class="btn btn-primary btn-lg btn-block">Chat</a>
                    <?php }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
</main>