head>
    <title>Quản lý tài khoản</title>
    <link rel="shortcut icon" type="image/png" href="../img/logo.png" />
</head>

<body>
    <?php
    include '../Main_QuanTri/nav.php';
    // Kiểm tra xem tham số "id" có tồn tại trong URL hay không
if (isset($_GET["id"])) {
    // Lấy giá trị tham số "id" từ URL
    $id = $_GET["id"];

    // Kết nối đến CSDL
    include '../Main_QuanTri/connect.php';

    // Truy vấn để lấy thông tin tài khoản
    $sql = "SELECT id, ho_ten, email, gioi_tinh, cap_bac FROM user WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Bắt đầu bind các giá trị vào statement
        mysqli_stmt_bind_param($stmt, "i", $id);

        // Thực hiện truy vấn
        mysqli_stmt_execute($stmt);

        // Kết quả của truy vấn
        mysqli_stmt_bind_result($stmt, $db_id, $hoTen, $email, $gioiTinh, $capBac);

        // Lấy kết quả
        mysqli_stmt_fetch($stmt);

        // Đóng statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Lỗi trong việc tạo prepared statement: " . mysqli_error($conn);
    }

    // Đóng kết nối CSDL
    mysqli_close($conn);
} else {
    echo "Thiếu tham số 'id' trong URL.";
    exit;
}

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lấy thông tin được gửi từ biểu mẫu
        $newHoTen = $_POST["hoTen"];
        $newEmail = $_POST["email"];
        $newPassword = $_POST["new_password"];
        //$newRePassword = $_POST["new_repassword"];
        //$newNgaySinh = $_POST["new_ngay_sinh"];
        $newGioiTinh = $_POST["gioiTinh"];
        //$newDiaChi = $_POST["new_dia_chi"];
        $newCapBac = $_POST["capBac"];
    
        // Kiểm tra và xử lý dữ liệu (ví dụ: kiểm tra mật khẩu, xác thực, ...)
        
        // Kết nối đến CSDL
        include '../Main_QuanTri/connect.php';

    
        // Query SQL để cập nhật thông tin tài khoản
        $updateSql = "UPDATE user SET ho_ten='$newHoTen', mat_khau='$newPassword', email='$newEmail', gioi_tinh='$newGioiTinh', cap_bac='$newCapBac' WHERE id=$id";
    
        if (mysqli_query($conn, $updateSql)) {
            header("Location: index.php");
            exit();
        } else {
            echo "Lỗi: " . mysqli_error($conn);
        }
    
        // Đóng kết nối CSDL
        mysqli_close($conn);
    }
    
// Trong file suataikhoan.php

// Kiểm tra xem tham số "id" có tồn tại trong URL hay không
if (isset($_GET["id"])) {
    // Lấy giá trị tham số "id" từ URL
    $id = $_GET["id"];

    // Kết nối đến CSDL
    include '../Main_QuanTri/connect.php';

    // Truy vấn để lấy thông tin tài khoản
    $sql = "SELECT id, ho_ten, mat_khau, email, gioi_tinh, cap_bac FROM user WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hoTen = $row["ho_ten"];
        $matKhau = $row["mat_khau"];
        $email = $row["email"];
        $gioiTinh = $row["gioi_tinh"];
        $capBac = $row["cap_bac"];
    } else {
        echo "Không tìm thấy tài khoản có ID = $id";
        exit;
    }

    // Đóng kết nối CSDL
    mysqli_close($conn);
} else {
    echo "Thiếu tham số 'id' trong URL.";
    exit;
}
?>

    <div class="content">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <div class="container-fluid bg-secondary">
                    <div class="hstack gap-2 ">
                        <div class="p-2">
                            <h5>Sửa tài khoản<h5>
                        </div>
                    </div>
                </div>
                <div class="accordion-body">
                    <form class="form-horizontal" id="category-form" action="#" method="post">
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Tên truy cập</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="hoTen" value="<?php echo $hoTen; ?>">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="password" class="col-sm-2 col-form-label">Mật khẩu</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password" name="new_password">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="confirm_password" class="col-sm-2 col-form-label">Nhập lại mật khẩu</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="confirm_password"
                                    name="nhap_lai_mat_khau">
                                <p id="message"></p>
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Giới tính</label>
                            <div class="col-sm-10">
                                <select class="span10 col-sm-12" name="gioiTinh" style="height:40px; width: 100px;"
                                    id="ProductCategories_status">
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Địa chỉ</label>
                            <div class="col-sm-10">
                                <input type="address" class="form-control">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Cấp bậc</label>
                            <div class="col-sm-10">
                                <select class="span10 col-sm-12" name="capBac" style="height:40px; width: 100px;"
                                    name="ProductCategories[status]" id="ProductCategories_status">
                                    <option value="Quản trị">Quản trị</option>
                                    <option value="Khách">Khách</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group form-group buttons">
                            <input class="btn btn-primary" href="quan_ly_danh_muc.php" id="btnAddCate" type="submit"
                                value="Sửa tài khoản" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
const password = document.getElementById("password");
const confirm_password = document.getElementById("confirm_password");
const message = document.getElementById("message");

function checkPassword() {
    if (password.value === confirm_password.value) {
        message.innerHTML = "Mật khẩu khớp.";
        message.style.color = "green";
    } else {
        message.innerHTML = "Mật khẩu không khớp.";
        message.style.color = "red";
    }
}

password.addEventListener("keyup", checkPassword);
confirm_password.addEventListener("keyup", checkPassword);
</script>