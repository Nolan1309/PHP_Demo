<?php
class SizeSanPham
{
    public  $MaSP;
    public $Size;
    public $Trongluong;
    public $Soluong;
    public $GiaGocSP;
    public $GiaSale;
    public $GiaBan;

    public function __construct($MaSP, $Size, $Trongluong, $Soluong, $GiaGocSP, $GiaSale, $GiaBan)
    {
        $this->MaSP = $MaSP;
        $this->Size = $Size;
        $this->Trongluong = $Trongluong;
        $this->Soluong = $Soluong;
        $this->GiaGocSP = $GiaGocSP;
        $this->GiaSale = $GiaSale;
        $this->GiaBan = $GiaBan;
    }
    // Getter cho thuộc tính MaSP
    public function getMaSP()
    {
        return $this->MaSP;
    }

    // Setter cho thuộc tính MaSP
    public function setMaSP($MaSP)
    {
        $this->MaSP = $MaSP;
    }

    // Getter cho thuộc tính Size
    public function getSize()
    {
        return $this->Size;
    }

    // Setter cho thuộc tính Size
    public function setSize($Size)
    {
        $this->Size = $Size;
    }

    // Getter cho thuộc tính Trongluong
    public function getTrongluong()
    {
        return $this->Trongluong;
    }

    // Setter cho thuộc tính Trongluong
    public function setTrongluong($Trongluong)
    {
        $this->Trongluong = $Trongluong;
    }

    // Getter cho thuộc tính Soluong
    public function getSoluong()
    {
        return $this->Soluong;
    }

    // Setter cho thuộc tính Soluong
    public function setSoluong($Soluong)
    {
        $this->Soluong = $Soluong;
    }

    // Getter cho thuộc tính GiaGocSP
    public function getGiaGocSP()
    {
        return $this->GiaGocSP;
    }

    // Setter cho thuộc tính GiaGocSP
    public function setGiaGocSP($GiaGocSP)
    {
        $this->GiaGocSP = $GiaGocSP;
    }

    // Getter cho thuộc tính GiaSale
    public function getGiaSale()
    {
        return $this->GiaSale;
    }

    // Setter cho thuộc tính GiaSale
    public function setGiaSale($GiaSale)
    {
        $this->GiaSale = $GiaSale;
    }

    // Getter cho thuộc tính GiaBan
    public function getGiaBan()
    {
        return $this->GiaBan;
    }

    // Setter cho thuộc tính GiaBan
    public function setGiaBan($GiaBan)
    {
        $this->GiaBan = $GiaBan;
    }
    public function toString() {
        return "Mã sản phẩm: " . $this->MaSP . ", Size: " . $this->Size . ", Trọng lượng: " . $this->Trongluong . ", Số lượng: " . $this->Soluong . ", Giá gốc: " . $this->GiaGocSP . ", Giá sale: " . $this->GiaSale . ", Giá bán: " . $this->GiaBan;
    }
    
}
