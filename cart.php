<?php 
session_start();
include('./db.php');
$id_user = $_SESSION['id_user'];
if(isset($_POST['addstatus'])){

}
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
</head>
<body>
    <?php include('./navbar.php'); ?>
    <div class="container-fluid">
        <div style='height:150px;'></div>
        <div class="row justify-content-center aling-item-center">
            <div class="col-sm-12 col-md-8 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <?php $result = $conn->query("SELECT * FROM cart WHERE id_user = $id_user"); 
                        while($row = $result->fetch_assoc()){
                        ?>
                        <form action="" method="post">
                        <div class="mb-2">
                        <div class="row justify-content-center">
                            <div class="col">
                                <img src="./img/<?php echo $row['img_product']; ?>" style='max-height:100px; max-width:110px;' class='' alt="">
                            </div>
                            <div class="col">
                                <h5>ชื่อสินค้า <?php echo $row['name_product']; ?> </h5>
                            </div>
                            <div class="col">
                                <h5>ราคา <?php echo $row['price_product']; ?> บาท </h5>
                            </div>
                            <div class="col">
                                <h5>จำนวน <?php echo $row['amount']; ?> หน่วย/ชิ้น</h5>
                            </div>
                            <div class="col">
                                <input type="text" name='phone' class="form-control" placeholder = 'เบอร์โทร' require>
                            </div>
                            <div class="col">
                                <input type="text" name='address' class="form-control" placeholder = 'ที่อยู่' require>
                            </div>
                            <div class="col">
                            <input type="submit" value="สั่งซื้อ" name='addstatus' class="btn btn-success">
                            </div>
                            <div class="col">
                                <input type="text" name='del' class="btn btn-close">
                            </div>
                        </div>
                        </div>
                        </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>