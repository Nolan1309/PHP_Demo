<?php
class Account
{
    public $AccountID;
    public $Email;
    public $MatKhau;
    public $Phone;
    public $FullName;
    public $CreateDate;
    public PhanQuyen $Level;

    public function __construct($AccountID, $Email, $MatKhau, $Phone, $FullName, $CreateDate,PhanQuyen $IDPhanquyen)
    {
        $this->AccountID = $AccountID;
        $this->Email = $Email;
        $this->MatKhau = $MatKhau;
        $this->Phone = $Phone;
        $this->FullName = $FullName;
        $this->CreateDate = $CreateDate;
        $this->Level = $IDPhanquyen;
    }
}
