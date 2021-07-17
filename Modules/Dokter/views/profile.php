<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-info text-white mr-2">
                <i class="mdi mdi-home"></i>
            </span> <?= $title; ?>
        </h3>

    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <form action="<?= base_url('dokter/update_user') ?>" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label>Nama </label>
                <input class="form-control" name="nama" value="<?php echo $user['nama'] ?>">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input class="form-control" name="email" value="<?php echo $user['email'] ?>" readonly>
            </div>
            <div class="form-group">
                <label>Photo</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="validatedInputGroupCustomFile" name="image">
                    <label class="custom-file-label" for="validatedInputGroupCustomFile">Upload Photo...</label>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" name="simpan" class="btn btn-warning">simpan</button>
            </div>
        </form>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <form action="<?= base_url('dokter/update_bio') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Alamat</label>
                <input class="form-control" name="alamat" value="<?php echo $profile['alamat'] ?>">
            </div>
            <div class="form-group">
                <label>Kota</label>
                <input class="form-control" name="kota" value="<?php echo $profile['kota'] ?>">
            </div>
            <div class="form-group">
                <label>Provinsi</label>
                <input class="form-control" name="provinsi" value="<?php echo $profile['provinsi'] ?>">
            </div>
            <div class="form-group">
                <label>Harga Layanan</label>
                <input class="form-control" name="harga" value="<?php echo $profile['harga'] ?>">
            </div>
            <div class="form-group">
                <label>Jam Kerja ( Tahun )</label>
                <input class="form-control" name="jam_kerja" value="<?php echo $profile['jam_kerja'] ?>">
            </div>
            <button type="submit" name="simpan" class="btn btn-warning">simpan</button>

        </form>
    </div>
</div>