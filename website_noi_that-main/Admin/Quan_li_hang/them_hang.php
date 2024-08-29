<head>
    <title>Quản lý hãng</title>
    <link rel="shortcut icon" type="image/png" href="../img/logo.png" />
</head>

<script>
document.getElementById("category-form").addEventListener("submit", function(event) {
    event.preventDefault(); // Ngăn chặn gửi biểu mẫu mặc định

    // Thực hiện các bước xử lý dữ liệu và thêm hãng vào cơ sở dữ liệu ở đây
    // Sau khi thêm thành công, bạn có thể chuyển hướng bằng JavaScript:

    window.location.href = "index.php"; // Chuyển đến trang quan_ly_hang.php
});
</script>

<body>


<?php
include '../Main_QuanTri/nav.php';
?>

    <div class="content">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <div class="container-fluid bg-secondary">
                    <div class="hstack gap-2 ">
                        <div class="p-2">
                            <h5>Thêm hãng</h5>
                        </div>
                    </div>
                </div>
                <div class="accordion-body">
                    <form class="form-horizontal" id="category-form" action="./them_hang_process.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Tên hãng</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="tenhang">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Số điện thoại</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="sdt">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Địa chỉ</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="diachi">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Ảnh đại diện</label>
                            <div class="col-sm-10">
                                <input class="btn bg-secondary text-white" type="file" value="Chọn ảnh đại diện"
                                    name="anhdaidien"/>
                            </div>
                        </div>

                        <!-- Các trường nhập dữ liệu -->
                        <div class="control-group form-group buttons">
                            <button class="btn btn-primary" type="submit" id="btnAddCate">Thêm hãng</button>
                            <!-- <div id="success-message" style="display: none;" class="alert alert-success">Thêm thành công!</div> -->
                        </div>
                    

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>