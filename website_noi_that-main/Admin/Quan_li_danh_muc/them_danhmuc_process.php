<?php  

include '../Main_QuanTri/connect1.php';


$ten_danh_muc = $_POST['ten_danh_muc'];
$thu_tu_hien_thi = $_POST['thu_tu_hien_thi'];
$anh_dai_dien = $_FILES['anh_dai_dien'];
if(isset($_POST['hien_thi_trang_chu']) && $_POST['hien_thi_trang_chu'] == "1"){
    $hien_thi_trang_chu = "co";
}
else{
    $hien_thi_trang_chu = "khong";
}
if(isset($_POST['trang_thai']) && $_POST['trang_thai'] == "1"){
    $trang_thai = "co";
}
else{
    $trang_thai = "khong";
}


$folder = "anh_danh_muc/";
$file_extension = explode('.', $anh_dai_dien['name'])[1];
$file_name = time().'.'.$file_extension;

$path_file = $folder.$file_name;
move_uploaded_file($anh_dai_dien["tmp_name"], $path_file);


$sql = "insert into danh_muc(anh_danh_muc, ten_danh_muc, thu_tu, hien_thi_trang_chu, hien_thi)
        values('$path_file', '$ten_danh_muc', '$thu_tu_hien_thi', '$hien_thi_trang_chu', '$trang_thai')
"; 



mysqli_query($connect, $sql);
mysqli_close($connect);

header('location: index.php');