<?php
class AdminModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }
    public function AddToProducts($name,  $price,  $author, $image,  $description, $supplier, $publiser)
    {
        $select_product_name = mysqli_query($this->conn, "SELECT name FROM `products` WHERE name = '$name'") or die('query failed');
        if (mysqli_num_rows($select_product_name) > 0) {
            return 'Sách đã tồn tại';
        } else {
            $product_id = create_unique_id();
            $add_product_query = mysqli_query($this->conn, "INSERT INTO `products`(product_id, name, author, price, image, description, supplier, publiser) VALUES('$product_id', '$name', '$author' ,'$price', '$image', '$description', '$supplier', '$publiser')") or die('query failed');
            return 'Sách đã được thêm vào danh mục';
        }
    }

}
?>