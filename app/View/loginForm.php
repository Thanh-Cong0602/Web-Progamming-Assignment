<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../../public/css/login.css">
</head>
<body>
    <?php
        if(isset($message)){
        foreach($message as $message){
            echo '
            <div class="message">
                <span>'.$message.'</span>
                <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
            </div>
            ';
        }
        }
    ?>
    <div class="login-box">
        <h2>Đăng nhập</h2>
        <form action="../Controllers/loginController.php" method="post">
            <div class="user-box">
                <input type="text" name="email" required>
                <label>Email</label>
            </div>
            <div class="user-box">
                <input type="password" name="password" required>
                <label>Mật khẩu</label>
            </div>

            <div class="button-form">
            <input type="submit" name="submit" value="Đăng nhập" id="submit">
                <div id="register">
                    Bạn chưa có tài khoản ?
                    <a href="registerForm.php">Đăng ký ngay</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>