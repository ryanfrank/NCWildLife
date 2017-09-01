-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: localhost    Database: NCWildLife
-- ------------------------------------------------------
-- Server version	5.6.35

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
-- Table structure for table `intake`
--

DROP TABLE IF EXISTS `intake`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `intake` (
  `intake_id` int(5) NOT NULL AUTO_INCREMENT,
  `intake_date` date NOT NULL,
  `intake_weight` decimal(5,2) NOT NULL,
  `intake_condition` text,
  `intake_rehabber` int(5) NOT NULL,
  `intake_injury` int(1) NOT NULL,
  `intake_injury_type` varchar(45) DEFAULT NULL,
  `intake_age` int(5) NOT NULL,
  `intake_possetion_time` varchar(45) NOT NULL,
  `intake_fed` int(1) NOT NULL,
  `intake_food_type` varchar(45) DEFAULT NULL,
  `intake_food_delivery` varchar(45) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `animal_id` int(5) NOT NULL,
  `intake_species` int(5) NOT NULL,
  PRIMARY KEY (`intake_id`,`intake_rehabber`),
  KEY `intake_age_idx` (`intake_age`),
  KEY `rehabber_idx` (`intake_rehabber`),
  KEY `animal_idx` (`animal_id`),
  KEY `species_idx` (`intake_species`),
  CONSTRAINT `animal` FOREIGN KEY (`animal_id`) REFERENCES `animal` (`animal_id`),
  CONSTRAINT `intake_age` FOREIGN KEY (`intake_age`) REFERENCES `ages` (`ages_id`),
  CONSTRAINT `rehabber` FOREIGN KEY (`intake_rehabber`) REFERENCES `rehabber` (`rehabber_id`),
  CONSTRAINT `species` FOREIGN KEY (`intake_species`) REFERENCES `species` (`species_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `intake`
--

LOCK TABLES `intake` WRITE;
/*!40000 ALTER TABLE `intake` DISABLE KEYS */;
INSERT INTO `intake` VALUES (1,'2017-08-15',135.00,'Two puncture wounds on left side.',1,1,'Cat Attack',3,'',0,'','','2017-08-15 08:31:32','2017-08-15 13:31:32',8,6),(2,'2017-08-12',113.00,'',2,0,'',4,'',1,'Milk  - cows','Syringe','2017-08-15 08:33:00','2017-08-15 13:33:00',9,5),(3,'2017-08-15',223.00,'',1,0,'',2,'',0,'','','2017-08-15 08:36:55','2017-08-15 13:36:55',10,3);
/*!40000 ALTER TABLE `intake` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-01 18:36:17
