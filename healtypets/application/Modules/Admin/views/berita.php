<div class="content-wrapper">
    <h3><?= $title; ?></h3>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Tambah Berita
    </button>
    <div class="table-responsive p-3">
        <table class="table align-items-center table-flush" id="dataTable">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Tanggal Upload</th>
                    <th>Tanggal Edit</th>
                    <th>Publisher</th>
                    <th>aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($berita as $ads) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $ads['judul']; ?></td>
                        <td><?= $ads['date_created']; ?></td>
                        <td><?= $ads['date_update']; ?></td>
                        <td><?= $ads['publisher']; ?></td>
                        <td>
                            <a href="<?= base_url('admin/edit_berita/') . $ads['id_berita'] ?>" class="badge badge-primary">Edit</a>
                            <br>
                            <a href="<?= base_url('admin/hapus_berita/') . $ads['id_berita'] ?>" class="badge badge-danger mt-3">Hapus</a>
                        </td>

                    </tr>
                    <?php $i++ ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Berita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('admin/upload_berita') ?>
                <div class="form-group">
                    <label for="judul">Judul Berita</label>
                    <input type="text" class="form-control" id="judul" name="judul" required>
                </div>
                <div class=" form-group">
                    <Dabel for="diskripsi">Diskripsi</Dabel>
                    <input type="text" class="form-control" id="diskripsi" name="diskripsi" required>
                </div>
                <div class="form-group">
                    <textarea class="ckeditor" id="ckeditor" name="isi"></textarea>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image" id="image">
                    <label class="custom-file-label" for="image">Upload Foto Berita</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>
        </div>
    </div>
</div>