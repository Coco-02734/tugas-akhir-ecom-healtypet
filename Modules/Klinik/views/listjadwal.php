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
                    <th>Nama Fasilitas</th>
                    <th>Jadwal</th>
                    <th>Penanggung Jawab</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php
                foreach ($jadwal as $pay) :

                ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $pay['nama_fasilitas']; ?></td>
                        <td><?= $pay['jadwal']; ?></td>
                        <td><?= $pay['penaggung_jawab']; ?></td>
                        <td>Rp <?= $pay['harga']; ?></td>
                        <td>
                            <a href="<?= base_url('Klinik/editjadwal/') . $pay['id_fasilitas'] ?>" class="btn btn-primary">Edit</a>
                            <a href="<?= base_url('Klinik/hapusjadwal/') . $pay['id_fasilitas'] ?>" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php $i++ ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>