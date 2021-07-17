<div id="main">
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h4>Keranjang Belanja</h4>
                <ol>
                    <li><a href="<?= base_url('awal') ?>">Home</a></li>
                    <li><?= $title; ?></li>
                </ol>
            </div>

        </div>
    </section>

    <section class="pt-5 pb-5">
        <div class="container">
            <?php if ($keranjang == null) { ?>
                <center>
                    <img src="<?= base_url('assets/user/img/gakada.gif') ?>" class="img-fluid" width="450px" alt="notfound">
                    <h2>Maaf Keranjang Masih Kosong !</h2>
                </center>
            <?php } else { ?>
                <div class="row w-100">
                    <div class="col-lg-12 col-md-12 col-12">
                        <h3 class="display-5 mb-2 text-center">Silahkan Memeriksa Pesanan Anda</h3>
                        <p class="mb-5 text-center">
                            <i class="text-info font-weight-bold"><?= $jml_cart['jml'] ?></i> items in your cart
                        </p>
                        <table id="shoppingCart" class="table table-condensed table-responsive">
                            <thead>
                                <tr>
                                    <th style="width:60%">Product</th>
                                    <th style="width:12%">Harga</th>
                                    <th style="width:10%">Jumlah</th>
                                    <th style="width:16%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($keranjang as $cart) :
                                    $data = $this->db->get_where('tb_produk_rs', ['id_produk' => $cart['id_produk']])->row_array();
                                ?>

                                    <tr>
                                        <td data-th="Product">
                                            <div class="row">
                                                <div class="col-md-3 text-left">
                                                    <img src="<?= base_url('assets/user/img/barang/') . $data['image']; ?>" alt="" class="img-fluid d-none d-md-block rounded mb-2 shadow ">
                                                </div>
                                                <div class="col-md-9 text-left mt-sm-2">
                                                    <h4><?= $data['nama_produk'] ?></h4>
                                                    <p class="font-weight-light"><?= $data['katagori'] ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-th="Price">Rp <?= $data['harga'] ?></td>
                                        <td data-th="Quantity">
                                            <input type="number" name="jml" class="form-control form-control-lg text-center" value="<?= $cart['jml']; ?>" id="jml">
                                        </td>
                                        <td class="actions" data-th="">
                                            <div class="text-right">
                                                <button class="btn btn-white border-secondary bg-white btn-md mb-2" id="update-barang" data-barang="<?= $cart['id_produk'] ?>">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                                <button class="btn btn-white border-secondary bg-white btn-md mb-2" id="hapus-barang" data-barang="<?= $cart['id_keranjang'] ?>">
                                                    <i class="fa fa-trash text-danger"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="float-right text-right">
                            <h4>Subtotal: </h4>
                            <h1>Rp <?= $subtotal['total_harga']; ?></h1>
                        </div>
                    </div>
                </div>
                <div class="row mt-4 d-flex align-items-center">
                    <div class="col-sm-6 order-md-2 text-right">
                        <a href="<?= base_url('awal/user/payment') ?>" class="btn btn-primary mb-4 btn-lg pl-5 pr-5">Checkout</a>
                    </div>
                <?php } ?>
                <div class="col-sm-6 mb-3 mb-m-1 order-md-1 text-md-left">
                    <a href="<?= base_url('awal/toko') ?>">
                        <i class="fa fa-arrow-left mr-2"></i> Lanjut Belanja</a>
                </div>
                </div>
        </div>
    </section>

</div>