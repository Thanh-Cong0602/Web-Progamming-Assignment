<?php

include '../../config/config.php';

session_start();

$admin_id = $_SESSION['admin_id'];
if (!isset($admin_id)) {
    header('location:../../app/View/loginForm.php');
}
?>

<?php
function truncate_text($text)
{
    if (strlen($text) > 40) {
        $text = substr($text, 0, 30) . '...';
        $text = trim($text);
    }
    return $text;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>orders</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- custom admin css file link  -->
    <link rel="stylesheet" href="../../public/css/admin.css">

    <style>
        .orders .box-container .box p {
            margin-bottom: 0rem;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9999;
        }

        .content {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80%;
            max-width: 700px;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            z-index: 10000;
            display: none;
            white-space: pre-wrap;
            border-radius: 10px;
            line-height: 1.5;
            font-size: 2rem;
        }
    </style>
</head>

<body>

    <?php include 'admin_header.php'; ?>

    <section class="orders">

        <h1 class="title">Đơn hàng đã đặt</h1>

        <div class="box-container" style="margin-top:40px;">
            <?php
            $per_page = 6;
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $start = ($page - 1) * $per_page;
            $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
            if (mysqli_num_rows($select_orders) > 0) {
                while ($fetch_orders = mysqli_fetch_assoc($select_orders)) {
            ?>
                    <?php
                    $total_products = mysqli_query($conn, "SELECT COUNT(*) AS total FROM `orders`") or die('query failed');
                    $total_products = mysqli_fetch_assoc($total_products)['total'];
                    $total_pages = ceil($total_products / $per_page);
                    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $url = "http://localhost:3000/admin/View/admin_product.php?page=";
                    // Tính toán giới hạn của LIMIT trong câu truy vấn SQL
                    $offset = ($current_page - 1) * $per_page;
                    // Truy vấn sản phẩm trong cơ sở dữ liệu với LIMIT và OFFSET
                    $select_orders = mysqli_query($conn, "SELECT * FROM orders LIMIT $per_page OFFSET $offset") or die('query failed');
                    if (mysqli_num_rows($select_orders) > 0) {
                        while ($fetch_orders = mysqli_fetch_assoc($select_orders)) {
                    ?>
                            <div class="box">
                                <p> User id : <span><?php echo $fetch_orders['user_id']; ?></span> </p>
                                <p> Ngày đặt hàng : <span><?php echo $fetch_orders['placed_on']; ?></span> </p>
                                <p> Họ và Tên : <span><?php echo $fetch_orders['name']; ?></span> </p>
                                <p> Sđt : <span><?php echo $fetch_orders['number']; ?></span> </p>
                                <p> Email : <span><?php echo $fetch_orders['email']; ?></span> </p>
                                <p> Địa chỉ : <span><?php echo truncate_text($fetch_orders['address']); ?></span>
                                    <?php if (strlen(truncate_text($fetch_orders['address'])) < strlen($fetch_orders['address'])) { ?>
                                        <a style="font-size: 1.5rem;font-style:italic;" href="#" onclick="expandaddress(`<?php echo $fetch_orders['address']; ?>`);">chi tiết</a>
                                    <?php } ?>
                                </p>
                                <p class="total-products"> Tổng sản phẩm :
                                    <span><?php echo preg_replace('/,/', '', truncate_text($fetch_orders['total_products']), 1); ?></span>
                                    <?php if (strlen(truncate_text($fetch_orders['total_products'])) < strlen($fetch_orders['total_products'])) { ?>
                                        <a style="font-size: 1.5rem;font-style:italic;" href="#" onclick="expandText(`<?php echo $fetch_orders['total_products']; ?>`);">chi tiết</a>
                                    <?php } ?>
                                </p>
                                <p> Tổng giá : <span><?php echo $fetch_orders['total_price']; ?></span>
                                    <span class="rate">₫</span></h3>
                                </p>
                                <p> Phương thức thanh toán : <br>
                                    <span><?php echo $fetch_orders['method']; ?></span>
                                </p>
                                <div class="select-button">
                                    <form action="../Controllers/adminOrderController.php" method="post">
                                        <input type="hidden" name="order_id" value="<?php echo $fetch_orders['id']; ?>">
                                        <select name="update_payment">
                                            <option value="" selected disabled><?php echo $fetch_orders['payment_status']; ?></option>
                                            <option value="pending">pending</option>
                                            <option value="completed">completed</option>
                                        </select>
                                        <div style="display:flex;justify-content:center;gap:0.5rem; ">
                                            <input type="submit" value="Cập Nhật" name="update_order" class="option-btn">
                                            <input type="submit" value="Xóa" onclick="return confirm('Bạn chắc chắn muốn xóa?');" class="delete-btn" name="delete_order">

                                        </div>
                                    </form>
                                </div>
                            </div>
            <?php
                        }
                    }
                }
            } else {
                echo '<p class="empty">Chưa có đơn hàng nào được đặt!</p>';
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

    <script>
        function expandText(fullText) {

            var overlay = document.createElement('div');
            overlay.classList.add('overlay');
            document.body.appendChild(overlay);

            var content = document.createElement('div');
            content.classList.add('content');
            fullText = fullText.replace(",", "");
            content.textContent = fullText.replaceAll(",", "\n");
            overlay.appendChild(content);

            overlay.style.display = 'block';
            content.style.display = 'block';

            overlay.addEventListener('click', function() {
                overlay.style.display = 'none';
                content.style.display = 'none';
            });
        }

        function expandaddress(fullText) {
            var overlay = document.createElement('div');
            overlay.classList.add('overlay');
            document.body.appendChild(overlay);

            var content = document.createElement('div');
            content.classList.add('content');
            // fullText = fullText.replace(",", "");
            content.textContent = fullText;
            overlay.appendChild(content);

            overlay.style.display = 'block';
            content.style.display = 'block';

            overlay.addEventListener('click', function() {
                overlay.style.display = 'none';
                content.style.display = 'none';
            });
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <?php include '../View/alert.php'; ?>
    <!-- custom admin js file link  -->
    <script src="../../public/js/admin_script.js"></script>
</body>

</html>