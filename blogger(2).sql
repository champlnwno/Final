-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2017 at 04:49 PM
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
(37, 'test2', 'https://pbs.twimg.com/profile_images/943704172527882240/t7m949LF_bigger.jpg', '123@123', '202cb962ac59075b964b07152d234b70', 'male', 16, '0000-00-00', 2, '0000-00-00 00:00:00'),
(40, 'admin', 'profiles/-112788091_6900399116582334186.jpg', 'admin@admin', '21232f297a57a5a743894a0e4a801fc3', 'male', 123, '0000-00-00', 1, '0000-00-00 00:00:00'),
(41, 'test', 'profiles/92_73_69678-8274074373_2_2905599.jpg', 'test@test.com', '202cb962ac59075b964b07152d234b70', 'female', 123, '0000-00-00', 0, '2017-12-23 12:57:21'),
(42, 'test3', 'http://cliparts101.com/files/255/584403E66798177B2C8372146E9589BF/AwesomeLinux.png', '333@333', '202cb962ac59075b964b07152d234b70', 'male', 33, '0000-00-00', 2, '2017-12-23 13:26:24'),
(43, 'test5', 'http://cliparts101.com/files/255/584403E66798177B2C8372146E9589BF/AwesomeLinux.png', 'test5', '202cb962ac59075b964b07152d234b70', 'male', 18, '0000-00-00', 2, '2017-12-23 13:33:44'),
(44, 'test6', 'http://sguru.org/wp-content/uploads/2017/06/cool-fb-profile-pictures-for-girls-attitude-049eea3fde1451ed63f88fa36582900b_10241.jpg', 'test6@test6', '202cb962ac59075b964b07152d234b70', 'female', 20, '0000-00-00', 2, '2017-12-23 13:37:53'),
(45, 'test4', 'https://i.ytimg.com/vi/ULCG7Cx5Mdg/maxresdefault.jpg', 'test4@test4', '202cb962ac59075b964b07152d234b70', 'female', 30, '0000-00-00', 2, '2017-12-23 13:42:21'),
(46, 'test7', 'http://cliparts101.com/files/255/584403E66798177B2C8372146E9589BF/AwesomeLinux.png', 'test7@hotmail.com', '202cb962ac59075b964b07152d234b70', 'male', 20, '0000-00-00', 2, '2017-12-23 15:24:27'),
(47, ' klao', 'http://cliparts101.com/files/255/584403E66798177B2C8372146E9589BF/AwesomeLinux.png', 'klao@hotmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'male', 15, '0000-00-00', 2, '2017-12-23 16:46:33');

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
(40, 89),
(40, 123),
(40, 135),
(43, 117),
(44, 118),
(44, 120),
(44, 123),
(45, 120),
(46, 122);

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
(37, 44),
(37, 45),
(41, 37),
(41, 40),
(41, 42),
(41, 43),
(41, 45),
(42, 37),
(42, 41),
(43, 41),
(43, 42),
(43, 44),
(44, 37),
(44, 41),
(44, 42),
(44, 43),
(44, 45),
(45, 37),
(45, 43),
(45, 44),
(46, 37);

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
(117, 42, 1, '', '555555555555555555', '2017-12-23 13:26:34'),
(118, 43, 1, '', 'à¸­à¸²à¸à¸²à¸¨à¸«à¸™à¸²à¸§à¸ˆà¸±à¸‡à¹€à¸¥à¸¢', '2017-12-23 13:34:18'),
(119, 43, 1, '', 'à¸«à¸´à¸§à¸‚à¹‰à¸²à¸§à¸”à¹‰à¸§à¸¢', '2017-12-23 13:34:59'),
(120, 44, 1, '', 'à¹€à¸«à¸‡à¸²à¸ˆà¸±à¸‡à¹€à¸¥à¸¢\r\n', '2017-12-23 13:41:13'),
(121, 45, 1, '', 'à¸‰à¸±à¸™à¸„à¸´à¸”à¸–à¸¶à¸‡à¹€à¸˜à¸­à¸ˆà¸±à¸‡', '2017-12-23 13:45:27'),
(122, 37, 1, '', 'à¹à¸žà¹‰à¹†', '2017-12-23 13:46:34'),
(123, 44, 1, '', 'à¹€à¸šà¸·à¹ˆà¸­à¹†', '2017-12-23 21:25:17'),
(135, 40, 1, '', 'à¸à¸³à¸«à¸™à¸”à¸ªà¹ˆà¸‡à¸‡à¸²à¸™ PHP final project\r\nà¸ªà¹ˆà¸‡à¹„à¸¡à¹ˆà¹€à¸à¸´à¸™ 23.55 à¸™.à¸‚à¸­à¸‡à¸„à¸·à¸™à¸§à¸±à¸™à¸—à¸µà¹ˆ 29 à¸˜à¸„.\r\nà¸—à¸²à¸‡ e-mail: ictphp2017@gmail.com\r\nà¹ƒà¸™à¸£à¸¹à¸›à¹à¸šà¸š source code + clip (à¸­à¹ˆà¸²à¸™à¸£à¸²à¸¢à¸¥à¸°à¹€à¸­à¸µà¸¢à¸”à¸•à¹ˆà¸­**)\r\n<br><br>\r\nà¹à¸™à¸šà¸à¸²à¸™à¸‚à¹‰à¸­à¸¡à¸¹à¸¥à¸¡à¸²à¸à¸±à¸š source code à¸žà¸£à¹‰à¸­à¸¡à¸—à¸±à¹‰à¸‡ admin : username-password à¹ƒà¸™à¸£à¸¹à¸›à¹à¸šà¸š textfile à¸«à¸£à¸·à¸­ comment à¹ƒà¸™ coding\r\n<br><br>\r\nà¸œà¸¡à¸ˆà¸°à¸—à¸³à¸à¸²à¸£à¸­à¸±à¸žà¹€à¸”à¸• pdf à¸ªà¸£à¸¸à¸›à¸£à¸²à¸¢à¸Šà¸·à¹ˆà¸­à¸à¸¥à¸¸à¹ˆà¸¡à¸—à¸µà¹ˆà¸ªà¹ˆà¸‡à¸‡à¸²à¸™à¹à¸¥à¹‰à¸§à¸›à¸£à¸°à¸¡à¸²à¸“ 23.00 à¸™.à¸‚à¸­à¸‡à¸—à¸¸à¸à¸§à¸±à¸™à¸„à¸£à¸±à¸š\r\n<br><br>\r\nà¸ªà¸³à¸«à¸£à¸±à¸šà¸à¸¥à¸¸à¹ˆà¸¡à¸—à¸µà¹ˆà¹„à¸¡à¹ˆà¸œà¹ˆà¸²à¸™ 60% à¸—à¸µà¹ˆà¸œà¸¡à¹à¸ˆà¹‰à¸‡à¸§à¹ˆà¸²à¹ƒà¸«à¹‰à¸™à¸³à¹€à¸ªà¸™à¸­à¸‡à¸²à¸™à¸—à¸µà¹ˆà¹€à¸¡à¸·à¸­à¸‡à¸—à¸­à¸‡à¸§à¸±à¸™à¸—à¸µà¹ˆ 3 à¸¡à¸„.à¹ƒà¸«à¹‰à¹„à¸›à¸ªà¹ˆà¸‡à¸‡à¸²à¸™ 100% à¸“ à¸§à¸±à¸™à¸™à¸³à¹€à¸ªà¸™à¸­à¹€à¸¥à¸¢à¸„à¸£à¸±à¸š à¸•à¸±à¸” clip à¸¡à¸²à¹€à¸«à¸¡à¸·à¸­à¸™à¸›à¸à¸•à¸´ à¸ªà¹ˆà¸§à¸™à¸œà¸¹à¹‰à¸—à¸µà¹ˆà¹„à¸¡à¹ˆà¸ªà¸²à¸¡à¸²à¸£à¸–à¸ªà¹ˆà¸‡à¸‡à¸²à¸™à¹ƒà¸™à¸à¸³à¸«à¸™à¸”à¹„à¸”à¹‰à¸ˆà¸°à¸•à¹‰à¸­à¸‡à¸¡à¸²à¸™à¸³à¹€à¸ªà¸™à¸­à¸‡à¸²à¸™ 100% à¹€à¸«à¸¡à¸·à¸­à¸™à¸„à¸™à¸—à¸µà¹ˆà¹„à¸¡à¹ˆà¸œà¹ˆà¸²à¸™ 60%\r\n<br><br>\r\nà¸ªà¹ˆà¸§à¸™à¸à¸¥à¸¸à¹ˆà¸¡à¸—à¸µà¹ˆà¹à¸ˆà¹‰à¸‡à¸œà¸¡à¹„à¸§à¹‰à¹ƒà¸™à¸§à¸±à¸™à¸—à¸µà¹ˆ 27-28 à¸§à¹ˆà¸²à¸ˆà¸°à¸™à¸±à¸”à¸žà¸šà¸—à¸µà¹ˆà¸¨à¸´à¸¥à¸›à¸²à¸à¸£à¸ªà¸™à¸²à¸¡à¸ˆà¸±à¸™à¸—à¸£à¹Œà¹€à¸§à¸¥à¸² 16.30 à¸™.à¸ˆà¸°à¸•à¹‰à¸­à¸‡à¸—à¸³à¸à¸²à¸£à¸•à¸´à¸”à¸•à¹ˆà¸­à¸œà¸¡à¹ƒà¸«à¹‰à¹„à¸”à¹‰à¸à¹ˆà¸­à¸™à¹€à¸§à¸¥à¸² 14.30 à¸™. à¸¡à¸´à¸‰à¸°à¸™à¸±à¹‰à¸™à¸œà¸¡à¹„à¸¡à¹ˆà¸£à¸­à¸™à¸°à¸„à¸£à¸±à¸š', '2017-12-26 22:59:53');

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
  ADD UNIQUE KEY `topic_id_3` (`topic_id`,`comment_id`,`user_id`),
  ADD KEY `topic_id` (`topic_id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `topic_id_2` (`topic_id`,`comment_id`,`user_id`);

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;
--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;
--
-- Constraints for dumped tables
--

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
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `account` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_ibfk_3` FOREIGN KEY (`comment_id`) REFERENCES `comment` (`comment_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
