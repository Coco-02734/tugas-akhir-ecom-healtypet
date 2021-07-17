<section id="hero" class="d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1" data-aos="fade-up">
                <div class="banner-text">
                    <h1 class="mobile-text">Solusi Kesehatan Hewan Terlengkap</h1>
                    <h6>Chat dokter, kunjungan rumah sakit hewan, beli obat, growming, suntik vaksin dan update informasi
                        seputar kesehatan, semua bisa di Healty Pet !</h6>
                </div>
                <div class="slider-menu mt-2" data-flickity='{ 
            "freeScroll": true,
            "contain" : true,
            "prevNextButtons" : false,
             "pageDots" : false
          }'>
                    <a href="<?= base_url('awal/dokter'); ?>" class="menu-card">
                        <div class="card card1">
                            <div class="card-body">
                                <img class="img-menu" id="img-menu" src="<?= base_url('assets/user/') ?>img/menu/chat-dokter.png" alt="chat-dokter">
                            </div>
                            <h6 class="text-menu text-center" style="margin-top: -10px;">Chat Dengan Dokter</h6>
                        </div>
                    </a>
                    <a href="<?= base_url('awal/toko') ?>" class="menu-card">
                        <div class="card" style="width: 8rem;">
                            <div class="card-body">
                                <img class="img-menu" id="img-menu" src="<?= base_url('assets/user/') ?>img/menu/shop.png" alt="chat-dokter">
                            </div>
                            <h6 class="text-menu text-center" style="margin-top: -10px;">Toko Kesehatan Hewan</h6>
                        </div>
                    </a>
                    <a href="<?= base_url('awal/faskes') ?>" class="menu-card">
                        <div class="card" style="width: 8rem;">
                            <div class="card-body">
                                <img class="img-menu" id="img-menu" src="<?= base_url('assets/user/') ?>img/menu/rs.png" alt="chat-dokter">
                            </div>
                            <h6 class="text-menu text-center" style="margin-top: -10px;">Buat Janji RS Hewan</h6>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-6 d-lg-flex flex-lg-column align-items-stretch order-1 order-lg-2 hero-img" data-aos="fade-up">
                <img src="<?= base_url('assets/user/') ?>img/icon/banner.gif" class="img-fluid" alt="">
            </div>
        </div>
    </div>

</section>

<main id="main">

    <section id="features" class="features">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Penawaran Menarik</h2>
            </div>
            <div class="slider-promo" data-flickity='{ 
          "freeScroll": true,
          "contain" : true,
          "prevNextButtons" : false,
          "pageDots" : true
        }'>
                <?php foreach ($iklan as $ads) : ?>
                    <img src="<?= base_url('assets/user/') . $ads['image'] ?>" class="img-fluid" width="350px" alt="promo">
                <?php endforeach; ?>

            </div>
        </div>
    </section>


    <section id="details" class="details">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-6">
                    <h2>Baca Artikel Baru</h2>
                </div>
                <div class="col-lg-6">
                    <a href="<?= base_url('awal/berita'); ?>" class="btn btn-outline-secondary kanan">Lihat Semua</a>
                </div>
            </div>
            <div class="slider-berita" data-flickity='{ 
          "freeScroll": true,
          "contain" : true,
          "prevNextButtons" : false,
          "pageDots" : true
        }'>
                <?php foreach ($berita as $news) : ?>
                    <a href="<?= base_url('awal/berita/lengkap/') . $news['id_berita']; ?>" class="text-dark">
                        <div class="card" style="width: 22rem;">
                            <img src="<?= base_url('assets/user/') ?>img/berita/<?= $news['image']; ?>" class="card-img-top" alt="gambar">
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold"><?= $news['judul']; ?></h5>
                                <p class="card-text"><?= substr($news['diskripsi'], 0, -100); ?> ...</p>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
            <div class="mt-5" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-6">
                        <h2>Obat & Vaksin</h2>
                    </div>
                </div>
                <!-- card vaksin dll -->
                <div class="row row-cols-1 row-cols-md-3">
                    <?php foreach ($jns_suntik as $injr) : ?>
                        <a href="<?= base_url('awal/faskes'); ?>" class="text-dark">
                            <div class="col mb-6 mt-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <img class="img-rounded" width="60px" src="<?= base_url('assets/user/') ?>img/vaksin.png" alt="">
                                            </div>
                                            <div class="col-lg-9 mt-3">
                                                <h4><?= $injr['nama_vaksin']; ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section id="faq" class="faq section-bg">
        <div class="container">
            <div class="section-title">
                <h2>Frequently Asked Questions</h2>
            </div>

            <div class="accordion-list">
                <ul>
                    <li data-aos="fade-up">
                        <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" class="collapse" href="#accordion-list-1">Apa itu healty pet ?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="accordion-list-1" class="collapse show" data-parent=".accordion-list">
                            <p>
                                Hai para pet owner, kami hadir untuk membantu para pet owner dalam merawat dan memberikan pertolongan pertama pada hewan peliharaan anda dimana pun dan kapanpun berada.
                            </p>
                        </div>
                    </li>
                    <li data-aos="fade-up">
                        <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" class="collapse" href="#accordion-list-2">Fitur apa saja sih yang ada di healty pet ?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="accordion-list-2" class="collapse " data-parent=".accordion-list">
                            <p>
                                Hai para pet owner, kami hadir dengan beberapa fitur menarik seperti layanan konsultasi dokter hewan, buat janji klinik hewan, dan pet owner bisa membeli keperluan hewan peliharaan kalian di toko healty pet kami.
                            </p>
                        </div>
                    </li>
                    <li data-aos="fade-up">
                        <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" class="collapse" href="#accordion-list-3">Lalu cara pembayaranya gimana nih ?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="accordion-list-3" class="collapse " data-parent=".accordion-list">
                            <p>
                                Hai para pet owner, memiliki beberapa metode pembayaran yang realtime dan banyak. Bisa melalui virtual account Bank, E-Wallet, debit card, hingga kredit card.
                            </p>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
    </section>

</main>