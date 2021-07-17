<div class="content-wrapper">
    <h3><?= $title; ?></h3>
    <div class="container mt-5">

        <img src="<?= base_url('assets/user/') . $iklan['image']; ?>" class="img-fluid mb-4" alt="..." width="500px">

        <div class="col-lg-9">

            <?= form_open_multipart('admin/update_iklan') ?>
            <div class="form-group">
                <input type="hidden" name="id_iklan" value="<?= $iklan['id_iklan']; ?>">
                <label for="judul">Judul Iklan</label>
                <input type="text" class="form-control" id="judul" name="nama" value="<?= $iklan['nama'] ?>" required>
            </div>
            <div class="form-group">
                <label for="link">Link</label>
                <input type="text" value="<?= $iklan['link'] ?>" class="form-control" id="link" name="link" required>
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