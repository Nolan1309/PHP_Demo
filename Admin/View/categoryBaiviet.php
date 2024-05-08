<?php
$CateblogAD = new admin();
// $CateblogList = $CateblogAD->loadCategoryBaiViet();


if (isset($_GET['search'])) {
    $search_query = $_GET['search'];
    if ($search_query != "") {

        $CateblogList = $CateblogAD->loadCategoryBaiVietByName($search_query);
    } else {
        $CateblogList = $CateblogAD->loadCategoryBaiViet();
    }
} else {
    $CateblogList = $CateblogAD->loadCategoryBaiViet();
}

?>



<!-- Content Body Start -->
<div class="content-body">

    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">

        <!-- Page Heading Start -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3>Danh mục sản phẩm</span></h3>
            </div>
        </div><!-- Page Heading End -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <a href="#" class="btn btn-success addNew">Thêm danh mục phẩm</a>
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
                            <th>STT</th>
                            <th>Tên danh mục</th>


                            <th>Action</th>
                        </tr>
                    </thead><!-- Table Head End -->

                    <!-- Table Body Start -->
                    <tbody>
                        <?php
                        foreach ($CateblogList as $CateblogItem) {

                        ?>
                            <tr>
                                <td><?php echo $CateblogItem["idCategory"]; ?></td>
                                <td><?php echo $CateblogItem["TenDanhMuc"]; ?></td>





                                <td class="action h4">
                                    <div class="table-action-buttons">

                                        <a class="edit button button-box button-xs button-info updateDM" href="#" data-id="<?php echo $CateblogItem["idCategory"]; ?>" data-other="<?php echo $CateblogItem["TenDanhMuc"]; ?>"><i class="zmdi zmdi-edit"></i></a>

                                        <a class="delete button button-box button-xs button-danger deleteDanhMuc" href="#" data-id="<?php echo $CateblogItem["idCategory"]; ?>"><i class="zmdi zmdi-delete"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody><!-- Table Body End -->
                    <!-- Modal Start -->
                    <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel" aria-hidden="true" style="margin-top: 150px;">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="categoryModalLabel">Thêm danh mục</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <label for="themdanhmuc">Tên danh mục</label>
                                    <input type="text" name="themdanhmuc" id="tendanhmuc" style="display: inline-block;width: 100%;">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary closebtn" data-dismiss="modal">Đóng</button>
                                    <button type="button" class="btn btn-primary saveChanges">Lưu</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal End -->
                </table>

            </div>
        </div><!-- Invoice List End -->

    </div>

</div><!-- Content Body End -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    var idDanhMuc;
    var dataOtherValue;
    $('.addNew').click(function() {
        $('#categoryModal').modal('show');
    });
    $('.updateDM').click(function() {
        $('#categoryModal').modal('show');
        idDanhMuc = $(this).data('id');


        dataOtherValue = $(this).data('other');
        $("#tendanhmuc").val(dataOtherValue);


    });


    $('.saveChanges').click(function() {
        var tenDanhMuc = $('#tendanhmuc').val();

        if (tenDanhMuc.trim() === "") {
            alert("Tên danh mục không được để trống.");
            return;
        }

        if (idDanhMuc === undefined) {
            //    console.log("Hi");
            $.ajax({
                url: 'View/categoryBaiviet-xuly.php',
                method: 'POST',
                dataType: 'json',
                data: {
                    tenDanhMuc: tenDanhMuc,
                    action: 'insert'
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
                    // Xử lý lỗi nếu có
                    console.error(xhr.responseText);
                }
            });
        } else {

            $.ajax({
                url: 'View/categoryBaiviet-xuly.php',
                method: 'POST',

                dataType: 'json',
                data: {
                    tenDanhMuc: tenDanhMuc,
                    idDanhMuc: idDanhMuc,
                    action: 'update'
                },

                success: function(response) {
                    var data = response; // response đã là đối tượng JavaScript, không cần gọi JSON.parse()

                    // Access the specific properties you need
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
        }
    });



    $('.deleteDanhMuc').click(function() {

        var result = confirm("Bạn có chắc chắn muốn xóa sản phẩm này không?");

        if (result) {
            idDanhMuc = $(this).data('id');
            if (idDanhMuc === undefined || idDanhMuc === "") {
                alert("ID danh mục không được để trống.");
                return;
            }

            $.ajax({
                url: 'View/categoryBaiviet-xuly.php',
                method: 'POST',
                dataType: 'json',
                data: {
                    idDanhMuc: idDanhMuc,
                    action: 'delete'
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
            return;
        }




    });

    $('.closebtn').click(function() {
        $('#categoryModal').modal('hide');
    });
</script>