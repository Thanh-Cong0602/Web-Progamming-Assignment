<?php
include '../Models/AdminModel.php';
include '../../config/config.php';
session_start();
$adminmodel = new AdminModel($conn);

// UPDATE ORDER 
if (isset($_POST['update_order'])) {
    $order_update_id = $_POST['order_id'];
    $update_payment = $_POST['update_payment'];
    $message = $adminmodel->OrderToUpdate($order_update_id, $update_payment);
    if ($message == 'Cập nhật thành công') {
        $_SESSION['success_msg'] = $message;
        header('Location:../View/admin_order.php');
        exit;
    }
}
// DELETE ORDER 
if (isset($_POST['delete_order'])) {
    $order_id = $_POST['order_id'];
    $message = $adminmodel->deleteOrder($order_id);
    $_SESSION['success_msg'] = $message;
    header('location:../View/admin_order.php');
    exit;
}
