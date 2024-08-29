<?php
    include '../Main_QuanTri/connect.php';
    $id_don_hang = $_GET['id_don_hang'];
    $sql_danh_sach_sp = "DELETE FROM chi_tiet_don_hang WHERE ma_don_hang = '$id_don_hang'";
    mysqli_query($conn, $sql_danh_sach_sp);

    $sql_don_hang = "DELETE FROM don_hang WHERE id = '$id_don_hang'";
    mysqli_query($conn, $sql_don_hang);

    mysqli_close($conn);
    header('location: index.php');
?>