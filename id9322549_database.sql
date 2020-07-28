-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- 생성 시간: 20-06-22 18:11
-- 서버 버전: 10.3.16-MariaDB
-- PHP 버전: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `id9322549_database`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `food0`
--

CREATE TABLE `food0` (
  `name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `food1`
--

CREATE TABLE `food1` (
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `food2`
--

CREATE TABLE `food2` (
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `history`
--

CREATE TABLE `history` (
  `id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `_table` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `history`
--

INSERT INTO `history` (`id`, `name`, `time`, `_table`) VALUES
('1434813', ' 가쓰오우동', '2019.11.18 21:13:54^1', 0),
('1434813', ' 김밥', '2019.11.18 21:13:54^1', 0),
('1434813', ' 눈꽃치즈떡갈비', '2019.11.18 21:13:54^1', 0),
('1434813', ' 곰탕&안동찜닭', '2019.11.18 21:14:56^1', 1),
('1434813', ' 안동찜닭정식', '2019.11.18 21:14:56^1', 1),
('1434813', '곰탕', '2019.11.18 21:14:56^1', 1),
('1434813', ' 오리불고기정식', '2019.11.18 21:15:23^1', 2),
('1434813', '곰탕', '2019.11.19 00:19:41^1', 1),
('1434813', '코카콜라', '2019.11.19 00:19:41^1', 1),
('1434282', '오꼬노미야끼', '2019.11.19 00:46:48^1', 1),
('1434282', '코카콜라', '2019.11.19 00:46:48^1', 1),
('1434813', '가쓰오우동', '2019.11.19 01:05:45^1', 0),
('1434813', '고구마돈까스', '2019.11.19 01:05:45^1', 0),
('1434813', '등심돈까스', '2019.11.19 01:05:45^1', 0),
('1434813', '라면부대찌개&계란후라이밥', '2019.11.19 06:14:27^1', 0),
('1434707', '치즈라면', '2019.11.20 15:45:07^1', 0),
('1434707', '김밥', '2019.11.20 15:51:46^1', 0),
('1434707', '땡초김밥', '2019.11.20 15:51:46^1', 0),
('1434707', '가쓰오우동', '2019.11.20 15:54:36^1', 0),
('1434707', '등심돈까스', '2019.11.20 15:54:36^1', 0),
('guest', '땡초김밥', '2019.11.21 19:46:58^1', 0),
('1434282', '김밥', '2019.11.26 15:39:14^1', 0),
('1434282', '불고기김치덮밥', '2019.11.26 15:39:14^1', 0),
('1434282', '치킨데리야끼덮밥', '2019.11.26 15:39:14^1', 0),
('1434282', '치킨데리야끼덮밥', '2019.11.26 15:39:14^2', 0),
('1434282', '치킨데리야끼덮밥', '2019.11.26 15:39:14^3', 0),
('1434282', '코카콜라', '2019.11.26 17:29:54^1', 1),
('1434813', '가쓰오우동', '2019.11.27 11:48:07^1', 0);

-- --------------------------------------------------------

--
-- 테이블 구조 `ticket0`
--

CREATE TABLE `ticket0` (
  `id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `ticket0`
--

INSERT INTO `ticket0` (`id`, `name`, `time`) VALUES
('1434707', '가쓰오우동', '2019.11.20 15:54:36^1^p^p'),
('1434707', '김밥', '2019.11.20 15:51:46^1^p^p'),
('1434707', '등심돈까스', '2019.11.20 15:54:36^1'),
('1434707', '땡초김밥', '2019.11.20 15:51:46^1'),
('guest', '땡초김밥', '2019.11.21 19:46:58^1'),
('1434813', '치킨데리야끼덮밥', '2019.11.26 15:39:14^3^p'),
('1434813', '가쓰오우동', '2019.11.27 11:48:07^1');

-- --------------------------------------------------------

--
-- 테이블 구조 `ticket1`
--

CREATE TABLE `ticket1` (
  `id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `ticket2`
--

CREATE TABLE `ticket2` (
  `id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `today`
--

CREATE TABLE `today` (
  `date` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `today`
--

INSERT INTO `today` (`date`) VALUES
('20200621');

-- --------------------------------------------------------

--
-- 테이블 구조 `users`
--

CREATE TABLE `users` (
  `id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pw` varchar(65) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `users`
--

INSERT INTO `users` (`id`, `pw`, `name`) VALUES
('1434282', 'b4ca8401f5e44b599db294d709ad7d489b32c99c6d4228c0829e25f02f37ace2', '김정빈'),
('1434707', 'b4ca8401f5e44b599db294d709ad7d489b32c99c6d4228c0829e25f02f37ace2', '최성용'),
('1434813', 'b4ca8401f5e44b599db294d709ad7d489b32c99c6d4228c0829e25f02f37ace2', '윤기찬'),
('admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '관리자'),
('guest', '84983c60f7daadc1cb8698621f802c0d9f9a3c3c295c810748fb048115c186ec', 'guest');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `food0`
--
ALTER TABLE `food0`
  ADD PRIMARY KEY (`name`);

--
-- 테이블의 인덱스 `food1`
--
ALTER TABLE `food1`
  ADD PRIMARY KEY (`name`);

--
-- 테이블의 인덱스 `food2`
--
ALTER TABLE `food2`
  ADD PRIMARY KEY (`name`);

--
-- 테이블의 인덱스 `today`
--
ALTER TABLE `today`
  ADD PRIMARY KEY (`date`);

--
-- 테이블의 인덱스 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
