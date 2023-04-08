<?php
include '../Models/CartModel.php';
include '../../config/config.php';
session_start();
$cartModel = new CartModel($conn);
if (isset($_POST['add_to_cart'])) {
   $user_id = $_COOKIE['user_id'];
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];
   $message = $cartModel->addToCart($user_id, $product_name, $product_price, $product_image, $product_quantity);
   if ($message == 'already added to cart!') {
      $_SESSION['warning_msg'] = $message . $user_id;
   } else {
      $_SESSION['success_msg'] = $message;
   }
   $previous_page = $_SERVER['HTTP_REFERER'];
   if ($previous_page == '../View/home.php') {
      header('Location: ../View/home.php#product');
      exit;
   } else {
      header('Location: ../View/shop.php#product');
      exit;
   }
}
if(isset($_POST['update_cart'])){
   $cart_id = $_POST['cart_id'];
   $cart_quantity = $_POST['cart_quantity'];
   $message = $cartModel->updateCart($cart_id, $cart_quantity);
   $_SESSION['success_msg'] = $message;
   header('Location: ../View/shopping_cart.php#shopping-cart');
   exit;
}
?>