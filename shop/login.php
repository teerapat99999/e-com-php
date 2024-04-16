<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if(isset($_POST['login'])){
   
    $email_user = $_POST['email_shop'];
    $password_user = $_POST['password_shop'];
  
    $stmt = $conn->prepare("SELECT * FROM shop WHERE email_shop = ? AND password_shop = ?");
    $stmt->bind_param("ss", $email_user, $password_user);
 
    $stmt->execute();
    $result = $stmt->get_result();
  
    if($result->num_rows == 1){
        $row = $result->fetch_assoc();
        header("Location: ./homepage.php");
        $_SESSION['id_shop'] = $row['id_shop'];
    }else{    
        header("Location: ./login.php");
    }
}

$conn->close();
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
       <div style="height: 250px;"></div>
        <div class="row justify-content-center aling-content-center">
            <div class="col-sm-8 col-md-6 col-lg-4">
                <div class="card" id="card">
                    <div class="card-body">
                        <div class="mb-5">
                            <h3 align="center">login</h3>
                        </div>
                        <form action="./login.php" method="post">
                        <div class="mb-3">
                            <input type="text" name='email_shop' id='email_shop' class="form-control" placeholder="อีเมล" >
                        </div>
                        <div class="mb-3">
                            <input type="text" name='password_shop' id='password_shop' class="form-control" placeholder="รหัสผ่าน">
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <input align='center' type="submit" name='login' value="เข้าสู่ระบบ" class='btn btn-success'>
                                </div>
                                </form>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <a  href="./addshop.html">สมัครสมาชิก</a>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


