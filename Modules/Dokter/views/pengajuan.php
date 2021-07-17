<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Halaman Login | Arsip</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-7">
                <div class="card shadow p-3 mb-5 bg-body rounded">
                    <div class="card-header bg-transparent mb-3">
                        <h5 class="text-center">Formulir Pengajuan Dokter <span class="font-weight-bold text-info">Healty Pet</span></h5>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('dokter/dokter/kirim_pengajuan') ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group mb-3">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="nama" value="<?= $user['nama']; ?>" class="form-control" placeholder="nama" readonly>
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="text" name="email" value="<?= $user['email']; ?>" class="form-control" placeholder="Email" id="email" readonly>
                            </div>
                            <div class="form-group mb-3">
                                <label for="ktp">NO NIK</label>
                                <input type="number" name="ktp" class="form-control" placeholder="Nomor KTP (ex: 70xxxxxxxxx)" id="ktp">
                            </div>
                            <div class="form-group mb-3">
                                <label for="id_sk">NO SK Kedokteran</label>
                                <input type="number" name="id_sk" class="form-control" placeholder="Nomor SK (ex: 12xxxxxxx)" id="id_sk">
                            </div>
                            <div class="form-group mb-3">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir">
                            </div>
                            <div class="form-group">
                                <label for="jns_kelamin">Jenis Kelamin</label>
                                <select class="form-control" name="jns_kelamin" id="jns_kelamin">
                                    <option value="LAKI-LAKI">Laki-Laki</option>
                                    <option value="PEREMPUAN">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="lulusan">Lulusan</label>
                                <input type="text" name="lulusan" class="form-control" placeholder="ex: Universitas Diponegoro" id="lulusan">
                            </div>
                            <div class="form-group mb-3">
                                <label for="provinsi">Provinsi</label>
                                <input type="text" name="provinsi" class="form-control" placeholder="ex: Jawa Tengah" id="provinsi">
                            </div>
                            <div class="form-group mb-3">
                                <label for="kota">Kota</label>
                                <input type="text" name="kota" class="form-control" placeholder="ex: Semarang" id="kota">
                            </div>
                            <div class="form-group mb-3">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" name="alamat" id="alamat" rows="3"></textarea>
                            </div>
                            <hr>
                            <div class="form-group mb-3">
                                <span>Upload SK Kedokteran</span>
                                <div class="custom-file mt-2">
                                    <input type="file" name="sk_dokter" class="custom-file-input" id="sk">
                                    <label class="custom-file-label" for="sk">Pilih file</label>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <span>Upload KTP</span>
                                <div class="custom-file mt-2">
                                    <input type="file" name="gambar_ktp" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Pilih file</label>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group mb-3">
                                <label for="harga">Harga Pelayanan</label>
                                <div class="input-group" id="harga">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="validatedInputGroupPrepend">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" name="harga" placeholder="ex: 150000">
                                </div>
                            </div>

                            <div class="form-group">
                                <center>
                                    <input type="submit" name="" value="Simpan dan Lanjutkan" class="btn btn-primary btn-block">
                                </center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script>
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
    </script>

</body>

</html>