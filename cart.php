<?php 
session_start();
include('./db.php');
if(isset($_SESSION['id_user'])){
$id_user = $_SESSION['id_user'];
if(isset($_POST['addstatus'])){
    $id_or = rand();
    $name_product = $_POST['name_product'];
    $price_product = $_POST['price_product'];
    $amount = $_POST['amount'];
    $img_product = $_POST['img_product'];
    $id_user = $id_user;
    $id_shop = $_POST['id_shop'];
    $id_cart = $_POST['id_cart'];
    $id_product = $_POST['id_product'];
    
    $stmt = $conn->prepare("INSERT INTO status_or (id_or,name_product,price_product,amount,img_product,id_user,id_shop) value (?,?,?,?,?,?,?)");
    $stmt->bind_param("issssii",$id_or,$name_product,$price_product,$amount,$img_product,$id_user,$id_shop);
    $stmt->execute();

    $stmt = $conn->prepare("UPDATE product_shop SET amount = amount - ? WHERE id_product = ?");
    $stmt->bind_param("ii", $amount, $id_product);
    $stmt->execute();
    
    $delete = $conn->prepare("DELETE FROM cart  WHERE id_cart = ? ");
    $delete->bind_param("i",$id_cart);
    $delete->execute();
}
if(isset($_POST['del'])){
    $id_cart = $_POST['id_cart'];
    $stmt = $conn->prepare("DELETE FROM cart WHERE id_cart = ? ");
    $stmt->bind_param("i",$id_cart);
    $stmt->execute();
}
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
        <div style='height:130px;'></div>
        <div class="row justify-content-center aling-item-center">
            <div class="col-sm-12 col-md-8 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <?php if(isset($id_user)){ ?>
                        <?php $result = $conn->query("SELECT * FROM cart WHERE id_user = $id_user");
                        if($result->num_rows > 0 ){ 
                        while($row = $result->fetch_assoc()){
                        ?>
                        <form action="" method="post">
                        <div class="mb-2">
                        <div class="row justify-content-center" align='center'>
                            <div class="col">
                                <img src="./img/<?php echo $row['img_product']; ?>" style='max-height:150px; max-width:150px;' class='' alt="">
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
                            <div class="col-1">
                            <input type="hidden" name="name_product" value='<?php echo $row['name_product']; ?>'>
                            <input type="hidden" name="price_product" value='<?php echo $row['price_product']; ?>'>
                            <input type="hidden" name="amount" value='<?php echo $row['amount']; ?>'>
                            <input type="hidden" name="img_product" value='<?php echo $row['img_product']; ?>'>
                            <input type="hidden" name="id_product" value='<?php echo $row['id_product']; ?>'>
                            <input type="hidden" name="id_shop" value='<?php echo $row['id_shop']; ?>'>
                            <input type="hidden" name="id_cart" value='<?php echo $row['id_cart']; ?>'>
                            <input type="submit" value="สั่งซื้อ" name='addstatus' class="btn btn-success">
                            </div>
                            <div class="col-2" >
                                <input type="hidden" name="id_cart" value= '<?php echo $row['id_cart']; ?>'>
                                <input type="submit" name='del' value='' class="btn btn-close">
                            </div>
                        </div>
                        </div>
                        </form>
                        <?php }
                        }else echo"ไม่มีสินค้า";
                        }else{
                            echo "ไม่ได้สมัครสมาชิก";
                        } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5"></div>
        <div class="row justify-content-center aling-item-center">
            <div class="col-sm-12 col-md-8 col-lg-6">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row">
                        <?php
                        if(isset($id_user)){
                        $status = $conn->query("SELECT * FROM status_or WHERE id_user = $id_user");
                        while($row = $status->fetch_assoc()){
                        ?>
                        <div class="col-sm-8 col-md-6 col-lg-4">
                            <div class="mb-2">
                            <div class="card">
                                <img src="./img/<?php echo $row['img_product']; ?>" style='max-height:120px; '  alt="">
                                <div class="card-body">
                                    <h5> ชื่อสินค้า <?php echo $row['name_product']; ?></h5>
                                    <h5> ราคาต่อชิ้น <?php echo $row['price_product']; ?> บาท </h5>
                                    <h5>จำนวน <?php echo $row['amount']; ?></h5>
                                    <h5>สถานะ <?php 
                                    if($row['status_or'] == '0'){
                                        echo  "รอร้านยืนยันสินค้า";
                                    }elseif($row['status_or'] == '1'){
                                        echo "กำลังจัดส่ง";
                                    }
                                    ?> </h5>
                                </div>
                            </div>
                            </div>
                        </div>
                        <?php }
                    } ?>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>