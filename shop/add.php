<?php 
session_start();
include('./../config/db.php');
$idshop = $_SESSION['id_shop'];
if(isset($_POST['add'])){
    $name_pro = $_POST['name_product'];
    $price_pro = $_POST['price_product'];
    $amount = $_POST['amount'];
    $id_shop = $idshop;
    $type_pro = $_POST['type_product'];
    $img_pro = $_FILES['img_product']['name'];
    $temp_name = $_FILES['img_product']['tmp_name'];

    move_uploaded_file($temp_name, './../img/' . $img_pro);

    $stmt = $conn->prepare("INSERT INTO product_shop (name_product, price_product, amount, id_shop, type_product, img_product) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiiis", $name_pro, $price_pro, $amount, $id_shop, $type_pro, $img_pro);

    if($stmt->execute()){
        echo "เพิ่มสินค้าสำเร็จ";
    }else{
        echo "ไม่สำเร็จ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./../user/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</head>
<body>
    <div class="contariner">
        <?php include('./navbar.php'); ?>
        <div style='height:10vh;'></div>
        <?php ?>
        <div class="row justify-content-center align-item-center">
            <div class="col-sm-12 col-md-8 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-2">
                                <input type="text" name='name_product' class="form-control" placeholder="Product Name">
                            </div>
                            <div class="mb-2">
                                <input type="text" name='price_product' class="form-control" placeholder="Price">
                            </div>
                            <div class="mb-2">
                                <input type="text" name='amount' class="form-control" placeholder="Amount">
                            </div>
                            <div class="mb-2">
                                <select name="type_product" class='form-select' id="">
                                    <?php 
                                    $result = $conn->query("SELECT * FROM type_product");
                                    while($row = $result->fetch_assoc()){
                                    ?>
                                    <option value="<?php echo $row['id_type']; ?>"><?php echo $row['name_type']; ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-2">
                                <input type="file" name="img_product" class='form-control' id="">
                            </div>
                            <div class="mb-4">
                                <input type="submit" value="Add Product"  name='add' class='btn btn-success '>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
