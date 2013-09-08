-- phpMyAdmin SQL Dump
-- version 4.0.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 09, 2013 at 02:55 AM
-- Server version: 5.1.68-cll-lve
-- PHP Version: 5.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ozisby_mvideo`
--

-- --------------------------------------------------------

--
-- Table structure for table `newspapers`
--

CREATE TABLE IF NOT EXISTS `newspapers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `reff` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `newspapers`
--

INSERT INTO `newspapers` (`id`, `reff`, `user_id`, `date`, `name`) VALUES
(4, 'int_gazeta_16_2013', 1, '2013-08-20', 'Газета «М.Видео» №16');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `newspaper_id` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `newspaper_id`, `num`, `image`) VALUES
(1, 1, 1, 'http://www.mvideo.ru/pics/o/red_newspaper/pages/130709/page_01.jpg'),
(2, 1, 2, 'http://www.mvideo.ru/pics/o/red_newspaper/pages/130709/page_02.jpg'),
(3, 1, 3, 'http://www.mvideo.ru/pics/o/red_newspaper/pages/130709/page_03.jpg'),
(4, 1, 4, 'http://www.mvideo.ru/pics/o/red_newspaper/pages/130709/page_04.jpg'),
(5, 1, 5, 'http://www.mvideo.ru/pics/o/red_newspaper/pages/130709/page_05.jpg'),
(6, 1, 6, 'http://www.mvideo.ru/pics/o/red_newspaper/pages/130709/page_06.jpg'),
(7, 1, 7, 'http://www.mvideo.ru/pics/o/red_newspaper/pages/130709/page_07.jpg'),
(8, 1, 8, 'http://www.mvideo.ru/pics/o/red_newspaper/pages/130709/page_08.jpg'),
(9, 2, 1, 'http://www.mvideo.ru/pics/o/red_newspaper/pages/130730/page_01.jpg'),
(10, 2, 2, 'http://www.mvideo.ru/pics/o/red_newspaper/pages/130730/page_02.jpg'),
(11, 2, 3, 'http://www.mvideo.ru/pics/o/red_newspaper/pages/130730/page_03.jpg'),
(12, 2, 4, 'http://www.mvideo.ru/pics/o/red_newspaper/pages/130730/page_04.jpg'),
(13, 2, 5, 'http://www.mvideo.ru/pics/o/red_newspaper/pages/130730/page_05.jpg'),
(14, 2, 6, 'http://www.mvideo.ru/pics/o/red_newspaper/pages/130730/page_06.jpg'),
(15, 2, 7, 'http://www.mvideo.ru/pics/o/red_newspaper/pages/130730/page_07.jpg'),
(16, 2, 8, 'http://www.mvideo.ru/pics/o/red_newspaper/pages/130730/page_08.jpg'),
(17, 3, 1, '/pics/o/red_newspaper/pages/130820/page_01.jpg'),
(18, 3, 2, '/pics/o/red_newspaper/pages/130820/page_02.jpg'),
(19, 3, 3, '/pics/o/red_newspaper/pages/130820/page_03.jpg'),
(20, 3, 4, '/pics/o/red_newspaper/pages/130820/page_04.jpg'),
(21, 3, 5, '/pics/o/red_newspaper/pages/130820/page_05.jpg'),
(22, 3, 6, '/pics/o/red_newspaper/pages/130820/page_06.jpg'),
(23, 3, 7, '/pics/o/red_newspaper/pages/130820/page_07.jpg'),
(24, 3, 8, '/pics/o/red_newspaper/pages/130820/page_08.jpg'),
(25, 3, 9, '/pics/o/red_newspaper/pages/130820/page_09.jpg'),
(26, 3, 10, '/pics/o/red_newspaper/pages/130820/page_10.jpg'),
(27, 3, 11, '/pics/o/red_newspaper/pages/130820/page_11.jpg'),
(28, 3, 12, '/pics/o/red_newspaper/pages/130820/page_12.jpg'),
(29, 3, 13, '/pics/o/red_newspaper/pages/130820/page_13.jpg'),
(30, 3, 14, '/pics/o/red_newspaper/pages/130820/page_14.jpg'),
(31, 3, 15, '/pics/o/red_newspaper/pages/130820/page_15.jpg'),
(32, 3, 16, '/pics/o/red_newspaper/pages/130820/page_16.jpg'),
(33, 4, 1, 'http://www.mvideo.ru/pics/o/red_newspaper/pages/130820/page_01.jpg'),
(34, 4, 2, 'http://www.mvideo.ru/pics/o/red_newspaper/pages/130820/page_02.jpg'),
(35, 4, 3, 'http://www.mvideo.ru/pics/o/red_newspaper/pages/130820/page_03.jpg'),
(36, 4, 4, 'http://www.mvideo.ru/pics/o/red_newspaper/pages/130820/page_04.jpg'),
(37, 4, 5, 'http://www.mvideo.ru/pics/o/red_newspaper/pages/130820/page_05.jpg'),
(38, 4, 6, 'http://www.mvideo.ru/pics/o/red_newspaper/pages/130820/page_06.jpg'),
(39, 4, 7, 'http://www.mvideo.ru/pics/o/red_newspaper/pages/130820/page_07.jpg'),
(40, 4, 8, 'http://www.mvideo.ru/pics/o/red_newspaper/pages/130820/page_08.jpg'),
(41, 4, 9, 'http://www.mvideo.ru/pics/o/red_newspaper/pages/130820/page_09.jpg'),
(42, 4, 10, 'http://www.mvideo.ru/pics/o/red_newspaper/pages/130820/page_10.jpg'),
(43, 4, 11, 'http://www.mvideo.ru/pics/o/red_newspaper/pages/130820/page_11.jpg'),
(44, 4, 12, 'http://www.mvideo.ru/pics/o/red_newspaper/pages/130820/page_12.jpg'),
(45, 4, 13, 'http://www.mvideo.ru/pics/o/red_newspaper/pages/130820/page_13.jpg'),
(46, 4, 14, 'http://www.mvideo.ru/pics/o/red_newspaper/pages/130820/page_14.jpg'),
(47, 4, 15, 'http://www.mvideo.ru/pics/o/red_newspaper/pages/130820/page_15.jpg'),
(48, 4, 16, 'http://www.mvideo.ru/pics/o/red_newspaper/pages/130820/page_16.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE IF NOT EXISTS `regions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  `pos` int(11) NOT NULL,
  `x` int(10) unsigned NOT NULL,
  `y` int(10) unsigned NOT NULL,
  `width` int(10) unsigned NOT NULL,
  `height` int(10) unsigned NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `alt` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=384 ;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `page_id`, `pos`, `x`, `y`, `width`, `height`, `url`, `alt`) VALUES
(5, 9, 1, 0, 0, 900, 668, 'http://www.mvideo.ru/o_pereplata/', ''),
(6, 9, 2, 0, 1251, 900, 76, 'http://www.mvideo.ru/o_pereplata/', ''),
(7, 9, 3, 1, 670, 348, 272, '30018109', ''),
(8, 9, 4, 8, 741, 145, 25, '30018110', ''),
(9, 9, 5, 351, 671, 549, 582, '10003511', ''),
(10, 9, 6, 0, 946, 352, 307, '30018081', ''),
(11, 10, 1, 619, 1276, 0, 0, 'mvideo.ru/komplekt_logitech/', ''),
(12, 10, 14, 0, 1256, 900, 77, 'http://www.mvideo.ru/o_pereplata/', ''),
(13, 10, 13, 3, 2, 894, 107, 'http://www.mvideo.ru/o_pereplata/', ''),
(14, 10, 12, 0, 114, 296, 327, '30017014', ''),
(15, 10, 11, 296, 114, 303, 326, '30017993', ''),
(16, 10, 10, 596, 114, 303, 326, '30018046', ''),
(17, 10, 9, 0, 441, 295, 324, '30016693', ''),
(18, 10, 8, 293, 439, 286, 318, '30018126', ''),
(19, 10, 7, 579, 441, 321, 318, '30018166', ''),
(20, 10, 6, 0, 757, 305, 301, '30018165', ''),
(21, 10, 5, 305, 757, 294, 304, '30016329', ''),
(22, 10, 4, 471, 851, 124, 207, '530014708', ''),
(23, 10, 3, 597, 759, 303, 302, '30015346', ''),
(26, 11, 1, 0, 108, 307, 472, '30018095', ''),
(27, 11, 13, 304, 108, 303, 264, '30017704', ''),
(28, 11, 12, 608, 105, 292, 235, '30016834', ''),
(29, 11, 11, 605, 340, 295, 302, '30017949', ''),
(30, 11, 10, 305, 370, 302, 248, '30017701', ''),
(31, 11, 9, 1, 580, 302, 233, '30018108', ''),
(32, 11, 8, 305, 617, 300, 291, '30016460', ''),
(33, 11, 7, 604, 641, 296, 311, '30017103', ''),
(34, 11, 6, 0, 813, 304, 237, '30018045', ''),
(35, 11, 5, 305, 907, 299, 144, '50039421', ''),
(36, 11, 4, 601, 950, 299, 267, '30018020', ''),
(37, 11, 3, 4, 1051, 144, 164, '50036994', ''),
(38, 11, 2, 149, 1054, 154, 159, '50037847', ''),
(39, 11, 14, 300, 1050, 300, 164, '50037787', ''),
(40, 12, 1, 0, 1, 900, 107, 'http://www.mvideo.ru/o_pereplata/', ''),
(41, 12, 12, 280, 109, 381, 279, '10004760', ''),
(42, 12, 13, 663, 108, 237, 280, '10001855', ''),
(43, 12, 14, 279, 389, 308, 224, '10004734', ''),
(44, 12, 15, 587, 386, 313, 227, '10004196', ''),
(45, 12, 16, 280, 612, 304, 246, '10004329', ''),
(46, 12, 17, 585, 613, 315, 247, '10004196', ''),
(47, 12, 18, 1, 110, 151, 240, '30017937', ''),
(48, 12, 19, 153, 108, 124, 240, '30017939', ''),
(49, 12, 11, 0, 348, 279, 157, '30017938', ''),
(50, 12, 10, 0, 505, 217, 193, '30017930', ''),
(51, 12, 2, 203, 504, 76, 196, '30017577', ''),
(52, 12, 3, 3, 700, 272, 393, '40060429', ''),
(53, 12, 4, 0, 756, 233, 33, '40060425', ''),
(54, 12, 5, 277, 860, 308, 237, '10004555', ''),
(55, 12, 6, 584, 860, 316, 237, '10004399', ''),
(56, 12, 7, 3, 1093, 188, 133, '10004332', ''),
(57, 12, 8, 189, 1092, 163, 134, '10004393', ''),
(58, 12, 9, 351, 1094, 225, 134, '10004290', ''),
(59, 12, 20, 573, 1094, 327, 131, '50039319', ''),
(61, 13, 1, 0, 2, 900, 102, 'http://www.mvideo.ru/o_pereplata/', ''),
(62, 13, 13, 683, 108, 217, 576, 'http://www.mvideo.ru/3d-best/', ''),
(63, 13, 12, 1, 1250, 899, 79, 'http://service.mvideo.ru/delivery/', ''),
(64, 13, 11, 0, 106, 339, 270, '10004373', ''),
(65, 13, 10, 340, 105, 344, 267, '10004374', ''),
(66, 13, 9, 0, 377, 352, 289, '10004534', ''),
(67, 13, 8, 352, 373, 335, 289, '10004449', ''),
(68, 13, 7, 1, 666, 351, 278, '10004736', ''),
(69, 13, 6, 352, 666, 548, 279, '10004409', ''),
(70, 13, 5, 0, 946, 288, 178, '10002979', ''),
(71, 13, 4, 1, 1124, 286, 106, '10004359', ''),
(72, 13, 3, 288, 946, 265, 286, '10004632', ''),
(73, 13, 2, 551, 946, 349, 184, '10003529', ''),
(74, 13, 14, 552, 1129, 348, 101, '50039211', ''),
(75, 14, 1, 0, 0, 900, 106, 'http://www.mvideo.ru/novoselam/', ''),
(77, 14, 16, 0, 106, 232, 313, '20025612', ''),
(78, 14, 15, 232, 108, 220, 308, '20027645', ''),
(79, 14, 14, 451, 108, 218, 306, '20025768', ''),
(80, 14, 13, 668, 108, 232, 305, '20025817', ''),
(81, 14, 12, 0, 418, 232, 305, '20022633', ''),
(82, 14, 11, 231, 415, 220, 308, '20027225', ''),
(83, 14, 10, 448, 415, 211, 308, '20027197', ''),
(84, 14, 9, 656, 411, 244, 311, '20027671', ''),
(85, 14, 8, 3, 720, 225, 261, '20023459', ''),
(86, 14, 7, 225, 721, 222, 257, '20027502', ''),
(87, 14, 6, 445, 721, 227, 257, '20024211', ''),
(88, 14, 5, 671, 722, 229, 254, '20024725', ''),
(89, 14, 4, 4, 981, 215, 248, '20023790', ''),
(90, 14, 3, 217, 977, 232, 245, '20024939', ''),
(91, 14, 2, 448, 976, 220, 248, '20025728', ''),
(92, 14, 17, 665, 974, 235, 244, '20023977', ''),
(93, 15, 1, 3, 30, 897, 107, 'http://www.mvideo.ru/o_pereplata/', ''),
(94, 15, 18, 0, 1289, 900, 75, 'http://service.mvideo.ru/bistroservice/', ''),
(95, 15, 17, 1, 140, 218, 297, '20025850', ''),
(96, 15, 16, 217, 137, 244, 299, '20027553', ''),
(97, 15, 15, 459, 138, 234, 296, '20025590', ''),
(98, 15, 14, 1, 434, 226, 287, '20024163', ''),
(99, 15, 13, 225, 436, 228, 284, '20026657', ''),
(100, 15, 12, 453, 433, 242, 285, '20024094', ''),
(101, 15, 11, 3, 718, 234, 280, '20024387', ''),
(102, 15, 10, 239, 721, 212, 278, '20027591', ''),
(103, 15, 9, 452, 721, 240, 280, '20027683', ''),
(104, 15, 8, 3, 1002, 249, 267, '20025737', ''),
(105, 15, 7, 251, 1001, 245, 266, '20022754', ''),
(106, 15, 6, 497, 1002, 196, 261, '20024472', ''),
(107, 15, 5, 697, 141, 203, 221, '20024417', ''),
(108, 15, 4, 697, 361, 202, 167, '20026770', ''),
(109, 15, 3, 696, 529, 204, 226, '20026291', ''),
(110, 15, 2, 696, 757, 203, 233, '20026772', ''),
(111, 15, 19, 695, 989, 205, 272, '20026580', ''),
(112, 16, 1, 3, 1, 896, 107, 'http://www.mvideo.ru/o_pereplata/', ''),
(113, 16, 14, 0, 986, 900, 52, 'http://www.mvideo.ru/o_pereplata/', ''),
(114, 16, 13, 511, 1038, 389, 263, 'http://www.mvideo.ru/shops/', ''),
(115, 16, 12, 0, 109, 598, 232, '30017803', ''),
(116, 16, 11, 596, 109, 304, 231, '30018024', ''),
(117, 16, 10, 6, 342, 300, 219, '30017870', ''),
(118, 16, 9, 303, 341, 292, 223, '30017779', ''),
(119, 16, 8, 592, 337, 307, 216, '30017260', ''),
(120, 16, 7, 0, 561, 302, 192, '50037939', ''),
(121, 16, 6, 303, 565, 188, 190, '10004156', ''),
(122, 16, 5, 468, 562, 136, 196, '10004158', ''),
(123, 16, 4, 599, 554, 301, 205, '10001321', ''),
(124, 16, 3, 4, 754, 303, 215, '10003598', ''),
(125, 16, 2, 306, 757, 292, 214, '10004271', ''),
(126, 16, 15, 596, 757, 304, 214, '10003505', ''),
(127, 10, 2, 0, 1057, 900, 196, 'http://www.mvideo.ru/komplekt_logitech/', ''),
(128, 10, 15, 772, 864, 114, 184, '30015530', ''),
(132, 1, 2, 194, 123, 539, 126, '', ''),
(133, 1, 3, 414, 225, 100, 116, '', ''),
(134, 1, 1, 349, 215, 218, 96, '', ''),
(135, 7, 2, 342, 963, 315, 218, '', ''),
(136, 7, 1, 354, 1069, 315, 176, '', ''),
(137, 33, 1, 0, 0, 900, 802, 'http://www.mvideo.ru/o_pereplata/', ''),
(138, 33, 2, 5, 810, 451, 414, '30018064', ''),
(139, 33, 3, 462, 810, 437, 412, '30018342', ''),
(140, 34, 1, 0, 0, 900, 106, 'http://www.mvideo.ru/o_pereplata/', ''),
(141, 34, 2, 2, 144, 300, 268, '30018131', ''),
(142, 34, 3, 2, 413, 300, 269, '30018042', ''),
(143, 34, 4, 0, 683, 301, 252, '30018154', ''),
(144, 34, 5, 1, 936, 300, 282, '30017105', ''),
(145, 34, 6, 305, 154, 273, 257, '30018218', ''),
(146, 34, 7, 303, 413, 274, 265, '30018130', ''),
(147, 34, 8, 302, 678, 255, 255, '30017598', ''),
(148, 34, 9, 302, 934, 251, 216, '30015720', ''),
(149, 34, 10, 302, 1152, 248, 69, '30015745', ''),
(150, 34, 11, 579, 138, 321, 272, '30018081', ''),
(151, 34, 12, 575, 412, 323, 212, '30018023', ''),
(152, 34, 13, 579, 627, 321, 183, '30017687', ''),
(153, 34, 14, 558, 812, 341, 116, '30017529', ''),
(154, 34, 15, 557, 928, 343, 146, '50036492', ''),
(155, 34, 16, 553, 1076, 152, 145, '50039198', ''),
(156, 34, 17, 706, 1076, 188, 145, '50036227', ''),
(157, 35, 1, 3, 140, 294, 264, '30018125', ''),
(158, 35, 2, 3, 406, 290, 252, '30017894', ''),
(159, 35, 3, 3, 661, 288, 209, '30017871', ''),
(160, 35, 4, 295, 156, 298, 250, '30018300', ''),
(161, 35, 5, 291, 406, 300, 248, '30017956', ''),
(162, 35, 6, 299, 657, 130, 217, '40059202', ''),
(163, 35, 7, 431, 660, 164, 214, '40060286', ''),
(164, 35, 8, 2, 872, 236, 237, '50036338', ''),
(165, 35, 9, 238, 873, 199, 236, '50037358', ''),
(166, 35, 10, 438, 874, 152, 235, '50034386', ''),
(167, 35, 11, 1, 1110, 277, 107, '50034336', ''),
(168, 35, 12, 279, 1109, 310, 105, '50035168', ''),
(169, 35, 13, 0, 1, 900, 104, 'http://www.mvideo.ru/skidka_pokupka/', ''),
(170, 35, 14, 593, 141, 307, 204, '30018301', ''),
(171, 35, 15, 594, 348, 306, 226, '30017497', ''),
(172, 35, 16, 593, 574, 307, 204, '30017705', ''),
(173, 35, 17, 595, 782, 305, 218, '30018303', ''),
(174, 35, 18, 594, 1001, 306, 152, '30015347', ''),
(175, 35, 19, 595, 1154, 305, 67, '30015530', ''),
(176, 35, 20, 1, 1249, 899, 52, 'http://www.mvideo.ru/office-365/', ''),
(177, 36, 1, 0, 130, 251, 211, '30016814', ''),
(178, 36, 2, 249, 148, 390, 193, '30016890', ''),
(179, 36, 3, 2, 344, 317, 218, '30017949', ''),
(180, 36, 4, 313, 342, 330, 222, '30015705', ''),
(181, 36, 5, 303, 565, 298, 240, '30018078', ''),
(182, 36, 6, 2, 786, 156, 236, '50038517', ''),
(183, 36, 7, 158, 786, 145, 236, '50038516', ''),
(184, 36, 8, 19, 1029, 227, 197, '50038627', ''),
(185, 36, 9, 247, 1030, 115, 199, '50038457', ''),
(186, 36, 10, 362, 1032, 107, 193, '50038456', ''),
(187, 36, 11, 471, 1032, 122, 192, '50038455', ''),
(188, 36, 12, 301, 805, 300, 225, '30017885', ''),
(189, 36, 13, 595, 1033, 287, 195, '50035787', ''),
(190, 36, 14, 605, 805, 289, 224, '30018075', ''),
(191, 36, 15, 606, 565, 294, 240, '30018097', ''),
(192, 36, 16, 643, 142, 257, 156, '30016838', ''),
(193, 36, 17, 645, 301, 255, 255, '30017101', ''),
(194, 37, 1, 2, 2, 896, 104, 'http://www.mvideo.ru/o_pereplata/', ''),
(195, 37, 2, 3, 144, 319, 253, '30018219', ''),
(196, 37, 3, 323, 145, 271, 251, '30017646', ''),
(197, 37, 4, 5, 402, 316, 264, '30018150', ''),
(198, 37, 5, 325, 397, 269, 193, '30016440', ''),
(199, 37, 6, 323, 590, 271, 66, '30017151', ''),
(200, 37, 7, 595, 116, 300, 212, '50038734', ''),
(201, 37, 8, 594, 328, 149, 134, '50038646', ''),
(202, 37, 9, 743, 329, 156, 133, '50036813', ''),
(203, 37, 10, 594, 462, 306, 188, '50033396', ''),
(204, 37, 11, 0, 684, 323, 286, '30017994', ''),
(205, 37, 12, 325, 696, 277, 270, '30016848', ''),
(206, 37, 13, 603, 693, 297, 273, '30016789', ''),
(207, 37, 14, 598, 972, 299, 252, '50037439', ''),
(208, 37, 15, 201, 969, 281, 252, '50039689', ''),
(209, 37, 16, 410, 972, 180, 249, '50039690', ''),
(210, 37, 17, 0, 972, 202, 102, '50037811', ''),
(211, 37, 18, 0, 1073, 207, 80, '50037812', ''),
(212, 37, 19, 1, 1153, 205, 71, '50037824', ''),
(213, 38, 1, 0, 0, 900, 107, 'http://www.mvideo.ru/o_pereplata/', ''),
(214, 38, 2, 2, 109, 281, 321, '30017944', ''),
(215, 38, 3, 285, 110, 180, 324, '30017945', ''),
(216, 38, 4, 466, 110, 212, 324, '30018091', ''),
(217, 38, 5, 1, 433, 232, 324, '30016382', ''),
(218, 38, 6, 235, 437, 207, 324, '30017143', ''),
(219, 38, 7, 446, 438, 232, 323, '30017666', ''),
(220, 38, 8, 679, 110, 221, 295, '50039420', ''),
(221, 38, 9, 679, 405, 107, 154, '50036005', ''),
(222, 38, 10, 782, 407, 113, 151, '50036004', ''),
(223, 38, 11, 0, 761, 294, 216, '50038529', ''),
(224, 38, 12, 297, 762, 293, 218, '10003760', ''),
(225, 38, 13, 593, 762, 304, 214, '10003590', ''),
(226, 38, 14, 0, 977, 306, 255, '50039160', ''),
(227, 38, 15, 306, 980, 300, 248, '10003452', ''),
(228, 38, 16, 606, 977, 294, 251, '10003833', ''),
(229, 39, 1, 1, 0, 899, 104, 'http://www.mvideo.ru/skidka_pokupka/', ''),
(230, 39, 2, 2, 1250, 898, 52, 'http://service.mvideo.ru/digital-assistant/', ''),
(231, 39, 3, 3, 110, 306, 236, '10003950', ''),
(232, 39, 4, 310, 110, 284, 236, '10004206', ''),
(233, 39, 5, 594, 109, 304, 237, '10003559', ''),
(234, 39, 6, 594, 348, 306, 226, '10003599', ''),
(235, 39, 7, 307, 349, 287, 223, '10004410', ''),
(236, 39, 8, 1, 346, 305, 226, '10004180', ''),
(237, 39, 9, 2, 573, 317, 228, '10003598', ''),
(238, 39, 10, 309, 573, 297, 228, '10001062', ''),
(239, 39, 11, 606, 576, 294, 224, '10001247', ''),
(240, 39, 12, 407, 800, 493, 182, '10004628', ''),
(241, 39, 13, 603, 985, 296, 241, '30018212', ''),
(242, 39, 14, 309, 983, 291, 242, '30018213', ''),
(243, 39, 15, 2, 802, 292, 178, '50037436', ''),
(244, 39, 16, 295, 801, 114, 176, '50034336', ''),
(245, 39, 17, 2, 980, 303, 242, '30016717', ''),
(246, 40, 1, 0, 0, 900, 102, 'http://www.mvideo.ru/ac4/', ''),
(247, 40, 2, 3, 114, 340, 230, '40060185', ''),
(248, 40, 3, 1, 344, 297, 160, '40055836', ''),
(249, 40, 4, 587, 122, 312, 391, '40061051', ''),
(250, 40, 5, 1, 505, 376, 219, '10003200', ''),
(251, 40, 6, 378, 509, 522, 215, '10002383', ''),
(252, 40, 7, 5, 726, 462, 238, '10004518', ''),
(253, 40, 8, 470, 726, 430, 238, '10002719', ''),
(254, 40, 9, 3, 1037, 504, 252, 'http://service.mvideo.ru/', ''),
(255, 40, 10, 511, 1038, 389, 258, 'http://www.mvideo.ru/shops/', ''),
(256, 41, 1, 1, 1, 899, 757, 'http://www.mvideo.ru/o_pereplata/', ''),
(257, 41, 2, 2, 760, 445, 462, '20024563', ''),
(258, 41, 3, 449, 758, 449, 463, '10004337', ''),
(259, 42, 1, 3, 1, 897, 103, 'http://www.mvideo.ru/o_pereplata/', ''),
(260, 42, 2, 5, 105, 469, 283, '10004453', ''),
(261, 42, 3, 475, 105, 425, 284, '10004515', ''),
(262, 42, 4, 2, 390, 581, 280, '10003512', ''),
(263, 42, 5, 583, 390, 317, 280, '10004560', ''),
(264, 42, 6, 3, 670, 299, 298, '10004590', ''),
(265, 42, 7, 302, 672, 295, 296, '10004389', ''),
(266, 42, 8, 595, 672, 305, 294, '10004525', ''),
(267, 42, 9, 3, 968, 311, 260, '10004461', ''),
(268, 42, 10, 702, 966, 198, 262, '50033476', ''),
(269, 43, 1, 1, 0, 899, 106, 'http://www.mvideo.ru/skidka_pokupka/', ''),
(270, 43, 2, 1, 108, 293, 249, '10003081', ''),
(271, 43, 3, 297, 109, 300, 248, '10004474', ''),
(272, 43, 4, 595, 108, 305, 220, '10004631', ''),
(273, 43, 5, 598, 328, 302, 220, '10004543', ''),
(274, 43, 6, 1, 374, 298, 314, '10004566', ''),
(275, 43, 7, 298, 373, 297, 315, '10004338', ''),
(276, 43, 8, 598, 549, 302, 193, '10004371', ''),
(277, 43, 9, 299, 688, 296, 297, '10004545', ''),
(278, 43, 10, 3, 686, 296, 295, '10004446', ''),
(279, 43, 11, 594, 742, 306, 243, '10004556', ''),
(280, 43, 12, 2, 981, 305, 248, '10004450', ''),
(281, 43, 13, 307, 985, 338, 241, '10004797', ''),
(282, 43, 14, 649, 990, 251, 198, '10003750', ''),
(283, 43, 15, 646, 1138, 254, 87, '10003751', ''),
(284, 43, 16, 1, 1248, 899, 49, 'http://service.mvideo.ru/installation/', ''),
(285, 44, 1, 1, 2, 899, 103, 'http://www.mvideo.ru/o_pereplata/', ''),
(286, 44, 2, 2, 109, 232, 310, '20025075', ''),
(287, 44, 3, 234, 110, 208, 309, '20027675', ''),
(288, 44, 4, 443, 110, 227, 308, '20025861', ''),
(289, 44, 5, 670, 111, 230, 310, '20024745', ''),
(290, 44, 6, 670, 422, 230, 299, '20027513', ''),
(291, 44, 7, 443, 419, 227, 302, '20023947', ''),
(292, 44, 8, 234, 421, 209, 300, '20027194', ''),
(293, 44, 9, 2, 421, 231, 300, '20027201', ''),
(294, 44, 10, 669, 722, 231, 256, '20026529', ''),
(295, 44, 11, 442, 722, 225, 256, '20025010', ''),
(296, 44, 12, 233, 722, 206, 255, '20025578', ''),
(297, 44, 13, 3, 721, 232, 255, '20027771', ''),
(298, 44, 14, 3, 977, 222, 255, '20027104', ''),
(299, 44, 15, 226, 978, 223, 254, '20026563', ''),
(300, 44, 16, 450, 978, 219, 254, '20027530', ''),
(301, 44, 17, 671, 978, 229, 251, '20025591', ''),
(302, 45, 1, 5, 0, 895, 105, 'http://www.mvideo.ru/o_pereplata/', ''),
(303, 45, 2, 2, 109, 332, 131, '20024702', ''),
(304, 45, 3, 3, 241, 331, 156, '20020467', ''),
(305, 45, 4, 337, 108, 328, 132, '20027742', ''),
(306, 45, 5, 335, 241, 334, 157, '20021638', ''),
(307, 45, 6, 666, 108, 234, 292, '20023886', ''),
(308, 45, 7, 665, 397, 235, 292, '20024461', ''),
(309, 45, 8, 333, 400, 333, 136, '20022125', ''),
(310, 45, 9, 3, 398, 332, 138, '20024058', ''),
(311, 45, 10, 3, 538, 326, 155, '20022395', ''),
(312, 45, 11, 331, 536, 335, 156, '20008244', ''),
(313, 45, 12, 667, 692, 233, 284, '20027407', ''),
(314, 45, 13, 331, 693, 335, 129, '20024454', ''),
(315, 45, 14, 329, 824, 338, 162, '20024080', ''),
(316, 45, 15, 1, 694, 330, 130, '20027706', ''),
(317, 45, 16, 2, 824, 327, 161, '20027628', ''),
(318, 45, 17, 5, 988, 229, 237, '20027600', ''),
(319, 45, 18, 235, 992, 211, 233, '20026444', ''),
(320, 45, 19, 446, 993, 216, 231, '20026629', ''),
(321, 45, 20, 663, 978, 237, 246, '20025726', ''),
(322, 45, 21, 1, 1248, 899, 52, 'http://service.mvideo.ru/', ''),
(323, 46, 1, 3, 1, 897, 100, 'http://www.mvideo.ru/o_pereplata/', ''),
(324, 46, 2, 21, 126, 210, 184, '20022874', ''),
(325, 46, 3, 21, 310, 208, 191, '20026396', ''),
(326, 46, 4, 231, 125, 212, 375, '182507', ''),
(327, 46, 6, 674, 109, 226, 232, '20027824', ''),
(328, 46, 5, 454, 108, 219, 234, '20023866', ''),
(329, 46, 7, 671, 342, 229, 231, '20026849', ''),
(330, 46, 8, 457, 345, 213, 225, '20022740', ''),
(331, 46, 9, 457, 571, 218, 226, '20027343', ''),
(332, 46, 10, 675, 574, 225, 221, '20024356', ''),
(333, 46, 11, 233, 507, 217, 254, '20023161', ''),
(334, 46, 12, 0, 505, 234, 257, '20023727', ''),
(335, 46, 13, 677, 797, 223, 219, '20027680', ''),
(336, 46, 14, 458, 797, 221, 217, '20025632', ''),
(337, 46, 15, 233, 764, 217, 252, '20025695', ''),
(338, 46, 16, 1, 762, 232, 252, '20022517', ''),
(339, 46, 17, 3, 1014, 228, 240, '20024479', ''),
(340, 46, 18, 233, 1018, 190, 231, '50039296', ''),
(341, 46, 19, 423, 1018, 216, 230, '50039312', ''),
(342, 46, 20, 639, 1018, 258, 150, '50039328', ''),
(343, 47, 1, 2, 0, 898, 105, 'http://www.mvideo.ru/skidka_pokupka/', ''),
(344, 47, 2, 0, 108, 235, 296, '20023868', ''),
(345, 47, 3, 235, 108, 220, 298, '20026219', ''),
(346, 47, 4, 455, 109, 212, 291, '20027552', ''),
(347, 47, 5, 669, 106, 231, 291, '20022610', ''),
(348, 47, 6, 670, 398, 230, 279, '20025713', ''),
(349, 47, 7, 455, 400, 215, 274, '20021610', ''),
(350, 47, 8, 234, 406, 221, 271, '20025710', ''),
(351, 47, 9, 2, 404, 231, 273, '20025857', ''),
(352, 47, 10, 3, 678, 234, 281, '20027391', ''),
(353, 47, 11, 237, 678, 208, 281, '20026885', ''),
(354, 47, 12, 445, 679, 220, 282, '20021938', ''),
(355, 47, 13, 665, 679, 235, 282, '20027703', ''),
(356, 47, 14, 662, 963, 237, 282, '20026876', ''),
(357, 47, 15, 445, 962, 218, 281, '20025774', ''),
(358, 47, 16, 230, 961, 215, 280, '20027542', ''),
(359, 47, 17, 3, 962, 228, 280, '20027949', ''),
(360, 47, 18, 0, 1242, 900, 61, 'http://service.mvideo.ru/bistroservice/', ''),
(361, 48, 1, 3, 1, 897, 108, 'http://www.mvideo.ru/o_pereplata/', ''),
(362, 48, 2, 3, 110, 224, 288, '20026221', ''),
(363, 48, 3, 227, 108, 228, 289, '20027392', ''),
(364, 48, 4, 451, 108, 263, 288, '20025871', ''),
(365, 48, 5, 717, 108, 181, 288, '20027985', ''),
(366, 48, 6, 674, 394, 226, 287, '20027117', ''),
(367, 48, 7, 447, 397, 230, 284, '20023467', ''),
(368, 48, 8, 226, 397, 221, 283, '20022974', ''),
(369, 48, 9, 3, 400, 224, 280, '20024581', ''),
(370, 48, 10, 3, 681, 222, 284, '223898', ''),
(371, 48, 11, 225, 682, 221, 284, '20026537', ''),
(372, 48, 12, 447, 682, 226, 283, '20022693', ''),
(373, 48, 13, 675, 682, 225, 284, '20024644', ''),
(374, 48, 14, 671, 967, 229, 283, '50039641', ''),
(375, 48, 15, 443, 965, 231, 285, '20026954', ''),
(376, 48, 16, 223, 963, 222, 288, '20025641', ''),
(377, 48, 17, 0, 965, 222, 288, '20024723', ''),
(378, 42, 11, 449, 968, 129, 258, '50034965', ''),
(379, 42, 12, 578, 968, 127, 258, '50039486', ''),
(380, 36, 18, 2, 561, 297, 224, 'http://www.mvideo.ru/targus_chehol/', ''),
(381, 38, 17, 677, 558, 220, 100, '50033477', ''),
(382, 38, 18, 679, 661, 221, 96, '50033476', ''),
(383, 46, 21, 640, 1097, 257, 152, '50039329', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `surname`) VALUES
(1, 'Vitaliy.Ozerskiy@mvideo.ru', 'ff4097dbf39e935347e3ed0c61e390a6', 'Виталий', 'Озерский');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
