<head>
    <title>Quản lý tài khoản</title>
    <link rel="shortcut icon" type="image/png" href="../img/logo.png" />
</head>


<body>
    <?php
    include '../Main_QuanTri/nav.php';
    
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kết nối đến cơ sở dữ liệu MySQL
    $conn = mysqli_connect("localhost", "root", "", "noi_that");

    // Kiểm tra kết nối
    if (!$conn) {
        die("Kết nối không thành công: " . mysqli_connect_error());
    }

    // Lấy dữ liệu từ biểu mẫu
    $ho_ten = $_POST['ho_ten'];
    $gioi_tinh = $_POST['gioi_tinh'];
    $email = $_POST['email'];
    //$so_dien_thoai = $_POST['so_dien_thoai'];
    $cap_bac = $_POST['cap_bac'];
    $dia_chi = $_POST['dia_chi'];
    $mat_khau = ($_POST['mat_khau']); // Lưu mật khẩu đã mã hóa (khuyến nghị sử dụng phương pháp an toàn hơn)

    // Tạo truy vấn SQL để chèn dữ liệu
    $sql = "INSERT INTO user (ho_ten, gioi_tinh, email, cap_bac, dia_chi, mat_khau) VALUES ('$ho_ten', '$gioi_tinh', '$email', '$cap_bac', '$dia_chi', '$mat_khau')";

    // Thực thi truy vấn và kiểm tra kết quả
    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Đóng kết nối đến cơ sở dữ liệu
    mysqli_close($conn);
}
?>


    <div class="content">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <div class="container-fluid bg-secondary">
                    <div class="hstack gap-2 ">
                        <div class="p-2">
                            <h5>Thêm tài khoản<h5>
                        </div>
                    </div>
                </div>
                <div class="accordion-body">
                    <form class="form-horizontal" id="category-form" action="#" method="post">
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Tên truy cập</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="ho_ten">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="password" class="col-sm-2 col-form-label">Mật khẩu</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password" name="mat_khau">
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
                                <select class="span10 col-sm-12" style="height:40px; width: 100px;" name="gioi_tinh"
                                    id="ProductCategories_status">
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Địa chỉ</label>
                            <div class="col-sm-10">
                                <input type="address" class="form-control" name="dia_chi">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Cấp bậc</label>
                            <div class="col-sm-10">
                                <select class="span10 col-sm-12" style="height:40px; width: 100px;" name="cap_bac"
                                    id="ProductCategories_status">
                                    <option value="Quản trị">Quản trị</option>
                                    <option value="Khách">Khách</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group form-group buttons">
                            <input class="btn btn-primary" href="index.php" id="btnAddCate" type="submit"
                                value="Tạo tài khoản" />
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