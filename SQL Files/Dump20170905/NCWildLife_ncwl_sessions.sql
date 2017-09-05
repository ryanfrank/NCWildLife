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
INSERT INTO `ncwl_sessions` VALUES ('8aaf81f66617422d3fbbb45ace575b3c6428ff1c','::1',1504374562,'__ci_last_regenerate|i:1504374562;'),('bdad0469041ad0734380fb9f861165cb90ca0752','::1',1504374083,'__ci_last_regenerate|i:1504374083;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504286657\";last_check|i:1504371408;'),('f01d526fe1637357ee7531a8a22af6861c8b6b50','::1',1504374387,'__ci_last_regenerate|i:1504374387;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504286657\";last_check|i:1504371408;'),('06aabb0d91c044d5ded79613b68b2f607671bbb1','::1',1504375065,'__ci_last_regenerate|i:1504375065;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504286657\";last_check|i:1504371408;'),('47b362903b74d15fb97bb0450adc9018cfb1d9c8','::1',1504374952,'__ci_last_regenerate|i:1504374952;'),('c447d60af5d45f70af5031b1d978616b2b1bd2c8','::1',1504375319,'__ci_last_regenerate|i:1504375319;'),('db8697f673dade405f29e315f542ecd40c4bfc4a','::1',1504376161,'__ci_last_regenerate|i:1504376161;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504286657\";last_check|i:1504371408;'),('c53f4d51ab41cbf80859b09a833a9431af0537ec','::1',1504376702,'__ci_last_regenerate|i:1504376702;'),('b510cf71ac5f30c45cde7b8acb920c4af102d213','::1',1504376479,'__ci_last_regenerate|i:1504376479;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504286657\";last_check|i:1504371408;'),('474c8f03df928628b26207e09d59d35a2adb181b','::1',1504380632,'__ci_last_regenerate|i:1504380632;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504286657\";last_check|i:1504371408;'),('fc50a0b9953dd56f52778261632a13f962c2d29d','::1',1504380525,'__ci_last_regenerate|i:1504380525;'),('3030cf499c60518ce5c1e87d1857d37785c79e47','::1',1504380915,'__ci_last_regenerate|i:1504380915;'),('2e2d83e3a0a79eab7f147133ac9e74392ac7ce77','::1',1504381306,'__ci_last_regenerate|i:1504381306;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504286657\";last_check|i:1504371408;'),('e43f1580732d2b731006d479d468a8f004fa55e4','::1',1504381257,'__ci_last_regenerate|i:1504381257;'),('da16eb7ac39e2149c9f28339f2c2ff7f9d431a59','::1',1504381587,'__ci_last_regenerate|i:1504381587;'),('ece6970870c24dfa64a2c53ca9bfa64efe44c6c6','::1',1504381631,'__ci_last_regenerate|i:1504381631;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504286657\";last_check|i:1504371408;'),('259ba6d0f4897a71a22fbe5f8670ef71c556ebb9','::1',1504381587,'__ci_last_regenerate|i:1504381587;'),('e80ab18c4d07692abbc4253da0e4ac090f8dee41','::1',1504381991,'__ci_last_regenerate|i:1504381991;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504286657\";last_check|i:1504371408;'),('0b1cdffac60d881827ed7c759183c54d3e104d2a','::1',1504382307,'__ci_last_regenerate|i:1504382307;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504286657\";last_check|i:1504371408;'),('f2341c0a5508803a3087eda09594bb8d503e2b03','::1',1504382370,'__ci_last_regenerate|i:1504382307;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504286657\";last_check|i:1504371408;'),('72ae5aecac760c9dd7cae7659118ef21541c07db','::1',1504395052,'__ci_last_regenerate|i:1504394986;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504371408\";last_check|i:1504394986;'),('3d0e4dfa9e678203066664d5b43e1d6788d89154','::1',1504440499,'__ci_last_regenerate|i:1504440499;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504394986\";last_check|i:1504440161;'),('b6af0d431c42982c35b53d8c2c0356c5d11ad473','::1',1504440525,'__ci_last_regenerate|i:1504440499;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504394986\";last_check|i:1504440161;'),('f5210b49bea2c69a1b4f8de26fee4a7576de3df9','::1',1504482735,'__ci_last_regenerate|i:1504482654;'),('1efe44e9233f98706c042b686943c66647cf1a1e','::1',1504536661,'__ci_last_regenerate|i:1504536661;'),('a725f765290a18622e634f14d89285b59639a3c5','::1',1504537224,'__ci_last_regenerate|i:1504537224;'),('4f174a3ae89505731819d4b7fb1f402ec594b939','::1',1504537558,'__ci_last_regenerate|i:1504537558;'),('c3e815bcccb93b816169349c4ce0015615d999be','::1',1504538866,'__ci_last_regenerate|i:1504538866;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504440161\";last_check|i:1504537667;'),('fb5a52724365dd24338f3ef9c645afa5514d580c','::1',1504539234,'__ci_last_regenerate|i:1504539234;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504440161\";last_check|i:1504537667;'),('02ef93025aec5a4afab0953883824cdcaac27dbb','::1',1504541286,'__ci_last_regenerate|i:1504541286;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504440161\";last_check|i:1504537667;'),('ed085ad73941d48f9f4ef3a69373805ef3f122af','::1',1504541738,'__ci_last_regenerate|i:1504541738;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504440161\";last_check|i:1504537667;'),('279d44cd92ff5d2acf9df72e119ef04467afc31e','::1',1504542083,'__ci_last_regenerate|i:1504542083;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504440161\";last_check|i:1504537667;'),('a3685c49cd23cd2490be70612e9a4206e4328fd3','::1',1504542990,'__ci_last_regenerate|i:1504542990;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504440161\";last_check|i:1504537667;'),('926879c97c11c106d7f5a30ce47b09b439d8f350','::1',1504543268,'__ci_last_regenerate|i:1504542990;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504440161\";last_check|i:1504537667;'),('9a44bce02790290566dce89209baba85cbd0aabe','::1',1504567395,'__ci_last_regenerate|i:1504567395;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504566835\";last_check|i:1504567394;'),('4a6005d74ab4bf0ca54c036a09ddebcdfc258988','::1',1504568413,'__ci_last_regenerate|i:1504568413;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504566835\";last_check|i:1504567394;'),('c2260daa9da9f925c74e7a555f190dfcf4a1ff8b','::1',1504569067,'__ci_last_regenerate|i:1504569067;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504566835\";last_check|i:1504567394;'),('d1c330e569612ffa82fa5c60b98036ce6f1a68fb','::1',1504569102,'__ci_last_regenerate|i:1504569067;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504566835\";last_check|i:1504567394;'),('877ef941913638e96b719b9a25465f3fd0b03776','::1',1504646477,'__ci_last_regenerate|i:1504646477;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504567394\";last_check|i:1504646477;');
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

-- Dump completed on 2017-09-05 18:33:24
