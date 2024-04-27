<?php 
session_start();
include('./../config/db.php');
$id_shop = $_SESSION['id_shop'];
?>
<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</head>
<body>
    <div class="contariner"  align='center'>
        <?php include('./navbar.php'); ?>
        <div style='height:100px;'></div>
        <div class="row justify-content-center aling-item-center">
            <div class="col-sm-12 col-md-8 col-lg-6">
                <div class="card">
                    <div class="mt-2">
                    <h2>สินค้าภายในร้าน</h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        <?php $result = $conn->query("SELECT * FROM product_shop WHERE id_shop = $id_shop"); 
                        while($row = $result->fetch_assoc()){
                        ?>
                        <div class="col-sm-8 col-md-6 col-lg-4">
                            <div class="card">
                                <img src="./../img/<?php echo $row['img_product']; ?>" style='max-height:150px;' alt="">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h4><?php echo $row['name_product']; ?></h4>
                                    </div>
                                    <div class="card-text">
                                        <p> ราคา <?php echo $row['price_product']; ?> บาท </p>
                                        <p>จำนวนที่เหลือ <?php  echo $row['amount']; ?> ชิ้น </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>