<?php
session_start();
include '../../Admin/Main_QuanTri/connect.php';

$id = $_SESSION['id'];
$ho_ten = $_POST['fullname'];
$email = $_POST['email'];
$gioi_tinh = $_POST['gender'];
$so_dien_thoai = $_POST['phone'];
$dia_chi = $_POST['address'];

$sql = "UPDATE user
        SET 
        ho_ten = '$ho_ten',
        email = '$email',
        gioi_tinh = '$gioi_tinh',
        so_dien_thoai = '$so_dien_thoai',
        dia_chi = '$dia_chi'

        WHERE id = '$id'
";

mysqli_query($conn, $sql);
mysqli_close($conn);

header('location: thongtincanhan.php');
?>