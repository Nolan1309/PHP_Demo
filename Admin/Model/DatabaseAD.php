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
}
