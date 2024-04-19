<?php
$orderAD = new admin();
$listOrder = $orderAD->loadOrderAdmin();
?>


<!-- Content Body Start -->

<div class="content-body">

    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">

        <!-- Page Heading Start -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3>Danh sách đơn hàng</h3>
            </div>
        </div><!-- Page Heading End -->

    </div><!-- Page Headings End -->

    <div class="row">

        <!--Order List Start-->
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-vertical-middle">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Mã KH</th>
                            <th>Tên KH</th>
                            <th>Ngày đặt</th>
                            <th>Tiền hàng</th>
                            <th>Giảm giá</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($listOrder as $itemListOrder) {

                        ?>
                            <tr>
                                <td><?php echo $itemListOrder["MaDH"]; ?></td>
                                <td><?php echo $itemListOrder["TenKH"]; ?></td>
                                <td><?php echo $itemListOrder["MaKH"]; ?></td>
                                <td><?php echo $itemListOrder["NgayDat"]; ?></td>
                                <td><?php echo $itemListOrder["TienHang"]; ?></td>
                                <td><?php echo $itemListOrder["TienGiam"]; ?></td>
                                <td><?php echo $itemListOrder["TongTien"]; ?></td>
                                <td><span class="badge badge-danger"><?php echo $itemListOrder["TrangThai"]; ?></span></td>



                                <td class="action h4">
                                    <div class="table-action-buttons">
                                        <a class="view button button-box button-xs button-primary" href="order-details.php"><i class="zmdi zmdi-more"></i></a>
                                        <a class="edit button button-box button-xs button-info" href="#"><i class="zmdi zmdi-edit"></i></a>
                                        <a class="delete button button-box button-xs button-danger" href="#"><i class="zmdi zmdi-delete"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!--Order List End-->

    </div>

</div><!-- Content Body End -->