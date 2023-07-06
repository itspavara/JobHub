-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2023 at 04:30 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `applied_job`
--

CREATE TABLE `applied_job` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `job_title` varchar(50) DEFAULT NULL,
  `app_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applied_job`
--

INSERT INTO `applied_job` (`id`, `user_id`, `job_id`, `job_title`, `app_date`) VALUES
(18, 2, 1, NULL, '2023-06-11'),
(24, 1, 1, NULL, '2023-06-11');

-- --------------------------------------------------------

--
-- Table structure for table `cv`
--

CREATE TABLE `cv` (
  `id` int(11) NOT NULL,
  `file_data` longblob NOT NULL,
  `user_id` int(11) NOT NULL,
  `upload_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cv`
--

INSERT INTO `cv` (`id`, `file_data`, `user_id`, `upload_date`) VALUES
(1, 0x5061766172612048656c616d696e612043562e706466, 1, '2023-06-11');

-- --------------------------------------------------------

--
-- Table structure for table `job_vacancy`
--

CREATE TABLE `job_vacancy` (
  `job_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company` varchar(50) NOT NULL,
  `job_title` varchar(50) NOT NULL,
  `job_description` mediumtext NOT NULL,
  `job_type` varchar(50) NOT NULL,
  `job_location` varchar(50) NOT NULL,
  `post_date` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_vacancy`
--

INSERT INTO `job_vacancy` (`job_id`, `user_id`, `company`, `job_title`, `job_description`, `job_type`, `job_location`, `post_date`) VALUES
(3, 1, 'Actum Lab', 'Junior Backend Developer', '<h3>Description:</h3><br>\r\n\r\nAs a backend developer, you will be working on creating innovative solutions and web apps from Actum Lab’s area of expertise on both internal and commercial projects.', 'internship', 'piliyandala', '2023-06-11');

-- --------------------------------------------------------

--
-- Table structure for table `save_job`
--

CREATE TABLE `save_job` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `saved_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `save_job`
--

INSERT INTO `save_job` (`id`, `user_id`, `job_id`, `saved_date`) VALUES
(8, 2, 1, '2023-06-11'),
(18, 1, 3, '2023-06-11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `mobile` int(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `reg_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `first_name`, `address`, `mobile`, `email`, `user_name`, `password`, `reg_date`) VALUES
(1, 'pavara', 'piliyandala', 769761837, 'pavara@gmail.com', 'pavara01', '1231', '2023-06-01'),
(2, 'deesara', 'colombo', 701547893, 'desara@gmail.com', 'deesara01', '1234', '2023-06-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applied_job`
--
ALTER TABLE `applied_job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cv`
--
ALTER TABLE `cv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_vacancy`
--
ALTER TABLE `job_vacancy`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `save_job`
--
ALTER TABLE `save_job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applied_job`
--
ALTER TABLE `applied_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `cv`
--
ALTER TABLE `cv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job_vacancy`
--
ALTER TABLE `job_vacancy`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `save_job`
--
ALTER TABLE `save_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
