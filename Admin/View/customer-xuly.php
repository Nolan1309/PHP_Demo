<?php
include '../../Config/config.php';
class admin_ver2
{
    public function DeleteAccount($idaccount)
    {
        global $conn;
        try {
            $sql = "DELETE FROM `account` WHERE `AccountID` = :idAccount";
            $stmt = $conn->prepare($sql);

            // Bind the parameter value
            $stmt->bindParam(':idAccount', $idaccount);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false; // Return false if there's an error
        }
    }
    public function InsertAccount($email, $pass, $sodienthoai, $fullname, $level)
    {
        global $conn;
        try {
            // Chuẩn bị câu lệnh SQL
            $sql = "INSERT INTO `account`(`Email`, `MatKhau`, `Phone`, `FullName`, `CreateDate`, `Level`) 
                VALUES (:email, :pass, :sodienthoai, :fullname, NOW(), :level)";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':pass', $pass);
            $stmt->bindParam(':sodienthoai', $sodienthoai);
            $stmt->bindParam(':fullname', $fullname);
            $stmt->bindParam(':level', $level);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false;
        }
    }

    public function UpdateDanhMuc($idDanhMuc, $tenDanhMuc)
    {
        global $conn;
        try {
            $sql = "UPDATE `categoryproduct` SET `tenDanhmuc` = :TenDanhMuc WHERE `idDanhmuc` = :idDanhMuc";
            $stmt = $conn->prepare($sql);

            // Bind giá trị mới cho các tham số trong câu lệnh SQL
            $stmt->bindParam(':TenDanhMuc', $tenDanhMuc);
            $stmt->bindParam(':idDanhMuc', $idDanhMuc);

            // Thực thi câu lệnh SQL
            $stmt->execute();

            return true; // Trả về true khi cập nhật thành công
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false; // Trả về false nếu có lỗi xảy ra
        }
    }

    public function GetIdDanhMuc()
    {
        global $conn;
        try {
            $sql = "SELECT MAX(`idDanhmuc`) as Max FROM `categoryproduct` ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['Max']; // Trả về giá trị lớn nhất của cột idProduct
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false; // Trả về false nếu có lỗi
        }
    }
}

?>



<?php
if (isset($_POST['idAccount']) && isset($_POST['action']) && $_POST['action'] == 'delete') {
    $idDanhMuc = $_POST['idAccount'];
    $ad = new admin_ver2();
    $ad->DeleteAccount($idDanhMuc);
    $response = array(
        'status' => 'success',
        'message' => 'Xóa danh mục thành công.'
    );
    $json_response = json_encode($response);
    echo $json_response;
}


?>
<?php
// Kiểm tra xem form đã được gửi chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Nhận dữ liệu từ form
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $fullname = $_POST['fullname'];
    $level = $_POST['level'];

    $ad = new admin_ver2();
    $check = $ad->InsertAccount($email, $password, $phone, $fullname, $level);
    if ($check) {
        $alert = "Thêm tài khoản thành công !";
        echo "<script> alert('$alert');  </script>";
        echo "<script>window.location.href='?View=customer';</script>";
    }
} else {

    echo "Phương thức không được hỗ trợ!";
}
?>
