<?php
require_once '../Config/config.php';
require_once 'Product.php';
class admin
{
    public function loadOrderAdmin()
    {
        global $conn;
        try {
            $sql = "SELECT * FROM `donhang` WHERE `TrangThai` = 'Chưa duyệt' ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false;
        }
    }
    public function loadOrderAdminByMaDonhang($iddonhang)
    {
        global $conn;
        try {
            $sql = "SELECT * FROM `donhang` WHERE  `TrangThai` = 'Chưa duyệt' and `MaDH` = $iddonhang ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false;
        }
    }
    public function loadOrderAdminByMaDonhang_Cancel($iddonhang)
    {
        global $conn;
        try {
            $sql = "SELECT * FROM `donhang` WHERE `MaDH` = $iddonhang ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false;
        }
    }
    public function loadOrderDetailAdmin($iddonhang)
    {
        global $conn;
        try {
            $sql = " select ctdh.MaSP,p.TenSP,p.AnhSP,ctdh.soluong, ctdh.dongia, ctdh.thanhtien from chitietdonhang ctdh INNER JOIN product p on p.idProduct = ctdh.MaSP where ctdh.madonhang = $iddonhang";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false;
        }
    }
    public function loadOrderAdminCancel()
    {
        global $conn;
        try {
            $sql = "SELECT * FROM `donhang` WHERE `TrangThai` = 'Đã hủy' ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false;
        }
    }
    public function loadOrderAdminActive()
    {
        global $conn;
        try {
            $sql = "SELECT * FROM `donhang` WHERE `TrangThai` = 'Đã xác nhận'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false;
        }
    }
    public function loadOrderAdminActiveByMaDonhang($iddonhang)
    {
        global $conn;
        try {
            $sql = "SELECT * FROM `donhang` WHERE  `TrangThai` = 'Đã xác nhận' and `MaDH` = $iddonhang ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false;
        }
    }
    public function loadOrderDetailAdminActive($iddonhang)
    {
        global $conn;
        try {
            $sql = "
            select ctdh.MaSP,p.TenSP,ctdh.soluong, ctdh.dongia, ctdh.thanhtien from chitietdonhang ctdh INNER JOIN product p on p.idProduct = ctdh.MaSP where ctdh.madonhang = $iddonhang";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false;
        }
    }
    public function loadProductAdmin()
    {
        global $conn;
        try {
            $sql = "SELECT * FROM `product`";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false;
        }
    }
    public function loadProductAdminByID($idProduct)
    {
        global $conn;
        try {
            $sql = "SELECT * FROM `product` WHERE idProduct =$idProduct";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false;
        }
    }
    public function loadProductbyName($tentimkiem)
    {
        global $conn;
        try {
            $sql = "SELECT * FROM product WHERE TenSP LIKE N'%$tentimkiem%'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false;
        }
    }
    public function loadProductHinhAnhChiTiet($idProduct)
    {
        global $conn;
        try {
            $sql = "SELECT `IdHinhAnh`, `MaSP`, `DuongDan` FROM `hinhanhsanpham` WHERE MaSP = $idProduct";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false;
        }
    }

    public function loadProductSizeSanPham($idProduct)
    {
        global $conn;
        try {
            $sql = "SELECT * FROM `sizesanpham` WHERE MaSP =  $idProduct";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false;
        }
    }
    public function loadKhachHangAccount()
    {
        global $conn;
        try {
            $sql = "SELECT * FROM `account` WHERE LEVEL = 2";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false;
        }
    }
    public function loadCategorySanPham()
    {
        global $conn;
        try {
            $sql = "SELECT * FROM `categoryproduct`";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false;
        }
    }
    public function DeleteDanhMuc($idDanhMuc)
    {
        global $conn;
        try {
            $sql = "DELETE FROM `categoryproduct` WHERE `idDanhmuc` = :idDanhMuc";
            $stmt = $conn->prepare($sql);

            // Bind the parameter value
            $stmt->bindParam(':idDanhMuc', $idDanhMuc);

            // Execute the query
            $result = $stmt->execute();

            // Return the result of the execution
            return $result;
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false; // Return false if there's an error
        }
    }
    public function InsertDanhMuc($idDanhMuc, $tenDanhMuc)
    {
        global $conn;
        try {
            $sql = "INSERT INTO `categoryproduct`(`idDanhmuc`, `tenDanhmuc`) VALUES (:idDanhMuc,:TenDanhMuc)";
            $stmt = $conn->prepare($sql);


            // Bind các giá trị vào các tham số của câu lệnh SQL
            $stmt->bindParam(':idDanhMuc', $idDanhMuc);
            $stmt->bindParam(':TenDanhMuc', $tenDanhMuc);


            // Thực thi câu lệnh SQL
            $stmt->execute();

            return true; // Trả về true khi chèn thành công
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false; // Trả về false nếu có lỗi xảy ra
        }
    }
    public function loadCategoryBaiViet()
    {
        global $conn;
        try {
            $sql = "SELECT * FROM `categoryblog`";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false;
        }
    }

    public function loadOrderAdminByNameKH($tentimkiem)
    {
        global $conn;
        try {
            $sql = "SELECT * FROM `donhang` WHERE `TrangThai` = 'Chưa duyệt' and TENKH LIKE N'%$tentimkiem%'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false;
        }
    }
    public function loadOrderAdminByNameKH_Cancel($tentimkiem)
    {
        global $conn;
        try {
            $sql = "SELECT * FROM `donhang` WHERE `TrangThai` = 'Đã hủy' and TENKH LIKE N'%$tentimkiem%'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false;
        }
    }
    public function loadOrderAdminActiveByNameKH($tentimkiem)
    {
        global $conn;
        try {
            $sql = "SELECT * FROM `donhang` WHERE `TrangThai` = 'Đã xác nhận' and TENKH LIKE N'%$tentimkiem%'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false;
        }
    }
    public function loadKhachHangAccountByName($tentimkiem)
    {
        global $conn;
        try {
            $sql = "SELECT * FROM `account` WHERE LEVEL = 2 AND FullName LIKE N'%$tentimkiem%'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false;
        }
    }
    public function loadCategorySanPhamByName($tentimkiem)
    {
        global $conn;
        try {
            $sql = "SELECT * FROM `categoryproduct` WHERE tenDanhmuc LIKE N'%$tentimkiem%'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false;
        }
    }
    public function loadCategoryBaiVietByName($tentimkiem)
    {
        global $conn;
        try {
            $sql = "SELECT * FROM `categoryblog` WHERE TenDanhMuc LIKE N'%$tentimkiem%'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false;
        }
    }
    public function InsertProduct(Product $sp)
    {
        global $conn;
        try {
            $sql = "INSERT INTO `product`( `idDanhmuc`, `TenSP`, `AnhSP`, `SoLuong`, `MotaNgan`, `MotaDai`, `CreateDate`,`NgaySua`)
                    VALUES (:idDanhmuc, :TenSP, :AnhSP, :SoLuong, :MotaNgan, :MotaDai, :CreateDate, :EditDate)";
            $stmt = $conn->prepare($sql);
            $idCate = $sp->getDanhmuc();
            $tensp =  $sp->getTenSP();
            $anhsp = $sp->getAnhSP();
            $soluong = $sp->getSoLuong();
            $motangan =  $sp->getMotaNgan();
            $motadai = $sp->getMotaDai();
            $ngaytao = $sp->getCreateDate();
            $stmt->bindParam(':idDanhmuc', $idCate); // Assuming CategoryProduct has an 'idCategory' property
            $stmt->bindParam(':TenSP', $tensp);
            $stmt->bindParam(':AnhSP', $anhsp);
            $stmt->bindParam(':SoLuong', $soluong);
            $stmt->bindParam(':MotaNgan', $motangan);
            $stmt->bindParam(':MotaDai', $motadai);
            $stmt->bindParam(':CreateDate', $ngaytao);
            $stmt->bindParam(':EditDate', $ngaytao);

            $stmt->execute();
            return true; // Return true upon successful insertion
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false; // Return false if an error occurs
        }
    }
    public function UpdateProduct(Product $sp, $idProduct)
    {
        global $conn;
        try {
            $sql = "UPDATE `product` 
                SET `idDanhmuc`=:idDanhmuc,
                    `TenSP`=:TenSP,
                    `AnhSP`=:AnhSP,
                    `SoLuong`=:SoLuong,
                    `MotaNgan`=:MotaNgan,
                    `MotaDai`=:MotaDai,
                    `NgaySua`=:NgaySua 
                WHERE `idProduct` = :idProduct";
            $stmt = $conn->prepare($sql);

            $idCate = $sp->getDanhmuc();
            $tensp =  $sp->getTenSP();
            $anhsp = $sp->getAnhSP();
            $soluong = $sp->getSoLuong();
            $motangan =  $sp->getMotaNgan();
            $motadai = $sp->getMotaDai();
            $ngayupdate = $sp->getCreateDate();


            // Bind parameters
            $stmt->bindParam(':idDanhmuc', $idCate);
            $stmt->bindParam(':TenSP', $tensp);
            $stmt->bindParam(':AnhSP', $anhsp);
            $stmt->bindParam(':SoLuong', $soluong);
            $stmt->bindParam(':MotaNgan', $motangan);
            $stmt->bindParam(':MotaDai', $motadai);

            $stmt->bindParam(':NgaySua', $ngayupdate);
            $stmt->bindParam(':idProduct', $idProduct);

            $stmt->execute();
            return true; // Return true upon successful update
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false; // Return false if an error occurs
        }
    }

    public function GetIdProduct()
    {
        global $conn;
        try {
            $sql = "SELECT Max(idProduct) as IDMAX FROM `product`";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['IDMAX']; // Trả về giá trị lớn nhất của cột idProduct
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false; // Trả về false nếu có lỗi
        }
    }
    public function GetIdSizeHinhAnh()
    {
        global $conn;
        try {
            $sql = "SELECT MAX(`IdHinhAnh`) as MaxID FROM `hinhanhsanpham` ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['MaxID']; // Trả về giá trị lớn nhất của cột IdHinhAnh
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false; // Trả về false nếu có lỗi
        }
    }

    public function Delete($idProduct)
    {
        global $conn;
        try {
            // Chuẩn bị câu lệnh SQL để xóa sản phẩm có idProduct tương ứng
            $sql = "DELETE FROM `product` WHERE idProduct = :idProduct";

            // Chuẩn bị và thực thi câu lệnh SQL
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':idProduct', $idProduct, PDO::PARAM_INT);
            $stmt->execute();

            // Trả về true nếu xóa thành công
            return true;
        } catch (PDOException $e) {
            // Xử lý ngoại lệ nếu có lỗi và trả về false
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false;
        }
    }

    public function InsertSize(SizeSanPham $sp)
    {
        global $conn;
        try {
            $sql = "INSERT INTO `sizesanpham`(`MaSP`, `Size`, `Trongluong`, `Soluong`, `GiaGocSP`, `GiaSale`, `GiaBan`) VALUES 
            (:idPro, :size, :trongluong, :soluong, :giagoc, :giasale, :giaban)";
            $stmt = $conn->prepare($sql);


            $idPro = $sp->getMaSP();
            $size = $sp->getSize();
            $trongluong = $sp->getTrongluong();
            $soluong = $sp->getSoluong();
            $giagoc = $sp->getGiaGocSP();
            $giasale = $sp->getGiaSale();
            $giaban = $sp->getGiaBan();

            // Bind các giá trị vào các tham số của câu lệnh SQL
            $stmt->bindParam(':idPro', $idPro);
            $stmt->bindParam(':size', $size);
            $stmt->bindParam(':trongluong', $trongluong);
            $stmt->bindParam(':soluong', $soluong);
            $stmt->bindParam(':giagoc', $giagoc);
            $stmt->bindParam(':giasale', $giasale);
            $stmt->bindParam(':giaban', $giaban);

            // Thực thi câu lệnh SQL
            $stmt->execute();

            return true; // Trả về true khi chèn thành công
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false; // Trả về false nếu có lỗi xảy ra
        }
    }
    public function UpdateSize(SizeSanPham $sp)
    {
        global $conn;
        try {
            $sql = "UPDATE `sizesanpham` 
                SET `Trongluong`=:trongluong,
                    `Soluong`=:soluong,
                    `GiaGocSP`=:giagoc,
                    `GiaSale`=:giasale,
                    `GiaBan`=:giaban 
                WHERE `MaSP` = :idPro and Size= :size";
            $stmt = $conn->prepare($sql);

            // Lấy giá trị các thuộc tính từ đối tượng SizeSanPham
            $idPro = $sp->getMaSP();
            $size = $sp->getSize();

            $trongluong = $sp->getTrongluong();
            $soluong = $sp->getSoluong();
            $giagoc = $sp->getGiaGocSP();
            $giasale = $sp->getGiaSale();
            $giaban = $sp->getGiaBan();

            // Bind các giá trị vào các tham số của câu lệnh SQL
            $stmt->bindParam(':idPro', $idPro);
            $stmt->bindParam(':size', $size);

            $stmt->bindParam(':trongluong', $trongluong);
            $stmt->bindParam(':soluong', $soluong);
            $stmt->bindParam(':giagoc', $giagoc);
            $stmt->bindParam(':giasale', $giasale);
            $stmt->bindParam(':giaban', $giaban);

            // Thực thi câu lệnh SQL
            $stmt->execute();

            return true; // Trả về true khi cập nhật thành công
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false; // Trả về false nếu có lỗi xảy ra
        }
    }
    public function GetCountSize($idproduct)
    {
        global $conn;
        try {
            $sql = "SELECT COUNT(*) as Count FROM `sizesanpham` WHERE MaSP = :MaSP";
            $stmt = $conn->prepare($sql);

            // Bind the parameter value
            $stmt->bindParam(':MaSP', $idproduct);

            // Execute the query
            $stmt->execute();

            // Fetch the result
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            // Return the count of images
            return $result['Count'];
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false; // Return false if there's an error
        }
    }
    public function DeleteSizeHinh($idproduct)
    {
        global $conn;
        try {
            $sql = "DELETE FROM `hinhanhsanpham` WHERE MaSP = :MaSP";
            $stmt = $conn->prepare($sql);

            // Bind the parameter value
            $stmt->bindParam(':MaSP', $idproduct);

            // Execute the query
            $result = $stmt->execute();

            // Return the result of the execution
            return $result;
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false; // Return false if there's an error
        }
    }


    public function InsertHinhAnh(SizeHinhAnh $sp)
    {
        global $conn;
        try {
            $sql = "INSERT INTO `hinhanhsanpham`( `MaSP`, `DuongDan`) VALUES (:MaSP,:DuongDan)";
            $stmt = $conn->prepare($sql);


            $idPro = $sp->getIdProduct();
            $duongdan = $sp->getDuongDan();
            $stmt->bindParam(':MaSP', $idPro);
            $stmt->bindParam(':DuongDan',  $duongdan);
            $stmt->execute();
            return true; // Trả về true khi chèn thành công
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false; // Trả về false nếu có lỗi xảy ra
        }
    }
    public function UpdateHinhAnh($idproduct, $duongdan, $idHinh)
    {
        global $conn;
        try {
            $sql = "UPDATE `hinhanhsanpham` SET `DuongDan`=:DuongDan WHERE `MaSP` = :MaSP and IdHinhAnh = :IDHinhAnh";
            $stmt = $conn->prepare($sql);



            // Bind các giá trị vào các tham số của câu lệnh SQL
            $stmt->bindParam(':MaSP', $idproduct);
            $stmt->bindParam(':DuongDan', $duongdan);
            $stmt->bindParam(':IDHinhAnh', $idHinh);

            // Thực thi câu lệnh SQL
            $stmt->execute();

            return true; // Trả về true khi cập nhật thành công
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false; // Trả về false nếu có lỗi xảy ra
        }
    }
    public function GetCountHinhAnh($idproduct)
    {
        global $conn;
        try {
            $sql = "SELECT COUNT(*) as Count FROM `hinhanhsanpham` WHERE MaSP = :MaSP";
            $stmt = $conn->prepare($sql);

            // Bind the parameter value
            $stmt->bindParam(':MaSP', $idproduct);

            // Execute the query
            $stmt->execute();

            // Fetch the result
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            // Return the count of images
            return $result['Count'];
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false; // Return false if there's an error
        }
    }



    // ACCOUNT ADMIN
    public function GetAccount($idaccount)
    {
        global $conn;
        try {
            $sql = "SELECT * FROM `Account` WHERE AccountID = $idaccount";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false; // Trả về false nếu có lỗi
        }
    }

    //HOME_ DOANH THU
    public function DoanhThu()
    {
        global $conn;
        try {
            $sql = "SELECT SUM(TongTien) as TongDoanhThu
            FROM DonHang
            WHERE TrangThai = 'Đã xác nhận'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result["TongDoanhThu"];
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false; // Trả về false nếu có lỗi
        }
    }
    public function SoLuongTonKho()
    {
        global $conn;
        try {
            $sql = "SELECT SUM(Soluong) AS TongSoLuongConLai
            FROM SizeSanPham;";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result["TongSoLuongConLai"];
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false; // Trả về false nếu có lỗi
        }
    }
    public function TongDonHangChuaXacNhan()
    {
        global $conn;
        try {
            $sql = "SELECT COUNT(*) AS TongDonHangChuaXacNhan
            FROM DonHang
            WHERE TrangThai = 'Chưa duyệt';";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result["TongDonHangChuaXacNhan"];
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false; // Trả về false nếu có lỗi
        }
    }
    public function DoanhThuNgay()
    {
        global $conn;
        try {
            $sql = "SELECT SUM(TongTien) AS TongTienTatCa
            FROM DonHang
            WHERE TrangThai = 'Đã xác nhận' AND NgayDat = CURDATE();";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result["TongTienTatCa"];
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false; // Trả về false nếu có lỗi
        }
    }
    public function GetKhachHangOrder()
    {
        global $conn;
        try {
            $sql = "SELECT 
                        cdh.madonhang AS idDonHang,
                        dh.TenKH,
                        dh.TrangThai,
                        SUM(cdh.soluong) AS SoLuongSanPham,
                        SUM(cdh.thanhtien) AS TongTienDonHang
                    FROM 
                        ChiTietDonHang cdh
                    JOIN 
                        DonHang dh ON cdh.madonhang = dh.MaDH
                    WHERE 
                        dh.TrangThai = 'Chưa duyệt'
                    GROUP BY 
                        cdh.madonhang, dh.TenKH, dh.TrangThai;";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false; // Trả về false nếu có lỗi
        }
    }
}
