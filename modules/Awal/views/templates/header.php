<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $title; ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">


    <link href="<?= base_url('assets/user') ?>/img/favicon-simul.png" rel="icon">
    <link href="<?= base_url('assets/user') ?>/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- midtrans konfigurasi -->
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-6Ms3zdsyvRWlcSrC"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- midtrans konfigurasi -->

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('assets') ?>/flickity.min.css">
    <link href="<?= base_url('assets/user') ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/user') ?>/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/user') ?>/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/user') ?>/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/user/') ?>vendor/venobox/venobox.css" rel="stylesheet">
    <link href="<?= base_url('assets/user/') ?>vendor/aos/aos.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/d5a1baea42.js"></script>
    <link href="<?= base_url('assets/user/') ?>css/style.css" rel="stylesheet">
    <style>
        .file {
            position: relative;
            display: block;
            margin-left: 210px;
            margin-right: auto;
            margin-top: -35%;
            margin-bottom: 15%;
            width: 40%;
            border: none;
            border-radius: 0;
            font-size: 15px;
            background: #517BDC;
        }

        .file input {
            position: absolute;
            opacity: 0;
            right: 0;
            top: 0;
        }

        .profile-area {
            margin-top: -80px;
        }

        .profile-area .card {
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
            overflow: hidden;
            margin-top: 15px;
            border-radius: 15px;
        }

        .img1 {
            height: 170px;
            border-top-right-radius: 15px;
            border-top-left-radius: 15px;
            width: 100%;
        }

        .img2 {
            position: relative;
            display: block;
            margin-left: auto;
            margin-right: auto;
            z-index: 1;
            width: 140px;
            height: 140px;
            border-radius: 100px;
            border: 7px solid #fff;
            margin-top: -80px;
        }

        .profile-area .card:hover .img2 {
            border-color: #1F5485;
            transition: .7s;
        }

        .main-text {
            padding: 30px 0;
            text-align: center;
        }

        .main-text h2 {
            text-transform: uppercase;
            font-weight: 900;
            font-size: 20px;
            margin: 0 0 20px;
        }

        .main-text p {
            font-size: 16px;
            padding: 0 15px;
            margin-top: -35px;
        }

        .socials {
            text-align: center;
            padding-bottom: 20px;
        }

        .socials i {
            font-size: 20px;
            padding: 0 10px;
        }

        .keterangan-dokter {
            margin-left: -120px;
        }

        .kotak {
            margin: 20px;
        }

        @media (max-width: 762px) {
            .keterangan-dokter {
                margin-left: 0px;
            }

            .keterangan-dokter img {
                width: 30px;
            }

            .keterangan-dokter p {
                font-size: 11px;
            }
        }

        .riwayat .card {
            z-index: 0;
            padding-bottom: 20px;
            margin-bottom: 90px;
            border-radius: 10px
        }

        .riwayat .top {
            padding-top: 40px;
            padding-left: 13% !important;
            padding-right: 13% !important
        }

        .riwayat #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            color: #455A64;
            padding-left: 0px;
            margin-top: 30px
        }

        .riwayat #progressbar li {
            list-style-type: none;
            font-size: 13px;
            width: 25%;
            float: left;
            position: relative;
            font-weight: 400
        }

        .riwayat #progressbar .step0:before {
            font-family: FontAwesome;
            content: "\f10c";
            color: #fff
        }

        .riwayat #progressbar li:before {
            width: 40px;
            height: 40px;
            line-height: 45px;
            display: block;
            font-size: 20px;
            background: #C5CAE9;
            border-radius: 50%;
            margin: auto;
            padding: 0px
        }

        .riwayat #progressbar li:after {
            content: '';
            width: 100%;
            height: 12px;
            background: #C5CAE9;
            position: absolute;
            left: 0;
            top: 16px;
            z-index: -1
        }

        .riwayat #progressbar li:last-child:after {
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
            position: absolute;
            left: -50%
        }

        .riwayat #progressbar li:nth-child(2):after,
        .riwayat #progressbar li:nth-child(3):after {
            left: -50%
        }

        .riwayat #progressbar li:first-child:after {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
            position: absolute;
            left: 50%
        }

        .riwayat #progressbar li:last-child:after {
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px
        }

        .riwayat #progressbar li:first-child:after {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px
        }

        .riwayat #progressbar li.active:before,
        .riwayat #progressbar li.active:after {
            background: #651FFF
        }

        .riwayat #progressbar li.active:before {
            font-family: FontAwesome;
            content: "\f00c"
        }

        .riwayat .icon {
            width: 100px;
            height: 100px;
            margin-right: 15px
        }

        .riwayat .icon-content {
            padding-bottom: 20px
        }

        @media screen and (max-width: 992px) {
            .riwayat .icon-content {
                width: 50%
            }
        }
    </style>
</head>

<html>


<header id="header" class="fixed-top  header-transparent ">
    <div class="container d-flex align-items-center">

        <div class="logo mr-auto">
            <img src="<?= base_url('assets/user/img/') ?>logo.png" class="img-fluid">
        </div>


        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class="active"><a href="<?= base_url('awal') ?>">Home</a></li>
                <li><a href="<?= base_url('awal/berita'); ?>">Atikel</a></li>
                <?php if ($user) { ?>
                    <li><a href="<?= base_url('awal/user/riwayat'); ?>">Riwayat</a></li>
                <?php } else { ?>
                    <li><a href="#" id="login">Riwayat</a></li>
                <?php } ?>
                <!-- <li><a href="#pricing">Pricing</a></li> -->
                <li><a href="#faq">F.A.Q</a></li>
                <!-- <li><a href="#contact">Kontak Kami</a></li> -->
            </ul>
        </nav>
        <?php if ($user) { ?>
            <button class="btn">
                <a href="<?= base_url('awal/user'); ?>" class="btn text-dark">
                    <img src="<?= base_url('assets/user/img/profil/') . $user['image']; ?>" class="img-fluid rounded-circle" width="30px" alt="">
                    <span class="ml-2" maxlength="10">Hi,
                        <?php
                        if (str_word_count($user['nama']) < 5) {
                            echo substr($user['nama'], 0, -6) . "...";
                        } else {
                            echo substr($user['nama'], 0, -6);
                        }
                        ?>
                    </span>
                </a>
            </button>
            <a href="<?= base_url('awal/user/keranjang'); ?>">
                <i class="fa fa-shopping-cart fa-2x"></i>
            </a>
            <span class="badge badge-secondary ml-2"><?= $jml_cart['jml']; ?></span>
        <?php } else { ?>
            <div class="get-started"><a href="#" id="loginns">Login</a></div>
        <?php } ?>
    </div>
</header>