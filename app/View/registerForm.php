<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="../../public/css/register.css" />

</head>

<body>
    <div class="container">
        <h1 class="form-title">Đăng ký tài khoản</h1>
        <form method="POST" onsubmit="return validateForm()" action="../Controllers/registerController.php"
            enctype="multipart/form-data">
            <div class="main-user-info">
                <div class="user-input-box">
                    <label for="fullName">Họ và tên</label>
                    <input type="text" id="fullName" name="fullname" placeholder="Nhập họ và tên" />
                </div>
                <div class="user-input-box">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Nhập username" required />
                    <span class="error" id="usernameError"></span>
                </div>
                <div class="user-input-box">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Nhập Email" required />
                    <span class="error" id="emailError"></span>
                </div>
                <div class="user-input-box">
                    <label for="phoneNumber">Số điện thoại</label>
                    <input type="text" id="phoneNumber" name="phoneNumber" placeholder="Nhập số điện thoại" />
                    <span class="error" id="numberError"></span>
                </div>
                <div class="user-input-box">
                    <label for="password">Mật khẩu</label>
                    <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required />
                    <span class="error" id="passwordError"></span>
                </div>
                <div class="user-input-box">
                    <label for="confirmPassword">Nhập lại mật khẩu</label>
                    <input type="password" id="confirmPassword" name="cpassword" placeholder="Nhập lại mật khẩu"
                        required />
                </div>
            </div>
            <div class="info-img">
                <div class="box">
                    <select name="user_type" class="select">
                        <option value="user">Người dùng</option>
                        <option value="admin">Quản trị viên</option>
                    </select>
                </div>
                <div class="user-input-box">
                    <label for="image">Hình đại diện</label>
                    <input type="file" name="image" id="image" class="pic" accept="image/*">
                </div>
            </div>
            <div class="account">
                <p>Bạn đã có tài khoản? <a href="./loginForm.php">Đăng nhập ngay</a></p>
            </div>
            <span id="confirm_password-error" style="color: red;"></span>
            <div class="form-submit-btn">
                <input type="submit" name="submit" value="Đăng ký">
            </div>
        </form>
    </div>
    <script>
    // Client-side validation using JavaScript
    function validateForm() {
        let username = document.getElementById("username").value;
        let phoneNumber = document.getElementById("phoneNumber").value;
        let password = document.getElementById("password").value;
        let email = document.getElementById("email").value;

        let usernameError = document.getElementById("usernameError");
        let numberError = document.getElementById("numberError");
        let passwordError = document.getElementById("passwordError");
        let emailError = document.getElementById("emailError");

        let isValid = true;

        if (username.length < 6) {
            usernameError.innerHTML = "Tên người dùng phải có ít nhất 6 ký tự";
            isValid = false;
        } else {
            usernameError.innerHTML = "";
        }
        if (phoneNumber.length < 10) {
            numberError.innerHTML = "Số điện thoại phải có ít nhất 10 chữ số";
            isValid = false;
        } else {
            numberError.innerHTML = "";
        }
        if (password.length < 8) {
            passwordError.innerHTML = "Mật khẩu phải có ít nhất 8 ký tự";
            isValid = false;
        } else {
            passwordError.innerHTML = "";
        }
        let emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if (!emailRegex.test(email)) {
            emailError.innerHTML = "Email không hợp lệ. Vui lòng nhập lại";
            isValid = false;
        } else {
            emailError.innerHTML = "";
        }
        return isValid;
    }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <?php include '../View/alert.php'; ?>
</body>

</html>