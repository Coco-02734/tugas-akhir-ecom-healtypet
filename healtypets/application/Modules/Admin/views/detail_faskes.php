<div class="content-wrapper">

    <h2>
        Informasi <?= $bio_fas['nama']; ?>
        <?php if ($bio_fas['is_verify'] == 0) { ?>
            <span class="badge badge-secondary">Belum Pengajuan</span>
        <?php } else if ($bio_fas['is_verify'] == 1) { ?>
            <span class="badge badge-warning">Sedang Diverifikasi</span>
        <?php } else if ($bio_fas['is_verify'] == 2) { ?>
            <span class="badge badge-success">Terverifikasi</span>
        <?php } else if ($bio_fas['is_verify'] == 3) { ?>
            <span class="badge badge-danger">Kurang Data</span>
        <?php } ?>
    </h2>
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-lg-8 mb-4">
            <div class="card">
                <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>
                    <div class="table-responsive">
                        <table style="width:100%">
                            <tr>
                                <th width="35%">ID NPWP</th>
                                <th width="35%">: <?= $bio_fas['id_npwp']; ?></th>
                            </tr>
                            <tr>
                                <th>Nama Faskes</th>
                                <th>: <?= $bio_fas['nama']; ?></th>
                            </tr>
                            <tr>
                                <th>Nama Pemilik</th>
                                <th>: <?= $faskes['nama']; ?></th>
                            </tr>
                            <tr>
                                <th>NO KTP Pemilik</th>
                                <th>: <?= $bio_fas['id_penanggung'] ?></th>
                            </tr>
                            <tr>
                                <th>No Hp</th>
                                <th>: <?= $faskes['no_tlpn']; ?></th>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <th>: <?= $bio_fas['alamat']; ?></th>
                            </tr>
                            <tr>
                                <th>Kota</th>
                                <th>: <?= $bio_fas['kota']; ?></th>
                            </tr>
                            <tr>
                                <th>Provinsi</th>
                                <th>: <?= $bio_fas['provinsi']; ?></th>
                            </tr>
                            <tr>
                                <th>Tanggal Gabung</th>
                                <th>: <?= $bio_fas['tgl_gabung']; ?></th>
                            </tr>

                        </table>

                    </div>
                    <hr>
                    <table class="table mt-3">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Nama Berkas</th>
                                <th scope="col">Download</th>
                                <th scope="col">Preview</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>SK Pendirian</td>
                                <td>
                                    <a href="<?= base_url('assets/user/img/file_faskes/') . $bio_fas['sk_pendirian'] ?>">
                                        <i class="fa fa-download fa-2x text-center"></i>
                                    </a>
                                </td>
                                <td>
                                    <img src="<?= base_url('assets/user/img/file_faskes/') . $bio_fas['sk_pendirian'] ?>">
                                    </img>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <br>
                    <a href="<?= base_url('admin/diterima_fas/') . $bio_fas['id_puskeswan']; ?>" class="btn btn-success">
                        Diterima
                    </a>
                    <a href="<?= base_url('admin/ditolak_fas/') . $bio_fas['id_puskeswan']; ?>" class="btn btn-danger">
                        Ditolak
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <img src="<?= base_url('assets/user/img/puskeswan/') . $bio_fas['gambar_profile']; ?>" class="img-fluid img-thumbnail" width="200px" alt="">
        </div>


    </div>
</div>