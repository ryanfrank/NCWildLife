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
INSERT INTO `ncwl_sessions` VALUES ('c0e426b6d021719cfc841d0fb8a4d6b501ceaeb9','::1',1504298152,'__ci_last_regenerate|i:1504298152;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504222429\";last_check|i:1504286657;'),('6d1e8a20019af5ed55f2009e800e64ca01bc4c1d','::1',1504298820,'__ci_last_regenerate|i:1504298820;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504222429\";last_check|i:1504286657;'),('30d966c76b4fe666e4689c8990b276ab63cae736','::1',1504299723,'__ci_last_regenerate|i:1504299723;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504222429\";last_check|i:1504286657;'),('1ce687f08f07305c66fd21459098cd67742c23b8','::1',1504300069,'__ci_last_regenerate|i:1504300069;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504222429\";last_check|i:1504286657;'),('c5cbe5e900287a62109482f42bdf2f0be326c03f','::1',1504300539,'__ci_last_regenerate|i:1504300539;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504222429\";last_check|i:1504286657;'),('f1d7117f00acd795bfc07fe5a4ca134b2c27a44f','::1',1504300922,'__ci_last_regenerate|i:1504300922;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504222429\";last_check|i:1504286657;'),('f4203af6fffd702b138ff2f7c709e1a9913101de','::1',1504301599,'__ci_last_regenerate|i:1504301599;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504222429\";last_check|i:1504286657;'),('a2fc09eacb27af396d0a62a04e48ae93b3bb03fa','::1',1504302782,'__ci_last_regenerate|i:1504302782;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504222429\";last_check|i:1504286657;'),('440dc63fdb29e720d89003f9fb9d023826f7c3f5','::1',1504303143,'__ci_last_regenerate|i:1504303143;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504222429\";last_check|i:1504286657;'),('4f43997f767e66c43e421fdfddab44d78cc57c29','::1',1504303626,'__ci_last_regenerate|i:1504303626;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504222429\";last_check|i:1504286657;'),('c6c9dc7df5cb0e312756c4680bb9c4490f13ddc3','::1',1504304002,'__ci_last_regenerate|i:1504304002;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504222429\";last_check|i:1504286657;'),('349654f49ee19e77f0b03234dff164427e2eb5cb','::1',1504304562,'__ci_last_regenerate|i:1504304562;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504222429\";last_check|i:1504286657;'),('6655e1e47e248dcd9223481cb6aca316e08a3385','::1',1504304976,'__ci_last_regenerate|i:1504304976;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504222429\";last_check|i:1504286657;'),('14d72cb1813e79c56a98d0e7fb4d940026069214','::1',1504305265,'__ci_last_regenerate|i:1504304976;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504222429\";last_check|i:1504286657;');
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

-- Dump completed on 2017-09-01 18:36:19
