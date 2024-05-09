<?php
$invoiceAdmin = new admin();
// $invoiceList = $invoiceAdmin->loadOrderAdminActive();


if (isset($_GET['search'])) {
    $search_query = $_GET['search'];
    if ($search_query != "") {

        $invoiceList = $invoiceAdmin->loadOrderAdminActiveByNameKH($search_query);
    } else {
        $invoiceList = $invoiceAdmin->loadOrderAdminActive();
    }
} else {
    $invoiceList = $invoiceAdmin->loadOrderAdminActive();
}


?>



<!-- Content Body Start -->
<div class="content-body">

    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">

        <!-- Page Heading Start -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3>Danh sách hóa đơn</span></h3>
            </div>
        </div><!-- Page Heading End -->

    </div><!-- Page Headings End -->

    <div class="row mbn-30">



        <!-- Invoice List Start -->
        <div class="col-12 mb-30">
            <div class="table-responsive">
                <table class="table table-bordered mb-0">

                    <!-- Table Head Start -->
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
                    </thead><!-- Table Head End -->

                    <!-- Table Body Start -->
                    <tbody>
                        <?php
                        foreach ($invoiceList as $itemInvoice) {

                        ?>
                            <tr>
                                <td><?php echo $itemInvoice["MaDH"]; ?></td>
                                <td><?php echo $itemInvoice["MaKH"]; ?></td>
                                <td><?php echo $itemInvoice["TenKH"]; ?></td>

                                <td><?php echo $itemInvoice["NgayDat"]; ?></td>
                                <td><?php echo $itemInvoice["TienHang"]; ?></td>
                                <td><?php echo $itemInvoice["TienGiam"]; ?></td>
                                <td><?php echo $itemInvoice["TongTien"]; ?></td>
                                <td><span class="badge badge-success"><?php echo $itemInvoice["TrangThai"]; ?></span></td>



                                <td class="action h4">
                                    <div class="table-action-buttons">
                                        <a class="view button-xs button-primary" style="padding: 8px 20px 8px;border-radius: 7px;" href="?View=invoice-detail&id-invoice=<?php echo $itemInvoice['MaDH']; ?>">Chi tiết</a>
                                      
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody><!-- Table Body End -->

                </table>
            </div>
        </div><!-- Invoice List End -->

    </div>

</div><!-- Content Body End -->