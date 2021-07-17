<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-info text-white mr-2">
                <i class="mdi mdi-home"></i>
            </span> <?= $title; ?>
        </h3>

    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <form action="<?= base_url('klinik/prosestambahjadwal') ?>" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label>Nama Fasilitas</label>
                <input type="text" class="form-control" name="nama_fasilitas">
            </div>
            <div class="form-group">
                <label>Jadwal</label>
                <input type="text" class="form-control" name="jadwal" placeholder="Format Contoh : 07.00 - 16.00 Senin-Jumat">
            </div>
            <div class="form-group">
                <label>Penanggung Jawab</label>
                <input type="text" class="form-control" name="penaggung_jawab">
            </div>
            <div class="form-group">
                <label>Harga</label>
                <input type="number" class="form-control" name="harga">
            </div>

    </div>
    <button type="submit" name="simpan" class="btn btn-warning">simpan</button>
    </form>
</div>

</div>