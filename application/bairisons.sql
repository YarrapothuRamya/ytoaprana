-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2021 at 12:59 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bairisons`
--

-- --------------------------------------------------------

--
-- Table structure for table `bi_districts`
--

DROP TABLE IF EXISTS `bi_districts`;
CREATE TABLE `bi_districts` (
  `dt_id` int(5) NOT NULL,
  `dt_name` varchar(250) NOT NULL,
  `dt_abbrev` varchar(200) NOT NULL,
  `dt_state_id` int(3) NOT NULL,
  `dt_status` int(1) NOT NULL DEFAULT '1',
  `dt_added_by` int(5) NOT NULL,
  `dt_added_date` datetime NOT NULL,
  `dt_updated_by` int(5) NOT NULL,
  `dt_updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bi_districts`
--

INSERT INTO `bi_districts` (`dt_id`, `dt_name`, `dt_abbrev`, `dt_state_id`, `dt_status`, `dt_added_by`, `dt_added_date`, `dt_updated_by`, `dt_updated_date`) VALUES
(3, 'Krishna', 'krishna', 4, 1, 1, '2021-05-14 10:48:21', 0, '0000-00-00 00:00:00'),
(4, 'Test123', 'Test123', 5, 2, 1, '2021-05-14 10:51:39', 1, '2021-05-14 10:53:59');

-- --------------------------------------------------------

--
-- Table structure for table `bi_gallery`
--

DROP TABLE IF EXISTS `bi_gallery`;
CREATE TABLE `bi_gallery` (
  `va_id` int(5) NOT NULL,
  `va_cat_id` int(4) NOT NULL,
  `va_title` varchar(100) NOT NULL,
  `va_path` varchar(150) NOT NULL,
  `va_status` tinyint(1) NOT NULL DEFAULT '1',
  `va_order_by` int(4) NOT NULL,
  `va_added_by` int(5) NOT NULL,
  `va_added_date` datetime NOT NULL,
  `va_updated_by` int(5) NOT NULL,
  `va_updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bi_gallery`
--

INSERT INTO `bi_gallery` (`va_id`, `va_cat_id`, `va_title`, `va_path`, `va_status`, `va_order_by`, `va_added_by`, `va_added_date`, `va_updated_by`, `va_updated_date`) VALUES
(1, 1, 'Devadhayashakaki Aasthana Jyothishuni Sevalu Aavasaram Sharath Babu', '556964_1575883553.jpg', 2, 0, 1, '2019-10-25 11:19:14', 1, '2019-12-12 14:16:19'),
(9, 1, 'Goshala Abhivrudhi Medha Dhrushti Saarimchali', '963583_1575883677.jpg', 2, 1, 1, '2019-10-25 14:17:52', 1, '2019-12-12 14:16:14'),
(10, 1, 'Vasthu Rithya Aalayam Lo Marpulu', '37496_1575883792.jpg', 2, 2, 1, '2019-10-25 14:17:52', 1, '2019-12-12 14:16:07'),
(11, 2, 'Prachinakalam nundi Jyothisham pramukyatha', '349291_1575875091.jpg', 2, 1, 1, '2019-10-25 14:22:03', 1, '2019-12-12 13:32:32'),
(12, 2, 'Srisaila Devasthana Abhivrudhiki Suchanalu', '621025_1575875288.jpg', 2, 2, 1, '2019-10-28 14:15:02', 1, '2019-12-12 13:33:07'),
(13, 3, 'Title12', '580538_1573023610.jpg', 2, 1, 1, '2019-11-05 14:43:16', 1, '2019-12-09 09:16:53'),
(14, 3, 'test 123', '156875_1573022277.jpg', 2, 2, 1, '2019-11-05 15:37:14', 1, '2019-12-19 10:15:58'),
(15, 3, 'test', '487626_1573033133.jpg', 2, 3, 2, '2019-11-06 15:07:52', 2, '2019-12-09 09:16:59'),
(16, 1, 'à°¶à±à°°à±€à°¶à±ˆà°² à°¦à±‡à°µà°¸à±à°¥à°¾à°¨ à°—à±‹à°¶à°¾à°²à°²à±‹ à°—à±‹à°µà±à°²à°¤à±‹ 2017', '344841_1575883837.jpg', 1, 3, 1, '2019-11-21 18:47:14', 2, '2019-12-14 02:35:04'),
(17, 2, 'Pujyam Viswanath Sevaalu Prasamsaniyam', '587060_1575875602.jpg', 2, 3, 1, '2019-12-09 12:43:22', 0, '2019-12-12 13:34:00'),
(18, 2, 'Durga Temple Aasthana Jyothishulu Pujyam viswanath', '655072_1575875836.jpg', 2, 4, 1, '2019-12-09 12:47:16', 0, '2019-12-12 13:33:27'),
(19, 2, 'Vidya Abhivrudhiki maha saraswati yaagaalu', '287224_1575876059.jpg', 2, 5, 1, '2019-12-09 12:50:59', 0, '2019-12-12 13:33:33'),
(20, 2, 'Ksheera Rama Lingeshwara Kshetram Lo Siddhi Sankalpa Yagam', '63900_1575876586.jpg', 2, 6, 1, '2019-12-09 12:59:46', 0, '2019-12-12 13:34:18'),
(21, 2, 'Bhusthapam Tho Kosthaku Muppu 2016', '722492_1575876798.jpg', 1, 7, 1, '2019-12-09 13:03:18', 2, '2019-12-19 19:50:30'),
(22, 2, 'Viswanath Presents god vignesha Chitrapatam to CM', '822680_1575879656.jpg', 2, 8, 1, '2019-12-09 13:50:56', 0, '2019-12-12 13:31:40'),
(23, 2, 'Sudarshana Narasimha Yagam Prarambham', '408807_1575879873.jpg', 2, 9, 1, '2019-12-09 13:54:33', 0, '2019-12-12 13:31:30'),
(24, 2, 'Rastra Abhivrudhi ki Maha Rudra Yagam', '377547_1575880068.jpg', 2, 10, 1, '2019-12-09 13:57:48', 0, '2019-12-12 13:31:07'),
(25, 2, 'Omanni Nirvahistunna Pujyam Viswanath', '245255_1575880373.jpg', 2, 11, 1, '2019-12-09 14:02:23', 1, '2019-12-12 13:31:17'),
(26, 2, 'Appriciation 2018', '219247_1575880592.jpg', 1, 12, 1, '2019-12-09 14:05:50', 2, '2019-12-19 19:49:53'),
(27, 2, 'June 10 Nunchi August 13 Varaku Bhari varshalu 2018', '965401_1575880989.jpg', 1, 13, 1, '2019-12-09 14:13:09', 2, '2019-12-19 19:47:47'),
(28, 2, ' Viswanath said Jyothisyam about Weather 2019', '666080_1575881242.jpg', 1, 14, 1, '2019-12-09 14:17:22', 2, '2019-12-19 19:46:45'),
(29, 2, 'Bhaari Varshalu Pade Avakasam 2019', '671589_1575881416.jpg', 1, 15, 1, '2019-12-09 14:20:16', 2, '2019-12-19 19:45:59'),
(30, 2, 'Prachina Jyothishya Sastram Goppatanam 2019', '866614_1575881610.jpg', 1, 16, 1, '2019-12-09 14:23:30', 2, '2019-12-19 19:44:39'),
(31, 2, 'Appanna Aalaya Vaibhavam Kosam Suchanalu', '136180_1575881796.jpg', 2, 17, 1, '2019-12-09 14:26:36', 0, '2019-12-13 06:00:21'),
(32, 2, 'Viswanath About Pakistan,Turkey And Iran 2019', '102281_1575881968.jpg', 1, 18, 1, '2019-12-09 14:29:28', 2, '2019-12-19 18:53:43'),
(33, 2, 'Karnataka Lo Kumara Swamy Bhavithavyam', '86471_1575882053.jpg', 2, 19, 1, '2019-12-09 14:30:53', 0, '2019-12-12 13:35:32'),
(34, 2, 'Aadhunika Bharathadesam Lonu Jyothisyam Panichestundi', '882798_1575882199.jpg', 2, 20, 1, '2019-12-09 14:33:19', 0, '2019-12-12 12:48:14'),
(35, 2, 'Pakistan ni Vanikinchina Penu Bhukampam  2019', '530996_1575882413.jpg', 1, 21, 1, '2019-12-09 14:36:53', 2, '2019-12-19 19:43:28'),
(36, 2, 'Indian Space Research Organisation', '778437_1575882527.jpg', 2, 22, 1, '2019-12-09 14:38:47', 0, '2019-12-12 12:43:14'),
(37, 2, ' Viswanath Told About Pani Tufan 2019', '45355_1575882677.jpg', 1, 23, 1, '2019-12-09 14:41:17', 2, '2019-12-19 19:43:06'),
(38, 2, 'Viswanath Said About PSLV C45 2019', '619085_1575882849.jpg', 1, 24, 1, '2019-12-09 14:44:09', 2, '2019-12-19 19:41:51'),
(39, 1, 'à°®à±à°–à±à°¯à°®à°‚à°¤à±à°°à°¿ à°—à°¾à°°à°¿à°¤à±‹ à°®à±€à°Ÿà°¿à°‚à°—à± 2016', '665126_1575883889.jpg', 1, 4, 1, '2019-12-09 15:01:29', 2, '2019-12-14 02:32:33'),
(40, 1, 'à°¶à±à°°à±€à°¶à±ˆà°²à°‚à°²à±‹ à°®à°¹à°¾à°ªà±à°°à°¦à±‹à°· à°‰à°¤à±à°¸à°µà°‚ 2018', '143366_1575883967.jpg', 1, 5, 1, '2019-12-09 15:02:47', 2, '2019-12-14 02:34:03'),
(41, 1, 'à°¶à±à°°à±€à°¶à±ˆà°² à°¦à±‡à°µà°¸à±à°¥à°¾à°¨à°‚ à°²à±‹ 2017', '317173_1575884045.jpg', 1, 6, 1, '2019-12-09 15:04:05', 2, '2019-12-14 02:34:38'),
(42, 1, 'à°¸à°¿à°‚à°¹à°¾à°šà°²à°‚à°²à±‹ à°¸à±à°¦à°°à±à°¶à°¨ à°¯à°¾à°—à°‚ 2017', '23807_1575884093.jpg', 1, 7, 1, '2019-12-09 15:04:53', 2, '2019-12-14 02:28:25'),
(43, 1, 'à°°à°˜à±à°°à°¾à°® à°•à±ƒà°·à±à°£à°‚à°°à°¾à°œà± à°—à°¾à°°à°¿à°¤à±‹', '765182_1575884145.jpg', 1, 8, 1, '2019-12-09 15:05:45', 2, '2019-12-14 02:27:46'),
(44, 1, 'à°•à±ƒà°·à±à°£à°¾ à°ªà±à°·à±à°•à°°à°¾à°²à± 2016 ', '538747_1575884187.jpg', 1, 9, 1, '2019-12-09 15:06:27', 2, '2019-12-14 02:24:52'),
(45, 1, 'à°•à±ƒà°·à±à°£à°¾ à°ªà±à°·à±à°•à°°à°¾à°²à± 2016 à°²à±‹', '188842_1575884229.jpg', 1, 10, 1, '2019-12-09 15:07:09', 2, '2019-12-14 02:23:39'),
(46, 1, '2013à°ªà°¾à°¦à°¯à°¾à°¤à±à°°à°²à±‹à°šà°‚à°¦à±à°°à°¬à°¾à°¬à±à°—à°¾à°°à°¿à°¤à±‹à°¸à°¨à±à°®à°¾à°¨à°‚', '490467_1575884278.jpg', 1, 11, 1, '2019-12-09 15:07:58', 2, '2019-12-14 02:22:35'),
(47, 1, 'à°¸à°‚à°ªà±‚à°°à±à°£ à°¸à±à°µà°°à±à°£à°•à°µà°š à°¸à°®à°°à±à°ªà°£ à°®à°¹à±‹à°¤à±à°¸à°µà°‚', '453602_1575884331.jpg', 1, 12, 1, '2019-12-09 15:08:51', 2, '2019-12-14 02:11:24'),
(48, 1, 'à°®à±à°–à±à°¯à°®à°‚à°¤à±à°°à°¿ à°—à°¾à°°à°¿à°¤à±‹ à°®à±€à°Ÿà°¿à°‚à°—à±à°²à±‹ 2016', '744419_1575884373.jpg', 1, 13, 1, '2019-12-09 15:09:33', 2, '2019-12-14 02:08:13'),
(49, 1, 'à°®à±à°–à±à°¯à°®à°‚à°¤à±à°°à°¿ à°—à°¾à°°à°¿à°¤à±‹ 2016', '676520_1575884429.jpg', 1, 14, 1, '2019-12-09 15:10:29', 2, '2019-12-14 02:05:51'),
(50, 1, 'à°¸à°‚à°ªà±‚à°°à±à°£ à°¸à±à°µà°°à±à°£à°•à°µà°š à°¸à°®à°°à±à°ªà°£ à°®à°¹à±‹à°¤à±à°¸à°µà°‚ 2016', '94549_1575884474.jpg', 1, 15, 1, '2019-12-09 15:11:12', 2, '2019-12-14 02:03:00'),
(51, 1, 'à°¬à°¾à°²à±€à°µà±à°¡à± à°¸à°¿à°¨à±€ à°¨à°Ÿà°¿ à°—à±Œà°¤à°®à°¿ 2019', '337923_1575884523.jpg', 1, 16, 1, '2019-12-09 15:12:02', 2, '2019-12-14 02:01:37'),
(52, 1, 'à°ªà°¦à°µà±€ à°¸à±à°µà±€à°•à°¾à°° à°®à°¹à±‹à°¤à±à°¸à°µà°‚ 2016 march', '479169_1575884566.jpg', 1, 17, 1, '2019-12-09 15:12:46', 2, '2019-12-13 22:36:19'),
(53, 1, '2014  à°¸à±€à°Žà°‚ à°šà°‚à°¦à±à°°à°¬à°¾à°¬à± à°¨à°¾à°¯à±à°¡à± ', '875829_1575884603.jpg', 1, 18, 1, '2019-12-09 15:13:23', 2, '2019-12-13 22:33:52'),
(54, 1, 'à°¬à°¾à°¹à±à°¬à°²à°¿ cinema à°°à°šà°¯à°¿à°¤ à°µà°¿à°œà°¯à±‡à°‚à°¦à±à°°à°ªà±à°°à°¸à°¾à°¦à±', '132968_1575884655.jpg', 1, 19, 1, '2019-12-09 15:14:15', 2, '2019-12-14 02:39:28'),
(55, 1, '2017 à°‰à°—à°¾à°¦à°¿ à°‰à°¤à±à°¸à°µà°¾à°²à± à°¸à±€à°Žà°‚ à°šà°‚à°¦à±à°°à°¬à°¾à°¬à± ', '401790_1575884701.jpg', 1, 20, 1, '2019-12-09 15:15:01', 2, '2019-12-13 22:28:07'),
(56, 1, 'à°ªà°¦à°µà±€ à°¸à±à°µà±€à°•à°¾à°° à°®à°¹à±‹à°¤à±à°¸à°µà°‚ 2016', '822021_1575884769.jpg', 1, 21, 1, '2019-12-09 15:16:08', 2, '2019-12-13 22:26:14'),
(57, 1, 'à°¬à°‚à°¡à°¿ à°ªà°¾à°°à±à°¥à°¸à°¾à°°à°¥à°¿ à°°à±†à°¡à±à°¡à°¿ à°—à°¾à°°à°¿à°¤à±‹ 2016', '566387_1575884819.jpg', 1, 22, 1, '2019-12-09 15:16:59', 2, '2019-12-14 02:10:16'),
(58, 4, 'Karnataka lo Kumaraswamy Bhavitavyam', '636567_1575957249.jpg', 2, 1, 1, '2019-12-10 11:24:08', 0, '2019-12-12 15:40:53'),
(59, 4, 'Pujyam Viswanath About GSAT 6A', '273274_1575957411.jpg', 2, 2, 1, '2019-12-10 11:26:51', 2, '2019-12-12 15:40:49'),
(60, 4, 'Pedai Toofan Gamanam Anchana', '186010_1575958080.jpg', 2, 3, 1, '2019-12-10 11:38:00', 0, '2019-12-12 15:41:03'),
(61, 4, 'Durgamma Ku Swarna Kavacham', '670864_1575958195.jpg', 2, 4, 1, '2019-12-10 11:39:55', 0, '2019-12-12 15:41:08'),
(62, 4, 'Durgamma ku Hetero swarnabharanalu', '368543_1575958336.jpg', 2, 5, 1, '2019-12-10 11:42:16', 0, '2019-12-12 15:41:11'),
(63, 4, 'Swarna Kavachalakruta Durga Devi ', '773912_1575958527.jpg', 2, 6, 1, '2019-12-10 11:45:27', 0, '2019-12-12 15:41:15'),
(64, 4, 'Swarna Kavachalakruta Durga Devi Darshanam', '735810_1575958704.jpg', 2, 7, 1, '2019-12-10 11:48:24', 0, '2019-12-12 15:41:18'),
(65, 3, 'rituals for agriculture 2018', '919123_1576155446.jpg', 1, 4, 2, '2019-12-12 18:27:26', 2, '2019-12-19 22:34:43'),
(66, 3, 'à°à°à°Žà°¸à± à°…à°§à°¿à°•à°¾à°°à°¿ à°­à°°à°¤à± à°—à±à°ªà±à°¤à°¾ à°ªà±à°°à°¸à°‚à°¶à°²à± 2018', '684725_1576156524.jpg', 1, 5, 2, '2019-12-12 18:45:24', 2, '2019-12-19 22:33:24'),
(67, 3, ' à°ªà±à°°à°¸à°‚à°¶à°²à± 2018', '358202_1576157944.jpg', 1, 6, 2, '2019-12-12 19:09:04', 2, '2019-12-19 22:32:41'),
(68, 3, ' à°ªà±à°°à°¸à°‚à°¶à°²à± 2019', '564820_1576157944.jpg', 1, 7, 2, '2019-12-12 19:09:04', 2, '2019-12-19 22:32:21'),
(69, 3, 'kumaraswamy cm 2018', '67319_1576158016.jpg', 1, 8, 2, '2019-12-12 19:10:16', 2, '2019-12-19 22:29:55'),
(70, 3, 'rudra yagam srisailam 2018', '846170_1576158016.jpg', 1, 9, 2, '2019-12-12 19:10:16', 2, '2019-12-19 22:28:10'),
(71, 3, 'saraswathi yagam 2016', '425795_1576158139.jpg', 1, 10, 2, '2019-12-12 19:12:19', 2, '2019-12-19 22:27:45'),
(72, 3, 'siddha sankalpam 2016', '453415_1576158139.jpg', 1, 11, 2, '2019-12-12 19:12:19', 2, '2019-12-19 22:26:10'),
(73, 3, 'simhachalam vastu 2017', '856591_1576158246.jpg', 1, 12, 2, '2019-12-12 19:14:06', 2, '2019-12-19 22:25:52'),
(74, 3, 'sudarshan yaga 2019', '232317_1576158246.jpg', 1, 13, 2, '2019-12-12 19:14:06', 2, '2019-12-19 22:25:32'),
(75, 3, 'vinayaka cm 2016', '67514_1576158297.jpg', 1, 14, 2, '2019-12-12 19:14:57', 2, '2019-12-19 22:24:33'),
(76, 3, 'complete sudharshana yagam 2019', '785557_1576158613.jpg', 1, 15, 2, '2019-12-12 19:20:13', 2, '2019-12-19 22:23:56'),
(77, 3, 'à°¸à°¿à°¨à°¿à°®à°¾ à°¯à°¾à°•à±à°Ÿà°°à± à°¶à°°à°¤à± à°¬à°¾à°¬à± à°ªà±à°°à°¶à°‚à°¸à°²à± 2019', '321996_1576160354.jpg', 1, 16, 2, '2019-12-12 19:49:14', 2, '2019-12-19 22:22:50'),
(78, 3, 'à°¶à±à°°à±€à°¶à±ˆà°²à°‚ à°µà°¾à°¸à±à°¤à± 2017', '580701_1576160354.jpg', 1, 17, 2, '2019-12-12 19:49:14', 2, '2019-12-19 22:22:24'),
(79, 3, 'à°¶à±à°°à±€à°¶à±ˆà°²à°‚ à°—à±‹à°¶à°¾à°² 2018', '668578_1576160426.jpg', 1, 18, 2, '2019-12-12 19:50:26', 2, '2019-12-19 22:21:54'),
(80, 4, ' PSLV C- 48 à°‰à°ªà°—à±à°°à°¹ à°µà°¾à°¹à°•à°¨à±Œà°• à°—à±à°°à°¾à°‚à°¡à± à°¸à°•à±à°¸à±†à°¸à±', '833403_1576165726.jpeg', 2, 8, 2, '2019-12-12 21:16:59', 2, '2019-12-13 06:45:14'),
(81, 3, 'GREAT Pournami Festival in Indrakeeladri 2016', '323199_1576173363.jpg', 1, 19, 2, '2019-12-12 23:26:03', 2, '2019-12-19 22:21:12'),
(82, 4, 'PSLV C-48 SUCCESSFUL', '884887_1576217738.jpg', 2, 9, 2, '2019-12-13 11:45:38', 0, '2020-10-08 07:22:09'),
(83, 4, 'supreme court cancelled all revies', '702988_1576218397.jpg', 2, 10, 2, '2019-12-13 11:56:37', 0, '2020-10-08 07:21:58'),
(84, 4, 'juttiga temple', '14359_1576218592.jpg', 2, 11, 2, '2019-12-13 11:59:52', 0, '2020-01-17 07:55:55'),
(85, 4, 'PSLV C-48  grand SUCCESSFUL', '784718_1576219503.jpg', 2, 12, 2, '2019-12-13 12:15:03', 0, '2019-12-13 15:47:08'),
(86, 3, 'petai tufan', '816094_1576220205.jpg', 2, 20, 2, '2019-12-13 12:26:45', 1, '2019-12-18 18:23:01'),
(87, 3, 'pornami maha puja 2016', '340120_1576220205.jpg', 1, 21, 2, '2019-12-13 12:26:45', 2, '2019-12-19 22:19:46'),
(88, 2, 'petai tufan 2018', '216957_1576220394.jpg', 1, 25, 2, '2019-12-13 12:29:54', 2, '2019-12-19 19:40:32'),
(89, 2, 'Gsat 6A 2018', '285500_1576220500.jpg', 1, 26, 2, '2019-12-13 12:31:40', 2, '2019-12-19 19:39:54'),
(90, 4, 'à°­à±€à°®à°µà°°à°‚  à°­à±€à°®à±‡à°¶à±à°µà°° à°¸à±à°µà°¾à°®à°¿ à°¦à±‡à°µà°¸à±à°¥à°¾à°¨à°‚', '127411_1576226495.jpg', 2, 13, 2, '2019-12-13 14:11:35', 2, '2020-01-17 07:55:34'),
(91, 4, 'Ram madhav garu', '259230_1576227137.jpg', 2, 14, 2, '2019-12-13 14:22:17', 0, '2020-01-17 07:55:25'),
(92, 4, 'à°ªà°‚à°šà°¾à°°à°¾à°® à°•à±à°·à±‡à°¤à±à°°à°‚ à°­à±€à°®à°µà°°à°‚ à°¶à°¿à°µà°¾à°²à°¯à°‚ à°²à±‹', '459354_1576227461.jpg', 2, 15, 2, '2019-12-13 14:27:41', 0, '2020-01-17 07:55:17'),
(93, 4, 'mavullamma temple bhimavaram', '383206_1576228776.jpg', 2, 16, 2, '2019-12-13 14:49:36', 0, '2020-01-17 07:55:41'),
(94, 4, 'à°ªà°‚à°šà°¾à°°à°¾à°® à°•à±à°·à±‡à°¤à±à°°à°‚ à°ªà°¾à°²à°•à±Šà°²à±à°²à±', '989986_1576229264.jpg', 2, 17, 2, '2019-12-13 14:57:44', 0, '2020-01-08 17:13:41'),
(95, 4, 'à°ªà°‚à°šà°¾à°°à°¾à°® à°•à±à°·à±‡à°¤à±à°°à°‚ à°­à±€à°®à°µà°°à°‚', '251893_1576229633.jpg', 2, 18, 2, '2019-12-13 15:03:53', 0, '2020-01-17 07:55:05'),
(96, 2, 'Govt of A.P Appriciation 2019', '191124_1576229951.jpg', 1, 27, 2, '2019-12-13 15:09:11', 2, '2019-12-19 19:38:39'),
(97, 2, 'NASA Solar parker probe  2018', '576816_1576230110.jpg', 1, 28, 2, '2019-12-13 15:11:50', 2, '2019-12-19 18:55:15'),
(98, 3, 'prediction 2018', '726814_1576230393.jpg', 1, 22, 2, '2019-12-13 15:16:33', 2, '2019-12-19 22:18:59'),
(99, 3, 'Maha Pournami Puja 2017', '503523_1576231307.jpg', 1, 23, 2, '2019-12-13 15:31:46', 2, '2019-12-19 22:17:38'),
(100, 3, 'à°ªà±à°°à°¶à°‚à°¸à°²à± 2018', '858307_1576231807.jpg', 1, 24, 2, '2019-12-13 15:40:07', 2, '2019-12-19 22:16:43'),
(101, 3, 'tripurantakam 2018', '731934_1576232178.jpg', 1, 25, 2, '2019-12-13 15:46:18', 2, '2019-12-19 22:15:53'),
(102, 4, 'ISRO PSLV C-48  grand SUCCESSFULL', '248429_1576252178.jpg', 2, 19, 2, '2019-12-13 21:19:38', 0, '2020-10-08 07:21:44'),
(103, 3, 'Test_media_gal', '607142_1576652789.jpg', 2, 26, 1, '2019-12-18 12:36:29', 0, '2019-12-18 07:06:47'),
(104, 3, 'Green Temples 2018', '381056_1576735590.jpg', 1, 27, 2, '2019-12-19 11:36:30', 2, '2019-12-19 22:14:55'),
(105, 3, 'antervedi temple visit 2017', '427131_1576735856.jpg', 1, 28, 2, '2019-12-19 11:40:56', 2, '2019-12-19 22:14:26'),
(106, 3, 'antervedi temple visit1', '973098_1576735856.jpg', 2, 29, 2, '2019-12-19 11:40:56', 0, '2019-12-19 06:12:28'),
(107, 3, 'vastu of simhachalam temple 2017', '263644_1576736071.jpg', 1, 30, 2, '2019-12-19 11:44:31', 2, '2019-12-19 22:13:55'),
(108, 3, 'Maha Rudra Yagam in SRISAILAM', '24912_1576736071.jpg', 2, 31, 2, '2019-12-19 11:44:31', 0, '2019-12-19 10:12:46'),
(109, 3, 'Rudra Yagam1 2019', '135658_1576736346.jpg', 1, 32, 2, '2019-12-19 11:49:06', 2, '2019-12-19 22:12:18'),
(110, 3, 'sudarshan yagam in simhachalam 2019', '112620_1576736346.jpg', 1, 33, 2, '2019-12-19 11:49:06', 2, '2019-12-19 22:10:34'),
(111, 3, 'srisailam 2018', '975716_1576736567.jpg', 1, 34, 2, '2019-12-19 11:52:47', 2, '2019-12-19 22:09:55'),
(112, 3, 'ARUNA YAGAM IN ARASAVALLI 2019', '10249_1576736567.jpg', 1, 35, 2, '2019-12-19 11:52:47', 2, '2019-12-19 22:09:17'),
(113, 3, 'about samhithas 2016', '492001_1576737061.png', 1, 36, 2, '2019-12-19 12:01:01', 2, '2019-12-19 22:08:41'),
(114, 3, 'maha ganapathi homam 2016', '759193_1576737061.jpg', 1, 37, 2, '2019-12-19 12:01:01', 2, '2019-12-19 22:07:46'),
(115, 3, 'saraswathi yagam in bvrm 2016', '738972_1576737476.jpg', 1, 38, 2, '2019-12-19 12:07:56', 2, '2019-12-19 22:07:02'),
(116, 3, 'saraswathi yagam pithapuram 2016', '811426_1576737476.jpg', 1, 39, 2, '2019-12-19 12:07:56', 2, '2019-12-19 22:06:42'),
(117, 3, 'saraswathi yagam in pithapuram 2016', '884530_1576737918.jpg', 1, 40, 2, '2019-12-19 12:15:18', 2, '2019-12-19 22:06:04'),
(118, 3, 'maha ganapathi homam in draksharamam 2016', '670448_1576737918.jpg', 1, 41, 2, '2019-12-19 12:15:18', 2, '2019-12-19 21:52:01'),
(119, 3, 'sudarshan yagam 2019', '421166_1576738035.jpg', 1, 42, 2, '2019-12-19 12:17:15', 2, '2019-12-19 21:50:50'),
(120, 3, 'Green Temples in AP', '846595_1576738035.jpg', 2, 43, 2, '2019-12-19 12:17:15', 0, '2019-12-19 07:11:56'),
(121, 3, 'Green Temples concept 2018', '308221_1576739712.jpg', 1, 44, 2, '2019-12-19 12:45:12', 2, '2019-12-19 21:49:51'),
(122, 2, 'PSLV C-48  grand SUCCESS 2019', '410742_1576740064.jpg', 1, 29, 2, '2019-12-19 12:51:02', 2, '2019-12-19 18:54:43'),
(123, 3, 'viswanath predictions 2', '224157_1576749884.jpg', 1, 45, 2, '2019-12-19 15:34:44', 0, '2019-12-19 10:04:44'),
(124, 3, 'viswanath predictions 1', '625712_1576749885.jpg', 1, 46, 2, '2019-12-19 15:34:44', 0, '2019-12-19 10:04:45'),
(125, 3, 'Maha Rudra Yagam in SRISAILAM temple 2018', '713245_1576750514.jpg', 1, 47, 2, '2019-12-19 15:45:14', 2, '2019-12-19 22:38:48'),
(126, 3, 'sudarshan yagam in simhachalam Temple 2019', '981811_1576750603.jpg', 2, 48, 2, '2019-12-19 15:46:43', 2, '2019-12-21 08:37:07'),
(127, 1, ' K Satyanarayana garu 2016', '79205_1576910621.jpg', 1, 23, 2, '2019-12-21 12:13:41', 2, '2019-12-21 18:16:35'),
(128, 1, 'K SN GARU 2016', '603323_1576910709.jpg', 2, 24, 2, '2019-12-21 12:15:09', 0, '2019-12-21 06:45:38'),
(129, 1, 'PLANTATION IN TEMPLES 2016', '852962_1576911033.jpg', 1, 25, 2, '2019-12-21 12:20:33', 0, '2019-12-21 06:50:33'),
(130, 3, 'Green temples 2016', '490214_1576915094.jpg', 1, 49, 2, '2019-12-21 13:28:14', 0, '2019-12-21 07:58:14'),
(131, 1, 'à°ªà°¦à°µà±€ à°¸à±à°µà±€à°•à°¾à°° à°®à°¹à±‹à°¤à±à°¸à°µà°‚ 18 march 2016', '120070_1576915649.jpg', 1, 26, 2, '2019-12-21 13:37:29', 2, '2019-12-21 19:37:56'),
(132, 1, 'ainavilli1 2016', '904137_1576916239.jpg', 1, 27, 2, '2019-12-21 13:47:19', 0, '2019-12-21 08:17:19'),
(133, 1, 'dwarakatirumala 2017', '351870_1576916569.jpg', 1, 28, 2, '2019-12-21 13:52:49', 0, '2019-12-21 08:22:49'),
(134, 3, 'sudarshana yagam in simhachalam Temple 2019', '578226_1576917526.jpg', 1, 50, 2, '2019-12-21 14:08:46', 0, '2019-12-21 08:38:46'),
(135, 1, 'simhachalam 2017 ', '116688_1576917863.jpg', 1, 29, 2, '2019-12-21 14:14:23', 0, '2019-12-21 08:44:23'),
(136, 1, 'simhachalam1 2017', '682916_1576917864.jpg', 1, 30, 2, '2019-12-21 14:14:23', 0, '2019-12-21 08:44:24'),
(137, 1, 'saraswathi yagam pitapuram 2016', '826573_1576918307.jpg', 1, 31, 2, '2019-12-21 14:21:46', 0, '2019-12-21 08:51:47'),
(138, 1, 'Sri Renukamata shakti peetam, Maharastra', '60677_1577514587.jpg', 1, 32, 2, '2019-12-28 11:59:47', 0, '2019-12-28 06:29:47'),
(139, 1, 'srisailam temple 2016 feeding cow', '557485_1577514970.jpg', 1, 33, 2, '2019-12-28 12:06:10', 0, '2019-12-28 06:36:10'),
(140, 1, 'srisailam goshala 2017', '82232_1577514970.jpg', 1, 34, 2, '2019-12-28 12:06:10', 0, '2019-12-28 06:36:10'),
(141, 1, 'srisailam temple 2018', '96537_1577515222.jpg', 1, 35, 2, '2019-12-28 12:10:22', 0, '2019-12-28 06:40:23'),
(142, 1, 'srisailam temple1 2018', '295898_1577515223.jpg', 1, 36, 2, '2019-12-28 12:10:22', 0, '2019-12-28 06:40:23'),
(143, 1, 'kotipalli goshala 2017', '368235_1577515565.jpg', 1, 37, 2, '2019-12-28 12:16:05', 0, '2019-12-28 06:46:05'),
(144, 1, 'sudarshana yagam in antervedi 2017', '920918_1577516349.jpg', 1, 38, 2, '2019-12-28 12:29:09', 0, '2019-12-28 06:59:09'),
(145, 1, 'sudarshana yagam1 in antevedi 2017', '386501_1577516349.jpg', 1, 39, 2, '2019-12-28 12:29:09', 0, '2019-12-28 06:59:09'),
(146, 1, 'karthikadeepam in srisailam 2017', '359677_1577516662.jpg', 1, 40, 2, '2019-12-28 12:34:22', 0, '2019-12-28 07:04:22'),
(147, 1, 'srisailam 2017', '709228_1577516662.jpg', 1, 41, 2, '2019-12-28 12:34:22', 0, '2019-12-28 07:04:22'),
(148, 1, 'sudarshan yagam in simhachalam 2017', '907156_1577516966.jpg', 1, 42, 2, '2019-12-28 12:39:26', 0, '2019-12-28 07:09:26'),
(149, 1, 'sudarshan yagam in simhachalam1 2017', '51457_1577516966.jpg', 1, 43, 2, '2019-12-28 12:39:26', 0, '2019-12-28 07:09:26'),
(150, 1, 'atirudra yagam in srisailam 2017', '660327_1577518306.jpg', 1, 44, 2, '2019-12-28 13:01:46', 0, '2019-12-28 07:31:46'),
(151, 1, 'atirudra yagamm in srisailam 2017', '756883_1577518306.jpg', 1, 45, 2, '2019-12-28 13:01:46', 0, '2019-12-28 07:31:46'),
(152, 1, 'LAKSHA GARIKA PUJA', '735126_1577798369.jpg', 1, 46, 2, '2019-12-31 18:49:29', 0, '2019-12-31 13:19:30'),
(153, 1, 'LAKASHA GARIKA PUJA 2017', '393607_1577798819.jpg', 1, 47, 2, '2019-12-31 18:56:59', 0, '2019-12-31 13:26:59'),
(154, 1, 'Maha ganapathi yagam in mavullamma temple 2016', '498071_1577859266.jpg', 1, 48, 2, '2020-01-01 11:44:26', 0, '2020-01-01 06:14:28'),
(155, 1, 'Maha ganapathi yagam1 in mavullamma temple 2016', '962831_1577859268.jpg', 1, 49, 2, '2020-01-01 11:44:26', 0, '2020-01-01 06:14:28'),
(156, 1, 'maha ganapthi yagam in à°ªà°‚à°šà°¾à°°à°¾à°® à°•à±à°·à±‡à°¤à±à°°à°‚ palakollu 2016', '221396_1577861220.jpg', 1, 50, 2, '2020-01-01 12:17:00', 2, '2020-01-04 18:48:58'),
(157, 1, 'à°ªà°‚à°šà°¾à°°à°¾à°® à°•à±à°·à±‡à°¤à±à°°à°‚ palakollu 2016', '689288_1578035725.jpg', 1, 51, 2, '2020-01-03 12:45:25', 0, '2020-01-03 07:15:25'),
(158, 1, 'ganapathi yagam in dwarakatirumala temple', '886538_1578120957.jpg', 1, 52, 2, '2020-01-04 12:25:57', 0, '2020-01-04 06:55:57'),
(159, 1, ' IN GOSHALA DWARAKATIRUMALA TEMPLE 2016', '570179_1578121431.jpg', 1, 53, 2, '2020-01-04 12:33:51', 2, '2020-01-04 18:34:49'),
(160, 1, 'maha ganapathi homam in ainavilli ganapathi temple 2016', '724504_1578293828.jpg', 1, 54, 2, '2020-01-06 12:27:08', 0, '2020-01-06 06:57:08'),
(161, 1, 'maha ganapathi yagam in à°ªà°‚à°šà°¾à°°à°¾à°® à°•à±à°·à±‡à°¤à±à°°à°‚ draksharamam 2016', '844708_1578294437.jpg', 1, 55, 2, '2020-01-06 12:37:17', 0, '2020-01-06 07:07:17'),
(162, 1, 'maha ganapathi yagam1 in à°ªà°‚à°šà°¾à°°à°¾à°® à°•à±à°·à±‡à°¤à±à°°à°‚ draksharamam 2016', '590421_1578294437.jpg', 1, 56, 2, '2020-01-06 12:37:17', 0, '2020-01-06 07:07:17'),
(163, 1, 'à°ªà°‚à°šà°¾à°°à°¾à°® à°•à±à°·à±‡à°¤à±à°°à°‚ draksharamam 2016', '100571_1578294550.jpg', 2, 57, 2, '2020-01-06 12:39:10', 0, '2020-01-06 07:12:18'),
(164, 1, 'à°ªà°‚à°šà°¾à°°à°¾à°® à°•à±à°·à±‡à°¤à±à°°à°‚ draksharamamm 2016', '54435_1578294550.jpg', 2, 58, 2, '2020-01-06 12:39:10', 0, '2020-01-06 07:12:33'),
(165, 4, 'severe cold wave hits north india', '375197_1578504287.jpg', 2, 20, 2, '2020-01-08 22:54:47', 0, '2020-10-08 07:21:24'),
(166, 4, 'recorded low temparatures in uttarandhra dec 2019', '184784_1578504476.jpg', 2, 21, 2, '2020-01-08 22:57:56', 2, '2020-10-08 07:21:09'),
(167, 1, 'maha saraswathi yagam muramalla 2016', '737581_1578640761.jpg', 1, 59, 2, '2020-01-10 12:49:21', 0, '2020-01-10 07:19:21'),
(168, 1, 'maha saraswathi yagam muramalla1 2016', '961949_1578640761.jpg', 1, 60, 2, '2020-01-10 12:49:21', 0, '2020-01-10 07:19:22'),
(169, 1, 'maha saraswathi yagam bhimavaram 2016', '435813_1578641450.jpg', 1, 61, 2, '2020-01-10 13:00:50', 0, '2020-01-10 07:30:50'),
(170, 1, 'mavullamma temple à°­à±€à°®à°µà°°à°‚', '965412_1578641766.jpg', 1, 62, 2, '2020-01-10 13:06:06', 0, '2020-01-10 07:36:06'),
(171, 1, 'with AP CM 2016', '50251_1578722699.jpg', 1, 63, 2, '2020-01-11 11:34:59', 0, '2020-01-11 06:04:59'),
(172, 1, 'SRI NAGARESWARA SWAMI TEMPLE PENUGOND 2106', '399862_1578724273.jpg', 1, 64, 2, '2020-01-11 12:01:13', 0, '2020-01-11 06:31:13'),
(173, 1, 'SRI NAGARESWARA SWAMII TEMPLE PENUGOND 2106', '726441_1578724274.jpg', 1, 65, 2, '2020-01-11 12:01:13', 0, '2020-01-11 06:31:14'),
(174, 1, 'KOTASATTEAMMA TEMPLE NIDADAVOLE 2016', '211535_1578727350.jpg', 1, 66, 2, '2020-01-11 12:52:30', 0, '2020-01-11 07:22:30'),
(175, 1, 'KOTASATTEAMMA TEMPLE1 NIDADAVOLE 2016', '476114_1578727350.jpg', 1, 67, 2, '2020-01-11 12:52:30', 0, '2020-01-11 07:22:31'),
(176, 3, 'Ayodhya Prediction 2019', '725574_1578893053.jpg', 1, 51, 2, '2020-01-13 10:54:13', 0, '2020-01-13 05:24:13'),
(177, 1, 'with Endowments Minister sri p.manikyalarao 2017', '646805_1578900186.jpg', 1, 68, 2, '2020-01-13 12:53:06', 0, '2020-01-13 07:23:06'),
(178, 1, 'wwith Endowments Minister sri p.manikyalarao 2017', '30859_1578900186.jpg', 1, 69, 2, '2020-01-13 12:53:06', 0, '2020-01-13 07:23:06'),
(179, 4, ' à°ªà°Ÿà±à°Ÿà°¿à°¸à±€à°® à°®à°¹à°¾ à°•à±à°·à±‡à°¤à±à°°à°‚ 15 jan 2020', '286071_1579248477.jpg', 2, 22, 2, '2020-01-17 13:34:57', 2, '2020-10-08 07:20:59'),
(180, 4, 'snow storm in jammu & kashmir jan 2020 ', '480274_1579248952.jpg', 2, 23, 2, '2020-01-17 13:45:52', 0, '2020-01-18 07:14:39'),
(181, 4, 'supreme court sensational judgment on  ayodhaya 2019', '295163_1579251216.jpg', 1, 24, 2, '2020-01-17 14:23:34', 2, '2020-01-17 20:24:43'),
(182, 1, 'atirudra maha yagam in annavaram temple 2016', '55142_1579252505.jpg', 1, 70, 2, '2020-01-17 14:45:05', 0, '2020-01-17 09:15:06'),
(183, 1, 'atirudra yagam in amuvulamma temple bhimavaram 2016', '489819_1579253034.jpg', 1, 71, 2, '2020-01-17 14:53:53', 0, '2020-01-17 09:23:54'),
(184, 1, 'atirudra maha yagam in draksharamma temple 2016', '357563_1579253586.jpg', 1, 72, 2, '2020-01-17 15:03:05', 0, '2020-01-17 09:33:06'),
(185, 1, 'atirudra maha yagam in kotappakonda temple 2016', '168377_1579254815.jpg', 1, 73, 2, '2020-01-17 15:23:35', 0, '2020-01-17 09:53:35'),
(186, 4, 'snow storm in jammu & kashmir 14 jan 2020 ', '801578_1579331745.jpeg', 2, 25, 2, '2020-01-18 12:45:44', 0, '2020-10-08 07:20:40'),
(187, 4, 'gsat 30 successful 17 jan 2020', '456737_1579331911.jpeg', 2, 26, 2, '2020-01-18 12:48:31', 0, '2020-10-08 07:20:29'),
(188, 4, 'à°°à°¾à°œà°•à±€à°¯ à°µà°¿à°µà°¾à°¦à°‚à°—à°¾ à°¸à°¾à°¯à°¿ à°œà°¨à±à°®à°­à±‚à°®à°¿ 17 à°œà°¨à°µà°°à°¿', '105669_1579332190.jpeg', 2, 27, 2, '2020-01-18 12:53:10', 0, '2020-10-08 07:20:13'),
(189, 4, 'NASA successfully launched solar orbiter 2020 feb 9', '196225_1581947969.jpg', 2, 28, 2, '2020-02-17 19:29:29', 0, '2020-10-08 07:19:59'),
(190, 4, 'pithapuram 10 shakthi peetham visit feb 2020', '434462_1582033307.jpg', 2, 29, 2, '2020-02-18 19:11:47', 0, '2020-10-08 07:19:48'),
(191, 4, 'SpaceX CRS-20 à°µà°¿à°œà°¯à°µà°‚à°¤à°‚à°—à°¾ à°‡à°‚à°Ÿà°°à±à°¨à±‡à°·à°¨à°²à± à°¸à±à°ªà±‡à°¸à± à°', '81639_1583818851.jpg', 2, 30, 2, '2020-03-10 11:10:51', 2, '2020-10-08 07:19:38'),
(192, 4, 'INDIA phase I coronavirus 15 feb  to 29 feb 2020', '736966_1584596064.jpg', 2, 31, 2, '2020-03-19 11:04:24', 0, '2020-10-08 07:19:10'),
(193, 4, 'china coronavirus feb 2020', '299233_1584596127.jpg', 2, 32, 2, '2020-03-19 11:05:27', 0, '2020-10-08 07:19:05'),
(194, 4, 'Vellampalli srinivas discharge 2020 oct', '192466_1603693664.jpg', 1, 33, 2, '2020-10-26 11:57:44', 0, '2020-10-26 06:27:44'),
(195, 1, 'Testing01679', '120305_1621075326.jpg', 1, 74, 1, '2021-05-15 16:12:05', 0, '2021-05-15 10:42:06'),
(196, 1, 'dfgfdgfdgdgd', '912357_1621227006.jpg', 1, 75, 1, '2021-05-17 10:20:06', 0, '2021-05-17 04:50:06'),
(197, 1, 'T111', '181976_1621228212.jpg', 1, 76, 1, '2021-05-17 10:38:16', 1, '2021-05-17 05:10:12'),
(198, 1, '12345', '135804_1621235542.jpg', 1, 77, 1, '2021-05-17 12:42:22', 0, '2021-05-17 07:12:23'),
(199, 2, '12345', '495947_1621236351.jpg', 1, 30, 1, '2021-05-17 12:55:51', 0, '2021-05-17 07:25:51'),
(200, 1, 'aaaaa', '929453_1621245925.jpg', 1, 78, 1, '2021-05-17 15:35:25', 0, '2021-05-17 10:05:25');

-- --------------------------------------------------------

--
-- Table structure for table `bi_item`
--

DROP TABLE IF EXISTS `bi_item`;
CREATE TABLE `bi_item` (
  `itm_id` int(5) NOT NULL,
  `itm_code` varchar(25) NOT NULL,
  `itm_catid` int(5) NOT NULL,
  `itm_subcatid` int(5) NOT NULL,
  `itm_name` varchar(250) NOT NULL,
  `itm_desc` varchar(500) NOT NULL,
  `itm_price` varchar(20) NOT NULL,
  `itm_img` varchar(200) NOT NULL,
  `itm_status` int(1) NOT NULL DEFAULT '1',
  `itm_orderby` int(5) NOT NULL,
  `itm_added_by` int(5) NOT NULL,
  `itm_added_date` datetime NOT NULL,
  `itm_updated_by` int(5) NOT NULL,
  `itm_updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bi_item`
--

INSERT INTO `bi_item` (`itm_id`, `itm_code`, `itm_catid`, `itm_subcatid`, `itm_name`, `itm_desc`, `itm_price`, `itm_img`, `itm_status`, `itm_orderby`, `itm_added_by`, `itm_added_date`, `itm_updated_by`, `itm_updated_date`) VALUES
(1, 'aa', 1, 1, 'aa', '\r\n\r\nhkjhk\r\n', 'aa', '570272_1622549533.png', 1, 0, 1, '2021-06-01 17:42:13', 0, '0000-00-00 00:00:00'),
(2, '1679', 1, 1, 'sssLLLL', '<p>LS</p>\r\n', '7777', '446772_1622551663.png', 1, 1, 1, '2021-06-01 17:53:42', 1, '2021-06-01 18:17:43');

-- --------------------------------------------------------

--
-- Table structure for table `bi_locations`
--

DROP TABLE IF EXISTS `bi_locations`;
CREATE TABLE `bi_locations` (
  `ls_id` int(3) NOT NULL,
  `ls_name` varchar(300) NOT NULL,
  `ls_abbrev` varchar(200) NOT NULL,
  `ls_stateid` int(3) NOT NULL,
  `ls_distid` int(5) NOT NULL,
  `ls_mandid` int(5) NOT NULL,
  `ls_status` int(1) NOT NULL DEFAULT '1',
  `ls_added_by` int(3) NOT NULL,
  `ls_added_date` datetime NOT NULL,
  `ls_updated_by` int(3) NOT NULL,
  `ls_updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bi_locations`
--

INSERT INTO `bi_locations` (`ls_id`, `ls_name`, `ls_abbrev`, `ls_stateid`, `ls_distid`, `ls_mandid`, `ls_status`, `ls_added_by`, `ls_added_date`, `ls_updated_by`, `ls_updated_date`) VALUES
(1, 'Puttagunta', '', 4, 3, 1, 1, 1, '2021-05-15 11:40:16', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bi_mandals`
--

DROP TABLE IF EXISTS `bi_mandals`;
CREATE TABLE `bi_mandals` (
  `md_id` int(3) NOT NULL,
  `md_name` varchar(300) NOT NULL,
  `md_abbrev` varchar(250) NOT NULL,
  `md_state_id` int(3) NOT NULL,
  `md_dist_id` int(3) NOT NULL,
  `md_status` int(1) NOT NULL DEFAULT '1',
  `md_added_by` int(3) NOT NULL,
  `md_added_date` datetime NOT NULL,
  `md_updated_by` int(3) NOT NULL,
  `md_updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bi_mandals`
--

INSERT INTO `bi_mandals` (`md_id`, `md_name`, `md_abbrev`, `md_state_id`, `md_dist_id`, `md_status`, `md_added_by`, `md_added_date`, `md_updated_by`, `md_updated_date`) VALUES
(1, 'Nandivada', 'Test123', 4, 3, 1, 1, '2021-05-14 15:59:58', 1, '2021-05-14 17:53:01');

-- --------------------------------------------------------

--
-- Table structure for table `bi_news`
--

DROP TABLE IF EXISTS `bi_news`;
CREATE TABLE `bi_news` (
  `ne_id` int(5) NOT NULL,
  `ne_cat_id` int(4) NOT NULL,
  `ne_title` varchar(250) NOT NULL,
  `ne_path` varchar(150) NOT NULL,
  `ne_url` varchar(350) NOT NULL,
  `ne_desc` varchar(900) NOT NULL,
  `ne_status` tinyint(1) NOT NULL DEFAULT '1',
  `ne_order_by` int(4) NOT NULL,
  `ne_added_by` int(5) NOT NULL,
  `ne_added_date` datetime NOT NULL,
  `ne_updated_by` int(5) NOT NULL,
  `ne_updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bi_news`
--

INSERT INTO `bi_news` (`ne_id`, `ne_cat_id`, `ne_title`, `ne_path`, `ne_url`, `ne_desc`, `ne_status`, `ne_order_by`, `ne_added_by`, `ne_added_date`, `ne_updated_by`, `ne_updated_date`) VALUES
(1, 1, 'aaaaaaa', '73181_1621501537.jpg', '', '<p>saaaa</p>\r\n', 1, 1, 1, '2021-05-18 17:53:38', 1, '2021-05-20 09:05:36'),
(2, 2, 'Tesstq', '', 'https://www.youtube.com/embed/X6YVc9GW6us', '<p>yrlq</p>', 1, 0, 1, '2021-05-19 11:00:40', 1, '2021-05-20 08:01:02'),
(3, 1, 'aaaaaaa', '73181_1621501537.jpg', '', '<p>saaaa</p>\r\n', 1, 1, 1, '2021-05-18 17:53:38', 1, '2021-05-20 09:05:36'),
(4, 2, 'Tesstq', '', 'https://www.youtube.com/embed/X6YVc9GW6us', '<p>yrlq</p>', 1, 0, 1, '2021-05-19 11:00:40', 1, '2021-05-20 08:01:02'),
(5, 2, 'Tesstq', '', 'https://www.youtube.com/embed/X6YVc9GW6us', '<p>yrlq</p>', 1, 0, 1, '2021-05-19 11:00:40', 1, '2021-05-20 08:01:02');

-- --------------------------------------------------------

--
-- Table structure for table `bi_orders`
--

DROP TABLE IF EXISTS `bi_orders`;
CREATE TABLE `bi_orders` (
  `ord_id` int(5) NOT NULL,
  `ord_refid` varchar(100) NOT NULL,
  `ord_userid` int(5) NOT NULL,
  `ord_price` varchar(25) NOT NULL,
  `ord_qnty` varchar(20) NOT NULL,
  `ord_catid` int(5) NOT NULL,
  `ord_subcatid` int(5) NOT NULL,
  `ord_itemid` int(5) NOT NULL,
  `ord_name` varchar(200) NOT NULL,
  `ord_address` varchar(400) NOT NULL,
  `ord_city` varchar(70) NOT NULL,
  `ord_state` varchar(70) NOT NULL,
  `ord_mobile` varchar(15) NOT NULL,
  `ord_zip` varchar(15) NOT NULL,
  `ord_orderby` int(5) NOT NULL,
  `ord_status` int(1) NOT NULL DEFAULT '1',
  `ord_added_date` datetime NOT NULL,
  `ord_updated_by` int(5) NOT NULL,
  `ord_updated_date` datetime NOT NULL,
  `ord_added_by` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bi_pcategory`
--

DROP TABLE IF EXISTS `bi_pcategory`;
CREATE TABLE `bi_pcategory` (
  `pcat_id` int(5) NOT NULL,
  `pcat_code` varchar(25) NOT NULL,
  `pcat_name` varchar(250) NOT NULL,
  `pcat_desc` varchar(500) NOT NULL,
  `pcat_orderby` varchar(10) NOT NULL,
  `pcat_status` int(1) NOT NULL DEFAULT '1',
  `pcat_added_by` int(5) NOT NULL,
  `pcat_added_date` datetime NOT NULL,
  `pcat_updated_by` int(5) NOT NULL,
  `pcat_updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bi_pcategory`
--

INSERT INTO `bi_pcategory` (`pcat_id`, `pcat_code`, `pcat_name`, `pcat_desc`, `pcat_orderby`, `pcat_status`, `pcat_added_by`, `pcat_added_date`, `pcat_updated_by`, `pcat_updated_date`) VALUES
(1, 'So101', 'Soaps', 'Descrptiob123', '', 1, 1, '2021-05-28 17:42:28', 1, '2021-05-28 18:05:11'),
(2, 'Soaps123@', 'Soaps123@', 'Test12367@', '1', 1, 1, '2021-05-28 18:03:19', 1, '2021-05-31 15:16:31');

-- --------------------------------------------------------

--
-- Table structure for table `bi_psub_category`
--

DROP TABLE IF EXISTS `bi_psub_category`;
CREATE TABLE `bi_psub_category` (
  `psubc_id` int(5) NOT NULL,
  `psubc_code` varchar(25) NOT NULL,
  `psubc_catid` int(5) NOT NULL,
  `psubc_name` varchar(250) NOT NULL,
  `psubc_desc` varchar(500) NOT NULL,
  `psubc_orderby` int(5) NOT NULL,
  `psubc_status` int(1) NOT NULL DEFAULT '1',
  `psubc_added_by` int(5) NOT NULL,
  `psubc_added_date` datetime NOT NULL,
  `psubc_updated_by` int(5) NOT NULL,
  `psubc_updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bi_psub_category`
--

INSERT INTO `bi_psub_category` (`psubc_id`, `psubc_code`, `psubc_catid`, `psubc_name`, `psubc_desc`, `psubc_orderby`, `psubc_status`, `psubc_added_by`, `psubc_added_date`, `psubc_updated_by`, `psubc_updated_date`) VALUES
(1, '1042', 1, 'Bath Soaps', 'desc', 1, 1, 1, '2021-05-31 17:48:36', 0, '0000-00-00 00:00:00'),
(2, '14474a', 2, 'Wash soapsa', 'descripotiona', 2, 1, 1, '2021-06-01 11:01:30', 1, '2021-06-01 11:01:56');

-- --------------------------------------------------------

--
-- Table structure for table `bi_reg_users`
--

DROP TABLE IF EXISTS `bi_reg_users`;
CREATE TABLE `bi_reg_users` (
  `reg_id` int(11) NOT NULL,
  `reg_code` varchar(12) NOT NULL,
  `reg_email` varchar(60) NOT NULL DEFAULT '',
  `reg_mobile` varchar(20) NOT NULL,
  `reg_password` varchar(30) NOT NULL,
  `reg_type` int(11) NOT NULL,
  `reg_name` varchar(60) NOT NULL DEFAULT '',
  `reg_avatar` varchar(100) NOT NULL,
  `reg_email_alt` varchar(60) NOT NULL,
  `reg_phone` varchar(20) NOT NULL DEFAULT '',
  `reg_phone_alt` varchar(20) NOT NULL,
  `reg_address` varchar(225) NOT NULL DEFAULT '',
  `reg_city` varchar(20) NOT NULL,
  `reg_state` varchar(30) NOT NULL,
  `reg_postal_code` varchar(12) NOT NULL,
  `reg_country` varchar(50) NOT NULL,
  `reg_nationality` smallint(2) NOT NULL,
  `reg_identity` varchar(50) NOT NULL,
  `reg_page` int(11) NOT NULL DEFAULT '1' COMMENT '1:SignUp, 2:Post Enquiry',
  `reg_randcode` varchar(30) NOT NULL,
  `reg_status` int(1) NOT NULL DEFAULT '2',
  `reg_order_by` int(3) NOT NULL DEFAULT '0',
  `reg_added_by` int(4) NOT NULL DEFAULT '0',
  `reg_added_date` datetime NOT NULL,
  `reg_updated_by` int(4) NOT NULL,
  `reg_updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `bi_reg_users`
--

INSERT INTO `bi_reg_users` (`reg_id`, `reg_code`, `reg_email`, `reg_mobile`, `reg_password`, `reg_type`, `reg_name`, `reg_avatar`, `reg_email_alt`, `reg_phone`, `reg_phone_alt`, `reg_address`, `reg_city`, `reg_state`, `reg_postal_code`, `reg_country`, `reg_nationality`, `reg_identity`, `reg_page`, `reg_randcode`, `reg_status`, `reg_order_by`, `reg_added_by`, `reg_added_date`, `reg_updated_by`, `reg_updated_date`) VALUES
(1, 'BAIRI0001', 'test@gmail.com', '9908567656', 'dGVzdA,,', 0, '', '', '', '', '', '', '', '', '', '', 0, '', 1, '60b8caa25f9b2', 2, 1, 0, '2021-06-03 17:57:14', 0, '2021-06-03 12:27:14'),
(2, 'BAIRI0002', 'tesrt@dfh.fghjf', 'fghffghfghf', 'ZnV0eXU,', 0, '', '', '', '', '', '', '', '', '', '', 0, '', 1, '60b8ce576588b', 2, 2, 0, '2021-06-03 18:13:03', 0, '2021-06-03 12:43:03'),
(3, 'BAIRI0003', 'anilhyd2010@yahoo.com', '9945854585', 'dGVzdA,,', 0, '', '', '', '', '', '', '', '', '', '', 0, '', 1, '60bf3a67e6067', 2, 3, 0, '2021-06-08 15:07:43', 0, '2021-06-08 09:37:43'),
(4, 'BAIRI0004', 'sdgdfgfg@fghfgh.gfhfgh', '547768786786', 'NDU2NDU2', 0, '', '', '', '', '', '', '', '', '', '', 0, '', 1, '60bf3deaa6a5c', 2, 4, 0, '2021-06-08 15:22:42', 0, '2021-06-08 09:52:42'),
(5, 'BAIRI0005', 'fghfghfg@dfgdfg.hj', '56686666', 'Z2pq', 0, '', '', '', '', '', '', '', '', '', '', 0, '', 1, '60bf3f274d51b', 1, 5, 0, '2021-06-08 15:27:58', 0, '2021-06-08 09:58:06'),
(6, 'BAIRI0006', 'bngjg@ghjgh.ghjghj', '567566756', 'dHR0dHQ,', 0, '', '', '', '', '', '', '', '', '', '', 0, '', 1, '60bf51a262b4d', 2, 6, 0, '2021-06-08 16:46:48', 0, '2021-06-08 11:16:50'),
(7, 'BAIRI0007', 'xfgdW@fgjn.fghf', '4574456', 'dHJ5cnR5', 0, '', '', '', '', '', '', '', '', '', '', 0, '', 1, '60bf5245b1673', 2, 7, 0, '2021-06-08 16:49:33', 0, '2021-06-08 11:19:33'),
(8, 'BAIRI0008', 'aaa@gmail.com', '9945874584', 'bHNsb2tlc2g,', 0, '', '', '', '', '', '', '', '', '', '', 0, '', 1, '60bf5db7a4ea7', 2, 8, 0, '2021-06-08 17:38:23', 0, '2021-06-08 12:09:40'),
(9, 'BAIRI0009', 'ls@gmail.com', '9945845845', 'bHNsb2tlc2g,', 0, 'aa', '', '', 'a', '', 'a', '', '', 'a', '', 0, '', 1, '60bf5e2b4b38d', 1, 9, 0, '2021-06-08 17:40:19', 9, '2021-06-08 12:11:34');

-- --------------------------------------------------------

--
-- Table structure for table `bi_shgreg`
--

DROP TABLE IF EXISTS `bi_shgreg`;
CREATE TABLE `bi_shgreg` (
  `sh_shgid` int(5) NOT NULL,
  `sh_name` varchar(250) NOT NULL,
  `sh_rrefno` int(10) NOT NULL,
  `sh_memName` varchar(250) NOT NULL,
  `sh_postAddress` varchar(400) NOT NULL,
  `sh_mandal` varchar(150) NOT NULL,
  `sh_district` varchar(150) NOT NULL,
  `sh_state` varchar(150) NOT NULL,
  `sh_pincode` varchar(15) NOT NULL,
  `sh_gloction` varchar(400) NOT NULL,
  `sh_pmobile` varchar(15) NOT NULL,
  `sh_smobile` varchar(15) NOT NULL,
  `sh_email` varchar(250) NOT NULL,
  `sh_wasms` varchar(15) NOT NULL,
  `sh_products` int(1) NOT NULL,
  `sh_brand` varchar(250) NOT NULL,
  `sh_bustand` varchar(250) NOT NULL,
  `sh_rail` varchar(250) NOT NULL,
  `sh_shgname` varchar(300) NOT NULL,
  `sh_status` int(1) NOT NULL,
  `sh_added_by` int(5) NOT NULL,
  `sh_added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sh_updated_by` int(5) NOT NULL,
  `sh_updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bi_shgreg`
--

INSERT INTO `bi_shgreg` (`sh_shgid`, `sh_name`, `sh_rrefno`, `sh_memName`, `sh_postAddress`, `sh_mandal`, `sh_district`, `sh_state`, `sh_pincode`, `sh_gloction`, `sh_pmobile`, `sh_smobile`, `sh_email`, `sh_wasms`, `sh_products`, `sh_brand`, `sh_bustand`, `sh_rail`, `sh_shgname`, `sh_status`, `sh_added_by`, `sh_added_date`, `sh_updated_by`, `sh_updated_date`) VALUES
(1, 'Name SGH', 7488, 'AAdha', 'postal', 'mandal', 'dis', 'state', '45679', 'google', '456456', '45666666', 'test@gmail.com', '1234234', 1, 'Brand Name', 'bus stnd', 'rail satand', 'sfe', 0, 0, '2021-05-11 05:41:15', 0, '0000-00-00 00:00:00'),
(2, 'SGH Namesfwe', 12355666, 'Aadhar name', 'pastal', 'df', 'dis', 'state', '45679', 'google', '57457', '45666666', 'test@gmail.com', '5546', 2, 'Brand Name', 'bus stnd', 'rail satand', 'Shg Name', 0, 0, '2021-05-11 07:03:30', 0, '0000-00-00 00:00:00'),
(3, 'shg name', 0, 'AAdhar NO', 'postal add', '1', '3', '4', '555555', 'dfgdf', '456456', '45666666', 'test@gmail.com', '5546', 4, 'Brand Name', 'bus stnd', 'rail satand', '', 0, 0, '2021-05-24 10:58:45', 0, '0000-00-00 00:00:00'),
(4, 'Name of sgh', 56546456, 'Mem Full Name', 'postal code', '1', '3', '4', '45679', 'edfgdf', '57457', 'dfdg', 'test@gmail.com', '5546', 2, 'Brand Name', 'bus stnd', 'rail satand', 'SGH', 0, 0, '2021-05-31 10:48:31', 0, '0000-00-00 00:00:00'),
(5, 'Name of sgh', 56546456, 'Mem Full Name', 'postal code', '1', '3', '4', '45679', 'edfgdf', '57457', 'dfdg', 'test@gmail.com', '5546', 2, 'Brand Name', 'bus stnd', 'rail satand', 'SGH', 0, 0, '2021-05-31 10:54:28', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bi_states`
--

DROP TABLE IF EXISTS `bi_states`;
CREATE TABLE `bi_states` (
  `st_id` int(5) NOT NULL,
  `st_name` varchar(200) NOT NULL,
  `st_abbreviation` varchar(150) NOT NULL,
  `st_des` varchar(250) NOT NULL,
  `st_status` int(1) NOT NULL DEFAULT '1',
  `st_added_by` int(5) NOT NULL,
  `st_added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `st_updated_by` int(5) NOT NULL,
  `st_updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bi_states`
--

INSERT INTO `bi_states` (`st_id`, `st_name`, `st_abbreviation`, `st_des`, `st_status`, `st_added_by`, `st_added_date`, `st_updated_by`, `st_updated_date`) VALUES
(4, 'AP', 'Ap', 'AAAP', 1, 1, '2021-05-14 05:17:27', 0, '0000-00-00 00:00:00'),
(5, 'TS', 'TS', 'TS', 1, 1, '2021-05-14 05:17:45', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bi_temporders`
--

DROP TABLE IF EXISTS `bi_temporders`;
CREATE TABLE `bi_temporders` (
  `tem_id` int(5) NOT NULL,
  `tem_ordrefid` varchar(50) NOT NULL,
  `tem_ses` varchar(50) NOT NULL,
  `tem_catid` int(5) NOT NULL,
  `tem_scatid` int(5) NOT NULL,
  `tem_itemid` int(5) NOT NULL,
  `tem_status` int(1) NOT NULL DEFAULT '1',
  `tem_orderby` int(5) NOT NULL,
  `tem_added_by` int(5) NOT NULL,
  `tem_added_date` datetime NOT NULL,
  `tem_updated_by` int(5) NOT NULL,
  `tem_updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `va_appointments`
--

DROP TABLE IF EXISTS `va_appointments`;
CREATE TABLE `va_appointments` (
  `vaap_id` int(5) NOT NULL,
  `vaap_appt_no` varchar(15) NOT NULL,
  `vaap_service` varchar(70) NOT NULL,
  `vaap_name` varchar(70) NOT NULL,
  `vaap_gender` varchar(10) NOT NULL,
  `vaap_dob` date NOT NULL,
  `vaap_tob` varchar(25) NOT NULL,
  `vaap_hrs` varchar(15) NOT NULL,
  `vaap_mts` varchar(15) NOT NULL,
  `vaap_bcntry` varchar(50) NOT NULL,
  `vaap_bcty` varchar(60) NOT NULL,
  `vaap_bstate` varchar(60) NOT NULL,
  `vaap_email` varchar(70) NOT NULL,
  `vaap_phone` varchar(15) NOT NULL,
  `vaap_zip` varchar(15) NOT NULL,
  `vaap_address` varchar(80) NOT NULL,
  `vaap_tid` varchar(100) NOT NULL,
  `vaap_description` varchar(180) NOT NULL,
  `vaap_ptype_id` int(1) NOT NULL,
  `vaap_pstatus` int(1) NOT NULL DEFAULT '1' COMMENT '1-Pending,2-Paid,3-Failed',
  `vaap_status` tinyint(1) NOT NULL DEFAULT '2',
  `vaap_order_by` int(4) NOT NULL,
  `vaap_added_by` int(5) NOT NULL,
  `vaap_added_date` datetime NOT NULL,
  `vaap_updated_by` int(5) NOT NULL,
  `vaap_updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `va_appointments`
--

INSERT INTO `va_appointments` (`vaap_id`, `vaap_appt_no`, `vaap_service`, `vaap_name`, `vaap_gender`, `vaap_dob`, `vaap_tob`, `vaap_hrs`, `vaap_mts`, `vaap_bcntry`, `vaap_bcty`, `vaap_bstate`, `vaap_email`, `vaap_phone`, `vaap_zip`, `vaap_address`, `vaap_tid`, `vaap_description`, `vaap_ptype_id`, `vaap_pstatus`, `vaap_status`, `vaap_order_by`, `vaap_added_by`, `vaap_added_date`, `vaap_updated_by`, `vaap_updated_date`) VALUES
(9, '0411635', '3', 'Test123', 'Male', '2019-11-05', 'PM', '2', '2', '4', 'Hyderabad1', 'TS', 'lokesh@gmail.com', '95845875877', '7584577', 'Test Address77', '123445774', '<p>Test qqq</p>', 3, 1, 2, 6, 0, '2019-11-04 11:32:33', 1, '2019-11-04 08:27:37'),
(10, '0511811', '10', 'Testing', 'Male', '2019-11-01', 'AM', '1', '2', '73', 'Hyderabad', 'TS', 'test1@gmail.com', '95485845855', '7584585', 'Test Address1', '12345678', '<p>Testing12</p>', 2, 1, 1, 7, 0, '2019-11-05 14:53:18', 1, '2019-11-05 09:37:49'),
(11, '0511802', '1', 'Test mail', 'Male', '2019-11-05', 'AM', '1', '2', '73', 'Hyderabad', 'TS', 'test77@gmail.com', '95485845855', '789456', 'Test address', '788887777', '<p>Test Question131311</p>\r\n\r\n<p>&nbsp;</p>', 1, 3, 2, 8, 0, '2019-11-05 15:26:39', 2, '2019-11-06 09:59:55'),
(12, '0611191', '5', 'Testing mail', 'Male', '2019-11-05', 'AM', '2', '3', '73', 'Hyderabad', 'TS', 'test1@gmail.com', '95485845855', '7584585', 'Test Address1', '122333', '<p>Test Q</p>', 2, 2, 2, 9, 0, '2019-11-06 12:16:51', 2, '2019-12-12 08:32:40'),
(13, '0404672', '17', 'Thakur Manohar Singh', 'Male', '1983-12-09', 'AM', '5', '1', '73', 'Adilabad', 'Telangana', 'thakurmanoharsinghmanu@gmail.com', '7382111607', '504001', 'Mig-91 New housing board colony, Adilabad', 'Abcd', 'When will I start my new ðŸ  house construction', 1, 1, 2, 10, 0, '2020-04-04 15:01:23', 0, '2020-04-04 20:01:23');

-- --------------------------------------------------------

--
-- Table structure for table `va_employees`
--

DROP TABLE IF EXISTS `va_employees`;
CREATE TABLE `va_employees` (
  `emp_id` int(11) NOT NULL,
  `emp_code` varchar(16) NOT NULL,
  `emp_fname` varchar(40) NOT NULL DEFAULT '',
  `emp_lname` varchar(40) NOT NULL DEFAULT '',
  `emp_dispname` varchar(225) NOT NULL DEFAULT '',
  `emp_username` varchar(100) NOT NULL DEFAULT '',
  `emp_password` varchar(100) NOT NULL DEFAULT '',
  `emp_type` tinyint(5) NOT NULL COMMENT '1-Developer, 2-Master Admin, 3-Application Users, 4-Employee',
  `emp_dept_id` int(11) NOT NULL,
  `emp_desg_id` int(11) NOT NULL DEFAULT '0',
  `emp_approver` int(11) NOT NULL DEFAULT '0',
  `emp_doj` date NOT NULL DEFAULT '0000-00-00',
  `emp_dor` date NOT NULL DEFAULT '0000-00-00',
  `emp_relieve` tinyint(4) NOT NULL COMMENT '1:Yes, 0:No',
  `emp_qualification` varchar(100) NOT NULL,
  `emp_experience` varchar(100) NOT NULL,
  `emp_previous_employment` varchar(255) NOT NULL,
  `emp_guardian` varchar(50) NOT NULL,
  `emp_gender` varchar(10) NOT NULL DEFAULT '',
  `emp_dob` date NOT NULL DEFAULT '0000-00-00',
  `emp_marital_status` tinyint(4) NOT NULL COMMENT '1-Single, 2-Married',
  `emp_avatar` varchar(96) NOT NULL,
  `emp_email` varchar(100) NOT NULL DEFAULT '0',
  `emp_per_email` varchar(100) NOT NULL,
  `emp_phone` varchar(16) NOT NULL DEFAULT '',
  `emp_per_phone` varchar(16) NOT NULL,
  `emp_pre_address` varchar(225) NOT NULL DEFAULT '',
  `emp_per_address` varchar(225) NOT NULL DEFAULT '',
  `emp_blood` varchar(10) NOT NULL,
  `emp_emg_contact` varchar(16) NOT NULL,
  `emp_nationality` varchar(20) NOT NULL,
  `emp_religion` varchar(20) NOT NULL,
  `emp_caste` varchar(25) NOT NULL,
  `emp_bank_accno` varchar(20) NOT NULL,
  `emp_bank_accname` varchar(50) NOT NULL,
  `emp_bank_name` varchar(30) NOT NULL,
  `emp_bank_ifsc` varchar(60) NOT NULL,
  `emp_pan` varchar(16) NOT NULL,
  `emp_aadhaar` varchar(16) NOT NULL,
  `emp_passport` varchar(20) NOT NULL,
  `emp_uan_no` varchar(20) NOT NULL,
  `emp_pf_no` varchar(20) NOT NULL,
  `emp_others` varchar(200) NOT NULL,
  `emp_privileges` text NOT NULL,
  `emp_delete` tinyint(4) NOT NULL COMMENT '1: Delete; 0: None',
  `emp_status` int(1) NOT NULL DEFAULT '1',
  `emp_order_by` int(3) NOT NULL,
  `emp_added_by` int(4) NOT NULL,
  `emp_added_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `emp_updated_by` int(4) NOT NULL,
  `emp_updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `va_employees`
--

INSERT INTO `va_employees` (`emp_id`, `emp_code`, `emp_fname`, `emp_lname`, `emp_dispname`, `emp_username`, `emp_password`, `emp_type`, `emp_dept_id`, `emp_desg_id`, `emp_approver`, `emp_doj`, `emp_dor`, `emp_relieve`, `emp_qualification`, `emp_experience`, `emp_previous_employment`, `emp_guardian`, `emp_gender`, `emp_dob`, `emp_marital_status`, `emp_avatar`, `emp_email`, `emp_per_email`, `emp_phone`, `emp_per_phone`, `emp_pre_address`, `emp_per_address`, `emp_blood`, `emp_emg_contact`, `emp_nationality`, `emp_religion`, `emp_caste`, `emp_bank_accno`, `emp_bank_accname`, `emp_bank_name`, `emp_bank_ifsc`, `emp_pan`, `emp_aadhaar`, `emp_passport`, `emp_uan_no`, `emp_pf_no`, `emp_others`, `emp_privileges`, `emp_delete`, `emp_status`, `emp_order_by`, `emp_added_by`, `emp_added_date`, `emp_updated_by`, `emp_updated_date`) VALUES
(1, 'ADM0001', 'WERP Developer', '', 'ADMIN', 'admin', 'QWRtaW5ANjc5OQ,,', 1, 1, 1, 0, '0000-00-00', '0000-00-00', 0, '', '', '', '', 'Male', '0000-00-00', 0, '', 'srinivas.raavi@bitragroup.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 1, 1, 0, '2018-01-26 10:00:00', 0, '2019-10-29 10:21:01'),
(2, 'ADM0002', 'Master', 'Admin', '', 'Astro', 'QHN0cm83ODk,', 2, 0, 0, 0, '0000-00-00', '0000-00-00', 0, '', '', '', '', 'Male', '1987-10-08', 0, '', 'info@bitragroup.com', '', '9876543210', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'MNG_UP|MNG_RTP|GAL_MNG|GAL_ARA|GAL_MDA|APP_MNG|BCP_NU|BCP_MU', 0, 1, 2, 1, '2019-02-16 11:40:32', 1, '2019-11-05 09:47:13');

-- --------------------------------------------------------

--
-- Table structure for table `va_employees_type`
--

DROP TABLE IF EXISTS `va_employees_type`;
CREATE TABLE `va_employees_type` (
  `empt_id` int(3) NOT NULL,
  `empt_type` varchar(50) NOT NULL,
  `empt_description` varchar(255) NOT NULL,
  `empt_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0-inactive, 1-active',
  `empt_order_by` int(3) NOT NULL,
  `empt_added_by` int(4) NOT NULL,
  `empt_added_date` datetime NOT NULL,
  `empt_updated_by` int(4) NOT NULL,
  `empt_updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `va_employees_type`
--

INSERT INTO `va_employees_type` (`empt_id`, `empt_type`, `empt_description`, `empt_status`, `empt_order_by`, `empt_added_by`, `empt_added_date`, `empt_updated_by`, `empt_updated_date`) VALUES
(1, 'Developer', 'Developer', 1, 1, 1, '2017-09-06 16:12:33', 1, '2017-09-11 03:24:21'),
(2, 'Master Admin', 'Master Admin', 1, 2, 1, '2017-09-04 07:17:18', 0, '2017-09-11 07:54:53'),
(3, 'Application Users', 'Application Users', 1, 3, 1, '2017-09-04 07:17:18', 0, '2017-09-13 01:16:56'),
(4, 'Member', 'Member', 1, 4, 1, '2017-09-04 07:17:18', 0, '2019-03-21 09:03:21');

-- --------------------------------------------------------

--
-- Table structure for table `va_gallery`
--

DROP TABLE IF EXISTS `va_gallery`;
CREATE TABLE `va_gallery` (
  `va_id` int(5) NOT NULL,
  `va_cat_id` int(4) NOT NULL,
  `va_title` varchar(100) NOT NULL,
  `va_path` varchar(150) NOT NULL,
  `va_status` tinyint(1) NOT NULL DEFAULT '1',
  `va_order_by` int(4) NOT NULL,
  `va_added_by` int(5) NOT NULL,
  `va_added_date` datetime NOT NULL,
  `va_updated_by` int(5) NOT NULL,
  `va_updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `va_gallery`
--

INSERT INTO `va_gallery` (`va_id`, `va_cat_id`, `va_title`, `va_path`, `va_status`, `va_order_by`, `va_added_by`, `va_added_date`, `va_updated_by`, `va_updated_date`) VALUES
(1, 1, 'Devadhayashakaki Aasthana Jyothishuni Sevalu Aavasaram Sharath Babu', '556964_1575883553.jpg', 2, 0, 1, '2019-10-25 11:19:14', 1, '2019-12-12 14:16:19'),
(9, 1, 'Goshala Abhivrudhi Medha Dhrushti Saarimchali', '963583_1575883677.jpg', 2, 1, 1, '2019-10-25 14:17:52', 1, '2019-12-12 14:16:14'),
(10, 1, 'Vasthu Rithya Aalayam Lo Marpulu', '37496_1575883792.jpg', 2, 2, 1, '2019-10-25 14:17:52', 1, '2019-12-12 14:16:07'),
(11, 2, 'Prachinakalam nundi Jyothisham pramukyatha', '349291_1575875091.jpg', 2, 1, 1, '2019-10-25 14:22:03', 1, '2019-12-12 13:32:32'),
(12, 2, 'Srisaila Devasthana Abhivrudhiki Suchanalu', '621025_1575875288.jpg', 2, 2, 1, '2019-10-28 14:15:02', 1, '2019-12-12 13:33:07'),
(13, 3, 'Title12', '580538_1573023610.jpg', 2, 1, 1, '2019-11-05 14:43:16', 1, '2019-12-09 09:16:53'),
(14, 3, 'test 123', '156875_1573022277.jpg', 2, 2, 1, '2019-11-05 15:37:14', 1, '2019-12-19 10:15:58'),
(15, 3, 'test', '487626_1573033133.jpg', 2, 3, 2, '2019-11-06 15:07:52', 2, '2019-12-09 09:16:59'),
(16, 1, 'à°¶à±à°°à±€à°¶à±ˆà°² à°¦à±‡à°µà°¸à±à°¥à°¾à°¨ à°—à±‹à°¶à°¾à°²à°²à±‹ à°—à±‹à°µà±à°²à°¤à±‹ 2017', '344841_1575883837.jpg', 1, 3, 1, '2019-11-21 18:47:14', 2, '2019-12-14 02:35:04'),
(17, 2, 'Pujyam Viswanath Sevaalu Prasamsaniyam', '587060_1575875602.jpg', 2, 3, 1, '2019-12-09 12:43:22', 0, '2019-12-12 13:34:00'),
(18, 2, 'Durga Temple Aasthana Jyothishulu Pujyam viswanath', '655072_1575875836.jpg', 2, 4, 1, '2019-12-09 12:47:16', 0, '2019-12-12 13:33:27'),
(19, 2, 'Vidya Abhivrudhiki maha saraswati yaagaalu', '287224_1575876059.jpg', 2, 5, 1, '2019-12-09 12:50:59', 0, '2019-12-12 13:33:33'),
(20, 2, 'Ksheera Rama Lingeshwara Kshetram Lo Siddhi Sankalpa Yagam', '63900_1575876586.jpg', 2, 6, 1, '2019-12-09 12:59:46', 0, '2019-12-12 13:34:18'),
(21, 2, 'Bhusthapam Tho Kosthaku Muppu 2016', '722492_1575876798.jpg', 1, 7, 1, '2019-12-09 13:03:18', 2, '2019-12-19 19:50:30'),
(22, 2, 'Viswanath Presents god vignesha Chitrapatam to CM', '822680_1575879656.jpg', 2, 8, 1, '2019-12-09 13:50:56', 0, '2019-12-12 13:31:40'),
(23, 2, 'Sudarshana Narasimha Yagam Prarambham', '408807_1575879873.jpg', 2, 9, 1, '2019-12-09 13:54:33', 0, '2019-12-12 13:31:30'),
(24, 2, 'Rastra Abhivrudhi ki Maha Rudra Yagam', '377547_1575880068.jpg', 2, 10, 1, '2019-12-09 13:57:48', 0, '2019-12-12 13:31:07'),
(25, 2, 'Omanni Nirvahistunna Pujyam Viswanath', '245255_1575880373.jpg', 2, 11, 1, '2019-12-09 14:02:23', 1, '2019-12-12 13:31:17'),
(26, 2, 'Appriciation 2018', '219247_1575880592.jpg', 1, 12, 1, '2019-12-09 14:05:50', 2, '2019-12-19 19:49:53'),
(27, 2, 'June 10 Nunchi August 13 Varaku Bhari varshalu 2018', '965401_1575880989.jpg', 1, 13, 1, '2019-12-09 14:13:09', 2, '2019-12-19 19:47:47'),
(28, 2, ' Viswanath said Jyothisyam about Weather 2019', '666080_1575881242.jpg', 1, 14, 1, '2019-12-09 14:17:22', 2, '2019-12-19 19:46:45'),
(29, 2, 'Bhaari Varshalu Pade Avakasam 2019', '671589_1575881416.jpg', 1, 15, 1, '2019-12-09 14:20:16', 2, '2019-12-19 19:45:59'),
(30, 2, 'Prachina Jyothishya Sastram Goppatanam 2019', '866614_1575881610.jpg', 1, 16, 1, '2019-12-09 14:23:30', 2, '2019-12-19 19:44:39'),
(31, 2, 'Appanna Aalaya Vaibhavam Kosam Suchanalu', '136180_1575881796.jpg', 2, 17, 1, '2019-12-09 14:26:36', 0, '2019-12-13 06:00:21'),
(32, 2, 'Viswanath About Pakistan,Turkey And Iran 2019', '102281_1575881968.jpg', 1, 18, 1, '2019-12-09 14:29:28', 2, '2019-12-19 18:53:43'),
(33, 2, 'Karnataka Lo Kumara Swamy Bhavithavyam', '86471_1575882053.jpg', 2, 19, 1, '2019-12-09 14:30:53', 0, '2019-12-12 13:35:32'),
(34, 2, 'Aadhunika Bharathadesam Lonu Jyothisyam Panichestundi', '882798_1575882199.jpg', 2, 20, 1, '2019-12-09 14:33:19', 0, '2019-12-12 12:48:14'),
(35, 2, 'Pakistan ni Vanikinchina Penu Bhukampam  2019', '530996_1575882413.jpg', 1, 21, 1, '2019-12-09 14:36:53', 2, '2019-12-19 19:43:28'),
(36, 2, 'Indian Space Research Organisation', '778437_1575882527.jpg', 2, 22, 1, '2019-12-09 14:38:47', 0, '2019-12-12 12:43:14'),
(37, 2, ' Viswanath Told About Pani Tufan 2019', '45355_1575882677.jpg', 1, 23, 1, '2019-12-09 14:41:17', 2, '2019-12-19 19:43:06'),
(38, 2, 'Viswanath Said About PSLV C45 2019', '619085_1575882849.jpg', 1, 24, 1, '2019-12-09 14:44:09', 2, '2019-12-19 19:41:51'),
(39, 1, 'à°®à±à°–à±à°¯à°®à°‚à°¤à±à°°à°¿ à°—à°¾à°°à°¿à°¤à±‹ à°®à±€à°Ÿà°¿à°‚à°—à± 2016', '665126_1575883889.jpg', 1, 4, 1, '2019-12-09 15:01:29', 2, '2019-12-14 02:32:33'),
(40, 1, 'à°¶à±à°°à±€à°¶à±ˆà°²à°‚à°²à±‹ à°®à°¹à°¾à°ªà±à°°à°¦à±‹à°· à°‰à°¤à±à°¸à°µà°‚ 2018', '143366_1575883967.jpg', 1, 5, 1, '2019-12-09 15:02:47', 2, '2019-12-14 02:34:03'),
(41, 1, 'à°¶à±à°°à±€à°¶à±ˆà°² à°¦à±‡à°µà°¸à±à°¥à°¾à°¨à°‚ à°²à±‹ 2017', '317173_1575884045.jpg', 1, 6, 1, '2019-12-09 15:04:05', 2, '2019-12-14 02:34:38'),
(42, 1, 'à°¸à°¿à°‚à°¹à°¾à°šà°²à°‚à°²à±‹ à°¸à±à°¦à°°à±à°¶à°¨ à°¯à°¾à°—à°‚ 2017', '23807_1575884093.jpg', 1, 7, 1, '2019-12-09 15:04:53', 2, '2019-12-14 02:28:25'),
(43, 1, 'à°°à°˜à±à°°à°¾à°® à°•à±ƒà°·à±à°£à°‚à°°à°¾à°œà± à°—à°¾à°°à°¿à°¤à±‹', '765182_1575884145.jpg', 1, 8, 1, '2019-12-09 15:05:45', 2, '2019-12-14 02:27:46'),
(44, 1, 'à°•à±ƒà°·à±à°£à°¾ à°ªà±à°·à±à°•à°°à°¾à°²à± 2016 ', '538747_1575884187.jpg', 1, 9, 1, '2019-12-09 15:06:27', 2, '2019-12-14 02:24:52'),
(45, 1, 'à°•à±ƒà°·à±à°£à°¾ à°ªà±à°·à±à°•à°°à°¾à°²à± 2016 à°²à±‹', '188842_1575884229.jpg', 1, 10, 1, '2019-12-09 15:07:09', 2, '2019-12-14 02:23:39'),
(46, 1, '2013à°ªà°¾à°¦à°¯à°¾à°¤à±à°°à°²à±‹à°šà°‚à°¦à±à°°à°¬à°¾à°¬à±à°—à°¾à°°à°¿à°¤à±‹à°¸à°¨à±à°®à°¾à°¨à°‚', '490467_1575884278.jpg', 1, 11, 1, '2019-12-09 15:07:58', 2, '2019-12-14 02:22:35'),
(47, 1, 'à°¸à°‚à°ªà±‚à°°à±à°£ à°¸à±à°µà°°à±à°£à°•à°µà°š à°¸à°®à°°à±à°ªà°£ à°®à°¹à±‹à°¤à±à°¸à°µà°‚', '453602_1575884331.jpg', 1, 12, 1, '2019-12-09 15:08:51', 2, '2019-12-14 02:11:24'),
(48, 1, 'à°®à±à°–à±à°¯à°®à°‚à°¤à±à°°à°¿ à°—à°¾à°°à°¿à°¤à±‹ à°®à±€à°Ÿà°¿à°‚à°—à±à°²à±‹ 2016', '744419_1575884373.jpg', 1, 13, 1, '2019-12-09 15:09:33', 2, '2019-12-14 02:08:13'),
(49, 1, 'à°®à±à°–à±à°¯à°®à°‚à°¤à±à°°à°¿ à°—à°¾à°°à°¿à°¤à±‹ 2016', '676520_1575884429.jpg', 1, 14, 1, '2019-12-09 15:10:29', 2, '2019-12-14 02:05:51'),
(50, 1, 'à°¸à°‚à°ªà±‚à°°à±à°£ à°¸à±à°µà°°à±à°£à°•à°µà°š à°¸à°®à°°à±à°ªà°£ à°®à°¹à±‹à°¤à±à°¸à°µà°‚ 2016', '94549_1575884474.jpg', 1, 15, 1, '2019-12-09 15:11:12', 2, '2019-12-14 02:03:00'),
(51, 1, 'à°¬à°¾à°²à±€à°µà±à°¡à± à°¸à°¿à°¨à±€ à°¨à°Ÿà°¿ à°—à±Œà°¤à°®à°¿ 2019', '337923_1575884523.jpg', 1, 16, 1, '2019-12-09 15:12:02', 2, '2019-12-14 02:01:37'),
(52, 1, 'à°ªà°¦à°µà±€ à°¸à±à°µà±€à°•à°¾à°° à°®à°¹à±‹à°¤à±à°¸à°µà°‚ 2016 march', '479169_1575884566.jpg', 1, 17, 1, '2019-12-09 15:12:46', 2, '2019-12-13 22:36:19'),
(53, 1, '2014  à°¸à±€à°Žà°‚ à°šà°‚à°¦à±à°°à°¬à°¾à°¬à± à°¨à°¾à°¯à±à°¡à± ', '875829_1575884603.jpg', 1, 18, 1, '2019-12-09 15:13:23', 2, '2019-12-13 22:33:52'),
(54, 1, 'à°¬à°¾à°¹à±à°¬à°²à°¿ cinema à°°à°šà°¯à°¿à°¤ à°µà°¿à°œà°¯à±‡à°‚à°¦à±à°°à°ªà±à°°à°¸à°¾à°¦à±', '132968_1575884655.jpg', 1, 19, 1, '2019-12-09 15:14:15', 2, '2019-12-14 02:39:28'),
(55, 1, '2017 à°‰à°—à°¾à°¦à°¿ à°‰à°¤à±à°¸à°µà°¾à°²à± à°¸à±€à°Žà°‚ à°šà°‚à°¦à±à°°à°¬à°¾à°¬à± ', '401790_1575884701.jpg', 1, 20, 1, '2019-12-09 15:15:01', 2, '2019-12-13 22:28:07'),
(56, 1, 'à°ªà°¦à°µà±€ à°¸à±à°µà±€à°•à°¾à°° à°®à°¹à±‹à°¤à±à°¸à°µà°‚ 2016', '822021_1575884769.jpg', 1, 21, 1, '2019-12-09 15:16:08', 2, '2019-12-13 22:26:14'),
(57, 1, 'à°¬à°‚à°¡à°¿ à°ªà°¾à°°à±à°¥à°¸à°¾à°°à°¥à°¿ à°°à±†à°¡à±à°¡à°¿ à°—à°¾à°°à°¿à°¤à±‹ 2016', '566387_1575884819.jpg', 1, 22, 1, '2019-12-09 15:16:59', 2, '2019-12-14 02:10:16'),
(58, 4, 'Karnataka lo Kumaraswamy Bhavitavyam', '636567_1575957249.jpg', 2, 1, 1, '2019-12-10 11:24:08', 0, '2019-12-12 15:40:53'),
(59, 4, 'Pujyam Viswanath About GSAT 6A', '273274_1575957411.jpg', 2, 2, 1, '2019-12-10 11:26:51', 2, '2019-12-12 15:40:49'),
(60, 4, 'Pedai Toofan Gamanam Anchana', '186010_1575958080.jpg', 2, 3, 1, '2019-12-10 11:38:00', 0, '2019-12-12 15:41:03'),
(61, 4, 'Durgamma Ku Swarna Kavacham', '670864_1575958195.jpg', 2, 4, 1, '2019-12-10 11:39:55', 0, '2019-12-12 15:41:08'),
(62, 4, 'Durgamma ku Hetero swarnabharanalu', '368543_1575958336.jpg', 2, 5, 1, '2019-12-10 11:42:16', 0, '2019-12-12 15:41:11'),
(63, 4, 'Swarna Kavachalakruta Durga Devi ', '773912_1575958527.jpg', 2, 6, 1, '2019-12-10 11:45:27', 0, '2019-12-12 15:41:15'),
(64, 4, 'Swarna Kavachalakruta Durga Devi Darshanam', '735810_1575958704.jpg', 2, 7, 1, '2019-12-10 11:48:24', 0, '2019-12-12 15:41:18'),
(65, 3, 'rituals for agriculture 2018', '919123_1576155446.jpg', 1, 4, 2, '2019-12-12 18:27:26', 2, '2019-12-19 22:34:43'),
(66, 3, 'à°à°à°Žà°¸à± à°…à°§à°¿à°•à°¾à°°à°¿ à°­à°°à°¤à± à°—à±à°ªà±à°¤à°¾ à°ªà±à°°à°¸à°‚à°¶à°²à± 2018', '684725_1576156524.jpg', 1, 5, 2, '2019-12-12 18:45:24', 2, '2019-12-19 22:33:24'),
(67, 3, ' à°ªà±à°°à°¸à°‚à°¶à°²à± 2018', '358202_1576157944.jpg', 1, 6, 2, '2019-12-12 19:09:04', 2, '2019-12-19 22:32:41'),
(68, 3, ' à°ªà±à°°à°¸à°‚à°¶à°²à± 2019', '564820_1576157944.jpg', 1, 7, 2, '2019-12-12 19:09:04', 2, '2019-12-19 22:32:21'),
(69, 3, 'kumaraswamy cm 2018', '67319_1576158016.jpg', 1, 8, 2, '2019-12-12 19:10:16', 2, '2019-12-19 22:29:55'),
(70, 3, 'rudra yagam srisailam 2018', '846170_1576158016.jpg', 1, 9, 2, '2019-12-12 19:10:16', 2, '2019-12-19 22:28:10'),
(71, 3, 'saraswathi yagam 2016', '425795_1576158139.jpg', 1, 10, 2, '2019-12-12 19:12:19', 2, '2019-12-19 22:27:45'),
(72, 3, 'siddha sankalpam 2016', '453415_1576158139.jpg', 1, 11, 2, '2019-12-12 19:12:19', 2, '2019-12-19 22:26:10'),
(73, 3, 'simhachalam vastu 2017', '856591_1576158246.jpg', 1, 12, 2, '2019-12-12 19:14:06', 2, '2019-12-19 22:25:52'),
(74, 3, 'sudarshan yaga 2019', '232317_1576158246.jpg', 1, 13, 2, '2019-12-12 19:14:06', 2, '2019-12-19 22:25:32'),
(75, 3, 'vinayaka cm 2016', '67514_1576158297.jpg', 1, 14, 2, '2019-12-12 19:14:57', 2, '2019-12-19 22:24:33'),
(76, 3, 'complete sudharshana yagam 2019', '785557_1576158613.jpg', 1, 15, 2, '2019-12-12 19:20:13', 2, '2019-12-19 22:23:56'),
(77, 3, 'à°¸à°¿à°¨à°¿à°®à°¾ à°¯à°¾à°•à±à°Ÿà°°à± à°¶à°°à°¤à± à°¬à°¾à°¬à± à°ªà±à°°à°¶à°‚à°¸à°²à± 2019', '321996_1576160354.jpg', 1, 16, 2, '2019-12-12 19:49:14', 2, '2019-12-19 22:22:50'),
(78, 3, 'à°¶à±à°°à±€à°¶à±ˆà°²à°‚ à°µà°¾à°¸à±à°¤à± 2017', '580701_1576160354.jpg', 1, 17, 2, '2019-12-12 19:49:14', 2, '2019-12-19 22:22:24'),
(79, 3, 'à°¶à±à°°à±€à°¶à±ˆà°²à°‚ à°—à±‹à°¶à°¾à°² 2018', '668578_1576160426.jpg', 1, 18, 2, '2019-12-12 19:50:26', 2, '2019-12-19 22:21:54'),
(80, 4, ' PSLV C- 48 à°‰à°ªà°—à±à°°à°¹ à°µà°¾à°¹à°•à°¨à±Œà°• à°—à±à°°à°¾à°‚à°¡à± à°¸à°•à±à°¸à±†à°¸à±', '833403_1576165726.jpeg', 2, 8, 2, '2019-12-12 21:16:59', 2, '2019-12-13 06:45:14'),
(81, 3, 'GREAT Pournami Festival in Indrakeeladri 2016', '323199_1576173363.jpg', 1, 19, 2, '2019-12-12 23:26:03', 2, '2019-12-19 22:21:12'),
(82, 4, 'PSLV C-48 SUCCESSFUL', '884887_1576217738.jpg', 2, 9, 2, '2019-12-13 11:45:38', 0, '2020-10-08 07:22:09'),
(83, 4, 'supreme court cancelled all revies', '702988_1576218397.jpg', 2, 10, 2, '2019-12-13 11:56:37', 0, '2020-10-08 07:21:58'),
(84, 4, 'juttiga temple', '14359_1576218592.jpg', 2, 11, 2, '2019-12-13 11:59:52', 0, '2020-01-17 07:55:55'),
(85, 4, 'PSLV C-48  grand SUCCESSFUL', '784718_1576219503.jpg', 2, 12, 2, '2019-12-13 12:15:03', 0, '2019-12-13 15:47:08'),
(86, 3, 'petai tufan', '816094_1576220205.jpg', 2, 20, 2, '2019-12-13 12:26:45', 1, '2019-12-18 18:23:01'),
(87, 3, 'pornami maha puja 2016', '340120_1576220205.jpg', 1, 21, 2, '2019-12-13 12:26:45', 2, '2019-12-19 22:19:46'),
(88, 2, 'petai tufan 2018', '216957_1576220394.jpg', 1, 25, 2, '2019-12-13 12:29:54', 2, '2019-12-19 19:40:32'),
(89, 2, 'Gsat 6A 2018', '285500_1576220500.jpg', 1, 26, 2, '2019-12-13 12:31:40', 2, '2019-12-19 19:39:54'),
(90, 4, 'à°­à±€à°®à°µà°°à°‚  à°­à±€à°®à±‡à°¶à±à°µà°° à°¸à±à°µà°¾à°®à°¿ à°¦à±‡à°µà°¸à±à°¥à°¾à°¨à°‚', '127411_1576226495.jpg', 2, 13, 2, '2019-12-13 14:11:35', 2, '2020-01-17 07:55:34'),
(91, 4, 'Ram madhav garu', '259230_1576227137.jpg', 2, 14, 2, '2019-12-13 14:22:17', 0, '2020-01-17 07:55:25'),
(92, 4, 'à°ªà°‚à°šà°¾à°°à°¾à°® à°•à±à°·à±‡à°¤à±à°°à°‚ à°­à±€à°®à°µà°°à°‚ à°¶à°¿à°µà°¾à°²à°¯à°‚ à°²à±‹', '459354_1576227461.jpg', 2, 15, 2, '2019-12-13 14:27:41', 0, '2020-01-17 07:55:17'),
(93, 4, 'mavullamma temple bhimavaram', '383206_1576228776.jpg', 2, 16, 2, '2019-12-13 14:49:36', 0, '2020-01-17 07:55:41'),
(94, 4, 'à°ªà°‚à°šà°¾à°°à°¾à°® à°•à±à°·à±‡à°¤à±à°°à°‚ à°ªà°¾à°²à°•à±Šà°²à±à°²à±', '989986_1576229264.jpg', 2, 17, 2, '2019-12-13 14:57:44', 0, '2020-01-08 17:13:41'),
(95, 4, 'à°ªà°‚à°šà°¾à°°à°¾à°® à°•à±à°·à±‡à°¤à±à°°à°‚ à°­à±€à°®à°µà°°à°‚', '251893_1576229633.jpg', 2, 18, 2, '2019-12-13 15:03:53', 0, '2020-01-17 07:55:05'),
(96, 2, 'Govt of A.P Appriciation 2019', '191124_1576229951.jpg', 1, 27, 2, '2019-12-13 15:09:11', 2, '2019-12-19 19:38:39'),
(97, 2, 'NASA Solar parker probe  2018', '576816_1576230110.jpg', 1, 28, 2, '2019-12-13 15:11:50', 2, '2019-12-19 18:55:15'),
(98, 3, 'prediction 2018', '726814_1576230393.jpg', 1, 22, 2, '2019-12-13 15:16:33', 2, '2019-12-19 22:18:59'),
(99, 3, 'Maha Pournami Puja 2017', '503523_1576231307.jpg', 1, 23, 2, '2019-12-13 15:31:46', 2, '2019-12-19 22:17:38'),
(100, 3, 'à°ªà±à°°à°¶à°‚à°¸à°²à± 2018', '858307_1576231807.jpg', 1, 24, 2, '2019-12-13 15:40:07', 2, '2019-12-19 22:16:43'),
(101, 3, 'tripurantakam 2018', '731934_1576232178.jpg', 1, 25, 2, '2019-12-13 15:46:18', 2, '2019-12-19 22:15:53'),
(102, 4, 'ISRO PSLV C-48  grand SUCCESSFULL', '248429_1576252178.jpg', 2, 19, 2, '2019-12-13 21:19:38', 0, '2020-10-08 07:21:44'),
(103, 3, 'Test_media_gal', '607142_1576652789.jpg', 2, 26, 1, '2019-12-18 12:36:29', 0, '2019-12-18 07:06:47'),
(104, 3, 'Green Temples 2018', '381056_1576735590.jpg', 1, 27, 2, '2019-12-19 11:36:30', 2, '2019-12-19 22:14:55'),
(105, 3, 'antervedi temple visit 2017', '427131_1576735856.jpg', 1, 28, 2, '2019-12-19 11:40:56', 2, '2019-12-19 22:14:26'),
(106, 3, 'antervedi temple visit1', '973098_1576735856.jpg', 2, 29, 2, '2019-12-19 11:40:56', 0, '2019-12-19 06:12:28'),
(107, 3, 'vastu of simhachalam temple 2017', '263644_1576736071.jpg', 1, 30, 2, '2019-12-19 11:44:31', 2, '2019-12-19 22:13:55'),
(108, 3, 'Maha Rudra Yagam in SRISAILAM', '24912_1576736071.jpg', 2, 31, 2, '2019-12-19 11:44:31', 0, '2019-12-19 10:12:46'),
(109, 3, 'Rudra Yagam1 2019', '135658_1576736346.jpg', 1, 32, 2, '2019-12-19 11:49:06', 2, '2019-12-19 22:12:18'),
(110, 3, 'sudarshan yagam in simhachalam 2019', '112620_1576736346.jpg', 1, 33, 2, '2019-12-19 11:49:06', 2, '2019-12-19 22:10:34'),
(111, 3, 'srisailam 2018', '975716_1576736567.jpg', 1, 34, 2, '2019-12-19 11:52:47', 2, '2019-12-19 22:09:55'),
(112, 3, 'ARUNA YAGAM IN ARASAVALLI 2019', '10249_1576736567.jpg', 1, 35, 2, '2019-12-19 11:52:47', 2, '2019-12-19 22:09:17'),
(113, 3, 'about samhithas 2016', '492001_1576737061.png', 1, 36, 2, '2019-12-19 12:01:01', 2, '2019-12-19 22:08:41'),
(114, 3, 'maha ganapathi homam 2016', '759193_1576737061.jpg', 1, 37, 2, '2019-12-19 12:01:01', 2, '2019-12-19 22:07:46'),
(115, 3, 'saraswathi yagam in bvrm 2016', '738972_1576737476.jpg', 1, 38, 2, '2019-12-19 12:07:56', 2, '2019-12-19 22:07:02'),
(116, 3, 'saraswathi yagam pithapuram 2016', '811426_1576737476.jpg', 1, 39, 2, '2019-12-19 12:07:56', 2, '2019-12-19 22:06:42'),
(117, 3, 'saraswathi yagam in pithapuram 2016', '884530_1576737918.jpg', 1, 40, 2, '2019-12-19 12:15:18', 2, '2019-12-19 22:06:04'),
(118, 3, 'maha ganapathi homam in draksharamam 2016', '670448_1576737918.jpg', 1, 41, 2, '2019-12-19 12:15:18', 2, '2019-12-19 21:52:01'),
(119, 3, 'sudarshan yagam 2019', '421166_1576738035.jpg', 1, 42, 2, '2019-12-19 12:17:15', 2, '2019-12-19 21:50:50'),
(120, 3, 'Green Temples in AP', '846595_1576738035.jpg', 2, 43, 2, '2019-12-19 12:17:15', 0, '2019-12-19 07:11:56'),
(121, 3, 'Green Temples concept 2018', '308221_1576739712.jpg', 1, 44, 2, '2019-12-19 12:45:12', 2, '2019-12-19 21:49:51'),
(122, 2, 'PSLV C-48  grand SUCCESS 2019', '410742_1576740064.jpg', 1, 29, 2, '2019-12-19 12:51:02', 2, '2019-12-19 18:54:43'),
(123, 3, 'viswanath predictions 2', '224157_1576749884.jpg', 1, 45, 2, '2019-12-19 15:34:44', 0, '2019-12-19 10:04:44'),
(124, 3, 'viswanath predictions 1', '625712_1576749885.jpg', 1, 46, 2, '2019-12-19 15:34:44', 0, '2019-12-19 10:04:45'),
(125, 3, 'Maha Rudra Yagam in SRISAILAM temple 2018', '713245_1576750514.jpg', 1, 47, 2, '2019-12-19 15:45:14', 2, '2019-12-19 22:38:48'),
(126, 3, 'sudarshan yagam in simhachalam Temple 2019', '981811_1576750603.jpg', 2, 48, 2, '2019-12-19 15:46:43', 2, '2019-12-21 08:37:07'),
(127, 1, ' K Satyanarayana garu 2016', '79205_1576910621.jpg', 1, 23, 2, '2019-12-21 12:13:41', 2, '2019-12-21 18:16:35'),
(128, 1, 'K SN GARU 2016', '603323_1576910709.jpg', 2, 24, 2, '2019-12-21 12:15:09', 0, '2019-12-21 06:45:38'),
(129, 1, 'PLANTATION IN TEMPLES 2016', '852962_1576911033.jpg', 1, 25, 2, '2019-12-21 12:20:33', 0, '2019-12-21 06:50:33'),
(130, 3, 'Green temples 2016', '490214_1576915094.jpg', 1, 49, 2, '2019-12-21 13:28:14', 0, '2019-12-21 07:58:14'),
(131, 1, 'à°ªà°¦à°µà±€ à°¸à±à°µà±€à°•à°¾à°° à°®à°¹à±‹à°¤à±à°¸à°µà°‚ 18 march 2016', '120070_1576915649.jpg', 1, 26, 2, '2019-12-21 13:37:29', 2, '2019-12-21 19:37:56'),
(132, 1, 'ainavilli1 2016', '904137_1576916239.jpg', 1, 27, 2, '2019-12-21 13:47:19', 0, '2019-12-21 08:17:19'),
(133, 1, 'dwarakatirumala 2017', '351870_1576916569.jpg', 1, 28, 2, '2019-12-21 13:52:49', 0, '2019-12-21 08:22:49'),
(134, 3, 'sudarshana yagam in simhachalam Temple 2019', '578226_1576917526.jpg', 1, 50, 2, '2019-12-21 14:08:46', 0, '2019-12-21 08:38:46'),
(135, 1, 'simhachalam 2017 ', '116688_1576917863.jpg', 1, 29, 2, '2019-12-21 14:14:23', 0, '2019-12-21 08:44:23'),
(136, 1, 'simhachalam1 2017', '682916_1576917864.jpg', 1, 30, 2, '2019-12-21 14:14:23', 0, '2019-12-21 08:44:24'),
(137, 1, 'saraswathi yagam pitapuram 2016', '826573_1576918307.jpg', 1, 31, 2, '2019-12-21 14:21:46', 0, '2019-12-21 08:51:47'),
(138, 1, 'Sri Renukamata shakti peetam, Maharastra', '60677_1577514587.jpg', 1, 32, 2, '2019-12-28 11:59:47', 0, '2019-12-28 06:29:47'),
(139, 1, 'srisailam temple 2016 feeding cow', '557485_1577514970.jpg', 1, 33, 2, '2019-12-28 12:06:10', 0, '2019-12-28 06:36:10'),
(140, 1, 'srisailam goshala 2017', '82232_1577514970.jpg', 1, 34, 2, '2019-12-28 12:06:10', 0, '2019-12-28 06:36:10'),
(141, 1, 'srisailam temple 2018', '96537_1577515222.jpg', 1, 35, 2, '2019-12-28 12:10:22', 0, '2019-12-28 06:40:23'),
(142, 1, 'srisailam temple1 2018', '295898_1577515223.jpg', 1, 36, 2, '2019-12-28 12:10:22', 0, '2019-12-28 06:40:23'),
(143, 1, 'kotipalli goshala 2017', '368235_1577515565.jpg', 1, 37, 2, '2019-12-28 12:16:05', 0, '2019-12-28 06:46:05'),
(144, 1, 'sudarshana yagam in antervedi 2017', '920918_1577516349.jpg', 1, 38, 2, '2019-12-28 12:29:09', 0, '2019-12-28 06:59:09'),
(145, 1, 'sudarshana yagam1 in antevedi 2017', '386501_1577516349.jpg', 1, 39, 2, '2019-12-28 12:29:09', 0, '2019-12-28 06:59:09'),
(146, 1, 'karthikadeepam in srisailam 2017', '359677_1577516662.jpg', 1, 40, 2, '2019-12-28 12:34:22', 0, '2019-12-28 07:04:22'),
(147, 1, 'srisailam 2017', '709228_1577516662.jpg', 1, 41, 2, '2019-12-28 12:34:22', 0, '2019-12-28 07:04:22'),
(148, 1, 'sudarshan yagam in simhachalam 2017', '907156_1577516966.jpg', 1, 42, 2, '2019-12-28 12:39:26', 0, '2019-12-28 07:09:26'),
(149, 1, 'sudarshan yagam in simhachalam1 2017', '51457_1577516966.jpg', 1, 43, 2, '2019-12-28 12:39:26', 0, '2019-12-28 07:09:26'),
(150, 1, 'atirudra yagam in srisailam 2017', '660327_1577518306.jpg', 1, 44, 2, '2019-12-28 13:01:46', 0, '2019-12-28 07:31:46'),
(151, 1, 'atirudra yagamm in srisailam 2017', '756883_1577518306.jpg', 1, 45, 2, '2019-12-28 13:01:46', 0, '2019-12-28 07:31:46'),
(152, 1, 'LAKSHA GARIKA PUJA', '735126_1577798369.jpg', 1, 46, 2, '2019-12-31 18:49:29', 0, '2019-12-31 13:19:30'),
(153, 1, 'LAKASHA GARIKA PUJA 2017', '393607_1577798819.jpg', 1, 47, 2, '2019-12-31 18:56:59', 0, '2019-12-31 13:26:59'),
(154, 1, 'Maha ganapathi yagam in mavullamma temple 2016', '498071_1577859266.jpg', 1, 48, 2, '2020-01-01 11:44:26', 0, '2020-01-01 06:14:28'),
(155, 1, 'Maha ganapathi yagam1 in mavullamma temple 2016', '962831_1577859268.jpg', 1, 49, 2, '2020-01-01 11:44:26', 0, '2020-01-01 06:14:28'),
(156, 1, 'maha ganapthi yagam in à°ªà°‚à°šà°¾à°°à°¾à°® à°•à±à°·à±‡à°¤à±à°°à°‚ palakollu 2016', '221396_1577861220.jpg', 1, 50, 2, '2020-01-01 12:17:00', 2, '2020-01-04 18:48:58'),
(157, 1, 'à°ªà°‚à°šà°¾à°°à°¾à°® à°•à±à°·à±‡à°¤à±à°°à°‚ palakollu 2016', '689288_1578035725.jpg', 1, 51, 2, '2020-01-03 12:45:25', 0, '2020-01-03 07:15:25'),
(158, 1, 'ganapathi yagam in dwarakatirumala temple', '886538_1578120957.jpg', 1, 52, 2, '2020-01-04 12:25:57', 0, '2020-01-04 06:55:57'),
(159, 1, ' IN GOSHALA DWARAKATIRUMALA TEMPLE 2016', '570179_1578121431.jpg', 1, 53, 2, '2020-01-04 12:33:51', 2, '2020-01-04 18:34:49'),
(160, 1, 'maha ganapathi homam in ainavilli ganapathi temple 2016', '724504_1578293828.jpg', 1, 54, 2, '2020-01-06 12:27:08', 0, '2020-01-06 06:57:08'),
(161, 1, 'maha ganapathi yagam in à°ªà°‚à°šà°¾à°°à°¾à°® à°•à±à°·à±‡à°¤à±à°°à°‚ draksharamam 2016', '844708_1578294437.jpg', 1, 55, 2, '2020-01-06 12:37:17', 0, '2020-01-06 07:07:17'),
(162, 1, 'maha ganapathi yagam1 in à°ªà°‚à°šà°¾à°°à°¾à°® à°•à±à°·à±‡à°¤à±à°°à°‚ draksharamam 2016', '590421_1578294437.jpg', 1, 56, 2, '2020-01-06 12:37:17', 0, '2020-01-06 07:07:17'),
(163, 1, 'à°ªà°‚à°šà°¾à°°à°¾à°® à°•à±à°·à±‡à°¤à±à°°à°‚ draksharamam 2016', '100571_1578294550.jpg', 2, 57, 2, '2020-01-06 12:39:10', 0, '2020-01-06 07:12:18'),
(164, 1, 'à°ªà°‚à°šà°¾à°°à°¾à°® à°•à±à°·à±‡à°¤à±à°°à°‚ draksharamamm 2016', '54435_1578294550.jpg', 2, 58, 2, '2020-01-06 12:39:10', 0, '2020-01-06 07:12:33'),
(165, 4, 'severe cold wave hits north india', '375197_1578504287.jpg', 2, 20, 2, '2020-01-08 22:54:47', 0, '2020-10-08 07:21:24'),
(166, 4, 'recorded low temparatures in uttarandhra dec 2019', '184784_1578504476.jpg', 2, 21, 2, '2020-01-08 22:57:56', 2, '2020-10-08 07:21:09'),
(167, 1, 'maha saraswathi yagam muramalla 2016', '737581_1578640761.jpg', 1, 59, 2, '2020-01-10 12:49:21', 0, '2020-01-10 07:19:21'),
(168, 1, 'maha saraswathi yagam muramalla1 2016', '961949_1578640761.jpg', 1, 60, 2, '2020-01-10 12:49:21', 0, '2020-01-10 07:19:22'),
(169, 1, 'maha saraswathi yagam bhimavaram 2016', '435813_1578641450.jpg', 1, 61, 2, '2020-01-10 13:00:50', 0, '2020-01-10 07:30:50'),
(170, 1, 'mavullamma temple à°­à±€à°®à°µà°°à°‚', '965412_1578641766.jpg', 1, 62, 2, '2020-01-10 13:06:06', 0, '2020-01-10 07:36:06'),
(171, 1, 'with AP CM 2016', '50251_1578722699.jpg', 1, 63, 2, '2020-01-11 11:34:59', 0, '2020-01-11 06:04:59'),
(172, 1, 'SRI NAGARESWARA SWAMI TEMPLE PENUGOND 2106', '399862_1578724273.jpg', 1, 64, 2, '2020-01-11 12:01:13', 0, '2020-01-11 06:31:13'),
(173, 1, 'SRI NAGARESWARA SWAMII TEMPLE PENUGOND 2106', '726441_1578724274.jpg', 1, 65, 2, '2020-01-11 12:01:13', 0, '2020-01-11 06:31:14'),
(174, 1, 'KOTASATTEAMMA TEMPLE NIDADAVOLE 2016', '211535_1578727350.jpg', 1, 66, 2, '2020-01-11 12:52:30', 0, '2020-01-11 07:22:30'),
(175, 1, 'KOTASATTEAMMA TEMPLE1 NIDADAVOLE 2016', '476114_1578727350.jpg', 1, 67, 2, '2020-01-11 12:52:30', 0, '2020-01-11 07:22:31'),
(176, 3, 'Ayodhya Prediction 2019', '725574_1578893053.jpg', 1, 51, 2, '2020-01-13 10:54:13', 0, '2020-01-13 05:24:13'),
(177, 1, 'with Endowments Minister sri p.manikyalarao 2017', '646805_1578900186.jpg', 1, 68, 2, '2020-01-13 12:53:06', 0, '2020-01-13 07:23:06'),
(178, 1, 'wwith Endowments Minister sri p.manikyalarao 2017', '30859_1578900186.jpg', 1, 69, 2, '2020-01-13 12:53:06', 0, '2020-01-13 07:23:06'),
(179, 4, ' à°ªà°Ÿà±à°Ÿà°¿à°¸à±€à°® à°®à°¹à°¾ à°•à±à°·à±‡à°¤à±à°°à°‚ 15 jan 2020', '286071_1579248477.jpg', 2, 22, 2, '2020-01-17 13:34:57', 2, '2020-10-08 07:20:59'),
(180, 4, 'snow storm in jammu & kashmir jan 2020 ', '480274_1579248952.jpg', 2, 23, 2, '2020-01-17 13:45:52', 0, '2020-01-18 07:14:39'),
(181, 4, 'supreme court sensational judgment on  ayodhaya 2019', '295163_1579251216.jpg', 1, 24, 2, '2020-01-17 14:23:34', 2, '2020-01-17 20:24:43'),
(182, 1, 'atirudra maha yagam in annavaram temple 2016', '55142_1579252505.jpg', 1, 70, 2, '2020-01-17 14:45:05', 0, '2020-01-17 09:15:06'),
(183, 1, 'atirudra yagam in amuvulamma temple bhimavaram 2016', '489819_1579253034.jpg', 1, 71, 2, '2020-01-17 14:53:53', 0, '2020-01-17 09:23:54'),
(184, 1, 'atirudra maha yagam in draksharamma temple 2016', '357563_1579253586.jpg', 1, 72, 2, '2020-01-17 15:03:05', 0, '2020-01-17 09:33:06'),
(185, 1, 'atirudra maha yagam in kotappakonda temple 2016', '168377_1579254815.jpg', 1, 73, 2, '2020-01-17 15:23:35', 0, '2020-01-17 09:53:35'),
(186, 4, 'snow storm in jammu & kashmir 14 jan 2020 ', '801578_1579331745.jpeg', 2, 25, 2, '2020-01-18 12:45:44', 0, '2020-10-08 07:20:40'),
(187, 4, 'gsat 30 successful 17 jan 2020', '456737_1579331911.jpeg', 2, 26, 2, '2020-01-18 12:48:31', 0, '2020-10-08 07:20:29'),
(188, 4, 'à°°à°¾à°œà°•à±€à°¯ à°µà°¿à°µà°¾à°¦à°‚à°—à°¾ à°¸à°¾à°¯à°¿ à°œà°¨à±à°®à°­à±‚à°®à°¿ 17 à°œà°¨à°µà°°à°¿', '105669_1579332190.jpeg', 2, 27, 2, '2020-01-18 12:53:10', 0, '2020-10-08 07:20:13'),
(189, 4, 'NASA successfully launched solar orbiter 2020 feb 9', '196225_1581947969.jpg', 2, 28, 2, '2020-02-17 19:29:29', 0, '2020-10-08 07:19:59'),
(190, 4, 'pithapuram 10 shakthi peetham visit feb 2020', '434462_1582033307.jpg', 2, 29, 2, '2020-02-18 19:11:47', 0, '2020-10-08 07:19:48'),
(191, 4, 'SpaceX CRS-20 à°µà°¿à°œà°¯à°µà°‚à°¤à°‚à°—à°¾ à°‡à°‚à°Ÿà°°à±à°¨à±‡à°·à°¨à°²à± à°¸à±à°ªà±‡à°¸à± à°', '81639_1583818851.jpg', 2, 30, 2, '2020-03-10 11:10:51', 2, '2020-10-08 07:19:38'),
(192, 4, 'INDIA phase I coronavirus 15 feb  to 29 feb 2020', '736966_1584596064.jpg', 2, 31, 2, '2020-03-19 11:04:24', 0, '2020-10-08 07:19:10'),
(193, 4, 'china coronavirus feb 2020', '299233_1584596127.jpg', 2, 32, 2, '2020-03-19 11:05:27', 0, '2020-10-08 07:19:05'),
(194, 4, 'Vellampalli srinivas discharge 2020 oct', '192466_1603693664.jpg', 1, 33, 2, '2020-10-26 11:57:44', 0, '2020-10-26 06:27:44'),
(195, 1, 'Testing01679', '120305_1621075326.jpg', 1, 74, 1, '2021-05-15 16:12:05', 0, '2021-05-15 10:42:06'),
(196, 1, 'dfgfdgfdgdgd', '912357_1621227006.jpg', 1, 75, 1, '2021-05-17 10:20:06', 0, '2021-05-17 04:50:06'),
(197, 1, 'T111', '181976_1621228212.jpg', 1, 76, 1, '2021-05-17 10:38:16', 1, '2021-05-17 05:10:12'),
(198, 1, '12345', '135804_1621235542.jpg', 1, 77, 1, '2021-05-17 12:42:22', 0, '2021-05-17 07:12:23'),
(199, 2, '12345', '495947_1621236351.jpg', 1, 30, 1, '2021-05-17 12:55:51', 0, '2021-05-17 07:25:51'),
(200, 1, 'qqqq', '164663_1621253201.jpg', 1, 78, 1, '2021-05-17 17:36:41', 0, '2021-05-17 12:06:42'),
(201, 1, 'zzzz', '139462_1621253470.jpg', 1, 79, 1, '2021-05-17 17:41:10', 0, '2021-05-17 12:11:10'),
(202, 1, 'vvvvv', '385688_1621253470.jpg', 1, 80, 1, '2021-05-17 17:41:10', 0, '2021-05-17 12:11:10');

-- --------------------------------------------------------

--
-- Table structure for table `va_gallery_cat`
--

DROP TABLE IF EXISTS `va_gallery_cat`;
CREATE TABLE `va_gallery_cat` (
  `vag_id` int(5) NOT NULL,
  `vag_name` varchar(100) NOT NULL,
  `vag_description` varchar(200) NOT NULL,
  `vag_status` tinyint(1) NOT NULL,
  `vag_orderby` int(5) NOT NULL,
  `vag_addedby` int(5) NOT NULL,
  `vag_added_date` datetime NOT NULL,
  `vag_updatedby` int(5) NOT NULL,
  `vag_updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `va_news`
--

DROP TABLE IF EXISTS `va_news`;
CREATE TABLE `va_news` (
  `van_id` int(5) NOT NULL,
  `van_description` longtext CHARACTER SET utf8 NOT NULL,
  `van_status` tinyint(1) NOT NULL DEFAULT '1',
  `van_order_by` int(4) NOT NULL,
  `van_added_by` int(5) NOT NULL,
  `van_added_date` datetime NOT NULL,
  `van_updated_by` int(5) NOT NULL,
  `van_updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `va_news`
--

INSERT INTO `va_news` (`van_id`, `van_description`, `van_status`, `van_order_by`, `van_added_by`, `van_added_date`, `van_updated_by`, `van_updated_date`) VALUES
(4, '<p><span style=\"color:#2980b9\">à°‡à°¸à±à°°à±‹ 22 à°œà±‚à°²à±ˆ 2019 à°¨ à°…à°¤à±à°¯à°‚à°¤ à°ªà±à°°à°¤à°¿à°·à±à°Ÿà°¾à°¤à±à°®à°•à°‚à°—à°¾ à°šà±‡à°ªà°Ÿà±à°Ÿà°¿à°¨ à°šà°‚à°¦à±à°°à°¯à°¾à°¨à±-2 à°ªà±à°°à°¯à±‹à°—à°‚ à°¸à°«à°²à±€à°•à±ƒà°¤à°‚ à°…à°µà±à°¤à±à°‚à°¦à°¿ à°­à°µà°¿à°·à±à°¯à°¤à±à°¤à±à°²à±‹ à°‡à°¸à±à°°à±‹ à°†à°¶à°¿à°‚à°šà°¿à°¨ à°¸à±à°¥à°¾à°¯à°¿à°²à±‹ à°«à°²à°¿à°¤à°¾à°²à± à°µà°šà±à°šà±‡ à°…à°µà°•à°¾à°¶à°‚ à°šà°¾à°²à°¾ à°¤à°•à±à°•à±à°µà°—à°¾ à°‰à°‚à°¦à°¿.</span></p>', 2, 2, 1, '2019-12-17 12:46:13', 1, '2019-12-17 08:54:27'),
(5, '<p><span style=\"color:#27ae60\">26 à°¡à°¿à°¸à±†à°‚à°¬à°°à± 2019 à°¨à±à°‚à°šà°¿ 14 à°œà°¨à°µà°°à°¿ 2020 à°µà°°à°•à± à°…à°®à±†à°°à°¿à°•à°¾à°²à±‹ à°µà°¿à°ªà°°à±€à°¤à°®à±ˆà°¨ à°®à°‚à°šà± à°¤à±à°«à°¾à°¨à± à°µà°šà±à°šà±‡ à°…à°µà°•à°¾à°¶à°‚ à°‰à°‚à°¦à°¿1.</span></p>', 2, 3, 1, '2019-12-17 14:08:17', 1, '2019-12-18 06:56:49'),
(6, '<h2><span style=\"color:#d35400\">à°°à°¾à°¶à±à°²à± à°«à°²à°¿à°¤à°¾à°²à±</span></h2>\r\n\r\n<p><big><span style=\"color:#3498db\"><strong>à°•à±à°‚à°­ à°®à±€à°¨ à°°à°¾à°¶à±à°² à°µà°¾à°°à°¿à°•à°¿ à°¡à°¿à°¸à±†à°‚à°¬à°°à± à°¨à±†à°²à°²à±‹ à°•à°¾à°°à±à°¯à°¸à°¿à°¦à±à°§à°¿ à°…à°¨à±à°•à±‚à°² à°ªà°°à°¿à°¸à±à°¥à°¿à°¤à±à°²à± à°†à°°à±à°¥à°¿à°• à°²à°¾à°­à°¾à°²à± à°®à°¿à°¤à±à°°à°²à°¾à°­à°‚&nbsp;</strong></span></big></p>\r\n\r\n<p><big><span style=\"color:#3498db\"><strong>à°§à°¨à°¸à±à°¸à± à°µà±ƒà°¶à±à°šà°¿à°• à°°à°¾à°¶à±à°² à°µà°¾à°°à± à°…à°ªà±à°°à°®à°¤à±à°¤à°‚à°—à°¾ à°‰à°‚à°¡à°—à°²à°°à± à°¤à±€à°µà±à°°à°®à±ˆà°¨ à°®à°¾à°¨à°¸à°¿à°• à°’à°¤à±à°¤à°¿à°¡à°¿ à°‰à°‚à°Ÿà±à°‚à°¦à°¿ à°œà°¾à°¤à°•à°°à±€à°¤à±à°¯à°¾ à°«à°²à°¿à°¤à°¾à°²à± à°®à°¾à°°à±‡ à°…à°µà°•à°¾à°¶à°‚ à°‰à°‚à°¦à°¿</strong></span></big></p>', 2, 4, 2, '2019-12-17 18:09:18', 2, '2020-01-02 08:54:35'),
(7, '<h2><span style=\"color:#c0392b\">à°­à°—à°µà°‚à°¤à±à°¨à°¿ à°…à°°à±à°šà°¨</span></h2>\r\n\r\n<p><strong><span style=\"color:#f39c12\"><big>à°ªà±à°°à°¤à°¿à°°à±‹à°œà± à°¬à°¿à°²à±à°µà°¦à°³à°¾à°²à°¤à±‹ à°®à°¹à°¾à°¦à±‡à°µà±à°¡à°¿à°¨à°¿ à°…à°°à±à°šà°¿à°‚à°šà°¾à°²à°¿ à°…à°²à°¾ à°…à°°à±à°šà°¿à°‚à°šà°¿à°¨ à°µà°¾à°°à°¿à°•à°¿ à°†à°°à±‹à°—à±à°¯à°‚&nbsp;à°à°¶à±à°µà°°à±à°¯à°®à± à°¸à°¤à± à°¸à°‚à°¤à°¾à°¨à°®à± à°•à±€à°°à±à°¤à°¿ à°µà°¿à°¦à±à°¯ à°®à±à°•à±à°¤à°¿ à°²à°­à°¿à°¸à±à°¤à°¾à°¯à°¿.</big></span></strong></p>\r\n\r\n<h2><span style=\"color:#c0392b\"><strong><big>à°ªà±à°°à°¾à°šà±€à°¨ à°µà°¾à°¸à±à°¤à±</big></strong></span></h2>\r\n\r\n<p><span style=\"color:#3498db\"><strong><big>à°¤à±‚à°°à±à°ªà± à°¦à°¿à°•à±à°•à±à°¨à°•à± à°‡à°‚à°¦à±à°°à±à°¡à± à°…à°§à°¿à°ªà°¤à°¿ à°•à°¾à°µà±à°¨ à°¤à±‚à°°à±à°ªà± à°¦à°¿à°¶ à°ªà±†à°°à°¿à°—à°¿à°¨à°Ÿà±à°²à°¯à°¿à°¤à±‡ à°à°¶à±à°µà°°à±à°¯à°‚ à°•à°²à±à°—à±à°¤à±à°‚à°¦à°¿</big></strong></span></p>', 2, 5, 2, '2019-12-17 18:42:11', 2, '2020-02-09 07:32:43'),
(8, '<p><strong><big><span style=\"color:#c0392b\">&nbsp; &nbsp; &nbsp; VASTU For Residential and Commercial&nbsp; &nbsp;</span></big></strong></p>\r\n\r\n<p><strong><big><span style=\"color:#c0392b\">&nbsp; &nbsp; &nbsp;&nbsp;</span></big></strong></p>\r\n\r\n<h3>&nbsp;</h3>', 1, 6, 2, '2020-03-22 23:03:05', 2, '2020-10-31 06:12:02'),
(9, '<h2><strong><span style=\"color:#f39c12\">à°­à°µà°¿à°·à±à°¯ à°œà±à°žà°¾à°¨à°‚</span></strong></h2>\r\n\r\n<p>à°­à°µà°¿à°·à±à°¯ à°œà±à°žà°¾à°¨à°‚ 2020 21 à°²à±‹ à°œà°°à°—à°¬à±‹à°¯à±‡ à°•à±Šà°¨à±à°¨à°¿ à°®à±à°–à±à°¯ à°¸à°‚à°˜à°Ÿà°¨à°²à°¨à± à°Ÿà±à°µà°¿à°Ÿà±à°Ÿà°°à± à°¦à±à°µà°¾à°°à°¾ à°¨à±‡à°¨à± 25.3.2020 à°¨ &nbsp;à°¤à±†à°²à°¿à°¯à°œà±‡à°¯à°¡à°‚ à°œà°°à°¿à°—à°¿à°‚à°¦à°¿</p>\r\n\r\n<p><span style=\"color:#2980b9\"><strong>&nbsp;à°Ÿà±à°µà°¿à°Ÿà±à°Ÿà°°à± à°…à°•à±Œà°‚à°Ÿà± à°²à°¿à°‚à°•à± à°¨à°¿ à°•à±à°²à°¿à°•à± à°šà±‡à°¸à°¿ à°®à°°à°¿à°¨à±à°¨à°¿ à°…à°ªà±à°¡à±‡à°Ÿà±à°¸à± à°¤à±†à°²à±à°¸à±à°•à±‹à°‚à°¡à°¿</strong></span></p>', 1, 7, 2, '2020-03-31 21:23:33', 2, '2020-10-08 07:12:08');

-- --------------------------------------------------------

--
-- Table structure for table `va_predictions`
--

DROP TABLE IF EXISTS `va_predictions`;
CREATE TABLE `va_predictions` (
  `vap_id` int(5) NOT NULL,
  `vap_parent_id` int(5) NOT NULL,
  `vap_description` longtext CHARACTER SET utf8 NOT NULL,
  `vap_movdate` datetime NOT NULL,
  `vap_status` tinyint(1) NOT NULL DEFAULT '1',
  `vap_order_by` int(4) NOT NULL,
  `vap_added_by` int(5) NOT NULL,
  `vap_added_date` datetime NOT NULL,
  `vap_updated_by` int(5) NOT NULL,
  `vap_updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `va_predictions`
--

INSERT INTO `va_predictions` (`vap_id`, `vap_parent_id`, `vap_description`, `vap_movdate`, `vap_status`, `vap_order_by`, `vap_added_by`, `vap_added_date`, `vap_updated_by`, `vap_updated_date`) VALUES
(8, 1, '<p>à°¸à±à°ªà±à°°à±€à°‚à°•à±‹à°°à±à°Ÿà± à°¤à±€à°°à±à°ªà±à°¤à±‹ à°…à°¯à±‹à°§à±à°¯ à°µà°¿à°µà°¾à°¦à°‚ à°¸à°®à°¸à°¿à°ªà±‹à°¤à±à°‚à°¦à°¿ à°•à°¾à°¨à±€ à°‰à°¦à±à°°à°¿à°•à±à°¤à°¤à°²à± à°¤à°²à±†à°¤à±à°¤à±‡ à°…à°µà°•à°¾à°¶à°‚ à°‰à°‚à°¦à°¿ à°¨à°°à±‡à°‚à°¦à±à°° à°®à±‹à°¡à±€ à°ªà±à°°à°§à°¾à°¨ à°®à°‚à°¤à±à°°à°¿ à°—à°¾ à°‰à°¨à±à°¨ à°¸à°®à°¯à°‚à°²à±‹à°¨à±‡ à°…à°¯à±‹à°§à±à°¯à°²à±‹ à°°à°¾à°®à°®à°‚à°¦à°¿à°° à°¨à°¿à°°à±à°®à°¾à°£à°‚ à°œà°°à±à°—à±à°¤à±à°‚à°¦à°¿. 18.10.2020</p>', '0000-00-00 00:00:00', 1, 1, 1, '2019-10-22 18:22:04', 2, '2020-03-10 05:32:33'),
(10, 2, '<p>à°‡à°¸à±à°°à±‹ 22 à°œà±‚à°²à±ˆ 2019 à°¨ à°…à°¤à±à°¯à°‚à°¤ à°ªà±à°°à°¤à°¿à°·à±à°Ÿà°¾à°¤à±à°®à°•à°‚à°—à°¾ à°šà±‡à°ªà°Ÿà±à°Ÿà°¿à°¨ à°šà°‚à°¦à±à°°à°¯à°¾à°¨à±-2 à°ªà±à°°à°¯à±‹à°—à°‚ à°¸à°«à°²à±€à°•à±ƒà°¤à°‚ à°…à°µà±à°¤à±à°‚à°¦à°¿ à°­à°µà°¿à°·à±à°¯à°¤à±à°¤à±à°²à±‹ à°‡à°¸à±à°°à±‹ à°†à°¶à°¿à°‚à°šà°¿à°¨ à°¸à±à°¥à°¾à°¯à°¿à°²à±‹ à°«à°²à°¿à°¤à°¾à°²à± à°µà°šà±à°šà±‡ à°…à°µà°•à°¾à°¶à°‚ à°šà°¾à°²à°¾ à°¤à°•à±à°•à±à°µà°—à°¾ à°‰à°‚à°¦à°¿.</p>', '0000-00-00 00:00:00', 1, 2, 1, '2019-10-22 18:32:20', 1, '2019-12-09 10:08:02'),
(21, 2, '<p>26 à°¡à°¿à°¸à±†à°‚à°¬à°°à± 2019 à°¨à±à°‚à°šà°¿ 14 à°œà°¨à°µà°°à°¿ 2020 à°µà°°à°•à± à°…à°®à±†à°°à°¿à°•à°¾à°²à±‹ à°µà°¿à°ªà°°à±€à°¤à°®à±ˆà°¨ à°®à°‚à°šà± à°¤à±à°«à°¾à°¨à± à°µà°šà±à°šà±‡ à°…à°µà°•à°¾à°¶à°‚ à°‰à°‚à°¦à°¿.</p>', '2020-01-08 21:54:27', 1, 3, 1, '2019-10-29 12:18:48', 1, '2020-01-08 16:24:27'),
(22, 1, '<p>à°‡à°¸à±à°°à±‹ 11 à°¡à°¿à°¸à±†à°‚à°¬à°°à± 2019 à°¨ à°ªà±à°°à°¯à±‹à°—à°¿à°‚à°šà°¨à±à°¨à±à°¨ à°ªà°¿à°Žà°¸à±à°Žà°²à±à°µà°¿-à°¸à°¿ 48 à°‰à°ªà°—à±à°°à°¹ à°µà°¾à°¹à°•à°¨à±Œà°• à°µà°¿à°œà°¯à°µà°‚à°¤à°‚ à°…à°µà±à°¤à±à°‚à°¦à°¨à°¿ à°µà°¿à°¶à±à°µà°¨à°¾à°¥à± à°¤à±†à°²à°¿à°ªà°¾à°°à±.</p>', '0000-00-00 00:00:00', 2, 4, 1, '2019-10-29 12:19:19', 1, '2019-12-12 07:35:05'),
(23, 2, '<p>25 à°¸à±†à°ªà±à°Ÿà±†à°‚à°¬à°°à± 2019 à°¨ à°’à°• à°ªà±à°°à°®à±à°– à°µà±à°¯à°•à±à°¤à°¿ à°¸à±ˆà°°à°¾ à°¨à°°à°¸à°¿à°‚à°¹à°¾à°°à±†à°¡à±à°¡à°¿ à°¸à°¿à°¨à°¿à°®à°¾ à°¹à°¿à°Ÿà± à°…à°µà±à°¤à±à°‚à°¦à°¾ à°…à°¨à°¿ à°ªà±‚à°œà±à°¯à°‚ à°µà°¿à°¶à±à°µà°¨à°¾à°¥à± à°†à°¸à±à°§à°¾à°¨ à°œà±à°¯à±‹à°¤à°¿à°·à±à°¯à±à°²à°¨à± à°ªà±à°°à°¶à±à°¨à°¿à°‚à°šà°¡à°‚ à°œà°°à°¿à°—à°¿à°‚à°¦à°¿ à°¦à°¾à°¨à°¿à°•à°¿ à°¸à°®à°¾à°§à°¾à°¨à°‚à°—à°¾ à°¹à°¿à°Ÿà±à°Ÿà°µà±à°¤à±à°‚à°¦à°¿ à°…à°¨à°¿ à°¤à±†à°²à°ªà°¡à°‚ à°œà°°à°¿à°—à°¿à°‚à°¦à°¿</p>', '0000-00-00 00:00:00', 1, 5, 1, '2019-10-29 12:21:41', 1, '2019-12-09 10:25:18'),
(24, 2, '<p>à°¤à±†à°²à°‚à°—à°¾à°£ à°°à°¾à°·à±à°Ÿà±à°°à°‚à°²à±‹à°¨à°¿ à°¹à±à°œà±‚à°°à±à°¨à°—à°°à± à°¨à°¿à°¯à±‹à°œà°•à°µà°°à±à°— à°‰à°ª à°Žà°¨à±à°¨à°¿à°•à°²à±à°²à±‹ à°Ÿà±€à°†à°°à±à°Žà°¸à± à°µà°¿à°œà°¯à°‚ à°¸à°¾à°§à°¿à°¸à±à°¤à±à°‚à°¦à°¨à°¿ à°†à°¸à±à°¥à°¾à°¨ à°œà±à°¯à±‹à°¤à°¿à°·à±à°•à±à°²à± à°®à±à°‚à°¦à°¸à±à°¤à±à°—à°¾à°¨à±‡ à°¤à±†à°²à°¿à°ªà°¾à°°à±</p>', '0000-00-00 00:00:00', 1, 6, 1, '2019-10-29 12:52:19', 1, '2019-12-09 10:25:51'),
(25, 1, '<p>à°¤à±†à°²à°‚à°—à°¾à°£ à°°à°¾à°·à±à°Ÿà±à°°à°‚à°²à±‹à°¨à°¿ à°¹à±à°œà±‚à°°à±à°¨à°—à°°à± à°¨à°¿à°¯à±‹à°œà°•à°µà°°à±à°— à°‰à°ª à°Žà°¨à±à°¨à°¿à°•à°²à±à°²à±‹ à°Ÿà±€à°†à°°à±à°Žà°¸à± à°µà°¿à°œà°¯à°‚ à°¸à°¾à°§à°¿à°¸à±à°¤à±à°‚à°¦à°¨à°¿ à°†à°¸à±à°¥à°¾à°¨ à°œà±à°¯à±‹à°¤à°¿à°·à±à°•à±à°²à± à°®à±à°‚à°¦à°¸à±à°¤à±à°—à°¾à°¨à±‡ à°¤à±†à°²à°¿à°ªà°¾à°°à±.</p>', '0000-00-00 00:00:00', 2, 5, 1, '2019-10-29 12:53:37', 1, '2019-11-21 13:12:44'),
(26, 1, '<p>à°¶à±à°°à±€à°¶à±ˆà°² à°®à°¹à°¾ à°•à±à°·à±‡à°¤à±à°°à°‚à°²à±‹ à°¶à±à°°à±€ à°®à°²à±à°²à°¿à°•à°¾à°°à±à°œà±à°¨ à°®à°¹à°¾à°²à°¿à°‚à°—à°‚ à°®à±à°¨à°•à± à°ªà±‚à°œà±à°¯à°‚ à°µà°¿à°¶à±à°µà°¨à°¾à°¥à± à°†à°¸à±à°¥à°¾à°¨ à°œà±à°¯à±‹à°¤à°¿à°·à±à°•à±à°²à± à°®à°¹à°¾à°ªà±à°°à°¦à±‹à°·à°‚ à°‰à°¤à±à°¸à°µà°‚ à°°à±‚à°ªà°•à°²à±à°ªà°¨ à°šà±‡à°¸à°¿à°¨à°¾à°°à±</p>', '2019-12-12 14:58:22', 2, 6, 1, '2019-10-29 16:05:57', 1, '2019-12-12 09:28:22'),
(27, 1, '<p>à°¶à±à°°à±€à°¶à±ˆà°² à°®à°¹à°¾ à°•à±à°·à±‡à°¤à±à°°à°‚à°²à±‹ à°¶à±à°°à±€ à°®à°²à±à°²à°¿à°•à°¾à°°à±à°œà±à°¨ à°®à°¹à°¾à°²à°¿à°‚à°—à°‚ à°®à±à°¨à°•à± à°ªà±‚à°œà±à°¯à°‚ à°µà°¿à°¶à±à°µà°¨à°¾à°¥à± à°†à°¸à±à°¥à°¾à°¨ à°œà±à°¯à±‹à°¤à°¿à°·à±à°•à±à°²à± à°®à°¹à°¾à°ªà±à°°à°¦à±‹à°·à°‚ à°‰à°¤à±à°¸à°µà°‚ à°°à±‚à°ªà°•à°²à±à°ªà°¨ à°šà±‡à°¸à°¿à°¨à°¾à°°à±1</p>', '2019-12-12 14:45:28', 2, 7, 1, '2019-11-21 18:42:02', 1, '2019-12-18 06:47:29'),
(28, 2, '<p>à°†à°‚à°§à±à°° à°ªà±à°°à°¦à±‡à°¶à± à°®à°°à°¿à°¯à± à°¤à±†à°²à°‚à°—à°¾à°£ à°°à°¾à°·à±à°Ÿà±à°°à°®à± à°²à±‹ à°…à°•à±à°Ÿà±‹à°¬à°°à± 18 à°¨à±à°‚à°šà°¿ 28 à°…à°•à±à°Ÿà±‹à°¬à°°à± 2019 à°µà°°à°•à± à°­à°¾à°°à±€ à°µà°°à±à°·à°¾à°²à± à°ªà°¡à±‡ à°…à°µà°•à°¾à°¶à°‚ à°‰à°‚à°¦à°¿.</p>', '0000-00-00 00:00:00', 1, 7, 1, '2019-12-09 15:27:38', 1, '2019-12-09 10:26:21'),
(29, 2, '<p>à°‡à°¸à±à°°à±‹ 27 à°¨à°µà°‚à°¬à°°à± 2019 à°¨ à°¶à±à°°à±€à°¹à°°à°¿à°•à±‹à°Ÿ à°¨à±à°‚à°šà°¿ à°šà±‡à°ªà°Ÿà±à°Ÿà°¿à°¨ à°ªà°¿à°Žà°¸à±à°Žà°²à±à°µà°¿ à°¸à°¿ 47 à°ªà±à°°à°¯à±‹à°—à°‚ à°µà°¿à°œà°¯à°µà°‚à°¤à°‚ à°…à°µà±à°¤à±à°‚à°¦à°¿.</p>', '0000-00-00 00:00:00', 1, 8, 1, '2019-12-09 15:28:05', 1, '2019-12-09 10:27:54'),
(30, 2, '<p>à°‡à°¸à±à°°à±‹ 11 à°¡à°¿à°¸à±†à°‚à°¬à°°à± 2019 à°¨ à°ªà±à°°à°¯à±‹à°—à°¿à°‚à°šà°¨à±à°¨à±à°¨ à°ªà°¿à°Žà°¸à±à°Žà°²à±à°µà°¿-à°¸à°¿ 48 à°‰à°ªà°—à±à°°à°¹ à°µà°¾à°¹à°•à°¨à±Œà°• à°µà°¿à°œà°¯à°µà°‚à°¤à°‚ à°…à°µà±à°¤à±à°‚à°¦à°¨à°¿&nbsp; à°µà°¿à°¶à±à°µà°¨à°¾à°¥à± à°¤à±†à°²à°¿à°ªà°¾à°°à±.</p>', '0000-00-00 00:00:00', 1, 9, 2, '2019-12-12 13:07:23', 1, '2019-12-12 09:13:05'),
(31, 2, '<p>à°­à°¾à°°à°¤à°¦à±‡à°¶à°‚à°²à±‹ à°‰à°¤à±à°¤à°°à°¾à°¦à°¿ à°°à°¾à°·à±à°Ÿà±à°°à°¾à°²à±à°²à±‹ 26 à°¡à°¿à°¸à±†à°‚à°¬à°°à± 2019 à°¨à±à°‚à°šà°¿ 14 à°œà°¨à°µà°°à°¿ 2020 à°µà°°à°•à± à°…à°¤à°¿ à°¶à±€à°¤à°² à°—à°¾à°²à±à°²à± à°µà±€à°šà±‡ à°…à°µà°•à°¾à°¶à°‚ à°‰à°¨à±à°¨à°¦à°¿ à°•à°¨à°¿à°·à±à°  à°‰à°·à±à°£à±‹à°—à±à°°à°¤à°²à± à°°à°¿à°•à°¾à°°à±à°¡à± à°¸à±à°¥à°¾à°¯à°¿à°²à±‹ à°¨à°®à±‹à°¦à± à°•à°¾à°µà°¡à°¾à°¨à°¿à°•à°¿ à°…à°µà°•à°¾à°¶à°‚ à°•à°¨à°¿à°ªà°¿à°¸à±à°¤à±à°¨à±à°¨à°¦à°¿ à°®à°‚à°šà± à°¤à±à°«à°¾à°¨à±à°²à± à°œà°®à±à°®à±‚ à°®à°°à°¿à°¯à± à°•à°¾à°¶à±à°®à±€à°°à± à°‰à°¤à±à°¤à°°à°¾à°–à°‚à°¡à± à°¹à°¿à°®à°¾à°šà°²à± à°ªà±à°°à°¦à±‡à°¶à± à°²à±‹ à°°à°¾à°µà°¡à°¾à°¨à°¿à°•à°¿ à°…à°µà°•à°¾à°¶à°‚ à°‰à°¨à±à°¨à°¦à°¿</p>', '2020-01-08 21:55:36', 1, 8, 2, '2019-12-17 13:08:20', 0, '2020-01-08 16:25:36'),
(32, 2, '<p>à°†à°‚à°§à±à°°à°ªà±à°°à°¦à±‡à°¶à± à°°à°¾à°·à±à°Ÿà±à°°à°‚à°²à±‹ à°‰à°¤à±à°¤à°°à°¾à°‚à°§à±à°°à°²à±‹à°¨à°¿ à°à°œà±†à°¨à±à°¸à±€ à°ªà±à°°à°¾à°‚à°¤à°‚à°²à±‹&nbsp;à°…à°¤à±à°¯à°‚à°¤ à°•à°¨à°¿à°·à±à°Ÿ à°‰à°·à±à°£à±‹à°—à±à°°à°¤à°²à± à°¨à°®à±‹à°¦à± à°šà±‡à°¯à°¡à°¾à°¨à°¿à°•à°¿ à°…à°µà°•à°¾à°¶à°‚ à°‰à°‚à°¦à°¿</p>', '2020-01-08 21:54:03', 1, 9, 2, '2019-12-17 13:11:26', 0, '2020-01-08 16:24:03'),
(33, 2, '<p>à°†à°‚à°§à±à°°à°ªà±à°°à°¦à±‡à°¶à± à°°à°¾à°·à±à°Ÿà±à°°à°‚à°²à±‹ à°‰à°¤à±à°¤à°°à°¾à°‚à°§à±à°°à°²à±‹à°¨à°¿ à°à°œà±†à°¨à±à°¸à±€ à°ªà±à°°à°¾à°‚à°¤à°‚à°²à±‹ à°…à°¤à±à°¯à°‚à°¤ à°•à°¨à°¿à°·à±à°Ÿ à°‰à°·à±à°£à±‹à°—à±à°°à°¤à°²à± à°¨à°®à±‹à°¦à± à°šà±‡à°¯à°¡à°¾à°¨à°¿à°•à°¿ à°…à°µà°•à°¾à°¶à°‚ à°‰à°‚à°¦à°¿</p>', '0000-00-00 00:00:00', 2, 10, 1, '2019-12-18 12:20:12', 0, '2019-12-18 06:50:21'),
(34, 2, '<p>à°†à°‚à°§à±à°°à°ªà±à°°à°¦à±‡à°¶à± à°°à°¾à°·à±à°Ÿà±à°°à°‚à°²à±‹ 12 à°œà°¨à°µà°°à°¿ 2020 à°¨à±à°‚à°šà°¿ 26 à°œà°¨à°µà°°à°¿ 2020 à°µà°°à°•à± à°…à°®à°°à°¾à°µà°¤à°¿ à°°à°¾à°œà°§à°¾à°¨à°¿ à°•à±‹à°¸à°‚ à°šà±‡à°¸à±à°¤à±à°¨à±à°¨ à°‰à°¦à±à°¯à°®à°‚ à°¤à±€à°µà±à°° à°°à±‚à°ªà°‚ à°¦à°¾à°²à±à°šà°¿ à°°à°¾à°·à±à°Ÿà±à°°à°‚à°²à±‹ à°¹à°¿à°‚à°¸à°¾à°¤à±à°®à°• à°¸à°‚à°˜à°Ÿà°¨à°²à± à°œà°°à°—à°¡à°¾à°¨à°¿à°•à°¿ à°…à°µà°•à°¾à°¶à°‚ à°‰à°‚à°¦à°¿.</p>', '2020-01-28 18:21:07', 1, 10, 2, '2020-01-08 21:53:10', 0, '2020-01-28 12:51:07'),
(35, 2, '<p>à°‡à°¸à±à°°à±‹ 17 à°œà°¨à°µà°°à°¿ 2020 à°¨ à°«à±à°°à±†à°‚à°šà± à°—à°¯à°¾à°¨à°¾à°²à±‹à°¨à°¿ à°•à±Œà°°à± à°…à°‚à°¤à°°à°¿à°•à±à°· à°•à±‡à°‚à°¦à±à°°à°‚ à°¨à±à°‚à°¡à°¿ à°ªà±à°°à°¯à±‹à°—à°¿à°‚à°šà°¨à±à°¨à±à°¨ à°œà±€à°¶à°¾à°Ÿà± 30 à°‰à°ªà°—à±à°°à°¹à°‚ à°µà°¿à°œà°¯à°µà°‚à°¤à°‚ à°…à°µà±à°¤à±à°‚à°¦à°¿ à°¦à±€à°¨à°¿à°¦à±à°µà°¾à°°à°¾ à°Ÿà±†à°²à±€à°•à°®à±à°¯à±‚à°¨à°¿à°•à±‡à°·à°¨à± à°¬à±à°°à°¾à°¡à±à°•à°¾à°¸à±à°Ÿà°¿à°‚à°—à± à°µà±à°¯à°µà°¸à±à°¥à°²à±‹ à°…à°¨à±‚à°¹à±à°¯à°®à±ˆà°¨ &nbsp;à°®à°¾à°°à±à°ªà±à°²à± à°µà°¸à±à°¤à°¾à°¯à°¿</p>', '2020-01-17 13:16:59', 1, 11, 2, '2020-01-13 10:29:03', 0, '2020-01-17 07:46:59'),
(36, 2, '<p>à°¶à±à°°à±€ à°µà°¿à°•à°¾à°°à°¿ à°¨à°¾à°® à°¸à°‚à°µà°¤à±à°¸à°°à°‚à°²à±‹ à°¦à±‡à°¶à°‚à°²à±‹ à°®à°°à°¿à°¯à± à°°à°¾à°·à±à°Ÿà±à°°à°‚à°²à±‹ à°ªà±à°°à°®à±à°– à°§à°¾à°°à±à°®à°¿à°• à°¸à°‚à°¸à±à°¥à°²à± à°µà°¿à°µà°¾à°¦à°¾à°¸à±à°ªà°¦à°‚ à°…à°µà±à°¤à°¾à°¯à°¨à°¿ à°µà±ˆà°¦à°¿à°• à°•à±à°°à°¤à±à°µà±à°²à± à°…à°ªà°¶à±ƒà°¤à±à°²à± à°šà±‹à°Ÿà±à°šà±‡à°¸à±à°•à±à°‚à°Ÿà°¾à°¯à°¨à°¿ à°µà°¿à°¶à±à°µà°¨à°¾à°¥à± à°†à°¸à±à°¥à°¾à°¨ à°œà±à°¯à±‹à°¤à°¿à°·à±à°•à±à°²à± à°®à±‡ 6 2019 à°¨ à°†à°‚à°§à±à°°à°ªà±à°°à°­ à°•à± à°¤à±†à°²à°¿à°ªà°¾à°°à±</p>', '2020-01-28 18:20:58', 1, 11, 2, '2020-01-18 12:41:25', 0, '2020-01-28 12:50:58'),
(37, 2, '<p>à°¤à±‚à°°à±à°ªà± à°­à°¾à°°à°¤ à°¦à±‡à°¶à°®à± à°®à°°à°¿à°¯à± à°†à°‚à°§à±à°°à°ªà±à°°à°¦à±‡à°¶à± à°²à±‹à°¨à°¿ à°‰à°¤à±à°¤à°°à°¾à°‚à°§à±à°° à°œà°¿à°²à±à°²à°¾à°²à°•à± à°•à°°à±‹à°¨à°¾ à°µà±ˆà°°à°¸à± à°µà±à°¯à°¾à°ªà±à°¤à°¿ à°šà±†à°‚à°¦à±‡ à°…à°µà°•à°¾à°¶à°¾à°²à± à°‰à°¨à±à°¨à°¾à°¯à°¿ à°•à°¾à°µà±à°¨ à°°à°¾à°·à±à°Ÿà±à°° à°•à±‡à°‚à°¦à±à°° à°ªà±à°°à°­à±à°¤à±à°µà°¾à°²à± à°…à°ªà±à°°à°®à°¤à±à°¤à°‚à°—à°¾ à°‰à°‚à°¡à°—à°²à°°à±</p>', '2020-02-29 11:14:30', 1, 12, 2, '2020-01-28 18:19:36', 0, '2020-02-29 05:44:30'),
(38, 2, '<p>à°¨à°¾à°¸à°¾ à°…à°‚à°¤à°°à°¿à°•à±à°·à°‚ à°²à±‹à°¨à°¿à°•à°¿ 9 à°«à°¿à°¬à±à°°à°µà°°à°¿ 2020 à°ªà±à°°à°¯à±‹à°—à°¿à°‚à°šà°¨à±à°¨à±à°¨ à°¸à±‹à°²à°¾à°°à± à°†à°°à±à°¬à°¿à°Ÿà°°à± à°ªà±à°°à°¯à±‹à°—à°‚ à°µà°¿à°œà°¯à°µà°‚à°¤à°‚ à°…à°µà±à°¤à±à°‚à°¦à°¿ à°•à°¾à°¨à±€ à°…à°¨à±à°•à±à°¨à±à°¨à°‚à°¤ à°²à°•à±à°·à±à°¯à°¾à°²à°¨à± à°¸à°¾à°§à°¿à°‚à°šà°¡à°‚à°²à±‹ à°•à±Šà°‚à°¤à°®à±‡à°°à°•à± à°¸à°«à°²à°‚ à°…à°µà±à°¤à±à°‚à°¦à°¿</p>', '2020-02-10 12:31:46', 1, 13, 2, '2020-02-05 11:14:48', 0, '2020-02-10 07:01:46'),
(39, 2, '<p>à°šà±ˆà°¨à°¾à°²à±‹ à°•à°°à±‹à°¨à°¾ à°µà±ˆà°°à°¸à± à°®à°°à°¿à°‚à°¤ à°¤à±€à°µà±à°°à°°à±‚à°ªà°‚ à°¦à°¾à°²à±à°šà°¿ à°°à°¾à°¨à±à°¨à±à°¨ 20 à°°à±‹à°œà±à°²à±à°²à±‹ à°­à°¾à°°à±€ à°¸à°‚à°–à±à°¯à°²à±‹ à°ªà±à°°à°¾à°£ à°¨à°·à±à°Ÿà°‚ à°¸à°‚à°­à°µà°¿à°¸à±à°¤à±à°‚à°¦à°¿. à°­à°¾à°°à°¤ à°ªà±à°°à°­à±à°¤à±à°µà°‚ 8 à°«à°¿à°¬à±à°°à°µà°°à°¿ 2020 à°¨à±à°‚à°šà°¿ 20 à°«à°¿à°¬à±à°°à°µà°°à°¿ 2020 à°µà°°à°•à± à°•à°°à±‹à°¨à°¾ à°µà±ˆà°°à°¸à± à°ªà°Ÿà±à°² à°®à°°à°¿à°‚à°¤ à°…à°ªà±à°°à°®à°¤à±à°¤à°‚à°—à°¾ à°‰à°‚à°¡à°µà°²à°¸à°¿à°¨ à°…à°µà°¸à°°à°‚ à°‰à°‚à°¦à°¿.</p>', '2020-02-29 11:07:12', 1, 14, 2, '2020-02-07 19:36:49', 0, '2020-02-29 05:37:12'),
(40, 2, '<p>à°†à°‚à°§à±à°°à°ªà±à°°à°¦à±‡à°¶à± à°®à°°à°¿à°¯à± à°¤à±†à°²à°‚à°—à°¾à°£ à°°à°¾à°·à±à°Ÿà±à°°à°®à±à°²à°²à±‹15 à°®à±‡ 2020 à°¨à±à°‚à°šà°¿ 25 à°®à±‡ 2020 à°µà°°à°•à± à°­à°¾à°°à±€ à°ˆà°¦à±à°°à± à°—à°¾à°²à±à°²à°¤à±‹ à°•à±‚à°¡à°¿à°¨ à°­à°¾à°°à±€ à°µà°°à±à°·à°¾à°²à± à°ªà°¿à°¡à±à°—à±à°²à± à°ªà°¡à±‡ à°…à°µà°•à°¾à°¶à°‚ à°‰à°‚à°¦à°¿. à°®à°¾à°®à°¿à°¡à°¿ à°…à°°à°Ÿà°¿ à°°à±ˆà°¤à±à°²à± à°…à°ªà±à°°à°®à°¤à±à°¤à°‚à°—à°¾ à°‰à°‚à°¡à°—à°²à°°à± à°ˆ à°¸à°®à°¯à°‚à°²à±‹ à°ªà±à°°à°¾à°£ à°†à°¸à±à°¤à°¿ à°¨à°·à±à°Ÿà°‚ à°¸à°‚à°­à°µà°¿à°‚à°šà±‡ à°…à°µà°•à°¾à°¶à°‚ à°‰à°‚à°¦à°¿ à°•à°¾à°¬à°Ÿà±à°Ÿà°¿ à°ªà±à°°à°œà°²à± à°…à°‚à°¦à°°à±‚ à°…à°ªà±à°°à°®à°¤à±à°¤à°‚à°—à°¾ à°‰à°‚à°¡à°¾à°²à°¿&nbsp;18.2.2020</p>', '2020-06-06 11:17:59', 1, 15, 2, '2020-02-18 18:58:35', 0, '2020-06-06 05:47:59'),
(41, 1, '<p>GSLV - F10 GISAT-1 à°¶à°¾à°Ÿà°¿à°²à±ˆà°Ÿà± à°¨à± à°¸à°¤à±€à°·à± à°§à°¾à°µà°¨à± à°…à°‚à°¤à°°à°¿à°•à±à°· à°•à±‡à°‚à°¦à±à°°à°‚ à°¶à±à°°à±€à°¹à°°à°¿à°•à±‹à°Ÿ à°¨à±à°‚à°šà°¿ 5 à°®à°¾à°°à±à°šà°¿ 2020 à°¨ à°µà°¿à°œà°¯à°µà°‚à°¤à°‚à°—à°¾ à°ªà±à°°à°¯à±‹à°—à°¿à°‚à°š à°¬à°¡à±à°¤à±à°‚à°¦à°¿. à°­à°µà°¿à°·à±à°¯à°¤à±à°¤à±à°²à±‹ à°…à°‚à°¤à°°à°¿à°•à±à°·à°‚ à°¨à±à°‚à°šà°¿ GISAT-1 à°‡à°šà±à°šà±‡ à°¸à°®à°¾à°šà°¾à°°à°‚ à°•à±Šà°¨à±à°¨à°¿ à°¸à°‚à°¦à°°à±à°­à°¾à°²à±à°²à±‹ à°­à°¾à°°à°¤à°¦à±‡à°¶ à°°à°•à±à°·à°£ à°¶à°¾à°–à°•à± à°•à±€à°²à°•à°‚à°—à°¾ à°®à°¾à°°à±à°¤à±à°‚à°¦à°¿. 28.2.2020</p>', '0000-00-00 00:00:00', 2, 16, 2, '2020-02-29 11:06:02', 0, '2020-03-05 05:51:05'),
(42, 2, '<p>à°­à°¾à°°à°¤ à°¦à±‡à°¶ à°µà±à°¯à°¾à°ªà±à°¤à°‚à°—à°¾ 29 à°«à°¿à°¬à±à°°à°µà°°à°¿ 2020 à°¨à±à°‚à°šà°¿ 15 à°®à°¾à°°à±à°šà°¿ 2020 à°®à°§à±à°¯à°²à±‹ à°‰à°·à±à°£à±‹à°—à±à°°à°¤à°²à± à°ªà±†à°°à°¿à°—à±‡ à°…à°µà°•à°¾à°¶à°‚ à°‰à°‚à°¦à°¿. 28.2.2020</p>', '2020-03-18 10:37:41', 2, 17, 2, '2020-02-29 11:13:34', 0, '2020-03-18 05:11:49'),
(43, 2, '<p>à°¨à°¾à°¸à°¾ 6 march 2020 à°¨ à°«à±à°²à±‹à°°à°¿à°¡à°¾à°²à±‹à°¨à°¿ Cape Canaveral AIR FORCE station à°¨à±à°‚à°šà°¿ SpaceX CRS-20 à°µà°¿à°œà°¯à°µà°‚à°¤à°‚à°—à°¾ à°‡à°‚à°Ÿà°°à±à°¨à±‡à°·à°¨à°²à± à°¸à±à°ªà±‡à°¸à± à°¸à±†à°‚à°Ÿà°°à± à°•à± à°šà±‡à°°à±à°¤à±à°‚à°¦à°¿. 4.3.2020</p>', '2020-03-10 11:00:02', 1, 18, 2, '2020-03-04 12:33:43', 2, '2020-03-10 05:30:02'),
(44, 2, '<p>à°œà±à°¯à±‹à°¤à°¿à°·à±à°¯ à°¶à°¾à°¸à±à°¤à±à°° à°°à±€à°¤à±à°¯à°¾ à°­à°¾à°°à°¤ à°¦à±‡à°¶ à°µà±à°¯à°¾à°ªà±à°¤à°‚à°—à°¾ à°•à°°à±‹à°¨à°¾ à°µà±ˆà°°à°¸à± (covid-19) 23 à°®à°¾à°°à±à°šà°¿ 2020 à°¨à±à°‚à°šà°¿ 27 à°œà±‚à°²à±ˆ 2020 à°®à°§à±à°¯à°²à±‹ à°µà±‡à°—à°‚à°—à°¾ à°µà±à°¯à°¾à°ªà°¿à°‚à°šà±‡ à°…à°µà°•à°¾à°¶à°¾à°²à± à°‰à°¨à±à°¨à°¾à°¯à°¿. à°•à°¾à°µà±à°¨ à°­à°¾à°°à°¤ à°ªà±à°°à°­à±à°¤à±à°µà°‚ à°®à°°à°¿à°‚à°¤ à°…à°ªà±à°°à°®à°¤à±à°¤à°‚à°—à°¾ à°‰à°‚à°¡à°¾à°²à°¨à°¿ à°®à°¨à°µà°¿ 17.3.2020</p>', '2020-10-08 12:37:27', 1, 17, 2, '2020-03-18 10:39:41', 2, '2020-10-08 07:07:27'),
(45, 2, '<p>à°œà±à°¯à±‹à°¤à°¿à°·à±à°¯ à°¶à°¾à°¸à±à°¤à±à°° à°°à±€à°¤à±à°¯à°¾ à°ªà±à°°à°ªà°‚à°šà°µà±à°¯à°¾à°ªà±à°¤à°‚à°—à°¾ à°•à°°à±‹à°¨à°¾ à°µà±ˆà°°à°¸à± (covid-19) à°ªà±à°°à°­à°¾à°µà°‚ 23 à°®à°¾à°°à±à°šà°¿ 2020 à°¨à±à°‚à°šà°¿ 27 à°œà±‚à°²à±ˆ 2020 à°®à°§à±à°¯à°²à±‹ à°…à°¤à±à°¯à°‚à°¤ à°µà±‡à°—à°‚à°—à°¾ à°µà±à°¯à°¾à°ªà°¿à°‚à°šà±‡ à°…à°µà°•à°¾à°¶à°¾à°²à±à°‰à°¨à±à°¨à°¾à°¯à°¿.à°ªà°¶à±à°šà°¿à°®à°µà°¾à°¯à±à°µà±à°¯à°­à°¾à°°à°¤à°¦à±‡à°¶à°‚à°²à±‹ à°µà°¿à°¸à±à°¤à±ƒà°¤à°‚à°—à°¾ à°µà±à°¯à°¾à°ªà°¿à°‚à°šà±‡ à°…à°µà°•à°¾à°¶à°‚ à°‰à°‚à°¦à°¿.à°•à°¾à°µà±à°¨ à°ªà±à°°à°ªà°‚à°š à°¦à±‡à°¶à°¾à°²à± à°®à°°à°¿à°‚à°¤ à°…à°ªà±à°°à°®à°¤à±à°¤à°¤à°¤à±‹ à°‰à°‚à°¡à°—à°²à°°à±. 18.3.2020</p>', '2020-10-08 12:37:12', 1, 18, 2, '2020-03-19 10:59:38', 0, '2020-10-08 07:07:12'),
(46, 1, '<p>à°†à°‚à°§à±à°° à°ªà±à°°à°¦à±‡à°¶à± à°®à°°à°¿à°¯à± à°¤à±†à°²à°‚à°—à°¾à°£ à°°à°¾à°·à±à°Ÿà±à°°à°®à±à°²à°²à±‹ 23 April 2020 à°¨à±à°‚à°šà°¿ 4 may 2020 à°µà°°à°•à± à°µà±‡à°¡à°¿ à°—à°¾à°²à±à°²à± à°…à°§à°¿à°• à°‰à°·à±à°£à±‹à°—à±à°°à°¤à°²à± à°¨à°®à±‹à°¦à± à°…à°µà°¡à°¾à°¨à°¿à°•à°¿ à°…à°µà°•à°¾à°¶à°‚ à°Žà°•à±à°•à±à°µà°—à°¾ à°‰à°‚à°¦à°¿&nbsp; &nbsp; &nbsp;23.3.2020</p>', '0000-00-00 00:00:00', 2, 19, 2, '2020-03-31 21:49:16', 0, '2020-06-06 05:47:29'),
(47, 2, '<p>à°­à°¾à°°à°¤à°¦à±‡à°¶à°‚à°²à±‹ &nbsp; 23 march&nbsp;2020 à°¨à±à°‚à°šà°¿ 4 à°®à±‡ 2020 à°µà°°à°•à±, 15 à°®à±‡ 2020 à°¨à±à°‚à°šà°¿ 25 à°®à±‡ 2020 à°µà°°à°•à± à°®à±à°–à±à°¯à°‚à°—à°¾ à°®à°¹à°¾à°°à°¾à°·à±à°Ÿà±à°° à°—à±à°œà°°à°¾à°¤à± à°°à°¾à°œà°¸à±à°¥à°¾à°¨à± à°ªà°‚à°œà°¾à°¬à± à°¹à°°à±à°¯à°¾à°¨à°¾ à°¢à°¿à°²à±à°²à±€ à°°à°¾à°·à±à°Ÿà±à°°à°¾à°²à°²à±‹ à°µà±‡à°¡à°¿à°—à°¾à°²à±à°²à± à°µà±‡à°¯à°¡à°‚, à°‡à°¸à±à°• à°²à±‡à°¦à°¾ à°§à±‚à°³à°¿ à°¤à±à°«à°¾à°¨à±à°²à±&nbsp;à°°à°¾à°µà°¡à°¾à°¨à°¿à°•à°¿ à°Žà°•à±à°•à±à°µ à°…à°µà°•à°¾à°¶à°‚ à°‰à°‚à°¦à°¿&nbsp; &nbsp;23.3.2020</p>', '2020-06-06 11:23:20', 1, 20, 2, '2020-03-31 21:50:30', 2, '2020-06-06 05:53:20'),
(48, 1, '<p>&nbsp;</p>\r\n\r\n<p>à°…à°®à±†à°°à°¿à°•à°¾ à°…à°§à±à°¯à°•à±à°· à°Žà°¨à±à°¨à°¿à°•à°²à±à°²à±‹ joe biden à°µà°¿à°œà°¯à°‚ à°¸à°¾à°§à°¿à°¸à±à°¤à°¾à°°à±.</p>\r\n\r\n<p>Joe Biden will win U.S PRESIDENTIAL ELECTIONS 2020</p>', '0000-00-00 00:00:00', 1, 20, 2, '2020-10-26 11:51:48', 0, '2020-10-26 16:51:48'),
(49, 2, '<p>à°†à°‚à°§à±à°° à°ªà±à°°à°¦à±‡à°¶à± à°¦à±‡à°µà°¾à°¦à°¾à°¯ à°¶à°¾à°– à°®à°¾à°¤à±à°¯à±à°²à± à°¶à±à°°à±€ à°µà±†à°²à°‚à°ªà°²à±à°²à°¿ à°¶à±à°°à±€à°¨à°¿à°µà°¾à°¸à± à°—à°¾à°°à°¿ à°¯à±Šà°•à±à°• à°†à°¯à±à°°à±à°¦à°¾à°¯à°‚ à°¬à°¾à°—à±à°‚à°¦à°¨à°¿ à°¨à±‡à°¨à± à°šà±†à°ªà±à°ªà°¿à°¨ à°µà°¿à°§à°‚à°—à°¾à°¨à±‡ covid 19 à°µà±à°¯à°¾à°§à°¿ à°¨à±à°‚à°šà°¿ à°•à±‹à°²à±à°•à±à°¨à°¿ à°¡à°¿à°¶à±à°šà°¾à°°à±à°œà± à°…à°¯à±à°¯à°¾à°°à±.</p>', '0000-00-00 00:00:00', 1, 21, 2, '2020-10-26 11:56:05', 0, '2020-10-26 16:56:05'),
(50, 1, '<p>à°­à°¾à°°à°¤à°¦à±‡à°¶à°µà±à°¯à°¾à°ªà±à°¤à°‚à°—à°¾ covid-19 à°®à°³à±à°²à±€ 16 Nov 2020 à°¨à±à°‚à°šà°¿ 20 Feb 2021 à°µà°°à°•à± à°µà°¿à°œà±ƒà°‚à°­à°¿à°‚à°šà±‡ à°…à°µà°•à°¾à°¶à°‚ à°‰à°‚à°¦à°¿. à°ªà±à°°à°œà°²à°‚à°¦à°°à±‚ à°®à°°à°¿à°‚à°¤ à°…à°ªà±à°°à°®à°¤à±à°¤à°‚à°—à°¾ à°‰à°‚à°¡à°—à°²à°°à°¨à°¿ à°®à°¨à°µà°¿.</p>', '0000-00-00 00:00:00', 1, 21, 2, '2020-10-26 12:03:28', 0, '2020-10-26 17:03:28'),
(51, 1, '<p>à°‡à°¸à±à°°à±‹ 7 à°¨à°µà°‚à°¬à°°à± 2020 à°¨ à°ªà±à°°à°¯à±‹à°—à°¿à°‚à°šà°¨à±à°¨à±à°¨ PSLV C-48 à°ªà±à°°à°¯à±‹à°—à°‚ à°µà°¿à°œà°¯à°µà°‚à°¤à°‚ à°…à°µà±à°¤à±à°‚à°¦à°¿. à°­à°µà°¿à°·à±à°¯à°¤à±à°¤à±à°²à±‹ à°¸à°‚à°ªà±‚à°°à±à°£ à°«à°²à°¿à°¤à°¾à°²à± à°‡à°šà±à°šà±‡ à°µà°¿à°·à°¯à°‚à°²à±‹ à°²à±‡à°¦à°¾ à°ªà±à°°à°¯à±‹à°—à°‚ à°®à±à°‚à°¦à± à°•à°¾à°¨à±€ à°•à±Šà°‚à°¤ à°¸à°¾à°‚à°•à±‡à°¤à°¿à°• à°¸à°®à°¸à±à°¯ à°¤à°²à±†à°¤à±à°¤à±‡ à°…à°µà°•à°¾à°¶à°‚ à°‰à°‚à°¦à°¿.</p>', '0000-00-00 00:00:00', 1, 22, 2, '2020-10-31 18:46:43', 0, '2020-10-31 23:46:43');

-- --------------------------------------------------------

--
-- Table structure for table `va_predic_cat_list`
--

DROP TABLE IF EXISTS `va_predic_cat_list`;
CREATE TABLE `va_predic_cat_list` (
  `vpc_id` int(5) NOT NULL,
  `vpc_name` varchar(100) NOT NULL,
  `vpc_abbreviation` varchar(90) NOT NULL,
  `vpc_description` varchar(150) NOT NULL,
  `vpc_status` tinyint(1) NOT NULL,
  `vpc_orderby` int(4) NOT NULL,
  `vpc_addedby` int(4) NOT NULL,
  `vpc_added_date` datetime NOT NULL,
  `vpc_updatedby` int(4) NOT NULL,
  `vpc_updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `va_predic_cat_list`
--

INSERT INTO `va_predic_cat_list` (`vpc_id`, `vpc_name`, `vpc_abbreviation`, `vpc_description`, `vpc_status`, `vpc_orderby`, `vpc_addedby`, `vpc_added_date`, `vpc_updatedby`, `vpc_updated_date`) VALUES
(1, 'UPCOMING PREDICTIONS', 'Upcoming Prediction', 'Upcoming Prediction', 1, 1, 1, '2019-10-22 18:53:43', 0, '2019-10-28 07:32:21'),
(2, 'RECENT TRUE PREDICTION', 'Recent True Prediction', 'Recent True Prediction', 1, 2, 1, '2019-10-22 18:54:06', 0, '2019-10-28 07:32:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bi_districts`
--
ALTER TABLE `bi_districts`
  ADD PRIMARY KEY (`dt_id`);

--
-- Indexes for table `bi_gallery`
--
ALTER TABLE `bi_gallery`
  ADD PRIMARY KEY (`va_id`);

--
-- Indexes for table `bi_item`
--
ALTER TABLE `bi_item`
  ADD PRIMARY KEY (`itm_id`);

--
-- Indexes for table `bi_locations`
--
ALTER TABLE `bi_locations`
  ADD PRIMARY KEY (`ls_id`);

--
-- Indexes for table `bi_mandals`
--
ALTER TABLE `bi_mandals`
  ADD PRIMARY KEY (`md_id`);

--
-- Indexes for table `bi_news`
--
ALTER TABLE `bi_news`
  ADD PRIMARY KEY (`ne_id`);

--
-- Indexes for table `bi_orders`
--
ALTER TABLE `bi_orders`
  ADD PRIMARY KEY (`ord_id`);

--
-- Indexes for table `bi_pcategory`
--
ALTER TABLE `bi_pcategory`
  ADD PRIMARY KEY (`pcat_id`);

--
-- Indexes for table `bi_psub_category`
--
ALTER TABLE `bi_psub_category`
  ADD PRIMARY KEY (`psubc_id`);

--
-- Indexes for table `bi_reg_users`
--
ALTER TABLE `bi_reg_users`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `bi_shgreg`
--
ALTER TABLE `bi_shgreg`
  ADD PRIMARY KEY (`sh_shgid`);

--
-- Indexes for table `bi_states`
--
ALTER TABLE `bi_states`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `bi_temporders`
--
ALTER TABLE `bi_temporders`
  ADD PRIMARY KEY (`tem_id`);

--
-- Indexes for table `va_appointments`
--
ALTER TABLE `va_appointments`
  ADD PRIMARY KEY (`vaap_id`);

--
-- Indexes for table `va_employees`
--
ALTER TABLE `va_employees`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `va_employees_type`
--
ALTER TABLE `va_employees_type`
  ADD PRIMARY KEY (`empt_id`);

--
-- Indexes for table `va_gallery`
--
ALTER TABLE `va_gallery`
  ADD PRIMARY KEY (`va_id`);

--
-- Indexes for table `va_gallery_cat`
--
ALTER TABLE `va_gallery_cat`
  ADD PRIMARY KEY (`vag_id`);

--
-- Indexes for table `va_news`
--
ALTER TABLE `va_news`
  ADD PRIMARY KEY (`van_id`);

--
-- Indexes for table `va_predictions`
--
ALTER TABLE `va_predictions`
  ADD PRIMARY KEY (`vap_id`);

--
-- Indexes for table `va_predic_cat_list`
--
ALTER TABLE `va_predic_cat_list`
  ADD PRIMARY KEY (`vpc_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bi_districts`
--
ALTER TABLE `bi_districts`
  MODIFY `dt_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bi_gallery`
--
ALTER TABLE `bi_gallery`
  MODIFY `va_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `bi_item`
--
ALTER TABLE `bi_item`
  MODIFY `itm_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bi_locations`
--
ALTER TABLE `bi_locations`
  MODIFY `ls_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bi_mandals`
--
ALTER TABLE `bi_mandals`
  MODIFY `md_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bi_news`
--
ALTER TABLE `bi_news`
  MODIFY `ne_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bi_orders`
--
ALTER TABLE `bi_orders`
  MODIFY `ord_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bi_pcategory`
--
ALTER TABLE `bi_pcategory`
  MODIFY `pcat_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bi_psub_category`
--
ALTER TABLE `bi_psub_category`
  MODIFY `psubc_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bi_reg_users`
--
ALTER TABLE `bi_reg_users`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bi_shgreg`
--
ALTER TABLE `bi_shgreg`
  MODIFY `sh_shgid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bi_states`
--
ALTER TABLE `bi_states`
  MODIFY `st_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bi_temporders`
--
ALTER TABLE `bi_temporders`
  MODIFY `tem_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `va_appointments`
--
ALTER TABLE `va_appointments`
  MODIFY `vaap_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `va_employees`
--
ALTER TABLE `va_employees`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `va_employees_type`
--
ALTER TABLE `va_employees_type`
  MODIFY `empt_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `va_gallery`
--
ALTER TABLE `va_gallery`
  MODIFY `va_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `va_gallery_cat`
--
ALTER TABLE `va_gallery_cat`
  MODIFY `vag_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `va_news`
--
ALTER TABLE `va_news`
  MODIFY `van_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `va_predictions`
--
ALTER TABLE `va_predictions`
  MODIFY `vap_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `va_predic_cat_list`
--
ALTER TABLE `va_predic_cat_list`
  MODIFY `vpc_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
