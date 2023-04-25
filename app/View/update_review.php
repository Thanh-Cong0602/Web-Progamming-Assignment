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
<html lang="en">
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

<!-- update review section starts  -->
<section class="account-form">

   <form action="../Controllers/userReviewControler.php?get_id=<?= $get_id; ?>" method="post">
   <?php
    $select_reviews = mysqli_query($conn, "SELECT * FROM `reviews` WHERE id = '$get_id'") or die('query failed');
    if(mysqli_num_rows($select_reviews) > 0){
    while($fetch_review = mysqli_fetch_assoc($select_reviews)){
   ?>
       <h3>Chỉnh sửa đánh giá</h3>
      <p class="placeholder">Tiêu đề đánh giá <span>*</span></p>
      <input type="text" name="title" required maxlength="50" placeholder="Enter review title" class="box" value="<?= $fetch_review['title']; ?>">
      <p class="placeholder">Mô tả đánh giá</p>
      <textarea name="description" class="box" placeholder="Enter review description"><?= $fetch_review['description']; ?></textarea>
      <p class="placeholder">Điểm đánh giá <span>*</span></p>
      <select name="rating" class="box" required>
         <option value="<?= $fetch_review['rating']; ?>"><?= $fetch_review['rating']; ?></option>
         <option value="2">2</option>
         <option value="3">3</option>
         <option value="4">4</option>
         <option value="5">5</option>
      </select>
      <input type="submit" value="Cập nhật đánh giá" name="submit_update" class="submit-btn">
      <?php
       if ($fetch_review['product_id']) {
         $link = "detail_book.php?get_id=" . $fetch_review['product_id'];
      } else {
         $link = "detail_combo_book.php?get_id=" . $fetch_review['combo_id'];
      }
      echo '<a href="' . $link . '" id="myLink" class="submit-btn">Quay lại</a>';
      ?>
   </form>
   <?php
         }
      }else{
         echo '<p class="empty">something went wrong!</p>';
      }
   ?>
</section>

<!-- update review section ends -->

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