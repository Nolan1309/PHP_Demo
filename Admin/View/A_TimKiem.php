<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["search_query"])) {

        $search_query = $_POST["search_query"];
        $luutruGiaoDien = $_POST['giaodien'];

        if ($search_query) {
            switch ($luutruGiaoDien) {
                case 'account':
                    include('View/my-account.php');
                    break;
                case 'order':
                    echo '<script>window.location.href = "?View=order&search=' . urlencode($search_query) . '";</script>';
                    break;
                case 'order-cacel':
                    echo '<script>window.location.href = "?View=order-cacel&search=' . urlencode($search_query) . '";</script>';
                    break;

                case 'home':
                    include('View/home.php');
                    break;
                case 'product':
                    echo '<script>window.location.href = "?View=product&search=' . urlencode($search_query) . '";</script>';
                    break;
                case 'invoice':
                    echo '<script>window.location.href = "?View=invoice&search=' . urlencode($search_query) . '";</script>';
                    break;
                case 'customer':
                    echo '<script>window.location.href = "?View=customer&search=' . urlencode($search_query) . '";</script>';
                    break;
                case 'categorySanPham':
                    echo '<script>window.location.href = "?View=categorySanPham&search=' . urlencode($search_query) . '";</script>';
                    break;
                case 'categoryBlog':
                    echo '<script>window.location.href = "?View=categoryBlog&search=' . urlencode($search_query) . '";</script>';
                    break;
            }
        } else {

            switch ($luutruGiaoDien) {
                case 'account':
                    include('View/my-account.php');
                    break;
                case 'order-cacel':
                    echo '<script>window.location.href = "?View=order-cacel";</script>';
                    break;
                case 'home':
                    include('View/home.php');
                    break;
                case 'product':
                    echo '<script>window.location.href = "?View=product";</script>';
                    break;
                case 'invoice':
                    echo '<script>window.location.href = "?View=invoice";</script>';
                    break;
                case 'customer':
                    echo '<script>window.location.href = "?View=customer";</script>';
                    break;
                case 'categorySanPham':
                    echo '<script>window.location.href = "?View=categorySanPham";</script>';
                    break;
                case 'categoryBlog':
                    echo '<script>window.location.href = "?View=categoryBlog";</script>';
                    break;
            }
        }
        exit;
    } else {

        echo "Trường nhập liệu tìm kiếm không được gửi đi.";
        exit;
    }
}
