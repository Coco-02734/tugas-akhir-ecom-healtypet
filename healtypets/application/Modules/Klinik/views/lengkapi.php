<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-info text-white mr-2">
                <i class="mdi mdi-home"></i>
            </span> <?= $title; ?>
        </h3>
    </div>

    <div class="card-body">
        <form action="<?= base_url('klinik/kirim_pengajuan') ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group mb-3">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" value="<?= $user['nama']; ?>" class="form-control" placeholder="nama" readonly>
            </div>
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="text" name="email" value="<?= $user['email']; ?>" class="form-control" placeholder="Email" id="email" readonly>
            </div>
            <div class="form-group mb-3">
                <label for="nama">Nama Rumah Sakit / Klinik</label>
                <input type="text" name="nama" class="form-control" placeholder="ex: Rs Hewan Semarang" id="nama" required>
            </div>
            <div class="form-group mb-3">
                <label for="ktp">NO NIK</label>
                <input type="number" name="ktp" class="form-control" placeholder="Nomor KTP (ex: 70xxxxxxxxx)" id="ktp" required>
            </div>
            <div class="form-group mb-3">
                <label for="id_npwp">NO NPWN</label>
                <input type="number" name="id_npwp" class="form-control" placeholder="Nomor NPWP (ex: 12xxxxxxx)" id="id_npwp" required>
            </div>
            <div class="form-group mb-3">
                <label for="provinsi">Provinsi</label>
                <input type="text" name="provinsi" class="form-control" placeholder="ex: Jawa Tengah" id="provinsi" required>
            </div>
            <div class="form-group mb-3">
                <label for="kota">Kota</label>
                <input type="text" name="kota" class="form-control" placeholder="ex: Semarang" id="kota" required>
            </div>
            <div class="form-group mb-3">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" name="alamat" id="alamat" rows="3"></textarea>
            </div>
            <hr>
            <div class="form-group mb-3">
                <span>Upload SK Pendirian</span>
                <div class="custom-file mt-2">
                    <input type="file" name="sk" class="custom-file-input" id="sk" required>
                    <label class="custom-file-label" for="sk">Pilih file</label>
                </div>
            </div>
            <div class="form-group mb-3">
                <span>Upload Foto Klink / RS Hewan</span>
                <div class="custom-file mt-2">
                    <input type="file" name="image" class="custom-file-input" id="image" required>
                    <label class="custom-file-label" for="image">Pilih file</label>
                </div>
            </div>

            <div class="form-group">
                <center>
                    <input type="submit" name="" value="Pengajuan Klink" class="btn btn-primary btn-block">
                </center>
            </div>
        </form>
    </div>
</div>