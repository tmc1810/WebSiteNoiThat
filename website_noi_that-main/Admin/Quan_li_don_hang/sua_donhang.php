<head>
    <title>Sửa đơn hàng</title>
    <link rel="shortcut icon" type="image/png" href="../img/logo.png" />
</head>

<body>
    <?php
    include '../Main_QuanTri/nav.php';
    include '../Main_QuanTri/connect.php';
    ?>
    <div class="content">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <div class="container-fluid bg-secondary">
                    <div class="hstack gap-2 ">
                        <div class="p-2">
                            <h5>Sửa đơn hàng</h5>
                        </div>
                    </div>
                </div>
                <div class="accordion-body">
                    <b style="position: fixed;font-size: 16px;color:#FFF;padding: 2px;text-align: center;background-color: #82af6f;;width: 700px; height: 30px;margin-left: 400px;">Thông tin người nhận hàng</b>
                    <ul style="position: fixed;margin-left: 400px;margin-top: 40px;font-size: 18px;">
                        <?php
                        $id_don_hang = $_GET['id_don_hang'];
                        $sql = "SELECT * FROM don_hang WHERE id = '$id_don_hang' limit 1";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            // Lặp qua mỗi hàng dữ liệu
                            while ($row = $result->fetch_assoc()) {
                                echo '<li> Tên: ' . $row['ho_ten'] . '</li>';
                                echo '<li> Địa chỉ: ' . $row['dia_chi'] . '</li>';
                                echo '<li> Số điện thoại: ' . $row['so_dien_thoai'] . '</li>';
                                echo '<li> Email: ' . $row['email'] . '</li>';
                            }
                        } else {
                            echo "Không có dữ liệu.";
                        }
                        ?>
                    </ul>


                    <form action="#" method="post">
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Trạng thái:</label>
                            <div class="col-sm-10">
                                <select class="span10 col-sm-12" name="trang_thai" style="margin-left: -110px;height:40px; width: 150px;">
                                    <option value="Chờ xử lý">Chờ xử lý</option>
                                    <option value="Hoàn thành">Hoàn thành</option>
                                </select>
                            </div>
                        </div>

                        <table class="table table-bordered table-hover vertical-center" style="margin-top: 150px;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Mã sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá sản phẩm</th>
                                    <th>Tổng cộng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                        // Lấy thông tin được gửi từ biểu mẫu
                                        $trang_thai = $_POST["trang_thai"];

                                        // Query SQL để cập nhật thông tin tài khoản
                                        $sql = "UPDATE don_hang SET trang_thai='$trang_thai' WHERE id = '$id_don_hang'";
                                        mysqli_query($conn, $sql);
                                        echo "<script> window.location.href='index.php';</script>";
                                    }

                                    $sql2 = "SELECT * FROM chi_tiet_don_hang WHERE ma_don_hang = '$id_don_hang'";
                                    $result2 = mysqli_query($conn, $sql2);
                                    if ($result2->num_rows > 0) {
                                        // Lặp qua mỗi hàng dữ liệu
                                        foreach($result2 as $each){
                                            echo '<tr>';
                                            echo '<td name="ma_don_hang";>' . $each['id'] . '</td>';
                                            $ma_sp = $each['ma_san_pham'];
                                            $sql_ten_san_pham = "SELECT ten_san_pham FROM san_pham WHERE id = '$ma_sp' limit 1";
                                            $res = mysqli_query($conn, $sql_ten_san_pham);
                                            $res = mysqli_fetch_array($res);
                                            $ten_sp = $res['ten_san_pham'];
                                            echo '<td>' . $ten_sp . '</td>';
                                            echo '<td>' . $each['ma_san_pham'] . '</td>';
                                            echo '<td>' . $each['so_luong']. '</td>';
                                            echo '<td>' . $each['gia_ban'] . '</td>';
                                            $tong_tien = $each['gia_ban']*$each['so_luong'];
                                            echo '<td>' . $tong_tien.'đ'.'</td>';
                                        echo '</tr>';
                                        }
                                    } else {
                                        echo "Không có dữ liệu.";
                                    }
                                    mysqli_close($conn);
                                    ?>
                            </tbody>
                        </table>
                        <div class="control-group form-group buttons">
                            <input class="btn btn-primary" id="btnAddCate" type="submit" value="Cập nhật" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>