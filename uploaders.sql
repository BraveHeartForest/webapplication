-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2019 年 9 朁E10 日 10:33
-- サーバのバージョン： 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `uploaders`
--

DROP TABLE IF EXISTS `uploaders`;
CREATE TABLE `uploaders` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '名前',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `uploaders`
--

INSERT INTO `uploaders` (`id`, `username`, `created_at`, `updated_at`) VALUES
(14, 'username', '2019-08-09 15:00:00', '2019-08-09 15:00:00'),
(15, '注意', '2019-09-10 07:52:06', '2019-09-10 07:52:06'),
(16, '馬', '2019-09-10 07:52:35', '2019-09-10 07:52:35'),
(17, 'UMA', '2019-09-10 07:52:55', '2019-09-10 07:52:55'),
(18, 'エルマス＝サン', '2019-09-10 08:22:13', '2019-09-10 08:22:13'),
(19, '容疑者', '2019-09-10 08:23:11', '2019-09-10 08:23:11'),
(20, '容疑者2', '2019-09-10 08:23:26', '2019-09-10 08:23:26'),
(21, 'わかばちゃんと学ぶ', '2019-09-10 08:24:15', '2019-09-10 08:24:15'),
(22, '横浜駅', '2019-09-10 08:24:51', '2019-09-10 08:24:51'),
(23, 'グンマー', '2019-09-10 08:25:19', '2019-09-10 08:25:19'),
(24, 'GoogleMap', '2019-09-10 08:26:09', '2019-09-10 08:26:09'),
(25, 'カバ', '2019-09-10 08:26:30', '2019-09-10 08:26:30'),
(26, '右フック犬', '2019-09-10 08:27:01', '2019-09-10 08:27:01'),
(27, '右フック犬', '2019-09-10 08:27:18', '2019-09-10 08:27:18'),
(28, '天竺砂狐', '2019-09-10 08:27:41', '2019-09-10 08:27:41'),
(29, '邪悪な儀式', '2019-09-10 08:28:02', '2019-09-10 08:28:02'),
(30, '鳥獣戯画', '2019-09-10 08:28:33', '2019-09-10 08:28:33'),
(31, '白いタヌキ', '2019-09-10 08:28:58', '2019-09-10 08:28:58'),
(32, '結果ｎ', '2019-09-10 08:29:15', '2019-09-10 08:29:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `uploaders`
--
ALTER TABLE `uploaders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `uploaders`
--
ALTER TABLE `uploaders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
