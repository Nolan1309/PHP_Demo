<?php
class PhanQuyen {
    public $Idphanquyen;
    public $tenphanquyen;
    public $vaitro;

    public function __construct($Idphanquyen, $tenphanquyen, $vaitro) {
        $this->Idphanquyen = $Idphanquyen;
        $this->tenphanquyen = $tenphanquyen;
        $this->vaitro = $vaitro;
    }
}

?>