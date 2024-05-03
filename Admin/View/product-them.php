<?php
$productCate = new admin();
$productCateList = $productCate->loadCategorySanPham();


?>
<style>
    form {
        max-width: 100%;
        margin: 0 0 0 23%;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
        font-weight: bold;
        margin: 10px 0px;
        display: block;
    }

    input[type="text"],
    input[type="number"],
    textarea {
        width: 100%;
        padding: 10px;
        /* margin-bottom: 20px; */
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        display: block;
    }

    input[type="file"] {
        margin-bottom: 20px;
    }

    input[type="checkbox"] {
        margin-right: 10px;
    }

    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 15px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        margin-top: 10px;
    }

    input[type="submit"]:hover {
        background-color: #45a049;

    }

    /* Optional: Customize styles for specific elements */
    #AnhSP {
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .size-item {
        display: flex;
        gap: 10px;
        align-items: center;
        justify-content: center;
        text-align: center;
        margin: 10px 0px;
    }

    /* Optional: Adjust styles for smaller screens */
    @media screen and (max-width: 600px) {
        form {
            max-width: 100%;
            margin: 0 0 0 1%;
        }
    }
</style>

<div class="content-body">
    <div class="row justify-content-between align-items-center mb-10">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <!-- <form action="./product-xuly.php" method="post" enctype="multipart/form-data"> -->
                    <form action="?View=product-xuly" method="post" enctype="multipart/form-data">

                        <label for="idDanhmuc">ID Danh mục:</label>
                        <input type="text" id="idDanhmuc" name="idDanhmuc">

                        <label for="TenSP">Tên sản phẩm:</label>
                        <input type="text" id="TenSP" name="TenSP">

                        <label for="AnhSP">Ảnh sản phẩm:</label>
                        <input type="file" id="AnhSP" name="AnhSP">

                        <!-- Hàng cho size, số lượng và giá bán của Size Nhỏ -->
                        <label for="size_nho">Size Nhỏ:</label>
                        <div class="size-item">
                            <input type="checkbox" id="size_nho" name="size_nho" placeholder="Size">
                            <input type="number" id="SoLuong_nho" name="SoLuong_nho" placeholder="Số lượng">
                            <input type="text" id="GiaBan_nho" name="GiaBan_nho" placeholder="Giá bán">
                        </div>


                        <!-- Hàng cho size, số lượng và giá bán của Size Vừa -->
                        <label for="size_vua">Size Vừa:</label>
                        <div class="size-item">
                            <input type="checkbox" id="size_vua" name="size_vua" placeholder="Size">
                            <input type="number" id="SoLuong_vua" name="SoLuong_vua" placeholder="Số lượng">
                            <input type="text" id="GiaBan_vua" name="GiaBan_vua" placeholder="Giá bán">
                        </div>

                        <!-- Hàng cho size, số lượng và giá bán của Size Lớn -->
                        <label for="size_lon">Size Lớn:</label>
                        <div class="size-item">
                            <input type="checkbox" id="size_lon" name="size_lon" placeholder="Size">
                            <input type="number" id="SoLuong_lon" name="SoLuong_lon" placeholder="Số lượng">
                            <input type="text" id="GiaBan_lon" name="GiaBan_lon" placeholder="Giá bán">
                        </div>
                        <label for="trongluong">Trọng lượng:</label>
                        <input type="text" id="trongluong" name="trongluong">

                        <label for="MotaNgan">Mô tả ngắn:</label>
                        <textarea id="MotaNgan" name="MotaNgan"></textarea>

                        <label for="MotaDai">Mô tả chi tiết:</label>
                        <textarea id="MotaDai" name="MotaDai"></textarea>

                        <input type="submit" name="addproduct" value="Thêm sản phẩm">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>