<?php
$conn = mysqli_connect('localhost','root','','Database_BookStore') or die('connection failed');
mysqli_set_charset($conn, 'utf8mb4');
function create_unique_id(){
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $characters_lenght = strlen($characters);
    $random_string = '';
    for($i = 0; $i < 10; $i++){
       $random_string .= $characters[mt_rand(0, $characters_lenght - 1)];
    }
    return $random_string;
 }
if(isset($_COOKIE['user_id'])){
    $user_id = $_COOKIE['user_id'];
 }else{
    $user_id = '';
 }
?>
<!-- ALTER TABLE `reviews` ADD CONSTRAINT `fk_reviews_users` 
FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
 -->
 <!-- ALTER TABLE `orders` ADD CONSTRAINT `fk_order_users` 
FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
 -->
 <!-- ALTER TABLE `cart` ADD CONSTRAINT `fk_user_cart`
  FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
  ON DELETE CASCADE; 
 fk_reviews_users
 fk_user_review_product ////
 `fk_review_combo` ///
 ALTER TABLE `users` ADD PRIMARY KEY (`user_id`);
-->