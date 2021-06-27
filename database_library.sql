-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1:3306
-- 生成日期： 2021-06-27 20:06:04
-- 服务器版本： 5.7.31
-- PHP 版本： 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `database_library`
--

-- --------------------------------------------------------

--
-- 表的结构 `table_admin`
--

DROP TABLE IF EXISTS `table_admin`;
CREATE TABLE IF NOT EXISTS `table_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `table_admin_id_uindex` (`id`),
  UNIQUE KEY `table_admin_username_uindex` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='管理员表';

--
-- 转存表中的数据 `table_admin`
--

INSERT INTO `table_admin` (`id`, `username`, `password`) VALUES
(8, 'admin', 'admin');

-- --------------------------------------------------------

--
-- 表的结构 `table_books`
--

DROP TABLE IF EXISTS `table_books`;
CREATE TABLE IF NOT EXISTS `table_books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `number` int(11) NOT NULL,
  `category` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `table_books_id_uindex` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COMMENT='书籍表';

--
-- 转存表中的数据 `table_books`
--

INSERT INTO `table_books` (`id`, `name`, `number`, `category`) VALUES
(1, '测试书名1', 3, '测试类别1'),
(2, '333eq666', 333327, '333eq12'),
(3, '000eq', 1, '000eq12'),
(6, 'eq', 331, 'eq12'),
(29, 'qweq', 123, 'qwe'),
(28, 'ddd', 123, 'ddd'),
(30, 'www', 222, 'www'),
(32, 'qwe', 231, 'wqe');

-- --------------------------------------------------------

--
-- 表的结构 `table_borrowbooks`
--

DROP TABLE IF EXISTS `table_borrowbooks`;
CREATE TABLE IF NOT EXISTS `table_borrowbooks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `returnDate` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `table_borrowBooks_id_uindex` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `table_borrowbooks`
--

INSERT INTO `table_borrowbooks` (`id`, `book_id`, `user_id`, `returnDate`) VALUES
(1, 1, 7, '2021-06-15'),
(2, 2, 7, '2021-06-15'),
(19, 32, 7, '2021-07-04');

-- --------------------------------------------------------

--
-- 表的结构 `table_user`
--

DROP TABLE IF EXISTS `table_user`;
CREATE TABLE IF NOT EXISTS `table_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `table_user_username_uindex` (`username`),
  UNIQUE KEY `table_user_id_uindex` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COMMENT='用户表';

--
-- 转存表中的数据 `table_user`
--

INSERT INTO `table_user` (`id`, `username`, `password`) VALUES
(7, 'user', 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
