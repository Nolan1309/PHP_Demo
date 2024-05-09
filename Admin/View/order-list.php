<?php
$orderAD = new admin();
// $listOrder = $orderAD->loadOrderAdmin();


if (isset($_GET['search'])) {
    $search_query = $_GET['search'];
    if ($search_query != "") {

        $listOrder = $orderAD->loadOrderAdminByNameKH($search_query);
    } else {
        $listOrder = $orderAD->loadOrderAdmin();
    }
} else {
    $listOrder = $orderAD->loadOrderAdmin();
}


?>

<!-- Chưa duyệt / Đã xác nhận / Đã hủy -->

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
                            <th style="padding-left: 45px;">Action</th>
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
                                        <a class="view  button-xs button-primary" href="?View=order-detail&iddonhang=<?php echo $itemListOrder["MaDH"]; ?>" style="padding: 8px;border-radius: 7px;">Chi tiết</a>
                                        <a class="edit button-xs button-success" href="#" style="padding: 8px;border-radius: 7px;" data-id="<?php echo $itemListOrder["MaDH"]; ?>">Xác nhận</a>
                                        <a class="cancel button-xs button-danger" href="#" style="padding: 8px 20px 8px;border-radius: 7px;" data-id="<?php echo $itemListOrder["MaDH"]; ?>">Hủy</a>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    var idDonHang;
    var dataOtherValue;
    $('.edit').click(function() {
        idDonHang = $(this).data('id');
        console.log(idDonHang);

        var result = confirm("Bạn có chắc chắn muốn xác nhận đơn hàng này không?");
        if (result) {
            $.ajax({
                url: 'View/order-list-xuly.php',
                method: 'POST',
                dataType: 'json',
                data: {
                    idDonHang: idDonHang,
                    action: 'edit'
                },

                success: function(response) {
                    // Parse the JSON data
                    var data = response; // response đã là đối tượng JavaScript, không cần gọi JSON.parse()

                    // Access the specific properties you need
                    var message = data.message;
                    var status = data.status;

                    // Display the message in an alert box
                    alert(message);

                    // If the operation was successful, reload the page
                    if (status == 'success') {
                        location.reload();
                    }
                },
                error: function(xhr, status, error) {

                    console.error(xhr.responseText);
                }
            });
        } else {
            return false;
        }
    });
    // $('.updateDM').click(function() {
    //     $('#categoryModal').modal('show');
    //     idDanhMuc = $(this).data('id');


    //     dataOtherValue = $(this).data('other');
    //     $("#tendanhmuc").val(dataOtherValue);


    // });
    $('.cancel').click(function() {
        idDonHang = $(this).data('id');
        var result = confirm("Bạn có chắc chắn muốn hủy đơn hàng này không?");
        if (result) {
            $.ajax({
                url: 'View/order-list-xuly.php',
                method: 'POST',
                dataType: 'json',
                data: {
                    idDonHang: idDonHang,
                    action: 'cancel'
                },

                success: function(response) {
                    // Parse the JSON data
                    var data = response; // response đã là đối tượng JavaScript, không cần gọi JSON.parse()

                    // Access the specific properties you need
                    var message = data.message;
                    var status = data.status;

                    // Display the message in an alert box
                    alert(message);

                    // If the operation was successful, reload the page
                    if (status == 'success') {
                        location.reload();
                    }
                },
                error: function(xhr, status, error) {

                    console.error(xhr.responseText);
                }
            });
        } else {
            return false;
        }
    });

   
</script>