-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: localhost    Database: probook
-- ------------------------------------------------------
-- Server version	5.7.24-0ubuntu0.16.04.1

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
-- Table structure for table `ActiveTokens`
--

DROP TABLE IF EXISTS `ActiveTokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ActiveTokens` (
  `user_id` int(11) DEFAULT NULL,
  `token` varchar(300) DEFAULT NULL,
  `login_timestamp` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ActiveTokens`
--

LOCK TABLES `ActiveTokens` WRITE;
/*!40000 ALTER TABLE `ActiveTokens` DISABLE KEYS */;
INSERT INTO `ActiveTokens` VALUES (1,'3141f6a32bc6b73627157967ada18a29',1540459624),(1,'b1131a1accfc54889a18c3d57c89674e',1540460042),(2,'5cdc5921ad8a3d95ba6c4b3002e9b27d',1540460636);
/*!40000 ALTER TABLE `ActiveTokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Books`
--

DROP TABLE IF EXISTS `Books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) DEFAULT NULL,
  `author` varchar(300) DEFAULT NULL,
  `synopsis` varchar(300) DEFAULT NULL,
  `rating` float DEFAULT '0',
  `vote` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Books`
--

LOCK TABLES `Books` WRITE;
/*!40000 ALTER TABLE `Books` DISABLE KEYS */;
INSERT INTO `Books` VALUES (1,'The Communist Manifesto','Karl Marx','The Communist Manifesto is divided into a preamble and four sections, the last of these a short conclusion.',0,0),(2,'The Cold War: A New History','John Lewis Gaddis','The dean of Cold War historians (The New York Times) now presents the definitive account of the global confrontation that dominated the last half of the twentieth century.',0,0),(3,'Cebong vs Onta : Cebong','Goksjer Zali','This books is recommended for you who does not have a choice yet for Indonesia President and want to know more about Mr. Joko Widodo',0,0),(4,'Cebong vs Onta : Onta','Goksjer Zali','This books is recommended for you who does not have a choice yet for Indonesia President and want to know more about Mr. Prabowo Subianto',0,0),(5,'What Makes Indonesia Left Behind','Setya Novanto','A story from the criminal point of view Mr. Setya Novanto, who want to share about the reason why Indonesia left behind from other developed countries such as malaysia, saudi arabia, etc.',0,0),(6,'How I Steal People\'s Money On Indonesia','Setya Novanto','A story from the criminal point of view Mr. Setya Novanto, who want to share about how he become a rich man by stealing Indonesia Money using his power as the head of Indonesia Parlement.',0,0),(7,'How I Create The Biggest Hoax in Indonesia','Ratna Sarumpaaet','This is a story from Ratna Sarumpaet, who got kicked from Prabowo Subianto team because of her biggest hoax in Indonesia.',0,0),(8,'Why I Destroy WTC Tower','Osama Bin Laden','A book about the story of Osama Bin Laden on his way to become the most notorius terrorist in the world by hijacking three american airplane and crash it to the WTC Tower and Pentagon.',0,0),(9,'Guide To Assassinate Arab Journalist','Kingdom of Saudi Arabia','This is a book about assassination plan developed by the Kingdom of Saudi Arabia. They had assassinate their opposition journalist effectively on October 2018.',0,0),(10,'Pretending to Know About Stuff','The Practical Dev','The Practical Dev will tell you about how to pretend to know about stuff to your job interviewer so you can be the king of con-man and tackle your job interview.',0,0),(11,'The Ideological Origins Of Nazi Imperialism','Woodruff D. Smith','This is the end of liberalism era!!. This book will tell you how Nazi Imperialism ideology on 1900s has almost win the World War and How to implement it on this era.',5,1),(12,'Googling the Error Message','The Practical Dev','The Practical Dev will tell you about how to googling your error message,',0,0);
/*!40000 ALTER TABLE `Books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Orders`
--

DROP TABLE IF EXISTS `Orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `is_review` tinyint(1) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `order_timestamp` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Orders`
--

LOCK TABLES `Orders` WRITE;
/*!40000 ALTER TABLE `Orders` DISABLE KEYS */;
INSERT INTO `Orders` VALUES (1,1,0,1,4,1540460068),(2,1,1,11,3,1540460087);
/*!40000 ALTER TABLE `Orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Reviews`
--

DROP TABLE IF EXISTS `Reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rating` float DEFAULT NULL,
  `comment` varchar(500) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `username` varchar(300) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Reviews`
--

LOCK TABLES `Reviews` WRITE;
/*!40000 ALTER TABLE `Reviews` DISABLE KEYS */;
INSERT INTO `Reviews` VALUES (1,5,'This book has open my mind!! World Governments need to change their country\'s ideology to Nazi Imperialism!! HEIL HITLER!! Aufa Fuhrer!! Leben von Aufa, Make Aufa ist ein Vorbild, Aufa ist Konig',11,'misterjoko',1);
/*!40000 ALTER TABLE `Reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phonenumber` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` VALUES (1,'Koko Widodo','misterjoko','2019tetapjokowi@indonesia.com','adbf245ec953b6ba5a29d600a12e4e3c','Rumah Kaesang, Istana Presiden, Jakarta','08169696969'),(2,'Rachel Park','kimmiso','kimmiso@seoulentertainment.com','e7750d4a7fd4c70f46c6da28900df35e','DG Enterprise 105, Seoul, South Korea','081395954095');
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

-- Dump completed on 2018-10-25 16:47:59
