<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-info text-white mr-2">
                <i class="mdi mdi-home"></i>
            </span> Home
        </h3>

    </div>
    <?php if ($bio_pus['is_verify'] == 2) { ?>
        <div class="row">
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                    <div class="card-body">
                        <img src="<?= base_url('assets/klinik/') ?>images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Saldo Total <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5">Rp <?= $bio_pus['saldo']; ?></h2>
                        <h6 class="card-text">20% dari bulan kemarin</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                    <div class="card-body">
                        <img src="<?= base_url('assets/klinik/') ?>images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Jumlah Transaksi <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5"><?= $jml_transaksi; ?></h2>
                        <h6 class="card-text">10% dari bulan kemarin</h6>
                    </div>
                </div>
            </div>

        </div>
        <div class="row row-cols-1 row-cols-md-3">

            <div class="col mb-4">
                <div class="card shadow bg-white rounded">
                    <div class="card-body">
                        <h4 class="card">Jumlah Layanan</h4>

                        <h1 class="text-warning"><?= $jml_fasilitas; ?></h1>
                    </div>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <center>
            <img src="<?= base_url('assets/user/img/waiting.gif') ?>" class="img-fluid mt-5" width="350px" alt="notfound">
            <h2>Akun sedang ditinjau oleh admin. Mohon menunggu 2x24 Jam</h2>
        </center>
    <?php } ?>
</div>