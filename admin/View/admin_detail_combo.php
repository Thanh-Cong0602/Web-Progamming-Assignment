<?php 
include '../../config/config.php';
$id = $_GET['id'];
$get_product = mysqli_query($conn, "SELECT * FROM `combo_products` WHERE combo_id = '$id'") or die('query failed');
$detail_product = mysqli_fetch_array($get_product);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $detail_product['combo_name']; ?>
    </title>
    <link rel="stylesheet" href="../../public/css/admin.css">
</head>
<body>
    <?php include 'admin_header.php'; ?>
    <div class="detail-combo">
        <h1 class="combo-name">
            <?php echo $detail_product['combo_name']; ?>
        </h1>
        <div class="info-combo">
            <img class="combo-img" src="<?php echo $detail_product['image_combo']; ?>">
            <div class="info-combo-detail">
                <p class="description-combo">
                    <?php echo $detail_product['description']; ?>
                </p>
                <p class="price-combo">
                    Giá: <?php echo $detail_product['price']; ?> ₫
                </p>
            </div>
        </div>
        
        <div class="books-combo">
            <?php if (!empty($detail_product['image_1'])): ?>
                <p class="combo-name">Combo này gồm các sách</p>
                <di class="book-in-combo">
                        <img class="combo-book-img" src="<?php echo $detail_product['image_1']; ?>">
                    
                    <div class="info-book-combo">
                        <p class="name-book-combo">
                            <?php echo $detail_product['name_1']; ?>
                        </p>
                        <p class="description-book-combo">
                            <?php echo $detail_product['description_1']; ?>
                        </p>
                    </div> 
                </div>
            <?php endif; ?>
            <?php if (!empty($detail_product['image_2'])): ?>
                <div class="book-in-combo">
                    <img class="combo-book-img" src="<?php echo $detail_product['image_2']; ?>">
                    <div class="info-book-combo">
                        <p class="name-book-combo">
                        <?php echo $detail_product['name_2']; ?>
                        </p>
                        <p class="description-book-combo">
                            <?php echo $detail_product['description_2']; ?>
                        </p>
                    </div> 
                </div>
            <?php endif; ?>
            <?php if (!empty($detail_product['image_3'])): ?>
                <div class="book-in-combo">
                    <img class="combo-book-img" src="<?php echo $detail_product['image_3']; ?>">
                    <div class="info-book-combo">
                        <p class="name-book-combo">
                        <?php echo $detail_product['name_3']; ?>
                        </p>
                        <p class="description-book-combo">
                            <?php echo $detail_product['description_3']; ?>
                        </p>
                    </div> 
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>