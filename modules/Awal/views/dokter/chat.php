<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/d5a1baea42.js"></script>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/chat/') ?>style.css">
    <title><?= $title; ?></title>
</head>

<body id="main">
    <?php
    date_default_timezone_set("Asia/Jakarta");
    ?>
    <div class="container">

        <!-- Page header start -->
        <div class="page-title">
            <div class="row gutters">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <h5 class="title">Chat Dokter</h5>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12"> </div>
            </div>
        </div>
        <!-- Page header end -->

        <!-- Content wrapper start -->
        <div class="content-wrapper">

            <!-- Row start -->
            <div class="row gutters">

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                    <div class="card m-0">

                        <!-- Row start -->
                        <div class="row no-gutters">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-3">
                                <div class="users-container">
                                    <div class="chat-search-box">
                                        <div class="input-group">
                                            <input class="form-control" placeholder="Search">
                                            <div class="input-group-btn">
                                                <button type="button" class="btn btn-info">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="users">
                                        <li class="person" data-chat="person1">
                                            <div class="user">
                                                <img src="<?= base_url('assets/user/img/dokter/') . $datadokter['image']; ?>" alt="Retail Admin">
                                                <span class="status busy"></span>
                                            </div>
                                            <p class="name-time">
                                                <span class="name"><?= $datadokter['nama'] ?></span>
                                                <span class="badge badge-success">Berlangsung</span>
                                            </p>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-9 col-9">
                                <div class="selected-user">
                                    <span>To: <span class="name"><?= $datadokter['nama'] ?></span></span>
                                </div>
                                <div class="chat-container">
                                    <ul data-spy="scroll" class="chat-box chatContainerScroll" id="chatnya">
                                        <?php
                                        foreach ($transkip as $c) :
                                            if ($c['role'] == "PENGIRIM") {
                                        ?>
                                                <li class="chat-left">
                                                    <div class="chat-avatar">
                                                        <img src="<?= base_url('assets/user/img/dokter/') . $c['image']; ?>" alt="Retail Admin">
                                                        <div class="chat-name"><?= $c['nama'] ?></div>
                                                    </div>
                                                    <div class="chat-text">
                                                        <p><?= $c['pesan']; ?></p>
                                                    </div>
                                                    <div class="chat-hour">
                                                        <?= date('G:i', $c['time_send']); ?>
                                                        <span class="fa fa-check-circle"></span>
                                                    </div>
                                                </li>
                                            <?php } else if ($c['role'] == "PENERIMA") { ?>

                                                <li class="chat-right">
                                                    <div class="chat-hour"> <?= date('G:i', $c['time_send']); ?> <span class="fa fa-check-circle"></span></div>
                                                    <div class="chat-text">
                                                        <?= $c['pesan'] ?>
                                                    </div>
                                                    <div class="chat-avatar">
                                                        <img src="<?= base_url('assets/user/img/profil/') . $c['image']; ?>" alt="Retail Admin">
                                                        <div class="chat-name"><?= $c['nama'] ?></div>
                                                    </div>
                                                </li>
                                        <?php
                                            }
                                        endforeach;
                                        ?>
                                    </ul>
                                    <div class="form-group mt-3 mb-0">

                                        <div class="row">
                                            <div class="col-lg-10">
                                                <input type="hidden" name="id_transaksi" id="id_transaksi" value="<?= $id_trans; ?>">
                                                <input type="hidden" name="id_user" id="id_user" value="<?= $user['id']; ?>">
                                                <input type="text" id="pesan" class="form-control" placeholder="Ketikan Pesan..." name="pesan" required>
                                            </div>
                                            <div class="col-lg-2">
                                                <button id="kirim" class="btn btn-primary">Kirim</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Row end -->
                    </div>

                </div>

            </div>
            <!-- Row end -->

        </div>
        <!-- Content wrapper end -->

    </div>

</body>



<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="<?= base_url('assets/user/') ?>vendor/jquery/jquery.min.js"></script>
<script src="https://use.fontawesome.com/d5a1baea42.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
</script>

<script>
    $('#kirim').on('click', function() {
        var idTrans = $('#id_transaksi').val();
        var idUser = $('#id_user').val();
        var pesan = $('#pesan').val();

        $.ajax({
            url: "<?= base_url('awal/dokter/kirim_pesan'); ?>",
            type: 'post',
            data: {
                idTrans: idTrans,
                idUser: idUser,
                pesan: pesan,
                role: "PENERIMA"
            },
            success: function() {
                $('#main').load("<?= base_url('awal/dokter/chat/') . $id_trans ?>");
            }
        })
    });
</script>


</body>

</html>