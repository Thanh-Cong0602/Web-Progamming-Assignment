<?php
include '../../config/config.php';
session_start();
// if (isset($_GET['delete'])) {
//     $delete_id = $_GET['delete'];
//     mysqli_query($conn, "DELETE FROM `reviews` WHERE id = $delete_id") or die('query failed');
//     header('location:admin_review.php');
// }
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
             $per_page = 6;
             $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
             $start = ($page - 1) * $per_page;
            $select_review = mysqli_query($conn, "SELECT * FROM `reviews`") or die('query fail');
            if (mysqli_num_rows($select_review) > 0) {
                while ($fetch_review = mysqli_fetch_assoc($select_review)) {
            ?>
             <?php
                $total_products = mysqli_query($conn, "SELECT COUNT(*) AS total FROM `reviews`") or die('query failed');
                $total_products = mysqli_fetch_assoc($total_products)['total'];
                $total_pages = ceil($total_products / $per_page);
                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                $url = "http://localhost:3000/admin/View/admin_review.php?page=";
                // Tính toán giới hạn của LIMIT trong câu truy vấn SQL
                $offset = ($current_page - 1) * $per_page;
                // Truy vấn sản phẩm trong cơ sở dữ liệu với LIMIT và OFFSET
                $select_review = mysqli_query($conn, "SELECT * FROM reviews LIMIT $per_page OFFSET $offset") or die('query failed');
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
                    ?>
                <form action="../Controllers/adminController.php" method="post">
                    <input type="hidden" value="<?php echo $fetch_review['id'] ?>" name="review_id">
                    <?php
                        $sql_product = mysqli_query($conn, "SELECT name FROM `products` WHERE `product_id` = '" . $fetch_review['product_id'] . "'");

                    $sql_combo_product = mysqli_query($conn, "SELECT combo_name FROM `combo_products` WHERE `combo_id` = '" . $fetch_review['combo_id'] . "'");
                    $row_product = mysqli_fetch_array($sql_product);
                    $row_combo = mysqli_fetch_assoc($sql_combo_product);
                    $sql_user = mysqli_query($conn, "SELECT * FROM `users` WHERE `user_id` = '" . $fetch_review['user_id'] . "'");
                    $row_user = mysqli_fetch_assoc($sql_user);
                    echo "<tr>";
                    echo "<td data-label='ID'>" . $fetch_review['id'] . "</td>";
                    if ($row_product['name']) {
                        echo "<td data-label='Tên sản phẩm'>" . $row_product['name'] . "</td>";
                    } else if ($row_combo['combo_name']) {
                        echo "<td data-label='Tên khách'>" . $row_combo['combo_name'] . "</td>";
                    }
                    echo "<td data-label='Tên khách'>" . $row_user['fullname'] . "</td>";
                    echo "<td data-label='Tiêu đề'>" . $fetch_review['title'] . "</td>";
                    echo "<td data-label='Nhận xét' style='text-align: justify;'>
                    <p class = 'scroll'> " . $fetch_review['description'] . "</p>
                    </td>";
                    echo "<td data-label='Đánh giá'>" . $fetch_review['rating'] . "</td>";
                    echo " <td data-label='Thời gian'>" . $fetch_review['date'] . "</td>";
                    
                    echo "<td class='btn-review'><input type='submit' value='Xóa'  onclick='return confirm(\"Bạn chắc chắn muốn xóa?\");'
                        class='delete-btn' name='delete_review'>" . "</td>";
                    echo "</tr>";
                    
            } 
        }
        }
    }
    else {
                echo '<p class="empty">Không có review nào tại đây</p>';
            }
                ?>
            </form>
            </table>
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


</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<?php include '../View/alert.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="../../public/js/admin_script.js"></script>


</html>