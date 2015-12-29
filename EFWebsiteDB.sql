-- MySQL dump 10.13  Distrib 5.6.26, for osx10.6 (x86_64)
--
-- Host: localhost    Database: EF_Website_Database
-- ------------------------------------------------------
-- Server version	5.6.26

--
-- Table structure for table `answer`
--
DROP DATABASE EF_Website_Database;
CREATE DATABASE EF_Website_Database;
USE EF_Website_Database;


CREATE TABLE `answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `text` varchar(10000) DEFAULT NULL,
  `publish_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ;

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `mark` float DEFAULT NULL,
  `factor` FLOAT DEFAULT NULL,
  PRIMARY KEY (`id`)
) ;

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `subject_id`int(11) DEFAULT NULL,
  `text` varchar(10000) DEFAULT NULL,
  `publish_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ;

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ;

--
-- Table structure for table `summary`
--

CREATE TABLE `summary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `file_name` varchar(30) NOT NULL,
  `file_type` varchar(30) NOT NULL,
  `file_size` int(11) NOT NULL,
  `file_content` mediumblob NOT NULL,
  `class` INTEGER DEFAULT NULL,
  PRIMARY KEY (`id`)
) ;

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `class` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ;

alter TABLE answer add FOREIGN KEY (`user_id`) REFERENCES user(id);
alter TABLE answer add FOREIGN KEY (`question_id`) REFERENCES question(id);
alter TABLE grade add FOREIGN KEY (`subject_id`) REFERENCES subject(id);
alter TABLE grade add FOREIGN KEY (`user_id`) REFERENCES user(id);
alter TABLE question add FOREIGN KEY (`user_id`) REFERENCES user(id);
alter TABLE summary add FOREIGN KEY (`user_id`) REFERENCES user(id);
alter TABLE summary add FOREIGN KEY (`subject_id`) REFERENCES subject(id);
alter TABLE question add FOREIGN KEY (`subject_id`) REFERENCES subject(id);