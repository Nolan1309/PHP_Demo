<?php
class DonHang
{
    public $MaDH;
    public Account $MaKH;
    public $TenKH;
    public $SDTKH;
    public $tinhKH;
    public $quanKH;
    public $huyenKH;
    public $duongKH;
    public $noteKH;
    public $NgayDat;
    public $NgayGiao;
    public $TrangThai;
    public $TienHang;
    public $TienGiam;
    public $TongTien;

    public function __construct($MaDH,Account $MaKH, $TenKH, $SDTKH, $tinhKH, $quanKH, $huyenKH, $duongKH, $noteKH, $NgayDat, $NgayGiao, $TrangThai, $TienHang, $TienGiam, $TongTien)
    {
        $this->MaDH = $MaDH;
        $this->MaKH = $MaKH;
        $this->TenKH = $TenKH;
        $this->SDTKH = $SDTKH;
        $this->tinhKH = $tinhKH;
        $this->quanKH = $quanKH;
        $this->huyenKH = $huyenKH;
        $this->duongKH = $duongKH;
        $this->noteKH = $noteKH;
        $this->NgayDat = $NgayDat;
        $this->NgayGiao = $NgayGiao;
        $this->TrangThai = $TrangThai;
        $this->TienHang = $TienHang;
        $this->TienGiam = $TienGiam;
        $this->TongTien = $TongTien;
    }
}
