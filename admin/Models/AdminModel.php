<?php
class AdminModel
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function adminAddToProducts($name,  $price,  $author, $image,  $description, $supplier, $publiser)
    {
        $name = filter_var($name, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $author = filter_var($author, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $supplier = filter_var($supplier, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $publiser = filter_var($publiser, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $description = filter_var($description, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $price = filter_var($price, FILTER_SANITIZE_NUMBER_INT);

        $select_product_name = mysqli_query($this->conn, "SELECT name FROM `products` WHERE name = '$name'") or die('query failed');
        if (mysqli_num_rows($select_product_name) > 0) {
            return 'Sách đã tồn tại';
        } else {
            $product_id = create_unique_id();
            $add_product_query = mysqli_query($this->conn, "INSERT INTO `products`(product_id, name, author, price, image, description, supplier, publiser) VALUES('$product_id', '$name', '$author' ,'$price', '$image', '$description', '$supplier', '$publiser')") or die('query failed');
            return 'Sách đã được thêm vào danh mục';
        }
    }
    public function adminAddToComboProducts($combo_name, $price, $image_combo, $description, $description_detail, $image_1, $name_1, $description_1, $image_2, $name_2, $description_2, $image_3, $name_3, $description_3)
    {
        $combo_name = filter_var($combo_name, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $name_1 = filter_var($name_1, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $name_2 = filter_var($name_2, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $name_3 = filter_var($name_3, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $description = filter_var($description, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $description_1 = filter_var($description_1, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $description_2 = filter_var($description_2, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $description_3 = filter_var($description_3, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $price = filter_var($price, FILTER_SANITIZE_NUMBER_INT);
        $select_product_name = mysqli_query($this->conn, "SELECT combo_name FROM `combo_products` WHERE combo_name = '$combo_name'") or die('query failed');
        if (mysqli_num_rows($select_product_name) > 0) {
            return 'Combo sách đã tồn tại';
        } else {
            $combo_id = create_unique_number_id();
            $add_product_query = mysqli_query($this->conn, "INSERT INTO `combo_products`(combo_id,combo_name, price, image_combo , description, description_detail, image_1, name_1, description_1, image_2, name_2, description_2, image_3, name_3, description_3) VALUES('$combo_id','$combo_name', '$price', '$image_combo' , '$description', '$description_detail', '$image_1', '$name_1', '$description_1', '$image_2', '$name_2', '$description_2', '$image_3', '$name_3', '$description_3')") or die('query failed');
            return 'Combo sách đã được thêm vào';
        }
    }
    public function adminDeleteProducts($delete_id)
    {
        mysqli_query($this->conn, "DELETE FROM `products` WHERE product_id = '$delete_id'") or die('query failed');
        return 'Xóa sách khỏi danh mục thành công!';
    }
    public function adminDeleteUser($delete_id)
    {
        mysqli_query($this->conn, "DELETE FROM `users` WHERE user_id = '$delete_id'") or die('query failed');
        return 'Xóa người dùng khỏi danh mục thành công!';
    }
    public function adminDeleteRequest($delete_id)
    {
        mysqli_query($this->conn, "DELETE FROM `message` WHERE id = '$delete_id'") or die('query failed');
        return 'Xóa yêu cầu khỏi danh mục thành công!';
    }
    public function adminDeleteReview($delete_id)
    {
        mysqli_query($this->conn, "DELETE FROM `reviews` WHERE id = '$delete_id'") or die('query failed');
        return 'Xóa đánh giá khỏi danh mục thành công!';
    }
    public function adminDeleteComboProducts($delete_id)
    {
        mysqli_query($this->conn, "DELETE FROM `combo_products` WHERE combo_id = '$delete_id'") or die('query failed');
        return 'Xóa combo sách khỏi danh mục thành công!';
    }
    public function adminUpdateProfile($fullname, $username, $email, $phonenumber, $oldpass, $newpass, $confirmpass)
    {
        $user_id = $_SESSION['admin_id'];
        $select_user = mysqli_query($this->conn, "SELECT * FROM `users` WHERE user_id = '$user_id' LIMIT 1") or die('query failed');
        $fetch_user = mysqli_fetch_assoc($select_user);
        $fullname = filter_var($fullname, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $username = filter_var($username, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $phonenumber = filter_var($phonenumber, FILTER_SANITIZE_NUMBER_INT);
        if (!empty($fullname)) {
            mysqli_query($this->conn, "UPDATE `users` SET fullname = '$fullname' WHERE user_id = '$user_id'");
        }
        if (!empty($username)) {
            $verify_username = mysqli_query($this->conn, "SELECT * FROM `users` WHERE username = '$username'");
            if (mysqli_num_rows($verify_username) > 0) {
                return 'Username đã tồn tại!';
            } else {
                mysqli_query($this->conn, "UPDATE `users` SET username = '$username' WHERE user_id = '$user_id'");
            }
        }
        if (!empty($email)) {
            $verify_email = mysqli_query($this->conn, "SELECT * FROM `users` WHERE email = '$email'");
            if (mysqli_num_rows($verify_email) > 0) {
                return 'Email đã tồn tại!';
            } else {
                mysqli_query($this->conn,  "UPDATE `users` SET email = '$email' WHERE user_id = '$user_id'");
            }
        }
        if (!empty($phonenumber)) {
            mysqli_query($this->conn, "UPDATE `users` SET phonenumber = '$phonenumber' WHERE user_id = '$user_id'");
        }
        $image = $_FILES['image']['name'];
        $image = filter_var($image, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $image = mysqli_real_escape_string($this->conn, $image);
        $ext = pathinfo($image, PATHINFO_EXTENSION);
        $rename = create_unique_id() . '.' . $ext;
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = '../../public/images/' . $rename;
        if (!empty($image)) {
            if ($image_size > 2000000) {
                return 'Kích thước hình ảnh quá lớn!';
            } else {
                mysqli_query($this->conn,  "UPDATE `users` SET image = '$rename' WHERE user_id = '$user_id'");
                move_uploaded_file($image_tmp_name, $image_folder);
                if ($fetch_user['image'] != '') {
                    unlink('../../public/images/' . $fetch_user['image']);
                }
            }
        }

        $prev_pass = $fetch_user['password'];
        $oldpass = password_hash($_POST['oldpass'], PASSWORD_DEFAULT);
        $empty_old = password_verify('', $oldpass);
        $newpass = password_hash($_POST['newpass'], PASSWORD_DEFAULT);
        $empty_new = password_verify('', $newpass);
        if ($empty_old != 1) {
            $verify_old_pass = password_verify($_POST['oldpass'], $prev_pass);
            if ($verify_old_pass == 1) {
                if (password_verify($_POST['confirmpass'], $newpass)) {
                    if ($empty_new != 1) {
                        mysqli_query($this->conn, "UPDATE `users` SET password = '$newpass' WHERE user_id = '$user_id'");
                    } else {
                        return 'Vui lòng nhập mật khẩu mới!';
                    }
                } else {
                    return 'Xác nhận mật khẩu không khớp!';
                }
            } else {
                if ($_POST['oldpass'] == '') {
                    return 'Successfull Updated';
                } else  return 'Không đúng mật khẩu cũ!';
            }
        }
        return 'Cập nhật thông tin thành công!';
    }

    public function adminDetelePic()
    {
        $user_id = $_SESSION['admin_id'];
        $select_old_pic = mysqli_query($this->conn, "SELECT * FROM `users` WHERE user_id = '$user_id' LIMIT 1") or die('query failed');
        $fetch_old_pic = mysqli_fetch_assoc($select_old_pic);
        if ($fetch_old_pic['image'] == '') {
            return 'Image already deleted!';
        } else {
            mysqli_query($this->conn, "UPDATE `users` SET image = '' WHERE user_id = '$user_id'");
            if ($fetch_old_pic['image'] != '') {
                unlink('../../public/images/' . $fetch_old_pic['image']);
            }
            return 'Image deleted!';
        }
    }
    public function UpdateToProduct(
        $update_p_id,
        $update_name,
        $update_author,
        $update_price,
        $update_image,
        $update_description,
        $update_supplier,
        $update_publiser
    ) {
        $update_name = filter_var($update_name, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $update_author = filter_var($update_author, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        // $update_image = filter_var($update_image, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $update_price = filter_var($update_price, FILTER_SANITIZE_NUMBER_INT);
        $update_description = filter_var($update_description, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $update_supplier = filter_var($update_supplier, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $update_publiser = filter_var($update_publiser, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        mysqli_query($this->conn, "UPDATE `products` SET name = '$update_name', author = '$update_author' , price = '$update_price', image = '$update_image', description = '$update_description', supplier = '$update_supplier', publiser = '$update_publiser'  WHERE product_id = '$update_p_id'") or die('query failed');
        return 'Cập nhật sách thành công';
    }
    public function UpdateToComboProducts(
        $update_combo_id,
        $update_combo_name,
        $update_price,
        $update_image_combo,
        $update_description,
        $update_description_detail,
        $update_image_1,
        $update_name_1,
        $update_description_1,
        $update_image_2,
        $update_name_2,
        $update_description_2,
        $update_image_3,
        $update_name_3,
        $update_description_3
    ) {
        $update_combo_name = filter_var($update_combo_name, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        // $update_image_combo = filter_var($update_image_combo, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $update_description = filter_var($update_description, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $update_description_1 = filter_var($update_description_1, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $update_description_2 = filter_var($update_description_2, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $update_description_3 = filter_var($update_description_3, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $update_name_1 = filter_var($update_name_1, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $update_name_2 = filter_var($update_name_2, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $update_name_3 = filter_var($update_name_3, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $update_price = filter_var($update_price, FILTER_SANITIZE_NUMBER_INT);
        mysqli_query($this->conn, "UPDATE `combo_products` SET combo_name = '$update_combo_name', price = '$update_price', image_combo = '$update_image_combo', description = '$update_description', description_detail = '$update_description_detail',image_1 = '$update_image_1', name_1 = '$update_name_1', description_1 = '$update_description_1', image_2 = '$update_image_2', name_2 = '$update_name_2', description_2 = '$update_description_2', image_3 = '$update_image_3', name_3 = '$update_name_3', description_3 = '$update_description_3'  WHERE combo_id = '$update_combo_id'") or die('query failed');
        return 'Cập nhật combo sách thành công';
    }
    public function OrderToUpdate($order_update_id, $update_payment)
    {
        mysqli_query($this->conn, "UPDATE `orders` SET payment_status = '$update_payment' WHERE id = '$order_update_id'") or die('query failed');
        return "Cập nhật thành công";
    }
    public function deleteOrder($delete_id)
    {
        mysqli_query($this->conn, "DELETE FROM `orders` WHERE id = '$delete_id'") or die('query failed');
        return 'Đã xóa đơn hàng thành công!';
    }
    public function AddToAuthor($name, $image, $slogan, $information)
    {
        $name = mysqli_real_escape_string($this->conn, $_POST['name']);
        $select_author = mysqli_query($this->conn, "SELECT name FROM `authors` WHERE name = '$name'") or die('query failed');
        if (mysqli_num_rows($select_author) > 0) {
            return 'Tác giả đã tồn tại';
        } else {
            $id = create_unique_number_id();
            $add_author = mysqli_query($this->conn, "INSERT INTO `authors`(id,name, image, slogan, information ) VALUES('$id','$name', '$image', '$slogan', '$information')") or die('query failed');
            return 'Tác giả đã được thêm vào';
        }
    }
    public function UpdateToAuthor($update_id, $update_name, $update_image, $update_slogan, $update_information)
    {
        mysqli_query($this->conn, "UPDATE `authors` SET name = '$update_name', image = '$update_image' , slogan = '$update_slogan', information = '$update_information' WHERE id = '$update_id'") or die('query failed');
        return 'Cập nhật tác giả thành công';
    }
    public function adminDeleteAuthor($delete_id)
    {
        mysqli_query($this->conn, "DELETE FROM `authors` WHERE id = '$delete_id'") or die('query failed');
        return 'Xóa tác giả khỏi danh mục thành công!';
    }
}