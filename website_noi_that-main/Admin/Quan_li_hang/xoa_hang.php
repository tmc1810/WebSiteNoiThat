<?php
// Import kết nối CSDL
include '../Main_QuanTri/connect.php';

// Kiểm tra xem có tham số id được gửi từ URL không
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Lấy giá trị tham số id
    $id = $_GET['id'];

    // Thực hiện truy vấn SQL để xóa hãng với id tương ứng
    $sql = "DELETE FROM hang_san_xuat WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        // Nếu xóa thành công, chuyển hướng trở lại trang quản lý hãng
        header("Location: index.php");
        exit();
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
} else {
    echo "Tham số id không hợp lệ.";
}

// Đóng kết nối CSDL
mysqli_close($conn);
?>
