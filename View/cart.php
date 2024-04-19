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

    <style>
        .buttonThanhToan {
            width: 100%;
        }
    </style>
</head>

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
                                <h1>cart</h1>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../index.php"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">cart</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- cart main wrapper start -->
        <div class="cart-main-wrapper section-space pb-0">
            <div class="container">
                <div class="section-bg-color">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Cart Table Area -->
                            <div class="cart-table table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="pro-thumbnail">Thumbnail</th>
                                            <th class="pro-title">Tên sản phẩm</th>
                                            <th class="pro-price">Giá</th>
                                            <th class="pro-size">Kích thước</th>
                                            <th class="pro-quantity">Số lượng</th>
                                            <th class="pro-subtotal">Thành tiền</th>
                                            <th class="pro-remove">Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (isset($_SESSION['cart_product'])) {
                                            $subtotal = 0;
                                            $dem = 0;
                                            foreach ($_SESSION['cart_product'] as $item_cart) {
                                                $product = productCart($item_cart['MaSP']);
                                                foreach ($product as $itemProduct) {
                                        ?>

                                                    <tr>
                                                        <td class="pro-thumbnail"><a href="#"> <img class="img-fluid" src="./Library/images/product/<?php echo $itemProduct['AnhSP']; ?>" /></a></td>
                                                        <td class="pro-title"><a href="#"><?php echo $itemProduct['TenSP']; ?></a></td>
                                                        <td class="pro-price"><span><?php echo $item_cart['DonGia']; ?></span></td>
                                                        <td class="pro-size"><span><?php echo $item_cart['Size']; ?></span></td>
                                                        <td class="pro-quantity">
                                                            <div class="pro-qty">
                                                                <input type="text" id="quantity" name="quantity" class="form-control input-number text-center" value="<?php echo $item_cart['SoLuong']; ?>" min="1" max="100">
                                                            </div>
                                                        </td>
                                                        <td class="pro-subtotal">
                                                            <span>
                                                                <?php
                                                                $number = str_replace(',', '', $item_cart['DonGia']);
                                                                echo number_format($number * $item_cart['SoLuong']);
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td class="pro-remove">
                                                            <!-- <a href="#" name=delete_cart_product form="delete_cart_product" class="closed"><i class="fa fa-trash-o"></i></a> -->
                                                            <button type="submit" name=delete_cart_product form="delete_cart_product" value="Xoa">Xóa</button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                        <?php $subtotal = $subtotal + $number * $item_cart['SoLuong'];
                                                $dem = $dem + $item_cart['SoLuong'];
                                            }
                                        } else {
                                            echo 'Chưa có sản phẩm trong giỏ hàng của bạn ~~~';
                                        }; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Cart Update Option -->
                            <div class="cart-update-option d-block d-md-flex justify-content-between">
                                <div class="apply-coupon-wrapper">
                                    <form action="#" method="post" class=" d-block d-md-flex">
                                        <input type="text" placeholder="Nhập mã code" required />
                                        <button class="btn btn__bg btn__sqr">Mã giảm giá</button>
                                    </form>
                                </div>
                                <!-- <div class="cart-update">
                                    <a href="#" class="btn btn__bg">Update Cart</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 ml-auto">
                            <!-- Cart Calculation Area -->
                            <form action="?View=thanhtoan2" method="POST">
                                <div class="cart-calculator-wrapper">
                                    <div class="cart-calculate-items">
                                        <h3>Giỏ hàng</h3>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr>
                                                    <td>Tổng tiền</td>
                                                    <td>
                                                        <?php if (isset($_SESSION['cart_product'])) {
                                                            echo number_format($subtotal);
                                                        } else echo '0'; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Giảm giá</td>
                                                    <td>
                                                        <?php
                                                        $giamgia = 0;
                                                        if ($giamgia == 0) {
                                                            echo 0;
                                                        } else {
                                                            echo $giamgia;
                                                        }
                                                        ?>

                                                    </td>
                                                </tr>
                                                <tr class="total">
                                                    <td>Total</td>
                                                    <td class="total-amount">

                                                        <?php if (isset($_SESSION['cart_product'])) {
                                                            echo number_format($subtotal - $giamgia);
                                                            $totalOrder = $subtotal - $giamgia;
                                                        } else echo '0'; ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                    <input type="hidden" name="soluongcart" value="<?php echo $dem; ?>">
                                    <input type="hidden" name="tamtinh" value="<?php if (isset($_SESSION['cart_product'])) {
                                                                                    echo $subtotal;
                                                                                } else echo '0'; ?>">
                                    <input type="hidden" name="tiensale" id="tiensale" value="<?php echo $giamgia; ?>">
                                    <input type="hidden" name="tongtien" id="tongtien" value="<?php echo $totalOrder; ?>">
                                    <button type="submit" name="thanhtoan" class="btn btn__bg d-block buttonThanhToan">Thanh toán</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart main wrapper end -->
    </main>
    <!-- main wrapper end -->


    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->
    <?php
    if (isset($_GET['alert'])) { ?>
        <div id="alertDiv" class="alert alert-success alert-dismissible fade custom-alert " role="alert">
            <strong> <?php if ($_GET['alert'] !== '') {
                            echo ' ' . $_GET['alert'];
                        } ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    <?php  }
    ?>
    <!-- All vendor & plugins & active js include here -->
    <!--All Vendor Js -->
    <script src="../Library/assets/js/vendor.js"></script>
    <!-- Active Js -->
    <script src="../Library/assets/js/active.js"></script>
</body>

</html>