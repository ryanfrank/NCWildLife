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
-- Table structure for table `ncwl_sessions`
--

DROP TABLE IF EXISTS `ncwl_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ncwl_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ncwl_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ncwl_sessions`
--

LOCK TABLES `ncwl_sessions` WRITE;
/*!40000 ALTER TABLE `ncwl_sessions` DISABLE KEYS */;
INSERT INTO `ncwl_sessions` VALUES ('572747721a5fe61e35b5a8aa27b71c031a457954','::1',1504132628,'__ci_last_regenerate|i:1504132628;'),('823490f56920c8a0f2249be469cfd00fcd06f77b','::1',1504133919,'__ci_last_regenerate|i:1504133919;'),('40623933c51f7792a1d5ba739d10a6acd552cb00','::1',1504134290,'__ci_last_regenerate|i:1504134290;'),('c682a9a1b0280dde792cc77219c6a4236a60165c','::1',1504135588,'__ci_last_regenerate|i:1504135588;'),('f3d00dc95521298523989cc2be6281391bce3cc1','::1',1504136031,'__ci_last_regenerate|i:1504136031;'),('6487e761b1b13f70c38c88d78a0ef53f2f6f8f86','::1',1504136342,'__ci_last_regenerate|i:1504136342;'),('d71b99599bba52c07c840dae1dd995c25c3020d3','::1',1504136657,'__ci_last_regenerate|i:1504136657;'),('1b2070c71a03f11abe605164cb8fcbc88b978fd3','::1',1504136975,'__ci_last_regenerate|i:1504136975;'),('921e234104b8948366d5e2ff9deb6353505581f1','::1',1504137596,'__ci_last_regenerate|i:1504137596;'),('b40fb6b64eff6d40f4c781aaddc81316daf0951e','::1',1504138200,'__ci_last_regenerate|i:1504138200;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504137638\";last_check|i:1504137641;'),('2e33866ca4dc57576c89fa9069a743a1e3613596','::1',1504138517,'__ci_last_regenerate|i:1504138517;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504137638\";last_check|i:1504137641;'),('e9dbd76b15c5cf509b6cf54e2d431374370d3b4c','::1',1504138911,'__ci_last_regenerate|i:1504138911;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504137638\";last_check|i:1504137641;'),('6256a1020aba366980d7fba3ebe1a5e593ae88ae','::1',1504139082,'__ci_last_regenerate|i:1504139082;'),('f002cb5b2574abb2e5f848cfc89a01a784db1e5a','::1',1504139653,'__ci_last_regenerate|i:1504139644;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504139465\";last_check|i:1504139651;');
/*!40000 ALTER TABLE `ncwl_sessions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-30 20:35:57
