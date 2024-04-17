<?php
session_start();
include('./db.php');
if(isset($_POST['add'])){
  if(isset($_SESSION['id_user'])){
  $id_user = $_SESSION['id_user'];
  $id_user =  $id_user ;
  $id_shop = $_POST['id_shop'];
  $name_product = $_POST['name_product'];
  $price_product = $_POST['price_product'];
  $img_product = $_POST['img_product'];
  $amount = $_POST['amount'];
  $stmt = $conn->prepare("INSERT INTO cart (id_user,name_product,price_product,img_product,amount,id_shop) value (?,?,?,?,?,?)");
  $stmt->bind_param("sssssi", $id_user,$name_product,$price_product,$img_product,$amount,$id_shop);
  
  if($stmt->execute()){
    echo "เพิ่มตระกร้าสำเร็จ";
    $_SESSION['id_user'] = $id_user;
  }else{
    echo "เกิดข้อผิดพลาด";
  }
}else{
  echo "ต้องสมัครสมาชิกหรือเข้าสู่ระบบก่อนซื้อสินค้า";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าแรก</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</head>
<body style="background-color:#f0f0f0;">
    <?php include('./navbar.php'); ?>
    <div class="mt-5"></div>
    <div class="container">
        <div id="" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner" style="max-height:300px;">
              <div class="carousel-item active">
                <img src="./img/g7.jpg" class="" alt="...">
              </div>
              <div class="carousel-item">
                <img src="./img/g6.jpg" class="" alt="...">
              </div>
              <div class="carousel-item">
                <img src="./img/g7.jpg" class="" alt="...">
              </div>
        </div>
        <div style="height:80px;"></div>
        <div class="row" align='center'>
            <?php 
            $sql = "SELECT * FROM type_product";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {
            ?>  
            <div class="col-sm-6 col-md-4 col-lg-2"> 
              <div class="mb-3">
                 <a href="./homepage.php?id=<?php echo $row['id_type']; ?>" style='text-decoration: none; color:black;'>
                  <div class="card">
                    <img src="./img/<?php echo $row['img_type']; ?>" class="card-img-top" style=" max-height:100px;" alt="">
                    <div class="card-body">
                        <h4><?php echo $row['name_type'] ?></h4>
                    </div>
                 </div>
                </a>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="md-4">
          <div class="card">
            <div class="card-body">
               <h2 align='left'>สินค้าทั้งหมด</h2>
               <div class="mt-3"></div>
               <div class="row">
               <?php 
               $result = $conn->query("SELECT * FROM product_shop ");
               while($row = $result->fetch_assoc()){
               ?>
               <div class="col-sm-8 col-md-6 col-lg-4" style='' align='center'>
                <div class="mb-3">
                  <div class="card">
                    <img src="./img/<?php echo $row['img_product']; ?>" style='max-height:200px;' alt="">
                  <div class="card-body">
                     <h4>ราคา <?php echo $row['price_product']; ?> บาท </h4>
                     <h5> จำนวนที่เหลือ <?php echo $row['amount'] ?> ชิ้น </h5>
                    <form action="" method="post">
                       <input type="hidden" name="name_product" value=" <?php echo $row['name_product']; ?>">
                       <input type="hidden" name="price_product" value="<?php echo $row['price_product']; ?>">
                       <input type="hidden" name="img_product" value="<?php echo $row['img_product']; ?>">
                       <input type="hidden" name="id_shop" value='<?php echo $row['id_shop']; ?>'>
                       <input type="number" name="amount" value='1' min='1'  class='form-control' id="">
                       <div class="mt-2">
                       <input type="submit" value="เพิ่มลงตระกร้า" name='add'  class="btn btn-success">
                       </div>
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
    </div>
</body>
</html>
