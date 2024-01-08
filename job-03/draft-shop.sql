-- MariaDB dump 10.19  Distrib 10.6.12-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: draft-shop
-- ------------------------------------------------------
-- Server version	10.6.12-MariaDB-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Chemises','Catégorie de chemises pour hommes et femmes','2024-01-08 16:43:01','2024-01-08 16:43:01'),(2,'Pantalons','Catégorie de pantalons pour hommes et femmes','2024-01-08 16:43:01','2024-01-08 16:43:01'),(3,'Robes','Catégorie de robes pour femmes','2024-01-08 16:43:01','2024-01-08 16:43:01'),(4,'Chaussures','Catégorie de chaussures pour hommes et femmes','2024-01-08 16:43:01','2024-01-08 16:43:01');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `photos` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`photos`)),
  `price` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'Chemise à rayures','[\"stripe_image1.jpg\", \"stripe_image2.jpg\", \"stripe_image3.jpg\"]',2999,'Chemise élégante à rayures pour hommes',20,'2024-01-08 16:51:12','2024-01-08 16:51:12',1),(2,'Chemisier en soie','[\"silk_blouse1.jpg\", \"silk_blouse2.jpg\"]',3999,'Chemisier en soie pour femmes',15,'2024-01-08 16:51:12','2024-01-08 16:51:12',1),(3,'Pantalon chino','[\"chino_pants1.jpg\", \"chino_pants2.jpg\"]',3499,'Pantalon chino décontracté pour hommes',25,'2024-01-08 16:51:12','2024-01-08 16:51:12',2),(4,'Jean slim','[\"slim_jeans1.jpg\", \"slim_jeans2.jpg\"]',4499,'Jean slim pour femmes',18,'2024-01-08 16:51:12','2024-01-08 16:51:12',2),(5,'Robe de cocktail','[\"cocktail_dress1.jpg\", \"cocktail_dress2.jpg\"]',5999,'Robe de cocktail élégante pour femmes',12,'2024-01-08 16:51:12','2024-01-08 16:51:12',3),(6,'Robe d\'été','[\"summer_dress1.jpg\", \"summer_dress2.jpg\"]',4999,'Robe d\'été légère pour femmes',20,'2024-01-08 16:51:12','2024-01-08 16:51:12',3),(7,'Chaussures de sport','[\"sport_shoes1.jpg\", \"sport_shoes2.jpg\"]',7999,'Chaussures de sport confortables pour hommes et femmes',15,'2024-01-08 16:51:12','2024-01-08 16:51:12',4),(8,'Escarpins classiques','[\"classic_heels1.jpg\", \"classic_heels2.jpg\"]',6999,'Escarpins classiques pour femmes',10,'2024-01-08 16:51:12','2024-01-08 16:51:12',4);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-08 16:53:17
