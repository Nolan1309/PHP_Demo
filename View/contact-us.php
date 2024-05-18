<!-- Contact-us.php -->
<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="meta description">
    <title>Floda - Flower eCommerce Bootstrap 4 Template</title>

    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="../Library/assets/img/favicon.ico" type="image/x-icon" />

    <!-- Google fonts include -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,900%7CYesteryear" rel="stylesheet">

    <!-- All Vendor & plugins CSS include -->
    <link href="../Library/assets/css/vendor.css" rel="stylesheet">
    <!-- Main Style CSS -->
    <link href="../Library/assets/css/style.css" rel="stylesheet">


</head>


<body>
    <!-- main wrapper start -->
    <main>
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area common-bg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <h1>contact</h1>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="?View=home"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">contact</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- contact area start -->
        <div class="contact-area section-space pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="contact-message">
                            <h2>Đóng góp dự án</h2>
                            <form id="contact-form" action="#">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input name="first_name" placeholder="Name *" type="text" required>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input name="phone" placeholder="Phone *" type="text" required>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input name="email_address" placeholder="Email *" type="text" required>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input name="contact_subject" placeholder="Subject *" type="text">
                                    </div>
                                    <div class="col-12">
                                        <div class="contact2-textarea text-center">
                                            <textarea placeholder="Message *" name="message" class="form-control2" required=""></textarea>
                                        </div>
                                        <div class="contact-btn">
                                            <button class="btn btn__bg" type="submit">Send Message</button>
                                        </div>
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact-info">
                            <h2>Liên hệ chúng tôi</h2>
                            <p>Đây là một bài tập nhỏ về sử dụng PHP kết hợp html & css và Javascript. Mong các thầy cô
                                và bạn sinh viên có thể châm chước.</p>
                            <ul>
                                <li><i class="fa fa-fax"></i> Address : 140 Lê Trọng Tấn, Tây Thạnh, Tân Phú, TP.HCM</li>
                                <li><i class="fa fa-phone"></i> 0365-683-018</li>
                                <li><i class="fa fa-envelope-o"></i> tranfc911@gmail.com</li>
                            </ul>
                            <div class="working-time">
                                <h3>Thời gian làm việc</h3>
                                <p><span>Thứ 2 – Thứ 6:</span>08AM – 22PM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- contact area end -->
    </main>
    <!-- main wrapper end -->
    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("contact-form").addEventListener("submit", function(event) {
                event.preventDefault();

                var firstName = document.querySelector('input[name="first_name"]').value.trim();
                var phone = document.querySelector('input[name="phone"]').value.trim();
                var email = document.querySelector('input[name="email_address"]').value.trim();
                var subject = document.querySelector('input[name="contact_subject"]').value.trim();
                var message = document.querySelector('textarea[name="message"]').value.trim();

                if (firstName === "" || phone === "" || email === "" || message === "") {
                    alert("Không được để trống !");
                    return;
                }

                var phoneRegex = /^\d{10}$/;
                if (!phoneRegex.test(phone)) {
                    alert("Số điện thoại dài 10 số và không nhập chữ !");
                    return;
                }

                var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(email)) {
                    alert("Vui lòng đúng định dạng email !");
                    return;
                }

                var formData = new FormData(this);
                fetch("View/contact-us_form.php", {
                        method: "POST",
                        body: formData
                    })
                    .then(response => {
                        if (response.ok) {
                            return response.text();
                        } else {
                            throw new Error("Có lỗi xảy ra khi gửi dữ liệu.");
                        }
                    })
                    .then(data => {
                        alert(data); 
                        // event.returnValue = false;
                        // event.preventDefault();
                    })
                    .catch(error => {
                        // Xử lý lỗi nếu có
                        alert(error.message);
                    });
            });
        });
    </script>


    <!-- All vendor & plugins & active js include here -->
    <!--All Vendor Js -->
    <script src="../Library/assets/js/vendor.js"></script>
    <!-- Active Js -->
    <script src="../Library/assets/js/active.js"></script>
</body>

</html>