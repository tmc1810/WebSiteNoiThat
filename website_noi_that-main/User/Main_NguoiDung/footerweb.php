<?php
    include '../Main_NguoiDung/connect.php'; // nạp file kết nối database để truy suất dữ liệu
?>
<footer>
    <div class="container-fluid" style="padding:15px;">
        <div class="list">
            <ul class="nav justify-content-lg-center">
                <ul class="nav flex-column">
                    <li class="nav-item"><h5>SẢN PHẨM</h5></li>
                    <?php 
                        $sql = "SELECT * FROM danh_muc";
                        $result = $conn->query($sql);// đây là phần thực hiện truy vấn
                        if ($result->num_rows > 0) { // nếu dữ liệu có thì ta sử dụng while để duyệt qua từng hàng (có thể sử dụng foreach)
                            while ($row = $result->fetch_assoc()) 
                        { // Sử dụng biến $row 
                    ?>
                    <li class="nav-item"><a href="#"><?=$row["ten_danh_muc"]?></a></li>
                    <?php
                            }
                            } else {
                                echo "Không có dữ liệu.";
                            }
                        ?>
                </ul>

                <ul class="nav flex-column">
                    <li class="nav-item"><h5>TRỢ GIÚP</h5></li>
                    <li class="nav-item"><a href="#">Hướng dẫn mua hàng</a></li>
                    <li class="nav-item"><a href="#">Hướng dẫn thanh toán</a></li>
                    <li class="nav-item"><a href="#">Hướng dẫn đổi trả</a></li>
                    <li class="nav-item"><a href="#">Chính sách giao hàng</a></li>
                </ul>

                <ul class="nav flex-column">
                    <li><h5>VỀ CHÚNG TÔI</h5></li>
                    <li><a href="tranggioithieu.php">Giới thiệu</a></li>
                    <li><a href="#">Tin tức</a></li>
                </ul>

                <ul class="nav flex-column">
                    <li class="nav-item"><h5>FANPAGE</h5></li>
                    <li class="nav-item"><img src="./img/fanpage.png" width="100%"></li>
                </ul>

                <ul class="nav flex-column">
                    <li class="nav-item"><h5>THEO DÕI CHÚNG TÔI</h5></li>
                    <li class="nav-item"><img src="./img/follow.png" width="100%"></li>
                </ul>
            </ul>
        </div><br>
        <hr style="color: #E8B85B;">
        <center><h6 style="color: #FFF; margin-top:30px;">@Copy right 2023</h6></center>
    </div>
</footer>