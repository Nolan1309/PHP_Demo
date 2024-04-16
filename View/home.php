<main>
    <!-- Bắt đầu slide trình chiếu event -->
    <section class="slider-area">
        <div class="hero-slider-active slick-arrow-style slick-arrow-style_hero slick-dot-style">
            <?php
            $object = new Database();
            $bannerData = $object->loadBanner();

            $bannerList = array();
            foreach ($bannerData as $data) {
                $cateProduct = new CategoryProduct();
                $cateProduct->idDanhmuc = $data['idDanhMucProduct'];

                $banner = new Banner(); // Create a Banner object
                $banner->anhBanner  = $data['anhBanner'];
                $banner->tenBanner = $data['tenBanner'];
                $banner->idDanhMucProduct = $cateProduct;
                $banner->idBanner = $data['idBanner'];
               

                $bannerList[] = $banner;
            }

            foreach ($bannerList as $row) {
            ?>
                <div class="hero-single-slide ">
                    <div class="hero-slider-item_3 bg-img" data-bg="Library/images/banner/<?php echo $row->anhBanner; ?>">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="hero-slider-content slide-1">
                                        <!-- <span>valentine gift</span> -->

                                        <h1><?php echo $row->tenBanner; ?></h1>

                                        <!-- <h2>& Feeling love</h2> -->
                                        <a href="?View=shop&iddanhmuc=<?php echo $row->idDanhMucProduct->idDanhmuc; ?>" class="btn-hero">shop now</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- <div class="hero-single-slide">
                <div class="hero-slider-item_3 bg-img" data-bg="./Library/assets/img/slider/home3-slide2.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="hero-slider-content slide-2">
                                    <span>valentine gift</span>
                                    <h1>Fresh Your Mind</h1>
                                    <h2>& Feeling love</h2>
                                    <a href="./View/shop.php" class="btn-hero">shop now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </section>
    <!-- Kết thúc slide trình chiếu event -->

    <!-- Services policy start-->
    <section class="service-policy-area section-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <!-- start policy single item -->
                    <div class="service-policy-item">
                        <div class="icons">
                            <img src="./Library/assets/img/icon/free_shipping.png" alt="">
                        </div>
                        <div class="policy-terms">
                            <h5>free shipping</h5>
                            <p>Free shipping all order</p>
                        </div>
                    </div>
                    <!-- end policy single item -->
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <!-- start policy single item -->
                    <div class="service-policy-item">
                        <div class="icons">
                            <img src="./Library/assets/img/icon/support247.png" alt="">
                        </div>
                        <div class="policy-terms">
                            <h5>SUPPORT 24/7</h5>
                            <p>Support 24 hours a day</p>
                        </div>
                    </div>
                    <!-- end policy single item -->
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <!-- start policy single item -->
                    <div class="service-policy-item">
                        <div class="icons">
                            <img src="./Library/assets/img/icon/money_back.png" alt="">
                        </div>
                        <div class="policy-terms">
                            <h5>Money Return</h5>
                            <p>30 days for free return</p>
                        </div>
                    </div>
                    <!-- end policy single item -->
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <!-- start policy single item -->
                    <div class="service-policy-item">
                        <div class="icons">
                            <img src="./Library/assets/img/icon/promotions.png" alt="">
                        </div>
                        <div class="policy-terms">
                            <h5>ORDER DISCOUNT</h5>
                            <p>On every order over $15</p>
                        </div>
                    </div>
                    <!-- end policy single item -->
                </div>
            </div>
        </div>
    </section>
    <!-- Services policy end -->
    <?php
    $product = $object->loadProduct_5_SanPham();

    // $productList = array();
    // foreach ($product as $data) {
    //     $size = new SizeSanPham();
    //     $size->GiaGocSP = $data['GiaGoc'];
    //     $size->GiaSale = $data['GiaSale'];
    //     $size->GiaBan = $data['GiaBan'];

    //     $reviewP = new ReviewProduct();
    //     $cateP = new CategoryProduct();
    //     $cateP->idDanhmuc =  $data['MaDanhMuc'];

    //     $cateProduct->idDanhmuc = $data['idDanhMucProduct'];

    //     $productItem = new Product(); // Create a Banner object
    //     $productItem->idProduct = $data['MaSanPham'];
    //     $productItem->danhmuc = $cateP;
    //     $productItem->TenSP = $data['TenSanPham'];
    //     $productItem->AnhSP = $data['AnhSanPham'];


    //     $productItem->idProduct = $data['GiaGoc'];

    //     $productItem->idProduct = $data['MaSanPham'];

    //     $productItem->idProduct = $data['MaSanPham'];



    //     $bannerList[] = $banner;
    // }
    ?>
    <!-- Top 5 product trending month -->
    <section class="deals-area section-space pt-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h2>Top 5 Product of month</h2>
                        <p>Những sản phẩm được khách hàng mua nhiều nhất...</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-deal-carousel--2 slick-row-15 slick-sm-row-10 slick-arrow-style">

                        <?php foreach ($product as $row) {
                            $price_sale = $object->price_sale($row['MaSanPham']);
                        ?>
                            <div class="deal-slide">
                                <div class="product-item deal-item">
                                    <figure class="product-thumb">

                                        <a href="?View=product-details-affiliate&id=<?php echo $row['MaSanPham'] ?>">
                                            <img class="pri-img" src="Library/images/product/<?php echo $row['AnhSanPham']; ?>" alt="product">
                                            <img class="sec-img" src="Library/images/product/<?php echo $row['AnhSanPham']; ?>" alt="product">
                                        </a>
                                        <div class="product-badge">
                                            <?php
                                            if ($price_sale != 0) {
                                            ?>
                                                <div class="product-label new">
                                                    <span>SALE</span>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="button-group">

                                            <a href="#" data-toggle="modal" data-target="#quick_view"><span data-toggle="tooltip" data-placement="left" title="Quick View"><i class="lnr lnr-magnifier"></i></span></a>
                                            <!-- <a href="./View/cart.php" data-toggle="tooltip" data-placement="left" title="Add to Cart"><i class="lnr lnr-cart"></i></a> -->
                                        </div>
                                    </figure>
                                    <div class="product-caption product-deal-content">
                                        <p class="product-name">
                                            <a href="?View=product-details-affiliate&id=<?php echo $row['MaSanPham'] ?>">
                                                <?php echo $row['TenSanPham']; ?>
                                            </a>
                                        </p>
                                        <div class="ratings d-flex mb-1">
                                            <?php
                                           
                                            $stars = '';
                                            if ($row['DiemDanhGia'] >= 5) {
                                                $stars = '5';
                                            } elseif ($row['DiemDanhGia'] >= 3) {
                                                $stars = '3';
                                            } elseif ($row['DiemDanhGia'] >= 1) {
                                                $stars = '2';
                                            }

                                            // Hiển thị số sao
                                            for ($i = 1; $i <= 5; $i++) {
                                                if ($i <= $stars) {
                                                    echo '<span><i class="lnr lnr-star"></i></span>';
                                                } else {
                                                    echo '<span><i class="lnr lnr-star-empty"></i></span>';
                                                }
                                            }
                                            ?>
                                        </div>
                                        <div class="price-box">
                                            <?php
                                            //$price_sale = price_sale($row['MaSanPham']);
                                            if ($price_sale != 0) {
                                                // Nếu giá sale có sẵn, hiển thị giá sale và giá gốc
                                            ?>
                                                <span class="price-regular">
                                                    <?php echo number_format($price_sale); ?>
                                                </span>
                                                <span class="price-old"><del>
                                                        <?php echo number_format($row['GiaGoc']); ?>
                                                    </del></span>
                                            <?php
                                            } else {
                                                // Nếu giá sale không có sẵn, chỉ hiển thị giá gốc
                                            ?>
                                                <span class="price-regular">
                                                    <?php echo number_format($row['GiaGoc']); ?>
                                                </span>
                                            <?php
                                            }
                                            ?>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Top 5 product trending month kết thúc -->

    <!-- Bắt đầu Banner / Bài show bài viết-->
    <!-- <section class="banner-statistics-right">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="banner-item banner-border">
                            <figure class="banner-thumb">
                                <a href="./View/blog-details.php">
                                    <img src="./Library/assets/img/banner/banner-1.jpg" alt="">
                                </a>
                                <figcaption class="banner-content banner-content-right">
                                    <h2 class="text1">for you</h2>
                                    <h2 class="text2">Tiêu đề blog</h2>
                                    <a class="store-link" href="./View/shop.php">shop now</a>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="banner-item banner-border">
                            <figure class="banner-thumb">
                                <a href="./View/blog-details.php">
                                    <img src="./Library/assets/img/banner/banner-1.jpg" alt="">
                                </a>
                                <figcaption class="banner-content banner-content-right">
                                    <h2 class="text1">for you</h2>
                                    <h2 class="text2">Tiêu đề blog</h2>
                                    <a class="store-link" href="./View/shop.php">shop now</a>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
    <!-- Kết thúc Banner -->

    <!-- Sản phẩm show nhanh - có thể mở rộng -->
    <section class="our-product section-space">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h2>Sản phẩm bán chạy</h2>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="row mtn-40">
                <?php


                $product8sanpham = $object->loadProduct_8_SanPham();


                ?>
                <!-- product single item start -->
                <?php foreach ($product8sanpham as $row) {
                    $price_sale = $object->price_sale($row['MaSanPham']);
                ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="product-item mt-40">
                            <figure class="product-thumb">
                                <a href="?View=product-details-affiliate&id=<?php echo $row['MaSanPham'] ?>">
                                    <img class="pri-img" src="Library/images/product/<?php echo $row['AnhSanPham']; ?>" alt="product">
                                    <img class="sec-img" src="Library/images/product/<?php echo $row['AnhSanPham']; ?>" alt="product">
                                </a>
                                <div class="product-badge">
                                    <?php
                                    if ($price_sale != 0) {
                                    ?>
                                        <div class="product-label new">
                                            <span>SALE</span>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="button-group">

                                    <a href="#" data-toggle="modal" data-target="#quick_view"><span data-toggle="tooltip" data-placement="left" title="Quick View"><i class="lnr lnr-magnifier"></i></span></a>
                                    <!-- <a href="./View/cart.php" data-toggle="tooltip" data-placement="left" title="Add to Cart"><i class="lnr lnr-cart"></i></a> -->
                                </div>
                            </figure>
                            <div class="product-caption">
                                <p class="product-name">
                                    <a href="?View=product-details-affiliate&id=<?php echo $row['MaSanPham'] ?>">
                                        <?php echo $row['TenSanPham']; ?>
                                    </a>
                                </p>
                                <div class="price-box">
                                    <?php
                                    //$price_sale = price_sale($row['MaSanPham']);
                                    if ($price_sale != 0) {
                                        // Nếu giá sale có sẵn, hiển thị giá sale và giá gốc
                                    ?>
                                        <span class="price-regular">
                                            <?php echo number_format($price_sale); ?>
                                        </span>
                                        <span class="price-old"><del>
                                                <?php echo number_format($row['GiaGoc']); ?>
                                            </del></span>
                                    <?php
                                    } else {
                                        // Nếu giá sale không có sẵn, chỉ hiển thị giá gốc
                                    ?>
                                        <span class="price-regular">
                                            <?php echo number_format($row['GiaGoc']); ?>
                                        </span>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <!-- product single item end -->
                <div class="col-12">
                    <div class="view-more-btn">
                        <a class="btn-hero btn-load-more" href="./View/shop.php">view more products</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Kết thúc show sản phẩm -->

    <!-- Top 10 sản phẩm bán chạy -->
    <section class="top-sellers section-space">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h2>Trending Products</h2>
                        <p>Shop Hoa</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-carousel--4 slick-row-15 slick-sm-row-10 slick-arrow-style">
                        <?php


                        $product5sanpham = $object->loadProduct_5_SanPhamSoLuongNhieu();


                        ?>
                        <?php foreach ($product8sanpham as $row) {

                            $price_sale = $object->price_sale($row['MaSanPham']);
                        ?>

                            <!-- product single item start -->
                            <div class="product-item">
                                <figure class="product-thumb">
                                    <a href="?View=product-details-affiliate&id=<?php echo $row['MaSanPham'] ?>">
                                        <img class="pri-img" src="Library/images/product/<?php echo $row['AnhSanPham']; ?>" alt="product">
                                        <img class="sec-img" src="Library/images/product/<?php echo $row['AnhSanPham']; ?>" alt="product">
                                    </a>
                                    <div class="product-badge">
                                        <?php
                                        if ($price_sale != 0) {
                                        ?>
                                            <div class="product-label new">
                                                <span>SALE</span>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="button-group">

                                        <a href="#" data-toggle="modal" data-target="#quick_view"><span data-toggle="tooltip" data-placement="left" title="Quick View"><i class="lnr lnr-magnifier"></i></span></a>
                                        <!-- <a href="./View/cart.php" data-toggle="tooltip" data-placement="left" title="Add to Cart"><i class="lnr lnr-cart"></i></a> -->
                                    </div>
                                </figure>
                                <div class="product-caption">
                                    <p class="product-name">
                                        <a href="?View=product-details-affiliate&id=<?php echo $row['MaSanPham'] ?>">
                                            <?php echo $row['TenSanPham']; ?>
                                        </a>
                                    </p>
                                    <div class="price-box">
                                        <?php
                                        //$price_sale = price_sale($row['MaSanPham']);
                                        if ($price_sale != 0) {
                                            // Nếu giá sale có sẵn, hiển thị giá sale và giá gốc
                                        ?>
                                            <span class="price-regular">
                                                <?php echo number_format($price_sale); ?>
                                            </span>
                                            <span class="price-old"><del>
                                                    <?php echo number_format($row['GiaGoc']); ?>
                                                </del></span>
                                        <?php
                                        } else {
                                            // Nếu giá sale không có sẵn, chỉ hiển thị giá gốc
                                        ?>
                                            <span class="price-regular">
                                                <?php echo number_format($row['GiaGoc']); ?>
                                            </span>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <!-- product single item end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Kết thúc Top 10 sản phẩm bán chạy -->

    <!-- Instagram Feed Area Start -->
    <div class="instagram-feed-area">
        <div class="container">
            <div class="instagram-feed-thumb">
                <div id="instafeed" class="instagram-carousel" data-userid="6666969077" data-accesstoken="6666969077.1677ed0.d325f406d94c4dfab939137c5c2cc6c2">
                </div>
            </div>
        </div>
    </div>
    <!-- Instagram Feed Area End -->

</main>