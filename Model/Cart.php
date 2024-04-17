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
if(isset($_POST['delete_cart_product'])){
	$masp=$_POST['productID'];
	$size=$_POST['size'];
	$mau=$_POST['mau'];
    foreach($_SESSION['cart_product'] as $item_cart){
        if($item_cart['MaSP']==$masp && $item_cart['Size']==$size and ($item_cart['Mau']===$mau)){}
        else{
            $cart[]=array('MaSP'=>$item_cart['MaSP'],'TenSP'=>$item_cart['TenSP'],'SoLuong'=>$item_cart['SoLuong'],'Size'=>$item_cart['Size'],'Mau'=>$item_cart['Mau'],'DonGia'=>$item_cart['DonGia']);			
        }
        $_SESSION['cart_product']=$cart;
        $alert='Đã xóa thành công';
        header('location:?view=cart&alert='.$alert);
    }
}
?>
<br>