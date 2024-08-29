<head>
    <title>Quản lý hãng</title>
    <link rel="shortcut icon" type="image/png" href="../img/logo.png" />
</head>

<body>
    <?php
    include '../Main_QuanTri/nav.php'
    ?>
    <div class="content">
        <div class="accordion">
            <div class="accordion-item">
                <div class="container-fluid bg-secondary">
                    <div class="hstack gap-2 ">
                        <div class="p-2">
                            <h5>Quản lý hãng<h5>
                        </div>

                        <div class="p-2 ms-auto">
                            <a href="them_hang.php" class="btn btn-primary">Thêm</a>
                            <!-- <form action="them_hang.php" method="POST">
                                <button type="submit" class="btn btn-primary">Thêm</button>
                            </form> -->
                        </div>
                    </div>
                </div>
                <div class="accordion-body">
                    <form class="form-inline" action="index.php" method="GET">
                        <input class="" placeholder="Tên hãng" style="height: 35px;" name="search" type="text" />
                        <button class="btn bg-warning" type="submit" style="margin-top: -6px;">Tìm kiếm</button>
                    </form>
                    <br>
                    <?php

                    // Import kết nối CSDL
                    include '../Main_QuanTri/connect.php';

                    // Xử lý tìm kiếm
                    $search = isset($_GET['search']) ? $_GET['search'] : '';

                    // Truy vấn dữ liệu từ bảng hang_san_xuat
                    $query = "SELECT * FROM hang_san_xuat";
                    // Thêm điều kiện tìm kiếm nếu có tên hãng được nhập
                    if (!empty($search)) {
                        $query .= " WHERE ten_hang LIKE '%$search%'";
                    }
                    $result = mysqli_query($conn, $query);

                    // Kiểm tra xem có dữ liệu trả về hay không
                    if (mysqli_num_rows($result) > 0) {
                        echo '<table class="table table-bordered table-hover vertical-center">';
                        echo '<thead>';
                        echo '<tr>';
                        echo '<th>&nbsp;</th>';
                        echo '<th>&nbsp;</th>';
                        echo '<th>Tên hãng</th>';
                        echo '<th>Số điện thoại</th>';
                        echo '<th>Địa chỉ</th>';
                        echo '<th></th>';
                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td width="30px">' . $row['id'] . '</td>';
                            echo '<td width="60px;"><img src="' . $row['anh_dai_dien'] . '" alt="Ảnh đại diện" width="60px"></td>';
                            echo '<td>' . $row['ten_hang'] . '</td>';
                            echo '<td>' . $row['so_dien_thoai'] . '</td>';
                            echo '<td>' . $row['dia_chi'] . '</td>';
                            echo '<td style="width: 100px;" align="center"><a class="fa-solid fa-pen-to-square" href="sua_hang.php?id=' . $row['id'] . '"></a>&emsp;<a class="fa-solid fa-trash" href="xoa_hang.php?id=' . $row['id'] . '"></a></td>';
                            echo '</tr>';
                        }
                        echo '</tbody>';
                        echo '</table>';
                    } else {
                        echo 'Không có dữ liệu.';
                    }

                    // Đóng kết nối CSDL
                    mysqli_close($conn);

                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
