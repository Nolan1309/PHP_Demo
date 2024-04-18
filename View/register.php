<?php
// include 'Model/Database.php';
include '../Config/config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Nhận dữ liệu từ form
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    // header('location:login.php');  
    $newuser = newUser($name, $email, $phone, $password);
    if ($newuser) {
        header('location:login.php');      
    } 
}
function newUser($name, $email, $sdt, $password)
{
    global $conn;
    try {
        // Tạo chuỗi truy vấn SQL sử dụng tham số truyền vào
        $sql = "INSERT INTO `account`(`Email`, `MatKhau`, `Phone`, `FullName`, `CreateDate`) VALUES (:email, :password, :phone, :name, NOW())";

        // Chuẩn bị truy vấn
        $stmt = $conn->prepare($sql);

        // Bind các giá trị vào các tham số của truy vấn
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':phone', $sdt);
        $stmt->bindParam(':name', $name);

        // Thực thi truy vấn
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        // Nếu có lỗi, in ra thông báo lỗi và trả về false
        echo "Lỗi khi chèn dữ liệu: " . $e->getMessage();
        return false;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iofrm</title>
    <link rel="stylesheet" type="text/css" href="../Library/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../Library/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="../Library/css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="../Library/css/iofrm-theme17.css">
   
</head>

<body>
    <div class="form-body without-side">

        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <img src="images/graphic3.svg" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Đăng kí tài khoản</h3>

                        <form action="register.php" method="post" id="registerForm">
                            <input class="form-control" type="text" name="name" placeholder="Full Name" >
                          
                            <input class="form-control" type="email" name="email" placeholder="E-mail Address" >
                          
                            <input class="form-control" type="text" name="phone" placeholder="Phone" >
                            
                            <input class="form-control" type="password" name="password" placeholder="Password" >
                          
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Đăng kí</button>
                            </div>
                        </form>
                        <div class="other-links">
                            <div class="text">Đăng kí khác</div>
                            <a href="#"><i class="fab fa-facebook-f"></i>Facebook</a><a href="#"><i class="fab fa-google"></i>Google</a><a href="#"></a>
                        </div>
                        <div class="page-links">
                            <a href="login.php">Đăng nhập tài khoản</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../Library/js/jquery.min.js"></script>
    <script>
        // $(document).ready(function() {
        //     $('#registerForm').submit(function(e) {
        //         e.preventDefault();
        //         var name = $('[name="name"]').val().trim();
        //         var email = $('[name="email"]').val().trim();
        //         var phone = $('[name="phone"]').val().trim();
        //         var password = $('[name="password"]').val().trim();
               
        //         var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        //         var phonePattern = /^\d{10}$/;
        //         var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{8,}$/;

        //         if (name === '' || email === '' || password==='' || phone === '') {
                  
        //             alert('Vui lòng nhập đầy đủ thông tin.');
        //             return false;
        //         }
        //         if (!emailPattern.test(email)) {
                    
        //             alert('Vui lòng nhập địa chỉ email hợp lệ.');
        //             return false;
        //         }
        //         if (!phonePattern.test(phone)) {
                  
        //             alert('Vui lòng nhập số điện thoại hợp lệ.');
        //             return false;
        //         }
        //         if (!passwordPattern.test(password)) {
                  
        //             alert('Mật khẩu phải chứa ít nhất 8 ký tự, bao gồm ít nhất một chữ cái hoa, một chữ cái thường, một số và một ký tự đặc biệt.');
        //             return false;
        //         }

               
        //     });
        // });
    </script>
    <script src="../Library/js/popper.min.js"></script>
    <script src="../Library/js/bootstrap.min.js"></script>
    <script src="../Library/js/main.js"></script>
</body>

</html>