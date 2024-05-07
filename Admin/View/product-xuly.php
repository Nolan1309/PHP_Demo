<?php
include_once 'Model/Product.php';
include_once 'Model/CategoryProduct.php';
include_once 'Model/SizeProduct.php';
include_once 'Model/SizeHinhAnh.php';

if (isset($_POST['addproduct'])) {
    $iddanhmuc = $_POST['category'];

    $name_product = $_POST['TenSP'];

    $image = "";
    if (isset($_FILES['image'])) {
        $file = $_FILES['image'];
        $file_name = $_FILES['image']['name'];
        $image = $file_name;
        if ($file['type']  == 'image/jpeg' || $file['type'] == 'image/jpg' || $file['type'] == 'image/png') {
            // move_uploaded_file($file['tmp_name'], '.././Library/images/product/' . $file_name);
            // echo $file_name;
        } else {
            echo "FIle không đúng định dạng";
            $file_name = '';
        }
    }

    // $imagesList = array();
    // if (isset($_FILES['images'])) {
    //     $files = $_FILES['images'];
    //     $files_name = $_FILES['images']['name'];
    //     $imagesList = $file_name;

    //     foreach ($files_name as $key => $value) {

    //         // move_uploaded_file($files['tmp_name'][$key], '.././Library/images/product/' . $value);
    //     }
    // }
    // foreach ($imagesList as $name) {
    //     echo $name;
    //     echo "<br>";
    // }

    $imagesList = array();
    if (isset($_FILES['images'])) {
        $files = $_FILES['images'];
        $files_name = $_FILES['images']['name'];
        $imagesList = $files_name;

        foreach ($files_name as $key => $value) {
            move_uploaded_file($files['tmp_name'][$key], '.././Library/images/product/' . $value);
        }
    }







    $selected_sizes = array();
    $totalSoLuong = 0;
    if (isset($_POST['size_nho_checkbox'])) {
        $SoLuong_nho = $_POST['SoLuong_nho'];
        $GiaBan_nho = $_POST['GiaBan_nho'];
        $TrongLuong_nho =  $_POST['TrongLuong_nho'];
        $GiaGoc_nho = $_POST['GiaGoc_nho'];
        $GiaSale_nho = $_POST['GiaSale_nho'];
        if ($GiaSale_nho == "") {
            $GiaSale_nho = "0";
        }
        $selected_sizes['S'] = ['SoLuong' => $SoLuong_nho, 'GiaBan' => $GiaBan_nho, 'TrongLuong' => $TrongLuong_nho, 'GiaGoc' => $GiaGoc_nho, 'GiaSale' => $GiaSale_nho];
    }
    if (isset($_POST['size_vua_checkbox'])) {
        $SoLuong_vua = $_POST['SoLuong_vua'];
        $GiaBan_vua = $_POST['GiaBan_vua'];
        $TrongLuong_vua =  $_POST['TrongLuong_vua'];
        $GiaGoc_vua = $_POST['GiaGoc_vua'];
        $GiaSale_vua = $_POST['GiaSale_vua'];
        if ($GiaSale_vua == "") {
            $GiaSale_vua = "0";
        }
        $selected_sizes['M'] = ['SoLuong' => $SoLuong_vua, 'GiaBan' => $GiaBan_vua, 'TrongLuong' => $TrongLuong_vua, 'GiaGoc' => $GiaGoc_vua, 'GiaSale' => $GiaSale_vua];
    }
    if (isset($_POST['size_lon_checkbox'])) {
        $SoLuong_lon = $_POST['SoLuong_lon'];
        $GiaBan_lon = $_POST['GiaBan_lon'];
        $TrongLuong_lon =  $_POST['TrongLuong_lon'];
        $GiaGoc_lon = $_POST['GiaGoc_lon'];
        $GiaSale_lon = $_POST['GiaSale_lon'];
        if ($GiaSale_lon == "") {
            $GiaSale_lon = "0";
        }
        $selected_sizes['L'] = ['SoLuong' => $SoLuong_lon, 'GiaBan' => $GiaBan_lon, 'TrongLuong' => $TrongLuong_lon, 'GiaGoc' => $GiaGoc_lon, 'GiaSale' => $GiaSale_lon];
    }

    foreach ($selected_sizes as $size => $info) {
        $totalSoLuong += intval($info['SoLuong']);
    }

    $motaNgan = $_POST['MotaNgan'];
    $motaDai = $_POST['MotaDai'];
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $currentDate = date("Y-m-d");

    $ad = new admin();
    $cate = new CategoryProduct($iddanhmuc);
    $sp = new Product($cate, $name_product, $image, $totalSoLuong, $motaNgan, $motaDai, $currentDate);
    $alert_insert = $ad->InsertProduct($sp);
    if ($alert_insert) {
        $idProduct = $ad->GetIdProduct();
        $check = false;
        foreach ($selected_sizes as $size => $info) {
            $soluongItem =   $info['SoLuong'];
            $giabanItem =  $info['GiaBan'];
            $trongluongItem = $info['TrongLuong'];
            $giagocItem = $info['GiaGoc'];
            $giasaleItem = $info['GiaSale'];

            $sizeObject = new SizeSanPham($idProduct, $size, $trongluongItem, $soluongItem, $giagocItem, $giasaleItem, $giabanItem);
            $alert_insert_Size = $ad->InsertSize($sizeObject);
            if ($alert_insert_Size) {
                $check = true;
            }
        }
        foreach ($imagesList as $name) {
            $number = $ad->GetIdSizeHinhAnh();
            $sizeHinhAnh = new SizeHinhAnh($number + 1, $idProduct, $name);
            $item = $ad->InsertHinhAnh($sizeHinhAnh);
        }
        if ($check) {
            $alert = "Thêm thành công !";
            echo "<script> alert('$alert');  </script>";
            echo "<script>window.location.href='?View=product';</script>";
            exit();
        } else {
            $alert = "Thêm không thành công !";
            echo "<script> alert('$alert');  </script>";
            echo "<script>window.location.href='?View=product-them';</script>";

            exit();
        }
    } else {
        echo "Không thành công";
    }
}

// Kiểm tra xem idProduct đã được truyền qua URL chưa
if (isset($_GET['idProduct'])) {
    // Lấy giá trị idProduct từ URL
    $idProduct = $_GET['idProduct'];
    $ad = new admin();
    $check_xoa = $ad->Delete($idProduct);
    if ($check_xoa) {
        $alert = "Xóa thành công !";
        echo "<script> alert('$alert');  </script>";
        echo "<script>window.location.href='?View=product';</script>";
    }
} else {
    // Nếu idProduct không được truyền qua URL, bạn có thể xử lý theo cách khác tại đây hoặc hiển thị thông báo lỗi
    echo "Không có idProduct được truyền qua URL.";
}
