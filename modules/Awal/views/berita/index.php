<section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="fade-up">
        <form method="GET" action="<?= base_url('awal/berita'); ?>" class="mb-5">
            <div class="form-group">
                <div class="row">
                    <div class="col-10 mb-2">
                        <input type="text" class="form-control form-text" name="q" placeholder="Ex: Kucing sehat" id="cari">
                    </div>
                    <div class="col mt-1">
                        <button class="btn btn-success" style="width: 120px;">Cari</button>
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="row row-cols-1 row-cols-md-3">
                <?php foreach ($berita as $artikel) : ?>
                    <div class="artikel col mb-4">
                        <a href="<?= base_url('awal/berita/lengkap/') . $artikel['id_berita']; ?>" class="text-dark">
                            <div class="card">
                                <img src="<?= base_url('assets/user/img/berita/') . $artikel['image']; ?>" class="card-img-top" wi alt="gamabr">
                                <div class="card-body">
                                    <h5><span class="badge badge-info" style="opacity: 0.4;"><?= $artikel['publisher']; ?></span></h5>
                                    <h5 class="card-title"><?= $artikel['judul']; ?></h5>
                                    <p class="card-text"><?= substr($artikel['diskripsi'], 0, -100); ?> ...</p>

                                    <p><a href="<?= base_url('awal/berita/lengkap/') . $artikel['id_berita']; ?>" class="btn btn-light btn-block mt-3" role="button">Selengkapnya</a></p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php

                endforeach; ?>
            </div>

        </div>
        <?php if ($berita == null) { ?>
            <center>
                <img src="<?= base_url('assets/user/img/gakada.gif') ?>" class="img-fluid mt-5" width="450px" alt="notfound">
                <h2>Maaf Artikel atau Berita tidak ditemukan!</h2>
            </center>
        <?php } ?>
    </div>
</section>