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
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Bercode</th>
                    <th>ID Transaksi</th>
                    <th>Nama Pemilik</th>
                    <th>Nama Peliharaan</th>
                    <th>Jadwal</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php
                foreach ($transaksi as $pay) :

                ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><img src="<?= base_url('assets/user/img/bercode_janji/') . $pay['id_transaksi'] ?>.png" alt="code" class="img-fluid" width="100px"></td>
                        <td><?= $pay['id_transaksi']; ?></td>
                        <td><?= $pay['nama_pemilik']; ?></td>
                        <td><?= $pay['nama_peliharaan']; ?></td>
                        <td><?= $pay['jadwal']; ?></td>
                        <td><?= $pay['harga']; ?></td>
                        <td>
                            <?php if ($pay['status'] == 201) { ?>
                                <h5><span class="badge badge-warning">Waiting To Payment</span></h5>
                            <?php } else if ($pay['status'] == 0) { ?>
                                <h5><span class="badge badge-success">Delivered / Closed</span></h5>
                            <?php } else if ($pay['status'] == 1) { ?>
                                <h5><span class="badge badge-secondary">Process</span></h5>
                            <?php } else if ($pay['status'] == 2) { ?>
                                <h5><span class="badge badge-secondary">Disiapkan</span></h5>
                            <?php } else if ($pay['status'] == 3) { ?>
                                <h5><span class="badge badge-secondary">Dikirim</span></h5>
                            <?php } else if ($pay['status'] == 200) { ?>
                                <h5><span class="badge badge-primary">Payed</span></h5>
                            <?php } else if ($pay['status'] == 404) { ?>
                                <h5><span class="badge badge-danger">Batal</span></h5>
                            <?php } ?>
                        </td>
                        <td>
                            <a href="<?= base_url('klinik/endsesi/') . $pay['id_transaksi'] ?>" class="badge badge-primary">Selesai</a>
                        </td>

                    </tr>
                    <?php $i++ ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>