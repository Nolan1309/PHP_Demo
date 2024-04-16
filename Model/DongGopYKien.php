<?php

class GopYKien
{
    public $id;
    public $HoTen;
    public $Email;
    public $Sdt;
    public $ChuDe;
    public $DongGopY;

    public function __construct($HoTen, $Email, $Sdt, $ChuDe, $DongGopY)
    {
        $this->HoTen = $HoTen;
        $this->Email = $Email;
        $this->Sdt = $Sdt;
        $this->ChuDe = $ChuDe;
        $this->DongGopY = $DongGopY;
    }
    public function insertDongGop($conn, GopYKien $ykien)
    {

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
