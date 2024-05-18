<?php
// Kiểm tra xem tham số 'getID' đã được truyền vào URL hay không
if (isset($_GET['getID'])) {
    $getID = $_GET['getID'];
    
    // Bây giờ bạn có thể sử dụng $getID để thực hiện các thao tác xử lý dữ liệu mong muốn
    echo "Giá trị của tham số 'getID' là: $getID";
} else {
    // Xử lý trường hợp nếu không có tham số 'getID' được truyền vào
    echo "Không có tham số 'getID' được truyền vào URL";
}

?>