<div id="main">
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h4>Temukan Obat Hewan Disini</h4>
                <ol>
                    <li><a href="<?= base_url('awal') ?>">Home</a></li>
                    <li><?= $title; ?></li>
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
                            <input type="text" class="form-control form-text" name="q" placeholder="Obat kutu atau Makanan Kuceng" id="cari">
                        </div>
                        <div class="col mt-1">
                            <button class="btn btn-success" style="width: 120px;">Cari</button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- slider -->
            <div class="carousel" data-flickity='{ "autoPlay": true }'>

                <?php foreach ($iklan as $ads) : ?>
                    <img src="<?= base_url('assets/user/') . $ads['image'] ?>" class="img-fluid mr-3 ml-3" width="450px" alt="promo">
                <?php endforeach; ?>
            </div>
            <!-- slider -->

            <!-- barang toko -->
            <div class="row" style="margin-top: 70px;">
                <?php foreach ($produk as $p) : ?>
                    <div class="col-md-3 pb-3 mt-3">
                        <div class="card shadow" style="width: 17rem;">
                            <img src="<?= base_url('assets/user/img/barang/') . $p['image']; ?>" class="card-img-top" width="30px">
                            <div class="card-body">
                                <h5 class="text-center font-weight-bold"><?= $p['nama_produk'] ?></h5>
                                <h6 class="text-center font-weight-light"><?= $p['katagori'] ?></h6>
                                <p class="card-text text-center font-weight-bold">Rp <?= $p['harga'] ?></p>
                                <?php if ($user) { ?>
                                    <center>
                                        <button type="button" data-barang="<?= $p['id_produk']; ?>" class="btn btn-outline-primary" id="tambah-chart">Tambah</button>
                                    </center>
                                <?php } else { ?>
                                    <center>
                                        <a href="#" class="btn btn-outline-primary" id="loginn">Tambah</a>
                                    </center>

                                <?php } ?>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php if ($produk == null) { ?>
                <center>
                    <img src="<?= base_url('assets/user/img/gakada.gif') ?>" class="img-fluid mt-5" width="450px" alt="notfound">
                    <h2>Maaf Produk Tidak Ada</h2>
                </center>
            <?php } ?>
            <!-- barang toko -->
        </div>
    </section>
</div>