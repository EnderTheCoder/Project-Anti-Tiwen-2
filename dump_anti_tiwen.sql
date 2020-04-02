-- MySQL dump 10.13  Distrib 8.0.19, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: anti_tiwen
-- ------------------------------------------------------
-- Server version	8.0.19-0ubuntu0.19.10.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `main_logs`
--

DROP TABLE IF EXISTS `main_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `main_logs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(32) DEFAULT NULL,
  `return_value` text,
  `time` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14327 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `main_logs`
--

LOCK TABLES `main_logs` WRITE;
/*!40000 ALTER TABLE `main_logs` DISABLE KEYS */;
INSERT INTO `main_logs` VALUES (14325,'冯钰荃','<meta http-equiv=\"Content-Type\" content=\"text/html; charset=gb2312\">\r\n\r\n   <script language=Javascript>\r\n   alert(\"上报内容已经保存，返回\")\r\n   window.location =\"xsyq.asp?xm1=冯钰荃\"\r\n   </script>\r\n',1585828630),(14326,'周鹭','<meta http-equiv=\"Content-Type\" content=\"text/html; charset=gb2312\">\r\n\r\n   <script language=Javascript>\r\n   alert(\"上报内容已经保存，返回\")\r\n   window.location =\"xsyq.asp?xm1=周鹭\"\r\n   </script>\r\n',1585828631);
/*!40000 ALTER TABLE `main_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `main_settings`
--

DROP TABLE IF EXISTS `main_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `main_settings` (
  `key` varchar(32) DEFAULT NULL,
  `value` text,
  `info` text,
  UNIQUE KEY `main_settings_key_uindex` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `main_settings`
--

LOCK TABLES `main_settings` WRITE;
/*!40000 ALTER TABLE `main_settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `main_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `main_tasks`
--

DROP TABLE IF EXISTS `main_tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `main_tasks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pid` int DEFAULT NULL,
  `file_name` varchar(32) DEFAULT NULL,
  `task_name` varchar(32) DEFAULT NULL,
  `info` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `main_tasks`
--

LOCK TABLES `main_tasks` WRITE;
/*!40000 ALTER TABLE `main_tasks` DISABLE KEYS */;
INSERT INTO `main_tasks` VALUES (1,4899,'curl.php','test','test');
/*!40000 ALTER TABLE `main_tasks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `name_list`
--

DROP TABLE IF EXISTS `name_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `name_list` (
  `name` varchar(32) DEFAULT NULL,
  `class` varchar(32) DEFAULT NULL,
  `time` varchar(32) DEFAULT NULL,
  `lock` int DEFAULT '0',
  `grade` varchar(32) DEFAULT NULL,
  `tem` varchar(32) DEFAULT NULL,
  UNIQUE KEY `name_list_name_uindex` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `name_list`
--

LOCK TABLES `name_list` WRITE;
/*!40000 ALTER TABLE `name_list` DISABLE KEYS */;
INSERT INTO `name_list` VALUES ('冯钰荃','4班','1585827714',1,'高一','36.5'),('周鹭','4班','1585827714',1,'高一','36.5');
/*!40000 ALTER TABLE `name_list` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-02 20:02:43
