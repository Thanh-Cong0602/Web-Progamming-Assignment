<?php
include '../../config/config.php';

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `reviews` WHERE id = $delete_id") or die('query failed');
    header('location:admin_review.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý review sách</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../../public/css/admin.css">


</head>

<body>
    <?php include 'admin_header.php'; ?>
    <section class="admin_review">
        <h1 class="title" style="margin-top: 2rem;">Tất cả review</h1>
        <div class="table-review">
            <?php
            $select_review = mysqli_query($conn, "SELECT * FROM `reviews`") or die('query fail');
            if (mysqli_num_rows($select_review) > 0) {
            ?>
            <table class="table table-striped table-hover">
                <thead class="thead-light">
                    <tr>
                        <th style='width: 2%'>ID</th>
                        <th style='width: 8%'>Tên sản phẩm</th>
                        <th style='width: 8%'>Tên khách</th>
                        <th style='width: 10%'>Tiêu đề</th>
                        <th style='width: 55%'>Nhận xét</th>
                        <th style='width: 4%'>Tỉ lệ</th>
                        <th style='width: 8%'>Thời gian</th>
                        <th style='width: 5%'></th>
                    </tr>
                </thead>
                <?php
                while ($fetch_review = mysqli_fetch_assoc($select_review)) {
                    $sql_product = mysqli_query($conn, "SELECT name FROM `products` WHERE `product_id` = '" . $fetch_review['product_id'] . "'");

                    $sql_combo_product = mysqli_query($conn, "SELECT combo_name FROM `combo_products` WHERE `combo_id` = '" . $fetch_review['combo_id'] . "'");
                    $row_product = mysqli_fetch_array($sql_product);
                    $row_combo = mysqli_fetch_assoc($sql_combo_product);
                    $sql_user = mysqli_query($conn, "SELECT * FROM `users` WHERE `user_id` = '" . $fetch_review['user_id'] . "'");
                    $row_user = mysqli_fetch_assoc($sql_user);
                    echo "<tr>";
                    echo "<td>" . $fetch_review['id'] . "</td>";
                    if ($row_product['name']) {
                        echo "<td>" . $row_product['name'] . "</td>";
                    } else if ($row_combo['combo_name']) {
                        echo "<td>" . $row_combo['combo_name'] . "</td>";
                    }
                    echo "<td>" . $row_user['fullname'] . "</td>";
                    echo "<td>" . $fetch_review['title'] . "</td>";
                    echo "<td>" . $fetch_review['description'] . "</td>";
                    echo "<td>" . $fetch_review['rating'] . "</td>";
                    echo "<td>" . $fetch_review['date'] . "</td>";
                    // <!-- echo "<td class='btn-review'>
                    //    <a href='admin_review.php?delete=".$fetch_products['combo_id']."' onclick='return confirm(\"Xóa đánh giá này???\");'>Xóa</a>
                    //   </td>"; -->

                    echo "<td class='btn-review'><a href='admin_review.php?delete=" . $fetch_review['id'] . "'onclick='return confirm(\"Xóa đánh giá này???\")'>Xóa</a>" . "</td>";
                    echo "</tr>";
                }
            } else {
                echo '<p class="empty">Không có review nào tại đây</p>';
            }
                ?>
            </table>
        </div>
    </section>


</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="../../public/js/admin_script.js"></script>


</html>