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
    <title>Return Policy</title>

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
    <h3>Chính sách hoàn tiền</h3>
    <p>Khi mua hàng trên website VniBooks nhằm đảm bảo quyền lợi của khách hàng chúng tôi sẽ thực hiện việc đổi/trả hàng và hoàn lại 100% tiền cho khách hàng trong những trường hợp sau:</p>
    <div class="policy">
        <div class="list">
        <ul>
            <li>Sản phẩm Chúng tôi giao không đúng đơn đặt hàng (tên sản phẩm, kích thước, mẫu mã, màu sắc).</li>
            <li>Sản phẩm Chúng tôi giao bị lỗi hoặc đã qua sử dụng</li>
            <li>Trường hợp sản phẩm hư hại do quá trình vận chuyển hoặc do nhà sản xuất thì quý khách có thể từ chối nhận và yêu cầu bộ phận giao hàng liên hệ trực tiếp với chúng tôi.</li>
            <li>Với những sản phẩm bảo hành đã qua sử dụng, khi mã sản phẩm, nhãn sản phẩm hãng không còn sản xuất hoặc do lý do bất khả kháng, chúng tôi sẽ khấu hao thời gian sử dụng theo cam kết của từng nhãn hàng tới đại lý và khách hàng mua hàng trực tiếp.</li>
        </ul>
        </div>
        <p>Sản phẩm không hài lòng quý khách hàng: Nếu sản phẩm không hài lòng khách hàng do thái độ phục vụ, thời gian giao hàng không như lịch hẹn chúng tôi sẽ hoàn lại 100% tiền cho khách hàng.</p>
        <p>Như vậy hầu hết các lỗi từ chúng tôi hoặc đối tác vận chuyển của chúng tôi gây ra khách hàng sẽ được hoàn tiền 100% cho đơn hàng của mình. Chúng tôi không hoàn tiền trong những trường hợp sau đây: đã qua sử dụng, sản phẩm mất niêm phong, đã qua sửa chữa, tác động vật lý gây biến dạng một phần hoặc toàn bộ sản phẩm; sản phẩm không do chúng tôi cung cấp, sản phẩm quá thời gian hoàn trả.</p>
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