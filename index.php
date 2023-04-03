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
    <link rel="stylesheet" href="../css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

    <!-- custom js file link  -->
    <script src="../js/script.js" defer></script>

</head>
<body>
    <?php include './includes/header.php'; ?>


<!-- home section starts  -->

<section class="home" id="home">

    <div class="content">
        <span data-aos="fade-up" data-aos-delay="150">follow us</span>
        <h4 data-aos="fade-up" data-aos-delay="300">Việc đọc sách rất quan trọng</h4>
        <h4 data-aos="fade-up" data-aos-delay="300">Nếu bạn biết cách đọc, cả thế giới sẽ mở ra cho bạn</h4>
        <p data-aos="fade-up" data-aos-delay="300">Barack Obama</p>
        <a data-aos="fade-up" data-aos-delay="600" href="#" class="btn">Tham khảo ngay</a>
    </div>

</section>

<!-- home section ends -->

<!-- about section starts  -->

<section class="about" id="about">

    <div class="video-container" data-aos="fade-right" data-aos-delay="300">
        <video src="../images/book-video-2.mp4" muted autoplay loop class="video"></video>
        <div class="controls">
            <span class="control-btn" data-src="../images/book-video-1.mp4"></span>
            <span class="control-btn" data-src="../images/book-video-2.mp4"></span>
            <span class="control-btn" data-src="../images/book-video-3.mp4"></span>
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

        <div class="box" data-aos="fade-up" data-aos-delay="150">
            <div class="image">
                <img src="../images/book-1.jpg" alt="">
            </div>
            <div class="content">
                <h3>Tuổi trẻ đáng giá bao nhiêu</h3>
                <a href="#">read more <i class="fas fa-angle-right"></i></a>
            </div>
            <div class="purchase">
                <h3>100.000$</h3>
                <a href="#"><i class="fas fa-shopping-cart"></i></a>
            </div>
        </div>

        <div class="box" data-aos="fade-up" data-aos-delay="300">
            <div class="image">
                <img src="../images/book-2.jpg" alt="">
            </div>
            <div class="content">
            <h3>Đừng lựa chọn an nhàn <br> khi còn trẻ</h3>
                <a href="#">read more <i class="fas fa-angle-right"></i></a>
            </div>
            <div class="purchase">
                <h3>100.000$</h3>
                <a href="#"><i class="fas fa-shopping-cart"></i></a>
            </div>
        </div>

        <div class="box" data-aos="fade-up" data-aos-delay="450">
            <div class="image">
                <img src="../images/book-3.jpg" alt="">
            </div>
            <div class="content">
                <h3>Khéo ăn nói sẽ có được thiên hạ</h3>
                <a href="#">read more <i class="fas fa-angle-right"></i></a>
            </div>
            <div class="purchase">
                <h3>100.000$</h3>
                <a href="#"><i class="fas fa-shopping-cart"></i></a>
            </div>
        </div>

        <div class="box" data-aos="fade-up" data-aos-delay="450">
            <div class="image">
                <img src="../images/book-4.jpg" alt="">
            </div>
            <div class="content">
                <h3>Nhà giả kim</h3>
                <a href="#">read more <i class="fas fa-angle-right"></i></a>
            </div>
            <div class="purchase">
                <h3>100.000$</h3>
                <a href="#"><i class="fas fa-shopping-cart"></i></a>
            </div>
        </div>

        <div class="box" data-aos="fade-up" data-aos-delay="450">
            <div class="image">
                <img src="../images/book-5.jpg" alt="">
            </div>
            <div class="content">
                <h3>Đắc nhân tâm</h3>
                <a href="#">read more <i class="fas fa-angle-right"></i></a>
            </div>
            <div class="purchase">
                <h3>100.000$</h3>
                <a href="#"><i class="fas fa-shopping-cart"></i></a>
            </div>
        </div>

        <div class="box" data-aos="fade-up" data-aos-delay="450">
            <div class="image">
                <img src="../images/book-6.jpg" alt="">
            </div>
            <div class="content">
                <h3>Trí tuệ do thái</h3>
                <a href="#">read more <i class="fas fa-angle-right"></i></a>
            </div>
            <div class="purchase">
                <h3>100.000$</h3>
                <a href="#"><i class="fas fa-shopping-cart"></i></a>
            </div>
        </div>

        <div class="box" data-aos="fade-up" data-aos-delay="450">
            <div class="image">
                <img src="../images/book-7.jpg" alt="">
            </div>
            <div class="content">
                <h3>Hành trình về phương Đông</h3>
                <a href="#">read more <i class="fas fa-angle-right"></i></a>
            </div>
            <div class="purchase">
                <h3>100.000$</h3>
                <a href="#"><i class="fas fa-shopping-cart"></i></a>
            </div>
        </div>

        <div class="box" data-aos="fade-up" data-aos-delay="450">
            <div class="image">
                <img src="../images/book-8.jpg" alt="">
            </div>
            <div class="content">
                <h3>Thao túng tâm lý</h3>
                <a href="#">read more <i class="fas fa-angle-right"></i></a>
            </div>
            <div class="purchase">
                <h3>100.000$</h3>
                <a href="#"><i class="fas fa-shopping-cart"></i></a>
            </div>
        </div>

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

<!-- blogs section starts  -->

<section class="blogs" id="blogs">

    <div class="heading">
        <span>Đánh giá của khách hàng</span>
        <!-- <h1>we untold stories</h1> -->
    </div>

    <div class="box-container">

        <div class="box" data-aos="fade-up" data-aos-delay="150">
                <img src="../images/blog-1.jpg" alt="">
            <div class="content">
                <p>Thanh Cong Nguyen</p>
         <p>Đã bao giờ, trong một buổi chiều, bất chợt xuất hiện trong đầu bạn một suy nghĩ: “Hiện tại mình đang làm gì nhỉ?”. Sau đó nhớ lại quá khứ, rồi tương lai, nên làm gì tiếp theo hay cứ mãi trôi nổi như một áng mây bình dị? Đến một lúc khi những vết nhăn nheo đã rõ mồn một trên trán, bỗng giật mình nhìn lại sự việc, nhìn lại cảnh quang, lòng lại im lặng hỏi một câu: “Mình đã sống cuộc đời tuổi trẻ có đáng giá không?”</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
                <div class="icon">
                    <a href="#"><i class="fas fa-clock"></i> 21st March, 2023</a>
                    <a href="#"><i class="fas fa-user"></i> by admin</a>
                </div>
            </div>
        </div>
        
        <div class="box" data-aos="fade-up" data-aos-delay="150">
                <img src="../images/blog-1.jpg" alt="">
            <div class="content">
                <p>Thanh Cong Nguyen</p>
         <p>Đã bao giờ, trong một buổi chiều, bất chợt xuất hiện trong đầu bạn một suy nghĩ: “Hiện tại mình đang làm gì nhỉ?”. Sau đó nhớ lại quá khứ, rồi tương lai, nên làm gì tiếp theo hay cứ mãi trôi nổi như một áng mây bình dị? Đến một lúc khi những vết nhăn nheo đã rõ mồn một trên trán, bỗng giật mình nhìn lại sự việc, nhìn lại cảnh quang, lòng lại im lặng hỏi một câu: “Mình đã sống cuộc đời tuổi trẻ có đáng giá không?”</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
                <div class="icon">
                    <a href="#"><i class="fas fa-clock"></i> 21st March, 2023</a>
                    <a href="#"><i class="fas fa-user"></i> by admin</a>
                </div>
            </div>
        </div>
          <div class="box" data-aos="fade-up" data-aos-delay="150">
                <img src="../images/blog-1.jpg" alt="">
            <div class="content">
                <p>Thanh Cong Nguyen</p>
         <p>Đã bao giờ, trong một buổi chiều, bất chợt xuất hiện trong đầu bạn một suy nghĩ: “Hiện tại mình đang làm gì nhỉ?”. Sau đó nhớ lại quá khứ, rồi tương lai, nên làm gì tiếp theo hay cứ mãi trôi nổi như một áng mây bình dị? Đến một lúc khi những vết nhăn nheo đã rõ mồn một trên trán, bỗng giật mình nhìn lại sự việc, nhìn lại cảnh quang, lòng lại im lặng hỏi một câu: “Mình đã sống cuộc đời tuổi trẻ có đáng giá không?”</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
                <div class="icon">
                    <a href="#"><i class="fas fa-clock"></i> 21st March, 2023</a>
                    <a href="#"><i class="fas fa-user"></i> by admin</a>
                </div>
            </div>
        </div>
        <div class="box" data-aos="fade-up" data-aos-delay="150">
                <img src="../images/blog-1.jpg" alt="">
            <div class="content">
                <p>Thanh Cong Nguyen</p>
         <p>“Thao túng tâm lý” được hiểu là một dạng lạm dụng tâm lý và có thể xuất hiện với bất kỳ ai, ở bất cứ môi trường nào. Ngay cả những người thân bên cạnh như bố, mẹ, anh chị em, vợ chồng, đồng nghiệp, sếp….đều có thể là người thao túng tâm lý. 
            Những người bị thao túng tinh thần thường không nhận biết được điều đó và không thể miêu tả rõ ràng về những gì đã xảy ra với mình. </p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
                <div class="icon">
                    <a href="#"><i class="fas fa-clock"></i> 21st March, 2023</a>
                    <a href="#"><i class="fas fa-user"></i> by admin</a>
                </div>
            </div>
        </div>

        <div class="box" data-aos="fade-up" data-aos-delay="150">
                <img src="../images/blog-1.jpg" alt="">
            <div class="content">
                <p>Thanh Cong Nguyen</p>
         <p>Khéo ăn khéo nói sẽ có được thiên hạ thấm và chạm đến biết bao thế hệ độc giả bởi nó được viết bởi tác giả Trác Nhã - nhà văn người Trung Quốc với văn phong mượt mà, nhẹ nhàng mà rất thú vị, sâu sắc.

Có thể nói, những điều được viết trong cuốn sách “Khéo ăn khéo nói sẽ có được thiên hạ” chính là những kinh nghiệm được đúc rút trong cuộc sống, trong những trải nghiệm giao tiếp của chính tác giả.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
                <div class="icon">
                    <a href="#"><i class="fas fa-clock"></i> 21st March, 2023</a>
                    <a href="#"><i class="fas fa-user"></i> by admin</a>
                </div>
            </div>
        </div>

    </div>

</section>

<!-- blogs section ends -->
<?php include './includes/banner.php'; ?>
<?php include './includes/footer.php'; ?>

<link rel="stylesheet" href="../assets/js/aos.js">

</body>
</html>