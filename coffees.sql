-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2026 at 04:42 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffees`
--

-- --------------------------------------------------------

--
-- Table structure for table `acc`
--

CREATE TABLE `acc` (
  `id` int(5) NOT NULL,
  `uid` int(5) NOT NULL,
  `date` date NOT NULL,
  `typ` int(1) NOT NULL,
  `action` varchar(50) NOT NULL,
  `detail` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `acc`
--

INSERT INTO `acc` (`id`, `uid`, `date`, `typ`, `action`, `detail`, `status`) VALUES
(1, 1, '2026-08-26', 4, 'Payment', 'Data from Payment Rec#1', 1),
(2, 1, '2026-08-28', 5, 'Production', 'Data from Production#1', 1),
(3, 1, '2026-08-28', 5, 'Production', 'Data from Production#2', 1),
(4, 1, '2026-08-28', 5, 'Production', 'Data from Production#3', 1),
(5, 1, '2026-08-28', 5, 'Production', 'Data from Production#4', 1),
(6, 1, '2026-08-28', 5, 'Production', 'Data from Production#5', 1),
(7, 1, '2026-08-28', 1, 'receipt', 'Data from receipt Rec#1', 1),
(8, 1, '2026-08-28', 5, 'Production', 'Data from Production#6', 1),
(9, 1, '2026-08-28', 5, 'Production', 'Data from Production#7', 1),
(10, 1, '2026-08-28', 5, 'Production', 'Data from Production#8', 1),
(11, 1, '2026-08-30', 4, 'receipt', 'Data from receipt Rec#1', 1),
(12, 1, '2026-08-30', 4, 'receipt', 'Data from receipt Rec#2', 1),
(13, 1, '2026-08-30', 4, 'receipt', 'Data from receipt Rec#3', 1),
(14, 1, '2026-08-31', 4, 'Payment', 'Payroll test ja', 1),
(15, 1, '2026-08-31', 4, 'Payment', 'Payroll test ja', 1),
(16, 1, '2026-08-31', 4, 'Payment', 'Payroll test ja', 1),
(17, 1, '2026-09-02', 5, 'Production', 'Data from Production#9', 1),
(18, 1, '2026-09-02', 5, 'Production', 'Data from Production#10', 1),
(19, 1, '2026-09-02', 5, 'Production', 'Data from Production#14', 1),
(20, 1, '2026-09-02', 5, 'Production', 'Data from Production#15', 1),
(21, 1, '2026-09-02', 5, 'Production', 'Data from Production#16', 1),
(22, 1, '2026-09-02', 5, 'Production', 'Data from Production#17', 1),
(23, 1, '2026-09-02', 5, 'Production', 'Data from Production#18', 1),
(24, 1, '2026-09-02', 5, 'Production', 'Data from Production#19', 1),
(25, 1, '2026-09-02', 5, 'Production', 'Data from Production#20', 1),
(26, 1, '2026-09-02', 5, 'Production', 'Data from Production#21', 1),
(27, 1, '2026-09-02', 5, 'Production', 'Data from Production#22', 1),
(28, 1, '2026-09-06', 3, 'receipt', 'Data from receipt Rec#4', 1),
(29, 1, '2026-09-06', 4, 'Payment', 'Data from Payment Rec#1', 1),
(30, 1, '2026-09-06', 3, 'receipt', 'Data from receipt Rec#1', 1),
(31, 1, '2026-09-06', 5, 'Production', 'Data from Production#1', 1),
(32, 1, '2026-09-06', 4, 'Payment', 'Payroll Somchai Test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `acc_detail`
--

CREATE TABLE `acc_detail` (
  `id` int(5) NOT NULL,
  `acc_id` int(5) NOT NULL,
  `typ_id` int(5) NOT NULL,
  `typ` int(5) NOT NULL,
  `value` decimal(10,2) NOT NULL,
  `detail` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `acc_detail`
--

INSERT INTO `acc_detail` (`id`, `acc_id`, `typ_id`, `typ`, `value`, `detail`, `status`) VALUES
(1, 1, 9, 1, 10000.00, '', 1),
(2, 1, 2, 2, 10000.00, '', 1),
(3, 2, 10, 1, 50.00, '', 1),
(4, 2, 8, 2, 50.00, '', 1),
(5, 3, 10, 1, 250.00, '', 1),
(6, 3, 8, 2, 250.00, '', 1),
(7, 4, 10, 1, 500.00, '', 1),
(8, 4, 8, 2, 500.00, '', 1),
(9, 5, 10, 1, 200.00, '', 1),
(10, 5, 8, 2, 200.00, '', 1),
(11, 6, 10, 1, 100.00, '', 1),
(12, 6, 8, 2, 100.00, '', 1),
(13, 7, 9, 1, 0.00, '', 1),
(14, 7, 1, 2, 0.00, '', 1),
(15, 6, 1, 1, 0.00, '', 1),
(16, 7, 1, 1, 180.00, '', 1),
(17, 8, 10, 1, 200.00, '', 1),
(18, 8, 8, 2, 200.00, '', 1),
(19, 8, 2, 2, 360.00, '', 1),
(20, 9, 10, 1, 50.00, '', 1),
(21, 9, 8, 2, 50.00, '', 1),
(22, 10, 10, 1, 250.00, '', 1),
(23, 10, 8, 2, 250.00, '', 1),
(24, 11, 9, 1, 0.00, '', 1),
(25, 11, 1, 2, 0.00, '', 1),
(26, 12, 9, 1, 0.00, '', 1),
(27, 12, 1, 2, 0.00, '', 1),
(28, 13, 9, 1, 0.00, '', 1),
(29, 13, 1, 2, 0.00, '', 1),
(30, 14, 9, 1, 50.00, 'Salary Payment', 1),
(31, 15, 9, 1, 180.00, '', 1),
(32, 15, 1, 2, 180.00, '', 1),
(33, 16, 9, 1, 100.00, '', 1),
(34, 16, 1, 2, 100.00, '', 1),
(35, 17, 10, 1, 250.00, '', 1),
(36, 17, 8, 2, 250.00, '', 1),
(37, 18, 10, 1, 0.00, '', 1),
(38, 18, 8, 2, 0.00, '', 1),
(39, 19, 10, 1, 180.00, '', 1),
(40, 19, 8, 2, 180.00, '', 1),
(41, 20, 10, 1, 1800.00, '', 1),
(42, 20, 8, 2, 1800.00, '', 1),
(43, 21, 10, 1, 180.00, '', 1),
(44, 21, 8, 2, 180.00, '', 1),
(45, 22, 10, 1, 900.00, '', 1),
(46, 22, 8, 2, 900.00, '', 1),
(47, 23, 10, 1, 250.00, '', 1),
(48, 23, 8, 2, 250.00, '', 1),
(49, 24, 10, 1, 250.00, '', 1),
(50, 24, 8, 2, 250.00, '', 1),
(51, 25, 10, 1, 150.00, '', 1),
(52, 25, 8, 2, 150.00, '', 1),
(53, 26, 10, 1, 50.00, '', 1),
(54, 26, 8, 2, 50.00, '', 1),
(55, 27, 10, 1, 50.00, '', 1),
(56, 27, 8, 2, 50.00, '', 1),
(57, 28, 9, 1, 0.00, '', 1),
(58, 28, 3, 2, 0.00, '', 1),
(59, 29, 9, 1, 50.00, '', 1),
(60, 29, 4, 2, 50.00, '', 1),
(61, 30, 9, 1, 0.00, '', 1),
(62, 30, 3, 2, 0.00, '', 1),
(63, 31, 10, 1, 50.00, '', 1),
(64, 31, 8, 2, 50.00, '', 1),
(65, 32, 9, 1, 5000.00, '', 1),
(66, 32, 1, 2, 5000.00, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `acc_typ`
--

CREATE TABLE `acc_typ` (
  `id` int(5) NOT NULL,
  `typ` int(1) NOT NULL,
  `root` int(5) NOT NULL,
  `ord` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `detail` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `acc_typ`
--

INSERT INTO `acc_typ` (`id`, `typ`, `root`, `ord`, `name`, `detail`, `status`) VALUES
(1, 1, 1, 1, 'สินทรัพย์ ', '', 1),
(2, 2, 2, 1, 'หนี้สิน', '', 1),
(3, 3, 3, 1, 'รายรับ', '', 1),
(4, 4, 4, 1, 'รายจ่าย', '', 1),
(5, 5, 5, 1, 'สินค้าสำเร็จรูป', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `acl`
--

CREATE TABLE `acl` (
  `id` int(5) NOT NULL,
  `ugid` int(5) NOT NULL,
  `appid` int(5) NOT NULL,
  `accl` int(1) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `acl`
--

INSERT INTO `acl` (`id`, `ugid`, `appid`, `accl`, `status`) VALUES
(1, 1, 1, 7, 0),
(2, 1, 2, 7, 0),
(3, 1, 8, 7, 0),
(4, 1, 1, 7, 0),
(5, 1, 2, 7, 0),
(6, 1, 3, 7, 0),
(7, 1, 4, 7, 0),
(8, 1, 5, 7, 0),
(9, 1, 6, 7, 0),
(10, 1, 7, 7, 0),
(11, 1, 8, 7, 0),
(12, 1, 1, 7, 0),
(13, 1, 2, 7, 0),
(14, 1, 3, 7, 0),
(15, 1, 4, 7, 0),
(16, 1, 5, 7, 0),
(17, 1, 6, 7, 0),
(18, 1, 7, 7, 0),
(19, 1, 8, 7, 0),
(20, 1, 9, 7, 0),
(21, 1, 1, 7, 0),
(22, 1, 2, 7, 0),
(23, 1, 3, 7, 0),
(24, 1, 4, 7, 0),
(25, 1, 5, 7, 0),
(26, 1, 6, 7, 0),
(27, 1, 7, 7, 0),
(28, 1, 8, 7, 0),
(29, 1, 9, 7, 0),
(30, 1, 10, 7, 0),
(31, 1, 1, 7, 0),
(32, 1, 2, 7, 0),
(33, 1, 3, 7, 0),
(34, 1, 4, 7, 0),
(35, 1, 5, 7, 0),
(36, 1, 6, 7, 0),
(37, 1, 7, 7, 0),
(38, 1, 8, 7, 0),
(39, 1, 9, 7, 0),
(40, 1, 10, 7, 0),
(41, 1, 11, 7, 0),
(42, 1, 1, 7, 0),
(43, 1, 2, 7, 0),
(44, 1, 3, 7, 0),
(45, 1, 4, 7, 0),
(46, 1, 5, 7, 0),
(47, 1, 6, 7, 0),
(48, 1, 7, 7, 0),
(49, 1, 8, 7, 0),
(50, 1, 9, 7, 0),
(51, 1, 10, 7, 0),
(52, 1, 11, 7, 0),
(53, 1, 12, 7, 0),
(54, 1, 13, 7, 0),
(55, 1, 14, 7, 0),
(56, 1, 15, 7, 0),
(57, 1, 16, 7, 0),
(58, 1, 1, 7, 0),
(59, 1, 2, 7, 0),
(60, 1, 3, 7, 0),
(61, 1, 4, 7, 0),
(62, 1, 5, 7, 0),
(63, 1, 6, 7, 0),
(64, 1, 7, 7, 0),
(65, 1, 8, 7, 0),
(66, 1, 9, 7, 0),
(67, 1, 10, 7, 0),
(68, 1, 11, 7, 0),
(69, 1, 12, 7, 0),
(70, 1, 13, 7, 0),
(71, 1, 14, 7, 0),
(72, 1, 15, 7, 0),
(73, 1, 16, 7, 0),
(74, 1, 1, 7, 0),
(75, 1, 2, 7, 0),
(76, 1, 3, 7, 0),
(77, 1, 4, 7, 0),
(78, 1, 5, 7, 0),
(79, 1, 6, 7, 0),
(80, 1, 7, 7, 0),
(81, 1, 8, 7, 0),
(82, 1, 9, 7, 0),
(83, 1, 10, 7, 0),
(84, 1, 11, 7, 0),
(85, 1, 12, 7, 0),
(86, 1, 13, 7, 0),
(87, 1, 14, 7, 0),
(88, 1, 15, 7, 0),
(89, 1, 16, 7, 0),
(90, 1, 17, 7, 0),
(91, 1, 1, 7, 0),
(92, 1, 2, 7, 0),
(93, 1, 3, 7, 0),
(94, 1, 4, 7, 0),
(95, 1, 5, 7, 0),
(96, 1, 6, 7, 0),
(97, 1, 7, 7, 0),
(98, 1, 8, 7, 0),
(99, 1, 9, 7, 0),
(100, 1, 10, 7, 0),
(101, 1, 11, 7, 0),
(102, 1, 12, 7, 0),
(103, 1, 13, 7, 0),
(104, 1, 14, 7, 0),
(105, 1, 15, 7, 0),
(106, 1, 16, 7, 0),
(107, 1, 17, 7, 0),
(108, 1, 18, 7, 0),
(109, 1, 19, 7, 0),
(110, 1, 20, 7, 0),
(111, 1, 1, 7, 0),
(112, 1, 2, 7, 0),
(113, 1, 3, 7, 0),
(114, 1, 4, 7, 0),
(115, 1, 5, 7, 0),
(116, 1, 6, 7, 0),
(117, 1, 7, 7, 0),
(118, 1, 8, 7, 0),
(119, 1, 9, 7, 0),
(120, 1, 10, 7, 0),
(121, 1, 11, 7, 0),
(122, 1, 12, 7, 0),
(123, 1, 13, 7, 0),
(124, 1, 14, 7, 0),
(125, 1, 15, 7, 0),
(126, 1, 16, 7, 0),
(127, 1, 17, 7, 0),
(128, 1, 18, 7, 0),
(129, 1, 19, 7, 0),
(130, 1, 20, 7, 0),
(131, 1, 21, 7, 0),
(132, 1, 1, 7, 0),
(133, 1, 2, 7, 0),
(134, 1, 3, 7, 0),
(135, 1, 4, 7, 0),
(136, 1, 5, 7, 0),
(137, 1, 6, 7, 0),
(138, 1, 7, 7, 0),
(139, 1, 8, 7, 0),
(140, 1, 9, 7, 0),
(141, 1, 10, 7, 0),
(142, 1, 11, 7, 0),
(143, 1, 12, 7, 0),
(144, 1, 13, 7, 0),
(145, 1, 14, 7, 0),
(146, 1, 15, 7, 0),
(147, 1, 16, 7, 0),
(148, 1, 17, 7, 0),
(149, 1, 18, 7, 0),
(150, 1, 19, 7, 0),
(151, 1, 20, 7, 0),
(152, 1, 21, 7, 0),
(153, 1, 22, 7, 0),
(154, 1, 23, 7, 0),
(155, 1, 1, 7, 0),
(156, 1, 2, 7, 0),
(157, 1, 3, 7, 0),
(158, 1, 4, 7, 0),
(159, 1, 5, 7, 0),
(160, 1, 6, 7, 0),
(161, 1, 7, 7, 0),
(162, 1, 8, 7, 0),
(163, 1, 9, 7, 0),
(164, 1, 10, 7, 0),
(165, 1, 11, 7, 0),
(166, 1, 12, 7, 0),
(167, 1, 13, 7, 0),
(168, 1, 14, 7, 0),
(169, 1, 15, 7, 0),
(170, 1, 16, 7, 0),
(171, 1, 17, 7, 0),
(172, 1, 18, 7, 0),
(173, 1, 19, 7, 0),
(174, 1, 20, 7, 0),
(175, 1, 21, 7, 0),
(176, 1, 22, 7, 0),
(177, 1, 23, 7, 0),
(178, 1, 24, 7, 0),
(179, 1, 1, 7, 0),
(180, 1, 2, 7, 0),
(181, 1, 3, 7, 0),
(182, 1, 4, 7, 0),
(183, 1, 5, 7, 0),
(184, 1, 6, 7, 0),
(185, 1, 7, 7, 0),
(186, 1, 8, 7, 0),
(187, 1, 9, 7, 0),
(188, 1, 10, 7, 0),
(189, 1, 11, 7, 0),
(190, 1, 12, 7, 0),
(191, 1, 13, 7, 0),
(192, 1, 14, 7, 0),
(193, 1, 15, 7, 0),
(194, 1, 16, 7, 0),
(195, 1, 17, 7, 0),
(196, 1, 18, 7, 0),
(197, 1, 19, 7, 0),
(198, 1, 20, 7, 0),
(199, 1, 21, 7, 0),
(200, 1, 22, 7, 0),
(201, 1, 23, 7, 0),
(202, 1, 24, 7, 0),
(203, 1, 25, 7, 0),
(204, 1, 1, 7, 0),
(205, 1, 2, 7, 0),
(206, 1, 3, 7, 0),
(207, 1, 4, 7, 0),
(208, 1, 5, 7, 0),
(209, 1, 6, 7, 0),
(210, 1, 7, 7, 0),
(211, 1, 8, 7, 0),
(212, 1, 9, 7, 0),
(213, 1, 10, 7, 0),
(214, 1, 11, 7, 0),
(215, 1, 12, 7, 0),
(216, 1, 13, 7, 0),
(217, 1, 14, 7, 0),
(218, 1, 15, 7, 0),
(219, 1, 16, 7, 0),
(220, 1, 17, 7, 0),
(221, 1, 18, 7, 0),
(222, 1, 19, 7, 0),
(223, 1, 20, 7, 0),
(224, 1, 21, 7, 0),
(225, 1, 22, 7, 0),
(226, 1, 23, 7, 0),
(227, 1, 24, 7, 0),
(228, 1, 25, 7, 0),
(229, 1, 26, 7, 0),
(230, 1, 27, 7, 0),
(231, 1, 1, 7, 0),
(232, 1, 2, 7, 0),
(233, 1, 3, 7, 0),
(234, 1, 4, 7, 0),
(235, 1, 5, 7, 0),
(236, 1, 6, 7, 0),
(237, 1, 7, 7, 0),
(238, 1, 8, 7, 0),
(239, 1, 9, 7, 0),
(240, 1, 10, 7, 0),
(241, 1, 11, 7, 0),
(242, 1, 12, 7, 0),
(243, 1, 13, 7, 0),
(244, 1, 14, 7, 0),
(245, 1, 15, 7, 0),
(246, 1, 16, 7, 0),
(247, 1, 17, 7, 0),
(248, 1, 18, 7, 0),
(249, 1, 19, 7, 0),
(250, 1, 20, 7, 0),
(251, 1, 21, 7, 0),
(252, 1, 22, 7, 0),
(253, 1, 23, 7, 0),
(254, 1, 24, 7, 0),
(255, 1, 25, 7, 0),
(256, 1, 26, 7, 0),
(257, 1, 27, 7, 0),
(258, 1, 28, 7, 0),
(259, 1, 1, 7, 0),
(260, 1, 2, 7, 0),
(261, 1, 3, 7, 0),
(262, 1, 4, 7, 0),
(263, 1, 5, 7, 0),
(264, 1, 6, 7, 0),
(265, 1, 7, 7, 0),
(266, 1, 8, 7, 0),
(267, 1, 9, 7, 0),
(268, 1, 10, 7, 0),
(269, 1, 11, 7, 0),
(270, 1, 12, 7, 0),
(271, 1, 13, 7, 0),
(272, 1, 14, 7, 0),
(273, 1, 15, 7, 0),
(274, 1, 16, 7, 0),
(275, 1, 17, 7, 0),
(276, 1, 18, 7, 0),
(277, 1, 19, 7, 0),
(278, 1, 20, 7, 0),
(279, 1, 21, 7, 0),
(280, 1, 22, 7, 0),
(281, 1, 23, 7, 0),
(282, 1, 25, 7, 0),
(283, 1, 26, 7, 0),
(284, 1, 27, 7, 0),
(285, 1, 28, 7, 0),
(286, 1, 29, 7, 0),
(287, 1, 1, 7, 0),
(288, 1, 2, 7, 0),
(289, 1, 3, 7, 0),
(290, 1, 4, 7, 0),
(291, 1, 5, 7, 0),
(292, 1, 6, 7, 0),
(293, 1, 7, 7, 0),
(294, 1, 8, 7, 0),
(295, 1, 9, 7, 0),
(296, 1, 10, 7, 0),
(297, 1, 11, 7, 0),
(298, 1, 12, 7, 0),
(299, 1, 13, 7, 0),
(300, 1, 14, 7, 0),
(301, 1, 15, 7, 0),
(302, 1, 16, 7, 0),
(303, 1, 17, 7, 0),
(304, 1, 18, 7, 0),
(305, 1, 19, 7, 0),
(306, 1, 20, 7, 0),
(307, 1, 21, 7, 0),
(308, 1, 22, 7, 0),
(309, 1, 23, 7, 0),
(310, 1, 25, 7, 0),
(311, 1, 26, 7, 0),
(312, 1, 27, 7, 0),
(313, 1, 28, 7, 0),
(314, 1, 29, 7, 0),
(315, 1, 1, 7, 0),
(316, 1, 2, 7, 0),
(317, 1, 3, 7, 0),
(318, 1, 4, 7, 0),
(319, 1, 5, 7, 0),
(320, 1, 6, 7, 0),
(321, 1, 7, 7, 0),
(322, 1, 8, 7, 0),
(323, 1, 9, 7, 0),
(324, 1, 10, 7, 0),
(325, 1, 11, 7, 0),
(326, 1, 12, 7, 0),
(327, 1, 13, 7, 0),
(328, 1, 14, 7, 0),
(329, 1, 15, 7, 0),
(330, 1, 16, 7, 0),
(331, 1, 17, 7, 0),
(332, 1, 18, 7, 0),
(333, 1, 19, 7, 0),
(334, 1, 20, 7, 0),
(335, 1, 21, 7, 0),
(336, 1, 22, 7, 0),
(337, 1, 23, 7, 0),
(338, 1, 25, 7, 0),
(339, 1, 26, 7, 0),
(340, 1, 27, 7, 0),
(341, 1, 28, 7, 0),
(342, 1, 29, 7, 0),
(343, 1, 30, 7, 0),
(344, 1, 1, 7, 1),
(345, 1, 2, 7, 1),
(346, 1, 3, 7, 1),
(347, 1, 4, 7, 1),
(348, 1, 5, 7, 1),
(349, 1, 6, 7, 1),
(350, 1, 7, 7, 1),
(351, 1, 8, 7, 1),
(352, 1, 9, 7, 1),
(353, 1, 10, 7, 1),
(354, 1, 11, 7, 1),
(355, 1, 12, 7, 1),
(356, 1, 13, 7, 1),
(357, 1, 14, 7, 1),
(358, 1, 15, 7, 1),
(359, 1, 16, 7, 1),
(360, 1, 17, 7, 1),
(361, 1, 18, 7, 1),
(362, 1, 19, 7, 1),
(363, 1, 20, 7, 1),
(364, 1, 21, 7, 1),
(365, 1, 22, 7, 1),
(366, 1, 23, 7, 1),
(367, 1, 25, 7, 1),
(368, 1, 26, 7, 1),
(369, 1, 27, 7, 1),
(370, 1, 28, 7, 1),
(371, 1, 29, 7, 1),
(372, 1, 30, 7, 1),
(373, 1, 31, 7, 1),
(374, 2, 31, 3, 0),
(375, 3, 7, 6, 0),
(376, 3, 7, 3, 1),
(377, 3, 31, 3, 1),
(378, 2, 14, 3, 1),
(379, 2, 31, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `app`
--

CREATE TABLE `app` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dir` varchar(50) NOT NULL,
  `detail` varchar(50) NOT NULL,
  `appgroup` int(5) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `app`
--

INSERT INTO `app` (`id`, `name`, `dir`, `detail`, `appgroup`, `status`) VALUES
(1, 'Application ', 'app', 'ระบบ', 1, 1),
(2, 'Users', 'users', 'ผู้ใช้', 2, 1),
(3, 'Purchase Requisition', 'pr', 'ใบขอซื้อ', 4, 1),
(4, 'Purchase Order', 'po', 'ใบสั่งซื้อ', 5, 1),
(5, 'Receive', 'receive', 'รับสินค้า', 6, 1),
(6, 'Payment', 'payment', 'จ่ายเงิน', 7, 1),
(7, 'Account', 'acc', 'บัญชี', 8, 1),
(8, 'User Group ', 'usergroup', 'กลุ่มผู้ใช้', 3, 1),
(9, 'Quotation', 'quotation', 'ใบเสนอราคา', 8, 1),
(10, 'Withdrawn', 'withdrawn', 'เบิกวัถุดิบ สินค้า', 10, 1),
(11, 'Receipt', 'receipt', 'ใบเสร็จ', 11, 1),
(12, 'Sale Order', 'so', 'ใบสั่งขาย', 9, 1),
(13, 'Supplier', 'supplier', '', 15, 1),
(14, 'Production', 'production', '', 14, 1),
(15, 'Location', 'location', '', 16, 1),
(16, 'Inventory', 'inventory', '', 20, 1),
(17, 'Location col', 'location_col', '', 20, 1),
(18, 'Location Ctn', 'location_ctn', '', 19, 1),
(19, 'Location Road', 'location_road', '', 17, 1),
(20, 'Location Row', 'location_row', '', 18, 1),
(21, 'Account Type', 'acc_typ', '', 9, 1),
(22, 'Inventory Type', 'inventory_typ', '', 21, 1),
(23, 'Inventory Cat ', 'inventory_cat', '', 22, 1),
(25, 'Customer', 'customer', '', 16, 1),
(26, 'Batch', 'batch', '', 12, 1),
(27, 'Farming', 'farming', '', 13, 1),
(28, 'Logs', 'logs', '', 25, 1),
(29, 'Employee', 'employee', '', 15, 1),
(30, 'Payroll', 'payroll', '', 16, 1),
(31, 'Time stamp', 'time', '', 17, 1);

-- --------------------------------------------------------

--
-- Table structure for table `areceive`
--

CREATE TABLE `areceive` (
  `id` int(5) NOT NULL,
  `typ` int(1) NOT NULL,
  `ref_id` int(5) NOT NULL,
  `customer_id` int(5) NOT NULL,
  `uid` int(5) NOT NULL,
  `uaid` int(5) NOT NULL,
  `date` date NOT NULL,
  `adate` date NOT NULL,
  `value` int(5) NOT NULL,
  `detail` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `uid` int(5) NOT NULL,
  `uaid` int(5) NOT NULL,
  `date` date NOT NULL,
  `adate` date NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`id`, `name`, `detail`, `uid`, `uaid`, `date`, `adate`, `status`) VALUES
(2, '', '', 1, 1, '2026-08-30', '0000-00-00', 2),
(3, '', '', 1, 1, '2026-08-30', '0000-00-00', 2),
(4, '', '', 1, 1, '2026-08-30', '0000-00-00', 2),
(5, '', '', 1, 0, '2026-08-31', '0000-00-00', 0),
(6, '', '', 1, 0, '2026-08-31', '0000-00-00', 0),
(7, '', '', 1, 0, '2026-08-31', '0000-00-00', 0),
(8, '', '', 1, 0, '2026-08-31', '0000-00-00', 1),
(9, '', '', 1, 0, '2026-08-31', '0000-00-00', 1),
(10, '', '', 1, 1, '2026-08-31', '0000-00-00', 2),
(11, '', '', 1, 1, '2026-08-31', '0000-00-00', 2),
(12, '', '', 1, 1, '2026-08-31', '0000-00-00', 2),
(13, '', '', 1, 1, '2026-08-31', '0000-00-00', 2),
(14, '', '', 1, 1, '2026-08-31', '0000-00-00', 2),
(15, '', '', 1, 1, '2026-09-01', '0000-00-00', 2),
(16, '', '', 1, 1, '2026-09-02', '0000-00-00', 2),
(17, '', '', 1, 1, '2026-09-02', '0000-00-00', 2),
(18, '', '', 1, 1, '2026-09-02', '0000-00-00', 2),
(19, '', '', 1, 1, '2026-09-02', '0000-00-00', 2),
(20, '', '', 1, 1, '2026-09-02', '0000-00-00', 2),
(21, '', '', 1, 1, '2026-09-02', '0000-00-00', 2),
(22, '', '', 1, 1, '2026-09-02', '0000-00-00', 2),
(23, '', '', 1, 1, '2026-09-02', '0000-00-00', 2),
(24, '', '', 1, 1, '2026-09-06', '0000-00-00', 2),
(25, '', '', 1, 1, '2026-09-06', '0000-00-00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `batch_detail`
--

CREATE TABLE `batch_detail` (
  `id` int(5) NOT NULL,
  `batch_id` int(5) NOT NULL,
  `inventory_id` int(5) NOT NULL,
  `typ` int(5) NOT NULL,
  `num` int(5) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batch_detail`
--

INSERT INTO `batch_detail` (`id`, `batch_id`, `inventory_id`, `typ`, `num`, `status`) VALUES
(2, 2, 4, 2, 1, 1),
(3, 3, 6, 1, 10, 1),
(4, 4, 6, 1, 5, 1),
(5, 5, 6, 1, 10, 0),
(6, 5, 6, 1, 5, 0),
(7, 6, 5, 2, 1, 0),
(8, 6, 5, 2, 2, 1),
(9, 5, 6, 1, 6, 0),
(10, 5, 6, 1, 7, 1),
(11, 7, 4, 2, 1, 0),
(12, 7, 4, 2, 1, 1),
(13, 7, 5, 2, 1, 1),
(14, 8, 6, 1, 50, 0),
(15, 8, 6, 1, 51, 0),
(16, 8, 6, 1, 52, 1),
(17, 9, 4, 2, 5, 0),
(18, 9, 4, 2, 5, 1),
(19, 9, 5, 2, 1, 1),
(20, 10, 6, 1, 1, 1),
(21, 11, 6, 1, 5, 0),
(22, 11, 6, 1, 1, 1),
(23, 12, 6, 1, 55, 1),
(24, 13, 6, 1, 50, 1),
(25, 14, 6, 1, 1, 1),
(26, 15, 6, 1, 100, 1),
(27, 16, 6, 1, 50, 1),
(28, 17, 6, 1, 40, 1),
(29, 18, 6, 1, 1, 1),
(30, 19, 6, 1, 10, 1),
(31, 20, 6, 1, 1, 1),
(32, 21, 6, 1, 1, 0),
(33, 21, 6, 1, 5, 1),
(34, 22, 6, 1, 4, 1),
(35, 23, 6, 1, 4, 1),
(36, 24, 6, 1, 10, 1),
(37, 25, 4, 2, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `province` varchar(50) NOT NULL,
  `zip` int(5) NOT NULL,
  `tel` int(10) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `tax_id` int(5) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `address`, `province`, `zip`, `tel`, `mail`, `tax_id`, `status`, `username`, `password`) VALUES
(1, 'นายจับใจ ไมค์เสกโลโซ', '324/2 ', 'กรุงเทพมหานคร', 10600, 805433978, 'scv123@gmail.com', 5555, 1, 'jubjai', '12345'),
(5, 'test', 'dsasdsa', 'sdaasd', 1111, 1111, 'Emaillnwza008@gmail.com', 1122, 1, 'testkub1', '5555');

-- --------------------------------------------------------

--
-- Table structure for table `employee_info`
--

CREATE TABLE `employee_info` (
  `id` int(5) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `depart` varchar(50) NOT NULL,
  `birt` date NOT NULL,
  `sex` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `tel` int(10) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `start` date NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_info`
--

INSERT INTO `employee_info` (`id`, `fname`, `lname`, `nickname`, `depart`, `birt`, `sex`, `address`, `tel`, `mail`, `start`, `status`) VALUES
(1, 'Admin', 'Test', 'AD', 'IT', '0000-00-00', '', '', 805433978, 'Emaillnwza008@gmail.com', '0000-00-00', 1),
(3, 'Somchai', 'Test', 'Chai', 'Production', '0000-00-00', '', '', 0, '', '0000-00-00', 1),
(4, 'Somsak', 'Test', 'Sak', 'Accounting', '0000-00-00', '', '', 0, '', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `farming`
--

CREATE TABLE `farming` (
  `id` int(5) NOT NULL,
  `batch_id` int(5) NOT NULL,
  `uid` int(5) NOT NULL,
  `uaid` int(5) NOT NULL,
  `date` date NOT NULL,
  `adate` date NOT NULL,
  `detail` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `farming`
--

INSERT INTO `farming` (`id`, `batch_id`, `uid`, `uaid`, `date`, `adate`, `detail`, `status`) VALUES
(1, 2, 1, 0, '2026-08-30', '0000-00-00', '', 1),
(2, 3, 1, 1, '2026-08-30', '0000-00-00', '', 2),
(3, 4, 1, 0, '2026-08-30', '0000-00-00', '', 1),
(4, 0, 1, 1, '2026-08-31', '0000-00-00', '', 2),
(5, 0, 1, 0, '2026-08-31', '0000-00-00', '', 1),
(6, 0, 1, 0, '2026-08-31', '0000-00-00', '', 1),
(7, 0, 1, 0, '2026-08-31', '0000-00-00', '', 1),
(8, 0, 1, 0, '2026-08-31', '0000-00-00', '', 1),
(9, 0, 1, 0, '2026-08-31', '0000-00-00', '', 1),
(10, 10, 1, 1, '2026-08-31', '0000-00-00', '', 2),
(11, 11, 1, 1, '2026-08-31', '0000-00-00', '', 2),
(12, 12, 1, 1, '2026-08-31', '0000-00-00', '', 2),
(13, 13, 1, 1, '2026-08-31', '0000-00-00', '', 2),
(14, 14, 1, 1, '2026-08-31', '0000-00-00', '', 2),
(15, 15, 1, 1, '2026-09-01', '0000-00-00', '', 2),
(16, 16, 1, 1, '2026-09-02', '0000-00-00', '', 2),
(17, 17, 1, 1, '2026-09-02', '0000-00-00', '', 2),
(18, 18, 1, 1, '2026-09-02', '0000-00-00', '', 2),
(19, 19, 1, 1, '2026-09-02', '0000-00-00', '', 2),
(20, 20, 1, 1, '2026-09-02', '0000-00-00', '', 2),
(21, 21, 1, 1, '2026-09-02', '0000-00-00', '', 2),
(22, 22, 1, 1, '2026-09-02', '0000-00-00', '', 2),
(23, 23, 1, 1, '2026-09-02', '0000-00-00', '', 2),
(24, 25, 1, 0, '2026-09-06', '0000-00-00', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `farming_detail`
--

CREATE TABLE `farming_detail` (
  `id` int(5) NOT NULL,
  `farming_id` int(5) NOT NULL,
  `inventory_id` int(5) NOT NULL,
  `num` int(5) NOT NULL,
  `typ` int(5) NOT NULL,
  `loss` int(5) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `farming_detail`
--

INSERT INTO `farming_detail` (`id`, `farming_id`, `inventory_id`, `num`, `typ`, `loss`, `detail`, `status`) VALUES
(1, 1, 4, 1, 0, 0, '', 1),
(2, 2, 6, 10, 0, 0, '', 0),
(3, 3, 6, 5, 0, 0, '', 1),
(4, 6, 6, 1, 0, 0, '', 1),
(5, 7, 6, 1, 0, 0, '', 1),
(6, 8, 6, 1, 0, 0, '', 1),
(7, 9, 6, 1, 0, 0, '', 1),
(8, 10, 6, 1, 0, 0, '', 1),
(9, 11, 6, 1, 0, 0, '', 0),
(10, 2, 6, 10, 0, 0, '', 0),
(11, 2, 6, 5, 0, 0, '', 0),
(12, 2, 6, 10, 0, 0, '', 0),
(13, 2, 6, 11, 0, 0, '', 0),
(14, 11, 6, 2, 0, 0, '', 1),
(15, 2, 6, 10, 0, 0, '', 0),
(16, 12, 6, 55, 0, 0, '', 0),
(17, 12, 6, 50, 0, 0, '', 0),
(18, 12, 6, 1, 0, 0, '', 1),
(19, 2, 6, 11, 0, 0, '', 1),
(20, 13, 6, 50, 0, 0, '', 0),
(21, 13, 6, 10, 0, 0, '', 1),
(22, 14, 6, 1, 0, 0, '', 0),
(23, 14, 6, 1, 0, 0, '', 0),
(24, 14, 6, 5, 0, 0, '', 0),
(25, 14, 6, 5, 0, 0, '', 0),
(26, 14, 6, 5, 0, 0, '', 0),
(27, 14, 6, 55, 0, 0, '', 1),
(28, 15, 6, 100, 0, 0, '', 0),
(29, 15, 6, 50, 0, 0, '', 1),
(30, 16, 6, 50, 0, 0, '', 1),
(31, 17, 6, 40, 0, 0, '', 1),
(32, 18, 6, 1, 0, 0, '', 1),
(33, 19, 6, 10, 0, 0, '', 1),
(34, 20, 6, 1, 0, 0, '', 1),
(35, 21, 6, 5, 0, 0, '', 1),
(36, 22, 6, 4, 0, 0, '', 1),
(37, 23, 6, 4, 0, 0, '', 0),
(38, 23, 6, 2, 0, 0, '', 1),
(39, 24, 4, 10, 0, 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `typ_id` int(5) NOT NULL,
  `cate_id` int(5) NOT NULL,
  `location_id` int(5) NOT NULL,
  `uid` int(5) NOT NULL,
  `num` int(5) NOT NULL,
  `buy` decimal(10,2) NOT NULL,
  `sale` decimal(10,2) NOT NULL,
  `cp` int(5) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `name`, `description`, `typ_id`, `cate_id`, `location_id`, `uid`, `num`, `buy`, `sale`, `cp`, `status`) VALUES
(1, 'เมล็ดArabica', '', 1, 1, 2, 1, 0, 50.00, 0.00, 10, 1),
(2, 'A3 Blue Light', '', 3, 1, 1, 1, 0, 0.00, 180.00, 10, 1),
(3, 'เมล็ดRobusta', '', 1, 2, 2, 1, 0, 50.00, 0.00, 10, 1),
(4, 'A Medium', '', 3, 1, 0, 0, 0, 0.00, 185.00, 10, 1),
(5, 'A Medium-Dark', '', 3, 1, 0, 0, 0, 0.00, 185.00, 10, 1),
(6, 'Coffee Cherry', '', 2, 1, 0, 0, 0, 0.00, 0.00, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `inventory_cat`
--

CREATE TABLE `inventory_cat` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `detail` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory_cat`
--

INSERT INTO `inventory_cat` (`id`, `name`, `detail`, `status`) VALUES
(1, 'Arabica', '', 1),
(2, 'Robusta', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inventory_typ`
--

CREATE TABLE `inventory_typ` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `detail` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory_typ`
--

INSERT INTO `inventory_typ` (`id`, `name`, `detail`, `status`) VALUES
(1, 'เมล็ดดิบ', '', 1),
(2, 'ผลกาเเฟ', '', 1),
(3, 'สินค้าวางขาย', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `leave_management`
--

CREATE TABLE `leave_management` (
  `id` int(5) NOT NULL,
  `emp_id` int(5) NOT NULL,
  `uid` int(5) NOT NULL,
  `uaid` int(5) NOT NULL,
  `adate` date NOT NULL,
  `purpose` varchar(50) NOT NULL,
  `reason` varchar(50) NOT NULL,
  `leave_start` date NOT NULL,
  `leave_end` date NOT NULL,
  `typ` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `detail` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `name`, `detail`, `status`) VALUES
(1, 'Warehouse', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `location_col`
--

CREATE TABLE `location_col` (
  `id` int(5) NOT NULL,
  `row_id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `detail` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `location_col`
--

INSERT INTO `location_col` (`id`, `row_id`, `name`, `detail`, `status`) VALUES
(1, 1, 'Col-A', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `location_ctn`
--

CREATE TABLE `location_ctn` (
  `id` int(5) NOT NULL,
  `road_id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `detail` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `location_ctn`
--

INSERT INTO `location_ctn` (`id`, `road_id`, `name`, `detail`, `status`) VALUES
(1, 1, 'CTN 01', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `location_road`
--

CREATE TABLE `location_road` (
  `id` int(5) NOT NULL,
  `location_id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `detail` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `location_road`
--

INSERT INTO `location_road` (`id`, `location_id`, `name`, `detail`, `status`) VALUES
(1, 1, 'Road-A', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `location_row`
--

CREATE TABLE `location_row` (
  `id` int(5) NOT NULL,
  `ctn_id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `detail` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `location_row`
--

INSERT INTO `location_row` (`id`, `ctn_id`, `name`, `detail`, `status`) VALUES
(1, 1, 'Row-A', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(5) NOT NULL,
  `action` varchar(50) NOT NULL,
  `dating` varchar(50) NOT NULL,
  `uid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `action`, `dating`, `uid`) VALUES
(1, 'cannot login', '1786702185', 0),
(2, 'cannot login', '1786702192', 0),
(3, 'cannot login', '1786702194', 0),
(4, 'cannot login', '1786702235', 0),
(5, 'Add quotation #1', '1786705738', 1),
(6, 'logout', '1786707084', 1),
(7, 'cannot login', '1786707085', 0),
(8, 'cannot login', '1786707089', 0),
(9, 'cannot login', '1786707093', 0),
(10, 'cannot login', '1786707104', 0),
(11, 'cannot login', '1786707144', 0),
(12, 'cannot login', '1786707149', 0),
(13, 'cannot login', '1786707153', 0),
(14, 'cannot login', '1786707216', 0),
(15, 'cannot login', '1786707221', 0),
(16, 'cannot login', '1786707330', 0),
(17, 'cannot login', '1786707333', 0),
(18, 'cannot login', '1786707453', 0),
(19, 'cannot login', '1786707470', 0),
(20, 'cannot login', '1786707473', 0),
(21, 'cannot login', '1786707484', 0),
(22, 'cannot login', '1786707656', 0),
(23, 'cannot login', '1786707657', 0),
(24, 'cannot login', '1786707662', 0),
(25, 'cannot login', '1786707665', 0),
(26, 'cannot login', '1786707682', 0),
(27, 'cannot login', '1786707695', 0),
(28, 'cannot login', '1786707853', 0),
(29, 'cannot login', '1786707856', 0),
(30, 'logout', '1786707973', 1),
(31, 'cannot login', '1786707976', 0),
(32, 'logout', '1786708057', 1),
(33, 'cannot login', '1786708059', 0),
(34, 'cannot login', '1786708068', 0),
(35, 'cannot login', '1786708167', 0),
(36, 'cannot login', '1786708218', 0),
(37, 'cannot login', '1786708244', 0),
(38, 'cannot login', '1786708244', 0),
(39, 'cannot login', '1786708244', 0),
(40, 'cannot login', '1786708257', 0),
(41, 'cannot login', '1786708325', 0),
(42, 'cannot login', '1786708330', 0),
(43, 'cannot login', '1786708342', 0),
(44, 'cannot login', '1786708355', 0),
(45, 'cannot login', '1786718155', 0),
(46, 'cannot login', '1786718161', 0),
(47, 'cannot login', '1786718168', 0),
(48, 'cannot login', '1786718557', 0),
(49, 'cannot login', '1786718561', 0),
(50, 'cannot login', '1786718763', 0),
(51, 'cannot login', '1786718777', 0),
(52, 'cannot login', '1786719388', 0),
(53, 'cannot login', '1786719390', 0),
(54, 'logout', '1786719456', 1),
(55, 'login', '1786719458', 2),
(56, 'logout', '1786719460', 2),
(57, 'cannot login', '1786719464', 0),
(58, 'login', '1786719469', 1),
(59, 'Add PR #1', '1786723423', 1),
(60, 'login', '1786725824', 1),
(61, 'Edit PR #1', '1786726437', 1),
(62, 'Add PR #2', '1786726787', 1),
(63, 'In-Active PR#1', '1786726800', 1),
(64, 'In-Active PR#2', '1786726806', 1),
(65, 'Active PR#2', '1786726833', 1),
(66, 'In-Active PR#2', '1786726836', 1),
(67, 'Active PR#1', '1786726842', 1),
(68, 'Approve PR#1', '1786726843', 1),
(69, 'Add PO #1', '1786726855', 1),
(70, 'Approve PO#1', '1786726861', 1),
(71, 'Add Receive #1', '1786726872', 1),
(72, 'Add Receive #2', '1786726875', 1),
(73, 'Add Receive #3', '1786726973', 1),
(74, 'Approve Receive#3', '1786726990', 1),
(75, 'Add Payment #0', '1786727676', 1),
(76, 'Add Payment #0', '1786727752', 1),
(77, 'Add Payment #3', '1786727863', 1),
(78, 'Add Production #1', '1786728305', 1),
(79, 'login', '1786811823', 1),
(80, 'In-Active Receive#1', '1786814763', 1),
(81, 'In-Active Receive#2', '1786814768', 1),
(82, 'logout', '1786814874', 1),
(83, 'login', '1786814996', 1),
(84, 'logout', '1786816709', 1),
(85, 'login', '1786816718', 1),
(86, 'Add PR #3', '1786821169', 1),
(87, 'Active PR#3', '1786821176', 1),
(88, 'Approve PR#3', '1786821177', 1),
(89, 'Add PO #2', '1786821185', 1),
(90, 'Approve PO#2', '1786821187', 1),
(91, 'Add Receive #4', '1786821194', 1),
(92, 'Approve Receive#4', '1786821199', 1),
(93, 'Add PR #4', '1786821742', 1),
(94, 'Active PR#4', '1786821745', 1),
(95, 'Approve PR#4', '1786821746', 1),
(96, 'Add PO #3', '1786821752', 1),
(97, 'Approve PO#3', '1786821753', 1),
(98, 'Add Receive #5', '1786822957', 1),
(99, 'Add PR #5', '1786823416', 1),
(100, 'Edit PR #5', '1786823424', 1),
(101, 'Active PR#5', '1786823427', 1),
(102, 'Approve PR#5', '1786823429', 1),
(103, 'Add PO #4', '1786823436', 1),
(104, 'Approve PO#4', '1786823448', 1),
(105, 'Add Receive #6', '1786823798', 1),
(106, 'Add Receive #7', '1786823831', 1),
(107, 'Add Receive #8', '1786823831', 1),
(108, 'Add Receive #9', '1786823832', 1),
(109, 'Add Receive #10', '1786823832', 1),
(110, 'Add Receive #11', '1786823858', 1),
(111, 'cannot login', '1787113490', 0),
(112, 'login', '1787113495', 1),
(113, 'login', '1787129957', 1),
(114, 'Add PR #1', '1787156952', 1),
(115, 'Active PR#1', '1787156954', 1),
(116, 'Approve PR#1', '1787156955', 1),
(117, 'Add PO #1', '1787156962', 1),
(118, 'Approve PO#1', '1787156964', 1),
(119, 'Add Receive #1', '1787167870', 1),
(120, 'Add Receive #2', '1787168128', 1),
(121, 'Add Receive #3', '1787168847', 1),
(122, 'Add Receive #1', '1787169135', 1),
(123, 'Approve Receive#1', '1787175538', 1),
(124, 'Add Payment #1', '1787175549', 1),
(125, 'Add quotation #1', '1787176003', 1),
(126, 'Approve quotation#1', '1787176008', 1),
(127, 'Add So #1', '1787176017', 1),
(128, 'Appove So#1', '1787176018', 1),
(129, 'Add withdrawn #1', '1787176866', 1),
(130, 'Add quotation #2', '1787177120', 1),
(131, 'Approve quotation#2', '1787177122', 1),
(132, 'Add So #2', '1787177134', 1),
(133, 'Appove So#2', '1787177136', 1),
(134, 'Add withdrawn #2', '1787177143', 1),
(135, 'Appove withdrawn#1', '1787177331', 1),
(136, 'Appove withdrawn#1', '1787177332', 1),
(137, 'Appove withdrawn#1', '1787177333', 1),
(138, 'Appove withdrawn#1', '1787177333', 1),
(139, 'login', '1787198033', 1),
(140, 'login', '1787219708', 1),
(141, 'Add withdrawn #3', '1787219987', 1),
(142, 'Appove withdrawn#2', '1787219995', 1),
(143, 'Appove withdrawn#2', '1787220007', 1),
(144, 'Appove withdrawn#2', '1787220008', 1),
(145, 'Appove withdrawn#2', '1787220008', 1),
(146, 'Appove withdrawn#2', '1787220009', 1),
(147, 'Appove withdrawn#2', '1787220009', 1),
(148, 'Add receipt #1', '1787220063', 1),
(149, 'Add receipt #2', '1787220078', 1),
(150, 'login', '1787246566', 1),
(151, 'Appove withdrawn#2', '1787246584', 1),
(152, 'Appove withdrawn#2', '1787246585', 1),
(153, 'Appove withdrawn#2', '1787246586', 1),
(154, 'Appove withdrawn#2', '1787246586', 1),
(155, 'Appove withdrawn#2', '1787247618', 1),
(156, 'Appove withdrawn#2', '1787247618', 1),
(157, 'Appove withdrawn#2', '1787247620', 1),
(158, 'Edit withdrawn #2', '1787247628', 1),
(159, 'Appove withdrawn#2', '1787247629', 1),
(160, 'Appove withdrawn#2', '1787247629', 1),
(161, 'Appove withdrawn#2', '1787248238', 1),
(162, 'Appove withdrawn#2', '1787248238', 1),
(163, 'login', '1787306281', 1),
(164, 'Add PR #1', '1787313329', 1),
(165, 'Active PR#1', '1787313332', 1),
(166, 'Add PR #2', '1787313379', 1),
(167, 'Approve PR#1', '1787313385', 1),
(168, 'Add PR #1', '1787313683', 1),
(169, 'Add PR #1', '1787313951', 1),
(170, 'Add PR #1', '1787314128', 1),
(171, 'Add PR #2', '1787314617', 1),
(172, 'Add PR #1', '1787314721', 1),
(173, 'Active PR#1', '1787314733', 1),
(174, 'Approve PR#1', '1787314734', 1),
(175, 'Add PO #1', '1787314746', 1),
(176, 'Approve PO#1', '1787314750', 1),
(177, 'Add Receive #1', '1787314769', 1),
(178, 'Approve Receive#1', '1787314775', 1),
(179, 'Add Payment #1', '1787314855', 1),
(180, 'Add PR #2', '1787315597', 1),
(181, 'Active PR#2', '1787315606', 1),
(182, 'Approve PR#2', '1787315607', 1),
(183, 'Add PO #2', '1787315619', 1),
(184, 'Edit PO #2', '1787315624', 1),
(185, 'Approve PO#2', '1787315626', 1),
(186, 'Add Receive #2', '1787315778', 1),
(187, 'Add Receive #3', '1787315862', 1),
(188, 'Add Receive #4', '1787315863', 1),
(189, 'Add Receive #5', '1787315884', 1),
(190, 'Add Receive #6', '1787315884', 1),
(191, 'Add Receive #7', '1787315885', 1),
(192, 'Add Receive #8', '1787316006', 1),
(193, 'Add Receive #9', '1787316007', 1),
(194, 'Add Receive #10', '1787316007', 1),
(195, 'Add Receive #11', '1787316007', 1),
(196, 'Add Receive #12', '1787316007', 1),
(197, 'Add Receive #13', '1787316046', 1),
(198, 'Add Receive #14', '1787316046', 1),
(199, 'Add Receive #15', '1787316046', 1),
(200, 'Add PR #3', '1787316097', 1),
(201, 'Active PR#3', '1787316100', 1),
(202, 'Approve PR#3', '1787316101', 1),
(203, 'Add PO #3', '1787316106', 1),
(204, 'Approve PO#3', '1787316107', 1),
(205, 'Add Receive #16', '1787316112', 1),
(206, 'Add Receive #17', '1787316239', 1),
(207, 'Add Receive #18', '1787316240', 1),
(208, 'Add Receive #19', '1787316241', 1),
(209, 'Add Receive #20', '1787316241', 1),
(210, 'Add Receive #21', '1787316247', 1),
(211, 'Add PO #4', '1787316651', 1),
(212, 'Approve PO#4', '1787316654', 1),
(213, 'Add Receive #22', '1787316686', 1),
(214, 'Add Receive #23', '1787316713', 1),
(215, 'Add Receive #24', '1787316714', 1),
(216, 'Add PR #1', '1787316809', 1),
(217, 'Active PR#1', '1787316812', 1),
(218, 'Approve PR#1', '1787316815', 1),
(219, 'Add PO #1', '1787316820', 1),
(220, 'Approve PO#1', '1787316828', 1),
(221, 'Add Receive #1', '1787317500', 1),
(222, 'Approve Receive#1', '1787317794', 1),
(223, 'Add PR #2', '1787317932', 1),
(224, 'Active PR#2', '1787317934', 1),
(225, 'Approve PR#2', '1787317936', 1),
(226, 'Add PO #2', '1787317943', 1),
(227, 'Approve PO#2', '1787317945', 1),
(228, 'Add Receive #2', '1787317955', 1),
(229, 'Add PR #3', '1787317986', 1),
(230, 'Active PR#3', '1787317991', 1),
(231, 'Approve PR#3', '1787317993', 1),
(232, 'Add PO #3', '1787318000', 1),
(233, 'Approve PO#3', '1787318001', 1),
(234, 'Add Receive #3', '1787318005', 1),
(235, 'Add PR #4', '1787318122', 1),
(236, 'Active PR#4', '1787318124', 1),
(237, 'Approve PR#4', '1787318125', 1),
(238, 'Add PO #4', '1787318134', 1),
(239, 'Approve PO#4', '1787318134', 1),
(240, 'Add Receive #4', '1787318140', 1),
(241, 'Approve Receive#4', '1787318143', 1),
(242, 'Add Payment #0', '1787318150', 1),
(243, 'Add Payment #0', '1787318265', 1),
(244, 'Add Payment #0', '1787318265', 1),
(245, 'Add Payment #0', '1787318265', 1),
(246, 'Add Payment #0', '1787318266', 1),
(247, 'Add PR #5', '1787319191', 1),
(248, 'Active PR#5', '1787319193', 1),
(249, 'Approve PR#5', '1787319194', 1),
(250, 'Add PO #5', '1787319200', 1),
(251, 'Approve PO#5', '1787319201', 1),
(252, 'Add Receive #5', '1787319206', 1),
(253, 'Approve Receive#5', '1787319208', 1),
(254, 'Edit Payment #0', '1787319324', 1),
(255, 'Edit Payment #4', '1787319424', 1),
(256, 'Edit Payment #5', '1787319432', 1),
(257, 'Add PR #1', '1787319554', 1),
(258, 'Active PR#1', '1787319556', 1),
(259, 'Approve PR#1', '1787319557', 1),
(260, 'Add PO #1', '1787319564', 1),
(261, 'Approve PO#1', '1787319568', 1),
(262, 'Add Receive #1', '1787319573', 1),
(263, 'Approve Receive#1', '1787319575', 1),
(264, 'Edit Payment #1', '1787319585', 1),
(265, 'Add PR #2', '1787319839', 1),
(266, 'Active PR#2', '1787319842', 1),
(267, 'Approve PR#2', '1787319844', 1),
(268, 'Add PO #2', '1787319858', 1),
(269, 'Approve PO#2', '1787319869', 1),
(270, 'Add Receive #2', '1787319882', 1),
(271, 'Approve Receive#2', '1787319884', 1),
(272, 'Edit Payment #2', '1787319891', 1),
(273, 'Add quotation #1', '1787320091', 1),
(274, 'Approve quotation#1', '1787320093', 1),
(275, 'Add So #1', '1787320106', 1),
(276, 'Appove So#1', '1787320107', 1),
(277, 'Add withdrawn #1', '1787320112', 1),
(278, 'Appove withdrawn#1', '1787320113', 1),
(279, 'Add receipt #1', '1787320118', 1),
(280, 'Add quotation #2', '1787320703', 1),
(281, 'Approve quotation#2', '1787320706', 1),
(282, 'Add So #2', '1787320715', 1),
(283, 'Appove So#2', '1787320716', 1),
(284, 'Add withdrawn #2', '1787320720', 1),
(285, 'Appove withdrawn#2', '1787320721', 1),
(286, 'Add receipt #2', '1787320726', 1),
(287, 'Add Production #2', '1787323377', 1),
(288, 'Approve production#2', '1787323560', 1),
(289, 'Add Receive #3', '1787323571', 1),
(290, 'Add Production #3', '1787323697', 1),
(291, 'Approve production#3', '1787323699', 1),
(292, 'Add Production #4', '1787325089', 1),
(293, 'Approve production#4', '1787325094', 1),
(294, 'Add Receive #4', '1787325142', 1),
(295, 'Add Production #5', '1787325274', 1),
(296, 'Approve production#5', '1787325275', 1),
(297, 'Add Receive #5', '1787325280', 1),
(298, 'Add Production #6', '1787329435', 1),
(299, 'Edit Production #6', '1787329439', 1),
(300, 'In-Active production#6', '1787329443', 1),
(301, 'Active production#6', '1787329445', 1),
(302, 'login', '1787411314', 1),
(303, 'login', '1787495475', 1),
(304, 'Add quotation #3', '1787498128', 1),
(305, 'Approve quotation#3', '1787498131', 1),
(306, 'Add So #3', '1787498137', 1),
(307, 'Appove So#3', '1787498138', 1),
(308, 'Add withdrawn #3', '1787498144', 1),
(309, 'Appove withdrawn#3', '1787498145', 1),
(310, 'Add receipt #3', '1787498162', 1),
(311, 'Add PR #3', '1787498520', 1),
(312, 'Active PR#3', '1787498524', 1),
(313, 'Approve PR#3', '1787498525', 1),
(314, 'Add PO #3', '1787498531', 1),
(315, 'Approve PO#3', '1787498543', 1),
(316, 'Add Receive #6', '1787498548', 1),
(317, 'Approve Receive#6', '1787498550', 1),
(318, 'Add PR #1', '1787498825', 1),
(319, 'Active PR#1', '1787498829', 1),
(320, 'Approve PR#1', '1787498832', 1),
(321, 'Add PO #1', '1787498840', 1),
(322, 'Approve PO#1', '1787498841', 1),
(323, 'Add Receive #1', '1787498849', 1),
(324, 'Approve Receive#1', '1787498850', 1),
(325, 'Edit Payment #1', '1787498857', 1),
(326, 'Add quotation #1', '1787498902', 1),
(327, 'Approve quotation#1', '1787498903', 1),
(328, 'Add So #1', '1787498914', 1),
(329, 'Appove So#1', '1787498914', 1),
(330, 'Add withdrawn #1', '1787498921', 1),
(331, 'Appove withdrawn#1', '1787498922', 1),
(332, 'Add receipt #1', '1787498927', 1),
(333, 'Add Production #1', '1787499351', 1),
(334, 'Approve production#1', '1787499353', 1),
(335, 'Add Receive #2', '1787500073', 1),
(336, 'Add quotation #2', '1787501096', 1),
(337, 'Approve quotation#2', '1787501098', 1),
(338, 'Add So #2', '1787501171', 1),
(339, 'Appove So#2', '1787501172', 1),
(340, 'Add withdrawn #2', '1787501253', 1),
(341, 'Appove withdrawn#2', '1787501254', 1),
(342, 'Add receipt #2', '1787501259', 1),
(343, 'login', '1787501731', 1),
(344, 'login', '1787501810', 1),
(345, 'login', '1787507060', 1),
(346, 'login', '1787590823', 1),
(347, 'Add Batch #1', '1787592629', 1),
(348, 'Approve Batch #1', '1787592632', 1),
(349, 'Add Production #2', '1787593050', 1),
(350, 'Approve production#2', '1787593052', 1),
(351, 'Add Receive #3', '1787593058', 1),
(352, 'Add Batch #2', '1787593067', 1),
(353, 'Add Batch #3', '1787593070', 1),
(354, 'Approve Batch #3', '1787593145', 1),
(355, 'Approve Batch #2', '1787593146', 1),
(356, 'Add Production #3', '1787593162', 1),
(357, 'Approve production#3', '1787593163', 1),
(358, 'Add Receive #4', '1787593169', 1),
(359, 'login', '1787649001', 1),
(360, 'Add Production #4', '1787649339', 1),
(361, 'Approve production#4', '1787649340', 1),
(362, 'Add Batch #4', '1787652210', 1),
(363, 'Add Batch #5', '1787652210', 1),
(364, 'Add Batch #6', '1787652210', 1),
(365, 'Add Batch #7', '1787652210', 1),
(366, 'Add Batch #8', '1787653936', 1),
(367, 'Add Batch #9', '1787653936', 1),
(368, 'Add Batch #10', '1787654363', 1),
(369, 'Approve PR#10', '1787654497', 1),
(370, 'Add Production #5', '1787663766', 1),
(371, 'Approve production#5', '1787663784', 1),
(372, 'Approve PR#4', '1787667981', 1),
(373, 'Approve Batch#10', '1787669479', 1),
(374, 'login', '1787750179', 1),
(375, 'login', '1787750180', 1),
(376, 'Add PR #1', '1787751947', 1),
(377, 'Active PR#1', '1787751952', 1),
(378, 'Approve PR#1', '1787751953', 1),
(379, 'Add PO #1', '1787751960', 1),
(380, 'Approve PO#1', '1787751962', 1),
(381, 'Add Receive #1', '1787751966', 1),
(382, 'Approve Receive#1', '1787751969', 1),
(383, 'Edit Payment #1', '1787751975', 1),
(384, 'login', '1787912169', 1),
(385, 'Add Production #1', '1787914276', 1),
(386, 'Approve production#1', '1787914278', 1),
(387, 'Add Receive #2', '1787914515', 1),
(388, 'login', '1787914955', 1),
(389, 'login', '1787917150', 1),
(390, 'Add Production #2', '1787918271', 1),
(391, 'Approve production#2', '1787918273', 1),
(392, 'Add Receive #3', '1787918317', 1),
(393, 'Add Production #3', '1787918451', 1),
(394, 'Approve production#3', '1787918453', 1),
(395, 'Add Receive #4', '1787918839', 1),
(396, 'Add Production #4', '1787920565', 1),
(397, 'Approve production#4', '1787920567', 1),
(398, 'Add Receive #5', '1787920573', 1),
(399, 'Add Production #5', '1787920830', 1),
(400, 'Approve production#5', '1787920831', 1),
(401, 'Add Receive #6', '1787920837', 1),
(402, 'Add quotation #1', '1787921154', 1),
(403, 'Approve quotation#1', '1787921155', 1),
(404, 'Add So #1', '1787921162', 1),
(405, 'Appove So#1', '1787921163', 1),
(406, 'Add withdrawn #1', '1787921168', 1),
(407, 'Appove withdrawn#1', '1787921170', 1),
(408, 'Add receipt #1', '1787921175', 1),
(409, 'Approve Receive#6', '1787921370', 1),
(410, 'Add Production #6', '1787921456', 1),
(411, 'Approve production#6', '1787921457', 1),
(412, 'Add Receive #7', '1787921462', 1),
(413, 'Approve Receive#7', '1787921473', 1),
(414, 'Add Production #7', '1787921572', 1),
(415, 'Approve production#7', '1787921573', 1),
(416, 'Add Receive #8', '1787921580', 1),
(417, 'Add Production #8', '1787929871', 1),
(418, 'Approve production#8', '1787929873', 1),
(419, 'Add Receive #9', '1787929877', 1),
(420, 'Add Receive #10', '1787929917', 1),
(421, 'Approve Receive#10', '1787929932', 1),
(422, 'Add batch #1', '1787936158', 1),
(423, 'Edit batch #1', '1787937034', 1),
(424, 'Edit batch #1', '1787937054', 1),
(425, 'Edit batch #1', '1787937057', 1),
(426, 'Edit batch #1', '1787937108', 1),
(427, 'login', '1788005033', 1),
(428, 'Add Batch #1', '1788011816', 1),
(429, 'login', '1788092137', 1),
(430, 'Add batch #2', '1788094527', 1),
(431, 'Add batch #3', '1788094528', 1),
(432, 'Add batch #4', '1788095304', 1),
(433, 'Add batch #5', '1788098942', 1),
(434, 'Edit batch #4', '1788099024', 1),
(435, 'Edit batch #4', '1788099382', 1),
(436, 'Edit batch #5', '1788099390', 1),
(437, 'Edit batch #4', '1788099396', 1),
(438, 'Edit batch #4', '1788099473', 1),
(439, 'Edit batch #5', '1788099475', 1),
(440, 'Edit batch #5', '1788099593', 1),
(441, 'Edit batch #5', '1788099596', 1),
(442, 'Edit batch #5', '1788099599', 1),
(443, 'Add quotation #2', '1788100112', 1),
(444, 'Approve quotation#2', '1788100114', 1),
(445, 'Add batch #1', '1788100723', 1),
(446, 'Edit batch #1', '1788100728', 1),
(447, 'In-Active batch#1', '1788101487', 1),
(448, 'Active batch#1', '1788101492', 1),
(449, 'Edit Batch #1', '1788101998', 1),
(450, 'Edit Batch #1', '1788102005', 1),
(451, 'Add Batch #1', '1788102185', 1),
(452, 'Add Batch #2', '1788103810', 1),
(453, 'Add Batch #3', '1788104149', 1),
(454, 'Approve batch#3', '1788104158', 1),
(455, 'Approve batch#2', '1788104160', 1),
(456, 'Add So #2', '1788104377', 1),
(457, 'Appove So#2', '1788104378', 1),
(458, 'Add withdrawn #2', '1788104385', 1),
(459, 'Appove withdrawn#2', '1788104386', 1),
(460, 'Add receipt #2', '1788104400', 1),
(461, 'Add quotation #1', '1788104760', 1),
(462, 'Approve quotation#1', '1788104761', 1),
(463, 'Add So #1', '1788104766', 1),
(464, 'Appove So#1', '1788104767', 1),
(465, 'Add receipt #1', '1788104935', 1),
(466, 'Add quotation #2', '1788104955', 1),
(467, 'Approve quotation#2', '1788104956', 1),
(468, 'Add So #2', '1788104962', 1),
(469, 'Appove So#2', '1788104963', 1),
(470, 'Add receipt #2', '1788104996', 1),
(471, 'Add quotation #3', '1788105118', 1),
(472, 'Approve quotation#3', '1788105119', 1),
(473, 'Add So #3', '1788105125', 1),
(474, 'Appove So#3', '1788105126', 1),
(475, 'Add receipt #3', '1788105136', 1),
(476, 'Add quotation #4', '1788105148', 1),
(477, 'Approve quotation#4', '1788105150', 1),
(478, 'Add withdrawn #3', '1788105157', 1),
(479, 'Appove withdrawn#3', '1788105159', 1),
(480, 'Add So #4', '1788105168', 1),
(481, 'Appove So#4', '1788105181', 1),
(482, 'Add withdrawn #4', '1788105190', 1),
(483, 'Appove withdrawn#4', '1788105192', 1),
(484, 'Add farming #1', '1788108717', 1),
(485, 'Add farming #2', '1788108726', 1),
(486, 'login', '1788110608', 1),
(487, 'Add Batch #4', '1788110738', 1),
(488, 'Approve batch#4', '1788110739', 1),
(489, 'Add farming #3', '1788110746', 1),
(490, 'login', '1788138844', 1),
(491, 'Add Batch #5', '1788138860', 1),
(492, 'Edit Batch #5', '1788138864', 1),
(493, 'Add Batch #6', '1788138966', 1),
(494, 'Edit Batch #6', '1788138970', 1),
(495, 'Add Production #9', '1788139006', 1),
(496, 'Edit Production #9', '1788139010', 1),
(497, 'Add PR #2', '1788139045', 1),
(498, 'Edit PR #2', '1788139052', 1),
(499, 'Edit Batch #5', '1788139350', 1),
(500, 'Edit Batch #5', '1788139371', 1),
(501, 'login', '1788139694', 1),
(502, 'In-Active batch#5', '1788139702', 1),
(503, 'In-Active batch#6', '1788139716', 1),
(504, 'Add Batch #7', '1788139739', 1),
(505, 'Edit Batch #7', '1788139758', 1),
(506, 'Add Batch #8', '1788139800', 1),
(507, 'In-Active batch#7', '1788139857', 1),
(508, 'Edit Batch #8', '1788139870', 1),
(509, 'Edit Batch #8', '1788139982', 1),
(510, 'Add Batch #9', '1788139992', 1),
(511, 'Edit Batch #9', '1788140101', 1),
(512, 'login', '1788174616', 1),
(513, 'Appove farming#4', '1788175044', 1),
(514, 'Appove farming#4', '1788175045', 1),
(515, 'Appove farming#4', '1788175045', 1),
(516, 'Appove farming#4', '1788175049', 1),
(517, 'Appove farming#4', '1788175049', 1),
(518, 'Appove farming#4', '1788175049', 1),
(519, 'Appove farming#2', '1788175050', 1),
(520, 'Appove farming#2', '1788175051', 1),
(521, 'Appove farming#2', '1788175052', 1),
(522, 'Appove farming#2', '1788175052', 1),
(523, 'Appove farming#2', '1788175052', 1),
(524, 'Appove farming#2', '1788175053', 1),
(525, 'Appove farming#4', '1788175055', 1),
(526, 'Add Batch #10', '1788175108', 1),
(527, 'Appove farming#4', '1788175567', 1),
(528, 'Appove farming#2', '1788175568', 1),
(529, 'Appove farming#2', '1788175568', 1),
(530, 'Appove farming#2', '1788175568', 1),
(531, 'Approve batch#10', '1788175739', 1),
(532, 'Add Batch #11', '1788176016', 1),
(533, 'Edit Batch #11', '1788176029', 1),
(534, 'Appove farming#2', '1788176057', 1),
(535, 'Appove farming#2', '1788176057', 1),
(536, 'Appove farming#2', '1788176058', 1),
(537, 'Appove farming#4', '1788176058', 1),
(538, 'Appove farming#4', '1788176059', 1),
(539, 'Appove farming#4', '1788176059', 1),
(540, 'Appove farming#4', '1788176059', 1),
(541, 'Appove farming#4', '1788176059', 1),
(542, 'Add farming #4', '1788176186', 1),
(543, 'Add farming #5', '1788176283', 1),
(544, 'Add farming #6', '1788176308', 1),
(545, 'Add farming #7', '1788176312', 1),
(546, 'Add farming #8', '1788176709', 1),
(547, 'Add farming #9', '1788176838', 1),
(548, 'Add farming #10', '1788177049', 1),
(549, 'Approve batch#11', '1788177231', 1),
(550, 'Add farming #11', '1788177252', 1),
(551, 'Edit farming #2', '1788177798', 1),
(552, 'Edit farming #2', '1788177806', 1),
(553, 'Edit farming #2', '1788177816', 1),
(554, 'Edit farming #2', '1788177823', 1),
(555, 'Edit farming #11', '1788178121', 1),
(556, 'Appove farming#11', '1788178137', 1),
(557, 'Appove farming#10', '1788178138', 1),
(558, 'Appove farming#4', '1788178139', 1),
(559, 'Appove farming#2', '1788178140', 1),
(560, 'Edit farming #2', '1788178889', 1),
(561, 'Add Batch #12', '1788181007', 1),
(562, 'Approve batch#12', '1788181008', 1),
(563, 'Add farming #12', '1788181354', 1),
(564, 'Edit farming #12', '1788181361', 1),
(565, 'Edit farming #12', '1788181369', 1),
(566, 'Appove farming#12', '1788181373', 1),
(567, 'Edit farming #2', '1788181736', 1),
(568, 'Add Batch #13', '1788181749', 1),
(569, 'Approve batch#13', '1788181752', 1),
(570, 'Add farming #13', '1788181760', 1),
(571, 'Edit farming #13', '1788181765', 1),
(572, 'Appove farming#13', '1788181773', 1),
(573, 'Add Batch #14', '1788182187', 1),
(574, 'Approve batch#14', '1788182191', 1),
(575, 'Add farming #14', '1788182523', 1),
(576, 'Edit farming #14', '1788182577', 1),
(577, 'Edit farming #14', '1788182581', 1),
(578, 'Edit farming #14', '1788182594', 1),
(579, 'Edit farming #14', '1788182645', 1),
(580, 'Edit farming #14', '1788182749', 1),
(581, 'Appove farming#14', '1788182771', 1),
(582, 'logout', '1788192737', 1),
(583, 'cannot login', '1788192738', 0),
(584, 'cannot login', '1788192742', 0),
(585, 'cannot login', '1788192746', 0),
(586, 'cannot login', '1788192750', 0),
(587, 'login', '1788192755', 1),
(588, 'logout', '1788192768', 1),
(589, 'cannot login', '1788192772', 0),
(590, 'cannot login', '1788192775', 0),
(591, 'cannot login', '1788192780', 0),
(592, 'login', '1788192786', 1),
(593, 'logout', '1788193110', 1),
(594, 'login', '1788193111', 3),
(595, 'logout', '1788193115', 3),
(596, 'login', '1788193122', 1),
(597, 'login', '1788242169', 1),
(598, 'logout', '1788242436', 1),
(599, 'login', '1788242438', 3),
(600, 'logout', '1788242717', 3),
(601, 'cannot login', '1788242723', 0),
(602, 'cannot login', '1788242724', 0),
(603, 'login', '1788242730', 1),
(604, 'logout', '1788242744', 1),
(605, 'login', '1788242746', 3),
(606, 'logout', '1788243133', 3),
(607, 'login', '1788243152', 3),
(608, 'login', '1788243239', 3),
(609, 'logout', '1788243303', 3),
(610, 'login', '1788243311', 1),
(611, 'logout', '1788243397', 1),
(612, 'login', '1788243403', 3),
(613, 'logout', '1788244810', 3),
(614, 'login', '1788244814', 1),
(615, 'logout', '1788244863', 1),
(616, 'login', '1788244864', 1),
(617, 'Add Batch #15', '1788244876', 1),
(618, 'Approve batch#15', '1788244883', 1),
(619, 'Add farming #15', '1788244891', 1),
(620, 'Edit farming #15', '1788244896', 1),
(621, 'Appove farming#15', '1788244900', 1),
(622, 'logout', '1788246000', 1),
(623, 'login', '1788246004', 3),
(624, 'logout', '1788246095', 3),
(625, 'logout', '1788246658', 3),
(626, 'login', '1788343917', 1),
(627, 'login', '1788360240', 1),
(628, 'Add Batch #16', '1788360248', 1),
(629, 'Approve batch#16', '1788360251', 1),
(630, 'Add farming #16', '1788360258', 1),
(631, 'Approve production#9', '1788360830', 1),
(632, 'Add Receive #11', '1788360836', 1),
(633, 'Appove farming#16', '1788360843', 1),
(634, 'Approve production#10', '1788360985', 1),
(635, 'Add Batch #17', '1788361011', 1),
(636, 'Approve batch#17', '1788361013', 1),
(637, 'Add farming #17', '1788361111', 1),
(638, 'Appove farming#17', '1788361114', 1),
(639, 'Add Batch #18', '1788361300', 1),
(640, 'Approve batch#18', '1788361302', 1),
(641, 'Add farming #18', '1788361312', 1),
(642, 'Appove farming#18', '1788361315', 1),
(643, 'Approve production#14', '1788361322', 1),
(644, 'Add Batch #19', '1788361512', 1),
(645, 'Approve batch#19', '1788361515', 1),
(646, 'Add farming #19', '1788361522', 1),
(647, 'Appove farming#19', '1788361525', 1),
(648, 'Approve production#15', '1788361531', 1),
(649, 'Add Batch #20', '1788361711', 1),
(650, 'Approve batch#20', '1788361714', 1),
(651, 'Add farming #20', '1788361720', 1),
(652, 'Appove farming#20', '1788361723', 1),
(653, 'Approve production#16', '1788361782', 1),
(654, 'Add Receive #12', '1788362273', 1),
(655, 'Add Batch #21', '1788363093', 1),
(656, 'Edit Batch #21', '1788363098', 1),
(657, 'Approve batch#21', '1788363101', 1),
(658, 'Add farming #21', '1788363112', 1),
(659, 'Appove farming#21', '1788363115', 1),
(660, 'Add Production #17', '1788363539', 1),
(661, 'Approve production#17', '1788363547', 1),
(662, 'Add Batch #22', '1788363849', 1),
(663, 'Approve batch#22', '1788363851', 1),
(664, 'Add farming #22', '1788363862', 1),
(665, 'Appove farming#22', '1788363864', 1),
(666, 'Add Production #18', '1788363872', 1),
(667, 'Approve production#18', '1788363880', 1),
(668, 'Add Production #19', '1788363892', 1),
(669, 'Approve production#19', '1788363894', 1),
(670, 'Add Production #20', '1788363955', 1),
(671, 'Approve production#20', '1788363958', 1),
(672, 'Add Production #21', '1788364154', 1),
(673, 'Approve production#21', '1788364158', 1),
(674, 'Add Receive #13', '1788364164', 1),
(675, 'Add Batch #23', '1788364226', 1),
(676, 'Approve batch#23', '1788364228', 1),
(677, 'Add farming #23', '1788364235', 1),
(678, 'Edit farming #23', '1788364240', 1),
(679, 'Appove farming#23', '1788364246', 1),
(680, 'Add Production #22', '1788364254', 1),
(681, 'Approve production#22', '1788364264', 1),
(682, 'Add Receive #14', '1788364275', 1),
(683, 'login', '1788710025', 1),
(684, 'login', '1788710080', 1),
(685, 'Add PR #3', '1788710292', 1),
(686, 'Active PR#3', '1788710297', 1),
(687, 'Approve PR#3', '1788710303', 1),
(688, 'Add PO #2', '1788710310', 1),
(689, 'Approve PO#2', '1788710312', 1),
(690, 'Add PR #4', '1788710549', 1),
(691, 'Active PR#4', '1788710551', 1),
(692, 'Approve PR#4', '1788710552', 1),
(693, 'Add PO #3', '1788710558', 1),
(694, 'Approve PO#3', '1788710560', 1),
(695, 'Add quotation #5', '1788710743', 1),
(696, 'Approve quotation#5', '1788710744', 1),
(697, 'Add So #5', '1788710751', 1),
(698, 'Appove So#5', '1788710752', 1),
(699, 'Add withdrawn #5', '1788710758', 1),
(700, 'Appove withdrawn#5', '1788710761', 1),
(701, 'Add receipt #4', '1788710767', 1),
(702, 'Add receipt #5', '1788710777', 1),
(703, 'login', '1788710833', 1),
(704, 'Add PR #5', '1788710844', 1),
(705, 'Active PR#5', '1788710847', 1),
(706, 'Active PR#2', '1788710849', 1),
(707, 'Approve PR#2', '1788710851', 1),
(708, 'Approve PR#5', '1788710852', 1),
(709, 'Add PO #4', '1788710859', 1),
(710, 'Approve PO#4', '1788710861', 1),
(711, 'Add PO #5', '1788710865', 1),
(712, 'Approve PO#5', '1788710866', 1),
(713, 'Add Receive #15', '1788711144', 1),
(714, 'Add Receive #16', '1788711148', 1),
(715, 'Add Receive #17', '1788711153', 1),
(716, 'Add PR #6', '1788711291', 1),
(717, 'Active PR#6', '1788711294', 1),
(718, 'Approve PR#6', '1788711295', 1),
(719, 'Add PO #6', '1788711301', 1),
(720, 'Approve PO#6', '1788711302', 1),
(721, 'Add PR #7', '1788711580', 1),
(722, 'Active PR#7', '1788711583', 1),
(723, 'Approve PR#7', '1788711584', 1),
(724, 'Add PO #7', '1788711591', 1),
(725, 'Approve PO#7', '1788711592', 1),
(726, 'Add PR #1', '1788711920', 1),
(727, 'Active PR#1', '1788711923', 1),
(728, 'Approve PR#1', '1788711924', 1),
(729, 'Add PO #1', '1788711929', 1),
(730, 'Approve PO#1', '1788711930', 1),
(731, 'Add Receive #1', '1788711936', 1),
(732, 'Approve Receive#1', '1788711941', 1),
(733, 'Edit Payment #1', '1788711949', 1),
(734, 'Add quotation #1', '1788711972', 1),
(735, 'Approve quotation#1', '1788711974', 1),
(736, 'Add So #1', '1788711995', 1),
(737, 'Appove So#1', '1788711997', 1),
(738, 'Add withdrawn #1', '1788712003', 1),
(739, 'Appove withdrawn#1', '1788712004', 1),
(740, 'Add receipt #1', '1788712014', 1),
(741, 'Add Batch #24', '1788712030', 1),
(742, 'Approve batch#24', '1788712039', 1),
(743, 'Add Batch #25', '1788712043', 1),
(744, 'Approve batch#25', '1788712045', 1),
(745, 'Add farming #24', '1788712052', 1),
(746, 'Appove farming#25', '1788712055', 1),
(747, 'Add Production #1', '1788712066', 1),
(748, 'Approve production#1', '1788712068', 1),
(749, 'Add Receive #2', '1788712073', 1),
(750, 'logout', '1788712171', 1),
(751, 'login', '1788712181', 3),
(752, 'logout', '1788712225', 3),
(753, 'login', '1788712229', 1),
(754, 'cannot login', '1788712450', 0),
(755, 'login', '1788712453', 1),
(756, 'login', '1788712983', 1),
(757, 'login', '1788712984', 1),
(758, 'login', '1788787255', 1),
(759, 'login', '1788792140', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(5) NOT NULL,
  `typ` int(1) NOT NULL,
  `ref_id` int(5) NOT NULL,
  `supplier_id` int(5) NOT NULL,
  `date` date NOT NULL,
  `adate` date NOT NULL,
  `uid` int(5) NOT NULL,
  `uaid` int(5) NOT NULL,
  `app_id` int(5) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `value` decimal(10,2) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `typ`, `ref_id`, `supplier_id`, `date`, `adate`, `uid`, `uaid`, `app_id`, `detail`, `value`, `status`) VALUES
(1, 1, 1, 1, '2026-09-06', '0000-00-00', 1, 1, 9, 'Payment from Receive #1', 50.00, 2);

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `id` int(5) NOT NULL,
  `emp_id` int(5) NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  `year` int(5) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`id`, `emp_id`, `salary`, `year`, `status`) VALUES
(1, 1, 20000.00, 2026, 1),
(2, 3, 5000.00, 2026, 1);

-- --------------------------------------------------------

--
-- Table structure for table `po`
--

CREATE TABLE `po` (
  `id` int(5) NOT NULL,
  `pr_id` int(5) NOT NULL,
  `supplier_id` int(5) NOT NULL,
  `uid` int(5) NOT NULL,
  `uaid` int(5) NOT NULL,
  `date` date NOT NULL,
  `adate` date NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `po`
--

INSERT INTO `po` (`id`, `pr_id`, `supplier_id`, `uid`, `uaid`, `date`, `adate`, `status`) VALUES
(1, 1, 1, 1, 1, '2026-09-06', '0000-00-00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `po_detail`
--

CREATE TABLE `po_detail` (
  `id` int(5) NOT NULL,
  `po_id` int(5) NOT NULL,
  `inventory_id` int(5) NOT NULL,
  `num` int(5) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `po_detail`
--

INSERT INTO `po_detail` (`id`, `po_id`, `inventory_id`, `num`, `unit_price`, `status`) VALUES
(1, 1, 1, 1, 50.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pr`
--

CREATE TABLE `pr` (
  `id` int(5) NOT NULL,
  `supplier_id` int(5) NOT NULL,
  `uid` int(5) NOT NULL,
  `uaid` int(5) NOT NULL,
  `date` date NOT NULL,
  `adate` date NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pr`
--

INSERT INTO `pr` (`id`, `supplier_id`, `uid`, `uaid`, `date`, `adate`, `status`) VALUES
(1, 1, 1, 1, '2026-09-06', '0000-00-00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `production`
--

CREATE TABLE `production` (
  `id` int(5) NOT NULL,
  `batch_id` int(5) NOT NULL,
  `uid` int(5) NOT NULL,
  `uaid` int(5) NOT NULL,
  `date` date NOT NULL,
  `adate` date NOT NULL,
  `detail` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `app_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `production`
--

INSERT INTO `production` (`id`, `batch_id`, `uid`, `uaid`, `date`, `adate`, `detail`, `status`, `app_date`) VALUES
(1, 0, 1, 1, '2026-09-06', '0000-00-00', '', 3, '2026-09-06');

-- --------------------------------------------------------

--
-- Table structure for table `production_detail`
--

CREATE TABLE `production_detail` (
  `id` int(5) NOT NULL,
  `prod_id` int(5) NOT NULL,
  `inventory_id` int(5) NOT NULL,
  `typ` int(5) NOT NULL,
  `num` int(5) NOT NULL,
  `location_id` int(5) NOT NULL,
  `loss` int(5) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `production_detail`
--

INSERT INTO `production_detail` (`id`, `prod_id`, `inventory_id`, `typ`, `num`, `location_id`, `loss`, `detail`, `status`) VALUES
(1, 1, 1, 0, 1, 0, 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pr_detail`
--

CREATE TABLE `pr_detail` (
  `id` int(5) NOT NULL,
  `pr_id` int(5) NOT NULL,
  `inventory_id` int(5) NOT NULL,
  `num` int(5) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pr_detail`
--

INSERT INTO `pr_detail` (`id`, `pr_id`, `inventory_id`, `num`, `unit_price`, `status`) VALUES
(1, 1, 1, 1, 50.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

CREATE TABLE `quotation` (
  `id` int(5) NOT NULL,
  `uid` int(5) NOT NULL,
  `uaid` int(5) NOT NULL,
  `customer_id` int(5) NOT NULL,
  `date` date NOT NULL,
  `adate` date NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quotation`
--

INSERT INTO `quotation` (`id`, `uid`, `uaid`, `customer_id`, `date`, `adate`, `status`) VALUES
(1, 1, 1, 1, '2026-09-06', '0000-00-00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `quotation_detail`
--

CREATE TABLE `quotation_detail` (
  `id` int(5) NOT NULL,
  `quotation_id` int(5) NOT NULL,
  `inventory_id` int(5) NOT NULL,
  `num` int(5) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quotation_detail`
--

INSERT INTO `quotation_detail` (`id`, `quotation_id`, `inventory_id`, `num`, `unit_price`, `status`) VALUES
(1, 1, 2, 1, 180.00, 1),
(2, 1, 4, 1, 185.00, 1),
(3, 1, 5, 1, 185.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `id` int(5) NOT NULL,
  `so_id` int(5) NOT NULL,
  `withdrawn_id` int(5) NOT NULL,
  `customer_id` int(5) NOT NULL,
  `uid` int(5) NOT NULL,
  `uaid` int(5) NOT NULL,
  `date` date NOT NULL,
  `adate` date NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `app_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`id`, `so_id`, `withdrawn_id`, `customer_id`, `uid`, `uaid`, `date`, `adate`, `status`, `app_date`) VALUES
(1, 1, 0, 1, 1, 1, '2026-09-06', '0000-00-00', 2, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `receipt_detail`
--

CREATE TABLE `receipt_detail` (
  `id` int(5) NOT NULL,
  `receipt_id` int(5) NOT NULL,
  `inventory_id` int(5) NOT NULL,
  `num` int(5) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receipt_detail`
--

INSERT INTO `receipt_detail` (`id`, `receipt_id`, `inventory_id`, `num`, `unit_price`, `status`) VALUES
(1, 1, 2, 1, 180.00, 1),
(2, 1, 4, 1, 185.00, 1),
(3, 1, 5, 1, 185.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `receive`
--

CREATE TABLE `receive` (
  `id` int(5) NOT NULL,
  `rec_typ` int(11) NOT NULL,
  `ref_id` int(5) NOT NULL,
  `supplier_id` int(5) NOT NULL,
  `date` date NOT NULL,
  `adate` date NOT NULL,
  `uid` int(5) NOT NULL,
  `uaid` int(5) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `po_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receive`
--

INSERT INTO `receive` (`id`, `rec_typ`, `ref_id`, `supplier_id`, `date`, `adate`, `uid`, `uaid`, `status`, `po_id`) VALUES
(1, 1, 0, 1, '2026-09-06', '0000-00-00', 1, 1, 2, 1),
(2, 2, 0, 0, '0000-00-00', '0000-00-00', 1, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `receive_detail`
--

CREATE TABLE `receive_detail` (
  `id` int(5) NOT NULL,
  `receive_id` int(5) NOT NULL,
  `inventory_id` int(5) NOT NULL,
  `location_id` int(5) NOT NULL,
  `num` int(5) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receive_detail`
--

INSERT INTO `receive_detail` (`id`, `receive_id`, `inventory_id`, `location_id`, `num`, `unit_price`, `status`) VALUES
(1, 1, 1, 0, 1, 50.00, 1),
(2, 2, 4, 0, 1, 185.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `so`
--

CREATE TABLE `so` (
  `id` int(5) NOT NULL,
  `quotation_id` int(5) NOT NULL,
  `customer_id` int(5) NOT NULL,
  `uid` int(5) NOT NULL,
  `uaid` int(5) NOT NULL,
  `date` date NOT NULL,
  `adate` date NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `so`
--

INSERT INTO `so` (`id`, `quotation_id`, `customer_id`, `uid`, `uaid`, `date`, `adate`, `status`) VALUES
(1, 1, 1, 1, 1, '2026-09-06', '0000-00-00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `so_detail`
--

CREATE TABLE `so_detail` (
  `id` int(5) NOT NULL,
  `so_id` int(5) NOT NULL,
  `inventory_id` int(5) NOT NULL,
  `num` int(5) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `so_detail`
--

INSERT INTO `so_detail` (`id`, `so_id`, `inventory_id`, `num`, `unit_price`, `status`) VALUES
(1, 1, 2, 1, 180.00, 1),
(2, 1, 4, 1, 185.00, 1),
(3, 1, 5, 1, 185.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `province` varchar(50) NOT NULL,
  `zip` int(5) NOT NULL,
  `tel` int(10) NOT NULL,
  `fax` int(10) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `tax_id` int(10) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `address`, `province`, `zip`, `tel`, `fax`, `mail`, `tax_id`, `status`) VALUES
(1, 'Coffee Test Supply', '10/15 ถ.พระราม 2 แขวงแสมดำ เขตบางขุนเทียน', 'กรุงเทพมหานคร', 10600, 98645165, 111222223, 'terbean@example.com', 123456, 1);

-- --------------------------------------------------------

--
-- Table structure for table `timestamp`
--

CREATE TABLE `timestamp` (
  `id` int(5) NOT NULL,
  `emp_id` int(5) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `in` datetime DEFAULT NULL,
  `out` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `timestamp`
--

INSERT INTO `timestamp` (`id`, `emp_id`, `status`, `in`, `out`) VALUES
(1, 3, 1, '2026-09-06 18:29:54', '2026-09-06 18:30:11');

-- --------------------------------------------------------

--
-- Table structure for table `uig`
--

CREATE TABLE `uig` (
  `id` int(5) NOT NULL,
  `uid` int(5) NOT NULL,
  `ugid` int(5) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uig`
--

INSERT INTO `uig` (`id`, `uid`, `ugid`, `status`) VALUES
(1, 1, 1, 1),
(2, 3, 2, 1),
(3, 3, 3, 0),
(4, 4, 3, 0),
(5, 4, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `usergroup`
--

CREATE TABLE `usergroup` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `detail` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usergroup`
--

INSERT INTO `usergroup` (`id`, `name`, `detail`, `status`) VALUES
(1, 'Admin', 'ผู้ดูเเล', 1),
(2, 'Production', '', 1),
(3, 'Accounting ', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `phone` int(10) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user`, `pass`, `name`, `surname`, `mail`, `phone`, `status`) VALUES
(1, 'jonh', '6d14297be0f0aa9531a10e90f940d751', 'Panyakorn', 'khaiwchoo', 'punyakorn314@gmail.com', 830273318, 1),
(3, 'somchai', '6d14297be0f0aa9531a10e90f940d751', 'Somchai', 'Test', '', 0, 1),
(4, 'somsak', '81dc9bdb52d04dc20036dbd8313ed055', 'Somsak', 'Test', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `withdrawn`
--

CREATE TABLE `withdrawn` (
  `id` int(5) NOT NULL,
  `so_id` int(5) NOT NULL,
  `wd_typ` int(5) NOT NULL,
  `uid` int(5) NOT NULL,
  `uaid` int(5) NOT NULL,
  `date` date NOT NULL,
  `adate` date NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `customer_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `withdrawn`
--

INSERT INTO `withdrawn` (`id`, `so_id`, `wd_typ`, `uid`, `uaid`, `date`, `adate`, `status`, `customer_id`) VALUES
(1, 1, 0, 1, 1, '2026-09-06', '0000-00-00', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `withdrawn_detail`
--

CREATE TABLE `withdrawn_detail` (
  `id` int(5) NOT NULL,
  `withdrawn_id` int(5) NOT NULL,
  `inventory_id` int(5) NOT NULL,
  `location_id` int(5) NOT NULL,
  `unit_price` int(5) NOT NULL,
  `num` int(5) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `withdrawn_detail`
--

INSERT INTO `withdrawn_detail` (`id`, `withdrawn_id`, `inventory_id`, `location_id`, `unit_price`, `num`, `status`) VALUES
(1, 1, 2, 0, 180, 1, 1),
(2, 1, 4, 0, 185, 1, 1),
(3, 1, 5, 0, 185, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acc`
--
ALTER TABLE `acc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acc_detail`
--
ALTER TABLE `acc_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acc_typ`
--
ALTER TABLE `acc_typ`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acl`
--
ALTER TABLE `acl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app`
--
ALTER TABLE `app`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `areceive`
--
ALTER TABLE `areceive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batch_detail`
--
ALTER TABLE `batch_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_info`
--
ALTER TABLE `employee_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farming`
--
ALTER TABLE `farming`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farming_detail`
--
ALTER TABLE `farming_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_cat`
--
ALTER TABLE `inventory_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_typ`
--
ALTER TABLE `inventory_typ`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_management`
--
ALTER TABLE `leave_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location_col`
--
ALTER TABLE `location_col`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location_ctn`
--
ALTER TABLE `location_ctn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location_road`
--
ALTER TABLE `location_road`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location_row`
--
ALTER TABLE `location_row`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `po`
--
ALTER TABLE `po`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `po_detail`
--
ALTER TABLE `po_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pr`
--
ALTER TABLE `pr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `production`
--
ALTER TABLE `production`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `production_detail`
--
ALTER TABLE `production_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pr_detail`
--
ALTER TABLE `pr_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotation`
--
ALTER TABLE `quotation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotation_detail`
--
ALTER TABLE `quotation_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipt_detail`
--
ALTER TABLE `receipt_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receive`
--
ALTER TABLE `receive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receive_detail`
--
ALTER TABLE `receive_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `so`
--
ALTER TABLE `so`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `so_detail`
--
ALTER TABLE `so_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timestamp`
--
ALTER TABLE `timestamp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uig`
--
ALTER TABLE `uig`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usergroup`
--
ALTER TABLE `usergroup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawn`
--
ALTER TABLE `withdrawn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawn_detail`
--
ALTER TABLE `withdrawn_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acc`
--
ALTER TABLE `acc`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `acc_detail`
--
ALTER TABLE `acc_detail`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `acc_typ`
--
ALTER TABLE `acc_typ`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `acl`
--
ALTER TABLE `acl`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=380;

--
-- AUTO_INCREMENT for table `app`
--
ALTER TABLE `app`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `areceive`
--
ALTER TABLE `areceive`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `batch_detail`
--
ALTER TABLE `batch_detail`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employee_info`
--
ALTER TABLE `employee_info`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `farming`
--
ALTER TABLE `farming`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `farming_detail`
--
ALTER TABLE `farming_detail`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `inventory_cat`
--
ALTER TABLE `inventory_cat`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inventory_typ`
--
ALTER TABLE `inventory_typ`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `leave_management`
--
ALTER TABLE `leave_management`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `location_col`
--
ALTER TABLE `location_col`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `location_ctn`
--
ALTER TABLE `location_ctn`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `location_road`
--
ALTER TABLE `location_road`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `location_row`
--
ALTER TABLE `location_row`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=760;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `po`
--
ALTER TABLE `po`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `po_detail`
--
ALTER TABLE `po_detail`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pr`
--
ALTER TABLE `pr`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `production`
--
ALTER TABLE `production`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `production_detail`
--
ALTER TABLE `production_detail`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pr_detail`
--
ALTER TABLE `pr_detail`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quotation`
--
ALTER TABLE `quotation`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quotation_detail`
--
ALTER TABLE `quotation_detail`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `receipt_detail`
--
ALTER TABLE `receipt_detail`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `receive`
--
ALTER TABLE `receive`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `receive_detail`
--
ALTER TABLE `receive_detail`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `so`
--
ALTER TABLE `so`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `so_detail`
--
ALTER TABLE `so_detail`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `timestamp`
--
ALTER TABLE `timestamp`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `uig`
--
ALTER TABLE `uig`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usergroup`
--
ALTER TABLE `usergroup`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `withdrawn`
--
ALTER TABLE `withdrawn`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `withdrawn_detail`
--
ALTER TABLE `withdrawn_detail`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
