<?php
include '../../config/config.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý combo sách</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../../public/css/admin.css">
    <style>
        .blackboard {
            position: relative;
            width: 45%;
            margin: 5% auto;
            border: tan solid 12px;
            border-top: #bda27e solid 12px;
            border-left: #b19876 solid 12px;
            border-bottom: #c9ad86 solid 12px;
            box-shadow: 0px 0px 6px 5px rgba(58, 18, 13, 0), 0px 0px 0px 2px #c2a782, 0px 0px 0px 4px #a58e6f, 3px 4px 8px 5px rgba(0, 0, 0, 0.5);
            background-image: radial-gradient(circle at left 30%, rgba(34, 34, 34, 0.3), rgba(34, 34, 34, 0.3) 80px, rgba(34, 34, 34, 0.5) 100px, rgba(51, 51, 51, 0.5) 160px, rgba(51, 51, 51, 0.5)), linear-gradient(215deg, transparent, transparent 100px, #222 260px, #222 320px, transparent), radial-gradient(circle at right, #111, rgba(51, 51, 51, 1));
            background-color: #333;
        }

        .blackboard:before {
            box-sizing: border-box;
            display: block;
            position: absolute;
            width: 100%;
            height: 100%;
            background-image: linear-gradient(175deg, transparent, transparent 40px, rgba(120, 120, 120, 0.1) 100px, rgba(120, 120, 120, 0.1) 110px, transparent 220px, transparent), linear-gradient(200deg, transparent 80%, rgba(50, 50, 50, 0.3)), radial-gradient(ellipse at right bottom, transparent, transparent 200px, rgba(80, 80, 80, 0.1) 260px, rgba(80, 80, 80, 0.1) 320px, transparent 400px, transparent);
            border: #2c2c2c solid 2px;
            content: "Tìm Kiếm Sản Phẩm";
            font-family: 'Permanent Marker', cursive;
            font-size: 2.2em;
            color: rgba(238, 238, 238, 0.7);
            text-align: center;
            padding-top: 20px;
        }

        .form {
            padding: 70px 20px 20px;
        }

        p {
            position: relative;
            margin-bottom: 1em;
        }

        label {
            vertical-align: middle;
            font-size: 1.6em;
            color: rgba(238, 238, 238, 0.7);
        }

        p:nth-of-type(5)>label {
            vertical-align: top;
        }

        input,
        textarea {
            vertical-align: middle;
            padding-left: 10px;
            background: none;
            border: none;

            font-size: 1.6em;
            color: rgba(238, 238, 238, 0.8);
            line-height: .6em;
            outline: none;
        }

        select {
            vertical-align: middle;
            padding-left: 10px;
            background: transparent;
            border: none;
            width: 40%;

            font-size: 1.6em;
            color: rgba(238, 238, 238, 0.8);
            line-height: .6em;
            outline: none;
        }

        option {
            vertical-align: middle;
            padding-left: 10px;
            background: rgb(63, 62, 70);
            border: none;

            font-size: 1.0em;
            color: rgba(238, 238, 238, 0.8);
            line-height: .6em;
            outline: none;
        }

        textarea {
            margin-top: 1%;
            height: 120px;
            font-size: 1.4em;
            line-height: 1em;
            resize: none;
        }

        .searchandclear {
            cursor: pointer;
            color: rgba(238, 238, 238, 0.7);
            line-height: 1em;
            padding: 0;
        }

        input[type="submit"]:focus {
            background: rgba(238, 238, 238, 0.2);
            color: rgba(238, 238, 238, 0.2);
        }

        ::-moz-selection {
            background: rgba(238, 238, 238, 0.2);
            color: rgba(238, 238, 238, 0.2);
            text-shadow: none;
        }
    </style>
</head>

<body>
    <?php include 'admin_header.php'; ?>
    <section class="add-products-combo">
        <?php
        if (isset($_GET['add-product-book'])) {
        ?>
            <form action="../Controllers/adminProductController.php" method="post">
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
                <input type="text" name="name_3" class="box" placeholder="Nhập tên sách 3">
                <input type="text" name="image_3" class="box" placeholder="Nhập url cho sách 3">
                <textarea name="description_3" class="description" placeholder="Nhập mô tả về sách 3" cols="30" rows="5"></textarea>
                <div style="display:flex;justify-content:center;gap:0.5rem; ">
                    <input type="submit" value="Thêm Combo" name="add_product_combo" class="btn">
                    <a href="admin_combo_product.php" class="delete-btn">Đóng</a>
                </div>
            </form>
        <?php
        } else {
            echo '<script>document.querySelector(".add-products-combo").style.display = "none";</script>';
        }
        ?>


    </section>
    <!--  SEARCH PRODUCTs BEGINS -->
    <form action="" method="post">
        <div>
            <div class="blackboard">
                <div class="form">
                    <hr>
                    <p>
                        <label for="fullname"><b>Tên&emsp;</b></label>
                        <input type="text" placeholder="Nhập tên" name="fullname">
                    </p>
                    <br>
                    <p>
                        <label for="pricebelow">Khoảng giá:</label>&emsp;
                        <input type="number" placeholder="Dưới" name="pricebelow" style="width:20%">&emsp;&emsp;&emsp;
                        <input type="number" placeholder="Trên" name="priceabove" style="width:20%">
                    </p>
                    <br><br>
                    <p class="wipeout">
                        <span style="float: left; margin-left: 10%">
                            <input type="submit" name="search" value="Tìm Kiếm" class="searchandclear" />
                        </span>
                        <span style="float: right; margin-right: 10%">
                            <input type="submit" value="Xóa" class="searchandclear" />
                        </span><br>
                    </p>
                </div>
            </div>
        </div>
    </form>
    <!--  SEARCH PRODUCTs BEGINS -->

    <!--  SHOW PRODUCTs FROM SEARCH BEGINS -->
    <br>
    <section class="show-products">
        <div class="box-container" style="border-bottom: 1px solid #111;padding-bottom:40px">
            <?php
            $select_products = null;

            if (isset($_POST['search'])) {
                $_POST['fullname'] = addslashes($_POST['fullname']);
                if (!empty($_POST['fullname']) && $_POST['pricebelow'] && $_POST['priceabove']) {
                    $select_products = mysqli_query($conn, "SELECT * FROM `combo_products` WHERE combo_name LIKE '%{$_POST['fullname']}%' AND price BETWEEN {$_POST['pricebelow']} and {$_POST['priceabove']}") or die('query failed');
                } elseif ($_POST['pricebelow'] && $_POST['priceabove']) {
                    $select_products = mysqli_query($conn, "SELECT * FROM `combo_products` WHERE price BETWEEN {$_POST['pricebelow']} and {$_POST['priceabove']}") or die('query failed');
                } elseif ($_POST['pricebelow']) {
                    $select_products = mysqli_query($conn, "SELECT * FROM `combo_products` WHERE price > {$_POST['pricebelow']} ") or die('query failed');
                } elseif ($_POST['priceabove']) {
                    $select_products = mysqli_query($conn, "SELECT * FROM `combo_products` WHERE price < {$_POST['priceabove']}") or die('query failed');
                } elseif (!empty($_POST['fullname'])) {
                    $select_products = mysqli_query($conn, "SELECT * FROM `combo_products` WHERE combo_name LIKE '%{$_POST['fullname']}%'") or die('query failed');
                }
                // ##############
                if ($select_products && mysqli_num_rows($select_products) > 0) {
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
                            <form action="../Controllers/adminProductController.php" method="post">
                                <a href="./admin_detail_combo.php?id=<?php echo $fetch_products['combo_id'] ?>" class="detail_book">Xem
                                    thêm <i class="fas fa-angle-right"></i></a> <br>
                                <div style="display:flex;justify-content:center;gap:0.5rem; ">
                                    <a href="admin_combo_product.php?update=<?php echo $fetch_products['combo_id']; ?>" class="option-btn">Cập nhật</a>
                                    <input type="submit" value="Xóa" onclick="return confirm('Bạn chắc chắn muốn xóa?');" class="delete-btn" name="delete_combo_product">
                                    <input type="hidden" value="<?php echo $fetch_products['combo_id'] ?>" name="combo_id">
                                </div>

                            </form>
                            <!-- <a href="admin_combo_product.php?delete=<?php echo $fetch_products['combo_id']; ?>" class="delete-btn"
                        onclick="return confirm('Xóa quyển sách này?');">Xóa</a> -->
                        </div>
            <?php
                    }
                } else {
                    echo '<p class="empty">Không có combo nào tại đây</p>';
                }
            }
            ?>

        </div>

    </section>



    <section class="show-products">
        <div class="list-add-products">
            <div class="list-products">
                <h1 class="title1">Danh Sách Combo</h1>
            </div>
            <div class="add-products-button">
                <a href="admin_combo_product.php?add-product-book" class="option-btn">Thêm Combo</a>
            </div>
        </div>
        <div class="box-container" style="margin-top:40px;">
            <?php
            $per_page = 9;
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $start = ($page - 1) * $per_page;
            $select_products = mysqli_query($conn, "SELECT * FROM `combo_products`") or die('query failed');
            if (mysqli_num_rows($select_products) > 0) {
                while ($fetch_products = mysqli_fetch_assoc($select_products)) {
            ?>
            <?php
                $total_products = mysqli_query($conn, "SELECT COUNT(*) AS total FROM `combo_products`") or die('query failed');
                $total_products = mysqli_fetch_assoc($total_products)['total'];
                $total_pages = ceil($total_products / $per_page);
                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                $url = "http://localhost:3000/admin/View/admin_combo_product.php?page=";
                    // Tính toán giới hạn của LIMIT trong câu truy vấn SQL
                $offset = ($current_page - 1) * $per_page;
                    // Truy vấn sản phẩm trong cơ sở dữ liệu với LIMIT và OFFSET
                $select_products = mysqli_query($conn, "SELECT * FROM combo_products ORDER BY date ASC LIMIT $per_page OFFSET $offset") or die('query failed');
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
                <a href="./admin_detail_combo.php?id=<?php echo $fetch_products['combo_id'] ?>" class="detail_book">Xem
                    thêm <i class="fas fa-angle-right"></i></a> <br>

                        </form>
                        <!-- <a href="admin_combo_product.php?delete=<?php echo $fetch_products['combo_id']; ?>" class="delete-btn"
                    onclick="return confirm('Xóa quyển sách này?');">Xóa</a> -->
            </div>
            <?php
                }
            }
           ?>
            <?php
                }
            } else {
                echo '<p class="empty">Không có combo nào tại đây</p>';
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

    <section class="edit-product-form">
        <?php
        if (isset($_GET['update'])) {
            $update_id = $_GET['update'];
            $update_query = mysqli_query($conn, "SELECT * FROM `combo_products` WHERE combo_id = '$update_id'") or die('query failed');
            if (mysqli_num_rows($update_query) > 0) {
                while ($fetch_update = mysqli_fetch_assoc($update_query)) {
        ?>
                    <form action="../Controllers/adminProductController.php" method="post" enctype="multipart/form-data">
                        <h1 class="title">Cập nhật combo sách</h1>
                        <input type="hidden" name="update_combo_id" value="<?php echo $fetch_update['combo_id']; ?>">
                        <input type="text" name="update_combo_name" value="<?php echo $fetch_update['combo_name']; ?>" class="box" required placeholder="Nhập tên combo sách cần cập nhật">
                        <input type="number" name="update_price" value="<?php echo $fetch_update['price']; ?>" min="0" class="box" required placeholder="Nhập giá combo sách cần cập nhật">
                        <input type="text" class="box" name="update_image_combo" value="<?php echo $fetch_update['image_combo']; ?>" placeholder="Nhập url ảnh sách cần cập nhật">
                        <textarea name="update_description" class="box" cols="30" rows="3" style="width: 100%"><?php echo $fetch_update['description']; ?></textarea>
                        <textarea name="update_description_detail" class="box" cols="30" rows="5" style="width: 100%"><?php echo $fetch_update['description_detail']; ?></textarea>
                        <input type="text" name="update_name_1" value="<?php echo $fetch_update['name_1']; ?>" class="box" required placeholder="Nhập tên sách 1 cần cập nhật">
                        <input type="text" class="box" name="update_image_1" value="<?php echo $fetch_update['image_1']; ?>" placeholder="Nhập url ảnh sách 1 cần cập nhật">
                        <textarea name="update_description_1" class="box" cols="30" rows="3" style="width: 100%"><?php echo $fetch_update['description_1']; ?></textarea>
                        <input type="text" name="update_name_2" value="<?php echo $fetch_update['name_2']; ?>" class="box" placeholder="Nhập tên sách 1 cần cập nhật">
                        <input type="text" class="box" name="update_image_2" value="<?php echo $fetch_update['image_2']; ?>" placeholder="Nhập url ảnh sách 1 cần cập nhật">
                        <textarea name="update_description_2" class="box" cols="30" rows="3" style="width: 100%"><?php echo $fetch_update['description_2']; ?></textarea>
                        <input type="text" name="update_name_3" value="<?php echo $fetch_update['name_3']; ?>" class="box" placeholder="Nhập tên sách 1 cần cập nhật">
                        <input type="text" class="box" name="update_image_3" value="<?php echo $fetch_update['image_3']; ?>" placeholder="Nhập url ảnh sách 1 cần cập nhật">
                        <textarea name="update_description_3" class="box" cols="30" rows="3" style="width: 100%"><?php echo $fetch_update['description_3']; ?></textarea>
                        <input type="submit" value="Lưu" name="update_product_combo" class="btn">
                        <input type="submit" value="Reset" name="reset_combo" id="close-update" class="delete-btn">
                    </form>
        <?php
                }
            }
        } else {
            echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';
        }
        ?>

    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <?php include '../View/alert.php'; ?>
    <!-- custom admin js file link  -->
    <script src="../../public/js/admin_script.js"></script>
</body>

</html>