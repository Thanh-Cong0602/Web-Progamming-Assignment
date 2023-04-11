<?php
         if($user_id != ''){
      ?>
        <div id="profile-box" class="profile">
            <?php
                $select_profile = mysqli_query($conn, "SELECT * FROM `users` WHERE user_id = '$user_id'");
                if(mysqli_num_rows($select_profile) > 0){
                $fetch_profile = mysqli_fetch_assoc($select_profile);
            ?>
            <!-- <?php if($fetch_profile['image'] != ''){ ?>
                <img src="uploaded_files/<?= $fetch_profile['image']; ?>" alt="" class="image">
            <?php }; ?> -->
            <p><?= $fetch_profile['username']; ?></p>
            <a href="update.php" class="btn">Update Profile</a>
            <a href="../View/logout.php" class="delete-btn" onclick="return confirm('logout from this website?');">Logout</a>
            <?php }
        else{ ?>
            <div id="dropdown-box" class="dropdown-content hidden">
                <a href="loginForm.php">Đăng nhập</a>
                <a href="registerForm.php">Đăng ký</a>
            </div>
            <?php }; ?>
        </div>
        <?php }; ?>
<form method="POST" onsubmit="return validateForm()" action="../Controllers/registerController.php" >
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
            <!-- <span class="message" id="usernameError"></span> -->
          </div>
          <div class="user-input-box">
            <label for="email">Email</label>
            <input type="email"
                    id="email"
                    name="email"
                    placeholder="Nhập Email" required/>
              <span id="emailError"></span>
          </div>
          <div class="user-input-box">
            <label for="phoneNumber">Số điện thoại</label>
            <input type="text"
                    id="phoneNumber"
                    name="phoneNumber"
                    placeholder="Nhập số điện thoại"/>
            <span id="numberError"></span>
          </div>
          <div class="user-input-box">
            <label for="password">Mật khẩu</label>
            <input type="password"
                    id="password"
                    name="password"
                    placeholder="Nhập mật khẩu" required/>
              <span id="passwordError"></span>
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
        <span id="confirm_password-error" style="color: red;"></span>
        <div class="form-submit-btn">
          <input type="submit" name="submit" value="Đăng ký">
        </div>
      </form>




















<form class="box-container">

<div class="box" data-aos="fade-up" data-aos-delay="150">
    <div class="image">
        <img src="../images/book-1.jpg" alt="">
    </div>
    <div class="content">
        <h3>Tuổi trẻ đáng giá bao nhiêu</h3>
        <a href="#">read more <i class="fas fa-angle-right"></i></a>
    </div>
    <div class="purchase">
        <h3>100.000$</h3>
        <a href="#"><i class="fas fa-shopping-cart"></i></a>
    </div>
</div>

<div class="box" data-aos="fade-up" data-aos-delay="300">
    <div class="image">
        <img src="../images/book-2.jpg" alt="">
    </div>
    <div class="content">
    <h3>Đừng lựa chọn an nhàn <br> khi còn trẻ</h3>
        <a href="#">read more <i class="fas fa-angle-right"></i></a>
    </div>
    <div class="purchase">
        <h3>100.000$</h3>
        <a href="#"><i class="fas fa-shopping-cart"></i></a>
    </div>
</div>

<div class="box" data-aos="fade-up" data-aos-delay="450">
    <div class="image">
        <img src="../images/book-3.jpg" alt="">
    </div>
    <div class="content">
        <h3>Khéo ăn nói sẽ có được thiên hạ</h3>
        <a href="#">read more <i class="fas fa-angle-right"></i></a>
    </div>
    <div class="purchase">
        <h3>100.000$</h3>
        <a href="#"><i class="fas fa-shopping-cart"></i></a>
    </div>
</div>

<div class="box" data-aos="fade-up" data-aos-delay="450">
    <div class="image">
        <img src="../images/book-4.jpg" alt="">
    </div>
    <div class="content">
        <h3>Nhà giả kim</h3>
        <a href="#">read more <i class="fas fa-angle-right"></i></a>
    </div>
    <div class="purchase">
        <h3>100.000$</h3>
        <a href="#"><i class="fas fa-shopping-cart"></i></a>
    </div>
</div>

<div class="box" data-aos="fade-up" data-aos-delay="450">
    <div class="image">
        <img src="../images/book-5.jpg" alt="">
    </div>
    <div class="content">
        <h3>Đắc nhân tâm</h3>
        <a href="#">read more <i class="fas fa-angle-right"></i></a>
    </div>
    <div class="purchase">
        <h3>100.000$</h3>
        <a href="#"><i class="fas fa-shopping-cart"></i></a>
    </div>
</div>

<div class="box" data-aos="fade-up" data-aos-delay="450">
    <div class="image">
        <img src="../images/book-6.jpg" alt="">
    </div>
    <div class="content">
        <h3>Trí tuệ do thái</h3>
        <a href="#">read more <i class="fas fa-angle-right"></i></a>
    </div>
    <div class="purchase">
        <h3>100.000$</h3>
        <a href="#"><i class="fas fa-shopping-cart"></i></a>
    </div>
</div>

<div class="box" data-aos="fade-up" data-aos-delay="450">
    <div class="image">
        <img src="../images/book-7.jpg" alt="">
    </div>
    <div class="content">
        <h3>Hành trình về phương Đông</h3>
        <a href="#">read more <i class="fas fa-angle-right"></i></a>
    </div>
    <div class="purchase">
        <h3>100.000$</h3>
        <a href="#"><i class="fas fa-shopping-cart"></i></a>
    </div>
</div>

<div class="box" data-aos="fade-up" data-aos-delay="450">
    <div class="image">
        <img src="../images/book-8.jpg" alt="">
    </div>
    <div class="content">
        <h3>Thao túng tâm lý</h3>
        <a href="#">read more <i class="fas fa-angle-right"></i></a>
    </div>
    <div class="purchase">
        <h3>100.000$</h3>
        <a href="#"><i class="fas fa-shopping-cart"></i></a>
    </div>
</div>

</form>

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