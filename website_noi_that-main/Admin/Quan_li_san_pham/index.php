<head>
    <title>Quản lý sản phẩm</title>
    <link rel="shortcut icon" type="image/png" href="../img/logo.png" />
</head>

<body>
    <?php
    include '../Main_QuanTri/nav.php';
    include '../Main_QuanTri/connect1.php';



    $sql_select_danh_muc = "select * from danh_muc";
    $cac_danh_muc = mysqli_query($connect, $sql_select_danh_muc);


    $tim_kiem_ten_san_pham = "";
    $tim_kiem_ma_san_pham = "";
    $tim_kiem_trang_thai = "";
    $tim_kiem_con_hang = "";
    $tim_kiem_danh_muc = "";

    if(isset($_GET['tim_kiem_ten_san_pham'])){
        if($_GET['tim_kiem_ten_san_pham']!=""){
            $tim_kiem_ten_san_pham = $_GET['tim_kiem_ten_san_pham'];
        }
    }
    if(isset($_GET['tim_kiem_ma_san_pham'])){
        if($_GET['tim_kiem_ma_san_pham']!=""){
            $tim_kiem_ma_san_pham = $_GET['tim_kiem_ma_san_pham'];
        }
    }
    if(isset($_GET['tim_kiem_trang_thai'])){
        if($_GET['tim_kiem_trang_thai']!=""){
            $tim_kiem_trang_thai = $_GET['tim_kiem_trang_thai'];
        }
    }
    if(isset($_GET['tim_kiem_con_hang'])){
        if($_GET['tim_kiem_con_hang']!=""){
            $tim_kiem_con_hang = $_GET['tim_kiem_con_hang'];
        }
    }
    if(isset($_GET['tim_kiem_danh_muc'])){
        if($_GET['tim_kiem_danh_muc']!=""){
            $tim_kiem_danh_muc = $_GET['tim_kiem_danh_muc'];
        }
    }

    if($tim_kiem_con_hang=="co"){
        $sql = "SELECT * from san_pham WHERE ten_san_pham like '%$tim_kiem_ten_san_pham%'
                                        AND  id like '%$tim_kiem_ma_san_pham%'
                                        AND  hien_thi like '%$tim_kiem_trang_thai%'
                                        AND  so_luong > 0
                                        AND  ma_danh_muc like '%$tim_kiem_danh_muc%'";
        $products=mysqli_query($connect, $sql);
    }
    else {
        if($tim_kiem_con_hang=="khong"){
        $sql = "SELECT * from san_pham WHERE ten_san_pham like '%$tim_kiem_ten_san_pham%'
                                        AND  id like '%$tim_kiem_ma_san_pham%'
                                        AND  hien_thi like '%$tim_kiem_trang_thai%'
                                        AND  so_luong <= 0
                                        AND  ma_danh_muc like '%$tim_kiem_danh_muc%'";
        $products=mysqli_query($connect, $sql);
        }
        else{
            $sql = "SELECT * from san_pham WHERE ten_san_pham like '%$tim_kiem_ten_san_pham%'
                                        AND  id like '%$tim_kiem_ma_san_pham%'
                                        AND  hien_thi like '%$tim_kiem_trang_thai%'
                                        AND  ma_danh_muc like '%$tim_kiem_danh_muc%'";
            $products=mysqli_query($connect, $sql);
        }
    }

    ?>
    <div class="content">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <div class="container-fluid bg-secondary">
                    <div class="hstack gap-2 ">
                        <div class="p-2">
                            <h5>Quản lý sản phẩm<h5>
                        </div>
                        <div class="p-2 ms-auto"><a href="dang_sanpham.php" class="btn btn-primary">Đăng</a></div>
                    </div>
                </div>


                <div class="accordion-body">
                    <form class="form-inline" id="yw0" action="index.php" method="get">
                        <input class="" placeholder="Tên sản phẩm" style="height:35px;" name="tim_kiem_ten_san_pham" type="text" maxlength="300" />
                        <input class="" placeholder="Mã sản phẩm" style="max-width: 130px;height:35px;" name="tim_kiem_ma_san_pham" type="text" maxlength="50" />






                        <select class="" name="tim_kiem_trang_thai" style="height:35px;">
                            <option value="" selected="selected">---Trạng thái---</option>
                            <option value="co">Hiển thị</option>
                            <option value="khong">Ẩn</option>
                        </select>





                        <select class="" name="tim_kiem_con_hang" style="height:35px;">
                            <option value="" selected="selected">---Tình trạng---</option>
                            <option value="co">Còn hàng</option>
                            <option value="khong">Hết hàng</option>
                        </select>







                        <select class="" name="tim_kiem_danh_muc" style="height:35px;">
                            <option value="" selected="selected">Danh mục sản phẩm</option>
                            <?php foreach ($cac_danh_muc as $danh_muc) {

                            ?>
                                <option value="<?php echo ($danh_muc['id']) ?>">
                                    <?php echo ($danh_muc['ten_danh_muc']) ?>
                                </option>
                            <?php } ?>
                        </select>
                        <button class="btn bg-warning" type="submit">Tìm kiếm</button>
                    </form> <br>










                    <table class="table table-bordered table-hover vertical-center">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th>Mã sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá sản phẩm</th>
                                <th>Danh mục</th>
                                <th>Đã bán</th>
                                <th>Số lượng</th>
                                <th>Trạng thái</th>
                                <th>Lượt xem</th>
                                <th>Ngày đăng</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach($products as $product){ ?>
                                <tr class="odd">
                                    <td><img src="<?php echo($product['anh_thumbnail']) ?>" height="100px"/></td>
                                    <td><?php echo($product['id']) ?></td>
                                    <td><?php echo($product['ten_san_pham']) ?></td>
                                    <td><?php echo($product['gia_ban']) ?></td>
                                    <td><?php
                                        $id_danh_muc = $product['ma_danh_muc'];
                                        $sql_danh_muc = "SELECT * FROM danh_muc WHERE id = '$id_danh_muc'";
                                        $mang_danh_muc = mysqli_query($connect, $sql_danh_muc);
                                        echo(mysqli_fetch_array($mang_danh_muc)['ten_danh_muc']);
                                    ?></td>
                                    <td><?php echo($product['da_ban']) ?></td>
                                    <td><?php echo($product['so_luong']) ?></td>
                                    <td><?php
                                        if($product['hien_thi']=="co"){
                                            echo("Hiển thị");
                                        }
                                        else{
                                            echo("Ẩn");
                                        }
                                    ?></td>
                                    <td><?php echo($product['luot_xem']) ?></td>
                                    <td><?php echo($product['ngay_cap_nhat_san_pham']) ?></td>
                                    <td style="width: 100px;" align="center">
                                    <a class="fa-solid fa-pen-to-square" href="sua_san_pham_2.php?id=<?php echo($product['id']) ?>"></a>&ensp;
                                    <a class="fa-solid fa-trash" href="xoa_sanpham.php?id=<?php echo($product['id']) ?>"></a>
                                    </td>
                                </tr>
                            <?php } 
                                mysqli_close($connect);
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>