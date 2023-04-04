<?php

include '../../config/config.php';
if(isset($_GET['get_id'])){
   $get_id = $_GET['get_id'];
}else{
   $get_id = '';
   header('location:home.php');
}
if(isset($_POST['submit_review'])){
   $user_id = $_COOKIE['user_id'];
   if($user_id != ''){
      $title = $_POST['title'];
      $title = filter_var($title, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $description = $_POST['description'];
      $description = filter_var($description, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $rating = $_POST['rating'];
      $rating = filter_var($rating, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $verify_review = mysqli_query($conn, "SELECT * FROM `reviews` WHERE post_id = $get_id AND user_id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($verify_review) > 0){
         $warning_msg[] = 'Your review already added!';
      }else{
         mysqli_query($conn, "INSERT INTO `reviews`(post_id, user_id, rating, title, description) VALUES('$get_id', '$user_id', '$rating', '$title', '$description')") or die('query failed');
         $success_msg[] = 'Review added!';
      }

   }else{
      $warning_msg[] = 'Please login first!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>add review</title>

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

   <form action="" method="post">
       <h3><?php echo $user_id?></h3>
      <p class="placeholder">Review Title <span>*</span></p>
      <input type="text" name="title" required maxlength="50" placeholder="Enter review title" class="box">
      <p class="placeholder">Review Description</p>
      <textarea name="description" class="box" placeholder="Enter review description" maxlength="1000" cols="30" rows="10"></textarea>
      <p class="placeholder">Review Rating <span>*</span></p>
      <select name="rating" class="box" required>
         <option value="1">1</option>
         <option value="2">2</option>
         <option value="3">3</option>
         <option value="4">4</option>
         <option value="5">5</option>
      </select>
      <input type="submit" value="Submit Review" name="submit_review" class="submit-btn">
      <a href="detail_book.php?get_id=<?= $get_id; ?>" class="submit-btn">Go Back</a>
   </form>

</section>

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