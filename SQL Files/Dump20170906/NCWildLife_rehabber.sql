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
-- Table structure for table `rehabber`
--

DROP TABLE IF EXISTS `rehabber`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rehabber` (
  `rehabber_id` int(5) NOT NULL AUTO_INCREMENT,
  `rehabber_first_name` varchar(45) NOT NULL,
  `rehabber_last_name` varchar(45) NOT NULL,
  `rehabber_street` varchar(45) NOT NULL,
  `rehabber_city` varchar(45) NOT NULL,
  `rehabber_state` int(2) NOT NULL,
  `rehabber_zip` int(9) NOT NULL,
  `rehabber_email` varchar(45) NOT NULL,
  `rehabber_phone` varchar(45) NOT NULL,
  `rehabber_license` int(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `rehabber_volunteer` int(1) NOT NULL,
  `rehabber_county` int(11) NOT NULL,
  `rehabber_active` int(1) NOT NULL,
  PRIMARY KEY (`rehabber_id`),
  KEY `state_idx` (`rehabber_state`),
  KEY `county_key_idx` (`rehabber_county`),
  CONSTRAINT `county_key` FOREIGN KEY (`rehabber_county`) REFERENCES `counties` (`county_id`),
  CONSTRAINT `state` FOREIGN KEY (`rehabber_state`) REFERENCES `states` (`state_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rehabber`
--

LOCK TABLES `rehabber` WRITE;
/*!40000 ALTER TABLE `rehabber` DISABLE KEYS */;
INSERT INTO `rehabber` VALUES (1,'Ryan','Frank','429 Aderholdt Road','Lincolnton',33,28092,'ryan_w_frank@mac.com','7048404309',0,'2017-08-14 16:14:56','2017-09-01 20:24:51',0,1921,1),(2,'Emilie','Nelson','429 Aderholdt Road','Lincolnton',33,28092,'emilie.nelson@gmail.com','7048584372',1,'2017-08-14 16:59:42','2017-09-01 20:24:17',0,1921,0),(12,'Michelle','Ray','877 Ram Lane','Lincolnton',33,28092,'mrinbfe@gmail.com','7049053551',1,'2017-09-02 00:30:20','2017-09-01 22:30:20',1,1940,1);
/*!40000 ALTER TABLE `rehabber` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-06  9:11:10
