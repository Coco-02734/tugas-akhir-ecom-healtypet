<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Upload SwaFoto | Healty Pet</title>
</head>

<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-6">
                <h5>Contoh swafoto yang benar</h5>
                <img src="<?php echo base_url('assets/dokter/img/') ?>pegang_ktp.png" class="img-fluid img-thumbnail rounded" width="600px" alt="">
                <div class="card mt-3">
                    <div class="card-body">
                        <h5>Ketentuan Swafoto dengan KTP</h5>
                        <p>
                            <li>Swafoto (selfie) dengan memegang KTP dengan jelas.</li>
                            <li>Pastikan KTP kamu terlihat jelas dan tidak rusak.</li>
                            <li>Berkas yang diterima adalah foto JPEH, PNG, dengan ukuran maksimal 1mb</li>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <h5>Review Swafoto kamu</h5>
                <!-- image preview -->
                <img id="output" class="img-fluid img-thumbnail rounded" width="600px" height="520px" style="max-width: 540px;">
                <div class="card mt-3">
                    <div class="card-body">
                        <h5>Silahkan upload foto anda :</h5>
                        <form action="<?= base_url('dokter/upload_proses') ?>" method="POST" enctype="multipart/form-data">
                            <input type="file" accept="image/*" onchange="loadFile(event)" name="image" required="required">
                            <h6 class="mt-3">Jika anda sudah mengunggah swafoto silahkan klik tombol "Simpan dan
                                lanjutkan" di bawah
                                ini</h6>

                    </div>
                </div>

            </div>
        </div>
        <input type="submit" name="submit" class="btn btn-primary btn-lg btn-block mt-3 mb-5" value="Simpan dan Lanjutkan">
        </form>
    </div>

    <script type="text/javascript">
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
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
</body>

</html>