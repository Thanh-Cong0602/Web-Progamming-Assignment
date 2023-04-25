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
    <title>BookStore Website by TCN</title>

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

<section class="home" id="home">

    <div class="content">
        <span data-aos="fade-up" data-aos-delay="150">BookStore</span>
        <h4 data-aos="fade-up" data-aos-delay="300">Việc đọc sách rất quan trọng</h4>
        <h4 data-aos="fade-up" data-aos-delay="450">Nếu bạn biết cách đọc, cả thế giới sẽ mở ra cho bạn</h4>
        <p data-aos="fade-up" data-aos-delay="600">Barack Obama</p>
        <a data-aos="fade-up" data-aos-delay="600" href="#product" class="btn">Tham khảo ngay</a>
    </div>

</section>

<!-- home section ends -->

<!-- About section starts  -->

<section class="about tcn" id="about">

    <div class="video-container" data-aos="fade-right" data-aos-delay="300">
        <video src="../../public/images/book-video-3.mp4" muted autoplay loop class="video"></video>
        <div class="controls">
            <span class="control-btn" data-src="../../public/images/book-video-1.mp4"></span>
            <span class="control-btn" data-src="../../public/images/book-video-2.mp4"></span>
            <span class="control-btn" data-src="../../public/images/book-video-3.mp4"></span>
        </div>
    </div>

    <div class="content" data-aos="fade-left" data-aos-delay="600">
        <h3>Tại sao bạn phải đọc sách??</h3>
        <span>Đọc sách không chỉ nâng cao kiến thức, kỹ năng, phát triển tư duy giáo dục mà còn rèn luyện nhân cách con người. Ý nghĩa của việc đọc sách là vô cùng to lớn và rộng mở. Đọc sách cung cấp tri thức cho con người để học tập và làm việc.</span>
        <!-- <p>TCN</p> -->
        <a href="about.php" class="btn">Xem thêm</a>
    </div>

</section>

<!-- About section ends -->

<!-- Latest release Products section starts  -->

<section class="product" id="product">
    <div class="heading">
        <h1>Những quyển sách mới nhất</h1>
        <span> Hãy chọn quyển sách yêu thích của bạn</span>
    </div>
    <div class="box-container">
    <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `products` ORDER BY `date` DESC LIMIT 8") or die('query failed');

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
                        <h3>
                                <?php echo $fetch_products['price'];?>
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

<section class="product" id="product">
    <div class="heading">
        <h1>Combo sách hay mới nhất</h1>
    </div>
    <div class="box-container ">
    <?php  
         $select_combo_products = mysqli_query($conn, "SELECT * FROM `combo_products` ORDER BY combo_id DESC LIMIT 4") or die('query failed');
         if(mysqli_num_rows($select_combo_products) > 0){
            while($fetch_combo_products = mysqli_fetch_assoc($select_combo_products)){
      ?>
                <form method="post" action="../Controllers/cartController.php"> 
                    <div class="box combo_box" data-aos="fade-up" data-aos-delay="300">
                        <div class="image"> 
                            <img src="<?php echo $fetch_combo_products['image_combo']; ?>" alt="">
                        </div>
                        <div class="content">
                            <h3><?php echo $fetch_combo_products['combo_name']; ?></h3>
                            <a href="detail_combo_book.php?get_id=<?php echo $fetch_combo_products['combo_id']; ?>">Xem thêm<i class="fas fa-angle-right"></i></a>
                        </div>
                        <div class="purchase">
                            <h3><?php echo $fetch_combo_products['price'];?>
                            <span class="rate">₫</span></h3>
                        </h3>
                            <input type="hidden" name="product_quantity" value="1">
                            <input type="hidden" name="product_name" value="<?php echo $fetch_combo_products ['combo_name']; ?>">
                            <input type="hidden" name="product_price" value="<?php echo $fetch_combo_products['price']; ?>">
                            <input type="hidden" name="product_image" value="<?php echo $fetch_combo_products['image_combo']; ?>">
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

<!-- Latest release Products section ends -->

<!-- authors section starts -->

<section class="authors" id= "authors">

    <div class="content" data-aos="fade-right" data-aos-delay="300">
        <span>Tác giả</span>
        <h3>Tác giả và những câu danh ngôn về sách</h3>
        <p>Đằng sau thành công của một con người không thể thiếu một cuốn sách gối đầu. Sách là kho báu tri thức của cả nhân loại, là kết tinh trí tuệ qua bao thế hệ con người. Một cuốn sách hay chính là chìa khóa quan trọng để mỗi con người có thể chinh phục mọi khó khăn và chạm đến thành công. </p>
        <p>Nói một cách đơn giản, sách có thể làm thay đổi cuộc sống con người ta theo chiều hướng tốt đẹp. Đọc những câu danh ngôn về sách được sưu tầm dưới đây bạn sẽ càng nhận thấy giá trị của điều đó.</p>
    </div>

    <div class="box-container" data-aos="fade-left" data-aos-delay="600">
        <?php
            $select_authors = mysqli_query($conn, "SELECT * FROM `authors` LIMIT 4") or die('query failed');
            if(mysqli_num_rows($select_authors) > 0){
            while( $authors = mysqli_fetch_assoc($select_authors)){
        ?>
        <div class="box">
            <p><?php echo $authors['slogan']?></p>
            <div class="user">
            <img src="<?php echo $authors['image']; ?>" alt="">
                <div class="info">
                    <h3><?php echo $authors['name']?></h3>
                    <a href="<?php echo $authors['information']?>">
                        Thông tin tác giả</a>
                </div>
            </div>
        </div>
        <?php
        }
        }
        ?>
    </div>
    
    <div class="box-containers" data-aos="fade-left" data-aos-delay="600">
        <?php
            $select_authors = mysqli_query($conn, "SELECT * FROM `authors` LIMIT 18446744073709551615 OFFSET 4") or die('query failed');
            if(mysqli_num_rows($select_authors) > 0){
            while( $authors = mysqli_fetch_assoc($select_authors)){
        ?>
        <div class="box">
            <p><?php echo $authors['slogan']?></p>
            <div class="user">
            <img src="<?php echo $authors['image']; ?>" alt="">
                <div class="info">
                    <h3><?php echo $authors['name']?></h3>
                    <a href="<?php echo $authors['information']?>">
                        Thông tin tác giả</a>
                </div>
            </div>
        </div>
        <?php
        }
        }
        ?>
    </div>
    
</section>

<!-- review section ends -->

<?php include 'banner.php'; ?>
<?php include 'footer.php'; ?>

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