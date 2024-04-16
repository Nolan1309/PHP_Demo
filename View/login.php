<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iofrm</title>
    <link rel="stylesheet" type="text/css" href="../Library/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../Library/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../Library/css/iofrm-style.css">
    <link rel="stylesheet" href="../Library/css/iofrm-theme17.css">

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
                      
                        <form action="../index.php" method="post">
                            <input class="form-control" type="text" name="username" placeholder="E-mail Address" required>
                            <input class="form-control" type="password" name="password" placeholder="Password" required>
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Đăng nhập</button> <a href="forget17.html">Quên mật khẩu?</a>
                            </div>
                        </form>
                        <div class="other-links">
                            <div class="text">Đăng nhập khác</div>
                            <a href="#"><i class="fab fa-facebook-f"></i>Facebook</a><a href="#"><i class="fab fa-google"></i>Google</a><a href="#"></a>
                        </div>
                        <div class="page-links">
                            <a href="register.php">Register new account</a>
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