<?php
// include 'Model/Database.php';
include '../Config/config.php';
session_start();

// check login
if (isset($_SESSION['laclac_khachang'])) {
    header('location:../?View');
}

if (isset($_POST['login'])) {
    $email = $_POST['username'];
    $pass = $_POST['password'];
    $checklogin = checklogin($email, $pass);
    if ($checklogin == false) {
        echo '<script>alert("Sai tài khoản hoặc mật khẩu ! Xin mời nhập lại .")</script>';
    } else {
        // Lưu thông tin người dùng vào session và chuyển hướng đến trang chính
        $row = $checklogin->fetch(PDO::FETCH_ASSOC);
        $_SESSION['laclac_khachang'] = $row;
        header('location:../?View');
    }
}
function checklogin($email, $password)
{
    global $conn;
    $sql = "SELECT * FROM `account` WHERE Email= :email AND MatKhau = :password";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($count == 0) {
        return false;
    } else {
        return  $stmt;
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập tài khoản</title>
    <link rel="stylesheet" type="text/css" href="../Library/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../Library/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../Library/css/iofrm-style.css">
    <link rel="stylesheet" href="../Library/css/iofrm-theme17.css">
    <style>

    </style>
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
                        <h3>Đăng nhập tài khoản</h3>

                        <form action="login.php" method="post">
                            <input class="form-control" type="text" name="username" placeholder="E-mail Address" required>
                            <input class="form-control" type="password" name="password" placeholder="Password" required>
                            <div class="form-button">
                                <!-- Điều chỉnh tên của nút submit thành "login" -->
                                <button id="submit" type="submit" name="login" class="ibtn">Đăng nhập</button>
                                <a href="#">Quên mật khẩu?</a>
                            </div>
                        </form>

                        <div class="other-links">
                            <div class="text">Đăng nhập khác</div>
                            <a href="#"><i class="fab fa-facebook-f"></i>Facebook</a><a href="#"><i class="fab fa-google"></i>Google</a><a href="#"></a>
                        </div>
                        <div class="page-links">
                            <a href="register.php">Đăng ký tài khoản</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../Library/js/jquery.min.js"></script>
    <script src="../Library/js/popper.min.js"></script>
    <script src="../Library/js/bootstrap.min.js"></script>
    <script src="../Library/js/main.js"></script>
</body>

</html>