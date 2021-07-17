<div id="main">
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h4>Kunungan <?= $faskes['nama'] ?></h4>
                <ol>
                    <li><a href="<?= base_url('awal') ?>">Home</a></li>
                    <li><?= $title; ?></li>
                </ol>
            </div>

        </div>
    </section>

    <div class="container mt-4 mb-4">
        <?php
        foreach ($produk as $pay) :
        ?>
            <a href="<?= base_url('awal/faskes/janji/') . $pay['id_fasilitas']; ?>">
                <div class="card shadow-sm p-3 mb-2 bg-white rounded">
                    <div class="card-body">
                        <p><?= $pay['nama_fasilitas']; ?></p>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="<?= base_url('assets/user/img/menu/rs.png') ?>" alt="order" width="50px">
                                    </div>
                                    <div class="col-md-8">
                                        <p class="card-text font-weight-bold"><?= $pay['nama_fasilitas'] ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <p class="card-text font-weight-bold">
                                    <i class="fa fa-calendar"></i>
                                    <?= $pay['jadwal']; ?>
                                </p>
                            </div>
                            <div class="col-lg-3">
                                <p class="card-text font-weight-bold">
                                    <i class="fa fa-location-arrow"></i>
                                    <?= $faskes['alamat'];  ?>
                                </p>
                            </div>
                            <div class="col-lg-3">
                                <b>
                                    <h5>Buat Janji</h5>
                                </b>
                            </div>

                        </div>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
        <?php if ($faskes == null) { ?>
            <center>
                <img src="<?= base_url('assets/user/img/gakada.gif') ?>" class="img-fluid mt-5" width="450px" alt="notfound">
                <h2>Maaf Kamu Belum Pernah Melakukan Transaksi</h2>
            </center>
        <?php } ?>
    </div>

</div>
<br>
<br>
<br>
<br>
<br>