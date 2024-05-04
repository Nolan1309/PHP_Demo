<?php
class Product
{
    // Các thuộc tính của lớp Product
    public $idProduct;
    public CategoryProduct $danhmuc;
    public $TenSP;
    public $AnhSP;
    public $SoLuong;
    public $MotaNgan;
    public $MotaDai;
    public $CreateDate;
    public $NgaySua;

   
    public function __construct(CategoryProduct $danhmuc, $TenSP, $AnhSP, $SoLuong, $MotaNgan, $MotaDai, $CreateDate)
    {

        $this->danhmuc = $danhmuc;
        $this->TenSP = $TenSP;
        $this->AnhSP = $AnhSP;
        $this->SoLuong = $SoLuong;
        $this->MotaNgan = $MotaNgan;
        $this->MotaDai = $MotaDai;
        $this->CreateDate = $CreateDate;
    }
    // public function get()
    // {
    //     return " Category - {$this->danhmuc->idDanhmuc}, Name - $this->TenSP, Image - $this->AnhSP, Quantity - $this->SoLuong, Short Description - $this->MotaNgan, Long Description - $this->MotaDai, Create Date - $this->CreateDate, Last Edited - $this->NgaySua";
    // }
    public function getIdProduct()
    {
        return $this->idProduct;
    }

    public function setIdProduct($idProduct)
    {
        $this->idProduct = $idProduct;
    }

    // Getter và Setter cho thuộc tính $danhmuc
    public function getDanhmuc()
    {
        return $this->danhmuc->getIdDanhmuc();
    }

    public function setDanhmuc($danhmuc)
    {
        $this->danhmuc = $danhmuc;
    }

    // Getter và Setter cho thuộc tính $AnhSP
    public function getAnhSP()
    {
        return $this->AnhSP;
    }

    public function setAnhSP($AnhSP)
    {
        $this->AnhSP = $AnhSP;
    }

    // Getter và Setter cho thuộc tính $SoLuong
    public function getSoLuong()
    {
        return $this->SoLuong;
    }

    public function setSoLuong($SoLuong)
    {
        $this->SoLuong = $SoLuong;
    }

    // Getter và Setter cho thuộc tính $TenSP
    public function getTenSP()
    {
        return $this->TenSP;
    }

    public function setTenSP($TenSP)
    {
        $this->TenSP = $TenSP;
    }

    // Getter và Setter cho thuộc tính $MotaNgan
    public function getMotaNgan()
    {
        return $this->MotaNgan;
    }

    public function setMotaNgan($MotaNgan)
    {
        $this->MotaNgan = $MotaNgan;
    }

    // Getter và Setter cho thuộc tính $MotaDai
    public function getMotaDai()
    {
        return $this->MotaDai;
    }

    public function setMotaDai($MotaDai)
    {
        $this->MotaDai = $MotaDai;
    }

    // Getter và Setter cho thuộc tính $CreateDate
    public function getCreateDate()
    {
        return $this->CreateDate;
    }

    public function setCreateDate($CreateDate)
    {
        $this->CreateDate = $CreateDate;
    }

    // Getter và Setter cho thuộc tính $NgaySua
    public function getNgaySua()
    {
        return $this->NgaySua;
    }

    public function setNgaySua($NgaySua)
    {
        $this->NgaySua = $NgaySua;
    }
}
