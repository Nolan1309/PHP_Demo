<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="meta description">
    <title>Floda - Flower eCommerce Bootstrap 4 Template</title>

    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="../Library/assets/img/favicon.ico" type="image/x-icon" />

    <!-- Google fonts include -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,900%7CYesteryear" rel="stylesheet">

    <!-- All Vendor & plugins CSS include -->
    <link href="../Library/assets/css/vendor.css" rel="stylesheet">
    <!-- Main Style CSS -->
    <link href="../Library/assets/css/style.css" rel="stylesheet">

    <!--[if lt IE 9]>
<script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<?php
$view = $_GET['View'];
switch ($view) {
    case 'shop-cateproduct':

        if (isset($_GET['id'])) {
            $IDDanhMuc = $_GET['id'];
            $danhmucID = $IDDanhMuc;
        }
        break;
    case 'products-search':
        $IDDanhMuc = product_search($_POST['key']);
        break;

    default:
        # code...
        break;
}
?>
<?php
// Truy vấn để lấy tổng số bản ghi
$total_records_query = "SELECT COUNT(*) AS total FROM product Where idDanhmuc = $danhmucID";
$total_records_result = $conn->query($total_records_query);
$total_records_row = $total_records_result->fetch(PDO::FETCH_ASSOC);
$totalItems = $total_records_row['total'];

// Số sản phẩm trên mỗi trang
$itemsPerPage = 9;
// Tính tổng số trang
$totalPages = ceil($totalItems / $itemsPerPage);

// Xác định trang hiện tại
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $currentPage = $_GET['page'];
} else {
    $currentPage = 1; // Trang mặc định là trang 1
}

// Xác định vị trí của sản phẩm đầu tiên trên trang hiện tại
$offset = ($currentPage - 1) * $itemsPerPage;

?>

<body>
    <!-- main wrapper start -->
    <main>
        <!-- Thanh không dành cho Trang chủ -->
        <div class="breadcrumb-area common-bg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <h1>shop</h1>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../index.php"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">shop</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- Phần Content -->
        <div class="shop-main-wrapper section-space pb-0">
            <div class="container">
                <div class="row">
                    <!-- Thanh bên trái -->
                    <div class="col-lg-3 order-2 order-lg-1">
                        <aside class="sidebar-wrapper">
                            <!-- single sidebar start -->
                            <div class="sidebar-single">
                                <h3 class="sidebar-title">Danh mục hoa</h3>
                                <div class="sidebar-body">
                                    <ul class="shop-categories">
                                        <?php $object = new Database();
                                        $menucate = $object->loadDanhMucMenu();
                                        foreach ($menucate as $row) {
                                        ?>
                                            <li>
                                                <a href="?View=shop-cateproduct&id=<?php echo $row['idDanhmuc']; ?>"><?php echo $row['tenDanhmuc']; ?></a>
                                            </li>
                                        <?php } ?>

                                    </ul>
                                </div>
                            </div>
                            <!-- single sidebar end -->

                            <!-- Sidabar lọc sản phẩm start -->
                            <div class="sidebar-single">
                                <h3 class="sidebar-title">Giá</h3>
                                <div class="sidebar-body">
                                    <div class="price-range-wrap">
                                        <div class="price-range" data-min="0" data-max="1000"></div>
                                        <div class="range-slider">
                                            <form action="#" class="d-flex align-items-center justify-content-between">
                                                <div class="price-input">
                                                    <label for="amount">Từ: </label>
                                                    <input type="text" id="amount">
                                                </div>
                                                <button class="filter-btn">Lọc</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- single sidebar end -->

                            <!-- single sidebar start -->
                            <!-- <div class="sidebar-single">
                                <h3 class="sidebar-title">brand</h3>
                                <div class="sidebar-body">
                                    <ul class="checkbox-container categories-list">
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                <label class="custom-control-label" for="customCheck2">Studio (3)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck3">
                                                <label class="custom-control-label" for="customCheck3">Hastech (4)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck4">
                                                <label class="custom-control-label" for="customCheck4">Quickiin (15)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1">Graphic corner (10)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck5">
                                                <label class="custom-control-label" for="customCheck5">devItems (12)</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div> -->
                            <!-- single sidebar end -->

                            <!-- single sidebar start -->
                            <!-- <div class="sidebar-single">
                                <h3 class="sidebar-title">color</h3>
                                <div class="sidebar-body">
                                    <ul class="checkbox-container categories-list">
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck12">
                                                <label class="custom-control-label" for="customCheck12">black (20)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck13">
                                                <label class="custom-control-label" for="customCheck13">red (6)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck14">
                                                <label class="custom-control-label" for="customCheck14">blue (8)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck11">
                                                <label class="custom-control-label" for="customCheck11">green (5)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck15">
                                                <label class="custom-control-label" for="customCheck15">pink (4)</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div> -->
                            <!-- single sidebar end -->

                            <!-- single sidebar start -->
                            <!-- <div class="sidebar-single">
                                <h3 class="sidebar-title">size</h3>
                                <div class="sidebar-body">
                                    <ul class="checkbox-container categories-list">
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck111">
                                                <label class="custom-control-label" for="customCheck111">S (4)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck222">
                                                <label class="custom-control-label" for="customCheck222">M (5)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck333">
                                                <label class="custom-control-label" for="customCheck333">L (7)</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck444">
                                                <label class="custom-control-label" for="customCheck444">XL (3)</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div> -->
                            <!-- single sidebar end -->

                            <!-- single sidebar start -->
                            <!-- <div class="sidebar-banner">
                                <div class="img-container">
                                    <a href="#">
                                        <img src="../Library/assets/img/banner/sidebar-banner.jpg" alt="">
                                    </a>
                                </div>
                            </div> -->
                            <!-- single sidebar end -->
                        </aside>
                    </div>
                    <!-- sidebar area end -->

                    <!-- Phần sản phẩm -->
                    <div class="col-lg-9 order-1 order-lg-2">
                        <div class="shop-product-wrapper">
                            <!-- shop product top wrap start -->
                            <div class="shop-top-bar">
                                <div class="row align-items-center">
                                    <div class="col-lg-7 col-md-6 order-2 order-md-1">
                                        <div class="top-bar-left">
                                            <div class="product-view-mode">
                                                <a class="active" href="#" data-target="grid-view" data-toggle="tooltip" title="Grid View"><i class="fa fa-th"></i></a>
                                                <a href="#" data-target="list-view" data-toggle="tooltip" title="List View"><i class="fa fa-list"></i></a>
                                            </div>
                                            <div class="product-amount">
                                                <p>Showing 1–5 of 8 results</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-6 order-1 order-md-2">
                                        <div class="top-bar-right">
                                            <div class="product-short">
                                                <p>Sort By : </p>
                                                <select class="nice-select" name="sortby">
                                                    <option value="trending">Relevance</option>
                                                    <option value="sales">Name (A - Z)</option>
                                                    <option value="sales">Name (Z - A)</option>
                                                    <option value="rating">Price (Low &gt; High)</option>
                                                    <option value="date">Rating (Lowest)</option>
                                                    <option value="price-asc">Model (A - Z)</option>
                                                    <option value="price-asc">Model (Z - A)</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- shop product top wrap start -->

                            <!-- product item list wrapper start -->
                            <div class="shop-product-wrap grid-view row mbn-40">
                                <!-- product single item start -->

                                <?php
                                $loadProductSP = $object->loadProductByIDCategory($IDDanhMuc, $offset, $itemsPerPage);
                                foreach ($loadProductSP as $row) {
                                    $price_sale = $object->price_sale($row['MaSanPham']);
                                ?>
                                    <div class="col-md-4 col-sm-6">
                                        <!-- product grid start -->
                                        <div class="product-item">
                                            <figure class="product-thumb">
                                                <a href="product-details-affiliate.php">
                                                    <img class="pri-img" src="Library/images/product/<?php echo $row['AnhSanPham']; ?>" alt="product">
                                                    <img class="sec-img" src="Library/images/product/<?php echo $row['AnhSanPham']; ?>">
                                                </a>
                                                <div class="product-badge">
                                                    <?php
                                                    if ($price_sale != 0) {
                                                    ?>
                                                        <div class="product-label new">
                                                            <span>SALE</span>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                                <div class="button-group">

                                                    <a href="#" data-toggle="modal" data-target="#quick_view"><span data-toggle="tooltip" data-placement="left" title="Quick View"><i class="lnr lnr-magnifier"></i></span></a>

                                                </div>
                                            </figure>
                                            <div class="product-caption">
                                                <p class="product-name">

                                                    <a href="?View=product-details-affiliate&id=<?php echo $row['MaSanPham'] ?>">
                                                        <?php echo $row['TenSanPham']; ?>
                                                    </a>
                                                </p>
                                                <div class="price-box">
                                                    <?php

                                                    if ($price_sale != 0) {

                                                    ?>
                                                        <span class="price-regular">
                                                            <?php echo number_format($price_sale); ?>
                                                        </span>
                                                        <span class="price-old"><del>
                                                                <?php echo number_format($row['GiaGoc']); ?>
                                                            </del></span>
                                                    <?php
                                                    } else {

                                                    ?>
                                                        <span class="price-regular">
                                                            <?php echo number_format($row['GiaGoc']); ?>
                                                        </span>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- product grid end -->

                                        <!-- product list item end -->
                                        <div class="product-list-item">
                                            <figure class="product-thumb">
                                                <a href="product-details-affiliate.php">
                                                    <img class="pri-img" src="Library/images/product/<?php echo $row['AnhSanPham']; ?>" alt="product">
                                                    <img class="sec-img" src="Library/images/product/<?php echo $row['AnhSanPham']; ?>" alt="product">
                                                </a>
                                                <div class="product-badge">
                                                    <?php
                                                    if ($price_sale != 0) {
                                                    ?>
                                                        <div class="product-label new">
                                                            <span>SALE</span>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </figure>
                                            <div class="product-content-list">
                                                <h5 class="product-name">
                                                    <a href="?View=product-details-affiliate&id=<?php echo $row['MaSanPham'] ?>">
                                                        <?php echo $row['TenSanPham']; ?>
                                                    </a>
                                                </h5>
                                                <div class="price-box">
                                                    <?php
                                                    //$price_sale = price_sale($row['MaSanPham']);
                                                    if ($price_sale != 0) {
                                                        // Nếu giá sale có sẵn, hiển thị giá sale và giá gốc
                                                    ?>
                                                        <span class="price-regular">
                                                            <?php echo number_format($price_sale); ?>
                                                        </span>
                                                        <span class="price-old"><del>
                                                                <?php echo number_format($row['GiaGoc']); ?>
                                                            </del></span>
                                                    <?php
                                                    } else {
                                                        // Nếu giá sale không có sẵn, chỉ hiển thị giá gốc
                                                    ?>
                                                        <span class="price-regular">
                                                            <?php echo number_format($row['GiaGoc']); ?>
                                                        </span>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                                <p>
                                                    <?php echo $row['MoTaSanPham']; ?>
                                                </p>
                                                <div class="button-group-list">
                                                    <!-- <a class="btn-big" href="cart.php" data-toggle="tooltip" title="Add to Cart"><i class="lnr lnr-cart"></i>Add to Cart</a> -->
                                                    <a href="#" data-toggle="modal" data-target="#quick_view"><span data-toggle="tooltip" title="Quick View"><i class="lnr lnr-magnifier"></i></span></a>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- product list item end -->
                                    </div>
                                <?php } ?>
                                <!-- product single item start -->
                            </div>
                            <!-- product item list wrapper end -->

                            <!-- start pagination area -->
                            <div class="paginatoin-area text-center">
                                <ul class="pagination-box">
                                    <!-- Nút previous -->
                                    <li><a class="previous" href="?View=shop-cateproduct&page=<?php echo ($currentPage > 1) ? $currentPage - 1 : 1; ?>&id=<?php echo $danhmucID; ?>"><i class="lnr lnr-chevron-left"></i></a></li>

                                    <!-- Các nút trang -->
                                    <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                                        <li class="<?php echo ($i == $currentPage) ? 'active' : ''; ?>"><a href="?View=shop-cateproduct&page=<?php echo $i; ?>&id=<?php echo $danhmucID; ?>"><?php echo $i; ?></a></li>
                                    <?php endfor; ?>

                                    <!-- Nút next -->
                                    <li><a class="next" href="?View=shop-cateproduct&page=<?php echo ($currentPage < $totalPages) ? $currentPage + 1 : $totalPages; ?>&id=<?php echo $danhmucID; ?>"><i class="lnr lnr-chevron-right"></i></a></li>
                                </ul>
                            </div>
                            <!-- end pagination area -->
                        </div>
                    </div>
                    <!-- shop main wrapper end -->
                </div>
            </div>
        </div>
        <!-- page main wrapper end -->
    </main>
    <!-- main wrapper end -->


    <?php
    // include '../Layout/footer.php';
    // include '../Layout/quickview.php';
    // include '../Layout/offcanvas_search.php';
    // include '../Layout/offcanvas_minicart.php';
    ?>



    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->

    <!-- All vendor & plugins & active js include here -->
    <!--All Vendor Js -->

    <script src="../Library/assets/js/vendor.js"></script>
    <!-- Active Js -->
    <script src="../Library/assets/js/active.js"></script>
</body>

</html>