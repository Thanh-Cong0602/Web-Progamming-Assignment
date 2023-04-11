<?php
    include '../Models/UserModel.php';
    include '../../config/config.php';
    session_start();
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
        $_SESSION['success_msg'] = 'Review updated!';  
        header('Location: ../View/update_review.php?get_id=' . $get_id);
    }
?>
