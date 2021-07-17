<div class="content-wrapper">
    <h3><?= $title; ?></h3>
    <div class="table-responsive p-3">
        <table class="table align-items-center table-flush" id="dataTable">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>ID Payout</th>
                    <th>Nama Pemohon</th>
                    <th>Jumlah Payout</th>
                    <th>Gateway</th>
                    <th>Tgl Reques Payout</th>
                    <th>Tgl Payout Sukses</th>
                    <th>Aksi</th>
                    <th>status</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($payout as $pay) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $pay['id_payout']; ?></td>
                        <td><?= $pay['nama']; ?></td>
                        <td>Rp <?= $pay['jml_payout']; ?></td>
                        <td><?= $pay['gateway']; ?></td>
                        <td><?= $pay['date_req']; ?></td>
                        <td><?= date('d F Y - G:i:s', $pay['date_payout']); ?></td>
                        <td>
                            <a href="<?= base_url('admin/payout_diterima/') . $pay['id_payout']; ?>" class="badge badge-success">Diterima</a>
                            <a href="<?= base_url('admin/payout_ditolak/') . $pay['id_payout']; ?>" class="badge badge-danger">Ditolak</a>
                        </td>
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