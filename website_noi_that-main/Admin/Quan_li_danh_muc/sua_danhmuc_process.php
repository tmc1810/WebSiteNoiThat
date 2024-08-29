<?php
include '../Main_QuanTri/connect1.php';



$id = $_POST['ma_danh_muc'];
$ten_danh_muc = $_POST['ten_danh_muc'];
$thu_tu_hien_thi = $_POST['thu_tu_hien_thi'];
$anh_dai_dien_moi = $_FILES['anh_dai_dien_moi'];
$anh_dai_dien_cu = $_POST['anh_dai_dien_cu'];
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



if($anh_dai_dien_moi['size']>0){
    $folder = "anh_danh_muc/";
    $file_extension = explode('.', $anh_dai_dien_moi['name'])[1];
    $file_name = time().'.'.$file_extension;

    $path_file = $folder.$file_name;
    move_uploaded_file($anh_dai_dien_moi["tmp_name"], $path_file);
}
else{
    $file_name = $_POST['anh_dai_dien_cu'];
    $path_file = $file_name;
}





$sql = "update danh_muc
        set 
        anh_danh_muc = '$path_file',
        ten_danh_muc = '$ten_danh_muc',
        thu_tu = '$thu_tu_hien_thi',
        hien_thi_trang_chu = '$hien_thi_trang_chu',
        hien_thi ='$trang_thai'
        where
        id = '$id'
";

mysqli_query($connect, $sql);
mysqli_close($connect);
header('location: index.php');