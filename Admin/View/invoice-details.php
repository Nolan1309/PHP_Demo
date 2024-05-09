<?php


if (isset($_GET['id-invoice'])) {

    $iddonhang = $_GET['id-invoice'];

    $invoiceAdmin = new admin();

    $invoiceList = $invoiceAdmin->loadOrderAdminActiveByMaDonhang($iddonhang);
    $invoiceDetail = $invoiceAdmin->loadOrderDetailAdminActive($iddonhang);
} else {
    $alert = "Sản phẩm không tìm thấy ID !";
    echo "<script> alert('$alert');  </script>";
    echo "<script>window.location.href='?View=invoice';</script>";
}


?>



<div class="content-body">

    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">

        <!-- Page Heading Start -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3>Chi tiết hóa đơn</h3>
            </div>
        </div><!-- Page Heading End -->

    </div><!-- Page Headings End -->
    <?php
    foreach ($invoiceList as $itemInvoice) {

    ?>
        <div class="row mbn-30">

            <!--Invoice Head Start-->
            <div class="col-12 mb-30">
                <div class="invoice-head">

                    <h2 class="fw-700 mb-15">Hóa Đơn #<?php echo $itemInvoice["MaDH"]; ?></h2>
                    <hr>
                    <div class="d-flex justify-content-between row mbn-20">
                        <!--Invoice Form-->
                        <div class="text-left col-12 col-sm-auto mb-20">
                            <h4 class="fw-600">Khách hàng : <?php echo $itemInvoice["TenKH"]; ?></h4>
                            <p style="margin: 0;">Địa chỉ: <?php echo $itemInvoice["duongKH"] . ", " . $itemInvoice["huyenKH"] . ", " . $itemInvoice["quanKH"] . ", " . $itemInvoice["tinhKH"]; ?></p>
                            <p style="margin: 0;">SĐT: <?php echo $itemInvoice["SDTKH"]; ?>
                            <p style="margin: 0;">Email: <?php echo $itemInvoice["Email"]; ?>
                        </div>
                        <!--Invoice To-->
                        <div class="text-left text-sm-right col-12 col-sm-auto mb-20">
                            <!-- <h4 class="fw-600">Tyler Meyer</h4>
                            <p>25 seventh North center <br>USA South Road -3125. <br>
                                +112 666 4558 99 <br>
                                info@adomx.com</p> -->
                            <?php
                            // Chuỗi ngày từ cơ sở dữ liệu
                            $date_from_database = $itemInvoice["NgayDat"];

                            // Chuyển đổi định dạng sử dụng strtotime và date
                            $formatted_date = date('d-m-Y', strtotime($date_from_database));

                            // In ra ngày đã định dạng lại

                            ?>

                            <p><span class="text-heading fw-600">Ngày đặt:</span> <?php echo $formatted_date; ?> <br>
                                <span class="text-heading fw-600">Tình trạng:</span> <?php echo $itemInvoice["TrangThai"]; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!--Invoice Head End-->

            <!--Invoice Details Table Start-->
            <div class="col-12 mb-30">
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th><span>Tên sản phẩm</span></th>
                                <th class="text-right"><span>Số lượng</span></th>
                                <th class="text-right"><span>Đơn giá</span></th>
                                <th class="text-right"><span>Thành tiền</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($invoiceDetail as $itemDetail) {
                            ?>
                                <tr>
                                    <td>#<?php echo $itemDetail["MaSP"]; ?></td>
                                    <td><?php echo $itemDetail["TenSP"]; ?></td>
                                    <td class="text-right"><?php echo $itemDetail["soluong"]; ?>5</td>
                                    <td class="text-right"><?php echo $itemDetail["dongia"]; ?></td>
                                    <td class="text-right"><?php echo $itemDetail["thanhtien"]; ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>

                    </table>
                </div>
            </div>
            <!--Invoice Details Table End-->

            <?php
            // Giá tiền từ cơ sở dữ liệu
            $price_from_tienhang = $itemInvoice["TienHang"];
            $price_from_tiengiam = $itemInvoice["TienGiam"];
            $price_from_database = $itemInvoice["TongTien"];

            // Định dạng lại giá tiền
            $price_tienhang = number_format($price_from_tienhang, 0, ',', '.');
            $price_tiengiam = number_format($price_from_tiengiam, 0, ',', '.');

            $total_price = number_format($price_from_database, 0, ',', '.');

            // In ra giá tiền đã định dạng lại

            ?>

            <!--Invoice Total Start-->
            <div class="col-12 d-flex justify-content-end mb-15">
                <div class="text-right">
                    <h6>Tổng tiền hàng: <?php echo $price_tienhang; ?></h6>
                    <h6>Giảm giá: <?php echo $price_tiengiam; ?></h6>
                    <hr class="mb-10">
                    <h3 class="fw-600 mb-0">Tổng tiền: <?php echo $total_price; ?></h3>
                </div>
            </div>
            <!--Invoice Total Start-->

            <div class="col-12 mb-15">
                <hr>
            </div>

            <!--Invoice Action Button Start-->
            <div class="col-12 d-flex justify-content-end mb-30">
                <div class="buttons-group">
                    <button class="button button-outline button-primary">Download PDF</button>
                    <button class="button button-outline button-info">Send Print</button>
                    <button class="button button-outline button-secondary">Payment Process</button>
                </div>
            </div>
            <!--Invoice Action Button Start-->

        </div>
    <?php
    }
    ?>
</div><!-- Content Body End -->