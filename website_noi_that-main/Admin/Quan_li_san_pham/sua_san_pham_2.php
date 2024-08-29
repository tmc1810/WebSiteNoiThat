<head>
    <title>Quản lý sản phẩm</title>
    <link rel="shortcut icon" type="image/png" href="../img/logo.png" />
</head>

<body>
    <?php
    include '../Main_QuanTri/nav.php';
    include '../Main_QuanTri/connect1.php';

    $id = $_GET['id'];
    $sql = "SELECT * FROM san_pham WHERE id = '$id'";
    $san_pham = mysqli_fetch_array(mysqli_query($connect, $sql));

    $sql_danh_muc = "SELECT * FROM danh_muc";
    $sql_hang = "SELECT * FROM hang_san_xuat";
    $ds_danh_muc = mysqli_query($connect, $sql_danh_muc);
    $ds_hang = mysqli_query($connect, $sql_hang);


    $id = $_GET['id'];
    ?>
    <div class="content">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <div class="container-fluid bg-secondary">
                    <div class="hstack gap-2 ">
                        <div class="p-2">
                            <h5>Sửa sản phẩm<h5>
                        </div>
                    </div>
                </div>





                <div class="accordion-body">
                    <form class="form-horizontal" id="category-form" action="sua_sanpham_process.php?id=<?php echo("$id"); ?>" method="post" enctype="multipart/form-data">


                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Thông tin sản phẩm</button>
                            </li>
                        </ul>


                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                <br>

                                <div class="mb-3 row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Tên sản phẩm</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?php echo ($san_pham['ten_san_pham']) ?>" name="ten_san_pham">
                                    </div>
                                </div>



                                <div class="mb-3 row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Danh mục</label>
                                    <div class="col-sm-10">
                                        <select class="span10 col-sm-12" style="height: 40px;" name="ma_danh_muc">
                                            <?php foreach ($ds_danh_muc as $danh_muc) {

                                            ?>
                                                <option value="<?php echo ($danh_muc['id']) ?>" <?php if ($san_pham['ma_danh_muc'] == $danh_muc['id']) { ?> selected <?php } ?>>
                                                    <?php echo ($danh_muc['ten_danh_muc']) ?>
                                                </option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                </div>



                                <div class="mb-3 row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Hãng sản xuất</label>
                                    <div class="col-sm-10">
                                        <select class="span30 col-sm-12" style="height: 40px;" name="ma_hang">
                                            <?php foreach ($ds_hang as $hang) {
                                            ?>
                                                <option value="<?php echo ($hang['id']) ?>" <?php if ($san_pham['ma_hang_san_xuat'] == $hang['id']) { ?> selected <?php } ?>>
                                                    <?php echo ($hang['ten_hang']) ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>



                                <div class="mb-3 row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label" name="gia_san_pham">Giá sản phẩm</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?php echo ($san_pham['gia_ban']) ?>" name="gia_ban">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label" name="so_luong">Số lượng</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" value="<?php echo ($san_pham['so_luong']) ?>" name="so_luong">
                                    </div>
                                </div>





                                <div class="mb-3 row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Trạng thái</label>
                                    <div class="col-sm-10">
                                        <select class="span10 col-sm-12" style="height: 40px;" name="hien_thi">
                                            <option value="1" <?php
                                                                if ($san_pham['hien_thi'] == "co") {
                                                                    echo ('selected="selected"');
                                                                }
                                                                ?>>Hiển thị</option>



                                            <option value="0" <?php
                                                                if ($san_pham['hien_thi'] == "khong") {
                                                                    echo ('selected="selected"');
                                                                }
                                                                ?>>Ẩn</option>
                                        </select>
                                    </div>
                                </div>



                                <div class="mb-3 row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Tình trạng</label>
                                    <div class="col-sm-10">
                                        <input name="tinh_trang" <?php
                                                                    if ($san_pham['tinh_trang'] == "co") {
                                                                        echo ("checked");
                                                                    }

                                                                    ?> value="1" type="checkbox" /> <i style="color: rgba(89, 89, 89, 0.503);">Chọn nếu còn hàng</i>
                                    </div>
                                </div>
                            </div>




                            <div class="tab-pane fade show active" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                                <br>
                                <div class="mb-3 row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Mô tả vắn tắt</label>
                                    <div class="col-sm-10">
                                        <textarea class="span12 col-sm-12" style="height: 300px;" name="mo_ta_van_tat" value="<?php echo ($san_pham['mo_ta_san_pham']) ?>"><?php echo ($san_pham['mo_ta_san_pham']) ?></textarea>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Mô tả</label>
                                    <div class="col-sm-10">
                                        <textarea class="span12 col-sm-12" style="height: 300px;" name="mo_ta"><?php echo ($san_pham['mo_ta_san_pham_chi_tiet']) ?></textarea>
                                    </div>
                                </div>
                            </div>



                            <div class="tab-pane fade show active" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                                <br>
                                <div class="mb-3 row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Ảnh sản phẩm hiện tại</label>
                                    <div class="col-sm-10">
                                        <img src="<?php echo ($san_pham['anh_thumbnail']) ?>" style="height: 100px"> <br>
                                    </div>
                                    <div>
                                        <label>Chọn ảnh đại diện khác</label>
                                        <input class="btn bg-secondary text-white" type="file" name="anh_thumbnail_moi" />
                                        <input type="hidden" name="anh_thumbnail_hien_tai" value="<?php echo ($san_pham['anh_thumbnail']); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="p-2 ms-auto">
                                <div class="control-group form-group buttons">
                                    <input class="btn btn-primary" href="index.php" id="btnAddCate" type="submit" value="Lưu" />
                                </div>
                            </div>
                        </div>



                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="./bootstrap5/js/bootstrap.min.js"></script>
</body>