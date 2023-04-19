<?php
include '../../config/config.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
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
<!-- banner section starts  -->
<div class="cart_banner">
    <div class="banner">

    <div class="content" data-aos="zoom-in-up" data-aos-delay="500">
        <h3>SẢN PHẨM</h3>
        <p><a href="./home.php">Trang chủ</a>
        <i class="fas fa-arrow-right"></i>
            Sản phẩm</p>
    </div>

    </div>
</div>
<!-- banner section ends -->

<!-- products section starts  -->

<section class="product" id="product" data-aos="fade-up" data-aos-delay="500">
    <div class="box-container shop">
    <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `products` ORDER BY `date` ASC") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
                <form method="post" action="../Controllers/cartController.php"> 
                    <div class="box" data-aos="fade-up" data-aos-delay="300">
                        <div class="image"> 
                            <img src="<?php echo $fetch_products['image']; ?>" alt="">
                        </div>
                        <div class="content">
                            <h3><?php echo $fetch_products['name']; ?></h3>
                            <a href="detail_book.php?get_id=<?php echo $fetch_products['product_id']; ?>">Xem thêm<i class="fas fa-angle-right"></i></a>
                        </div>
                        <div class="purchase">
                            <h3><?php echo $fetch_products['price'];?>
                            <span class="rate">₫</span></h3>
                        </h3>
                            <input type="hidden" name="product_quantity" value="1">
                            <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
                            <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
                            <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
                            <button type="submit" name="add_to_cart">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </form>

      <?php
            }
        }else{
            echo '<p class="empty">no products added yet!</p>';
        }
      ?>
    </div>
  
   
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