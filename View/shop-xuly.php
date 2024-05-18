<?php
// Kết nối cơ sở dữ liệu và các thao tác xử lý dữ liệu ở đây
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['low']) && isset($_POST['high'])) {
    $lowPrice = $_POST['low'];
    $highPrice = $_POST['high'];

    echo $lowPrice;
    echo "<br>";
    echo $highPrice;
}
