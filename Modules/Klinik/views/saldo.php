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

    <form action="<?= base_url('klinik/req_payout') ?>" method="post">
        <div class="form-group">
            <label for="nama">Nama Pemilik</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama'] ?>" readonly>
        </div>
        <div class="form-group">
            <label for="tipe">Tipe Pembayaran</label>
            <select class="form-control" id="tipe" name="gateway" required>
                <option value="GO-PAY">Go-Pay</option>
                <option value="BCA">Bank BCA</option>
                <option value="BRI">Bank BRI</option>
                <option value="BNI">Bank BNI</option>
                <option value="PERMATA">Bank Permata</option>
            </select>
        </div>
        <div class="form-group">
            <label for="no_rek">Nomor Rekening</label>
            <input type="number" class="form-control" id="no_rek" name="no_rek" required>
        </div>
        <div class="form-group">
            <label for="jml_payout">Jumlah Penarikan</label>
            <input type="number" class="form-control" id="jml_payout" name="jml_payout" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Ajukan Penarikan</button>
        </div>
    </form>

    <div class="table-responsive p-3">
        <table class="table align-items-center table-flush" id="dataTable">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>ID Payout</th>
                    <th>Tanggal Permintaan</th>
                    <th>Tanggal Terbayar</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($payout as $pay) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $pay['id_payout']; ?></td>
                        <td><?= $pay['date_req']; ?></td>
                        <td>
                            <?php
                            if ($pay['date_payout'] == 0) {
                                echo "-";
                            } else {
                                echo date('d F Y - G:i:s', $pay['date_payout']);
                            }
                            ?>
                        </td>
                        <td><?= $pay['jml_payout']; ?></td>
                        <td>
                            <?php if ($pay['is_verify'] == 201) { ?>
                                <h5><span class="badge badge-warning">Waiting To Payment</span></h5>
                            <?php } else if ($pay['is_verify'] == 0) { ?>
                                <h5><span class="badge badge-warning">Waiting</span></h5>
                            <?php } else if ($pay['is_verify'] == 1) { ?>
                                <h5><span class="badge badge-success">Settelment</span></h5>
                            <?php } else if ($pay['is_verify'] == 2) { ?>
                                <h5><span class="badge badge-danger">Ditolak</span></h5>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php $i++ ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>