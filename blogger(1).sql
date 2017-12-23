-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2017 at 07:27 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogger`
--
CREATE DATABASE IF NOT EXISTS `blogger` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `blogger`;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_avatar` text NOT NULL,
  `user_email` text NOT NULL,
  `user_pass` text NOT NULL,
  `user_gender` varchar(20) NOT NULL,
  `user_age` int(3) NOT NULL,
  `user_birthdate` date NOT NULL,
  `user_rule` int(11) NOT NULL,
  `user_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`user_id`, `user_name`, `user_avatar`, `user_email`, `user_pass`, `user_gender`, `user_age`, `user_birthdate`, `user_rule`, `user_datetime`) VALUES
(37, 'test2', 'https://pbs.twimg.com/profile_images/943704172527882240/t7m949LF_bigger.jpg', '123@123', '202cb962ac59075b964b07152d234b70', 'male', 16, '0000-00-00', 0, '0000-00-00 00:00:00'),
(40, 'admin', 'https://pbs.twimg.com/profile_images/824716853989744640/8Fcd0bji.jpg', 'admin@admin', '21232f297a57a5a743894a0e4a801fc3', 'male', 123, '0000-00-00', 1, '0000-00-00 00:00:00'),
(41, 'test', 'http://cliparts101.com/files/255/584403E66798177B2C8372146E9589BF/AwesomeLinux.png', 'test@test.com', '202cb962ac59075b964b07152d234b70', 'female', 123, '0000-00-00', 0, '2017-12-23 12:57:21'),
(42, 'test3', 'http://cliparts101.com/files/255/584403E66798177B2C8372146E9589BF/AwesomeLinux.png', '333@333', '202cb962ac59075b964b07152d234b70', 'male', 33, '0000-00-00', 0, '2017-12-23 13:26:24');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favorite`
--

INSERT INTO `favorite` (`user_id`, `topic_id`) VALUES
(37, 11),
(37, 89),
(40, 89),
(40, 116);

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `user_id` int(11) NOT NULL COMMENT 'ติดตามเขา',
  `user_follower` int(11) NOT NULL COMMENT 'เขาติดตามเรา'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`user_id`, `user_follower`) VALUES
(40, 37),
(40, 41),
(40, 42),
(41, 37),
(42, 37),
(42, 41);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `img_id` int(11) NOT NULL,
  `img_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`img_id`, `img_path`) VALUES
(1, '123.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `topic_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `topic_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `img_id` int(11) NOT NULL,
  `topic_name` text NOT NULL,
  `topic_content` text NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`topic_id`, `user_id`, `img_id`, `topic_name`, `topic_content`, `datetime`) VALUES
(11, 37, 1, '', '4546565\r\n555554545454', '2017-12-23 02:53:38'),
(89, 37, 1, '', 'gggggggg', '2017-12-23 05:27:39'),
(116, 41, 1, '', 'à¸­à¸´à¸­à¸´', '2017-12-23 12:57:33'),
(117, 42, 1, '', '555555555555555555', '2017-12-23 13:26:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD UNIQUE KEY `user_id_2` (`user_id`,`topic_id`),
  ADD UNIQUE KEY `user_id_4` (`user_id`,`topic_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `topic_id` (`topic_id`),
  ADD KEY `user_id_3` (`user_id`,`topic_id`);

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD UNIQUE KEY `user_id_3` (`user_id`,`user_follower`),
  ADD UNIQUE KEY `user_id_4` (`user_id`,`user_follower`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_follower` (`user_follower`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD KEY `topic_id` (`topic_id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`topic_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `img_id` (`img_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`comment_id`) REFERENCES `post` (`comment_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `favorite_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `account` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorite_ibfk_2` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`topic_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `follow`
--
ALTER TABLE `follow`
  ADD CONSTRAINT `follow_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `account` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `follow_ibfk_2` FOREIGN KEY (`user_follower`) REFERENCES `account` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`topic_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `account` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `topic`
--
ALTER TABLE `topic`
  ADD CONSTRAINT `topic_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `account` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `topic_ibfk_2` FOREIGN KEY (`img_id`) REFERENCES `image` (`img_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
