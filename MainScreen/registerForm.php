<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['fullName']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $user_type = $_POST['user_type'];

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){
      $message[] = 'Người dùng đã tồn tại!';
   }else{
      if($pass != $cpass){
         $message[] = 'Mật khẩu xác nhận không khớp';
      }else{
         mysqli_query($conn, "INSERT INTO `users`(name, email, password, user_type) VALUES('$name', '$email', '$cpass', '$user_type')") or die('query failed');
         $message[] = 'Đăng ký thành công!';
         header('location:loginForm.php');
      }
   }

}

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
   
    <link rel="stylesheet" href="../css/register.css" />
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

    <div class="container">
      <h1 class="form-title">Đăng ký tài khoản</h1>
      <form action="" method="post">
        <div class="main-user-info">
          <div class="user-input-box">
            <label for="fullName">Họ và tên</label>
            <input type="text"
                    id="fullName"
                    name="fullName"
                    placeholder="Nhập họ và tên"/>
          </div>
          <div class="user-input-box">
            <label for="username">Username</label>
            <input type="text"
                    id="username"
                    name="username"
                    placeholder="Enter Username" required/>
          </div>
          <div class="user-input-box">
            <label for="email">Email</label>
            <input type="email"
                    id="email"
                    name="email"
                    placeholder="Nhập Email" required/>
          </div>
          <div class="user-input-box">
            <label for="phoneNumber">Số điện thoại</label>
            <input type="text"
                    id="phoneNumber"
                    name="phoneNumber"
                    placeholder="Nhập số điện thoại"/>
          </div>
          <div class="user-input-box">
            <label for="password">Mật khẩu</label>
            <input type="password"
                    id="password"
                    name="password"
                    placeholder="Nhập mật khẩu" required/>
          </div>
          <div class="user-input-box">
            <label for="confirmPassword">Nhập lại mật khẩu</label>
            <input type="password"
                    id="confirmPassword"
                    name="cpassword"
                    placeholder="Nhập lại mật khẩu" required/>
          </div>
        </div>
        <div class="box">
            <select name="user_type" class="select">
              <option value="user">Người dùng</option>
              <option value="admin">Quản trị viên</option>
            </select>
        </div>
        <div class="form-submit-btn">
          <input type="submit" name="submit" value="Đăng ký">
        </div>
      </form>
    </div>
  </body>
</html>