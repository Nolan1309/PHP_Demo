<?php
class Product {
    // Các thuộc tính của lớp Product
    public $idProduct;
    public CategoryProduct $danhmuc; // Đây là một đối tượng của lớp CategoryProduct
    public $TenSP;
    public $AnhSP;
    public $SoLuong;
    public $MotaNgan;
    public $MotaDai;
    public $CreateDate;
    public $NgaySua;

    // Constructor của lớp Product
    // public function __construct($idProduct, CategoryProduct $danhmuc, $TenSP, $AnhSP, $SoLuong, $MotaNgan, $MotaDai, $CreateDate, $NgaySua) {
    //     $this->idProduct = $idProduct;
    //     $this->danhmuc = $danhmuc;
    //     $this->TenSP = $TenSP;
    //     $this->AnhSP = $AnhSP;
    //     $this->SoLuong = $SoLuong;
    //     $this->MotaNgan = $MotaNgan;
    //     $this->MotaDai = $MotaDai;
    //     $this->CreateDate = $CreateDate;
    //     $this->NgaySua = $NgaySua;
    // }
    public function __construct(){

    }
    // Phương thức để lấy thông tin sản phẩm
    public function getProductInfo() {
        return "ID: " . $this->idProduct . ", Category: " . $this->danhmuc->tenDanhmuc . ", Name: " . $this->TenSP . ", Image: " . $this->AnhSP . ", Quantity: " . $this->SoLuong . ", Short Description: " . $this->MotaNgan . ", Long Description: " . $this->MotaDai . ", Create Date: " . $this->CreateDate . ", Last Updated: " . $this->NgaySua;
    }
}


?>