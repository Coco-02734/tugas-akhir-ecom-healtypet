<section id="hero" class="d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="thumbnail text-left">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Artikel</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?= $berita['judul']; ?></li>
                        </ol>
                    </nav>

                    <img src="<?= base_url('assets/user/img/berita/') . $berita['image']; ?>" width="100%" alt="hehe">
                    <div class="caption mt-3">
                        <blockquote class="blockquote">
                            <p class="mb-0"><b><?= $berita['judul']; ?></b></p>
                            <footer class="blockquote-footer">
                                <i class="fa fa-tags"></i>
                                Oleh : <?= $berita['publisher'] . '&nbsp; &nbsp;<i class="fa fa-calendar"></i> ' . $berita['date_created']; ?>
                            </footer>
                        </blockquote>
                        <p>
                            <?= $berita['isi']; ?>
                        </p>
                        <hr>
                    </div>
                    <div id="disqus_thread"></div>
                    <script>
                        /**
                         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
                        /*
                        var disqus_config = function () {
                        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                        };
                        */
                        (function() { // DON'T EDIT BELOW THIS LINE
                            var d = document,
                                s = d.createElement('script');
                            s.src = 'https://healtypet.disqus.com/embed.js';
                            s.setAttribute('data-timestamp', +new Date());
                            (d.head || d.body).appendChild(s);
                        })();
                    </script>
                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

                </div>
            </div>

            <div class="col-sm-4">
                <div class="row">
                    <h4 class="mb-3">Artikel Terkait : </h4>
                    <?php foreach ($tmb as $t) : ?>
                        <div class="col-sm-12 mb-3">
                            <div class="caption">
                                <h5><?= $t['judul']; ?></h5>
                                <div class="row">
                                    <div class="col-xl-5">
                                        <img src="<?= base_url('assets/user/img/berita/') . $t['image']; ?>" width="100%" alt="Cinque Terre">
                                    </div>
                                    <div class="col-sm-7">
                                        <p><?= substr($t['diskripsi'], 0, -130); ?></p>
                                        <p><a href="<?= base_url('awal/berita/lengkap/') . $t['id_berita']; ?>" class="btn btn-light btn-block" role="button">Selengkapnya</a></p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                    <?php endforeach; ?>

                </div>

            </div>
        </div>
    </div>
</section>