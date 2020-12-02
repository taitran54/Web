-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2020 at 04:52 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `classroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(10) NOT NULL,
  `id_profile` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `role`, `id_profile`) VALUES
(1, 'admin', 'roottest', 'admin', 1),
(2, 'teacher', 'roottest', 'teacher', 2),
(3, 'student', 'roottest', 'student', 3),
(4, 'student2', 'roottest', 'teacher', 5),
(5, 'taitest', 'K1bj1oms', 'student', 6),
(8, 'test3', 'roottest', 'student', 9);

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `due` datetime NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `id_class` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `code` varchar(8) NOT NULL,
  `date` datetime NOT NULL,
  `image` varchar(255) NOT NULL,
  `id_teacher` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`, `code`, `date`, `image`, `id_teacher`) VALUES
(16, 'MONTEST', 'Yxe57UB', '2020-11-30 17:56:35', 'uploads/Picture1.jpg', 2),
(17, 'Mon2', '6LTuPGS', '2020-12-02 22:31:25', 'uploads/Rainbow6.jpg', 2),
(18, 'MonTest', 'gmUZxKA', '2020-12-02 22:40:13', 'uploads/Picture1.jpg', 2),
(19, 'MonTest', 'gmUZxKA', '2020-12-02 22:40:49', 'uploads/Picture1.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `id_status` int(11) NOT NULL,
  `id_account` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `date`, `description`, `id_status`, `id_account`) VALUES
(1, '2020-12-02 17:14:19', 'Hello', 24, 2),
(3, '2020-12-02 20:21:51', 'alo', 24, 2);

-- --------------------------------------------------------

--
-- Table structure for table `joining`
--

CREATE TABLE `joining` (
  `id_class` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `approval` int(1) NOT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `joining`
--

INSERT INTO `joining` (`id_class`, `id_account`, `approval`, `date`) VALUES
(16, 2, 1, NULL),
(16, 3, 1, NULL),
(16, 5, 1, NULL),
(17, 2, 1, NULL),
(18, 2, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(10) NOT NULL,
  `birth` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `name`, `address`, `phone`, `birth`, `email`, `image`) VALUES
(1, 'Quản Trị', 'Local', '0000000001', '2020-01-01', 'admin@local.com', 'uploads/avatar/download.jpg'),
(2, 'Giáo Viên', 'Local', '0000000002', '2020-01-02', 'teacher@local.com', 'uploads/avatar/default.png'),
(3, 'Sinh Viên', 'Local', '0000000003', '2020-01-03', 'student@local.com', 'uploads/avatar/download.jpg'),
(5, 'Test', 'Local', '0123412312', '2020-11-17', 'test@local.com', 'uploads/avatar/download.jpg'),
(6, 'Tran Nhan Tai', 'Local', '0123412312', '2020-11-11', 'taitest0504@gmail.com', 'uploads/avatar/60031f112d30ed96bde76d40b5b263dc.jpg'),
(9, 'new test account', 'Local', '0123456789', '2020-11-03', 'myemail@local.com', 'uploads/avatar/hp1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `resetpass`
--

CREATE TABLE `resetpass` (
  `token` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `description` text CHARACTER SET utf8 DEFAULT NULL,
  `id_class` int(11) NOT NULL,
  `id_account` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `date`, `description`, `id_class`, `id_account`) VALUES
(21, '2020-11-30 22:17:51', 'alo', 16, 3),
(22, '2020-11-30 22:18:34', 'alo', 16, 3),
(23, '2020-11-30 22:20:40', 'alo', 16, 3),
(24, '2020-11-30 22:21:11', 'alo', 16, 3),
(31, '2020-12-02 20:18:38', 'Hi my class', 16, 3),
(32, '2020-12-02 20:21:40', 'Hello my freind', 16, 2);

-- --------------------------------------------------------

--
-- Table structure for table `submitfile`
--

CREATE TABLE `submitfile` (
  `id` int(11) NOT NULL,
  `target_dir` varchar(255) NOT NULL,
  `id_account` int(11) NOT NULL,
  `id_assignment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `uploadfile`
--

CREATE TABLE `uploadfile` (
  `id` int(11) NOT NULL,
  `target_dir` varchar(255) NOT NULL,
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uploadfile`
--

INSERT INTO `uploadfile` (`id`, `target_dir`, `id_status`) VALUES
(1, 'uploads/submit', 21),
(2, 'uploads/submit', 22),
(3, 'uploads/submitPhân tích bài thơ.docx', 23),
(4, 'uploads/submit/Phân tích bài thơ.docx', 24);

-- --------------------------------------------------------

--
-- Table structure for table `uploadfileassignment`
--

CREATE TABLE `uploadfileassignment` (
  `id` int(11) NOT NULL,
  `target_dir` varchar(255) NOT NULL,
  `id_assignment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_profile` (`id_profile`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_class` (`id_class`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_teacher` (`id_teacher`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_status` (`id_status`),
  ADD KEY `id_account` (`id_account`);

--
-- Indexes for table `joining`
--
ALTER TABLE `joining`
  ADD PRIMARY KEY (`id_class`,`id_account`),
  ADD KEY `id_account` (`id_account`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resetpass`
--
ALTER TABLE `resetpass`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_class` (`id_class`),
  ADD KEY `id_account` (`id_account`);

--
-- Indexes for table `submitfile`
--
ALTER TABLE `submitfile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_account` (`id_account`),
  ADD KEY `id_assignment` (`id_assignment`);

--
-- Indexes for table `uploadfile`
--
ALTER TABLE `uploadfile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_status` (`id_status`);

--
-- Indexes for table `uploadfileassignment`
--
ALTER TABLE `uploadfileassignment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_assignment` (`id_assignment`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `submitfile`
--
ALTER TABLE `submitfile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uploadfile`
--
ALTER TABLE `uploadfile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `uploadfileassignment`
--
ALTER TABLE `uploadfileassignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`id_profile`) REFERENCES `profile` (`id`);

--
-- Constraints for table `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `assignment_ibfk_1` FOREIGN KEY (`id_class`) REFERENCES `class` (`id`);

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`id_teacher`) REFERENCES `account` (`id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`id_account`) REFERENCES `account` (`id`);

--
-- Constraints for table `joining`
--
ALTER TABLE `joining`
  ADD CONSTRAINT `joining_ibfk_1` FOREIGN KEY (`id_class`) REFERENCES `class` (`id`),
  ADD CONSTRAINT `joining_ibfk_2` FOREIGN KEY (`id_account`) REFERENCES `account` (`id`);

--
-- Constraints for table `status`
--
ALTER TABLE `status`
  ADD CONSTRAINT `status_ibfk_1` FOREIGN KEY (`id_class`) REFERENCES `class` (`id`),
  ADD CONSTRAINT `status_ibfk_2` FOREIGN KEY (`id_account`) REFERENCES `account` (`id`);

--
-- Constraints for table `submitfile`
--
ALTER TABLE `submitfile`
  ADD CONSTRAINT `submitfile_ibfk_1` FOREIGN KEY (`id_account`) REFERENCES `account` (`id`),
  ADD CONSTRAINT `submitfile_ibfk_2` FOREIGN KEY (`id_assignment`) REFERENCES `assignment` (`id`);

--
-- Constraints for table `uploadfile`
--
ALTER TABLE `uploadfile`
  ADD CONSTRAINT `uploadfile_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `status` (`id`);

--
-- Constraints for table `uploadfileassignment`
--
ALTER TABLE `uploadfileassignment`
  ADD CONSTRAINT `uploadfileassignment_ibfk_1` FOREIGN KEY (`id_assignment`) REFERENCES `assignment` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
