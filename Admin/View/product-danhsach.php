<?php
$productAD = new admin();


if (isset($_GET['search'])) {
    $search_query = $_GET['search'];
    if ($search_query != "") {
       
        $productList = $productAD->loadProductbyName($search_query);
    } else {
        $productList = $productAD->loadProductAdmin();
    }
} else {
    $productList = $productAD->loadProductAdmin();
}




?>

<!-- Content Body Start -->
<div class="content-body">

    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">

        <!-- Page Heading Start -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3>Danh sách sản phẩm</h3>
            </div>
        </div><!-- Page Heading End -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <a href="?View=product-them" class="btn btn-success">Thêm sản phẩm</a>
            </div>
        </div>


        <div class="row">

            <!--Manage Product List Start-->
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-vertical-middle">
                        <thead>
                            <tr>
                                <th>Product ID</th>
                                <th>Photo</th>
                                <th>Product Name</th>
                                <th>Mã loại</th>
                                <th>In Stock</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($productList as $itemProduct) {
                            ?>
                                <tr>
                                    <td><?php echo $itemProduct["idProduct"]; ?></td>
                                    <td><img src=".././Library/images/product/<?php echo $itemProduct["AnhSP"]; ?>" width="100px" height="100px" alt="" class="product-image rounded-circle"></td>
                                    <td><a href="#"><?php echo $itemProduct["TenSP"]; ?></a></td>
                                    <td><?php echo $itemProduct["idDanhmuc"]; ?></a></td>
                                    <td><?php echo $itemProduct["SoLuong"]; ?></td>
                                    <td><?php echo $itemProduct["CreateDate"]; ?></td>

                                    <td>
                                        <div class="table-action-buttons">
                                            <a class="view button button-box button-xs button-primary" href="invoice-details.php"><i class="zmdi zmdi-more"></i></a>
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
            <!--Manage Product List End-->

        </div>

    </div><!-- Content Body End -->