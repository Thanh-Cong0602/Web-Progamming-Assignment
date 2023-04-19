<?php
include '../../config/config.php';
session_start();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Book Store Online Website</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../../public/css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

    <!-- custom js file link  -->
    <script src="../../public/js/script.js" defer></script>

</head>
<body>
<?php include 'header.php'; ?>
<!-- home section starts  -->


<section class="contact">

   <form action="../Controllers/supportController.php" method="post">
      <h3>Hỗ trợ!</h3>
      <input type="text" name="name" required placeholder="Nhập tên của bạn" class="box">
      <input type="email" name="email" required placeholder="Nhập địa chỉ email của bạn" class="box">
      <input type="text" name="username" required placeholder="Nhập username của bạn" class="box">
      <input type="number" name="number" required placeholder="Nhập số điện thoại" class="box">
      <textarea name="message" class="box" placeholder="Nhập nội dung cần hỗ trợ" id="" cols="30" rows="10"></textarea>
      <input type="submit" value="Xác nhận" name="send" class="btn">
   </form>

</section>


<section class="footer">
<div class="box-container">

    <div class="box" data-aos="fade-up" data-aos-delay="150">
        <a href="#" class="logo"> <i class="fas fa-paper-plane"></i>Book Store </a>
        <p>Đọc sách có thể không giàu, nhưng không đọc, chắc chắn nghèo?</p>
        <div class="share">
            <a href="https://www.facebook.com/profile.php?id=100058371174074" class="fab fa-facebook-f"></a>
            <a href="https://twitter.com/?lang=vi" class="fab fa-twitter"></a>
            <a href="https://www.instagram.com/th_cong_ng/" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
        </div>
    </div>

    <div class="box" data-aos="fade-up" data-aos-delay="300">
        <h3>Hỗ trợ</h3>
        <a href="policy_shipping.php" class="links"> <i class="fas fa-arrow-right"></i> Chính sách vận chuyển/giao hàng </a>
        <a href="payment_Guide.php" class="links"> <i class="fas fa-arrow-right"></i> Hướng dẫn thanh toán </a>
        <a href="policy_return.php" class="links"> <i class="fas fa-arrow-right"></i> Chính sách đổi trả </a>
        <a href="policy_refund.php" class="links"> <i class="fas fa-arrow-right"></i> Chính sách hoàn tiền </a>
        <a href="policy_privacy.php" class="links"> <i class="fas fa-arrow-right"></i> Chính sách bảo mật </a>
    </div>

   

    <div class="support-img" data-aos="fade-up" data-aos-delay="600">
        <img src="../../public/images/support.png" alt="support">
    </div>

</div>

</section>

<div class="credit"><span>Web Progamming Assignment </span> </div>

<!-- footer section ends -->

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