<?php
$productCate = new admin();
// $productCateList = $productCate->loadCategorySanPham();



if (isset($_GET['search'])) {
    $search_query = $_GET['search'];
    if ($search_query != "") {

        $productCateList = $productCate->loadCategorySanPhamByName($search_query);
    } else {
        $productCateList = $productCate->loadCategorySanPham();
    }
} else {
    $productCateList = $productCate->loadCategorySanPham();
}

?>



<!-- Content Body Start -->
<div class="content-body">

    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">

        <!-- Page Heading Start -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3>Danh mục sản phẩm</h3>
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
                            <th>STT</th>
                            <th>Tên danh mục</th>


                            <th>Action</th>
                        </tr>
                    </thead><!-- Table Head End -->

                    <!-- Table Body Start -->
                    <tbody>
                        <?php
                        foreach ($productCateList as $CateItem) {

                        ?>
                            <tr>
                                <td><?php echo $CateItem["idDanhmuc"]; ?></td>
                                <td><?php echo $CateItem["tenDanhmuc"]; ?></td>





                                <td class="action h4">
                                    <div class="table-action-buttons">
                                        <a class="view button button-box button-xs button-primary" href="#"><i class="zmdi zmdi-more"></i></a>
                                        <a class="edit button button-box button-xs button-info" href="#"><i class="zmdi zmdi-edit"></i></a>
                                        <a class="delete button button-box button-xs button-danger" href="#"><i class="zmdi zmdi-delete"></i></a>
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