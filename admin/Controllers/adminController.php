<?php
include '../Models/AdminModel.php';
include '../../config/config.php';
session_start();
if (isset($_POST['add_product'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = $_POST['price'];
    $author = $_POST['author'];
    $image = $_POST['image'];
    $description = $_POST['description'];
    $supplier = $_POST['supplier'];
    $publiser = $_POST['publiser'];
    $cartModel = new AdminModel($conn);
    $message = $cartModel->AddToProducts($name,  $price,  $author, $image,  $description, $supplier, $publiser);
    if ($message == 'Sách đã tồn tại') {
        $_SESSION['success_msg'] = $message;
        header('Location: ../View/admin_product.php');
        exit;
    } else {
        $_SESSION['success_msg'] = $message;
        header('Location: ../View/admin_product.php');
        exit;
    }
}

if (isset($_POST['update_product'])) {
    $update_p_id = $_POST['update_p_id'];
    $update_name = $_POST['update_name'];
    $update_author = $_POST['update_author'];
    $update_price = $_POST['update_price'];
    $update_image = $_POST['update_image'];
    $update_description = $_POST['update_description'];
    $update_supplier = $_POST['update_supplier'];
    $update_publiser = $_POST['update_publiser'];
    $update_model = new AdminModel($conn);
    $message = $update_model->UpdateToProduct(
        $update_p_id,
        $update_name,
        $update_author,
        $update_price,
        $update_image,
        $update_description,
        $update_supplier,
        $update_publiser
    );
    if ($message == 'Cập nhật thành công') {
        $_SESSION['success_msg'] = $message;
        header('Location:../View/admin_product.php');
        exit;
    }
}
if (isset($_POST['update_order'])) {
    $order_update_id = $_POST['order_id'];
    $update_payment = $_POST['update_payment'];
    $order_update = new AdminModel($conn);
    $message = $order_update->OrderToUpdate($order_update_id, $update_payment);
    if ($message == 'Cập nhật thành công') {
        $_SESSION['success_msg'] = $message;
        header('Location:../View/admin_order.php');
        exit;
    }
}
