<?php

class OderModel
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function addToOrder($name, $number, $email, $method, $address)
    {
        $user_id = $_COOKIE['user_id'];
        $placed_on = date('d-M-Y');
        $cart_total = 0;
        $cart_products[] = '';
        $cart_query = mysqli_query($this->conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
        if (mysqli_num_rows($cart_query) > 0) {
            while ($cart_item = mysqli_fetch_assoc($cart_query)) {
                $cart_products[] = $cart_item['product_name'] . ' (' . $cart_item['quantity'] . ') ';
                $sub_total = ($cart_item['price'] * $cart_item['quantity']);
                $cart_total += $sub_total;
            }
        }
        $total_products = implode(', ', $cart_products);
        $order_query = mysqli_query($this->conn, "SELECT * FROM `orders` WHERE name = '$name' AND number = '$number' AND email = '$email' AND method = '$method' AND address = '$address' AND total_products = '$total_products' AND total_price = '$cart_total'") or die('query failed');
        if ($cart_total == 0) {
            return 'Your cart is empty';
        } else {
            if (mysqli_num_rows($order_query) > 0) {
                return 'Order already placed!';
            } else {
                mysqli_query($this->conn, "INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price, placed_on) VALUES('$user_id', '$name', '$number', '$email', '$method', '$address', '$total_products', '$cart_total', '$placed_on')") or die('query failed');
                mysqli_query($this->conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
                return 'Order placed successfully!';
            }
        }
    }
}
