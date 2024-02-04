-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: reean
-- ------------------------------------------------------
-- Server version	8.0.30

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
-- Table structure for table `about`
--

DROP TABLE IF EXISTS `about`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `about` (
  `idabout` int NOT NULL AUTO_INCREMENT,
  `idprofile` int NOT NULL,
  `body_text` longtext,
  `status` enum('active','nonactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`idabout`),
  KEY `about_FK` (`idprofile`),
  CONSTRAINT `about_FK` FOREIGN KEY (`idprofile`) REFERENCES `profile` (`idprofile`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `about`
--

LOCK TABLES `about` WRITE;
/*!40000 ALTER TABLE `about` DISABLE KEYS */;
INSERT INTO `about` VALUES (6,1,'Seorang Full-Stack Web Developer yang berpengalaman dengan keahlian dalam merancang, mengembangkan, dan memelihara aplikasi web. Memiliki pengetahuan yang kuat tentang bahasa pemrograman, kerangka kerja, dan teknologi terkini yang diperlukan dalam pembuatan website yang interaktif dan responsif. Kreatif, berorientasi pada detail, dan memiliki kemampuan untuk bekerja dalam tim','active');
/*!40000 ALTER TABLE `about` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `accounts` (
  `idaccounts` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idaccounts`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` VALUES (1,'reean123','$2y$10$c02LFE9aDndChXNZTxSO.OaHGjQYppFt9EqTjfgGAczEcELxqdriK','administrator','2023-09-14 02:32:42');
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doing`
--

DROP TABLE IF EXISTS `doing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doing` (
  `iddoing` int NOT NULL AUTO_INCREMENT,
  `idprofile` int NOT NULL,
  `skills` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `icons` varchar(100) DEFAULT NULL,
  `status` enum('active','nonactive') DEFAULT NULL,
  PRIMARY KEY (`iddoing`),
  KEY `doing_FK` (`idprofile`),
  CONSTRAINT `doing_FK` FOREIGN KEY (`idprofile`) REFERENCES `profile` (`idprofile`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doing`
--

LOCK TABLES `doing` WRITE;
/*!40000 ALTER TABLE `doing` DISABLE KEYS */;
INSERT INTO `doing` VALUES (20,1,'database administrator','40dc9e43e64b99b6d0e6a1be2dbc27d4.svg','active'),(21,1,'photography','05ec3c29170add8f7d228423802e3a51.svg','active'),(22,1,'ui/ux designer','a224e346f9679a3c4df568be4471c0c4.svg','active'),(23,1,'website development','603c851133469911730b0d9a64d2be62.svg','active');
/*!40000 ALTER TABLE `doing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `education`
--

DROP TABLE IF EXISTS `education`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `education` (
  `ideducation` int NOT NULL AUTO_INCREMENT,
  `idprofile` int DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `description` longtext,
  `status` enum('active','nonactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`ideducation`),
  KEY `education_FK` (`idprofile`),
  CONSTRAINT `education_FK` FOREIGN KEY (`idprofile`) REFERENCES `profile` (`idprofile`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `education`
--

LOCK TABLES `education` WRITE;
/*!40000 ALTER TABLE `education` DISABLE KEYS */;
INSERT INTO `education` VALUES (5,1,'SMKS Taman Harapan','2017-10-01','2019-05-01','multimedia','active'),(6,1,'Institut Teknologi Telkom Purwokerto','2020-10-01','2023-10-30','software engineering','active'),(7,1,'PT Arkatama Multi Solusindo','2020-10-01','2020-12-31','full-stack web development','active');
/*!40000 ALTER TABLE `education` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `images` (
  `idimages` int NOT NULL AUTO_INCREMENT,
  `name` text,
  `idprojects` int DEFAULT NULL,
  PRIMARY KEY (`idimages`),
  KEY `images_FK` (`idprojects`),
  CONSTRAINT `images_FK` FOREIGN KEY (`idprojects`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organization`
--

DROP TABLE IF EXISTS `organization`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organization` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idprofile` int NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `description` text,
  `status` enum('active','nonactive') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `organization_FK` (`idprofile`),
  CONSTRAINT `organization_FK` FOREIGN KEY (`idprofile`) REFERENCES `profile` (`idprofile`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organization`
--

LOCK TABLES `organization` WRITE;
/*!40000 ALTER TABLE `organization` DISABLE KEYS */;
INSERT INTO `organization` VALUES (1,1,'todays 2022','2020-08-01','2020-09-10','New student orientation activities on the campus Institut Teknologi Telkom Purwokerto.','active'),(2,1,'Incubix (Inkubasi bisnis, karya seni dan teknologi)','2022-09-01','2023-09-01','Head of the INCUBIX (business incubation, Art and Technology) Information Media division, centered at the Institut Teknologi Telkom Purwokerto is a community that becomes a student facilitator to add skills and knowledge so that students become sufficiently competitive.','active'),(3,1,'Google DSC IT Telkom Purwokerto','2022-10-01','2023-10-01','A community at Institut Teknologi Telkom Purwokerto supported by Google Developers that helps developers and tech-savvy people to learn, connect, and solve local problems with technology.','active');
/*!40000 ALTER TABLE `organization` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profile` (
  `idprofile` int NOT NULL AUTO_INCREMENT,
  `idaccounts` int NOT NULL,
  `first_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `last_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `photo_profile` varchar(100) DEFAULT NULL,
  `jobdesk` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_hp` varchar(100) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `specialist` text,
  PRIMARY KEY (`idprofile`),
  KEY `profile_FK` (`idaccounts`),
  CONSTRAINT `profile_FK` FOREIGN KEY (`idaccounts`) REFERENCES `accounts` (`idaccounts`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile`
--

LOCK TABLES `profile` WRITE;
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;
INSERT INTO `profile` VALUES (1,1,'raihan','febriyansah','69e0174d9ef3704d463122a0a87c0a84.png','full-stack web development','raihanfebriyansahh@gmail.com','89517721586','2000-02-07','bekasi, indonesia','full-stack web development');
/*!40000 ALTER TABLE `profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `projects` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idprofile` int NOT NULL,
  `idimages` int NOT NULL,
  `name` text,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  KEY `Projects_FK` (`idprofile`),
  CONSTRAINT `Projects_FK` FOREIGN KEY (`idprofile`) REFERENCES `profile` (`idprofile`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `testimonials` (
  `idtestimonials` int NOT NULL AUTO_INCREMENT,
  `idprofile` int NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `images` varchar(100) DEFAULT NULL,
  `komentar` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `status` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idtestimonials`),
  KEY `NewTable_FK` (`idprofile`),
  CONSTRAINT `NewTable_FK` FOREIGN KEY (`idprofile`) REFERENCES `profile` (`idprofile`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonials`
--

LOCK TABLES `testimonials` WRITE;
/*!40000 ALTER TABLE `testimonials` DISABLE KEYS */;
INSERT INTO `testimonials` VALUES (4,1,'ahmad afif wildan','b426dade87a1a00fb88e114d65348a83.jpg','Tak pernah terbayangkan sebelumnya bahwa website bisnis saya bisa terlihat begitu profesional! Terima kasih kepada tim yang luar biasa ini atas desain yang kreatif dan fungsional. Prosesnya lancar dan hasil akhirnya melebihi ekspektasi saya. Saya sangat merekomendasikan jasa pembuatan website ini! Tak pernah terbayangkan sebelumnya bahwa website bisnis saya bisa terlihat begitu profesional! Terima kasih kepada tim yang luar biasa ini atas desain yang kreatif dan fungsional. Prosesnya lancar dan hasil akhirnya melebihi ekspektasi saya. Saya sangat merekomendasikan jasa pembuatan website ini! Tak pernah terbayangkan sebelumnya bahwa website bisnis saya bisa terlihat begitu profesional! Terima kasih kepada tim yang luar biasa ini atas desain yang kreatif dan fungsional. Prosesnya lancar dan hasil akhirnya melebihi ekspektasi saya. Saya sangat merekomendasikan jasa pembuatan website ini! Tak pernah terbayangkan sebelumnya bahwa website bisnis saya bisa terlihat begitu profesional! Terima kasih kepada tim yang luar biasa ini atas desain yang kreatif dan fungsional. Prosesnya lancar dan hasil akhirnya melebihi ekspektasi saya. Saya sangat merekomendasikan jasa pembuatan website ini! ','active','2023-10-28 07:05:01',NULL);
/*!40000 ALTER TABLE `testimonials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `work`
--

DROP TABLE IF EXISTS `work`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `work` (
  `idwork` int NOT NULL AUTO_INCREMENT,
  `idprofile` int DEFAULT NULL,
  `name` text,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `description` text,
  `position` varchar(100) DEFAULT NULL,
  `status` enum('active','nonactive') DEFAULT NULL,
  PRIMARY KEY (`idwork`),
  KEY `work_FK` (`idprofile`),
  CONSTRAINT `work_FK` FOREIGN KEY (`idprofile`) REFERENCES `profile` (`idprofile`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `work`
--

LOCK TABLES `work` WRITE;
/*!40000 ALTER TABLE `work` DISABLE KEYS */;
INSERT INTO `work` VALUES (2,1,'PT dayamitra telekomunikasi tbk','2019-11-01','2020-03-30','PT Dayamitra Telekomunikasi Tbk. Or Mitratel is a subsidiary of PT Telkom Indonesia (Persero) Tbk engaged in telecommunications infrastructure.','Internship','active'),(3,1,'my ride indonesia','2020-03-01','2020-05-30','A startup under the auspices of PT Dayamitra Telekomunikasi, the startup runs an application called MyRide which is useful for riders, routine maintenance and recommendations for workshops and spare parts, easier, faster and more precise.','database administrator','active'),(4,1,'Institut Teknologi Telkom Purwokerto','2023-10-01','2024-02-23','asisten praktikum di kampus institut teknologi telkom purwokerto dengan mengajar mata kuliah Desain dan Pemrograman Web 2, mengajar materi terkait penggunaan framework laravel hingga menjadi sebuah website yang utuh.','asisten praktikum','active');
/*!40000 ALTER TABLE `work` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'reean'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-02-04 18:32:08
