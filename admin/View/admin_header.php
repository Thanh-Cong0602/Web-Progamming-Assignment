<?php

?>

<header class="header">

    <div class="flex">

        <a href="admin_page.php" class="logo">Trang<span> Admin</span></a>

        <nav class="navbar">
            <a href="admin_page.php">Trang chủ</a>
            <a href="admin_product.php">Sách</a>
            <a href="admin_combo_product.php">Combo Sách</a>
            <a href="./admin_order.php">Đơn đặt hàng</a>
            <a href="admin_user.php">Người dùng</a>
            <a href="admin_request.php">Yêu cầu</a>
            <a href="admin_review.php">Bình luận</a>
            <a href="admin_author.php">Tác giả</a>
            <!-- <a href="admin_feedback.php">Phản hồi</a> -->
        </nav>

        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="user-btn" class="fas fa-user"></div>
            <a href="admin_cart.php">
                <div id="order-btn" class="fas fa-shopping-bag"></div>
            </a>
        </div>

        <div class="account-box">
            <p>username : <span>
                    <?php echo $_SESSION['admin_name']; ?>
                </span></p>
            <p>email : <span>
                    <?php echo $_SESSION['admin_email']; ?>
                </span></p>
            <a href="admin_update_profile.php" class="btn" style="margin-bottom:10px">Cập nhập thông tin</a>
            <a href="../../app/View/logout.php" class="delete-btn">logout</a>

    </div>

</header>