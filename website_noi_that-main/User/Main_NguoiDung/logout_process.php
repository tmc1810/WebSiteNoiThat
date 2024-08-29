<?php
    if(isset($_SESSION['ho_ten'])){
        unset($_SESSION['ho_ten']);
        header('location: ../../Dangnhap_Dangky/');
    }
    header('location: ../../Dangnhap_Dangky/');
?>