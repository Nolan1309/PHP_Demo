<?php
require_once '../Config/config.php';

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
}
