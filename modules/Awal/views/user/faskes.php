<main id="main">

    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Rumah Sakit Hewan</h2>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>RS Hewan</li>
                </ol>
            </div>

        </div>
    </section>

    <section class="inner-page">
        <div class="container">
            <form method="GET" class="mb-5">
                <div class="form-group">
                    <div class="row">
                        <div class="col-10 mb-2">
                            <input type="text" class="form-control form-text" name="q" placeholder="Nama RS, Kota, Atau Klinik Hewan" id="cari">
                        </div>
                        <div class="col mt-1">
                            <button class="btn btn-success" style="width: 120px;">Cari</button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- barang toko -->
            <?php foreach ($faskes as $fas) : ?>
                <div class="row" style="margin-top: 70px;">
                    <div class="col-md-3 pb-3 mt-3">
                        <div class="card shadow" style="width: 20rem;">
                            <img src="<?= base_url('assets/user/img/puskeswan/') . $fas['gambar_profile'] ?>" class="card-img-top">
                            <div class="card-body">
                                <h6 class="text-center font-weight-bold"><?= $fas['nama']; ?></h6>
                                <h6 class="text-center font-weight-light">
                                    <?= $fas['kota'] . ", " . $fas['provinsi']; ?>
                                    </i>
                                </h6>
                                <?php if ($user) { ?>
                                    <center>
                                        <a href="<?= base_url('awal/faskes/detail/') . $fas['id_puskeswan']; ?>" class="btn btn-outline-primary">Kunjungi</a>
                                    </center>
                                <?php } else { ?>
                                    <center>
                                        <a href="#" class="btn btn-outline-primary" id="loginn">Kunjungi</a>
                                    </center>

                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php if ($faskes == null) { ?>
                <center style="margin-top: -100px;">
                    <img src="<?= base_url('assets/user/img/gakada.gif') ?>" class="img-fluid mt-5" width="450px" alt="notfound">
                    <h2>Maaf Fasilitas Kesehatan Yang Kamu Cari Tidak Ada !</h2>
                </center>
            <?php } ?>
            <!-- barang toko -->
        </div>
    </section>

</main><!-- End #main -->