-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： localhost:3307
-- 產生時間： 2023-06-07 02:18:43
-- 伺服器版本： 10.4.27-MariaDB
-- PHP 版本： 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `health`
--

-- --------------------------------------------------------

--
-- 資料表結構 `account`
--

CREATE TABLE `account` (
  `userID` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `choose_char` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `account`
--

INSERT INTO `account` (`userID`, `password`, `choose_char`) VALUES
('12', '121212', 0),
('123456', '123456', 0),
('123789', '123789', 0),
('456789', '456789', 0),
('aaa', '741852', 1),
('abc', '123456', 1),
('bbbb', '456123', NULL),
('hello', '123456789', 0),
('junxiang', '123456', 0),
('qqq', '123456', 1),
('wanyirui', 'adt1101021517', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `character`
--

CREATE TABLE `character` (
  `number` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `dialog` varchar(1000) DEFAULT NULL,
  `place` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `character`
--

INSERT INTO `character` (`number`, `name`, `dialog`, `place`) VALUES
(1, 'emilia', 'I wish you can get the bless of elves.', 'choose'),
(2, 'emilia', 'Gifts are only for the kids who are hardworking, so that\'s why \'gifts\' are called gifts.', 'person'),
(3, 'emilia', 'You let me worried a lot.', 'show_bad'),
(4, 'emilia', 'Thanks for your hard work today.', 'show_good'),
(5, 'rem', 'You really...get problems so easily.', 'show_bad'),
(6, 'rem', 'Wow, you let rem so impressive.', 'show_good'),
(7, 'rem', 'Are you tired? Or do you need some healing magic?', 'choose'),
(8, 'rem', 'You need not worry. Rem will always protect you.', 'person'),
(9, 'ram', 'It\'s work time. Go to work right now.', 'person'),
(10, 'ram', 'Appreciate to me right now.', 'choose'),
(11, 'ram', 'Not bad. Of cource the result should be like this.', 'show_good'),
(12, 'ram', 'It\'s too late to apologize, please give up.', 'show_bad');

-- --------------------------------------------------------

--
-- 資料表結構 `heart`
--

CREATE TABLE `heart` (
  `id` int(11) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `age` int(11) NOT NULL,
  `diastolic` varchar(10) DEFAULT NULL,
  `systolic` varchar(10) DEFAULT NULL,
  `anti-hypertensive` tinyint(4) DEFAULT NULL,
  `smoker` tinyint(4) DEFAULT NULL,
  `diabetes` tinyint(4) DEFAULT NULL,
  `hdl` varchar(10) DEFAULT NULL,
  `tdl` varchar(10) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `risk` int(11) DEFAULT NULL,
  `userID` varchar(20) DEFAULT NULL
) ;

--
-- 傾印資料表的資料 `heart`
--

INSERT INTO `heart` (`id`, `sex`, `age`, `diastolic`, `systolic`, `anti-hypertensive`, `smoker`, `diabetes`, `hdl`, `tdl`, `score`, `risk`, `userID`) VALUES
(2, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(3, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(4, 'male', 15, '<80', '<120', 0, 1, 0, '45-49', '<160', -1, 2, NULL),
(5, 'male', 36, '90-99', '<120', 0, 0, 0, '<35', '<160', 1, 3, NULL),
(6, 'male', 26, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(7, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(8, 'male', 14, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(9, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(10, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(13, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(19, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(20, 'male', 20, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(23, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(24, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(25, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(26, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(27, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(29, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(30, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(31, 'male', 29, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(32, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(33, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(34, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(35, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(36, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(37, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(38, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(39, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(40, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(41, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(42, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(43, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(44, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(45, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(46, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(47, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(48, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(49, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(50, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(51, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(52, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(53, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(54, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(55, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(56, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(57, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(58, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(59, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(60, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(61, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(62, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(63, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(64, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(65, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(66, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(67, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(68, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(69, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(70, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(71, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(72, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(73, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(74, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(75, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(76, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(77, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(78, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(79, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(80, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(81, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(82, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(83, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(84, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(85, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(86, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(87, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(88, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(89, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(91, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(92, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(93, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(94, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(95, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(96, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(97, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(98, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(99, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(100, 'male', 85, '100+', '160+', 1, 1, 1, '60+', '280+', 14, 53, NULL),
(101, 'male', 85, '100+', '160+', 1, 1, 1, '60+', '280+', 14, 53, NULL),
(102, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(106, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(107, 'male', 62, '90-99', '160+', 1, 1, 1, '50-59', '280+', 14, 53, NULL),
(108, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(109, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(110, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(111, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(112, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(113, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(114, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(115, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(116, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(117, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(118, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(119, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(120, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(121, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(122, 'male', 69, '100+', '160+', 1, 1, 1, '60+', '280+', 14, 53, NULL),
(123, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(124, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(125, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(126, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(127, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(128, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(129, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(130, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(131, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(132, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(133, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(134, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(135, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(136, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(137, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(138, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(139, 'male', 99, '100+', '160+', 1, 1, 1, '60+', '280+', 14, 53, NULL),
(140, 'male', 13, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(141, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(142, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(143, 'male', 99, '100+', '160+', 1, 1, 1, '60+', '280+', 14, 53, NULL),
(144, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(145, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(146, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, NULL),
(148, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, 'abc'),
(149, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, 'abc'),
(150, 'male', 10, '<80', '<120', 0, 0, 0, '<35', '<160', -1, 2, 'abc'),
(151, 'male', 10, '<80', '<120', 1, 1, 1, '<35', '<160', -1, 2, 'abc'),
(152, 'male', 10, '<80', '<120', 1, 1, 1, '<35', '<160', -1, 2, 'abc'),
(153, 'male', 10, '<80', '<120', 1, 1, 1, '<35', '<160', -1, 2, 'abc'),
(154, 'male', 10, '<80', '<120', 1, 1, 1, '<35', '<160', -1, 2, 'abc'),
(155, 'male', 10, '<80', '<120', 1, 1, 1, '<35', '<160', -1, 2, 'abc'),
(156, 'male', 10, '<80', '<120', 1, 1, 1, '<35', '<160', -1, 2, 'abc'),
(157, 'male', 10, '<80', '<120', 1, 1, 1, '<35', '<160', -1, 2, 'abc'),
(158, 'male', 10, '<80', '<120', 1, 1, 1, '<35', '<160', -1, 2, 'abc'),
(159, 'male', 10, '<80', '<120', 1, 1, 1, '<35', '<160', -1, 2, 'abc'),
(160, 'male', 10, '<80', '<120', 1, 1, 1, '<35', '<160', -1, 2, 'abc'),
(161, 'male', 88, '100+', '160+', 0, 0, 1, '60+', '240-279', 12, 37, 'qqq'),
(162, 'male', 10, '<80', '<120', 1, 1, 1, '<35', '<160', -1, 2, 'qqq'),
(163, 'male', 76, '100+', '160+', 0, 0, 1, '60+', '280+', 13, 45, 'qqq'),
(164, 'male', 10, '<80', '<120', 1, 1, 1, '<35', '<160', -1, 2, 'qqq'),
(165, 'male', 70, '100+', '160+', 0, 0, 1, '60+', '280+', 13, 45, 'qqq'),
(166, 'male', 70, '100+', '160+', 0, 0, 1, '60+', '280+', 13, 45, 'qqq');

-- --------------------------------------------------------

--
-- 資料表結構 `language`
--

CREATE TABLE `language` (
  `english` varchar(200) NOT NULL,
  `chinese` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `language`
--

INSERT INTO `language` (`english`, `chinese`) VALUES
('Age', '年齡'),
('Age Score', '年齡分數'),
('anti-hypertensive', '是否服用高血壓藥物'),
('Anti-hypertensives', '是否服用高血壓藥物'),
('Appreciate to me right now.', '還不趕快跟拉姆道謝'),
('Are you tired? Or do you need some healing magic?', '覺得累了嗎？需不需要來點治癒魔法呢?'),
('Blood Pressure Diastolic', '血壓舒張壓'),
('Blood Pressure Systolic', '血壓收縮壓'),
('Blood Score', '血壓分數'),
('Change Partner', '更換夥伴'),
('Data', '資料'),
('DEL', '刪除'),
('Diabetes', '是否有糖尿病'),
('Diabetes Score', '糖尿病分數'),
('Diastolic', '舒張壓'),
('EDIT', '編輯'),
('Emilia', '愛蜜莉亞'),
('English', 'Chinese'),
('Female', '女性'),
('Framingham Cardiovascular Disease Risk Evaluation', '心血管疾病風險預測'),
('Gender', '性別'),
('Gifts are only for the kids who are hardworking, so that\'s why \'gifts\' are called gifts.', '就是因為獎勵只給認真的乖小孩，所以才叫做獎勵'),
('Has Diabates', '有糖尿病'),
('Has High Blood Pressure Medicine', '有服用高血壓藥物'),
('Has Smoke', '有吸菸'),
('HDL', '高密度膽固醇'),
('HDL Score', '高密度膽固醇分數'),
('Health Log', '健康紀錄'),
('I wish you can get the bless of elves.', '祈許你能受精靈們的祝福'),
('id', '編號'),
('It\'s too late to apologize, please give up.', '道歉已經太遲了，請你放棄吧'),
('It\'s work time. Go to work right now.', '現在是工作時間，請立馬起身準備'),
('Made by ADT110115 Explosion', 'ADT110115 萬宸維製作'),
('Male', '男性'),
('mg/dl', ''),
('mmHg', ''),
('Next', '繼續'),
('No Diabates', '沒有糖尿病'),
('No High Blood Pressure Medicine', '沒有服用高血壓藥物'),
('No Smoke', '沒有吸菸'),
('Not bad. Of cource the result should be like this.', '還不錯嗎，這是必然的結果'),
('Ram', '拉姆'),
('Rem', '雷姆'),
('Reset', '重置'),
('Result', '結果顯示'),
('risk', '危險指數'),
('Risk Factor', '危險因子'),
('score', '分數'),
('See Result', '查看結果'),
('Sex', '性別'),
('Show Data', '顯示資料'),
('Smoke Score', '吸菸分數'),
('Smoker', '是否吸菸'),
('Submit', '送出'),
('Systolic', '收縮壓'),
('TDL', '總膽固醇'),
('TDL Score', '總膽固醇分數'),
('Test Health', '健康測試'),
('Thanks for your hard work today. ', '今天也辛苦你了'),
('To Home', '回首頁'),
('Total Risk', '危險指數'),
('Total Score', '總分數'),
('Unit', '單位'),
('Wow, you let rem so impressive.', '太厲害了，讓雷姆覺得敬佩不已'),
('years old', '歲'),
('Yes', '是'),
('You let me worried a lot.', '你真的讓我非常的擔心'),
('You need not worry. Rem will always protect you.', '不用擔心，雷姆會一直待在你身後保護著你'),
('You really...get problems so easily.', '真的是...很容易狀況欸');

-- --------------------------------------------------------

--
-- 資料表結構 `personal_data`
--

CREATE TABLE `personal_data` (
  `orderID` int(11) NOT NULL,
  `userID` varchar(20) DEFAULT NULL,
  `character` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `personal_data`
--

INSERT INTO `personal_data` (`orderID`, `userID`, `character`) VALUES
(22, '00ABC', 'emilia'),
(29, '00BCD', 'ram'),
(255, 'abc', 'emilia'),
(262, 'aaa', 'emilia'),
(268, 'qqq', 'rem');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`userID`);

--
-- 資料表索引 `character`
--
ALTER TABLE `character`
  ADD PRIMARY KEY (`number`);

--
-- 資料表索引 `heart`
--
ALTER TABLE `heart`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`english`);

--
-- 資料表索引 `personal_data`
--
ALTER TABLE `personal_data`
  ADD PRIMARY KEY (`orderID`),
  ADD UNIQUE KEY `userID` (`userID`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `character`
--
ALTER TABLE `character`
  MODIFY `number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `heart`
--
ALTER TABLE `heart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `personal_data`
--
ALTER TABLE `personal_data`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=281;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
