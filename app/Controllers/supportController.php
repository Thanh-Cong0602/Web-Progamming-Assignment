<?php
    include '../Models/UserModel.php';
    include '../../config/config.php';
    session_start();
    if(isset($_POST['send'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $phonenumber = $_POST['number'];
        $msg = $_POST['message'];
        $user = new User($conn);
        $message = $user->userSendMessage($name, $email, $username, $phonenumber, $msg);
        if ($message == 'Yêu cầu hỗ trợ thành công!') {
           $_SESSION['success_msg'] = $message;
        } else {
            $_SESSION['warning_msg'] = $message;
        }
        header('Location: ../View/support.php');
     }
?>