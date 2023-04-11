<?php

include '../Models/UserModel.php';
include '../../config/config.php';
session_start();
if(isset($_POST['submit'])){
   $fullname = $_POST['fullName'];
   $email = $_POST['email'];
   $username = $_POST['username'];
   $phonenumber = $_POST['phoneNumber'];
   $password = $_POST['password'];
   $confirmpassword = $_POST['cpassword'];
   $user_type = $_POST['user_type'];
   $user = new User($conn);
   $result = $user->registerUser($fullname, $username, $email, $phonenumber, $confirmpassword, $user_type);
   if ($result == 'Image size is too large'){
      $_SESSION['warning_msg'] = $result;
   }
   elseif ($result == 'Error uploading file'){ 
      $_SESSION['error_msg'] = $result;
   }
   elseif ($result == 'Người dùng đã tồn tại') {
      $_SESSION['warning_msg'] = 'Người dùng đã tồn tại';
   }
   elseif ($result == 'Mật khẩu xác nhận không khớp'){
      $_SESSION['warning_msg'] = 'Mật khẩu xác nhận không khớp';
   }
   else {
         $_SESSION['success_msg'] = 'Đăng ký thành công';
      }
   header("Location: ../View/registerForm.php");
}

?>
