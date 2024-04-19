<?php
if (!isset($_SESSION['laclac_khachang'])) {
    header('location:?View=login');
} else {
    $kh = $_SESSION['laclac_khachang'];
}
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
                                <h1>my account</h1>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../index.php"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">my account</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- my account wrapper start -->
        <div class="my-account-wrapper section-space pb-0">
            <div class="container">
                <div class="section-bg-color">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- My Account Page Start -->
                            <div class="myaccount-page-wrapper">
                                <!-- My Account Tab Menu Start -->
                                <div class="row">
                                    <div class="col-lg-3 col-md-4">
                                        <div class="myaccount-tab-menu nav" role="tablist">
                                            <a href="#dashboad" class="active" data-toggle="tab"><i class="fa fa-dashboard"></i>
                                                Dashboard</a>
                                            <a href="#orders" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i>
                                                Đơn hàng</a>                                       
                                            <a href="#address-edit" data-toggle="tab"><i class="fa fa-map-marker"></i>
                                                Địa chỉ</a>
                                            <a href="#account-info" data-toggle="tab"><i class="fa fa-user"></i> Thông tin cá nhân</a>
                                            <a href="?View=logout"><i class="fa fa-sign-out"></i> Đăng xuất</a>
                                        </div>
                                    </div>
                                    <!-- My Account Tab Menu End -->

                                    <!-- My Account Tab Content Start -->
                                    <div class="col-lg-9 col-md-8">
                                        <div class="tab-content" id="myaccountContent">
                                            <!-- Single Tab Content Start -->
                                            <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h3>Dashboard</h3>
                                                    <div class="welcome">
                                                        <p>Xin chào, <strong><?php echo $kh["FullName"] ?></strong></p>
                                                    </div>                                               
                                                </div>
                                            </div>
                                            <!-- Single Tab Content End -->
                                            <?php
                                            $orderKhachhang = loadOrderUser($kh["AccountID"]);
                                            ?>
                                            <!-- Single Tab Content Start -->
                                            <div class="tab-pane fade" id="orders" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h3>Đơn hàng</h3>
                                                    <div class="myaccount-table table-responsive text-center">
                                                        <table class="table table-bordered">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th>Mã đơn hàng</th>
                                                                    <th>Ngày đặt</th>
                                                                    <th>Trạng thái</th>
                                                                    <th>Tổng tiền</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                    foreach($orderKhachhang as $itemOrder){
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $itemOrder["MaDH"] ;?></td>
                                                                    <td><?php echo $itemOrder["NgayDat"] ;?></td>
                                                                    <td><?php echo $itemOrder["TrangThai"] ;?></td>
                                                                    <td><?php echo number_format($itemOrder["TongTien"]) ;?></td>
                                                                    <td><a href="cart.php" class="btn btn__bg">Hủy</a>
                                                                    </td>
                                                                </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Tab Content End -->
                             

                                            <?php
                                            $addressKhachhang = loadAddressUser($kh["AccountID"]);
                                            ?>
                                            <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h3>Địa chỉ</h3>
                                                  
                                                        <div class="myaccount-table table-responsive text-center">
                                                        <table class="table table-bordered">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th>Mã địa chỉ</th>
                                                                    <th>Họ tên</th>
                                                                    <th>Số điện thoại</th>
                                                                    <th>Địa chỉ</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                    foreach($addressKhachhang as $itemAdd){
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $itemAdd["IdDiaChi"] ;?></td>
                                                                    <td><?php echo $itemAdd["FullName"] ;?></td>
                                                                    <td><?php echo $itemAdd["SDTKH"] ;?></td>
                                                               
                                                                    <td><?php echo "Đường ".$itemAdd["duongKH"].", ".$itemAdd["huyenKH"].", ".$itemAdd["quanKH"].", ".$itemAdd["tinhKH"]; ?></td>
                                                                    <td><a href="cart.php" class="btn btn__bg">Hủy</a>
                                                                    </td>
                                                                </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Tab Content End -->

                                            <!-- Single Tab Content Start -->
                                            <div class="tab-pane fade" id="account-info" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h3>Thông tin tài khoản</h3>
                                                    <div class="account-details-form">
                                                        <form action="#">
                                                            
                                                            <div class="single-input-item">
                                                                <label for="display-name" class="required">Họ và tên</label>
                                                                <input type="text" id="fullname" name="fullname" placeholder="Display Name" />
                                                            </div>
                                                            <div class="single-input-item">
                                                                <label for="email" class="required">Địa chỉ Email</label>
                                                                <input type="email" id="email" placeholder="Email Address" />
                                                            </div>
                                                            <div class="single-input-item">
                                                                    <label for="current-pwd" class="required">Mật khẩu cũ</label>
                                                                    <input type="password" id="current-pwd" placeholder="Current Password" />
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="single-input-item">
                                                                            <label for="new-pwd" class="required">Mật khẩu mới</label>
                                                                            <input type="password" id="new-pwd" placeholder="New Password" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="single-input-item">
                                                                            <label for="confirm-pwd" class="required">Xác nhận mật khẩu mới</label>
                                                                            <input type="password" id="confirm-pwd" placeholder="Confirm Password" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                          
                                                            <div class="single-input-item">
                                                                <button class="btn btn__bg">Save Changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div> <!-- Single Tab Content End -->
                                        </div>
                                    </div> <!-- My Account Tab Content End -->
                                </div>
                            </div> <!-- My Account Page End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- my account wrapper end -->
    </main>
    <!-- main wrapper end -->



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