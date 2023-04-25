<?php
include '../Models/AdminModel.php';
include '../../config/config.php';
session_start();
$adminmodel = new AdminModel($conn);

// ADD AUTHOR
if (isset($_POST['add_author'])) {
    $name = $_POST['name'];
    $image = $_POST['image'];
    $slogan = $_POST['slogan'];
    $information = $_POST['information'];
    $message = $adminmodel->AddToAuthor($name, $image, $slogan, $information);
    if ($message == 'Tác giả đã tồn tại') {
        $_SESSION['success_msg'] = $message;
        header('Location: ../View/admin_author.php');
        exit;
    } else {
        $_SESSION['success_msg'] = $message;
        header('Location: ../View/admin_author.php');
        exit;
    }
}
// UPDATE AUTHOR
if (isset($_POST['update_author'])) {
    $update_id = $_POST['update_id'];
    $update_name = $_POST['update_name'];
    $update_image = $_POST['update_image'];
    $update_slogan = $_POST['update_slogan'];
    $update_information = $_POST['update_information'];
    $message = $adminmodel->UpdateToAuthor($update_id, $update_name, $update_image, $update_slogan, $update_information);
    if ($message == 'Cập nhật tác giả thành công') {
        $_SESSION['success_msg'] = $message;
        header('Location:../View/admin_author.php');
        exit;
    }
}
// DELETE AUTHOR
if (isset($_POST['delete_author'])) {
    $author_id = $_POST['author_id'];
    $message = $adminmodel->adminDeleteAuthor($author_id);
    $_SESSION['success_msg'] = $message;
    header('location:../View/admin_author.php');
    exit;
}
// RESET 
if (isset($_POST['reset_author'])) {
    $author_id = $_POST['update_id'];
    header("Location: ../View/admin_author.php?update=$author_id");
    exit;
}
