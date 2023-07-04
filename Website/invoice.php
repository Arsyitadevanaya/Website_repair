<?php
require "function.php";

if (!isset($_SESSION["login_pelanggan"]) || $_SESSION["login_pelanggan"] !== true) {
    header("Location: login.php");
    exit;
}
$id = $_GET['id'];
$id_user = $_SESSION['user'];

if (isset($_POST['pesan'])) {
    if (input($_POST) > 0) {
        echo "data berhasil ditambahkan";
    }
}

$data = mysqli_query($conn, "SELECT pelanggan.id_pelanggan, user.email, pelanggan.nama, pelanggan.alamat, pelanggan.nomor_hp
                             FROM pelanggan 
                             JOIN user ON pelanggan.id_user = user.id_user 
                             WHERE user.id_user='$id_user'");

$d = mysqli_fetch_array($data);
$query = mysqli_query($conn, "SELECT pelanggan.id_pelanggan, elektronik.id_elektronik, elektronik.nama AS nama_elektronik, pemesanan.id_pemesanan,pemesanan.id_pelanggan, pemesanan.merk_tipe, pemesanan.status, pemesanan.waktu_pesan, pemesanan.tanggal_pesan 
                             FROM pemesanan 
                             JOIN elektronik ON pemesanan.id_elektronik = elektronik.id_elektronik
                             JOIN pelanggan ON pemesanan.id_pelanggan = pelanggan.id_pelanggan 
                             WHERE pemesanan.id_pemesanan = $id");

$a = mysqli_fetch_array($query);
$query = mysqli_query($conn, "SELECT  pemesanan.id_pemesanan, invoice.id_invoice,invoice.id_pemesanan,invoice.biaya_servis,invoice.biaya_komponen,invoice.nama_komponen,invoice.id_teknisi,invoice.biaya_cek,invoice.total
                             FROM invoice
                             JOIN pemesanan ON invoice.id_pemesanan = pemesanan.id_pemesanan
                             JOIN teknisi ON invoice.id_teknisi = invoice.id_teknisi 
                             WHERE pemesanan.id_pemesanan = $id");
$data_invoice = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Invoice</title>
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
    <section class="detail-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="container container-form">
                        <?php
                        if (empty($data_invoice)) {
                            ?>
                            <h5 class="_align">
                                <?php ?>
                            </h5>
                            <?php
                        } else {
                            foreach ($data_invoice as $invoice)
                            ?>
                            <div class="card">
                                <h1 class="card-title" align="center">Invoice</h1>

                                <div class="card-body">
                                    <div class="container text-left">
                                        <div class="row row-cols-4">
                                            <div class="col-3">Pengecekkan</div>
                                            <div class="col-1">:</div>
                                            <div class="col-8">
                                                <?php if ($invoice['biaya_cek'] == null) {
                                                    echo '-';
                                                } else {
                                                    echo $invoice['biaya_cek'];
                                                } ?>
                                            </div>
                                            <div class="col-3">Jasa Servis</div>
                                            <div class="col-1">:</div>
                                            <div class="col-8">
                                                <?php if ($invoice['biaya_servis'] == null) {
                                                    echo '-';
                                                } else {
                                                    echo $invoice['biaya_servis'];
                                                } ?>
                                            </div>
                                            <div class="col-3">Komponen</div>
                                            <div class="col-1">:</div>
                                            <div class="col-8">
                                                <?php echo $invoice['nama_komponen']; ?>
                                            </div>
                                            <div class="col-3">Harga Komponen</div>
                                            <div class="col-1">:</div>
                                            <div class="col-8">
                                                <?php echo $invoice['biaya_komponen']; ?>
                                            </div>
                                            <div class="col-3">Total Harga</div>
                                            <div class="col-1">:</div>
                                            <div class="col-8">
                                                <?php
                                                $biaya_cek = $invoice['biaya_cek'];
                                                $biaya_servis = floatval($invoice['biaya_servis']) + floatval($invoice['biaya_komponen']);
                                                echo $biaya_servis . '.000';
                                                ?>
                                            </div>
                                            <div class="col-3">Ulasan</div>
                                            <div class="col-1">:</div>
                                            <div class="col-8">
                                                <form action="proses_ulasan.php" method="POST">
                                                    <textarea name="ulasan" id="ulasan" required
                                                        class="ulasan" ></textarea>
                                                    <button type="submit" class="btn">Kirim Ulasan</button>
                                                </form>
                                            </div>

                                        </div>


                                    </div>
                                </div>

                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="container container-form">
                        <div class="card">
                        <h1 class="card-title" align="center">Scan <span>Me</h1></span>
                            <div class="card-body">
                                <img src="img/barcode.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
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
