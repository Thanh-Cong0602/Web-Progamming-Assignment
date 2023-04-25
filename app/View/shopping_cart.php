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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
      $per_page = 8;
      $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
      $start = ($page - 1) * $per_page;
      $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
      if (mysqli_num_rows($select_cart) > 0) {
        while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
      ?>
       <?php
              $total_products = mysqli_query($conn, "SELECT COUNT(*) AS total FROM `cart`") or die('query failed');
            $total_products = mysqli_fetch_assoc($total_products)['total'];
              $total_pages = ceil($total_products / $per_page);
                    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $url = "http://localhost:3000/app/View/shopping_cart.php?page=";
                    // Tính toán giới hạn của LIMIT trong câu truy vấn SQL
                    $offset = ($current_page - 1) * $per_page;
                    // Truy vấn sản phẩm trong cơ sở dữ liệu với LIMIT và OFFSET
                    $select_cart = mysqli_query($conn, "SELECT * FROM cart LIMIT $per_page OFFSET $offset") or die('query failed');
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
      } 
    }
  }
  else {
        echo '<p class="empty">Giỏ hàng của bạn hiện đang trống</p>';
      }
      ?>
    </div>
    <nav aria-label="Page navigation example" class="toolbar_cart">
            <ul class="pagination justify-content-center d-flex flex-wrap">
                <li class="page-item <?php echo ($current_page <= 1) ? 'disabled' : ''; ?>">
                    <a class="page-link" href="<?php echo $url . ($current_page - 1); ?>" tabindex="-1">Previous</a>
                </li>
                <?php
                $start_page = ($current_page <= 3) ? 1 : $current_page - 2;
                $end_page = ($total_pages - $current_page >= 2) ? $current_page + 2 : $total_pages;
                if ($start_page > 1) {
                    echo '<li class="page-item"><a class="page-link" href="' . $url . '1">1</a></li>';
                    if ($start_page > 2) {
                        echo '<li class="page-item disabled"><a class="page-link">...</a></li>';
                    }
                }
                $num_displayed_pages = $end_page - $start_page + 1;
                $display_ellipsis = ($num_displayed_pages >= 7);
                for ($i = $start_page; $i <= $end_page; $i++) {
                    if ($num_displayed_pages >= 7) {
                        if ($i == $start_page + 3 || $i == $end_page - 3) {
                            if (!$display_ellipsis) {
                                echo '<li class="page-item"><a class="page-link" href="#">' . $i . '</a></li>';
                            }
                            continue;
                        }
                    }
                    if ($num_displayed_pages <= 5 || ($i >= $current_page - 2 && $i <= $current_page + 2)) {
                        echo '<li class="page-item ' . (($i == $current_page) ? 'active' : '') . '"><a class="page-link" href="' . $url . $i . '">' . $i . '</a></li>';
                    }
                }
                if ($end_page < $total_pages) {
                    if ($end_page < $total_pages - 1) {
                        echo '<li class="page-item disabled"><a class="page-link">...</a></li>';
                    }
                    echo '<li class="page-item"><a class="page-link" href="' . $url . $total_pages . '">' . $total_pages . '</a></li>';
                }
                ?>
                <li class="page-item <?php echo ($current_page >= $total_pages) ? 'disabled' : ''; ?>">
                    <a class="page-link" href="<?php echo $url . ($current_page + 1); ?>">Next</a>
                </li>
            </ul>
        </nav>

  
  
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