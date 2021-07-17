<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-info text-white mr-2">
                <i class="mdi mdi-home"></i>
            </span> <?= $title; ?>
        </h3>

    </div>
    <div class="row">
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                    <img src="<?= base_url('assets/klinik/') ?>images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Saldo Total <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">Rp <?= $saldo['harga']; ?></h2>
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
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                    <img src="<?= base_url('assets/klinik/') ?>images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Jumlah Transaksi Berlangsung <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5"><?= $jml_transaksilive; ?></h2>

                </div>
            </div>
        </div>

    </div>
    <div class="table-responsive p-3">
        <table class="table align-items-center table-flush" id="dataTable">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>ID Transaksi</th>
                    <th>Nama Pasien</th>
                    <th>Keterangan</th>
                    <th>Tgl Transaksi</th>
                    <th>Harga</th>
                    <th>Status</th>

                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($transaksi as $pay) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $pay['id_transaksi']; ?></td>
                        <td><?= $pay['nama']; ?></td>
                        <td><?= $pay['keterangan']; ?></td>
                        <td><?= $pay['tgl_transaksi']; ?></td>
                        <td><?= $pay['harga']; ?></td>
                        <td>

                            <?php if ($pay['statusd'] == 201) { ?>
                                <h5><span class="badge badge-warning">Waiting To Payment</span></h5>
                            <?php } else if ($pay['statusd'] == 0) { ?>
                                <h5><span class="badge badge-success">Delivered / Closed</span></h5>
                            <?php } else if ($pay['statusd'] == 1) { ?>
                                <h5><span class="badge badge-secondary">Process</span></h5>
                            <?php } else if ($pay['statusd'] == 2) { ?>
                                <h5><span class="badge badge-secondary">Disiapkan</span></h5>
                            <?php } else if ($pay['statusd'] == 3) { ?>
                                <h5><span class="badge badge-secondary">Dikirim</span></h5>
                            <?php } else if ($pay['statusd'] == 200) { ?>
                                <h5><span class="badge badge-primary">Payed</span></h5>
                            <?php } else if ($pay['statusd'] == 404) { ?>
                                <h5><span class="badge badge-danger">Batal</span></h5>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php $i++ ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>