<?php
include 'Config/config.php';
include 'Banner.php';
include 'CategoryProduct.php';
include 'Product.php';
include 'SizeProduct.php';
include 'HinhAnhProduct.php';
include_once 'Model/DongGopYKien.php';

class Database
{
    // ------------------------------------------ LOAD DANH MỤC MENU ( DANH MỤC SẢN PHẨM ) MODEL----------------------
    //// Lấy tên danh mục menu ( sản phẩm )
    public function loadDanhMucMenu()
    {
        global $conn;
        try {
            $sql = "SELECT `idDanhmuc`, `tenDanhmuc` FROM `categoryproduct`";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false;
        }
    }


    // ------------------------------------------ LOAD Sản Phẩm (  SẢN PHẨM ) MODEL----------------------
    //// ( sản phẩm )
    //Load theo mã danh mục và phân trang
    public function loadProductByIDCategory($idCategory, $from, $to)
    {
        global $conn;
        try {
            $sql = "SELECT 
            DISTINCT P.idProduct AS MaSanPham,
            P.idDanhmuc AS MaDanhMuc,
            P.TenSP AS TenSanPham,
            P.AnhSP AS AnhSanPham,
            p.MotaDai as MoTaSanPham,
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
            WHERE
                P.idDanhmuc = $idCategory
            GROUP BY 
                P.idProduct
            LIMIT $from,$to";

            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false;
        }
    }
    //Related Products - san pham tuong tu
    public function loadProductByIDCategory_LIMIT_5($idCategory)
    {
        global $conn;
        try {
            $sql = "SELECT 
            DISTINCT P.idProduct AS MaSanPham,
            P.idDanhmuc AS MaDanhMuc,
            P.TenSP AS TenSanPham,
            P.AnhSP AS AnhSanPham,
            p.MotaDai as MoTaSanPham,
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
            WHERE
                P.idDanhmuc = $idCategory
            GROUP BY 
                P.idProduct";

            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false;
        }
    }
    //Hàm lấy ID danh mục từ ID sản phẩm
    public function GetIDDanhMucByIDProduct($idSanPham)
    {
        global $conn;
        try {
            // Sanitize input
            $idSanPham = intval($idSanPham);

            $sql = "SELECT idDanhmuc FROM product WHERE idProduct = :idSanPham";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':idSanPham', $idSanPham, PDO::PARAM_INT);
            $stmt->execute();

            // Fetch the first column of the first row
            $result = $stmt->fetchColumn();

            // If no result found, return null or handle appropriately
            if (!$result) {
                return null;
            }

            return $result;
        } catch (PDOException $e) {
            // Log the error instead of echoing
            error_log("Database Error: " . $e->getMessage());
            return null;
        }
    }

    //Load toàn bộ phân trang
    public function loadProductPhanTrang($from, $to)
    {
        global $conn;
        try {
            $sql = "SELECT 
        DISTINCT P.idProduct AS MaSanPham,
        P.idDanhmuc AS MaDanhMuc,
        P.TenSP AS TenSanPham,
        P.AnhSP AS AnhSanPham,
        p.MotaDai as MoTaSanPham,
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
        LIMIT $from,$to";

            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false;
        }
    }
    // Hàm load danh sách 8 sản phẩm
    public function loadProduct_8_SanPham()
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
    public function loadProduct_5_SanPham()
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
    //Hàm  load 5 sản phẩm còn số lượng nhiều nhất
    public function loadProduct_5_SanPhamSoLuongNhieu()
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
    //Hàm lọc sản phẩm theo giá
    public function loadProductByPrice($min, $max, $from, $to)
    {
        global $conn;
        try {
            $sql = "SELECT 
        DISTINCT P.idProduct AS MaSanPham,
        P.idDanhmuc AS MaDanhMuc,
        P.TenSP AS TenSanPham,
        P.AnhSP AS AnhSanPham,
        p.MotaDai as MoTaSanPham,
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
        LIMIT $from,$to";

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
    public function loadProduct_2_SanPham($conn)
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
    //Load banner cho index
    public function loadBanner()
    {

        $banners = array();
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
    //Hàm tính giá sale hay giá gốc
    public function price_sale($idSanPham)
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




    //Hàm load hình ảnh chi tiết cho 1 sản phẩm ( model )
    public function loadImgByIDproduct($idProduct)
    {
        global $conn;
        try {
            $sql = "SELECT * FROM `hinhanhsanpham` WHERE MaSP = :idProduct";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':idProduct', $idProduct, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $listOfImages = [];

            foreach ($result as $row) {

                $product = new Product();
                $product->idProduct = $row["MaSP"];
                $image = new HinhAnhSanPham($row['IdHinhAnh'], $product, $row['DuongDan']);
                $listOfImages[] = $image;
            }

            return $listOfImages;
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false;
        }
    }
    //Hamf load sản phẩm theo ID sản phẩm
    function loadProductByID($product_id)
    {
        global $conn;
        try {
            //Nếu id không trống , thì sẽ load sản phẩm theo ID
            $sql = "SELECT `TenSP`, `MotaNgan`, `MotaDai` FROM `product` WHERE idProduct = :product_id";
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
    function loadProductByID_V2($product_id)
    {
        global $conn;
        try {
            $sql = "SELECT  `Size`, `Trongluong`, `Soluong`, `GiaBan` FROM `sizesanpham` WHERE MaSP = :product_id";
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
    function loadProductByID_V3_Review($product_id)
    {
        global $conn;
        try {
            $sql = "SELECT  ac.FullName as fullname,`DiemDanhGia`, `NoiDung`, `NgayDanhGia` FROM `danhgiasanpham` dg
            INNER JOIN account ac on dg.MaKhachHang = ac.AccountID
            WHERE MaSP =:product_id";
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
    function loadTotalReview($product_id)
    {
        global $conn;
        try {
            $sqlTongRV = "SELECT COUNT(*) AS SoLuongDanhGia,SUM(DiemDanhGia) AS TongDiemDanhGia FROM danhgiasanpham WHERE MaSP = :product_id";
            $stmt = $conn->prepare($sqlTongRV);
            $stmt->bindParam(':product_id', $product_id);

            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false;
        }
    }
    function loadPriceBySize($productID, $size)
    {
        global $conn;
        try {
            $sqlTongRV = "SELECT  `Soluong`, `GiaGocSP`, `GiaSale`, `GiaBan` FROM `sizesanpham` WHERE MaSP = :product_id AND Size = :sizeID";
            $stmt = $conn->prepare($sqlTongRV);
            $stmt->bindParam(':product_id', $productID);
            $stmt->bindParam(':sizeID', $size);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false;
        }
    }




    // ------------------------------------------ Đóng góp ý kiến ----------------------
    public function insertDongGop(GopYKien $ykien)
    {
        global $conn;
        try {
            // Chuẩn bị truy vấn SQL để chèn dữ liệu vào bảng gopykien
            $sql = "INSERT INTO gopykien (HoTen, Email, Sdt, ChuDe, DongGopY) VALUES (:hoTen, :email, :sdt, :chuDe, :dongGopY)";
            $stmt = $conn->prepare($sql);

            // Bind các giá trị tham số vào truy vấn SQL
            $stmt->bindParam(':hoTen', $ykien->HoTen);
            $stmt->bindParam(':email', $ykien->Email);
            $stmt->bindParam(':sdt', $ykien->Sdt);
            $stmt->bindParam(':chuDe', $ykien->ChuDe);
            $stmt->bindParam(':dongGopY', $ykien->DongGopY);
            $stmt->execute();

           
            return true;
        } catch (PDOException $e) {
            // Nếu có lỗi, in ra thông báo lỗi và trả về false
            echo "Lỗi khi chèn dữ liệu: " . $e->getMessage();
            return false;
        }
    }
}




// check số lượng prodcut
function check_product_soluong($id, $size)
{
    global $conn; // Biến kết nối PDO

    $sql = "SELECT Soluong FROM sizesanpham WHERE MaSP = :id AND Size = :size";
    $stmt = $conn->prepare($sql); 
    $stmt->bindParam(':id', $id, PDO::PARAM_INT); 
    $stmt->bindParam(':size', $size, PDO::PARAM_STR); 
    $stmt->execute();
    $soluongkho = $stmt->fetchColumn();
    $stmt->closeCursor();
    // Kiểm tra nếu không có dữ liệu trả về, trả về 0, ngược lại trả về số lượng
    return $soluongkho !== false ? $soluongkho : 0;
}
function productCart($idProduct){
    global $conn;
    try {
        $sql = "SELECT * FROM `product` WHERE idProduct = :idProduct";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idProduct', $idProduct, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Lỗi truy vấn: " . $e->getMessage();
        return false;
    }
}
