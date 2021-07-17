<div class="content-wrapper">

    <h2>
        Informasi <?= $dokter['nama']; ?>
        <?php if ($bio_dok['is_verify'] == 0) { ?>
            <span class="badge badge-secondary">Belum Pengajuan</span>
        <?php } else if ($bio_dok['is_verify'] == 1) { ?>
            <span class="badge badge-warning">Sedang Diverifikasi</span>
        <?php } else if ($bio_dok['is_verify'] == 2) { ?>
            <span class="badge badge-success">Terverifikasi</span>
        <?php } else if ($bio_dok['is_verify'] == 3) { ?>
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
                                <th width="35%">ID KTP</th>
                                <th width="35%">: <?= $bio_dok['id_identitas']; ?></th>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <th>: <?= $dokter['nama']; ?></th>
                            </tr>
                            <tr>
                                <th>Tgl Lahir</th>
                                <th>: <?= $bio_dok['tgl_lahir'] ?></th>
                            </tr>

                            <tr>
                                <th>Jenis Kelamin</th>
                                <th>:<?= $bio_dok['jns_kelamin']; ?></th>
                            </tr>
                            <tr>
                                <th>No Hp</th>
                                <th>: <?= $dokter['no_tlpn']; ?></th>
                            </tr>
                            <tr>
                                <th>Lulusan</th>
                                <th>: <?= $bio_dok['lulusan']; ?></th>
                            </tr>
                            <tr>
                                <th>Tahun Lulus</th>
                                <th>: <?= $bio_dok['tahun_lulus']; ?></th>
                            </tr>
                            <tr>
                                <th>No STR </th>
                                <th>: <?= $bio_dok['id_sk']; ?></th>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <th>: <?= $bio_dok['alamat']; ?></th>
                            </tr>
                            <tr>
                                <th>Kota</th>
                                <th>: <?= $bio_dok['kota']; ?></th>
                            </tr>
                            <tr>
                                <th>Provinsi</th>
                                <th>: <?= $bio_dok['provinsi']; ?></th>
                            </tr>
                            <tr>
                                <th>Jam Kerja</th>
                                <th>: <?= $bio_dok['jam_kerja']; ?></th>
                            </tr>
                            <tr>
                                <th>Harga Layanan</th>
                                <th>: <?= $bio_dok['harga']; ?></th>
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
                                <td>KTP</td>
                                <td>
                                    <a href="<?= base_url('assets/dokter/img/file/') . $bio_dok['gambar_ktp'] ?>">
                                        <i class="fa fa-download fa-2x text-center"></i>
                                    </a>
                                </td>
                                <td>
                                    <img src="<?= base_url('assets/dokter/img/file/') . $bio_dok['gambar_ktp'] ?>">
                                    </img>
                                </td>
                            </tr>
                            <tr>
                                <td>STR</td>
                                <td>
                                    <a href="<?= base_url('assets/dokter/img/file/') . $bio_dok['sk_dokter'] ?>">
                                        <i class="fa fa-download fa-2x text-center"></i>
                                    </a>
                                </td>
                                <td>
                                    <img src="<?= base_url('assets/dokter/img/file/') . $bio_dok['sk_dokter'] ?>">
                                    </img>
                                </td>
                            </tr>
                            <tr>
                                <td>Bukti Identitas</td>
                                <td>
                                    <a href="<?= base_url('assets/dokter/img/file/') . $bio_dok['bukti_identitas'] ?>">
                                        <i class="fa fa-download fa-2x text-center"></i>
                                    </a>
                                </td>
                                <td>
                                    <img src="<?= base_url('assets/dokter/img/file/') . $bio_dok['bukti_identitas'] ?>">
                                    </img>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <br>
                    <a href="<?= base_url('admin/diterima/') . $bio_dok['id_dokter']; ?>" class="btn btn-success">
                        Diterima
                    </a>
                    <a href="<?= base_url('admin/ditolak/') . $bio_dok['id_dokter']; ?>" class="btn btn-danger">
                        Ditolak
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <img src="<?= base_url('assets/user/img/dokter/') . $dokter['image']; ?>" class="img-fluid img-thumbnail" width="200px" alt="">
        </div>


    </div>
</div>