<?php 
session_start();
include('./../config/db.php');
$id_shop = $_SESSION['id_shop'];
if(isset($_POST['add'])){
    $id_or = $_POST['id_or'];
    $stmt = $conn->prepare("UPDATE status_or  SET status_or = 1 WHERE id_or = $id_or ");
    $stmt->execute();
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
        <div style='height:130px;'></div>
        <div class="row justify-content-center aling-item-center">
            <div class="col-sm-12 col-md-8 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                        <?php 
                        $result = $conn->query("SELECT * FROM status_or  WHERE id_shop = $id_shop");
                        while($row = $result->fetch_assoc()){
                        ?>
                        <div class="col-sm-12 col-md-8 col-lg-6">
                            <div class="mb-3">
                                <div class="card">
                                    <img src="./../img/<?php echo $row['img_product']; ?>" style='max-height:150px;' alt="">
                                    <div class="card-body">
                                        <h5> รหัส <?php echo $row['id_or']; ?></h5>
                                        <h5> ชื่อสินค้า <?php echo $row['name_product']; ?></h5>
                                        <h5> ราคา <?php echo $row['price_product']; ?> บาท </h5> 
                                        <h5> จำนวน <?php echo $row['amount'] ?> หน่วย</h5>
                                        <h5> สถานะ <?php 
                                        if($row['status_or'] == 0 ){
                                            echo "ไม่ได้ยืนยัน";
                                        }elseif($row['status_or'] == 1){
                                            echo "กำลังส่ง";
                                        }
                                        ?></h5>
                                        <form action="" method="post">
                                        <input type="hidden" name="id_or" value='<?php echo $row['id_or']; ?>'>
                                        <input type="submit" value="ยืนยัน"  name='add' class="btn btn-success">
                                        </form>
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