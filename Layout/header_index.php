<!-- Start Header Area -->
<header class="header-area">
    <!-- main header start -->
    <div class="main-header d-none d-lg-block">
        <!-- header top start -->
        <div class="header-top bdr-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="welcome-message">
                            <p>Welcome to Floda online store</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- header top end -->
        <!-- header middle area start -->
        <div class="header-main-area sticky">
            <div class="container">
                <div class="row align-items-center position-relative">
                    <!-- start logo area -->
                    <div class="col-lg-3">
                        <div class="logo">
                            <a href="./index.php">

                                <img src="./Library/assets/img/logo/logo.png" alt="">

                            </a>
                        </div>
                    </div>
                    <!-- start logo area -->
                    <!-- main menu area start -->
                    <div class="col-lg-6 position-static">
                        <div class="main-menu-area">
                            <div class="main-menu">
                                <!-- main menu navbar start -->
                                <nav class="desktop-menu">
                                    <ul>
                                        <li class="active"><a href="./index.php">Home</a>

                                        </li>

                                        <li><a href="./View/shop.php">shop <i class="fa fa-angle-down"></i></a>
                                            <ul class="dropdown">
                                                <?php
                                                $object = new Database();
                                                $menushop = $object->loadDanhMucMenu();
                                                foreach ($menushop as $row) {
                                                ?>
                                                    <li>
                                                        <a href="#"><?php echo $row['tenDanhmuc']; ?><i class="fa fa-angle-right"></i></a>
                                                    </li>
                                                <?php } ?>

                                                <!-- <li><a href="#">Hoa giấy <i class="fa fa-angle-right"></i></a>
                                                    <ul class="dropdown">
                                                        <li><a href="./View/shop.php">shop grid left sidebar</a></li>
                                                        <li><a href="shop-grid-right-sidebar.html">shop grid right sidebar</a></li>
                                                        <li><a href="shop-grid-full-3-col.html">shop grid full 3 col</a></li>
                                                        <li><a href="shop-grid-full-4-col.html">shop grid full 4 col</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Hoa cưới<i class="fa fa-angle-right"></i></a>
                                                    <ul class="dropdown">
                                                        <li><a href="shop-list-left-sidebar.html">shop list left sidebar</a></li>
                                                        <li><a href="shop-list-right-sidebar.html">shop list right sidebar</a></li>
                                                        <li><a href="shop-list-full-width.html">shop list full width</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Hoa kỉ niệm <i class="fa fa-angle-right"></i></a>
                                                    <ul class="dropdown">
                                                        <li><a href="./View/product-details-affiliate.php">product details</a></li>
                                                        <li><a href="product-details-affiliate.html">product details affiliate</a></li>
                                                        <li><a href="product-details-variable.html">product details variable</a></li>
                                                        <li><a href="product-details-group.html">product details group</a></li>
                                                    </ul>
                                                </li> -->
                                            </ul>
                                        </li>
                                        <li><a href="./View/blog-grid-full-width.php">Blog</a>

                                        </li>
                                        <li><a href="./View/contact-us.php">Contact us</a></li>
                                    </ul>
                                </nav>
                                <!-- main menu navbar end -->
                            </div>
                        </div>
                    </div>
                    <!-- main menu area end -->
                    <!--Bắt đầu giỏ hàng -->
                    <div class="col-lg-3">
                        <div class="header-configure-wrapper">
                            <div class="header-configure-area">
                                <ul class="nav justify-content-end">
                                    <li>
                                        <a href="#" class="offcanvas-btn">
                                            <i class="lnr lnr-magnifier"></i>
                                        </a>
                                    </li>
                                    <li class="user-hover">
                                        <a href="./View/my-account.php">
                                            <i class="lnr lnr-user"></i>
                                        </a>
                                        <ul class="dropdown-list">
                                            <li><a href="./View/login.php">login</a></li>
                                            <li><a href="./View/register.php">register</a></li>
                                            <li><a href="./View/my-account.php">my account</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="./View/cart.php" class="minicart-btn">
                                            <i class="lnr lnr-cart"></i>
                                            <div class="notification">2</div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--Kết thúc giỏ hàng -->
                </div>
            </div>
        </div>
        <!-- header middle area end -->
    </div>
    <!-- main header start -->
    <!-- mobile header start -->
    <div class="mobile-header d-lg-none d-md-block sticky">
        <!--mobile header top start -->
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="mobile-main-header">
                        <div class="mobile-logo">
                            <a href="./index.php">
                                <img src="./Library/assets/img/logo/logo.png" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="mobile-menu-toggler">
                            <div class="mini-cart-wrap">
                                <a href="./View/cart.php">
                                    <i class="lnr lnr-cart"></i>
                                </a>
                            </div>
                            <div class="mobile-menu-btn">
                                <div class="off-canvas-btn">
                                    <i class="lnr lnr-menu"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- mobile header top start -->
    </div>
    <!-- mobile header end -->
</header>
<!-- end Header Area -->


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
                        <li class="menu-item-has-children"><a href="index.php">Home</a>

                        </li>

                        <li class="menu-item-has-children "><a href="./View/shop.php">shop</a>
                            <ul class="dropdown">
                                <?php

                                foreach ($menushop as $row) {
                                ?>
                                    <li class="menu-item-has-children">
                                        <a href="#"><?php echo $row['tenDanhmuc']; ?><i class="fa fa-angle-right"></i></a>
                                    </li>
                                <?php } ?>

                            
                            </ul>
                        </li>
                        <li class="menu-item-has-children "><a href="./View/blog-grid-full-width.php">Blog</a></li>
                        <li><a href="./View/contact-us.php">Contact us</a></li>
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
                                <a class="dropdown-item" href="./View/my-account.php">my account</a>
                                <a class="dropdown-item" href="./View/login.php"> login</a>
                                <a class="dropdown-item" href="./View/register.php">register</a>
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