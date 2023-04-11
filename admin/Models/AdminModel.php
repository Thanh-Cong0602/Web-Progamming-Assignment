<?php
class AdminModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }
    public function AddToProducts($name,  $price,  $author, $image,  $description, $supplier, $publiser)
    {
        $select_product_name = mysqli_query($this->conn, "SELECT name FROM `products` WHERE name = '$name'") or die('query failed');
        if (mysqli_num_rows($select_product_name) > 0) {
            return 'Sách đã tồn tại';
        } else {
            $product_id = create_unique_id();
            $add_product_query = mysqli_query($this->conn, "INSERT INTO `products`(product_id, name, author, price, image, description, supplier, publiser) VALUES('$product_id', '$name', '$author' ,'$price', '$image', '$description', '$supplier', '$publiser')") or die('query failed');
            return 'Sách đã được thêm vào danh mục';
        }
    }

    public function adminUpdateProfile($fullname, $username, $email, $phonenumber, $oldpass, $newpass, $confirmpass) {
        $user_id = $_SESSION['admin_id'];
        $select_user = mysqli_query($this->conn, "SELECT * FROM `users` WHERE user_id = '$user_id' LIMIT 1") or die('query failed');
        $fetch_user = mysqli_fetch_assoc($select_user);
        $fullname = filter_var($fullname, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $username = filter_var($username, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
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
        $image = mysqli_real_escape_string($this->conn, $image);
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

    public function adminDetelePic(){
        $user_id = $_SESSION['admin_id'];
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
?>