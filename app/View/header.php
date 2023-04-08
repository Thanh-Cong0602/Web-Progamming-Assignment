<?php
  $user_id = $_COOKIE['user_id'];
?>
<!-- header section starts  -->
<header class="header">

    <div id="menu-btn" class="fas fa-bars"></div>

    <a data-aos="zoom-in-left" data-aos-delay="150" href="#" class="logo"> 
        <i class="fas fa-book-open"></i>Book Store </a>

    <nav class="navbar">
        <a data-aos="zoom-in-left" data-aos-delay="300" href="home.php">Home</a>
        <a data-aos="zoom-in-left" data-aos-delay="450" href="about.php">About</a>
        <a data-aos="zoom-in-left" data-aos-delay="600" href="shop.php">Shop</a>
        <a data-aos="zoom-in-left" data-aos-delay="750" href="#authors">Tác giả</a>
        <a data-aos="zoom-in-left" data-aos-delay="900" href="order.php">Order</a>
    </nav>
    <div class = "icons btn">
    <a data-aos="zoom-in-left" data-aos-delay="1100" href="#book-form">
             <i class="fas fa-search"></i>
    </a>
    <a data-aos="zoom-in-left" data-aos-delay="1250" class ="tcn">
        <i id="fa-user" class="fas fa-user users"></i>
          <div id="profile-box" class="profile">
              <?php
                  $select_profile = mysqli_query($conn, "SELECT * FROM `users` WHERE user_id = '$user_id'");
                  if(mysqli_num_rows($select_profile) > 0){
                  $fetch_profile = mysqli_fetch_assoc($select_profile);
              ?>
             <?php if($fetch_profile['image'] != ''){ ?>
            <img src="../../public/images/<?= $fetch_profile['image']; ?>" alt="" class="image">
            <?php $margin_top = '35rem';  ?>
            <?php } else { ?>
                <?php $margin_top = '25rem';?>
            <?php } ?>
              <p><?= $fetch_profile['username']; ?></p>
              <a href="update_profile.php" class="btn">Update Profile</a>
              <a href="../View/logout.php" class="delete-btn" onclick="return confirm('logout from this website?');">Logout</a>
            <?php } ?>
          </div>
        <div id="dropdown-box" class="dropdown-content">
                <a href="loginForm.php">Đăng nhập</a>
                <a href="registerForm.php">Đăng ký</a>
        </div>
    </a>
    <?php
      $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
      $cart_rows_number = mysqli_num_rows($select_cart_number); 
    ?>
    <a data-aos="zoom-in-left" data-aos-delay="1400" href="shopping_cart.php" class="shopping-icon">
            <i class="fas fa-shopping-bag"></i>
          <?php if($cart_rows_number > 0){ ?>
            <span class="badge"><?php echo $cart_rows_number; ?></span> 
          <?php } ?>
          
    </a>
    </div>
<script>
const dropdownBox = document.getElementById("dropdown-box");
const profileBox = document.getElementById("profile-box");
const faUser = document.getElementById("fa-user");

let isBoxVisible = false;

faUser.addEventListener("click", () => {
  if ('<?= $user_id ?>' !== '') {
    if (isBoxVisible) {
      profileBox.style.display = 'none';
      isBoxVisible = false;
    } else {
      profileBox.style.display = 'block';
      isBoxVisible = true;
    }
  }
  else {
    if (isBoxVisible) {
      dropdownBox.style.display = 'none';
      isBoxVisible = false;
    } else {
      dropdownBox.style.display = 'block';
      isBoxVisible = true;
    }
  }
});

let isScrolling = false;
window.addEventListener("scroll", () => {
  if (!isScrolling) {
    window.requestAnimationFrame(() => {
      profileBox.style.display = 'none';
      isScrolling = false;
    });
    isScrolling = true;
  }
});

</script>
</header>
<!-- header section ends -->
<style>
  .header .profile {
    margin-top: <?php echo $margin_top; ?>;
  }
</style>
