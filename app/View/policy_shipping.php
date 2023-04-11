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


<section class="policyShipping">
    <h3>Chính sách vận chuyển/giao hàng</h3>
    <div class="policy">
        <h4>1. Giao hàng và thu tiền tại nhà (COD)</h4>
        <p>Quý khách hàng đặt hàng trên website http://localhost:3000/app/View/home.php và thanh toán trực tiếp cho nhà cung cấp (NCC) hoặc đơn vị vận chuyển.</p>
        <h4>2. Miễn phí vận chuyển với đơn hàng trên 299.000đ</h4>
        <h4>3. Giao hàng qua đơn vị vận chuyển giao hàng tiết kiệm (GHTK) hoặc Viettel Post.</h4>
        <div class="list">
        <ul>
            <li>Cước phí được tính dựa trên số lượng hàng hóa/trọng lượng hàng hóa mà khách hàng đặt.</li>
            <li>Do đối tác vận chuyển tính phí.</li>
            <li>Cước thông thường từ 25.000 VNĐ đến 40.000 VNĐ.</li>
        </ul>
        </div>
        <h4>Thời gian vận chuyển:</h4>
        <div class="list">
        <ul>
            <li>Khu vực nội thành Hà Nội và thành phố Hồ Chí Minh : Thời gian giao hàng dự kiến từ 1 - 3 ngày.</li>
            <li>Các khu vực khác: Thời gian giao hàng dự kiến từ 4 - 5 ngày.</li>
        </ul>
        </div>
        <p>Lưu ý: Do vị trí địa lý nên thời gian giao hàng dự kiến là không đồng nhất cho tất cả mọi vị trí/khu vực địa lý.</p>
        <div class="list">
        <ul>
            <li>Thời gian giao hàng tính từ thời điểm đơn hàng của bạn được xác nhận.</li>
            <li>Các đơn hàng tại các thị xã, thị trấn có thể kéo dài thời gian nhận hàng chậm hơn dự tính khoảng 2-3 ngày.</li>
        </ul>
        </div>
    </div>
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