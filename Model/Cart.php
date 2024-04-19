<div class="row">
    <div class="col-12">
        <center><img class="loading-cart" src="../Library/images/loader.gif" alt=""></center>
    </div>
</div>

<?php
if (isset($_POST['addtocart'])) {
    $idproduct = $_POST['idproduct'];
    $soluong = $_POST['soluong'];
    $size = $_POST['size'];
    $selectedSize = $_POST['size'];
    $dongiaban = $_POST['dongiaban_' . $selectedSize];

    // echo $idproduct."<br>"; 
    // echo $size."<br>"; 
    // echo $soluong."<br>"; 
    // echo $dongiaban."<br>"; 
    $soluongkho = check_product_soluong($idproduct, $size);

    echo $soluongkho;
    if ($soluongkho >= $soluong) {

        $new_cart = array(array('MaSP' => $idproduct, 'SoLuong' => $soluong, 'Size' => $size, 'DonGia' => $dongiaban));

        if (isset($_SESSION['cart_product'])) {
            $found = false; // check cart
            $alert = '';
            foreach ($_SESSION['cart_product'] as $item_cart) {
                if (($item_cart['MaSP'] === $idproduct) and ($item_cart['Size'] === $size)) {
                    if (($item_cart['SoLuong'] + $soluong) > 5) {
                        $found = true;
                        $cart[] = array('MaSP' => $item_cart['MaSP'], 'SoLuong' => ($item_cart['SoLuong']), 'Size' => $item_cart['Size'], 'DonGia' => $item_cart['DonGia']);
                        $alert = 'vượt quá số lượng cho phép';
                    } else {
                        if (($item_cart['SoLuong'] + $soluong) <= $soluongkho) {
                            $cart[] = array('MaSP' => $item_cart['MaSP'], 'SoLuong' => (($item_cart['SoLuong'] + $soluong)), 'Size' => $item_cart['Size'], 'DonGia' => $item_cart['DonGia']);
                            $found = true;
                            $alert = 'Đã thêm vào giỏ hàng';
                        } else {
                            $cart[] = array('MaSP' => $item_cart['MaSP'], 'SoLuong' => ($item_cart['SoLuong']), 'Size' => $item_cart['Size'], 'DonGia' => $item_cart['DonGia']);
                            $found = true;
                            $alert = 'Xin lỗi !!! đã hết hàng';
                        }
                    }
                } else {
                    $cart[] = array('MaSP' => $item_cart['MaSP'], 'SoLuong' => ($item_cart['SoLuong']), 'Size' => $item_cart['Size'], 'DonGia' => $item_cart['DonGia']);
                    $alert = 'Đã thêm vào giỏ hàng';
                }
            }
            if ($found == false) {
                $_SESSION['cart_product'] = array_merge($cart, $new_cart);
            } else {
                $_SESSION["cart_product"] = $cart;
            }
        } else {

            $_SESSION['cart_product'] = $new_cart;
            $alert = 'Đã thêm vào giỏ hàng';
        }
    } else {
        $alert = 'Đã hết hàng';
    }
    header('Location:?View=cart&alert=' . $alert);
}


//Xóa sản phẩm
if (isset($_POST['delete_cart_product'])) {
    $masp = $_POST['productID'];
    $size = $_POST['size'];
    $mau = $_POST['mau'];
    foreach ($_SESSION['cart_product'] as $item_cart) {
        if ($item_cart['MaSP'] == $masp && $item_cart['Size'] == $size and ($item_cart['Mau'] === $mau)) {
        } else {
            $cart[] = array('MaSP' => $item_cart['MaSP'], 'TenSP' => $item_cart['TenSP'], 'SoLuong' => $item_cart['SoLuong'], 'Size' => $item_cart['Size'], 'Mau' => $item_cart['Mau'], 'DonGia' => $item_cart['DonGia']);
        }
        $_SESSION['cart_product'] = $cart;
        $alert = 'Đã xóa thành công';
        header('location:?view=cart&alert=' . $alert);
    }
}



// require 'webroot/PHPMailer/src/Exception.php';
// require 'webroot/PHPMailer/src/PHPMailer.php';
// require 'webroot/PHPMailer/src/SMTP.php';
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
if (isset($_POST['order'])) {
    $fName = $_POST['f_name']; //người nhận hàng
    $lName = $_POST['l_name']; //người nhận hàng
    $email = $_POST['email'];
    $diachicuthe = $_POST['diachicuthe'];
    $phone = $_POST['phone'];
    $ghichu = $_POST['ordernote'];

    // $tinh = $_POST['tinh'];
    // $quan = $_POST['quan'];
    // $phuong = $_POST['phuong'];
    $tinh = $_POST['tinh_name'];
    $quan = $_POST['quan_name'];
    $phuong = $_POST['phuong_name'];



    $tenKH = $fName." ".$lName;
    // $dcnn=$_POST['address']; //địa chỉ người nhận
    // $sdtnn=$_POST['phone'];//số điện thoại người nhận

    $kh = $_SESSION['laclac_khachang'];

    $makh = $kh['AccountID'];
    $tientamtinh = $_POST['tamtinh'];
    $tiengiamgia = $_POST['tiengiamgia'];
    $tt = $_POST['tongtien'];
   

    $talbe = '';
    foreach ($_SESSION['cart_product'] as $item_cart) {
        $product = productCart($item_cart['MaSP']);
        $number = str_replace(',', '', $item_cart['DonGia']);
        $dongia = number_format($number * $item_cart['SoLuong']);
        $talbe = $talbe . '
        <tr>
        <td>' . $product['TenSP'] . '</td>
        <td>' . $item_cart['SoLuong'] . '</td> 
        <td>' . $dongia . '</td>
        </tr>';
    }
    $message = '
        <html>
        <head>
        <title>Đơn hàng của bạn</title>
        <style>
            table {
                font-family: Arial, sans-serif;
                font-size: 14px;
                background-color: #f7f7f7;
                width: 100%;
            }
            th {
                background-color: #333;
                color: #fff;
                font-weight: bold;
                padding: 10px;
            }
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
            }
            th, td {
                text-align: center;
                padding: 10px;
            }
        </style>
        </head>
        <body>
        <p>Cảm ơn bạn đã đặt hàng.</p>
        <table>
        <tr>
        <th>Sản phẩm</th>
        <th>Số lượng</th>
        <th>Giá</th>
        </tr>' . $talbe . '
        </table>
        <p>Tổng cộng: ' . $tt . ' đ</p>
        </body>
        </html>';
      echo  $makh,$tenKH,$phone,$tinh,$quan,$phuong,$diachicuthe,$note,$tientamtinh,$tiengiamgia,$tt;

    $order=order_product($makh,$tenKH,$phone,$tinh,$quan,$phuong,$diachicuthe,$note,$tientamtinh,$tiengiamgia,$tt);
    header('location:?View=order-complete');
    // if($order){
    //     $mail = new PHPMailer(true);
    //     $mail->isSMTP();                                            // sử dụng SMTP
    //     $mail->Host       = 'smtp.gmail.com';                       // SMTP server
    //     $mail->SMTPAuth   = true;                                   // bật chế độ xác thực SMTP
    //     $mail->Username   = 'tungndps21572@fpt.edu.vn';        // tài khoản đăng nhập SMTP
    //     $mail->Password   = 'tfwtuuqfwzpgparm';                         // mật khẩu đăng nhập SMTP
    //     $mail->SMTPSecure = 'tls';                                  // giao thức bảo mật TLS
    //     $mail->Port       = 587;
    //     $mail->setFrom('tungndps21572@fpt.edu.vn', 'Shop Hoa');          // địa chỉ email và tên người gửi
    //     $mail->addAddress($kh['Email'], $kh['TenKH']); // địa chỉ email và tên người nhận
    //     $mail->Subject = ' Shop Hoa - DON HANG CUA BAN';                               // tiêu đề email
    //     $mail->Body    = $message;     
    //     $mail->isHTML(true);                            // định dạng email dưới dạng HTML
    //     // $mail->addAttachment('path/to/file.pdf');       // đính kèm tập tin PDF
    //     if ($mail->send()) {
    //         header('location:?view=order-complete');
    //     } else {
    //         echo 'Email could not be sent';
    //         echo 'Mailer Error: ' . $mail->ErrorInfo;
    //     } 
    // }
}


?>
<br>