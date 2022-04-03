-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2022-04-03 19:24:41
-- 服务器版本： 8.0.28
-- PHP 版本： 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- 数据库： `custom`
--

-- --------------------------------------------------------

--
-- 表的结构 `options`
--

CREATE TABLE `options` (
  `name` varchar(32) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 转存表中的数据 `options`
--

INSERT INTO `options` (`name`, `value`) VALUES
('plugins', 'a:0:{}'),
('routing_table', 'a:2:{i:0;a:3:{s:4:\"regx\";s:9:\"/^[\\/]?$/\";s:6:\"widget\";s:20:\"\\Custom\\Widget\\Index\";s:6:\"action\";s:6:\"render\";}i:1;a:3:{s:4:\"regx\";s:35:\"/^\\/action\\/([_0-9a-zA-Z-]+)[\\/]?$/\";s:6:\"widget\";s:21:\"\\Custom\\Widget\\Action\";s:6:\"params\";a:1:{i:0;s:6:\"action\";}}}'),
('theme', 'default');

--
-- 转储表的索引
--

--
-- 表的索引 `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`name`);
COMMIT;
