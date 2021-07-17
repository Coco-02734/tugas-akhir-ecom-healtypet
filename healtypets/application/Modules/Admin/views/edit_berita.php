<div class="content-wrapper">
    <h3><?= $title; ?></h3>
    <div class="container mt-5">

        <img src="<?= base_url('assets/user/img/berita/') . $berita['image']; ?>" class="img-fluid mb-4" alt="..." width="500px">

        <div class="col-lg-12">

            <?= form_open_multipart('admin/update_berita') ?>
            <div class="form-group">
                <input type="hidden" name="id_berita" value="<?= $berita['id_berita']; ?>">
                <label for="judul">Judul Berita</label>
                <input type="text" class="form-control" id="judul" name="judul" value="<?= $berita['judul'] ?>" required>
            </div>
            <div class="form-group">
                <label for="diskripsi">Diskripsi</label>
                <input type="text" class="form-control" id="diskripsi" name="diskripsi" value="<?= $berita['diskripsi'] ?>" required>
            </div>
            <div class="form-group">
                <textarea class="ckeditor" id="ckeditor" name="isi"><?= $berita['isi'] ?></textarea>
            </div>

            <div class="custom-file">
                <input type="file" class="custom-file-input" name="image" id="image">
                <label class="custom-file-label" for="image">Upload Foto Banner</label>
            </div>
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-outline-primary">Edit</button>
            </div>
            </form>
        </div>
    </div>
</div>