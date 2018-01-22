-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 22, 2018 at 07:24 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taxi-jptvr15`
--

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `price` decimal(10,0) UNSIGNED NOT NULL,
  `img` varchar(200) NOT NULL DEFAULT 'no-image.png',
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `service`:
--

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `description`, `content`, `price`, `img`, `name`) VALUES
(3, 'Trivial order', 'Trivial order desc Trivial order desc Trivial order desc Trivial order desc Trivial order desc Trivial order desc ', '20', 'torder.jpeg', 'Trivial order'),
(4, 'Fast order', 'Fast order descFast order descFast order descFast order descFast order descFast order descFast order descFast order descFast order desc', '40', 'vorder.jpeg', 'Fast order'),
(13, 'lol', 'lollollollollollollollollollollollollollol', '600', 'no-image.png', 'rrr');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `user`:
--

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `pass`, `is_admin`) VALUES
(1, 'roman', 'ds@ds.wd', '12345', 0),
(2, 'artjom', 'lala@ma.ru', '$2y$10$hnrjnS/kTCZ8A', 0),
(3, 'rrrr', 'm@m.m', '$2y$10$Z0SfjwrBdEtY3', 0),
(4, 'roman', 'lol@mail.ru', '$2y$10$dUMnG0K51NiOJ', 0),
(5, 'rrrrrrr', 'ja@ja.ja', '$2y$10$v5ifheB9lNfSyp1SCA0pQOofkRXHI/ATIaNsdwHTzwJkwUEwLoJne', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
