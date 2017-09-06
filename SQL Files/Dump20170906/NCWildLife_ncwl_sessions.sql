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
INSERT INTO `ncwl_sessions` VALUES ('43a8340c59b786f3bc68737400a43840ec04262f','::1',1504660797,'__ci_last_regenerate|i:1504660797;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504646477\";last_check|i:1504660404;'),('9f223b8ab7e0b3dd3e9e2d297751578d0122c7d7','::1',1504661152,'__ci_last_regenerate|i:1504661152;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504646477\";last_check|i:1504660404;'),('7e805a935320e9ecf5b93f5d42ded52fb74df44e','::1',1504661491,'__ci_last_regenerate|i:1504661491;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504646477\";last_check|i:1504660404;'),('e1e952b0f1867b0b8e67047b899e1bf39b1a56d2','::1',1504661894,'__ci_last_regenerate|i:1504661894;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504646477\";last_check|i:1504660404;'),('3ab011b6c563b3bb0d1f02b5c9a6452e712f04b1','::1',1504662206,'__ci_last_regenerate|i:1504662206;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504646477\";last_check|i:1504660404;'),('690cc6d820696647c51557b4389f9c5f8474870d','::1',1504662621,'__ci_last_regenerate|i:1504662621;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504646477\";last_check|i:1504660404;'),('e36ebc9e4dc162e498812a6a1387e9ed2aa20ce9','::1',1504662992,'__ci_last_regenerate|i:1504662992;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504646477\";last_check|i:1504660404;'),('a07b17fe87192cfd01082a98dea3c97eb01612e8','::1',1504663308,'__ci_last_regenerate|i:1504663308;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504646477\";last_check|i:1504660404;'),('2eae3125f4fc9bb6bb13e652872db470caa5bde3','::1',1504663654,'__ci_last_regenerate|i:1504663654;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504646477\";last_check|i:1504660404;'),('f01920cfc2acc2e439fadba2e2597ef35ba3ecb6','::1',1504664018,'__ci_last_regenerate|i:1504664018;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504646477\";last_check|i:1504660404;'),('9d0f83a0d766f13a6f4dd4435045cb26040bbce3','::1',1504664319,'__ci_last_regenerate|i:1504664319;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504646477\";last_check|i:1504660404;'),('be152ca401768307e6b7f8833fde126e0869de42','::1',1504665914,'__ci_last_regenerate|i:1504665914;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504646477\";last_check|i:1504660404;'),('c8e709e3869e0f0dc2aa4f5df741fef0711984fe','::1',1504666367,'__ci_last_regenerate|i:1504666367;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504646477\";last_check|i:1504660404;'),('2e99e54a4ab7fa435b9cb16ad2237543398f1c7c','::1',1504666669,'__ci_last_regenerate|i:1504666669;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504646477\";last_check|i:1504660404;'),('c028009f78f59f3d409b7487daf0c08a09532707','::1',1504666851,'__ci_last_regenerate|i:1504666669;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504646477\";last_check|i:1504660404;'),('c42e170974c0d58ff48aafc3313d7baf1a9c0273','::1',1504703383,'__ci_last_regenerate|i:1504703383;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504660404\";last_check|i:1504702894;'),('0524595a282739d34bce9667395bd6be44a483ac','::1',1504703385,'__ci_last_regenerate|i:1504703383;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504660404\";last_check|i:1504702894;');
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

-- Dump completed on 2017-09-06  9:11:09
