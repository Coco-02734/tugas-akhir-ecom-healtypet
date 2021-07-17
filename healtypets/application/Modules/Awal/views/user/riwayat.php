<div id="main">
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h4>Riwayat Transaksi <?= $user['nama']; ?></h4>
                <ol>
                    <li><a href="<?= base_url('awal') ?>">Home</a></li>
                    <li><?= $title; ?></li>
                </ol>
            </div>

        </div>
    </section>

    <div class="container mt-4 mb-4" data-aos="fade-up">
        <?php
        foreach ($transaksi as $pay) :
            $data_dok = $this->db->get_where('user', ['id' => $pay['id_faskes']])->row_array();
        ?>
            <a href="<?= base_url('awal/user/transaksi_detail/') . $pay['id_transaksi']; ?>">
                <div class="card shadow-sm p-3 mb-2 bg-white rounded">
                    <div class="card-body">
                        <p><?= $pay['keterangan']; ?></p>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <?php if ($pay['keterangan'] == "Chat Dokter") { ?>
                                            <img src="<?= base_url('assets/user/img/dokter/') . $data_dok['image']; ?>" alt="order" width="50px">
                                        <?php } else { ?>
                                            <img src="<?= base_url('assets/user/img/order.png') ?>" alt="order" width="50px">
                                        <?php } ?>
                                    </div>
                                    <div class="col-md-8">
                                        <?php if ($pay['keterangan'] == "Chat Dokter") { ?>
                                            <p class="card-text font-weight-bold"><?= $data_dok['nama']; ?></p>
                                        <?php } else { ?>
                                            <p class="card-text font-weight-bold"><?= $pay['keterangan'] ?></p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <p class="card-text font-weight-bold">
                                    <i class="fa fa-calendar"></i>
                                    <?= $pay['tgl_transaksi']; ?>
                                </p>
                            </div>
                            <div class="col-lg-3">
                                <p class="card-text font-weight-bold">
                                    <i class="fa fa-location-arrow"></i>
                                    <?php if ($pay['keterangan'] == "Chat Dokter") { ?>
                                        -
                                    <?php } else { ?>
                                        <?= $biouser['alamat'];  ?>
                                    <?php } ?>
                                </p>
                            </div>
                            <div class="col-lg-3">
                                <?php if ($pay['statusd'] == 201) { ?>
                                    <h5><span class="badge badge-warning">Waiting To Payment</span></h5>
                                <?php } else if ($pay['statusd'] == 0) { ?>
                                    <h5><span class="badge badge-success">Delivered / Closed</span></h5>
                                <?php } else if ($pay['statusd'] == 1) { ?>
                                    <h5><span class="badge badge-secondary">Process</span></h5>
                                <?php } else if ($pay['statusd'] == 2) { ?>
                                    <h5><span class="badge badge-secondary">Disiapkan</span></h5>
                                <?php } else if ($pay['statusd'] == 3) { ?>
                                    <h5><span class="badge badge-secondary">Dikirim</span></h5>
                                <?php } else if ($pay['statusd'] == 200) { ?>
                                    <h5><span class="badge badge-primary">Payed</span></h5>
                                <?php } else if ($pay['statusd'] == 404) { ?>
                                    <h5><span class="badge badge-danger">Batal</span></h5>
                                <?php } ?>

                            </div>

                        </div>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
        <?php if ($transaksi == null) { ?>
            <center>
                <img src="<?= base_url('assets/user/img/gakada.gif') ?>" class="img-fluid mt-5" width="450px" alt="notfound">
                <h2>Maaf Kamu Belum Pernah Melakukan Transaksi</h2>
            </center>
        <?php } ?>
    </div>

</div>
<br>
<br>
<br>
<br>
<br>