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
            move_uploaded_file($file['tmp_name'], '.././Library/images/product/' . $file_name);
            // echo $file_name;
        } else {
            echo "FIle không đúng định dạng";
            $file_name = '';
        }
    }

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
    if (isset($_POST['size__checkbox'])) {
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
if (isset($_GET['idProductXoa'])) {
    // Lấy giá trị idProduct từ URL
    $idProduct = $_GET['idProductXoa'];
    $ad = new admin();
    $check_xoa = $ad->Delete($idProduct);
    if ($check_xoa) {
        $alert = "Xóa thành công !";
        echo "<script> alert('$alert');  </script>";
        echo "<script>window.location.href='?View=product';</script>";
    }
}








if (isset($_POST['editproduct'])) {
    $iddanhmuc = $_POST['category'];
    $idProduct = $_POST['MaSP'];
    $name_product = $_POST['TenSP'];

    $image = "";
    if (!empty($_FILES['image']['name'])) {
        $file = $_FILES['image'];
        $file_name = $_FILES['image']['name'];

        $image = $file_name;
        if ($file['type']  == 'image/jpeg' || $file['type'] == 'image/jpg' || $file['type'] == 'image/png') {
            // move_uploaded_file($file['tmp_name'], '.././Library/images/product/' . $file_name);
            // echo $file_name;
        } else {
            echo "FIle không đúng định dạng";
        }
    } else {
        $image = $_POST['image_hidden'];
    }


    $imagesList = array();
    if (isset($_FILES['images']) && $_FILES['images']['size'][0] > 0) {

        $files = $_FILES['images'];
        $files_name = $_FILES['images']['name'];
        $imagesList = $files_name;

        foreach ($files_name as $key => $value) {
            // move_uploaded_file($files['tmp_name'][$key], '.././Library/images/product/' . $value);
        }
    } else {
        if (isset($_POST['images_list']) && is_array($_POST['images_list'])) {
            foreach ($_POST['images_list'] as $index => $image_url) {
                array_push($imagesList, $image_url);
            }
        }
    }

    echo "Ảnh đại điện : " . $image . "<br>";
    echo "Ảnh đại điện chi tiết <br>";

    foreach ($imagesList as $key => $value) {
        echo $value;
        echo "<br>";
    }


    $selected_sizes = array();
    $totalSoLuong = 0;
    if (isset($_POST['size_S_checkbox'])) {
        $SoLuong_S = $_POST['SoLuong_S'];
        $GiaBan_S = $_POST['GiaBan_S'];
        $TrongLuong_S =  $_POST['TrongLuong_S'];
        $GiaGoc_S = $_POST['GiaGoc_S'];
        $GiaSale_S = $_POST['GiaSale_S'];
        if ($GiaSale_S == "") {
            $GiaSale_S = "0";
        }
        $selected_sizes['S'] = ['SoLuong' => $SoLuong_S, 'GiaBan' => $GiaBan_S, 'TrongLuong' => $TrongLuong_S, 'GiaGoc' => $GiaGoc_S, 'GiaSale' => $GiaSale_S];
    }
    if (isset($_POST['size_M_checkbox'])) {
        $SoLuong_M = $_POST['SoLuong_M'];
        $GiaBan_M = $_POST['GiaBan_M'];
        $TrongLuong_M =  $_POST['TrongLuong_M'];
        $GiaGoc_M = $_POST['GiaGoc_M'];
        $GiaSale_M = $_POST['GiaSale_M'];
        if ($GiaSale_M == "") {
            $GiaSale_M = "0";
        }
        $selected_sizes['M'] = ['SoLuong' => $SoLuong_M, 'GiaBan' => $GiaBan_M, 'TrongLuong' => $TrongLuong_M, 'GiaGoc' => $GiaGoc_M, 'GiaSale' => $GiaSale_M];
    }
    if (isset($_POST['size_L_checkbox'])) {
        $SoLuong_L = $_POST['SoLuong_L'];
        $GiaBan_L = $_POST['GiaBan_L'];
        $TrongLuong_L =  $_POST['TrongLuong_L'];
        $GiaGoc_L = $_POST['GiaGoc_L'];
        $GiaSale_L = $_POST['GiaSale_L'];
        if ($GiaSale_L == "") {
            $GiaSale_L = "0";
        }
        $selected_sizes['L'] = ['SoLuong' => $SoLuong_L, 'GiaBan' => $GiaBan_L, 'TrongLuong' => $TrongLuong_L, 'GiaGoc' => $GiaGoc_L, 'GiaSale' => $GiaSale_L];
    }

    foreach ($selected_sizes as $size => $info) {
        $totalSoLuong += intval($info['SoLuong']);
    }


    // foreach ($selected_sizes as $size => $info) {
    //     echo "Kích thước: $size<br>";
    //     echo "Số lượng: {$info['SoLuong']}<br>";
    //     echo "Trọng lượng: {$info['TrongLuong']}<br>";
    //     echo "Giá gốc: {$info['GiaGoc']}<br>";
    //     echo "Giá sale: {$info['GiaSale']}<br>";
    //     echo "Giá bán: {$info['GiaBan']}<br>";
    //     echo "<br>";
    // }

    $motaNgan = $_POST['MotaNgan'];
    $motaDai = $_POST['MotaDai'];
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $currentDate = date("Y-m-d");

    $ad = new admin();
    $cate = new CategoryProduct($iddanhmuc);
    $sp = new Product($cate, $name_product, $image, $totalSoLuong, $motaNgan, $motaDai, $currentDate);
    $alert_update = $ad->UpdateProduct($sp, $idProduct);

    $check = false;
    if ($alert_update) {
        $check = true;
        $Count_Size = $ad->GetCountSize($idProduct);
        $list_size_detail = $ad->loadProductSizeSanPham($idProduct);


        // foreach ($selected_sizes as $size => $info) {
        //     $soluongItem =   $info['SoLuong'];
        //     $giabanItem =  $info['GiaBan'];
        //     $trongluongItem = $info['TrongLuong'];
        //     $giagocItem = $info['GiaGoc'];
        //     $giasaleItem = $info['GiaSale'];

        //     $sizeObject = new SizeSanPham($idProduct, $size, $trongluongItem, $soluongItem, $giagocItem, $giasaleItem, $giabanItem);
        //     $alert_insert_Size = $ad->UpdateSize($sizeObject);
        //     if ($alert_insert_Size) {
        //         $check = true;
        //     }
        // }

        // Cập nhật size hiện có và thêm size mới nếu có
        foreach ($selected_sizes as $size => $info) {
            // Nếu có size hiện có, hãy cập nhật chúng
            if ($Count_Size > 0) {
                // Tìm kiếm size hiện có trong danh sách các size
                $existingSizeIndex = array_search($size, array_column($list_size_detail, 'Size'));

                // Nếu size tồn tại, cập nhật nó
                if ($existingSizeIndex !== false) {
                    $size_Item = $list_size_detail[$existingSizeIndex];
                    $sizeObject = new SizeSanPham(
                        $size_Item['MaSP'],
                        $size_Item['Size'],
                        $info['TrongLuong'],
                        $info['SoLuong'],
                        $info['GiaGoc'],
                        $info['GiaSale'],
                        $info['GiaBan']
                    );
                    $ad->UpdateSize($sizeObject);
                } else {
                    // Nếu size không tồn tại, thêm nó vào
                    $sizeObject = new SizeSanPham(
                        $idProduct,
                        $size,
                        $info['TrongLuong'],
                        $info['SoLuong'],
                        $info['GiaGoc'],
                        $info['GiaSale'],
                        $info['GiaBan']
                    );
                    $alert_insert_Size = $ad->InsertSize($sizeObject);
                }
            } else {
                $sizeObject = new SizeSanPham(
                    $idProduct,
                    $size,
                    $info['TrongLuong'],
                    $info['SoLuong'],
                    $info['GiaGoc'],
                    $info['GiaSale'],
                    $info['GiaBan']
                );
                $alert_insert_Size = $ad->InsertSize($sizeObject);
            }
        }


       // $Count_HinhAnh = $ad->GetCountHinhAnh($idProduct);
        $list_image_detail = $ad->loadProductHinhAnhChiTiet($idProduct);

        $count_image_list = count($imagesList);
        // foreach ($imagesList as $index => $imageUrl) {

        //     if ($index < $Count_HinhAnh) {

        //         $image_item = $list_image_detail[$index];
        //         $ad->UpdateHinhAnh($idProduct, $imageUrl, $image_item['IdHinhAnh']);
        //     } else {
        //         $number = $ad->GetIdSizeHinhAnh();
        //         $sizeHinhAnh = new SizeHinhAnh($number + 1, $idProduct, $imageUrl);
        //         $item = $ad->InsertHinhAnh($sizeHinhAnh);
        //     }
        // }
        // Xóa hết các hình ảnh hiện có của sản phẩm
        $ad->DeleteSizeHinh($idProduct);

        // Thêm các hình ảnh mới từ mảng $imagesList
        for ($index = 0; $index < $count_image_list; $index++) {
            $imageUrl = $imagesList[$index];
            $number = $ad->GetIdSizeHinhAnh();
            $sizeHinhAnh = new SizeHinhAnh($number + 1, $idProduct, $imageUrl);
            $item = $ad->InsertHinhAnh($sizeHinhAnh);
        }



        if ($check) {
            $alert = "Cập nhật thành công !";
            echo "<script> alert('$alert');  </script>";
            echo "<script>window.location.href='?View=product';</script>";
            exit();
        } else {
            $alert = "Cập nhật không thành công !";
            echo "<script> alert('$alert');  </script>";
            echo "<script>window.location.href='?View=product-sua';</script>";

            exit();
        }
    } else {
        echo "Không thành công";
    }
}
