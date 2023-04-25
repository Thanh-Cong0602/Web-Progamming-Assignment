<?php
include '../Models/AdminModel.php';
include '../../config/config.php';
session_start();
$adminmodel = new AdminModel($conn);

// DELETE USER
if (isset($_POST['delete_user'])) {
    $user_id = $_POST['user_id'];
    $message = $adminmodel->adminDeleteUser($user_id);
    $_SESSION['success_msg'] = $message;
    header('location:../View/admin_user.php');
    exit;
}

// DELETE REQUEST
if (isset($_POST['delete_request'])) {
    $request_id = $_POST['request_id'];
    $message = $adminmodel->adminDeleteRequest($request_id);
    $_SESSION['success_msg'] = $message;
    header('location:../View/admin_request.php');
    exit;
}

// DELETE REVIEW
if (isset($_POST['delete_review'])) {
    $review_id = $_POST['review_id'];
    $message = $adminmodel->admindeleteReview($review_id);
    $_SESSION['success_msg'] = $message;
    header('location:../View/admin_review.php');
    exit;
}
