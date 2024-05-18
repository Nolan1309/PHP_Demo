<style>
    .size-buttons {
        margin-bottom: 10px;
    }

    .btn-size {
        display: inline-block;
        padding: 5px 20px;
        border: 2px solid #d9534f;
        border-radius: 4px;
        background-color: transparent;
        color: #d9534f;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-size:hover {
        background-color: #d9534f;
        color: #fff;
    }

    .btn-clicked {
        background-color: #d9534f;
        color: #fff;
    }

    .soluongP {
        color: #333;
        font-size: 16px;
        font-weight: normal;
        margin-top: 5px;
        margin-bottom: 10px;
    }

    .price {
        color: #ff0000;
        font-size: 16px;
        font-weight: bold;
        margin-top: 5px;
        margin-bottom: 20px;
    }

    .btn-size-input {
        display: none;
    }

    .btn-size-label {
        display: inline-block;
        padding: 5px 20px;
        border: 2px solid #d9534f;
        border-radius: 4px;
        background-color: transparent;
        color: #d9534f;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-size-label:hover {
        background-color: #d9534f;
        color: #fff;
    }

    .btn-size-input:checked+.btn-size-label {
        background-color: #d9534f;
        color: #fff;
    }

    .input-group-btn .btn {
        width: 30px;
        height: 30px;
        padding: 0;
        font-size: 16px;
        border: none;
        background-color: #f0f0f0;
        cursor: pointer;
    }

    .input-group-btn .btn:hover {
        background-color: #e0e0e0;

    }

    .input-group-btn .btn:active {
        background-color: #d0d0d0;

    }

    /* CSS */
    .input-group {
        display: flex;
        gap: 5px;
        align-items: center;
        margin-bottom: 10px;
    }

    .quantity-left-minus,
    .quantity-right-plus {
        padding: 5px 10px;
        /* Điều chỉnh kích thước của nút */
    }

    .ml-1 {
        margin-left: 5px;
        /* Khoảng cách giữa các nút */
    }

    .form-control.input-number {
        width: 100px !important;
        text-align: center;
        flex: none;
    }
</style>

<body>
    <!-- main wrapper start -->
    <main>
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area common-bg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <h1>product details</h1>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="?View=home"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">product details affiliate</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->
        <?php
        $idproduct = $_GET['id'];
        $object = new Database();
        $hinhanh = $object->loadImgByIDproduct($idproduct);
        $product_dt = $object->loadProductByID($idproduct);
        $sizeproduct = $object->loadProductByID_V2($idproduct);
        $totalReview = $object->loadTotalReview($idproduct);
        $price_sale = $object->price_sale($idproduct);

        $listReview = $object->loadProductByID_V3_Review($idproduct);
        // foreach ($hinhanh as $data) {
        //     echo "Id Hinh Anh: " . $data->IdHinhAnh . "<br>";
        //     echo "Ma San Pham: " . $data->MaSP->idProduct . "<br>"; // Ví dụ truy cập vào thuộc tính IdSanPham của đối tượng Product
        //     echo "Duong Dan: " . $data->DuongDan . "<br>";
        //     echo "<br>";
        // }
        ?>
        <!-- page main wrapper start -->
        <div class="shop-main-wrapper section-space">
            <div class="container">
                <div class="row">
                    <!-- product details wrapper start -->
                    <div class="col-lg-12 order-1 order-lg-2">
                        <!-- product details inner end -->
                        <form action="?View=addtocart" method="POST" enctype="multipart/form-data">
                            <div class="product-details-inner">
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="product-large-slider">
                                            <?php foreach ($hinhanh as $data) { ?>
                                                <div class="pro-large-img img-zoom">
                                                    <img src="Library/images/product/<?php echo $data->DuongDan; ?>" alt="product-details" />
                                                </div>

                                            <?php } ?>
                                        </div>
                                        <div class="pro-nav slick-row-10 slick-arrow-style">
                                            <?php foreach ($hinhanh as $data) { ?>
                                                <div class="pro-nav-thumb">
                                                    <img src="Library/images/product/<?php echo $data->DuongDan; ?>" alt="product-details" />
                                                </div>

                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="product-details-des">
                                            <?php foreach ($product_dt as $datadt) { ?>
                                                <h3 class="product-name"><?php echo $datadt["TenSP"]; ?></h3>
                                                <div class="ratings d-flex">
                                                    <?php foreach ($totalReview as $totalRV) {
                                                        $stars = '';
                                                        if ($totalRV['TongDiemDanhGia'] >= 5) {
                                                            $stars = '5';
                                                        } elseif ($totalRV['TongDiemDanhGia'] >= 3) {
                                                            $stars = '3';
                                                        } elseif ($totalRV['TongDiemDanhGia'] >= 1) {
                                                            $stars = '2';
                                                        }

                                                        // Hiển thị số sao
                                                        for ($i = 1; $i <= 5; $i++) {
                                                            if ($i <= $stars) {
                                                                echo '<span class="good"><i class="fa fa-star"></i></span>';
                                                            } else {
                                                                echo '<span><i class="lnr lnr-star-empty"></i></span>';
                                                            }
                                                        }
                                                    ?>

                                                        <div class="pro-review">
                                                            <span><?php echo $totalRV["SoLuongDanhGia"]; ?> Reviews</span>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                                <div class="price-box">
                                                    <?php
                                                    $firstSize = $sizeproduct[0];
                                                    ?>
                                                    <div class="availability1" style="display: inline;">
                                                        <p id="soluongP_<?php echo $sizeC; ?>" class="soluongP">Số lượng : <?php echo $firstSize["Soluong"]; ?></p>
                                                        <p id="price_<?php echo $sizeC; ?>" class="price">Giá bán : <?php echo number_format($firstSize["GiaBan"]); ?></p>

                                                    </div>
                                                    <?php foreach ($sizeproduct as $size) {
                                                        $sizeC = $size["Size"];

                                                    ?>

                                                        <div class="availability" style="display: inline;">
                                                            <p id="soluongP_<?php echo $sizeC; ?>" class="soluongP" style="display: none;">Số lượng : <?php echo $size["Soluong"]; ?></p>
                                                            <p id="price_<?php echo $sizeC; ?>" class="price" style="display: none;">Giá bán : <?php echo number_format($size["GiaBan"]); ?></p>
                                                            <input type="hidden" name="dongiaban_<?php echo $sizeC; ?>" value="<?php echo number_format($size["GiaBan"]); ?>">

                                                        </div>
                                                    <?php } ?>
                                                    <div class="input-group">
                                                        <span class="input-group-btn">
                                                            <button type="button" class="quantity-left-minus btn" id="tru"><i class="fas fa-minus"></i></button>
                                                        </span>
                                                        <input type="text" id="soluong" name="soluong" class="form-control input-number" value="1" min="1">
                                                        <span class="input-group-btn ml-1">
                                                            <button type="button" class="quantity-right-plus btn" id="cong"><i class="fas fa-plus"></i></button>
                                                        </span>
                                                    </div>


                                                    <?php foreach ($sizeproduct as $size) {
                                                        $sizeC = $size["Size"];
                                                    ?>
                                                        <input value="<?php echo $size['Size']; ?>" required type="radio" name="size" class="btn-size-input" id="<?php echo $sizeC; ?>" onclick="toggleButtonColor(this.id); showPrice('<?php echo $sizeC; ?>')">

                                                        <label for="<?php echo $size["Size"]; ?>" class="btn-size-label"><?php echo $size["Size"]; ?></label>

                                                    <?php } ?>
                                                </div>
                                                <p class="pro-desc">
                                                    <?php
                                                    echo $datadt["MotaNgan"];
                                                    ?>
                                                </p>
                                                <input type="hidden" name="idproduct" value='<?php echo $idproduct; ?>'>

                                                <div class="quantity-cart-box d-flex align-items-center">
                                                    <div class="action_link">
                                                        <!-- <a class="btn btn-cart2" href="?View=cart?id=<?php //echo $idproduct; 
                                                                                                            ?>&size=" id="addToCartButton" onclick="addToCart()">Add to cart</a> -->
                                                        <!-- <a class="btn btn-cart2" href="?View=cart">Add to cart</a> -->
                                                        <button class="btn btn-cart2 addtocart" name="addtocart">Add to cart</button>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- product details inner end -->
                        <!-- product details reviews start -->
                        <div class="product-details-reviews section-space pb-0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="product-review-info">
                                        <ul class="nav review-tab">
                                            <li>
                                                <a class="active" data-toggle="tab" href="#tab_one">description</a>
                                            </li>

                                            <li>
                                                <a data-toggle="tab" href="#tab_three">reviews (1)</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content reviews-tab">
                                            <div class="tab-pane fade show active" id="tab_one">
                                                <div class="tab-one">
                                                    <p>
                                                        <?php
                                                        echo $datadt["MotaDai"];
                                                        ?>
                                                    </p>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <div class="tab-pane fade" id="tab_three">
                                            <form action="#" class="review-form">

                                                <?php foreach ($listReview as $review) { ?>
                                                    <div class="total-reviews">

                                                        <div class="review-box">
                                                            <div class="ratings">
                                                                <?php

                                                                $rating = $review["DiemDanhGia"];
                                                                for ($i = 1; $i <= 5; $i++) {
                                                                    if ($i <= $rating) {
                                                                        // Output a filled star if $i is less than or equal to $rating
                                                                        echo '<span class="good"><i class="fa fa-star"></i></span>';
                                                                    } else {
                                                                        echo '<span><i class="lnr lnr-star-empty"></i></span>';
                                                                    }
                                                                }
                                                                ?>
                                                            </div>
                                                            <div class="post-author">
                                                                <p><span><?php echo $review["fullname"]; ?> -</span><?php echo $review["NgayDanhGia"]; ?></p>
                                                            </div>
                                                            <p>
                                                                <?php echo $review["NoiDung"]; ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <div class="form-group row">
                                                    <div class="col">
                                                        <label class="col-form-label"><span class="text-danger">*</span>
                                                            Your Name</label>
                                                        <input type="text" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col">
                                                        <label class="col-form-label"><span class="text-danger">*</span>
                                                            Your Email</label>
                                                        <input type="email" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col">
                                                        <label class="col-form-label"><span class="text-danger">*</span>
                                                            Your Review</label>
                                                        <textarea class="form-control" required></textarea>
                                                        <div class="help-block pt-10"><span class="text-danger">Note:</span>
                                                            HTML is not translated!
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col">
                                                        <label class="col-form-label"><span class="text-danger">*</span>
                                                            Rating</label>
                                                        &nbsp;&nbsp;&nbsp; Bad&nbsp;
                                                        <input type="radio" value="1" name="rating">
                                                        &nbsp;
                                                        <input type="radio" value="2" name="rating">
                                                        &nbsp;
                                                        <input type="radio" value="3" name="rating">
                                                        &nbsp;
                                                        <input type="radio" value="4" name="rating">
                                                        &nbsp;
                                                        <input type="radio" value="5" name="rating" checked>
                                                        &nbsp;Good
                                                    </div>
                                                </div>
                                                <div class="buttons">
                                                    <button class="sqr-btn" type="submit">Continue</button>
                                                </div>
                                            </form> <!-- end of review-form -->
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product details reviews end -->
                    </div>
                    <!-- product details wrapper end -->
                </div>
            </div>
        </div>
        <!-- page main wrapper end -->

        <?php
        $getIDDanhMuc = $object->GetIDDanhMucByIDProduct($idproduct);
        $relatedProduct = $object->loadProductByIDCategory_LIMIT_5($getIDDanhMuc);

        ?>
        <!-- related product area start -->
        <section class="related-products">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center">
                            <h2>Related Products</h2>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product-carousel--4 slick-row-15 slick-sm-row-10 slick-arrow-style">
                            <!-- product single item start -->
                            <?php foreach ($relatedProduct as $related) {
                                $price_sale = $object->price_sale($related['MaSanPham']);
                            ?>
                                <div class="product-item">
                                    <figure class="product-thumb">

                                        <a href="?View=product-details-affiliate&id=<?php echo $related['MaSanPham'] ?>">
                                            <img class="pri-img" src="Library/images/product/<?php echo $related['AnhSanPham']; ?>" alt="product">
                                            <img class="sec-img" src="Library/images/product/<?php echo $related['AnhSanPham']; ?>" alt="product">
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
                                            <!-- <a href="cart.php" data-toggle="tooltip" data-placement="left" title="Add to Cart"><i class="lnr lnr-cart"></i></a> -->
                                        </div>
                                    </figure>
                                    <div class="product-caption">
                                        <p class="product-name">
                                            <a href="?View=product-details-affiliate&id=<?php echo $related['MaSanPham'] ?>">
                                                <?php echo $related['TenSanPham']; ?>
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
                                                        <?php echo number_format($related['GiaGoc']); ?>
                                                    </del></span>
                                            <?php
                                            } else {
                                                // Nếu giá sale không có sẵn, chỉ hiển thị giá gốc
                                            ?>
                                                <span class="price-regular">
                                                    <?php echo number_format($related['GiaGoc']); ?>
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
        <!-- related product area end -->
    </main>
    <!-- main wrapper end -->




    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->

    <script>
        // JavaScript
        document.addEventListener('DOMContentLoaded', function() {
            var soluongInput = document.getElementById('soluong');
            var truButton = document.getElementById('tru');
            var congButton = document.getElementById('cong');

            // Hàm kiểm tra và cập nhật giá trị của input số lượng
            function updateSoluongValue(newValue) {
                var maxValue = parseInt(soluongInput.max);
                if (newValue <= 0 || isNaN(newValue)) {
                    soluongInput.value = 1;
                } else if (newValue > maxValue) {
                    soluongInput.value = maxValue;
                } else {
                    soluongInput.value = newValue;
                }
            }

            truButton.addEventListener('click', function() {
                var currentValue = parseInt(soluongInput.value);
                updateSoluongValue(currentValue - 1);
            });

            congButton.addEventListener('click', function() {
                var currentValue = parseInt(soluongInput.value);
                updateSoluongValue(currentValue + 1);
            });

            // Kiểm tra và cập nhật giá trị khi có sự thay đổi trong input số lượng
            soluongInput.addEventListener('input', function() {
                updateSoluongValue(parseInt(this.value));
            });
        });


        function toggleButtonColor(buttonId) {
            var buttons = document.querySelectorAll('.btn-size');
            buttons.forEach(function(button) {
                if (button.id === buttonId) {
                    button.classList.add('btn-clicked');
                } else {
                    button.classList.remove('btn-clicked');
                }
            });
            addToCart();
        }

        function addToCart() {
            // Lấy id sản phẩm và size được chọn
            var productId = <?php echo $idproduct; ?>;
            var selectedSizeElement = document.querySelector('input[name="size"]:checked');
            if (selectedSizeElement !== null) {
                var selectedSize = selectedSizeElement.nextElementSibling.innerText;
                var price = document.getElementById('price_' + selectedSize);
                if (price !== null) {
                    var priceText = price.innerText.trim().replace('Giá bán : ', '').replace(/\D/g, '');
                    console.log("ID Sản phẩm: " + productId);
                    console.log("Size đã chọn: " + selectedSize);
                    console.log("Giá tiền: " + priceText);
                } else {
                    console.error('Price element not found.');
                }
            } else {
                console.error('Selected size element not found.');
                alert('Please select a size before adding to cart.');
            }
        }


        var allAvailabilities = document.querySelectorAll('.availability1');
        allAvailabilities.forEach(function(availability, index) {
            if (index !== 0) {
                availability.style.display = 'none';
            }
        });

        function showPrice(size) {
            // Ẩn tất cả các giá trị
            var allPrices = document.querySelectorAll('.price');
            allPrices.forEach(function(price) {
                price.style.display = 'none';
            });

            // Ẩn tất cả các số lượng
            var allQuantities = document.querySelectorAll('.soluongP');
            allQuantities.forEach(function(quantity) {
                quantity.style.display = 'none';
            });

            // Hiển thị giá và số lượng của kích thước đã chọn
            var selectedPrice = document.getElementById('price_' + size);
            var selectedQuantity = document.getElementById('soluongP_' + size); // Sửa đổi đây
            if (selectedPrice && selectedQuantity) {
                selectedPrice.style.display = 'block';
                selectedQuantity.style.display = 'block'; // Thay vì inline-block để hiển thị số lượng
            } else {
                console.error('Price or quantity for size ' + size + ' not found.');
            }
        }
    </script>


    <!-- All vendor & plugins & active js include here -->
    <!--All Vendor Js -->
    <script src="../Library/assets/js/vendor.js"></script>
    <!-- Active Js -->
    <script src="../Library/assets/js/active.js"></script>
</body>

</html>