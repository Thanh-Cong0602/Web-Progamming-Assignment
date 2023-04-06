<?php
    include '../Models/UserModel.php';
    include '../../config/config.php';
    session_start();
    if(isset($_POST['submit'])){
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];
        $oldpass = $_POST['oldpass'];
        $newpass = $_POST['newpass'];
        $confirmpass = $_POST['confirmpass'];
        $user = new User($conn);
        $message = $user->userUpdateProfile($fullname, $username, $email, $phonenumber, $oldpass, $newpass, $confirmpass);
        if( $message == 'Email already taken!' || 
            $message == 'Image size is too large' || 
            $message == 'Please enter new password!' || 
            $message == 'Confirm password not matched!' || 
            $message == 'Old password not matched!'){
            $_SESSION['warning_msg'] = $message;  
        }
        else {
            $_SESSION['success_msg'] = $message;
        }
        header('Location: ../View/update_profile.php');   
    }
    
    if(isset($_POST['delete_image'])){
        $user = new User($conn);
        $message = $user->userDetelePic();
        if($message == 'Image already deleted!'){
            $_SESSION['warning_msg'] = $message; 
        }
        else{
            $_SESSION['success_msg'] = $message;
        }
        header('Location: ../View/update_profile.php');   
    }
?>