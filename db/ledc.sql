-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 13, 2018 at 08:03 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ledc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_group`
--

DROP TABLE IF EXISTS `admin_group`;
CREATE TABLE IF NOT EXISTS `admin_group` (
  `user_id` varchar(36) NOT NULL,
  `user_pwd` varchar(128) NOT NULL,
  `user_fullname` varchar(36) DEFAULT NULL,
  `user_email` varchar(65) DEFAULT NULL,
  `user_ip` varchar(36) DEFAULT NULL,
  `user_permission` varchar(36) DEFAULT NULL,
  `login_date` datetime DEFAULT NULL,
  `expire_time` varchar(65) DEFAULT NULL,
  `user_first_time_login` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_group`
--

INSERT INTO `admin_group` (`user_id`, `user_pwd`, `user_fullname`, `user_email`, `user_ip`, `user_permission`, `login_date`, `expire_time`, `user_first_time_login`) VALUES
('admin', '$2y$10$mSR1yxHkbc2vn.HZEbu0Ze.fwUUWe3l7YgjHYcYHo4BCxtSYuOFd.', 'Administrator', 'sxjin1103@gmail.com', '::1', 'Super Manager', '2018-04-12 23:55:42', 'unlimited', 'no'),
('kelly', '$2y$10$RLSGcxD2w5USQ0bR0iwU3uojwazmoX4IYwyJXpyeEl2bG48FBb/vS', 'kelly', 'kelly001@gmail.com', '::1', 'Administrator', '2018-04-13 02:05:31', 'unlimited', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

DROP TABLE IF EXISTS `careers`;
CREATE TABLE IF NOT EXISTS `careers` (
  `career_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `job_title` varchar(128) DEFAULT NULL,
  `job_desc` varchar(1000) DEFAULT NULL,
  `job_category` varchar(48) DEFAULT NULL,
  PRIMARY KEY (`career_id`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `careers`
--

INSERT INTO `careers` (`career_id`, `company_id`, `job_title`, `job_desc`, `job_category`) VALUES
(1, 1, 'Senior Graphic Designer', 'You would be working closely with internal teams to complete and creative assets with an intuitive sense of layout and design.', 'Graphic Designer'),
(2, 1, 'Senior Web Developer', 'You are expected to implement efficient, clean code and maintain the highest standard in all of your work.', 'Web Developer'),
(3, 2, 'Front End Web Developer', 'We are looking for a front-end web developer who is motivated to combine the art of design with the art of programming.', 'Web Developer'),
(4, 2, 'Junior Project Manager', 'Currently, we are offering a full-time position with competitive salary, full benefits, the opportunity to travel, education credits and room to grow.', 'Project Manager'),
(5, 1, 'Front End Web Developer', 'combine the art of design with the art of programming.', 'Web Developer'),
(6, 2, 'Middle Project Manager', 'testing', 'Project Manager'),
(7, 1, 'Junior QA', 'Write script to support auto-run software testing.', 'QA');

-- --------------------------------------------------------

--
-- Table structure for table `company_info`
--

DROP TABLE IF EXISTS `company_info`;
CREATE TABLE IF NOT EXISTS `company_info` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(128) NOT NULL,
  `company_brief` varchar(1000) DEFAULT NULL,
  `company_latitude` varchar(48) DEFAULT NULL,
  `company_longitude` varchar(48) DEFAULT NULL,
  `address` varchar(256) NOT NULL,
  `postal` varchar(7) NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_info`
--

INSERT INTO `company_info` (`company_id`, `company_name`, `company_brief`, `company_latitude`, `company_longitude`, `address`, `postal`) VALUES
(1, 'Northen', 'test content', '1.1233', '-1.1222', '100 Kings St', 'N6R 0N2'),
(2, 'RedRhino', 'They are a native app development, website development, integrated marketing and branding agency located in Lodon', '2.124', '-2.331', '909 Queens St', 'N7B 9RT');

-- --------------------------------------------------------

--
-- Table structure for table `email_sub`
--

DROP TABLE IF EXISTS `email_sub`;
CREATE TABLE IF NOT EXISTS `email_sub` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `subscription` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lifestyle`
--

DROP TABLE IF EXISTS `lifestyle`;
CREATE TABLE IF NOT EXISTS `lifestyle` (
  `lifestyle_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(128) NOT NULL,
  `lifestyle_title` varchar(128) NOT NULL,
  `lifestyle_content` varchar(1500) NOT NULL,
  PRIMARY KEY (`lifestyle_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lifestyle`
--

INSERT INTO `lifestyle` (`lifestyle_id`, `category`, `lifestyle_title`, `lifestyle_content`) VALUES
(1, 'FAMILY FUN', 'East-Tec Eraser', 'Completely destroy information stored without your knowledge or approval: Internet history, Web pages and pictures from sites visited on the Internet, unwanted cookies, chatroom conversations, deleted e-mail messages, temporary files, the Windows swap file, the Recycle Bin, previously deleted files, valuable corporate trade secrets, Business plans, personal files, photos or confidential letters, etc.East-Tec Eraser 2005 offers full support for popular browsers (Internet Explorer, Netscape Navigator, America Online, MSN Explorer, Opera), for Peer2Peer applications (Kazaa, Kazaa Lite, iMesh, Napster, Morpheus, Direct Connect, Limewire, Shareaza, etc.), and for other popular programs such as Windows Media Player, RealPlayer, Yahoo Messenger, ICQ, etc. Eraser has an intuitive interface and wizards that guide you through all the necessary steps needed to protect your privacy and sensitive information.Other features include support for custom privacy needs, user-defined erasure methods, command-line parameters, integration with Windows Explorer, and password protection.'),
(2, 'FOOD & DRINK', 'GhostSurf Platinum', 'GhostSurf Platinum ensures your safety online by providing an anonymous, encrypted Internet connection, and GhostSurf stops spyware');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempt`
--

DROP TABLE IF EXISTS `login_attempt`;
CREATE TABLE IF NOT EXISTS `login_attempt` (
  `attempt_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_ip` varchar(36) NOT NULL,
  `attempt_counter` int(11) NOT NULL,
  PRIMARY KEY (`attempt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_attempt`
--

INSERT INTO `login_attempt` (`attempt_id`, `user_ip`, `attempt_counter`) VALUES
(1, '::1', 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `careers`
--
ALTER TABLE `careers`
  ADD CONSTRAINT `careers_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company_info` (`company_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
