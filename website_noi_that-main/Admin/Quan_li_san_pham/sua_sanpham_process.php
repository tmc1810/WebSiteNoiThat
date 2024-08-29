<?php

include '../Main_QuanTri/connect1.php';


$id = $_GET['id'];

$anh_thumbnail_moi = $_FILES['anh_thumbnail_moi'];
$ma_danh_muc = $_POST['ma_danh_muc'];
$ma_hang = $_POST['ma_hang'];
$ten_san_pham = $_POST['ten_san_pham'];
$gia_ban = $_POST['gia_ban'];
$mo_ta_van_tat = $_POST['mo_ta_van_tat'];
$mo_ta = $_POST['mo_ta'];
$so_luong = $_POST['so_luong'];
$ngay_cap_nhat_san_pham = date('Y/m/d h:i:s' , time());
if(isset($_POST['hien_thi']) && $_POST['hien_thi'] == "1"){
    $hien_thi = "co";
}
else{
    $hien_thi = "khong";
}
if(isset($_POST['tinh_trang']) && $_POST['tinh_trang'] == "1"){
    $tinh_trang = "co";
}
else{
    $tinh_trang = "khong";
}

if($anh_thumbnail_moi['size']>0){
    $folder = "anh_san_pham/";
    $file_extension = explode('.', $anh_thumbnail_moi['name'])[1];
    $file_name = time().'.'.$file_extension;

    $path_file = $folder.$file_name;
    move_uploaded_file($anh_thumbnail_moi["tmp_name"], $path_file);
}
else{
    $file_name = $_POST['anh_thumbnail_hien_tai'];
    $path_file = $file_name;
}

$sql = "update san_pham
        set 
        ma_danh_muc	= '$ma_danh_muc',
        ma_hang_san_xuat = '$ma_hang',	
        ten_san_pham = '$ten_san_pham',	
        gia_ban = '$gia_ban',
        anh_thumbnail = '$path_file',	
        mo_ta_san_pham = '$mo_ta_van_tat',
        mo_ta_san_pham_chi_tiet = '$mo_ta',
        ngay_cap_nhat_san_pham = '$ngay_cap_nhat_san_pham',
        hien_thi = '$hien_thi',
        tinh_trang = '$tinh_trang'
        where
        id = '$id'
";

mysqli_query($connect, $sql);
mysqli_close($connect);
header('location: index.php');
?>