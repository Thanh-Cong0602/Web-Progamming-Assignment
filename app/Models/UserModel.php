<?php
class User {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function loginUser($email, $password) {
        $email = mysqli_real_escape_string($this->conn, $email);
        $password = mysqli_real_escape_string($this->conn, md5($password));

        $select_users = mysqli_query($this->conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$password'") or die('query failed');

        if(mysqli_num_rows($select_users) > 0){
            $row = mysqli_fetch_assoc($select_users);

            if($row['user_type'] == 'admin'){
                $_SESSION['admin_name'] = $row['name'];
                $_SESSION['admin_email'] = $row['email'];
                $_SESSION['admin_id'] = $row['id'];
                return '../View/admin_page.php';
            }
            elseif($row['user_type'] == 'user'){
                $_SESSION['user_name'] = $row['name'];
                $_SESSION['user_email'] = $row['email'];
                $_SESSION['user_id'] = $row['id'];
                return '../View/home.php';
            }
        } else {
            return 'error';
        }
    }

    public function registerUser($fullname, $username, $email, $phonenumber, $password, $user_type) {
        $fullname = mysqli_real_escape_string($this->conn, $fullname);
        $username = mysqli_real_escape_string($this->conn, $user_type);
        $phonenumber = mysqli_real_escape_string($this->conn, $phonenumber);
        $email = mysqli_real_escape_string($this->conn, $email);
        $password = mysqli_real_escape_string($this->conn, md5($_POST['password']));
        $confirmpassword = mysqli_real_escape_string($this->conn, md5($_POST['cpassword']));
        $select_users = mysqli_query($this->conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$password'") or die('query failed');
        if(mysqli_num_rows($select_users) > 0){
            return 'Người dùng đã tồn tại!';
         }else{
            if($password != $confirmpassword){
               return 'Mật khẩu xác nhận không khớp';
            }else{
               mysqli_query($this->conn, "INSERT INTO `users`(fullname, username, phonenumber, email, password, user_type) VALUES('$fullname', '$username', '$phonenumber', '$email' ,'$confirmpassword', '$user_type')") or die('query failed');
               return 'Successfully!';
            }
         }
    }
    
}
