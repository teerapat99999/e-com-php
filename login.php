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
   
    $email_user = $_POST['email_user'];
    $password_user = $_POST['password_user'];
  
    $stmt = $conn->prepare("SELECT * FROM users WHERE email_user = ? AND password_user = ?");
    $stmt->bind_param("ss", $email_user, $password_user);
 
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
  
    if($result->num_rows == 1){ 
        $_SESSION['id_user'] = $row['id_user'];
        header("Location: ./../index.php");
        exit();
    }else{    
        header("Location: ./login.php");
        exit();
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<style>
    a {
        text-decoration: none;
        color: black;
        border-radius: 12px;
    }
</style>

<body class="body">
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-sm-8 col-md-6 col-lg-4">
                <form action="./login.php" method="post">
                    <div class="card" id="card">
                        <div class="card-body">
                            <div class="mb-5" align="center">
                                <h3>Login</h3>
                            </div>
                            <div class="mb-4">
                                <input type="text" name="email_user" id="email_user" class="form-control" required
                                    placeholder="email">
                            </div>
                            <div class="mb-4">
                                <input type="password" name="password_user" id="password_user" class="form-control"
                                    required placeholder="รหัสผ่าน">
                            </div>
                            <div class="mb-4" align="center">
                                <input type="submit" value="เข้าสู่ระบบ" name='login' class="btn btn-success">
                            </div>
                        </form>
                            <div class="row">
                                <div class="col" align="left">
                                    <a class="btn" href="./adduser.php">ยังไม่ได้ลงทะเบียน</a>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</body>

</html>


