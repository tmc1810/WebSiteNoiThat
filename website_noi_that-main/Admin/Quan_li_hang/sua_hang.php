<head>
    <title>Quản lý hãng</title>
    <link rel="shortcut icon" type="image/png" href="../img/logo.png" />
</head>

<body>
<?php
include '../Main_QuanTri/nav.php';

// Import kết nối CSDL
include '../Main_QuanTri/connect.php';
// ...
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM hang_san_xuat WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $hang = mysqli_fetch_assoc($result);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tenHangMoi = $_POST['tenhang'];
            $diaChiMoi = $_POST['diachi'];
            $soDienThoaiMoi = $_POST['sodienthoai'];

            // Xử lý tải ảnh đại diện mới (nếu có)
            if ($_FILES['anhdaidien']['error'] === UPLOAD_ERR_OK) {
                $targetDirectory = "anh_hang/";
                $targetFileName = basename($_FILES['anhdaidien']['name']);
                $targetFilePath = $targetDirectory . $targetFileName;

                $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
                $allowedExtensions = array("jpg", "jpeg", "png", "gif");

                if (in_array($imageFileType, $allowedExtensions)) {
                    if (move_uploaded_file($_FILES['anhdaidien']['tmp_name'], $targetFilePath)) {
                        // Xóa ảnh đại diện cũ nếu tồn tại
                        if (file_exists($hang['anh_dai_dien'])) {
                            unlink($hang['anh_dai_dien']);
                        }

                        // Cập nhật thông tin hãng với ảnh đại diện mới
                        $sqlUpdate = "UPDATE hang_san_xuat SET ten_hang = '$tenHangMoi', dia_chi = '$diaChiMoi', so_dien_thoai = '$soDienThoaiMoi', anh_dai_dien = '$targetFilePath' WHERE id = $id";
                        if (mysqli_query($conn, $sqlUpdate)) {
                            header("Location: index.php");
                            exit();
                        } else {
                            echo "Lỗi: " . mysqli_error($conn);
                        }
                    } else {
                        echo "Tải lên tệp ảnh không thành công.";
                    }
                } else {
                    echo "Chỉ chấp nhận các tệp ảnh JPG, JPEG, PNG và GIF.";
                }
            } else {
                // Nếu không có tệp ảnh mới được tải lên, chỉ cập nhật thông tin khác
                $sqlUpdate = "UPDATE hang_san_xuat SET ten_hang = '$tenHangMoi', dia_chi = '$diaChiMoi', so_dien_thoai = '$soDienThoaiMoi' WHERE id = $id";
                if (mysqli_query($conn, $sqlUpdate)) {
                    header("Location: index.php");
                    exit();
                } else {
                    echo "Lỗi: " . mysqli_error($conn);
                }
            }
        }

    } else {
        echo "Không tìm thấy hãng với id này.";
    }
} else {
    echo "Tham số id không hợp lệ.";
}
// ...

?>

<!-- ... (Phần HTML giữ nguyên như bạn đã thêm vào) ... -->

<!-- ... (Phần HTML giữ nguyên như bạn đã thêm vào) ... -->


    <div class="content">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <div class="container-fluid bg-secondary">
                    <div class="hstack gap-2 ">
                        <div class="p-2">
                            <h5>Sửa hãng</h5>
                        </div>
                    </div>
                </div>
                <div class="accordion-body">
                <form class="form-horizontal" id="category-form" action="#" method="post" enctype="multipart/form-data">
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Tên hãng</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="tenhang" value="<?php echo $hang['ten_hang']; ?>">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Số điện thoại</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="sodienthoai" value="<?php echo $hang['so_dien_thoai']; ?>">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Địa chỉ</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="diachi" value="<?php echo $hang['dia_chi']; ?>">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Ảnh đại diện</label>
                            <div class="col-sm-10">
                            <input class="btn bg-secondary text-white" type="file" name="anhdaidien" accept="image/*" >
                            </div>
                        </div>

                        <div class="control-group form-group buttons">
                            <input class="btn btn-primary" href="index.php" id="btnAddCate" type="submit" value="Sửa hãng" <?php echo $hang['anh_dai_dien']; ?>/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
