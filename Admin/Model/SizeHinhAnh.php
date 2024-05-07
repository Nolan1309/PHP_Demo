<?php
class SizeHinhAnh
{
    public $idHinhAnh;
    public $idProduct;
    public $DuongDan;
    public function __construct($idHinhAnh, $idProduct, $DuongDan)
    {
        $this->idHinhAnh = $idHinhAnh;
        $this->idProduct = $idProduct;
        $this->DuongDan = $DuongDan;
    }

    // Getter và setter cho idHinhAnh
    public function getIdHinhAnh()
    {
        return $this->idHinhAnh;
    }

    public function setIdHinhAnh($idHinhAnh)
    {
        $this->idHinhAnh = $idHinhAnh;
    }

    // Getter và setter cho idProduct
    public function getIdProduct()
    {
        return $this->idProduct;
    }

    public function setIdProduct($idProduct)
    {
        $this->idProduct = $idProduct;
    }

    // Getter và setter cho DuongDan
    public function getDuongDan()
    {
        return $this->DuongDan;
    }

    public function setDuongDan($DuongDan)
    {
        $this->DuongDan = $DuongDan;
    }
   
}
