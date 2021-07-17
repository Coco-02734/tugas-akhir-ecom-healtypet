<div class="content-wrapper">
    <h3><?= $title; ?></h3>
    <div class="table-responsive p-3">
        <table class="table align-items-center table-flush" id="dataTable">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>ID Transaksi</th>
                    <th>Keterangan</th>
                    <th>Tgl Transaksi</th>
                    <th>Harga</th>
                    <th>Metode Bayar</th>
                    <th>Bank</th>
                    <th>Kurir</th>
                    <th>No Resi</th>
                    <th>status</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($transaksi as $pay) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $pay['id_transaksi']; ?></td>
                        <td><?= $pay['keterangan']; ?></td>
                        <td><?= $pay['tgl_transaksi']; ?></td>
                        <td><?= $pay['harga']; ?></td>
                        <td><?= $pay['metode_pembayaran']; ?></td>
                        <td><?= $pay['bank']; ?></td>
                        <td><?= $pay['kurir']; ?></td>
                        <td><?= $pay['no_resi']; ?></td>
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