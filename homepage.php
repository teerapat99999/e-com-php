<?php 
session_start();
include('./config/db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</head>
<body>
    <?php include('./navbar.php'); ?>
    <div class="container">
        <div style='height:100px;'></div>
        <div class="row justify-content-center aling-item-center" >
            <div class="col-sm-12 col-md-8 col-lg-6">
                <div class="card">
                    <div class="card-body">
                     <div class="row">
                        <?php
                        $id_type = $_GET['id'];
                        $result = $conn->query("SELECT * FROM product_shop WHERE type_product = $id_type");
                        if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                        ?>
                       <div class="col-sm-12 col-md-8 col-lg-6">
                        <div class="mb-3">
                        <div class="card">
                            <img src="./img/<?php echo $row['img_product']; ?>" style='max-height:200px;' alt="">
                            <div class="card-body">
                                <h4> ชื่อสิ้นค้า <?php echo $row['name_product']; ?></h4>
                                <h5> ราคา <?php echo $row['price_product']; ?> บาท </h5>
                                <h5> จำนวนที่เหลือ <?php echo $row['amount']; ?></h5>
                            </div>
                        </div>
                        </div>
                       </div>
                        <?php }
                        }else{
                            echo "ไม่มีสินค้า";
                        } ?>
                     </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>