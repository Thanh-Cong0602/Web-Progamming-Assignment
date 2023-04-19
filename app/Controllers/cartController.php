<?php
include '../Models/CartModel.php';
include '../../config/config.php';
session_start();
$cartModel = new CartModel($conn);
if (isset($_POST['add_to_cart'])) {
   if($user_id == ''){
      $_SESSION['warning_msg'] = 'Vui lòng đăng nhập trước tiên!';
      header('Location: ../View/home.php');
   }
   $user_id = $_COOKIE['user_id'];
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];
   $product_id = $_POST['product_id'];
   $message = $cartModel->addToCart($user_id, $product_name, $product_price, $product_image, $product_quantity);
   if ($message == 'Sản phẩm đã có trong giỏ hàng!') {
      $_SESSION['warning_msg'] = $message;
   } else {
      $_SESSION['success_msg'] = $message;
   }
   if ($_POST['add_to_cart'] == 'Mua ngay') {
      header('Location: ../View/shopping_cart.php');
      exit;
   }
   if ($_POST['add_to_cart'] == 'Thêm vào giỏ hàng') {
      header("Location: ../View/detail_book.php?get_id=$product_id");
      exit;
   }
   if ($_POST['add_to_cart'] == 'Thêm combo vào giỏ hàng') {
      header("Location: ../View/detail_combo_book.php?get_id=$product_id");
      exit;
   }
   $previous_page = $_SERVER['HTTP_REFERER'];
   if ($previous_page == 'http://localhost:3000/app/View/home.php') {
      header('Location: http://localhost:3000/app/View/home.php#product');
      exit;
   } elseif($previous_page == 'http://localhost:3000/app/View/shop.php'){
      header('Location: http://localhost:3000/app/View/shop.php#product');
      exit;
   } elseif($previous_page == 'http://localhost:3000/app/View/products_combo.php'){
      header("Location: http://localhost:3000/app/View/products_combo.php");
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

if(isset($_POST['delete_cart'])){
   $delete_cart_id = $_POST['delete_cart_id'];
   $message = $cartModel->deleteCart($delete_cart_id);
   $_SESSION['success_msg'] = $message;
   header('Location: ../View/shopping_cart.php#shopping-cart');
   exit;
}
if(isset($_POST['delete_all_cart'])){
   $user_id = $_COOKIE['user_id'];
   $message = $cartModel->deleteAllCart($user_id);
   $_SESSION['success_msg'] = $message;
   header('Location: ../View/shopping_cart.php#shopping-cart');
   exit;
}
?>