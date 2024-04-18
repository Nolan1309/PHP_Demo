<?php
// if (isset($_SESSION['laclac_khachang'])==false) {
// 	header('location:?view=login'); 
// }else{
//     $kh = $_SESSION['laclac_khachang'];

// }
?>
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
        .order-payment-method {
            background-color: #f7f7f7;
            padding: 20px 0px 30px;
            float: right;
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
                                <h1>checkout</h1>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../index.php"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">checkout</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- checkout main wrapper start -->
        <div class="checkout-page-wrapper section-space pb-0">
            <div class="container">

                <div class="row checkout-row">

                    <!-- Checkout Billing Details -->
                    <div class="col-lg-6">
                        <div class="checkout-billing-details-wrap">
                            <h2>Thông tin khách hàng</h2>
                            <div class="billing-form-wrap">
                                <form action="?View=order" method="post" id="form_order">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="single-input-item">
                                                <label for="f_name" class="required">First Name</label>
                                                <input type="text" id="f_name" placeholder="First Name" required />
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="single-input-item">
                                                <label for="l_name" class="required">Last Name</label>
                                                <input type="text" id="l_name" placeholder="Last Name" required />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="single-input-item">
                                        <label for="email" class="required">Email Address</label>
                                        <input type="email" id="email" placeholder="Email Address" required />
                                    </div>


                                
                                    <script src="https://esgoo.net/scripts/jquery.js"></script>;
                                 
                                    <div class="css_select_div">
                                        <select class="css_select" id="tinh" name="tinh" title="Chọn Tỉnh Thành">
                                            <option value="0">Tỉnh Thành</option>
                                        </select>
                                        <select class="css_select" id="quan" name="quan" title="Chọn Quận Huyện">
                                            <option value="0">Quận Huyện</option>
                                        </select>
                                        <select class="css_select" id="phuong" name="phuong" title="Chọn Phường Xã">
                                            <option value="0">Phường Xã</option>
                                        </select>
                                    </div>





                                    <div class="single-input-item">
                                        <label for="state">Đường</label>
                                        <input type="text" id="state" placeholder="Nhập số đường" />
                                    </div>



                                    <!-- End Địa chỉ -->
                                    <div class="single-input-item">
                                        <label for="phone">Phone</label>
                                        <input type="text" id="phone" placeholder="Phone" />
                                    </div>

                                    <div class="checkout-box-wrap">
                                        <div class="single-input-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="create_pwd">
                                                <label class="custom-control-label" for="create_pwd">Bạn đã có tài khoản ?</label>
                                            </div>
                                        </div>
                                        <div class="account-create single-form-row">
                                            <p>Create an account by entering the information below. If you are a
                                                returning customer please login at the top of the page.</p>
                                            <div class="single-input-item">
                                                <label for="pwd" class="required">Account Password</label>
                                                <input type="password" id="pwd" placeholder="Account Password" required />
                                            </div>
                                        </div>
                                    </div>


                                    <div class="single-input-item">
                                        <label for="ordernote">Ghi chú</label>
                                        <textarea name="ordernote" id="ordernote" cols="30" rows="3" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                    </div>

                                    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.1/axios.min.js" integrity="sha512-bPh3uwgU5qEMipS/VOmRqynnMXGGSRv+72H/N260MQeXZIK4PG48401Bsby9Nq5P5fz7hy5UGNmC/W1Z51h2GQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                                    <script src="/index.js"></script> -->
                                    <div class="order-payment-method">

                                        <div class="summary-footer-area">
                                            <button type="submit" class="btn btn__bg">Đặt hàng</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Order Summary Details -->
                    <div class="col-lg-6">
                        <div class="order-summary-details">
                            <h2>Thông tin thanh toán</h2>
                            <div class="order-summary-content">
                                <!-- Order Summary Table -->
                                <div class="order-summary-table table-responsive text-center">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th><strong>Sản phẩm</strong></th>
                                                <th><strong>Thành tiền</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($_SESSION['cart_product'])) {
                                                $subtotal = 0;
                                                $dem = 0;
                                                foreach ($_SESSION['cart_product'] as $item_cart) {
                                                    $product = productCart($item_cart['MaSP']);
                                                    foreach ($product as $itemProduct) {
                                            ?>
                                                        <tr>
                                                            <td><a href="#"><?php echo $itemProduct['TenSP']; ?> <strong> × <?php echo $item_cart['SoLuong']; ?></strong></a>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $number = str_replace(',', '', $item_cart['DonGia']);
                                                                echo number_format($number * $item_cart['SoLuong']);
                                                                ?>
                                                            </td>
                                                        </tr>

                                                    <?php } ?>
                                            <?php $subtotal = $subtotal + $number * $item_cart['SoLuong'];
                                                    $dem = $dem + $item_cart['SoLuong'];
                                                }
                                            }  ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>Thành tiền</td>
                                                <td><?php echo $_POST['tamtinh'] . ' đ'; ?></td>

                                            </tr>
                                            <!-- <tr>
                                                    <td>VAT (10%)</td>
                                                    <td>$400</td>

                                                </tr> -->
                                            <tr>
                                                <td>Giảm giá</td>
                                                <td><?php echo number_format($_POST['tiensale']) . ' đ'; ?></td>
                                            </tr>

                                            <tr>
                                                <td>Tổng thanh toán</td>
                                                <td><?php echo number_format($_POST['tongtien']) . ' đ'; ?></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- Order Payment Method -->


                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- checkout main wrapper end -->
    </main>
    <!-- main wrapper end -->



    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->

    <!-- All vendor & plugins & active js include here -->
    <!--All Vendor Js -->

    <script src="../Library/js/apiprovince.js"></script>
    <script src="../Library/assets/js/vendor.js"></script>
    <!-- Active Js -->
    <script src="../Library/assets/js/active.js"></script>
</body>

</html>