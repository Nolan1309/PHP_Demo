<?php
$customerAD = new admin();
// $customerList = $customerAD->loadKhachHangAccount();


if (isset($_GET['search'])) {
    $search_query = $_GET['search'];
    if ($search_query != "") {

        $customerList = $customerAD->loadKhachHangAccountByName($search_query);
    } else {
        $customerList = $customerAD->loadKhachHangAccount();
    }
} else {
    $customerList = $customerAD->loadKhachHangAccount();
}


?>



<!-- Content Body Start -->
<div class="content-body">

    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">

        <!-- Page Heading Start -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3>Danh sách tài khoản</span></h3>
            </div>
        </div><!-- Page Heading End -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <a href="?View=customer-them" class="btn btn-success">Thêm tài khoản</a>
            </div>
        </div>
    </div><!-- Page Headings End -->

    <div class="row mbn-30">
        <!-- Invoice List Start -->
        <div class="col-12 mb-30">
            <div class="table-responsive">
                <table class="table table-bordered mb-0">

                    <!-- Table Head Start -->
                    <thead>
                        <tr>
                            <th>Account ID</th>
                            <th>Họ và tên</th>
                            <th>Số điện thoại</th>
                            <th>Email đăng nhập</th>
                            <th>Mật khẩu</th>
                            <th>Ngày tham gia</th>

                            <th>Action</th>
                        </tr>
                    </thead><!-- Table Head End -->

                    <!-- Table Body Start -->
                    <tbody>
                        <?php
                        foreach ($customerList as $customerItem) {

                        ?>
                            <tr>
                                <td><?php echo $customerItem["AccountID"]; ?></td>
                                <td><?php echo $customerItem["FullName"]; ?></td>
                                <td><?php echo $customerItem["Phone"]; ?></td>
                                <td><?php echo $customerItem["Email"]; ?></td>
                                <td><?php echo $customerItem["MatKhau"]; ?></td>
                                <td><?php echo $customerItem["CreateDate"]; ?></td>




                                <td class="action h4">
                                    <div class="table-action-buttons">
                                        <a class="view button button-box button-xs button-primary" href="#"><i class="zmdi zmdi-more"></i></a>
                                        <a class="edit button button-box button-xs button-info" href="#"><i class="zmdi zmdi-edit"></i></a>
                                        <a class="delete button button-box button-xs button-danger" href="#" data-id="<?php echo $customerItem["AccountID"]; ?>"><i class="zmdi zmdi-delete"></i></a>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    var idDanhMuc;
    var dataOtherValue;
    $('.delete').click(function() {

        var result = confirm("Bạn có chắc chắn muốn xóa sản phẩm này không?");

        if (result) {
            idAccount = $(this).data('id');
            $.ajax({
                url: 'View/customer-xuly.php',
                method: 'POST',
                dataType: 'json',
                data: {
                    idAccount: idAccount,
                    action: 'delete'
                },

                success: function(response) {

                    var data = response;

                    var message = data.message;
                    var status = data.status;
                    alert(message);
                    if (status == 'success') {
                        location.reload();
                    }
                },
                error: function(xhr, status, error) {

                    console.error(xhr.responseText);
                }
            });
        } else {
            return;
        }
    });
</script>