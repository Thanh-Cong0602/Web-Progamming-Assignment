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
    if (strlen($text) > 7) {
        $text = substr($text, 0, 3) . '..';
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
    <title>admin panel</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../../public/css/admin.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

    <!-- custom js file link  -->
    <script src="../../public/js/script.js" defer></script>

    <style>
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

    <?php include '../../admin/View/admin_header.php'; ?>

    <!-- admin dashboard section starts  -->

    <section class="dashboard">

        <h1 class="title">dashboard</h1>

        <div class="box-container" style="margin-top:40px;">

            <div class="box">
                <?php
                $total_pendings = 0;
                $select_pending = mysqli_query($conn, "SELECT total_price FROM `orders` WHERE payment_status = 'pending'") or die('query failed');
                if (mysqli_num_rows($select_pending) > 0) {
                    while ($fetch_pendings = mysqli_fetch_assoc($select_pending)) {
                        $total_price = $fetch_pendings['total_price'];
                        $total_pendings += $total_price;
                    };
                };
                ?>
                <h3><?php echo truncate_text($total_pendings); ?>
                    <?php if (strlen(truncate_text($total_pendings)) < strlen($total_pendings)) { ?>
                    <a style="font-size: 1.5rem;font-style:italic;" href="#"
                        onclick="expandaddress(`<?php echo $total_pendings; ?>`);">chi tiết</a>
                    <?php } ?><span class="rate">₫</span>
                </h3>
                <p>Tổng số tiền đơn hàng</p>
            </div>

            <div class="box">
                <?php
                $total_completed = 0;
                $select_completed = mysqli_query($conn, "SELECT total_price FROM `orders` WHERE payment_status = 'completed'") or die('query failed');
                if (mysqli_num_rows($select_completed) > 0) {
                    while ($fetch_completed = mysqli_fetch_assoc($select_completed)) {
                        $total_price = $fetch_completed['total_price'];
                        $total_completed += $total_price;
                    };
                };
                ?>
                <h3><?php echo $total_completed; ?> <span class="rate">₫</span></h3>
                <p>Số tiền đã thanh toán</p>
            </div>

            <div class="box">
                <?php
                $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
                $number_of_orders = mysqli_num_rows($select_orders);
                ?>
                <h3><?php echo $number_of_orders; ?></h3>
                <p>Số lượng đơn hàng</p>
            </div>

            <div class="box">
                <?php
                $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
                $number_of_products = mysqli_num_rows($select_products);
                ?>
                <h3><?php echo $number_of_products; ?></h3>
                <p>Số lượng sản phẩm</p>
            </div>

            <div class="box">
                <?php
                $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'user'") or die('query failed');
                $number_of_users = mysqli_num_rows($select_users);
                ?>
                <h3><?php echo $number_of_users; ?></h3>
                <p>Người dùng</p>
            </div>

            <div class="box">
                <?php
                $select_admins = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'admin'") or die('query failed');
                $number_of_admins = mysqli_num_rows($select_admins);
                ?>
                <h3><?php echo $number_of_admins; ?></h3>
                <p>admin</p>
            </div>

            <div class="box">
                <?php
                $select_account = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
                $number_of_account = mysqli_num_rows($select_account);
                ?>
                <h3><?php echo $number_of_account; ?></h3>
                <p>Tổng tài khoản</p>
            </div>

            <div class="box">
                <?php
                $select_messages = mysqli_query($conn, "SELECT * FROM `message`") or die('query failed');
                $number_of_messages = mysqli_num_rows($select_messages);
                ?>
                <h3><?php echo $number_of_messages; ?></h3>
                <p>Yêu cầu mới</p>
            </div>

        </div>

    </section>


    <!--admin dashboard section ends-- >








    

        <-- custom admin js file link  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
    function expandaddress(fullText) {

        var overlay = document.createElement('div');
        overlay.classList.add('overlay');
        document.body.appendChild(overlay);

        var content = document.createElement('div');
        content.classList.add('content');
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

    <script src="../../public/js/admin_script.js">
    </script>
</body>

</html>