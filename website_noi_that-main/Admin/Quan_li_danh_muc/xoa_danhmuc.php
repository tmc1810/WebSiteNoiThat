<?php

$id = $_GET['ma'];
include '../Main_QuanTri/connect1.php';
$sql = "delete from danh_muc where id = '$id'";

mysqli_query($connect, $sql);
mysqli_close($connect);
header('location: index.php');
?>