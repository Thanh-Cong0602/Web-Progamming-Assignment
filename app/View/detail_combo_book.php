<?php
include '../../config/config.php';
session_start();
if(isset($_GET['get_id'])){
   $get_id = $_GET['get_id'];
}else{
   $get_id = '';
   header('location:home.php');
}

if(isset($_POST['delete_review'])){

    $delete_id = $_POST['delete_id'];
    $delete_id = filter_var($delete_id, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $verify_delete = mysqli_query($conn, "SELECT * FROM `reviews` WHERE id = '$delete_id'") or die('query failed');
    if(mysqli_num_rows($verify_delete) > 0){
        $delete_review = mysqli_query($conn, "DELETE FROM  `reviews` WHERE id = '$delete_id'") or die('query failed');
        $_SESSION['success_msg'] = 'Review deleted!';
    }
    else{  
        $_SESSION['$warning_msg'] = 'Review already deleted!';
    }
 
 }
 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../../public/css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

    <!-- custom js file link  -->
    <script src="../../public/js/script.js" defer></script>
    <title>Detail Book</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <!-- review section starts  -->

<section class="detailBook" id= "detailBook">

    <div class="book-img" data-aos="fade-right" data-aos-delay="300">
        <?php
            $select_combo_products = mysqli_query($conn, "SELECT * FROM `combo_products` WHERE combo_id='$get_id'") or die('query failed');
            if(mysqli_num_rows($select_combo_products) > 0){
            $product = mysqli_fetch_assoc($select_combo_products);
        ?>
        <div class="box" >
            <div class="image">
            <img src="<?php echo $product['image_combo']; ?>" alt="">
        </div>
        </div>
        <?php
        }else{
            echo '<p class="empty">no products added yet!</p>';
        }
      ?>
    </div>
    <div class="information-detail" data-aos="fade-left" data-aos-delay="600">
        <h3><?php echo $product['combo_name']?></h3>
    <div class="evaluate-average">
    <?php
        $average = 0;
        $total_ratings = 0;
        $select_ratings = mysqli_query($conn, "SELECT * FROM `reviews` WHERE combo_id = '$get_id'") or die('query failed');
        $total_reviews = mysqli_num_rows($select_ratings);
        while($fetch_rating = mysqli_fetch_assoc($select_ratings)){
            $total_ratings += $fetch_rating['rating'];
        }
        if($total_reviews != 0){
            $average = round($total_ratings / $total_reviews, 1);
            if($total_reviews>0){
                $quotient = (float)$total_ratings / $total_reviews;
                $decimal_part = fmod($quotient, 1);
            }
        }
        ?>
        <h3>
            <?php 
            for ($i=1; $i <= $average; $i++) { 
                echo '<i class="fas fa-star"></i>';
            }
            if($total_reviews>0) {
                if ( $decimal_part < 1 and $decimal_part > 0 ) {
                    echo '<i class="fas fa-star-half-alt"></i>';
                }
            }
            ?>
        </h3>
        <p><?= $total_reviews; ?> đánh giá</p>
    </div>
    

    
    <div class="price-box">
        <div class="box">
        <p>Combo</p>
        <i aria-hidden="true" class="fa fa-book"></i>
        </div>
        <div class="price">
        <span><?php echo $product['price']?>đ</span>
        </div>
    </div>
    <form action="../Controllers/cartController.php" method="post">
    <div class="quantity-input">
        <p>Số lượng: </p>
        <button type="button" class="minus-btn cart-btn" onClick="decrease()">-</button>
        <input type="number" min="1" name="product_quantity" value="1" readonly class="cart-quantity-input" id="product-quantity">
        <button type="button" class="plus-btn cart-btn" onClick="increase()">+</button>
    </div>
        <div>
            <input type="hidden" name="product_name" value="<?php echo $product['combo_name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $product['price']?>">
            <input type="hidden" name="product_image" value="<?php echo $product['image_combo']; ?>">
        </div>
        <div class="option-cart">
            <div class="add_to_cart combo">
                <i class="fas fa-shopping-cart "></i>
                <input type="submit" name="add_to_cart" value="Thêm combo vào giỏ hàng" class="btnAddCart">
            <input type="hidden" name="product_id" value="<?php echo $product['combo_id']; ?>">
            </div>
            <input type="submit" name="add_to_cart" value="Mua ngay" class="buy_now_btn">
        </div>
    </form>
</section>

<section class="descriptionBook" data-aos="zoom-in-up" data-aos-delay="300">
    <div class="heading combo">
        <h1>Mô tả sản phẩm</h1>
        <p><?php echo $product['combo_name']?></p>
        <div class="description"><?php echo nl2br($product['description_detail'])?></div>
        <div class="book">
        <?php 
            if ($product['name_1'] != null) {
                echo '<p>1. '.$product['name_1'].'</p>';
            } else {
                echo '<p></p>';
            }
        ?>
        <div class="description"><?php echo nl2br($product['description_1'])?></div>
        <?php 
            if ($product['image_1'] != null) {
            echo '<img src="'.$product['image_1'].'" alt="">';
            }
        ?>
        </div>
        <div class="book">
        <?php 
            if ($product['name_2'] != null) {
                echo '<p>2. '.$product['name_2'].'</p>';
            } else {
                echo '<p></p>';
            }
        ?>
        <div class="description"><?php echo nl2br($product['description_2'])?></div>
        <?php 
            if ($product['image_2'] != null) {
            echo '<img src="'.$product['image_2'].'" alt="">';
            }
        ?>
        </div>
        <div class="book">
        <?php 
            if ($product['name_3'] != null) {
                echo '<p>3. '.$product['name_3'].'</p>';
            } else {
                echo '<p></p>';
            }
        ?>
        <div class="description"><?php echo nl2br($product['description_3'])?></div>
        <?php 
            if ($product['image_3'] != null) {
            echo '<img src="'.$product['image_3'].'" alt="">';
            }
        ?>
        </div>
        <!-- <button class="btn-toggle">Xem thêm</button> --> 
</section>


<!-- reviews section starts  -->

<section class="reviews-container">

   <div class="heading">
    <h1>Đánh giá sản phẩm</h1> 
    <a href="add_review.php?get_id=<?= $get_id; ?>" class="add-btn">Thêm đánh giá</a>
    </div>
    <div class="box-review">
    <div class="view-post">
        <?php
            $select_products = mysqli_query($conn, "SELECT * FROM `combo_products` WHERE combo_id = '$get_id'") or die('query failed');
            if(mysqli_num_rows($select_products) > 0){
                while($fetch_products = mysqli_fetch_assoc($select_products)){
                    $total_ratings = 0;
                    $rating_1 = 0;
                    $rating_2 = 0;
                    $rating_3 = 0;
                    $rating_4 = 0;
                    $rating_5 = 0;
                $select_ratings = mysqli_query($conn, "SELECT * FROM `reviews` WHERE combo_id = '$get_id'") or die('query failed');
                $total_reivews = mysqli_num_rows($select_ratings);
                while($fetch_rating = mysqli_fetch_assoc($select_ratings)){
                    $total_ratings += $fetch_rating['rating'];
                    if($fetch_rating['rating'] == 1){
                    $rating_1 += $fetch_rating['rating'];
                    }
                    if($fetch_rating['rating'] == 2){
                    $rating_2 += $fetch_rating['rating'];
                    }
                    if($fetch_rating['rating'] == 3){
                    $rating_3 += $fetch_rating['rating'];
                    }
                    if($fetch_rating['rating'] == 4){
                    $rating_4 += $fetch_rating['rating'];
                    }
                    if($fetch_rating['rating'] == 5){
                    $rating_5 += $fetch_rating['rating'];
                    }
                }

                if($total_reivews != 0){
                    $average = round($total_ratings / $total_reivews, 1);
                }else{
                    $average = 0;
                }
        
        ?>
        <div class="row">
            <div class="col">
                <div class="flex">
                    <div class="total-reviews">
                        <h3><?= $average; ?><i class="fas fa-star"></i></h3>
                        <p>(<?= $total_reivews; ?> đánh giá)</p>
                    </div>
                    <div class="total-ratings">
                        <p>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <span><?= $rating_5; ?></span>
                        </p>
                        <p>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <span><?= $rating_4; ?></span>
                        </p>
                        <p>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <span><?= $rating_3; ?></span>
                        </p>
                        <p>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <span><?= $rating_2; ?></span>
                        </p>
                        <p>
                            <i class="fas fa-star"></i>
                            <span><?= $rating_1; ?></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
   <?php
         }
      }else{
         echo '<p class="empty">post is missing!</p>';
      }
   ?>

        </div>
   
   <div class="box-container">
   <?php
        $select_reviews = mysqli_query($conn, "SELECT * FROM `reviews` WHERE combo_id = '$get_id'") or die('query failed');
        if(mysqli_num_rows($select_reviews) > 0){
        while($fetch_review = mysqli_fetch_assoc($select_reviews)){
        ?>
    <div class="box" <?php if($fetch_review['user_id'] == $user_id){echo 'style="order: -1;"';}; ?>>
      <?php
        $select_user = mysqli_query($conn, "SELECT * FROM `users` WHERE user_id = '".$fetch_review['user_id']."'") or die('query failed');
        while($fetch_user = mysqli_fetch_assoc($select_user)){
      ?>
      <div class="user">
         <?php if($fetch_user['image'] != ''){ ?>
            <img src="../../public/images/<?=$fetch_user['image']; ?>" alt="">
         <?php }else{ ?>   
            <h3><?= substr($fetch_user['username'], 0, 1); ?></h3>
         <?php }; ?>   
         <div>
            <p><?= $fetch_user['username']; ?></p>
            <span><?= $fetch_review['date']; ?></span>
         </div>
      </div>
      <?php }; ?>
      <div class="ratings">
         <?php if($fetch_review['rating'] == 1){ ?>
            <p>
                <i class="fas fa-star"></i> 
            </p>
         <?php }; ?> 
         <?php if($fetch_review['rating'] == 2){ ?>
            <p>
                <i class="fas fa-star"></i> 
                <i class="fas fa-star"></i> 
            </p>
         <?php }; ?>
         <?php if($fetch_review['rating'] == 3){ ?>
            <p>
                <i class="fas fa-star"></i> 
                <i class="fas fa-star"></i> 
                <i class="fas fa-star"></i>
            </p>
         <?php }; ?>   
         <?php if($fetch_review['rating'] == 4){ ?>
            <p>
                <i class="fas fa-star"></i> 
                <i class="fas fa-star"></i> 
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </p>
         <?php }; ?>
         <?php if($fetch_review['rating'] == 5){ ?>
            <p>
                <i class="fas fa-star"></i> 
                <i class="fas fa-star"></i> 
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </p>
         <?php }; ?>
      </div>
      <h3 class="title"><?= $fetch_review['title']; ?></h3>
      <?php if($fetch_review['description'] != ''){ ?>
         <p class="description"><?= $fetch_review['description']; ?></p>
      <?php }; ?>  
      <?php if($fetch_review['user_id'] == $user_id){ ?>
         <form action="" method="post" class="flex-btn">
            <input type="hidden" name="delete_id" value="<?= $fetch_review['id']; ?>">
            <a href="update_review.php?get_id=<?= $fetch_review['id']; ?>" class="update">Chỉnh sửa</a>
            <input type="submit" value="Xóa" class="delete-review" name="delete_review" >
         </form>
      <?php }; ?>   
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">Chưa có đánh giá!</p>';
      }
   ?>

   </div>

    </div>
</section>

<!-- reviews section ends -->
<script>
    function decrease() {
        var quantityInput = document.getElementById('product-quantity');
        var currentQuantity = parseInt(quantityInput.value);
        if(currentQuantity > 1) {
            quantityInput.value = currentQuantity - 1;
        }
    }

    function increase() {
        var quantityInput = document.getElementById('product-quantity');
        var currentQuantity = parseInt(quantityInput.value);
        quantityInput.value = currentQuantity + 1;
    }
    const btnToggle = document.querySelector('.btn-toggle');
    const description = document.querySelector('.description');

    btnToggle.addEventListener('click', () => {
        if (description.classList.contains('active')) {
            description.classList.remove('active');
            btnToggle.innerText = 'Xem thêm';
        } else {
            description.classList.add('active');
            btnToggle.innerText = 'Rút gọn';
        }
    });
</script>

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