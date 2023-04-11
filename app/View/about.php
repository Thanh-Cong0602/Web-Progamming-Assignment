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
    <title>About</title>

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

<!-- banner section starts  -->
<div class="cart_banner">
    <div class="banner">

    <div class="content" data-aos="zoom-in-up" data-aos-delay="300">
        <h3>Giới thiệu</h3>
        <p><a href="./home.php">Trang chủ </a>
        <i class="fas fa-arrow-right"></i>
            Giới thiệu</p>
    </div>

    </div>
</div>
<!-- banner section ends -->

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