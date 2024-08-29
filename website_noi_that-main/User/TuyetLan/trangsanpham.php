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

    <!-- link css -->
    <link rel="stylesheet" href="style.css">

    <!--link boxicon-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style>
        .gioithieu_header {
        height: 130px;
        background-color: rgba(0,0,0,0.8);
        }
        .danhmucsp ul li a {
            color:black;
            text-decoration: none;
        }
        .danhmucsp ul li {
            list-style: none;
            line-height: 3;
        }
        .danhmucsp ul li:hover a {
        color: #bb8b44;
        }
        .listspbanchay p a {
            color:black;
            text-decoration: none;
        }
        .listspbanchay  {
            justify-content: center;
            align-items: center;
        }
        .listspbanchay p {
            margin-bottom: 0;
            
        }
        #cars {
            display: flex;
            justify-content: flex-end;
        }
        .imgsp {
            height: 180px;
            width: 250px;
        }
    </style>
</head>
<body style = "background-color: rgba(255,0,0,0.3)">
    <!-- header -->
    <?php
    include_once 'header.php';
    ?>
    <div >
    <!-- content -->
     <div class="sanpham mt-5">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <!-- danhmucsanpham-->
                    <div class="danhmucsp">
                        <h3 class="SP_title">DANH MỤC SẢN PHẨM</h3>
                        <ul>
                        <?php 
                        $sql = "SELECT * FROM danh_muc";
                        $result = $conn->query($sql);// đây là phần thực hiện truy vấn
                        if ($result->num_rows > 0) { // nếu dữ liệu có thì ta sử dụng while để duyệt qua từng hàng (có thể sử dụng foreach)
                            while ($row = $result->fetch_assoc()) 
                        { // Sử dụng biến $row 
                    ?>
                            <li><a href='trangsanpham.php?ID_DM=<?=$row["id"]?>'><?=$row["ten_danh_muc"]?></a></li>
                            <?php
                            }
                            } else {
                                echo "Không có dữ liệu.";
                            }
                        ?>
 
                           
                        </ul>

                    </div>
                    <!-- sanphambanchay -->
                    <div class="spbanchay">
                        <h3 class="SP_title">SẢN PHẨM BÁN CHẠY</h3>
                        <div class="listspbanchay d-flex ">
                            <a href="#" ><img src="https://cdn.nanoweb.vn/mediacenter/media/images/945/products/945/1/s100_100/bgd-1809tresult-1569924272.png" alt="ghế xanh"></a>
                           <div>
                                <p> <a href="#">Ghế lưới xanh 12.000.000 Đ </a></p> 
                                <p><i>Mã sản phẩm BV9917</i></p>
                                <p style="color:red">300.000Đ</p>
                           </div>
                            
                        </div>
                        <div class="listspbanchay d-flex">
                            <a href="#"><img src="https://cdn.nanoweb.vn/mediacenter/media/images/945/products/945/1/s100_100/6-bgd2410f5result-1569924226.jpg" alt=""></a>
                            
                            <div>
                                <p> <a href="#">Ghế lưới xanh 12.000.000 Đ </a></p> 
                                <p><i>Mã sản phẩm BV9917</i></p>
                                <p style="color:red">300.000Đ</p>
                           </div>
                        </div>
                    </div>
                </div>

                <!-- sanpham right -->
                <div class="col">
                    <!-- sanpham1 -->



                    <div class="row mt-4 d-flex">
                        <?php
                        if (isset($_GET['Search'])) {
                            $search = $_GET['Search'];
                            $sql = "SELECT * FROM san_pham WHERE ten_san_pham LIKE '%$search%'";
                        } else if (isset($_GET['ID_DM'])) {
                            $sql = "SELECT * FROM san_pham WHERE ma_danh_muc = " . $_GET["ID_DM"];
                        } else {
                            $sql = "SELECT * FROM san_pham";
                        }
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                // Kiểm tra nếu số lượng sản phẩm lớn hơn 0 thì hiển thị
                                if ($row["so_luong"] > 0) {
                                    ?>
                                    <div class="col-4">
                                        <a href='trangchitietsp.php?ID=<?=$row["id"]?>'><img class="imgsp" src="../../Admin/Quan_li_san_pham/<?=$row["anh_thumbnail"]?>" alt="anh <?=$row["ten_san_pham"]?>"></a>
                                        <p><?=$row["ten_san_pham"]?></p>
                                        <p style="color:red"><?=$row["gia_ban"]?> <span>đ</span></p>
                                    </div>
                                <?php
                                }
                            }
                        } else {
                            echo "Không có dữ liệu.";
                        }
                        ?>
                    </div>

                

            </div>
        </div>
    </div>
     </div>
    <!-- footer -->
    <?php
     include_once 'footer.php';
     ?>

</body>
</html>