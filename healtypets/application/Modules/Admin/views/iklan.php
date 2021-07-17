<div class="content-wrapper">
    <h3><?= $title; ?></h3>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Tambah Iklan
    </button>
    <div class="table-responsive p-3">
        <table class="table align-items-center table-flush" id="dataTable">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Nama Iklan</th>
                    <th>Tanggal Upload</th>
                    <th>Publisher</th>
                    <th>aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($iklan as $ads) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $ads['nama']; ?></td>
                        <td><?= $ads['date_created']; ?></td>
                        <td><?= $ads['publisher']; ?></td>
                        <td>
                            <a href="<?= base_url('admin/edit_iklan/') . $ads['id_iklan'] ?>" class="badge badge-primary">Edit</a>
                            <br>
                            <a href="<?= base_url('admin/hapus_iklan/') . $ads['id_iklan'] ?>" class="badge badge-danger mt-3">Hapus</a>
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Iklan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('admin/upload_iklan') ?>
                <div class="form-group">
                    <input type="hidden" name="id_iklan">
                    <label for="judul">Judul Iklan</label>
                    <input type="text" class="form-control" id="judul" name="nama" required>
                </div>
                <div class=" form-group">
                    <label for="link">Link</label>
                    <input type="text" class="form-control" id="link" name="link" required>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image" id="image">
                    <label class="custom-file-label" for="image">Upload Foto Banner</label>
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