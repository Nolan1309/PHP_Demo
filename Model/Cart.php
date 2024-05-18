<?php


?>

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






// require '.././webroot/PHPMailer/src/Exception.php';
// require '.././webroot/PHPMailer/src/PHPMailer.php';
// require '.././webroot/PHPMailer/src/SMTP.php';




// require ".././webroot/PHPMailer_Mail/src/PHPMailer.php";
// require ".././webroot/PHPMailer_Mail/src/Exception.php";
// require ".././webroot/PHPMailer_Mail/src/OAuth.php";
// require ".././webroot/PHPMailer_Mail/src/POP3.php";
// require ".././webroot/PHPMailer_Mail/src/SMTP.php";

$absolute_path = realpath('C:/xampp/htdocs/PHP/WebDemo/webroot/PHPMailer/src/PHPMailer.php');
$absolute_path1 = realpath('C:/xampp/htdocs/PHP/WebDemo/webroot/PHPMailer/src/Exception.php');

$absolute_path4 = realpath('C:/xampp/htdocs/PHP/WebDemo/webroot/PHPMailer/src/SMTP.php');


require_once $absolute_path;
require_once $absolute_path1;
require_once $absolute_path4;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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



    $tenKH = $fName . " " . $lName;
    // $dcnn=$_POST['address']; //địa chỉ người nhận
    // $sdtnn=$_POST['phone'];//số điện thoại người nhận

    $kh = $_SESSION['laclac_khachang'];

    $makh = $kh['AccountID'];
    $tientamtinh = $_POST['tamtinh'];
    $tiengiamgia = $_POST['tiengiamgia'];
    $tt = $_POST['tongtien'];


    $talbe = '';
    foreach ($_SESSION['cart_product'] as $item_cart) {
        $product = productCart_item($item_cart['MaSP']);
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
        table,
        th,
        td {
          border: 1px solid black;
          border-collapse: collapse;
        }
        th,
        td {
          text-align: center;
          padding: 10px;
        }
      </style>
    </head>
    <body>
      
      <table>  
          <tr>
              <td style="padding-top:20px;padding-bottom:10px;padding-left:10px;padding-right:10px">
                  <div style="font-size:17px;margin-bottom:15px"><strong>Cảm ơn quý khách đã đặt hàng tại <a href="http://localhost/PHP/WebDemo/" style="color:#336e51;text-decoration:none" target="_blank" data-saferedirecturl="">ShopHoa</a></strong></div>
                  
              </td>
          </tr>
          <tr>
              <td style="padding-top:10px;padding-bottom:10px;padding-left:10px;padding-right:10px">
                  <table style="border-style:solid;border-color:#f0f2f0;border-width:1px;width:100%" cellpadding="0" cellspacing="0">
                      <tbody><tr>
                          <td style="background-color:#f0f2f0;padding-top:10px;padding-bottom:10px;padding-left:10px;padding-right:10px;font-weight:700"><div>THÔNG TIN ĐƠN HÀNG #24051554367 (15:27:22 GMT+07:00 Ngày 15 tháng 5 năm 2024)</div></td>
                      </tr>
                      <tr>
                          <td style="padding-top:10px;padding-bottom:10px;padding-left:10px;padding-right:10px">
                              <p style="text-align: left;"><b>Địa chỉ giao hàng</b></p>
                              <div style="margin-bottom:20px;text-align: left;"> Sơn Thanh<br>
                                  11/66 Nguyễn Hữu Tiến, Phường Tây Thạnh, Quận Tân Phú, Hồ Chí Minh<br>
                                  Tel: 0365683018
                              </div>
                              <!-- <div style="text-align: left;">  -->
                                  <!-- <b>Phương thức thanh toán:</b>  Thanh toán khi nhận hàng (COD) <br> -->
                                  <!-- <b>Thời gian giao hàng dự kiến:</b> 15/05/2024 15:27 - 15/05/2024 18:00 (Không tính CN &amp; ngày lễ, không bao gồm sản phẩm đặt hàng trước)<br> -->
                                  <!-- <b>Phí vận chuyển:</b> 10,000 ₫ </div> -->
                          </td>
                      </tr>
                  </tbody></table>
              </td>
          </tr>
          <tr>
              <td>
                  <table>
          
                      <tr>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                      </tr>
                      ' . $talbe . ' 
                    </table>
              </td>
          </tr>
      </table>
  
   
     
       <p>Tổng cộng: ' . $tt . ' đ</p> 
    </body>
  </html>
  ';
    //   echo  $makh,$tenKH,$phone,$tinh,$quan,$phuong,$diachicuthe,$note,$tientamtinh,$tiengiamgia,$tt;

    $order = order_product($makh, $email, $tenKH, $phone, $tinh, $quan, $phuong, $diachicuthe, $ghichu, $tientamtinh, $tiengiamgia, $tt);
    // header('location:?View=order-complete');


    if ($order) {
        $mail = new PHPMailer(true);
        $mail->SMTPDebug = 20;
        $mail->isSMTP();                                            // sử dụng SMTP
        $mail->Host       = 'smtp.gmail.com';                       // SMTP server
        $mail->SMTPAuth   = true;                                   // bật chế độ xác thực SMTP
        $mail->Username   = 'tranfc911@gmail.com';        // tài khoản đăng nhập SMTP
        $mail->Password   = 'nqczusexrbohzumn';                         // mật khẩu đăng nhập SMTP
        $mail->SMTPSecure = 'tls';                                  // giao thức bảo mật TLS
        $mail->Port       = 587;

        $mail->setFrom('tranfc911@gmail.com', 'Shop HOA');          // địa chỉ email và tên người gửi
        $encoded_name = mb_convert_encoding($tenKH, 'UTF-8', 'UTF-8');
        $mail->addAddress($email, $encoded_name);
        // địa chỉ email và tên người nhận
        // $mail->addAttachment('path/to/file.pdf');       // đính kèm tập tin PDF
        $mail->isHTML(true);                            // định dạng email dưới dạng HTML



        $mail->Subject = 'Welcome to ShopHoa Floda , my friend !';                               // tiêu đề email
        $mail->Body    = $message;

        if ($mail->send()) {
            header('location:?View=order-complete');
        } else {
            echo 'Email could not be sent';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }
}


?>
<br>