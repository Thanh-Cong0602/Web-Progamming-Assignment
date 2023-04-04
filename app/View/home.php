<?php
include '../../config/config.php';
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
<!-- home section starts  -->

<section class="home" id="home">

    <div class="content">
        <span data-aos="fade-up" data-aos-delay="150">follow us</span>
        <h4 data-aos="fade-up" data-aos-delay="300">Việc đọc sách rất quan trọng</h4>
        <h4 data-aos="fade-up" data-aos-delay="450">Nếu bạn biết cách đọc, cả thế giới sẽ mở ra cho bạn</h4>
        <p data-aos="fade-up" data-aos-delay="600">Barack Obama</p>
        <a data-aos="fade-up" data-aos-delay="600" href="#" class="btn">Tham khảo ngay</a>
    </div>

</section>

<!-- home section ends -->

<!-- about section starts  -->

<section class="about" id="about">

    <div class="video-container" data-aos="fade-right" data-aos-delay="300">
        <video src="../../public/images/book-video-2.mp4" muted autoplay loop class="video"></video>
        <div class="controls">
            <span class="control-btn" data-src="../../public/images/book-video-1.mp4"></span>
            <span class="control-btn" data-src="../../public/images/book-video-2.mp4"></span>
            <span class="control-btn" data-src="../../public/images/book-video-3.mp4"></span>
        </div>
    </div>

    <div class="content" data-aos="fade-left" data-aos-delay="600">
        <span>Tại sao bạn phải đọc sách?</span>
        <h3>Đố bạn biết đấy</h3>
        <p>TCN</p>
        <a href="about.php" class="btn">Xem thêm</a>
    </div>

</section>

<!-- about section ends -->

<!-- products section starts  -->

<section class="product" id="product">

    <div class="heading">
        <h1>Những quyển sách mới nhất</h1>
        <span> Hãy chọn quyển sách yêu thích của bạn</span>
    </div>
    <div class="box-container">
    <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 6") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
                <form method="post" action=""> 
                    <div class="box" data-aos="fade-up" data-aos-delay="300">
                        <div class="image"> 
                            <img src=<?php echo $fetch_products['image']; ?> alt="">
                        </div>
                        <div class="content">
                            <h3><?php echo $fetch_products['name']; ?></h3>
                            <a href="detail_book.php?get_id=<?php echo $fetch_products['product_id']; ?>">read more <i class="fas fa-angle-right"></i></a>
                        </div>
                        <div class="purchase">
                            <h3>$<?php echo $fetch_products['price'];?></h3>
                            <a href="#" name="add_to_cart">
                                <i class="fas fa-shopping-cart"></i>
                            </a>
                        </div>
                    </div>
                </form>
      <?php
            }
        }else{
            echo '<p class="empty">no products added yet!</p>';
        }
      ?>
       <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 6") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
                <form method="post" action=""> 
                    <div class="box" data-aos="fade-up" data-aos-delay="300">
                        <div class="image">
                            <img src=<?php echo $fetch_products['image']; ?> alt="">
                        </div>
                        <div class="content">
                            <h3><?php echo $fetch_products['name']; ?></h3>
                            <a href="#">read more <i class="fas fa-angle-right"></i></a>
                        </div>
                        <div class="purchase">
                            <h3>$<?php echo $fetch_products['price'];?></h3>
                            <a href="#"><i class="fas fa-shopping-cart"></i></a>
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

<!-- products section ends -->


<!-- review section starts  -->

<section class="authors" id= "authors">

    <div class="content" data-aos="fade-right" data-aos-delay="300">
        <span>Tác giả</span>
        <h3>Tác giả và những câu danh ngôn về sách</h3>
        <p>Đằng sau thành công của một con người không thể thiếu một cuốn sách gối đầu. Sách là kho báu tri thức của cả nhân loại, là kết tinh trí tuệ qua bao thế hệ con người. Một cuốn sách hay chính là chìa khóa quan trọng để mỗi con người có thể chinh phục mọi khó khăn và chạm đến thành công. </p>
        <p>Nói một cách đơn giản, sách có thể làm thay đổi cuộc sống con người ta theo chiều hướng tốt đẹp. Đọc những câu danh ngôn về sách được sưu tầm dưới đây bạn sẽ càng nhận thấy giá trị của điều đó.</p>
    </div>

    <div class="box-container" data-aos="fade-left" data-aos-delay="600">

        <div class="box">
            <p>Trở ngại lớn nhất của những người luyện tâm rèn chí là sự kiêu ngạo và óc chỉ trích.</p>
            <div class="user">
                <img src="../images/pic-1.png" alt="">
                <div class="info">
                    <h3>Baird T. Spalding</h3>
                    <a href="https://vi.wikipedia.org/wiki/Baird_T._Spalding">
                        Thông tin tác giả</a>
                </div>
            </div>
        </div>
        
        <div class="box">
            <p>Cuộc đời là một bộ phim mà trong đó ai cũng phải đóng một vai nào đó. Vậy sao không tỏa sáng trong vở diễn đời mình?</p>
            <div class="user">
                <img src="../images/pic-2.png" alt="">
                <div class="info">
                    <h3>Rosie Nguyễn</h3>
                    <a href="https://nguoinoitieng.tv/nghe-nghiep/blogger/rosie-nguyen/bcgc">
                        Thông tin tác giả</a>
                </div>
            </div>
        </div>
        <div class="box">
            <p>Một cuốn sách hay cho ta một điều tốt, một người bạn tốt cho ta một điều hay.</p>
            <div class="user">
                <img src="../images/pic-3.png" alt="">
                <div class="info">
                    <h3>Gustavơ Lebon</h3>
                    <a href="https://vi.wikipedia.org/wiki/Gustave_Le_Bon">
                        Thông tin tác giả
                    </a>
                </div>
            </div>
        </div>
        <div class="box">
            <p>Chính từ sách mà những người khôn ngoan tìm được sự an ủi khỏi những rắc rối của cuộc đời.</p>
            <div class="user">
                <img src="../images/pic-4.png" alt="">
                <div class="info">
                    <h3>Victor Hugo</h3>
                    <a href="https://vi.wikipedia.org/wiki/Victor_Hugo">
                        Thông tin tác giả
                    </a>
                </div>
            </div>
        </div>
        
    </div>
    <div class="box-containers" data-aos="fade-left" data-aos-delay="600">

        <div class="box">
            <p>Trở ngại lớn nhất của những người luyện tâm rèn chí là sự kiêu ngạo và óc chỉ trích.</p>
            <div class="user">
                <img src="../images/pic-1.png" alt="">
                <div class="info">
                    <h3>Baird T. Spalding</h3>
                    <a href="https://vi.wikipedia.org/wiki/Baird_T._Spalding">
                        Thông tin tác giả</a>
                </div>
            </div>
        </div>
        <div class="box">
            <p>Trở ngại lớn nhất của những người luyện tâm rèn chí là sự kiêu ngạo và óc chỉ trích.</p>
            <div class="user">
                <img src="../images/pic-1.png" alt="">
                <div class="info">
                    <h3>Baird T. Spalding</h3>
                    <a href="https://vi.wikipedia.org/wiki/Baird_T._Spalding">
                        Thông tin tác giả</a>
                </div>
            </div>
        </div>
        <div class="box">
            <p>Trở ngại lớn nhất của những người luyện tâm rèn chí là sự kiêu ngạo và óc chỉ trích.</p>
            <div class="user">
                <img src="../images/pic-1.png" alt="">
                <div class="info">
                    <h3>Baird T. Spalding</h3>
                    <a href="https://vi.wikipedia.org/wiki/Baird_T._Spalding">
                        Thông tin tác giả</a>
                </div>
            </div>
        </div>
        <div class="box">
            <p>Trở ngại lớn nhất của những người luyện tâm rèn chí là sự kiêu ngạo và óc chỉ trích.</p>
            <div class="user">
                <img src="../images/pic-1.png" alt="">
                <div class="info">
                    <h3>Baird T. Spalding</h3>
                    <a href="https://vi.wikipedia.org/wiki/Baird_T._Spalding">
                        Thông tin tác giả</a>
                </div>
            </div>
        </div>
        
    </div>
    
</section>

<!-- review section ends -->


<?php include 'banner.php'; ?>
<?php include 'footer.php'; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    AOS.init({
    duration: 800,
    offset:150,
});
</script>
</body>
</html>