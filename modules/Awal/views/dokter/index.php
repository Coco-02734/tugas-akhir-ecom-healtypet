<main id="main">

    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Tanya Dokter</h2>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Tanya Dokter</li>
                </ol>
            </div>

        </div>
    </section>

    <section class="inner-page">
        <div class="container">
            <form method="GET" class="mb-5">
                <div class="form-group">
                    <div class="row">
                        <div class="col-10 mb-2">
                            <input type="text" class="form-control form-text" name="cari-dokter" placeholder="Cari nama dokter ( Contoh : Drh Nico atau Nico )" id="cari">
                        </div>
                        <div class="col mt-1">
                            <button class="btn btn-success" style="width: 120px;">Cari</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row row-cols-1 row-cols-md-3">
                <?php foreach ($dokter as $d) : ?>
                    <!-- card dokter -->
                    <div class="col mb-4">
                        <a href="<?= base_url('awal/dokter/detail/') . $d['id']; ?>">
                            <div class="card">
                                <div class="row ml-1 mt-3">
                                    <div class="col-lg-3">
                                        <img src="<?= base_url('assets/user/img/dokter/') . $d['image']; ?>" width="80px" height="80px" class="rounded-circle img-dokter" alt="dokter">
                                    </div>
                                    <div class="col-lg-9 mt-1">
                                        <h5 class="nama-dokter"><?= $d['nama']; ?></h5>
                                        <h6 class="ket-dokter">Dokter Hewan</h6>
                                        <h6 class="ket-dokter">Rp <?= number_format($d['harga'], 2, ',', '.'); ?></h6>
                                        <?php if ($d['status'] == 0) { ?>
                                            <span class="badge badge-pill badge-secondary">offline</span>
                                        <?php } else { ?>
                                            <span class="badge badge-pill badge-success">online</span>
                                        <?php } ?>
                                    </div>
                                </div>
                        </a>
                        <hr>
                        <div class="ml-2 mt-2">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row ml-2 mb-3">
                                        <i class="bx bx-like">
                                            <span class="ket-bawah">
                                                <?php if ($d['bintang'] == 0) {
                                                ?>
                                                    Baru
                                                <?php } else { ?>
                                                    <?= $d['bintang']; ?>%
                                                <?php } ?>
                                            </span>
                                        </i>
                                        <i class="bx bxs-badge-check ml-4 text-primary">
                                            <span class="ket-bawah"><?= $d['jam_kerja']; ?> tahun</span>
                                        </i>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row ml-2 mb-3">
                                        <?php if (!$user) { ?>
                                            <a href="#" class="btn btn-primary btn-chat" id="loginn">Chat</a>
                                        <?php } else { ?>
                                            <?php if ($d['status'] == 0) { ?>
                                                <button class="btn btn-secondary btn-chat" disabled>Chat</button>
                                            <?php } else { ?>

                                                <a href="<?= base_url('awal/dokter/cek_transaksi/') . $d['id_dokter']; ?>" class="btn btn-primary btn-chat">Chat</a>
                                            <?php } ?>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <!-- card dokter selesai -->
        <?php endforeach; ?>
        </div>
        </div>
    </section>

</main><!-- End #main -->

<footer id="footer">
    <div class="footer-newsletter" data-aos="fade-up">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h4>Keunggulan & Ketentuan Chat Dengan Dokter</h4>
                </div>
            </div>
            <div class="text-keterangan">

                <p class="text-justify mt-3">
                    <b>Tanya Dokter Umum dan Spesialis di Healty Pet</b>
                    <br>
                    Kini kamu bisa tanya dokter online langsung dari website Healty Pet. Layanan kesehatan online terpercaya di
                    Indonesia ini memiliki daftar dokter pilihan terbaik di bidangnya masing-masing. Mulai dari dokter umum
                    yang bisa membantu menjawab keluhan ringan, hingga dokter spesialis berpengalaman dan terpercaya Terdiri
                    dari banyak jenis dokter spesialis. Mulai dari dokter gigi, ahli kebidanan, spesialis penyakit dalam, THT,
                    spesialis mata, hingga dokter spesialis anak. Semua dokter akan memberikan layanan kesehatan yang kamu
                    butuhkan. untuk memberi jalan keluar atas masalah kesehatan yang lebih berat. Jangan tunggu hingga parah,
                    langsung konsultasikan kondisi kesehatan kamu agar bisa segera ditangani oleh yang berpengalaman hanya di
                    Healty Pet!
                </p>
                <p class="text-justify">
                    <b> Mengapa Pilih Tanya Dokter Healty Pet?</b>
                    <br>
                    Memilih Tanya Dokter Healty Pet akan mempertemukan kamu dengan tenaga medis profesional secara cepat. Tidak
                    perlu repot mencari dokter terdekat dan harus keluar rumah. Healty Pet memastikan kamu mendapatkan pelayanan
                    terbaik dari tim dokter spesialis di Indonesia yang terhubung langsung dari halaman website Healty Pet.
                    Fasilitas ini bisa kamu gunakan untuk menjawab pelbagai masalah kesehatan yang sering dialami seperti Gejala
                    tipes, Anemia, dan Hepatitis. Selain itu kamu juga bisa memastikan kondisi kesehatan kamu yang berkaitan
                    dengan organ penting seperti kondisi pneumonia dan bronkitis di paru-paru. Masalah kesehatan yang kerap kali
                    jadi pertanyaan misalnya masalah kista dan kehamilan bagi wanita, juga kesehatan keluarga kamu yang
                    berkaitan
                    dengan gejala usus buntu, Asam lambung, hingga batu ginjal.
                    Kamu bisa melakukan konsultasi dan diskusi kesehatan dengan dokter dan psikolog, menanyakan tips diet,
                    rekomendasi obat, rujukan ke rumah sakit, terapi, hingga rekomendasi gaya hidup yang baik sebagai upaya
                    pencegahan terhadap penyakit maupun kondisi kesehatan lainnya.
                <p class="text-justify ml-5">
                    <b>Memiliki dokter berpengalaman di seluruh Indonesia</b>
                    <br>
                    Dokter Online Healty Pet bukanlah praktisi kesehatan sembarangan. Kamu bisa terhubung langsung dengan
                    cepat
                    dan
                    mudah, serta tidak perlu meragukan kualitas konsultasi dan penanganan yang ditawarkan.
                    <br>
                    <b> Privasi kamu tetap terjaga</b>
                    <br>
                    Tak perlu khawatir, semua percakapan dan diagnosis kesehatanmu dengan dokter di Healty Pet akan terjaga
                    keprivasiannya.
                    <br>
                    <b>Bekerja sebagai layanan kesehatan online terbaik dan terpercaya di Indonesia</b>
                    <br>
                    Tidak sebatas tanya dokter saja, Healty Pet juga menyajikan untukmu berbagai artikel informasi kesehatan
                    dan
                    berita kesehatan terkini. Ada banyak kategori kesehatan untuk berita terkini, tips dan rekomendasi, hingga
                    pengetahuan umum yang pastinya bermanfaat agar kamu bisa lebih waspada dan peduli terhadap kesehatan diri
                    sendiri maupun keluarga tercinta.
                </p>
                </p>
                <p class="text-justify">
                    <b>Cara Menghubungi Dokter Online</b>
                    <br>
                    Konsultasi dengan dokter Healty Pet secara online bisa dilakukan dengan cepat. Hanya dengan tiga langkah
                    mudah
                    kamu bisa terhubung dengan dokter yang kamu butuhkan. Ada dokter spesialis saraf, spesialis gigi, hingga
                    spesialis bedah yang bisa kamu hubungi 24 jam.
                    <br>
                    <b>1. Langkah pertama:</b>
                    <br>
                    Pilih dari dokter-dokter terbaik yang tersedia, dan kirim permintaan untuk berbicara sesuai dengan kebutuhan
                    atau keluhan kesehatanmu.
                    <br>
                    <b>2. Langkah kedua:</b>
                    <br>
                    Tunggu dokter. Dokter akan menyetujui permintaan kamu (biasanya dalam satu menit).
                    <br>
                    <b>3. Langkah terakhir:</b>
                    <br>
                    Bicara dengan dokter. Saat kamu telah terhubung dengan dokter, silahkan jelaskan kondisi kamu dengan tenang
                    dan jelas dengan tanya dokter Healty Pet.

                    Tidak perlu khawatir, semua percakapan dan diagnosis kesehatanmu dengan dokter di Healty Pet akan terjaga
                    Meski
                    dilakukan secara online, dapat dipastikan saat kamu Chat dengan dokter di Healty Pet dapat dipastikan
                    keluhan
                    dan
                    diskusi kesehatan kamu terjaga kerahasiaannya.
                </p>

            </div>
        </div>
    </div>