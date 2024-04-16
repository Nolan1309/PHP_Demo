<?php
class GiaKhuyenMai
{
    public $MaKhuyenMai;
    public Product $MaSP;
    public $PhanTramGiamGia;

    public function __construct($MaKhuyenMai,Product $MaSP, $PhanTramGiamGia)
    {
        $this->MaKhuyenMai = $MaKhuyenMai;
        $this->MaSP = $MaSP;
        $this->PhanTramGiamGia = $PhanTramGiamGia;
    }
}
