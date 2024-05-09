<?php

include '../../Config/config.php';

class admin_ver2
{
    public function CancelDonHang($idDonhang)
    {
        global $conn;
        try {
            $sql = "UPDATE donhang SET `TrangThai` = N'Đã hủy' WHERE `MaDH` = $idDonhang";
            $stmt = $conn->prepare($sql);

            // Execute the query
            $result = $stmt->execute();

            // Return the result of the execution
            return true;
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false; // Return false if there's an error
        }
    }

    public function UpdateDonHang($idDonhang)
    {
        global $conn;
        try {
            $sql = "UPDATE donhang SET `TrangThai` = N'Đã xác nhận' WHERE `MaDH` = $idDonhang";
            $stmt = $conn->prepare($sql);


            // Thực thi câu lệnh SQL
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false;
        }
    }
}
?>

<?php


//Update
if (isset($_POST['idDonHang']) && isset($_POST['action']) && $_POST['action'] == 'edit') {
    $idDonhang = $_POST['idDonHang'];
    $ad = new admin_ver2();

    $check = $ad->UpdateDonHang($idDonhang);
    if ($check) {
        $response = array(
            'status' => 'success',
            'message' => 'Xác nhận đơn hàng thành công !'
        );
        $json_response = json_encode($response);
        echo $json_response;
    }
}
// //Delete
if (isset($_POST['idDonHang']) && isset($_POST['action']) && $_POST['action'] == 'cancel') {
    $idDonhang = $_POST['idDonHang'];
    $ad = new admin_ver2();
    $check =  $ad->CancelDonHang($idDonhang);
    if ($check) {
        $response = array(
            'status' => 'success',
            'message' => 'Hủy đơn hàng thành công.'
        );

        $json_response = json_encode($response);
        echo $json_response;
    }
}
