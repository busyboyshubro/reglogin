-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2021 at 07:18 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci3reglogin`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `userid` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `username` varchar(2000) NOT NULL,
  `email` varchar(2000) NOT NULL,
  `password` varchar(2000) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`userid`, `first_name`, `last_name`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'admin', 'panel', 'admin', 'shubropurkait7@gmail.com', 'bb0c56d225dcd55c9eefd97936b491bf8cced429b1a1e331620d04dd666b02976de49f81ad4a4917c840badca93ac5cb0a4323645e4bd561e1d964f130bb1f7b0BzT7q6mvuJO4OC8FGBX2/6pKyrIseUl+KVtP/Hb0mQ=', 0),
(2, 'Subrata', 'Purkait', 'user', 'shubropurkait6@gmail.com', 'bb0c56d225dcd55c9eefd97936b491bf8cced429b1a1e331620d04dd666b02976de49f81ad4a4917c840badca93ac5cb0a4323645e4bd561e1d964f130bb1f7b0BzT7q6mvuJO4OC8FGBX2/6pKyrIseUl+KVtP/Hb0mQ=', 0),
(3, 'Subrata', 'Purkait', 'adminji', 'subrop130@gmail.com', '$2y$10$l3RXfqg4hq.ZsOGSdod.pOWzqC4CaDsQ.i7gamewNx629i/Bm/ToS', 1633122860),
(4, 'Subrata', 'Purkait', 'admin', 'subrop230@gmail.com', '$2y$10$V/k9gtEekKoYcpL46jyBGOoZ5lCWSyz/Y34vYTwVZK5zuergUEwte', 1633124173),
(5, 'Subrata', 'Purkait', 'admin', 'subrop330@gmail.com', '$2y$10$HjIW8xJ0qX.b/rZwxjcCSuDFhGZw6j62rnD2wu9gUeTePYorWlttW', 1633124562),
(6, 'Subrata', 'Purkait', 'shubro', 'subrop31@gmail.com', '$2y$10$YwLHNsXekOeZmv2GtSBL4ub/O4eId1aOZVHCQHKJJfiYrEjGFC90G', 1633209321),
(7, 'sdgsrdgf', 'jdfpidfoigo', 'oihoidfhgos', 'odifgisd@kjrng.df', '$2y$10$2yOoeCHbSgDHagJY5RCZYuJr2.pMnrbJdBWXHtt0Eo5Fu2kOusWZK', 1633209707),
(8, 'Subrata', 'Purkait', 'shubroo', 'subrop30@gmail.com', '$2y$10$ygutq6nof1u9wVV/pVQ6xubxNbAH7N6v70yqdjyrH9u1Sww.H0TMq', 1633217650),
(9, 'Subrata', 'Purkait', 'rm1', 'subrop3110@gmail.com', '$2y$10$gSQh0rm/Lxtck9y.ZkHp4.fftVjxE4SaxQKBUmFO3NC0kf1BLX.T.', 1633324591);

-- --------------------------------------------------------

--
-- Table structure for table `login_session`
--

CREATE TABLE `login_session` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `access_token` varchar(255) NOT NULL,
  `user_type` int(2) NOT NULL COMMENT '1-Admin; 2-User',
  `login_time` int(11) NOT NULL,
  `logout_time` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_session`
--

INSERT INTO `login_session` (`id`, `user_id`, `access_token`, `user_type`, `login_time`, `logout_time`) VALUES
(1, 1, 'IXdZ90WHAoX2CuKo3EvJ', 0, 1617729260, 1617729298),
(2, 1, 'QB4AJFQmob3lmAj8rXdt', 0, 1617729336, 0),
(3, 1, 'kdjffuE4t9tHwMDJ9sPq', 0, 1617810470, 0),
(4, 1, 'p4AYylLfpFCf32VRpVKD', 0, 1617817246, 0),
(5, 1, 'IirHUNeXBInlGBRDZpSE', 0, 1617820685, 0),
(6, 8, 'p5l57dNbIXrmzaonlKdR', 0, 1633287192, 0),
(7, 8, 'VObn8szJKHNvoInS0U1e', 0, 1633287446, 0),
(8, 8, 'RinjN99WXT1R4kmAt66V', 0, 1633287528, 0),
(9, 8, 'jmbU8Idx74oKeU0j4exs', 0, 1633318793, 0),
(10, 8, 'yUM9gdnKziHk9DqXWei7', 0, 1633320153, 0),
(11, 8, '7i2fmIrhSlP5PpD5A0Fm', 0, 1633320275, 0),
(12, 8, 'j5YVFbHoI3snK3us7S76', 0, 1633321013, 0),
(13, 6, 'XUyJKSS4P1D33GkLLj2n', 0, 1633322414, 0),
(14, 5, 'h7v336uVJPa9p4Q3Ncd0', 0, 1633322582, 0),
(20, 4, '9vAK7PmvsZXwdRxCnzFx', 0, 1633323928, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `login_session`
--
ALTER TABLE `login_session`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `login_session`
--
ALTER TABLE `login_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
