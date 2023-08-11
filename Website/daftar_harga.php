<?php
require "function.php";
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Daftar Harga</title>
    <meta charset="UTF-8">
    <meta name="description" content="SolMusic HTML Template">
    <meta name="keywords" content="music, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link href="img/favicon_repair.png" rel="shortcut icon" />

    <!-- Google font -->
    <link
        href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap"
        rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@200&family=K2D:wght@800&display=swap"
		rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/slicknav.min.css" />

    <!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css" />




    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        header {
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);

        }
        .img-fluid {
            max-width: 100%;
            height: auto;
        }

        @media (max-width: 768px) {
            .teks-home h1 {
                font-size: 35px;
            }
        }

        @media (min-width: 769px) and (max-width: 992px) {
            .teks-home h1 {
                font-size: 48px;
            }
        }

        @media (min-width: 993px) {
            .teks-home h1 {
                font-size: 70px;
            }
        }


        .btn {
            background-color: #212121;
            color: white;
            border-radius: 10px;
            cursor: pointer;
        }

        .btn:hover {
            border-color: #000000;
            background-color: #ededed;
        }

        .judul-id {
            font-family: 'K2D', sans-serif;
            font-style: normal;
            font-weight: 700;
            font-size: 50px;
            line-height: 104px;
            text-align: center;
            color: #000000;
        }

        @media (max-width: 768px) {
            .judul-id {
                font-size: 30px;
            }
        }

        @media (min-width: 769px) and (max-width: 992px) {
            .judul-id {
                font-size: 40px;
            }
        }

        @media (min-width: 993px) {
            .judul-id {
                font-size: 50px;
            }
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .card-content {
            padding: 20px;
            text-align: center;
        }

        .card-title {
            font-size: 24px;
        }

        .card-image {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }

        .card-image img {
            display: flex;
            max-width: 100%;
            max-height: 150px;
            object-fit: contain;
        }

        .card-price {
            font-weight: bold;
        }

        .card {
            max-width: 1100px;
            height: auto;
            background: #ffffff;
            border-radius: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 10px 10px 18px 0px rgba(112, 112, 112, 0.75);
            -webkit-box-shadow: 10px 10px 18px 0px rgba(112, 112, 112, 0.75);
            -moz-box-shadow: 10px 10px 18px 0px rgba(112, 112, 112, 0.75);
            transition: box-shadow 0.3s;
        }

        .card:hover {
            box-shadow: 0px 0px 30px 1px rgba(0, 0, 0, 0.25);
        }

        .card button {
            background: white;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 20px;
            color: #000000;
        }

        .card button:hover {
            color: #000000;
            background-color: #D9D9D9;
            border-color: #D9D9D9;
        }


        #daftar_harga .card {
            width: 1100px;
            height: auto;
            background-color: white;
            box-shadow: 10px 10px 18px 0px rgba(112, 112, 112, 0.75);
            -webkit-box-shadow: 10px 10px 18px 0px rgba(112, 112, 112, 0.75);
            -moz-box-shadow: 10px 10px 18px 0px rgba(112, 112, 112, 0.75);
        }

        #daftar_harga .card-title {
            margin-top: 40px;
            margin-bottom: 40px;
            padding-top: 15px;
            padding-bottom: 15px;
            background-color: #212121;
            color: white;
            max-width: 100%;
            border-radius: 30px;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            align-items: center;
            text-align: center;
            position: relative;
            display: inline-block;
            padding: 10px 110px;
        }


        #daftar_harga .card-head {
            margin-bottom: 20px;
            width: 200px;
            height: 200px;
            background: #D9D9D9;
            border-radius: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #daftar_harga .col {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .daftar_harga,
        .daftar_harga td {
            text-align: justify;
            color: #8f8f8f;
        }

        #daftar_harga .whatsapp-button {
            text-decoration: none;
            color: #ffffff;
            background-color: #212121;
            font-size: 30px;
            border: 2px solid #f0f0f0;
            padding: 15px 50px;
            cursor: pointer;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 30px;
            margin-top: 100px;
            margin-bottom: 40px;
            text-align: center;
            display: inline-block;
        }

        #daftar_harga .whatsapp-button:hover {
            color: #000000;
            background-color: #ededed;
            border-color: #D9D9D9;
        }

        .title h1 {
            font-family: 'K2D', sans-serif;
            font-style: normal;
            font-weight: 700;
            font-size: 50px;
            line-height: 104px;
            /* identical to box height */
            text-align: center;
        }

        .title h3 {
            font-family: 'K2D', sans-serif;
            font-weight: 300;
            font-size: 30px;
            text-align: center;
            color: #000000;
        }

        /* Style for the note section */
        .note-section {
            margin-top: 20px;
            border-top: 1px;
            padding-top: 20px;
        }

        /* Style for the note title */
        .note-title {
            font-size: 24px;
            font-weight: bold;
        }

        /* Style for the note list */
        .note-list {
            list-style-type: disc;
            padding-left: 20px;
        }


    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header section -->
    <header class="header-section clearfix">
        <a href="index.html" class="site-logo">
            <img src="img/logo_repair.png" alt="">
        </a>

        <div class="header-right">
            <div class="user-panel">
                <?php if (!isset($_SESSION["login_pelanggan"]) || $_SESSION["login_pelanggan"] !== true) { ?>
                    <a href="login.php" class="hr-btn">Login</a><span>|</span>
                    <a href="registrasi.php" class="register">Create an account</a>
                <?php } else { ?>
                    <a href="profil.php" class="hr-btn">Profil</a><span>|</span>
                    <a href="keluar.php" class="register">Keluar</a>
                <?php } ?>
            </div>
        </div>
        <ul class="main-menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php">About</a></li>
            <li><a href="#">Pemesanan</a>
                <ul class="sub-menu">
                    <li><a href="pesan.php">Pesan</a></li>
                    <li><a href="riwayat_pemesanan.php">Riwayat Pemesanan</a></li>
                    <li><a href="daftar_harga.php">Daftar Harga</a></li>
                </ul>
            </li>
            <li><a href="contact.php">Contact</a></li>
        </ul>

    </header>

    <!-- Header section end -->


    <!-- Intro section end -->

    <section class="harga-section spad">

        <div id="daftar_harga" class="py-2">
            <div class="container">
                <div class="text-center mb-4">
                    <h2 class="judul-id">Daftar Harga</h2>
                </div>
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    <div class="col mb-4">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <h3 class="card-title">Television</h3>
                                <div class="row">
                                    <div class="col-lg-5"> <!-- Adjust column widths here -->
                                        <div class="card-head mx-auto">
                                            <img src="img/televisi.png" alt="" width="180px">
                                        </div>
                                    </div>
                                    <div class="col-lg-6"> <!-- Adjust column widths here -->
                                        <h4>Biaya</h4>
                                        <div class="daftar_harga">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td><i class="fa-sharp fa-solid fa-circle-check text-muted"></i></td>
                                                        <td>Jasa Pengecekan</td>
                                                        <td>Rp 65.000</td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fa-sharp fa-solid fa-circle-check text-muted"></i></td>
                                                        <td>Jasa Service Kerusakan Ringan Tanpa Biaya Pergantian Komponen TV</td>
                                                        <td>Rp 50.000 - Rp 150.000</td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fa-sharp fa-solid fa-circle-check text-muted"></i></td>
                                                        <td>Jasa Service Kerusakan Sedang-Berat Beserta Biaya Pergantian Komponen TV</td>
                                                        <td>Rp 150.000 - Rp 600.000</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <h3 class="card-title" style="align-items: center;">Kulkas</h3>
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="card-head mx-auto">
                                            <img src="img/kulkas.png" alt="" width="180px">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <h4>Biaya</h4>
                                        <div class="daftar_harga">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td><i class="fa-sharp fa-solid fa-circle-check text-muted"></i></td>
                                                        <td>Jasa Pengecekan</td>
                                                        <td>Rp 65.000</td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fa-sharp fa-solid fa-circle-check text-muted"></i></td>
                                                        <td>Jasa Service Kerusakan Ringan Tanpa Biaya Pergantian Komponen Kulkas</td>
                                                        <td>Rp 50.000 - Rp 150.000</td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fa-sharp fa-solid fa-circle-check text-muted"></i></td>
                                                        <td>Jasa Service Kerusakan Sedang-Berat Beserta Biaya Pergantian Komponen Kulkas</td>
                                                        <td>Rp 150.000 - Rp 600.000</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <h3 class="card-title">Mesin Cuci</h3>
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="card-head mx-auto">
                                            <img src="img/mesin cuci.png" alt="" width="200px">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <h4>Biaya</h4>
                                        <div class="daftar_harga">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td><i class="fa-sharp fa-solid fa-circle-check text-muted"></i></td>
                                                        <td>Jasa Pengecekan</td>
                                                        <td>Rp 65.000</td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fa-sharp fa-solid fa-circle-check text-muted"></i></td>
                                                        <td>Jasa Service Kerusakan Ringan Tanpa Biaya Pergantian Komponen Mesin Cuci</td>
                                                        <td>Rp 50.000 - Rp 150.000</td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fa-sharp fa-solid fa-circle-check text-muted"></i></td>
                                                        <td>Jasa Service Kerusakan Sedang-Berat Beserta Biaya Pergantian Komponen Mesin Cuci</td>
                                                        <td>Rp 150.000 - Rp 600.000</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <h3 class="card-title">Air Conditioner</h3>
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="card-head mx-auto">
                                            <img src="img/ac.png" alt="" width="180px">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <h4>Biaya</h4>
                                        <div class="daftar_harga">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td><i class="fa-sharp fa-solid fa-circle-check text-muted"></i></td>
                                                        <td>Jasa Pengecekan</td>
                                                        <td>Rp 65.000</td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fa-sharp fa-solid fa-circle-check text-muted"></i></td>
                                                        <td>Jasa Service Kerusakan Ringan Tanpa Biaya Pergantian Komponen AC</td>
                                                        <td>Rp 50.000 - Rp 150.000</td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fa-sharp fa-solid fa-circle-check text-muted"></i></td>
                                                        <td>Jasa Service Kerusakan Sedang-Berat Beserta Biaya Pergantian Komponen AC</td>
                                                        <td>Rp 150.000 - Rp 600.000</td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fa-sharp fa-solid fa-circle-check text-muted"></i></td>
                                                        <td>Cuci AC</td>
                                                        <td>Rp 100.000</td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fa-sharp fa-solid fa-circle-check text-muted"></i></td>
                                                        <td>Isi Ulang Freon</td>
                                                        <td>Rp 250.000 - Rp 550.000</td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fa-sharp fa-solid fa-circle-check text-muted"></i></td>
                                                        <td>Tambah Freon</td>
                                                        <td>Rp 150.000 - Rp 400.000</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="note-section">
                    <p class="note-title">Note:</p>
                    <ul class="note-list">
                        <li>Untuk kerusakan ringan beserta dengan biaya komponen jika terjadi pergantian</li>
                        <li>Untuk kerusakan sedang-berat tidak disertakan biaya komponen jika terjadi pergantian</li>
                        <li>Untuk semua harga menyesuaikan dengan jenis dan tipe elektronik</li>
                    </ul>
                </div>

                <div class="d-flex justify-content-center">
                    <a href="https://wa.me/6285175002568" target="_blank" class="whatsapp-button">
                        Harga Selengkapnya
                    </a>
                </div>
            </div>
        </div>

    </section>


    <!-- Footer section -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-7 order-lg-2">
                    <div class="footer-widget">
                        <h2>Contact Us</h2>
                        <ul class="contact-list">
                            <li><a href="https://wa.me/6285175002568" target="_blank"><i class="fa fa-whatsapp"
                                        style="color: #25D366;"></i></a> +62 851-7500-2568</li>
                            <li><a href="https://www.instagram.com/repairlectric" target="_blank"><i
                                        class="fa fa-instagram" style="color: #C13584;"></i></a> repairlectric</li>
                            <li><a href="mailto:repairlectric@gmail.com" target="_blank"><i class="fa fa-envelope"
                                        style="color: #007BFF;"></i></a> repairlectric@gmail.com</li>
                        </ul>
                    </div>

                </div>
                <div class="col-xl-6 col-lg-5 order-lg-1">
                    <img src="img/logo_repair.png" alt="">
                </div>
            </div>

        </div>
        <div class="copyright">
			<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
			Copyright &copy;
			<script>document.write(new Date().getFullYear());</script> by RepairLectric</a>
			<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
		</div>
    </footer>
    <!-- Footer section end -->

    <!--====== Javascripts & Jquery ======-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>
