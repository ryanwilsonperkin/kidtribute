-- MySQL dump 10.13  Distrib 5.5.34, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: KidTributeDB
-- ------------------------------------------------------
-- Server version	5.5.34-0ubuntu0.12.04.1

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
-- Table structure for table `Categories`
--

DROP TABLE IF EXISTS `Categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Categories`
--

LOCK TABLES `Categories` WRITE;
/*!40000 ALTER TABLE `Categories` DISABLE KEYS */;
INSERT INTO `Categories` VALUES (1,'math'),(2,'art'),(3,'science'),(4,'physed');
/*!40000 ALTER TABLE `Categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Projects`
--

DROP TABLE IF EXISTS `Projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Projects` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `school_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `imageUrl` text NOT NULL,
  `approved` tinyint(1) NOT NULL,
  PRIMARY KEY (`project_id`),
  KEY `school_id` (`school_id`),
  KEY `teacher_id` (`teacher_id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `Projects_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `Schools` (`school_id`),
  CONSTRAINT `Projects_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `Users` (`user_id`),
  CONSTRAINT `Projects_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `Categories` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Projects`
--

LOCK TABLES `Projects` WRITE;
/*!40000 ALTER TABLE `Projects` DISABLE KEYS */;
INSERT INTO `Projects` VALUES (0,1,1,1,'My Math Experiment','I want to create fun experiments with math','2000-10-10','2000-10-15','myimage',1),(1,1,1,1,'Learning about Pythagoras','Learning about Pythagoras, his life and how he came up with his theorem','2013-11-25','2013-11-30','projectPicture.ca/photo.gif',0),(2,1,1,1,'Lets go to the ROM','going to the best place in the world','2000-10-10','2000-11-11','image',1),(3,1,1,1,'My Math Experiment','I want to create fun experiments with math','0000-00-00','0000-00-00','myimage',0),(4,1,1,1,'My Math Experiment','I want to create fun experiments with math','2000-10-10','2000-10-15','myimage',1),(5,1,1,1,'My Math Experiment','I want to create fun experiments with math','2000-10-10','2000-10-15','myimage',1),(6,1,1,1,'My Math Experiment','I want to create fun experiments with math','2000-10-10','2000-10-15','myimage',1),(7,1,1,1,'My Math Experiment','I want to create fun experiments with math','2000-10-10','2000-10-15','myimage',1),(8,1,1,1,'maproject','madescription','2013-11-02','2055-10-10','null',1),(9,1,1,1,'mystuff','mydescription','2013-11-02','2055-10-10','null',1),(10,1,1,1,'mystuff','mydescription','2013-11-02','2055-10-10','null',1),(11,1,1,1,'mystuff','mydescription','2013-11-02','2055-10-10','null',1),(12,1,1,1,'mystuff','mydescription','2013-11-02','2055-10-10','null',1),(13,1,1,1,'44','asfds','2013-11-02','2055-10-10','null',1),(14,1,1,1,'44','asfds','2013-11-02','2055-10-10','null',1),(15,1,1,2,'I just made this project','This is a description','2013-11-05','2055-10-10','null',1),(16,1,1,2,'I just made this project','This is a description','2013-11-05','2055-10-10','null',1),(17,1,1,2,'tada','A bunch of stuff.','2013-11-27','2055-10-10','null',1),(18,1,1,3,'Anything','It will accomplish something.','2013-11-21','2055-10-10','null',1);
/*!40000 ALTER TABLE `Projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SchoolBoards`
--

DROP TABLE IF EXISTS `SchoolBoards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SchoolBoards` (
  `school_board_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `donationUrl` text NOT NULL,
  PRIMARY KEY (`school_board_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SchoolBoards`
--

LOCK TABLES `SchoolBoards` WRITE;
/*!40000 ALTER TABLE `SchoolBoards` DISABLE KEYS */;
INSERT INTO `SchoolBoards` VALUES (1,'Upper grand district school board','mydonationURL.com');
/*!40000 ALTER TABLE `SchoolBoards` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SchoolTypes`
--

DROP TABLE IF EXISTS `SchoolTypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SchoolTypes` (
  `school_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`school_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SchoolTypes`
--

LOCK TABLES `SchoolTypes` WRITE;
/*!40000 ALTER TABLE `SchoolTypes` DISABLE KEYS */;
INSERT INTO `SchoolTypes` VALUES (1,'High school');
/*!40000 ALTER TABLE `SchoolTypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Schools`
--

DROP TABLE IF EXISTS `Schools`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Schools` (
  `school_id` int(11) NOT NULL AUTO_INCREMENT,
  `school_board_id` int(11) NOT NULL,
  `school_type_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `postal_code` text NOT NULL,
  PRIMARY KEY (`school_id`),
  KEY `school_board_id` (`school_board_id`),
  KEY `school_type_id` (`school_type_id`),
  CONSTRAINT `Schools_ibfk_1` FOREIGN KEY (`school_board_id`) REFERENCES `SchoolBoards` (`school_board_id`),
  CONSTRAINT `Schools_ibfk_2` FOREIGN KEY (`school_type_id`) REFERENCES `SchoolTypes` (`school_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Schools`
--

LOCK TABLES `Schools` WRITE;
/*!40000 ALTER TABLE `Schools` DISABLE KEYS */;
INSERT INTO `Schools` VALUES (1,1,1,'St James','123 addressing lane','Guelph','T1L 3R5');
/*!40000 ALTER TABLE `Schools` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Skills`
--

DROP TABLE IF EXISTS `Skills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Skills` (
  `skill_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`skill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Skills`
--

LOCK TABLES `Skills` WRITE;
/*!40000 ALTER TABLE `Skills` DISABLE KEYS */;
/*!40000 ALTER TABLE `Skills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `UserProjects`
--

DROP TABLE IF EXISTS `UserProjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `UserProjects` (
  `userprojects_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `used_id` int(11) NOT NULL,
  PRIMARY KEY (`userprojects_id`),
  KEY `used_id` (`used_id`),
  KEY `project_id` (`project_id`),
  CONSTRAINT `UserProjects_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `Projects` (`project_id`),
  CONSTRAINT `UserProjects_ibfk_2` FOREIGN KEY (`used_id`) REFERENCES `Users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `UserProjects`
--

LOCK TABLES `UserProjects` WRITE;
/*!40000 ALTER TABLE `UserProjects` DISABLE KEYS */;
INSERT INTO `UserProjects` VALUES (1,1,1),(2,2,1),(3,2,1),(4,3,1),(5,4,1),(6,5,1),(7,2,2),(8,5,1),(9,5,1),(10,5,1);
/*!40000 ALTER TABLE `UserProjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `UserSkills`
--

DROP TABLE IF EXISTS `UserSkills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `UserSkills` (
  `userskill_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  PRIMARY KEY (`userskill_id`),
  KEY `user_id` (`user_id`),
  KEY `skill_id` (`skill_id`),
  CONSTRAINT `UserSkills_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`),
  CONSTRAINT `UserSkills_ibfk_2` FOREIGN KEY (`skill_id`) REFERENCES `Skills` (`skill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `UserSkills`
--

LOCK TABLES `UserSkills` WRITE;
/*!40000 ALTER TABLE `UserSkills` DISABLE KEYS */;
/*!40000 ALTER TABLE `UserSkills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `UserTypes`
--

DROP TABLE IF EXISTS `UserTypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `UserTypes` (
  `user_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`user_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `UserTypes`
--

LOCK TABLES `UserTypes` WRITE;
/*!40000 ALTER TABLE `UserTypes` DISABLE KEYS */;
INSERT INTO `UserTypes` VALUES (1,'teacher'),(2,'community member'),(3,'principal');
/*!40000 ALTER TABLE `UserTypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `school_id` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `name` text NOT NULL,
  `title` text NOT NULL,
  `isVetted` tinyint(1) NOT NULL,
  `bio` text NOT NULL,
  `imageUrl` text NOT NULL,
  `username` text,
  PRIMARY KEY (`user_id`),
  KEY `user_type_id` (`user_type_id`),
  KEY `school_id` (`school_id`),
  CONSTRAINT `Users_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `Schools` (`school_id`),
  CONSTRAINT `Users_ibfk_2` FOREIGN KEY (`user_type_id`) REFERENCES `UserTypes` (`user_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` VALUES (1,1,1,'teacher@schools.ca','password','Bob','Mr.',1,'I am an awesome teacher!','myPictures.ca/bob.png','teacher'),(2,1,2,'rawr@hotmail.com','123abcdeg','Sally','Ms.',1,'I can weld like no other!','pictures','communitymember'),(3,1,3,'principal@email.com','password','Joe','Mr.',1,'Intelligent guy','','principal');
/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-11-27  4:52:33
