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

<!-- SELECT * FROM san_pham WHERE ID = 1 -->

<style>
    .ctsp .muangay {
        background-color: #edcd8e;
        color:white;
        
        width: 250px;
       
    }
    .ctsp .muangay:hover{
        background-color: white;
        color: #edcd8e;
    }
    .ctsp button {
        border: 2px solid #edcd8e;
        color:#edcd8e;
        height: 60px;
        width: 60px;
        margin-left: 10px;
        margin-top: 20px;
    }
    .gioithieu_header {
        height: 130px;
        background-color: rgba(0,0,0,0.8);
        }
    

</style>

</head>
<body style = "  background-color: rgba(255,0,0,0.3)">
<!-- header -->
    <?php
    include_once 'header.php';
    ?>

    <div >
    <!-- content -->
   <div class="container mt-5">
    <!-- sanphamchitiettop -->


   
    <form action="cart.php"method="post"> 
    <div class="d-flex">
        <!-- left -->
        <?php
            $sql = "SELECT * FROM  san_pham WHERE id = ".$_GET["ID"];
            $result = $conn->query($sql);// đây là phần thực hiện truy vấn
            if ($result->num_rows > 0) { // nếu dữ liệu có thì ta sử dụng while để duyệt qua từng cột (có thể sử dụng foreach)
                while ($row = $result->fetch_assoc()) 
            { // Sử dụng biến $row 
        ?>
        <div>
            <img style="height=500px; width: 600px"; src="../../Admin/Quan_li_san_pham/<?=$row["anh_thumbnail"]?>" alt="anh <?=$row["ten_san_pham"]?>">
        </div>
        <!-- right -->
        <div class="ml-4">
            <p style="font-size: 25px;"> <b><?=$row["ten_san_pham"]?></b> </p>
            <p style="font-size: 25px;"> <b>Giá: <?=$row["gia_ban"]?> </span><sup>đ</sup></b> </p>
            <label>Số Lượng</label>
            <input  name="soluong"  type="number" min="1"  max="<?= $row["so_luong"]?>" value="1">
            <input style = "display: none;"  name="ID"  type="number" value="<?=$row["id"]?>">
            <div class="ctsp">
                <button type="submit" class="muangay">MUA NGAY</button>
                <button  type="submit"><i class='bx bx-cart-add'></i></button>
            </div>
            <?php
        ?>
        </div>
    </div>
    </form>
    <!-- chitietsp -->
    <div class="mota mt-4">
        <h3>MÔ TẢ</h3>
        <ul>
            <li><?=$row["mo_ta_san_pham_chi_tiet"]?></li>
        </ul>
    </div>
    <?php
            }
            } else {
                echo "<h3>Không có dữ liệu.</h3>";
            }
        ?>
    <!-- sanphamkhac -->
    <div></div>

   </div>
        </div>
     <!-- footer -->
    <?php
    include_once 'footer.php';
    ?>


</body>
</html>