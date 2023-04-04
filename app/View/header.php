<?php
$user_id = $_COOKIE['user_id'];
?>

<!-- header section starts  -->
<header class="header">

    <div id="menu-btn" class="fas fa-bars"></div>

    <a data-aos="zoom-in-left" data-aos-delay="150" href="#" class="logo"> 
        <i class="fas fa-book-open"></i>Book Store </a>

    <nav class="navbar">
        <a data-aos="zoom-in-left" data-aos-delay="300" href="home.php">Trang chủ</a>
        <a data-aos="zoom-in-left" data-aos-delay="450" href="about.php">Giới thiệu</a>
        <a data-aos="zoom-in-left" data-aos-delay="600" href="product.php">Sản phẩm</a>
        <a data-aos="zoom-in-left" data-aos-delay="750" href="#authors">Tác giả</a>
        <a data-aos="zoom-in-left" data-aos-delay="900" href="order.php">Bài viết</a>
    </nav>
    <div class = "icons btn">
    <a data-aos="zoom-in-left" data-aos-delay="1100" href="#book-form">
             <i class="fas fa-search"></i>
    </a>
    <a data-aos="zoom-in-left" data-aos-delay="1250" class ="tcn">
        <i id="fa-user" class="fas fa-user users"></i>
            <div id="dropdown-box" class="dropdown-content hidden">
                <a href="loginForm.php">Đăng nhập</a>
                <a href="registerForm.php">Đăng ký</a>
            </div>
    </a>
    <a data-aos="zoom-in-left" data-aos-delay="1400" href="card.php">
            <i class="fas fa-shopping-bag"></i>
            <!-- <span>(<?php echo $cart_rows_number; ?>)</span> -->
    </a>
    </div>
</header>
<!-- header section ends -->
<!-- <script>
    // get the fa-user icon and profile/dropdown content boxes
    const faUser = document.getElementById("fa-user");
    const profileBox = document.getElementById("profile-box");
    const dropdownBox = document.getElementById("dropdown-box");

    // show/hide the profile/dropdown content boxes on hover
    faUser.addEventListener("mouseover", () => {
        if (<?= $user_id ?> != '') {
            profileBox.classList.remove("hidden");
        } else {
            dropdownBox.classList.remove("hidden");
        }
    });

    faUser.addEventListener("mouseout", () => {
        if (<?= $user_id ?> != '') {
            profileBox.classList.add("hidden");
        } else {
            dropdownBox.classList.add("hidden");
        }
    });
</script> -->