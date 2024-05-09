<?php
$orderAD = new admin();
// $listOrder = $orderAD->loadOrderAdmin();


if (isset($_GET['search'])) {
    $search_query = $_GET['search'];
    if ($search_query != "") {

        $listOrder = $orderAD->loadOrderAdminByNameKH($search_query);
    } else {
        $listOrder = $orderAD->loadOrderAdminCancel();
    }
} else {
    $listOrder = $orderAD->loadOrderAdminCancel();
}


?>

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
                                        <!-- <a class="view button button-box button-xs button-primary" href="#"><i class="zmdi zmdi-more"></i></a> -->
                                        <a class="edit button-xs button-success" href="?View=order-detail&iddonhang=<?php echo $itemListOrder["MaDH"]; ?>" style="padding: 8px;border-radius: 7px;" data-id="<?php echo $itemListOrder["MaDH"]; ?>">Chi tiết</a>

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
<!-- 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    var idDonHang;
    var dataOtherValue;
    $('.edit').click(function() {
        idDonHang = $(this).data('id');
        console.log(idDonHang);

        var result = confirm("Bạn có chắc chắn muốn xác nhận đơn hàng này không?");
        if (result) {
            return true;
        } else {
            return false;
        }
    });

    $('.cancel').click(function() {
        idDonHang = $(this).data('id');
        var result = confirm("Bạn có chắc chắn muốn hủy đơn hàng này không?");


    });
</script> -->