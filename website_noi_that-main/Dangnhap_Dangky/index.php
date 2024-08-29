<!DOCTYPE html>
<html lang="vn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="../User/img/logo.png" />
    <title>BELLA VITA INTERIOR</title>
    <link rel="stylesheet" type="text/css" href="stylesign.css">
</head>
<body>  
    <?php    
    include './connect.php';
    session_start();
    // Xử lý đăng nhập khi nút "Đăng nhập" được nhấn
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['dangnhap'])) {
        if (isset($_POST['email']) && isset($_POST['pass'])) {
            $email = $_POST["email"];
            $matkhau = $_POST["pass"];
        
            // Kiểm tra thông tin tài khoản trong cơ sở dữ liệu bằng email.
            $sql = "SELECT ho_ten, id, cap_bac FROM user WHERE email = '$email' AND mat_khau = '$matkhau'";
            $result = $conn->query($sql);
        
            if ($result->num_rows == 1) {
                // Đăng nhập thành công, lấy tên người dùng từ kết quả truy vấn.
                $row = $result->fetch_assoc();
                $id = $row['id'];
                $username = $row['ho_ten'];
                $cap_bac = $row["cap_bac"];
                $_SESSION['id'] = $id;
                // Chuyển hướng người dùng dựa trên cấp bậc
                if ($cap_bac == "Quản trị") {
                    $_SESSION['ho_ten'] = $username;
                    header("Location: ../Admin/Bang_dieu_khien");
                } elseif ($cap_bac == "Khách") {
                    $_SESSION['ho_ten'] = $username;
                    header("Location: ../User/TuyetLan");
                } else {
                    echo "Cấp bậc không hợp lệ";
                }
            } else {
                // Thông báo lỗi nếu thông tin tài khoản không hợp lệ.
                echo "Đăng nhập thất bại. Vui lòng kiểm tra email và mật khẩu!";
            }
        }
    }
?>
    <div class="container">
        <div class="content">
            <div class="logo"><img src="../User/img/logo.png" weight="80px" width="80px"/>
                <h1>BELLA VITA INTERIOR</h1>
                <div class="text-sci">
                    <h2>Welcome!<br><span> To their home.</span></h2>
                    <p>MAKE EVERYONE HAPPY WITH THE FINEST FURNITURE</p>
                </div>
            </div>
        </div>

        <div class="logreg-box">
            <div class="form-box login">
                <form method="post" action="#">
                    <h2>Đăng Nhập</h2>

                        <div class="input-box">
                            <span class="icon">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAPpJREFUSEvtleERgjAMhV+zQGAD3AQ3kUmQScRJYBPZoLBA8erRXgERKPCHk5+0yZf3EoLAwY84OD9OBJBSxkT0ABBttK1SSiVhGJY6j7WorutCCBFvTG7CK2a+9ABN07TdaQYg9QTlAG46lpk/xVsFBqAPPOyytrh5JgH6QEoZEZGuZk5NzsyJE/P6qQBABeDJzPcuaKr5vWZ2qgtj7aRFjveZAxmqGVY9UroEoFkjNfqlGcFh1e5gLAWYGKtmaX/WAqwapVRJRNbrqXH2Aaz6NP6AWbtGFu257Nq2LYMguPZWhZ5pIUS6w0b9vq5nNXteONEv09OB2bA3OsGVGU6yEvgAAAAASUVORK5CYII="/>
                            </span>
                            <input type="text" id="email" name="email" required autocomplete="FALSE">
                            <label for="username">Email</label>
                        </div>

                        <div class="input-box">
                            <span class="icon">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAQFJREFUSEvtldERgjAMhtMsELoBbIKTqJMok8gmuolsUMIAjRcPPc5CC5x6Ptin3jX9v79p0hr48DAf1odZAOdciYhbACjVkIg0IlJZay8pg0lA13U7ETlNCFVEdIxBooDe+bkXqLz3tc4RcQcAeqLce19Ya5spSBTQtu3ZGKNpCZwyszo/AEBNRPtVAGYW3UhEgRHnXI6IVwBoiKh4O0AFYwYewGiKUgKpdYV8H6CVY4w59JebKvPnuohcxnojOAEz68Xls5UHgQrJsmwz3DsGuFfO2vFacX9AkMl/ipLF9RMpWt1oYy/r2DOs36P+YIu6efZTkUzywoDkn7xQLwi/AYcUkRl3IN9GAAAAAElFTkSuQmCC"/>
                            </span>
                            <input type="password" name="pass" required autocomplete="FALSE">
                            <label for="password">Password</label>
                        </div>

                        <button type="submit" class="btn"><input type="submit" name="dangnhap" style="color: #FFF; font-size: 25px;border: none;background-color: #be0000;" value="Đăng nhập"></button>

                        <div class="login-register">
                            <p>Bạn chưa có tài khoản? <a href="#" class="register-link">Đăng Ký</a></p>
                        </div>
                </form>
            </div>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['dangky'])) 
{
    // Kết nối đến cơ sở dữ liệu MySQL
    $conn = mysqli_connect("localhost", "root", "", "noi_that");

    // Kiểm tra kết nối
    if (!$conn) {
        die("Kết nối không thành công: " . mysqli_connect_error());
    }

    // Lấy dữ liệu từ biểu mẫu
    $ho_ten = $_POST['hoten'];
    $email = $_POST['email'];
    $mat_khau = ($_POST['pass']);
    $check_query = "SELECT * FROM user WHERE email = '$email'";
    $result = $conn->query($check_query);

    if ($result->num_rows > 0) {
        echo '<div style="position: fixed; font-size:16px; margin-left:-950px; top:-90px;">Email đăng ký đã tồn tại. Vui lòng sử dụng email khác.</div>';
    } else {
    // Tạo truy vấn SQL để chèn dữ liệu
        $sql = "INSERT INTO user (ho_ten, email, cap_bac, mat_khau) VALUES ('$ho_ten', '$email', 'Khách' ,'$mat_khau')";
    
        if (mysqli_query($conn, $sql)) {
        } else {    
            echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
    // Đóng kết nối đến cơ sở dữ liệu
    mysqli_close($conn);
?>
            <div class="form-box register">
                <form method="post" action="#">
                    <h1>Đăng Ký</h1>

                        <div class="input-box">
                            <span class="icon">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAP9JREFUSEvFlOsNwjAMhO82gUmgm8AkwCSwCd2EMonRSU3VpmkcGir8q1Kj++zzg9g4uLE+igBmtgNwAXAC0AFoAdxI6jsbLsDMjgCeCRWJn0kKthglgBcAVZCKjuR+NcDMZMndcaHJVZGtwMyuvfc5hnqhd8nwAEv+j8XUh8dagLxXg7fpgbLKTJF+Z/3XA3eKekjYA1mmCCNavwfeInn/iyrwRGr2QON3ABCsGWuFk/H+ekz7xmrBlqYnTnrxbMwscqbGc2s2VSlA7vZ4gNltmgAKT4MHmZyOGCDfdeBqoiXZBIEYUGNP0JzYFAOsJvUha3LQ/e+i/aSaX4jkND45MFsZqs//kwAAAABJRU5ErkJggg=="/>
                            </span>
                            <input type="text" name="hoten" id="hoten" required>
                            <label>Name</label>
                        </div>

                        <div class="input-box">
                            <span class="icon">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAPpJREFUSEvtleERgjAMhV+zQGAD3AQ3kUmQScRJYBPZoLBA8erRXgERKPCHk5+0yZf3EoLAwY84OD9OBJBSxkT0ABBttK1SSiVhGJY6j7WorutCCBFvTG7CK2a+9ABN07TdaQYg9QTlAG46lpk/xVsFBqAPPOyytrh5JgH6QEoZEZGuZk5NzsyJE/P6qQBABeDJzPcuaKr5vWZ2qgtj7aRFjveZAxmqGVY9UroEoFkjNfqlGcFh1e5gLAWYGKtmaX/WAqwapVRJRNbrqXH2Aaz6NP6AWbtGFu257Nq2LYMguPZWhZ5pIUS6w0b9vq5nNXteONEv09OB2bA3OsGVGU6yEvgAAAAASUVORK5CYII="/>
                            </span>
                            <input type="email" name="email" required>
                            <label>Email</label>
                        </div>

                        <div class="input-box">
                            <span class="icon">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAQFJREFUSEvtldERgjAMhtMsELoBbIKTqJMok8gmuolsUMIAjRcPPc5CC5x6Ptin3jX9v79p0hr48DAf1odZAOdciYhbACjVkIg0IlJZay8pg0lA13U7ETlNCFVEdIxBooDe+bkXqLz3tc4RcQcAeqLce19Ya5spSBTQtu3ZGKNpCZwyszo/AEBNRPtVAGYW3UhEgRHnXI6IVwBoiKh4O0AFYwYewGiKUgKpdYV8H6CVY4w59JebKvPnuohcxnojOAEz68Xls5UHgQrJsmwz3DsGuFfO2vFacX9AkMl/ipLF9RMpWt1oYy/r2DOs36P+YIu6efZTkUzywoDkn7xQLwi/AYcUkRl3IN9GAAAAAElFTkSuQmCC"/>
                            </span>
                            <input type="password" id="pass" name="pass"required>
                            <label>Password</label>
                        </div>

                        <div class="input-box">
                            <span class="icon">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAQFJREFUSEvtldERgjAMhtMsELoBbIKTqJMok8gmuolsUMIAjRcPPc5CC5x6Ptin3jX9v79p0hr48DAf1odZAOdciYhbACjVkIg0IlJZay8pg0lA13U7ETlNCFVEdIxBooDe+bkXqLz3tc4RcQcAeqLce19Ya5spSBTQtu3ZGKNpCZwyszo/AEBNRPtVAGYW3UhEgRHnXI6IVwBoiKh4O0AFYwYewGiKUgKpdYV8H6CVY4w59JebKvPnuohcxnojOAEz68Xls5UHgQrJsmwz3DsGuFfO2vFacX9AkMl/ipLF9RMpWt1oYy/r2DOs36P+YIu6efZTkUzywoDkn7xQLwi/AYcUkRl3IN9GAAAAAElFTkSuQmCC"/>
                            </span>
                            <input type="password" id="repass" name="repass"required>
                            <p id="message"></p>
                            <label>Nhập lại Password</label>
                        </div>

                        <input type="submit" value="Đăng Ký" onclick="showAlert();" name="dangky" class="btn">

                        <div class="login-register">
                            <p>Bạn đã có tài khoản? <a href="#" class="login-link">Đăng Nhập</a></p>
                        </div>
                </form>
            </div>
        </div>
    </div>

<script src="scriptsign.js"></script>
<script>
    function showAlert() {
    var message = "Đăng ký thành công";
    alert(message); 
    }

    const password = document.getElementById("pass");
    const confirm_password = document.getElementById("repass");
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
</body>
</html>