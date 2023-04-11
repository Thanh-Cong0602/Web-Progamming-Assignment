<?php

include '../../config/config.php';

session_start();

// $admin_id = $_SESSION['admin_id'];

// if (!isset($admin_id)) {
//     header('location:../../app/View/loginForm.php');
// }

if (isset($_POST['update_order'])) {
    $order_update_id = $_POST['order_id'];
    $update_payment = $_POST['update_payment'];
    mysqli_query($conn, "UPDATE `orders` SET payment_status = '$update_payment' WHERE id = '$order_update_id'") or die('query failed');
    $message[] = 'Updated!!!';
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `orders` WHERE id = '$delete_id'") or die('query failed');
    header('location:admin_order.php');
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
                        <p> address : <span><?php echo $fetch_orders['address']; ?></span> </p>
                        <p> total products : <span><?php echo $fetch_orders['total_products']; ?></span> </p>
                        <p> total price : <span>$<?php echo $fetch_orders['total_price']; ?>/-</span> </p>
                        <p> payment method : <span><?php echo $fetch_orders['method']; ?></span> </p>
                        <div class="select-button">
                            <form action="" method="post">
                                <input type="hidden" name="order_id" value="<?php echo $fetch_orders['id']; ?>">
                                <select name="update_payment">
                                    <option value="" selected disabled><?php echo $fetch_orders['payment_status']; ?></option>
                                    <option value="pending">pending</option>
                                    <option value="completed">completed</option>
                                </select>
                                <input type="submit" value="update" name="update_order" class="option-btn">
                                <a href="admin_order.php?delete=<?php echo $fetch_orders['id']; ?>" onclick="return confirm('delete this order?');" class="delete-btn">delete</a>
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



    <!-- custom admin js file link  -->
    <script src="../../public/js/admin_script.js"></script>
</body>

</html>