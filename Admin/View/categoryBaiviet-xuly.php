
<?php
// Thông tin kết nối đến cơ sở dữ liệu MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shophoa";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Xử lý các lỗi kết nối hoặc truy vấn
    echo "Lỗi kết nối: " . $e->getMessage();
}
class admin_ver2
{
    public function DeleteDanhMuc($idDanhMuc)
    {
        global $conn;
        try {
            $sql = "DELETE FROM `categoryblog` WHERE `idCategory` = :idDanhMuc";
            $stmt = $conn->prepare($sql);

            // Bind the parameter value
            $stmt->bindParam(':idDanhMuc', $idDanhMuc);

            // Execute the query
            $result = $stmt->execute();

            // Return the result of the execution
            return $result;
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false; // Return false if there's an error
        }
    }
    public function InsertDanhMuc($idDanhMuc, $tenDanhMuc)
    {
        global $conn;
        try {
            $sql = "INSERT INTO `categoryblog`(`idCategory`, `TenDanhMuc`) VALUES (:idDanhMuc,:TenDanhMuc)";
            $stmt = $conn->prepare($sql);


            // Bind các giá trị vào các tham số của câu lệnh SQL
            $stmt->bindParam(':idDanhMuc', $idDanhMuc);
            $stmt->bindParam(':TenDanhMuc', $tenDanhMuc);


            // Thực thi câu lệnh SQL
            $stmt->execute();

            return true; // Trả về true khi chèn thành công
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false; // Trả về false nếu có lỗi xảy ra
        }
    }
    public function UpdateDanhMuc($idDanhMuc, $tenDanhMuc)
    {
        global $conn;
        try {
            $sql = "UPDATE `categoryblog` SET `TenDanhMuc` = :TenDanhMuc WHERE `idCategory` = :idDanhMuc";
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
            $sql = "SELECT MAX(`idCategory`) as Max FROM `categoryblog` ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['Max']; // Trả về giá trị lớn nhất của cột idProduct
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false; // Trả về false nếu có lỗi
        }
    }
    public function GetNameDanhMuc($idDM)
    {
        global $conn;
        try {
            $sql = "SELECT  `TenDanhMuc` FROM `categoryblog` WHERE `idCategory`= $idDM";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Lỗi truy vấn: " . $e->getMessage();
            return false; // Trả về false nếu có lỗi
        }
    }
}

?>



<?php



//them
if (isset($_POST['tenDanhMuc']) && $_POST['action'] == 'insert') {

    $tenDanhMuc = $_POST['tenDanhMuc'];
    $ad = new admin_ver2();
    $idDanhMuc = $ad->GetIdDanhMuc();
    $InsertDM = $ad->InsertDanhMuc($idDanhMuc + 1, $tenDanhMuc);
    if ($InsertDM) {
        $response = array(
            'status' => 'success',
            'message' => 'Thêm danh mục thành công !'
        );
    }

    $json_response = json_encode($response);
    echo $json_response;
}

//Update
if (isset($_POST['idDanhMuc']) && isset($_POST['tenDanhMuc']) && isset($_POST['action']) && $_POST['action'] == 'update') {
    $idDanhMuc = $_POST['idDanhMuc'];
    $tenDM = $_POST['tenDanhMuc'];

    $ad = new admin_ver2();

    $check = $ad->UpdateDanhMuc($idDanhMuc, $tenDM);
    if ($check) {
        $response = array(
            'status' => 'success',
            'message' => 'Cập nhật danh mục thành công !'
        );
    }
    $json_response = json_encode($response);
    echo $json_response;
}
// //Delete
if (isset($_POST['idDanhMuc']) && isset($_POST['action']) && $_POST['action'] == 'delete') {
    $idDanhMuc = $_POST['idDanhMuc'];
    $ad = new admin_ver2();
    $ad->DeleteDanhMuc($idDanhMuc);
    $response = array(
        'status' => 'success',
        'message' => 'Xóa danh mục thành công.'
    );
    $json_response = json_encode($response);
    echo $json_response;
}
