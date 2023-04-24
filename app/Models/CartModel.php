<?php
    
class CartModel {
    private $conn;
 
    public function __construct($conn) {
        $this->conn = $conn;
    }
 
    public function addToCart($user_id, $product_name, $product_price, $product_image, $product_quantity) {
        $id = create_unique_number_id();
        $user_id = $_COOKIE['user_id'];
        $check_cart_numbers = mysqli_query($this->conn, "SELECT * FROM `cart` WHERE product_name = '$product_name' AND user_id = '$user_id'") or die('query failed');
        if(mysqli_num_rows($check_cart_numbers) > 0){
            return 'Sản phẩm đã có trong giỏ hàng!';
        }else{
            mysqli_query($this->conn, "INSERT INTO `cart`(id, user_id, product_name, price, quantity, image) VALUES('$id', '$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
            return 'Sản phẩm đã được thêm vào giỏ hàng!';
        }
    }   
    
    public function updateCart($cart_id, $cart_quantity){
        mysqli_query($this->conn, "UPDATE `cart` SET quantity = '$cart_quantity' WHERE id = '$cart_id'") or die('query failed');
        return 'Cart quantity updated!';
    }
    public function deleteCart($delete_cart_id){
        mysqli_query($this->conn, "DELETE FROM `cart` WHERE id = '$delete_cart_id'") or die('query failed');
        return 'Deleted cart successfully!';
    }
    public function deleteAllCart($user_id){
        mysqli_query($this->conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
        return 'Deleted all cart successfully!';
    }
 }
?>