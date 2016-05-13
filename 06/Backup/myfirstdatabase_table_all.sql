-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016 年 5 月 07 日 08:08
-- サーバのバージョン： 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `myfirstdatabase`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` bigint(50) NOT NULL,
  `first_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `last_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `tel` int(50) NOT NULL,
  `gender` varchar(1) CHARACTER SET utf8 NOT NULL,
  `age` int(3) NOT NULL,
  `score` int(2) NOT NULL,
  `comments` varchar(200) CHARACTER SET utf8 NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 NOT NULL,
  `registration_date` datetime(6) NOT NULL,
  `update_date` datetime(6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `tel`, `gender`, `age`, `score`, `comments`, `password`, `registration_date`, `update_date`) VALUES
(1, '宏樹', '佐藤', 'satou.hiroki@gmail.com', 111, 'M', 31, 5, '栗林さんが優しい。', '1234', '2016-05-04 18:17:16.000000', '2016-05-07 14:19:07.000000'),
(2, '宏樹', '加藤', 'kato.hiroki@gmail.com', 222, 'M', 31, 3, '日本語入力可アップデート', '2345', '2016-05-04 18:18:23.000000', '2016-05-05 21:49:39.000000'),
(3, '宏樹', '伊藤', 'ito.hiroki@gmail.com', 333, 'M', 31, 4, 'UTF-8設定済み update', '3456', '2016-05-04 18:18:52.000000', '2016-05-05 21:49:47.000000'),
(4, '宏樹', '後藤', 'goto.hiroki@gmail.com', 444, 'M', 32, 2, 'テストレコード', '4567', '2016-05-04 20:19:19.000000', '2016-05-05 21:49:55.000000'),
(5, '宏子', '佐藤', 'sato.hiroko@gmail.com', 123, 'F', 20, 2, 'グラフテスト', '4321', '2016-05-04 23:34:42.000000', '2016-05-05 21:50:03.000000'),
(6, '宏子', '加藤', 'kato.hiroko@gmail.com', 234, 'F', 22, 1, 'ゲスが多い', '5432', '2016-05-04 23:35:18.000000', '2016-05-05 21:50:49.000000'),
(7, '宏子', '後藤', 'goto.hiroko@gmail.com', 345, 'F', 18, 3, 'グラフ用レコード', '6543', '2016-05-04 23:43:17.000000', '2016-05-05 21:50:18.000000'),
(8, '宏子', '伊藤', 'ito.hiroko@gmail.com', 456, 'F', 24, 5, '栗林さんがまじで優しい。', '7654', '2016-05-05 18:38:35.000000', '2016-05-06 01:08:24.000000'),
(10, '宏子', '近藤', 'kondo.hiroko@gmail.com', 567, 'F', 21, 3, '評価フィールドテストレコード', '8765', '2016-05-05 21:43:18.000000', '2016-05-05 21:51:20.000000'),
(11, '宏子', '江頭', 'eto.hiroko@gmail.com', 678, 'F', 25, 5, '栗林さんがとにかく優しい。', '9876', '2016-05-05 21:45:38.000000', '2016-05-06 01:08:10.000000'),
(12, '宏子', '武藤', 'muto.hiroko@gmail.com', 789, 'F', 20, 5, '栗林さんがいい人過ぎる。', '0987', '2016-05-05 22:38:40.000000', '2016-05-06 01:08:40.000000'),
(13, '宏樹', '斉藤', 'saito.hiroki@gmail.com', 555, 'M', 35, 4, 'お腹減った。', '5678', '2016-05-06 01:30:14.000000', '0000-00-00 00:00:00.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
