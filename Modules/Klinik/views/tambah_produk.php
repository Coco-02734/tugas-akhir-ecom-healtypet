<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-info text-white mr-2">
                <i class="mdi mdi-home"></i>
            </span> <?= $title; ?>
        </h3>

    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <form action="<?= base_url('klinik/prosestambahPro') ?>" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label>Nama Produk</label>
                <input type="text" class="form-control" name="nama_produk">
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <input class="form-control" name="katagori">
            </div>
            <div class="form-group">
                <label>Harga</label>
                <input type="number" class="form-control" name="harga">
            </div>
            <div class="form-group">
                <label>Stok</label>
                <input type="number" class="form-control" name="stok">
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <input type="text" class="form-control" name="keterangan">
            </div>
            <div class="form-group">
                <label>Photo</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="validatedInputGroupCustomFile" name="image">
                    <label class="custom-file-label" for="validatedInputGroupCustomFile">Upload Photo...</label>
                </div>
            </div>
            <button type="submit" name="simpan" class="btn btn-warning">simpan</button>
        </form>
    </div>

</div>