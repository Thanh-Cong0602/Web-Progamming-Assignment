<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../../public/css/login.css">
</head>
<body>
    <div class="login-box">
        <h2>Đăng nhập</h2>
        <form  onsubmit="return validateForm()" action="../Controllers/loginController.php" method="post">
            <div class="user-box">
                <input type="text" name="email" id ="email" required>
                <label>Email</label>
                <span class="error" id="emailError"></span>
            </div>
            <div class="user-box">
                <input type="password" name="password" id="password" required>
                <label>Mật khẩu</label>
                <span class="error" id="passwordError"></span>
            </div>

            <div class="button-form">
            <input type="submit" name="submit" value="Đăng nhập" id="submit">
                <div id="register">
                    Bạn chưa có tài khoản ?
                    <a href="../View/registerForm.php">Đăng ký ngay</a>
                </div>
            </div>
        </form>
    </div>
    <script>
    // Client-side validation using JavaScript
    function validateForm() {
      let email = document.getElementById("email").value;
      let password = document.getElementById("password").value;

      let passwordError = document.getElementById("passwordError");
      let emailError = document.getElementById("emailError");

      let isValid = true;
      let emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      if (!emailRegex.test(email)) {
        emailError.innerHTML = "Email không hợp lệ. Vui lòng nhập lại";
        isValid = false;
      } else {
        emailError.innerHTML = "";
      }
      if (password.length < 8) {
        passwordError.innerHTML = "Mật khẩu phải có ít nhất 8 ký tự";
        isValid = false;
      } else {
        passwordError.innerHTML = "";
      }

      return isValid;
    }
  </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <?php include '../View/alert.php'; ?>
</body>
</html>