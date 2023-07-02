<?php
require "function.php";

if (!isset($_SESSION["login_pelanggan"]) || $_SESSION["login_pelanggan"] !== true) {
    header("Location: login.php");
    exit;
}

$id_pelanggan = $_SESSION['pelanggan'];
$status = "Proses";

if (isset($_POST['pesan'])) {
    if (input($_POST) > 0) {
        echo "data berhasil ditambahkan";
    }
}
$query = mysqli_query($conn, "SELECT pelanggan.id_pelanggan, elektronik.id_elektronik, elektronik.nama AS nama_elektronik, pemesanan.id_pemesanan,pemesanan.id_pelanggan, pemesanan.merk_tipe, pemesanan.status, pemesanan.waktu_pesan, pemesanan.tanggal_pesan 
                             FROM pemesanan 
                             JOIN elektronik ON pemesanan.id_elektronik = elektronik.id_elektronik
                             JOIN pelanggan ON pemesanan.id_pelanggan = pelanggan.id_pelanggan 
                             WHERE pelanggan.id_pelanggan = $id_pelanggan
                             ORDER BY pemesanan.id_pemesanan DESC");
$data_array = mysqli_fetch_all($query, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Riwayat Pemesanan</title>
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
    .riwayat-section p {
        margin-bottom: 10px;
        padding-top: 10px;
    }

    .col-3, .col-4, .col-6, .col-12 {
        margin: 0px;
        padding: 0px;
    }

    .riwayat-section .main {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        color: white;
    }

    .riwayat-section .card {
        width: calc(50% - 10px);
        /* Atur lebar card sesuai kebutuhan */
        margin-bottom: 20px;
        /* Atur jarak antara card */
        background: #000000;
        backdrop-filter: blur(2px);
        height: 100%;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    }

    @media (max-width: 768px) {
        .riwayat-section .card {
            width: 100%;
        }
    }

    .riwayat-section h2 {
        font-family: 'K2D', sans-serif;
        font-size: 50px;
        color: white;
    }

    .riwayat-section footer {
        margin-top: 50px;
    }

    span {
        color: white;
    }

    .riwayat-section ._tanggalJam {
        display: flex;
        justify-content: center;
        align-items: center;
        color: #CD1818;
    }

    .riwayat-section ._26 {
        font-family: 'K2D', sans-serif;
        font-weight: 500;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        font-size: 40px;
        color: white;
    }

    .riwayat-section .mei-2023 {
        display: flex;
        align-items: center;
        /* Memusatkan secara vertikal */
        justify-content: center;
        font-size: 15px;
        color: white;
    }

    .riwayat-section ._10-00-wib {
        display: flex;
        justify-content: center;
        font-weight: 100;
        font-size: 15px;
        color: white;
    }

    .riwayat-section .card .col-12 {
        text-align: left;
    }

    .riwayat-section .col-6 {
        display: flex;
        align-items: center;
        /* Memusatkan secara vertikal */
    }

    .riwayat-section ._jenis {
        font-family: 'K2D', sans-serif;
        font-size: 30px;
        color: #CD1818;
    }

    .riwayat-section ._detailProses {
        display: flex;
        align-items: center;
        color: white;
    }

    .riwayat-section .button {
        font-family: 'K2D', sans-serif;
        font-weight: 500;
        color: FFFF00;
        background-color: #f0aa42;
        font-size: 20px;
        border-radius: 50px;
        border: 4px solid #f0aa42;
        text-align: center;
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

    <!-- Riwayat section -->
    <section class="riwayat-section spad">
        <div class="container-fluid">

            <div class="main">
                <?php
                if (empty($data_array)) {
                    ?>
                <h5 class="_align">
                    <?php echo "Pemesanan Belum Tersedia !"; ?>
                </h5>
                <?php
                } else {
                    foreach ($data_array as $d) {
                        ?>
                <div class="card">
                    <div class="card-body">
                        <div class="container text-center">
                            <div class="row">
                                <div class="col-3 _tanggalJam">
                                    <div class="container">
                                        <div class="row row-cols-2">
                                            <div class="col-6 _26">
                                                <?php echo date("d", strtotime($d['tanggal_pesan'])); ?>
                                            </div>
                                            <div class="col-6 mei-2023">
                                                <?php echo date("M", strtotime($d['tanggal_pesan'])); ?><br>
                                                <?php echo date("Y", strtotime($d['tanggal_pesan'])); ?>
                                            </div>
                                            <div class="col-12 _10-00-wib">
                                                <?php echo date("H:i", strtotime($d['waktu_pesan'])); ?> WIB
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-5">
                                    <div class="container">
                                        <div class="row row-cols-2">
                                            <div class="col-12 _jenis">
                                                <?php echo $d['nama_elektronik']; ?>
                                            </div>
                                            <div class="col-12 _tipe">
                                                <?php echo $d['merk_tipe']; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 _detailProses">
                                    <div class="container">
                                        <div class="row row-cols-2">
                                            <div class="col-12 ">
                                                <div class="button">
                                                    <?php echo $d['status']; ?>
                                                </div>
                                            </div>
                                            <div class="col-12" style="text-align: end; padding: 20px;">
                                                Detail
                                                <a href="detail_pemesanan.php?id=<?php echo $d['id_pemesanan']; ?>">
                                                    <img src="img/icons/next.png" alt=""> </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
        </div>

    </section>
    <!-- Intro section end -->


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
            <script>
            document.write(new Date().getFullYear());
            </script> by RepairLectric</a>
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
