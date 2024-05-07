<?php
$productCate = new admin();
$productCateList = $productCate->loadCategorySanPham();


// if (isset($_GET['alert'])) {
//     echo "<div class='alert'>" . htmlspecialchars($_GET['alert']) . "</div>";
// }

if (isset($_GET['idProduct'])) {

    $idProduct = $_GET['idProduct'];
    $ad = new admin();
    $productItem = $ad->loadProductAdminByID($idProduct);
    $productList_Images = $ad->loadProductHinhAnhChiTiet($idProduct);
    $productList_SizeSanPham = $ad->loadProductSizeSanPham($idProduct);
    $arrayImg = array();
    foreach ($productList_Images as $image) {
        $arrayImg[] = $image["DuongDan"];
    }
} else {
    $alert = "Sản phẩm không tìm thấy ID !";
    echo "<script> alert('$alert');  </script>";
    echo "<script>window.location.href='?View=product';</script>";
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
                        <?php
                        foreach ($productItem as $item) {
                        ?>

                            <label for="category">Danh mục sản phẩm:</label>
                            <select id="category" name="category">
                                <?php

                                $categories = $productCate->loadCategorySanPham();


                                if ($categories) {

                                    foreach ($categories as $category) {

                                        $selected = ($category['idDanhmuc'] == $item['idDanhmuc']) ? 'selected' : '';
                                        echo "<option value='" . $category['idDanhmuc'] . "' $selected>" . $category['tenDanhmuc'] . "</option>";
                                    }
                                } else {
                                    echo "<option value=''>Không có dữ liệu</option>";
                                }
                                ?>
                            </select>
                            <label for="TenSP">Tên sản phẩm:</label>
                            <input type="text" id="TenSP" name="TenSP" required value="<?php echo $item["TenSP"]; ?>">


                            <?php
                            $imageFileName =  $item["AnhSP"];
                            ?>
                            <label for="image">Ảnh sản phẩm:</label>
                            <input type="file" id="image" name="image" placeholder="Chọn danh sách ảnh" accept="image/*">
                            <input type="hidden" name="image_hidden" value="<?php echo $imageFileName; ?>">

                            <img id="previewImage" src=".././Library/images/product/<?php echo $item["AnhSP"]; ?>" width="100px" height="100px" alt="" class="product-image">



                            <label for="images">Ảnh sản phẩm chi tiết:</label>
                            <input type="file" id="images" name="images[]" multiple="multipart" placeholder="Chọn danh sách ảnh" accept="image/*">


                            <?php foreach ($productList_Images as $index => $image) : ?>
                                <input type="hidden" name="images_list[<?php echo $index; ?>]" value="<?php echo $image["DuongDan"]; ?>">
                                <img src=".././Library/images/product/<?php echo $image["DuongDan"]; ?>" width="100px" height="100px" alt="" class="product-image">
                            <?php endforeach; ?>


                            <?php
                            if ($productList_SizeSanPham) {
                                $count = count($productList_SizeSanPham);
                                $tenSize = array();
                                foreach ($productList_SizeSanPham as $size) {
                                    $tenSize[] =  $size['Size'];
                            ?>
                                    <label for="size_<?php echo $size['Size']; ?>">Size <?php echo $size['Size']; ?>:</label>
                                    <div class="size-item">
                                        <?php

                                        if (!empty($size['Soluong']) || !empty($size['Trongluong']) || !empty($size['GiaGocSP']) || !empty($size['GiaSale']) || !empty($size['GiaBan'])) {

                                        ?>
                                            <input type="checkbox" id="size_<?php echo $size['Size']; ?>" data-size="<?php echo $size['Size']; ?>" name="size_<?php echo $size['Size']; ?>_checkbox" placeholder="Size" onchange="toggleFields('<?php echo $size['Size']; ?>')" checked>
                                        <?php
                                        } else {
                                            // Nếu không có dữ liệu, không cần checkbox
                                        ?>
                                            <input type="checkbox" id="size_<?php echo $size['Size']; ?>" data-size="<?php echo $size['Size']; ?>" name="size_<?php echo $size['Size']; ?>_checkbox" placeholder="Size" onchange="toggleFields('<?php echo $size['Size']; ?>')">
                                        <?php
                                        }
                                        ?>
                                        <input type="number" id="SoLuong_<?php echo $size['Size']; ?>" name="SoLuong_<?php echo $size['Size']; ?>" placeholder="Số lượng" <?php echo (!empty($size['Soluong'])) ? '' : 'disabled'; ?> value="<?php echo $size['Soluong']; ?>">
                                        <input type="text" id="TrongLuong_<?php echo $size['Size']; ?>" name="TrongLuong_<?php echo $size['Size']; ?>" placeholder="Trọng lượng (Đơn vị KG)" <?php echo (!empty($size['Trongluong'])) ? '' : 'disabled'; ?> value="<?php echo $size['Trongluong']; ?>">
                                        <input type="text" id="GiaGoc_<?php echo $size['Size']; ?>" name="GiaGoc_<?php echo $size['Size']; ?>" placeholder="Giá gốc" <?php echo (!empty($size['GiaGocSP'])) ? '' : 'disabled'; ?> value="<?php echo $size['GiaGocSP']; ?>">
                                        <input type="text" id="GiaSale_<?php echo $size['Size']; ?>" name="GiaSale_<?php echo $size['Size']; ?>" placeholder="Giá sale" <?php echo (!empty($size['GiaSale'])) ? '' : 'disabled'; ?> value="<?php echo $size['GiaSale']; ?>">
                                        <input type="text" id="GiaBan_<?php echo $size['Size']; ?>" name="GiaBan_<?php echo $size['Size']; ?>" placeholder="Giá bán" <?php echo (!empty($size['GiaBan'])) ? '' : 'disabled'; ?> value="<?php echo $size['GiaBan']; ?>">
                                    </div>
                                <?php
                                }
                                $allSizes = ['S', 'M', 'L'];

                                $missingSizes = array();

                                foreach ($allSizes as $size) {

                                    if (!in_array($size, $tenSize)) {

                                        $missingSizes[] = $size;
                                    }
                                }
                                foreach ($missingSizes as $missingSize) { ?>
                                    <label for="size_<?php echo $missingSize; ?>">Size <?php echo $missingSize; ?>:</label>
                                    <div class="size-item">
                                        <input type="checkbox" id="size_<?php echo $missingSize; ?>" data-size="M" name="size_<?php echo $missingSize; ?>_checkbox" placeholder="Size" onchange="toggleFields('M')">
                                        <input type="number" id="SoLuong_<?php echo $missingSize; ?>" name="SoLuong_<?php echo $missingSize; ?>" placeholder="Số lượng" disabled>
                                        <input type="text" id="TrongLuong_<?php echo $missingSize; ?>" name="TrongLuong_<?php echo $missingSize; ?>" placeholder="Trọng lượng (Đơn vị KG)" disabled>
                                        <input type="text" id="GiaGoc_<?php echo $missingSize; ?>" name="GiaGoc_<?php echo $missingSize; ?>" placeholder="Giá gốc" disabled>
                                        <input type="text" id="GiaSale_<?php echo $missingSize; ?>" name="GiaSale_<?php echo $missingSize; ?>" placeholder="Giá sale" disabled>
                                        <input type="text" id="GiaBan_<?php echo $missingSize; ?>" name="GiaBan_<?php echo $missingSize; ?>" placeholder="Giá bán" disabled>
                                    </div>
                                <?php

                                }
                                ?>

                            <?php
                            } else {
                                echo "Không có kích thước";
                            }
                            ?>

                            <label for="MotaNgan">Mô tả ngắn:</label>
                            <textarea id="MotaNgan" name="MotaNgan" required><?php echo $item["MotaNgan"]; ?></textarea>

                            <label for="MotaDai">Mô tả chi tiết:</label>
                            <textarea id="MotaDai" name="MotaDai" required><?php echo $item["MotaNgan"]; ?></textarea>
                            <input type="hidden" name="MaSP" value="<?php echo $item["idProduct"];  ?>">
                            <input type="submit" name="editproduct" value="Cập nhật sản phẩm">
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // function previewImage(event) {
    //     var input = event.target;
    //     var reader = new FileReader();

    //     reader.onload = function() {
    //         var dataURL = reader.result;
    //         var previewImage = document.getElementById('previewImage');
    //         previewImage.src = dataURL;
    //     };

    //     reader.readAsDataURL(input.files[0]);
    // }

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