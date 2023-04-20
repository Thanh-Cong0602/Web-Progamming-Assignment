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
    if ($message == 'Sách đã tồn tại'){
        $_SESSION['success_msg'] = $message;
    }
    else {
        $_SESSION['success_msg'] = $message;
    }
    header('Location: ../View/admin_product.php');
    }
?>
