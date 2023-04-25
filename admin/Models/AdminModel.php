<?php
class AdminModel
{
    private $conn;

    public function __construct($conn)
    {
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
    public function UpdateToProduct(
        $update_p_id,
        $update_name,
        $update_author,
        $update_price,
        $update_image,
        $update_description,
        $update_supplier,
        $update_publiser
    ) {
        mysqli_query($this->conn, "UPDATE `products` SET name = '$update_name', author = '$update_author' , price = '$update_price', image = '$update_image', description = '$update_description', supplier = '$update_supplier', publiser = '$update_publiser'  WHERE product_id = '$update_p_id'") or die('query failed');
        return 'Cập nhật thành công';
    }
    public function OrderToUpdate($order_update_id, $update_payment)
    {
        mysqli_query($this->conn, "UPDATE `orders` SET payment_status = '$update_payment' WHERE user_id = '$order_update_id'") or die('query failed');
        return "Cập nhật thành công";
    }
}
