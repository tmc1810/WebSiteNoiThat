<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php
    include_once 'connect.php'; // nạp file kết nối database để truy suất dữ liệu
    ?>





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

<style>
    
        
</style>
</head>
<?php
    session_start();

    if (!isset($_SESSION['visits'])) {
        $_SESSION['visits'] = 1;
    } else {
        $_SESSION['visits']++;
    }
?>
<body>
    <div style = "  background-color: rgba(255,0,0,0.3)" >
        <!-- header -->
    <div class="gioithieu">
      
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
                  <li><a href="tranglienhe.php">LIÊN HỆ</a></li>
              </ul>
          </div>
          <div class="col nav_icon" > 
              <ul class="d-flex">
              <li>
              <form action="trangsanpham.php" class = "d-flex">
              <input name="Search" type="text" placeholder="Tìm kiếm"> 
              <button style="background-color:rgba(0,0,0,0.001); color:white;border:none;"  type="submit"><i class='bx bx-search'></i> </button>    
              </form>
              </li>  

                  <li><a href="cart.php"><i class='bx bx-cart-alt' ></i></a></li>
                  <li><a href="../Thong_Tin_Ca_Nhan/thongtincanhan.php"><i class='bx bx-user'></i></a></li>
              </ul>
          </div>

          <!--Page1-->
          <div class="name">
              <div>
                  <p class="bella">BELLA VITA</p> 
                  <p>I N T E R I O R</p>
              </div>
              
          </div>
          
      </div>
      </div>
  </div>

            
    <!-- gioithieu -->
   <div class="gioithieu1">
    <div class=" container">
        <div class="row">
            <!-- gioithieu_left -->
            <div class="col-7">
                <!-- tittle -->
                <div class ="name_GT d-flex">
                    <h3 class="name_number">01</h3>
                    <h3 class="ml-5 mb-3">GIỚI THIỆU</h3>
                </div>
                <!-- text -->
                <div>
                    <p class="ml-5 gioithieu1_left_text">Công ty TNHH Nội Thất Bella Vita Interior là doanh nghiệp chuyên sản xuất, kinh doanh các sản phẩm nội thất bằng gỗ. Kể từ khi thành lập đến nay, cùng với những nỗ lực không ngừng trong quá trình sản xuất kinh doanh, Luôn đặt lợi ích của khách hàng làm tiêu chí hoạt động. Công ty đã tạo cho mình được chỗ đứng vững chắc, được khách hàng tín nhiệm. Cùng với đội ngũ nhân viên giỏi về chuyên môn, năng động trong công việc.Bella Vita Interior hứa hẹn sẽ mang đến sự hài lòng cho quý khách.</p>
                    <button class="ml-5 gioithieu2_left_button"> <a href="#">TÌM HIỂU THÊM</a> </button>
                </div>
                <!-- end -->
                <div class=" ml-5 mr-5 mt-4 gioithieu1_left_end row">
    
                    <div class="col">
                        <h1 style="font-size: 60px;">10</h1>
                        <p>Hơn 10 năm kinh nghiệm trong nghành</p>
                    </div>

                    <div class="col">
                        <h1 style="font-size: 60px;">20</h1>
                        <p>Hơn 10 năm kinh nghiệm trong nghành</p>
                    </div>
                    
                    <div class="col">
                        <h1 style="font-size: 60px;">88%</h1>
                        <p>Hơn 10 năm kinh nghiệm trong nghành</p>
                    </div>
                    
                </div>


            </div>
            <!-- gioithieu_right -->
            <div class="col">
                <img src="https://lan.nanoweb.vn/mediacenter/media/images/945/intro/ava/s700_0/session-2548826640-1569901845.jpg" alt="">
            </div>
        </div>
    </div>
   </div>
    <!-- sanpham -->
    <div class="sanpham mt-5">
        <div class="container"> 
            <div class="row ">
                <div class="name_SP d-flex mt-5">
                    <h3 class="name_number2">02</h3>
                    <h3 class="ml-5">SẢN PHẨM</h3>
                </div>
            </div>
        
        <!-- anh1 -->
        <div class="row">
                <?php 
                $sql = "SELECT * FROM danh_muc";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $count = 0; // Đếm sản phẩm đã hiển thị
                    while ($row = $result->fetch_assoc()) { 
                        if ($count % 3 == 0 && $count != 0) { // Đóng hàng sau khi hiển thị 3 sản phẩm
                            echo '</div><div class="row">';
                        }
                ?>
                    <div class="item col-4">
                        <div>
                            <a href='trangsanpham.php?ID_DM=<?=$row["id"]?>'>
                                <img style="width:360px"; src='../../Admin/Quan_li_danh_muc/<?=$row["anh_danh_muc"]?>' alt='anh <?=$row["ten_danh_muc"]?>'>
                            </a>
                        </div>
                        <div class="item_content">
                            <h3><?=$row["ten_danh_muc"]?></h3>
                        </div>
                    </div>
                    
                <?php
                        $count++;
                    }
                } else {
                    echo "Không có dữ liệu.";
                }
                ?>
        </div>


        </div>    
    </div>   

     <!-- sản phẩm tiêu biểu -->
      
     
        <div class="sanpham">
            <div class="container"> 
                
                <div class="row">
                    <div class="name_SP d-flex ">
                        <h3 class="name_number2">03</h3>
                        <h3 class="ml-1">SẢN PHẨM TIÊU BIỂU</h3>
                    </div>
        
                </div>
                <!-- slide -->
                <div id="carouselExampleControls" class="carousel slide mt-5" data-ride="carousel">
                    <div class="carousel-inner">
                    <div class="carousel-item  active" data-interval="5000"
                    >
                        <img class="d-block w-100" src="https://lan.nanoweb.vn/mediacenter/media/images/945/news/ava/s500_500/can-ho-duplex-penthouse-1570849544.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item" data-interval="10000"
                    >
                        <img class="d-block w-100" src="https://lan.nanoweb.vn/mediacenter/media/images/945/news/ava/s500_500/phong20ngu20hop20phong20thuy20cho20tuoi20196820mau20than2031-1570849634.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item" data-interval="10000"
                    >
                        <img class="d-block w-100" src="https://lan.nanoweb.vn/mediacenter/media/images/945/news/ava/s500_500/4bdyxmd-1571016111.png" alt="Third slide">
                    </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                    </a>
                </div>
            
            
            </div>
        </div>
    </div>
        </div>
     <!-- footer -->
     <?php
     include_once 'footer.php';
     ?>
    
    </div>
</body>
</html>