<?php 
include_once('./db.php');
session_start();
$id_user = $_SESSION['id_user'];
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
        <div style='height:200px;'></div>
        <div class="row justify-content-center aling-item-center">
            <div class="col-sm-12 col-md-8 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                        <?php 
                        $result = $conn->query("SELECT * FROM cart WHERE id_user = $id_user");
                        if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                        ?>
                        <div class="col">
                        <div class="mb-3">
                                <div class="card">
                                    <img src="./img/<?php echo $row['img_product']; ?>" style='max-height:150px;' alt="">
                                    <div class="card-body">
                                        <h4><?php echo $row['name_product']; ?></h4>
                                    <h4><?php echo $row['price_product']; ?></h4>
                                    </div>
                                </div>
                        </div>
                        </div>
                        <?php }
                        }else{
                            echo "ไม่มีสินค้าในตระกร้า";
                        } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>