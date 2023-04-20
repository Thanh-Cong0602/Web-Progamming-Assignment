-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2023 at 06:16 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Database_bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `slogan` varchar(500) NOT NULL,
  `information` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `image`, `slogan`, `information`) VALUES
(1, 'Trác Nhã', 'https://images.kienthuc.net.vn/zoomh/800/uploaded/hongngan/2016_01_08/A/nu-sinh-truong-kich-xinh-dep-dong-long-nguoi.jpg', 'Vì một khi bạn nghe nhiều bạn sẽ hiểu đối phương hơn, có thể giúp đỡ họ, cũng như tự mang lại niềm vui cho mình.', 'https://eccthai.com/trac-nha/'),
(2, 'Dale Carnegie', 'https://eccthai.com/wp-content/uploads/2021/01/tac-gia-dac-nhan-tam.jpeg', 'Đừng sợ những kẻ thù tấn công bạn. Hãy cẩn thận những người nịnh hót bạn.', ''),
(3, 'Dr Blair Thomas Spalding', 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/55/Baird_T._Spalding_1935_portrait.jpg/330px-Baird_T._Spalding_1935_portrait.jpg', ' Tình thương là một năng lực sáng tạo khiến người thương và kẻ được thương trở nên giàu có.', 'https://vi.wikipedia.org/wiki/Baird_T._Spalding'),
(4, 'Paulo Coelho', 'https://static.tuoitre.vn/tto/i/s626/2006/04/05/wwo9DGA2.jpg', 'When we strive to become better than we are, everything around us becomes better, too.', 'https://vi.wikipedia.org/wiki/Paulo_Coelho'),
(5, 'Joe Vitale, Ihaleakala Hew Len', 'https://eccthai.com/wp-content/uploads/2021/06/Ihaleakala-Hew-Len.jpg', 'Tại sao vấn đề ở người khác mà ta có thể hóa giải được khi chữa lành chính mình?', 'https://eccthai.com/ihaleakala-hew-len/');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_name`, `price`, `quantity`, `image`) VALUES
(0, 'jBSM7nyWJV', 'Không Phải Sói Nhưng Cũng Đừng Là Cừu', 96000, 1, 'https://cdn0.fahasa.com/media/catalog/product/_/k/_khong-phai-soi-nhung-cung-dung-la-cuu.jpg'),
(0, 'jBSM7nyWJV', 'Nhà Giả Kim', 65500, 1, 'https://cdn0.fahasa.com/media/catalog/product/i/m/image_195509_1_36793.jpg'),
(0, 'jBSM7nyWJV', 'Combo 3 cuốn sách Chứng Khoán dành cho người mới 2023', 515000, 1, 'https://vnibooks.com/wp-content/uploads/2021/09/combo-sa%CC%81ch-chu%CC%9B%CC%81ng-khoa%CC%81n-cho-ngu%CC%9Bo%CC%9B%CC%80i-mo%CC%9B%CC%81i-768x768.jpg.webp');

-- --------------------------------------------------------

--
-- Table structure for table `combo_products`
--

CREATE TABLE `combo_products` (
  `combo_id` varchar(10) NOT NULL,
  `combo_name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image_combo` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `description_detail` varchar(2000) NOT NULL,
  `image_1` varchar(200) NOT NULL,
  `name_1` varchar(200) NOT NULL,
  `description_1` varchar(5000) NOT NULL,
  `image_2` varchar(200) NOT NULL,
  `name_2` varchar(200) NOT NULL,
  `description_2` varchar(5000) NOT NULL,
  `image_3` varchar(200) NOT NULL,
  `name_3` varchar(200) NOT NULL,
  `description_3` varchar(2000) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `combo_products`
--

INSERT INTO `combo_products` (`combo_id`, `combo_name`, `price`, `image_combo`, `description`, `description_detail`, `image_1`, `name_1`, `description_1`, `image_2`, `name_2`, `description_2`, `image_3`, `name_3`, `description_3`, `date`) VALUES
('', 'Combo Sách Rừng Na Uy + Điều Kỳ Diệu Của Tiệm Tạp Hóa Namiya (Bộ 2 Cuốn)', 201000, 'https://cdn0.fahasa.com/media/catalog/product/c/o/combo-8935235231382-8935235217508.jpg', '', 'Combo Sách Rừng Na Uy + Điều Kỳ Diệu Của Tiệm Tạp Hóa Namiya (Bộ 2 Cuốn)', '', '', '', '', '', '', '', '', '', '2023-04-19 23:52:21'),
('b12hut7uKH', 'Bộ 3 cuốn sách chứng khoán thực chiến hay nên đọc kết hợp', 750000, 'https://vnibooks.com/wp-content/uploads/2021/12/combo-sach-dau-tu-chung-khoan-f24-768x768.jpeg.webp', 'Combo gồm 3 cuốn:\r\nTuyệt kỹ Giao dịch bằng đồ thị nến Nhật\r\nPhương pháp VPA – Kỹ thuật nhận diện Dòng Tiền Thông Minh\r\nPhương Pháp Wyckoff Hiện Đại – Kỹ thuật Nhận diện Xu hướng Thị trường Tiềm năng', 'Bộ 3 cuốn sách chứng khoán thực chiến hay nên đọc kết hợp gồm có: Tuyệt kỹ Giao dịch bằng đồ thị nến Nhật, Phương pháp VPA – Kỹ thuật nhận diện Dòng Tiền Thông Minh và Phương Pháp Wyckoff Hiện Đại – Kỹ thuật Nhận diện Xu hướng Thị trường Tiềm năng. Đây là 3 cuốn sách được nhiều độc giả quan tâm, lựa chọn khi tìm hiểu về các phương pháp và kỹ năng phân tích, giao dịch chứng khoán.\r\nPhương Pháp Wyckoff Hiện Đại – Kỹ thuật Nhận diện Xu hướng Thị trường Tiềm năng và Phương pháp VPA – Kỹ thuật nhận diện Dòng Tiền Thông Minh giúp chúng ta nhận diện xu hướng thị trường và dòng tiền còn Tuyệt kỹ Giao dịch bằng đồ thị nến Nhật lại là hệ thống đã được tinh chỉnh bởi hàng thế hệ sử dụng ở phương Đông cụ thể là Nhật Bản.', '', 'Tuyệt kỹ Giao dịch bằng đồ thị nến Nhật', 'Tuyệt kỹ giao dịch bằng đồ thị nến Nhật có tên gọi này vì hình dạng các đường kẻ trông giống cây nến, hệ thống đã được tinh chỉnh bởi hàng thế hệ sử dụng ở phương Đông xa xôi.\r\n\r\nCho đến trước khi cuốn Tuyệt kỹ giao dịch bằng đồ thị nến Nhật được xuất bản, suốt hơn một thế kỷ, “bộ vuốt” của phân tích đồ thị Nhật Bản (tức đồ thị nến) vẫn là một bí mật được chôn giấu với phương Tây. Lần đầu tiên, cuốn sách đã tiết lộ đầy đủ chi tiết với bán cầu Tây những “Bí ẩn phương Đông” này.\r\n\r\nSau khi ấn bản đầu tiên được xuất bản, nó đã trở thành nền tảng cho một cuộc cách mạng của cả một ngành phân tích kỹ thuật nói chung cũng như cho những cuốn sách, bài báo, vv. theo sau của các tác giả khác. Còn ở ấn bản thứ hai này, các ví dụ đã được thay mới hoàn toàn để có thể phù hợp với nhiều đối tượng hơn.', '', 'Phương pháp VPA – Kỹ thuật nhận diện Dòng Tiền Thông Minh', 'Phương pháp VPA – Volume Price Analysis – là một phương pháp Price Action hiệu quả, phân tích thị trường dựa trên sự kết hợp giữa biểu đồ giá, biểu đồ nến, các chu kỳ thị trường và khối lượng giao dịch để nhận diện những hành động của nhà giao dịch nội bộ/ tổ chức lớn/ dòng tiền thông minh, từ đó giúp nhà giao dịch nhỏ lẻ có thể đi thuận theo dòng chảy thị trường.\r\n\r\nNội dung sách “Phương Pháp VPA – Kỹ thuật nhận diện Dòng Tiền Thông Minh bằng Hành Động Giá kết hợp Khối Lượng Giao Dịch”\r\n\r\nCó một bất ngờ rằng, phương pháp VPA (Phân tích giá cả kết hợp khối lượng) này, được các nhà giao dịch nổi tiếng như Charles Dow, Jesse Livermore và Richard Wyckoff sử dụng. Họ đã tạo nên lượng tài sản lớn khi ứng dụng phương pháp này, từng chi tiết sẽ được giải thích rõ trong quyển sách.', '', 'Phương Pháp Wyckoff Hiện Đại – Kỹ thuật Nhận diện Xu hướng Thị trường Tiềm năng', 'Quyển sách Phương Pháp Wyckoff Hiện Đại sẽ đem đến cho bạn một phương pháp Price Action kinh điển, từng được sử dụng bởi một nhà giao dịch (trader) thực chiến thành công thực sự là ông Richard Wyckoff và được nâng cấp lên mức độ tốt hơn bởi một nhà giao dịch có hơn 40 năm kinh nghiệm là ông David Weis.\r\n\r\nTrong quyển sách Phương Pháp Wyckoff Hiện Đại, người đọc sẽ được tìm hiểu những yếu tố cơ bản nhất nhưng luôn hiệu quả nhất, đó là mối quan hệ Hành vi giá (Price Action) – Khối lượng giao dịch (Volume), các chu kỳ thị trường, đường xu hướng, các cú trồi/ cú bật để rũ bỏ các nhà đầu tư nhỏ lẻ, những tín hiệu đến từ dòng tiền thông minh nhằm đảo chiều hoặc đẩy mạnh xu hướng thị trường.\r\n\r\nBộ 3 cuốn sách chứng khoán thực chiến hay nên đọc kết hợp gồm có: Tuyệt kỹ Giao dịch bằng đồ thị nến Nhật, Phương pháp VPA – Kỹ thuật nhận diện Dòng Tiền Thông Minh và Phương Pháp Wyckoff Hiện Đại – Kỹ thuật Nhận diện Xu hướng Thị trường Tiềm năng. Đây là 3 cuốn sách được nhiều độc giả quan tâm, lựa chọn khi tìm hiểu về các phương pháp và kỹ năng phân tích, giao dịch chứng khoán. Mời bạn đọc cùng tham khảo và lựa chọn!', '2023-04-19 23:52:21'),
('mMPYPAniAc', 'Combo 3 cuốn sách Chứng Khoán dành cho người mới 2023', 515000, 'https://vnibooks.com/wp-content/uploads/2021/09/combo-sa%CC%81ch-chu%CC%9B%CC%81ng-khoa%CC%81n-cho-ngu%CC%9Bo%CC%9B%CC%80i-mo%CC%9B%CC%81i-768x768.jpg.webp', 'Combo 3 sách: Nghệ Thuật đầu tư Dhandho, Lột Xác Để Trở Thành Nhà Đầu Tư Giá Trị, Người Đàn Ông Đánh Bại Mọi Thị Trường sẽ giúp bạn hiểu được tổng quan về thì trường tài chính: chứng khoán, coin,… trước khi thực hiện những thương vụ đầu tiên.', 'Combo 3 sách: Nghệ Thuật đầu tư Dhandho, Lột Xác Để Trở Thành Nhà Đầu Tư Giá Trị, Người Đàn Ông Đánh Bại Mọi Thị Trường sẽ giúp bạn hiểu được tổng quan về thì trường tài chính, cách thức mà thị trường tài chính hoạt động. Từ đó bạn có thể tiến đọc đến những quyển sách cấp cao hơn về phân tích kỹ thuật và thực hiện những thương vụ đầu tiên của mình trên thị trường chứng khoán.', 'https://vnibooks.com/wp-content/uploads/2021/09/dundu.jpeg.webp', 'Nghệ Thuật đầu tư Dhandho', 'Cuốn sách được đề xuất dành cho những người mới tham gia vào thị trường chứng khoán. Sách cung cấp những thông tin để bạn có thể hiểu được cách thức thị trường tài chính vận hành bao gồm: cổ phiếu, trái phiếu, tiền tệ, hàng hoá vàng bạc, bitcoin. Bản chất của thị trường tài chính đơn giản là những ván cược. Cược ở đây có nghĩa là sử dụng những dữ liệu tài chính mà bạn có để tính toán được khoản đầu tư của bạn thành công bao nhiêu %. Mohnish Pabrai – tác giả của cuốn sách nói rõ: bạn hãy cược ít lần thôi cược lớn và cược đậm khi bạn thấy lợi thế nghiêng về phía mình.\r\n\r\nTiếp sau cuốn sách này bạn có thể đọc cuốn Lột xác để đầu tư giá trị khi bạn muốn tìm hiểu tiếp về thị trường tài chính.', 'https://vnibooks.com/wp-content/uploads/2021/09/lo%CC%A3%CC%82t-xa%CC%81c.png.webp', 'Lột Xác Để Trở Thành Nhà Đầu Tư Giá Trị', '“Lột Xác Để Trở Thành Một Nhà Đầu Tư Giá Trị” là câu chuyện về cuộc hành trình của Guy Spier và những điều ông đã học được trên con đường đầu tư của mình.\r\n\r\nXuyên suốt quá trình đọc sách, độc giả và cũng là những nhà đầu tư hoặc yêu thích công việc đầu tư sẽ thực sự trải nghiệm hành trình lột xác thực sự của Guy Spier từ một tay “mafia” cò mồi tại một quỹ đầu tư chuyên kinh doanh các cổ phiếu “rác”. Tới việc trở thành một nhà đầu tư giá trị chân chính được soi sáng bởi trí tuệ của Warren Buffet và Charlie Munger.\r\n\r\nCuốn sách tiếp theo sau cuốn sách này bạn có thể tìm đọc cuốn: Người đàn ông đánh bại mọi thị trường', 'https://vnibooks.com/wp-content/uploads/2021/09/nguoi-dan-ong.jpeg.webp', 'Người Đàn Ông Đánh Bại Mọi Thị Trường', 'Trong lịch sử chỉ có duy nhất một người khiến cho các tay chủ sòng bạc ở Las Vegas cũng như các nhà quản lý quỹ ở Wall Street đều phải kính nể – đó chính là giáo sư Edward Thorp! Một người vừa là giáo sư toán học, vừa là tay cờ bạc hàng đầu và cũng là nhà đầu tư huyền thoại có lẽ chỉ có thể tồn tại trong các tiểu thuyết. Tuy nhiên, điều khó tin này vẫn xảy ra trong thực tế!\r\nTrong cuốn sách này bạn sẽ học được rất nhiều kinh nghiệm của Edward Thorp trong việc kinh doanh cổ phiếu. Sau đó bạn có thể đọc đến cuốn Payback Time', '2023-04-19 23:52:21'),
('rhFG87KH10', 'Combo Cuộc Chơi Khởi Nghiệp (Bộ 3 Cuốn)', 430000, 'https://cdn0.fahasa.com/media/catalog/product/c/o/combo8935251406290-8935251406306-8935251406313.jpg', '', 'Combo Cuộc Chơi Khởi Nghiệp (Bộ 3 Cuốn)', '', 'Cuộc Chơi Khởi Nghiệp 1', '“Một cuốn sách cần thiết cho các chủ doanh nghiệp. Brad và Jason đã làm sáng tỏ mớ lộn xộn những hợp đồng, điều khoản của một thương vụ mua bán và sáp nhập, đồng thời cắt bỏ các vấn đề pháp lý rườm rà và tập trung vào những vấn đề mấu chốt nhất. Thế nên không chỉ các doanh nhân, mà cà các nhà đầu tư và luật sư cũng sẽ thấy cuốn sách này rất cần thiết. Bởi một doanh nhân thông hiểu về lĩnh vực đầu tư sẽ khiến việc đàm phán trở nên dễ dàng hơn rất nhiều.\"\r\n\r\n- Greg Gottesman,\r\n\r\nCEO của Madrona Venture Group', '', 'Cuộc Chơi Khởi Nghiệp 2', '\"Đây là một cuốn sách rất tuyệt vời. Nó không chỉ thú vị mà còn cung cấp thông tin chi tiết về quy trình và cách thức hoạt động của cả nhà đầu tư lẫn doanh nghiệp.\"\r\n\r\n- William Aulet\r\n\r\nGiám đốc Trung tâm Doanh nghiệp MIT\r\n\r\n\"Một cái nhìn toàn diện về mối quan hệ giữa nhà đầu tư và doanh nghiệp. Cuốn sách sẽ giúp bạn biết cần phải làm gì để có được một thương vụ hợp tác tốt đẹp.\"\r\n\r\n- Tim Draper\r\n\r\nGiám đốc Quỹ đầu tư Draper Fisher Jurvetson', '', 'Cuộc Chơi Khởi Nghiệp 3', '\"Doanh nhân và nhà đầu tư - sự kết đôi hoàn hảo của những con người có khả năng làm thay đổi thế giới là điều Bill Draper muốn chia sẻ với độc giả bằng chính câu chuyện cuộc đời mình. Bạn đọc là doanh nhân đang muốn tìm và muốn biến sự kết đôi này trở nên hoàn hảo, thì cuốn sách này là gợi ý tuyệt vời nhất cho bạn.\"\r\n\r\n- Nguyễn Hồng Trưởng,\r\n\r\nQuỹ đầu tư mạo hiểm IDG Ventures Vietnam\r\n\r\n\"Cuốn sách này giống như hồi ký của nhà đầu tư mạo hiểm thế hệ thứ nhất trên thế giới. Nó diễn giải chi tiết về đầu tư mạo hiểm cho những ai còn xa lạ với \"ngành công nghiệp\" này bằng nhiều lời khuyên cũng như những câu chuyện có thực.\"\r\n\r\n-Tạp chí Fortune', '2023-04-19 23:56:28'),
('tHucmg123r', 'Trọn Bộ 4 Tập Chiến Tranh Tiền Tệ', 480000, 'https://vnibooks.com/wp-content/uploads/2022/08/chien-tranh-tien-te-combo-4-phan-768x768.jpg.webp', 'Combo Chiến Tranh Tiền Tệ (Bộ 4 Cuốn) – Bộ sách viết về các định chế tài chính và toàn cảnh các cuộc chiến tranh tiền tệ có tác động sâu rộng.', 'Combo Chiến Tranh Tiền Tệ (Bộ 4 Cuốn)', '', 'Chiến Tranh Tiền Tệ – Ai Thực Sự Là Người Giàu Nhất Thế Giới? (Phần I)', 'Một khi đọc Chiến Tranh Tiền Tệ – Ai Thực Sự Là Người Giàu Nhất Thế Giới? (Phần I) bạn sẽ phải giật mình nhận ra một điều kinh khủng rằng, đằng sau những tờ giấy bạc chúng ta chi tiêu hàng ngày là cả một thế lực ngầm đáng sợ – một thế lực bí ẩn với quyền lực siêu nhiên có thể điều khiển cả thế giới rộng lớn này.\r\n\r\nChiến Tranh Tiền Tệ – Ai Thực Sự Là Người Giàu Nhất Thế Giới? (Phần I) đề cập đến một cuộc chiến khốc liệt, không khoan nhượng và dai dẳng giữa một nhóm nhỏ các ông trùm tài chính – đứng đầu là gia tộc Rothschild – với các thể chế tài chính của nhiều quốc gia. Đó là một cuộc chiến mà đồng tiền là súng đạn và mức sát thương thật sự ghê gớm.\r\n\r\nĐồng thời, Chiến Tranh Tiền Tệ – Ai Thực Sự Là Người Giàu Nhất Thế Giới? (Phần I) còn giúp bạn hiểu thêm nhiều điều, rằng Bill Gates chưa phải là người giàu nhất hành tinh, rằng tỉ lệ tử vong của các tổng thống Mỹ lại cao hơn tỉ lệ tử trận của binh lính Mỹ ngoài chiến trường, hay vì sao phố Wall lại mạo hiểm đổ hết vốn liếng của mình cho việc “đầu tư” vào Hitler.\r\n\r\nLà một cuốn sách làm sửng sốt những ai muốn tìm hiểu về bản chất của tiền tệ, để từ đó nhận ra những hiểm họa tài chính tiềm ẩn nhằm chuẩn bị tâm lý cho một cuộc chiến tiền tệ “không đổ máu”, Chiến Tranh Tiền Tệ – Ai Thực Sự Là Người Giàu Nhất Thế Giới? (Phần I) còn phơi bày những âm mưu của các nhà tài phiệt thế giới trong việc tạo ra những cơn “hạn hán”, “bão lũ” về tiền tệ để thu lợi nhuận. Cuốn sách cũng đề cập đến sự phát triển của các định chế tài chính – những cơ cấu được xây dựng nhằm đáp ứng nhu cầu phát triển vũ bão của nền kinh tế toàn cầu.\r\n\r\nGấp cuốn sách lại, có thể bạn đọc sẽ có nhiều tâm trạng khác nhau. Đối với một số người, đó có thể là sự sợ hãi thế lực tài chính quốc tế và cảm giác bất an về sự chi phối của thế lực này. Với số khác thì đó có thể là một cảm giác thú vị khi khám phá ra sự thật trần trụi để từ đó có cách nhìn nhận khác nhằm xây dựng cho mình những kế hoạch đầu tư một cách hiệu quả nhất. Và cho dù bạn có lo sợ hay cảm thấy tò mò, thú vị thì Chiến Tranh Tiền Tệ – Ai Thực Sự Là Người Giàu Nhất Thế Giới? (Phần I) cũng là một cuốn sách đáng đọc. Một cuốn sách bổ ích cho các chuyên gia quản lý tài chính, các nhà quản trị doanh nghiệp, các nhà đầu tư nhỏ, các giáo viên giảng dạy về tài chính – ngân hàng cũng như sinh viên các trường kinh tế.', '', 'Chiến Tranh Tiền Tệ – Sự Thống Trị Của Quyền Lực Tài Chính (Phần II)', 'Trong ấn bản lần thứ nhất của cuốn sách này, tác giả đưa ra ba dự đoán quan trọng.\r\n\r\nThứ nhất, kinh tế Âu Mỹ sẽ rơi vào tình cảnh tiêu điều trường kỳ (chí ít là 10 năm), cho dù có nới lỏng chính sách về tiền tệ, hay kích thích chính sách tài chính – về cơ bản đều vô hiệu;\r\n\r\nThứ hai, khi đó “lượng khí thải carbon” vẫn là một khái niệm tương đối xa lạ với xã hội Trung Quốc, sẽ phát huy tác dụng ngày càng quan trọng đối với kinh tế và xã hội, và sẽ bị “tài chính hóa” và “tiền tệ hóa”;\r\n\r\nThứ ba, loại tiền tệ chủ quyền sẽ từng bước bị loại tiền tệ khu vực thay thế, và cuốn cùng sẽ tiến hóa hướng đến sự đơn nhất về tiền tệ trên thế giới.\r\nVà đến nay, ba dự đoán đó đều đã trở thành sự thực.\r\n\r\nMục đích của cuốn sách này không phải là để dạy bạn cách đầu tư, cách phân bổ tài sản hay dạy một bộ phương pháp đối phó tiền tệ điển hình. Cuốn sách này nhằm trả lời những câu hỏi từ lâu đã khiến chúng ta bối rối và chưa được giải đáp: Tại sao tiền tệ lại có xung đột?', '', 'Chiến Tranh Tiền Tệ – Biên Giới Tiền Tệ – Nhân Tố Bí Ẩn Trong Các Cuộc Chiến Kinh Tế (Phần III)', 'Sau hai cuốn đầu tiên lần lượt diễn giải lịch sử phát triển tài chính của Hoa Kỳ và châu Âu, tác giả đặt mục tiêu cho phần 3 vào Trung Quốc, bắt đầu từ Chiến tranh nha phiến, tìm hiểu và giải mã sự phát triển tài chính của đất nước này.\r\n\r\nLịch sử gần 100 năm của Trung Quốc, từ góc độ tài chính cho thấy, bất cứ ai có thể kiểm soát biên giới tài chính đều có lợi thế chiến lược rất lớn, có thể thao túng và chi phối rất nhiều mặt trong xã hội. Nên sự sụp đổ của biên giới tài chính cuối cùng sẽ dẫn đến sự sụp đổ của một chế độ, nhà nước bất kì.\r\n\r\nNắm được biên giới tài chính, sức mạnh tấn công của Anh với Trung Quốc trở nên mạnh hơn nhiều. Họ đánh bại tiêu chuẩn tiền tệ của Trung Quốc, nắm giữ đỉnh cao của chiến lược tài chính ngân hàng trung ương, thâm nhập và làm xói mòn hệ thống tài chính, kiểm soát thị trường và tước đi quyền lực của nhà Thanh trong rất nhiều mặt.\r\n\r\nNên mỗi nỗ lực kiểm soát, hiểu biết với biên giới tài chính mất đi, thì bất kỳ ý định nào về cải cách chính trị, tự cường quân sự và trẻ hóa công nghiệp chỉ có thể là một giấc mơ chưa thực hiện được của bất kì một đất nước nào. Nó cũng giống như mọi mặt trong cuộc sống của chúng ta, đều cần có một ranh giới và sự kiểm soát nhất định, để có thể thiết đặt nguyên tắc, giá trị của chính mình mà không bị xâm phạm hay điều phối bởi người khác.\r\n\r\nChiến Tranh Tiền Tệ – Phần III sẽ mang đến một cái nhìn toàn cảnh về những biến động trong lĩnh vực tài chính tại Trung Quốc từ thời nhà Thanh, cùng tác động của nó lên mọi mặt chính trị, xã hội của người dân nước này và trên thế giới. Giúp bạn hình dung con đường phát triển của đất nước này đã trải qua những biến động ra sao để đến được vị trí ngày nay.', '2023-04-19 23:52:21');

-- --------------------------------------------------------

--
-- Table structure for table `database_bai3`
--

CREATE TABLE `database_bai3` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `database_bai3`
--

INSERT INTO `database_bai3` (`id`, `name`, `description`, `price`, `image`) VALUES
(1, 'Kingston FURY Beast DDR5', 'Dung lượng 16GB lên đến 6000MT/s', 123, 'https://minhancomputercdn.com/media/product/7472_kingston_fury_beast_rgb_16gb_1.jpg'),
(2, 'Kingston FURY Beast DDR4 RGB', 'Giúp nâng cao hiệu năng và cải tiến phong cách với tốc độ lên đến 3733MT/s', 13.25, 'https://media.kingston.com/kingston/product/ktc-product-beast-ddr4-rgb-dimm-1-angled-zm-lg.jpg'),
(7, 'Thanh Cong Nguyen', 'Giúp nâng cao hiệu năng và cải tiến phong cách với tốc độ lên đến 3600MHz', 12, 'https://bizweb.dktcdn.net/100/329/122/products/ram-pc-kingston-fury-beast-rgb-32gb-3600mhz-ddr4-2x16gb-kf436c18bbak2-32-1-38a0d576-31f5-4e9b-b9b2-cd40bed9723a.png?v=1671726823967'),
(12, 'Ram PC Kingston Fury Beast', 'Chuẩn RAM DDR4 Bus hỗ trợ 2400MHz Dung lượng 8 GB (1x8GB)', 12, 'https://bizweb.dktcdn.net/100/329/122/products/ram-pc-kingston-fury-beast-rgb-32gb-3600mhz-ddr4-2x16gb-kf436c18bbak2-32-1-38a0d576-31f5-4e9b-b9b2-cd40bed9723a.png?v=1671726823967'),
(14, 'Ram desktop Kingston Fury Renegade', 'Giúp nâng cao hiệu năng và cải tiến phong cách với tốc độ lên đến 3600MHz', 123, 'https://bizweb.dktcdn.net/100/329/122/products/ram-pc-kingston-fury-beast-rgb-32gb-3600mhz-ddr4-2x16gb-kf436c18bbak2-32-1-38a0d576-31f5-4e9b-b9b2-cd40bed9723a.png?v=1671726823967');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phonenumber` varchar(20) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(0, 'jBSM7nyWJV', 'Thanh Cong Nguyen', '0847476547', 'thanhcongnguyen0602@gmail.com', 'credit card', 'Ho Chi Minh', ', Combo 3 cuốn sách Chứng Khoán dành cho người mới 2023 (1) ', 515000, '20-Apr-2023', 'pending'),
(0, 'jBSM7nyWJV', 'Thanh Cong Nguyen', '1231243', 'thanhcongnguyen0602@gmail.com', 'cash on delivery', 'Ho Chi Minh', ', Không Phải Sói Nhưng Cũng Đừng Là Cừu (1) , Nhà Giả Kim (1) , Trí Tuệ Do Thái (1) ', 303250, '20-Apr-2023', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `publiser` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `author`, `price`, `image`, `description`, `supplier`, `publiser`, `date`) VALUES
('85glwWSTrg', 'Bố già', 'Mario Puzo', 212500, 'https://cdn0.fahasa.com/media/catalog/product/z/2/z2611575615164_9f60c133cfed1c7bb3f59b247f-600.jpg', 'Thế giới ngầm được phản ánh trong tiểu thuyết Bố già là sự gặp gỡ giữa một bên là ý chí cương cường và nền tảng gia tộc chặt chẽ theo truyền thống mafia xứ Sicily với một bên là xã hội Mỹ nhập nhằng đen trắng, mảnh đất màu mỡ cho những cơ hội làm ăn bất chính hứa hẹn những món lợi kếch xù. Trong thế giới ấy, hình tượng Bố già được tác giả dày công khắc họa đã trở thành bức chân dung bất hủ trong lòng người đọc. Từ một kẻ nhập cư tay trắng đến ông trùm tột đỉnh quyền uy, Don Vito Corleone là con rắn hổ mang thâm trầm, nguy hiểm khiến kẻ thù phải kiềng nể, e dè, nhưng cũng được bạn bè, thân quyến xem như một đấng toàn năng đầy nghĩa khí. Nhân vật trung tâm ấy đồng thời cũng là hiện thân của một pho triết lí rất “đời” được nhào nặn từ vốn sống của hàng chục năm lăn lộn giữa chốn giang hồ bao phen vào sinh ra tử, vì thế mà có ý kiến cho rằng “Bố già là sự tổng hòa của mọi hiểu biết. Bố già là đáp án cho mọi câu hỏi”.\r\n\r\nVới cấu tứ hoàn hảo, cốt truyện không thiếu những pha hành động gay cấn, tình tiết bất ngờ và không khí kình địch đến nghẹt thở, Bố già xứng đáng là đỉnh cao trong sự nghiệp văn chương của Mario Puzo. Và như một cơ duyên đặc biệt, ngay từ năm 1971-1972, Bố già đã đến với bạn đọc trong nước qua phong cách chuyển ngữ hào sảng, đậm chất giang hồ của dịch giả Ngọc Thứ Lang.\r\n\r\nGiới thiệu tác giả:\r\n\r\nMario Puzo (1920 - 1999) là nhà văn, nhà biên kịch người Mỹ gốc Italy nổi tiếng với nhiều tiểu thuyết về đề tài mafia và tội phạm. Bố già (The Godfather) xuất bản năm 1969 là đỉnh cao của dòng văn chương hư cấu này, đồng thời là tác phẩm đưa Puzo lên tột đỉnh vinh quang. Đây cũng là một trong những tiểu thuyết bán chạy nhất mọi thời đại. Ngoài Bố già, Mario Puzo còn nổi tiếng với các tiểu thuyết khác như Sicilian khúc ca bi tráng, Luật im lặng, Ông trùm quyền lực cuối cùng, Gia đình Giáo hoàng…\r\n\r\nGiới thiệu dịch giả:\r\n\r\nNgọc Thứ Lang tên thật là Nguyễn Ngọc Tú, biệt danh là công tử Bắc Kỳ, vào Sài Gòn lập nghiệp khoảng năm 1950. Ngọc Thứ Lang là dịch giả của thời kì trước năm 1975, đã chuyển ngữ nhiều tác phẩm nhưng có lẽ Bố già là một dấu son trong sự nghiệp của ông.\r\n\r\nNăm 1972, bản dịch Bố già của Ngọc Thứ Lang chuyển ngữ từ nguyên bản tiếng Anh ra mắt và đã thu hút được sự chú ý của rất nhiều độc giả. Nếu như The Godfather của Mario Puzo khi vừa xuất bản đã nằm trong danh sách sách bán chạy nhất suốt 67 tuần thì Bố già của Ngọc Thứ Lang cũng “làm mưa làm gió” trên thị trường văn học dịch của Sài Gòn những năm 70 của thế kỉ trước.\r\n\r\nCái hay, cái khiến người đọc say mê Bố già có lẽ nằm ở chính giọng văn đậm chất giang hồ súng đạn của người dịch. Và bản thân cái tên Bố già cũng là một sáng tạo vô tiền khoáng hậu của Ngọc Thứ Lang. Nhiều độc giả Việt Nam nói rằng nếu đọc The Godfather của Mario Puzo, hãy tìm đúng bản dịch của Ngọc Thứ Lang để thấy chất đàn ông trong đó…\r\n\r\nNhận xét về tác phẩm:\r\n\r\n “Bố già là sự tổng hòa của mọi hiểu biết. Bố già là đáp án cho mọi câu hỏi.” - Diễn viên Tom Hanks\r\n\r\n“Bạn không thể dừng đọc nó và khó lòng ngừng mơ về nó.” - New York Times Magazine\r\n\r\n“Một tác phẩm kinh điển về mafia… Tự bản thân nó đã tạo ra một thứ bùa mê hoặc độc giả.” - The Times.', 'Đông A', 'NXB Văn Học', '2023-04-19 20:59:45'),
('dINC5JnqoZ', 'Thanh Cong Nguyen', 'Paulo Coelho', 124124, 'https://cdn0.fahasa.com/media/catalog/product/m/u/muonkiepnhansinh.jpg', '123123', 'AZ Việt Nam', 'Lao Động', '2023-04-20 23:03:49'),
('e8M13U7eOs', 'Tuổi Trẻ Đáng Giá Bao Nhiêu', 'Rosie Nguyễn', 67500, 'https://encrypted-tbn0.gstatic.com/shopping?q=tbn:ANd9GcSrv-mgwTc98hztAPGj63HQpZFq4FQVv_ztegcsf5HZe1w8eZyZnHHFP2hvyrcGQ614f5HuoMtJlt3z12r3Y13vnAEXtNlIwtwX07lOb2gY&usqp=CAE', '“Bạn hối tiếc vì không nắm bắt lấy một cơ hội nào đó, chẳng có ai phải mất ngủ...\r\n\r\nBạn trải qua những ngày tháng nhạt nhẽo với công việc bạn căm ghét, người ta chẳng hề bận lòng.\r\n\r\nBạn có chết mòn nơi xó tường với những ước mơ dang dở, đó không phải là việc của họ.\r\n\r\nSuy cho cùng, quyết định là ở bạn. Muốn có điều gì hay không là tùy bạn.\r\n\r\nNên hãy làm những điều bạn thích. Hãy đi theo tiếng nói trái tim. Hãy sống theo cách bạn cho là mình nên sống.\r\n\r\nVì sau tất cả, chẳng ai quan tâm.”\r\n\r\n“Tôi đã đọc quyển sách này một cách thích thú. Có nhiều kiến thức và kinh nghiệm hữu ích, những điều mới mẻ ngay cả với người gần trung niên như tôi.\r\n\r\nTuổi trẻ đáng giá bao nhiêu? được tác giả chia làm 3 phần: HỌC, LÀM, ĐI.\r\n\r\nNhưng tôi thấy cuốn sách còn thể hiện một phần thứ tư nữa, đó là ĐỌC.\r\n\r\nHãy đọc sách, nếu bạn đọc sách một cách bền bỉ, sẽ đến lúc bạn bị thôi thúc không ngừng bởi ý muốn viết nên cuốn sách của riêng mình.\r\n\r\nNếu tôi còn ở tuổi đôi mươi, hẳn là tôi sẽ đọc Tuổi trẻ đáng giá bao nhiêu? nhiều hơn một lần.”\r\n\r\n- Đặng Nguyễn Đông Vy, tác giả, nhà báo.', 'Nhã Nam', 'NXB Hội Nhà Văn', '2023-04-19 21:00:42'),
('EPHBjxBoy1', 'Muôn Kiếp Nhân Sinh - Many Times, Many Lives', 'Nguyên Phong', 117600, 'https://cdn0.fahasa.com/media/catalog/product/m/u/muonkiepnhansinh.jpg', 'Muôn Kiếp Nhân Sinh - Many Times, Many Lives\r\n\r\nGiáo sư John Vũ – Nguyên Phong và những câu chuyện chưa từng có về tiền kiếp, khám phá luật Nhân quả, Luân hồi.\r\n\r\n“Muôn kiếp nhân sinh” là tác phẩm do Giáo sư John Vũ - Nguyên Phong viết từ năm 2017 và hoàn tất đầu năm 2020 ghi lại những câu chuyện, trải nghiệm tiền kiếp kỳ lạ từ nhiều kiếp sống của người bạn tâm giao lâu năm, ông Thomas – một nhà kinh doanh tài chính nổi tiếng ở New York. Những câu chuyện chưa từng tiết lộ này sẽ giúp mọi người trên thế giới chiêm nghiệm, khám phá các quy luật về luật Nhân quả và Luân hồi của vũ trụ giữa lúc trái đất đang gặp nhiều tai ương, biến động, khủng hoảng từng ngày.\r\n\r\n“Muôn kiếp nhân sinh” là một bức tranh lớn với vô vàn mảnh ghép cuộc đời, là một cuốn phim đồ sộ, sống động về những kiếp sống huyền bí, trải dài từ nền văn minh Atlantis hùng mạnh đến vương quốc Ai Cập cổ đại của các Pharaoh quyền uy, đến Hợp Chủng Quốc Hoa Kỳ ngày nay.\r\n\r\n“Muôn kiếp nhân sinh”cung cấp cho bạn đọc kiến thức mới mẻ, vô tận của nhân loại lần đầu được hé mở, cùng những phân tích uyên bác, tiên đoán bất ngờ về hiện tại và tương lai thế giới của những bậc hiền triết thông thái. Đời người tưởng chừng rất dài nhưng lại trôi qua rất nhanh, sinh vượng suy tử, mong manh như sóng nước. Luật nhân quả cực kỳ chính xác, chi tiết, phức tạp được thu thập qua nhiều đời, nhiều kiếp, liên hệ tương hỗ đan xen chặt chữ lẫn nhau, không ai có thể tính được tích đức này có thể trừ được nghiệp kia không, không ai có thể biết được khi nào nhân sẽ trổ quả. Nhưng, một khi đã gây ra nhân thì chắc chắn sẽ gặt quả - luật Nhân quả của vũ trụ trước giờ không bao giờ sai.\r\n\r\nLuật Luân hồi và Nhân quả đã tạo nhân duyên để người này gặp người kia. Gặp nhau có khi là duyên, có khi là nợ; gặp nhau có lúc để trả nợ, có lúc để nối lại duyên xưa. Có biết bao việc diễn ra trong đời, tưởng chừng như là ngẫu nhiên nhưng thật ra đã được sắp đặt từ trước. Luân hồi là một ngôi trường rộng lớn, nơi tất cả con người, tất cả sinh vật đều phải học bài học của riêng mình cho đến khi thật hoàn thiện mới thôi. Nếu không chịu học hay chưa học được trọn vẹn thì buộc phải học lại, chính xác theo quy luật của Nhân quả.\r\n\r\nThomas đã chia sẻ vì sao đã kể những câu chuyện riêng tư huyền bí này với Giáo sư John Vũ để thực hiện tác phẩm “Muôn kiếp nhân sinh”:\r\n\r\n “Hiện nay thế giới đang trải qua giai đoạn hỗn loạn, xáo trộn, mà thật ra thì mọi quốc gia đều đang gánh chịu những nghiệp quả mà họ đã gây ra trong quá khứ. Mỗi quốc gia, cũng như mọi cá nhân, đều có những nghiệp quả riêng do những nhân mà họ đã gây ra. Cá nhân thì có ‘biệt nghiệp‘ riêng của từng người, nhưng quốc gia thì có ‘cộng nghiệp‘ mà tất cả những người sống trong đó đều phải trả.\r\n\r\nThường thì con người, khi hành động, ít ai nghĩ đến hậu quả, nhưng một khi hậu quả xảy đến thì họ nghĩ gì, làm gì? Họ oán hận, trách trời, trách đất, trách những người chung quanh đã gây ra những hậu quả đó? Có mấy ai biết chiêm nghiệm, tự trách mình và thay đổi không?\r\n\r\nTôi mong chúng ta - những cánh bướm bé nhỏ rung động mong manh cũng có thể tạo nên những trận cuồng phong mãnh liệt để thức tỉnh mọi người.\r\n\r\nTương lai của mỗi con người, mỗi tổ chức, mỗi quốc gia và cả hành tinh này sẽ ra sao trong giai đoạn sắp tới là tùy thuộc vào thái độ ứng xử, nhìn nhận và thức tỉnh của từng cá nhân, từng tổ chức, từng quốc gia đó tạo nên. Nếu muốn thay đổi, cần khởi đầu bằng việc nhận thức, chuyển đổi tâm thức, lan tỏa yêu thương và chia sẻ sự hiểu biết từ mỗi người chúng ta trước.\r\n\r\nNhân quả đừng đợi thấy mới tin.\r\n\r\nNhân quả là bảng chỉ đường, giúp con người tìm về thiện lương“\r\n\r\nCuốn sách được xuất bản bằng tiếng Việt trước khi được chuyển nhượng bản quyền cho các quốc gia khác trên thế giới.\r\n\r\nVề tác giả\r\n\r\nTác giả Nguyên Phong (Vũ Văn Du) du học ở Mỹ từ năm 1968, tốt nghiệp cao học Sinh vật học, Điện toán. Ông từng là Kỹ sư trưởng, CIO của Tập đoàn Boeing của Mỹ, Viện trưởng Viện Công nghệ Sinh học Đại học Carnegie Mellon. Ông được mọi người biết tới là Giáo sư John Vu – Nhà khoa học uy tín về công nghệ thông tin. , CMMI và từng giảng dạy ở nhiều trường đại học trên thế giới.\r\n\r\n Nguyên Phong là bút danh của bộ sách văn hóa tâm linh được dịch, viết phóng tác từ trải nghiệm, tiềm thức và quá trình nghiên cứu, khám phá các giá trị tinh thần Đông phương. Ông đã viết phóng tác tác phẩm bất hủ Hành trình về Phương Đông năm 24 tuổi (1974). Các tác phẩm khác của Nguyên Phong được bạn đọc nhiều thế hệ yêu thích: Ngọc sáng trong hoa sen, Bên rặng tuyết sơn, Hoa sen trên tuyết, Hoa trôi trên sóng nước, Huyền thuật và các đạo sĩ Tây Tạng, Trở về từ xứ tuyết, Trở về từ cõi sáng, Minh triết trong đời sống, Đường mây qua xứ tuyết, Dấu chân trên cát, Đường mây trong cõi mộng, Đường mây trên đất hoa… và bộ sách dành cho sinh viên, thầy cô: Khởi hành, Kết nối, Bước ra thế giới, Kiến tạo thế hệ Việt Nam ưu việt, GS John Vu và lời khuyên dành cho thầy cô, GS John Vu và lời khuyên dành cho các bậc cha mẹ.', 'FIRST NEWS', 'NXB Tổng Hợp TPHCM', '2023-04-19 21:21:10'),
('I1VXO8uwI8', 'Không Phải Sói Nhưng Cũng Đừng Là Cừu', 'Lê Bảo Ngọc', 96000, 'https://cdn0.fahasa.com/media/catalog/product/_/k/_khong-phai-soi-nhung-cung-dung-la-cuu.jpg', 'Không Phải Sói Nhưng Cũng Đừng Là Cừu\r\n\r\nSÓI VÀ CỪU - BẠN KHÔNG TỐT NHƯ BẠN NGHĨ ĐÂU!\r\n\r\nLàn ranh của việc ngây thơ hay xấu xa đôi khi mỏng manh hơn bạn nghĩ.\r\n\r\nBạn làm một việc mà mình cho là đúng, kết quả lại bị mọi người khiển trách.\r\n\r\nBạn ủng hộ một quan điểm của ai đó, và số đông khác lại ủng hộ một quan điểm trái chiều.\r\n\r\nRốt cuộc thì bạn sai hay họ sai?\r\n\r\nCuốn sách “Không phải sói nhưng cũng đừng là cừu” đến từ tác giả Lê Bảo Ngọc sẽ giúp bạn hiểu rõ hơn những khía cạnh sắc sảo phía sau những nhận định đúng, sai đơn thuần của mỗi người.\r\n\r\nNhững câu hỏi đầy tính tranh cãi như “Cứu người hay cứu chó?”, “Một kẻ thô lỗ trong lớp vỏ “thẳng tính” khác với người EQ thấp như thế nào?”, “Vì sao một bộ phận nữ giới lại victim blaming đối với nạn nhân bị xâm hại?”,... được tác giả đưa ra trong “Không phải sói nhưng cũng đừng là cừu”. Bằng từng chương sách của mình, tác giả vạch rõ cho bạn rằng “thật sự thế nào mới là người tốt”, ngây thơ và xấu xa có ranh giới rõ ràng như thế không, rốt cuộc bạn có là người tốt như mình vẫn luôn nghĩ?\r\n\r\nTrong thời đại mà mọi thứ đều rất chóng vánh này, ranh giới giữa tốt và xấu, đúng và sai đôi lúc là không tồn tại.\r\n\r\nCái tốt mà chúng ta nghĩ, hóa ra lại là xấu trong mắt kẻ khác.\r\n\r\nCái đúng ở thời điểm này, đến một thời điểm khác lại trở thành sai.\r\n\r\nTốt đẹp hay xấu xa, thật khó phân định.\r\n\r\nCuốn sách “Không phải sói nhưng cũng đừng là cừu” của tác giả Lê Bảo Ngọc - admin Tâm Lý Học Tổ Kén đồng thời là Giám đốc Trung tâm Pháp Luật và Văn hóa sẽ là câu trả lời thấu suốt và khiến bạn phải đặt ra câu hỏi cho lối tư duy bấy lâu bạn luôn nghĩ là đúng. Bạn sẽ là người giải phóng chính mình, khỏi gông xiềng của định kiến, quy chuẩn cũ kĩ vốn được thiết lập lên để mang lại lợi ích cho kẻ khác. Và bạn sẽ không còn phải lăn tăn giữa tốt và xấu, sói hay cừu, vì điều đó là không quan trọng. Bạn sẽ tìm được chính mình và muốn là chính mình sau từng trang sách của “Không phải sói mà cũng đừng là cừu\"\r\n\r\nKhông phải sói, cũng đừng là cừu - Cuốn sách đập tan những định kiến cũ kỹ, kiến tạo tư duy và giúp bạn xây dựng lại chính mình!', 'Skybooks', 'Thế Giới', '2023-04-19 20:59:45'),
('Qg9kfupYAu', 'Nhà Giả Kim', 'Paulo Coelho', 65500, 'https://cdn0.fahasa.com/media/catalog/product/i/m/image_195509_1_36793.jpg', 'Tất cả những trải nghiệm trong chuyến phiêu du theo đuổi vận mệnh của mình đã giúp Santiago thấu hiểu được ý nghĩa sâu xa nhất của hạnh phúc, hòa hợp với vũ trụ và con người. \r\n\r\nTiểu thuyết Nhà giả kim của Paulo Coelho như một câu chuyện cổ tích giản dị, nhân ái, giàu chất thơ, thấm đẫm những minh triết huyền bí của phương Đông. Trong lần xuất bản đầu tiên tại Brazil vào năm 1988, sách chỉ bán được 900 bản. Nhưng, với số phận đặc biệt của cuốn sách dành cho toàn nhân loại, vượt ra ngoài biên giới quốc gia, Nhà giả kim đã làm rung động hàng triệu tâm hồn, trở thành một trong những cuốn sách bán chạy nhất mọi thời đại, và có thể làm thay đổi cuộc đời người đọc.\r\n\r\n“Nhưng nhà luyện kim đan không quan tâm mấy đến những điều ấy. Ông đã từng thấy nhiều người đến rồi đi, trong khi ốc đảo và sa mạc vẫn là ốc đảo và sa mạc. Ông đã thấy vua chúa và kẻ ăn xin đi qua biển cát này, cái biển cát thường xuyên thay hình đổi dạng vì gió thổi nhưng vẫn mãi mãi là biển cát mà ông đã biết từ thuở nhỏ. Tuy vậy, tự đáy lòng mình, ông không thể không cảm thấy vui trước hạnh phúc của mỗi người lữ khách, sau bao ngày chỉ có cát vàng với trời xanh nay được thấy chà là xanh tươi hiện ra trước mắt. ‘Có thể Thượng đế tạo ra sa mạc chỉ để cho con người biết quý trọng cây chà là,’ ông nghĩ.”\r\n\r\n- Trích Nhà giả kim\r\n\r\nNhận định\r\n\r\n“Sau Garcia Márquez, đây là nhà văn Mỹ Latinh được đọc nhiều nhất thế giới.” - The Economist, London, Anh\r\n\r\n \r\n\r\n“Santiago có khả năng cảm nhận bằng trái tim như Hoàng tử bé của Saint-Exupéry.” - Frankfurter Allgemeine Zeitung, Đức.', 'Nhã Nam', 'NXB Hội Nhà Văn', '2023-04-19 20:59:45'),
('reDmkqiSH1', 'Lời từ chối hoàn hảo', 'Willam Ury', 103500, 'https://cdn0.fahasa.com/media/catalog/product/8/9/8935251418477.jpg', '', 'Alpha Books', 'NXB Công Thương', '2023-04-19 20:59:45'),
('tttfTtHORQ', 'Thao Túng Tâm Lý', 'Shannon Thomas, LCSW', 126750, 'https://cdn0.fahasa.com/media/catalog/product/8/9/8936066692298-1.jpg', 'Thao Túng Tâm Lý - Nhận Diện, Thức Tỉnh Và Chữa Lành Những Tổn Thương Tiềm Ẩn\r\n\r\nTrong cuốn “Thao túng tâm lý”, tác giả Shannon Thomas giới thiệu đến độc giả những hiểu biết liên quan đến thao túng tâm lý và lạm dụng tiềm ẩn.\r\n\r\n“Thao túng tâm lý” là một dạng của lạm dụng tâm lý. Cũng giống như lạm dụng tâm lý, thao túng tâm lý có thể xuất hiện ở bất kỳ môi trường nào, từ bất cứ đối tượng độc hại nào. Đó có thể là bố mẹ ruột, anh chị em ruột, người yêu, vợ hoặc chồng, sếp hay đồng nghiệp… của bạn. Với tính chất bí hiểm, âm thầm gây hại, thao túng, lạm dụng tâm lý làm tổn thương cảm xúc, lòng tự trọng, cuộc sống của mỗi nạn nhân. Những người từng bị lạm dụng tâm lý thường không thể miêu tả rõ ràng điều gì đã xảy ra với mình. Trong nhiều trường hợp, nạn nhân bị thao túng đến mức tự hỏi có phải họ là người có lỗi, thậm chí họ có phải là người độc hại trong mối quan hệ đó.\r\n\r\nHành vi của (những) kẻ lạm dụng giống như một trò chơi bí ẩn, tệ hại và lặp đi lặp lại, do một cá nhân hoặc một nhóm người thực hiện với nạn nhân. Những hành vi này được ngụy trang tài tình đến mức hành vi độc ác của họ diễn ra thường xuyên, nhưng không bị phát hiện.\r\nShannon Thomas giới thiệu những kiến thức cơ bản về đặc điểm, các dạng của lạm dụng tâm lý nói chung, thao túng tâm lý nói riêng, và cung cấp cho người đọc hành trình chữa lành gồm 6 giai đoạn:\r\n\r\n- Giai đoạn 1: Tuyệt vọng\r\n\r\n- Giai đoạn 2: Nhận diện\r\n\r\n- Giai đoạn 3: Thức tỉnh\r\n\r\n- Giai đoạn 4: Những ranh giới\r\n\r\n- Giai đoạn 5: Phục hồi\r\n\r\n- Giai đoạn 6: Duy trì\r\n\r\nBằng những kiến thức chuyên sâu và sự thấu hiểu, tác giả sẽ giúp bạn từng bước vượt qua những rắc rối của thao túng tâm lý, lạm dụng tiểm ẩn để có cuộc sống ý nghĩa và lành mạnh hơn.\r\n\r\nThông tin tác giả:\r\n\r\nShannon Thomas, là một nhà giám sát công tác xã hội y tế được cấp phép hành nghề, và là chủ phòng tư vấn/chuyên gia tư vấn tâm lý chính của phòng tư vấn Southlake Christian (SCC) ở Southlake, bang Texas.\r\n\r\nSCC từng nhận giải thưởng “Phòng thực hành tư vấn tâm lý tốt nhất” năm 2016 của Living Magazine khu vực Hạt Northeast Tarrant tại Dallas-Fort Worth.\r\n\r\nThomas là Trợ giảng chuyên ngành và là thành viên Ủy ban tư vấn của Khoa Công tác xã hội – Trường Đại học Texas Christian.\r\n\r\nCách tiếp cận khi tư vấn tâm lý của cô ấy xuất phát từ góc nhìn của một nhà tư vấn tâm lý được cấp phép hành nghề đồng thời từ góc nhìn của một người đi trước, một người sống sót sau khi bị lạm dụng tâm lý.', '1980 Books', 'NXB Dân Trí', '2023-04-19 20:59:45'),
('V8srMJfVlT', 'Hành Tinh Của Một Kẻ Nghĩ Nhiều', 'Amateur Psychology Nguyễn Đoàn Minh Thư', 645000, 'https://cdn0.fahasa.com/media/catalog/product/b/_/b_a_h_nh-tinh-c_a-m_t-k_-ngh_-nhi_u-tr_c-1-1.jpg', 'Hành Tinh Của Một Kẻ Nghĩ Nhiều!!!!!!!\r\n\r\n“Đó là mùa hè năm 2020, mùa hè của COVID-19 và một ngàn vạn khủng hoảng tuổi đôi mươi. Đó là mùa hè mình bắt chuyến bay sớm nhất có thể vào ngày 20 tháng 3 để chạy khỏi nước Anh đang bùng dịch, bị kẹt lại sân bay Bangkok trong 24 giờ đồng hồ vì chuyến bay quá cảnh về Sài Gòn bị huỷ..\r\n\r\nĐó là mỗi đêm mùa hè nằm trên giường stress chuyện deadline luận văn, stress chuyện thất nghiệp không kiếm ra tiền, stress chuyện bỏ lỡ cơ hội thực tập giúp ích cho sự nghiệp của mình, stress chuyện học hành dở dang - không biết bao giờ mới có thể quay lại Anh và hoàn thành tấm bằng đại học, stress chuyện tồn tại một cách mơ hồ, không biết mình là ai.”\r\n\r\nHành tinh của một kẻ nghĩ nhiều là hành trình khám phá thế giới nội tâm của một người trẻ. Đó là một hành tinh đầy hỗn loạn của những suy nghĩ trăn trở, những dằn vặt, những cuộc chiến nội tâm, những cảm xúc vừa phức tạp cũng vừa rất đỗi con người. Một thế giới quen thuộc với tất cả chúng ta. \r\n\r\nChứa đựng những lời chia sẻ và kiến thức từ podcast của Amateur Psychology - Tay mơ học đời bằng Tâm lý học, tác giả sẽ dẫn lối và đưa bạn tới từng ngóc ngách thầm kín nhất của hành tinh ấy dưới một góc nhìn chuyên sâu hơn.  \r\n\r\nVà nếu bạn cũng là một kẻ nghĩ nhiều, chào mừng bạn đến với hành tinh này.\r\n\r\n“Sự cô đơn không nằm ở việc không có bạn bè hay người thân mà ngay cả trong sự sum vầy ta vẫn cảm thấy không có ai có thể hiểu mình tường tận từ sâu tâm hồn. Là sự cô đơn như thể chỉ có một mình mình trên một hành tinh đơn độc trong đầu, một hành tinh không bao giờ có khách viếng thăm”.', 'AZ Việt Nam', 'Thế Giới', '2023-04-19 21:01:16'),
('WRbXZjhpy9', 'Thuật Thao Túng - Góc Tối Ẩn Sau Mỗi Câu Nói', 'Wladislaw Jachtchenko', 104000, 'https://cdn0.fahasa.com/media/catalog/product/u/n/untitledthaotungtamly.jpg', 'Thuật Thao Túng\r\n\r\nBạn có muốn giành phần thắng cuối cùng trong các cuộc tranh luận?\r\n\r\nBạn có muốn dẹp đi bộ mặt kiêu ngạo của các đồng nghiệp xung quanh mình?\r\n\r\nBạn có muốn chứng minh rằng bạn đã đúng về mọi thứ?\r\n\r\nĐây là quyển sách chứa đựng đáp án mà bạn mong muốn. Thuật thao túng sẽ giúp bạn thuần thục các kỹ năng thuộc bộ môn “nghệ thuật” làm chủ cảm xúc, làm chủ vận mệnh, điều chỉnh tâm lý và đạt được thứ bạn muốn một cách tinh vi: thao túng tâm lý người đối diện, khiến họ hành động theo hướng ta mong đợi. Không những vậy, quyển sách còn giúp bạn nhìn nhận lại về định nghĩa thao túng, những tốt-xấu ẩn giấu đằng sau và giải đáp vấn đề đạo đức con người mà bạn luôn trăn trở khi thực hiện những hành vi này. Bật mí, con người khi vừa sinh ra đã làm một thao tác thao túng tâm lý người khác rồi đấy!\r\n\r\nCó thể bạn chưa biết, bạn đã và đang thao túng người khác hoặc bị người khác thao túng thông qua cử chỉ ngôn hành mỗi ngày, như-một-trò-đùa.\r\n\r\nCó thể bạn chưa biết, nạn nhân bị thao túng chưa chắc đã rơi vào tình thế bất lợi, nhưng rơi vào tình thế bất lợi chắc chắn đã bị thao túng.\r\n\r\nCó thể bạn chưa biết, người có đạo đức chắc chắn không thao túng người khác, nhưng kẻ thao túng người khác chưa chắc đã vô đạo đức.\r\n\r\nVới 10 kỹ năng và 37 thủ thuật, Thuật thao túng sẽ giúp bạn nhận ra và thoát khỏi những suy nghĩ xấu xa nơi tiềm thức của chính mình, đồng thời vạch trần góc tối ẩn giấu sau mỗi câu nói của đối phương, đưa những chiêu trò thao túng ấy ra ánh sáng để mọi người không lần nữa rơi vào cạm bẫy. Hơn cả, quyển sách này sẽ dẫn lối bạn trở thành một “nghệ nhân” thao túng có đạo đức.\r\n\r\nVề tác giả\r\n\r\nTác giả người Đức Wladislaw Jachtchenko - diễn giả hàng đầu châu Âu, người sáng lập Học viện Argumentorik giảng dạy về giao tiếp - dạy bạn cách giao tiếp phù hợp để đạt được điều bạn muốn.', 'AZ Việt Nam', 'Thế Giới', '2023-04-19 21:08:36'),
('xaEgvUnCVr', '1% Mỗi Ngày - Không Ngừng Chinh Phục Bản Thân', 'Ngô Di Lân', 102000, 'https://cdn0.fahasa.com/media/catalog/product/8/9/8934974179566.jpg', '“Đây không phải là một cuốn sách dạy làm giàu hay một cuốn sách kể về cuộc đời và những chiến công hiển hách của bậc vĩ nhân. Thực lòng tôi không nghĩ người trẻ cần những cuốn sách đó lắm. Người trẻ chúng ta dễ cảm thấy mông lung trên hành trình đi tìm bản thân. Có chút tự ti, có phần sợ hãi nhưng có lẽ đa phần là háo hức chờ đợi những gì đang chờ đón ta ở phía trước. Thiết nghĩ sẽ thật tuyệt vời nếu có một cuốn sách thấu hiểu được nỗi lòng của người trẻ, để các bạn cảm thấy dù mình đang ở đâu gặp khó khăn gì thì vẫn luôn có một ai đó bên cạnh và nói được tiếng lòng của các bạn. Mong rằng những dòng chia sẻ trong cuốn sách này sẽ giúp các bạn cảm thấy vững tâm hơn trên hành trình đi tìm bản thân và được tiếp sức mỗi khi bị cuộc đời làm cho gục ngã. Hơn hết, tôi mong rằng các bạn sẽ được truyền thêm cả động lực lẫn ý tưởng để có thể hoàn thiện bản thân hơn, dù chỉ là 1% mỗi ngày.” - Ngô Di Lân\r\n\r\nChinh phục bản thân về bản chất là quá trình một người rèn luyện và phát triển để trở nên toàn diện và hoàn thiện nhất có thể xét trên những khía cạnh quan trọng nhất trong cuộc sống. Những ai đã học được cách chinh phục bản thân vừa có thể sống tốt một cách độc lập, vừa có thể hòa nhập được với xã hội một cách dễ dàng, đồng thời có nhận thức đủ tốt để sửa được những thói xấu và khiếm khuyết lớn nhất mà một người thường có. Trong cuốn sách, tác giả sẽ bàn luận kỹ hơn về bốn mục tiêu cốt lõi của hành trình chinh phục bản thân: kiểm soát cảm xúc tiêu cực, khai mở tâm trí, rèn kỹ năng và giữ vững tinh thần “thắng không kiêu, bại không nản”.\r\n\r\nTác giả Ngô Di Lân \r\n- Chủ nhân Facebook fanpage Self Conquest \r\n- Học bổng Tiến sĩ toàn phần Đại học Brandeis 2015-2020\r\n- Sáng lập - Chủ tịch của Tổ chức Hợp tác Thanh niên Việt Nam (VYCO).', 'NXB Trẻ', 'NXB Trẻ', '2023-04-19 20:59:45'),
('XD5Frlk5lY', 'Trí Tuệ Do Thái', 'Eran Katz', 141750, 'https://cdn0.fahasa.com/media/catalog/product/8/9/8935251419184.jpg', 'Trí tuệ Do Tháilà một cuốnsách tư duyđầy tham vọng trong việc nâng cao khả năng tự học tập, ghi nhớ và phân tích - những điều đã khiến người Do Thái vượt trội lên, chiếm lĩnh những vị trí quan trọng trong ngành truyền thông, ngân hàng và những giải thưởng sáng tạo trên thế giới.\r\n\r\nTuy là một cuốn sách nhỏ nhưngTrí Tuệ Do Tháilại mang trong mình tri thức về một dân tộc có thể nhỏ về số lượng nhưng vĩ đại về trí tuệ và tài năng. Cuốn sách không chỉ lý giải lý do vì sao những người Do Thái trên thế giới lại thông minh và giàu có, mà còn đặc tả con đường thành công của một người Do Thái - Jerome cùng những triết lý được đúc kết đầy giá trị.\r\n\r\nTrí Tuệ Do Tháikhông dừng lại ở giới hạn của một cuốnsách triết lýhay sáchkỹ năng. Thông qua Jerome, một kẻ lông bông thích la cà, tác giả đưa người đọc vào một chuyến khám phá về trí tuệ của người Do Thái, từ đó khơi ra những giới hạn để người đọc có thể tự khai phá trí tuệ bản thân với \"Năm nguyên tắc\" và \"Mười lăm gợi ý\". Đây sẽ là những bài học quý giá dành cho những ai muốn tồn tại và phát triển mạnh mẽ, không chỉ với con đường thành công của riêng mình.\r\n\r\nKhông được viết như một cuốnsách kỹ năngkhô khan,Trí Tuệ Do Tháiđược dựng lên bằng một câu chuyện và rồi cũng khép lại với một cái kết mở, nơi những người Do Thái đang không ngừng đối mặt với cuộc sống và chinh phục nó.', 'Alpha Books', 'Công Thương', '2023-04-19 20:59:45');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(100) NOT NULL,
  `product_id` varchar(10) DEFAULT NULL,
  `combo_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(20) NOT NULL,
  `rating` varchar(1) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` varchar(2500) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `combo_id`, `user_id`, `rating`, `title`, `description`, `date`) VALUES
(21, '85glwWSTrg', NULL, 'jBSM7nyWJV', '5', 'Làm tất cả mọi thứ vì gia đình', 'Xuyên suốt hành trình của Bố Già, Mario Puzo khiến nó nổi tiếng không phải bởi vì có những mưu sâu kế hiểm trong một thế giới mafia đầy rẫy chết chóc, càng không phải tiền bạc & quyền lực. Bởi những thứ đó, Holywood và những dòng phim điện ảnh thời bấy giờ thừa sức thể hiện xuất sắc.\r\n\r\nVà cũng không thiếu những tiểu thuyết kinh điển đã làm mưa làm gió trước khi Bố già ra đời.\r\n\r\nBởi vậy cái làm Bố già trở nên tiểu thuyết kinh điển & huyền thoại, cái đã thực sự làm nên thương hiệu của loạt series Bố già, chính là xuất phát, mục tiêu từ đáy của mỗi hành động: tất cả là vì gia đình.\r\n\r\nDù phải làm tất cả, phải “đưa ra một lời đề nghị hắn không thể chối từ”, không phải để thể hiện quyền lực, mà là nâng tầm sự quan trọng của những người thân trong gia đình.\r\n\r\nRõ ràng ông trùm không rảnh để quan tâm tới những điều nhỏ nhặt, nhưng một khi ai đó là người trong gia đình Corleone khẩn cầu, thì dù nhỏ bé hay lớn lao tới đâu, tất cả đều phải được giải quyết.', '2023-04-20'),
(22, 'Qg9kfupYAu', NULL, 'zAYghE9NNZ', '5', 'Người khen, kẻ chê', 'Trước giờ bản thân tôi vẫn tin rằng mỗi người đều có một vận mệnh riêng, một số phận với những hướng đi và sự lựa chọn không hề giống nhau. Dù rằng cả gia đình không hề theo bất cứ tôn giáo nào nhưng việc tiếp xúc với phật giáo và thiên chúa giáo từ nhỏ đến lớn do môi trường học tập đã khiến tôi ít nhiều bị ảnh hưởng tới nhận thức cùng suy nghĩ. Loanh quanh với những câu hỏi “ mười vạn vì sao” và tôi đã tiêu tốn một cách hào phóng thời gian cũng như tuổi trẻ của mình trong vòng luẩn quẩn không lối ra đó. Vì sao tôi tồn tại? Vì sao tôi được sinh ra? Vì sao tôi luôn cảm thấy mình khác với những người xung quanh? Mục đích hay ý nghĩa của sự tồn tại của tôi là gì? …Cho tới khi tôi gia nhập “hội những người thích sách” và được bạn bè chia sẻ cho những cuốn sách hay và đặc biệt trong số đó có hai cuốn sách đã trở thành một phần “ cứu rỗi” trong tôi. Ba người thầy và nhà giả kim thuật.', '2023-04-20'),
(23, '85glwWSTrg', NULL, 'zAYghE9NNZ', '3', 'Biết cách kiềm chế bản thân', 'Ông trùm Vito luôn biết cách kiềm chế cảm xúc của bản thân, bình tĩnh trước mọi sóng gió ập đến gia đình ông. Vì vậy, việc để lộ ra cảm xúc của mình không khác nào việc mình đưa cổ cho kẻ thù kết liễu.', '2023-04-20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` varchar(10) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `phonenumber` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL DEFAULT 'user',
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `username`, `email`, `phonenumber`, `password`, `user_type`, `image`) VALUES
('F96Eqi8HzJ', 'Thanh Cong Nguyen', 'adminTCN', 'thanhcongnguyenadmin@gmail.com', '0847476547', '$2y$10$6thasqV/.qV55wEx8trKX.Q8/gq6TSj2QmLFKuiDncIvSaH1CRqQG', 'user', ''),
('jBSM7nyWJV', 'Đỗ Trần Ngọc Linh', 'ngoc_linh1703', 'ngoclinh1703@gmail.com', '0847476547', '$2y$10$WC73B6jWVLF1vafboUX.Hu77//XuTONHCWTw0rSktJoUOgko7O4Qm', 'user', 'fzyd3C0MA3.png'),
('m27C3SOvfb', 'Tuấn Anh', 'tuananh123', 'tuananh@gmail.com', '0847476547', '$2y$10$jeDkBHgk4VeTOh2kYclvt.Q/fVoL4DjJHsorIGbkstmaaPgM9hcgu', 'admin', ''),
('zAYghE9NNZ', 'Trần Thị Thu H&agrave;', 'H&agrave; M&atilde; @1209', 'thuha1209@gmail.com', '0847476547', '$2y$10$a4DP15UJNvPlnrsDgVTORuW6BLTJWkesZz2un9wv8QuWSChfat3.2', 'user', 'ajE7DtDSr5.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `fk_user_cart` (`user_id`);

--
-- Indexes for table `combo_products`
--
ALTER TABLE `combo_products`
  ADD PRIMARY KEY (`combo_id`);

--
-- Indexes for table `database_bai3`
--
ALTER TABLE `database_bai3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_message_user` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD KEY `fk_order_users` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comment_product` (`product_id`),
  ADD KEY `fk_comment_combo_product` (`combo_id`),
  ADD KEY `fk_reviews_users` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `database_bai3`
--
ALTER TABLE `database_bai3`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_user_cart` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_message_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_order_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `fk_comment_combo_product` FOREIGN KEY (`combo_id`) REFERENCES `combo_products` (`combo_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_comment_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_reviews_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
