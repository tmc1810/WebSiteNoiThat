<?php
include_once 'connect.php'; // nạp file kết nối database để truy suất dữ liệu
session_start();
if(isset($_POST["ID"]) && isset($_POST["numbe"])){
    $numbe = $_POST["numbe"];
    $ID = $_POST["ID"];
    $cart = $_SESSION['cart'];

    // Thực hiện truy vấn sản phẩm theo id để lấy ra số lượng. dùng để so sánh với số lượng người dùng nhập vào
    // nếu số lượng người dùng lớn hơn số lượng trong giỏ hàng thì gán số lượng bằng số lượng trong giỏ hàng
    
    $sql = "SELECT * FROM  san_pham WHERE id = ".$ID;
    
    $result = $conn->query($sql);// đây là phần thực hiện truy vấn
    if ($result->num_rows > 0) { // nếu dữ liệu có thì ta sử dụng while để duyệt qua từng hàng (có thể sử dụng foreach)
        while ($row = $result->fetch_assoc()) 
    { // Sử dụng biến
        if($numbe > $row["so_luong"] ){
            $numbe = $row["so_luong"];
        } else if($numbe < 0) {
            $numbe = 1;
        }
            }
        } else {
            echo "<h3>Không có dữ liệu.</h3>";
        }

    if(array_key_exists($ID, $cart)){
        if($numbe){
            $cart[$ID]= array(
                'name'=>$cart[$ID]["name"],
                'numbe'=> $numbe,
                'price'=>$cart[$ID]['price'],
                'img'=>$cart[$ID]['img']
            );
        }else{
            unset( $cart[$ID]);
        }
        
        $_SESSION['cart'] = $cart;
}
}

?>