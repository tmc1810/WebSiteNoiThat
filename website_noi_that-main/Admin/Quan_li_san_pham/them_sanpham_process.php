<?php

include '../Main_QuanTri/connect1.php';



$ten_san_pham = addslashes($_POST['ten_san_pham']);
$ma_danh_muc = addslashes($_POST['ma_danh_muc']);
$ma_hang = addslashes($_POST['ma_hang']);
$gia_san_pham = addslashes($_POST['gia_san_pham']);
$so_luong = addslashes($_POST['so_luong']);
if(isset($_POST['hien_thi']) && $_POST['hien_thi']=="1"){
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
$mo_ta_van_tat = addslashes($_POST['mo_ta_van_tat']);
$mo_ta = addslashes($_POST['mo_ta']);
$ngay_them_san_pham = date('Y/m/d h:i:s' , time());
$ngay_cap_nhat_san_pham = date('Y/m/d h:i:s' , time());
$anh_san_pham=$_FILES['anh_san_pham'];
$path_file="";

if($anh_san_pham['size']>0){
    $folder = "anh_san_pham/";
    $file_extension = explode('.', $anh_san_pham['name'])[1];
    $file_name = time().'.'.$file_extension;
    $path_file = $folder.$file_name;
    move_uploaded_file($anh_san_pham["tmp_name"], $path_file);
}


// var_dump($ma_danh_muc, $ma_hang, $ten_san_pham, $gia_san_pham,$path_file,$mo_ta_van_tat, $mo_ta, $ngay_them_san_pham, $ngay_cap_nhat_san_pham,
// $so_luong,0,1, $hien_thi, $tinh_trang);


$sql = "INSERT INTO san_pham(ma_danh_muc, ma_hang_san_xuat, ten_san_pham, gia_ban, anh_thumbnail, mo_ta_san_pham, mo_ta_san_pham_chi_tiet,
ngay_them_san_pham, ngay_cap_nhat_san_pham, so_luong, da_ban, luot_xem, hien_thi, tinh_trang)

VALUES('$ma_danh_muc', '$ma_hang', '$ten_san_pham', '$gia_san_pham','$path_file','$mo_ta_van_tat', '$mo_ta', '$ngay_them_san_pham', '$ngay_cap_nhat_san_pham',
'$so_luong','0','1', '$hien_thi', '$tinh_trang')";

header('location: index.php');

mysqli_query($connect, $sql);
mysqli_close($connect);
?>
