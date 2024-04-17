<?php 
include('./db.php');
session_start();
$id_user = $_SESSION['id_user'];
if(isset($_POST['add'])){
    $id_sum = rand();
    $name_product = $_POST['name_product'];
    $price_product =  $_POST['price_product'];
    $amount = $_POST['amount'];
    $img_product = $_POST['img_product'];
    $id_user = $_POST['id_user'];
    $id_shop = $_POST['id_shop'];

    $stmt = $conn->prepare("INSERT INTO  ");
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
<body>
    <?php include('./navbar.php'); ?>
    <div class="container">
        <div style='height:90px;'></div>
        <div class="row justify-content-center aling-item-center">
            <div class="col-sm-12 col-md-8 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-center aling-item-center">
                        <?php 
                        
                        $result = $conn->query("SELECT * FROM cart WHERE id_user = $id_user");
                        if($result->num_rows > 0){
                        $sum = 0 ;
                        while($row = $result->fetch_assoc()){
                        $total  = $row['price_product'] * $row['amount'];
                        $sum += $total;   
                        ?>
                        <div class="col-sm-12 col-md-8 col-lg-6">
                        <div class="mb-3">
                                <div class="card">
                                    <img src="./img/<?php echo $row['img_product']; ?>" style='max-height:150px;' alt="">
                                    <div class="card-body">
                                    <h5> ชื่อสินค้า <?php echo $row['name_product']; ?> </h5>
                                    <h5> ราคา <?php echo $row['price_product']; ?> บาท </h5>
                                    <h5>จำนวน <?php echo $row['amount']; ?> หน่วย/ชิ้น </h5>
                                    <div class='col' align='center'>
                                        <input type="text" value='ลบ' name='del' class="btn btn-danger">
                                    </div>
                                </div>
                                </div>
                        </div>
                        </div>
                        <?php }
                        ?>
                        <div class="col-sm-12 col-md-8 col-lg-6">
                            <div class="mb-3" align='center'>
                                <div class="card">
                                    <div class="card-body">
                                    <h5> ราคารวม <?php echo $sum ?> บาท </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 
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