<?php
class ChiTietDonHang
{
    public DonHang $madonhang;
    public Product $MaSP;
    public SizeSanPham $Size;
    public $soluong;
    public $dongia;
    public $thanhtien;

    public function __construct(DonHang $madonhang, Product $MaSP, SizeSanPham $Size, $soluong, $dongia, $thanhtien)
    {
        $this->madonhang = $madonhang;
        $this->MaSP = $MaSP;
        $this->Size = $Size;
        $this->soluong = $soluong;
        $this->dongia = $dongia;
        $this->thanhtien = $thanhtien;
    }
}
