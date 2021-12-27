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
    <meta name="description" content="Kitzen | Modern Kitchen HTML Template">
    <!-- set the Keyword -->
    <meta name="keywords" content="">
    <meta name="author" content="Kitzen | Modern Kitchen HTML Template">
    <!-- include poppins google font cdn link -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Poppins:400,400i,500,500i,600,600i,700,700i%7CRoboto:400,400i,500,500i,700,700i" rel="stylesheet"> -->
    <!-- set the page title -->
    <title><?php echo $title ?></title>
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
        <header id="pageHeader" class="pageHeader02">
            <div class="container relativeSm">
                <!-- pageHeaderTopBar -->
                <div class="pageHeaderTopBar">
                    <div class="row">
                        <div class="col-3 col-lg-6">
                            <!-- topBarContactList -->
                            <ul class="list-unstyled topBarContactList topBarContactList02 align-items-center mb-0 d-none d-md-flex">
                                <li>
                                    <a href="tel:&#049;&#050;&#051;&#052;&#053;&#054;&#055;&#056;&#057;&#049;&#048;">
                                        <i class="fas fa-phone fa-flip-horizontal icn"><span class="sr-only">icon</span></i>
                                        <span class="d-none d-lg-inline"><?php echo $tlpn ?></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="mailto:&#073;&#110;&#102;&#111;&#046;&#100;&#101;&#101;&#114;&#099;&#114;&#101;&#097;&#116;&#105;&#118;&#101;&#064;&#103;&#109;&#097;&#105;&#108;&#046;&#099;&#111;&#109;">
                                        <i class="fas fa-envelope icn"><span class="sr-only">icon</span></i>
                                        <span class="d-none d-lg-inline"><?php echo $email ?></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-9 col-lg-6 d-flex justify-content-end position-static">
                            <!-- topBarSearchForm -->
                            <!--<form action="javascript:void(0);" class="topBarSearchForm topBarSearchForm02 d-md-none">
                                <div class="form-group collapse mb-0" id="searhFormCollpase">
                                    <input type="text" class="form-control d-block" placeholder="Search&hellip;">
                                    <button type="button" class="ei_icon_search buttonReset"><span class="sr-only">search</span></button>
                                </div>
                            </form> -->
                            <!-- loginLinksList -->
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
                <div class="container relativeSm">
                    <!-- pageHeaderHolder -->
                    <div class="pageHeaderHolder pageHeaderHolder02 rounded text-white clearfix relativeSm relativeMd">
                        <!-- logo -->
                        <div class="logo alignleft">
                            <a href="home.html">
                                <img src="<?php echo base_url(); ?>assets/images/logoWhite.png" alt="kitzen">
                            </a>
                        </div>
                        <!-- pageNavHolder -->
                        <div class="pageNavHolder alignright d-flex justify-content-end align-items-md-start">
                            <!-- topBarSearchFormOpener -->
                            <a class="topBarSearchFormOpener topBarSearchFormOpener02 d-flex d-md-none align-items-center justify-content-center flex-shrink-0" data-toggle="collapse" href="#searhFormCollpase" role="button" aria-expanded="false" aria-controls="searhFormCollpase">
                                <i class="fas fa-search"><span class="sr-only">icon</span></i>
                            </a>
                            <!-- pageNavBtnCart -->
                            <!-- <a href="javascript:void(0);" class="pageNavBtnCart pageNavBtnCart02 text-center d-flex d-lg-inline align-items-center justify-content-center flex-shrink-0 position-relative order-lg-2">
                                <i class="ei_icon_cart"><span class="sr-only">icon</span></i>
                            </a> -->
                            <!-- pageNav navbar -->
                            <nav id="pageNav" class="navbar navbar-expand-lg order-lg-1">
                                <!-- pageMainNavOpener -->
                                <button class="navbar-toggler pageMainNavOpener pageMainNavOpener02" type="button" data-toggle="collapse" data-target="#pageMainNavCollapse" aria-controls="pageMainNavCollapse" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <!-- mainNavCollapse navbar collapse -->
                                <div class="collapse navbar-collapse mainNavCollapse mainNavCollapse02" id="pageMainNavCollapse">
                                    <!-- pageMainNavigation navbar nav -->
                                    <ul class="navbar-nav pageMainNavigation pageMainNavigation02 justify-content-md-end">
                                        <li class="nav-item active dropdown">
                                            <a class="nav-link fwMedium text-uppercase" href="<?php echo site_url('Page/home'); ?>" role="button" aria-haspopup="true" aria-expanded="false">Home <span class="sr-only">(current)</span></a>
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
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <main>
            <!-- bannerSliderBlock -->
            <section class="bannerSliderBlock bsbOffsetTop bannerSliderBlock02 bannerSlider w-100 slickSlider text-center text-white">
                <!-- bannerSliderSlide -->
                <?php foreach ($banner as $ban) { ?>
                    <div class="bannerSliderSlide">
                        <!-- bannerSlideHolder -->
                        <div class="container bannerSlideHolder bannerSlideHolder02 position-relative">
                            <div class="align">
                                <!-- bannerSlideHeader -->
                                <header class="bannerSlideHeader">
                                    <h1 class="text-uppercase fwSemiBold fontBase"><?php echo $ban->title ?></h1>
                                    <p><?php echo $ban->deskription ?></p>
                                </header>
                                <!-- btnHolder -->
                                <!-- <footer class="btnHolder d-flex flex-wrap justify-content-center">
                                    <a href="javascript:void(0);" class="btn btnThemeOutine text-uppercase" data-hover="Learn More">
                                        <span class="d-block btnText">Learn More</span>
                                    </a>
                                </footer> -->
                            </div>
                        </div>
                        <!-- bannerBlockSlideBg -->
                        <span class="bgCover bannerBlockSlideBg d-block position-absolute" style="background-image: url(<?php echo base_url(); ?>assets/images/<?php echo $ban->file ?>);">
                            <img class="sr-only" src="<?php echo base_url(); ?>assets/images/<?php echo $ban->file ?>" alt="image description">
                        </span>
                    </div>
                <?php } ?>
                <!-- bannerSliderSlide -->
            </section>
            <!-- wcuBlock -->
            <section class="wcuBlock contentBlock">
                <div class="container">
                    <div class="row wow fadeInUp" data-wow-delay="0.1s">
                        <div class="col-12 col-md-7 order-md-2">
                            <div class="extraWrap pl-xl-5">
                                <!-- headingHead -->
                                <header class="headingHead">
                                    <!-- blockH -->
                                    <h2 class="text-uppercase blockH font-weight-bold">
                                        <!-- hTitle -->
                                        <strong class="font-weight-normal hTitle d-block fontBase">Benefit</strong>
                                        <span class="d-block"><?php echo $benefit_title ?></span>
                                    </h2>
                                    <p><?php echo $benefit_deskripsi ?></p>
                                </header>
                                <!-- yoeListing -->
                                <ul class="list-unstyled yoeListing">
                                    <li class="hasOver">
                                        <!-- titleWrap -->
                                        <div class="titleWrap d-flex align-items-center">
                                            <i class="<?php echo $benefit_icon_1 ?> d-block icn flex-shrink-0"><span class="sr-only">icon</span></i>
                                            <h3><?php echo $benefit_title_1 ?></h3>
                                        </div>
                                        <p><?php echo $benefit_desk_1 ?></p>
                                    </li>
                                    <li class="hasOver">
                                        <!-- titleWrap -->
                                        <div class="titleWrap d-flex align-items-center">
                                            <i class="<?php echo $benefit_icon_2 ?> d-block icn flex-shrink-0"><span class="sr-only">icon</span></i>
                                            <h3><?php echo $benefit_title_2 ?></h3>
                                        </div>
                                        <p><?php echo $benefit_desk_2 ?></p>
                                    </li>
                                    <li class="hasOver">
                                        <!-- titleWrap -->
                                        <div class="titleWrap d-flex align-items-center">
                                            <i class="<?php echo $benefit_icon_3 ?> d-block icn flex-shrink-0"><span class="sr-only">icon</span></i>
                                            <h3><?php echo $benefit_title_3 ?></h3>
                                        </div>
                                        <p><?php echo $benefit_desk_3 ?></p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 d-none d-md-block col-md-5 order-md-1">
                            <!-- wcuBlockImageHolder -->
                            <div class="wcuBlockImageHolder bgCover d-flex w-100 h-100 rounded" style="background-image: url(<?php echo base_url(); ?>assets/images/<?php echo $benefit_file ?>);">
                                <img class="rounded" src="<?php echo base_url(); ?>assets/images/<?php echo $benefit_file ?>" alt="image description">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- mkCallAside -->
            <aside class="mkCallAside position-relative text-center text-md-left text-white" data-parallax="scroll" data-image-src="<?php echo base_url(); ?>assets/images/img01.jpg">
                <div class="container mkCallAsideHolder position-relative wow fadeInUp" data-wow-delay="0.1s">
                    <div class="align">
                        <div class="row align-items-md-center">
                            <div class="col-12 col-md-8">
                                <h2 class="text-uppercase font-weight-bold">Making Beautiful Our Kitchen</h2>
                                <p>Quality is what we pursue, We know what we do</p>
                            </div>
                            <div class="col-12 col-md-4 text-md-right">
                                <a href="tel:+&#049;&#050;&#051;&#052;&#053;&#054;&#055;&#056;&#057;" class="btn btnTheme btnThemeWhiteInverse fontRoboto btnRoudedLarge" data-hover="<?php echo $tlpn ?>">
                                    <span class="btnText d-block">
                                        <i class="ei_icon_phone btnIcn"><span class="sr-only">icon</span></i>
                                        <span><?php echo $tlpn ?></span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
            <!-- servicesBlock -->
            <section class="contentBlock servicesBlock text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-12 offset-md-1 col-md-10 offset-lg-2 col-lg-8 offset-xl-3 col-xl-6">
                            <!-- headingHead -->
                            <header class="headingHead wow fadeInUp" data-wow-delay="0.1s">
                                <!-- blockH -->
                                <h2 class="text-uppercase blockH font-weight-bold">
                                    <!-- hTitle -->
                                    <strong class="font-weight-normal hTitle d-block fontBase">Services</strong>
                                    <span class="d-block"><?php echo $service_title ?></span>
                                </h2>
                                <p><?php echo $service_desk ?></p>
                            </header>
                        </div>
                    </div>
                    <!-- svColsRow -->
                    <div class="row justify-content-center svColsRow no-gutters wow fadeInUp" data-wow-delay="0.1s">
                        <?php foreach ($services as $service) { ?>
                            <div class="col-12 col-md-4 d-md-flex col">
                                <!-- serviceColumn -->
                                <article class="serviceColumn d-md-flex align-items-md-center justify-content-md-center position-relative hasOver mb-0">
                                    <div class="align">
                                        <i class="icn <?php echo $service->services_icon ?> d-block"><span class="sr-only">icon</span></i>
                                        <h3><?php echo $service->services_title ?></h3>
                                        <p><?php echo $service->services_desk ?></p>
                                    </div>
                                    <!-- columnBgCover -->
                                    <span class="bgCover columnBgCover d-block position-absolute" style="background-image: url(<?php echo base_url(); ?>assets/images/img02.jpg);">
                                        <img class="sr-only" src="<?php echo base_url(); ?>assets/images/img02.jpg" alt="image description">
                                    </span>
                                </article>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </section>

            <!-- clientsTestimonialBlock -->
            <section class="bg-light clientsTestimonialBlock text-center text-md-left position-relative contentBlock">
                <div class="container">
                    <div class="row no-gutters wow fadeInUp" data-wow-delay="0.1s">
                        <div class="col-12 offset-md-6 col-md-6">
                            <!-- clientsTestimonialBlockHolder -->
                            <div class="clientsTestimonialBlockHolder">
                                <!-- headingHead -->
                                <header class="headingHead">
                                    <!-- blockH -->
                                    <h2 class="text-uppercase blockH font-weight-bold mb-0">
                                        <!-- hTitle -->
                                        <strong class="font-weight-normal hTitle d-block fontBase">Testimonials</strong>
                                        <span class="d-block">Happy Clients</span>
                                    </h2>
                                </header>
                                <!-- testimonialSingleSlider -->
                                <div class="testimonialSingleSlider slickSlider">
                                    <?php foreach ($testi as $testi) { ?>
                                        <div>
                                            <!-- clientQuote -->
                                            <blockquote class="clientQuote mb-0">
                                                <q class="d-block">
                                                    <!-- quoteTitle -->
                                                    <?php echo $testi->client_testi ?>
                                                </q>
                                                <div class="d-flex align-items-start justify-content-between align-items-center">
                                                    <!-- cite -->
                                                    <cite class="wrap d-block text-left">
                                                        <strong class="h3 d-block text-capitalize"><a href="javascript:void(0);"><?php echo $testi->client_name ?></a></strong>
                                                        <em class="h5 d-block font-weight-normal"><?php echo $testi->client_desk ?></em>
                                                    </cite>
                                                    <!-- ratingStarList -->
                                                    <?php if ($testi->client_rate == 5) { ?>
                                                        <ul class="list-unstyled ratingStarList d-flex mb-1 ml-2 flex-shrink-0">
                                                            <li class="active"><i class="fas fa-star"></i></li>
                                                            <li class="active"><i class="fas fa-star"></i></li>
                                                            <li class="active"><i class="fas fa-star"></i></li>
                                                            <li class="active"><i class="fas fa-star"></i></li>
                                                            <li class="active"><i class="fas fa-star"></i></li>
                                                        </ul>
                                                    <?php } elseif ($testi->client_rate == 4) { ?>
                                                        <ul class="list-unstyled ratingStarList d-flex mb-1 ml-2 flex-shrink-0">
                                                            <li class="active"><i class="fas fa-star"></i></li>
                                                            <li class="active"><i class="fas fa-star"></i></li>
                                                            <li class="active"><i class="fas fa-star"></i></li>
                                                            <li class="active"><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                        </ul>
                                                    <?php } elseif ($testi->client_rate == 3) { ?>
                                                        <ul class="list-unstyled ratingStarList d-flex mb-1 ml-2 flex-shrink-0">
                                                            <li class="active"><i class="fas fa-star"></i></li>
                                                            <li class="active"><i class="fas fa-star"></i></li>
                                                            <li class="active"><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                        </ul>
                                                    <?php } elseif ($testi->client_rate == 2) { ?>
                                                        <ul class="list-unstyled ratingStarList d-flex mb-1 ml-2 flex-shrink-0">
                                                            <li class="active"><i class="fas fa-star"></i></li>
                                                            <li class="active"><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                        </ul>
                                                    <?php } elseif ($testi->client_rate == 1) { ?>
                                                        <ul class="list-unstyled ratingStarList d-flex mb-1 ml-2 flex-shrink-0">
                                                            <li class="active"><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                            <li><i class="fas fa-star"></i></li>
                                                        </ul>
                                                    <?php } ?>
                                                </div>
                                            </blockquote>
                                        </div>
                                    <?php } ?>
                                </div>
                                <!-- separator -->
                                <hr class="separator">
                                <!-- testimonialSwitcherSlider -->
                                <div class="testimonialSwitcherSlider slickSlider">
                                    <?php foreach ($testix as $testix) { ?>
                                        <div>
                                            <!-- testimonialSwitcherPicWrap -->
                                            <div class="rounded-circle testimonialSwitcherPicWrap position-relative">
                                                <img class="w-100 h-100 d-block rounded-circle" src="<?php echo base_url(); ?>assets/images/<?php echo $testix->client_foto ?>" alt="<?php echo $testix->client_name . ' ' . $testix->client_desk ?>">
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <!-- videoBlockWrap -->
                        <a data-fancybox="true" href="<?php echo $video_url ?>" class="videoBlockWrap hasOver lightbox hasOverlay d-none d-md-block">
                            <!-- btnPlay -->
                            <span class="btnPlay position-absolute rounded-circle d-flex align-items-center justify-content-center">
                                <span class="sr-only">play</span>
                            </span>
                            <!-- videoBlockBgCover -->
                            <span class="bgCover videoBlockBgCover d-block position-absolute" style="background-image: url(<?php echo base_url(); ?>assets/images/<?php echo $video_cover ?>);">
                                <img class="sr-only" src="<?php echo base_url(); ?>assets/images/<?php echo $video_cover ?>" alt="image description">
                            </span>
                        </a>
                    </div>
                </div>
            </section>
            <!-- prejectsListingBlock -->
            <section class="contentBlock prejectsListingBlock">
                <div class="container">
                    <!-- filterRowWrap -->
                    <div class="row align-items-md-end filterRowWrap wow fadeInUp" data-wow-delay="0.1s">
                        <div class="col-12 col-md-4">
                            <!-- headingHead -->
                            <header class="headingHead">
                                <!-- blockH -->
                                <h2 class="text-uppercase blockH font-weight-bold mb-0">
                                    <!-- hTitle -->
                                    <strong class="font-weight-normal hTitle d-block fontBase">Project</strong>
                                    <span class="d-block">Our Work</span>
                                </h2>
                            </header>
                        </div>
                        <div class="col-12 col-md-8">
                            <!-- filterList -->
                            <ul class="list-unstyled filterList d-md-flex justify-content-md-end position-relative isoFiltersList text-capitalize">

                                <li class="active"><a href="#">View All</a></li>
                                <?php foreach ($produks as $produk) { ?>
                                    <li><a href="javascript:void(0);" data-filter=".<?php echo $produk->id_produk ?>"><?php echo $produk->nm_produk ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <!-- isoContentHolder -->
                    <div class="isoContentHolder row">
                        <div class="row justify-content-center wow fadeInUp" data-wow-delay="0.1s">
                            <?php
                            $this->db->where('id_produk', '1');
                            $this->db->group_by('id_projek');
                            $projeks = $this->db->get('web_v_projeks')->result();
                            foreach ($projeks as $projek) { ?>
                                <div class="col-12 col-md-6 col-lg-4 isoCol <?php echo $projek->id_produk ?>">
                                    <!-- prPostColumn -->
                                    <article class="prPostColumn hasOver position-relative">
                                        <!-- prColumnBgCover -->
                                        <span class="bgCover prColumnBgCover d-block" style="background-image: url(<?php echo base_url(); ?>assets/images/<?php echo $projek->gambar ?>);">
                                            <img class="sr-only" src="<?php echo base_url(); ?>assets/images/<?php echo $projek->gambar ?>" alt="image description">
                                        </span>
                                        <!-- prPostCaption -->
                                        <div class="prPostCaption bg-white rounded">
                                            <h3>
                                                <!-- hTitle -->
                                                <strong class="font-weight-normal hTitle d-block fontBase"><?php echo $projek->nm_produk ?></strong>
                                                <span class="d-block"><a href="project-details2.html">Projek a/n <?php echo $projek->projek_name ?></a></span>
                                            </h3>
                                        </div>
                                    </article>
                                </div>
                            <?php } ?>
                            <?php
                            $this->db->where('id_produk', '4');
                            $this->db->group_by('id_projek');
                            $projeks = $this->db->get('web_v_projeks')->result();
                            foreach ($projeks as $projek) { ?>
                                <div class="col-12 col-md-6 col-lg-4 isoCol <?php echo $projek->id_produk ?>">
                                    <!-- prPostColumn -->
                                    <article class="prPostColumn hasOver position-relative">
                                        <!-- prColumnBgCover -->
                                        <span class="bgCover prColumnBgCover d-block" style="background-image: url(<?php echo base_url(); ?>assets/images/<?php echo $projek->gambar ?>);">
                                            <img class="sr-only" src="<?php echo base_url(); ?>assets/images/<?php echo $projek->gambar ?>" alt="image description">
                                        </span>
                                        <!-- prPostCaption -->
                                        <div class="prPostCaption bg-white rounded">
                                            <h3>
                                                <!-- hTitle -->
                                                <strong class="font-weight-normal hTitle d-block fontBase"><?php echo $projek->nm_produk ?></strong>
                                                <span class="d-block"><a href="project-details2.html">Projek a/n <?php echo $projek->projek_name ?></a></span>
                                            </h3>
                                        </div>
                                    </article>
                                </div>
                            <?php } ?>
                            <?php
                            $this->db->where('id_produk', '5');
                            $this->db->group_by('id_projek');
                            $projeks = $this->db->get('web_v_projeks')->result();
                            foreach ($projeks as $projek) { ?>
                                <div class="col-12 col-md-6 col-lg-4 isoCol <?php echo $projek->id_produk ?>">
                                    <!-- prPostColumn -->
                                    <article class="prPostColumn hasOver position-relative">
                                        <!-- prColumnBgCover -->
                                        <span class="bgCover prColumnBgCover d-block" style="background-image: url(<?php echo base_url(); ?>assets/images/<?php echo $projek->gambar ?>);">
                                            <img class="sr-only" src="<?php echo base_url(); ?>assets/images/<?php echo $projek->gambar ?>" alt="image description">
                                        </span>
                                        <!-- prPostCaption -->
                                        <div class="prPostCaption bg-white rounded">
                                            <h3>
                                                <!-- hTitle -->
                                                <strong class="font-weight-normal hTitle d-block fontBase"><?php echo $projek->nm_produk ?></strong>
                                                <span class="d-block"><a href="project-details2.html">Projek a/n <?php echo $projek->projek_name ?></a></span>
                                            </h3>
                                        </div>
                                    </article>
                                </div>
                            <?php } ?>
                            <?php
                            $this->db->where('id_produk', '6');
                            $this->db->group_by('id_projek');
                            $projeks = $this->db->get('web_v_projeks')->result();
                            foreach ($projeks as $projek) { ?>
                                <div class="col-12 col-md-6 col-lg-4 isoCol <?php echo $projek->id_produk ?>">
                                    <!-- prPostColumn -->
                                    <article class="prPostColumn hasOver position-relative">
                                        <!-- prColumnBgCover -->
                                        <span class="bgCover prColumnBgCover d-block" style="background-image: url(<?php echo base_url(); ?>assets/images/<?php echo $projek->gambar ?>);">
                                            <img class="sr-only" src="<?php echo base_url(); ?>assets/images/<?php echo $projek->gambar ?>" alt="image description">
                                        </span>
                                        <!-- prPostCaption -->
                                        <div class="prPostCaption bg-white rounded">
                                            <h3>
                                                <!-- hTitle -->
                                                <strong class="font-weight-normal hTitle d-block fontBase"><?php echo $projek->nm_produk ?></strong>
                                                <span class="d-block"><a href="project-details2.html">Projek a/n <?php echo $projek->projek_name ?></a></span>
                                            </h3>
                                        </div>
                                    </article>
                                </div>
                            <?php } ?>
                            <?php
                            $this->db->where('id_produk', '7');
                            $this->db->group_by('id_projek');
                            $projeks = $this->db->get('web_v_projeks')->result();
                            foreach ($projeks as $projek) { ?>
                                <div class="col-12 col-md-6 col-lg-4 isoCol <?php echo $projek->id_produk ?>">
                                    <!-- prPostColumn -->
                                    <article class="prPostColumn hasOver position-relative">
                                        <!-- prColumnBgCover -->
                                        <span class="bgCover prColumnBgCover d-block" style="background-image: url(<?php echo base_url(); ?>assets/images/<?php echo $projek->gambar ?>);">
                                            <img class="sr-only" src="<?php echo base_url(); ?>assets/images/<?php echo $projek->gambar ?>" alt="image description">
                                        </span>
                                        <!-- prPostCaption -->
                                        <div class="prPostCaption bg-white rounded">
                                            <h3>
                                                <!-- hTitle -->
                                                <strong class="font-weight-normal hTitle d-block fontBase"><?php echo $projek->nm_produk ?></strong>
                                                <span class="d-block"><a href="project-details2.html">Projek a/n <?php echo $projek->projek_name ?></a></span>
                                            </h3>
                                        </div>
                                    </article>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <?php $this->load->view('footer'); ?>