<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <?php
    include_once 'connect.php'; // nạp file kết nối database để truy suất dữ liệu
    ?>

</head>
<body>
       <!-- footer -->
       <div class="footer">
        <div class="row footer_line">
            <div class="col footer_menu mt-5 mb-5">
                <ul>
                    <li><h5>SẢN PHẨM</h5></li>
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

            <div class="col footer_menu mt-5 mb-5">
                <ul>
                    <li><h5>TRỢ GIÚP</h5></li>
                    
                    <li><a href="#">Hướng dẫn mua hàng </a></li>
                    <li><a href="#">Hướng dẫn thanh toán </a></li>
                    <li><a href="#">Chính sách mua hàng </a></li>
                    <li><a href="#">Chính sách đổi trả </a></li>
                    <li><a href="#">Chính sách giao hàng </a></li>
           
                </ul>

            </div>

            <div class="col footer_menu mt-5 mb-5">
                <ul>
                    <li><h5>VỀ CHÚNG TÔI</h5></li>
                    <li><a href="#">Trang Chủ</a></li>
                    <li><a href="#">Sản Phẩm</a></li>
                    <li><a href="#">Giới Thiệu</a></li>
                </ul>

            </div>
           
            <div class="col mt-5 mb-5 "> <h5>FANPAGE</h5></div>
            <div class="col mt-5 mb-5"><h5>THEO DÕI CHÚNG TÔI</h5></div>
        </div>
        <div class="footer_end"><p>@Copy right 2023, Designed by TLan</p></div>
    
</div>
</body>
</html>