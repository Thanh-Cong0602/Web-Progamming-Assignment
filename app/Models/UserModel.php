<?php
class User {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function loginUser($email, $password) {
        // $email = mysqli_real_escape_string($this->conn, $email);
        // $password = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        // $password = mysqli_real_escape_string($this->conn, md5($_POST['password']));
        $email = $_POST['email'];
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'];
        $select_users = mysqli_query($this->conn, "SELECT * FROM `users` WHERE email = '$email'") or die('query failed');
        if(mysqli_num_rows($select_users) > 0){
            $row = mysqli_fetch_assoc($select_users);
            if(password_verify($password, $row['password'])){
                if($row['user_type'] == 'admin'){
                    $_SESSION['admin_name'] = $row['fullname'];
                    $_SESSION['admin_email'] = $row['email'];
                    $_SESSION['admin_id'] = $row['user_id'];
                    return '../../admin/View/admin_page.php';  
                }
                elseif($row['user_type'] == 'user'){
                    setcookie('user_id', $row['user_id'], time() + 60*60*24*30, '/');
                    $_SESSION['user_name'] = $row['fullname'];
                    $_SESSION['user_email'] = $row['email'];
                    $_SESSION['user_id'] = $row['user_id'];
                    return '../View/home.php';
                }
            }
            else{
                return 'Mật khẩu không chính xác!';
            }
            
        } else {
            return 'Địa chỉ email không chính xác!';
        }
    }

    public function registerUser($fullname, $username, $email, $phonenumber, $password, $user_type) {
        $user_id = create_unique_id();
        $fullname = $_POST['fullname'];
        $fullname = filter_var($fullname, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $username = $_POST['username'];
        $username = filter_var($username, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $phonenumber = filter_var($phonenumber, FILTER_SANITIZE_NUMBER_INT);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $confirmpassword = $_POST['cpassword'];
        $user_type = $_POST['user_type'];
        $image = $_FILES['image']['name'];
        $image = filter_var($image, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $image = mysqli_real_escape_string($this->conn, $image);
        $ext = pathinfo($image, PATHINFO_EXTENSION);
        $rename = create_unique_id().'.'.$ext;
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = '../../public/images/'.$rename;
        if(strlen($username) < 6) {
            return 'Tên người dùng phải có ít nhất 6 ký tự';
        }
        if (strlen($phonenumber) != 10) {
            return 'Số điện thoại phải là 10 chữ số';
        }
        if (strlen($password) < 8) {
            return 'Mật khẩu phải có ít nhất 8 ký tự';
        }
        if (strlen($confirmpassword) < 8) {
            return 'Mật khẩu xác nhận phải có ít nhất 8 ký tự';
        }
        if (!preg_match("/\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $email)) {
            return 'Email không hợp lệ';
        }
        if(!empty($image)){
            if($image_size > 2000000){
                return 'Kích thước ảnh quá lớn!';
            }else{
                move_uploaded_file($image_tmp_name, $image_folder);
            }
        }else{
            $rename = '';
        }
        $select_users = mysqli_query($this->conn, "SELECT * FROM `users` WHERE email = '$email'") or die('query failed');
        if(mysqli_num_rows($select_users) > 0){
            return 'Người dùng đã tồn tại!';
         }else{
            if(!password_verify($confirmpassword, $password)){
               return 'Mật khẩu xác nhận không khớp!';
            }else{
               mysqli_query($this->conn, "INSERT INTO `users`(user_id, fullname, username, phonenumber, email, password, user_type, image) VALUES('$user_id',  '$fullname', '$username', '$phonenumber', '$email' ,'$password', '$user_type', '$rename')") or die('query failed');
               return 'Successfully!';
            }
         }
    }
    
    public function checkUserExits($email) {
        $select_users = mysqli_query($this->conn, "SELECT * FROM `users` WHERE email = '$email'") or die('query failed');
        if(mysqli_num_rows($select_users) > 0 ) {
            return true;
        }
        else return false;
    }

    public function verify_review($get_id, $user_id) {
        $verify_review = mysqli_query($this->conn, "SELECT * FROM `reviews` WHERE (product_id = '$get_id' OR combo_id = '$get_id') AND user_id = '$user_id'") or die('query failed');
        return mysqli_num_rows($verify_review);
    }

    public function userAddReview($post_id, $user_id, $rating, $title, $description) {
        $user_id = $_COOKIE['user_id'];
        // $review_id = create_unique_id();
        if($user_id != ''){
            $title = $_POST['title'];
            $description = $_POST['description'];
            $rating = $_POST['rating'];
            $mycheck = mysqli_query($this->conn, "SELECT * FROM products WHERE product_id = '$post_id'");
            if (mysqli_num_rows($mycheck) > 0) {
                $combo_id = null; // Set combo_id to null
                mysqli_query($this->conn, "INSERT INTO `reviews`(product_id , user_id, rating, title, description) VALUES('$post_id', '$user_id', '$rating', '$title', '$description')") or die('query failed');
                return 'Đã thêm đánh giá của bạn!';
            }
            else {
                $result = mysqli_query($this->conn, "SELECT * FROM combo_products WHERE combo_id = '$post_id'");
                if(mysqli_num_rows($result) > 0){
                    $product_id = null;
                    mysqli_query($this->conn, "INSERT INTO `reviews`(combo_id, user_id, rating, title, description) VALUES('$post_id', '$user_id', '$rating', '$title', '$description')") or die('query failed');

                    return 'Đã thêm đánh giá của bạn!';
                }
            }
            
            
        }
        else{
            return 'Vui lòng đăng nhập trước tiên!';
        }
    }

    public function userDeleteReview($delete_id){
        $delete_id = $_POST['delete_id'];
        $verify_delete = mysqli_query($this->conn, "SELECT * FROM `reviews` WHERE id = '$delete_id'") or die('query failed');
        if(mysqli_num_rows($verify_delete) > 0){
            $delete_review = mysqli_query($this->conn, "DELETE FROM  `reviews` WHERE id = '$delete_id'") or die('query failed');
            return 'Xóa bài đánh giá thành công!';
        }
        else{  
            $_SESSION['$warning_msg'] = 'Bài đánh giá đã được xóa!';
        }
    }
    public function userUpdateReview($rating, $title, $description, $review_id) {
        $title = $_POST['title'];
        $title = filter_var($title, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $description = $_POST['description'];
        $description = filter_var($description, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $rating = $_POST['rating'];
        $rating = filter_var($rating, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        mysqli_query($this->conn, "UPDATE `reviews` SET rating = $rating, title = '$title', description = '$description' WHERE id = '$review_id'") or die('query failed');
    }

    public function userUpdateProfile($fullname, $username, $email, $phonenumber, $oldpass, $newpass, $confirmpass) {
        $user_id = $_COOKIE['user_id'];
        $select_user = mysqli_query($this->conn, "SELECT * FROM `users` WHERE user_id = '$user_id' LIMIT 1") or die('query failed');
        $fetch_user = mysqli_fetch_assoc($select_user);
        $fullname = $_POST['fullname'];
        $fullname = filter_var($fullname, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $username = $_POST['username'];
        $username = filter_var($username, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = $_POST['email'];
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $phonenumber = $_POST['phonenumber'];
        $phonenumber = filter_var($phonenumber, FILTER_SANITIZE_NUMBER_INT);
        if(!empty($fullname)) {
            mysqli_query($this->conn, "UPDATE `users` SET fullname = '$fullname' WHERE user_id = '$user_id'");
        }
        if(!empty($username)){
            $verify_username = mysqli_query($this->conn, "SELECT * FROM `users` WHERE username = '$username'");
            if(mysqli_num_rows($verify_username) > 0){
                return 'Username đã tồn tại!';
            }
            else{
                mysqli_query($this->conn, "UPDATE `users` SET username = '$username' WHERE user_id = '$user_id'");
            }
        }
        if(!empty($email)){
            $verify_email = mysqli_query($this->conn, "SELECT * FROM `users` WHERE email = '$email'");
            if(mysqli_num_rows($verify_email) > 0){
                return 'Email đã tồn tại!';
            }
            else{
                mysqli_query($this->conn,  "UPDATE `users` SET email = '$email' WHERE user_id = '$user_id'");
            }
        }
        if(!empty($phonenumber)){
            mysqli_query($this->conn, "UPDATE `users` SET phonenumber = '$phonenumber' WHERE user_id = '$user_id'");
        }
        $image = $_FILES['image']['name'];
        $image = filter_var($image, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $ext = pathinfo($image, PATHINFO_EXTENSION);
        $rename = create_unique_id().'.'.$ext;
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = '../../public/images/'.$rename;
        if(!empty($image)){
            if($image_size > 2000000){
               return 'Kích thước hình ảnh quá lớn!';
            }
            else{
                mysqli_query($this->conn,  "UPDATE `users` SET image = '$rename' WHERE user_id = '$user_id'");
                move_uploaded_file($image_tmp_name, $image_folder);
                if($fetch_user['image'] != ''){
                    unlink('../../public/images/'.$fetch_user['image']);
                 }
            }
        }    

        $prev_pass = $fetch_user['password'];
        $oldpass = password_hash($_POST['oldpass'], PASSWORD_DEFAULT);
        $empty_old = password_verify('', $oldpass);
        $newpass = password_hash($_POST['newpass'], PASSWORD_DEFAULT);
        $empty_new = password_verify('', $newpass);
        if($empty_old != 1){
            $verify_old_pass = password_verify($_POST['oldpass'], $prev_pass);
            if($verify_old_pass == 1){
                if(password_verify($_POST['confirmpass'], $newpass)){
                    if($empty_new != 1){
                        mysqli_query($this->conn, "UPDATE `users` SET password = '$newpass' WHERE user_id = '$user_id'");
                    }else{
                        return 'Vui lòng nhập mật khẩu mới!';
                    }
                }else{
                    return 'Xác nhận mật khẩu không khớp!';
                }
            }else{
                if($_POST['oldpass'] == ''){
                    return 'Successfull Updated';
                }
                else  return 'Không đúng mật khẩu cũ!';
            }
        }
        return 'Cập nhật thông tin thành công!';
    }

    public function userSendMessage($name, $email, $username, $phonenumber, $message){
        $user_id = $_COOKIE['user_id'];
        $name = $_POST['name'];
        $image = filter_var($name, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = $_POST['email'];
        $username = $_POST['username'];
        $image = filter_var($username, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $phonenumber = $_POST['number'];
        $phonenumber = filter_var($phonenumber, FILTER_SANITIZE_NUMBER_INT);
        $msg = $_POST['message'];
        $msg = filter_var($username, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $id = create_unique_number_id();
        if($user_id != ''){
            mysqli_query($this->conn, "INSERT INTO `message`(id, user_id, name, username, email, phonenumber, message) VALUES( '$id' ,'$user_id', '$name', '$username', '$email', '$phonenumber', '$message')") or die('query failed');
            return 'Yêu cầu hỗ trợ thành công!';
        }
        else {
            return 'Vui lòng đăng nhập trước tiên!';
        }
    }
    public function userDetelePic(){
        $user_id = $_COOKIE['user_id'];
        $select_old_pic = mysqli_query($this->conn, "SELECT * FROM `users` WHERE user_id = '$user_id' LIMIT 1") or die('query failed');
        $fetch_old_pic = mysqli_fetch_assoc($select_old_pic);
        if($fetch_old_pic['image'] == ''){
            return 'Image already deleted!';
        }
        else{
            mysqli_query($this->conn, "UPDATE `users` SET image = '' WHERE user_id = '$user_id'");
            if($fetch_old_pic['image'] != ''){
                unlink('../../public/images/'.$fetch_old_pic['image']);
            }
        return 'Image deleted!';
        }
    }


}
