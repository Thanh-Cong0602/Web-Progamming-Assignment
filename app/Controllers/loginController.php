<?php
include '../Models/UserModel.php';
include '../../config/config.php';
session_start();
if(isset($_POST['submit'])){
    $user = new User($conn);
    $email = $_POST['email'];
    $password = $_POST['password'];
    $result = $user->loginUser($email, $password);
    if ($result == 'Mật khẩu không chính xác!' || $result == 'Địa chỉ email không chính xác!') {
        $_SESSION['warning_msg'] = $result;
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

