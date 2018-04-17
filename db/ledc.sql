-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: localhost    Database: ledc
-- ------------------------------------------------------
-- Server version	5.6.38

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin_group`
--

DROP TABLE IF EXISTS `admin_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_group` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_group`
--

LOCK TABLES `admin_group` WRITE;
/*!40000 ALTER TABLE `admin_group` DISABLE KEYS */;
INSERT INTO `admin_group` VALUES ('admin','$2y$10$mSR1yxHkbc2vn.HZEbu0Ze.fwUUWe3l7YgjHYcYHo4BCxtSYuOFd.','Administrator','sxjin1103@gmail.com','::1','Super Manager','2018-04-17 11:21:28','unlimited','no'),('kelly','$2y$10$RLSGcxD2w5USQ0bR0iwU3uojwazmoX4IYwyJXpyeEl2bG48FBb/vS','kelly','kelly001@gmail.com','::1','Administrator','2018-04-13 02:05:31','unlimited','no');
/*!40000 ALTER TABLE `admin_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `careers`
--

DROP TABLE IF EXISTS `careers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `careers` (
  `career_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `job_title` varchar(128) DEFAULT NULL,
  `job_desc` varchar(1000) DEFAULT NULL,
  `job_category` varchar(48) DEFAULT NULL,
  `job_image` text NOT NULL,
  PRIMARY KEY (`career_id`),
  KEY `company_id` (`company_id`),
  CONSTRAINT `careers_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company_info` (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `careers`
--

LOCK TABLES `careers` WRITE;
/*!40000 ALTER TABLE `careers` DISABLE KEYS */;
INSERT INTO `careers` VALUES (1,1,'Senior Graphic Designer','You would be working closely with internal teams to complete and creative assets with an intuitive sense of layout and design.','Graphic Designer','image1.jpg'),(2,1,'Senior Web Developer','You are expected to implement efficient, clean code and maintain the highest standard in all of your work.','Web Developer','image2.jpg'),(3,2,'Front End Web Developer','We are looking for a front-end web developer who is motivated to combine the art of design with the art of programming.','Web Developer','image3.jpg'),(4,2,'Junior Project Manager','Currently, we are offering a full-time position with competitive salary, full benefits, the opportunity to travel, education credits and room to grow.','Project Manager','image4.jpg'),(8,3,'Full Stack Developer','You would have the opportunity to work on different projects and teams building video and  ad products, working on the website or our infrastructure.','Developer','image5.jpg'),(9,3,'Development Project Manager','We are looking for someone who can lead various projects while maintaining Diply\'s focus on continuous improvement of our product, codebase, knowledge, and skills.','Project Manager','image6.jpg');
/*!40000 ALTER TABLE `careers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_info`
--

DROP TABLE IF EXISTS `company_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_info` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(128) NOT NULL,
  `company_category` text NOT NULL,
  `company_brief` varchar(1000) DEFAULT NULL,
  `company_latitude` varchar(48) DEFAULT NULL,
  `company_longitude` varchar(48) DEFAULT NULL,
  `address` varchar(256) NOT NULL,
  `postal` varchar(7) NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_info`
--

LOCK TABLES `company_info` WRITE;
/*!40000 ALTER TABLE `company_info` DISABLE KEYS */;
INSERT INTO `company_info` VALUES (1,'Northern','ecommerce agency','Canada\'s leading eCommerce agency, specializing in eCommerce strategy, Magento development, UX design and digital marketing.','1.1233','-1.1222','100 Kings St','N6R 0N2'),(2,'RedRhino','marketing & advertising agency','They are a native app development, website development, integrated marketing and branding agency located in London, Ontario.','2.124','-2.331','909 Queens St','N7B 9RT'),(3,'Diply','social entertainment publisher','Diply.com is a social news and entertainment community dedicated to connecting audiences with the content they love to consume.','','','383 Richmond St, London, ON','N6A 3C4');
/*!40000 ALTER TABLE `company_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `email_sub`
--

DROP TABLE IF EXISTS `email_sub`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `email_sub` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `subscription` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email_sub`
--

LOCK TABLES `email_sub` WRITE;
/*!40000 ALTER TABLE `email_sub` DISABLE KEYS */;
INSERT INTO `email_sub` VALUES (1,'123@test.com','0'),(2,'asd@test.com','0');
/*!40000 ALTER TABLE `email_sub` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lifestyle`
--

DROP TABLE IF EXISTS `lifestyle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lifestyle` (
  `lifestyle_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(128) NOT NULL,
  `lifestyle_title` varchar(128) NOT NULL,
  `lifestyle_image` text NOT NULL,
  `lifestyle_content` varchar(1500) NOT NULL,
  PRIMARY KEY (`lifestyle_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lifestyle`
--

LOCK TABLES `lifestyle` WRITE;
/*!40000 ALTER TABLE `lifestyle` DISABLE KEYS */;
INSERT INTO `lifestyle` VALUES (1,'family fun','East Park','family-fun.jpg','East Park is a unique multi faceted facility centred on an 18 hole executive golf course and water park with picturesque picnic areas. East Park combines various activities including go karts, batting cages driving range, mini golf, indoor rock climbing, bumper cars, jungle gym and arcade games. East Park prides itself on having something for everyone and our goal is that people of all ages can play side by side.'),(2,'food & drink','Toboggan Brewing Co.','food.jpg','The origin of our name isn’t just a trendy ode to Canadian. It is a tip of the toque to our Forest City heritage, which was a tobogganing mecca in the late 1800’s. It’s in this spirit of toboganning, where people from London and area come together to have fun and enjoy locally made beer and food, that we bring you the Toboggan Brewing Company.'),(3,'sports & recreation','Boler Mountain','boler.jpg','Boler Mountain is a not for profit organization governed by a volunteer Board of Directors serving London and area since 1946. Terrain for all ability levels featuring 15 distinct runs served by 3 quad chairlifts and magic carpet lift on our beginner hill with an extensive snowmaking system covering 100% of our trails. Full rental shop and equipment service shop. '),(8,'museums & galleries','Museum London','museums.jpg','For more than 70 years, Museum London has preserved, interpreted and shared the story of London and Londoners through the exhibition of art and artifacts and the presentation of public programs. Museum London is home to 45,000+ regional historical artifacts detailing a fascinating record of London\'s economic achievements, and our citizens\' accomplishments. ');
/*!40000 ALTER TABLE `lifestyle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_attempt`
--

DROP TABLE IF EXISTS `login_attempt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_attempt` (
  `attempt_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_ip` varchar(36) NOT NULL,
  `attempt_counter` int(11) NOT NULL,
  PRIMARY KEY (`attempt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_attempt`
--

LOCK TABLES `login_attempt` WRITE;
/*!40000 ALTER TABLE `login_attempt` DISABLE KEYS */;
INSERT INTO `login_attempt` VALUES (1,'::1',3);
/*!40000 ALTER TABLE `login_attempt` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-17 12:29:40
