<?php

// Import kết nối CSDL
include '../Main_QuanTri/connect.php';
// Kiểm tra kết nối CSDL
if (!$conn) {
    die("Kết nối CSDL thất bại: " . mysqli_connect_error());
}
// Kiểm tra xem đã gửi yêu cầu tìm kiếm hay chưa
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $_GET['search'];
    // Truy vấn dữ liệu từ bảng hang_san_xuat với điều kiện tên hãng chứa từ khóa tìm kiếm
    $query = "SELECT * FROM hang_san_xuat WHERE ten_hang LIKE '%$search%'";
} else {
    // Nếu không có yêu cầu tìm kiếm, truy vấn tất cả dữ liệu từ bảng hang_san_xuat
    $query = "SELECT * FROM hang_san_xuat";
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
    echo '<th></th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td width="30px">' . $row['id'] . '</td>';
        echo '<td width="60px;"></td>';
        echo '<td>' . $row['ten_hang'] . '</td>';
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