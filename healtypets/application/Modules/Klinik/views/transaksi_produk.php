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
                    <th>ID Transaksi</th>
                    <th>Nama Pelanggan</th>
                    <th>Keterangan</th>
                    <th>Tanggal Transaksi</th>
                    <th>Metode Payment</th>
                    <th>Total Harga</th>
                    <th>status</th>
                    <th>aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php
                foreach ($transaksi as $pay) :
                    $user = $this->db->get_where('user', ['id' => $pay['id_user']])->row_array();
                ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $pay['id_transaksi']; ?></td>
                        <td><?= $user['nama']; ?></td>
                        <td><?= $pay['keterangan']; ?></td>
                        <td><?= $pay['tgl_transaksi']; ?></td>
                        <td><?= $pay['bank']; ?></td>
                        <td>Rp <?= $pay['harga']; ?></td>
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

                        <td>
                            <a href="<?= base_url('klinik/detail_trans/') . $pay['id_transaksi'] ?>" class="badge badge-primary">Detail</a>
                        </td>

                    </tr>
                    <?php $i++ ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>