<?php
$this->db->where('id', '1');
$info = $this->db->get('web_info')->row();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- set the encoding of your site -->
    <meta charset="utf-8">
    <!-- set the viewport width and initial-scale on mobile devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- set the HandheldFriendly -->
    <meta name="HandheldFriendly" content="True">
    <!-- set the description -->
    <meta name="description" content="<?php echo $info->title ?>">
    <!-- set the Keyword -->
    <meta name="keywords" content="">
    <meta name="author" content="<?php echo $info->title ?>">
    <!-- include poppins google font cdn link -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,400i,500,500i,600,600i,700,700i%7CRoboto:400,400i,500,500i,700,700i" rel="stylesheet">
    <!-- set the page title -->
    <title><?php echo $info->title ?></title>
    <!-- include the site bootstrap stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
    <!-- include the site Fontsicon stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fontsicon.css">
    <!-- include the site Plugins stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins.css">
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/style.css">
    <!-- include theme color setting stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/colors.css">
    <!-- include the site responsive stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/responsive.css">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url() ?>assets/images/gd-favicon.png">
</head>

<body>
    <!-- pageWrapper -->
    <div id="pageWrapper">
        <!-- pageHeader -->
        <header id="pageHeader" class="pageHeader04">
            <!-- pageHeaderTopBar -->
            <div class="pageHeaderTopBar pageHeaderTopBar04 bg-light">
                <div class="container clearfix position-relative">
                    <div class="row">
                        <div class="col-3 col-lg-7">
                            <!-- topBarContactList -->
                            <ul class="list-unstyled topBarContactList align-items-center mb-0 d-none d-md-flex">
                                <li>
                                    <a href="tel:+&#049;&#050;&#051;&#052;&#053;&#054;&#055;&#056;&#057;&#048;">
                                        <i class="ti-mobile icn"><span class="sr-only">icon</span></i>
                                        <span class="d-none d-lg-inline"><?php echo $info->tlpn ?></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="mailto:&#073;&#110;&#102;&#111;&#046;&#100;&#101;&#101;&#114;&#099;&#114;&#101;&#097;&#116;&#105;&#118;&#101;&#064;&#103;&#109;&#097;&#105;&#108;&#046;&#099;&#111;&#109;">
                                        <i class="ti-email icn"><span class="sr-only">icon</span></i>
                                        <span class="d-none d-lg-inline"><?php echo $info->email ?></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-9 col-lg-5 d-flex justify-content-end">
                            <!-- shareWTitleWrap -->
                            <div class="shareWTitleWrap d-flex align-items-center">
                                <!-- shareTitle -->
                                <strong class="shareTitle text-capitalize font-weight-normal d-none d-md-block">Follow Us:</strong>
                                <!-- socialLinksSimple -->
                                <ul class="list-unstyled socialNetworks socialLinksSimple d-flex align-items-center justify-content-end mb-0">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <span class="fab fa-facebook-f"><span class="sr-only">facebook</span></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <span class="fab fa-twitter"><span class="sr-only">twitter</span></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <span class="fab fa-pinterest"><span class="sr-only">pinterest</span></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <span class="fab fa-google-plus-g"><span class="sr-only">google plus</span></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="headerFixer">
                <div class="bg-white">
                    <!-- pageHeaderHolder -->
                    <div class="container clearfix pageHeaderHolder pageHeaderHolder04">
                        <!-- logo -->
                        <div class="logo logo04 alignleft">
                            <a href="home.html">
                                <img src="<?php echo base_url(); ?>assets/images/logo.png" alt="<?php echo $info->title ?>">
                            </a>
                        </div>
                        <!-- pageNavHolder -->
                        <div class="pageNavHolder alignright d-flex justify-content-end align-items-md-start">
                            <!-- pageNav navbar -->
                            <nav id="pageNav" class="navbar navbar-expand-lg order-2 order-lg-1">
                                <!-- pageMainNavOpener -->
                                <button class="navbar-toggler pageMainNavOpener pageMainNavOpener04" type="button" data-toggle="collapse" data-target="#pageMainNavCollapse" aria-controls="pageMainNavCollapse" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <!-- mainNavCollapse navbar collapse -->
                                <div class="collapse navbar-collapse mainNavCollapse mainNavCollapse04" id="pageMainNavCollapse">
                                    <!-- pageMainNavigation navbar nav -->
                                    <ul class="navbar-nav pageMainNavigation pageMainNavigation04 justify-content-md-end">
                                        <li class="nav-item active dropdown">
                                            <a class="nav-link fwMedium text-uppercase" href="<?php echo site_url('Page/home'); ?>" role="button">Home <span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link fwMedium text-uppercase" href="<?php echo site_url('Page/projeks'); ?>" role="button">Project</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link fwMedium text-uppercase" href="<?php echo site_url('Page/about'); ?>" role="button">About Us</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link fwMedium text-uppercase" href="<?php echo site_url('Page/services'); ?>" role="button">Services</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link fwMedium text-uppercase" href="<?php echo site_url('Page/blog'); ?>" role="button">Tips & Trik</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link fwMedium text-uppercase" href="<?php echo site_url('Page/contact'); ?>" role="button">Contact</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                            <!-- <a href="javascript:void(0);" class="btn btnThemeOutine btnThemeOutineNotWhite text-uppercase order-1 order-lg-2 flex-shrink-0 d-none d-sm-inline-block" data-hover="Get A Quote">
                                <span class="d-block btnText">Get A Quote</span>
                            </a> -->
                        </div>
                    </div>
                </div>
            </div>
        </header>