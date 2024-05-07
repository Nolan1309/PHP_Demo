    <!-- controller.php -->
    <?php

    if (isset($_GET['View'])) {
        $View = $_GET['View'];
        switch ($View) {
            case 'loginAD':
                header('location:View/login.php');
                break;
            case 'sign-upAD':
                header('location: View/register.php');
                break;

            case 'logoutAD':
                if (isset($_SESSION['laclac_khachang'])) {
                    unset($_SESSION['laclac_khachang']);
                    header('location:View/login.php');
                }
                break;
            case 'account':
                include('View/my-account.php');
                break;


            case 'order':
                include('View/order-list.php');
                break;
            case 'home':
                include('View/home.php');
                break;
            case 'product':
                include('View/product-danhsach.php');
                break;
            case 'product-them':
                include('View/product-them.php');
                break;
            case 'product-sua':
                include('View/product-sua.php');
                break;
            case 'product-chitiet':
                include('View/product-them.php');
                break;
            case 'product-timkiem':
                include('View/A_TimKiem.php');
                break;
            case 'product-xuly':
                include('View/product-xuly.php');
                break;
            case 'invoice':
                include('View/invoice-list.php');
                break;
            case 'customer':
                include('View/customer.php');
                break;
            case 'categorySanPham':
                include('View/categorySanPham.php');
                break;
            case 'categoryBlog':
                include('View/categoryBaiviet.php');
                break;



            case 'shop-cateproduct':
                include('View/shop-cateproduct.php');
                break;
            case 'products-search':
                include('View/products-category.php');
                break;
            case 'product-details-affiliate':
                include('View/product-details-affiliate.php');
                break;
            case 'addtocart':
                include('Model/Cart.php');
                break;

            case 'cart':
                include('View/cart.php');
                break;
            case 'thanhtoan2':
                include('View/checkout.php');
                break;
            case 'addtoreView':
                if (isset($_SESSION['laclac_khachang'])) {
                    $kh = $_SESSION['laclac_khachang'];
                    print_r($_SESSION['laclac_khachang']);
                    $nd = $_POST['noidung'];
                    $masp = $_POST['masp'];
                    $addtoreView = product_addtoreView($masp, $kh['MaKH'], $nd);
                    if ($addtoreView) {
                        header('location:?View=product-detail&id=' . $masp);
                    }
                } else {
                    header('Location:View/login.php');
                    break;
                }

            case 'timkiem':
                if (isset($_POST['btsearch'])) {
                    include('View/main/timkiem.php');
                }
                break;

            default:
                include('View/home.php');

                break;
        }
    } else {
        include('View/home.php');
    }
