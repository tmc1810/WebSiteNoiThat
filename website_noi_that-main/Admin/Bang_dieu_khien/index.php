<head>
    <link rel="shortcut icon" type="image/png" href="../img/logo.png" />
</head>

<body>
    <?php
        include '../Main_QuanTri/nav.php'
    ?>
    <div class="content">
        <div class="container pt-5">
            <div style="border: 2px solid; width: 1350px; padding: 20px;">
                <?php
                    include '../Main_QuanTri/connect.php';

                    $sql = "SELECT tong_hoa_don, trang_thai FROM don_hang";
                    $result = $conn->query($sql);
                    $totalPrice = 0;
                    if ($result->num_rows > 0) {
                    $totalPrice = 0;

                    while ($row = $result->fetch_assoc()) {
                        if($row['trang_thai'] == "Hoàn thành")
                        {
                            $totalPrice += $row["tong_hoa_don"];
                        }
                    }

                    } else {
                        echo "Không tìm thấy dữ liệu";
                    }

                    function formatPrice($totalPrice) {
                        if ($totalPrice >= 1000 && $totalPrice < 1000000) {
                            return number_format($totalPrice / 1000) .  'k';
                        } else if($totalPrice >= 1000000 && $totalPrice < 1000000000){
                            return number_format($totalPrice / 1000000) . "tr" ;
                        }

                        else if($totalPrice >= 1000000000 && $totalPrice < 1000000000000){
                            return number_format($totalPrice / 1000000000) . "tỷ" ;
                        }
                    }
                    // Đóng kết nối đến cơ sở dữ liệu
                    $conn->close();
                ?>
                <div style="position: absolute;background-color: yellow; width: 600px; height: 300px;border-radius: 30px;z-index:1;">
                    <p style="font-size:170px;padding: 80px;" class="fa-solid fa-sack-dollar"></p>
                    <table style="margin-top: -300px;margin-left: 270px;font-size: 30px;">
                        <tr>
                            <th>Tổng doanh thu</th>
                        </tr>

                        <tr>
                            <td style="font-size: 100px;"><span>~</span><?php echo formatPrice($totalPrice); ?></td>
                        </tr>
                    </table>
                </div>

                <?php
                    include '../Main_QuanTri/connect.php';
                    // Truy vấn để lấy số lượng tài khoản với cấp bậc "khách"
                    $sql = "SELECT COUNT(*) AS total FROM user WHERE cap_bac = 'Khách'";
                    $result = $conn->query($sql);

                    if ($result->num_rows == 1) {
                        $row = $result->fetch_assoc();
                        $soLuongKhach = $row['total'];
                    }

                    // Đóng kết nối đến cơ sở dữ liệu
                    $conn->close();
                ?>
                <div style="background-color: #DC143C;width: 600px; height: 300px;z-index:2;border-radius: 30px;margin-left: 700px;">
                    <a href="../Quan_li_tai_khoan" style="color: black;font-size:170px;padding: 70px;" class="fa-regular fa-user"></a>
                    <table style="margin-top: -280px;margin-left: 260px;font-size: 30px;">
                        <tr>
                            <th>Người dùng đăng ký</th>
                        </tr>

                        <tr>
                            <td style="font-size: 150px;" align="center"><?php echo $soLuongKhach;?></td>
                        </tr>
                    </table>
                </div>
                
                <br><br>

                <?php
                    include '../Main_QuanTri/connect.php';

                    // Truy vấn để lấy số lượng tài khoản với cấp bậc "khách"
                    $sql = "SELECT COUNT(*) AS total FROM don_hang WHERE trang_thai != 'Hoàn thành'";
                    $result = $conn->query($sql);

                    if ($result->num_rows == 1) {
                        $row = $result->fetch_assoc();
                            $soDonHang = $row['total'];
                    }

                    // Đóng kết nối đến cơ sở dữ liệu
                    $conn->close();
                ?>
                <div style="position: absolute;background-color: #1E90FF; width: 600px; height: 300px;z-index:1;border-radius: 30px;">
                    <a href="../Quan_li_don_hang" style= "color: black; text-decoration: none; font-size:170px;padding: 60px;" class="fa-solid fa-cart-shopping"></a>
                    <table style="margin-top: -260px; margin-left: 290px; font-size: 30px;">
                        <tr>
                            <th>Số lượng đơn hàng</th>
                        </tr>

                        <tr>
                            <td style="font-size: 150px;" align="center"><?php echo $soDonHang; ?></td>
                        </tr>
                    </table>
                </div>

                <?php
                    if (isset($_SESSION['visits'])) {
                        $visits = $_SESSION['visits'];
                    } else {
                        $visits = 0;
                    }
                ?>
                <div style="background-color:#3CB371; width:600px;height: 300px;z-index:2;border-radius: 30px;margin-left: 700px;">
                    <p style="font-size:170px;padding: 60px;" class="fa-solid fa-users"></p>
                    <table style="margin-top: -280px;margin-left: 300px;font-size: 30px;">
                        <tr>
                            <th>Truy cập website</th>
                        </tr>
                        
                        <tr>
                            <td style="font-size: 150px;" align="center"><?php echo $visits; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>