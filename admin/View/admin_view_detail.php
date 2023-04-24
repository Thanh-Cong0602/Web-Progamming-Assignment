<?php
include '../../config/config.php';
$id = $_GET['id'];
$get_product = mysqli_query($conn, "SELECT * FROM `products` WHERE product_id = '$id'") or die('query failed');
$detail_product = mysqli_fetch_array($get_product);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/hung.css">
    <link rel="stylesheet" href="../../public/css/admin.css">
    <title>
        <?php echo $detail_product['name']; ?>
    </title>
</head>

<body>
    <?php include 'admin_header.php'; ?>
    <div class="detail-book">
        
        <div class="info-book">
            <img src="<?php echo $detail_product['image']; ?>" alt="" class="info-book-img">
            <div class="info-book-detail">
                <h1 class="info-book-detail-name">
                    <?php echo $detail_product['name']; ?>
                </h1>
                <p class="info-book-detail-author">Tác giả:
                    <?php echo $detail_product['author']; ?>
                </p>
                <p class="info-book-detail-publisher">Nhà xuất bản:
                    <?php echo $detail_product['publiser']; ?>
                </p>
                <p class="info-book-detail-supplier">Nhà cung cấp:
                    <?php echo $detail_product['supplier']; ?>
                </p>
                <p class="info-book-detail-price">Giá:
                    <?php echo $detail_product['price']; ?>₫
                </p>
            </div>
        </div>
        <p class="info-book-detail-description">
            <b>Mô tả về sách:</b> <br/>
            <?php echo $detail_product['description']; ?>
        </p>
        <a href="./admin_product.php" class="admin-return-product">Quay lại</a>
        
    </div>


</body>

</html>