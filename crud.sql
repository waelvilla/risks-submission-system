-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2018 at 04:00 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--
CREATE DATABASE IF NOT EXISTS `crud` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `crud`;

-- --------------------------------------------------------

--
-- Table structure for table `risk`
--

CREATE TABLE `risk` (
  `id` int(11) NOT NULL,
  `risk_type` varchar(50) NOT NULL,
  `risk_stand` varchar(50) NOT NULL,
  `risk_cause` varchar(50) NOT NULL,
  `impact_desc` varchar(50) NOT NULL,
  `likelyhood` varchar(50) NOT NULL,
  `likely_bg` varchar(50) NOT NULL,
  `impact` varchar(50) NOT NULL,
  `impact_bg` varchar(50) NOT NULL,
  `risk_score` varchar(50) NOT NULL,
  `unit_manager` varchar(50) NOT NULL,
  `action_plan` varchar(50) NOT NULL,
  `control_score` varchar(50) NOT NULL,
  `cs_bg` varchar(50) NOT NULL,
  `res_score` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `risk`
--

INSERT INTO `risk` (`id`, `risk_type`, `risk_stand`, `risk_cause`, `impact_desc`, `likelyhood`, `likely_bg`, `impact`, `impact_bg`, `risk_score`, `unit_manager`, `action_plan`, `control_score`, `cs_bg`, `res_score`) VALUES
(1, '', 'Teaching load is hindering the research', 'less number of PhD faculty', 'Low research output', '', '', '', '', '3', '', 'df', '', '', '1'),
(4, '', 'qw', 'qwq', 'qw', '3', '', '3', '', '9', '1', 'df', '3', '', '3');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `username`, `password`, `category`) VALUES
(5, 'p', 'p', 'p', '83878c91171338902e0fe0fb97a8c47a', 'admin'),
(14, '', '', 'd', '8277e0910d750195b448797616e091ad', 'user'),
(19, '', '', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user'),
(20, '', '', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(21, '', '', 'a', '0cc175b9c0f1b6a831c399e269772661', 'admin'),
(23, '', '', 'u', '7b774effe4a349c6dd82ad4f4f21d34c', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `risk`
--
ALTER TABLE `risk`
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
-- AUTO_INCREMENT for table `risk`
--
ALTER TABLE `risk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
