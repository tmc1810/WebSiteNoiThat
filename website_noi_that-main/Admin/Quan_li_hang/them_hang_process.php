<?php
include '../Main_QuanTri/connect1.php';

// die(var_dump($_FILES));
$tenhang = $_POST["tenhang"];
$sdt = $_POST["sdt"];
$diachi = $_POST["diachi"];
$anhdaidien = $_FILES["anhdaidien"];
$path_file="";

if($anhdaidien['size']>0){
    $folder = "anh_hang/";
    $file_extension = explode('.', $anhdaidien['name'])[1];
    $file_name = time().'.'.$file_extension;
    $path_file = $folder.$file_name;
    move_uploaded_file($anhdaidien["tmp_name"], $path_file);
}

$sql = "INSERT INTO hang_san_xuat (ten_hang, so_dien_thoai, dia_chi, anh_dai_dien) VALUES ('$tenhang', '$sdt', '$diachi', '$path_file')";
mysqli_query($connect, $sql);
mysqli_close($connect);
header("Location: index.php");


// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     if (isset($_POST['tenhang']) && isset($_POST['sdt']) && isset($_POST['diachi']) && isset($_POST['anhdaidien'])) {
//         $tenhang = $_POST['tenhang'];
//         $sdt = $_POST['sdt'];
//         $diachi = $_POST['diachi'];
//         $anhdaidien = $_POST['anhdaidien'];
//         $path = "anh_hang/";
//         $anhdaidien_path = $path . "" . $anhdaidien;
//         // Thực hiện kết nối đến cơ sở dữ liệu
//         $conn = mysqli_connect('localhost', 'root', '', 'noi_that');

//         if (!$conn) {
//             die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
//         }

//         // Sử dụng truy vấn SQL để thêm dữ liệu
//         $sql = "INSERT INTO hang_san_xuat (ten_hang, so_dien_thoai, dia_chi, anh_dai_dien) VALUES ('$tenhang', '$sdt', '$diachi', '$anhdaidien_path')";

//         if (mysqli_query($conn, $sql)) {
//             header("Location: index.php");
//             exit();
//         } else {
//             echo "Lỗi: " . mysqli_error($conn);
//         }

//         // Đóng kết nối
//         mysqli_close($conn);
//     }
// }
?>