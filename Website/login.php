<?php
require "function.php";



if (isset($_SESSION["login_pelanggan"])) {
    header("Location: home.php");
    exit;
}
$loginResult = ""; // Initialize the variable
$email_salah = "";
$password_salah = "";
if (isset($_POST['masuk'])) {
    $loginResult = login($_POST);
    // Use the $loginResult as needed
    if ($loginResult === "Email salah") {
        // Handle login failure
        $email_salah = "Email Salah, masukkan kembali email yang benar.";
    } elseif ($loginResult === "Password salah") {
        $password_salah = "Password Salah, masukkan kembali password yang benar.";

    }
}
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    $result = mysqli_query($conn, "SELECT email FROM user WHERE user_id = '$id'");
    $row = mysqli_fetch_assoc($result);

    // cek cookie
    if ($key === hash('sha256', $row['email'])) {

        $_SESSION["login_pelanggan"] = true;
    }
}

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Login</title>
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
    <link rel="stylesheet" href="css/style1.css" />




    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        .card-body.login-failed {
            background-color: #f8d7da;
            padding: 10px;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
            text-align: center;
        }

        .card-body.login-failed h6 {
            color: #721c24;
            font-size: 18px;
            font-weight: bold;
            margin: 0;
        }

        .card-body.login-failed p {
            color: #721c24;
            font-size: 10px;
            font-weight: bold;
            margin: 0;
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
    <section class="login-section spad">
        <div class="container container-form">
            <div class="card">

                <h1 class="card-title" align="center">Login</h1>
                <?php
                if ($email_salah || $password_salah) { 
                ?>
                <div class="card-body login-failed">
                    <?php if (!empty($email_salah)) { ?>
                        <h6 align="center">Login Gagal!</h6>
                        <p>
                            <?php echo $email_salah; ?>
                        </p>
                    <?php } elseif (!empty($password_salah)) { ?>
                        <h6 align="center">Login Gagal!</h6>
                        <p>
                            <?php echo $password_salah; ?>
                        </p>
                    <?php } ?>
                </div>
                <?php }?>

                <div class="card-body">
                    <form action="#" method="post">
                        <input type="text" class="form-control" id="merekInput" placeholder="Email" autocomplete="off"
                            name="email">
                        <br>
                        <div class="wrapper">
                            <input type="password" name="password" class="form-control" placeholder="Enter Password"
                                required>
                            <span class="show-btn"><i class="fa fa-eye-slash"></i></span>
                        </div>
                        <p style="text-align: right;"><a href="lupa_password.php">Forgot Password?</a></p>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="cekbox">
                            <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                            <input type="submit" value="Login" name="masuk"><br><br>
                        </div><br>
                        <p align="center">Belum Memiliki Akun? <a href="registrasi.php">Registrasi</a></p>
                    </form>
                </div>
            </div>
        </div>

    </section>
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
    <script>
        const passField = document.querySelector("input[type='password']");
        const showBtn = document.querySelector("span.show-btn");

        showBtn.addEventListener("click", function () {
            if (passField.type === "password") {
                passField.type = "text";
                showBtn.innerHTML = "<i class='fa fa-eye'></i>";
            } else {
                passField.type = "password";
                showBtn.innerHTML = "<i class='fa fa-eye-slash'></i>";
            }
        });
    </script>

</body>

</html>
