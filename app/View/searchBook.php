<?php
include '../../config/config.php';
$user_id = $_COOKIE['user_id'];
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search Products</title>

  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- custom css file link  -->
  <link rel="stylesheet" href="../../public/css/style.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

  <!-- custom js file link  -->
  <script src="../../public/js/script.js" defer></script>
  <style>
        .blackboard {
            position: relative;
            width: 640px;
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
            content: "Search Products";
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

        input[type="submit"] {
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

        ::selection {
            background: rgba(238, 238, 238, 0.4);
            color: rgba(238, 238, 238, 0.3);
            text-shadow: none;
        }
    </style>
</head>

<body>
  <?php include 'header.php'; ?>
  <!-- banner section starts  -->
  <div class="cart_banner">
    <div class="banner">

      <div class="content" data-aos="zoom-in-up" data-aos-delay="300">
        <h3>Tìm kiếm</h3>
        <p><a href="./home.php">Trang chủ</a>
          <i class="fas fa-arrow-right"></i>
            Tìm kiếm
        </p>
      </div>

    </div>
  </div>
  <!-- banner section ends -->

<!-- ################# SEARCH PRODUCTs ############## -->
<form action="" method="post">
        <div>
            <div class="blackboard">
                <div class="form">
                    <hr>
                    <p>
                        <label for="searchby">Tìm kiếm sản phẩm&emsp;</label>
                        <select name="searchby">
                            <option value="products.name">Tên sách</option>
                            <option value="products.author">Tên tác giả</option>
                            <!-- <option value="category.cat_name">Category</option>
                            <option value="book.keywords">Keywords</option> -->
                        </select>
                    </p>
                    <br>
                    <p>
                        <label for="name">Tìm kiếm&emsp;&emsp;&ensp;</label>
                        <input type="text" name="name" placeholder="Nhập nội dung tìm kiếm" />
                    </p><br>
                    <p class="wipeout">
                        <span style="float: left; margin-left: 10%">
                            <input type="submit" name="search" value="Tìm kiếm:-" />
                        </span>
                        <span style="float: right; margin-right: 10%">
                            <input type="submit" value="Xóa:-" />
                        </span><br>
                    </p>
                </div>
            </div>
        </div>
    </form>

    <br>
        

    <section class="product" id="product" data-aos="fade-up" data-aos-delay="500">
        <div class="box-container search-book">
            <?php
            $sql_products = null;
            if (isset($_POST['search'])) {
                $_POST['name'] = addslashes($_POST['name']);
                if (!empty($_POST['name'])) {
                    $sql_products = mysqli_query($conn, "SELECT products.* FROM `products` WHERE {$_POST['searchby']} LIKE '%{$_POST['name']}%'") or die('query failed');
                }
                if ($sql_products && $sql_products->num_rows > 0) {
                    while ($fetch_products_sql = mysqli_fetch_assoc($sql_products)) {
            ?>
                 <form method="post" action="../Controllers/cartController.php"> 
                    <div class="box" data-aos="fade-up" data-aos-delay="300">
                        <div class="image"> 
                            <img src="<?php echo $fetch_products_sql['image']; ?>" alt="">
                        </div>
    
                        <div class="content">
                        <h3><?php echo $fetch_products_sql['name']; ?></h3>
                        <a href="detail_book.php?get_id=<?php echo $fetch_products_sql['product_id']; ?>">Xem thêm<i class="fas fa-angle-right"></i></a>
                        </div>
                        <div class="purchase">
                            <h3>
                                <?php echo $fetch_products_sql['price'];?>
                                <span class="rate">₫</span></h3>
                            </h3>
                            <input type="hidden" name="product_quantity" value="1">
                            <input type="hidden" name="product_name" value="<?php echo $fetch_products_sql['name']; ?>">
                            <input type="hidden" name="product_price" value="<?php echo $fetch_products_sql['price']; ?>">
                            <input type="hidden" name="product_image" value="<?php echo $fetch_products_sql['image']; ?>">
                            <button type="submit" value="Tìm kiếm" name="add_to_cart">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </form>
            <?php
                    }
                } else {
                    echo '<p class="empty">Không tìm thấy sản phẩm</p>';
                }
            }
            ?>

        </div>

    </section>
    <!-- ############################ -->

   
    <?php include 'banner.php'; ?>
<?php include 'footer.php'; ?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    AOS.init({
    duration: 800,
    offset:150,
});
</script>    
</body>

</html>