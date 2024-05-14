<?php
session_start();
?>
<html class="no-js" lang="zxx">

<?php
$orphanage_email = "";
if (isset($_SESSION["orphanage_email"]) && !empty($_SESSION["orphanage_email"])) {
    $orphanage_email = $_SESSION["orphanage_email"];
}
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Child Abuse | Child Kidnap</title>
    <meta name="description" content>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.html">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/progressbar_barfiller.css">
    <link rel="stylesheet" href="assets/css/gijgo.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/animated-headline.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/loder.png" alt>
                </div>
            </div>
        </div>
    </div>

    <header>

        <div class="header-area">
            <div class="main-header ">
                <div class="header-top d-none d-lg-block">
                    <div class="container-fluid">
                        <div class="col-xl-12">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="header-info-left d-flex">
                                    <ul>
                                        <li>Phone: 080827987**</li>
                                        <li>Email: akila@gmail.com</li>
                                    </ul>
                                    <div class="header-social">
                                        <ul>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="https://www.facebook.com/sai4ull"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                            <li> <a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom  header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">

                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <a href="home.php"><img src="assets/img/logo/download-1.png" alt></a>
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-10">
                                <div class="menu-wrapper  d-flex align-items-center justify-content-end">

                                    <div class="main-menu d-none d-lg-block">
                                        <nav>
                                            <ul id="navigation">
                                                <li><a href="home.php">Home</a></li>
                                                <li><a href="about.php">About</a></li>
                                                <li><a href="orphanage_cases.php">Orphanage Cases</a></li>
                                                <li><a href="cases.php">Cases</a>
                                                    <ul class="submenu">
                                                        <li><a href="cases.php?q=kidnap">Kidnap</a></li>
                                                        <li><a href="cases.php?q=abuse">Abuse</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="cases.php">Report</a>
                                                    <ul class="submenu">
                                                        <li><a href="report.php">Normal</a></li>
                                                        <li><a href="report_orphanage.php">Orphanage</a></li>
                                                    </ul>
                                                </li>
                                                <!-- <li><a href="contact.html">Contact</a></li> -->
                                            </ul>
                                        </nav>
                                    </div>

                                    <!-- <div class="header-right-btn d-none d-lg-block ml-20">
                                        <a href="report.php" class="btn header-btn">Report</a>
                                    </div> -->
                                    <?php

                                    if (isset($_SESSION["orphanage_email"]) && !empty($_SESSION["orphanage_email"])) {
                                        // User is logged in
                                        echo '<div class="header-right-btn d-none d-lg-block ml-20">';
                                        echo '<a href="logout.php" class="btn header-btn">Logout</a>';
                                        echo '</div>';
                                    } else {
                                        // User is not logged in
                                        echo '<div class="header-right-btn d-none d-lg-block ml-20">';
                                        echo '<a href="login_orphanage.php" class="btn header-btn">Login as Orphanage</a>';
                                        echo '</div>';
                                    }
                                    ?>
                                    <!-- <div class="header-right-btn d-none d-lg-block ml-20" <?php if (!(isset($_SESSION["orphanage_email"]))) echo 'style="display:none;"'; ?>>
                                        <a href="login_orphanage.php" class="btn header-btn">Orphanage Login</a>
                                    </div> -->


                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>