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
        <h3>Giỏ hàng</h3>
        <p><a href="./home.php">Trang chủ</a>
          <i class="fas fa-arrow-right"></i>
          Giỏ hàng
        </p>
      </div>

    </div>
  </div>
  <!-- banner section ends -->


  <section class="shopping-cart" id="shopping-cart">

    <h1 class="title" data-aos="fade-up" data-aos-delay="300">Sản phẩm</h1>

    <div class="box-container">
      <?php
      $grand_total = 0;
      $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
      if (mysqli_num_rows($select_cart) > 0) {
        while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
      ?>
          <div class="box"  data-aos="fade-up" data-aos-delay="500">
            <div class="image">
              <img src="<?php echo $fetch_cart['image']; ?>" alt="">
            </div>
            <div class="name"><?php echo substr($fetch_cart['product_name'], 0, 45).'...'; ?></div>
            <div class="price">Đơn giá: <?php echo $fetch_cart['price']; ?><span>₫</span></div>
            <form action="../Controllers/cartController.php" method="post">
              <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
              <div class="quantity-input">
                <button type="button" class="minus-btn cart-btn" data-id="<?php echo $fetch_cart['id']; ?>" data-action="decrease">-</button>
                <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>" readonly class="cart-quantity-input" data-id="<?php echo $fetch_cart['id']; ?>">
                <button type="button" class="plus-btn cart-btn" data-id="<?php echo $fetch_cart['id']; ?>" data-action="increase">+</button>
              </div>
              <div class="option-cart">
                <input type="submit" name="delete_cart" value="Xóa" class="inline-delete-btn">
                <input type="hidden" name="delete_cart_id" value="<?php echo $fetch_cart['id']; ?>">
                <input type="submit" name="update_cart" value="Cập nhật" class="inline-option-btn">
              </div>
            </form>
            <div class="sub-total"> total price : <span><?php echo $sub_total = ($fetch_cart['quantity'] * $fetch_cart['price']); ?></span><span>₫</span> </div>
          </div>
      <?php
          $grand_total += $sub_total;
        }
      } else {
        echo '<p class="empty">Giỏ hàng của bạn hiện đang trống</p>';
      }
      ?>
    </div>
    <form action="../Controllers/cartController.php" method="post">
      <div class="delete-all <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>">
      <input type="submit" name="delete_all_cart" value="Xóa tất cả sản phẩm" onclick="return confirm('Delete all from cart?');">
      </div>
    </form>
    <div class="cart-total">
      <p>Tổng số tiền cần thanh toán : <span><?php echo $grand_total; ?></span><span>₫</span></p>
      <div class="flex">
        <a href="shop.php" class="option-btn">Tiếp tục mua sách</a>
        <a href="checkout.php" class="btn <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>">Tiến hành thanh toán</a>
      </div>
    </div>

  </section>
  <script>
    // get all minus-btn and plus-btn elements
    const minusBtns = document.querySelectorAll('.minus-btn');
    const plusBtns = document.querySelectorAll('.plus-btn');

    // add event listeners to all minus-btn elements
    minusBtns.forEach(function(btn) {
      btn.addEventListener('click', function() {
        const input = btn.nextElementSibling;
        let value = parseInt(input.value);

        if (value > 1) {
          value--;
          input.value = value;
        }
      });
    });

    // add event listeners to all plus-btn elements
    plusBtns.forEach(function(btn) {
      btn.addEventListener('click', function() {
        const input = btn.previousElementSibling;
        let value = parseInt(input.value);
        value++;
        input.value = value;
      });
    });
    document.querySelectorAll('.cart-btn').forEach(button => {
      button.addEventListener('click', event => {
        const id = event.target.dataset.id; // get id of product
        const action = event.target.dataset.action; // get action (increase hoặc descrease)
        const input = document.querySelector(`.cart-quantity-input[data-id="${id}"]`);
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content'); // lấy CSRF token

        // Gửi yêu cầu AJAX đến server
        fetch('../Controllers/cartController.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-Token': csrfToken
            },
            body: JSON.stringify({
              id: id,
              action: action
            })
          })
          .then(response => response.json())
          .then(data => {
            input.value = data.quantity;
          });
      });
    });
  </script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <?php include '../View/alert.php'; ?>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
  <script>
    AOS.init({
      duration: 800,
      offset: 150,
    });
  </script>
</body>

</html>