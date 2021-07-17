<div class="content-wrapper">
    <h3><?= $title; ?></h3>
    <div class="table-responsive p-3">
        <table class="table align-items-center table-flush" id="dataTable">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Email</th>
                    <th>Nama Lengkap</th>
                    <th>Nomor Telp</th>
                    <th>aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($dokter as $pay) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $pay['email']; ?></td>
                        <td><?= $pay['nama']; ?></td>
                        <td><?= $pay['no_tlpn']; ?></td>
                        <td>
                            <a href="<?= base_url('admin/detail_dok/') . $pay['id'] ?>" class="badge badge-primary">Detail</a>
                        </td>

                    </tr>
                    <?php $i++ ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

</div>