    <!-- controller.php -->
    <?php

    if (isset($_GET['View'])) {
        $View = $_GET['View'];
        switch ($View) {
            case 'login':
                header('location:View/login.php');
                break;
            case 'sign-up':
                include('View/sign-up.php');
                break;
            case 'sign_up':
                $name = $_POST['name'];
                $email = $_POST['email'];
                $sdt = $_POST['sdt'];
                $address = $_POST['address'];
                $password = $_POST['password'];
                $newuser = newUser($name, $email, $sdt, $address, $password);
                if ($newuser) {
                    header('location:View/login.php');
                    break;
                } else {
                    include('View/sign-up.php');
                    break;
                }
            case 'logout':
                if (isset($_SESSION['laclac_khachang'])) {
                    unset($_SESSION['laclac_khachang']);
                    header('location:View/login.php');
                }
                break;
            case 'user':
                include('View/user.php');
                break;
            case 'contact':
                include_once('View/contact-us.php');
                break;
           
            case 'about':
                include('View/about.php');
                break;
            case 'home':
                include('View/home.php');
                break;
            case 'shop':
                include('View/shop.php');
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
            case 'order':
                include('model/cart.php');
                break;
            case 'order-complete':
                include('View/order-complete.php');
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
