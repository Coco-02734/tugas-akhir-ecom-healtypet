<div id="main">
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h4>Transaksi No <?= $transaksi['id_transaksi'] ?></h4>
                <ol>
                    <li><a href="<?= base_url('awal') ?>">Home</a></li>
                    <li><?= $title; ?></li>
                </ol>
            </div>

        </div>
    </section>

    <div class="px-1 px-md-4 py-5 mx-auto riwayat">
        <div class="card">
            <div class="row d-flex justify-content-between px-3 top">
                <div class="d-flex">
                    <h5>ORDER <span class="text-primary font-weight-bold">#<?= $transaksi['id_transaksi'] ?></span></h5>
                </div>
                <div class="d-flex flex-column text-sm-right">
                    <p class="mb-0">Tanggal Transaksi <span><?= $transaksi['tgl_transaksi'] ?></span></p>
                    <p><?= $transaksi['kurir'] ?> - <span class="font-weight-bold"> <a href="#" class="text-copy-resi" id="text-copy-resi"><?= $transaksi['no_resi']; ?></a></span></p>
                </div>
            </div> <!-- Add class 'active' to progress -->
            <?php
            $cekJanji = $this->db->get_where('transaksi_faskes', ['id_transaksi' => $transaksi['id_transaksi']])->row_array();
            if ($cekJanji == null) {
            ?>
                <div class="row d-flex justify-content-center">
                    <div class="col-12">
                        <ul id="progressbar" class="text-center">
                            <?php if ($transaksi['statusd'] == 201) { ?>
                                <li class="step0"></li>
                                <li class="step0"></li>
                                <li class="step0"></li>
                                <li class="step0"></li>
                            <?php } else if ($transaksi['statusd'] == 0) { ?>
                                <li class="active step0"></li>
                                <li class="active step0"></li>
                                <li class="active step0"></li>
                                <li class="active step0"></li>
                            <?php } else if ($transaksi['statusd'] == 1) { ?>
                                <li class="active step0"></li>
                                <li class="active step0"></li>
                                <li class="active step0"></li>
                                <li class="step0"></li>
                            <?php } else if ($transaksi['statusd'] == 2) { ?>
                                <li class="active step0"></li>
                                <li class="active step0"></li>
                                <li class="step0"></li>
                                <li class="step0"></li>
                            <?php } else if ($transaksi['statusd'] == 3) { ?>
                                <li class="active step0"></li>
                                <li class="active step0"></li>
                                <li class="active step0"></li>
                                <li class="step0"></li>
                            <?php } else if ($transaksi['statusd'] == 200) { ?>
                                <li class="active step0"></li>
                                <li class="step0"></li>
                                <li class="step0"></li>
                                <li class="step0"></li>
                            <?php } else if ($transaksi['statusd'] == 404) { ?>
                                <li class="step0"></li>
                                <li class="step0"></li>
                                <li class="step0"></li>
                                <li class="step0"></li>
                            <?php } ?>

                        </ul>
                    </div>
                </div>
                <div class="row justify-content-between top">
                    <div class="row d-flex icon-content"> <img class="icon" src="<?= base_url('assets/user/img/icon/payment.gif') ?>">
                        <div class="d-flex flex-column">
                            <p class="font-weight-bold mt-3">Payment<br>Success</p>
                        </div>
                    </div>
                    <div class="row d-flex icon-content"> <img class="icon" src="<?= base_url('assets/user/img/icon/package.gif') ?>">
                        <div class="d-flex flex-column">
                            <p class="font-weight-bold mt-3">Pesanan<br>Dikemas</p>
                        </div>
                    </div>
                    <div class="row d-flex icon-content"> <img class="icon" src="<?= base_url('assets/user/img/icon/shipment.gif') ?>">
                        <div class="d-flex flex-column mt-3">
                            <p class="font-weight-bold mt-2">Pesanan<br>Dikirim</p>
                        </div>
                    </div>
                    <div class="row d-flex icon-content"> <img class="icon" src="<?= base_url('assets/user/img/icon/delivered.gif') ?>">
                        <div class="d-flex flex-column">
                            <p class="font-weight-bold mt-4">Order<br>Delivered</p>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <div class="container card-body">
                <p>Keterangan Detail</p>
                <?php
                $data_dok = $this->db->get_where('user', ['id' => $transaksi['id_faskes']])->row_array();
                ?>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <?php if ($transaksi['keterangan'] == "Chat Dokter") { ?>
                                    <img src="<?= base_url('assets/user/img/dokter/') . $data_dok['image']; ?>" alt="order" width="50px">
                                <?php } else { ?>
                                    <img src="<?= base_url('assets/user/img/order.png') ?>" alt="order" width="50px">
                                <?php } ?>
                            </div>
                            <div class="col-md-8">
                                <?php if ($transaksi['keterangan'] == "Chat Dokter") { ?>
                                    <p class="card-text font-weight-bold"><?= $data_dok['nama']; ?></p>
                                <?php } else { ?>
                                    <p class="card-text font-weight-bold"><?= $transaksi['keterangan'] ?></p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <p class="card-text font-weight-bold">
                            <?php
                            if ($transaksi['va_number'] == "") {
                            ?>
                                <?= $transaksi['bank'] ?>
                            <?php
                            } else {
                            ?>
                                No VA : <?= $transaksi['va_number']; ?>
                                <br>
                                <?= $transaksi['bank'] ?> -
                                <a href="<?= $transaksi['pdf_url']; ?>" class="badge badge-primary" target="blank">Cara Bayar</a>
                            <?php
                            }
                            ?>
                        </p>
                    </div>
                    <div class="col-lg-3">
                        <p class="card-text font-weight-bold">
                            <i class="fa fa-location-arrow"></i>
                            <?php if ($transaksi['keterangan'] == "Chat Dokter") { ?>
                                -
                            <?php } else { ?>
                                <?= $biouser['alamat'];  ?>
                            <?php } ?>
                        </p>
                    </div>
                    <div class="col-lg-3">
                        Harga : Rp <?= $transaksi['harga']; ?>
                    </div>

                </div>
                <!-- kusus janji -->
                <?php if ($transaksi['keterangan'] == "Chat Dokter") { ?>
                    <a href="<?= base_url('awal/dokter/cek_transaksi/') . $transaksi['id_faskes']; ?>" class="btn btn-primary mt-3">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Mulai Konsultasi
                    </a>
                <?php } ?>

                <?php
                $cekJanji = $this->db->get_where('transaksi_faskes', ['id_transaksi' => $transaksi['id_transaksi']])->row_array();
                if ($cekJanji != null) {
                ?>
                    <div class="card mt-5">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <span class="font-weight-bold">
                                </span> <span class="text-muted">
                                    <img src="<?= base_url('assets/user/img/bercode_janji/') . $cekJanji['id_transaksi'] ?>.png" class="img-fluid" alt="code" width="100px">
                                </span>
                            </div>
                            <div class="d-flex justify-content-between"> <span class="font-weight-bold">Status</span> <span class="text-muted">
                                    <?php if ($cekJanji['status'] == 201) { ?>
                                        <h5><span class="badge badge-warning">Waiting To Payment</span></h5>
                                    <?php } else if ($cekJanji['status'] == 0) { ?>
                                        <h5><span class="badge badge-success">Delivered / Closed</span></h5>
                                    <?php } else if ($cekJanji['status'] == 1) { ?>
                                        <h5><span class="badge badge-secondary">Process</span></h5>
                                    <?php } else if ($cekJanji['status'] == 2) { ?>
                                        <h5><span class="badge badge-secondary">Disiapkan</span></h5>
                                    <?php } else if ($cekJanji['status'] == 3) { ?>
                                        <h5><span class="badge badge-secondary">Dikirim</span></h5>
                                    <?php } else if ($cekJanji['status'] == 200) { ?>
                                        <h5><span class="badge badge-primary">Payed</span></h5>
                                    <?php } else if ($cekJanji['status'] == 404) { ?>
                                        <h5><span class="badge badge-danger">Batal</span></h5>
                                    <?php } ?>
                                </span>
                            </div>
                            <div class="d-flex justify-content-between"> <span class="font-weight-bold">Kode Booking</span> <span class="text-muted"><?= $cekJanji['id_transaksi'] ?></span> </div>
                            <div class="d-flex justify-content-between"> <span class="font-weight-bold">Nama Pemilik</span> <span class="text-muted"><?= $cekJanji['nama_pemilik'] ?></span> </div>
                            <div class="d-flex justify-content-between"> <span class="font-weight-bold">Nama Hewan</span> <span class="text-muted"><?= $cekJanji['nama_peliharaan'] ?></span> </div>
                            <div class="d-flex justify-content-between"> <span class="font-weight-bold">Jadwal Janji</span> <span class="text-muted"><?= $cekJanji['jadwal'] ?></span> </div>

                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

</div>