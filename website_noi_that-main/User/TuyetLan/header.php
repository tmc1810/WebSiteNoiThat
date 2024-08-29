<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

        <!--link bootstrap-->
        <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>


    <!--link boxicon-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- link css -->
    <link rel="stylesheet" href="style.css">





</head>
<body>
    <!-- header -->
    <div class="gioithieu_header" style = "background-color: rgba(0,0,0,0.8);">
      
      <div class = "container  " >
      <div class="row nav" >
          <div class="col">
              <img src="https://lan.nanoweb.vn/mediacenter/media/images/945/logo/logo-1569903399.png" alt="anh_logo">
          </div>
          <div class="col-6 menu">
              <ul class="d-flex">
                  <li> <a href="index.php">TRANG CHỦ</a> </li>
                  <li><a href="trangsanpham.php">SẢN PHẨM</a></li>
                  <li><a href="tranggioithieu.php">GIỚI THIỆU</a></li>
                  <li><a href="#">TIN TỨC</a></li>
                  <li><a href="./tranglienhe.php">LIÊN HỆ</a></li>
              </ul>
          </div>
          <div class="col nav_icon" > 
              <ul class="d-flex">
              <li>
              <form action="trangsanpham.php" class = "d-flex">
              <input name="Search" type="text" placeholder="Tìm kiếm"> 
              <button style="background-color:rgba(0,0,0,0.001); color:white;border:none;" type="submit"><i class='bx bx-search'></i> </button>
        
              </form>

              </li>  
                 
                  


                  <li><a href="cart.php"><i class='bx bx-cart-alt' ></i></a></li>
                  <li><a href="../Thong_Tin_Ca_Nhan/thongtincanhan.php"><i class='bx bx-user'></i></a></li>
              </ul>
          </div>

          
          
      </div>
      </div>
  </div>
</body>
</html>