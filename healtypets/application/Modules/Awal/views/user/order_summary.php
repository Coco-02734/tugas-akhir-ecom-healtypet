<main id="main">
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Check Payment</h2>
                <ol>
                    <li><a href="">Home</a></li>
                    <li>Toko / Ringkasan Pemesanan</li>
                </ol>
            </div>

        </div>
    </section>
    <section class="breadcrumbs">
        <div class="container">
            <div class="card">
                <div class="kotak card-body">
                    <h3 class="">Rincian Pemesanan</h3>

                    <div class="px-4 py-5">
                        <div class="mb-4">
                            <h4>Alamat Pengiriman</h4>
                            <?php if ($bio['alamat'] == "") { ?>
                                <a href="<?= base_url('awal/user'); ?>" class="btn btn-danger">Lengkapi Alamat</a>
                            <?php } else { ?>
                                <span>
                                    <?= $bio['alamat']; ?>
                                    <br>
                                    <?= $bio['kota'] . " - " . $bio['provinsi']; ?>
                                    <br>
                                    <?= $user['no_tlpn']; ?>
                                </span>
                            <?php } ?>

                        </div>

                        <h4 class="theme-color mb-5">Thanks for your order</h4> <span class="theme-color">Payment Summary</span>
                        <div class="mb-3">
                            <hr class="new1">
                        </div>
                        <?php
                        foreach ($keranjang as $cart) :
                            $data = $this->db->get_where('tb_produk_rs', ['id_produk' => $cart['id_produk']])->row_array();
                        ?>
                            <div class="d-flex justify-content-between"> <span class="font-weight-bold"><?= $data['nama_produk'] ?> (Qty: <?= $cart['jml'] ?>)</span> <span class="text-muted">Rp <?= $cart['total_harga'] ?></span> </div>

                        <?php endforeach; ?>
                        <div class="d-flex justify-content-between"> <small>Shipping ( JNE - REG )</small> <small>Rp 18000</small> </div>

                        <div class="d-flex justify-content-between mt-3"> <span class="font-weight-bold">Total</span> <span class="font-weight-bold theme-color">
                                Rp <?= $subtotal['total_harga'] + 18000; ?></span> </div>

                    </div>
                </div>

                <form id="payment-form" method="post" action="<?= site_url() ?>awal/snap/finish">
                    <input type="hidden" name="harga" id="harga" value="<?= $subtotal['total_harga'] + 18000; ?>">

                    <input type="hidden" name="id_dokter" id="id_dokter" value="0">
                    <input type="hidden" name="id_user" id="id_user" value="<?= $user['id']; ?>">
                    <input type="hidden" name="result_type" id="result-type" value="">
                    <input type="hidden" name="result_data" id="result-data" value="">
                    <div class="text-center mb-5"> <button class="btn btn-primary" id="pay-button">Bayar</button> </div>

                </form>
            </div>
        </div>
        </div>
    </section>
</main>
<script type="text/javascript">
    $('#pay-button').click(function(event) {
        event.preventDefault();
        $(this).attr("disabled", "disabled");

        var harga = $('#harga').val();
        var id_dokter = $('#id_dokter').val();
        var id_user = $('#id_user').val();

        $.ajax({
            type: 'POST',
            url: '<?= site_url() ?>awal/Snap/token',
            data: {
                harga: harga,
                id_dokter: id_dokter,
                keterangan: 'Pemesanan Toko',
                id_user: id_user
            },
            cache: false,

            success: function(data) {
                //location = data;

                console.log('token = ' + data);

                var resultType = document.getElementById('result-type');
                var resultData = document.getElementById('result-data');

                function changeResult(type, data) {
                    $("#result-type").val(type);
                    $("#result-data").val(JSON.stringify(data));
                    //resultType.innerHTML = type;
                    //resultData.innerHTML = JSON.stringify(data);
                }

                snap.pay(data, {

                    onSuccess: function(result) {
                        changeResult('success', result);
                        console.log(result.status_message);
                        console.log(result);
                        $("#payment-form").submit();
                    },
                    onPending: function(result) {
                        changeResult('pending', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    },
                    onError: function(result) {
                        changeResult('error', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    }
                });
            }
        });
    });
</script>