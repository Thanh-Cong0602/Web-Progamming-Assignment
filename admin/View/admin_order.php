<?php

include '../../config/config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:../../app/View/loginForm.php');
}

if (isset($_POST['update_order'])) {
    $order_update_id = $_POST['order_id'];
    $update_payment = $_POST['update_payment'];
    mysqli_query($conn, "UPDATE `orders` SET payment_status = '$update_payment' WHERE user_id = '$order_update_id'") or die('query failed');
    $message[] = 'Updated!!!';
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `orders` WHERE id = '$delete_id'") or die('query failed');
    header('location:admin_order.php');
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

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom admin css file link  -->
    <link rel="stylesheet" href="../../public/css/admin.css">
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
        max-width: 600px;
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        z-index: 10000;
        display: none;
        word-wrap: break-word;
        word-break: break-all;
    }
    </style>
</head>

<body>

    <?php include 'admin_header.php'; ?>

    <section class="orders">

        <h1 class="title">Đơn hàng đã đặt</h1>

        <div class="box-container">
            <?php
            $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
            if (mysqli_num_rows($select_orders) > 0) {
                while ($fetch_orders = mysqli_fetch_assoc($select_orders)) {
            ?>
            <div class="box">
                <p> user id : <span><?php echo $fetch_orders['user_id']; ?></span> </p>
                <p> placed on : <span><?php echo $fetch_orders['placed_on']; ?></span> </p>
                <p> name : <span><?php echo $fetch_orders['name']; ?></span> </p>
                <p> number : <span><?php echo $fetch_orders['number']; ?></span> </p>
                <p> email : <span><?php echo $fetch_orders['email']; ?></span> </p>
                <p> address : <span><?php echo truncate_text($fetch_orders['address']); ?></span> </p>
                <p class="total-products"> total products :
                    <span><?php echo truncate_text($fetch_orders['total_products']); ?></span>
                    <?php if (strlen(truncate_text($fetch_orders['total_products'])) < strlen($fetch_orders['total_products'])) { ?>
                    <a href="#" onclick="expandText('<?php echo $fetch_orders['total_products']; ?>');">chi tiết</a>
                    <?php } ?>
                </p>
                <p> total price : <span>$<?php echo $fetch_orders['total_price']; ?></span> </p>
                <p> payment method : <span><?php echo $fetch_orders['method']; ?></span> </p>
                <div class="select-button">
                    <form action="" method="post">
                        <input type="hidden" name="order_id" value="<?php echo $fetch_orders['user_id']; ?>">
                        <select name="update_payment">
                            <option value="" selected disabled><?php echo $fetch_orders['payment_status']; ?></option>
                            <option value="pending">pending</option>
                            <option value="completed">completed</option>
                        </select>
                        <input type="submit" value="update" name="update_order" class="option-btn">
                        <a href="admin_order.php?delete=<?php echo $fetch_orders['user_id']; ?>"
                            onclick="return confirm('delete this order?');" class="delete-btn">delete</a>
                    </form>
                </div>
            </div>
            <?php
                }
            } else {
                echo '<p class="empty">Chưa có đơn hàng nào được đặt!</p>';
            }
            ?>
        </div>

    </section>

    <script>
    function expandText(fullText) {

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

    <!-- custom admin js file link  -->
    <script src="../../public/js/admin_script.js"></script>
</body>

</html>