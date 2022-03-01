-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2022 at 10:56 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `google_seo_planner_tools`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_global_volume`
--

CREATE TABLE `tb_global_volume` (
  `_vol_id` int(11) NOT NULL,
  `_keyword` varchar(150) DEFAULT NULL,
  `_country` varchar(250) DEFAULT NULL,
  `_volume` float DEFAULT NULL,
  `volume_country` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_keyword_files`
--

CREATE TABLE `tb_keyword_files` (
  `_id` int(11) NOT NULL,
  `_keyword` varchar(255) DEFAULT NULL,
  `_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_keyword_files`
--

INSERT INTO `tb_keyword_files` (`_id`, `_keyword`, `_url`) VALUES
(1, 'cat', 'D:/AnikProgram/Web_Scraping/storage/cat.html'),
(3, 'demo', 'D:\\AnikProgram\\Web_Scraping\\storage\\demo.html'),
(12, 'youtube', 'D:/AnikProgram/Web_Scraping/storage/youtube.html'),
(13, 'dog', 'D:/AnikProgram/Web_Scraping/storage/dog.html'),
(14, 'facebook', 'D:/AnikProgram/Web_Scraping/storage/faccebook.html');

-- --------------------------------------------------------

--
-- Table structure for table `tb_key_questions`
--

CREATE TABLE `tb_key_questions` (
  `_key_id` int(11) NOT NULL,
  `_search_key` varchar(250) DEFAULT NULL,
  `_key_month_vol` float DEFAULT NULL,
  `_key_total_vol` float DEFAULT NULL,
  `_key_reletd_search` varchar(250) DEFAULT NULL,
  `_reletd_search_vol` float DEFAULT NULL,
  `_reletd_search_kd` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_key_rech_reslt`
--

CREATE TABLE `tb_key_rech_reslt` (
  `_key_id` int(11) NOT NULL,
  `_keyword` varchar(150) DEFAULT NULL,
  `_global_volume` float DEFAULT NULL,
  `_US_volume` float DEFAULT NULL,
  `_CPC` float DEFAULT NULL,
  `_global_kd` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_key_related`
--

CREATE TABLE `tb_key_related` (
  `_key_id` int(11) NOT NULL,
  `_search_key` varchar(250) DEFAULT NULL,
  `_key_month_vol` float DEFAULT NULL,
  `_key_total_vol` float DEFAULT NULL,
  `_key_reletd_search` varchar(250) DEFAULT NULL,
  `_reletd_search_vol` float DEFAULT NULL,
  `_reletd_search_kd` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_key_variations`
--

CREATE TABLE `tb_key_variations` (
  `_key_id` int(11) NOT NULL,
  `_search_key` varchar(250) DEFAULT NULL,
  `_key_month_vol` float DEFAULT NULL,
  `_key_total_vol` float DEFAULT NULL,
  `_key_reletd_search` varchar(250) DEFAULT NULL,
  `_reletd_search_vol` float DEFAULT NULL,
  `_reletd_search_kd` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_search_log`
--

CREATE TABLE `tb_search_log` (
  `_id` int(11) NOT NULL,
  `_keyword` varchar(150) DEFAULT NULL,
  `_user` varchar(150) DEFAULT NULL,
  `_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_search_log`
--

INSERT INTO `tb_search_log` (`_id`, `_keyword`, `_user`, `_stamp`) VALUES
(1, 'facebook', 'admin', '2022-03-01 21:55:45'),
(2, 'cat', 'pinu@againsoft.com', '2022-03-01 21:56:10');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_info`
--

CREATE TABLE `tb_user_info` (
  `id` int(11) NOT NULL,
  `u_name` varchar(150) NOT NULL,
  `u_email` varchar(150) NOT NULL,
  `u_pass` varchar(150) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'USER'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user_info`
--

INSERT INTO `tb_user_info` (`id`, `u_name`, `u_email`, `u_pass`, `type`) VALUES
(1, 'anik', 'pinu@againsoft.com', '12345', 'USER'),
(3, 'SHUVAJIT BHOWMIK', 'jobav41555@geeky83.com', '1234', 'USER'),
(4, 'admin', 'admin', 'admin', 'ADMIN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_global_volume`
--
ALTER TABLE `tb_global_volume`
  ADD PRIMARY KEY (`_vol_id`);

--
-- Indexes for table `tb_keyword_files`
--
ALTER TABLE `tb_keyword_files`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `tb_key_questions`
--
ALTER TABLE `tb_key_questions`
  ADD PRIMARY KEY (`_key_id`);

--
-- Indexes for table `tb_key_rech_reslt`
--
ALTER TABLE `tb_key_rech_reslt`
  ADD PRIMARY KEY (`_key_id`);

--
-- Indexes for table `tb_key_related`
--
ALTER TABLE `tb_key_related`
  ADD PRIMARY KEY (`_key_id`);

--
-- Indexes for table `tb_key_variations`
--
ALTER TABLE `tb_key_variations`
  ADD PRIMARY KEY (`_key_id`);

--
-- Indexes for table `tb_search_log`
--
ALTER TABLE `tb_search_log`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `tb_user_info`
--
ALTER TABLE `tb_user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_global_volume`
--
ALTER TABLE `tb_global_volume`
  MODIFY `_vol_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_keyword_files`
--
ALTER TABLE `tb_keyword_files`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_key_questions`
--
ALTER TABLE `tb_key_questions`
  MODIFY `_key_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_key_rech_reslt`
--
ALTER TABLE `tb_key_rech_reslt`
  MODIFY `_key_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_key_related`
--
ALTER TABLE `tb_key_related`
  MODIFY `_key_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_key_variations`
--
ALTER TABLE `tb_key_variations`
  MODIFY `_key_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_search_log`
--
ALTER TABLE `tb_search_log`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_user_info`
--
ALTER TABLE `tb_user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
