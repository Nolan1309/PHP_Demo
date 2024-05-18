<?php

$total_records_query = "SELECT COUNT(*) AS total FROM product";
$total_records_result = $conn->query($total_records_query);
$total_records_row = $total_records_result->fetch(PDO::FETCH_ASSOC);
$totalItems = $total_records_row['total'];
// $totalItems = 100;

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
<style>
    .ctrl-filter div {
        width: 100%;
        line-height: 20px;
        padding-bottom: 7px;
        font-size: 14px;
    }

    .ctrl-filter a {
        background: #EEE;
        font-size: 13px;
        padding: 2px 12px;
        line-height: 20px;
        display: inline-block;
        position: relative;
        color: #242424;
        border-radius: 12px;
    }

    .range-price .input-group {
        display: flex;
        -webkit-box-align: center;
        align-items: center;
    }

    .range-price .input-group input {
        flex: 1 1 0%;
        width: calc(50% - 4px);
        height: 30px;
        padding: 0px 8px;
        background: #FFF;
        border-radius: 4px;
        text-align: left;
        border: 1px solid #b8b8b8;
        outline: 0px;
        font-size: 13px;
    }

    .range-price .input-group>span {
        width: 7px;
        height: 1px;
        font-size: 0px;
        display: inline-block;
        background: #9a9a9a;
        margin: 0px 4px;
        vertical-align: middle;
    }

    .range-price .search_filter {
        background: #ffffff;
        border: 1px solid #0d5cb6;
        font-size: 12px;
        color: #0d5cb6;
        padding: 5px 15px;
        width: 99px;
        border-radius: 4px;
        text-align: center;
    }
</style>

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
                                    <li class="breadcrumb-item"><a href="?View=home"><i class="fa fa-home"></i></a></li>
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
                            <!-- <div class="sidebar-single">
                                <h3 class="sidebar-title">Giá</h3>
                                <div class="sidebar-body">
                                    <div class="price-range-wrap">
                                        <div class="price-range" data-min="0" data-max="1000"></div>
                                        <div class="range-slider">
                                            <form id="price-filter-form" action="" class="d-flex align-items-center justify-content-between">
                                                <div class="price-input">
                                                    <label for="amount">Từ: </label>
                                                    <input type="text" id="amount">
                                                </div>
                                                <button class="filter-btn">Lọc</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- single sidebar end -->
                            <div class="ctrl-filter range-price">
                                <h3 class="sidebar-title" style="margin-bottom:15px;"> Mức giá</h3>
                                <!-- <h2></h2> -->
                                <div><a class="active" href="javascript:void(0);" onclick="ChangePrice(this, '0','10000000000')">Tất cả</a></div>
                                <div><a href="javascript:void(0);" onclick="ChangePrice(this, '0','250000')">Dưới 250.000</a></div>
                                <div><a href="javascript:void(0);" onclick="ChangePrice(this, '250000','500000')">Từ 250.000 đến 500.000</a></div>
                                <div><a href="javascript:void(0);" onclick="ChangePrice(this, '500000','1000000')">Từ 500.000 đến 1.000.000</a></div>
                                <div><a href="javascript:void(0);" onclick="ChangePrice(this, '1000000','2000000')">Từ 1.000.000 đến 2.000.000</a></div>
                                <div><a href="javascript:void(0);" onclick="ChangePrice(this, '2000000','20000000')">Trên 2.000.000</a></div>
                                <div class="small-text">Range price</div>
                                <div class="input-group"><input id="low-price" pattern="[0-9]*" placeholder="Min" onkeypress="HandleSetPrice(event)" value="0"><span>-</span><input id="high-price" pattern="[0-9]*" placeholder="Max" onkeypress="HandleSetPrice(event)" value="0"></div><a href="javascript:void(0);" class="search_filter" onclick="SetPrice();">Apply</a>
                            </div>


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
                                   
                                </div>
                            </div>
                            <!-- shop product top wrap start -->

                            <!-- product item list wrapper start -->
                            <div class="shop-product-wrap grid-view row mbn-40">
                                <!-- product single item start -->

                                <?php
                                $loadProductSP = $object->loadProductPhanTrang($offset, $itemsPerPage);
                                foreach ($loadProductSP as $row) {
                                    $price_sale = $object->price_sale($row['MaSanPham']);
                                ?>
                                    <div class="col-md-4 col-sm-6">
                                        <!-- product grid start -->
                                        <div class="product-item">
                                            <figure class="product-thumb">
                                                <a href="?View=product-details-affiliate&id=<?php echo $row['MaSanPham'] ?>">
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
                                                <!-- <div class="button-group">

                                                    <a href="#" data-toggle="modal" data-target="#quick_view"><span data-toggle="tooltip" data-placement="left" title="Quick View"><i class="lnr lnr-magnifier"></i></span></a>

                                                </div> -->
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
                                                <a href="?View=product-details-affiliate&id=<?php echo $row['MaSanPham'] ?>">
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
                                                <!-- <div class="button-group-list">
                                                    <a class="btn-big" href="cart.php" data-toggle="tooltip" title="Add to Cart"><i class="lnr lnr-cart"></i>Add to Cart</a>
                                                    <a href="#" data-toggle="modal" data-target="#quick_view"><span data-toggle="tooltip" title="Quick View"><i class="lnr lnr-magnifier"></i></span></a>

                                                </div> -->
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
                                    <li><a class="previous" href="?View=shop&page=<?php echo ($currentPage > 1) ? $currentPage - 1 : 1; ?>"><i class="lnr lnr-chevron-left"></i></a></li>

                                    <!-- Các nút trang -->
                                    <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                                        <li class="<?php echo ($i == $currentPage) ? 'active' : ''; ?>"><a href="?View=shop&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                    <?php endfor; ?>

                                    <!-- Nút next -->
                                    <li><a class="next" href="?View=shop&page=<?php echo ($currentPage < $totalPages) ? $currentPage + 1 : $totalPages; ?>"><i class="lnr lnr-chevron-right"></i></a></li>
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

    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <script>
        function ChangePrice(element, low, high) {
            var links = document.querySelectorAll('.ctrl-filter.range-price a');
            links.forEach(function(link) {
                link.classList.remove('active');
            });
            element.classList.add('active');


            // Gọi hàm xử lý dựa trên khoảng giá
            FilterByPrice(low, high);
        }

       

        // Hàm xử lý khi người dùng nhấp vào nút 'Apply'
        function SetPrice() {
            // Lấy giá trị từ các trường nhập liệu
            var lowPrice = document.getElementById('low-price').value;
            var highPrice = document.getElementById('high-price').value;

            var priceRange = lowPrice + '-' + highPrice;
            FilterByPrice(lowPrice, highPrice);
        }


        function HandleSetPrice(event) {

            if (event.keyCode === 13) {
                SetPrice(); // Nếu có, gọi hàm xử lý khi nhấn nút 'Apply'
            }
        }

        // Hàm xử lý để lọc sản phẩm theo khoảng giá
        function FilterByPrice(low, high) {
            $.ajax({
                url: 'Model/shop-xuly.php', // Sửa tên tệp thành 'shop-xuly.php'

                type: 'POST',
                data: {
                    low: low,
                    high: high // Sửa thành 'high'
                },
                success: function(response) {

                    if (response) {
                        // console.log('Yêu cầu đã được xử lý thành công');
                        window.location.href = response.trim(); // Chuyển hướng trang
                    } else {
                        console.log('Lỗi xảy ra khi xử lý yêu cầu');
                        // Xử lý lỗi hoặc hiển thị thông báo cho người dùng
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Lỗi khi gửi yêu cầu:', error);
                }

            });
        }
    </script>



    <script src="../Library/assets/js/vendor.js"></script>
    <!-- Active Js -->
    <script src="../Library/assets/js/active.js"></script>
</body>