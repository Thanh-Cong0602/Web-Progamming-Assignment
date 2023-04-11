<?php
include '../../config/config.php';
$user_id = $_COOKIE['user_id'];
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping cart</title>

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
<!-- banner section starts  -->
<div class="cart_banner">
    <div class="banner">

    <div class="content" data-aos="zoom-in-up" data-aos-delay="300">
        <h3>THANH TOÁN</h3>
        <p><a href="./home.php">Trang chủ </a>
        <i class="fas fa-arrow-right"></i>
            Thanh toán</p>
    </div>

    </div>
</div>
<!-- banner section ends -->

<!-- List product section starts  -->
<section class="listcart" id="listcart" data-aos="zoom-in-up" data-aos-delay="600">
<h1>Danh sách sản phẩm</h1>
<table>
    <thead>
      <tr>
        <th style= "padding-left:2rem;">Tên sản phẩm</th>
        <th style= "padding-left:2rem;">Đơn giá</th>
        <th style="width: 12rem;">Số lượng</th>
      </tr>
    </thead>
    <tbody>
        <?php
            $grand_total = 0;
            $user_id = $_COOKIE['user_id'];
            $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
            if(mysqli_num_rows($select_cart) > 0){
                while($fetch_cart = mysqli_fetch_assoc($select_cart)){
                    $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
                    $grand_total += $total_price;
                    echo "
                    <tr>
                        <td>$fetch_cart[product_name]</td>
                        <td>$fetch_cart[price]<span>₫</span></td>
                        <td>$fetch_cart[quantity]</td>
                    </tr>
                ";
                ?>
        <?php }
            }
        ?>
    </tbody>
  </table>
  <div class="grand-total"> Tổng số tiền cần thanh toán : <span><?php echo $grand_total; ?>₫</span> </div>
</section>
<!-- List product section ends  -->

<section class="checkout" data-aos="zoom-in-up" data-aos-delay="300">
   <form action="../Controllers/orderController.php" method="post">
      <h3>Đặt đơn hàng của bạn</h3>
      <div class="flex">
         <div class="inputBox">
            <span>Họ và tên :</span>
            <input type="text" name="name" required placeholder="Nhập họ và tên">
         </div>
         <div class="inputBox">
            <span>Số điện thoại :</span>
            <input type="number" name="number" required placeholder="Nhập số điện thoại">
         </div>
         <div class="inputBox">
            <span>Email:</span>
            <input type="email" name="email" required placeholder="Nhập địa chỉ email">
         </div>
         <div class="inputBox">
            <span>Phương thức thanh toán:</span>
            <select name="method">
               <option value="cash on delivery">Thanh toán khi nhận hàng</option>
               <option value="credit card">Thẻ tín dụng</option>
               <option value="e-wallet">Ví điện tử</option>
               <option value="paytm">Paytm</option>
            </select>
         </div>
         <div class="inputBox">
            <span>Địa chỉ:</span>
            <input type="text" name="address" required placeholder="Nhập địa chỉ giao hàng">
         </div>
      </div>
      <input type="submit" value="Đặt hàng ngay" class="btn" name="order_btn">
   </form>
</section>


<?php include 'footer.php'; ?>




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