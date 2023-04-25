<?php
include '../../config/config.php';
session_start();
$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:../../app/View/loginForm.php');
};

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `products` WHERE product_id = '$delete_id'") or die('query failed');
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
    <!-- <link rel="stylesheet" href="../../public/css/tuananh.css"> -->
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

    <section class="add-products">
        <?php
        if (isset($_GET['add-product-book'])) {
        ?>
            <form action="../Controllers/adminProductController.php" method="post">
                <h3>Thêm sách</h3>
                <input type="text" name="name" class="box" placeholder="Nhập tên sách" required>
                <input type="text" min="0" name="author" class="box" placeholder="Nhập tên tác giả" required>
                <input type="number" min="0" name="price" class="box" placeholder="Nhập giá" required>
                <input type="text" name="image" class="box" placeholder="Nhập url ảnh" required>
                <input type="text" name="supplier" class="box" placeholder="Nhập nhà cung cấp" required>
                <input type="text" name="publiser" class="box" placeholder="Nhập nhà xuất bản" required>
                <textarea name="description" class="description" placeholder="Nhập mô tả về sách" cols="30" rows="5"></textarea>
                <div style="display:flex;justify-content:center;gap:0.5rem; ">
                    <input type="submit" value="Thêm Sản Phẩm" name="add_product" class="btn">
                    <a href="admin_product.php" class="delete-btn">Đóng</a>
                </div>
            </form>
        <?php
        } else {
            echo '<script>document.querySelector(".add-products").style.display = "none";</script>';
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
                        <label for="searchby">Tìm Kiếm Theo: &emsp;</label>
                        <select name="searchby">
                            <option value="products.name">Tên</option>
                            <option value="products.author">Tác giả</option>
                        </select>
                    </p>
                    <br>
                    <p>
                        <label for="name">Tìm Kiếm:&emsp;&emsp;&ensp;</label>
                        <input type="text" name="name" placeholder="Nhập nội dung tìm kiếm" />
                    </p><br>
                    <hr style="width:45%; float: left"><span style="text-align:center">&ensp;or&nbsp;</span>
                    <hr style="width:49%; float: right"><br><br>
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
            $sql_products = null;

            if (isset($_POST['search'])) {
                $_POST['name'] = addslashes($_POST['name']);
                if (!empty($_POST['name']) && $_POST['pricebelow'] && $_POST['priceabove']) {
                    $sql_products = mysqli_query($conn, "SELECT products.* FROM `products` WHERE {$_POST['searchby']} LIKE '%{$_POST['name']}%' AND products.price BETWEEN {$_POST['pricebelow']} and {$_POST['priceabove']}") or die('query failed');
                } elseif ($_POST['pricebelow'] && $_POST['priceabove']) {
                    $sql_products = mysqli_query($conn, "SELECT products.* FROM `products` WHERE products.price BETWEEN {$_POST['pricebelow']} and {$_POST['priceabove']}") or die('query failed');
                } elseif ($_POST['pricebelow']) {
                    $sql_products = mysqli_query($conn, "SELECT products.* FROM `products` WHERE products.price > {$_POST['pricebelow']} ") or die('query failed');
                } elseif ($_POST['priceabove']) {
                    $sql_products = mysqli_query($conn, "SELECT products.* FROM `products` WHERE products.price < {$_POST['priceabove']}") or die('query failed');
                } elseif (!empty($_POST['name'])) {
                    $sql_products = mysqli_query($conn, "SELECT products.* FROM `products` WHERE {$_POST['searchby']} LIKE '%{$_POST['name']}%'") or die('query failed');
                }
                if ($sql_products && $sql_products->num_rows > 0) {
                    while ($fetch_products_sql = mysqli_fetch_assoc($sql_products)) {
            ?>
                        <div class="box">
                            <img src="<?php echo $fetch_products_sql['image']; ?>" alt="">
                            <div class="name">
                                <?php echo $fetch_products_sql['name']; ?>
                            </div>
                            <div class="author">
                                <?php echo $fetch_products_sql['author']; ?>
                            </div>
                            <div class="price">
                                <?php echo $fetch_products_sql['price']; ?>
                                <span class="rate">₫</span></h3>
                            </div>
                            <a href="./admin_view_detail.php?id=<?php echo $fetch_products_sql['product_id'] ?>" class="detail_book">Xem
                                thêm <i class="fas fa-angle-right"></i></a> <br>
                            <a href="admin_product.php?update=<?php echo $fetch_products_sql['product_id']; ?>" class="option-btn">Cập
                                nhật</a>
                            <a href="admin_product.php?delete=<?php echo $fetch_products_sql['product_id']; ?>" class="delete-btn" onclick="return confirm('Xóa quyển sách này?');">Xóa</a>
                        </div>
            <?php
                    }
                } else {
                    echo '<p class="empty">Không tìm thấy sản phẩm</p>';
                }
            }
            ?>

        </div>

    </section>
    <!--  SHOW PRODUCTs FROM SEARCH BEGINS -->


    <section class="show-products">
        <div class="list-add-products">
            <div class="list-products">
                <h1 class="title1">Danh Sách Sản Phẩm</h1>
            </div>
            <div class="add-products-button">
                <a href="admin_product.php?add-product-book" class="option-btn">Thêm Sản Phẩm</a>
            </div>
        </div>
        <div class="box-container" style="margin-top:40px;">

            <?php
            $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
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
                        <div class="price">
                            <?php echo $fetch_products['price']; ?>
                            <span class="rate">₫</span></h3>
                        </div>
                        <form action="../Controllers/adminProductController.php" method="post">
                            <a href="./admin_view_detail.php?id=<?php echo $fetch_products['product_id'] ?>" class="detail_book">
                                Xem thêm <i class="fas fa-angle-right"></i></a> <br>
                            <a href="admin_product.php?update=<?php echo $fetch_products['product_id']; ?>" class="option-btn">Cập nhật</a>
                            <input type="submit" value="Xóa đánh giá" class="delete-btn" name="delete_review">
                            <!-- <a href="admin_product.php?delete=<?php echo $fetch_products['product_id']; ?>" class="delete-btn" onclick="return confirm('Xóa quyển sách này?');">Xóa</a> -->
                    </div>
                    </form>
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
                    <form action="../Controllers/adminProductController.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="update_p_id" value="<?php echo $fetch_update['product_id']; ?>">
                        <input type="text" name="update_name" value="<?php echo $fetch_update['name']; ?>" class="box" required placeholder="Nhập tên sách cần cập nhật">
                        <input type="text" name="update_author" value="<?php echo $fetch_update['author']; ?>" class="box" required placeholder="Nhập tên tác gải cần cập nhật">
                        <input type="number" name="update_price" value="<?php echo $fetch_update['price']; ?>" min="0" class="box" required placeholder="Nhập giá sách cần cập nhật">
                        <input type="text" class="box" name="update_image" value="<?php echo $fetch_update['image']; ?>" placeholder="Nhập url ảnh sách cần cập nhật">
                        <!-- <input type="text" class="box" name="update_description" value="" placeholder="Nhập mô tả sách cần cập nhật"> -->
                        <textarea name="update_description" class="box" cols="30" rows="10" style="width: 100%"><?php echo $fetch_update['description']; ?></textarea>
                        <input type="text" class="box" name="update_supplier" value="<?php echo $fetch_update['supplier']; ?>" placeholder="Nhập nhà cung cấp sách cần cập nhật">
                        <input type="text" class="box" name="update_publiser" value="<?php echo $fetch_update['publiser']; ?>" placeholder="Nhập nhà cung cấp sách cần cập nhật">
                        <input type="submit" value="Lưu" name="update_product" class="option-btn">
                        <input type="submit" value="Reset" name="reset" id="close-update" class="option-btn">
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