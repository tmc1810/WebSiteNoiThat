<?php 
include '../Main_QuanTri/connect1.php';

$id = $_GET['id'];
// die($id);
$sql = "delete from san_pham where id = '$id'";

mysqli_query($connect, $sql);
mysqli_close($connect);


header('location: index.php');
?>