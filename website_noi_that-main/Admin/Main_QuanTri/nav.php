<!DOCTYPE html>
<html lang="vn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
    <link rel="stylesheet" href="../bootstrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Frontend/styleadmin.css">
    <title>BELLA VITA INTERIOR</title>
</head>
<body>
<?php
  session_start();
  $username = $_SESSION['ho_ten'];
?>
  <nav class="navbar bg-dark p-4">
    <div class="login d-flex"></div>
        <a href="#" class="d-flex align-items-center text-white text-decoration-none">
          <i class="fa-regular fa-circle-user" style="font-size: 30px;"></i>&emsp;
          <strong><?php echo $username ?></strong>
        </a>
      </li>
    </ul>
  </nav>
  <nav class="sidebar">
    <header>
      <div class="text header-text p-1">
        <span class="name">Bảng quản trị</span>
      </div>
    </header>
    <hr>
      <div class="menu">
        <ul class="nav nav-pills flex-column mb-auto">
          <li class="nav-link"><a href="../Bang_dieu_khien"><i class="fa-solid fa-gauge"></i>Bảng điều khiển</a></li>
          <li class="nav-link"><a href="../Quan_li_danh_muc"><i class="fa-solid fa-clipboard"></i>Quản lý danh mục</a></li>
          <li class="nav-link"><a href="../Quan_li_san_pham"><i class="fa-solid fa-bag-shopping"></i>Quản lý sản phẩm</a></li>
          <li class="nav-link"><a href="../Quan_li_hang"><i class="fa-solid fa-earth-americas"></i>Quản lý hãng</a></li>
          <li class="nav-link"><a href="../Quan_li_don_hang"><i class="fa-brands fa-shopify"></i>Quản lý đơn hàng</a></li>
          <li class="nav-link"><a href="../Quan_li_tai_khoan"><i class="fa-solid fa-users"></i>Quản lý tài khoản</a></li>
          <li class="nav-link"><a href="../../User/./TuyetLan"><i class="fa-solid fa-eye"></i>Xem website</a></li>
          <li class="nav-link"><a href="../../Admin/Main_QuanTri/logout_process.php"><i class="fa-solid fa-right-from-bracket"></i>Đăng xuất</a></li>
        </ul>
      </div>
  </nav>
  <script src="./bootstrap5/js/bootstrap.min.js"></script>
</body>
</html>