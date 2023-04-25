<?php
include '../../config/config.php';
// $get_author = mysqli_query($conn, "SELECT * FROM `authors` WHERE ")
session_start();
if (isset($_POST['add_author'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $image = $_POST['image'];
    $slogan = $_POST['slogan'];
    $information = $_POST['information'];
    $select_author = mysqli_query($conn, "SELECT name FROM `authors` WHERE name = '$name'") or die('query failed');
    if (mysqli_num_rows($select_author) > 0) {
        $message[] = 'Tác giả đã tồn tại';
    } else {
        $id = create_unique_number_id();
        $add_author = mysqli_query($conn, "INSERT INTO `authors`(id,name, image, slogan, information ) VALUES('$id','$name', '$image', '$slogan', '$information')") or die('query failed');
        $message[] = 'Tác giả đã được thêm vào';
    }
    header('location:admin_author.php');
}
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `authors` WHERE id = '$delete_id'") or die('query failed');
    header('location:admin_author.php');
}
if (isset($_POST['update_author'])) {
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
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <?php include 'admin_header.php'; ?>

    <section class="add-products">
        <?php
        if (isset($_GET['add-product-book'])) {
        ?>
            <form action="" method="post">
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
            $per_page = 6;
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $start = ($page - 1) * $per_page;
            $select_authors = mysqli_query($conn, "SELECT * FROM `authors`") or die('query failed');
            $sql = "SELECT * FROM `authors`";
            // $author = $conn->query($sql);
            if (mysqli_num_rows($select_authors) > 0) {
                while ($row = mysqli_fetch_assoc($select_authors)) {
            ?>
             <?php
                $total_products = mysqli_query($conn, "SELECT COUNT(*) AS total FROM `orders`") or die('query failed');
                $total_products = mysqli_fetch_assoc($total_products)['total'];
                $total_pages = ceil($total_products / $per_page);
                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                $url = "http://localhost:3000/admin/View/admin_author.php?page=";
                // Tính toán giới hạn của LIMIT trong câu truy vấn SQL
                $offset = ($current_page - 1) * $per_page;
                // Truy vấn sản phẩm trong cơ sở dữ liệu với LIMIT và OFFSET
                $select_authors = mysqli_query($conn, "SELECT * FROM authors LIMIT $per_page OFFSET $offset") or die('query failed');
                if (mysqli_num_rows($select_authors) > 0) {
                    while ($row = mysqli_fetch_assoc($select_authors)) {
                    ?>
                    <div class="box">
                        <img src="<?php echo $row['image']; ?>" alt="">
                        <div class="info-author">
                            <h3 class="name"><?php echo $row['name']; ?></h3>
                            <p class="slogan"><?php echo $row['slogan']; ?></p>
                            <a href="<?php echo $row['information']; ?>" class="detail_book">Xem thêm về tác giả <i class="fas fa-angle-right"></i> </a>
                            <a href="admin_author.php?update=<?php echo $row['id']; ?>" class="option-btn">Cập nhật</a>
                            <a href="admin_author.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('Xóa tác giả này???');">Xóa</a>
                        </div>
                    </div>
            <?php
                }
            }
        }
            } else {
                echo '<p class="empty">Không có tác giả nào tại đây</p>';
            }
            ?>
        </div>
        <nav aria-label="Page navigation example" class="toolbar">
            <ul class="pagination justify-content-center d-flex flex-wrap">
                <li class="page-item <?php echo ($current_page <= 1) ? 'disabled' : ''; ?>">
                    <a class="page-link" href="<?php echo $url . ($current_page - 1); ?>" tabindex="-1">Previous</a>
                </li>
                <?php
                $start_page = ($current_page <= 3) ? 1 : $current_page - 2;
                $end_page = ($total_pages - $current_page >= 2) ? $current_page + 2 : $total_pages;
                if ($start_page > 1) {
                    echo '<li class="page-item"><a class="page-link" href="' . $url . '1">1</a></li>';
                    if ($start_page > 2) {
                        echo '<li class="page-item disabled"><a class="page-link">...</a></li>';
                    }
                }
                $num_displayed_pages = $end_page - $start_page + 1;
                $display_ellipsis = ($num_displayed_pages >= 7);
                for ($i = $start_page; $i <= $end_page; $i++) {
                    if ($num_displayed_pages >= 7) {
                        if ($i == $start_page + 3 || $i == $end_page - 3) {
                            if (!$display_ellipsis) {
                                echo '<li class="page-item"><a class="page-link" href="#">' . $i . '</a></li>';
                            }
                            continue;
                        }
                    }
                    if ($num_displayed_pages <= 5 || ($i >= $current_page - 2 && $i <= $current_page + 2)) {
                        echo '<li class="page-item ' . (($i == $current_page) ? 'active' : '') . '"><a class="page-link" href="' . $url . $i . '">' . $i . '</a></li>';
                    }
                }
                if ($end_page < $total_pages) {
                    if ($end_page < $total_pages - 1) {
                        echo '<li class="page-item disabled"><a class="page-link">...</a></li>';
                    }
                    echo '<li class="page-item"><a class="page-link" href="' . $url . $total_pages . '">' . $total_pages . '</a></li>';
                }
                ?>
                <li class="page-item <?php echo ($current_page >= $total_pages) ? 'disabled' : ''; ?>">
                    <a class="page-link" href="<?php echo $url . ($current_page + 1); ?>">Next</a>
                </li>
            </ul>
        </nav>
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
            } else {
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
                        <input type="text" name="update_name" value="<?php echo $fetch_update['name']; ?>" class="box" required placeholder="Nhập tên tác giả cần cập nhật">
                        <input type="text" class="box" name="update_image" value="<?php echo $fetch_update['image']; ?>" placeholder="Nhập url ảnh tác giả cần cập nhật">
                        <input type="text" class="box" name="update_slogan" value="<?php echo $fetch_update['slogan']; ?>" placeholder="Nhập slogan cần cập nhật">
                        <input type="text" class="box" name="update_information" value="<?php echo $fetch_update['information']; ?>" placeholder="Nhập link thông tin tác giả cập nhật">
                        <input type="submit" value="Lưu" name="update_author" class="btn">
                        <input type="submit" value="Reset" name="reset" id="close-update" class="delete-btn">
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


</body>

</html>