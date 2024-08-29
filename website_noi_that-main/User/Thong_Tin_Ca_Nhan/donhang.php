<?php
session_start();
?>
<head>
    <link rel="shortcut icon" type="image/png" href="../img/logo.png" />
    <title>BELLA VITA INTERIOR</title>
</head>

<body>
        <div style="position: absolute;width: 1000px;height: 400px;background-color: #FFF; margin-left: 600px;margin-top: 150px;">
            <h2 style="font-weight: 400;">Đơn hàng</h2>
            <hr>
            <table>
                <table class="table table-bordered table-hover vertical-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Thời gian tạo</th>
                            <th>Trạng thái đơn hàng</th>
                            <th>Ghi chú</th>
                            <th>Tổng cộng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include '../Main_NguoiDung/connect.php';
                            $id_nguoi_dung = $_SESSION['id'];
                            $sql = "SELECT * FROM don_hang WHERE user_id = $id_nguoi_dung";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // Lặp qua mỗi hàng dữ liệu
                                foreach($result as $each){
                                        echo '<tr>';
                                            echo '<td name="ma_don_hang";>' . $each['id'] . '</td>';
                                            echo '<td>' . $each['thoi_gian_dat_hang'] . '</td>';
                                            echo '<td>' . $each['trang_thai'] . '</td>';
                                            echo '<td>' . $each['ghi_chu'] . '</td>';
                                            echo '<td>' . number_format($each['tong_hoa_don']). ' đ'; '</td>';
                                        echo '</tr>';
                                }
                            } else {
                                echo "Không có dữ liệu.";
                            }
                        ?>
                    </tbody>
                </table>
            </table>
        </div>
    <?php 
        include 'formthongtin.php';
    ?>
</body>