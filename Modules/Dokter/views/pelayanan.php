<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-info text-white mr-2">
                <i class="mdi mdi-home"></i>
            </span> <?= $title; ?>
        </h3>
    </div>

    <div class="table-responsive p-3">
        <table class="table align-items-center table-flush" id="dataTable">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Nama Pasien</th>
                    <th>Nomor Telp</th>
                    <th>Tanggal Transaksi</th>
                    <th>Aksi</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($layanan as $pay) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $pay['nama']; ?></td>
                        <td><?= $pay['no_tlpn']; ?></td>
                        <td><?= $pay['tgl_transaksi']; ?></td>
                        <td>
                            <a href="<?= base_url('dokter/cek_transaksi/') . $pay['id_transaksi'] ?>" class="badge badge-primary mb-2">Chat</a>
                            <br>
                            <a href="<?= base_url('dokter/endsesi/') . $pay['id_transaksi']; ?>" class="badge badge-danger">Akhiri Sesi</a>
                        </td>
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