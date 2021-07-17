<main id="main">
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Tanya Dokter</h2>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Tanya Dokter / Ringkasan Pemesanan</li>
                </ol>
            </div>

        </div>
    </section>
    <section class="breadcrumbs">
        <div class="container">
            <div class="card">
                <div class="kotak card-body">
                    <h3 class="mb-4">Rincian Pemesanan</h3>
                    <div class="row">
                        <div class="col-1">
                            <img src="<?= base_url('assets/user/img/dokter/') . $dokter['image']; ?>" width="80px" height="80px" class="rounded-circle img-dokter" alt="dokter">
                        </div>
                        <div class="col-6 mt-3 ml-5">
                            <h5 class="nama-dokter"><?= $dokter['nama']; ?></h5>
                            <h6>Dokter Hewan</h6>
                        </div>
                    </div>
                    <hr>
                    <h4>Ringkasan Pembayaran </h4>
                    <div class="container">
                        <div class="row">
                            <div class="col">Biaya sesi untuk 45 Menit</div>
                            <div class="col"><b> Rp <?= number_format($dokter['harga'], 2, ',', '.'); ?></b></div>
                            <div class="w-100"></div>
                            <div class="col">Diskon</div>
                            <div class="col">Rp 0</div>
                            <div class="w-100 mt-2"></div>
                            <div class="col">Total Bayar</div>
                            <div class="col"><b>Rp <?= number_format($dokter['harga'], 2, ',', '.'); ?></div>
                        </div>
                    </div>
                    <center>
                        <form id="payment-form" method="post" action="<?= site_url() ?>awal/snap/finish">
                            <input type="hidden" name="harga" id="harga" value="<?= $dokter['harga']; ?>">
                            <input type="hidden" name="id_dokter" id="id_dokter" value="<?= $dokter['id_dokter']; ?>">
                            <input type="hidden" name="id_user" id="id_user" value="<?= $user['id']; ?>">
                            <input type="hidden" name="result_type" id="result-type" value="">
                            <input type="hidden" name="result_data" id="result-data" value="">
                            <button class="btn btn-success mt-4" id="pay-button">BAYAR SEKARANG</button>
                        </form>
                    </center>

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
                keterangan: 'Chat Dokter',
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