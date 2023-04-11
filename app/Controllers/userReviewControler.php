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
        $user_id = $_COOKIE['user_id'];
        $user = new User($conn);
        if($user->verify_review($get_id, $user_id) > 0) {
            $_SESSION['warning_msg'] = 'Đánh giá của bạn đã được thêm!';
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

?>
