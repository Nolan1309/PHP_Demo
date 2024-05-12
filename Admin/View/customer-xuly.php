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

    public function CheckAccount($email)
    {
        global $conn;
        try {
            $sql = "SELECT COUNT(*) AS count FROM Account WHERE Email = '$email'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['count'];
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false; // Trả về false nếu có lỗi
        }
    }
    public function CheckPhone($phone)
    {
        global $conn;
        try {
            $sql = "SELECT COUNT(*) AS count FROM Account WHERE Phone = '$phone'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['count'];
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false; // Trả về false nếu có lỗi
        }
    }
}

?>



<?php
if (isset($_POST['idAccount']) && isset($_POST['action']) && $_POST['action'] == 'delete') {
    $idAccount = $_POST['idAccount'];
    $ad = new admin_ver2();
    $ad->DeleteAccount($idAccount);
    $response = array(
        'status' => 'success',
        'message' => 'Xóa tài khoản thành công.'
    );
    $json_response = json_encode($response);
    echo $json_response;
}


?>
<?php
// Kiểm tra xem form đã được gửi chưa
if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['phone']) && !empty($_POST['fullname']) && isset($_POST['level'])) {

    // Nhận dữ liệu từ form
    $ad = new admin_ver2();
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $fullname = $_POST['fullname'];
    $level = $_POST['level'];

    $checkAc = $ad->CheckAccount($email);
    if ($checkAc > 0) {
        $alert = "Tài khoản đã tồn tại !";
        echo "<script> alert('$alert');  </script>";
        echo "<script>window.location.href='?View=customer-them';</script>";
    }
    $checkPhone = $ad->CheckPhone($phone);
    if ($checkPhone > 0) {
        $alert = "Số điện thoại đã liên kết tài khoản !";
        echo "<script> alert('$alert');  </script>";
        echo "<script>window.location.href='?View=customer-them';</script>";
    }
    $check = $ad->InsertAccount($email, $password, $phone, $fullname, $level);
    if ($check) {
        $alert = "Thêm tài khoản thành công !";
        echo "<script> alert('$alert');  </script>";
        echo "<script>window.location.href='?View=customer';</script>";
    }
} 
?>
