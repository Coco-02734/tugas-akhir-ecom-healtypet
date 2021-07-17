<div class="content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 contents">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="form-block">
                            <div class="mb-4">
                                <h3>Sign In to <strong>Dokter Healty Pets</strong></h3>
                                <p class="mb-4"></p>
                            </div>
                            <form action="<?= base_url('dokter/auth/login') ?>" method="post">
                                <div class="form-group first">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" required>

                                </div>
                                <div class="form-group last mb-4">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" required>
                                </div>

                                <div class="d-flex mb-5 align-items-center">
                                    <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                                        <input type="checkbox" checked="checked" />
                                        <div class="control__indicator"></div>
                                    </label>

                                </div>

                                <input type="submit" value="Masuk" class="btn btn-pill text-white btn-block btn-primary">

                                <span class="d-block text-center my-4 text-muted">Daftar Menjadi Dokter</span>
                                <center>
                                    <a href="<?= base_url('dokter/auth/daftar') ?>" class="text-center">Daftar</a>
                                </center>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>