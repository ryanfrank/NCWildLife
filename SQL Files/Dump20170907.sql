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
-- Table structure for table `ages`
--

DROP TABLE IF EXISTS `ages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ages` (
  `ages_id` int(5) NOT NULL AUTO_INCREMENT,
  `ages_description` varchar(45) NOT NULL,
  PRIMARY KEY (`ages_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ages`
--

LOCK TABLES `ages` WRITE;
/*!40000 ALTER TABLE `ages` DISABLE KEYS */;
INSERT INTO `ages` VALUES (1,'Pinky'),(2,'Baby'),(3,'Juvenile'),(4,'Teen'),(5,'Adult'),(6,'Senior');
/*!40000 ALTER TABLE `ages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `animal`
--

DROP TABLE IF EXISTS `animal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `animal` (
  `animal_id` int(5) NOT NULL AUTO_INCREMENT,
  `animal_name` varchar(45) NOT NULL,
  `animal_release` date DEFAULT NULL,
  PRIMARY KEY (`animal_id`,`animal_name`),
  UNIQUE KEY `animal_name_UNIQUE` (`animal_name`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `animal`
--

LOCK TABLES `animal` WRITE;
/*!40000 ALTER TABLE `animal` DISABLE KEYS */;
INSERT INTO `animal` VALUES (1,'MyName',NULL),(2,'Name',NULL),(3,'ThisAnimal',NULL),(4,'rrrr',NULL),(5,'efwef',NULL),(6,'ouyeo',NULL),(7,'jbviubrv',NULL),(8,'MyAnimal',NULL),(9,'Another Animal',NULL),(10,'AnotherOneFrom Ryan',NULL);
/*!40000 ALTER TABLE `animal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cages`
--

DROP TABLE IF EXISTS `cages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cages` (
  `cage_id` int(5) NOT NULL AUTO_INCREMENT,
  `cage_name` varchar(45) DEFAULT NULL,
  `cage_size` varchar(15) NOT NULL,
  `cage_location` int(5) NOT NULL,
  `cage_condition` varchar(45) NOT NULL,
  `cage_type` varchar(45) NOT NULL,
  `cage_capacity` int(5) NOT NULL,
  PRIMARY KEY (`cage_id`),
  KEY `cage_location_idx` (`cage_location`),
  CONSTRAINT `cage_location` FOREIGN KEY (`cage_location`) REFERENCES `location` (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cages`
--

LOCK TABLES `cages` WRITE;
/*!40000 ALTER TABLE `cages` DISABLE KEYS */;
/*!40000 ALTER TABLE `cages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `counties`
--

DROP TABLE IF EXISTS `counties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `counties` (
  `county_id` int(11) NOT NULL AUTO_INCREMENT,
  `county_name` varchar(255) NOT NULL,
  `county_state` int(2) NOT NULL,
  PRIMARY KEY (`county_id`),
  KEY `state_idx` (`county_state`),
  CONSTRAINT `county_state_key` FOREIGN KEY (`county_state`) REFERENCES `states` (`state_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4096 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `counties`
--

LOCK TABLES `counties` WRITE;
/*!40000 ALTER TABLE `counties` DISABLE KEYS */;
INSERT INTO `counties` VALUES (1,'Autauga',1),(2,'Baldwin',1),(3,'Barbour',1),(4,'Bibb',1),(5,'Blount',1),(6,'Bullock',1),(7,'Butler',1),(8,'Calhoun',1),(9,'Chambers',1),(10,'Cherokee',1),(11,'Chilton',1),(12,'Choctaw',1),(13,'Clarke',1),(14,'Clay',1),(15,'Cleburne',1),(16,'Coffee',1),(17,'Colbert',1),(18,'Conecuh',1),(19,'Coosa',1),(20,'Covington',1),(21,'Crenshaw',1),(22,'Cullman',1),(23,'Dale',1),(24,'Dallas',1),(25,'DeKalb',1),(26,'Elmore',1),(27,'Escambia',1),(28,'Etowah',1),(29,'Fayette',1),(30,'Franklin',1),(31,'Geneva',1),(32,'Greene',1),(33,'Hale',1),(34,'Henry',1),(35,'Houston',1),(36,'Jackson',1),(37,'Jefferson',1),(38,'Lamar',1),(39,'Lauderdale',1),(40,'Lawrence',1),(41,'Lee',1),(42,'Limestone',1),(43,'Lowndes',1),(44,'Macon',1),(45,'Madison',1),(46,'Marengo',1),(47,'Marion',1),(48,'Marshall',1),(49,'Mobile',1),(50,'Monroe',1),(51,'Montgomery',1),(52,'Morgan',1),(53,'Perry',1),(54,'Pickens',1),(55,'Pike',1),(56,'Randolph',1),(57,'Russell',1),(58,'Shelby',1),(59,'St. Clair',1),(60,'Sumter',1),(61,'Talladega',1),(62,'Tallapoosa',1),(63,'Tuscaloosa',1),(64,'Walker',1),(65,'Washington',1),(66,'Wilcox',1),(67,'Winston',1),(68,'Aleutians East Borough',2),(69,'Aleutians West Census Area',2),(70,'Bethel Census Area',2),(71,'Bristol Bay Borough',2),(72,'Denali Borough',2),(73,'Dillingham Census Area',2),(74,'Fairbanks North Star Borough',2),(75,'Haines Borough',2),(76,'Juneau City and Borough',2),(77,'Kenai Peninsula Borough',2),(78,'Ketchikan Gateway Borough',2),(79,'Kodiak Island Borough',2),(80,'Lake and Peninsula Borough',2),(81,'Matanuska-Susitna Borough',2),(82,'Nome Census Area',2),(83,'North Slope Borough',2),(84,'Northwest Arctic Borough',2),(85,'Prince of Wales-Outer Ketchikan Census Area',2),(86,'Sitka City and Borough',2),(87,'Skagway-Hoonah-Angoon Census Area',2),(88,'Southeast Fairbanks Census Area',2),(89,'Valdez-Cordova Census Area',2),(90,'Wade Hampton Census Area',2),(91,'Wrangell-Petersburg Census Area',2),(92,'Yakutat City and Borough',2),(93,'Yukon-Koyukuk Census Area',2),(94,'Municipality of Anchorage',2),(95,'Apache',3),(96,'Cochise',3),(97,'Coconino',3),(98,'Gila',3),(99,'Graham',3),(100,'Greenlee',3),(101,'La Paz',3),(102,'Maricopa',3),(103,'Mohave',3),(104,'Navajo',3),(105,'Pima',3),(106,'Pinal',3),(107,'Santa Cruz',3),(108,'Yavapai',3),(109,'Yuma',3),(110,'Arkansas',4),(111,'Ashley',4),(112,'Baxter',4),(113,'Benton',4),(114,'Boone',4),(115,'Bradley',4),(116,'Calhoun',4),(117,'Carroll',4),(118,'Chicot',4),(119,'Clark',4),(120,'Clay',4),(121,'Cleburne',4),(122,'Cleveland',4),(123,'Columbia',4),(124,'Conway',4),(125,'Craighead',4),(126,'Crawford',4),(127,'Crittenden',4),(128,'Cross',4),(129,'Dallas',4),(130,'Desha',4),(131,'Drew',4),(132,'Faulkner',4),(133,'Franklin',4),(134,'Fulton',4),(135,'Garland',4),(136,'Grant',4),(137,'Greene',4),(138,'Hempstead',4),(139,'Hot Spring',4),(140,'Howard',4),(141,'Independence',4),(142,'Izard',4),(143,'Jackson',4),(144,'Jefferson',4),(145,'Johnson',4),(146,'Lafayette',4),(147,'Lawrence',4),(148,'Lee',4),(149,'Lincoln',4),(150,'Little River',4),(151,'Logan',4),(152,'Lonoke',4),(153,'Madison',4),(154,'Marion',4),(155,'Miller',4),(156,'Mississippi',4),(157,'Monroe',4),(158,'Montgomery',4),(159,'Nevada',4),(160,'Newton',4),(161,'Ouachita',4),(162,'Perry',4),(163,'Phillips',4),(164,'Pike',4),(165,'Poinsett',4),(166,'Polk',4),(167,'Pope',4),(168,'Prairie',4),(169,'Pulaski',4),(170,'Randolph',4),(171,'Saline',4),(172,'Scott',4),(173,'Searcy',4),(174,'Sebastian',4),(175,'Sevier',4),(176,'Sharp',4),(177,'St. Francis',4),(178,'Stone',4),(179,'Union',4),(180,'Van Buren',4),(181,'Washington',4),(182,'White',4),(183,'Woodruff',4),(184,'Yell',4),(185,'Alameda',5),(186,'Alpine',5),(187,'Amador',5),(188,'Butte',5),(189,'Calaveras',5),(190,'Colusa',5),(191,'Contra Costa',5),(192,'Del Norte',5),(193,'El Dorado',5),(194,'Fresno',5),(195,'Glenn',5),(196,'Humboldt',5),(197,'Imperial',5),(198,'Inyo',5),(199,'Kern',5),(200,'Kings',5),(201,'Lake',5),(202,'Lassen',5),(203,'Los Angeles',5),(204,'Madera',5),(205,'Marin',5),(206,'Mariposa',5),(207,'Mendocino',5),(208,'Merced',5),(209,'Modoc',5),(210,'Mono',5),(211,'Monterey',5),(212,'Napa',5),(213,'Nevada',5),(214,'Orange',5),(215,'Placer',5),(216,'Plumas',5),(217,'Riverside',5),(218,'Sacramento',5),(219,'San Benito',5),(220,'San Bernardino',5),(221,'San Diego',5),(222,'San Francisco',5),(223,'San Joaquin',5),(224,'San Luis Obispo',5),(225,'San Mateo',5),(226,'Santa Barbara',5),(227,'Santa Clara',5),(228,'Santa Cruz',5),(229,'Shasta',5),(230,'Sierra',5),(231,'Siskiyou',5),(232,'Solano',5),(233,'Sonoma',5),(234,'Stanislaus',5),(235,'Sutter',5),(236,'Tehama',5),(237,'Trinity',5),(238,'Tulare',5),(239,'Tuolumne',5),(240,'Ventura',5),(241,'Yolo',5),(242,'Yuba',5),(243,'Adams',6),(244,'Alamosa',6),(245,'Arapahoe',6),(246,'Archuleta',6),(247,'Baca',6),(248,'Bent',6),(249,'Boulder',6),(250,'Broomfield',6),(251,'Chaffee',6),(252,'Cheyenne',6),(253,'Clear Creek',6),(254,'Conejos',6),(255,'Costilla',6),(256,'Crowley',6),(257,'Custer',6),(258,'Delta',6),(259,'Denver',6),(260,'Dolores',6),(261,'Douglas',6),(262,'Eagle',6),(263,'El Paso',6),(264,'Elbert',6),(265,'Fremont',6),(266,'Garfield',6),(267,'Gilpin',6),(268,'Grand',6),(269,'Gunnison',6),(270,'Hinsdale',6),(271,'Huerfano',6),(272,'Jackson',6),(273,'Jefferson',6),(274,'Kiowa',6),(275,'Kit Carson',6),(276,'La Plata',6),(277,'Lake',6),(278,'Larimer',6),(279,'Las Animas',6),(280,'Lincoln',6),(281,'Logan',6),(282,'Mesa',6),(283,'Mineral',6),(284,'Moffat',6),(285,'Montezuma',6),(286,'Montrose',6),(287,'Morgan',6),(288,'Otero',6),(289,'Ouray',6),(290,'Park',6),(291,'Phillips',6),(292,'Pitkin',6),(293,'Prowers',6),(294,'Pueblo',6),(295,'Rio Blanco',6),(296,'Rio Grande',6),(297,'Routt',6),(298,'Saguache',6),(299,'San Juan',6),(300,'San Miguel',6),(301,'Sedgwick',6),(302,'Summit',6),(303,'Teller',6),(304,'Washington',6),(305,'Weld',6),(306,'Yuma',6),(307,'Fairfield',7),(308,'Hartford',7),(309,'Litchfield',7),(310,'Middlesex',7),(311,'New Haven',7),(312,'New London',7),(313,'Tolland',7),(314,'Windham',7),(315,'Kent',8),(316,'New Castle',8),(317,'Sussex',8),(318,'District of Columbia',8),(319,'Alachua',9),(320,'Baker',9),(321,'Bay',9),(322,'Bradford',9),(323,'Brevard',9),(324,'Broward',9),(325,'Calhoun',9),(326,'Charlotte',9),(327,'Citrus',9),(328,'Clay',9),(329,'Collier',9),(330,'Columbia',9),(331,'DeSoto',9),(332,'Dixie',9),(333,'Duval',9),(334,'Escambia',9),(335,'Flagler',9),(336,'Franklin',9),(337,'Gadsden',9),(338,'Gilchrist',9),(339,'Glades',9),(340,'Gulf',9),(341,'Hamilton',9),(342,'Hardee',9),(343,'Hendry',9),(344,'Hernando',9),(345,'Highlands',9),(346,'Hillsborough',9),(347,'Holmes',9),(348,'Indian River',9),(349,'Jackson',9),(350,'Jefferson',9),(351,'Lafayette',9),(352,'Lake',9),(353,'Lee',9),(354,'Leon',9),(355,'Levy',9),(356,'Liberty',9),(357,'Madison',9),(358,'Manatee',9),(359,'Marion',9),(360,'Martin',9),(361,'Miami-Dade',9),(362,'Monroe',9),(363,'Nassau',9),(364,'Okaloosa',9),(365,'Okeechobee',9),(366,'Orange',9),(367,'Osceola',9),(368,'Palm Beach',9),(369,'Pasco',9),(370,'Pinellas',9),(371,'Polk',9),(372,'Putnam',9),(373,'Santa Rosa',9),(374,'Sarasota',9),(375,'Seminole',9),(376,'St. Johns',9),(377,'St. Lucie',9),(378,'Sumter',9),(379,'Suwannee',9),(380,'Taylor',9),(381,'Union',9),(382,'Volusia',9),(383,'Wakulla',9),(384,'Walton',9),(385,'Washington',9),(386,'Appling',10),(387,'Atkinson',10),(388,'Bacon',10),(389,'Baker',10),(390,'Baldwin',10),(391,'Banks',10),(392,'Barrow',10),(393,'Bartow',10),(394,'Ben Hill',10),(395,'Berrien',10),(396,'Bibb',10),(397,'Bleckley',10),(398,'Brantley',10),(399,'Brooks',10),(400,'Bryan',10),(401,'Bulloch',10),(402,'Burke',10),(403,'Butts',10),(404,'Calhoun',10),(405,'Camden',10),(406,'Candler',10),(407,'Carroll',10),(408,'Catoosa',10),(409,'Charlton',10),(410,'Chatham',10),(411,'Chattahoochee',10),(412,'Chattooga',10),(413,'Cherokee',10),(414,'Clarke',10),(415,'Clay',10),(416,'Clayton',10),(417,'Clinch',10),(418,'Cobb',10),(419,'Coffee',10),(420,'Colquitt',10),(421,'Columbia',10),(422,'Cook',10),(423,'Coweta',10),(424,'Crawford',10),(425,'Crisp',10),(426,'Dade',10),(427,'Dawson',10),(428,'De Kalb',10),(429,'Decatur',10),(430,'Dodge',10),(431,'Dooly',10),(432,'Dougherty',10),(433,'Douglas',10),(434,'Early',10),(435,'Echols',10),(436,'Effingham',10),(437,'Elbert',10),(438,'Emanuel',10),(439,'Evans',10),(440,'Fannin',10),(441,'Fayette',10),(442,'Floyd',10),(443,'Forsyth',10),(444,'Franklin',10),(445,'Fulton',10),(446,'Gilmer',10),(447,'Glascock',10),(448,'Glynn',10),(449,'Gordon',10),(450,'Grady',10),(451,'Greene',10),(452,'Gwinnett',10),(453,'Habersham',10),(454,'Hall',10),(455,'Hancock',10),(456,'Haralson',10),(457,'Harris',10),(458,'Hart',10),(459,'Heard',10),(460,'Henry',10),(461,'Houston',10),(462,'Irwin',10),(463,'Jackson',10),(464,'Jasper',10),(465,'Jeff Davis',10),(466,'Jefferson',10),(467,'Jenkins',10),(468,'Johnson',10),(469,'Jones',10),(470,'Lamar',10),(471,'Lanier',10),(472,'Laurens',10),(473,'Lee',10),(474,'Liberty',10),(475,'Lincoln',10),(476,'Long',10),(477,'Lowndes',10),(478,'Lumpkin',10),(479,'Macon',10),(480,'Madison',10),(481,'Marion',10),(482,'McDuffie',10),(483,'McIntosh',10),(484,'Meriwether',10),(485,'Miller',10),(486,'Mitchell',10),(487,'Monroe',10),(488,'Montgomery',10),(489,'Morgan',10),(490,'Murray',10),(491,'Muscogee',10),(492,'Newton',10),(493,'Oconee',10),(494,'Oglethorpe',10),(495,'Paulding',10),(496,'Peach',10),(497,'Pickens',10),(498,'Pierce',10),(499,'Pike',10),(500,'Polk',10),(501,'Pulaski',10),(502,'Putnam',10),(503,'Quitman',10),(504,'Rabun',10),(505,'Randolph',10),(506,'Richmond',10),(507,'Rockdale',10),(508,'Schley',10),(509,'Screven',10),(510,'Seminole',10),(511,'Spalding',10),(512,'Stephens',10),(513,'Stewart',10),(514,'Sumter',10),(515,'Talbot',10),(516,'Taliaferro',10),(517,'Tattnall',10),(518,'Taylor',10),(519,'Telfair',10),(520,'Terrell',10),(521,'Thomas',10),(522,'Tift',10),(523,'Toombs',10),(524,'Towns',10),(525,'Treutlen',10),(526,'Troup',10),(527,'Turner',10),(528,'Twiggs',10),(529,'Union',10),(530,'Upson',10),(531,'Walker',10),(532,'Walton',10),(533,'Ware',10),(534,'Warren',10),(535,'Washington',10),(536,'Wayne',10),(537,'Webster',10),(538,'Wheeler',10),(539,'White',10),(540,'Whitfield',10),(541,'Wilcox',10),(542,'Wilkes',10),(543,'Wilkinson',10),(544,'Worth',10),(545,'Hawaii',11),(546,'Honolulu',11),(547,'Kalawao',11),(548,'Kauai',11),(549,'Maui',11),(550,'Ada',12),(551,'Adams',12),(552,'Bannock',12),(553,'Bear Lake',12),(554,'Benewah',12),(555,'Bingham',12),(556,'Blaine',12),(557,'Boise',12),(558,'Bonner',12),(559,'Bonneville',12),(560,'Boundary',12),(561,'Butte',12),(562,'Camas',12),(563,'Canyon',12),(564,'Caribou',12),(565,'Cassia',12),(566,'Clark',12),(567,'Clearwater',12),(568,'Custer',12),(569,'Elmore',12),(570,'Franklin',12),(571,'Fremont',12),(572,'Gem',12),(573,'Gooding',12),(574,'Idaho',12),(575,'Jefferson',12),(576,'Jerome',12),(577,'Kootenai',12),(578,'Latah',12),(579,'Lemhi',12),(580,'Lewis',12),(581,'Lincoln',12),(582,'Madison',12),(583,'Minidoka',12),(584,'Nez Perce',12),(585,'Oneida',12),(586,'Owyhee',12),(587,'Payette',12),(588,'Power',12),(589,'Shoshone',12),(590,'Teton',12),(591,'Twin Falls',12),(592,'Valley',12),(593,'Washington',12),(594,'Adams',13),(595,'Alexander',13),(596,'Bond',13),(597,'Boone',13),(598,'Brown',13),(599,'Bureau',13),(600,'Calhoun',13),(601,'Carroll',13),(602,'Cass',13),(603,'Champaign',13),(604,'Christian',13),(605,'Clark',13),(606,'Clay',13),(607,'Clinton',13),(608,'Coles',13),(609,'Cook',13),(610,'Crawford',13),(611,'Cumberland',13),(612,'DeKalb',13),(613,'De Witt',13),(614,'Douglas',13),(615,'Du Page',13),(616,'Edgar',13),(617,'Edwards',13),(618,'Effingham',13),(619,'Fayette',13),(620,'Ford',13),(621,'Franklin',13),(622,'Fulton',13),(623,'Gallatin',13),(624,'Greene',13),(625,'Grundy',13),(626,'Hamilton',13),(627,'Hancock',13),(628,'Hardin',13),(629,'Henderson',13),(630,'Henry',13),(631,'Iroquois',13),(632,'Jackson',13),(633,'Jasper',13),(634,'Jefferson',13),(635,'Jersey',13),(636,'Jo Daviess',13),(637,'Johnson',13),(638,'Kane',13),(639,'Kankakee',13),(640,'Kendall',13),(641,'Knox',13),(642,'La Salle',13),(643,'Lake',13),(644,'Lawrence',13),(645,'Lee',13),(646,'Livingston',13),(647,'Logan',13),(648,'Macon',13),(649,'Macoupin',13),(650,'Madison',13),(651,'Marion',13),(652,'Marshall',13),(653,'Mason',13),(654,'Massac',13),(655,'McDonough',13),(656,'McHenry',13),(657,'McLean',13),(658,'Menard',13),(659,'Mercer',13),(660,'Monroe',13),(661,'Montgomery',13),(662,'Morgan',13),(663,'Moultrie',13),(664,'Ogle',13),(665,'Peoria',13),(666,'Perry',13),(667,'Piatt',13),(668,'Pike',13),(669,'Pope',13),(670,'Pulaski',13),(671,'Putnam',13),(672,'Randolph',13),(673,'Richland',13),(674,'Rock Island',13),(675,'Saline',13),(676,'Sangamon',13),(677,'Schuyler',13),(678,'Scott',13),(679,'Shelby',13),(680,'St. Clair',13),(681,'Stark',13),(682,'Stephenson',13),(683,'Tazewell',13),(684,'Union',13),(685,'Vermilion',13),(686,'Wabash',13),(687,'Warren',13),(688,'Washington',13),(689,'Wayne',13),(690,'White',13),(691,'Whiteside',13),(692,'Will',13),(693,'Williamson',13),(694,'Winnebago',13),(695,'Woodford',13),(696,'Adams',14),(697,'Allen',14),(698,'Bartholomew',14),(699,'Benton',14),(700,'Blackford',14),(701,'Boone',14),(702,'Brown',14),(703,'Carroll',14),(704,'Cass',14),(705,'Clark',14),(706,'Clay',14),(707,'Clinton',14),(708,'Crawford',14),(709,'Daviess',14),(710,'De Kalb',14),(711,'Dearborn',14),(712,'Decatur',14),(713,'Delaware',14),(714,'Dubois',14),(715,'Elkhart',14),(716,'Fayette',14),(717,'Floyd',14),(718,'Fountain',14),(719,'Franklin',14),(720,'Fulton',14),(721,'Gibson',14),(722,'Grant',14),(723,'Greene',14),(724,'Hamilton',14),(725,'Hancock',14),(726,'Harrison',14),(727,'Hendricks',14),(728,'Henry',14),(729,'Howard',14),(730,'Huntington',14),(731,'Jackson',14),(732,'Jasper',14),(733,'Jay',14),(734,'Jefferson',14),(735,'Jennings',14),(736,'Johnson',14),(737,'Knox',14),(738,'Kosciusko',14),(739,'La Porte',14),(740,'Lagrange',14),(741,'Lake',14),(742,'Lawrence',14),(743,'Madison',14),(744,'Marion',14),(745,'Marshall',14),(746,'Martin',14),(747,'Miami',14),(748,'Monroe',14),(749,'Montgomery',14),(750,'Morgan',14),(751,'Newton',14),(752,'Noble',14),(753,'Ohio',14),(754,'Orange',14),(755,'Owen',14),(756,'Parke',14),(757,'Perry',14),(758,'Pike',14),(759,'Porter',14),(760,'Posey',14),(761,'Pulaski',14),(762,'Putnam',14),(763,'Randolph',14),(764,'Ripley',14),(765,'Rush',14),(766,'Scott',14),(767,'Shelby',14),(768,'Spencer',14),(769,'St. Joseph',14),(770,'Starke',14),(771,'Steuben',14),(772,'Sullivan',14),(773,'Switzerland',14),(774,'Tippecanoe',14),(775,'Tipton',14),(776,'Union',14),(777,'Vanderburgh',14),(778,'Vermillion',14),(779,'Vigo',14),(780,'Wabash',14),(781,'Warren',14),(782,'Warrick',14),(783,'Washington',14),(784,'Wayne',14),(785,'Wells',14),(786,'White',14),(787,'Whitley',14),(788,'Adair',15),(789,'Adams',15),(790,'Allamakee',15),(791,'Appanoose',15),(792,'Audubon',15),(793,'Benton',15),(794,'Black Hawk',15),(795,'Boone',15),(796,'Bremer',15),(797,'Buchanan',15),(798,'Buena Vista',15),(799,'Butler',15),(800,'Calhoun',15),(801,'Carroll',15),(802,'Cass',15),(803,'Cedar',15),(804,'Cerro Gordo',15),(805,'Cherokee',15),(806,'Chickasaw',15),(807,'Clarke',15),(808,'Clay',15),(809,'Clayton',15),(810,'Clinton',15),(811,'Crawford',15),(812,'Dallas',15),(813,'Davis',15),(814,'Decatur',15),(815,'Delaware',15),(816,'Des Moines',15),(817,'Dickinson',15),(818,'Dubuque',15),(819,'Emmet',15),(820,'Fayette',15),(821,'Floyd',15),(822,'Franklin',15),(823,'Fremont',15),(824,'Greene',15),(825,'Grundy',15),(826,'Guthrie',15),(827,'Hamilton',15),(828,'Hancock',15),(829,'Hardin',15),(830,'Harrison',15),(831,'Henry',15),(832,'Howard',15),(833,'Humboldt',15),(834,'Ida',15),(835,'Iowa',15),(836,'Jackson',15),(837,'Jasper',15),(838,'Jefferson',15),(839,'Johnson',15),(840,'Jones',15),(841,'Keokuk',15),(842,'Kossuth',15),(843,'Lee',15),(844,'Linn',15),(845,'Louisa',15),(846,'Lucas',15),(847,'Lyon',15),(848,'Madison',15),(849,'Mahaska',15),(850,'Marion',15),(851,'Marshall',15),(852,'Mills',15),(853,'Mitchell',15),(854,'Monona',15),(855,'Monroe',15),(856,'Montgomery',15),(857,'Muscatine',15),(858,'O\'Brien',15),(859,'Osceola',15),(860,'Page',15),(861,'Palo Alto',15),(862,'Plymouth',15),(863,'Pocahontas',15),(864,'Polk',15),(865,'Pottawattamie',15),(866,'Poweshiek',15),(867,'Ringgold',15),(868,'Sac',15),(869,'Scott',15),(870,'Shelby',15),(871,'Sioux',15),(872,'Story',15),(873,'Tama',15),(874,'Taylor',15),(875,'Union',15),(876,'Van Buren',15),(877,'Wapello',15),(878,'Warren',15),(879,'Washington',15),(880,'Wayne',15),(881,'Webster',15),(882,'Winnebago',15),(883,'Winneshiek',15),(884,'Woodbury',15),(885,'Worth',15),(886,'Wright',15),(887,'Allen',16),(888,'Anderson',16),(889,'Atchison',16),(890,'Barber',16),(891,'Barton',16),(892,'Bourbon',16),(893,'Brown',16),(894,'Butler',16),(895,'Chase',16),(896,'Chautauqua',16),(897,'Cherokee',16),(898,'Cheyenne',16),(899,'Clark',16),(900,'Clay',16),(901,'Cloud',16),(902,'Coffey',16),(903,'Comanche',16),(904,'Cowley',16),(905,'Crawford',16),(906,'Decatur',16),(907,'Dickinson',16),(908,'Doniphan',16),(909,'Douglas',16),(910,'Edwards',16),(911,'Elk',16),(912,'Ellis',16),(913,'Ellsworth',16),(914,'Finney',16),(915,'Ford',16),(916,'Franklin',16),(917,'Geary',16),(918,'Gove',16),(919,'Graham',16),(920,'Grant',16),(921,'Gray',16),(922,'Greeley',16),(923,'Greenwood',16),(924,'Hamilton',16),(925,'Harper',16),(926,'Harvey',16),(927,'Haskell',16),(928,'Hodgeman',16),(929,'Jackson',16),(930,'Jefferson',16),(931,'Jewell',16),(932,'Johnson',16),(933,'Kearny',16),(934,'Kingman',16),(935,'Kiowa',16),(936,'Labette',16),(937,'Lane',16),(938,'Leavenworth',16),(939,'Lincoln',16),(940,'Linn',16),(941,'Logan',16),(942,'Lyon',16),(943,'Marion',16),(944,'Marshall',16),(945,'McPherson',16),(946,'Meade',16),(947,'Miami',16),(948,'Mitchell',16),(949,'Montgomery',16),(950,'Morris',16),(951,'Morton',16),(952,'Nemaha',16),(953,'Neosho',16),(954,'Ness',16),(955,'Norton',16),(956,'Osage',16),(957,'Osborne',16),(958,'Ottawa',16),(959,'Pawnee',16),(960,'Phillips',16),(961,'Pottawatomie',16),(962,'Pratt',16),(963,'Rawlins',16),(964,'Reno',16),(965,'Republic',16),(966,'Rice',16),(967,'Riley',16),(968,'Rooks',16),(969,'Rush',16),(970,'Russell',16),(971,'Saline',16),(972,'Scott',16),(973,'Sedgwick',16),(974,'Seward',16),(975,'Shawnee',16),(976,'Sheridan',16),(977,'Sherman',16),(978,'Smith',16),(979,'Stafford',16),(980,'Stanton',16),(981,'Stevens',16),(982,'Sumner',16),(983,'Thomas',16),(984,'Trego',16),(985,'Wabaunsee',16),(986,'Wallace',16),(987,'Washington',16),(988,'Wichita',16),(989,'Wilson',16),(990,'Woodson',16),(991,'Wyandotte',16),(992,'Adair',17),(993,'Allen',17),(994,'Anderson',17),(995,'Ballard',17),(996,'Barren',17),(997,'Bath',17),(998,'Bell',17),(999,'Boone',17),(1000,'Bourbon',17),(1001,'Boyd',17),(1002,'Boyle',17),(1003,'Bracken',17),(1004,'Breathitt',17),(1005,'Breckinridge',17),(1006,'Bullitt',17),(1007,'Butler',17),(1008,'Caldwell',17),(1009,'Calloway',17),(1010,'Campbell',17),(1011,'Carlisle',17),(1012,'Carroll',17),(1013,'Carter',17),(1014,'Casey',17),(1015,'Christian',17),(1016,'Clark',17),(1017,'Clay',17),(1018,'Clinton',17),(1019,'Crittenden',17),(1020,'Cumberland',17),(1021,'Daviess',17),(1022,'Edmonson',17),(1023,'Elliott',17),(1024,'Estill',17),(1025,'Fayette',17),(1026,'Fleming',17),(1027,'Floyd',17),(1028,'Franklin',17),(1029,'Fulton',17),(1030,'Gallatin',17),(1031,'Garrard',17),(1032,'Grant',17),(1033,'Graves',17),(1034,'Grayson',17),(1035,'Green',17),(1036,'Greenup',17),(1037,'Hancock',17),(1038,'Hardin',17),(1039,'Harlan',17),(1040,'Harrison',17),(1041,'Hart',17),(1042,'Henderson',17),(1043,'Henry',17),(1044,'Hickman',17),(1045,'Hopkins',17),(1046,'Jackson',17),(1047,'Jefferson',17),(1048,'Jessamine',17),(1049,'Johnson',17),(1050,'Kenton',17),(1051,'Knott',17),(1052,'Knox',17),(1053,'Larue',17),(1054,'Laurel',17),(1055,'Lawrence',17),(1056,'Lee',17),(1057,'Leslie',17),(1058,'Letcher',17),(1059,'Lewis',17),(1060,'Lincoln',17),(1061,'Livingston',17),(1062,'Logan',17),(1063,'Lyon',17),(1064,'Madison',17),(1065,'Magoffin',17),(1066,'Marion',17),(1067,'Marshall',17),(1068,'Martin',17),(1069,'Mason',17),(1070,'McCracken',17),(1071,'McCreary',17),(1072,'McLean',17),(1073,'Meade',17),(1074,'Menifee',17),(1075,'Mercer',17),(1076,'Metcalfe',17),(1077,'Monroe',17),(1078,'Montgomery',17),(1079,'Morgan',17),(1080,'Muhlenberg',17),(1081,'Nelson',17),(1082,'Nicholas',17),(1083,'Ohio',17),(1084,'Oldham',17),(1085,'Owen',17),(1086,'Owsley',17),(1087,'Pendleton',17),(1088,'Perry',17),(1089,'Pike',17),(1090,'Powell',17),(1091,'Pulaski',17),(1092,'Robertson',17),(1093,'Rockcastle',17),(1094,'Rowan',17),(1095,'Russell',17),(1096,'Scott',17),(1097,'Shelby',17),(1098,'Simpson',17),(1099,'Spencer',17),(1100,'Taylor',17),(1101,'Todd',17),(1102,'Trigg',17),(1103,'Trimble',17),(1104,'Union',17),(1105,'Warren',17),(1106,'Washington',17),(1107,'Wayne',17),(1108,'Webster',17),(1109,'Whitley',17),(1110,'Wolfe',17),(1111,'Woodford',17),(1112,'Acadia Parish',18),(1113,'Allen Parish',18),(1114,'Ascension Parish',18),(1115,'Assumption Parish',18),(1116,'Avoyelles Parish',18),(1117,'Beauregard Parish',18),(1118,'Bienville Parish',18),(1119,'Bossier Parish',18),(1120,'Caddo Parish',18),(1121,'Calcasieu Parish',18),(1122,'Caldwell Parish',18),(1123,'Cameron Parish',18),(1124,'Catahoula Parish',18),(1125,'Claiborne Parish',18),(1126,'Concordia Parish',18),(1127,'De Soto Parish',18),(1128,'East Baton Rouge Parish',18),(1129,'East Carroll Parish',18),(1130,'East Feliciana Parish',18),(1131,'Evangeline Parish',18),(1132,'Franklin Parish',18),(1133,'Grant Parish',18),(1134,'Iberia Parish',18),(1135,'Iberville Parish',18),(1136,'Jackson Parish',18),(1137,'Jefferson Parish',18),(1138,'Jefferson Davis Parish',18),(1139,'La Salle Parish',18),(1140,'Lafayette Parish',18),(1141,'Lafourche Parish',18),(1142,'Lincoln Parish',18),(1143,'Livingston Parish',18),(1144,'Madison Parish',18),(1145,'Morehouse Parish',18),(1146,'Natchitoches Parish',18),(1147,'Orleans Parish',18),(1148,'Ouachita Parish',18),(1149,'Plaquemines Parish',18),(1150,'Pointe Coupee Parish',18),(1151,'Rapides Parish',18),(1152,'Red River Parish',18),(1153,'Richland Parish',18),(1154,'Sabine Parish',18),(1155,'St. Bernard Parish',18),(1156,'St. Charles Parish',18),(1157,'St. Helena Parish',18),(1158,'St. James Parish',18),(1159,'St. John the Baptist Parish',18),(1160,'St. Landry Parish',18),(1161,'St. Martin Parish',18),(1162,'St. Mary Parish',18),(1163,'St. Tammany Parish',18),(1164,'Tangipahoa Parish',18),(1165,'Tensas Parish',18),(1166,'Terrebonne Parish',18),(1167,'Union Parish',18),(1168,'Vermilion Parish',18),(1169,'Vernon Parish',18),(1170,'Washington Parish',18),(1171,'Webster Parish',18),(1172,'West Baton Rouge Parish',18),(1173,'West Carroll Parish',18),(1174,'West Feliciana Parish',18),(1175,'Winn Parish',18),(1176,'Androscoggin',19),(1177,'Aroostook',19),(1178,'Cumberland',19),(1179,'Franklin',19),(1180,'Hancock',19),(1181,'Kennebec',19),(1182,'Knox',19),(1183,'Lincoln',19),(1184,'Oxford',19),(1185,'Penobscot',19),(1186,'Piscataquis',19),(1187,'Sagadahoc',19),(1188,'Somerset',19),(1189,'Waldo',19),(1190,'Washington',19),(1191,'York',19),(1192,'Allegany',20),(1193,'Anne Arundel',20),(1194,'Baltimore',20),(1195,'Calvert',20),(1196,'Caroline',20),(1197,'Carroll',20),(1198,'Cecil',20),(1199,'Charles',20),(1200,'Dorchester',20),(1201,'Frederick',20),(1202,'Garrett',20),(1203,'Harford',20),(1204,'Howard',20),(1205,'Kent',20),(1206,'Montgomery',20),(1207,'Prince George\'s',20),(1208,'Queen Anne\'s',20),(1209,'Somerset',20),(1210,'St. Mary\'s',20),(1211,'Talbot',20),(1212,'Washington',20),(1213,'Wicomico',20),(1214,'Worcester',20),(1215,'Barnstable',21),(1216,'Berkshire',21),(1217,'Bristol',21),(1218,'Dukes',21),(1219,'Essex',21),(1220,'Franklin',21),(1221,'Hampden',21),(1222,'Hampshire',21),(1223,'Middlesex',21),(1224,'Nantucket',21),(1225,'Norfolk',21),(1226,'Plymouth',21),(1227,'Suffolk',21),(1228,'Worcester',21),(1229,'Alcona',22),(1230,'Alger',22),(1231,'Allegan',22),(1232,'Alpena',22),(1233,'Antrim',22),(1234,'Arenac',22),(1235,'Baraga',22),(1236,'Barry',22),(1237,'Bay',22),(1238,'Benzie',22),(1239,'Berrien',22),(1240,'Branch',22),(1241,'Calhoun',22),(1242,'Cass',22),(1243,'Charlevoix',22),(1244,'Cheboygan',22),(1245,'Chippewa',22),(1246,'Clare',22),(1247,'Clinton',22),(1248,'Crawford',22),(1249,'Delta',22),(1250,'Dickinson',22),(1251,'Eaton',22),(1252,'Emmet',22),(1253,'Genesee',22),(1254,'Gladwin',22),(1255,'Gogebic',22),(1256,'Grand Traverse',22),(1257,'Gratiot',22),(1258,'Hillsdale',22),(1259,'Houghton',22),(1260,'Huron',22),(1261,'Ingham',22),(1262,'Ionia',22),(1263,'Iosco',22),(1264,'Iron',22),(1265,'Isabella',22),(1266,'Jackson',22),(1267,'Kalamazoo',22),(1268,'Kalkaska',22),(1269,'Kent',22),(1270,'Keweenaw',22),(1271,'Lake',22),(1272,'Lapeer',22),(1273,'Leelanau',22),(1274,'Lenawee',22),(1275,'Livingston',22),(1276,'Luce',22),(1277,'Mackinac',22),(1278,'Macomb',22),(1279,'Manistee',22),(1280,'Marquette',22),(1281,'Mason',22),(1282,'Mecosta',22),(1283,'Menominee',22),(1284,'Midland',22),(1285,'Missaukee',22),(1286,'Monroe',22),(1287,'Montcalm',22),(1288,'Montmorency',22),(1289,'Muskegon',22),(1290,'Newaygo',22),(1291,'Oakland',22),(1292,'Oceana',22),(1293,'Ogemaw',22),(1294,'Ontonagon',22),(1295,'Osceola',22),(1296,'Oscoda',22),(1297,'Otsego',22),(1298,'Ottawa',22),(1299,'Presque Isle',22),(1300,'Roscommon',22),(1301,'Saginaw',22),(1302,'Sanilac',22),(1303,'Schoolcraft',22),(1304,'Shiawassee',22),(1305,'St. Clair',22),(1306,'St. Joseph',22),(1307,'Tuscola',22),(1308,'Van Buren',22),(1309,'Washtenaw',22),(1310,'Wayne',22),(1311,'Wexford',22),(1312,'Aitkin',23),(1313,'Anoka',23),(1314,'Becker',23),(1315,'Beltrami',23),(1316,'Benton',23),(1317,'Big Stone',23),(1318,'Blue Earth',23),(1319,'Brown',23),(1320,'Carlton',23),(1321,'Carver',23),(1322,'Cass',23),(1323,'Chippewa',23),(1324,'Chisago',23),(1325,'Clay',23),(1326,'Clearwater',23),(1327,'Cook',23),(1328,'Cottonwood',23),(1329,'Crow Wing',23),(1330,'Dakota',23),(1331,'Dodge',23),(1332,'Douglas',23),(1333,'Faribault',23),(1334,'Fillmore',23),(1335,'Freeborn',23),(1336,'Goodhue',23),(1337,'Grant',23),(1338,'Hennepin',23),(1339,'Houston',23),(1340,'Hubbard',23),(1341,'Isanti',23),(1342,'Itasca',23),(1343,'Jackson',23),(1344,'Kanabec',23),(1345,'Kandiyohi',23),(1346,'Kittson',23),(1347,'Koochiching',23),(1348,'Lac qui Parle',23),(1349,'Lake',23),(1350,'Lake of the Woods',23),(1351,'Le Sueur',23),(1352,'Lincoln',23),(1353,'Lyon',23),(1354,'Mahnomen',23),(1355,'Marshall',23),(1356,'Martin',23),(1357,'McLeod',23),(1358,'Meeker',23),(1359,'Mille Lacs',23),(1360,'Morrison',23),(1361,'Mower',23),(1362,'Murray',23),(1363,'Nicollet',23),(1364,'Nobles',23),(1365,'Norman',23),(1366,'Olmsted',23),(1367,'Otter Tail',23),(1368,'Pennington',23),(1369,'Pine',23),(1370,'Pipestone',23),(1371,'Polk',23),(1372,'Pope',23),(1373,'Ramsey',23),(1374,'Red Lake',23),(1375,'Redwood',23),(1376,'Renville',23),(1377,'Rice',23),(1378,'Rock',23),(1379,'Roseau',23),(1380,'Scott',23),(1381,'Sherburne',23),(1382,'Sibley',23),(1383,'St. Louis',23),(1384,'Stearns',23),(1385,'Steele',23),(1386,'Stevens',23),(1387,'Swift',23),(1388,'Todd',23),(1389,'Traverse',23),(1390,'Wabasha',23),(1391,'Wadena',23),(1392,'Waseca',23),(1393,'Washington',23),(1394,'Watonwan',23),(1395,'Wilkin',23),(1396,'Winona',23),(1397,'Wright',23),(1398,'Yellow Medicine',23),(1399,'Adams',24),(1400,'Alcorn',24),(1401,'Amite',24),(1402,'Attala',24),(1403,'Benton',24),(1404,'Bolivar',24),(1405,'Calhoun',24),(1406,'Carroll',24),(1407,'Chickasaw',24),(1408,'Choctaw',24),(1409,'Claiborne',24),(1410,'Clarke',24),(1411,'Clay',24),(1412,'Coahoma',24),(1413,'Copiah',24),(1414,'Covington',24),(1415,'De Soto',24),(1416,'Forrest',24),(1417,'Franklin',24),(1418,'George',24),(1419,'Greene',24),(1420,'Grenada',24),(1421,'Hancock',24),(1422,'Harrison',24),(1423,'Hinds',24),(1424,'Holmes',24),(1425,'Humphreys',24),(1426,'Issaquena',24),(1427,'Itawamba',24),(1428,'Jackson',24),(1429,'Jasper',24),(1430,'Jefferson',24),(1431,'Jefferson Davis',24),(1432,'Jones',24),(1433,'Kemper',24),(1434,'Lafayette',24),(1435,'Lamar',24),(1436,'Lauderdale',24),(1437,'Lawrence',24),(1438,'Leake',24),(1439,'Lee',24),(1440,'Leflore',24),(1441,'Lincoln',24),(1442,'Lowndes',24),(1443,'Madison',24),(1444,'Marion',24),(1445,'Marshall',24),(1446,'Monroe',24),(1447,'Montgomery',24),(1448,'Neshoba',24),(1449,'Newton',24),(1450,'Noxubee',24),(1451,'Oktibbeha',24),(1452,'Panola',24),(1453,'Pearl River',24),(1454,'Perry',24),(1455,'Pike',24),(1456,'Pontotoc',24),(1457,'Prentiss',24),(1458,'Quitman',24),(1459,'Rankin',24),(1460,'Scott',24),(1461,'Sharkey',24),(1462,'Simpson',24),(1463,'Smith',24),(1464,'Stone',24),(1465,'Sunflower',24),(1466,'Tallahatchie',24),(1467,'Tate',24),(1468,'Tippah',24),(1469,'Tishomingo',24),(1470,'Tunica',24),(1471,'Union',24),(1472,'Walthall',24),(1473,'Warren',24),(1474,'Washington',24),(1475,'Wayne',24),(1476,'Webster',24),(1477,'Wilkinson',24),(1478,'Winston',24),(1479,'Yalobusha',24),(1480,'Yazoo',24),(1481,'Adair',25),(1482,'Andrew',25),(1483,'Atchison',25),(1484,'Audrain',25),(1485,'Barry',25),(1486,'Barton',25),(1487,'Bates',25),(1488,'Benton',25),(1489,'Bollinger',25),(1490,'Boone',25),(1491,'Buchanan',25),(1492,'Butler',25),(1493,'Caldwell',25),(1494,'Callaway',25),(1495,'Camden',25),(1496,'Cape Girardeau',25),(1497,'Carroll',25),(1498,'Carter',25),(1499,'Cass',25),(1500,'Cedar',25),(1501,'Chariton',25),(1502,'Christian',25),(1503,'Clark',25),(1504,'Clay',25),(1505,'Clinton',25),(1506,'Cole',25),(1507,'Cooper',25),(1508,'Crawford',25),(1509,'Dade',25),(1510,'Dallas',25),(1511,'Daviess',25),(1512,'DeKalb',25),(1513,'Dent',25),(1514,'Douglas',25),(1515,'Dunklin',25),(1516,'Franklin',25),(1517,'Gasconade',25),(1518,'Gentry',25),(1519,'Greene',25),(1520,'Grundy',25),(1521,'Harrison',25),(1522,'Henry',25),(1523,'Hickory',25),(1524,'Holt',25),(1525,'Howard',25),(1526,'Howell',25),(1527,'Iron',25),(1528,'Jackson',25),(1529,'Jasper',25),(1530,'Jefferson',25),(1531,'Johnson',25),(1532,'Knox',25),(1533,'Laclede',25),(1534,'Lafayette',25),(1535,'Lawrence',25),(1536,'Lewis',25),(1537,'Lincoln',25),(1538,'Linn',25),(1539,'Livingston',25),(1540,'Macon',25),(1541,'Madison',25),(1542,'Maries',25),(1543,'Marion',25),(1544,'McDonald',25),(1545,'Mercer',25),(1546,'Miller',25),(1547,'Mississippi',25),(1548,'Moniteau',25),(1549,'Monroe',25),(1550,'Montgomery',25),(1551,'Morgan',25),(1552,'New Madrid',25),(1553,'Newton',25),(1554,'Nodaway',25),(1555,'Oregon',25),(1556,'Osage',25),(1557,'Ozark',25),(1558,'Pemiscot',25),(1559,'Perry',25),(1560,'Pettis',25),(1561,'Phelps',25),(1562,'Pike',25),(1563,'Platte',25),(1564,'Polk',25),(1565,'Pulaski',25),(1566,'Putnam',25),(1567,'Ralls',25),(1568,'Randolph',25),(1569,'Ray',25),(1570,'Reynolds',25),(1571,'Ripley',25),(1572,'Saline',25),(1573,'Schuyler',25),(1574,'Scotland',25),(1575,'Scott',25),(1576,'Shannon',25),(1577,'Shelby',25),(1578,'St. Charles',25),(1579,'St. Clair',25),(1580,'St. Francois',25),(1581,'St. Louis',25),(1582,'Ste. Genevieve',25),(1583,'Stoddard',25),(1584,'Stone',25),(1585,'Sullivan',25),(1586,'Taney',25),(1587,'Texas',25),(1588,'Vernon',25),(1589,'Warren',25),(1590,'Washington',25),(1591,'Wayne',25),(1592,'Webster',25),(1593,'Worth',25),(1594,'Wright',25),(1595,'Beaverhead',26),(1596,'Big Horn',26),(1597,'Blaine',26),(1598,'Broadwater',26),(1599,'Carbon',26),(1600,'Carter',26),(1601,'Cascade',26),(1602,'Chouteau',26),(1603,'Custer',26),(1604,'Daniels',26),(1605,'Dawson',26),(1606,'Deer Lodge',26),(1607,'Fallon',26),(1608,'Fergus',26),(1609,'Flathead',26),(1610,'Gallatin',26),(1611,'Garfield',26),(1612,'Glacier',26),(1613,'Golden Valley',26),(1614,'Granite',26),(1615,'Hill',26),(1616,'Jefferson',26),(1617,'Judith Basin',26),(1618,'Lake',26),(1619,'Lewis and Clark',26),(1620,'Liberty',26),(1621,'Lincoln',26),(1622,'Madison',26),(1623,'McCone',26),(1624,'Meagher',26),(1625,'Mineral',26),(1626,'Missoula',26),(1627,'Musselshell',26),(1628,'Park',26),(1629,'Petroleum',26),(1630,'Phillips',26),(1631,'Pondera',26),(1632,'Powder River',26),(1633,'Powell',26),(1634,'Prairie',26),(1635,'Ravalli',26),(1636,'Richland',26),(1637,'Roosevelt',26),(1638,'Rosebud',26),(1639,'Sanders',26),(1640,'Sheridan',26),(1641,'Silver Bow',26),(1642,'Stillwater',26),(1643,'Sweet Grass',26),(1644,'Teton',26),(1645,'Toole',26),(1646,'Treasure',26),(1647,'Valley',26),(1648,'Wheatland',26),(1649,'Wibaux',26),(1650,'Yellowstone',26),(1651,'Platte',27),(1652,'Adams',27),(1653,'Antelope',27),(1654,'Arthur',27),(1655,'Banner',27),(1656,'Blaine',27),(1657,'Boone',27),(1658,'Box Butte',27),(1659,'Boyd',27),(1660,'Brown',27),(1661,'Buffalo',27),(1662,'Burt',27),(1663,'Butler',27),(1664,'Cass',27),(1665,'Cedar',27),(1666,'Chase',27),(1667,'Cherry',27),(1668,'Cheyenne',27),(1669,'Clay',27),(1670,'Colfax',27),(1671,'Cuming',27),(1672,'Custer',27),(1673,'Dakota',27),(1674,'Dawes',27),(1675,'Dawson',27),(1676,'Deuel',27),(1677,'Dixon',27),(1678,'Dodge',27),(1679,'Douglas',27),(1680,'Dundy',27),(1681,'Fillmore',27),(1682,'Franklin',27),(1683,'Frontier',27),(1684,'Furnas',27),(1685,'Gage',27),(1686,'Garden',27),(1687,'Garfield',27),(1688,'Gosper',27),(1689,'Grant',27),(1690,'Greeley',27),(1691,'Hall',27),(1692,'Hamilton',27),(1693,'Harlan',27),(1694,'Hayes',27),(1695,'Hitchcock',27),(1696,'Holt',27),(1697,'Hooker',27),(1698,'Howard',27),(1699,'Jefferson',27),(1700,'Johnson',27),(1701,'Kearney',27),(1702,'Keith',27),(1703,'Keya Paha',27),(1704,'Kimball',27),(1705,'Knox',27),(1706,'Lancaster',27),(1707,'Lincoln',27),(1708,'Logan',27),(1709,'Loup',27),(1710,'Madison',27),(1711,'McPherson',27),(1712,'Merrick',27),(1713,'Morrill',27),(1714,'Nance',27),(1715,'Nemaha',27),(1716,'Nuckolls',27),(1717,'Otoe',27),(1718,'Pawnee',27),(1719,'Perkins',27),(1720,'Phelps',27),(1721,'Pierce',27),(1722,'Polk',27),(1723,'Red Willow',27),(1724,'Richardson',27),(1725,'Rock',27),(1726,'Saline',27),(1727,'Sarpy',27),(1728,'Saunders',27),(1729,'Scotts Bluff',27),(1730,'Seward',27),(1731,'Sheridan',27),(1732,'Sherman',27),(1733,'Sioux',27),(1734,'Stanton',27),(1735,'Thayer',27),(1736,'Thomas',27),(1737,'Thurston',27),(1738,'Valley',27),(1739,'Washington',27),(1740,'Wayne',27),(1741,'Webster',27),(1742,'Wheeler',27),(1743,'York',27),(1744,'Churchill',28),(1745,'Clark',28),(1746,'Douglas',28),(1747,'Elko',28),(1748,'Esmeralda',28),(1749,'Eureka',28),(1750,'Humboldt',28),(1751,'Lander',28),(1752,'Lincoln',28),(1753,'Lyon',28),(1754,'Mineral',28),(1755,'Nye',28),(1756,'Pershing',28),(1757,'Storey',28),(1758,'Washoe',28),(1759,'White Pine',28),(1760,'Belknap',29),(1761,'Carroll',29),(1762,'Cheshire',29),(1763,'Coos',29),(1764,'Grafton',29),(1765,'Hillsborough',29),(1766,'Merrimack',29),(1767,'Rockingham',29),(1768,'Strafford',29),(1769,'Sullivan',29),(1770,'Atlantic',30),(1771,'Bergen',30),(1772,'Burlington',30),(1773,'Camden',30),(1774,'Cape May',30),(1775,'Cumberland',30),(1776,'Essex',30),(1777,'Gloucester',30),(1778,'Hudson',30),(1779,'Hunterdon',30),(1780,'Mercer',30),(1781,'Middlesex',30),(1782,'Monmouth',30),(1783,'Morris',30),(1784,'Ocean',30),(1785,'Passaic',30),(1786,'Salem',30),(1787,'Somerset',30),(1788,'Sussex',30),(1789,'Union',30),(1790,'Warren',30),(1791,'Bernalillo',31),(1792,'Catron',31),(1793,'Chaves',31),(1794,'Cibola',31),(1795,'Colfax',31),(1796,'Curry',31),(1797,'DeBaca',31),(1798,'Do̱a Ana',31),(1799,'Eddy',31),(1800,'Grant',31),(1801,'Guadalupe',31),(1802,'Harding',31),(1803,'Hidalgo',31),(1804,'Lea',31),(1805,'Lincoln',31),(1806,'Los Alamos',31),(1807,'Luna',31),(1808,'McKinley',31),(1809,'Mora',31),(1810,'Otero',31),(1811,'Quay',31),(1812,'Rio Arriba',31),(1813,'Roosevelt',31),(1814,'San Juan',31),(1815,'San Miguel',31),(1816,'Sandoval',31),(1817,'Santa Fe',31),(1818,'Sierra',31),(1819,'Socorro',31),(1820,'Taos',31),(1821,'Torrance',31),(1822,'Union',31),(1823,'Valencia',31),(1824,'Albany',32),(1825,'Allegany',32),(1826,'Bronx',32),(1827,'Broome',32),(1828,'Cattaraugus',32),(1829,'Cayuga',32),(1830,'Chautauqua',32),(1831,'Chemung',32),(1832,'Chenango',32),(1833,'Clinton',32),(1834,'Columbia',32),(1835,'Cortland',32),(1836,'Delaware',32),(1837,'Dutchess',32),(1838,'Erie',32),(1839,'Essex',32),(1840,'Franklin',32),(1841,'Fulton',32),(1842,'Genesee',32),(1843,'Greene',32),(1844,'Hamilton',32),(1845,'Herkimer',32),(1846,'Jefferson',32),(1847,'Kings',32),(1848,'Lewis',32),(1849,'Livingston',32),(1850,'Madison',32),(1851,'Monroe',32),(1852,'Montgomery',32),(1853,'Nassau',32),(1854,'New York',32),(1855,'Niagara',32),(1856,'Oneida',32),(1857,'Onondaga',32),(1858,'Ontario',32),(1859,'Orange',32),(1860,'Orleans',32),(1861,'Oswego',32),(1862,'Otsego',32),(1863,'Putnam',32),(1864,'Queens',32),(1865,'Rensselaer',32),(1866,'Richmond',32),(1867,'Rockland',32),(1868,'Saratoga',32),(1869,'Schenectady',32),(1870,'Schoharie',32),(1871,'Schuyler',32),(1872,'Seneca',32),(1873,'St. Lawrence',32),(1874,'Steuben',32),(1875,'Suffolk',32),(1876,'Sullivan',32),(1877,'Tioga',32),(1878,'Tompkins',32),(1879,'Ulster',32),(1880,'Warren',32),(1881,'Washington',32),(1882,'Wayne',32),(1883,'Westchester',32),(1884,'Wyoming',32),(1885,'Yates',32),(1886,'Alamance',33),(1887,'Alexander',33),(1888,'Alleghany',33),(1889,'Anson',33),(1890,'Ashe',33),(1891,'Avery',33),(1892,'Beaufort',33),(1893,'Bertie',33),(1894,'Bladen',33),(1895,'Brunswick',33),(1896,'Buncombe',33),(1897,'Burke',33),(1898,'Cabarrus',33),(1899,'Caldwell',33),(1900,'Camden',33),(1901,'Carteret',33),(1902,'Caswell',33),(1903,'Catawba',33),(1904,'Chatham',33),(1905,'Cherokee',33),(1906,'Chowan',33),(1907,'Clay',33),(1908,'Cleveland',33),(1909,'Columbus',33),(1910,'Craven',33),(1911,'Cumberland',33),(1912,'Currituck',33),(1913,'Dare',33),(1914,'Davidson',33),(1915,'Davie',33),(1916,'Duplin',33),(1917,'Durham',33),(1918,'Edgecombe',33),(1919,'Forsyth',33),(1920,'Franklin',33),(1921,'Gaston',33),(1922,'Gates',33),(1923,'Graham',33),(1924,'Granville',33),(1925,'Greene',33),(1926,'Guilford',33),(1927,'Halifax',33),(1928,'Harnett',33),(1929,'Haywood',33),(1930,'Henderson',33),(1931,'Hertford',33),(1932,'Hoke',33),(1933,'Hyde',33),(1934,'Iredell',33),(1935,'Jackson',33),(1936,'Johnston',33),(1937,'Jones',33),(1938,'Lee',33),(1939,'Lenoir',33),(1940,'Lincoln',33),(1941,'Macon',33),(1942,'Madison',33),(1943,'Martin',33),(1944,'McDowell',33),(1945,'Mecklenburg',33),(1946,'Mitchell',33),(1947,'Montgomery',33),(1948,'Moore',33),(1949,'Nash',33),(1950,'New Hanover',33),(1951,'Northampton',33),(1952,'Onslow',33),(1953,'Orange',33),(1954,'Pamlico',33),(1955,'Pasquotank',33),(1956,'Pender',33),(1957,'Perquimans',33),(1958,'Person',33),(1959,'Pitt',33),(1960,'Polk',33),(1961,'Randolph',33),(1962,'Richmond',33),(1963,'Robeson',33),(1964,'Rockingham',33),(1965,'Rowan',33),(1966,'Rutherford',33),(1967,'Sampson',33),(1968,'Scotland',33),(1969,'Stanly',33),(1970,'Stokes',33),(1971,'Surry',33),(1972,'Swain',33),(1973,'Transylvania',33),(1974,'Tyrrell',33),(1975,'Union',33),(1976,'Vance',33),(1977,'Wake',33),(1978,'Warren',33),(1979,'Washington',33),(1980,'Watauga',33),(1981,'Wayne',33),(1982,'Wilkes',33),(1983,'Wilson',33),(1984,'Yadkin',33),(1985,'Yancey',33),(1986,'Adams',34),(1987,'Barnes',34),(1988,'Benson',34),(1989,'Billings',34),(1990,'Bottineau',34),(1991,'Bowman',34),(1992,'Burke',34),(1993,'Burleigh',34),(1994,'Cass',34),(1995,'Cavalier',34),(1996,'Dickey',34),(1997,'Divide',34),(1998,'Dunn',34),(1999,'Eddy',34),(2000,'Emmons',34),(2001,'Foster',34),(2002,'Golden Valley',34),(2003,'Grand Forks',34),(2004,'Grant',34),(2005,'Griggs',34),(2006,'Hettinger',34),(2007,'Kidder',34),(2008,'La Moure',34),(2009,'Logan',34),(2010,'McHenry',34),(2011,'McIntosh',34),(2012,'McKenzie',34),(2013,'McLean',34),(2014,'Mercer',34),(2015,'Morton',34),(2016,'Mountrail',34),(2017,'Nelson',34),(2018,'Oliver',34),(2019,'Pembina',34),(2020,'Pierce',34),(2021,'Ramsey',34),(2022,'Ransom',34),(2023,'Renville',34),(2024,'Richland',34),(2025,'Rolette',34),(2026,'Sargent',34),(2027,'Sheridan',34),(2028,'Sioux',34),(2029,'Slope',34),(2030,'Stark',34),(2031,'Steele',34),(2032,'Stutsman',34),(2033,'Towner',34),(2034,'Traill',34),(2035,'Walsh',34),(2036,'Ward',34),(2037,'Wells',34),(2038,'Williams',34),(2039,'Adams',35),(2040,'Allen',35),(2041,'Ashland',35),(2042,'Ashtabula',35),(2043,'Athens',35),(2044,'Auglaize',35),(2045,'Belmont',35),(2046,'Brown',35),(2047,'Butler',35),(2048,'Carroll',35),(2049,'Champaign',35),(2050,'Clark',35),(2051,'Clermont',35),(2052,'Clinton',35),(2053,'Columbiana',35),(2054,'Coshocton',35),(2055,'Crawford',35),(2056,'Cuyahoga',35),(2057,'Darke',35),(2058,'Defiance',35),(2059,'Delaware',35),(2060,'Erie',35),(2061,'Fairfield',35),(2062,'Fayette',35),(2063,'Franklin',35),(2064,'Fulton',35),(2065,'Gallia',35),(2066,'Geauga',35),(2067,'Greene',35),(2068,'Guernsey',35),(2069,'Hamilton',35),(2070,'Hancock',35),(2071,'Hardin',35),(2072,'Harrison',35),(2073,'Henry',35),(2074,'Highland',35),(2075,'Hocking',35),(2076,'Holmes',35),(2077,'Huron',35),(2078,'Jackson',35),(2079,'Jefferson',35),(2080,'Knox',35),(2081,'Lake',35),(2082,'Lawrence',35),(2083,'Licking',35),(2084,'Logan',35),(2085,'Lorain',35),(2086,'Lucas',35),(2087,'Madison',35),(2088,'Mahoning',35),(2089,'Marion',35),(2090,'Medina',35),(2091,'Meigs',35),(2092,'Mercer',35),(2093,'Miami',35),(2094,'Monroe',35),(2095,'Montgomery',35),(2096,'Morgan',35),(2097,'Morrow',35),(2098,'Muskingum',35),(2099,'Noble',35),(2100,'Ottawa',35),(2101,'Paulding',35),(2102,'Perry',35),(2103,'Pickaway',35),(2104,'Pike',35),(2105,'Portage',35),(2106,'Preble',35),(2107,'Putnam',35),(2108,'Richland',35),(2109,'Ross',35),(2110,'Sandusky',35),(2111,'Scioto',35),(2112,'Seneca',35),(2113,'Shelby',35),(2114,'Stark',35),(2115,'Summit',35),(2116,'Trumbull',35),(2117,'Tuscarawas',35),(2118,'Union',35),(2119,'Van Wert',35),(2120,'Vinton',35),(2121,'Warren',35),(2122,'Washington',35),(2123,'Wayne',35),(2124,'Williams',35),(2125,'Wood',35),(2126,'Wyandot',35),(2127,'Adair',36),(2128,'Alfalfa',36),(2129,'Atoka',36),(2130,'Beaver',36),(2131,'Beckham',36),(2132,'Blaine',36),(2133,'Bryan',36),(2134,'Caddo',36),(2135,'Canadian',36),(2136,'Carter',36),(2137,'Cherokee',36),(2138,'Choctaw',36),(2139,'Cimarron',36),(2140,'Cleveland',36),(2141,'Coal',36),(2142,'Comanche',36),(2143,'Cotton',36),(2144,'Craig',36),(2145,'Creek',36),(2146,'Custer',36),(2147,'Delaware',36),(2148,'Dewey',36),(2149,'Ellis',36),(2150,'Garfield',36),(2151,'Garvin',36),(2152,'Grady',36),(2153,'Grant',36),(2154,'Greer',36),(2155,'Harmon',36),(2156,'Harper',36),(2157,'Haskell',36),(2158,'Hughes',36),(2159,'Jackson',36),(2160,'Jefferson',36),(2161,'Johnston',36),(2162,'Kay',36),(2163,'Kingfisher',36),(2164,'Kiowa',36),(2165,'Latimer',36),(2166,'Le Flore',36),(2167,'Lincoln',36),(2168,'Logan',36),(2169,'Love',36),(2170,'Major',36),(2171,'Marshall',36),(2172,'Mayes',36),(2173,'McClain',36),(2174,'McCurtain',36),(2175,'McIntosh',36),(2176,'Murray',36),(2177,'Muskogee',36),(2178,'Noble',36),(2179,'Nowata',36),(2180,'Okfuskee',36),(2181,'Oklahoma',36),(2182,'Okmulgee',36),(2183,'Osage',36),(2184,'Ottawa',36),(2185,'Pawnee',36),(2186,'Payne',36),(2187,'Pittsburg',36),(2188,'Pontotoc',36),(2189,'Pottawatomie',36),(2190,'Pushmataha',36),(2191,'Roger Mills',36),(2192,'Rogers',36),(2193,'Seminole',36),(2194,'Sequoyah',36),(2195,'Stephens',36),(2196,'Texas',36),(2197,'Tillman',36),(2198,'Tulsa',36),(2199,'Wagoner',36),(2200,'Washington',36),(2201,'Washita',36),(2202,'Woods',36),(2203,'Woodward',36),(2204,'Baker',37),(2205,'Benton',37),(2206,'Clackamas',37),(2207,'Clatsop',37),(2208,'Columbia',37),(2209,'Coos',37),(2210,'Crook',37),(2211,'Curry',37),(2212,'Deschutes',37),(2213,'Douglas',37),(2214,'Gilliam',37),(2215,'Grant',37),(2216,'Harney',37),(2217,'Hood River',37),(2218,'Jackson',37),(2219,'Jefferson',37),(2220,'Josephine',37),(2221,'Klamath',37),(2222,'Lake',37),(2223,'Lane',37),(2224,'Lincoln',37),(2225,'Linn',37),(2226,'Malheur',37),(2227,'Marion',37),(2228,'Morrow',37),(2229,'Multnomah',37),(2230,'Polk',37),(2231,'Sherman',37),(2232,'Tillamook',37),(2233,'Umatilla',37),(2234,'Union',37),(2235,'Wallowa',37),(2236,'Wasco',37),(2237,'Washington',37),(2238,'Wheeler',37),(2239,'Yamhill',37),(2240,'Adams',38),(2241,'Allegheny',38),(2242,'Armstrong',38),(2243,'Beaver',38),(2244,'Bedford',38),(2245,'Berks',38),(2246,'Blair',38),(2247,'Bradford',38),(2248,'Bucks',38),(2249,'Butler',38),(2250,'Cambria',38),(2251,'Cameron',38),(2252,'Carbon',38),(2253,'Centre',38),(2254,'Chester',38),(2255,'Clarion',38),(2256,'Clearfield',38),(2257,'Clinton',38),(2258,'Columbia',38),(2259,'Crawford',38),(2260,'Cumberland',38),(2261,'Dauphin',38),(2262,'Delaware',38),(2263,'Elk',38),(2264,'Erie',38),(2265,'Fayette',38),(2266,'Forest',38),(2267,'Franklin',38),(2268,'Fulton',38),(2269,'Greene',38),(2270,'Huntingdon',38),(2271,'Indiana',38),(2272,'Jefferson',38),(2273,'Juniata',38),(2274,'Lackawanna',38),(2275,'Lancaster',38),(2276,'Lawrence',38),(2277,'Lebanon',38),(2278,'Lehigh',38),(2279,'Luzerne',38),(2280,'Lycoming',38),(2281,'McKean',38),(2282,'Mercer',38),(2283,'Mifflin',38),(2284,'Monroe',38),(2285,'Montgomery',38),(2286,'Montour',38),(2287,'Northampton',38),(2288,'Northumberland',38),(2289,'Perry',38),(2290,'Philadelphia',38),(2291,'Pike',38),(2292,'Potter',38),(2293,'Schuylkill',38),(2294,'Snyder',38),(2295,'Somerset',38),(2296,'Sullivan',38),(2297,'Susquehanna',38),(2298,'Tioga',38),(2299,'Union',38),(2300,'Venango',38),(2301,'Warren',38),(2302,'Washington',38),(2303,'Wayne',38),(2304,'Westmoreland',38),(2305,'Wyoming',38),(2306,'York',38),(2307,'Bristol',39),(2308,'Kent',39),(2309,'Newport',39),(2310,'Providence',39),(2311,'Washington',39),(2312,'Abbeville',40),(2313,'Aiken',40),(2314,'Allendale',40),(2315,'Anderson',40),(2316,'Bamberg',40),(2317,'Barnwell',40),(2318,'Beaufort',40),(2319,'Berkeley',40),(2320,'Calhoun',40),(2321,'Charleston',40),(2322,'Cherokee',40),(2323,'Chester',40),(2324,'Chesterfield',40),(2325,'Clarendon',40),(2326,'Colleton',40),(2327,'Darlington',40),(2328,'Dillon',40),(2329,'Dorchester',40),(2330,'Edgefield',40),(2331,'Fairfield',40),(2332,'Florence',40),(2333,'Georgetown',40),(2334,'Greenville',40),(2335,'Greenwood',40),(2336,'Hampton',40),(2337,'Horry',40),(2338,'Jasper',40),(2339,'Kershaw',40),(2340,'Lancaster',40),(2341,'Laurens',40),(2342,'Lee',40),(2343,'Lexington',40),(2344,'Marion',40),(2345,'Marlboro',40),(2346,'McCormick',40),(2347,'Newberry',40),(2348,'Oconee',40),(2349,'Orangeburg',40),(2350,'Pickens',40),(2351,'Richland',40),(2352,'Saluda',40),(2353,'Spartanburg',40),(2354,'Sumter',40),(2355,'Union',40),(2356,'Williamsburg',40),(2357,'York',40),(2358,'Aurora',41),(2359,'Beadle',41),(2360,'Bennett',41),(2361,'Bon Homme',41),(2362,'Brookings',41),(2363,'Brown',41),(2364,'Brule',41),(2365,'Buffalo',41),(2366,'Butte',41),(2367,'Campbell',41),(2368,'Charles Mix',41),(2369,'Clark',41),(2370,'Clay',41),(2371,'Codington',41),(2372,'Corson',41),(2373,'Custer',41),(2374,'Davison',41),(2375,'Day',41),(2376,'Deuel',41),(2377,'Dewey',41),(2378,'Douglas',41),(2379,'Edmunds',41),(2380,'Fall River',41),(2381,'Faulk',41),(2382,'Grant',41),(2383,'Gregory',41),(2384,'Haakon',41),(2385,'Hamlin',41),(2386,'Hand',41),(2387,'Hanson',41),(2388,'Harding',41),(2389,'Hughes',41),(2390,'Hutchinson',41),(2391,'Hyde',41),(2392,'Jackson',41),(2393,'Jerauld',41),(2394,'Jones',41),(2395,'Kingsbury',41),(2396,'Lake',41),(2397,'Lawrence',41),(2398,'Lincoln',41),(2399,'Lyman',41),(2400,'Marshall',41),(2401,'McCook',41),(2402,'McPherson',41),(2403,'Meade',41),(2404,'Mellette',41),(2405,'Miner',41),(2406,'Minnehaha',41),(2407,'Moody',41),(2408,'Pennington',41),(2409,'Perkins',41),(2410,'Potter',41),(2411,'Roberts',41),(2412,'Sanborn',41),(2413,'Shannon',41),(2414,'Spink',41),(2415,'Stanley',41),(2416,'Sully',41),(2417,'Todd',41),(2418,'Tripp',41),(2419,'Turner',41),(2420,'Union',41),(2421,'Walworth',41),(2422,'Yankton',41),(2423,'Ziebach',41),(2424,'Anderson',42),(2425,'Bedford',42),(2426,'Benton',42),(2427,'Bledsoe',42),(2428,'Blount',42),(2429,'Bradley',42),(2430,'Campbell',42),(2431,'Cannon',42),(2432,'Carroll',42),(2433,'Carter',42),(2434,'Cheatham',42),(2435,'Chester',42),(2436,'Claiborne',42),(2437,'Clay',42),(2438,'Cocke',42),(2439,'Coffee',42),(2440,'Crockett',42),(2441,'Cumberland',42),(2442,'Davidson',42),(2443,'DeKalb',42),(2444,'Decatur',42),(2445,'Dickson',42),(2446,'Dyer',42),(2447,'Fayette',42),(2448,'Fentress',42),(2449,'Franklin',42),(2450,'Gibson',42),(2451,'Giles',42),(2452,'Grainger',42),(2453,'Greene',42),(2454,'Grundy',42),(2455,'Hamblen',42),(2456,'Hamilton',42),(2457,'Hancock',42),(2458,'Hardeman',42),(2459,'Hardin',42),(2460,'Hawkins',42),(2461,'Haywood',42),(2462,'Henderson',42),(2463,'Henry',42),(2464,'Hickman',42),(2465,'Houston',42),(2466,'Humphreys',42),(2467,'Jackson',42),(2468,'Jefferson',42),(2469,'Johnson',42),(2470,'Knox',42),(2471,'Lake',42),(2472,'Lauderdale',42),(2473,'Lawrence',42),(2474,'Lewis',42),(2475,'Lincoln',42),(2476,'Loudon',42),(2477,'Macon',42),(2478,'Madison',42),(2479,'Marion',42),(2480,'Marshall',42),(2481,'Maury',42),(2482,'McMinn',42),(2483,'McNairy',42),(2484,'Meigs',42),(2485,'Monroe',42),(2486,'Montgomery',42),(2487,'Moore',42),(2488,'Morgan',42),(2489,'Obion',42),(2490,'Overton',42),(2491,'Perry',42),(2492,'Pickett',42),(2493,'Polk',42),(2494,'Putnam',42),(2495,'Rhea',42),(2496,'Roane',42),(2497,'Robertson',42),(2498,'Rutherford',42),(2499,'Scott',42),(2500,'Sequatchie',42),(2501,'Sevier',42),(2502,'Shelby',42),(2503,'Smith',42),(2504,'Stewart',42),(2505,'Sullivan',42),(2506,'Sumner',42),(2507,'Tipton',42),(2508,'Trousdale',42),(2509,'Unicoi',42),(2510,'Union',42),(2511,'Van Buren',42),(2512,'Warren',42),(2513,'Washington',42),(2514,'Wayne',42),(2515,'Weakley',42),(2516,'White',42),(2517,'Williamson',42),(2518,'Wilson',42),(2519,'Anderson',43),(2520,'Andrews',43),(2521,'Angelina',43),(2522,'Aransas',43),(2523,'Archer',43),(2524,'Armstrong',43),(2525,'Atascosa',43),(2526,'Austin',43),(2527,'Bailey',43),(2528,'Bandera',43),(2529,'Bastrop',43),(2530,'Baylor',43),(2531,'Bee',43),(2532,'Bell',43),(2533,'Bexar',43),(2534,'Blanco',43),(2535,'Borden',43),(2536,'Bosque',43),(2537,'Bowie',43),(2538,'Brazoria',43),(2539,'Brazos',43),(2540,'Brewster',43),(2541,'Briscoe',43),(2542,'Brooks',43),(2543,'Brown',43),(2544,'Burleson',43),(2545,'Burnet',43),(2546,'Caldwell',43),(2547,'Calhoun',43),(2548,'Callahan',43),(2549,'Cameron',43),(2550,'Camp',43),(2551,'Carson',43),(2552,'Cass',43),(2553,'Castro',43),(2554,'Chambers',43),(2555,'Cherokee',43),(2556,'Childress',43),(2557,'Clay',43),(2558,'Cochran',43),(2559,'Coke',43),(2560,'Coleman',43),(2561,'Collin',43),(2562,'Collingsworth',43),(2563,'Colorado',43),(2564,'Comal',43),(2565,'Comanche',43),(2566,'Concho',43),(2567,'Cooke',43),(2568,'Coryell',43),(2569,'Cottle',43),(2570,'Crane',43),(2571,'Crockett',43),(2572,'Crosby',43),(2573,'Culberson',43),(2574,'Dallam',43),(2575,'Dallas',43),(2576,'Dawson',43),(2577,'DeWitt',43),(2578,'Deaf Smith',43),(2579,'Delta',43),(2580,'Denton',43),(2581,'Dickens',43),(2582,'Dimmit',43),(2583,'Donley',43),(2584,'Duval',43),(2585,'Eastland',43),(2586,'Ector',43),(2587,'Edwards',43),(2588,'El Paso',43),(2589,'Ellis',43),(2590,'Erath',43),(2591,'Falls',43),(2592,'Fannin',43),(2593,'Fayette',43),(2594,'Fisher',43),(2595,'Floyd',43),(2596,'Foard',43),(2597,'Fort Bend',43),(2598,'Franklin',43),(2599,'Freestone',43),(2600,'Frio',43),(2601,'Gaines',43),(2602,'Galveston',43),(2603,'Garza',43),(2604,'Gillespie',43),(2605,'Glasscock',43),(2606,'Goliad',43),(2607,'Gonzales',43),(2608,'Gray',43),(2609,'Grayson',43),(2610,'Gregg',43),(2611,'Grimes',43),(2612,'Guadalupe',43),(2613,'Hale',43),(2614,'Hall',43),(2615,'Hamilton',43),(2616,'Hansford',43),(2617,'Hardeman',43),(2618,'Hardin',43),(2619,'Harris',43),(2620,'Harrison',43),(2621,'Hartley',43),(2622,'Haskell',43),(2623,'Hays',43),(2624,'Hemphill',43),(2625,'Henderson',43),(2626,'Hidalgo',43),(2627,'Hill',43),(2628,'Hockley',43),(2629,'Hood',43),(2630,'Hopkins',43),(2631,'Houston',43),(2632,'Howard',43),(2633,'Hudspeth',43),(2634,'Hunt',43),(2635,'Hutchinson',43),(2636,'Irion',43),(2637,'Jack',43),(2638,'Jackson',43),(2639,'Jasper',43),(2640,'Jeff Davis',43),(2641,'Jefferson',43),(2642,'Jim Hogg',43),(2643,'Jim Wells',43),(2644,'Johnson',43),(2645,'Jones',43),(2646,'Karnes',43),(2647,'Kaufman',43),(2648,'Kendall',43),(2649,'Kenedy',43),(2650,'Kent',43),(2651,'Kerr',43),(2652,'Kimble',43),(2653,'King',43),(2654,'Kinney',43),(2655,'Kleberg',43),(2656,'Knox',43),(2657,'La Salle',43),(2658,'Lamar',43),(2659,'Lamb',43),(2660,'Lampasas',43),(2661,'Lavaca',43),(2662,'Lee',43),(2663,'Leon',43),(2664,'Liberty',43),(2665,'Limestone',43),(2666,'Lipscomb',43),(2667,'Live Oak',43),(2668,'Llano',43),(2669,'Loving',43),(2670,'Lubbock',43),(2671,'Lynn',43),(2672,'Madison',43),(2673,'Marion',43),(2674,'Martin',43),(2675,'Mason',43),(2676,'Matagorda',43),(2677,'Maverick',43),(2678,'McCulloch',43),(2679,'McLennan',43),(2680,'McMullen',43),(2681,'Medina',43),(2682,'Menard',43),(2683,'Midland',43),(2684,'Milam',43),(2685,'Mills',43),(2686,'Mitchell',43),(2687,'Montague',43),(2688,'Montgomery',43),(2689,'Moore',43),(2690,'Morris',43),(2691,'Motley',43),(2692,'Nacogdoches',43),(2693,'Navarro',43),(2694,'Newton',43),(2695,'Nolan',43),(2696,'Nueces',43),(2697,'Ochiltree',43),(2698,'Oldham',43),(2699,'Orange',43),(2700,'Palo Pinto',43),(2701,'Panola',43),(2702,'Parker',43),(2703,'Parmer',43),(2704,'Pecos',43),(2705,'Polk',43),(2706,'Potter',43),(2707,'Presidio',43),(2708,'Rains',43),(2709,'Randall',43),(2710,'Reagan',43),(2711,'Real',43),(2712,'Red River',43),(2713,'Reeves',43),(2714,'Refugio',43),(2715,'Roberts',43),(2716,'Robertson',43),(2717,'Rockwall',43),(2718,'Runnels',43),(2719,'Rusk',43),(2720,'Sabine',43),(2721,'San Augustine',43),(2722,'San Jacinto',43),(2723,'San Patricio',43),(2724,'San Saba',43),(2725,'Schleicher',43),(2726,'Scurry',43),(2727,'Shackelford',43),(2728,'Shelby',43),(2729,'Sherman',43),(2730,'Smith',43),(2731,'Somervell',43),(2732,'Starr',43),(2733,'Stephens',43),(2734,'Sterling',43),(2735,'Stonewall',43),(2736,'Sutton',43),(2737,'Swisher',43),(2738,'Tarrant',43),(2739,'Taylor',43),(2740,'Terrell',43),(2741,'Terry',43),(2742,'Throckmorton',43),(2743,'Titus',43),(2744,'Tom Green',43),(2745,'Travis',43),(2746,'Trinity',43),(2747,'Tyler',43),(2748,'Upshur',43),(2749,'Upton',43),(2750,'Uvalde',43),(2751,'Val Verde',43),(2752,'Van Zandt',43),(2753,'Victoria',43),(2754,'Walker',43),(2755,'Waller',43),(2756,'Ward',43),(2757,'Washington',43),(2758,'Webb',43),(2759,'Wharton',43),(2760,'Wheeler',43),(2761,'Wichita',43),(2762,'Wilbarger',43),(2763,'Willacy',43),(2764,'Williamson',43),(2765,'Wilson',43),(2766,'Winkler',43),(2767,'Wise',43),(2768,'Wood',43),(2769,'Yoakum',43),(2770,'Young',43),(2771,'Zapata',43),(2772,'Zavala',43),(2773,'Beaver',44),(2774,'Box Elder',44),(2775,'Cache',44),(2776,'Carbon',44),(2777,'Daggett',44),(2778,'Davis',44),(2779,'Duchesne',44),(2780,'Emery',44),(2781,'Garfield',44),(2782,'Grand',44),(2783,'Iron',44),(2784,'Juab',44),(2785,'Kane',44),(2786,'Millard',44),(2787,'Morgan',44),(2788,'Piute',44),(2789,'Rich',44),(2790,'Salt Lake',44),(2791,'San Juan',44),(2792,'Sanpete',44),(2793,'Sevier',44),(2794,'Summit',44),(2795,'Tooele',44),(2796,'Uintah',44),(2797,'Utah',44),(2798,'Wasatch',44),(2799,'Washington',44),(2800,'Wayne',44),(2801,'Weber',44),(2802,'Addison',45),(2803,'Bennington',45),(2804,'Caledonia',45),(2805,'Chittenden',45),(2806,'Essex',45),(2807,'Franklin',45),(2808,'Grand Isle',45),(2809,'Lamoille',45),(2810,'Orange',45),(2811,'Orleans',45),(2812,'Rutland',45),(2813,'Washington',45),(2814,'Windham',45),(2815,'Windsor',45),(2816,'Accomack',46),(2817,'Albemarle',46),(2818,'Alleghany',46),(2819,'Amelia',46),(2820,'Amherst',46),(2821,'Appomattox',46),(2822,'Arlington',46),(2823,'Augusta',46),(2824,'Bath',46),(2825,'Bedford',46),(2826,'Bland',46),(2827,'Botetourt',46),(2828,'Brunswick',46),(2829,'Buchanan',46),(2830,'Buckingham',46),(2831,'Campbell',46),(2832,'Caroline',46),(2833,'Carroll',46),(2834,'Charles City',46),(2835,'Charlotte',46),(2836,'Chesterfield',46),(2837,'Clarke',46),(2838,'Craig',46),(2839,'Culpeper',46),(2840,'Cumberland',46),(2841,'Dickenson',46),(2842,'Dinwiddie',46),(2843,'Essex',46),(2844,'Fairfax',46),(2845,'Fauquier',46),(2846,'Floyd',46),(2847,'Fluvanna',46),(2848,'Franklin',46),(2849,'Frederick',46),(2850,'Giles',46),(2851,'Gloucester',46),(2852,'Goochland',46),(2853,'Grayson',46),(2854,'Greene',46),(2855,'Greensville',46),(2856,'Halifax',46),(2857,'Hanover',46),(2858,'Henrico',46),(2859,'Henry',46),(2860,'Highland',46),(2861,'Isle of Wight',46),(2862,'James City',46),(2863,'King George',46),(2864,'King William',46),(2865,'King and Queen',46),(2866,'Lancaster',46),(2867,'Lee',46),(2868,'Loudoun',46),(2869,'Louisa',46),(2870,'Lunenburg',46),(2871,'Madison',46),(2872,'Mathews',46),(2873,'Mecklenburg',46),(2874,'Middlesex',46),(2875,'Montgomery',46),(2876,'Nelson',46),(2877,'New Kent',46),(2878,'Northampton',46),(2879,'Northumberland',46),(2880,'Nottoway',46),(2881,'Orange',46),(2882,'Page',46),(2883,'Patrick',46),(2884,'Pittsylvania',46),(2885,'Powhatan',46),(2886,'Prince Edward',46),(2887,'Prince George',46),(2888,'Prince William',46),(2889,'Pulaski',46),(2890,'Rappahannock',46),(2891,'Richmond',46),(2892,'Roanoke',46),(2893,'Rockbridge',46),(2894,'Rockingham',46),(2895,'Russell',46),(2896,'Scott',46),(2897,'Shenandoah',46),(2898,'Smyth',46),(2899,'Southampton',46),(2900,'Spotsylvania',46),(2901,'Stafford',46),(2902,'Surry',46),(2903,'Sussex',46),(2904,'Tazewell',46),(2905,'Warren',46),(2906,'Washington',46),(2907,'Westmoreland',46),(2908,'Wise',46),(2909,'Wythe',46),(2910,'York',46),(2911,'Adams',47),(2912,'Asotin',47),(2913,'Benton',47),(2914,'Chelan',47),(2915,'Clallam',47),(2916,'Clark',47),(2917,'Columbia',47),(2918,'Cowlitz',47),(2919,'Douglas',47),(2920,'Ferry',47),(2921,'Franklin',47),(2922,'Garfield',47),(2923,'Grant',47),(2924,'Grays Harbor',47),(2925,'Island',47),(2926,'Jefferson',47),(2927,'King',47),(2928,'Kitsap',47),(2929,'Kittitas',47),(2930,'Klickitat',47),(2931,'Lewis',47),(2932,'Lincoln',47),(2933,'Mason',47),(2934,'Okanogan',47),(2935,'Pacific',47),(2936,'Pend Oreille',47),(2937,'Pierce',47),(2938,'San Juan',47),(2939,'Skagit',47),(2940,'Skamania',47),(2941,'Snohomish',47),(2942,'Spokane',47),(2943,'Stevens',47),(2944,'Thurston',47),(2945,'Wahkiakum',47),(2946,'Walla Walla',47),(2947,'Whatcom',47),(2948,'Whitman',47),(2949,'Yakima',47),(2950,'Barbour',48),(2951,'Berkeley',48),(2952,'Boone',48),(2953,'Braxton',48),(2954,'Brooke',48),(2955,'Cabell',48),(2956,'Calhoun',48),(2957,'Clay',48),(2958,'Doddridge',48),(2959,'Fayette',48),(2960,'Gilmer',48),(2961,'Grant',48),(2962,'Greenbrier',48),(2963,'Hampshire',48),(2964,'Hancock',48),(2965,'Hardy',48),(2966,'Harrison',48),(2967,'Jackson',48),(2968,'Jefferson',48),(2969,'Kanawha',48),(2970,'Lewis',48),(2971,'Lincoln',48),(2972,'Logan',48),(2973,'Marion',48),(2974,'Marshall',48),(2975,'Mason',48),(2976,'McDowell',48),(2977,'Mercer',48),(2978,'Mineral',48),(2979,'Mingo',48),(2980,'Monongalia',48),(2981,'Monroe',48),(2982,'Morgan',48),(2983,'Nicholas',48),(2984,'Ohio',48),(2985,'Pendleton',48),(2986,'Pleasants',48),(2987,'Pocahontas',48),(2988,'Preston',48),(2989,'Putnam',48),(2990,'Raleigh',48),(2991,'Randolph',48),(2992,'Ritchie',48),(2993,'Roane',48),(2994,'Summers',48),(2995,'Taylor',48),(2996,'Tucker',48),(2997,'Tyler',48),(2998,'Upshur',48),(2999,'Wayne',48),(3000,'Webster',48),(3001,'Wetzel',48),(3002,'Wirt',48),(3003,'Wood',48),(3004,'Wyoming',48),(3005,'Adams',49),(3006,'Ashland',49),(3007,'Barron',49),(3008,'Bayfield',49),(3009,'Brown',49),(3010,'Buffalo',49),(3011,'Burnett',49),(3012,'Calumet',49),(3013,'Chippewa',49),(3014,'Clark',49),(3015,'Columbia',49),(3016,'Crawford',49),(3017,'Dane',49),(3018,'Dodge',49),(3019,'Door',49),(3020,'Douglas',49),(3021,'Dunn',49),(3022,'Eau Claire',49),(3023,'Florence',49),(3024,'Fond du Lac',49),(3025,'Forest',49),(3026,'Grant',49),(3027,'Green',49),(3028,'Green Lake',49),(3029,'Iowa',49),(3030,'Iron',49),(3031,'Jackson',49),(3032,'Jefferson',49),(3033,'Juneau',49),(3034,'Kenosha',49),(3035,'Kewaunee',49),(3036,'La Crosse',49),(3037,'Lafayette',49),(3038,'Langlade',49),(3039,'Lincoln',49),(3040,'Manitowoc',49),(3041,'Marathon',49),(3042,'Marinette',49),(3043,'Marquette',49),(3044,'Menominee',49),(3045,'Milwaukee',49),(3046,'Monroe',49),(3047,'Oconto',49),(3048,'Oneida',49),(3049,'Outagamie',49),(3050,'Ozaukee',49),(3051,'Pepin',49),(3052,'Pierce',49),(3053,'Polk',49),(3054,'Portage',49),(3055,'Price',49),(3056,'Racine',49),(3057,'Richland',49),(3058,'Rock',49),(3059,'Rusk',49),(3060,'Sauk',49),(3061,'Sawyer',49),(3062,'Shawano',49),(3063,'Sheboygan',49),(3064,'St. Croix',49),(3065,'Taylor',49),(3066,'Trempealeau',49),(3067,'Vernon',49),(3068,'Vilas',49),(3069,'Walworth',49),(3070,'Washburn',49),(3071,'Washington',49),(3072,'Waukesha',49),(3073,'Waupaca',49),(3074,'Waushara',49),(3075,'Winnebago',49),(3076,'Wood',49),(3077,'Albany',50),(3078,'Big Horn',50),(3079,'Campbell',50),(3080,'Carbon',50),(3081,'Converse',50),(3082,'Crook',50),(3083,'Fremont',50),(3084,'Goshen',50),(3085,'Hot Springs',50),(3086,'Johnson',50),(3087,'Laramie',50),(3088,'Lincoln',50),(3089,'Natrona',50),(3090,'Niobrara',50),(3091,'Park',50),(3092,'Platte',50),(3093,'Sheridan',50),(3094,'Sublette',50),(3095,'Sweetwater',50),(3096,'Teton',50),(3097,'Uinta',50),(3098,'Washakie',50),(3099,'Weston',50);
/*!40000 ALTER TABLE `counties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `county_view`
--

DROP TABLE IF EXISTS `county_view`;
/*!50001 DROP VIEW IF EXISTS `county_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `county_view` AS SELECT 
 1 AS `county_id`,
 1 AS `county_name`,
 1 AS `state_name`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `feeding_charts`
--

DROP TABLE IF EXISTS `feeding_charts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feeding_charts` (
  `feeding_chart_id` int(5) NOT NULL AUTO_INCREMENT,
  `feeding_species` int(5) NOT NULL,
  `feeding_weight` int(4) NOT NULL,
  `feeding_cc` decimal(6,1) NOT NULL,
  `feeding_freequency` int(5) NOT NULL,
  PRIMARY KEY (`feeding_chart_id`),
  KEY `feeding_species_idx` (`feeding_species`),
  KEY `feeding_freequency_idx` (`feeding_freequency`),
  CONSTRAINT `feeding_freequency` FOREIGN KEY (`feeding_freequency`) REFERENCES `freequency_definition` (`freequency_definition_id`),
  CONSTRAINT `feeding_species` FOREIGN KEY (`feeding_species`) REFERENCES `species` (`species_id`)
) ENGINE=InnoDB AUTO_INCREMENT=512 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feeding_charts`
--

LOCK TABLES `feeding_charts` WRITE;
/*!40000 ALTER TABLE `feeding_charts` DISABLE KEYS */;
INSERT INTO `feeding_charts` VALUES (1,3,25,1.5,2),(2,3,26,1.5,2),(3,3,27,1.5,2),(4,3,28,1.5,2),(5,3,29,1.5,2),(6,3,30,1.5,2),(7,3,31,1.5,2),(8,3,32,1.5,2),(9,3,33,1.5,2),(10,3,34,1.5,2),(11,3,35,2.0,2),(12,3,36,2.0,2),(13,3,37,2.0,2),(14,3,38,2.0,2),(15,3,39,2.0,2),(16,3,40,2.0,2),(17,3,41,2.0,2),(18,3,42,2.0,2),(19,3,43,2.0,2),(20,3,44,2.0,2),(21,3,45,2.0,2),(22,3,46,2.5,2),(23,3,47,2.5,2),(24,3,48,2.5,2),(25,3,49,2.5,2),(26,3,50,2.5,2),(27,3,51,2.5,2),(28,3,52,2.5,2),(29,3,53,2.5,2),(30,3,54,2.5,2),(31,3,55,2.5,2),(32,3,56,3.0,2),(33,3,57,3.0,2),(34,3,58,3.0,2),(35,3,59,3.0,2),(36,3,60,3.0,2),(37,3,61,3.0,2),(38,3,62,3.0,2),(39,3,63,3.0,2),(40,3,64,3.0,2),(41,3,65,3.0,2),(42,3,66,3.5,3),(43,3,67,3.5,3),(44,3,68,3.5,3),(45,3,69,3.5,3),(46,3,70,3.5,3),(47,3,71,3.5,3),(48,3,72,3.5,3),(49,3,73,3.5,3),(50,3,74,3.5,3),(51,3,75,3.5,3),(52,3,76,4.0,3),(53,3,77,4.0,3),(54,3,78,4.0,3),(55,3,79,4.0,3),(56,3,80,4.0,3),(57,3,81,4.0,3),(58,3,82,4.0,3),(59,3,83,4.0,3),(60,3,84,4.0,3),(61,3,85,4.0,3),(62,3,86,5.0,5),(63,3,87,5.0,5),(64,3,88,5.0,5),(65,3,89,5.0,5),(66,3,90,5.0,5),(67,3,91,5.0,5),(68,3,92,5.0,5),(69,3,93,5.0,5),(70,3,94,5.0,5),(71,3,95,5.0,5),(72,3,96,6.0,5),(73,3,97,6.0,5),(74,3,98,6.0,5),(75,3,99,6.0,5),(76,3,100,6.0,5),(77,3,101,7.0,1),(78,3,102,7.0,1),(79,3,103,7.0,1),(80,3,104,7.0,1),(81,3,105,7.0,1),(82,3,106,7.0,1),(83,3,107,7.0,1),(84,3,108,7.0,1),(85,3,109,7.0,1),(86,3,110,7.0,1),(87,3,111,7.0,1),(88,3,112,7.0,1),(89,3,113,7.0,1),(90,3,114,7.0,1),(91,3,115,7.0,1),(92,3,116,7.0,1),(93,3,117,7.0,1),(94,3,118,7.0,1),(95,3,119,7.0,1),(96,3,120,7.0,1),(97,3,121,7.0,1),(98,3,122,7.0,1),(99,3,123,7.0,1),(100,3,124,7.0,1),(101,3,125,7.0,1),(102,3,126,9.0,4),(103,3,127,9.0,4),(104,3,128,9.0,4),(105,3,129,9.0,4),(106,3,130,9.0,4),(107,3,131,9.0,4),(108,3,132,9.0,4),(109,3,133,9.0,4),(110,3,134,9.0,4),(111,3,135,9.0,4),(112,3,136,9.0,4),(113,3,137,9.0,4),(114,3,138,9.0,4),(115,3,139,9.0,4),(116,3,140,9.0,4),(117,3,141,9.0,4),(118,3,142,9.0,4),(119,3,143,9.0,4),(120,3,144,9.0,4),(121,3,145,9.0,4),(122,3,146,9.0,4),(123,3,147,9.0,4),(124,3,148,9.0,4),(125,3,149,9.0,4),(126,3,150,9.0,4),(127,6,20,1.0,2),(128,6,21,1.0,2),(129,6,22,1.0,2),(130,6,23,1.0,2),(131,6,24,1.0,2),(132,6,25,1.0,2),(133,6,26,1.0,2),(134,6,27,1.0,2),(135,6,28,1.0,2),(136,6,29,1.0,2),(137,6,30,1.0,2),(138,6,31,1.5,2),(139,6,32,1.5,2),(140,6,33,1.5,2),(141,6,34,1.5,2),(142,6,35,1.5,2),(143,6,36,1.5,2),(144,6,37,1.5,2),(145,6,38,1.5,2),(146,6,39,1.5,2),(147,6,40,1.5,2),(148,6,41,2.0,2),(149,6,42,2.0,2),(150,6,43,2.0,2),(151,6,44,2.0,2),(152,6,45,2.0,2),(153,6,46,2.0,2),(154,6,47,2.0,2),(155,6,48,2.0,2),(156,6,49,2.0,2),(157,6,50,2.0,2),(158,6,51,3.0,2),(159,6,52,3.0,2),(160,6,53,3.0,2),(161,6,54,3.0,2),(162,6,55,3.0,2),(163,6,56,3.0,2),(164,6,57,3.0,2),(165,6,58,3.0,2),(166,6,59,3.0,2),(167,6,60,3.0,2),(168,6,61,4.0,3),(169,6,62,4.0,3),(170,6,63,4.0,3),(171,6,64,4.0,3),(172,6,65,4.0,3),(173,6,66,4.0,3),(174,6,67,4.0,3),(175,6,68,4.0,3),(176,6,69,4.0,3),(177,6,70,4.0,3),(178,6,71,5.0,3),(179,6,72,5.0,3),(180,6,73,5.0,3),(181,6,74,5.0,3),(182,6,75,5.0,3),(183,6,76,5.0,3),(184,6,77,5.0,3),(185,6,78,5.0,3),(186,6,79,5.0,3),(187,6,80,5.0,3),(188,6,81,7.0,5),(189,6,82,7.0,5),(190,6,83,7.0,5),(191,6,84,7.0,5),(192,6,85,7.0,5),(193,6,86,7.0,5),(194,6,87,7.0,5),(195,6,88,7.0,5),(196,6,89,7.0,5),(197,6,90,7.0,5),(198,6,91,9.0,5),(199,6,92,9.0,5),(200,6,93,9.0,5),(201,6,94,9.0,5),(202,6,95,9.0,5),(203,6,96,9.0,5),(204,6,97,9.0,5),(205,6,98,9.0,5),(206,6,99,9.0,5),(207,6,100,9.0,5),(208,6,101,10.0,1),(209,6,102,10.0,1),(210,6,103,10.0,1),(211,6,104,10.0,1),(212,6,105,10.0,1),(213,6,106,10.0,1),(214,6,107,10.0,1),(215,6,108,10.0,1),(216,6,109,10.0,1),(217,6,110,10.0,1),(218,6,111,10.0,1),(219,6,112,10.0,1),(220,6,113,10.0,1),(221,6,114,10.0,1),(222,6,115,10.0,1),(223,6,116,10.0,1),(224,6,117,10.0,1),(225,6,118,10.0,1),(226,6,119,10.0,1),(227,6,120,10.0,1),(228,6,121,10.0,1),(229,6,122,10.0,1),(230,6,123,10.0,1),(231,6,124,10.0,1),(232,6,125,10.0,1),(233,6,126,11.0,1),(234,6,127,11.0,1),(235,6,128,11.0,1),(236,6,129,11.0,1),(237,6,130,11.0,1),(238,6,131,11.0,1),(239,6,132,11.0,1),(240,6,133,11.0,1),(241,6,134,11.0,1),(242,6,135,11.0,1),(243,6,136,11.0,1),(244,6,137,11.0,1),(245,6,138,11.0,1),(246,6,139,11.0,1),(247,6,140,11.0,1),(248,6,141,11.0,1),(249,6,142,11.0,1),(250,6,143,11.0,1),(251,6,144,11.0,1),(252,6,145,11.0,1),(253,6,146,11.0,1),(254,6,147,11.0,1),(255,6,148,11.0,1),(256,6,149,11.0,1),(257,6,150,11.0,1),(258,6,151,12.0,4),(259,6,152,12.0,4),(260,6,153,12.0,4),(261,6,154,12.0,4),(262,6,155,12.0,4),(263,6,156,12.0,4),(264,6,157,12.0,4),(265,6,158,12.0,4),(266,6,159,12.0,4),(267,6,160,12.0,4),(268,6,161,12.0,4),(269,6,162,12.0,4),(270,6,163,12.0,4),(271,6,164,12.0,4),(272,6,165,12.0,4),(273,6,166,12.0,4),(274,6,167,12.0,4),(275,6,168,12.0,4),(276,6,169,12.0,4),(277,6,170,12.0,4),(278,6,171,12.0,4),(279,6,172,12.0,4),(280,6,173,12.0,4),(281,6,174,12.0,4),(282,6,175,12.0,4),(283,6,176,14.0,4),(284,6,177,14.0,4),(285,6,178,14.0,4),(286,6,179,14.0,4),(287,6,180,14.0,4),(288,6,181,14.0,4),(289,6,182,14.0,4),(290,6,183,14.0,4),(291,6,184,14.0,4),(292,6,185,14.0,4),(293,6,186,14.0,4),(294,6,187,14.0,4),(295,6,188,14.0,4),(296,6,189,14.0,4),(297,6,190,14.0,4),(298,6,191,14.0,4),(299,6,192,14.0,4),(300,6,193,14.0,4),(301,6,194,14.0,4),(302,6,195,14.0,4),(303,6,196,14.0,4),(304,6,197,14.0,4),(305,6,198,14.0,4),(306,6,199,14.0,4),(307,6,200,14.0,4),(308,7,30,4.0,5),(309,7,31,4.0,5),(310,7,32,4.0,5),(311,7,33,4.0,5),(312,7,34,4.0,5),(313,7,35,4.0,5),(314,7,36,4.0,5),(315,7,37,4.0,5),(316,7,38,4.0,5),(317,7,39,4.0,5),(318,7,40,4.0,5),(319,7,41,5.0,5),(320,7,42,5.0,5),(321,7,43,5.0,5),(322,7,44,5.0,5),(323,7,45,5.0,5),(324,7,46,5.0,5),(325,7,47,5.0,5),(326,7,48,5.0,5),(327,7,49,5.0,5),(328,7,50,5.0,5),(329,7,51,6.0,5),(330,7,52,6.0,5),(331,7,53,6.0,5),(332,7,54,6.0,5),(333,7,55,6.0,5),(334,7,56,6.0,5),(335,7,57,6.0,5),(336,7,58,6.0,5),(337,7,59,6.0,5),(338,7,60,6.0,5),(339,7,61,7.0,1),(340,7,62,7.0,1),(341,7,63,7.0,1),(342,7,64,7.0,1),(343,7,65,7.0,1),(344,7,66,7.0,1),(345,7,67,7.0,1),(346,7,68,7.0,1),(347,7,69,7.0,1),(348,7,70,7.0,1),(349,7,71,8.0,1),(350,7,72,8.0,1),(351,7,73,8.0,1),(352,7,74,8.0,1),(353,7,75,8.0,1),(354,7,76,8.0,1),(355,7,77,8.0,1),(356,7,78,8.0,1),(357,7,79,8.0,1),(358,7,80,8.0,1),(359,7,81,9.0,1),(360,7,82,9.0,1),(361,7,83,9.0,1),(362,7,84,9.0,1),(363,7,85,9.0,1),(364,7,86,9.0,1),(365,7,87,9.0,1),(366,7,88,9.0,1),(367,7,89,9.0,1),(368,7,90,9.0,1),(369,7,91,10.0,4),(370,7,92,10.0,4),(371,7,93,10.0,4),(372,7,94,10.0,4),(373,7,95,10.0,4),(374,7,96,10.0,4),(375,7,97,10.0,4),(376,7,98,10.0,4),(377,7,99,10.0,4),(378,7,100,10.0,4),(379,7,101,12.0,4),(380,7,102,12.0,4),(381,7,103,12.0,4),(382,7,104,12.0,4),(383,7,105,12.0,4),(384,7,106,12.0,4),(385,7,107,12.0,4),(386,7,108,12.0,4),(387,7,109,12.0,4),(388,7,110,12.0,4),(389,7,111,12.0,4),(390,7,112,12.0,4),(391,7,113,12.0,4),(392,7,114,12.0,4),(393,7,115,12.0,4),(394,7,116,12.0,4),(395,7,117,12.0,4),(396,7,118,12.0,4),(397,7,119,12.0,4),(398,7,120,12.0,4),(399,7,121,12.0,4),(400,7,122,12.0,4),(401,7,123,12.0,4),(402,7,124,12.0,4),(403,7,125,12.0,4);
/*!40000 ALTER TABLE `feeding_charts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `feeding_charts_view`
--

DROP TABLE IF EXISTS `feeding_charts_view`;
/*!50001 DROP VIEW IF EXISTS `feeding_charts_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `feeding_charts_view` AS SELECT 
 1 AS `species_name`,
 1 AS `feeding_weight`,
 1 AS `feeding_cc`,
 1 AS `freequency`,
 1 AS `freequency_description`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `freequency_definition`
--

DROP TABLE IF EXISTS `freequency_definition`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `freequency_definition` (
  `freequency_definition_id` int(11) NOT NULL AUTO_INCREMENT,
  `freequency` varchar(3) NOT NULL,
  `freequency_count` int(1) NOT NULL,
  `freequency_description` varchar(45) NOT NULL,
  PRIMARY KEY (`freequency_definition_id`,`freequency`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `freequency_definition`
--

LOCK TABLES `freequency_definition` WRITE;
/*!40000 ALTER TABLE `freequency_definition` DISABLE KEYS */;
INSERT INTO `freequency_definition` VALUES (1,'BID',2,'Two times daily'),(2,'Q3H',5,'Five times daily'),(3,'QID',4,'Four times daily'),(4,'SID',1,'One time daily'),(5,'TID',3,'Three times daily');
/*!40000 ALTER TABLE `freequency_definition` ENABLE KEYS */;
UNLOCK TABLES;

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

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'admin','Administrator'),(2,'members','General User'),(3,'volunteer','NCWR Volunteers');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

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

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `location` (
  `location_id` int(5) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(45) DEFAULT NULL,
  `location_street` varchar(45) NOT NULL,
  `location_city` varchar(45) NOT NULL,
  `location_state` int(2) NOT NULL,
  PRIMARY KEY (`location_id`),
  KEY `state_idx` (`location_state`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `location`
--

LOCK TABLES `location` WRITE;
/*!40000 ALTER TABLE `location` DISABLE KEYS */;
INSERT INTO `location` VALUES (1,'NC WildLife Main','429 Aderholdt Road','Lincolnton',33),(2,'NC WildLife Remote','877 Ram Lane','Lincolnton',0);
/*!40000 ALTER TABLE `location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_attempts`
--

LOCK TABLES `login_attempts` WRITE;
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;
UNLOCK TABLES;

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
INSERT INTO `ncwl_sessions` VALUES ('43a8340c59b786f3bc68737400a43840ec04262f','::1',1504660797,'__ci_last_regenerate|i:1504660797;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504646477\";last_check|i:1504660404;'),('9f223b8ab7e0b3dd3e9e2d297751578d0122c7d7','::1',1504661152,'__ci_last_regenerate|i:1504661152;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504646477\";last_check|i:1504660404;'),('7e805a935320e9ecf5b93f5d42ded52fb74df44e','::1',1504661491,'__ci_last_regenerate|i:1504661491;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504646477\";last_check|i:1504660404;'),('e1e952b0f1867b0b8e67047b899e1bf39b1a56d2','::1',1504661894,'__ci_last_regenerate|i:1504661894;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504646477\";last_check|i:1504660404;'),('3ab011b6c563b3bb0d1f02b5c9a6452e712f04b1','::1',1504662206,'__ci_last_regenerate|i:1504662206;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504646477\";last_check|i:1504660404;'),('690cc6d820696647c51557b4389f9c5f8474870d','::1',1504662621,'__ci_last_regenerate|i:1504662621;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504646477\";last_check|i:1504660404;'),('e36ebc9e4dc162e498812a6a1387e9ed2aa20ce9','::1',1504662992,'__ci_last_regenerate|i:1504662992;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504646477\";last_check|i:1504660404;'),('a07b17fe87192cfd01082a98dea3c97eb01612e8','::1',1504663308,'__ci_last_regenerate|i:1504663308;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504646477\";last_check|i:1504660404;'),('2eae3125f4fc9bb6bb13e652872db470caa5bde3','::1',1504663654,'__ci_last_regenerate|i:1504663654;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504646477\";last_check|i:1504660404;'),('f01920cfc2acc2e439fadba2e2597ef35ba3ecb6','::1',1504664018,'__ci_last_regenerate|i:1504664018;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504646477\";last_check|i:1504660404;'),('9d0f83a0d766f13a6f4dd4435045cb26040bbce3','::1',1504664319,'__ci_last_regenerate|i:1504664319;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504646477\";last_check|i:1504660404;'),('be152ca401768307e6b7f8833fde126e0869de42','::1',1504665914,'__ci_last_regenerate|i:1504665914;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504646477\";last_check|i:1504660404;'),('c8e709e3869e0f0dc2aa4f5df741fef0711984fe','::1',1504666367,'__ci_last_regenerate|i:1504666367;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504646477\";last_check|i:1504660404;'),('2e99e54a4ab7fa435b9cb16ad2237543398f1c7c','::1',1504666669,'__ci_last_regenerate|i:1504666669;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504646477\";last_check|i:1504660404;'),('c028009f78f59f3d409b7487daf0c08a09532707','::1',1504666851,'__ci_last_regenerate|i:1504666669;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504646477\";last_check|i:1504660404;'),('c42e170974c0d58ff48aafc3313d7baf1a9c0273','::1',1504703383,'__ci_last_regenerate|i:1504703383;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504660404\";last_check|i:1504702894;'),('0524595a282739d34bce9667395bd6be44a483ac','::1',1504703385,'__ci_last_regenerate|i:1504703383;identity|s:20:\"ryan_w_frank@mac.com\";email|s:20:\"ryan_w_frank@mac.com\";user_id|s:2:\"15\";old_last_login|s:10:\"1504660404\";last_check|i:1504702894;'),('63de10ce55bdcf11325a6620e1671f6f3279c7a4','::1',1504733579,'');
/*!40000 ALTER TABLE `ncwl_sessions` ENABLE KEYS */;
UNLOCK TABLES;

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

--
-- Temporary view structure for view `schedule_assignment`
--

DROP TABLE IF EXISTS `schedule_assignment`;
/*!50001 DROP VIEW IF EXISTS `schedule_assignment`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `schedule_assignment` AS SELECT 
 1 AS `id`,
 1 AS `allDay`,
 1 AS `title`,
 1 AS `start`,
 1 AS `end`,
 1 AS `backgroundColor`,
 1 AS `description`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `schedule_assignment_view`
--

DROP TABLE IF EXISTS `schedule_assignment_view`;
/*!50001 DROP VIEW IF EXISTS `schedule_assignment_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `schedule_assignment_view` AS SELECT 
 1 AS `rehabber_name`,
 1 AS `volunteer_schedule`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `species`
--

DROP TABLE IF EXISTS `species`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `species` (
  `species_id` int(5) NOT NULL AUTO_INCREMENT,
  `species_name` varchar(45) NOT NULL,
  `species_type` varchar(45) NOT NULL,
  `species_RVS` varchar(3) DEFAULT NULL,
  `species_order` int(5) NOT NULL,
  PRIMARY KEY (`species_id`,`species_type`,`species_name`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `species`
--

LOCK TABLES `species` WRITE;
/*!40000 ALTER TABLE `species` DISABLE KEYS */;
INSERT INTO `species` VALUES (1,'Fawn','Cervidae','No',4),(2,'Skunk','Conepatus','Yes',5),(3,'Opossum','Marcupial','No',2),(4,'Otter','Mustelidae','No',6),(5,'Racoon','Procyonidae','Yes',7),(6,'Squirrel','Rodent','Yes',1),(7,'Bunny','','No',3),(8,'Beaver','Rodent','No',8),(9,'Mouse','Rodent','No',5);
/*!40000 ALTER TABLE `species` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `states` (
  `state_id` int(2) NOT NULL AUTO_INCREMENT,
  `state_name` varchar(45) NOT NULL,
  `state_abbr` varchar(2) NOT NULL,
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `states`
--

LOCK TABLES `states` WRITE;
/*!40000 ALTER TABLE `states` DISABLE KEYS */;
INSERT INTO `states` VALUES (1,'Alabama','AL'),(2,'Alaska','AK'),(3,'Arizona','AZ'),(4,'Arkansas','AR'),(5,'California','CA'),(6,'Colorado','CO'),(7,'Connecticut','CT'),(8,'Delaware','DE'),(9,'Florida','FL'),(10,'Georgia','GA'),(11,'Hawaii','HI'),(12,'Idaho','ID'),(13,'Illinois','IL'),(14,'Indiana','IN'),(15,'Iowa','IA'),(16,'Kansas','KS'),(17,'Kentucky','KY'),(18,'Louisiana','LA'),(19,'Maine','ME'),(20,'Maryland','MD'),(21,'Massachusetts','MA'),(22,'Michigan','MI'),(23,'Minnesota','MN'),(24,'Mississippi','MS'),(25,'Missouri','MO'),(26,'Montana','MT'),(27,'Nebraska','NE'),(28,'Nevada','NV'),(29,'New Hampshire','NH'),(30,'New Jersey','NJ'),(31,'New Mexico','NM'),(32,'New York','NY'),(33,'North Carolina','NC'),(34,'North Dakota','ND'),(35,'Ohio','OH'),(36,'Oklahoma','OK'),(37,'Oregon','OR'),(38,'Pennsylvania','PA'),(39,'Rhode Island','RI'),(40,'South Carolina','SC'),(41,'South Dakota','SD'),(42,'Tennessee','TN'),(43,'Texas','TX'),(44,'Utah','UT'),(45,'Vermont','VT'),(46,'Virginia','VA'),(47,'Washington','WA'),(48,'West Virginia','WV'),(49,'Wisconsin','WI'),(50,'Wyoming','WY');
/*!40000 ALTER TABLE `states` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplies`
--

DROP TABLE IF EXISTS `supplies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `supplies` (
  `supplies_id` int(11) NOT NULL AUTO_INCREMENT,
  `supply_name` varchar(45) NOT NULL,
  `supply_purpose` varchar(45) NOT NULL,
  `supply_quantity` int(10) NOT NULL,
  `supply_reorder_level` int(10) DEFAULT NULL,
  PRIMARY KEY (`supplies_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplies`
--

LOCK TABLES `supplies` WRITE;
/*!40000 ALTER TABLE `supplies` DISABLE KEYS */;
/*!40000 ALTER TABLE `supplies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'127.0.0.1','administrator','$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36','','admin@admin.com','',NULL,NULL,NULL,1268889823,1268889823,1,'Admin','istrator','ADMIN','0'),(15,'::1','rfrank','$2y$08$ukYByyRKO7ALNKV07iTECunbGRA3WLZbHjFcF4IE3vcfei1avJPXq',NULL,'ryan_w_frank@mac.com',NULL,NULL,NULL,'YrviiVR0rpS66ny/ipJaNe',1504137614,1504702894,1,'Ryan','Frank',NULL,NULL),(16,'::1','enelson','$2y$08$l6uPMTAkgxhQC7wvAwXpC.3Qd81ptcjhRCj5tSHOXhV52MbpQBsqS',NULL,'emilie.nelson@gmail.com',NULL,NULL,NULL,'7WBxNnc0Bf0yg1vdbxn4kO',1504148043,1504148279,1,'Emilie','Nelson',NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_groups`
--

LOCK TABLES `users_groups` WRITE;
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` VALUES (17,15,1),(16,15,2),(23,15,3),(18,16,2);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `volunteer_assignment`
--

DROP TABLE IF EXISTS `volunteer_assignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `volunteer_assignment` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `volunteer_schedule` int(255) NOT NULL,
  `volunteer` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `volunteer_assignment`
--

LOCK TABLES `volunteer_assignment` WRITE;
/*!40000 ALTER TABLE `volunteer_assignment` DISABLE KEYS */;
INSERT INTO `volunteer_assignment` VALUES (1,1,1),(2,1,2);
/*!40000 ALTER TABLE `volunteer_assignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `volunteer_schedule`
--

DROP TABLE IF EXISTS `volunteer_schedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `volunteer_schedule` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `title` varchar(85) DEFAULT NULL,
  `allDay` tinyint(5) DEFAULT '0',
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `backgroundColor` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `volunteer_schedule`
--

LOCK TABLES `volunteer_schedule` WRITE;
/*!40000 ALTER TABLE `volunteer_schedule` DISABLE KEYS */;
INSERT INTO `volunteer_schedule` VALUES (1,'Test Event',0,'2017-09-05 12:30:00','2017-09-05 20:00:00','grey'),(2,'Another Test',1,'2017-09-04 00:00:00','0000-00-00 00:00:00','red');
/*!40000 ALTER TABLE `volunteer_schedule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `county_view`
--

/*!50001 DROP VIEW IF EXISTS `county_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `county_view` AS select `counties`.`county_id` AS `county_id`,`counties`.`county_name` AS `county_name`,`states`.`state_name` AS `state_name` from (`counties` join `states` on((`counties`.`county_state` = `states`.`state_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `feeding_charts_view`
--

/*!50001 DROP VIEW IF EXISTS `feeding_charts_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `feeding_charts_view` AS select `species`.`species_name` AS `species_name`,`feeding_charts`.`feeding_weight` AS `feeding_weight`,`feeding_charts`.`feeding_cc` AS `feeding_cc`,`freequency_definition`.`freequency` AS `freequency`,`freequency_definition`.`freequency_description` AS `freequency_description` from ((`feeding_charts` join `species` on((`feeding_charts`.`feeding_species` = `species`.`species_id`))) join `freequency_definition` on((`feeding_charts`.`feeding_freequency` = `freequency_definition`.`freequency_definition_id`))) order by `feeding_charts`.`feeding_weight` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `schedule_assignment`
--

/*!50001 DROP VIEW IF EXISTS `schedule_assignment`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `schedule_assignment` AS select `volunteer_schedule`.`id` AS `id`,`volunteer_schedule`.`allDay` AS `allDay`,`volunteer_schedule`.`title` AS `title`,`volunteer_schedule`.`start` AS `start`,`volunteer_schedule`.`end` AS `end`,`volunteer_schedule`.`backgroundColor` AS `backgroundColor`,(select group_concat(`schedule_assignment_view`.`rehabber_name` separator ',') from `schedule_assignment_view` where (`schedule_assignment_view`.`volunteer_schedule` = `volunteer_schedule`.`id`)) AS `description` from (`volunteer_schedule` left join `schedule_assignment_view` on((`schedule_assignment_view`.`volunteer_schedule` = `volunteer_schedule`.`id`))) group by `volunteer_schedule`.`id` order by `volunteer_schedule`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `schedule_assignment_view`
--

/*!50001 DROP VIEW IF EXISTS `schedule_assignment_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `schedule_assignment_view` AS select concat(`rehabber`.`rehabber_first_name`,' ',`rehabber`.`rehabber_last_name`) AS `rehabber_name`,`volunteer_assignment`.`volunteer_schedule` AS `volunteer_schedule` from (`volunteer_assignment` join `rehabber` on((`volunteer_assignment`.`volunteer` = `rehabber`.`rehabber_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-07 16:15:02
