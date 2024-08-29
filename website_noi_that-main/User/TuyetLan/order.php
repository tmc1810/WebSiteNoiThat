
<section class="get-in-touch dp-none" id="thongtin">
   <h1 class="title">Thông Tin Khách Hàng</h1>
   <?php

   if (isset($_POST["addNew"])) {
      $total2 = 0;
      $id_user =  $_SESSION['id'];
      $curentdate = date("Y-m-d");
      $_POST["user_id"] = $id_user;  
      $_POST["trang_thai"] = 0;
      $_POST["thoi_gian_dat_hang"] = $curentdate;
      if ($_SESSION['cart'] == 0) {
         echo ('<h3 class="">Không có sản phẩm nào trong giỏ hàng</h3>');
      } else {
         foreach ($_SESSION['cart'] as $key => $value) {
            $total2 += (int)$value["numbe"] * (int)$value["price"];
         }
         $_POST["tong_hoa_don"] = $total2;
         $table = 'don_hang';
        
         $id = addNew('don_hang', $_POST, $conn);
         foreach ($_SESSION['cart'] as $key => $value) {
            $price = $value["price"];
            $numbe = $value["numbe"];
            $sql = "INSERT INTO `chi_tiet_don_hang`( `ma_don_hang`, `ma_san_pham`, `gia_ban`, `so_luong`) VALUES ('$id','$key','$price','$numbe')";
            $conn->query($sql);
            $sql = "SELECT * FROM `san_pham` WHERE id= " . $key;
            $result = $conn->query($sql);
            if ($result->num_rows > 0) { // nếu dữ liệu có thì ta sử dụng while để duyệt qua từng hàng (có thể sử dụng foreach)
               while ($row = $result->fetch_assoc()) 
           { // Sử dụng biến $row
            $quantityupdate = ($row["so_luong"] - $numbe);
            $daban = ($row["da_ban"] + $numbe);

            $sql = "UPDATE `san_pham` SET `so_luong` = '$quantityupdate', `da_ban` = '$daban' WHERE `san_pham`.`id` = $key;";
            echo ($sql);
            $conn->query($sql);
               }
            } else {
               echo "Không có dữ liệu.";
            }
            
         }

         $_SESSION['cart'] = 0;
         header("Refresh:0");
         echo '<script>
               localStorage.setItem("purchaseSuccess", "true");
               window.location.href = "../TuyetLan/cart.php";
            </script>';
         exit;
      }
     
   }

   ?>
   <form class="contact-form  row" action="" method="post">
      <div class="form-field col-lg-6">
         <input style="padding-left: 3rem;" id="name" name="ho_ten" class="input-text js-input" type="text" required>
         <label class="label" for="name">Name</label>
      </div>
      <div class="form-field col-lg-6 ">
         <input style="padding-left: 3rem;" id="email" name="email" class="input-text js-input" type="email" required>
         <label class="label" for="email">E-mail</label>
      </div>
      
      <div class="form-field col-lg-6 ">
         <input style="padding-left: 3rem;" id="phone" name="so_dien_thoai" class="input-text js-input" type="text" required>
         <label class="label" for="phone">phone</label>
      </div>
      <div class="form-field col-lg-6 ">
         <input style="padding-left: 3rem;" id="address" name="dia_chi" class="input-text js-input" type="text" required>
         <label class="label" for="address">Address</label>
      </div>
      <div class="form-field col-lg-12">
         <input style="padding-left: 3rem;" id="message" name="ghi_chu" class="input-text js-input" type="text" required>
         <label class="label" for="message">Message</label>
      </div>
      <div class="form-field col-lg-12">
         <input name="addNew" class="submit-btn" type="submit" value="Mua Hàng" onclick="Function1()">
      </div>
   </form>

</section>
<script>
   function Function1() {
      alert(" Bạn đã mua hàng thành công!");
   }
</script>