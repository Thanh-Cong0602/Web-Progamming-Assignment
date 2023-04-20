<?php

include '../../config/config.php';

session_start();

// $admin_id = $_SESSION['admin_id'];

// if (!isset($admin_id)) {
//     header('location:login.php');
// }
// ;



if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `products` WHERE product_id = '$delete_id'") or die('query failed');
    header('location:admin_product.php');
}

if (isset($_POST['update_product'])) {
    $update_p_id = $_POST['update_p_id'];
    $update_name = $_POST['update_name'];
    $update_author = $_POST['update_author'];
    $update_price = $_POST['update_price'];
    $update_image = $_POST['update_image'];
    $update_description = $_POST['update_description'];
    $update_supplier = $_POST['update_supplier'];
    $update_publiser = $_POST['update_publiser'];



    mysqli_query($conn, "UPDATE `products` SET name = '$update_name', author = '$update_author' , price = '$update_price', image = '$update_image', description = '$update_description', supplier = '$update_supplier', publiser = '$update_publiser'  WHERE product_id = '$update_p_id'") or die('query failed');
    header('location:admin_product.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý thêm, sửa, xóa sách</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../../public/css/admin.css">

</head>

<body>

    <?php include 'admin_header.php'; ?>

    <section class="add-products">

        <h1 class="title">TẤT CẢ SÁCH</h1>

        <form action="../Controllers/adminProductController.php" method="post">
            <h3>Thêm sách</h3>
            <input type="text" name="name" class="box" placeholder="Nhập tên sách" required>
            <input type="text" min="0" name="author" class="box" placeholder="Nhập tên tác giả" required>
            <input type="number" min="0" name="price" class="box" placeholder="Nhập giá" required>
            <input type="text" name="image" class="box" placeholder="Nhập url ảnh" required>
            <input type="text" name="supplier" class="box" placeholder="Nhập nhà cung cấp" required>
            <input type="text" name="publiser" class="box" placeholder="Nhập nhà xuất bản" required>
            <textarea name="description" class="description" placeholder="Nhập mô tả về sách" cols="30" rows="5"></textarea>
            <input type="submit" value="add product" name="add_product" class="btn">
        </form>

    </section>

    <section class="show-products">
        <div class="box-container">
            <?php
            $select_products = mysqli_query($conn, "SELECT * FROM `products` ORDER BY `date` ASC") or die('query failed');
            if (mysqli_num_rows($select_products) > 0) {
                while ($fetch_products = mysqli_fetch_assoc($select_products)) {
                    ?>
                    <div class="box">
                        <img src="<?php echo $fetch_products['image']; ?>" alt="">
                        <div class="name">
                            <?php echo $fetch_products['name']; ?>
                        </div>
                        <div class="author">
                            <?php echo $fetch_products['author']; ?>
                        </div>
                        <div class="price">$
                            <?php echo $fetch_products['price']; ?>
                        </div>
                        <a href="./admin_view_detail.php?id=<?php echo $fetch_products['product_id']?>" class="detail_book">Xem thêm <i class="fas fa-angle-right"></i></a> <br>
                        <a href="admin_product.php?update=<?php echo $fetch_products['product_id']; ?>" class="option-btn">Cập nhật</a>
                        <a href="admin_product.php?delete=<?php echo $fetch_products['product_id']; ?>" class="delete-btn"
                            onclick="return confirm('Xóa quyển sách này?');">Xóa</a>
                    </div>
                    <?php
                }
            } else {
                echo '<p class="empty">Không có sản phẩm nào tại đây</p>';
            }
            ?>
        </div>
    </section>


    <section class="edit-product-form">
        <?php
        if (isset($_GET['update'])) {
            $update_id = $_GET['update'];
            $update_query = mysqli_query($conn, "SELECT * FROM `products` WHERE product_id = '$update_id'") or die('query failed');
            if (mysqli_num_rows($update_query) > 0) {
                while ($fetch_update = mysqli_fetch_assoc($update_query)) {
                    ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="update_p_id" value="<?php echo $fetch_update['product_id']; ?>">
                        <input type="text" name="update_name" value="<?php echo $fetch_update['name']; ?>" class="box" required
                            placeholder="Nhập tên sách cần cập nhật">
                        <input type="text" name="update_author" value="<?php echo $fetch_update['author']; ?>" class="box" required
                            placeholder="Nhập tên tác gải cần cập nhật">
                        <input type="number" name="update_price" value="<?php echo $fetch_update['price']; ?>" min="0" class="box"
                            required placeholder="Nhập giá sách cần cập nhật">
                        <input type="text" class="box" name="update_image" value="<?php echo $fetch_update['image']; ?>" placeholder="Nhập url ảnh sách cần cập nhật">
                        <!-- <input type="text" class="box" name="update_description" value="" placeholder="Nhập mô tả sách cần cập nhật"> -->
                        <textarea name="update_description" class="box" c   ols="30" rows="10" style="width: 100%"><?php echo $fetch_update['description']; ?></textarea>
                        <input type="text" class="box" name="update_supplier" value="<?php echo $fetch_update['supplier']; ?>" placeholder="Nhập nhà cung cấp sách cần cập nhật">
                        <input type="text" class="box" name="update_publiser" value="<?php echo $fetch_update['publiser']; ?>" placeholder="Nhập nhà cung cấp sách cần cập nhật">
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
    <!-- custom admin js file link  -->
    <!-- <script src="js/admin_script.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<?php include '../View/alert.php'; ?>
    <!-- custom admin js file link  -->
    <script src="../../public/js/admin_script.js"></script>
</body>

</html>