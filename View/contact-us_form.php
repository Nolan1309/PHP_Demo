<?php
include_once '../Model/DongGopYKien.php';
include_once '../Config/config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['first_name']) && isset($_POST['phone']) && isset($_POST['email_address']) && isset($_POST['message'])) {

        $first_name = $_POST['first_name'];
        $email_address = $_POST['email_address'];
        $phone = $_POST['phone'];
        $subject = isset($_POST['contact_subject']) ? $_POST['contact_subject'] : "";
        $message = $_POST['message'];
        $ykien = new GopYKien($first_name, $email_address, $phone, $subject, $message);
      
        $inserted  = $ykien->insertDongGop($conn,$ykien);
     
        if ($inserted) {
            echo "Gửi thành công !";
        } else {
            echo "Gửi không thành công";
        }
    } else {
        echo "Server đang lỗi , không thể nhận ý kiến !";
    }
}
