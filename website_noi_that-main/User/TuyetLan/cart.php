<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="cartsty.css">
<!-- link icon boxicon -->
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<?php
session_start();
include_once 'connect.php';
include 'funtion.php';
?>
<body onload="Function()">
    <?php
    if (isset($_POST["ID"]) && isset($_POST["soluong"])) {
        
        $ID = $_POST['ID'];
        $numbe = $_POST["soluong"];
        $sql = "SELECT * FROM `san_pham` WHERE id = ".$ID ;
        $result = $conn->query($sql);// đây là phần thực hiện truy vấn
            if ($result->num_rows > 0) { // nếu dữ liệu có thì ta sử dụng while để duyệt qua từng hàng (có thể sử dụng foreach)
                while ($row = $result->fetch_assoc()) 
            { // Sử dụng biến $row 
            if (!isset($_SESSION['cart']) || $_SESSION['cart'] == 0) {
                $cart = array();
                $cart[$ID] = array(
                    'name' => $row["ten_san_pham"],
                    'numbe' => $numbe,
                    'price' => $row["gia_ban"],
                    'img' => $row["anh_thumbnail"]
                );
            } else {
                $cart = $_SESSION['cart'];
                if (array_key_exists($ID, $cart)) {
                    if((int)$cart[$ID]['numbe'] + $numbe < $row["so_luong"])
                        {
                            $sl= (int)$cart[$ID]['numbe'] + $numbe;
                        }else{
                            $sl= $row["so_luong"];
                        }

                    $cart[$ID] = array(
                        'name' => $row["ten_san_pham"],
                        'numbe' => $sl ,
                        'price' => $row["gia_ban"],
                        'img' => $row["anh_thumbnail"]
                    );
                } else {
                    $cart[$ID] = array(
                        'name' => $row["ten_san_pham"],
                        'numbe' => $numbe,
                        'price' => $row["gia_ban"],
                        'img' => $row["anh_thumbnail"]
                    );
                }
            }
            $_SESSION['cart'] = $cart;
        }
    }
    // tải lại trang sau khi thêm sản phẩm.
    header("Location: ../TuyetLan/cart.php");
    exit;


    }
    ?>


    <section class="container" id="listcart" style="z-index: 1">
        <div id="cartx">
            <div>
                <h1 class="title_cart" style="padding-top: 40px;"><span>Giỏ hàng của tôi</span></h1>
                <div class="steps clearfix">
                    <ul class="clearfix row ml-1 mr-1 " style="padding-right: 40px;">
                        <li class="cart active col-4"><span><i class='bx bxs-cart'></i></span><span>Giỏ hàng của tôi</span><span class="step-number"><a>1</a></span></li>
                        <li class="payment  col-4" id="thanhtoan"><span><i class='bx bx-dollar'></i></span><span>Thanh toán</span><span class="step-number"><a>2</a></span></li>
                        <li class="finish col-4" id="HoanTat"><span><i class='bx bx-check'></i></span><span>Hoàn tất</span><span class="step-number"><a>3</a></span></li>
                    </ul>
                </div>
                <table id="myTable">
                    <thead>
                        <tr>

                            <th>Tên Sản Phẩm</th>
                            <th>Số Lượng</th>
                            <th>ảnh</th>
                            <th>Giá</th>
                            <th>Thành Tiền</th>
                            <th>chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sum = 0;
                        $sum1 = 0;
                        if (isset($_SESSION['cart']) && $_SESSION['cart'] != 0) {
                            foreach ($_SESSION['cart'] as $key => $value) {
                                $sum  = $value['price'] * $value['numbe'];
                                $sum1 += $sum;

                                $sql = "SELECT * FROM `san_pham` WHERE id=" . $key;
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) { // nếu dữ liệu có thì ta sử dụng while để duyệt qua từng hàng (có thể sử dụng foreach)
                                    while ($row = $result->fetch_assoc()) 
                                { // Sử dụng biến $row

                        ?>

                                <tr>

                                    <td><h3 class = "mt-2 ml-1"><?php echo $value['name'] ?></h3></td>
                                    <td><input onkeypress="return isNumberKey(event)" class="numbe" id="quanlyti_<?php echo $key ?>" type="number" value="<?php echo $value['numbe'] ?>" min="1" max="<?= $row["so_luong"]?>" onchange="updatecart(<?php echo $key ?>)"></td>
                                    <td><img class="img" height="100px" width="100px" src="../../Admin/Quan_li_san_pham/<?php echo $value['img'] ?>" alt=""></td>
                                    <td>
                                        <p><span class=price><?php echo $value["price"] ?></span><sup>đ</sup></p>
                                    </td>
                                    <td><span><?php echo $sum ?> </span><sup>đ</sup> </td>
                                    <td><input onclick="deletee(<?php echo $key ?>)" class="deletecart" type="button" id="delPOIbutton" value="Delete" /></td>

                                </tr>
                        <?php
                         }
                        } else {
                           echo "Không có dữ liệu.";
                        }
                            }
                        } else {
                            echo "<h2> Giỏ Hàng Trống</h2>";
                        }
                        ?>

                    </tbody>
                </table>
                <div class="price-total mt-3">
                    <h3> Tổng Tiền: <span><?php echo $sum1 ?></span><sup>đ</sup> </h3>
                </div>

                <div class="button text-right" style="text-align: right; display: flex; justify-content: flex-end ;">
                            <a style="width:200px;"  style="color: #fff;" class="btn btn-primary"  href="trangsanpham.php">Tiếp tục mua hàng</a>
                        <!-- Thẻ <a> cho nút "Tiến hành thanh toán" -->
                            <a id="thanh1" style="width:200px; color: #fff;" class="btn btn-primary dp-none ml-2" >Tiến hành thanh toán</a>

                            <!-- <a  style="color: #fff;" class="btn btn-primary " href="./order.php">Tiến hành thanh toán</a> -->
                        </div>
            </div>
        </div>

    </section>

    <!-- ================================thanh toan================================ -->

    <?php
    include "order.php";
    ?>

</body>
<script>
     // Kiểm tra nếu có thông báo thành công, thì tải lại trang
   if (localStorage.getItem('purchaseSuccess')) {
      localStorage.removeItem('purchaseSuccess'); // Xóa thông báo đã sử dụng
      location.reload(); // Tải lại trang
   }


     function updatecart(ID) {
        numbe = $('#quanlyti_' + ID).val();
        $.post("updatecart.php", {
            "ID": ID,
            "numbe": numbe
        }, function(data) {
            $("#listcart").load("../TuyetLan/cart.php #cartx");
        });

        window.location.reload();
    }

    function deletee(ID) {
        $.post("updatecart.php", {
            "ID": ID,
            "numbe": 0
        }, function(data) {
            //afterupdate cart
            $("#listcart").load("../TuyetLan/cart.php #cartx");
        });
        window.location.reload();
    }
    function Function() {
        var rowCount = $('#myTable tr').length;
        // alert (rowCount);
        // alert("Hello! I am an alert box!!");
        if(rowCount >1){
            let thongtin1 = document.getElementById('thanh1')
            thongtin1.classList.add('display-blookk');
        }
    }
    function thanhtoan() {
        let thanhtoan = document.getElementById('thanhtoan')
        let thongtin = document.getElementById('thongtin')
        thongtin.classList.add('display-blookk');
        thanhtoan.classList.add('active');
        
    }

    // JavaScript để thêm sự kiện click cho nút "Tiến hành thanh toán"
    document.getElementById('thanh1').addEventListener('click', function() {
        // Gọi hàm thanhtoan() khi nút được nhấn
        thanhtoan();
    });

    

</script>