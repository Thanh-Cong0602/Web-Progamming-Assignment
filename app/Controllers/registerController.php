<?php

include '../Models/UserModel.php';
include '../../config/config.php';
session_start();
if(isset($_POST['submit'])){
   $user = new User($conn);
   $fullname = mysqli_real_escape_string($conn, $_POST['fullName']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $phonenumber = mysqli_real_escape_string($conn, $_POST['phoneNumber']);
   $password = mysqli_real_escape_string($conn, md5($_POST['password']));
   $confirmpassword = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $user_type = $_POST['user_type'];
   $result = $user->registerUser($fullname,  $username, $email, $phonenumber, $password, $confirmpassword);
   if ($result == 'Successfully!') {
      header("Location: ../View/loginForm.php");
      exit;
   }
   else {
      $message[] = $result;
   }
   include '../View/registerForm.php';
}

?>
