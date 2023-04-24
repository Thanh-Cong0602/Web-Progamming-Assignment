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
    <title>Complete Book Store Online Website</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../../public/css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

    <!-- custom js file link  -->
    <script src="../../public/js/script.js" defer></script>

</head>

<body>

    <?php include 'header.php'; ?>
    <!-- banner section starts  -->
    <div class="cart_banner">
        <div class="banner">

            <div class="content" data-aos="zoom-in-up" data-aos-delay="500">
                <h3>COMBO SÁCH HAY</h3>
                <p><a href="./home.php">Trang chủ</a>
                    <i class="fas fa-arrow-right"></i>
                    Combo sách hay
                </p>
            </div>

        </div>
    </div>
    <!-- banner section ends -->

    <!-- products section starts  -->

    <section class="product" id="product" data-aos="fade-up" data-aos-delay="500">
        <div class="box-container ">
            <?php
             $per_page = 8;
             $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
             $start = ($page - 1) * $per_page;
             $select_combo_products = mysqli_query($conn, "SELECT * FROM `combo_products` ORDER BY `date` ASC") or die('query failed');
             if (mysqli_num_rows($select_combo_products) > 0) {
                while ($fetch_combo_products = mysqli_fetch_assoc($select_combo_products)) {
            ?>

            <?php 
            $total_products = mysqli_query($conn, "SELECT COUNT(*) AS total FROM `combo_products`") or die('query failed');
            $total_products = mysqli_fetch_assoc($total_products)['total'];
            $total_pages = ceil($total_products / $per_page);
            // Xác định trang hiện tại
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            // Tạo URL cho các trang
            $url = "http://localhost:3000/app/View/shop.php?page=";
            // Tính toán giới hạn của LIMIT trong câu truy vấn SQL
                $offset = ($current_page - 1) * $per_page;
              // Truy vấn sản phẩm trong cơ sở dữ liệu với LIMIT và OFFSET
              $select_combo_products = mysqli_query($conn, "SELECT * FROM combo_products ORDER BY date ASC LIMIT $per_page OFFSET $offset") or die('query failed');    
             if (mysqli_num_rows($select_combo_products) > 0) {
                while ($fetch_combo_products = mysqli_fetch_assoc($select_combo_products)) {
            ?>
                    <form method="post" action="../Controllers/cartController.php">
                        <div class="box combo_box" data-aos="fade-up" data-aos-delay="300">
                            <div class="image">
                                <img src="<?php echo $fetch_combo_products['image_combo']; ?>" alt="">
                            </div>
                            <div class="content">
                                <h3><?php echo $fetch_combo_products['combo_name']; ?></h3>
                                <a href="detail_combo_book.php?get_id=<?php echo $fetch_combo_products['combo_id']; ?>">Xem thêm<i class="fas fa-angle-right"></i></a>
                            </div>
                            <div class="purchase">
                                <h3><?php echo $fetch_combo_products['price']; ?>
                                    <span class="rate">₫</span></h3>
                                <input type="hidden" name="product_quantity" value="1">
                                <input type="hidden" name="product_name" value="<?php echo $fetch_combo_products['combo_name']; ?>">
                                <input type="hidden" name="product_price" value="<?php echo $fetch_combo_products['price']; ?>">
                                <input type="hidden" name="product_image" value="<?php echo $fetch_combo_products['image_combo']; ?>">
                                <button type="submit" name="add_to_cart">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </div>
                        </div>
                    </form>

            <?php
                }
            }
            ?>
            <nav aria-label="Page navigation example" class="toolbar toolbar_combo">
            <ul class="pagination justify-content-center d-flex flex-wrap">
                <li class="page-item <?php echo ($current_page <= 1) ? 'disabled' : ''; ?>">
                <a class="page-link" href="<?php echo $url . ($current_page - 1); ?>" tabindex="-1">Previous</a>
                </li>
                <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                <li class="page-item <?php echo ($i == $current_page) ? 'active' : ''; ?>">
                <a class="page-link" href="<?php echo $url . $i; ?>"><?php echo $i; ?></a>
                </li>
                <?php endfor; ?>
                <li class="page-item <?php echo ($current_page >= $total_pages) ? 'disabled' : ''; ?>">
                <a class="page-link" href="<?php echo $url . ($current_page + 1); ?>">Next</a>
                </li>
            </ul>
            </nav>
            ?>
            <?php
            }
        }
            else {
                echo '<p class="empty">no products added yet!</p>';
            }
            ?>
        </div>


    </section>


    <?php include 'footer.php'; ?>

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