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



    $sql_select_hang = "select * from hang_san_xuat";
    $cac_hang = mysqli_query($connect, $sql_select_hang);
    ?>
    <div class="content">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <div class="container-fluid bg-secondary">
                    <div class="hstack gap-2 ">
                        <div class="p-2">
                            <h5>Thêm sản phẩm<h5>
                        </div>
                    </div>
                </div>





                <div class="accordion-body">
                    <form class="form-horizontal" id="category-form" action="them_sanpham_process.php" method="post" enctype="multipart/form-data">


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
                                        <input type="text" class="form-control" name="ten_san_pham">
                                    </div>
                                </div>

                                

                                <div class="mb-3 row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Danh mục</label>
                                    <div class="col-sm-10">
                                        <select class="span10 col-sm-12" style="height: 40px;" name="ma_danh_muc">
                                            <?php foreach ($cac_danh_muc as $danh_muc) {

                                            ?>
                                                <option value="<?php echo($danh_muc['id']) ?>">
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
                                            <?php foreach ($cac_hang as $hang) {
                                            ?>
                                                <option value="<?php echo($hang['id']) ?>">
                                                    <?php echo ($hang['ten_hang']) ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>



                                <div class="mb-3 row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Giá sản phẩm</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="gia_san_pham">
                                    </div>
                                </div>






                                <div class="mb-3 row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Số lượng</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" value="0" name="so_luong">
                                    </div>
                                </div>





                                <div class="mb-3 row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Trạng thái</label>
                                    <div class="col-sm-10">
                                        <select class="span10 col-sm-12" style="height: 40px;" name="hien_thi">
                                            <option value="1" selected="selected">Hiển thị</option>
                                            <option value="0">Ẩn</option>
                                        </select>
                                    </div>
                                </div>




                                <div class="mb-3 row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Tình trạng</label>
                                    <div class="col-sm-10">
                                        <input name="tinh_trang" value="1" type="checkbox"/> <i style="color: rgba(89, 89, 89, 0.503);">Chọn nếu còn hàng</i>
                                    </div>
                                </div>
                            </div>




                            <div class="tab-pane fade show active" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                                <br>
                                <div class="mb-3 row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Mô tả vắn tắt</label>
                                    <div class="col-sm-10">
                                        <textarea class="span12 col-sm-12" style="height: 300px;" name="mo_ta_van_tat"></textarea>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Mô tả</label>
                                    <div class="col-sm-10">
                                        <textarea class="span12 col-sm-12" style="height: 300px;" name="mo_ta"></textarea>
                                    </div>
                                </div>
                            </div>



                            <div class="tab-pane fade show active" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                                <br>
                                <div class="mb-3 row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Ảnh sản phẩm</label>
                                    <div class="col-sm-10">
                                        <input class="btn bg-success text-white" type="file" name="anh_san_pham"/>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="p-2 ms-auto">
                            <div class="control-group form-group buttons">
                                <input class="btn btn-primary" href="index.php" id="btnAddCate" type="submit" value="Đăng" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="./bootstrap5/js/bootstrap.min.js"></script>
</body>