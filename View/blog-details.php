<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="meta description">
    <title>Floda - Flower eCommerce Bootstrap 4 Template</title>

    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon" />

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
                          
                            <li class="menu-item-has-children "><a href="./View/shop.php">shop</a>
                                <ul class="dropdown">
                                    <li class="menu-item-has-children"><a href="./View/shop.php">Hoa giấy</a>
                                        <ul class="dropdown">
                                            <li><a href="shop.html">shop grid left sidebar</a></li>
                                            <li><a href="shop-grid-right-sidebar.html">shop grid right sidebar</a></li>
                                            <li><a href="shop-grid-full-3-col.html">shop grid full 3 col</a></li>
                                            <li><a href="shop-grid-full-4-col.html">shop grid full 4 col</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><a href="./View/shop.php">Hoa sáp</a>
                                        <ul class="dropdown">
                                            <li><a href="shop-list-left-sidebar.html">shop list left sidebar</a></li>
                                            <li><a href="shop-list-right-sidebar.html">shop list right sidebar</a></li>
                                            <li><a href="shop-list-full-width.html">shop list full width</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><a href="./View/shop.php">Hoa cưới</a>
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
                                    <li class="breadcrumb-item"><a href="blog-grid-full-width.php">blog</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">blog details</li>
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
                    <div class="col-lg-3 order-2">
                        <div class="blog-sidebar-wrapper">
                            <div class="blog-sidebar">
                                <h4 class="title">search</h4>
                                <div class="sidebar-serch-form">
                                    <form action="#">
                                        <input type="text" class="search-field" placeholder="search here">
                                        <button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                            </div> <!-- single sidebar end -->
                            <div class="blog-sidebar">
                                <h4 class="title">categories</h4>
                                <ul class="blog-archive blog-category">
                                    <li><a href="#">Rose (10)</a></li>
                                    <li><a href="#">Orchid (08)</a></li>
                                    <li><a href="#">jasmine (07)</a></li>
                                    <li><a href="#">Daisy (14)</a></li>
                                    <li><a href="#">Lily (10)</a></li>
                                </ul>
                            </div> <!-- single sidebar end -->
                            <div class="blog-sidebar">
                                <h4 class="title">Blog Archives</h4>
                                <ul class="blog-archive">
                                    <li><a href="#">January (10)</a></li>
                                    <li><a href="#">February (08)</a></li>
                                    <li><a href="#">March (07)</a></li>
                                    <li><a href="#">April (14)</a></li>
                                    <li><a href="#">May (10)</a></li>
                                </ul>
                            </div> <!-- single sidebar end -->
                            <div class="blog-sidebar">
                                <h4 class="title">recent post</h4>
                                <div class="recent-post">
                                    <div class="recent-post-item">
                                        <div class="product-thumb">
                                            <a href="blog-details.html">
                                                <img src="assets/img/blog/blog-large-4.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="recent-post-description">
                                            <div class="product-name">
                                                <h4><a href="blog-details.html">Auctor gravida enim</a></h4>
                                                <p>march 10 2019</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="recent-post-item">
                                        <div class="product-thumb">
                                            <a href="blog-details.html">
                                                <img src="assets/img/blog/blog-large-6.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="recent-post-description">
                                            <div class="product-name">
                                                <h4><a href="blog-details.html">gravida auctor dnim</a></h4>
                                                <p>march 18 2019</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="recent-post-item">
                                        <div class="product-thumb">
                                            <a href="blog-details.html">
                                                <img src="assets/img/blog/blog-large-7.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="recent-post-description">
                                            <div class="product-name">
                                                <h4><a href="blog-details.html">enim auctor gravida</a></h4>
                                                <p>march 14 2019</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- single sidebar end -->
                            <div class="blog-sidebar">
                                <h4 class="title">Tags</h4>
                                <ul class="blog-tags">
                                    <li><a href="#">camera</a></li>
                                    <li><a href="#">computer</a></li>
                                    <li><a href="#">bag</a></li>
                                    <li><a href="#">watch</a></li>
                                    <li><a href="#">smartphone</a></li>
                                    <li><a href="#">shoes</a></li>
                                </ul>
                            </div> <!-- single sidebar end -->
                        </div>
                    </div>
                    <div class="col-lg-9 order-1">
                        <!-- blog single item start -->
                        <div class="blog-post-item blog-grid">
                            <div class="blog-post-thumb">
                                <img src="assets/img/blog/blog-details-1.jpg" alt="">
                                <div class="post-date">
                                    <p class="date">10</p>
                                    <p class="month">May</p>
                                </div>
                            </div>
                            <div class="post-info-wrapper">
                                <div class="entry-header">
                                    <h2 class="entry-title">Flowers bouquet pink stick for all flower lovers</h2>
                                    <div class="post-meta">
                                        <div class="post-author">
                                            Written by: <a href="#">Admin</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="entry-summary">
                                    <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate perferendis
                                        consequuntur illo aliquid nihil ad neque, debitis praesentium libero ullam
                                        asperiores exercitationem deserunt inventore facilis, officiis,</p>
                                    <blockquote>
                                        <p>Quisque semper nunc vitae erat pellentesque, ac placerat arcu consectetur.
                                            In
                                            venenatis elit ac ultrices convallis. Duis est nisi, tincidunt ac urna sed,
                                            cursus blandit lectus. In ullamcorper sit amet ligula ut eleifend. Proin
                                            dictum
                                            tempor ligula, ac feugiat metus. Sed finibus tortor eu scelerisque
                                            scelerisque.</p>
                                    </blockquote>
                                    <p>aliquam maiores asperiores recusandae commodi blanditiis ipsum tempora culpa
                                        possimus assumenda ab quidem a voluptatum quia natus? Ex neque, saepe
                                        reiciendis
                                        quasi velit perspiciatis error vel quas quibusdam autem nesciunt voluptas odit
                                        quis
                                        dignissimos eos aspernatur voluptatum est repellat. Pariatur praesentium,
                                        corrupti
                                        deserunt ducimus quo doloremque nostrum aspernatur saepe cupiditate sit autem
                                        exercitationem debitis, maiores vitae perferendis nemo? Voluptas illo, animi
                                        temporibus quod earum molestias eaque, iure rem amet autem dignissimos officia
                                        dolores numquam distinctio esse voluptates optio pariatur aspernatur omnis?
                                        Ipsam
                                        qui commodi velit natus reiciendis quod quibusdam nemo eveniet similique animi!</p>
                                    <div class="tag-line">
                                        <h5>tag :</h5>
                                        <a href="#">Orchid</a>,
                                        <a href="#">Daisy</a>,
                                        <a href="#">Jasmine</a>,
                                    </div>
                                    <div class="blog-share-link">
                                        <h5>share :</h5>
                                        <div class="blog-social-icon">
                                            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                            <a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a>
                                            <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- blog single item end -->

                        <!-- comment area start -->
                        <div class="comment-section section-space">
                            <h3>03 comment</h3>
                            <ul>
                                <li>
                                    <div class="author-avatar">
                                        <img src="assets/img/blog/comment-icon.png" alt="">
                                    </div>
                                    <div class="comment-body">
                                        <span class="reply-btn"><a href="#">reply</a></span>
                                        <h5 class="comment-author">admin</h5>
                                        <div class="comment-post-date">
                                            20 nov, 2019 at 9:30pm
                                        </div>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim maiores
                                            adipisci optio ex, laboriosam facilis non pariatur itaque illo sunt?</p>
                                    </div>
                                </li>
                                <li class="comment-children">
                                    <div class="author-avatar">
                                        <img src="assets/img/blog/comment-icon.png" alt="">
                                    </div>
                                    <div class="comment-body">
                                        <span class="reply-btn"><a href="#">reply</a></span>
                                        <h5 class="comment-author">admin</h5>
                                        <div class="comment-post-date">
                                            20 nov, 2019 at 9:30pm
                                        </div>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim maiores
                                            adipisci optio ex, laboriosam facilis non pariatur itaque illo sunt?</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="author-avatar">
                                        <img src="assets/img/blog/comment-icon.png" alt="">
                                    </div>
                                    <div class="comment-body">
                                        <span class="reply-btn"><a href="#">reply</a></span>
                                        <h5 class="comment-author">admin</h5>
                                        <div class="comment-post-date">
                                            20 nov, 2019 at 9:30pm
                                        </div>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim maiores
                                            adipisci optio ex, laboriosam facilis non pariatur itaque illo sunt?</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- comment area end -->

                        <!-- start blog comment box -->
                        <div class="blog-comment-wrapper">
                            <h3>leave a reply</h3>
                            <p>Your email address will not be published. Required fields are marked *</p>
                            <form action="#">
                                <div class="comment-post-box">
                                    <div class="row">
                                        <div class="col-12">
                                            <label>comment</label>
                                            <textarea name="commnet" placeholder="Write a comment"></textarea>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 mb-sm-20">
                                            <label>Name</label>
                                            <input type="text" class="coment-field" placeholder="Name">
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 mb-sm-20">
                                            <label>Email</label>
                                            <input type="text" class="coment-field" placeholder="Email">
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 mb-sm-20">
                                            <label>Website</label>
                                            <input type="text" class="coment-field" placeholder="Website">
                                        </div>
                                        <div class="col-12">
                                            <div class="coment-btn mt-30">
                                                <input class="btn btn__bg" type="submit" name="submit" value="post comment">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- start blog comment box -->
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