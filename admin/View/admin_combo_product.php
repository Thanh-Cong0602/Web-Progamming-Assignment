<?php 
include '../../config/config.php';
if (isset($_POST['add_product'])) {
    $combo_name = mysqli_real_escape_string($conn, $_POST['combo_name']);
    $price = $_POST['price'];
    $image_combo = $_POST['image_combo'];
    $description = $_POST['description'];
    $description_detail = $_POST['description_detail'];
    $image_1 = $_POST['image_1'];
    $name_1 = $_POST['name_1'];
    $description_1 = $_POST['description_1'];
    $image_2 = $_POST['image_2'];
    $name_2 = $_POST['name_2'];
    $description_2 = $_POST['description_2'];
    $image_3 = $_POST['image_3'];
    $name_3 = $_POST['name_3'];
    $description_3 = $_POST['description_3'];
    
    $select_product_name = mysqli_query($conn, "SELECT combo_name FROM `combo_products` WHERE combo_name = '$combo_name'") or die('query failed');
    if (mysqli_num_rows($select_product_name) > 0) {
        $message[] = 'Sách đã tồn tại';
    } else {
        $combo_id = create_unique_id();
        $add_product_query = mysqli_query($conn, "INSERT INTO `combo_products`(combo_name, price, image_combo , description, description_detail, image_1, name_1, description_1, image_2, name_2, description_2, image_3, name_3, description_3) VALUES('$combo_name', '$price', '$image_combo' , '$description', '$description_detail', '$image_1', '$name_1', '$description_1', '$image_2', '$name_2', '$description_2', '$image_3', '$name_3', '$description_3')") or die('query failed');
        $message[] = 'Đã thêm xong combo sách';
    }
}
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `combo_products` WHERE combo_id = '$delete_id'") or die('query failed');
    header('location:admin_combo_product.php');
}


if (isset($_POST['update_product'])) {
    $update_combo_id = $_POST['update_combo_id'];
    $update_combo_name = $_POST['update_combo_name'];
    $update_price = $_POST['update_price'];
    $update_image_combo = $_POST['update_image_combo'];
    $update_description = $_POST['update_description'];
    $update_description_detail = $_POST['update_description_detail'];
    $update_image_1 = $_POST['update_image_1'];
    $update_name_1 = $_POST['update_name_1'];
    $update_description_1 = $_POST['update_description_1'];
    $update_image_2 = $_POST['update_image_2'];
    $update_name_2 = $_POST['update_name_2'];
    $update_description_2 = $_POST['update_description_2'];
    $update_image_3 = $_POST['update_image_3'];
    $update_name_3 = $_POST['update_name_3'];
    $update_description_3 = $_POST['update_description_3'];
    mysqli_query($conn, "UPDATE `combo_products` SET combo_name = '$update_combo_name', price = '$update_price', image_combo = '$update_image_combo', description = '$update_description', description_detail = '$update_description_detail',image_1 = '$image_1', name_1 = '$update_name_1', description_1 = '$update_description_1', image_2 = '$image_2', name_2 = '$update_name_2', description_2 = '$update_description_2', image_3 = '$image_3', name_3 = '$update_name_3', description_3 = '$update_description_3'  WHERE combo_id = '$update_combo_id'") or die('query failed');
    header('location:admin_combo_product.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý combo sách</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../../public/css/admin.css">

</head>
<body>
    <?php include 'admin_header.php'; ?>
    <section class="add-products">
        <h1 class="title">TẤT CẢ COMBO</h1>
        <form action="" method="post">
            <h3>Thêm combo</h3>
            <input type="text" name="combo_name" class="box" placeholder="Nhập tên Combo" required>
            <input type="number" min="0" name="price" class="box" placeholder="Nhập giá" required>
            <input type="text" name="image_combo" class="box" placeholder="Nhập ảnh của combo" required>
            <textarea name="description" class="description" placeholder="Nhập mô tả về combo" cols="30" rows="5"></textarea>
            <textarea name="description_detail" class="description" placeholder="Nhập mô tả chi tiết cho combo" cols="30" rows="5"></textarea>
            <input type="text" name="name_1" class="box" placeholder="Nhập tên sách 1" required>
            <input type="text" name="image_1" class="box" placeholder="Nhập url cho sách 1" required>
            <textarea name="description_1" class="description" placeholder="Nhập mô tả về sách 1" cols="30" rows="5"></textarea>
            <input type="text" name="name_2" class="box" placeholder="Nhập tên sách 2" required>
            <input type="text" name="image_2" class="box" placeholder="Nhập url cho sách 2" required>
            <textarea name="description_2" class="description" placeholder="Nhập mô tả về sách 2" cols="30" rows="5"></textarea>
            <input type="text" name="name_3" class="box" placeholder="Nhập tên sách 3" >
            <input type="text" name="image_3" class="box" placeholder="Nhập url cho sách 3" >
            <textarea name="description_3" class="description" placeholder="Nhập mô tả về sách 3" cols="30" rows="5"></textarea>
            <input type="submit" value="Thêm combo" name="add_product" class="btn">
        </form>



    </section>

    <section class="show-products">
        <div class="box-container">
            <?php
            $select_products = mysqli_query($conn, "SELECT * FROM `combo_products`") or die('query failed');
            if (mysqli_num_rows($select_products) > 0) {
                while ($fetch_products = mysqli_fetch_assoc($select_products)) {
                    ?>
                    <div class="box">
                        <img src="<?php echo $fetch_products['image_combo']; ?>" alt="">
                        <div class="name" style="height: 15vh;">
                            <?php echo $fetch_products['combo_name']; ?>
                        </div>
                        <div class="price"> 
                            <?php echo $fetch_products['price']; ?> ₫
                        </div>
                        <a href="./admin_detail_combo.php?id=<?php echo $fetch_products['combo_id']?>" class="detail_book">Xem thêm <i class="fas fa-angle-right"></i></a> <br>

                        <a href="admin_combo_product.php?update=<?php echo $fetch_products['combo_id']; ?>" class="option-btn">Cập nhật</a>
                        <a href="admin_combo_product.php?delete=<?php echo $fetch_products['combo_id']; ?>" class="delete-btn"
                            onclick="return confirm('Xóa quyển sách này?');">Xóa</a>
                    </div>
                    <?php
                }
            } else {
                echo '<p class="empty">Không có combo nào tại đây</p>';
            }
            ?>
        </div>
    </section>

    <section class="edit-product-form">
        <?php
        if (isset($_GET['update'])) {
            $update_id = $_GET['update'];
            $update_query = mysqli_query($conn, "SELECT * FROM `combo_products` WHERE combo_id = '$update_id'") or die('query failed');
            if (mysqli_num_rows($update_query) > 0) {
                while ($fetch_update = mysqli_fetch_assoc($update_query)) {
                    ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <h1>Cập nhật combo sách</h1>
                        <input type="hidden" name="update_combo_id" value="<?php echo $fetch_update['combo_id']; ?>">
                        <input type="text" name="update_combo_name" value="<?php echo $fetch_update['combo_name']; ?>" class="box" required
                            placeholder="Nhập tên combo sách cần cập nhật">
                        <input type="number" name="update_price" value="<?php echo $fetch_update['price']; ?>" min="0" class="box"
                            required placeholder="Nhập giá combo sách cần cập nhật">
                        <input type="text" class="box" name="update_image_combo" value="<?php echo $fetch_update['image_combo']; ?>" placeholder="Nhập url ảnh sách cần cập nhật">
                        <textarea name="update_description" class="box" cols="30" rows="3" style="width: 100%"><?php echo $fetch_update['description']; ?></textarea>
                        <textarea name="update_description_detail" class="box" cols="30" rows="5" style="width: 100%"><?php echo $fetch_update['description_detail']; ?></textarea>
                        <input type="text" name="update_name_1" value="<?php echo $fetch_update['name_1']; ?>" class="box" required placeholder="Nhập tên sách 1 cần cập nhật">
                        <input type="text" class="box" name="update_image_1" value="<?php echo $fetch_update['image_1']; ?>" placeholder="Nhập url ảnh sách 1 cần cập nhật">
                        <textarea name="update_description_1" class="box" cols="30" rows="3" style="width: 100%"><?php echo $fetch_update['description_1']; ?></textarea>
                        <input type="text" name="update_name_2" value="<?php echo $fetch_update['name_2']; ?>" class="box"  placeholder="Nhập tên sách 1 cần cập nhật">
                        <input type="text" class="box" name="update_image_2" value="<?php echo $fetch_update['image_2']; ?>" placeholder="Nhập url ảnh sách 1 cần cập nhật">
                        <textarea name="update_description_2" class="box" cols="30" rows="3" style="width: 100%"><?php echo $fetch_update['description_2']; ?></textarea>
                        <input type="text" name="update_name_3" value="<?php echo $fetch_update['name_3']; ?>" class="box" placeholder="Nhập tên sách 1 cần cập nhật">
                        <input type="text" class="box" name="update_image_3" value="<?php echo $fetch_update['image_3']; ?>" placeholder="Nhập url ảnh sách 1 cần cập nhật">
                        <textarea name="update_description_3" class="box" cols="30" rows="3" style="width: 100%"><?php echo $fetch_update['description_3']; ?></textarea>
                        <input type="submit" value="Lưu" name="update_product" class="btn">
                        <input type="reset" value="Reset" id="close-update" class="option-btn">
                    </form>
                    <?php
                }
            }
        } else {
            echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';
        }
        ?>

    </section>

    
</body>
</html>