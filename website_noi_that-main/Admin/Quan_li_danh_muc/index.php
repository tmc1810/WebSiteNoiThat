<head>
    <title>Quản lý danh mục</title>
    <link rel="shortcut icon" type="image/png" href="../img/logo.png" />
</head>

<body>
    <?php
    include '../Main_QuanTri/nav.php';
    include '../Main_QuanTri/connect1.php';
    //Lấy toàn bộ data từ bảng danh_muc
    $sql = "select * from danh_muc";
    $categories = mysqli_query($connect, $sql);
    ?>
    <div class="content">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <div class="container-fluid bg-secondary">
                    <div class="hstack gap-2 ">
                        <div class="p-2">
                            <h5>Quản lý danh mục<h5>
                        </div>
                        <div class="p-2 ms-auto"><a href="them_danhmuc.php" class="btn btn-primary">Thêm</a></div>

                    </div>
                </div>
                <div class="accordion-body">
                    <table class="table table-bordered table-hover vertical-center">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th>Tên danh mục</th>
                                <th>Hiển thị ở trang chủ</th>
                                <th>Trạng thái</th>
                                <th>Thứ tự</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php //Dùng for-each in từng record ra bảng 
                            ?>
                            <?php foreach ($categories as $categorie) {

                            ?>
                                <tr>
                                    <td style="width: 50px; text-align: center;"><?php echo ($categorie['id']) ?></td>
                                    <td><?php echo ($categorie['ten_danh_muc']) ?></td>

                                    <td style="width: 100px; text-align: center;"><?php
                                                                                    if ($categorie['hien_thi_trang_chu'] == "co") {
                                                                                        echo ("Có");
                                                                                    } else {
                                                                                        echo ("Không");
                                                                                    } ?>
                                    </td>

                                    <td style="width: 100px;text-align: center;"><?php
                                                                                    if ($categorie['hien_thi'] == "co") {
                                                                                        echo ("Hiển thị");
                                                                                    } else {
                                                                                        echo ("Không");
                                                                                    } ?>
                                    </td>

                                    <td style="width: 80px;"><input class="updateorder" style="width: 50px;" rel="/quantri/economy/productcategory/updateorder/id/53254" type="text" value="<?php echo ($categorie['thu_tu']) ?>" name="cat_order" id="cat_order" readonly/></td>
                                    <td style="width: 100px;" align="center"><a class="fa-solid fa-pen-to-square" href="sua_danhmuc.php?ma=<?php echo($categorie['id']); ?>"></a>&emsp;<a class="fa-solid fa-trash" href="xoa_danhmuc.php?ma=<?php echo($categorie['id']); ?>"></a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>