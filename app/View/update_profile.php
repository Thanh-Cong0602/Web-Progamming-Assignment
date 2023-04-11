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
   <title>Update User Information</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../../public/css/style.css">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

   <!-- custom js file link  -->
   <script src="../../public/js/script.js" defer></script>
</head>
<body>
<!-- header section starts  -->
<?php include '../View/header.php'; ?>
<!-- header section ends --> 

<!-- update section starts  -->

<section class="updateInfo-form">

   <form action="../Controllers/userUpdateProfileCTRL.php" method="post" enctype="multipart/form-data">
      <h3>Cập nhật thông tin cá nhân!</h3>
      <?php
         $user_id = $_COOKIE['user_id'];
         $select_profile = mysqli_query($conn, "SELECT * FROM `users` WHERE user_id = '$user_id' LIMIT 1") or die('query failed');
         $fetch_profile = mysqli_fetch_assoc($select_profile);
      ?>
      <p class="placeholder">Họ và tên</p>
      <input type="text" name="fullname" maxlength="50" placeholder="<?= $fetch_profile['fullname']; ?>" class="box">
      <p class="placeholder">Username</p>
      <input type="text" name="username" maxlength="50" placeholder="<?= $fetch_profile['username']; ?>" class="box">
      <p class="placeholder">Email của bạn</p>
      <input type="email" name="email" maxlength="50" placeholder="<?= $fetch_profile['email']; ?>" class="box">
      <p class="placeholder">Số điện thoại</p>
      <input type="text" name="phonenumber" maxlength="50" placeholder="<?= $fetch_profile['phonenumber']; ?>" class="box">
      <p class="placeholder">Mật khẩu cũ</p>
      <input type="password" name="oldpass" maxlength="50" placeholder="Enter your old password" class="box">
      <p class="placeholder">Mật khẩu mới</p>
      <input type="password" name="newpass" maxlength="50" placeholder="Enter your new password" class="box">
      <p class="placeholder">Xác nhận mật khẩu mới</p>
      <input type="password" name="confirmpass" maxlength="50" placeholder="Confirm your new password" class="box">
      <?php if($fetch_profile['image'] != ''){ ?>
         <img src="../../public/images/<?= $fetch_profile['image']; ?>" alt="" class="image">
         <input type="submit" value="Xóa ảnh đại diện" name="delete_image" class="delete-btn" onclick="return confirm('delete this image?');">
      <?php }; ?>
      <p class="placeholder">Hình đại diện</p>
      <input type="file" name="image" class="box" accept="image/*">
      <input type="submit" value="Cập nhật thông tin" name="submit" class="btn">
   </form>

</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
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