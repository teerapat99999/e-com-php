<?php 
include('./../config/db.php');

if(isset($_POST['submit'])) {
    $email_shop = $_POST['email_shop'];
    $password_shop = $_POST['password_shop'];
    $name_shop = $_POST['name_shop'];
    $phone_shop = $_POST['phone_shop'];
    $status_shop = 1;
    $type_shop = 1;
    $img_shop = $_FILES['img_shop']['name'];
    $temp_name = $_FILES['img_shop']['tmp_name'];

    move_uploaded_file($temp_name, './../img/' . $img_shop);

    $stmt = $conn->prepare("INSERT INTO users (email_shop, password_shop, name_shop, phone_shop, img_shop, status_shop, type_shop) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssi", $email_shop, $password_shop, $name_shop, $phone_shop, $img_shop, $status_shop, $type_shop);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครสมาชิกร้าน</title>
    <link rel="stylesheet" href="./../user/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
        <style>
            a {
                text-decoration: none;
                border-radius: 5px;
                color: white;
            }
            
        </style>
</head>
<body class="body">
    <div class="container">
        <div style="height: 200px;"></div>
        <div class="row justify-content-center aling-item-center" >
            <div class="col-sm-8 col-md-6 col-lg-4" >
                <div class="card shadow" id="card">
                    <div class="card-body">
                        <div class="mb-5" align="center">
                            <h3>สมัครสมาชิกร้าน</h3>
                        </div>
                        <form action="./addshop.php" method="post" enctype = "multipart/form-data">
                            <div class="mb-3">
                                <input type="email" name="email_shop" id="email_shop" class="form-control" placeholder="อีเมล">
                            </div>
                            <div class="mb-3">
                                <input type="text" name="password_shop"  id="password_shop" class="form-control" placeholder="รหัสผ่าน">
                            </div>
                            <div class="mb-3">
                                <input type="text" name="name_shop" id="name_shop" class="form-control" placeholder="ชื่อร้าน">
                            </div>
                            <div class="mb-3">
                                <input type="text" name="phone_shop" id="phone_shop" class="form-control" placeholder="เบอร์โทรร้าน">
                            </div>
                            <div class="mb-3">
                                <input type="file"  name="img_shop" id="img_shop" class="form-control">
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-4" align="left">
                                        <input type="submit" value="สมัครสมาชิก"  class="btn btn-success">
                                    </div>
                                </div>
                                <div class="col">
                                   <div class="mb-4" align="">
                                      <a style="text-decoration: none; border-radius: 20px;" class="" href="./login.php">เข้าสู่ระบบ</a>
                                   </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>