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
-- Table structure for table `good_samaritan`
--

DROP TABLE IF EXISTS `good_samaritan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `good_samaritan` (
  `good_samaritan_id` int(5) NOT NULL AUTO_INCREMENT,
  `good_samaritan_first_name` varchar(45) NOT NULL,
  `good_samaritan_last_name` varchar(45) NOT NULL,
  `good_samaritan_street` varchar(45) NOT NULL,
  `good_samaritan_city` varchar(45) NOT NULL,
  `good_samaritan_state` int(2) NOT NULL,
  `good_samaritan_zip` int(9) NOT NULL,
  `good_samaritan_phone` varchar(10) NOT NULL,
  `good_samaritan_email` varchar(45) NOT NULL,
  `good_samaritan_reference` varchar(45) DEFAULT NULL,
  `good_samaritan_donation` int(1) NOT NULL,
  `good_samaritan_donation_amount` varchar(45) DEFAULT NULL,
  `good_samaritan_list` int(1) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`good_samaritan_id`),
  KEY `states_idx` (`good_samaritan_state`),
  CONSTRAINT `states` FOREIGN KEY (`good_samaritan_state`) REFERENCES `states` (`state_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `good_samaritan`
--

LOCK TABLES `good_samaritan` WRITE;
/*!40000 ALTER TABLE `good_samaritan` DISABLE KEYS */;
INSERT INTO `good_samaritan` VALUES (1,'Ryan','Frank','429 Aderholdt Road','Lincolnton',33,28092,'7048404309','ryan_w_frank@mac.com','Friends',1,'1000',1,'2017-08-14 14:03:02','2017-08-14 19:03:02'),(2,'Joe','Blow','429 Aderholdt Road','Lincolnton',44,28092,'7048404309','ryan_w_frank@mac.com','People',1,'100',1,'2017-08-15 08:58:48','2017-08-15 13:58:48'),(3,'','','','',1,0,'','yy@jjj.com','',0,'0',0,'2017-08-30 22:57:27','2017-08-30 20:57:27');
/*!40000 ALTER TABLE `good_samaritan` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-05 18:33:24
