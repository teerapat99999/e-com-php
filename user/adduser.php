
<?php
include('./../config/db.php');
if(isset($_POST['sum'])){
    $email_user = $_POST['email_user'];
    $password_user = $_POST['password_user'];
    $fname_user = $_POST['fname_user'];
    $lname_user = $_POST['lname_user'];
    $address_user = $_POST['address_user'];
    $phone_user = $_POST['phone_user'];
    $status_user = 1 ;
    $type_user = 1 ;
    $img_user = $_FILES['img_user']['name'];
    $temp_name = $_FILES['img_user']['tmp_name'];

    move_uploaded_file($temp_name, './../img/img' . $img_user);
    
    $stmt = $conn->prepare("INSERT INTO users (email_user,password_user,fname_user , lname_user, address_user , phone_user , status_user , type_user , img_user) value (?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssssiis",$email_user,$password_user,$fname_user,$lname_user,$address_user,$phone_user,$status_user,$type_user,$img_user);

    if($stmt->execute()){
        header("location: ./login.php");
    }else{
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครสมาชิก</title>
    <link rel="stylesheet" href="login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</head>
<style>
    a {
        text-decoration: none;
        border-radius: 5px;
        color: white;
    }
    
</style>

<body class="body">
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-sm-8 col-md-6 col-lg-4">
                <form action="./adduser.php" method="post" enctype="multipart/form-data">
                    <div class="card" id="card">
                        <div class="card-body">
                            <div class="mb-5" align="center">
                                <h3>สมัครสมาชิก</h3>
                            </div>
                            <div class="mb-3">
                                <input type="text" id="email_user" name="email_user" placeholder="อีเมล" required
                                    class="form-control">
                            </div>
                            <div class="mb-3">
                                <input type="text" id="password_user" name="password_user" placeholder="รหัสผ่าน" required
                                    class="form-control">
                            </div>
                            <div class="mb-3">
                                <input type="text" id="fname_user" name="fname_user" placeholder="ชื่อจริง" required
                                    class="form-control">
                            </div>
                            <div class="mb-3">
                                <input type="text" id="lname_user" name="lname_user" placeholder="นามสกุล" required
                                    class="form-control">
                            </div>
                            <div class="mb-3">
                                <input type="text" id="address_user" name="address_user" placeholder="ที่อยู่" required
                                    class="form-control">
                            </div>
                            <div class="mb-3">
                                <input type="text" id="phone_user" name="phone_user" placeholder="เบอร์โทร" required
                                    class="form-control">
                            </div>
                            <div class="mb-3">
                                <input type="file" id="img_user" name="img_user" placeholder="ภาพโปรไฟล์" required
                                    class="form-control">
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-4">
                                        <input type="submit" value="สมัครสมาชิก" name="sum" class="btn btn-success">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-4">
                                        <a class="" href="./login.php">เข้าสู่ระบบถ้าสมัครสมาชิกแล้ว</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
