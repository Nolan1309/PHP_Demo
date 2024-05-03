<?php
if (isset($_POST['addproduct'])) {
    $iddanhmuc = $_POST['idDanhmuc'];
    $tensanpham = $_POST['TenSP'];
    $anhsanphamname = $_POST['TenSP']['name'];
    $anhsanphamtmp = $_POST['AnhSP']['tmp_name'];
    move_uploaded_file($anhsanphamtmp, '.././Library/images/product/' . $anhsanphamname);

    // $soluong = $_POST['soluong'];
    // $dongia = $_POST['dongia'];
    // $anhnen = $_FILES['anhnen']['name'];
    // $AnhSP_tmp = $_FILES['anhnen']['tmp_name'];
    // move_uploaded_file($AnhSP_tmp, '../../webroot/image/sanpham/' . $anhnen);

    $size = $_POST['size_nho'];
    $mau = $_POST['mau'];
    $mota = isset($_POST['mota']) ? $_POST['mota'] : NULL;

    $sql_them = "INSERT INTO `sanpham`(`MaSP`, `TenSP`, `MaDM`, `MaNCC`, `MoTa`, `DonGia`, `AnhNen`) VALUES (NULL,'$tensp',$madm,$mancc,'$mota',$dongia,'$anhnen')";
    $rs_them = mysqli_query($conn, $sql_them);
    foreach($rs_them as $item_product){

    }
}
