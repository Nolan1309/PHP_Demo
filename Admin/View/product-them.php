<?php
$productCate = new admin();
$productCateList = $productCate->loadCategorySanPham();


if (isset($_GET['alert'])) {
    echo "<div class='alert'>" . htmlspecialchars($_GET['alert']) . "</div>";
}
?>
<style>
    form {
        max-width: 100%;
        margin: 0 0 0 20%;
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
    #image,
    #images {
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

    input[type="number"][disabled],
    input[type="text"][disabled] {
        color: #f2f2f2;
        /* Màu nền xám nhạt */
        background-color: #CCCCCC;
        /* Màu chữ xám */
    }

    input[type="number"]:not([disabled]),
    input[type="text"]:not([disabled]) {
        background-color: #fff;
        /* Màu nền trắng */
        color: #000;
        /* Màu chữ đen */
    }

    select#category {
        width: 100%;
        padding: 10px;
        /* margin-bottom: 20px; */
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        display: block;
    }

    select#category option {
        width: 100%;
        padding: 10px;

        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        display: block;
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

                    <form action="?View=product-xuly" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">


                        <label for="category">Danh mục sản phẩm:</label>
                        <select id="category" name="category">
                            <?php

                            $categories = $productCate->loadCategorySanPham();

                            // Kiểm tra nếu có dữ liệu trả về từ hàm
                            if ($categories) {
                                // Duyệt qua mỗi dòng dữ liệu và tạo option cho combobox
                                foreach ($categories as $category) {
                                    echo "<option value='" . $category['idDanhmuc'] . "'>" . $category['tenDanhmuc'] . "</option>";
                                }
                            } else {
                                echo "<option value=''>Không có dữ liệu</option>";
                            }
                            ?>
                        </select>
                        <label for="TenSP">Tên sản phẩm:</label>
                        <input type="text" id="TenSP" name="TenSP" required>

                        <label for="image">Ảnh sản phẩm:</label>
                        <input type="file" id="image" name="image" placeholder="Chọn danh sách ảnh" required accept="image/*">

                        <label for="images">Ảnh sản phẩm chi tiết:</label>
                        <input type="file" id="images" name="images[]" multiple="multipart" placeholder="Chọn danh sách ảnh" required accept="image/*">

                        <!-- Hàng cho size, số lượng và giá bán của Size Nhỏ -->
                        <label for="size_nho">Size S:</label>
                        <div class="size-item">
                            <input type="checkbox" id="size_nho" data-size="nho" name="size_nho_checkbox" placeholder="Size" onchange="toggleFields('nho')">
                            <input type="number" id="SoLuong_nho" name="SoLuong_nho" placeholder="Số lượng" disabled>
                            <input type="text" id="TrongLuong_nho" name="TrongLuong_nho" placeholder="Trọng lượng (Đơn vị KG)" disabled>
                            <input type="text" id="GiaGoc_nho" name="GiaGoc_nho" placeholder="Giá gốc" disabled>
                            <input type="text" id="GiaSale_nho" name="GiaSale_nho" placeholder="Giá sale" disabled>
                            <input type="text" id="GiaBan_nho" name="GiaBan_nho" placeholder="Giá bán" disabled>

                        </div>

                        <!-- Hàng cho size, số lượng và giá bán của Size Vừa -->
                        <label for="size_vua">Size N:</label>
                        <div class="size-item">
                            <input type="checkbox" id="size_vua" data-size="vua" name="size_vua_checkbox" placeholder="Size" onchange="toggleFields('vua')">
                            <input type="number" id="SoLuong_vua" name="SoLuong_vua" placeholder="Số lượng" disabled>
                            <input type="text" id="TrongLuong_vua" name="TrongLuong_vua" placeholder="Trọng lượng (Đơn vị KG)" disabled>
                            <input type="text" id="GiaGoc_vua" name="GiaGoc_vua" placeholder="Giá gốc" disabled>
                            <input type="text" id="GiaSale_vua" name="GiaSale_vua" placeholder="Giá sale" disabled>
                            <input type="text" id="GiaBan_vua" name="GiaBan_vua" placeholder="Giá bán" disabled>
                        </div>

                        <!-- Hàng cho size, số lượng và giá bán của Size Lớn -->
                        <label for="size_lon">Size L:</label>
                        <div class="size-item">
                            <input type="checkbox" id="size_lon" data-size="lon" name="size_lon_checkbox" placeholder="Size" onchange="toggleFields('lon')">
                            <input type="number" id="SoLuong_lon" name="SoLuong_lon" placeholder="Số lượng" disabled>
                            <input type="text" id="TrongLuong_lon" name="TrongLuong_lon" placeholder="Trọng lượng (Đơn vị KG)" disabled>
                            <input type="text" id="GiaGoc_lon" name="GiaGoc_lon" placeholder="Giá gốc" disabled>
                            <input type="text" id="GiaSale_lon" name="GiaSale_lon" placeholder="Giá sale" disabled>
                            <input type="text" id="GiaBan_lon" name="GiaBan_lon" placeholder="Giá bán" disabled>
                        </div>

                        <label for="MotaNgan">Mô tả ngắn:</label>
                        <textarea id="MotaNgan" name="MotaNgan" required></textarea>

                        <label for="MotaDai">Mô tả chi tiết:</label>
                        <textarea id="MotaDai" name="MotaDai" required></textarea>

                        <input type="submit" name="addproduct" value="Thêm sản phẩm">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleFields(size) {
        var checkbox = document.getElementById("size_" + size);
        var SoLuong = document.getElementById("SoLuong_" + size);
        var GiaBan = document.getElementById("GiaBan_" + size);
        var TrongLuong = document.getElementById("TrongLuong_" + size);
        var GiaGoc = document.getElementById("GiaGoc_" + size);
        var GiaSale = document.getElementById("GiaSale_" + size);
        if (checkbox.checked) {
            SoLuong.disabled = false;
            GiaBan.disabled = false;
            GiaGoc.disabled = false;
            GiaSale.disabled = false;
            TrongLuong.disabled = false;

        } else {
            SoLuong.disabled = true;
            GiaBan.disabled = true;
            GiaGoc.disabled = true;
            GiaSale.disabled = true;
            TrongLuong.disabled = true;
        }
    }

    function validateForm() {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        var checked = false;
        var inputsValid = true;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                checked = true;

                var size = checkboxes[i].getAttribute("data-size");
                var soLuong = document.getElementById("SoLuong_" + size);
                var trongLuong = document.getElementById("TrongLuong_" + size);
                var giaGoc = document.getElementById("GiaGoc_" + size);
                var giaSale = document.getElementById("GiaSale_" + size);
                var giaBan = document.getElementById("GiaBan_" + size);

                if (soLuong.value === "" || trongLuong.value === "" || giaGoc.value === "" || giaBan.value === "") {
                    inputsValid = false;
                    break;
                }
                if (isNaN(soLuong.value) || soLuong.value <= 0) {
                    alert("Số lượng phải là số nguyên và lớn hơn 0.");
                    return false;
                }
                if (trongLuong.value <= 0) {
                    alert("Trọng lượng phải lớn hơn 0.");
                    return false;
                }
                if (giaGoc.value <= 0) {
                    alert("Giá gốc phải lớn hơn 0.");
                    return false;
                }
                if (giaSale.value < 0) {
                    alert("Giá sale phải lớn hơn hoặc bằng 0.");
                    return false;
                }
                if (parseFloat(giaBan.value) <= parseFloat(giaGoc.value)) {
                    alert("Giá bán phải lớn hơn giá gốc.");


                    return false;
                }
            }
        }

        if (!checked) {
            alert("Vui lòng chọn ít nhất một size cho sản phẩm.");
            return false;
        } else if (!inputsValid) {
            alert("Vui lòng không để trống các ô cho các size đã chọn.");
            return false;
        }

        return true;
    }
</script>