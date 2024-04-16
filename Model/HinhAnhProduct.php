<?php
class HinhAnhSanPham
{
    public $IdHinhAnh;
    public Product $MaSP;
    public $DuongDan;

    public function __construct($IdHinhAnh, Product $MaSP, $DuongDan)
    {
        $this->IdHinhAnh = $IdHinhAnh;
        $this->MaSP = $MaSP;
        $this->DuongDan = $DuongDan;
    }
}
