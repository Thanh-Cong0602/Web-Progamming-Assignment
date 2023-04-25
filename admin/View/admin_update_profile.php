<?php
include '../../config/config.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Update Admin Information</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../../public/css/admin.css">
   <link rel="stylesheet" href="../../public/css/admin_update_profile.css">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

   <!-- custom js file link  -->
   <script src="../../public/js/script.js" defer></script>
</head>
<body>
<!-- header section starts  -->
<?php include '../View/admin_header.php'; ?>
<!-- header section ends --> 

<!-- update section starts  -->

<section class="updateInfo-form">

   <form onsubmit="return validateForm()" action="../Controllers/adminUpdateProfileCTRL.php" method="post" enctype="multipart/form-data">
      <h3>Cập nhật thông tin cá nhân!</h3>
      <?php
         $user_id = $_SESSION['user_id'];
         $select_profile = mysqli_query($conn, "SELECT * FROM `users` WHERE user_id = '$user_id' LIMIT 1") or die('query failed');
         $fetch_profile = mysqli_fetch_assoc($select_profile);
      ?>
      <p class="placeholder">Họ và tên</p>
      <input type="text" name="fullname" maxlength="50" placeholder="<?= $fetch_profile['fullname']; ?>" class="box">
      <p class="placeholder">Username</p>
      <input type="text" id="username" name="username" maxlength="50" placeholder="<?= $fetch_profile['username']; ?>" class="box">
      <span class="error" id="usernameError"></span>
      <p class="placeholder">Email của bạn</p>
      <input type="email" id="email" name="email" maxlength="50" placeholder="<?= $fetch_profile['email']; ?>" class="box">
      <span class="error" id="emailError"></span>
      <p class="placeholder">Số điện thoại</p>
      <input type="text" id="phoneNumber" name="phonenumber" maxlength="50" placeholder="<?= $fetch_profile['phonenumber']; ?>" class="box">
      <span class="error" id="numberError"></span>
      <p class="placeholder">Mật khẩu cũ</p>
      <input type="password" name="oldpass" maxlength="50" placeholder="Nhập mật khẩu cũ" class="box">
      <p class="placeholder">Mật khẩu mới</p>
      <input type="password" id="password" name="newpass" maxlength="50" placeholder="Nhập mật khẩu mới" class="box">
      <span class="error" id="passwordError"></span>
      <p class="placeholder">Xác nhận mật khẩu mới</p>
      <input type="password" name="confirmpass" maxlength="50" placeholder="Nhập lại mật khẩu mới" class="box">
      <?php if($fetch_profile['image'] != ''){ ?>
         <img src="../../public/images/<?= $fetch_profile['image']; ?>" alt="" class="image">
         <input type="submit" value="Xóa ảnh đại diện" name="delete_image" class="delete-btn" onclick="return confirm('delete this image?');">
      <?php }; ?>
      <p class="placeholder">Hình đại diện</p>
      <input type="file" name="image" class="box" accept="image/*">
      <input type="submit" value="Cập nhật thông tin" name="submit" class="btn">
   </form>
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

      if ( username.length > 0 && username.length < 6) {
        usernameError.innerHTML = "Tên người dùng phải có ít nhất 6 ký tự";
        isValid = false;
      } else {
        usernameError.innerHTML = "";
      }
      if (phoneNumber.length > 0 && phoneNumber.length < 10) {
        numberError.innerHTML = "Số điện thoại phải có ít nhất 10 chữ số";
        isValid = false;
      } else {
        numberError.innerHTML = "";
      }
      if (password.length > 0 && password.length < 8) {
        passwordError.innerHTML = "Mật khẩu phải có ít nhất 8 ký tự";
        isValid = false;
      } else {
        passwordError.innerHTML = "";
      }
      let emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      if ( email.length > 0 &&  !emailRegex.test(email)) {
        emailError.innerHTML = "Email không hợp lệ. Vui lòng nhập lại";
        isValid = false;
      } else {
        emailError.innerHTML = "";
      }
      return isValid;
    }
  </script>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="../../public/js/admin_script.js"></script>
<?php include '../View/alert.php'; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    AOS.init({
    duration: 800,
    offset:150,
});
</script>

</body>
</html>