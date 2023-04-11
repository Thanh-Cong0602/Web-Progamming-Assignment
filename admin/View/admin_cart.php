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
    <title> Thông tin sách đã order </title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../../public/css/admin.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

    <!-- custom js file link  -->
    <script src="../../public/js/script.js" defer></script>



</head>

<body>
    <?php include 'admin_header.php'; ?>

    <!-- List product section starts  -->
    <section class="listcart" id="listcart" data-aos="zoom-in-up" data-aos-delay="600">
        <h1>Danh sách sản phẩm</h1>
        <table>
            <thead>
                <tr>
                    <th style="padding-left:2rem;">Tên sản phẩm</th>
                    <th style="padding-left:2rem;">Đơn giá</th>
                    <th style="width: 12rem;">Số lượng</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $grand_total = 0;
                $select_cart = mysqli_query($conn, "SELECT * FROM `cart` ") or die('query failed');
                if (mysqli_num_rows($select_cart) > 0) {
                    while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                        $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
                        $grand_total += $total_price;
                        echo "
                    <tr>
                        <td>$fetch_cart[product_name]</td>
                        <td>$fetch_cart[price]<span>₫</span></td>
                        <td>$fetch_cart[quantity]</td>
                    </tr>
                ";
                        ?>
                    <?php }
                }
                ?>
            </tbody>
        </table>
        <div class="grand-total" style="color:#000"> Tổng số tiền cần thanh toán : <span>
                <?php echo $grand_total; ?>₫
            </span> </div>
    </section>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <?php include '../View/alert.php'; ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            offset: 150,
        });
    </script>
</body>

</html>