<?php
include '../../config/config.php';
// $get_author = mysqli_query($conn, "SELECT * FROM `authors` WHERE ")
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý tác giả</title>
    <link rel="stylesheet" href="../../public/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <?php include 'admin_header.php'; ?>

    <section class="add-products">
        <?php
        if (isset($_GET['add-product-book'])) {
        ?>
            <form action="../Controllers/adminAuthorController.php" method="post">
                <h3>Thêm tác giả</h3>
                <input type="text" name="name" class="box" placeholder="Nhập tên tác giả" required>
                <input type="text" name="image" class="box" placeholder="Nhập ảnh của tác giả" required>
                <input type="text" name="slogan" class="box" placeholder="Nhập slogan" required>
                <input type="text" name="information" class="box" placeholder="Nhập link thông tin của tác giả" required>
                <div style="display:flex;justify-content:center;gap:0.5rem; ">
                    <input type="submit" value="Thêm" name="add_author" class="btn">
                    <a href="admin_author.php" class="delete-btn">Đóng</a>
                </div>
            </form>
        <?php
        } else {
            echo '<script>document.querySelector(".add-products").style.display = "none";</script>';
        }
        ?>
    </section>
    <section class="show-products" style="margin-top:30px;">
        <div class="list-add-products">
            <div class="list-products">
                <h1 class="title1">Danh Sách Tác Giả</h1>
            </div>
            <div class="add-products-button">
                <a href="admin_author.php?add-product-book" class="option-btn">Thêm Tác Giả</a>
            </div>
        </div>
        <div class="box-container" style="margin-top:40px;">
            <?php
            $sql = "SELECT * FROM `authors`";
            $author = $conn->query($sql);
            if ($author->num_rows > 0) {
                while ($row = $author->fetch_assoc()) {
            ?>
                    <div class="box">
                        <img src="<?php echo $row['image']; ?>" alt="">
                        <div class="info-author">
                            <h3 class="name"><?php echo $row['name']; ?></h3>
                            <p class="slogan"><?php echo $row['slogan']; ?></p>
                            <form action="../Controllers/adminAuthorController.php" method="post">
                                <a href="<?php echo $row['information']; ?>" class="detail_book">Xem thêm về tác giả <i class="fas fa-angle-right"></i> </a>
                                <div style="display:flex;justify-content:center;gap:0.5rem; ">
                                    <a href="admin_author.php?update=<?php echo $row['id']; ?>" class="option-btn">Cập nhật</a>
                                    <input type="submit" value="Xóa" onclick="return confirm('Bạn chắc chắn muốn xóa?');" class="delete-btn" name="delete_author">
                                    <input type="hidden" value="<?php echo $row['id'] ?>" name="author_id">
                                </div>
                            </form>

                        </div>
                    </div>
            <?php
                }
            } else {
                echo '<p class="empty">Không có tác giả nào tại đây</p>';
            }
            ?>
        </div>
    </section>

    <section class="edit-product-form">
        <?php
        if (isset($_GET['update'])) {
            $update_id = $_GET['update'];
            $update_query = mysqli_query($conn, "SELECT * FROM `authors` WHERE id = '$update_id'") or die('query failed');
            if (mysqli_num_rows($update_query) > 0) {
                while ($fetch_update = mysqli_fetch_assoc($update_query)) {
        ?>
                    <form action="../Controllers/adminAuthorController.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="update_id" value="<?php echo $fetch_update['id']; ?>">
                        <input type="text" name="update_name" value="<?php echo $fetch_update['name']; ?>" class="box" required placeholder="Nhập tên tác giả cần cập nhật">
                        <input type="text" class="box" name="update_image" value="<?php echo $fetch_update['image']; ?>" placeholder="Nhập url ảnh tác giả cần cập nhật">
                        <input type="text" class="box" name="update_slogan" value="<?php echo $fetch_update['slogan']; ?>" placeholder="Nhập slogan cần cập nhật">
                        <input type="text" class="box" name="update_information" value="<?php echo $fetch_update['information']; ?>" placeholder="Nhập link thông tin tác giả cập nhật">
                        <input type="submit" value="Lưu" name="update_author" class="btn">
                        <input type="submit" value="Reset" name="reset_author" id="close-update" class="delete-btn">
                    </form>
        <?php
                }
            }
        } else {
            echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';
        }
        ?>

    </section>
    <script src="../../public/js/admin_script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <?php include '../View/alert.php'; ?>

</body>

</html>