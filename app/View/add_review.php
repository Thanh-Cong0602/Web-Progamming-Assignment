<?php
session_start();
include '../../config/config.php';
if(isset($_GET['get_id'])){
   $get_id = $_GET['get_id'];
}else{
   $get_id = '';
   header('location:home.php');
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Add review</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../../public/css/style.css">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

   <!-- custom js file link  -->
   <script src="../../public/js/script.js" defer></script>
</head>
<body>
   
<!-- header section starts  -->
<?php include '../View/header.php'; ?>
<!-- header section ends -->

<!-- add review section starts  -->
<section class="account-form">

   <form action="../Controllers/userReviewControler.php?get_id=<?= $get_id; ?>" method="post" >
       <h3>Thêm đánh giá của bạn</h3>
      <p class="placeholder">Tiêu đề đánh giá<span>*</span></p>
      <input type="text" name="title" required maxlength="100" placeholder="Nhập tiêu đề đánh giá" class="box">
      <p class="placeholder">Mô tả đánh giá</p>
      <textarea name="description" class="box" placeholder="Nhập mô tả đánh giá" maxlength="2500"></textarea>
      <p class="placeholder">Điểm đánh giá <span>*</span></p>
      <select name="rating" class="box" required>
         <option value="1">1</option>
         <option value="2">2</option>
         <option value="3">3</option>
         <option value="4">4</option>
         <option value="5">5</option>
      </select>
      <input type="submit" value="Gửi đánh giá" name="submit_review" class="submit-btn">
      <a href="detail_book.php?get_id=<?= $get_id; ?>" class="submit-btn">Quay lại</a>
   </form>

</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<?php include '../View/alert.php'; ?>
<!-- add review section ends -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    AOS.init({
    duration: 800,
    offset:150,
});
</script>

</body>
</html>