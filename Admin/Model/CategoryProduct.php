<?php

class CategoryProduct
{

    public $idDanhmuc;
    public $tenDanhmuc;


    public function __construct($idDanhmuc)
    {
        $this->idDanhmuc = $idDanhmuc;
    }

    // Getter cho thuộc tính $idDanhmuc
    public function getIdDanhmuc()
    {
        return $this->idDanhmuc;
    }

    // Setter cho thuộc tính $idDanhmuc
    public function setIdDanhmuc($idDanhmuc)
    {
        $this->idDanhmuc = $idDanhmuc;
    }

    // Getter cho thuộc tính $tenDanhmuc
    public function getTenDanhmuc()
    {
        return $this->tenDanhmuc;
    }

    // Setter cho thuộc tính $tenDanhmuc
    public function setTenDanhmuc($tenDanhmuc)
    {
        $this->tenDanhmuc = $tenDanhmuc;
    }
}
