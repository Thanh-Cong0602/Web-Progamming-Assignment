<?php
session_start(); // bắt đầu session để lưu trữ thông tin giỏ hàng
if(isset($_POST['add_to_cart'])) { // kiểm tra nút "Thêm vào giỏ hàng" được nhấn
    $product_id = $_POST['product_id']; // lấy mã sản phẩm được chọn
    $product_name = $_POST['product_name']; // lấy tên sản phẩm được chọn
    $product_price = $_POST['product_price']; // lấy giá sản phẩm được chọn
    $product_qty = $_POST['product_qty']; // lấy số lượng sản phẩm được chọn
    $item_array = array(
        'product_id' => $product_id,
        'product_name' => $product_name,
        'product_price' => $product_price,
        'product_qty' => $product_qty
    ); // tạo một mảng chứa thông tin sản phẩm
    if(!isset($_SESSION['cart_items'])) { // nếu giỏ hàng trống
        $_SESSION['cart_items'] = array($item_array); // thêm mảng sản phẩm vào giỏ hàng
    } else {
        $cart_items = $_SESSION['cart_items']; // lấy các sản phẩm đã có trong giỏ hàng
        $product_ids = array_column($cart_items, 'product_id'); // lấy các mã sản phẩm đã có trong giỏ hàng
        if(in_array($product_id, $product_ids)) { // nếu sản phẩm đã có trong giỏ hàng
            foreach($cart_items as $key => $value) {
                if($value['product_id'] == $product_id) {
                    $cart_items[$key]['product_qty'] += $product_qty; // cập nhật số lượng sản phẩm trong giỏ hàng
                }
            }
        } else { // nếu sản phẩm chưa có trong giỏ hàng
            array_push($cart_items, $item_array); // thêm sản phẩm vào giỏ hàng
        }
        $_SESSION['cart_items'] = $cart_items; // cập nhật giỏ hàng
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>
<body>
    
</body>
</html>