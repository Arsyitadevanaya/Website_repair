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
$query = mysqli_query($conn, "SELECT pelanggan.id_pelanggan, elektronik.id_elektronik, elektronik.nama AS nama_elektronik, pemesanan.id_pemesanan,pemesanan.id_pelanggan, pemesanan.merk_tipe, pemesanan.status, pemesanan.waktu_pesan, pemesanan.tanggal_pesan, pemesanan.id_teknisi, teknisi.id_teknisi,teknisi.nama AS nama_teknisi
                             FROM pemesanan 
                             JOIN elektronik ON pemesanan.id_elektronik = elektronik.id_elektronik
                             JOIN pelanggan ON pemesanan.id_pelanggan = pelanggan.id_pelanggan 
                             LEFT JOIN teknisi ON pemesanan.id_teknisi = teknisi.id_teknisi
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
    <title>Detail Pemesanan</title>
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
        @media (max-width: 768px) {
            .card h2 {
                font-size: 30px;
            }
        }

        .detail-section .button {
            font-family: 'K2D', sans-serif;
            font-weight: 500;
            color: #FFFFFF;
            font-size: 20px;
            border-radius: 50px;
            text-align: center;
            width: 50%;
        }

        .button-container a input[type="button"] {
            background-color: #f0aa42;
            /* Ganti dengan warna yang Anda inginkan */
            font-size: 14px;
            font-weight: bold;

        }

        .wa_btn {
            position: fixed;
            right: 30px;
            bottom: 50px;
            text-decoration: none;
            color: black;
            background-color: rgb(35, 243, 16);
            padding: 10px 20px;
            border-radius: 13px;
            display: flex;
            justify-content: center;
            align-items: center;
            /* Tambahkan z-index dengan nilai tinggi */
            z-index: 9999;
        }

        .wa_btn i {
            font-size: 60px;
            padding: 0 10px;
            background-color: rgb(35, 243, 16);
            border-radius: 50%;
            height: 80px;
            width: 80px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            right: 150px;
            color: white;
        }

        .wa_btn span {
            color: white;
        }

        @media (min-width: 260px) and (max-width: 920px){
        .col-lg-7 .card .card-body .container .button {
            font-size: 12px;
            width: 90px;
        }
    }

    
        @media (max-width: 576px) {
            .wa_btn {
                background-color: transparent;
            }

            .wa_btn span {
                display: none;
            }

            .wa_btn i {
                right: 0;
            }

           

            .card .card-body .container {
                font-size: 10px;

            }

            ._status {
                display: flex;
                align-items: left;
                justify-content: left;
                padding: 0px;


            }

            .button {
                text-align: center;
                white-space: nowrap;
                padding: 0px;
                width: 100px;
            }


        }

        .button._diterima {
            background-color: #ffa011;
            border: 4px solid #ffa011;

            /* Atau gunakan kode HEX warna yang sesuai */
        }

        .button._dibatalkan {
            background-color: #ff0000;
            border: 4px solid #ff0000;

            /* Atau gunakan kode HEX warna yang sesuai */
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
                    <a href="login.php" class="login">Login</a><span>|</span>
                    <a href="registrasi.php" class="register">Create an account</a>
                <?php } else { ?>
                    <a href="profil.php" class="login">Profil</a><span>|</span>
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
            <li><a href="#footer">Contact</a></li>
        </ul>

    </header>

    <!-- Header section end -->

    <!-- Intro section -->
    <section class="detail-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mb-4 mb-lg-0">
                    <div class="container container-form">
                        <div class="card">
                            <h2 class="card-title" align="center">Biodata</h2>
                            <div class="card-body">
                                <div class="container text-left">
                                    <div class="row row-cols-4">
                                        <div class="col-5">Nama</div>
                                        <div class="col-1">:</div>
                                        <div class="col-6">
                                            <?php echo $d['nama']; ?>
                                        </div>
                                        <div class="col-5">Email</div>
                                        <div class="col-1">:</div>
                                        <div class="col-6">
                                            <?php echo $d['email']; ?>
                                        </div>
                                        <div class="col-5">No HP</div>
                                        <div class="col-1">:</div>
                                        <div class="col-6">
                                            <?php echo $d['nomor_hp']; ?>
                                        </div>
                                        <div class="col-5">Alamat</div>
                                        <div class="col-1">:</div>
                                        <div class="col-6">
                                            <?php echo $d['alamat']; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-7 mb-4 mb-lg-0">
                    <div class="container container-form">
                        <div class="card">
                            <h2 class="card-title" align="center"><span>Riwayat</span> Pemesanan</h2>
                            <div class="card-body">
                                <div class="container text-left">
                                    <div class="row row-cols-4">
                                        <div class="col-5 ">Status</div>
                                        <div class="col-1">:</div>
                                        <div class="col-6 _status">
                                            <?php if ($a['status'] == 'berhasil') { ?>
                                                <div class="button _berhasil">
                                                    <?php echo $a['status']; ?>
                                                </div>
                                            <?php } elseif ($a['status'] == 'menunggu') { ?>
                                                <div class="button _menunggu">
                                                    <?php echo $a['status']; ?>
                                                </div>
                                            <?php } elseif ($a['status'] == 'berlangsung') { ?>
                                                <div class="button _berlangsung">
                                                    <?php echo $a['status']; ?>
                                                </div>
                                            <?php } elseif ($a['status'] == 'diterima') { ?>
                                                <div class="button _diterima">
                                                    <?php echo $a['status']; ?>
                                                </div>
                                            <?php }elseif ($a['status'] == 'dibatalkan') { ?>
                                                <div class="button _dibatalkan">
                                                    <?php echo $a['status']; ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="col-5">Tanggal</div>
                                        <div class="col-1">:</div>
                                        <div class="col-6">
                                            <?php echo date("d M Y", strtotime($a['tanggal_pesan'])); ?>
                                        </div>
                                        <div class="col-5">Waktu</div>
                                        <div class="col-1">:</div>
                                        <div class="col-6">
                                            <?php echo date("H:i", strtotime($a['waktu_pesan'])); ?> WIB
                                        </div>
                                        <div class="col-5">Jenis Barang</div>
                                        <div class="col-1">:</div>
                                        <div class="col-6">
                                            <?php echo $a['nama_elektronik']; ?>
                                        </div>
                                        <div class="col-5">Merek dan Tipe</div>
                                        <div class="col-1">:</div>
                                        <div class="col-6">
                                            <?php echo $a['merk_tipe']; ?>
                                        </div>
                                        <div class="col-5">Teknisi</div>
                                        <div class="col-1">:</div>
                                        <div class="col-6">
                                            <?php if ($a['nama_teknisi'] == NULL) {
                                                echo '-';
                                            } else {
                                                echo $a['nama_teknisi'];
                                            } ?>
                                        </div>
                                        <div class="col-5">Harga</div>
                                        <div class="col-1">:</div>
                                        <div class="col-6">
                                            <?php
                                            if (empty($data_invoice)) {
                                                echo '-';
                                            } else {
                                                ?>
                                                <div class="button-container _invoice">
                                                    <a href="invoice.php?id=<?php echo $a['id_pemesanan']; ?>"> <input
                                                            type="button" value="Invoice"></a>
                                                </div>

                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>

    </section>
    <!-- Intro section end -->
    <!-- Whatsapp section  -->
    <a class="wa_btn" href="https://wa.me/6285175002568"><i class="fa fa-whatsapp fa-2xl"></i> <span> Chat
            WhatsApp</span> </a>
    <!-- Whatsapp section end -->
    <!-- Footer section -->
    <footer id="footer" class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-5 order-lg-1">
                    <img src="img/logo_repair.png" alt="">
                </div>
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
