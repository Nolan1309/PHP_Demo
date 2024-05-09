<?php


if (isset($_GET['iddonhang'])) {

    $iddonhang = $_GET['iddonhang'];

    $invoiceAdmin = new admin();

    $orderList = $invoiceAdmin->loadOrderAdminByMaDonhang_Cancel($iddonhang);
    $orderDetail = $invoiceAdmin->loadOrderDetailAdmin($iddonhang);
    $soluong = 0;
    foreach ($orderDetail as $item) {
        $soluong += $item["soluong"];
    }
} else {
    $alert = "Sản phẩm không tìm thấy ID !";
    echo "<script> alert('$alert');  </script>";
    echo "<script>window.location.href='?View=order';</script>";
}


?>

<!-- Content Body Start -->
<div class="content-body">

    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">

        <!-- Page Heading Start -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3>Chi tiết đơn hàng</h3>
            </div>
        </div><!-- Page Heading End -->

    </div><!-- Page Headings End -->
    <?php
    foreach ($orderList as $itemOrder) {

    ?>
        <div class="row mbn-30">

            <!--Order Details Head Start-->
            <div class="col-12 mb-30">
                <div class="row mbn-15">
                    <div class="col-12 col-md-4 mb-15">
                        <h4 class="text-primary fw-600 m-0">ID #<?php echo $itemOrder["MaDH"]; ?></h4>
                    </div>

                    <?php

                    $date_from_database = $itemOrder["NgayDat"];
                    $formatted_date = date('d-m-Y', strtotime($date_from_database));
                    ?>
                    <div class="text-left text-md-center col-12 col-md-4 mb-15"><span>Status: <span class="badge badge-round badge-danger"><?php echo $itemOrder["TrangThai"]; ?></span></span></div>
                    <div class="text-left text-md-right col-12 col-md-4 mb-15">
                        <p><?php echo $formatted_date; ?></p>
                    </div>
                </div>
            </div>
            <!--Order Details Head End-->

            <!--Order Details Customer Information Start-->
            <div class="col-12 mb-30">
                <div class="order-details-customer-info row mbn-20">

                    <!--Billing Info Start-->
                    <div class="col-lg-6 col-md-6 col-12 mb-20">
                        <h4 class="mb-25">Thông tin khách hàng</h4>
                        <ul>
                            <li> <span style="width: 100px;">Khách hàng</span> <span><?php echo $itemOrder["TenKH"]; ?></span> </li>

                            <li> <span>Địa chỉ</span> <span><?php echo $itemOrder["duongKH"] . ", " . $itemOrder["huyenKH"] . ", " . $itemOrder["quanKH"] . ", " . $itemOrder["tinhKH"]; ?></span> </li>


                            <li> <span>Email</span> <span><?php echo $itemOrder["Email"]; ?></span> </li>
                            <li> <span>Phone</span> <span><?php echo $itemOrder["SDTKH"]; ?></span> </li>
                        </ul>
                    </div>
                    <!--Billing Info End-->


                    <!--Purchase Info Start-->
                    <div class="col-lg-6 col-md-6 col-12 mb-20">
                        <h4 class="mb-25">Thông tin đơn hàng</h4>
                        <ul>
                            <li> <span  style="width: 100px;">Số lượng hàng</span> <span><?php echo $soluong; ?></span> </li>
                            <li> <span>Giá hàng</span> <span><?php echo $itemOrder["TienHang"]; ?></span> </li>
                            <li> <span>Giảm giá</span> <span><?php echo $itemOrder["TienGiam"]; ?></span> </li>
                            <li> <span>Tổng tiền</span> <span><?php echo $itemOrder["TongTien"]; ?></span> </li>
                            <li> <span >Hình thức</span> <span class="h5 fw-600 text-success">Tiền mặt</span> </li>
                        </ul>
                    </div>
                    <!--Purchase Info End-->

                </div>
            </div>
            <!--Order Details Customer Information Start-->

            <!--Order Details List Start-->
            <div class="col-12 mb-30">
                <div class="table-responsive">
                    <table class="table table-bordered table-vertical-middle">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Photo</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Qualitity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($orderDetail as $itemDetail) {
                            ?>

                                <tr>
                                    <td>#<?php echo $itemDetail["MaSP"]; ?></td>
                                    <td><img src=".././Library/images/product/<?php echo $itemDetail["AnhSP"]; ?>" width="80px" height="80px" alt="" class="product-image rounded-circle"></td>
                                    <td><a href="#"><?php echo $itemDetail["TenSP"]; ?></a></td>
                                    <td><?php echo $itemDetail["dongia"]; ?></td>
                                    <td><?php echo $itemDetail["soluong"]; ?></td>
                                    <td><?php echo $itemDetail["thanhtien"]; ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--Order Details List End-->

        </div>
    <?php  } ?>
</div><!-- Content Body End -->