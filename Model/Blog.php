<?php
class Blog
{
    public $idBlog;
    public CategoryBlog $idCategory;
    public $Title;
    public $Description;
    public $imageBlog;
    public $Detail;
    public $CreatedDate;
    public $CreatedBy;
    public $ModifiedDate;
    public $ViewCount;
    public $Status;

    public function __construct($idBlog, CategoryBlog $idCategory, $Title, $Description, $imageBlog, $Detail, $CreatedDate, $CreatedBy, $ModifiedDate, $ViewCount, $Status)
    {
        $this->idBlog = $idBlog;
        $this->idCategory = $idCategory;
        $this->Title = $Title;
        $this->Description = $Description;
        $this->imageBlog = $imageBlog;
        $this->Detail = $Detail;
        $this->CreatedDate = $CreatedDate;
        $this->CreatedBy = $CreatedBy;
        $this->ModifiedDate = $ModifiedDate;
        $this->ViewCount = $ViewCount;
        $this->Status = $Status;
    }
}
