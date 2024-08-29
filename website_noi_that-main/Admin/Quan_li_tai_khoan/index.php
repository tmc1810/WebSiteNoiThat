<head>
    <title>Quản lý tài khoản</title>
    <link rel="shortcut icon" type="image/png" href="../img/logo.png" />
</head>

<body>
    <?php
        include '../Main_QuanTri/nav.php'
    ?>


    <div class="content">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <div class="container-fluid bg-secondary">
                    <div class="hstack gap-2 ">
                        <div class="p-2">
                            <h5>Quản lý tài khoản</h5>
                        </div>
                        <div class="p-2 ms-auto"><a href="them_taikhoan.php" class="btn btn-primary">Thêm</a></div>
                    </div>
                </div>
                <div class="accordion-body">
                    <form class="form-inline" id="searchForm" method="get">
                    <input class="" placeholder="id" style="height:35px;" name="search_id" id="search_id" type="text" />
                        <input class="" placeholder="Họ Tên" style="height:35px;" name="search_name"
                            id="search_name" type="text" maxlength="100" />

                        <input class="" placeholder="email" style="height:35px;" name="search_email"
                            id="search_email" type="text" maxlength="100" />
                        <button class="btn bg-warning" type="submit">Tìm kiếm</button>
                    </form>
                    <br>
                    <!-- Bảng dữ liệu -->
                    <table class="table table-bordered table-hover vertical-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Họ tên</th>
                                <th>Mật khẩu</th>
                                <th>Email</th>
                                <th>Giới tính</th>
                                <th>Cấp bậc</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Kết nối đến cơ sở dữ liệu
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "noi_that";

                            $conn = new mysqli($servername, $username, $password, $dbname);

                            if ($conn->connect_error) {
                                die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
                            }

                            $sql = "SELECT id, ho_ten, mat_khau, email, gioi_tinh, cap_bac FROM user";

                            // Xử lý tìm kiếm nếu có dữ liệu tìm kiếm
                            if (isset($_GET['search_id']) || isset($_GET['search_name']) || isset($_GET['search_email'])) {
                                $search_id = $_GET['search_id'];
                                $search_name = $_GET['search_name'];
                                $search_email = $_GET['search_email'];
                                //$search_sex = $_GET['search_sex'];

                                if (!empty($search_id)) {
                                    $sql .= " WHERE id = '$search_id'";
                                }

                                if (!empty($search_name)) {
                                    if (strpos($sql, 'WHERE') !== false) {
                                        $sql .= " AND ho_ten LIKE '%$search_name%'";
                                    } else {
                                        $sql .= " WHERE ho_ten LIKE '%$search_name%'";
                                    }
                                }

                                if (!empty($search_email)) {
                                    if (strpos($sql, 'WHERE') !== false) {
                                        $sql .= " AND email LIKE '%$search_email%'";
                                    } else {
                                        $sql .= " WHERE email LIKE '%$search_email%'";
                                    }
                                }

                                // if (!empty($search_sex)) {
                                //     if (strpos($sql, 'WHERE') !== false) {
                                //         $sql .= " AND gioi_tinh = '$search_sex'";
                                //     } else {
                                //         $sql .= " WHERE gioi_tinh = '$search_sex'";
                                //     }
                                // }
                            }

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["id"] . "</td>";
                                    echo "<td>" . $row["ho_ten"] . "</td>";
                                    echo "<td>" . $row["mat_khau"] . "</td>"; // Thay thế mật khẩu nguyên văn bằng dấu sao hoặc dòng văn bản khác để che giấu nó
                                    echo "<td>" . $row["email"] . "</td>";
                                    echo "<td>" . $row["gioi_tinh"] . "</td>";
                                    echo "<td>" . $row["cap_bac"] . "</td>";
                                    //echo "<td>Cấp bậc</td>"; // Bạn cần thêm cột này nếu có thông tin về cấp bậc
                                    echo "<td style='width: 100px;' align='center'><a class='fa-solid fa-pen-to-square' href='sua_taikhoan.php?id=" . $row["id"] . "'></a>&emsp;<a class='fa-solid fa-trash' href='xoa_taikhoan.php?id=" . $row["id"] . "'></a></td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "Không tìm thấy dữ liệu.";
                            }

                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const searchForm = document.getElementById("searchForm");

        searchForm.addEventListener("submit", function (e) {
            e.preventDefault();

            // Lấy giá trị các trường tìm kiếm
            const search_id = document.getElementById("search_id").value;
            const search_name = document.getElementById("search_name").value;
            const search_email = document.getElementById("search_email").value;
            //const search_sex = document.getElementById("search_sex").value;

            // Gửi yêu cầu tìm kiếm đến server
            const xhr = new XMLHttpRequest();
            xhr.open("GET",
                `timkiem_taikhoan.php?search_id=${search_id}&search_name=${search_name}&search_email=${search_email}`,
                true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Xử lý kết quả tìm kiếm và cập nhật bảng dữ liệu
                    const tableBody = document.querySelector("table tbody");
                    tableBody.innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        });
    });
</script>

<!-- ' or 1=1 limit 1 # -->