<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact" data-aos="fade-up">
                    <h3>Healty Pet</h3>
                    <p>
                        Banyumanik, Semarang<br>
                        <strong>Email:</strong>healtypet@gmail.com<br>
                    </p>
                </div>

                <div class="col-lg-3 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="100">
                    <h4>Link Kami</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('awal#faq') ?>">FAQ</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('awal/berita') ?>">Blog</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="">Syarat & Ketentuan</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="">Promo</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="">Karir</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="200">
                    <h4>Sosial Media Kami</h4>
                    <p>Yuk ikuti sosial media kami</p>
                    <div class="social-links mt-3">
                        <a href="" class="twitter"><i class="bx bxl-twitter"></i></a>
                        <a href="" class="instagram"><i class="bx bxl-instagram"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="300">
                    <h4>Partner Pembayaran</h4>
                    <div class="f_social_icon">
                        <img src="https://mabakampus.com/simulcpns/assets/awal/img/payment.png" class="img-fluid" alt="pembayaran">
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container py-4">
        <div class="copyright">
            &copy; Copyright <strong><span>Healty Pet</span></strong>. All Rights Reserved
        </div>

    </div>
</footer>

<!-- Modal login -->
<div class="modal fade" id="modalLogin" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="">
                <button type="button" class="close mr-3" data-dismiss="modal" aria-label="Close">
                    <h1 aria-hidden="true">&times;</h1>
                </button>
            </div>
            <div class="modal-body" style="margin-top: -30px;">
                <h2 class="modal-title text-center" id="staticBackdropLabel">Let's get started</h2>
                <h6 class="text-center">Silahkan masuk dengan email akun yang sudah terdaftar untuk memberikan layanan Healty
                    Pet</h6>
                <form method="POST" action="<?= base_url('Awal/auth/login'); ?>" class="container mt-3 mb-5">
                    <div class="form-group">
                        <label for="email">Email </label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <center>
                        <button type="submit" class="btn btn-primary mb-3">Masuk</button>
                    </center>
                    <h6 class="text-center"><a href="#" id="daftar">Belum punya akun ? Daftar</a></h6>
                </form>
            </div>

        </div>
    </div>
</div>

</html>
<!-- Modal daftar -->
<div class="modal fade" id="modalDaftar" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="">
                <button type="button" class="close mr-3" data-dismiss="modal" aria-label="Close">
                    <h1 aria-hidden="true">&times;</h1>
                </button>
            </div>
            <div class="modal-body" style="margin-top: -30px;">
                <h2 class="modal-title text-center" id="staticBackdropLabel">Let's get started</h2>
                <h6 class="text-center">Silahkan daftar akun dengan email aktif untuk memberikan layanan Healty
                    Pet</h6>
                <form method="POST" action="<?= base_url('awal/auth/registration'); ?>" class="container mt-3 mb-5">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap </label>
                        <input type="nama" class="form-control" name="nama" id="nama">
                    </div>
                    <div class="form-group">
                        <label for="email">Email </label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <center>
                        <button type="submit" class="btn btn-primary mb-3">Daftar</button>
                    </center>
                    <!-- <h6 class="text-center"><a href="#" id="daftar">Belum punya akun ? Daftar</a></h6> -->
                </form>
            </div>

        </div>
    </div>
</div>



<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


<script src="<?= base_url('assets/user/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/user/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/user/') ?>vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="<?= base_url('assets/user/') ?>vendor/php-email-form/validate.js"></script>
<script src="<?= base_url('assets/user/') ?>vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="<?= base_url('assets/user/') ?>vendor/venobox/venobox.min.js"></script>
<script src="<?= base_url('assets/user/') ?>vendor/aos/aos.js"></script>

<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<script src="<?= base_url('assets/user/') ?>js/main.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        if (<?= $this->session->flashdata('message') != "" ?>) {
            Swal.fire(
                '<?= $this->session->flashdata('message'); ?>',
                '',
                '<?= $this->session->flashdata('status'); ?>'
            )
        }
    });
</script>
<script id="dsq-count-scr" src="//healtypet.disqus.com/count.js" async></script>

<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
    $('#text-copy-resi').on('click', function() {
        var resi = $('#text-copy-resi').text();
        resi.select();
        document.execCommand("copy");
        alert("haha");
    });
    $('#tambahPeliharaan').on('click', function() {
        $('#modalTambahPeliharaan').modal('show')
    })
    $('#login').on('click', function() {
        $('#modalLogin').modal('show')
    })
    $('#loginn').on('click', function() {
        $('#modalLogin').modal('show')
    })
    $('#loginns').on('click', function() {
        $('#modalLogin').modal('show')
    })
    $('#editfoto').on('click', function() {
        $('#modalFoto').modal('show')
    })
    $('#editProfile').on('click', function() {
        $('#modalProfilUser').modal('show')
    })
    $('#daftar').on('click', function() {
        $('#modalLogin').modal('hide')
        $('#modalDaftar').modal('show')
    })

    $('#tambah-chart').on('click', function() {
        const produkId = $(this).data('barang');
        console.log(produkId);
        $.ajax({
            url: "<?= base_url('awal/user/tambahKeranjang'); ?>",
            type: 'post',
            data: {
                produkId: produkId
            },
            success: function() {
                $('#main').load("<?= base_url('awal/toko'); ?>");
            }
        })


    });
    $('#update-barang').on('click', function() {
        const produkId = $(this).data('barang');
        const jml = $('#jml').val();
        console.log(produkId);
        $.ajax({
            url: "<?= base_url('awal/user/update_produk'); ?>",
            type: 'post',
            data: {
                produkId: produkId,
                jml: jml
            },
            success: function() {
                $('#main').load("<?= base_url('awal/user/keranjang'); ?>");
            }
        })


    });
    $('#hapus-barang').on('click', function() {
        const keranjangId = $(this).data('barang');
        console.log(keranjangId);
        $.ajax({
            url: "<?= base_url('awal/user/hapus_produk'); ?>",
            type: 'post',
            data: {
                keranjangId: keranjangId
            },
            success: function() {
                $('#main').load("<?= base_url('awal/user/keranjang'); ?>");
            }
        })


    });
</script>
<script type="text/javascript">
    window.$crisp = [];
    window.CRISP_WEBSITE_ID = "88262338-d670-4eb2-a077-349ff044e80d";
    (function() {
        d = document;
        s = d.createElement("script");
        s.src = "https://client.crisp.chat/l.js";
        s.async = 1;
        d.getElementsByTagName("head")[0].appendChild(s);
    })();
</script>


</body>

</html>