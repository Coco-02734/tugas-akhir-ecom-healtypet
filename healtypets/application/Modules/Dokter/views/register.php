<div class="content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 contents">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="form-block">
                            <div class="mb-4">
                                <h3>Daftar Menjadi <strong>Dokter Healty Pets</strong></h3>
                                <p class="mb-4"></p>
                            </div>
                            <form action="<?= base_url('dokter/auth/registration') ?>" method="post">
                                <div class="form-group first">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="nama" id="nama" required>
                                </div>
                                <div class="form-group first">
                                    <label for="no_tlpn">Nomor Telpon</label>
                                    <input type="number" class="form-control" name="no_tlpn" id="no_tlpn" required>
                                </div>
                                <div class="form-group first">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" required>
                                </div>
                                <div class="form-group last mb-4">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" required>

                                </div>

                                <input type="submit" value="Daftar" class="btn btn-pill text-white btn-block btn-primary">
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>