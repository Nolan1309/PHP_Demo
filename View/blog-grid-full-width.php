<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="meta description">
    <title>Floda - Flower eCommerce Bootstrap 4 Template</title>

    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="../Library/assets/img/favicon.ico" type="image/x-icon" />

    <!-- Google fonts include -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,900%7CYesteryear" rel="stylesheet">

    <!-- All Vendor & plugins CSS include -->
    <link href="../Library/assets/css/vendor.css" rel="stylesheet">
    <!-- Main Style CSS -->
    <link href="../Library/assets/css/style.css" rel="stylesheet">

    <!--[if lt IE 9]>
<script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body>

    <?php
        include '../Layout/header.php'
    ?>

    <!-- off-canvas menu start -->
    <aside class="off-canvas-wrapper">
        <div class="off-canvas-overlay"></div>
        <div class="off-canvas-inner-content">
            <div class="btn-close-off-canvas">
                <i class="lnr lnr-cross"></i>
            </div>

            <div class="off-canvas-inner">
                <!-- search box start -->
                <div class="search-box-offcanvas">
                    <form>
                        <input type="text" placeholder="Search Here...">
                        <button class="search-btn"><i class="lnr lnr-magnifier"></i></button>
                    </form>
                </div>
                <!-- search box end -->

                <!-- mobile menu start -->
                <div class="mobile-navigation">

                    <!-- mobile menu navigation start -->
                    <nav>
                        <ul class="mobile-menu">
                            <li class="menu-item-has-children"><a href="../index.php">Home</a>
                              
                            </li>
                          
                            <li class="menu-item-has-children "><a href="shop.php">shop</a>
                                <ul class="dropdown">
                                    <li class="menu-item-has-children"><a href="shop.php">Hoa giấy</a>
                                        <ul class="dropdown">
                                            <li><a href="shop.html">shop grid left sidebar</a></li>
                                            <li><a href="shop-grid-right-sidebar.html">shop grid right sidebar</a></li>
                                            <li><a href="shop-grid-full-3-col.html">shop grid full 3 col</a></li>
                                            <li><a href="shop-grid-full-4-col.html">shop grid full 4 col</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><a href="shop.php">Hoa sáp</a>
                                        <ul class="dropdown">
                                            <li><a href="shop-list-left-sidebar.html">shop list left sidebar</a></li>
                                            <li><a href="shop-list-right-sidebar.html">shop list right sidebar</a></li>
                                            <li><a href="shop-list-full-width.html">shop list full width</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><a href="shop.php">Hoa cưới</a>
                                        <ul class="dropdown">
                                            <li><a href="product-details.html">product details</a></li>
                                            <li><a href="product-details-affiliate.html">product details affiliate</a></li>
                                            <li><a href="product-details-variable.html">product details variable</a></li>
                                            <li><a href="product-details-group.html">product details group</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children "><a href="blog-grid-full-width.php">Blog</a></li>
                            <li><a href="contact-us.php">Contact us</a></li>
                        </ul>
                    </nav>
                    <!-- mobile menu navigation end -->
                </div>
                <!-- mobile menu end -->

                <div class="mobile-settings">
                    <ul class="nav">       
                        <li>
                            <div class="dropdown mobile-top-dropdown">
                                <a href="#" class="dropdown-toggle" id="myaccount" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    My Account
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="myaccount">
                                    <a class="dropdown-item" href="my-account.php">my account</a>
                                    <a class="dropdown-item" href="login.php"> login</a>
                                    <a class="dropdown-item" href="register.php">register</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- offcanvas widget area start -->
                <div class="offcanvas-widget-area">
                    <div class="off-canvas-contact-widget">
                        <ul>
                            <li><i class="fa fa-mobile"></i>
                                <a href="#">0365 683 018</a>
                            </li>
                            <li><i class="fa fa-envelope-o"></i>
                                <a href="#">tranfc911@gmail.com</a>
                            </li>
                        </ul>
                    </div>
                    <div class="off-canvas-social-widget">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-youtube-play"></i></a>
                    </div>
                </div>
                <!-- offcanvas widget area end -->
            </div>
        </div>
    </aside>
    <!-- off-canvas menu end -->



    <!-- main wrapper start -->
    <main>
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area common-bg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <h1>blog</h1>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../index.php"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Blog</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- blog main wrapper start -->
        <div class="blog-main-wrapper section-space pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="blog-item-wrapper">
                            <div class="row mbn-30">
                                <!-- blog single item start -->
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="blog-post-item mb-30">
                                        <div class="blog-post-thumb">
                                            <a href="blog-details.php">
                                                <img src="../Library/assets/img/blog/blog-details-4.jpg" alt="">
                                            </a>
                                            <div class="post-date">
                                                <p class="date">25</p>
                                                <p class="month">Apr</p>
                                            </div>
                                        </div>
                                        <div class="post-info-wrapper">
                                            <div class="entry-header">
                                                <h2 class="entry-title">
                                                    <a href="blog-details.php">Flowers daisy pink</a>
                                                </h2>
                                                <div class="post-meta">
                                                    <div class="post-author">
                                                        Written by: <a href="#">Admin</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="entry-summary">
                                                <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean
                                                    posuere libero eu augue.
                                                </p>
                                            </div>
                                            <a href="blog-details.php" class="btn-read">read more...</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- blog single item end -->

                                <!-- blog single item start -->
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="blog-post-item mb-30">
                                        <div class="blog-post-thumb">
                                            <div class="blog-carousel-active slick-arrow-style">
                                                <div class="blog-single-slide">
                                                    <a href="blog-details.php">
                                                        <img src="../Library/assets/img/blog/blog-details-1.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="blog-single-slide">
                                                    <a href="blog-details.php">
                                                        <img src="../Library/assets/img/blog/blog-details-4.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="blog-single-slide">
                                                    <a href="blog-details.php">
                                                        <img src="../Library/assets/img/blog/blog-details-1.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="blog-single-slide">
                                                    <a href="blog-details.php">
                                                        <img src="../Library/assets/img/blog/blog-details-2.jpg" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="post-date">
                                                <p class="date">10</p>
                                                <p class="month">May</p>
                                            </div>
                                        </div>
                                        <div class="post-info-wrapper">
                                            <div class="entry-header">
                                                <h2 class="entry-title">
                                                    <a href="blog-details.php">Flowers bouquet pink</a>
                                                </h2>
                                                <div class="post-meta">
                                                    <div class="post-author">
                                                        Written by: <a href="#">Admin</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="entry-summary">
                                                <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean
                                                    posuere libero eu augue.
                                                </p>
                                            </div>
                                            <a href="blog-details.php" class="btn-read">read more...</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- blog single item end -->

                                <!-- blog single item start -->
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="blog-post-item mb-30">
                                        <div class="blog-post-thumb">
                                            <a href="blog-details.php">
                                                <img src="../Library/assets/img/blog/blog-details-3.jpg" alt="">
                                            </a>
                                            <div class="post-date">
                                                <p class="date">20</p>
                                                <p class="month">Mar</p>
                                            </div>
                                        </div>
                                        <div class="post-info-wrapper">
                                            <div class="entry-header">
                                                <h2 class="entry-title">
                                                    <a href="blog-details.php">Flowers daisy pink</a>
                                                </h2>
                                                <div class="post-meta">
                                                    <div class="post-author">
                                                        Written by: <a href="#">Admin</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="entry-summary">
                                                <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean
                                                    posuere libero eu augue.
                                                </p>
                                            </div>
                                            <a href="blog-details.php" class="btn-read">read more...</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- blog single item end -->

                                <!-- blog single item start -->
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="blog-post-item mb-30">
                                        <div class="blog-post-thumb">
                                            <a href="blog-details.php">
                                                <img src="../Library/assets/img/blog/blog-details-2.jpg" alt="">
                                            </a>
                                            <div class="post-date">
                                                <p class="date">10</p>
                                                <p class="month">Jun</p>
                                            </div>
                                        </div>
                                        <div class="post-info-wrapper">
                                            <div class="entry-header">
                                                <h2 class="entry-title">
                                                    <a href="blog-details.php">Blossom bout flower</a>
                                                </h2>
                                                <div class="post-meta">
                                                    <div class="post-author">
                                                        Written by: <a href="#">Admin</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="entry-summary">
                                                <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean
                                                    posuere libero eu augue.
                                                </p>
                                            </div>
                                            <a href="blog-details.php" class="btn-read">read more...</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- blog single item end -->

                                <!-- blog single item start -->
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="blog-post-item mb-30">
                                        <div class="blog-post-thumb embed-responsive embed-responsive-16by9">
                                            <iframe src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/501298839&color=%23ff5500&auto_play=false&hide_related=true&show_comments=false&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe>
                                            <div class="post-date">
                                                <p class="date">05</p>
                                                <p class="month">Jan</p>
                                            </div>
                                        </div>
                                        <div class="post-info-wrapper">
                                            <div class="entry-header">
                                                <h2 class="entry-title">
                                                    <a href="blog-details.php">Jasmine flowers white</a>
                                                </h2>
                                                <div class="post-meta">
                                                    <div class="post-author">
                                                        Written by: <a href="#">Admin</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="entry-summary">
                                                <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean
                                                    posuere libero eu augue.
                                                </p>
                                            </div>
                                            <a href="blog-details.php" class="btn-read">read more...</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- blog single item end -->

                                <!-- blog single item start -->
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="blog-post-item mb-30">
                                        <div class="blog-post-thumb embed-responsive embed-responsive-16by9">
                                            <iframe src="https://www.youtube.com/embed/4qNHr0W6F0o" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                            <div class="post-date">
                                                <p class="date">12</p>
                                                <p class="month">Dec</p>
                                            </div>
                                        </div>
                                        <div class="post-info-wrapper">
                                            <div class="entry-header">
                                                <h2 class="entry-title">
                                                    <a href="blog-details.php">Orchid flower red stick</a>
                                                </h2>
                                                <div class="post-meta">
                                                    <div class="post-author">
                                                        Written by: <a href="#">Admin</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="entry-summary">
                                                <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean
                                                    posuere libero eu augue.
                                                </p>
                                            </div>
                                            <a href="blog-details.php" class="btn-read">read more...</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- blog single item end -->

                            </div>
                            <!-- start pagination area -->
                            <div class="paginatoin-area text-center">
                                <ul class="pagination-box">
                                    <li><a class="previous" href="#"><i class="lnr lnr-chevron-left"></i></a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a class="next" href="#"><i class="lnr lnr-chevron-right"></i></a></li>
                                </ul>
                            </div>
                            <!-- end pagination area -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- blog main wrapper end -->
    </main>
    <!-- main wrapper end -->

    
    <?php
        include '../Layout/footer.php';
        include '../Layout/quickview.php';
        include '../Layout/offcanvas_search.php';
        include '../Layout/offcanvas_minicart.php';
    ?>

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->

    <!-- All vendor & plugins & active js include here -->
    <!--All Vendor Js -->
    <script src="../Library/assets/js/vendor.js"></script>
    <!-- Active Js -->
    <script src="../Library/assets/js/active.js"></script>
</body>

</html>