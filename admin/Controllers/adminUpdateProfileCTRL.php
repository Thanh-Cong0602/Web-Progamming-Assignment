<?php
include '../Models/AdminModel.php';
include '../../config/config.php';
session_start();
if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $oldpass = $_POST['oldpass'];
    $newpass = $_POST['newpass'];
    $confirmpass = $_POST['confirmpass'];
    $user = new AdminModel($conn);
    $message = $user->adminUpdateProfile($fullname, $username, $email, $phonenumber, $oldpass, $newpass, $confirmpass);
    if (
        $message == 'Email đã tồn tại!' ||
        $message == 'Username đã tồn tại!' ||
        $message == 'Kích thước hình ảnh quá lớn!' ||
        $message == 'Vui lòng nhập mật khẩu mới!' ||
        $message == 'Xác nhận mật khẩu không khớp!' ||
        $message == 'Không đúng mật khẩu cũ!'
    ) {
        $_SESSION['warning_msg'] = $message;
    } else {
        $_SESSION['success_msg'] = $message;
    }
    header('Location: ../View/admin_update_profile.php');
}

if (isset($_POST['delete_image'])) {
    $user = new AdminModel($conn);
    $message = $user->adminDetelePic();
    if ($message == 'Image already deleted!') {
        $_SESSION['warning_msg'] = $message;
    } else {
        $_SESSION['success_msg'] = $message;
    }
    header('Location: ../View/admin_update_profile.php');
}
