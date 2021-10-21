-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2021 at 11:44 PM
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
(2, 'Subrata', 'Purkait', 'user', 'shubropurkait6@gmail.com', '$2y$10$ygutq6nof1u9wVV/pVQ6xubxNbAH7N6v70yqdjyrH9u1Sww.H0TMq', 0),
(3, 'Subrata', 'Purkait', 'adminji', 'subrop130@gmail.com', '$2y$10$l3RXfqg4hq.ZsOGSdod.pOWzqC4CaDsQ.i7gamewNx629i/Bm/ToS', 1633122860),
(4, 'Subrata', 'Purkait', 'admin', 'subrop230@gmail.com', '$2y$10$V/k9gtEekKoYcpL46jyBGOoZ5lCWSyz/Y34vYTwVZK5zuergUEwte', 1633124173),
(5, 'Subrata', 'Purkait', 'admin', 'subrop330@gmail.com', '$2y$10$HjIW8xJ0qX.b/rZwxjcCSuDFhGZw6j62rnD2wu9gUeTePYorWlttW', 1633124562),
(6, 'Subrata', 'Purkait', 'shubro', 'subrop31@gmail.com', '$2y$10$YwLHNsXekOeZmv2GtSBL4ub/O4eId1aOZVHCQHKJJfiYrEjGFC90G', 1633209321),
(7, 'sdgsrdgf', 'jdfpidfoigo', 'oihoidfhgos', 'odifgisd@kjrng.df', '$2y$10$2yOoeCHbSgDHagJY5RCZYuJr2.pMnrbJdBWXHtt0Eo5Fu2kOusWZK', 1633209707),
(8, 'Subrata', 'Purkait', 'shubroo', 'subrop30@gmail.com', '$2y$10$ygutq6nof1u9wVV/pVQ6xubxNbAH7N6v70yqdjyrH9u1Sww.H0TMq', 1633217650),
(9, 'Subrata', 'Purkait', 'rm1', 'subrop3110@gmail.com', '$2y$10$gSQh0rm/Lxtck9y.ZkHp4.fftVjxE4SaxQKBUmFO3NC0kf1BLX.T.', 1633324591),
(10, 'Subrata', 'Purkait', 'rm', 'subrop3120@gmail.com', '$2y$10$brminR/RRh55okGSMRJmdeZSRtEi0xiaWMlY/5HhsrBzgeVwv1TSO', 1633891136),
(11, 'irfan', 'sayyed', 'irfan', 'sayyedirfan.8818@gmail.com', '$2y$10$/gkGlg.V2TADIeiC/oWaP.Vws6Q7X4GZUmbpuBix5IANOf0XtWinm', 1634498289),
(12, 'Subrata', 'Purkait', 'shubro2', 'shubropurkait2@gmail.com', '$2y$10$7z/bj3o1ippOK1IOgh0lq..EKqo/an.w2KzPimXU.4zCotopEBokm', 1634765615);

-- --------------------------------------------------------

--
-- Table structure for table `email_otp_optout`
--

CREATE TABLE `email_otp_optout` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `email_otp` int(100) NOT NULL,
  `status` enum('Not Verified','Verified') NOT NULL,
  `token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `email_otp_optout`
--

INSERT INTO `email_otp_optout` (`id`, `userid`, `email_otp`, `status`, `token`) VALUES
(16, 11, 532791, 'Not Verified', 'CUZ4LWH4N7DGTFR2'),
(17, 8, 490187, 'Not Verified', '777DASL5Z2S2BFFH'),
(18, 12, 874922, 'Not Verified', 'VP3TUIQ57EX6NTHM');

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
(27, 11, 'frxC2xoISeBbtgbuixbF', 0, 1634500222, 0),
(28, 8, 'TGrhIjScTQHcOo8OzOtk', 0, 1634505064, 0),
(29, 12, 'bhFvO49qIwA6aL12zaVI', 0, 1634765643, 0);

-- --------------------------------------------------------

--
-- Table structure for table `security_ans`
--

CREATE TABLE `security_ans` (
  `id` int(11) NOT NULL,
  `que_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `answer` varchar(200) NOT NULL,
  `status` enum('disable','enable') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `security_ans`
--

INSERT INTO `security_ans` (`id`, `que_id`, `userid`, `answer`, `status`) VALUES
(1, 1, 10, '19081995', 'disable'),
(2, 2, 10, 'joice', 'disable'),
(3, 3, 10, '3idiots', 'disable'),
(4, 4, 10, 'nan', 'disable'),
(5, 5, 10, 'leo', 'disable'),
(6, 1, 8, '19081995', 'disable'),
(7, 2, 8, 'joice', 'disable'),
(8, 3, 8, '3idiots', 'disable'),
(9, 4, 8, 'nan', 'disable'),
(10, 5, 8, 'leo', 'disable'),
(29, 4, 12, 'nan', 'disable'),
(30, 5, 12, 'leo', 'disable'),
(31, 1, 12, '19081995', 'disable'),
(32, 2, 12, 'joice', 'disable'),
(33, 3, 12, '3idiots', 'disable');

-- --------------------------------------------------------

--
-- Table structure for table `security_que`
--

CREATE TABLE `security_que` (
  `id` int(11) NOT NULL,
  `questions` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `security_que`
--

INSERT INTO `security_que` (`id`, `questions`) VALUES
(1, 'What is your date of birth?'),
(2, 'What was your favorite school teacher’s name?'),
(3, 'What’s your favorite movie?'),
(4, 'What was your first car?'),
(5, 'What is your astrological sign?');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `email_otp_optout`
--
ALTER TABLE `email_otp_optout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_session`
--
ALTER TABLE `login_session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `security_ans`
--
ALTER TABLE `security_ans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `security_que`
--
ALTER TABLE `security_que`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `email_otp_optout`
--
ALTER TABLE `email_otp_optout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `login_session`
--
ALTER TABLE `login_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `security_ans`
--
ALTER TABLE `security_ans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `security_que`
--
ALTER TABLE `security_que`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
