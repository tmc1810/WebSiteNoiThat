<head>
    <title>Quản lý đơn hàng</title>
    <link rel="shortcut icon" type="image/png" href="../img/logo.png" />
</head>

<body>
    <?php   
        include '../Main_QuanTri/nav.php';
        include '../Main_QuanTri/connect.php';


        $tim_kiem_ma_don_hang = "";
        $tim_kiem_ten_khach_hang = "";


        if(isset($_GET['tim_kiem_ma_don_hang'])){
            if($_GET['tim_kiem_ma_don_hang']!=""){
                $tim_kiem_ma_don_hang = $_GET['tim_kiem_ma_don_hang'];
            }
        }
        if(isset($_GET['tim_kiem_ten_khach_hang'])){
            if($_GET['tim_kiem_ten_khach_hang']!=""){
                $tim_kiem_ten_khach_hang = $_GET['tim_kiem_ten_khach_hang'];
            }
        }
    ?>
    <div class="content">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <div class="container-fluid bg-secondary">
                    <div class="hstack gap-2 ">
                        <div class="p-2"><h5>Quản lý đơn hàng<h5></div>
                    </div>
                </div>
                <div class="accordion-body">
                    <div class="search-active-form" style="position: relative; margin-top: 10px;">
                        <div class="form-search">
                            <form action="index.php" method="get">  
                                <input placeholder="Mã đơn hàng" name="tim_kiem_ma_don_hang" style="height:35px;" type="text" value="" />  
                                <input placeholder="Khách hàng" name="tim_kiem_ten_khach_hang" style="height:35px;" type="text" maxlength="100" /> 
                                <button class="btn bg-warning" type="submit" >Tìm kiếm</button> 
                                
                            <br><br>
                            <table class="table table-bordered table-hover vertical-center">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Khách hàng</th>
                                        <th>Thời gian tạo</th>
                                        <th>Trạng thái</th>
                                        <th>Tổng cộng</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        // $sql = "SELECT * FROM don_hang";
                                        $sql = "SELECT * FROM don_hang WHERE id like '%$tim_kiem_ma_don_hang%' AND ho_ten like '%$tim_kiem_ten_khach_hang%'";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            // Lặp qua mỗi hàng dữ liệu
                                            while ($row = $result->fetch_assoc()) {
                                                if ($row['trang_thai'] !== "Hoàn thành") {
                                                    echo '<tr>';
                                                        echo '<td name="ma_don_hang";>' . $row['id'] . '</td>';
                                                        $id_don_hang = $row['id'];
                                                        echo '<td>' . $row['ho_ten'] . '</td>';
                                                        echo '<td>' . $row['thoi_gian_dat_hang'] . '</td>';
                                                        echo '<td>' . $row['trang_thai'] . '</td>';
                                                        echo '<td>' . number_format($row['tong_hoa_don']). ' đ'; '</td>';
                                                        echo "<td style='width: 100px;' align='center'><a class='fa-solid fa-pen-to-square' href='sua_donhang.php?id_don_hang=" . $row["id"] . "'></a>&ensp;
                                                                                        <a class='fa-solid fa-trash' href='xoa_don_hang_process.php?id_don_hang=" . $id_don_hang . "'></a>
                                                        </td>";
                                                    echo '</tr>';
                                                }
                                            }
                                        } else {
                                            echo "Không có dữ liệu.";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>