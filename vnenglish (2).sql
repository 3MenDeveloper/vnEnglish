-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2015 at 11:07 AM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vnenglish`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `categoryID` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `exp` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `title`, `image`, `exp`, `created_at`, `updated_at`) VALUES
(1, 'Cơ bản 1', 'basic.png', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Món ăn', 'food.png', 50, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Động vật', 'animal.gif', 120, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Số nhiều', 'sonhieu.PNG', 200, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Sở hữu', 'sohuu.PNG', 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Đt KQuan', 'dtkq.PNG', 420, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE IF NOT EXISTS `level` (
  `levelid` int(10) unsigned NOT NULL,
  `exp` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`levelid`, `exp`, `level`, `created_at`, `updated_at`) VALUES
(1, 50, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 120, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 200, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 300, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 420, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `questionID` int(10) unsigned NOT NULL,
  `ask` text COLLATE utf8_unicode_ci NOT NULL,
  `option` text COLLATE utf8_unicode_ci,
  `rightAnswer` text COLLATE utf8_unicode_ci NOT NULL,
  `rightAnswerNote` text COLLATE utf8_unicode_ci,
  `type` int(11) NOT NULL DEFAULT '1',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `categoryID` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`questionID`, `ask`, `option`, `rightAnswer`, `rightAnswerNote`, `type`, `active`, `categoryID`, `created_at`, `updated_at`) VALUES
(1, 'Chọn nghĩa của từ "đàn ông" ?', 'apple--man--woman--boy', 'man--boy', NULL, 2, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Chọn nghĩa của từ "cậu bé" ?', 'apple--man--woman--boy', 'boy', NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'chọn nghĩa của từ "phụ nữ" ?', 'boy--woman--girl--man', 'woman', NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'chọn hình ảnh đúng của từ "girl" ?', 'boy.jpg--girl.jpg--man.jpg--apple.jpg', 'girl.jpg', NULL, 3, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'chọn nghĩa của từ "eat" ?', 'uống--đi--ăn--nói', 'ăn', NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'chọn nghĩa của từ "táo" ?', 'apples--aple--aples--apple', 'apple', NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'chọn nghĩa đúng của từ "speak" ?', 'nghe--đọc--nói--hát', 'nói', NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'chọn hình ảnh của từ "man" ?', 'boy.jpg--girl.jpg--man.jpg--apple.jpg', 'man.jpg', NULL, 3, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'chọn hình ảnh đúng của từ "boy" ?', 'boy.jpg--girl.jpg--man.jpg--apple.jpg', 'boy.jpg', NULL, 3, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'chọn hình ảnh đúng của từ "woman" ?', 'boy.jpg--girl.jpg--man.jpg--woman.jpg', 'woman.jpg', NULL, 3, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'chọn câu đúng khi dịch câu "You are a child." ?\r\n', 'bạn là một người đàn ông--bạn là một phụ nữ--bạn là một đứa trẻ--bạn là một cô gái', 'bạn là một đứa trẻ', NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Chọn hình ảnh đúng của từ "Rice" ?', 'rice.jpg--sandwitch.jpg--newspaper.jpg--menu.jpg', 'rice.jpg', NULL, 3, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Chọn nghĩa của từ "sandwich" ?', 'bánh mì kẹp--khoai tây chiên--xúc xích--thịt', 'bánh mì kẹp', NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Chọn nghĩa đúng của từ "thực đơn" ?', 'rice--menu--newspaper--food', 'menu', NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'Chọn nghĩa đúng của từ "sách" ?', 'newspaper--book--menu--rice', 'book', NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Chọn nghĩa đúng của từ "trẻ em (số nhiều)"?', 'menu--child--newspaper--children', 'children', NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'chọn nội dung đúng của câu " nó là một quyển sách "', 'it book--it is a book--book--it is a newspaper', 'it is a book', NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'chọn nội dung đúng của câu "Tôi ăn cơm" ', 'I have rice--I eat rice--I eat meet--I drink rice', 'I eat rice', NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'chọn nghĩa đúng của câu "cậu ấy đọc một tờ báo"', 'he reads a newspaper--he is a newspaper--he a newspaper--he reads a book', 'he reads a newspaper', NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'Chọn ngĩa đúng của từ "bread"', 'bún--bánh mì--cơm--thức ăn', 'bánh mì', NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'chọn nghĩa đúng của câu "chào buổi sáng"', 'good night--good morning--hello--good evening', 'good morning', NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'Chọn nghĩa đúng của câu "bạn có khỏe không?"', 'what are you?--how are you?--how is you?--and you?', 'how are you?', NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'chọn nghĩa đúng của câu "tôi xin lỗi"', 'he is sorry--i sorry--i am sorry--she is sorry', 'i am sorry', NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'chọn nghĩa đúng của câu "tôi là một cậu bé"', 'I a boy--I am a boy--I am a man--I a man', 'I am a boy', NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'chọn nội dung đúng của câu "tôi khỏe, cảm ơn"', 'i fire, thanks--i fine,thank you--i am fine,thank you--i am fire,thank you', 'i am fine,thank you', NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'chọn nghĩa đúng của câu "chúc ngủ ngon"', 'good night--good evening--good lunch--good morning', 'good night', NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'chọn nghĩa đúng của câu "tôi yêu bạn"', 'i am love you--i''m love you--i live you--i love you', 'i love you', NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'chọn nghĩa đúng của câu "tôi gét bạn"', 'i miss you--i love you--i have you--i hate you', 'i hate you', NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'chọn nghĩa đúng của câu "tôi không phải là một cậu bé"', 'i am not a boy--i not a boy--i not a girl--i am not a girl', 'i am not a boy', NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'chọn nghĩa đúng của từ "morning"', 'buổi sáng--buổi trưa--buổi tối--buổi chiều', 'buổi sáng', NULL, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'Chọn hình ảnh đúng của từ "coffee"', 'imgcoffee1.jpg--imgcoffee2.jpg--imgcoffee3.jpg--imgcoffee4.jpg', 'imgcoffee1.jpg', NULL, 3, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'chọn hình ảnh đúng của từ "chicken"', 'imgchicken1.jpg--imgchicken2.jpg--imgchicken3.jpg--imgchicken4.jpg', 'imgchicken3.jpg', NULL, 3, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'chọn hình ảnh đúng của từ "tomato"', 'imgtomato1.jpg--imgtomato2.jpg-imgtomato3.jpg-imgtomato4.jpg', 'imgtomato4.jpg', NULL, 3, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'chọn nghĩa đúng của từ "tomato"', 'cà phê--chanh--thịt gà--cà chua', 'cà chua', NULL, 1, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'chọn nghĩa đúng của từ "rượu"', 'wine--wike--weki--wire', 'wine', NULL, 1, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'chọn nghĩa đúng của từ "gà"', 'chichken--chicken--checkin--chitken', 'chicken', NULL, 1, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'chọn nghĩa đúng của từ "đĩa"', 'plan--plate--pleta-plata', 'plate', NULL, 1, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'chọn hình ảnh đúng của từ "plate"', 'imgplate1.jpg--imgplate2.jpg--imgplate4.jpg--imgplate5.jpg', 'imgplate3.jpg', NULL, 3, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 'chọn nghĩa đúng của từ "lemon"', 'cam--chanh--quýt--bưởi', 'chanh', NULL, 1, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 'chọn hình ảnh đúng của từ "lemon"', 'imglemon1.jpg--imglemon2.jpg--imglemon3.jpg--imglemon4.jpg', 'imglemon2.jpg', NULL, 3, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'chọn nghĩa đúng của từ "fish"', 'cá-gà-chim-thịt', 'cá', NULL, 1, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 'chọn nghĩa đúng của từ "cá"', 'fish--finish--meat--rice', 'fish', NULL, 1, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 'chọn hình ảnh đúng của từ "egg"', 'imgegg1.jpg--imgegg2.jpg--imgegg3.jpg--imgegg4.jpg ', 'imgegg3.jpg', NULL, 3, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 'chọn nghĩa đúng của từ "sugar"', 'đường--trứng--bánh--bột ngọt', 'đường', NULL, 1, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 'chọn nghĩa của từ "trái cây"', 'fruit--friut--frut--friuts', 'fruit', NULL, 1, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 'chọn hình ảnh đúng của từ "juice"', 'imgjuice1.jpg--imgjuice2.jpg--imgjuice3.jpg--imgjuice4.jpg', 'imgjuice3.jpg', NULL, 3, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 'chọn hình ảnh đúng của từ "pasta"', 'imgpasta1.jpg--imgpasta2.jpg--imgpasta3.jpg--imgpasta4.jpg', 'imgpasta3.jpg', NULL, 3, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 'chọn nghĩa đúng của từ "mì ống"', 'pastar--pasta--patas--pata', 'pasta', NULL, 1, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 'chọn nghĩa đúng của từ "salt"', 'bột ngọt--muối--đường--mỡ', 'muối', NULL, 1, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 'chọn hình ảnh đúng của từ "salt"', 'imgsalt1.jpg--imgsalt2.jpg--imgsalt3.jpg--imgsalt4.jpg', 'imgsalt1.jpg', NULL, 3, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 'chọn nghĩa của từ "phô mai"', 'cheese--chese--chesse--chees', 'cheese', NULL, 1, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 'chọn nghĩa của từ "beef"', 'thịt bò--thịt heo--thịt gà--thịt trâu', 'thịt bò', '', 1, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 'chọn hình ảnh đúng của từ "beef"', 'imgbeef1.jpg--imgbeef2.jpg--imgbeff3.jpg--imgbeef4.jpg', 'imgbeef2.jpg', NULL, 3, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 'chọn nghĩa đúng của câu "tôi uống bia"', 'i drink bear--i drinks bear--i drink beer--i drink baar', 'i drink bear', NULL, 1, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 'chọn nghĩa của từ "quả dâu"', 'strawbery--strawberry--strabarry--lemon', 'strawberry', NULL, 1, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 'chọn hình ảnh đúng của từ "strawberry"', 'imgstrawberry1.jpg--imgstrawberry2.jpg--imgstrawberry3.jpg--imgstrawberry4.jpg', 'imgstrawberry3.jpg', NULL, 3, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 'chọn nghĩa đúng của từ "the food"', 'cơm--thức ăn--thịt--trái cây', 'thức ăn', '', 1, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 'chọn nghĩa đúng của từ "dầu ăn"', 'the oil--the oli--the sait--the egg', 'the oil', NULL, 1, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 'chọn hình ảnh đúng của từ "the oil"', 'imgoil1.jpg--imgoil2.jpg--imgoil3.jpg--imgoil4.jpg', 'imgoil3.jpg', NULL, 3, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 'chọn nghĩa đúng của từ "meat"', 'cam--thịt--bánh--dầu', 'thịt', NULL, 1, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 'chọn hình ảnh đúng của từ "horse"', 'imghorse1.jpg--imghorse2.jpg--imghorse3.jpg--imghorse4.jpg', 'imghorse4.jpg', NULL, 3, 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 'chọn nghĩa của từ "chuột"', 'horse--hose--duck--mouse', 'mouse', NULL, 1, 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 'chọn nghĩa của từ "animal"', 'động vật--thực vật--cảnh vật--đồ vật', 'động vật', NULL, 1, 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 'chọn nghĩa của từ "vịt"', 'duck--birth--chicken--horse', 'duck', NULL, 1, 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 'chọn nghĩa của từ "turtle"', 'rùa--voi--ngựa--chim', 'rùa', NULL, 1, 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 'chọn nghĩa đúng của từ "bird"', 'cá--voi--rùa--chim', 'chim', NULL, 1, 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 'chọn nghĩa đúng của từ "cat"', 'chó--vịt--rùa--mèo', 'mèo', NULL, 1, 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 'chọn nghĩa đúng của từ "elephant"', 'rùa--voi--kiến--chim', 'voi', NULL, 1, 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 'chọn nghĩa đúng của câu "con mèo uống sữa"', 'the cat drinks milk--the cat drink milk--cat drink the milk--cat drink milk', 'the cat drink milk', NULL, 1, 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 'chọn nghĩa đúng của từ "bear"', 'chó--gấu--mèo--rùa', 'gấu', NULL, 1, 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 'chọn hình ảnh đúng của từ "duck"', 'imgduck1.jpg--imgduck2.jpg--imgduck3.jpg--imgduck4.jpg', 'imgduck3.jpg', NULL, 3, 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 'chọn hình ảnh đúng của từ "elephant"', 'imgelephant1.jpg--imgelephant2.jpg--imgelephant3.jpg--imgelephant4.jpg', 'imgelephant3.jpg', NULL, 3, 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 'chọn hình ảnh đúng của từ "turtle"', 'imgturtle1.jpg--imgturtle2.jpg--imgturtle3.jpg--imgturtle4.jpg', 'imgturtle3.jpg', NULL, 3, 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 'chọn hình ảnh đúng của từ "dog"', 'imgdog1.jpg--imgdog2.jpg--imgdog3.jpg--imgdog4.jpg', 'imgdog3.jpg', NULL, 3, 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 'chọn hình ảnh đúng của từ "bird"', 'imgbird1.jpg--imgbird2.jpg--imgbird3.jpg--imgbird4.jpg', 'imgbird3.jpg', NULL, 3, 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 'chọn hình ảnh đúng của từ "cat"', 'imgcat1.jpg--imgcat2.jpg--imgcat3.jpg--imgcat4.jpg', 'imgcat1.jpg', NULL, 3, 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 'chọn nghĩa đúng của câu " tôi có một con mèo"', 'i have a cat--i have a duck--i have a turle--i have cat', 'i have a cat', NULL, 1, 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 'chọn nghĩa đúng của từ "crab"', 'vịt--cua--chim--cá', 'cua', NULL, 1, 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 'chọn hình ảnh đúng của từ "crab"', 'imgcrab1.jpg--imgcrab2.jpg--imgcrab3.jpg--imgcrab4.jpg', 'imgcrab1.jpg', NULL, 3, 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 'chọn nghĩa đúng của từ "cua"', 'duck--bird--crab--fish', 'crab', NULL, 1, 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 'chọn nghĩa đúng của câu "dogs and cat"', 'những chú chó và những chú mèo--chó và mèo--nhiều chó mèo--chó mèo', 'những chú chó và những chú mèo', NULL, 1, 1, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 'chọn nghĩa đúng của câu "những con mèo ăn cá"', 'the cat eat fish--cat eat fish--the cats eat fish--the cats eats fish', 'the cats eat fish', NULL, 1, 1, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 'chọn nghĩa đúng của câu "những con chó ăn bánh mì"\r\n', 'the dog eat bread--dog eat bread--the dogs eat bread--the dogs eat breat', 'the dogs eat bread', NULL, 1, 1, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 'chọn nội dung đúng của câu "The elephants drink water"', 'con voi uống nước--những con voi uống nước--con rùa uống nước--những con rùa uống nước', 'những con voi uống nước', NULL, 1, 1, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 'chọn những nội dung đúng của câu "They have apples"', 'họ có trái táo--họ có nhiều trái táo--họ có những trái táo--chúng ta có nhiều trái táo', 'họ có nhiều trái táo--họ có những trái táo', NULL, 2, 1, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 'chọn nội dung đúng của câu "English books"', 'sách tiếng anh--những quyển sách tiếng anh--sách người anh--sách của người anh', 'những quyển sách tiếng anh', NULL, 1, 1, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 'chọn nghĩa đúng của từ "những con ngựa"', 'the horse--the horsees--the hosres--the horses', 'the horses', NULL, 1, 1, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 'chọn những nội dung đúng của câu "the newspapers"', 'tờ báo--những tờ báo--nhiều tờ báo--báo chí', 'những tờ báo--nhiều tờ báo', NULL, 2, 1, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 'chọn nội dung đúng của câu "anh ấy có nhiều con ngựa"', 'he have the horse--he has horse--he have horses--he has horses ', 'he has horse', NULL, 1, 1, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 'chọn nội dung đúng của câu sau "The animals"', 'động vật--thực vật--những con vật--những loài thực vật', 'những con vật', NULL, 1, 1, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 'chọn nội dung đúng của câu "Her duck"', 'cô gái vịt--cô gái của con vịt--con vịt cái--con vịt của cô ấy', 'con vịt của cô ấy', NULL, 1, 1, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, 'chọn nghĩa đúng của câu "he eats our rice"', 'anh ấy ăn cơm--anh ấy ăn cơm của chúng tôi--anh ấy ăn cơm của họ--anh ấy ăn cơm cùng chúng tôi', 'anh ấy ăn cơm của chúng tôi', NULL, 1, 1, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 'chọn nghĩa đúng của câu "con vịt của tôi"', 'my duck--my''s duck--me duck--i duck', 'my duck', NULL, 1, 1, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 'chọn nội dung đúng của câu "The cat drinks your milk"', 'con mèo uống sữa--con mèo uống sữa của tôi--con mèo uống sữa của nó--con mèo uống sữa của bạn', 'con mèo uống sữa của bạn', NULL, 1, 1, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, 'chọn những nghĩa đúng của từ "the ducks"', 'con vịt--những con vịt--nhiều con vịt--vịt con', 'những con vịt--nhiều con vịt', NULL, 2, 1, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, 'chọn nghĩa đúng của từ " the turtles"', 'con voi--con rùa--những con rùa--một con rùa', 'những con rùa', NULL, 1, 1, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, 'chọn nội dung đúng của câu "chúng tôi là những con rùa"', 'we are the turtle--we are the turtles--we are turtle--we are turtles', 'we are the turtles', NULL, 1, 1, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, 'chọn nội dung đúng của câu "những con chim ăn trái cây"', 'the bird eat fruit--the bird eats fruit--the birds eat fruit--the birds eats fruit', 'the birds eat fruit', NULL, 1, 1, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, 'chọn nghĩa đúng của từ "The sandwiches"', 'bánh mì kẹp--bánh mì--những cái bánh mì--những cái bánh mì kẹp', 'những cái bánh mì kẹp', NULL, 1, 1, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, 'chọn những nghĩa đúng của câu "She has the plates"', 'cô ấy có cái đĩa--cô ấy có nhiều cái đĩa--cô ấy có những cái đĩa--cô ấy có đĩa', 'cô ấy có nhiều cái đĩa--cô ấy có những cái đĩa', NULL, 2, 1, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, 'chọn nghĩa đúng của câu "The ducks drink water"', 'con vịt uống nước--con vịt khát nước--những con vịt uống nước--những con vịt khát nước', 'những con vịt uống nước', NULL, 1, 1, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, 'chọn nội dung đúng của câu "we are the birds"', 'tôi là con chim--chúng tôi là con chim--chúng tôi là những con chim--chúng tôi có những con chim', 'chúng tôi là những con chim', NULL, 1, 1, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, 'chọn những nội dung đúng của câu "I have the sandwiches"', 'tôi có nhiều bánh mì kẹp--tôi có những cái bánh mì kẹp--tôi có bánh mì kẹp--tôi có một ít bánh mì kẹp', 'tôi có nhiều bánh mì kẹp--tôi có những cái bánh mì kẹp', NULL, 2, 1, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, 'chọn nghĩa đúng của câu "những con vịt uống nước"', 'the ducks drinks water--the duck drink water--the ducks drink water--the duck drinks water', 'the ducks drink water', NULL, 1, 1, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, 'chọn nghĩa đúng của câu "The cat drinks its water"', 'con mèo uống nước--con mèo uống nước của tôi--con mèo uống nước của bạn--con mèo uống nước của nó', 'con mèo uống nước của nó', NULL, 1, 1, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, 'chọn nghĩa đúng của câu "những đứa trẻ của họ nói tiếng anh"', 'their children speak English--they children speak English--their child speak English--they child speak English', 'their children speak English', NULL, 1, 1, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, 'chọn nội dung đúng của câu "They read his book"', 'họ đọc sách--họ đọc sách của cô ấy--họ đọc sách của anh ấy--họ đọc sách của bạn', 'họ đọc sách của anh ấy', NULL, 1, 1, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, 'chọn nội dung đúng của câu "con chó ăn bữa tối của nó"', 'the dog eats its dinner--the dog eat its dinner--the dog eats her dinner--the dog eats his dinner', 'the dog eats its dinner', NULL, 1, 1, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, 'chọn nghĩa đúng của câu "Our breakfast" ', 'bữa sáng của bạn--bữa sáng của tôi--bữa sáng của chúng ta--bữa sáng của họ', 'bữa sáng của chúng ta', NULL, 1, 1, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, 'chọn những nội dung đúng của câu "Drink my tea!"', 'uống trà của tôi--làm ơn uống trà của tôi--uống trà của tôi đi--uống trà đi', 'uống trà của tôi--uống trà của tôi đi', NULL, 2, 1, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `questiontag`
--

CREATE TABLE IF NOT EXISTS `questiontag` (
  `questionID` int(10) unsigned NOT NULL,
  `tagID` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `questiontag`
--

INSERT INTO `questiontag` (`questionID`, `tagID`, `created_at`, `updated_at`) VALUES
(1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 85, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 86, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 87, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 89, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 90, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 17, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 91, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 20, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 92, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 26, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 23, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 22, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 21, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 25, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 18, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 35, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 37, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 50, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 50, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 34, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 37, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 38, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 51, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 51, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 33, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 33, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 36, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 43, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 41, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 46, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 45, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 45, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `quizs`
--

CREATE TABLE IF NOT EXISTS `quizs` (
  `quizID` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `duration` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `categoryID` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quizs`
--

INSERT INTO `quizs` (`quizID`, `title`, `image`, `password`, `duration`, `active`, `categoryID`, `created_at`, `updated_at`) VALUES
(1, 'Bài làm 1', 'book.png', '', 15, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'bài làm 2', 'book.png', '', 15, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'bài làm 3', 'book.png', '', 15, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'bai lam 1', 'book.png', '', 15, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'bài làm 2', 'book.png', '', 15, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'bài làm 3', 'book.png', '', 15, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'bài làm 1', 'book.png', '', 15, 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'bài làm 2', 'book.png', '', 15, 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'bài làm 1', 'book.png', '', 15, 1, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'bài làm 2', 'book.png', '', 15, 1, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'bài làm 1', 'book.png', '', 15, 1, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'bài làm 2', 'book.png', '', 15, 1, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'bài làm 1', 'book.png', '', 15, 1, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'bài làm 2', 'book.png', '', 15, 1, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `quizuser`
--

CREATE TABLE IF NOT EXISTS `quizuser` (
  `quizUserID` int(10) unsigned NOT NULL,
  `mark` int(11) DEFAULT NULL,
  `finish` tinyint(1) NOT NULL DEFAULT '0',
  `quizID` int(10) unsigned NOT NULL,
  `id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=156 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quizuser`
--

INSERT INTO `quizuser` (`quizUserID`, `mark`, `finish`, `quizID`, `id`, `created_at`, `updated_at`) VALUES
(1, NULL, 0, 1, 1, '2015-10-27 04:06:55', '2015-10-27 04:06:55'),
(2, NULL, 0, 1, 1, '2015-10-27 04:34:55', '2015-10-27 04:34:55'),
(3, NULL, 0, 1, 1, '2015-10-27 04:35:08', '2015-10-27 04:35:08'),
(4, NULL, 0, 1, 1, '2015-10-27 04:35:55', '2015-10-27 04:35:55'),
(5, NULL, 0, 1, 1, '2015-10-27 04:36:51', '2015-10-27 04:36:51'),
(6, NULL, 0, 1, 1, '2015-10-27 04:46:01', '2015-10-27 04:46:01'),
(7, NULL, 0, 1, 1, '2015-10-27 04:46:47', '2015-10-27 04:46:47'),
(8, NULL, 0, 1, 1, '2015-10-27 04:49:23', '2015-10-27 04:49:23'),
(9, NULL, 0, 1, 1, '2015-10-27 04:49:38', '2015-10-27 04:49:38'),
(10, NULL, 0, 1, 1, '2015-10-27 04:50:28', '2015-10-27 04:50:28'),
(11, NULL, 0, 1, 1, '2015-10-27 04:50:38', '2015-10-27 04:50:38'),
(12, NULL, 0, 1, 1, '2015-10-27 04:51:35', '2015-10-27 04:51:35'),
(13, NULL, 0, 1, 1, '2015-10-27 04:51:47', '2015-10-27 04:51:47'),
(14, NULL, 0, 1, 1, '2015-10-27 04:52:14', '2015-10-27 04:52:14'),
(15, NULL, 0, 1, 1, '2015-10-27 04:56:54', '2015-10-27 04:56:54'),
(16, NULL, 0, 1, 1, '2015-10-27 04:57:19', '2015-10-27 04:57:19'),
(17, NULL, 0, 1, 1, '2015-10-27 04:57:59', '2015-10-27 04:57:59'),
(18, NULL, 0, 1, 1, '2015-10-27 04:58:27', '2015-10-27 04:58:27'),
(19, NULL, 0, 1, 1, '2015-10-27 04:59:37', '2015-10-27 04:59:37'),
(20, NULL, 0, 1, 1, '2015-10-27 05:03:37', '2015-10-27 05:03:37'),
(21, NULL, 0, 1, 1, '2015-10-27 05:04:12', '2015-10-27 05:04:12'),
(22, NULL, 0, 1, 1, '2015-10-27 05:07:24', '2015-10-27 05:07:24'),
(23, NULL, 0, 1, 1, '2015-10-27 05:07:38', '2015-10-27 05:07:38'),
(24, NULL, 0, 1, 1, '2015-10-27 05:09:50', '2015-10-27 05:09:50'),
(25, NULL, 0, 1, 1, '2015-10-27 05:10:39', '2015-10-27 05:10:39'),
(26, NULL, 0, 1, 1, '2015-10-27 05:11:11', '2015-10-27 05:11:11'),
(27, NULL, 0, 1, 1, '2015-10-27 05:12:29', '2015-10-27 05:12:29'),
(28, NULL, 0, 1, 1, '2015-10-27 05:12:38', '2015-10-27 05:12:38'),
(29, NULL, 0, 1, 1, '2015-10-27 05:12:45', '2015-10-27 05:12:45'),
(30, NULL, 0, 1, 1, '2015-10-27 05:13:00', '2015-10-27 05:13:00'),
(31, NULL, 0, 1, 1, '2015-10-27 05:13:24', '2015-10-27 05:13:24'),
(32, NULL, 0, 1, 1, '2015-10-27 05:13:39', '2015-10-27 05:13:39'),
(33, NULL, 0, 1, 1, '2015-10-27 05:13:57', '2015-10-27 05:13:57'),
(34, NULL, 0, 1, 1, '2015-10-27 05:15:20', '2015-10-27 05:15:20'),
(35, NULL, 0, 1, 1, '2015-10-27 05:16:07', '2015-10-27 05:16:07'),
(36, NULL, 0, 1, 1, '2015-10-27 05:23:25', '2015-10-27 05:23:25'),
(37, NULL, 0, 1, 1, '2015-10-27 05:23:35', '2015-10-27 05:23:35'),
(38, NULL, 0, 1, 1, '2015-10-27 05:24:37', '2015-10-27 05:24:37'),
(39, NULL, 0, 1, 1, '2015-10-27 05:25:10', '2015-10-27 05:25:10'),
(40, NULL, 0, 1, 1, '2015-10-27 05:25:19', '2015-10-27 05:25:19'),
(41, NULL, 0, 1, 1, '2015-10-27 05:26:51', '2015-10-27 05:26:51'),
(42, NULL, 0, 1, 1, '2015-10-27 05:27:08', '2015-10-27 05:27:08'),
(43, NULL, 0, 1, 1, '2015-10-27 05:27:20', '2015-10-27 05:27:20'),
(44, NULL, 0, 1, 1, '2015-10-27 05:28:57', '2015-10-27 05:28:57'),
(45, NULL, 0, 1, 1, '2015-10-27 05:30:59', '2015-10-27 05:30:59'),
(46, NULL, 0, 1, 1, '2015-10-27 05:31:29', '2015-10-27 05:31:29'),
(47, NULL, 0, 1, 1, '2015-10-27 05:31:38', '2015-10-27 05:31:38'),
(48, NULL, 0, 1, 1, '2015-10-27 05:32:14', '2015-10-27 05:32:14'),
(49, NULL, 0, 1, 1, '2015-10-27 05:32:20', '2015-10-27 05:32:20'),
(50, NULL, 0, 1, 1, '2015-10-27 05:32:54', '2015-10-27 05:32:54'),
(51, NULL, 0, 1, 1, '2015-10-27 05:33:05', '2015-10-27 05:33:05'),
(52, NULL, 0, 1, 1, '2015-10-27 05:33:14', '2015-10-27 05:33:14'),
(53, NULL, 0, 1, 1, '2015-10-27 05:33:23', '2015-10-27 05:33:23'),
(54, NULL, 0, 1, 1, '2015-10-27 05:33:43', '2015-10-27 05:33:43'),
(55, NULL, 0, 1, 1, '2015-10-27 05:34:17', '2015-10-27 05:34:17'),
(56, NULL, 0, 1, 1, '2015-10-27 05:34:30', '2015-10-27 05:34:30'),
(57, NULL, 0, 1, 1, '2015-10-27 05:34:50', '2015-10-27 05:34:50'),
(58, NULL, 0, 1, 1, '2015-10-27 05:35:14', '2015-10-27 05:35:14'),
(59, NULL, 0, 1, 1, '2015-10-27 05:37:13', '2015-10-27 05:37:13'),
(60, NULL, 0, 1, 1, '2015-10-27 05:37:58', '2015-10-27 05:37:58'),
(61, NULL, 0, 1, 1, '2015-10-27 05:38:57', '2015-10-27 05:38:57'),
(62, NULL, 0, 1, 1, '2015-10-27 05:39:10', '2015-10-27 05:39:10'),
(63, NULL, 0, 1, 1, '2015-10-27 05:40:18', '2015-10-27 05:40:18'),
(64, NULL, 0, 1, 1, '2015-10-27 05:45:12', '2015-10-27 05:45:12'),
(65, NULL, 0, 1, 1, '2015-10-27 05:46:55', '2015-10-27 05:46:55'),
(66, NULL, 0, 1, 1, '2015-10-27 05:48:03', '2015-10-27 05:48:03'),
(67, NULL, 0, 1, 1, '2015-10-27 05:50:04', '2015-10-27 05:50:04'),
(68, NULL, 0, 1, 1, '2015-10-27 05:50:32', '2015-10-27 05:50:32'),
(69, NULL, 0, 1, 1, '2015-10-27 05:50:57', '2015-10-27 05:50:57'),
(70, NULL, 0, 1, 1, '2015-10-27 05:52:39', '2015-10-27 05:52:39'),
(71, NULL, 0, 1, 1, '2015-10-27 05:53:07', '2015-10-27 05:53:07'),
(72, NULL, 0, 1, 1, '2015-10-27 05:53:44', '2015-10-27 05:53:44'),
(73, NULL, 0, 1, 1, '2015-10-27 05:54:40', '2015-10-27 05:54:40'),
(74, NULL, 0, 1, 1, '2015-10-27 05:56:02', '2015-10-27 05:56:02'),
(75, NULL, 0, 1, 1, '2015-10-27 05:57:04', '2015-10-27 05:57:04'),
(76, NULL, 0, 1, 1, '2015-10-27 05:57:28', '2015-10-27 05:57:28'),
(77, NULL, 0, 1, 1, '2015-10-27 05:57:59', '2015-10-27 05:57:59'),
(78, NULL, 0, 1, 1, '2015-10-27 05:58:58', '2015-10-27 05:58:58'),
(79, NULL, 0, 1, 1, '2015-10-27 06:00:06', '2015-10-27 06:00:06'),
(80, NULL, 0, 1, 1, '2015-10-27 06:01:02', '2015-10-27 06:01:02'),
(81, NULL, 0, 1, 1, '2015-10-27 06:02:16', '2015-10-27 06:02:16'),
(82, NULL, 0, 1, 1, '2015-10-27 06:03:00', '2015-10-27 06:03:00'),
(83, NULL, 0, 1, 1, '2015-10-27 06:03:15', '2015-10-27 06:03:15'),
(84, NULL, 0, 1, 1, '2015-10-27 06:06:20', '2015-10-27 06:06:20'),
(85, NULL, 0, 1, 1, '2015-10-27 06:07:10', '2015-10-27 06:07:10'),
(86, NULL, 0, 1, 1, '2015-10-27 06:11:53', '2015-10-27 06:11:53'),
(87, NULL, 0, 2, 1, '2015-10-27 06:18:39', '2015-10-27 06:18:39'),
(88, NULL, 0, 2, 1, '2015-10-27 06:28:27', '2015-10-27 06:28:27'),
(89, NULL, 0, 1, 1, '2015-10-28 00:04:45', '2015-10-28 00:04:45'),
(90, NULL, 0, 1, 1, '2015-10-28 00:27:20', '2015-10-28 00:27:20'),
(91, NULL, 0, 1, 1, '2015-10-29 03:58:40', '2015-10-29 03:58:40'),
(92, NULL, 0, 1, 1, '2015-10-29 04:06:04', '2015-10-29 04:06:04'),
(93, NULL, 0, 1, 1, '2015-10-29 04:07:36', '2015-10-29 04:07:36'),
(94, NULL, 0, 1, 1, '2015-10-29 04:08:56', '2015-10-29 04:08:56'),
(95, NULL, 0, 1, 1, '2015-10-29 04:13:12', '2015-10-29 04:13:12'),
(96, NULL, 0, 1, 1, '2015-10-29 04:15:21', '2015-10-29 04:15:21'),
(97, NULL, 0, 1, 1, '2015-10-29 04:17:36', '2015-10-29 04:17:36'),
(98, NULL, 0, 1, 1, '2015-10-29 04:18:43', '2015-10-29 04:18:43'),
(99, NULL, 0, 1, 1, '2015-10-29 04:20:03', '2015-10-29 04:20:03'),
(100, NULL, 0, 1, 1, '2015-10-29 04:22:01', '2015-10-29 04:22:01'),
(101, NULL, 0, 1, 1, '2015-10-29 04:23:34', '2015-10-29 04:23:34'),
(102, NULL, 0, 1, 1, '2015-10-29 04:24:17', '2015-10-29 04:24:17'),
(103, NULL, 0, 1, 1, '2015-10-29 04:24:32', '2015-10-29 04:24:32'),
(104, NULL, 0, 1, 1, '2015-10-29 04:26:24', '2015-10-29 04:26:24'),
(105, NULL, 0, 1, 1, '2015-10-29 04:27:31', '2015-10-29 04:27:31'),
(106, NULL, 0, 1, 1, '2015-10-29 04:33:46', '2015-10-29 04:33:46'),
(107, NULL, 0, 1, 1, '2015-10-29 04:34:55', '2015-10-29 04:34:55'),
(108, 2, 1, 1, 1, '2015-10-29 05:02:40', '2015-10-29 05:02:40'),
(109, 4, 1, 1, 1, '2015-10-29 05:15:49', '2015-10-29 05:15:49'),
(110, 4, 1, 1, 1, '2015-10-29 05:21:14', '2015-10-29 05:21:14'),
(111, NULL, 0, 1, 1, '2015-10-29 22:37:35', '2015-10-29 22:37:35'),
(112, NULL, 0, 1, 1, '2015-10-29 22:42:49', '2015-10-29 22:42:49'),
(113, 1, 1, 1, 1, '2015-10-30 00:44:19', '2015-10-30 00:44:19'),
(114, 1, 1, 1, 1, '2015-10-30 00:45:26', '2015-10-30 00:45:26'),
(115, 3, 1, 1, 1, '2015-10-30 00:47:24', '2015-10-30 00:47:24'),
(116, NULL, 0, 1, 1, '2015-10-30 00:50:02', '2015-10-30 00:50:02'),
(117, NULL, 0, 1, 1, '2015-10-30 00:50:57', '2015-10-30 00:50:57'),
(118, 2, 1, 1, 1, '2015-10-30 02:35:09', '2015-10-30 02:35:09'),
(119, 4, 1, 1, 1, '2015-10-30 08:39:26', '2015-10-30 08:39:26'),
(120, 8, 1, 1, 1, '2015-10-30 08:42:14', '2015-10-30 08:42:14'),
(121, 6, 1, 1, 1, '2015-11-03 00:24:02', '2015-11-03 00:24:02'),
(122, NULL, 0, 1, 1, '2015-11-10 00:29:05', '2015-11-10 00:29:05'),
(123, NULL, 0, 1, 1, '2015-11-10 00:36:41', '2015-11-10 00:36:41'),
(124, NULL, 0, 1, 1, '2015-11-10 01:11:27', '2015-11-10 01:11:27'),
(125, NULL, 0, 1, 1, '2015-11-10 01:26:53', '2015-11-10 01:26:53'),
(126, 9, 1, 1, 1, '2015-11-10 01:29:22', '2015-11-10 01:29:22'),
(127, NULL, 0, 2, 1, '2015-11-10 01:31:11', '2015-11-10 01:31:11'),
(128, NULL, 0, 2, 1, '2015-11-10 01:56:32', '2015-11-10 01:56:32'),
(129, NULL, 0, 2, 1, '2015-11-10 02:04:20', '2015-11-10 02:04:20'),
(130, 9, 1, 2, 1, '2015-11-10 02:04:56', '2015-11-10 02:04:56'),
(131, NULL, 0, 3, 1, '2015-11-10 02:06:24', '2015-11-10 02:06:24'),
(132, 8, 1, 3, 1, '2015-11-10 02:06:57', '2015-11-10 02:06:57'),
(133, NULL, 0, 3, 1, '2015-11-10 02:10:09', '2015-11-10 02:10:09'),
(134, NULL, 0, 3, 1, '2015-11-10 02:13:06', '2015-11-10 02:13:06'),
(135, NULL, 0, 3, 1, '2015-11-10 02:15:16', '2015-11-10 02:15:16'),
(136, NULL, 0, 3, 1, '2015-11-10 02:16:35', '2015-11-10 02:16:35'),
(137, NULL, 0, 3, 1, '2015-11-10 02:18:13', '2015-11-10 02:18:13'),
(138, NULL, 0, 3, 1, '2015-11-10 02:19:50', '2015-11-10 02:19:50'),
(139, NULL, 0, 3, 1, '2015-11-10 02:20:56', '2015-11-10 02:20:56'),
(140, NULL, 0, 3, 1, '2015-11-10 02:21:32', '2015-11-10 02:21:32'),
(141, NULL, 0, 3, 1, '2015-11-10 02:22:16', '2015-11-10 02:22:16'),
(142, NULL, 0, 3, 1, '2015-11-10 02:23:34', '2015-11-10 02:23:34'),
(143, NULL, 0, 3, 1, '2015-11-10 02:25:00', '2015-11-10 02:25:00'),
(144, NULL, 0, 3, 1, '2015-11-10 02:26:31', '2015-11-10 02:26:31'),
(145, NULL, 0, 3, 1, '2015-11-10 02:27:29', '2015-11-10 02:27:29'),
(146, NULL, 0, 1, 1, '2015-11-10 02:28:34', '2015-11-10 02:28:34'),
(147, NULL, 0, 1, 1, '2015-11-10 02:29:39', '2015-11-10 02:29:39'),
(148, 10, 1, 1, 1, '2015-11-10 02:30:40', '2015-11-10 02:30:40'),
(149, NULL, 0, 1, 1, '2015-11-10 02:31:36', '2015-11-10 02:31:36'),
(150, NULL, 0, 1, 1, '2015-11-10 02:32:10', '2015-11-10 02:32:10'),
(151, NULL, 0, 3, 1, '2015-11-10 02:32:18', '2015-11-10 02:32:18'),
(152, NULL, 0, 1, 3, '2015-11-10 02:39:04', '2015-11-10 02:39:04'),
(153, NULL, 0, 3, 3, '2015-11-10 02:46:46', '2015-11-10 02:46:46'),
(154, 10, 1, 3, 3, '2015-11-10 02:49:31', '2015-11-10 02:49:31'),
(155, NULL, 0, 1, 3, '2015-11-10 02:58:18', '2015-11-10 02:58:18');

-- --------------------------------------------------------

--
-- Table structure for table `quizuserquestion`
--

CREATE TABLE IF NOT EXISTS `quizuserquestion` (
  `quizUserID` int(10) unsigned NOT NULL,
  `questionID` int(10) unsigned NOT NULL,
  `userAnswer` text COLLATE utf8_unicode_ci,
  `mark` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quizuserquestion`
--

INSERT INTO `quizuserquestion` (`quizUserID`, `questionID`, `userAnswer`, `mark`, `created_at`, `updated_at`) VALUES
(60, 3, 'Array', 0, '2015-10-27 05:38:17', '2015-10-27 05:38:17'),
(62, 6, 'Array', 0, '2015-10-27 05:39:17', '2015-10-27 05:39:17'),
(64, 5, 'Array', 0, '2015-10-27 05:45:27', '2015-10-27 05:45:27'),
(67, 2, 'Array', 0, '2015-10-27 05:50:20', '2015-10-27 05:50:20'),
(72, 7, 'Array', 0, '2015-10-27 05:53:58', '2015-10-27 05:53:58'),
(85, 1, '["apple","woman"]', 0, '2015-10-27 06:07:21', '2015-10-27 06:07:21'),
(86, 1, 'man--boy', 1, '2015-10-27 06:14:52', '2015-10-27 06:14:52'),
(86, 2, 'man', 0, '2015-10-27 06:13:09', '2015-10-27 06:13:09'),
(86, 3, 'girl-man', 0, '2015-10-27 06:13:26', '2015-10-27 06:13:26'),
(86, 4, 'imggirl1.jpg', 1, '2015-10-27 06:13:01', '2015-10-27 06:13:01'),
(86, 5, 'nói', 0, '2015-10-27 06:13:29', '2015-10-27 06:13:29'),
(86, 6, 'apple', 1, '2015-10-27 06:14:43', '2015-10-27 06:14:43'),
(86, 7, 'nói', 1, '2015-10-27 06:13:22', '2015-10-27 06:13:22'),
(86, 8, 'imgboy2.jpg', 0, '2015-10-27 06:13:18', '2015-10-27 06:13:18'),
(86, 9, 'imgboy1.jpg', 0, '2015-10-27 06:13:15', '2015-10-27 06:13:15'),
(86, 10, 'imgwoman2.jpg', 0, '2015-10-27 06:14:46', '2015-10-27 06:14:46'),
(87, 11, 'bạn', 0, '2015-10-27 06:25:26', '2015-10-27 06:25:26'),
(87, 12, 'imgrice2.jpg', 0, '2015-10-27 06:19:43', '2015-10-27 06:19:43'),
(87, 13, 'bánh', 0, '2015-10-27 06:19:14', '2015-10-27 06:19:14'),
(87, 14, 'menu', 1, '2015-10-27 06:19:36', '2015-10-27 06:19:36'),
(87, 15, 'book-menu', 0, '2015-10-27 06:23:53', '2015-10-27 06:23:53'),
(87, 18, 'I', 0, '2015-10-27 06:19:25', '2015-10-27 06:19:25'),
(87, 19, 'he', 0, '2015-10-27 06:23:00', '2015-10-27 06:23:00'),
(87, 20, 'bánh', 0, '2015-10-27 06:19:48', '2015-10-27 06:19:48'),
(88, 13, 'bánh', 0, '2015-10-27 06:28:54', '2015-10-27 06:28:54'),
(88, 16, 'children', 1, '2015-10-27 06:29:14', '2015-10-27 06:29:14'),
(88, 18, 'I', 0, '2015-10-27 06:29:36', '2015-10-27 06:29:36'),
(89, 6, 'apples', 0, '2015-10-28 00:05:43', '2015-10-28 00:05:43'),
(89, 7, 'nói', 1, '2015-10-28 00:05:51', '2015-10-28 00:05:51'),
(89, 10, 'imgwoman2.jpg', 0, '2015-10-28 00:05:47', '2015-10-28 00:05:47'),
(91, 1, 'boy', 0, '2015-10-29 03:59:18', '2015-10-29 03:59:18'),
(91, 2, 'boy', 1, '2015-10-29 03:59:56', '2015-10-29 03:59:56'),
(91, 3, 'man', 0, '2015-10-29 03:59:30', '2015-10-29 03:59:30'),
(91, 4, 'imggirl4.jpg', 0, '2015-10-29 03:59:04', '2015-10-29 03:59:04'),
(91, 5, 'đi', 0, '2015-10-29 03:59:43', '2015-10-29 03:59:43'),
(91, 6, 'aple', 0, '2015-10-29 03:59:37', '2015-10-29 03:59:37'),
(91, 7, 'đọc', 0, '2015-10-29 03:58:47', '2015-10-29 03:58:47'),
(91, 8, 'imgboy4.jpg', 1, '2015-10-29 03:59:12', '2015-10-29 03:59:12'),
(91, 9, 'imgboy2.jpg', 0, '2015-10-29 03:59:49', '2015-10-29 03:59:49'),
(91, 10, 'imgwoman2.jpg', 0, '2015-10-29 03:59:24', '2015-10-29 03:59:24'),
(93, 3, 'boy', 0, '2015-10-29 04:07:43', '2015-10-29 04:07:43'),
(93, 7, 'đọc', 0, '2015-10-29 04:08:11', '2015-10-29 04:08:11'),
(94, 1, 'man', 0, '2015-10-29 04:09:29', '2015-10-29 04:09:29'),
(94, 3, 'woman', 1, '2015-10-29 04:09:05', '2015-10-29 04:09:05'),
(94, 4, 'imggirl2.jpg', 0, '2015-10-29 04:09:50', '2015-10-29 04:09:50'),
(94, 5, 'đi', 0, '2015-10-29 04:09:12', '2015-10-29 04:09:12'),
(94, 7, 'đọc', 0, '2015-10-29 04:09:38', '2015-10-29 04:09:38'),
(95, 5, 'nói', 0, '2015-10-29 04:13:18', '2015-10-29 04:13:18'),
(95, 9, 'imgboy4.jpg', 0, '2015-10-29 04:13:23', '2015-10-29 04:13:23'),
(96, 3, 'woman', 1, '2015-10-29 04:15:27', '2015-10-29 04:15:27'),
(96, 4, 'imggirl2.jpg', 0, '2015-10-29 04:15:43', '2015-10-29 04:15:43'),
(97, 2, 'boy', 1, '2015-10-29 04:17:43', '2015-10-29 04:17:43'),
(98, 2, 'boy', 1, '2015-10-29 04:18:50', '2015-10-29 04:18:50'),
(98, 8, 'imgboy2.jpg', 0, '2015-10-29 04:19:13', '2015-10-29 04:19:13'),
(99, 8, 'imgboy4.jpg', 1, '2015-10-29 04:20:14', '2015-10-29 04:20:14'),
(99, 10, 'imgwoman4.jpg', 0, '2015-10-29 04:20:07', '2015-10-29 04:20:07'),
(100, 1, 'boy', 0, '2015-10-29 04:22:17', '2015-10-29 04:22:17'),
(100, 9, 'imgboy4.jpg', 0, '2015-10-29 04:22:10', '2015-10-29 04:22:10'),
(101, 4, 'imggirl4.jpg', 0, '2015-10-29 04:23:39', '2015-10-29 04:23:39'),
(102, 3, 'man', 0, '2015-10-29 04:24:23', '2015-10-29 04:24:23'),
(103, 10, 'imgwoman2.jpg', 0, '2015-10-29 04:24:40', '2015-10-29 04:24:40'),
(104, 6, 'aple', 0, '2015-10-29 04:26:36', '2015-10-29 04:26:36'),
(105, 4, 'imggirl2.jpg', 0, '2015-10-29 04:27:39', '2015-10-29 04:27:39'),
(106, 5, 'ăn', 1, '2015-10-29 04:34:48', '2015-10-29 04:34:48'),
(106, 7, 'nói', 1, '2015-10-29 04:34:00', '2015-10-29 04:34:00'),
(107, 5, 'ăn', 1, '2015-10-29 04:35:03', '2015-10-29 04:35:03'),
(107, 6, 'aples', 0, '2015-10-29 04:35:32', '2015-10-29 04:35:32'),
(107, 8, 'imgboy2.jpg', 0, '2015-10-29 04:35:55', '2015-10-29 04:35:55'),
(108, 1, 'boy', 0, '2015-10-29 05:04:15', '2015-10-29 05:04:15'),
(108, 2, 'boy', 1, '2015-10-29 05:04:24', '2015-10-29 05:04:24'),
(108, 3, 'woman', 1, '2015-10-29 05:04:33', '2015-10-29 05:04:33'),
(108, 4, 'imggirl4.jpg', 0, '2015-10-29 05:04:09', '2015-10-29 05:04:09'),
(108, 5, 'nói', 0, '2015-10-29 05:04:05', '2015-10-29 05:04:05'),
(108, 6, 'aple', 0, '2015-10-29 05:04:28', '2015-10-29 05:04:28'),
(108, 7, 'đọc', 0, '2015-10-29 05:04:38', '2015-10-29 05:04:38'),
(108, 8, 'imgboy2.jpg', 0, '2015-10-29 05:04:42', '2015-10-29 05:04:42'),
(108, 9, 'imgboy2.jpg', 0, '2015-10-29 05:03:15', '2015-10-29 05:03:15'),
(108, 10, 'imgwoman2.jpg', 0, '2015-10-29 05:04:20', '2015-10-29 05:04:20'),
(109, 1, 'boy', 0, '2015-10-29 05:17:23', '2015-10-29 05:17:23'),
(109, 2, 'boy', 1, '2015-10-29 05:17:19', '2015-10-29 05:17:19'),
(109, 3, 'woman', 1, '2015-10-29 05:16:56', '2015-10-29 05:16:56'),
(109, 4, 'imggirl4.jpg', 0, '2015-10-29 05:16:51', '2015-10-29 05:16:51'),
(109, 5, 'nói', 0, '2015-10-29 05:17:15', '2015-10-29 05:17:15'),
(109, 6, 'apple', 1, '2015-10-29 05:16:44', '2015-10-29 05:16:44'),
(109, 7, 'hát', 0, '2015-10-29 05:17:03', '2015-10-29 05:17:03'),
(109, 8, 'imgboy4.jpg', 1, '2015-10-29 05:17:11', '2015-10-29 05:17:11'),
(109, 9, 'imgboy4.jpg', 0, '2015-10-29 05:17:00', '2015-10-29 05:17:00'),
(109, 10, 'imgwoman4.jpg', 0, '2015-10-29 05:17:08', '2015-10-29 05:17:08'),
(110, 1, 'boy', 0, '2015-10-29 05:21:33', '2015-10-29 05:21:33'),
(110, 2, 'boy', 1, '2015-10-29 05:21:38', '2015-10-29 05:21:38'),
(110, 3, 'woman', 1, '2015-10-29 05:21:52', '2015-10-29 05:21:52'),
(110, 4, 'imggirl4.jpg', 0, '2015-10-29 05:22:03', '2015-10-29 05:22:03'),
(110, 5, 'nói', 0, '2015-10-29 05:21:57', '2015-10-29 05:21:57'),
(110, 6, 'apple', 1, '2015-10-29 05:21:20', '2015-10-29 05:21:20'),
(110, 7, 'hát', 0, '2015-10-29 05:22:00', '2015-10-29 05:22:00'),
(110, 8, 'imgboy4.jpg', 1, '2015-10-29 05:21:48', '2015-10-29 05:21:48'),
(110, 9, 'imgboy4.jpg', 0, '2015-10-29 05:21:28', '2015-10-29 05:21:28'),
(110, 10, 'imgwoman4.jpg', 0, '2015-10-29 05:21:24', '2015-10-29 05:21:24'),
(111, 1, 'man--boy', 1, '2015-10-29 22:38:42', '2015-10-29 22:38:42'),
(111, 2, 'boy', 1, '2015-10-29 22:38:31', '2015-10-29 22:38:31'),
(111, 3, 'woman', 1, '2015-10-29 22:38:47', '2015-10-29 22:38:47'),
(111, 4, 'imggirl2.jpg', 0, '2015-10-29 22:38:35', '2015-10-29 22:38:35'),
(111, 5, 'ăn', 1, '2015-10-29 22:37:47', '2015-10-29 22:37:47'),
(111, 10, 'imgwoman2.jpg', 0, '2015-10-29 22:37:57', '2015-10-29 22:37:57'),
(112, 1, 'man--boy', 1, '2015-10-29 22:44:03', '2015-10-29 22:44:03'),
(112, 2, 'boy', 1, '2015-10-29 22:43:19', '2015-10-29 22:43:19'),
(112, 4, 'imggirl2.jpg', 0, '2015-10-29 22:43:23', '2015-10-29 22:43:23'),
(112, 5, 'ăn', 1, '2015-10-29 22:43:52', '2015-10-29 22:43:52'),
(112, 6, 'apple', 1, '2015-10-29 22:43:59', '2015-10-29 22:43:59'),
(112, 7, 'nói', 1, '2015-10-29 22:43:47', '2015-10-29 22:43:47'),
(112, 8, 'imgboy2.jpg', 0, '2015-10-29 22:43:56', '2015-10-29 22:43:56'),
(112, 10, 'imgwoman4.jpg', 0, '2015-10-29 22:43:28', '2015-10-29 22:43:28'),
(113, 1, 'man', 0, '2015-10-30 00:44:40', '2015-10-30 00:44:40'),
(113, 2, 'man', 0, '2015-10-30 00:44:35', '2015-10-30 00:44:35'),
(113, 3, 'woman', 1, '2015-10-30 00:44:32', '2015-10-30 00:44:32'),
(113, 4, 'imggirl2.jpg', 0, '2015-10-30 00:44:58', '2015-10-30 00:44:58'),
(113, 5, 'đi', 0, '2015-10-30 00:44:43', '2015-10-30 00:44:43'),
(113, 6, 'aple', 0, '2015-10-30 00:44:37', '2015-10-30 00:44:37'),
(113, 7, 'đọc', 0, '2015-10-30 00:44:46', '2015-10-30 00:44:46'),
(113, 8, 'imgboy2.jpg', 0, '2015-10-30 00:45:02', '2015-10-30 00:45:02'),
(113, 9, 'imgboy2.jpg', 0, '2015-10-30 00:44:54', '2015-10-30 00:44:54'),
(113, 10, 'imgwoman2.jpg', 0, '2015-10-30 00:44:49', '2015-10-30 00:44:49'),
(114, 1, 'man', 0, '2015-10-30 00:45:40', '2015-10-30 00:45:40'),
(114, 2, 'man', 0, '2015-10-30 00:45:44', '2015-10-30 00:45:44'),
(114, 3, 'woman', 1, '2015-10-30 00:45:49', '2015-10-30 00:45:49'),
(114, 4, 'imggirl2.jpg', 0, '2015-10-30 00:45:37', '2015-10-30 00:45:37'),
(114, 5, 'đi', 0, '2015-10-30 00:45:47', '2015-10-30 00:45:47'),
(114, 6, 'aple', 0, '2015-10-30 00:45:30', '2015-10-30 00:45:30'),
(114, 7, 'đọc', 0, '2015-10-30 00:45:52', '2015-10-30 00:45:52'),
(114, 8, 'imgboy2.jpg', 0, '2015-10-30 00:46:00', '2015-10-30 00:46:00'),
(114, 9, 'imgboy2.jpg', 0, '2015-10-30 00:45:56', '2015-10-30 00:45:56'),
(114, 10, 'imgwoman2.jpg', 0, '2015-10-30 00:45:33', '2015-10-30 00:45:33'),
(115, 1, 'man', 0, '2015-10-30 00:47:28', '2015-10-30 00:47:28'),
(115, 2, 'man', 0, '2015-10-30 00:47:53', '2015-10-30 00:47:53'),
(115, 3, 'woman', 1, '2015-10-30 00:47:55', '2015-10-30 00:47:55'),
(115, 4, 'imggirl2.jpg', 0, '2015-10-30 00:47:59', '2015-10-30 00:47:59'),
(115, 5, 'nói', 0, '2015-10-30 00:47:33', '2015-10-30 00:47:33'),
(115, 6, 'apple', 1, '2015-10-30 00:47:40', '2015-10-30 00:47:40'),
(115, 7, 'đọc', 0, '2015-10-30 00:47:46', '2015-10-30 00:47:46'),
(115, 8, 'imgboy2.jpg', 0, '2015-10-30 00:47:50', '2015-10-30 00:47:50'),
(115, 9, 'imgboy3.jpg', 1, '2015-10-30 00:47:37', '2015-10-30 00:47:37'),
(115, 10, 'imgwoman2.jpg', 0, '2015-10-30 00:47:44', '2015-10-30 00:47:44'),
(118, 1, 'man--boy', 1, '2015-10-30 02:35:28', '2015-10-30 02:35:28'),
(118, 2, 'man', 0, '2015-10-30 02:35:24', '2015-10-30 02:35:24'),
(118, 3, 'man', 0, '2015-10-30 02:35:40', '2015-10-30 02:35:40'),
(118, 4, 'imggirl2.jpg', 0, '2015-10-30 02:35:33', '2015-10-30 02:35:33'),
(118, 5, 'đi', 0, '2015-10-30 02:35:30', '2015-10-30 02:35:30'),
(118, 6, 'apple', 1, '2015-10-30 02:35:13', '2015-10-30 02:35:13'),
(118, 7, 'đọc', 0, '2015-10-30 02:35:43', '2015-10-30 02:35:43'),
(118, 8, 'imgboy2.jpg', 0, '2015-10-30 02:35:37', '2015-10-30 02:35:37'),
(118, 9, 'imgboy2.jpg', 0, '2015-10-30 02:35:17', '2015-10-30 02:35:17'),
(118, 10, 'imgwoman2.jpg', 0, '2015-10-30 02:35:21', '2015-10-30 02:35:21'),
(119, 1, 'man', 0, '2015-10-30 08:40:59', '2015-10-30 08:40:59'),
(119, 2, 'boy', 1, '2015-10-30 08:41:15', '2015-10-30 08:41:15'),
(119, 3, 'woman', 1, '2015-10-30 08:41:49', '2015-10-30 08:41:49'),
(119, 4, 'imggirl2.jpg', 0, '2015-10-30 08:40:06', '2015-10-30 08:40:06'),
(119, 5, 'ăn', 1, '2015-10-30 08:39:48', '2015-10-30 08:39:48'),
(119, 6, 'apple', 1, '2015-10-30 08:40:37', '2015-10-30 08:40:37'),
(119, 7, 'hát', 0, '2015-10-30 08:39:58', '2015-10-30 08:39:58'),
(119, 8, 'imgboy1.jpg', 0, '2015-10-30 08:41:34', '2015-10-30 08:41:34'),
(119, 9, 'imgboy4.jpg', 0, '2015-10-30 08:41:25', '2015-10-30 08:41:25'),
(119, 10, 'imgwoman2.jpg', 0, '2015-10-30 08:40:12', '2015-10-30 08:40:12'),
(120, 1, 'man--boy', 1, '2015-10-30 08:42:26', '2015-10-30 08:42:26'),
(120, 2, 'boy', 1, '2015-10-30 08:42:52', '2015-10-30 08:42:52'),
(120, 3, 'woman', 1, '2015-10-30 08:42:49', '2015-10-30 08:42:49'),
(120, 4, 'imggirl1.jpg', 1, '2015-10-30 08:42:31', '2015-10-30 08:42:31'),
(120, 5, 'ăn', 1, '2015-10-30 08:42:22', '2015-10-30 08:42:22'),
(120, 6, 'apple', 1, '2015-10-30 08:42:39', '2015-10-30 08:42:39'),
(120, 7, 'nói', 1, '2015-10-30 08:42:36', '2015-10-30 08:42:36'),
(120, 8, 'imgboy3.jpg', 0, '2015-10-30 08:42:45', '2015-10-30 08:42:45'),
(120, 9, 'imgboy4.jpg', 0, '2015-10-30 08:42:57', '2015-10-30 08:42:57'),
(120, 10, 'imgwoman3.jpg', 1, '2015-10-30 08:42:19', '2015-10-30 08:42:19'),
(121, 1, 'man--boy', 1, '2015-11-03 00:24:55', '2015-11-03 00:24:55'),
(121, 2, 'boy', 1, '2015-11-03 00:24:07', '2015-11-03 00:24:07'),
(121, 3, 'man', 0, '2015-11-03 00:24:35', '2015-11-03 00:24:35'),
(121, 4, 'imggirl2.jpg', 0, '2015-11-03 00:24:41', '2015-11-03 00:24:41'),
(121, 5, 'ăn', 1, '2015-11-03 00:24:51', '2015-11-03 00:24:51'),
(121, 6, 'apple', 1, '2015-11-03 00:24:58', '2015-11-03 00:24:58'),
(121, 7, 'nói', 1, '2015-11-03 00:24:18', '2015-11-03 00:24:18'),
(121, 8, 'imgboy1.jpg', 0, '2015-11-03 00:24:29', '2015-11-03 00:24:29'),
(121, 9, 'imgboy3.jpg', 1, '2015-11-03 00:24:24', '2015-11-03 00:24:24'),
(121, 10, 'imgwoman1.jpg', 0, '2015-11-03 00:24:46', '2015-11-03 00:24:46'),
(123, 10, 'imgwoman3.jpg', 1, '2015-11-10 00:37:02', '2015-11-10 00:37:02'),
(125, 1, 'man--boy', 1, '2015-11-10 01:27:32', '2015-11-10 01:27:32'),
(125, 2, 'boy', 1, '2015-11-10 01:27:12', '2015-11-10 01:27:12'),
(125, 3, 'woman', 1, '2015-11-10 01:27:35', '2015-11-10 01:27:35'),
(125, 5, 'ăn', 1, '2015-11-10 01:27:00', '2015-11-10 01:27:00'),
(125, 7, 'nói', 1, '2015-11-10 01:27:39', '2015-11-10 01:27:39'),
(125, 8, 'imgboy4.jpg', 1, '2015-11-10 01:27:08', '2015-11-10 01:27:08'),
(125, 10, 'imgwoman4.jpg', 0, '2015-11-10 01:27:16', '2015-11-10 01:27:16'),
(126, 1, 'man--boy', 1, '2015-11-10 01:29:52', '2015-11-10 01:29:52'),
(126, 2, 'boy', 1, '2015-11-10 01:29:48', '2015-11-10 01:29:48'),
(126, 3, 'woman', 1, '2015-11-10 01:29:35', '2015-11-10 01:29:35'),
(126, 4, 'girl.jpg', 1, '2015-11-10 01:30:03', '2015-11-10 01:30:03'),
(126, 5, 'ăn', 1, '2015-11-10 01:29:26', '2015-11-10 01:29:26'),
(126, 6, 'apple', 1, '2015-11-10 01:29:59', '2015-11-10 01:29:59'),
(126, 7, 'nói', 1, '2015-11-10 01:29:30', '2015-11-10 01:29:30'),
(126, 8, 'man.jpg', 1, '2015-11-10 01:30:08', '2015-11-10 01:30:08'),
(126, 9, 'boy.jpg', 1, '2015-11-10 01:29:41', '2015-11-10 01:29:41'),
(126, 10, 'apple.jpg', 0, '2015-11-10 01:30:17', '2015-11-10 01:30:17'),
(127, 14, 'menu', 1, '2015-11-10 01:54:50', '2015-11-10 01:54:50'),
(127, 18, 'I', 0, '2015-11-10 01:55:13', '2015-11-10 01:55:13'),
(127, 19, 'he', 0, '2015-11-10 01:31:23', '2015-11-10 01:31:23'),
(128, 13, 'bánh mì kẹp', 1, '2015-11-10 01:57:56', '2015-11-10 01:57:56'),
(128, 14, 'menu', 1, '2015-11-10 01:58:00', '2015-11-10 01:58:00'),
(128, 18, 'I eat rice', 1, '2015-11-10 01:56:40', '2015-11-10 01:56:40'),
(130, 11, 'bạn là một đứa trẻ', 1, '2015-11-10 02:05:56', '2015-11-10 02:05:56'),
(130, 12, 'rice.jpg', 1, '2015-11-10 02:06:06', '2015-11-10 02:06:06'),
(130, 13, 'bánh mì kẹp', 1, '2015-11-10 02:05:01', '2015-11-10 02:05:01'),
(130, 14, 'menu', 1, '2015-11-10 02:06:01', '2015-11-10 02:06:01'),
(130, 15, 'book', 1, '2015-11-10 02:05:29', '2015-11-10 02:05:29'),
(130, 16, 'children', 1, '2015-11-10 02:05:15', '2015-11-10 02:05:15'),
(130, 17, 'it is a newspaper', 0, '2015-11-10 02:05:39', '2015-11-10 02:05:39'),
(130, 18, 'I eat rice', 1, '2015-11-10 02:05:08', '2015-11-10 02:05:08'),
(130, 19, 'he reads a newspaper', 1, '2015-11-10 02:06:15', '2015-11-10 02:06:15'),
(130, 20, 'bánh mì', 1, '2015-11-10 02:05:11', '2015-11-10 02:05:11'),
(131, 22, 'how are you?', 1, '2015-11-10 02:06:30', '2015-11-10 02:06:30'),
(131, 30, 'buổi sáng', 1, '2015-11-10 02:06:36', '2015-11-10 02:06:36'),
(132, 21, 'hello-good evening', 0, '2015-11-10 02:10:02', '2015-11-10 02:10:02'),
(132, 22, 'how are you?', 1, '2015-11-10 02:07:09', '2015-11-10 02:07:09'),
(132, 23, 'i am sorry', 1, '2015-11-10 02:07:56', '2015-11-10 02:07:56'),
(132, 24, 'I am a boy', 1, '2015-11-10 02:07:18', '2015-11-10 02:07:18'),
(132, 25, 'i fine,thank you', 0, '2015-11-10 02:07:25', '2015-11-10 02:07:25'),
(132, 26, 'good night', 1, '2015-11-10 02:07:37', '2015-11-10 02:07:37'),
(132, 27, 'i love you', 1, '2015-11-10 02:07:06', '2015-11-10 02:07:06'),
(132, 28, 'i hate you', 1, '2015-11-10 02:07:13', '2015-11-10 02:07:13'),
(132, 29, 'i am not a boy', 1, '2015-11-10 02:07:48', '2015-11-10 02:07:48'),
(132, 30, 'buổi sáng', 1, '2015-11-10 02:07:41', '2015-11-10 02:07:41'),
(133, 21, 'good morning', 1, '2015-11-10 02:10:38', '2015-11-10 02:10:38'),
(133, 23, 'i am sorry', 1, '2015-11-10 02:10:13', '2015-11-10 02:10:13'),
(133, 24, 'I am a boy', 1, '2015-11-10 02:10:26', '2015-11-10 02:10:26'),
(133, 25, 'i fine,thank you', 0, '2015-11-10 02:10:29', '2015-11-10 02:10:29'),
(133, 27, 'i''m love you', 0, '2015-11-10 02:10:41', '2015-11-10 02:10:41'),
(133, 28, 'i hate you', 1, '2015-11-10 02:10:17', '2015-11-10 02:10:17'),
(133, 29, 'i am not a boy', 1, '2015-11-10 02:10:22', '2015-11-10 02:10:22'),
(133, 30, 'buổi sáng', 1, '2015-11-10 02:10:35', '2015-11-10 02:10:35'),
(137, 26, 'good night', 1, '2015-11-10 02:18:22', '2015-11-10 02:18:22'),
(137, 30, 'buổi sáng', 1, '2015-11-10 02:18:28', '2015-11-10 02:18:28'),
(138, 22, 'and you?', 0, '2015-11-10 02:20:32', '2015-11-10 02:20:32'),
(138, 23, 'i am sorry', 1, '2015-11-10 02:20:38', '2015-11-10 02:20:38'),
(138, 27, 'i love you', 1, '2015-11-10 02:20:28', '2015-11-10 02:20:28'),
(138, 29, 'i am not a girl', 0, '2015-11-10 02:20:35', '2015-11-10 02:20:35'),
(140, 25, 'i fine,thank you', 0, '2015-11-10 02:21:39', '2015-11-10 02:21:39'),
(145, 21, 'good morning', 1, '2015-11-10 02:28:16', '2015-11-10 02:28:16'),
(145, 23, 'i sorry', 0, '2015-11-10 02:27:55', '2015-11-10 02:27:55'),
(145, 24, 'I am a boy', 1, '2015-11-10 02:28:22', '2015-11-10 02:28:22'),
(145, 25, 'i fine,thank you', 0, '2015-11-10 02:27:58', '2015-11-10 02:27:58'),
(145, 26, 'good night', 1, '2015-11-10 02:28:19', '2015-11-10 02:28:19'),
(145, 27, 'i''m love you', 0, '2015-11-10 02:27:53', '2015-11-10 02:27:53'),
(145, 28, 'i love you', 0, '2015-11-10 02:28:10', '2015-11-10 02:28:10'),
(145, 29, 'i not a boy', 0, '2015-11-10 02:28:07', '2015-11-10 02:28:07'),
(145, 30, 'buổi trưa', 0, '2015-11-10 02:27:49', '2015-11-10 02:27:49'),
(146, 3, 'woman', 1, '2015-11-10 02:28:49', '2015-11-10 02:28:49'),
(146, 7, 'nói', 1, '2015-11-10 02:28:53', '2015-11-10 02:28:53'),
(147, 1, 'man--woman', 0, '2015-11-10 02:30:22', '2015-11-10 02:30:22'),
(147, 2, 'boy', 1, '2015-11-10 02:30:01', '2015-11-10 02:30:01'),
(147, 3, 'woman', 1, '2015-11-10 02:30:12', '2015-11-10 02:30:12'),
(147, 4, 'girl.jpg', 1, '2015-11-10 02:30:04', '2015-11-10 02:30:04'),
(147, 5, 'ăn', 1, '2015-11-10 02:29:56', '2015-11-10 02:29:56'),
(147, 7, 'nói', 1, '2015-11-10 02:30:08', '2015-11-10 02:30:08'),
(147, 8, 'man.jpg', 1, '2015-11-10 02:30:16', '2015-11-10 02:30:16'),
(147, 9, 'boy.jpg', 1, '2015-11-10 02:29:51', '2015-11-10 02:29:51'),
(147, 10, 'woman.jpg', 1, '2015-11-10 02:29:47', '2015-11-10 02:29:47'),
(148, 1, 'man--boy', 1, '2015-11-10 02:31:12', '2015-11-10 02:31:12'),
(148, 2, 'boy', 1, '2015-11-10 02:30:51', '2015-11-10 02:30:51'),
(148, 3, 'woman', 1, '2015-11-10 02:31:08', '2015-11-10 02:31:08'),
(148, 4, 'girl.jpg', 1, '2015-11-10 02:31:05', '2015-11-10 02:31:05'),
(148, 5, 'ăn', 1, '2015-11-10 02:31:16', '2015-11-10 02:31:16'),
(148, 6, 'apple', 1, '2015-11-10 02:30:44', '2015-11-10 02:30:44'),
(148, 7, 'nói', 1, '2015-11-10 02:30:58', '2015-11-10 02:30:58'),
(148, 8, 'man.jpg', 1, '2015-11-10 02:30:54', '2015-11-10 02:30:54'),
(148, 9, 'boy.jpg', 1, '2015-11-10 02:31:02', '2015-11-10 02:31:02'),
(148, 10, 'woman.jpg', 1, '2015-11-10 02:30:48', '2015-11-10 02:30:48'),
(149, 2, 'boy', 1, '2015-11-10 02:31:59', '2015-11-10 02:31:59'),
(149, 3, 'woman', 1, '2015-11-10 02:31:47', '2015-11-10 02:31:47'),
(149, 4, 'girl.jpg', 1, '2015-11-10 02:31:54', '2015-11-10 02:31:54'),
(149, 9, 'boy.jpg', 1, '2015-11-10 02:31:51', '2015-11-10 02:31:51'),
(149, 10, 'woman.jpg', 1, '2015-11-10 02:31:41', '2015-11-10 02:31:41'),
(151, 25, 'i am fine,thank you', 1, '2015-11-10 02:32:25', '2015-11-10 02:32:25'),
(154, 21, 'good morning', 1, '2015-11-10 02:50:11', '2015-11-10 02:50:11'),
(154, 22, 'how are you?', 1, '2015-11-10 02:49:40', '2015-11-10 02:49:40'),
(154, 23, 'i am sorry', 1, '2015-11-10 02:50:15', '2015-11-10 02:50:15'),
(154, 24, 'I am a boy', 1, '2015-11-10 02:49:49', '2015-11-10 02:49:49'),
(154, 25, 'i am fine,thank you', 1, '2015-11-10 02:50:05', '2015-11-10 02:50:05'),
(154, 26, 'good night', 1, '2015-11-10 02:49:36', '2015-11-10 02:49:36'),
(154, 27, 'i love you', 1, '2015-11-10 02:49:52', '2015-11-10 02:49:52'),
(154, 28, 'i hate you', 1, '2015-11-10 02:49:44', '2015-11-10 02:49:44'),
(154, 29, 'i am not a boy', 1, '2015-11-10 02:50:00', '2015-11-10 02:50:00'),
(154, 30, 'buổi sáng', 1, '2015-11-10 02:49:55', '2015-11-10 02:49:55');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `tagID` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quizID` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tagID`, `title`, `quizID`, `created_at`, `updated_at`) VALUES
(1, 'man', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'girl', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'boy', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'woman', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'apple', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'eat', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'speak', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'child', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'eat', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'book', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'she', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'drink', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'water', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'children', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'have', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'has', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'hello', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'morning', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'speak', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'sorry', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'hate', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'love', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'good night', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'yes', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'not', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'thanks', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'is', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'a', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'the', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'night', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'fish', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'wine', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'coffee', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'egg', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'chicken', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'plate', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 'lunch', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 'cheese', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'fruit', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 'orange', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 'sugar', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 'breakfast', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 'pasta', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 'juice', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 'beer', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 'beef', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 'strawberry', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 'tomato', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 'lemon', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 'food', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 'cat', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 'dog', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 'horse', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 'bird', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 'elephant', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 'duck', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 'turtle', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 'crab', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 'spider', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 'animal', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 'bear', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 'mouse', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 'cats', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 'dogs', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 'apples', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 'books', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 'newspapers', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 'horses', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 'elephants', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 'ducks', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 'turtles', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 'animals', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 'birds', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 'plates', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 'sandwiches', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 'his', 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 'her', 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 'my', 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 'its', 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 'their', 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 'our', 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 'your', 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 'rice', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 'sandwich', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 'menu', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 'newspaper', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 'bread', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 'you', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, 'am', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `genger` tinyint(4) NOT NULL DEFAULT '1',
  `dateOfBirth` date DEFAULT NULL,
  `placeOfBirth` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `userExp` int(11) NOT NULL DEFAULT '0',
  `userLevel` int(11) NOT NULL DEFAULT '1',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `role` tinyint(4) NOT NULL DEFAULT '2',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `genger`, `dateOfBirth`, `placeOfBirth`, `avatar`, `userExp`, `userLevel`, `active`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'bao', 'hoaibao@gmail.com', '$2y$10$KvgysAVYRC8nn1iIWfdyueXdbDTsfBbKnZQMbvInLeNbntDHvXTKu', 1, NULL, NULL, NULL, 35, 1, 1, 1, '6xn02sIptFNsBTe2Cncs6xdxXaXU9sRqQw8Tvo1seldvLdmD4CdYOnrNqZZL', '2015-10-20 23:26:16', '2015-11-10 02:57:51'),
(2, 'baokaka', 'bao@gmail.com', '$2y$10$HeDa6o8npVXeS.LPqFUQ/ucF4F2GMtx/KgM749nFrJxF2hp6gr9XS', 1, NULL, NULL, NULL, 0, 1, 1, 2, NULL, '2015-10-23 00:07:59', '2015-10-23 00:07:59'),
(3, 'baodeptria', 'baokaka@gmail.com', '$2y$10$gaOJVKG.V1iTCO2zcTFEs.YUNU69PpiDoCRxnOtnhudckd296QIqa', 1, NULL, NULL, NULL, 10, 1, 1, 2, 'KnUuxqeEADOwXVAUKxtA7q25fODiv7c5FcVAyePwdUNAPEbeZdVgMbxQW45K', '2015-11-10 02:36:06', '2015-11-10 02:51:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`levelid`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`questionID`),
  ADD KEY `questions_categoryid_foreign` (`categoryID`);

--
-- Indexes for table `questiontag`
--
ALTER TABLE `questiontag`
  ADD PRIMARY KEY (`questionID`,`tagID`),
  ADD KEY `questiontag_tagid_foreign` (`tagID`);

--
-- Indexes for table `quizs`
--
ALTER TABLE `quizs`
  ADD PRIMARY KEY (`quizID`),
  ADD KEY `quizs_categoryid_foreign` (`categoryID`);

--
-- Indexes for table `quizuser`
--
ALTER TABLE `quizuser`
  ADD PRIMARY KEY (`quizUserID`),
  ADD KEY `quizuser_quizid_foreign` (`quizID`),
  ADD KEY `quizuser_id_foreign` (`id`);

--
-- Indexes for table `quizuserquestion`
--
ALTER TABLE `quizuserquestion`
  ADD PRIMARY KEY (`quizUserID`,`questionID`),
  ADD KEY `quizuserquestion_questionid_foreign` (`questionID`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tagID`),
  ADD KEY `quizID` (`quizID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `levelid` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `questionID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT for table `quizs`
--
ALTER TABLE `quizs`
  MODIFY `quizID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `quizuser`
--
ALTER TABLE `quizuser`
  MODIFY `quizUserID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=156;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tagID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_categoryid_foreign` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`categoryID`);

--
-- Constraints for table `questiontag`
--
ALTER TABLE `questiontag`
  ADD CONSTRAINT `questiontag_questionid_foreign` FOREIGN KEY (`questionID`) REFERENCES `questions` (`questionID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `questiontag_tagid_foreign` FOREIGN KEY (`tagID`) REFERENCES `tags` (`tagID`);

--
-- Constraints for table `quizs`
--
ALTER TABLE `quizs`
  ADD CONSTRAINT `quizs_categoryid_foreign` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`categoryID`);

--
-- Constraints for table `quizuser`
--
ALTER TABLE `quizuser`
  ADD CONSTRAINT `quizuser_id_foreign` FOREIGN KEY (`id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `quizuser_quizid_foreign` FOREIGN KEY (`quizID`) REFERENCES `quizs` (`quizID`);

--
-- Constraints for table `quizuserquestion`
--
ALTER TABLE `quizuserquestion`
  ADD CONSTRAINT `quizuserquestion_questionid_foreign` FOREIGN KEY (`questionID`) REFERENCES `questions` (`questionID`),
  ADD CONSTRAINT `quizuserquestion_quizuserid_foreign` FOREIGN KEY (`quizUserID`) REFERENCES `quizuser` (`quizUserID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
