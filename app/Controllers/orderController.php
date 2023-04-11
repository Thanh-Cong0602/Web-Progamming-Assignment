<?php
include '../Models/OrderModel.php';
include '../../config/config.php';
session_start();
if(isset($_POST['order_btn'])){
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $method = $_POST['method'];
    $adress = $_POST['address'];
    $orderModel = new OderModel($conn);
    $message = $orderModel->addToOrder($name, $number, $email, $method, $adress);
    if($message == 'Your cart is empty' || $message == 'Order already placed!'){
        $_SESSION['warning_msg'] = $message;
    }
    else{
      $_SESSION['success_msg'] = $message;
    }
    header('Location: ../View/checkout.php');
}
?>