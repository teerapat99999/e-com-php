
<nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav" >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" href="./index.php">หน้าแรก</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./user/adduser.php">สมัครสมาชิก</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./shop/addshop.php">สมัครสมาชิกร้าน</a>
              </li>
              <li class="nav-item">
                <a href= "./cart.php" class='nav-link'>สถานะการสั่งซื้อ</a>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control " type="search" placeholder="Search" >
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <div class="m-2">
            <a href="./logout.php"><button class='btn btn-danger' >ออกจากระบบ</button></a>
            </div>
          </div>  
        </div>
    </nav> 