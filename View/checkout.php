<?php
if (isset($_SESSION['laclac_khachang']) == false) {
    header('location:?View=login');
} else {
    $kh = $_SESSION['laclac_khachang'];
}
?>
<!-- <!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="meta description">
    <title>Floda - Flower eCommerce Bootstrap 4 Template</title>

    === Favicon ===-->
<!-- <link rel="shortcut icon" href="../Library/assets/img/favicon.ico" type="image/x-icon" /> -->

<!-- Google fonts include -->
<!-- <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,900%7CYesteryear" rel="stylesheet"> -->

<!-- All Vendor & plugins CSS include -->
<!-- <link href="./Library/assets/css/vendor.css" rel="stylesheet"> -->
<!-- Main Style CSS -->
<!-- <link href="./Library/assets/css/style.css" rel="stylesheet"> -->
<style>
    .order-payment-method {
        background-color: #f7f7f7;
        padding: 20px 0px 30px;
        float: right;
    }

    select#tinh,
    select#quan,
    select#phuong {
        color: #555;
        border: 1px solid #ccc;
        padding: 12px 10px;
        width: 100%;
        font-size: 14px;
        background: #f7f7f7;
        display: block !important;
    }

    .nice-select {
        display: none !important;
    }
</style>
<!-- </head> -->

<!-- <body> -->

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
                                            <input type="text" id="f_name" name="f_name" placeholder="First Name" required />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="single-input-item">
                                            <label for="l_name" class="required">Last Name</label>
                                            <input type="text" id="l_name" name="l_name" placeholder="Last Name" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="single-input-item">
                                    <label for="email" class="required">Email Address</label>
                                    <input type="email" id="email" name="email" placeholder="Email Address" required />
                                </div>



                                <script src="https://esgoo.net/scripts/jquery.js"></script>
                                <script>
                                    $(document).ready(function() {
                                        //Lấy tỉnh thành
                                        $.getJSON('https://esgoo.net/api-tinhthanh/1/0.htm', function(data_tinh) {
                                            if (data_tinh.error == 0) {
                                                $.each(data_tinh.data, function(key_tinh, val_tinh) {
                                                    $("#tinh").append('<option value="' + val_tinh.id + '" data-name="' + val_tinh.full_name + '">' + val_tinh.full_name + '</option>');
                                                    // $tinh =val_tinh.id;
                                                });
                                                $("#tinh").change(function(e) {
                                                    var idtinh = $(this).val();
                                                    // var idtinh = $tinh;

                                                    //Lấy quận huyện
                                                    $.getJSON('https://esgoo.net/api-tinhthanh/2/' + idtinh + '.htm', function(data_quan) {
                                                        if (data_quan.error == 0) {
                                                            $("#quan").html('<option value="0">Quận Huyện</option>');
                                                            $("#phuong").html('<option value="0">Phường Xã</option>');
                                                            $.each(data_quan.data, function(key_quan, val_quan) {
                                                                $("#quan").append('<option value="' + val_quan.id + '" data-name="' + val_quan.full_name + '">' + val_quan.full_name + '</option>');
                                                                // $quan =val_quan.id;
                                                            });
                                                            //Lấy phường xã  
                                                            $("#quan").change(function(e) {
                                                                var idquan = $(this).val();
                                                                // var idquan = $quan;
                                                                $.getJSON('https://esgoo.net/api-tinhthanh/3/' + idquan + '.htm', function(data_phuong) {
                                                                    if (data_phuong.error == 0) {
                                                                        $("#phuong").html('<option value="0">Phường Xã</option>');
                                                                        $.each(data_phuong.data, function(key_phuong, val_phuong) {
                                                                            $("#phuong").append('<option value="' + val_phuong.id + '" data-name="' + val_phuong.full_name + '">' + val_phuong.full_name + '</option>');
                                                                        });
                                                                    }
                                                                });
                                                            });

                                                        }
                                                    });
                                                });

                                            }
                                        });
                                    });
                                </script>



                                <div class="single-input-item">
                                    <label for="tinh" class="required" style="display: block;">Tỉnh</label>
                                    <select id="tinh" name="tinh" title="Chọn Tỉnh Thành" required>
                                        <option value="0">Tỉnh Thành</option>
                                    </select>
                                </div>

                                <div class="single-input-item">
                                    <label for="quan" class="required" style="display: block;">Quận</label>
                                    <select id="quan" name="quan" title="Chọn Quận Huyện" required>
                                        <option value="0">Quận Huyện</option>
                                    </select>
                                </div>

                                <div class="single-input-item">
                                    <label for="phuong" class="required" style="display: block;">Phường</label>
                                    <select id="phuong" name="phuong" title="Chọn Phường Xã" required>
                                        <option value="0">Phường Xã</option>
                                    </select>
                                </div>


                                <!-- Đoạn mã JavaScript -->
                                <script>
                                    $(document).ready(function() {
                                                                         
                                        // Xử lý sự kiện gửi biểu mẫu
                                        $("#form_order").submit(function() {
                                            var selectedTinhName = $("#tinh option:selected").data("name");
                                            var selectedQuanName = $("#quan option:selected").data("name");
                                            var selectedPhuongName = $("#phuong option:selected").data("name");
                                            $("<input>").attr("type", "hidden").attr("name", "tinh_name").attr("value", selectedTinhName).appendTo("#form_order");
                                            $("<input>").attr("type", "hidden").attr("name", "quan_name").attr("value", selectedQuanName).appendTo("#form_order");
                                            $("<input>").attr("type", "hidden").attr("name", "phuong_name").attr("value", selectedPhuongName).appendTo("#form_order");
                                        });
                                    });
                                </script>

                                <div class="single-input-item">
                                    <label for="state" class="required">Đường</label>
                                    <input type="text" id="state" name="diachicuthe" placeholder="Nhập số đường" required />
                                </div>



                                <!-- End Địa chỉ -->
                                <div class="single-input-item">
                                    <label for="phone" class="required">Phone</label>
                                    <input type="text" id="phone" name="phone" placeholder="Phone" required />
                                </div>
                                <div class="single-input-item">
                                    <label for="ordernote">Ghi chú</label>
                                    <textarea name="ordernote" id="ordernote" cols="30" rows="3" placeholder="Ghi chú đơn hàng"></textarea>
                                </div>
                                <input type="hidden" name="tamtinh" value="<?php echo $_POST['tamtinh']; ?>">
                                <input type="hidden" name="tiengiamgia" value="<?php echo ($_POST['tiensale']); ?>">
                                <input type="hidden" name="tongtien" value="<?php echo ($_POST['tongtien']); ?>">

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
                            <div class="order-payment-method">

                                <div class="summary-footer-area">
                                    <button type="submit" class="btn btn__bg" name="order" form="form_order">Đặt hàng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- checkout main wrapper end -->
</main>
<!-- main wrapper end -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var form = document.getElementById("form_order");

        form.addEventListener("submit", function(event) {
            // Kiểm tra email
            var email = document.getElementById("email").value;
            if (!validateEmail(email)) {
                alert("Email không hợp lệ.");
                event.preventDefault(); // Ngăn chặn gửi biểu mẫu nếu có lỗi
            }

            // Kiểm tra số điện thoại
            var phone = document.getElementById("phone").value;
            if (!validatePhone(phone)) {
                alert("Số điện thoại không hợp lệ.");
                event.preventDefault(); // Ngăn chặn gửi biểu mẫu nếu có lỗi
            }
        });

        // Hàm kiểm tra email
        function validateEmail(email) {
            var re = /\S+@\S+\.\S+/;
            return re.test(email);
        }

        // Hàm kiểm tra số điện thoại
        function validatePhone(phone) {
            var re = /^\d{10}$/; // Số điện thoại gồm 10 chữ số
            return re.test(phone);
        }
    });
</script>



<!-- Scroll to top start -->
<div class="scroll-top not-visible">
    <i class="fa fa-angle-up"></i>
</div>
<!-- Scroll to Top End -->



<!-- <script src="./Library/assets/js/vendor.js"></script> -->
<!-- Active Js -->
<!-- <script src="./Library/assets/js/active.js"></script> -->
<!-- </body>

</html> -->