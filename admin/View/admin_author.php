<?php 
include '../../config/config.php';
// $get_author = mysqli_query($conn, "SELECT * FROM `authors` WHERE ")
if (isset($_POST['add_product'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $image = $_POST['image'];
    $slogan = $_POST['slogan'];
    $information = $_POST['information'];
    $select_author = mysqli_query($conn, "SELECT name FROM `authors` WHERE name = '$name'") or die('query failed');
    if (mysqli_num_rows($select_author) > 0) {
        $message[] = 'Tác giả đã tồn tại';
    } else {
        // $id = create_unique_id();
        $add_author = mysqli_query($conn, "INSERT INTO `authors`(name, image, slogan, information ) VALUES('$name', '$image', '$slogan', '$information')") or die('query failed');
        $message[] = 'Tác giả đã được thêm vào';
    }
}
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `authors` WHERE id = '$delete_id'") or die('query failed');
    header('location:admin_author.php');
}
if (isset($_POST['update_product'])) {
    $update_id = $_POST['update_id'];
    $update_name = $_POST['update_name'];
    $update_image = $_POST['update_image'];
    $update_slogan = $_POST['update_slogan'];
    $update_information = $_POST['update_information'];
    mysqli_query($conn, "UPDATE `authors` SET name = '$update_name', image = '$update_image' , slogan = '$update_slogan', information = '$update_information' WHERE id = '$update_id'") or die('query failed');
    header('location:admin_author.php');

}
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
        <form action="" method="post">
            <h3>Thêm tác giả</h3>
            <input type="text" name="name" class="box" placeholder="Nhập tên tác giả" required>
            <input type="text" name="image" class="box" placeholder="Nhập ảnh của tác giả" required>
            <input type="text" name="slogan" class="box" placeholder="Nhập slogan" required>
            <input type="text" name="information" class="box" placeholder="Nhập link thông tin của tác giả" required>
            <input type="submit" value="Thêm" name="add_product" class="btn">
        </form>
    </section>
    <section class="show-products">
        <h1 class="title">Danh sách các tác giả</h1>
        <div class="box-container">
        <?php 
            $sql = "SELECT * FROM `authors`";
            $author = $conn->query($sql);
            if($author->num_rows > 0) {
                while ($row = $author->fetch_assoc()) {
                ?>
                <div class="box">
                    <img src="<?php echo $row['image']; ?>" alt="">
                    <div class="info-author">
                        <h3 class="name"><?php echo $row['name']; ?></h3>
                        <p class="slogan"><?php echo $row['slogan']; ?></p>
                        <a href="<?php echo $row['information']; ?>" class="detail_book" >Xem thêm về tác giả <i class="fas fa-angle-right"></i> </a>
                        <a href="admin_author.php?update=<?php echo $row['id']; ?>" class="option-btn">Cập nhật</a>
                        <a href="admin_author.php?delete=<?php echo $row['id']; ?>" class="delete-btn"
                            onclick="return confirm('Xóa tác giả này???');">Xóa</a>
                    </div>
                </div>
            <?php 
                }
            }
            else {
                echo '<p class="empty">Không có tác giả nào tại đây</p>';
            }
        ?>
        </div>
    </section>
    <!-- <section class="edit-product-form">
        <?php 
            if (isset($_GET['update'])) {
                $update_id = $_GET['update'];
                $update_query = mysqli_query($conn, "SELECT * FROM `authors` WHERE id = '$update_id'") or die('query failed');
                if (mysqli_num_rows($update_query) > 0) {
                    while ($fetch_update = mysqli_fetch_assoc($update_query)) {
                    ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="update_id" value="<?php echo $fetch_update['id']; ?>">
                        <input type="text" name="update_name" value="<?php echo $fetch_update['name']; ?>" class="box" required
                            placeholder="Nhập tên sách cần cập nhật">
                        <input type="text" class="box" name="update_image" value="<?php echo $fetch_update['image']; ?>" placeholder="Nhập url ảnh sách cần cập nhật">
                        <input type="text" class="box" name="update_slogan" value="<?php echo $fetch_update['slogan']; ?>" placeholder="Nhập nhà cung cấp sách cần cập nhật">
                        <input type="text" class="box" name="update_information" value="<?php echo $fetch_update['information']; ?>" placeholder="Nhập nhà cung cấp sách cần cập nhật">
                        <input type="submit" value="Lưu" name="update_product" class="btn">
                        <input type="reset" value="Reset" id="close-update" class="option-btn">
                    </form>
                    <?php
                    }
                }
                else {
                    echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';
                }
            }
        ?>
    </section> -->
    <section class="edit-product-form">
        <?php
        if (isset($_GET['update'])) {
            $update_id = $_GET['update'];
            $update_query = mysqli_query($conn, "SELECT * FROM `authors` WHERE id = '$update_id'") or die('query failed');
            if (mysqli_num_rows($update_query) > 0) {
                while ($fetch_update = mysqli_fetch_assoc($update_query)) {
                    ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="update_id" value="<?php echo $fetch_update['id']; ?>">
                        <input type="text" name="update_name" value="<?php echo $fetch_update['name']; ?>" class="box" required
                            placeholder="Nhập tên tác giả cần cập nhật">
                        <input type="text" class="box" name="update_image" value="<?php echo $fetch_update['image']; ?>" placeholder="Nhập url ảnh tác giả cần cập nhật">
                        <input type="text" class="box" name="update_slogan" value="<?php echo $fetch_update['slogan']; ?>" placeholder="Nhập slogan cần cập nhật">
                        <input type="text" class="box" name="update_information" value="<?php echo $fetch_update['information']; ?>" placeholder="Nhập link thông tin tác giả cập nhật">
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
    <script src="js/admin_script.js"></script>

</body>
</html>