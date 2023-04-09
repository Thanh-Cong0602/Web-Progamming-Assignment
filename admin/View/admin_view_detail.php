<?php 
include '../../config/config.php';
$id = $_GET['id'];
$get_product = mysqli_query($conn, "SELECT * FROM `products` WHERE product_id = $id") or die('query failed');
$detail_product = mysqli_fetch_array($get_product);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $detail_product['name'];?></title>
</head>
<body>
    <div class="info-book">
        <img src="<?php echo $detail_product['image'];?>" alt="">
        <div>
            <h1><?php echo $detail_product['name'];?></h1>
            <p><?php echo $detail_product['author'];?></p>
        </div>
    </div>
    
</body>
</html>