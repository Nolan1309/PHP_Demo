<!-- Start Header Area -->
<style>
    input#woocommerce-product-search-field-0 {
        /* padding: 9px; */
        padding: 10px 0px 10px 5px;
        font-size: 16px;
        border: none;
        border-right: 1px solid #eee;
    }

    .flex-col.flex-grow {
        border: 1px solid #eee;
        border-radius: 3px;

    }
</style>
<header class="header-area">
    <!-- main header start -->
    <div class="main-header d-none d-lg-block">
        <!-- header top start -->
        <div class="header-top bdr-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="welcome-message">
                            <p>Welcome to ShopHoa!</p>
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
                            <a href="?View=home">

                                <img src="Library/assets/img/logo/logo.png" alt="logo" style="margin-left: 100px;">

                            </a>
                        </div>
                    </div>
                    <!-- start logo area -->
                    <!-- main menu area start -->
                    <div class="col-lg-5 position-static">
                        <div class="main-menu-area">
                            <div class="main-menu">
                                <!-- main menu navbar start -->
                                <nav class="desktop-menu">
                                    <ul>
                                        <li class="active"><a href="?View">Home</a>

                                        </li>

                                        <li><a href="?View=shop">shop <i class="fa fa-angle-down"></i></a>
                                            <ul class="dropdown">
                                                <?php
                                                $object = new Database();
                                                $menushop = $object->loadDanhMucMenu();
                                                foreach ($menushop as $row) {
                                                ?>
                                                    <li>
                                                        <a href="?View=shop-cateproduct&id=<?php echo $row['idDanhmuc']; ?>"><?php echo $row['tenDanhmuc']; ?></a>
                                                    </li>
                                                <?php } ?>

                                            </ul>
                                        </li>
                                        <!-- <li><a href="?View=blog-grid-full-width">Blog</a> -->

                                        </li>
                                        <li><a href="?View=contact">Contact us</a></li>
                                    </ul>
                                </nav>
                                <!-- main menu navbar end -->
                            </div>
                        </div>
                    </div>
                    <!-- main menu area end -->
                    <!--Bắt đầu giỏ hàng -->
                    <div class="col-lg-4">
                        <div class="header-configure-wrapper">
                            <div class="header-configure-area">
                                <ul class="nav justify-content-end" style="align-items: center;">
                                    <li>

                                        <div class="header-search-form-wrapper">
                                            <div class="searchform-wrapper ux-search-box relative is-normal">
                                                <form role="search" method="get" class="searchform" action="#" data-gtm-form-interact-id="0" style="width:250px;">
                                                    <div class="flex-row relative">
                                                        <div class="flex-col flex-grow">

                                                            <input type="search" id="woocommerce-product-search-field-0" class="search-field mb-0" placeholder="Tìm tên hoa bạn muốn..." value="" name="s" autocomplete="off" data-gtm-form-interact-field-id="0" style="width:90%;">
                                                            <input type="hidden" name="post_type" value="product">
                                                            <button type="submit" value="Tìm kiếm" class="submit-button secondary" style="width:20px;height:20px;" aria-label="Submit">
                                                                <i class="lnr lnr-magnifier"></i></button>
                                                        </div>

                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="user-hover">
                                        <a href="?View=account">
                                            <i class="lnr lnr-user"></i>
                                        </a>
                                        <ul class="dropdown-list">
                                            <li><a href="?View=login">login</a></li>
                                            <li><a href="?View=sign-up">register</a></li>
                                            <li><a href="?View=account">my account</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="?View=cart" class="minicart-btn">
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
                            <a href="?View=home">
                                <img src="Library/assets/img/logo/logo.png" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="mobile-menu-toggler">
                            <div class="mini-cart-wrap">
                                <a href="?View=cart">
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

                        <li class="menu-item-has-children "><a href="?View=shop">shop</a>
                            <ul class="dropdown">

                                <?php

                                foreach ($menushop as $row) {
                                ?>
                                    <li class="menu-item-has-children">
                                        <a href="?View=shop-cateproduct&id=<?php echo $row['idDanhmuc']; ?>"><?php echo $row['tenDanhmuc']; ?></a>
                                    </li>
                                <?php } ?>



                            </ul>
                        </li>
                        <!-- <li class="menu-item-has-children "><a href="./View/blog-grid-full-width.php">Blog</a></li> -->
                        <li><a href="?View=contact">Contact us</a></li>
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
                                <a class="dropdown-item" href="?View=account">My Account</a>
                                <a class="dropdown-item" href="?View=login"> Login</a>
                                <a class="dropdown-item" href="?View=sign-up">Register</a>
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