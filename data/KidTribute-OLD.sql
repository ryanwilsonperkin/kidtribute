-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host: 97.74.31.16
-- Generation Time: Nov 26, 2013 at 08:46 AM
-- Server version: 5.0.96
-- PHP Version: 5.1.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `KidTributeDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `Categories`
--

CREATE TABLE `Categories` (
  `category_id` int(11) NOT NULL auto_increment,
  `name` text NOT NULL,
  PRIMARY KEY  (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Categories`
--

INSERT INTO `Categories` VALUES(1, 'math');

-- --------------------------------------------------------

--
-- Table structure for table `Projects`
--

CREATE TABLE `Projects` (
  `project_id` int(11) NOT NULL auto_increment,
  `school_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `imageUrl` text NOT NULL,
  `approved` tinyint(1) NOT NULL,
  PRIMARY KEY  (`project_id`),
  KEY `school_id` (`school_id`),
  KEY `teacher_id` (`teacher_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `Projects`
--

INSERT INTO `Projects` VALUES(0, 1, 1, 1, 'My Math Experiment', 'I want to create fun experiments with math', '2000-10-10', '2000-10-15', 'myimage', 1);
INSERT INTO `Projects` VALUES(1, 1, 1, 1, 'Learning about Pythagoras', 'Learning about Pythagoras, his life and how he came up with his theorem', '2013-11-25', '2013-11-30', 'projectPicture.ca/photo.gif', 0);
INSERT INTO `Projects` VALUES(2, 1, 1, 1, 'Lets go to the ROM', 'going to the best place in the world', '2000-10-10', '2000-11-11', 'image', 1);
INSERT INTO `Projects` VALUES(3, 1, 1, 1, 'My Math Experiment', 'I want to create fun experiments with math', '0000-00-00', '0000-00-00', 'myimage', 1);
INSERT INTO `Projects` VALUES(4, 1, 1, 1, 'My Math Experiment', 'I want to create fun experiments with math', '2000-10-10', '2000-10-15', 'myimage', 1);
INSERT INTO `Projects` VALUES(5, 1, 1, 1, 'My Math Experiment', 'I want to create fun experiments with math', '2000-10-10', '2000-10-15', 'myimage', 1);
INSERT INTO `Projects` VALUES(6, 1, 1, 1, 'My Math Experiment', 'I want to create fun experiments with math', '2000-10-10', '2000-10-15', 'myimage', 1);
INSERT INTO `Projects` VALUES(7, 1, 1, 1, 'My Math Experiment', 'I want to create fun experiments with math', '2000-10-10', '2000-10-15', 'myimage', 1);

-- --------------------------------------------------------

--
-- Table structure for table `SchoolBoards`
--

CREATE TABLE `SchoolBoards` (
  `school_board_id` int(11) NOT NULL auto_increment,
  `name` text NOT NULL,
  `donationUrl` text NOT NULL,
  PRIMARY KEY  (`school_board_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `SchoolBoards`
--

INSERT INTO `SchoolBoards` VALUES(1, 'Upper grand district school board', 'mydonationURL.com');

-- --------------------------------------------------------

--
-- Table structure for table `Schools`
--

CREATE TABLE `Schools` (
  `school_id` int(11) NOT NULL auto_increment,
  `school_board_id` int(11) NOT NULL,
  `school_type_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `postal_code` text NOT NULL,
  PRIMARY KEY  (`school_id`),
  KEY `school_board_id` (`school_board_id`),
  KEY `school_type_id` (`school_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Schools`
--

INSERT INTO `Schools` VALUES(1, 1, 1, 'St James', '123 addressing lane', 'Guelph', 'T1L 3R5');

-- --------------------------------------------------------

--
-- Table structure for table `SchoolTypes`
--

CREATE TABLE `SchoolTypes` (
  `school_type_id` int(11) NOT NULL auto_increment,
  `name` text NOT NULL,
  PRIMARY KEY  (`school_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `SchoolTypes`
--

INSERT INTO `SchoolTypes` VALUES(1, 'High school');

-- --------------------------------------------------------

--
-- Table structure for table `Skills`
--

CREATE TABLE `Skills` (
  `skill_id` int(11) NOT NULL auto_increment,
  `name` text NOT NULL,
  PRIMARY KEY  (`skill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `Skills`
--


-- --------------------------------------------------------

--
-- Table structure for table `UserProjects`
--

CREATE TABLE `UserProjects` (
  `userprojects_id` int(11) NOT NULL auto_increment,
  `project_id` int(11) NOT NULL,
  `used_id` int(11) NOT NULL,
  PRIMARY KEY  (`userprojects_id`),
  KEY `used_id` (`used_id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `UserProjects`
--

INSERT INTO `UserProjects` VALUES(1, 1, 1);
INSERT INTO `UserProjects` VALUES(2, 2, 1);
INSERT INTO `UserProjects` VALUES(3, 2, 1);
INSERT INTO `UserProjects` VALUES(4, 3, 1);
INSERT INTO `UserProjects` VALUES(5, 4, 1);
INSERT INTO `UserProjects` VALUES(6, 5, 1);
INSERT INTO `UserProjects` VALUES(7, 2, 2);
INSERT INTO `UserProjects` VALUES(8, 5, 1);
INSERT INTO `UserProjects` VALUES(9, 5, 1);
INSERT INTO `UserProjects` VALUES(10, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `user_id` int(11) NOT NULL auto_increment,
  `school_id` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `name` text NOT NULL,
  `title` text NOT NULL,
  `isVetted` tinyint(1) NOT NULL,
  `bio` text NOT NULL,
  `imageUrl` text NOT NULL,
  PRIMARY KEY  (`user_id`),
  KEY `user_type_id` (`user_type_id`),
  KEY `school_id` (`school_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` VALUES(1, 1, 1, 'teacher@schools.ca', 'password', 'Bob', 'Mr.', 1, 'I am an awesome teacher!', 'myPictures.ca/bob.png');
INSERT INTO `Users` VALUES(2, 1, 2, 'rawr@hotmail.com', '123abcdeg', 'Sally', 'Ms.', 1, 'I can weld like no other!', 'pictures');

-- --------------------------------------------------------

--
-- Table structure for table `UserSkills`
--

CREATE TABLE `UserSkills` (
  `userskill_id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  PRIMARY KEY  (`userskill_id`),
  KEY `user_id` (`user_id`),
  KEY `skill_id` (`skill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `UserSkills`
--


-- --------------------------------------------------------

--
-- Table structure for table `UserTypes`
--

CREATE TABLE `UserTypes` (
  `user_type_id` int(11) NOT NULL auto_increment,
  `name` text NOT NULL,
  PRIMARY KEY  (`user_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `UserTypes`
--

INSERT INTO `UserTypes` VALUES(1, 'Teacher');
INSERT INTO `UserTypes` VALUES(2, 'Community Member');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Projects`
--
ALTER TABLE `Projects`
  ADD CONSTRAINT `Projects_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `Schools` (`school_id`),
  ADD CONSTRAINT `Projects_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `Users` (`user_id`),
  ADD CONSTRAINT `Projects_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `Categories` (`category_id`);

--
-- Constraints for table `Schools`
--
ALTER TABLE `Schools`
  ADD CONSTRAINT `Schools_ibfk_2` FOREIGN KEY (`school_type_id`) REFERENCES `SchoolTypes` (`school_type_id`),
  ADD CONSTRAINT `Schools_ibfk_1` FOREIGN KEY (`school_board_id`) REFERENCES `SchoolBoards` (`school_board_id`);

--
-- Constraints for table `UserProjects`
--
ALTER TABLE `UserProjects`
  ADD CONSTRAINT `UserProjects_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `Projects` (`project_id`),
  ADD CONSTRAINT `UserProjects_ibfk_2` FOREIGN KEY (`used_id`) REFERENCES `Users` (`user_id`);

--
-- Constraints for table `Users`
--
ALTER TABLE `Users`
  ADD CONSTRAINT `Users_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `Schools` (`school_id`),
  ADD CONSTRAINT `Users_ibfk_2` FOREIGN KEY (`user_type_id`) REFERENCES `UserTypes` (`user_type_id`);

--
-- Constraints for table `UserSkills`
--
ALTER TABLE `UserSkills`
  ADD CONSTRAINT `UserSkills_ibfk_2` FOREIGN KEY (`skill_id`) REFERENCES `Skills` (`skill_id`),
  ADD CONSTRAINT `UserSkills_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`);
