<?php


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['low']) && isset($_POST['high'])) {
    $lowPrice = $_POST['low'];
    $highPrice = $_POST['high'];

    // Chuyển hướng với tham số trong URL
    // echo "window.location.href = '?View=shop-fill&from=$lowPrice'&to=$highPrice';";

    
    $redirect_url = "?View=shop-fill&from=$lowPrice&to=$highPrice";
    // Trả về URL
    echo $redirect_url;
    exit; // Kết thúc kịch bản PHP
}
