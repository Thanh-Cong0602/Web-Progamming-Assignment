<?php
include '../Models/UserModel.php';
include '../../config/config.php';
if(isset($_POST['submit'])){
    $user = new User($conn);
    $email = $_POST['email'];
    $password = $_POST['password'];
    $result = $user->loginUser($email, $password);
    if ($result == 'error') {
        $message[] = 'Email hoặc mật khẩu không chính xác!';
        include '../View/loginForm.php';
    }
    else {
        header("Location: $result");
        exit;
    }
}
else {
    include '../View/loginForm.php';
}

