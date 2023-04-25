<?php
    include '../Models/UserModel.php';
    include '../../config/config.php';
    session_start();
    if(isset($_POST['submit_review'])){
        if(isset($_GET['get_id'])){
            $get_id = $_GET['get_id'];
         }else{
            $get_id = '';
            header('location:home.php');
        }
        echo $get_id;
        $user_id = $_COOKIE['user_id'];
        $title = $_POST['title'];
        $rating = $_POST['rating'];
        $description = $_POST['description'];
        $user = new User($conn);
        if($user->verify_review($get_id, $user_id) > 0) {
            $_SESSION['warning_msg'] = 'Đánh giá của bạn đã tồn tại!';
        }
        else {
            $result = $user->userAddReview($get_id, $user_id, $rating, $title, $description);
            if ($result == 'Đã thêm đánh giá của bạn!'){
                $_SESSION['success_msg'] = $result;  
            }
            else{
                $_SESSION['warning_msg'] = $result;
            }
        }
        header('Location: ../View/add_review.php?get_id=' . $get_id);
    }
    if(isset($_POST['delete_review'])){
        $product_id = $_POST['product_id'];
        $delete_id = $_POST['delete_id'];
        $user = new User($conn);
        $message = $user->userDeleteReview($delete_id);
        if ($message == 'Xóa bài đánh giá thành công!'){
            $_SESSION['success_msg'] = 'Xóa bài đánh giá thành công!';  
        }
        else{
            $_SESSION['warning_msg'] = 'Bài đánh giá đã được xóa!';  
        }
        header('Location: ../View/detail_book.php?get_id=' . $product_id);
    }
    if(isset($_POST['submit_update'])){
        if(isset($_GET['get_id'])){
            $get_id = $_GET['get_id'];
         }else{
            $get_id = '';
            header('location:home.php');
        }
        $rating = $_POST['rating'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $user = new User($conn);
        $user->userUpdateReview($rating, $title, $description, $get_id);
        $_SESSION['success_msg'] = 'Cập nhật đánh giá thành công!';  
        header('Location: ../View/update_review.php?get_id=' . $get_id);
    }
?>
