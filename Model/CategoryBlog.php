<?php
class CategoryBlog
{
    public $idCategory;
    public $TenDanhMuc;

    public function __construct($idCategory, $TenDanhMuc)
    {
        $this->idCategory = $idCategory;
        $this->TenDanhMuc = $TenDanhMuc;
    }
}
