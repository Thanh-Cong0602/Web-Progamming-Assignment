<?php
    
class CartModel {
    private $conn;
 
    public function __construct($conn) {
        $this->conn = $conn;
    }
 
    public function addToCart($user_id, $product_name, $product_price, $product_image, $product_quantity) {
        $user_id = $_COOKIE['user_id'];
        $check_cart_numbers = mysqli_query($this->conn, "SELECT * FROM `cart` WHERE product_name = '$product_name' AND user_id = '$user_id'") or die('query failed');
        if(mysqli_num_rows($check_cart_numbers) > 0){
            return 'already added to cart!';
        }else{
            mysqli_query($this->conn, "INSERT INTO `cart`(user_id, product_name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
            return 'product added to cart!';
        }
    }   
    
    public function updateCart($cart_id, $cart_quantity){
        mysqli_query($this->conn, "UPDATE `cart` SET quantity = '$cart_quantity' WHERE id = '$cart_id'") or die('query failed');
        return 'Cart quantity updated!';
    }
 }
?>