<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-info text-white mr-2">
                <i class="mdi mdi-home"></i>
            </span> <?= $title; ?>
        </h3>

    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <form action="<?= base_url('Klinik/proeditproduk') ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_produk" value="<?= $produk['id_produk'] ?>" />
            <div class="form-group">
                <label>Nama Produk </label>
                <input type="text" class="form-control" name="nama_produk" value="<?php echo $produk['nama_produk'] ?>">
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <input type="text" class="form-control" name="katagori" value="<?php echo $produk['katagori'] ?>">
            </div>
            <div class="form-group">
                <label>Harga</label>
                <input type="number" class="form-control" name="harga" value="<?php echo $produk['harga'] ?>">
            </div>
            <div class="form-group">
                <label>Stok</label>
                <input type="number" class="form-control" name="stok" value="<?php echo $produk['stok'] ?>">
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <input type="text" class="form-control" name="keterangan" value="<?php echo $produk['keterangan'] ?>">
            </div>
            <button type="submit" name="simpan" class="btn btn-warning">simpan</button>
        </form>
    </div>
</div>