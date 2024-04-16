<?php
class BinhLuanBlog {
    public $idBinhLuan;
    public Blog $idBlog;
    public $tenKH;
    public $Content;

    public function __construct($idBinhLuan,Blog $idBlog, $tenKH, $Content) {
        $this->idBinhLuan = $idBinhLuan;
        $this->idBlog = $idBlog;
        $this->tenKH = $tenKH;
        $this->Content = $Content;
    }
}

?>