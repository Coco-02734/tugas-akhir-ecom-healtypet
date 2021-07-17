<main id="main">
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Buat Janji Fasilitas Kesehatan Hewan</h2>
                <ol>
                    <li><a href="">Home</a></li>
                    <li>Faskes / Ringkasan Pemesanan</li>
                </ol>
            </div>

        </div>
    </section>
    <section class="breadcrumbs">
        <div class="container">
            <div class="card">
                <div class="kotak card-body">
                    <h3 class="">Formulir Pendaftaran</h3>


                    <div class="px-4 py-5">
                        <div class="mb-4">
                            <h4>Alamat : </h4>
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

                        <div class="d-flex justify-content-between"> <span class="font-weight-bold"><?= $faskes['nama_fasilitas'] ?> </span> <span class="text-muted">Rp <?= $faskes['harga'] ?></span> </div>

                        <div class="d-flex justify-content-between mt-3"> <span class="font-weight-bold">Total</span> <span class="font-weight-bold theme-color">
                                Rp <?= $faskes['harga']; ?></span> </div>
                    </div>
                    <div class="mb-3">
                        <hr class="new1">
                    </div>
                </div>
                <form id="payment-form" method="post" action="<?= site_url() ?>awal/snap/finish">
                    <div class="kotak card-body" style="margin-top: -30px;">
                        <div class="">
                            <div class="form-group">
                                <label for="pemilik">Nama Pemilik</label>
                                <input type="text" value="<?= $user['nama'] ?>" class="form-control" id="pemilik" name="pemilik" readonly>
                            </div>
                            <div class="form-group">
                                <label for="jadwal">Pilih Jadwal</label>
                                <input type="text" class="form-control" id="jadwal" name="jadwal" aria-describedby="jadwal" required>
                                <small id="jadwal" class="form-text text-muted">Pemilih jadwal tidak boleh lebih dari ketentuan Fasilitas Kesehatan ( <?= $faskes['jadwal']; ?> )</small>
                            </div>
                            <div class="form-group">
                                <label for="peliharaan">Nama Hewan</label>
                                <select class="form-control" name="peliharan" id="peliharaan">
                                    <?php foreach ($pet as $a) : ?>
                                        <option value="<?= $a['nama'] ?>"><?= $a['nama'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="harga" id="harga" value="<?= $faskes['harga']; ?>">

                    <input type="hidden" name="id_dokter" id="id_dokter" value="1">
                    <input type="hidden" name="id_faskes" id="id_faskes" value="<?= $faskes['id_puskeswan']; ?>">
                    <input type="hidden" name="keteranganjanji" id="keteranganjanji" value="<?= $faskes['nama_fasilitas']; ?>">
                    <input type="hidden" name="id_user" id="id_user" value="<?= $user['id']; ?>">
                    <input type="hidden" name="result_type" id="result-type" value="">
                    <input type="hidden" name="result_data" id="result-data" value="">
                    <div class="text-center mb-5"> <button class="btn btn-primary" id="pay-button">Bayar dan Daftar</button> </div>
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
        var jadwal = $('#jadwal').val();
        var peliharaan = $('#peliharaan').val();
        var id_dokter = $('#id_dokter').val();
        var id_user = $('#id_user').val();
        var keteranganjanji = $('#keteranganjanji').val();
        var id_faskes = $('#id_faskes').val();

        $.ajax({
            type: 'POST',
            url: '<?= site_url() ?>awal/Snap/token',
            data: {
                harga: harga,
                jadwal: jadwal,
                id_faskes: id_faskes,
                peliharaan: peliharaan,
                id_dokter: id_dokter,
                keterangan: 'Buat Janji ' + keteranganjanji,
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