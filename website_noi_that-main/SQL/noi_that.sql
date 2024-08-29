-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2023 at 05:35 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `noi_that`
--

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_don_hang`
--

CREATE TABLE `chi_tiet_don_hang` (
  `id` int(11) NOT NULL,
  `ma_don_hang` int(11) DEFAULT NULL,
  `ma_san_pham` int(11) DEFAULT NULL,
  `gia_ban` int(11) DEFAULT NULL,
  `so_luong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chi_tiet_don_hang`
--

INSERT INTO `chi_tiet_don_hang` (`id`, `ma_don_hang`, `ma_san_pham`, `gia_ban`, `so_luong`) VALUES
(12, 7, 4, 14900000, 1),
(13, 7, 5, 30900000, 1),
(14, 7, 6, 5699000, 1),
(15, 8, 5, 30900000, 1),
(16, 8, 8, 51000000, 2),
(17, 8, 9, 25930000, 3),
(18, 9, 4, 14900000, 4),
(19, 9, 5, 30900000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `danh_muc`
--

CREATE TABLE `danh_muc` (
  `id` int(11) NOT NULL,
  `anh_danh_muc` text DEFAULT NULL,
  `ten_danh_muc` varchar(100) DEFAULT NULL,
  `thu_tu` int(11) DEFAULT NULL,
  `hien_thi_trang_chu` varchar(10) DEFAULT NULL,
  `hien_thi` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danh_muc`
--

INSERT INTO `danh_muc` (`id`, `anh_danh_muc`, `ten_danh_muc`, `thu_tu`, `hien_thi_trang_chu`, `hien_thi`) VALUES
(2, 'anh_danh_muc/1697210202.jpg', 'Bàn làm việc', 1, 'co', 'co'),
(3, 'anh_danh_muc/1697213830.jpg', 'Giường ngủ', 2, 'co', 'co'),
(4, 'anh_danh_muc/1697213856.jpg', 'Khóa thông minh', 3, 'co', 'co'),
(5, 'anh_danh_muc/1697213898.jpg', 'Sofa', 4, 'co', 'co'),
(6, 'anh_danh_muc/1697213957.jpg', 'Tủ quần áo', 5, 'co', 'co');

-- --------------------------------------------------------

--
-- Table structure for table `don_hang`
--

CREATE TABLE `don_hang` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ho_ten` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `so_dien_thoai` varchar(20) DEFAULT NULL,
  `dia_chi` varchar(200) DEFAULT NULL,
  `ghi_chu` text DEFAULT NULL,
  `tong_hoa_don` int(11) NOT NULL,
  `thoi_gian_dat_hang` datetime NOT NULL,
  `trang_thai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `don_hang`
--

INSERT INTO `don_hang` (`id`, `user_id`, `ho_ten`, `email`, `so_dien_thoai`, `dia_chi`, `ghi_chu`, `tong_hoa_don`, `thoi_gian_dat_hang`, `trang_thai`) VALUES
(7, 2, 'apple', 'nam1@gmail.com', '0999999999', 'hà nội', 'sadads', 51499000, '2023-10-15 00:00:00', 'Hoàn thành'),
(8, 6, 'apple', 'nam1@gmail.com', '0999999999', 'hà nội', 'sadsa', 210690000, '2023-10-15 00:00:00', 'Chờ xử lý'),
(9, 2, 'Cường Trần Mạnh', 'tmc9012@gmail.com', '0392683276', 'Hà Nội', 'Không có gì', 121400000, '2023-10-16 00:00:00', '0');

-- --------------------------------------------------------

--
-- Table structure for table `hang_san_xuat`
--

CREATE TABLE `hang_san_xuat` (
  `id` int(11) NOT NULL,
  `ten_hang` varchar(100) DEFAULT NULL,
  `so_dien_thoai` varchar(20) DEFAULT NULL,
  `dia_chi` varchar(200) DEFAULT NULL,
  `anh_dai_dien` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hang_san_xuat`
--

INSERT INTO `hang_san_xuat` (`id`, `ten_hang`, `so_dien_thoai`, `dia_chi`, `anh_dai_dien`) VALUES
(10, 'Trung Quốc 2', '11111', 'Trung Quốc', 'anh_hang/1697212933.png'),
(11, 'Việt Nam', '0888888888', 'Việt Nam', 'anh_hang/1697213169.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

CREATE TABLE `san_pham` (
  `id` int(11) NOT NULL,
  `ma_danh_muc` int(11) DEFAULT NULL,
  `ma_hang_san_xuat` int(11) DEFAULT NULL,
  `ten_san_pham` text DEFAULT NULL,
  `gia_ban` int(11) DEFAULT NULL,
  `anh_thumbnail` text DEFAULT NULL,
  `mo_ta_san_pham` text DEFAULT NULL,
  `mo_ta_san_pham_chi_tiet` text DEFAULT NULL,
  `ngay_them_san_pham` datetime DEFAULT NULL,
  `ngay_cap_nhat_san_pham` datetime DEFAULT NULL,
  `so_luong` int(11) DEFAULT NULL,
  `da_ban` int(11) DEFAULT NULL,
  `luot_xem` int(11) DEFAULT NULL,
  `hien_thi` varchar(10) DEFAULT NULL,
  `tinh_trang` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `san_pham`
--

INSERT INTO `san_pham` (`id`, `ma_danh_muc`, `ma_hang_san_xuat`, `ten_san_pham`, `gia_ban`, `anh_thumbnail`, `mo_ta_san_pham`, `mo_ta_san_pham_chi_tiet`, `ngay_them_san_pham`, `ngay_cap_nhat_san_pham`, `so_luong`, `da_ban`, `luot_xem`, `hien_thi`, `tinh_trang`) VALUES
(4, 2, 11, 'Bàn làm việc Coastal', 14900000, 'anh_san_pham/1697214196.jpg', 'Bàn làm việc Coastal', 'Coastal mang đậm chất Việt khi khéo léo dung hòa được những nét đẹp lấy cảm hứng từ miền duyên hải nước ta với các vật liệu cao cấp, lối thiết kế hiện đại. Bàn làm việc Coastal có thiết kế độc đáo với phần tủ kéo cong mang đến không gian làm việc sáng tạo và độc đáo. Chất liệu gỗ Ash vừa đáp ứng tính thẩm mỹ, đồng thời là vật liệu bền bỉ theo thời gian. Khi kết hợp bàn làm việc cùng ghế ăn Coastal sẽ tạo nên góc làm việc cực kỳ thoải mái và tiện nghi.', '2023-10-13 06:23:16', '2023-10-13 06:23:16', 41, 9, 1, 'co', 'co'),
(5, 2, 11, 'Bàn làm việc Fence', 30900000, 'anh_san_pham/1697214399.jpg', 'Bàn làm việc Fence', 'Mẫu bàn Fence được thiết kế mang đậm phong cách hiện đại và sang trọng. Phần mặt bàn được tạo hình đơn giản đề cao sự rộng rãi để có thể cung cấp đủ không gian cho màn hình máy tính, laptop cũng như các vật dụng văn phòng cơ bản khác.\r\n\r\nVề màu sắc tổng thể thì Fence là sự kết hợp đầy sức sáng tạo giữa màu gỗ tự nhiên và màu đen, tạo nên sự tương phản và hài hòa trong thiết kế. Chiếc bàn này được làm từ gỗ công nghiệp với lớp hoàn thiện Melamine giúp chống thấm nước, hơi ẩm và trầy xước. Ngoài ra, phần khung kim loại sơn tĩnh điện tạo nên sự chắc chắn và bền bỉ trong thời gian dài sử dụng.', '2023-10-13 06:26:39', '2023-10-13 06:26:39', 40, 10, 1, 'co', 'co'),
(6, 2, 10, 'Bàn làm việc Hopper', 5699000, 'anh_san_pham/1697214570.jpg', 'Bàn làm việc Hopper', 'Bàn làm việc Hopperlà sản phẩm nhập từ Ý. Đặc trưng bởi các hình dạng mềm mại, mặt cong nhẹ, góc tròn và đường vát. Các tính chất tự nhiên của gỗ được làm sáng lên bởi cách kết hợp tương phản về màu sắc của ngăn kéo giữa và ngăn xếp nâng. Là giải pháp lý tưởng cho việc trang trí văn phòng tại nhà, nhưng cũng phù hợp hoàn hảo trong phòng trẻ em cũng như trong các môi trường với phong cách tỉnh táo hơn nhờ có sự kết hợp màu sắc.', '2023-10-13 06:29:30', '2023-10-13 06:29:30', 47, 3, 1, 'co', 'co'),
(7, 2, 10, 'Bàn làm việc Kate', 13200000, 'anh_san_pham/1697214635.jpg', 'Bàn làm việc Kate', 'Bàn làm việc Kate mang phong cách bán cổ điển với màu trắng nhẹ nhàng như tô điểm cho không gian thêm sáng. Bàn Kate được làm bằng gỗ sồi sơn lấy ghim giúp người sử dụng vẫn cảm nhận được từng thớ gỗ.', '2023-10-13 06:30:35', '2023-10-13 06:30:35', 50, 0, 1, 'co', 'co'),
(8, 2, 11, 'Bàn làm việc Maxine', 51000000, 'anh_san_pham/1697214691.jpg', 'Bàn làm việc Maxine', 'Một thiết kế bàn làm việc đẳng cấp cho không gian làm việc của bạn, Maxine sử dụng chất liệu da trên bề mặt, khung gỗ hoàn thiện mdf veneer nâu trầm sang trọng tạo cảm giác thư thái, nhẹ nhàng. Công năng của chiếc bàn được sắp tối ưu với các hộc kéo rộng. Maxine – Nét nâu trầm sang trọng Maxine, mang thiết kế vượt thời gian, gửi gắm và gói gọn lại những nét đẹp của thiên nhiên và con người nhưng vẫn đầy tính ứng dụng cao trong suốt hành trình phiêu lưu của nhà thiết kế người Pháp Dominique Moal. Bộ sưu tập nổi bật với màu sắc nâu trầm sang trọng, là sự kết hợp giữa gỗ, da bò và kim loại vàng bóng. Đặc biệt trên mỗi sản phẩm, những nét bo viên, chi tiết kết nối được sử dụng kéo léo tạo ra điểm nhất rất riêng cho bộ sưu tập. Maxine thể hiện nét trầm tư, thư giãn để tận hưởng không gian sống trong nhịp sống hiện đại. Sản phẩm thuộc BST Maxine được sản xuất tại Việt Nam.', '2023-10-13 06:31:31', '2023-10-13 06:31:31', 17, 3, 1, 'co', 'co'),
(9, 3, 11, 'Giường Pop', 25930000, 'anh_san_pham/1697214922.jpg', 'Giường Pop', 'Giường Pop 1.8M M3 Vải Atlanta Kd1084 12 sử dụng nét đẹp đường vân gỗ cuộn xoáy đặc trưng, thể hiện trên tông màu nâu trầm ấm đầy sang trọng. Giường ngủ Pop là một trong những lựa chọn dành cho người yêu thích cái đẹp tinh giản, phù hợp với không gian phòng ngủ có diện tích khiêm tốn.', '2023-10-13 06:35:22', '2023-10-13 06:35:22', 24, 6, 1, 'co', 'co'),
(10, 3, 11, 'Giường Cabo', 23000000, 'anh_san_pham/1697215087.jpg', 'Giường Cabo', 'Giường Cabo với thiết kế trang nhã, tinh tế, sang trọng trong đó khung giường được làm bằng chất liệu gỗ phủ lớp MDF veener ash cao cấp, chân giường được làm từ kim loại được sơn đen chắc chắn, có khả năng chịu lực tốt. Giường Cabo mang đến cảm giác thư giãn, thoải mái nhất để nghỉ ngơi sau thời gian làm việc dài, mà còn là món đồ quan trọng trong thiết kế nội thất phòng ngủ.', '2023-10-13 06:38:07', '2023-10-13 06:38:07', 30, 0, 1, 'co', 'co'),
(11, 3, 10, 'Giường ngủ Miami', 19300000, 'anh_san_pham/1697215227.jpg', 'Giường ngủ Miami', 'Giường ngủ bọc vải Miami sử dụng gỗ Sồi trắng nhập khẩu từ Mỹ kết hợp MDF chống ẩm cao cấp tạo nên sự chắc chắn cho sản phẩm. Nhờ vào tone ấm của gỗ, giường Miami mang đến một sự hài hòa, đặc trưng của phong cách nội thất Bắc Âu.', '2023-10-13 06:40:27', '2023-10-13 06:40:27', 35, 0, 1, 'co', 'co'),
(12, 3, 11, 'Giường Leman', 33650000, 'anh_san_pham/1697215302.jpg', 'Giường Leman ', 'Giường ngủ bọc vải Leman 1m8 màu 02', '2023-10-13 06:41:42', '2023-10-13 06:41:42', 30, 0, 1, 'co', 'co'),
(13, 3, 11, 'Giường Hộc Kéo Iris', 15620000, 'anh_san_pham/1697215348.jpg', 'Giường Hộc Kéo Iris', 'Giường hộc kéo Iris 1m6 với thiết kế đóng nút đầu giường, điểm đặc biệt là bốn ngăn chứa đồ rộng thuận tiện cất những vật dụng trong phòng ngủ như gối, mền, drap hết sức gọn gàng. Chắc chắn sẽ là sự lựa chọn tối ưu cho không gian phòng ngủ hiện đại. Giường hộc kéo Iris có 2 kích thước 1m6 và 1m8, đa dạng màu sắc.', '2023-10-13 06:42:28', '2023-10-13 06:42:28', 30, 0, 1, 'co', 'co'),
(14, 3, 10, 'Giường Coastal', 28900000, 'anh_san_pham/1697215388.jpg', 'Giường Coastal', 'Giường ngủ Coastal mang đến cảm giác như đang nằm trên bãi biển dài bình yên, với đường cong êm ái ở đầu giường, các cạnh cùng phần vạt hở duyên dáng hình chữ V, gợi nhớ đến hình ảnh chim hải âu bay trên biển. BST Coastal ban đầu được thiết kế cho căn hộ nghỉ dưỡng ở vùng duyên hải. Nhưng với sự sáng tạo và phá cách, Coastal trở nên năng động và phù hợp với nhiều không gian sống, mang thiên nhiên vào mọi không gian.', '2023-10-13 06:43:08', '2023-10-13 06:43:08', 35, 0, 1, 'co', 'co'),
(15, 4, 10, 'KHÓA CỬA VÂN TAY CỔ ĐIỂN S1108-RG', 26800000, 'anh_san_pham/1697215631.jpg', 'KHÓA CỬA VÂN TAY CỔ ĐIỂN S1108-RG', 'Khóa cửa vân tay cổ điển được thiết kế theo phong cách cổ điển của Châu Âu, mang đến vẻ sang trọng quý phái cho ngôi nhà của bạn đặc biệt là các biệt thự mang kiểu dáng cổ điển và tân cổ điển. Khóa cửa vân tay cổ điển có chức năng hướng dẫn bằng dọng nói khi chúng ta thao tác hoặc thiết lập cài đặt cho khóa.\r\n\r\nKhóa được mở bằng: Vân tay, mã số, thẻ từ hoặc chìa khóa cơ người dùng có thể lựa chọn bất kì hình thức nào trong hình thức trên để mở khóa (chìa cơ dùng trong trường hợp khẩn cấp). Thuận tiện, linh hoạt và an toàn cho người sử dụng.', '2023-10-13 06:47:11', '2023-10-13 06:47:11', 30, 0, 1, 'co', 'co'),
(16, 4, 11, 'KHÓA NHẬN DIỆN KHUÔN MẶT TENON A7X', 18000000, 'anh_san_pham/1697215700.jpg', 'KHÓA NHẬN DIỆN KHUÔN MẶT TENON A7X', 'Khóa cửa Tenon A7X là dòng khóa vân tây kết hợp nhận diện khuôn mặt Face ID 3D tiên tiến. Khóa Tenon A7X  có thiết kế đẩy/kéo hiện đại, mở khóa bằng: Vân tay, nhận diện khuôn mặt Face ID 3D, thẻ từ và chìa cơ. Khóa vân tay nhận diên khuôn mặt Tenon A7X được thiết kế với hợp kim đúc nguyên khối cứng cáp và sử dụng vân tay công nghệ Area Scanning siêu nhạy', '2023-10-13 06:48:20', '2023-10-13 06:48:20', 60, 0, 1, 'co', 'co'),
(17, 4, 11, 'KHÓA VÂN TAY CỬA NHÔM IKS-L101', 4880000, 'anh_san_pham/1697215752.jpg', 'KHÓA VÂN TAY CỬA NHÔM IKS-L101', 'Khóa cửa IKS-L101 là sản phẩm khóa vân tay chuyên dùng cho cửa nhôm xingfa, nhôm hệ khác, cửa nhựa lõi thép hoặc cửa gỗ đố cửa bé. Khóa IKS-L101 được làm bằng vật liệu hợp kim chắc chắn và chịu ăn mòn tốt. Khóa vân tay cửa nhôm IKS-L101 sẽ là khắc tinh của các loại cửa. Vì dòng khóa thông minh này có thể lắp được tất cả các loại cửa thông dụng nhất hiện nay. Như cửa sắt, cửa nhôm hệ xingfa, cửa nhựa, cửa gỗ mà các mẫu khóa khác không làm được', '2023-10-13 06:49:12', '2023-10-13 06:49:12', 90, 0, 1, 'co', 'co'),
(18, 4, 11, 'KHÓA CỬA VÂN TAY IKS - Z3V', 4640000, 'anh_san_pham/1697215794.jpg', 'KHÓA CỬA VÂN TAY IKS - Z3V', 'Khóa cửa vân tay IKS Z3 là dòng khóa tay gạt vân tay và mã số. Sử dụng Công nghệ vân tay đa điểm Area Scanning siêu nhạy và sử dụng màn hình Oled đăng ký vân tay và xem lịch sử mở cựa tiện dụng, dễ dàng hoạt động.', '2023-10-13 06:49:54', '2023-10-13 06:49:54', 50, 0, 1, 'co', 'co'),
(19, 4, 11, 'Khóa cửa thông minh philips DDL702-5HWS', 11500000, 'anh_san_pham/1697215833.jpg', 'Khóa cửa thông minh philips DDL702-5HWS', 'Khóa vân tay Philips DDL702-5HWS là dòng khóa push/pull mở bằng vân tay và thẻ từ. Được làm bằng vật liệu hợp kim nguyên khối chắc chắn và chống chịu ăn mòn, Philips 702 được đánh giá là một trong những mẫu cao cấp được ưu chuộng nhất hiện nay.', '2023-10-13 06:50:33', '2023-10-13 06:50:33', 38, 0, 1, 'co', 'co'),
(20, 5, 11, 'Sofa 3 chỗ PENNY', 26900000, 'anh_san_pham/1697215939.jpg', 'Sofa 3 chỗ PENNY', 'Sự đơn giản, tinh tế, sang trọng và không kém phần nổi bật của chiếc Sofa mang dòng máu bất diệt Scandivian này với lần lượt các phiên bản màu từ tối tới sáng bật Pastel sẽ mang lại các sắc màu không thể lẫn vào đâu và đa dạng cho từng không gian sống nhà bạn. Thiết kế vuông vức, thanh mảnh nhẹ nhàng là sự pha trộn giữa vững chãi và nhẹ nhàng là tất cả những yếu tố thiết yếu hội tụ ở chiếc sofa này.', '2023-10-13 06:52:19', '2023-10-13 06:52:19', 36, 0, 1, 'co', 'co'),
(21, 5, 10, 'Sofa Coastal 2 chỗ vải vàng', 32900000, 'anh_san_pham/1697215997.jpg', 'Sofa Coastal 2 chỗ vải vàng', 'Sofa Coastal gây ấn tượng bằng những đường cong bồng bềnh, theo xu hướng Modern Organic – gần gũi với thiên nhiên mà vẫn hiện đại, thoải mái. Điểm đặc biệt của BST lần này nằm ở sự tỉ mỉ của những người thợ thủ công lành nghề, họ đã hoàn thành những đường may uốn lượn không tì vết, mang đến một thiết kế chỉn chu, \"cân\" mọi góc nhìn. Cảm giác êm ái và thư thái sẽ là những tính từ đầu tiên được nhắc đến khi trải nghiệm sofa Coastal.', '2023-10-13 06:53:17', '2023-10-13 06:53:30', 32, 0, 1, 'co', 'co'),
(22, 5, 10, 'Sofa Combo 3 chỗ da Bali 520', 59000000, 'anh_san_pham/1697216082.jpg', 'Sofa Combo 3 chỗ da Bali 520', 'Sofa Combo 3 chỗ da Bali 520 màu nâu trầm là sự lựa chọn sáng suốt nhất của bạn cho không gian phòng khách thêm ấm áp và êm ái. Đây là mẫu sofa da sở hữu khung gỗ beech cùng với mousse siêu đàn hồi, chân kim loại sơn đen và gold, bọc da tự nhiên rất bền, đẹp, giá cả phải chăng phù hợp với các không gian thường xuyên tiếp khách, người ra vào nhiều.', '2023-10-13 06:54:42', '2023-10-13 06:54:42', 20, 0, 1, 'co', 'co'),
(23, 5, 11, 'Sofa Jadora 3 chỗ', 39180000, 'anh_san_pham/1697216299.jpg', 'Sofa Jadora 3 chỗ', 'Sofa Jadora là một sản phẩm được thiết kế và sản xuất bởi Nhà Xinh. Với kiểu dáng rộng rãi cùng phần đệm ngồi êm ái, Jadora sẽ mang đến cho người dùng trải nghiệm thư thái nhất. Trong phiên bản mới, Jadora khoác lên mình màu sắc trang nhã, hiện đại với sự kết hợp của các tông màu mới mẻ sẽ là điểm nhấn tuyệt vời cho không gian căn hộ. Thiết kế tựa như một chiếc giường ngủ, sofa Jadora rất phù hợp để bạn ngồi đọc sách hoặc ngả lưng thư giãn. Sản phẩm dễ dàng phối hợp với các thiết kế khác như bàn nước hoặc bàn bên để tạo nên không gian sống độc đáo.', '2023-10-13 06:58:19', '2023-10-13 06:58:19', 35, 0, 1, 'co', 'co'),
(24, 5, 11, 'Sofa Miami 2 chỗ vải xám', 15200000, 'anh_san_pham/1697216356.jpg', 'Sofa Miami 2 chỗ vải xám.', 'Sofa Miami khoác lên mình một màu xám tinh tế, tối giản, mang đến không gian phòng khách hiện đại, trang nhã. Sofa Miami 2 chỗ vải xám sử dụng khung gỗ bọc vải kết hợp cùng với phần nệm ngồi có thể tháo rời, dễ dàng vệ sinh hiệu quả.', '2023-10-13 06:59:16', '2023-10-13 06:59:16', 44, 0, 1, 'co', 'co'),
(25, 5, 10, 'Sofa Poppy 2.5 chỗ vải vàng', 19101000, 'anh_san_pham/1697216472.jpg', 'Sofa Poppy 2.5 chỗ vải vàng', 'Sofa Poppy sở hữu sắc vàng tươi tắn mang phong cách thời trang, cá tính. Sofa có phần chân ghế được làm bằng gỗ và được bọc vải cao cấp. Sofa sẽ là vật trang trí nổi bật cho không gian phòng khách cũng như sẽ mang lại cảm giác thoải mái cho người ngồi.', '2023-10-13 07:01:12', '2023-10-13 07:01:12', 38, 0, 1, 'co', 'co'),
(26, 6, 10, 'Tủ áo Acrylic', 25000000, 'anh_san_pham/1697216584.jpg', 'Tủ quần áo Acrylic', 'Mẫu tủ quần áo Acrylic trên màu trắng kết hợp màu gỗ sáng mang lại vẻ đẹp tinh tế và sang trọng cho căn phòng. Ngoài ra, các ngăn kéo chứa được thiết kế thêm mang lại sự tiện dụng trong quá trình sử dụng.', '2023-10-13 07:03:04', '2023-10-13 07:03:04', 25, 0, 1, 'co', 'co'),
(27, 6, 11, 'Tủ áo Harmony', 24888000, 'anh_san_pham/1697216640.jpg', 'Tủ áo Harmony', 'Là sự kết hợp của màu trắng tinh khôi với màu gỗ ấm áp trên nền những đường nét thiết kế hiện đại, trang nhã. Harmony được đánh giá rất cao cả về kiểu dáng và công năng, đó sẽ là niềm tự hào của gia chủ khi khách đến thăm nhà.', '2023-10-13 07:04:00', '2023-10-13 07:04:00', 26, 0, 1, 'co', 'co'),
(28, 6, 11, 'Tủ áo Maxine', 39000000, 'anh_san_pham/1697216672.jpg', 'Tủ áo Maxine', 'Là sự kết hợp của màu trắng tinh khôi với màu gỗ ấm áp trên nền những đường nét thiết kế hiện đại, trang nhã. Harmony được đánh giá rất cao cả về kiểu dáng và công năng, đó sẽ là niềm tự hào của gia chủ khi khách đến thăm nhà.', '2023-10-13 07:04:32', '2023-10-13 07:04:32', 42, 0, 1, 'co', 'co');

-- --------------------------------------------------------

--
-- Table structure for table `san_pham_desc`
--

CREATE TABLE `san_pham_desc` (
  `id` int(11) NOT NULL,
  `ma_san_pham` int(11) DEFAULT NULL,
  `anh_thumbnail_bo_sung` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `ho_ten` varchar(50) DEFAULT NULL,
  `gioi_tinh` varchar(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `so_dien_thoai` varchar(20) DEFAULT NULL,
  `cap_bac` varchar(20) DEFAULT NULL,
  `dia_chi` varchar(200) DEFAULT NULL,
  `mat_khau` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `ho_ten`, `gioi_tinh`, `email`, `so_dien_thoai`, `cap_bac`, `dia_chi`, `mat_khau`) VALUES
(1, 'Quản trị Hello', 'Nam', 'admin@gmail.com', '0392683276', 'Quản trị', 'Hà Nội', '1'),
(2, 'Khách Hello', 'Nam', 'user@gmail.com', '0392654654', 'Khách', 'Hà Nam', '1'),
(6, 'nam157', NULL, 'nam@gmail.com', NULL, 'Khách', NULL, '157');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ma_don_hang` (`ma_don_hang`),
  ADD KEY `ma_san_pham` (`ma_san_pham`);

--
-- Indexes for table `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `hang_san_xuat`
--
ALTER TABLE `hang_san_xuat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ma_hang_san_xuat` (`ma_hang_san_xuat`),
  ADD KEY `ma_danh_muc` (`ma_danh_muc`);

--
-- Indexes for table `san_pham_desc`
--
ALTER TABLE `san_pham_desc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ma_san_pham` (`ma_san_pham`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hang_san_xuat`
--
ALTER TABLE `hang_san_xuat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `san_pham_desc`
--
ALTER TABLE `san_pham_desc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_1` FOREIGN KEY (`ma_don_hang`) REFERENCES `don_hang` (`id`);

--
-- Constraints for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `san_pham_ibfk_1` FOREIGN KEY (`ma_hang_san_xuat`) REFERENCES `hang_san_xuat` (`id`),
  ADD CONSTRAINT `san_pham_ibfk_2` FOREIGN KEY (`ma_danh_muc`) REFERENCES `danh_muc` (`id`);

--
-- Constraints for table `san_pham_desc`
--
ALTER TABLE `san_pham_desc`
  ADD CONSTRAINT `san_pham_desc_ibfk_1` FOREIGN KEY (`ma_san_pham`) REFERENCES `san_pham` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
