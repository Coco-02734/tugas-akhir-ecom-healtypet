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
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php
                foreach ($produk as $pay) :

                ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $pay['nama_produk']; ?></td>
                        <td><?= $pay['katagori']; ?></td>
                        <td><?= $pay['harga']; ?></td>
                        <td><?= $pay['stok']; ?></td>
                        <td><?= $pay['keterangan']; ?></td>
                        <td>
                            <a href="<?= base_url('Klinik/editproduk/') . $pay['id_produk'] ?>" class="btn btn-primary">Edit</a>
                            <a href="<?= base_url('Klinik/hapusproduk/') . $pay['id_produk'] ?>" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php $i++ ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>