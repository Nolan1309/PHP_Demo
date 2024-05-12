<style>
    /* CSS cho form */

    #form-acccount {

        max-width: 50%;
        margin: 0 auto 0 35%;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    label {
        margin-bottom: 5px;
    }

    input,
    select {
        margin-bottom: 10px;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 3px;
        width: 100%;
    }

    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>
<div class="content-body">
    <div class="form-item">
        <form action="?View=customer-xuly" method="post" id="form-acccount">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>

            <label for="password">Mật khẩu:</label>
            <input type="password" id="password" name="password" required><br>

            <label for="phone">Số điện thoại:</label>
            <input type="tel" id="phone" name="phone" required><br>

            <label for="fullname">Họ và tên:</label>
            <input type="text" id="fullname" name="fullname" required><br>
            <label for="fullname">Quyền truy cập</label>
            <select name="level" id="level">
                <option value="1">Admin</option>
                <option value="2">User</option>
            </select>

            <input type="submit" name="addAccount" value="Thêm tài khoản">
        </form>
    </div>

</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {

        var form = document.getElementById("form-acccount");
        form.addEventListener("submit", function(event) {

            event.preventDefault();

            var emailField = document.getElementById("email");
            var passwordField = document.getElementById("password");
            var phoneField = document.getElementById("phone");
            var fullnameField = document.getElementById("fullname");

            // Lấy giá trị từ các trường input
            var emailValue = emailField.value.trim();
            var passwordValue = passwordField.value.trim();
            var phoneValue = phoneField.value.trim();
            var fullnameValue = fullnameField.value.trim();

            // Lấy giá trị từ trường select
            var levelSelect = document.getElementById("level");
            var levelValue = levelSelect.options[levelSelect.selectedIndex].value;


            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            var phonePattern = /^\d{10}$/;
            var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{8,}$/;
            // Kiểm tra xem các trường input có bị để trống không
            if (emailValue === "") {
                alert("Vui lòng nhập email.");
                emailField.focus();
                return false;
            }

            if (passwordValue === "") {
                alert("Vui lòng nhập mật khẩu.");
                passwordField.focus();
                return false;
            }

            if (phoneValue === "") {
                alert("Vui lòng nhập số điện thoại.");
                phoneField.focus();
                return false;
            }

            if (fullnameValue === "") {
                alert("Vui lòng nhập họ và tên.");
                fullnameField.focus();
                return false;
            }
            if (!emailPattern.test(emailValue)) {

                alert('Vui lòng nhập địa chỉ email hợp lệ.');
                return false;
            }
            if (!phonePattern.test(phoneValue)) {

                alert('Vui lòng nhập số điện thoại hợp lệ.');
                return false;
            }
            if (!passwordPattern.test(passwordValue)) {

                alert('Mật khẩu phải chứa ít nhất 8 ký tự, bao gồm ít nhất một chữ cái hoa, một chữ cái thường, một số và một ký tự đặc biệt.');
                return false;
            }
            form.submit();
        });
    });
</script>