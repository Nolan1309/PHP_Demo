<?php
include 'config.php';


function SelectDATA($conn, $sql)
{
    //global $conn;
    try {
        $stmt = $conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Lỗi truy vấn: " . $e->getMessage();
        return false;
    }
}

// Hàm kiểm tra đăng nhập
function CheckLogin($conn, $email, $password)
{
    //global $conn;
    try {
        $sql = "SELECT * FROM account WHERE Email = :email AND MatKhau = :password";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            return false; // Đăng nhập không thành công
        } else {
            return $result; // Trả về thông tin tài khoản nếu đăng nhập thành công
        }
    } catch (PDOException $e) {
        echo "Lỗi truy vấn: " . $e->getMessage();
        return false;
    }
}

// ------------------------------------------ LOAD DANH MỤC MENU ( DANH MỤC SẢN PHẨM ) MODEL----------------------
//// Lấy tên danh mục menu ( sản phẩm )

function loadDanhMucMenu()
{
    global $conn;
    try {
        //Nếu id không trống , thì sẽ load sản phẩm theo ID
        if (!empty($product_id)) {
            $sql = "SELECT * FROM product WHERE idProduct = :product_id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':product_id', $product_id);
        } else {
            $sql = "SELECT DISTINCT
                        P.idProduct AS MaSanPham,
                        P.idDanhmuc AS MaDanhMuc,
                        P.TenSP AS TenSanPham,
                        P.AnhSP AS AnhSanPham,
                        S.GiaGocSP AS GiaGoc,
                        S.GiaSale AS GiaSale,
                        S.GiaBan AS GiaBan       
                    FROM 
                        Product P
                    JOIN 
                        SizeSanPham S ON P.idProduct = S.MaSP 
                    LIMIT 8";
            $stmt = $conn->prepare($sql);
        }
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Lỗi truy vấn: " . $e->getMessage();
        return false;
    }
}


// ------------------------------------------ SẢN PHẨM MODEL----------------------
//// lấy danh sách sản phẩm
// Hàm load sản phẩm dựa trên id sản phẩm
function loadProductByID($conn, $product_id)
{
    try {
        //Nếu id không trống , thì sẽ load sản phẩm theo ID
        if (!empty($product_id)) {
            $sql = "SELECT * FROM product WHERE idProduct = :product_id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':product_id', $product_id);
        } else {
            $sql = "SELECT DISTINCT
                        P.idProduct AS MaSanPham,
                        P.idDanhmuc AS MaDanhMuc,
                        P.TenSP AS TenSanPham,
                        P.AnhSP AS AnhSanPham,
                        S.GiaGocSP AS GiaGoc,
                        S.GiaSale AS GiaSale,
                        S.GiaBan AS GiaBan       
                    FROM 
                        Product P
                    JOIN 
                        SizeSanPham S ON P.idProduct = S.MaSP 
                    LIMIT 8";
            $stmt = $conn->prepare($sql);
        }
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Lỗi truy vấn: " . $e->getMessage();
        return false;
    }
}



// Hàm load danh sách 8 sản phẩm
function loadProduct_8_SanPham()
{
    global $conn;
    try {
        $sql = "SELECT 
        DISTINCT P.idProduct AS MaSanPham,
        P.idDanhmuc AS MaDanhMuc,
        P.TenSP AS TenSanPham,
        P.AnhSP AS AnhSanPham,
        S.GiaGocSP AS GiaGoc,
        S.GiaSale AS GiaSale,
        S.GiaBan AS GiaBan,
        AVG(D.DiemDanhGia) AS DiemDanhGia
        FROM 
            Product P
        JOIN 
            SizeSanPham S ON P.idProduct = S.MaSP
        LEFT JOIN 
            DanhGiaSanPham D ON P.idProduct = D.MaSP
        GROUP BY 
            P.idProduct
        LIMIT 8";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Lỗi truy vấn: " . $e->getMessage();
        return false;
    }
}

// Hàm load danh sách 5 sản phẩm còn ít hàng nhất
function loadProduct_5_SanPham()
{
    global $conn;
    try {
        $sql = "SELECT 
        P.idProduct AS MaSanPham,
        P.idDanhmuc AS MaDanhMuc,
        P.TenSP AS TenSanPham,
        P.AnhSP AS AnhSanPham,
        S.GiaGocSP AS GiaGoc,
        S.GiaSale AS GiaSale,
        S.GiaBan AS GiaBan,
        AVG(D.DiemDanhGia) AS DiemDanhGia -- Tính trung bình điểm đánh giá
        FROM 
            Product P
        JOIN 
            SizeSanPham S ON P.idProduct = S.MaSP
        LEFT JOIN 
            DanhGiaSanPham D ON P.idProduct = D.MaSP
        GROUP BY 
            P.idProduct
        ORDER BY 
            S.Soluong ASC
        LIMIT 5";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Lỗi truy vấn: " . $e->getMessage();
        return false;
    }
}

function loadProduct_5_SanPhamSoLuongNhieu()
{
    global $conn;
    try {
        $sql = "SELECT 
            P.idProduct AS MaSanPham,
            P.idDanhmuc AS MaDanhMuc,
            P.TenSP AS TenSanPham,
            P.AnhSP AS AnhSanPham,
            S.GiaGocSP AS GiaGoc,
            S.GiaSale AS GiaSale,
            S.GiaBan AS GiaBan,
            AVG(D.DiemDanhGia) AS DiemDanhGia
        FROM 
            Product P
        JOIN 
            SizeSanPham S ON P.idProduct = S.MaSP
        LEFT JOIN 
            DanhGiaSanPham D ON P.idProduct = D.MaSP
        GROUP BY 
            P.idProduct
        ORDER BY 
            S.Soluong DESC
        LIMIT 5";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Lỗi truy vấn: " . $e->getMessage();
        return false;
    }
}




// Hàm load danh sách 2 sản phẩm còn ít hàng nhất
function loadProduct_2_SanPham($conn)
{
    try {
        $sql = "SELECT 
                    P.idProduct AS MaSanPham,
                    P.idDanhmuc AS MaDanhMuc,
                    P.TenSP AS TenSanPham,
                    P.AnhSP AS AnhSanPham,
                    S.GiaGocSP AS GiaGoc,
                    S.GiaSale AS GiaSale,
                    S.GiaBan AS GiaBan      
                FROM 
                    Product P
                JOIN 
                    SizeSanPham S ON P.idProduct = S.MaSP
                GROUP BY P.idProduct
                ORDER BY S.Soluong ASC
                LIMIT 2";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Lỗi truy vấn: " . $e->getMessage();
        return false;
    }
}




// Lấy thông tin chi tiết của một sản phẩm
function product($conn, $product_id)
{
    try {
        $sql = "SELECT * FROM product WHERE idProduct = :product_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':product_id', $product_id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Lỗi truy vấn: " . $e->getMessage();
        return false;
    }
}

// Lấy thông tin về kích thước của một sản phẩm
function product_size($conn, $product_id)
{
    try {
        $sql = "SELECT DISTINCT * FROM SizeSanPham WHERE MaSP = :product_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':product_id', $product_id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Lỗi truy vấn: " . $e->getMessage();
        return false;
    }
}

// Lấy thông tin về hình ảnh chi tiết của một sản phẩm
function product_detail_image($conn, $product_id)
{
    try {
        $sql = "SELECT * FROM hinhanhsanpham WHERE MaSP = :product_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':product_id', $product_id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Lỗi truy vấn: " . $e->getMessage();
        return false;
    }
}

// Lấy đánh giá và nhận xét của sản phẩm
function product_review_cm($conn, $product_id)
{
    try {
        $sql = "SELECT DiemDanhGia, NoiDung, NgayDanhGia FROM DanhGiaSanPham WHERE MaSP = :product_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':product_id', $product_id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Lỗi truy vấn: " . $e->getMessage();
        return false;
    }
}

// Hàm kiểm tra số lượng sản phẩm
function check_product_soluong($conn, $id, $size)
{
    try {
        // Sử dụng prepared statement để tránh SQL injection
        $sql = "SELECT Soluong FROM sizesanpham WHERE MaSP = :id AND Size = :size";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':size', $size);
        $stmt->execute();
        $soluongkho = $stmt->fetchColumn();

        // Trả về số lượng sản phẩm
        return $soluongkho !== false ? $soluongkho : 0;
    } catch (PDOException $e) {
        echo "Lỗi truy vấn: " . $e->getMessage();
        return 0;
    }
}

// tính sản phẩm khuyến mãi
function price_sale($idSanPham)
{
    global $conn;

    try {
        // Truy vấn thông tin giá bán và giá gốc từ bảng SizeSanPham
        $sql = "SELECT GiaBan, GiaGocSP FROM SizeSanPham WHERE MaSP = ? LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$idSanPham]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {

            $price_sale = $row['GiaGocSP'] - $row['GiaBan'];

            if ($price_sale > 0) {
                return $row['GiaBan'];
            } else {
                return 0;
            }
        } else {

            return null;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return null;
    }
}







// Xử lý yêu cầu POST nếu có
if (isset($_POST["functionName"])) {
    if ($_POST["functionName"] == "check_coupon") {
        $id = $_POST["id"];
        $result = check_coupon($conn, $id);
        echo json_encode($result);
    }
}
// Hàm kiểm tra mã giảm giá
function check_coupon($conn, $id)
{
    try {
        $sql = "SELECT SoTien FROM phieugiamgia WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $coupon = $stmt->fetchColumn();

        // Trả về số tiền giảm giá
        return $coupon !== false ? number_format($coupon) : 0;
    } catch (PDOException $e) {
        echo "Lỗi truy vấn: " . $e->getMessage();
        return 0;
    }
}


//Bình luận cho product

function product_review($conn, $idProduct)
{
    // global $conn;
    try {
        // Sử dụng prepared statement để tránh SQL injection
        $sql = "SELECT MaDanhGia, MaSP, DiemDanhGia, NoiDung, NgayDanhGia FROM danhgiasanpham WHERE MaSP = :idProduct ORDER BY NgayDanhGia DESC";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idProduct', $idProduct);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Trả về kết quả
        return $result;
    } catch (PDOException $e) {
        echo "Lỗi truy vấn: " . $e->getMessage();
        return false;
    }
}

// thêm bình luận product
function product_addtoreview($conn, $MaDanhGia, $MaSP, $DiemDanhGia, $NoiDung, $NgayDanhGia)
{
    // global $conn;
    try {

        $sql = "INSERT INTO danhgiasanpham (MaDanhGia, MaSP, DiemDanhGia, NoiDung, NgayDanhGia) 
                VALUES (:MaDanhGia, :MaSP, :DiemDanhGia, :NoiDung, :NgayDanhGia)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':MaDanhGia', $MaDanhGia);
        $stmt->bindParam(':MaSP', $MaSP);
        $stmt->bindParam(':DiemDanhGia', $DiemDanhGia);
        $stmt->bindParam(':NoiDung', $NoiDung);
        $stmt->bindParam(':NgayDanhGia', $NgayDanhGia);
        $stmt->execute();

        return true;
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
        return false;
    }
}


///////Chưa làm chức năng đâu nha
//Tải thêm nhiều sản phẩm   
if (isset($_POST['page']) == true) {
    $page = $_POST['page'] * 12;

    $row_count = $_POST['rowCount'];

    $sql = "SELECT * FROM `sanpham`  limit 12," . $page;

    $res = selectdata($sql);
?>
    <div class="row pad-dt">
        <?php while ($row = mysqli_fetch_array($res)) { ?>
            <div class="col-3 col-dt">
                <a href="?view=product-detail&id=<?php echo $row['MaSP'] ?>">
                    <div class="item">
                        <div class="product-lable">
                            <?php
                            $price_sale = price_sale($row['MaSP'], $row['DonGia']);
                            if ($price_sale < $row['DonGia']) {
                                echo '<span>Giảm ' . number_format($row['DonGia'] - $price_sale) . 'đ </span>';
                            }
                            ?>
                        </div>
                        <div>
                            <img src="webroot/image/sanpham/<?php echo $row['AnhNen']; ?>">
                        </div>
                        <div class="item-name">
                            <p> <?php echo $row['TenSP']; ?> </p>
                        </div>
                        <div class="item-price">
                            <p> <?php echo number_format($price_sale, 0) . 'đ'; ?> </p>
                            <h6>
                                <?php if (number_format($row['DonGia']) !== number_format($price_sale)) {
                                    echo number_format($row['DonGia']) . 'đ';
                                };
                                ?>
                            </h6>
                        </div>
                    </div>
                </a>
            </div>
        <?php } ?>
    </div>
<?php
};






// ------------------------------------------ Category MODEL----------------------
// Hàm lấy danh sách các danh mục sản phẩm
function categorys()
{
    global $conn;
    try {
        $sql = "SELECT * FROM categoryproduct";
        $stmt = $conn->query($sql);
        if ($stmt->rowCount() == 0) {
            return false;
        } else {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
        return false;
    }
}

// lấy danh sách sản phẩm theo danh mục
function product_category($idDanhMuc)
{
    global $conn;
    try {
        // Chuẩn bị câu truy vấn SELECT
        $sql = "SELECT * FROM categoryproduct WHERE idDanhmuc = :idDanhMuc";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idDanhMuc', $idDanhMuc);
        $stmt->execute();

        // Kiểm tra số hàng trả về
        if ($stmt->rowCount() == 0) {
            return false;
        } else {
            // Trả về kết quả nếu có dữ liệu
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        // Xử lý lỗi nếu có
        echo "Lỗi: " . $e->getMessage();
        return false;
    }
}


// -------------------------------------------------------------------------------
// ------------------------------------------ CART MODEL----------------------
// xử lý đặt hàng

// function order_product($nn, $dcnn, $sdtnn, $makh, $tenkh, $tinh, $quan, $huyen, $diachi, $note, $tienhang, $tiengiam, $TongTien)
// {
//     global $conn;

//     //   // Truy vấn INSERT hóa đơn
//     //   $sql1 = "INSERT INTO 'DonHang' ('MaKH', TenKH, tinhKH, quanKH, huyenKH, duongKH, noteKH, NgayDat, NgayGiao, TrangThai, TienHang, TienGiam, TongTien) 
//     //   VALUES ()";
//     //   $sql = "INSERT INTO `hoadon`(`MaKH`, `TinhTrang`, `TongTien`) VALUES (?, 'chưa duyệt', ?)";

//     $sql = "INSERT INTO DonHang (MaKH, TenKH, tinhKH, quanKH, huyenKH, duongKH, noteKH, NgayDat, NgayGiao, TrangThai, TienHang, TienGiam, TongTien) 
// VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

//     $stmt = mysqli_prepare($conn, $sql);

//     // Kiểm tra lỗi Prepared Statements
//     if (!$stmt) {
//         die('Query failed: ' . mysqli_error($conn));
//     }
//     $ngaydat = date('Y-m-d');

//     $ngaygiao = date('Y-m-d', strtotime('+3 days'));

//     $trangthai = "Chưa duyệt";
//     // Bắt đầu bind tham số
//     mysqli_stmt_bind_param($stmt, 'isssssssssddd', $makh, $tenkh, $tinh, $quan, $huyen, $diachi, $note, $ngaydat, $ngaygiao, $trangthai, $tienhang, $tiengiam, $TongTien);


//     // Thực hiện truy vấn
//     $resulf = mysqli_stmt_execute($stmt);

//     // Kiểm tra và lấy mã hóa đơn vừa thêm
//     if ($resulf) {
//         $last_insert_id = mysqli_insert_id($conn);

//         // Truy vấn INSERT chi tiết hóa đơn
//         foreach ($_SESSION['cart_product'] as $item) {
//             $DonGia = str_replace(',', '', $item['DonGia']);
//             $ttt = ($item['SoLuong'] * $DonGia);
//             $masp = $item['MaSP'];
//             $sl = $item['SoLuong'];
//             $dg = $DonGia;
//             $mamau = $item['Mau'];
//             $size = $item['Size'];

//             $sql3 = "INSERT INTO `chitiethoadon`(`MaHD`, `MaSP`, `SoLuong`, `DonGia`, `ThanhTien`, `Size`, `MaMau`) VALUES (?, ?, ?, ?, ?, ?, ?)";
//             $stmt3 = mysqli_prepare($conn, $sql3);

//             // Kiểm tra lỗi Prepared Statements
//             if (!$stmt3) {
//                 die('Query failed: ' . mysqli_error($conn));
//             }

//             // Bắt đầu bind tham số
//             mysqli_stmt_bind_param($stmt3, 'iiidiss', $last_insert_id, $masp, $sl, $dg, $ttt, $size, $mamau);

//             // Thực hiện truy vấn
//             $rs3 = mysqli_stmt_execute($stmt3);

//             // Truy vấn UPDATE số lượng sản phẩm
//             $sql_sl = "UPDATE `chitietsanpham` SET `SoLuong`=(`SoLuong` - ?) WHERE `MaSP`=? AND `MaSize`=? AND `MaMau`=?";
//             $stmt_sl = mysqli_prepare($conn, $sql_sl);

//             // Kiểm tra lỗi Prepared Statements
//             if (!$stmt_sl) {
//                 die('Query failed: ' . mysqli_error($conn));
//             }

//             // Bắt đầu bind tham số
//             mysqli_stmt_bind_param($stmt_sl, 'issi', $sl, $masp, $size, $mamau);

//             // Thực hiện truy vấn
//             $rs_sl = mysqli_stmt_execute($stmt_sl);

//             // Đóng statement
//             mysqli_stmt_close($stmt3);
//             mysqli_stmt_close($stmt_sl);
//         }

//         // Truy vấn INSERT thông tin người nhận
//         $sql4 = "INSERT INTO `nguoinhan`(`MaHD`, `TenNN`, `DiaChiNN`, `SDTNN`) VALUES (?, ?, ?, ?)";
//         $stmt4 = mysqli_prepare($conn, $sql4);

//         // Kiểm tra lỗi Prepared Statements
//         if (!$stmt4) {
//             die('Query failed: ' . mysqli_error($conn));
//         }

//         // Bắt đầu bind tham số
//         mysqli_stmt_bind_param($stmt4, 'isss', $last_insert_id, $nn, $dcnn, $sdtnn);

//         // Thực hiện truy vấn
//         $rs4 = mysqli_stmt_execute($stmt4);

//         // Đóng statement
//         mysqli_stmt_close($stmt4);

//         // Kiểm tra và trả kết quả
//         if ($rs4) {
//             unset($_SESSION['cart_product']);
//             return true; // Thành công
//         } else {
//             return false; // Lỗi khi thêm thông tin người nhận
//         }
//     } else {
//         return false; // Lỗi khi thêm hóa đơn
//     }

//     // Lưu ý: Không cần đặt mã đóng kết nối mysqli_close($conn) ở đây vì nó sẽ được tự động đóng khi script kết thúc.
// }

function order_product($sdtKH, $makh, $tenkh, $tinh, $quan, $huyen, $diachi, $note, $tienhang, $tiengiam, $TongTien)
{
    global $conn;

    try {
        $ngaydat = date('Y-m-d');
        $ngaygiao = date('Y-m-d', strtotime('+3 days'));
        $trangthai = "Chưa duyệt";

        // Truy vấn INSERT hóa đơn
        $sql = "INSERT INTO DonHang (MaKH, TenKH,SDTKH, tinhKH, quanKH, huyenKH, duongKH, noteKH, NgayDat, NgayGiao, TrangThai, TienHang, TienGiam, TongTien) 
                VALUES (?, ?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$makh, $tenkh, $sdtKH, $tinh, $quan, $huyen, $diachi, $note, $ngaydat, $ngaygiao, $trangthai, $tienhang, $tiengiam, $TongTien]);
        $last_insert_id = $conn->lastInsertId();

        // Truy vấn INSERT chi tiết hóa đơn
        foreach ($_SESSION['cart_product'] as $item) {

            $DonGia = str_replace(',', '', $item['DonGia']);

            $thanhtien = ($item['SoLuong'] * $DonGia);
            $masp = $item['MaSP'];
            $sl = $item['SoLuong'];
            $dg = $DonGia;
            // $mamau = $item['Mau'];
            $size = $item['Size'];

            $sqlll = "INSERT INTO `chitietdonhang`(`madonhang`, `MaSP`, `Size`, `soluong`, `dongia`, `thanhtien`) VALUES (?, ?, ?, ?, ?, ?)";
            //$sql3 = "INSERT INTO `chitiethoadon`(`MaHD`, `MaSP`, `SoLuong`, `DonGia`, `ThanhTien`, `Size`, `MaMau`) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt3 = $conn->prepare($sqlll);
            $stmt3->execute([$last_insert_id, $masp, $size, $sl, $dg, $thanhtien]);



            // Truy vấn UPDATE số lượng sản phẩm
            $sql_chitietupdate = "UPDATE `sizesanpham` SET `Soluong`=(`SoLuong` - ?) WHERE `MaSP`=? AND`Size`=?";
            //$sql_sl = "UPDATE `chitietsanpham` SET `SoLuong`=(`SoLuong` - ?) WHERE `MaSP`=? AND `MaSize`=? AND `MaMau`=?";
            $stmt_sl = $conn->prepare($sql_chitietupdate);
            $stmt_sl->execute([$sl, $masp, $size]);
        }



        // Truy vấn INSERT thông tin người nhận
        $sql_diachiAccount = "INSERT INTO `addresskh`( `AccountID`, `FullName`,`SDTKH`, `tinhKH`, `quanKH`, `huyenKH`, `duongKH`) VALUES (?,?,?,?,?,?,?)";
        //$sql4 = "INSERT INTO `nguoinhan`(`MaHD`, `TenNN`, `DiaChiNN`, `SDTNN`) VALUES (?, ?, ?, ?)";
        $stmt4 = $conn->prepare($sql_diachiAccount);
        $stmt4->execute([$makh, $tenkh, $sdtKH, $tinh, $quan, $huyen, $diachi]);


        // Kiểm tra và trả kết quả
        if ($stmt4->rowCount() > 0) {
            unset($_SESSION['cart_product']);
            return true; // Thành công
        } else {
            return false; // Lỗi khi thêm thông tin người nhận
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false; // Lỗi khi thực thi truy vấn
    }
}





// -------------------------------------------------------------------------------
// ------------------------------------------ user MODEL----------------------
// đăng ký mới
function newUser($name, $email, $sdt, $password)
{
    global $conn;

    try {
        $sql_newUser = "INSERT INTO `account`(`Email`, `MatKhau`, `Phone`, `FullName`, `CreateDate`, `Level`) VALUES (?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql_newUser);
        $createDate = date('Y-m-d');
        $level = 2; // Đặt level mặc định là 1, bạn có thể thay đổi nếu cần
        $stmt->execute([$email, $password, $sdt, $name, $createDate, $level]);

        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

// -------------------------
// select khách hàng
function selectKH()
{
    global $conn;

    try {
        $sql = "SELECT b.`AccountID`, b.`Email`, b.`MatKhau`, b.`FullName`, b.`Phone`, b.`CreateDate`, CONCAT(a.`tinhKH`, ', ', a.`quanKH`, ', ', a.`huyenKH`, ', ', a.`duongKH`) AS `DiaChi`
                FROM 
                    (SELECT `tinhKH`, `quanKH`, `huyenKH`, `duongKH` 
                    FROM `addresskh` 
                    ORDER BY `IdDiaChi` DESC 
                    LIMIT 1) AS a 
                JOIN 
                    (SELECT `AccountID`, `Email`, `MatKhau`, `Phone`, `FullName`, `CreateDate`, `Level` 
                    FROM `account`
                    WHERE `Level` = 2) AS b 
                ON 1=1";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            return false;
        } else {
            return $result;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

// -------------------------

// update khách hàng
function update_user($id, $email, $matkhau, $sdt, $ten, $level)
{
    global $conn;

    try {
        $sql = "UPDATE `account` SET `Email`=?, `MatKhau`=?, `Phone`=?, `FullName`=?, `Level`=? WHERE `AccountID`=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$email, $matkhau, $sdt, $ten, $level, $id]);

        return true;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}



// -------------------------
// đơn hàng của khách hàng - USER XEM
function bill_user($idKhachHang)
{
    global $conn;

    try {
        $sql = "SELECT * FROM `donhang` WHERE MaKH = ? ORDER BY NgayDat DESC";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$idKhachHang]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!$result) {
            return false;
        } else {
            return $result;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

//Chi tiết đon hàng user - Usere xem
function bill_detail($idhoadon)
{
    global $conn;

    try {
        $sql = "SELECT * FROM chitietdonhang WHERE madonhang = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$idhoadon]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!$result) {
            return false;
        } else {
            return $result;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}



// <!-- Banner  -->
function loadBanner(){
    global $conn;
    try {
        $sqlBanner = "SELECT * FROM `banner` LIMIT 2";
        $stmt = $conn->prepare($sqlBanner);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Lỗi truy vấn: " . $e->getMessage();
        return false;
    }
}


// -------------------------------------------------------------------------------
?>