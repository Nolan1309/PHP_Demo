<?php
class AddressKH {
    public $IdDiaChi;
    public Account $AccountID;
    public $FullName;
    public $SDTKH;
    public $tinhKH;
    public $quanKH;
    public $huyenKH;
    public $duongKH;

    public function __construct($IdDiaChi,Account $AccountID, $FullName, $SDTKH, $tinhKH, $quanKH, $huyenKH, $duongKH) {
        $this->IdDiaChi = $IdDiaChi;
        $this->AccountID = $AccountID;
        $this->FullName = $FullName;
        $this->SDTKH = $SDTKH;
        $this->tinhKH = $tinhKH;
        $this->quanKH = $quanKH;
        $this->huyenKH = $huyenKH;
        $this->duongKH = $duongKH;
    }
}


?>