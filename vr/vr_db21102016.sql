-- MySQL dump 10.13  Distrib 5.5.43, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: vr_db
-- ------------------------------------------------------
-- Server version	5.5.43-0+deb7u1

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
-- Table structure for table `brand_tab`
--

DROP TABLE IF EXISTS `brand_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brand_tab` (
  `bid` int(10) NOT NULL AUTO_INCREMENT,
  `bname` varchar(150) DEFAULT NULL,
  `bdesc` varchar(350) DEFAULT NULL,
  `bstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brand_tab`
--

LOCK TABLES `brand_tab` WRITE;
/*!40000 ALTER TABLE `brand_tab` DISABLE KEYS */;
INSERT INTO `brand_tab` VALUES (1,'BOBOVR','KACAMATA VR BOBOVR',1),(2,'BAOFENG MOJING','KACAMATA BAOFENG MOJING',1),(3,'DEEPOON','KACAMATA DEEPOON',1),(4,'FIITVR','KACAMATA FIITVR',1),(5,'VR Fold','KACAMATA VR PORTABLE VR Fold',1),(6,'SHINECON','KACAMATA VR SHINECON',1),(7,'EYE TRAVEL','KACAMATA VR EYE TRAVEL',1),(8,'BOSS VR','KACAMATA VR BOSS',1),(9,'XIAOMI','KACAMATA VR XIAOMI',1),(10,'U NOTTON','KACAMATA VR U NOTTON',1),(11,'GOOGLE','KACAMATA VR GOOGLE CARDBOARD',1),(12,'TERIOS','GAMEPAD TERIOS',1),(13,'UNIVERSAL','UNIVERSAL GAMEPAD',1),(14,'KINGSTONE','MEMORY CARD HP',1),(15,'NO BRAND','BARANG YANG TANPA MERK',1);
/*!40000 ALTER TABLE `brand_tab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories_tab`
--

DROP TABLE IF EXISTS `categories_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories_tab` (
  `cid` int(10) NOT NULL AUTO_INCREMENT,
  `cname` varchar(150) DEFAULT NULL,
  `cdesc` varchar(300) DEFAULT NULL,
  `cwarranty` int(2) DEFAULT '0',
  `cstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories_tab`
--

LOCK TABLES `categories_tab` WRITE;
/*!40000 ALTER TABLE `categories_tab` DISABLE KEYS */;
INSERT INTO `categories_tab` VALUES (1,'Kacamata VR','Product Kacamata VR',30,1),(2,'GamePad','GamePad Ramote',10,1),(3,'ACC GAMEPAD','HOLDER T3',7,1);
/*!40000 ALTER TABLE `categories_tab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `city_tab`
--

DROP TABLE IF EXISTS `city_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `city_tab` (
  `cid` int(10) NOT NULL AUTO_INCREMENT,
  `cpid` int(10) DEFAULT NULL,
  `cname` varchar(150) DEFAULT NULL,
  `cstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city_tab`
--

LOCK TABLES `city_tab` WRITE;
/*!40000 ALTER TABLE `city_tab` DISABLE KEYS */;
INSERT INTO `city_tab` VALUES (1,1,'GUANGZHO',1),(2,3,'JAKARTA SELATAN',1);
/*!40000 ALTER TABLE `city_tab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country_tab`
--

DROP TABLE IF EXISTS `country_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `country_tab` (
  `cid` int(10) NOT NULL AUTO_INCREMENT,
  `ccode` varchar(5) DEFAULT NULL,
  `cname` varchar(150) DEFAULT NULL,
  `cstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country_tab`
--

LOCK TABLES `country_tab` WRITE;
/*!40000 ALTER TABLE `country_tab` DISABLE KEYS */;
INSERT INTO `country_tab` VALUES (1,'ID','Indonesia',1),(2,'CN','China',1);
/*!40000 ALTER TABLE `country_tab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers_tab`
--

DROP TABLE IF EXISTS `customers_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers_tab` (
  `cid` int(10) NOT NULL AUTO_INCREMENT,
  `ctype` tinyint(1) DEFAULT '0',
  `carea` tinyint(1) DEFAULT '0',
  `cname` varchar(150) DEFAULT NULL,
  `caddr` text,
  `ccountry` int(10) DEFAULT NULL,
  `cprovince` int(10) DEFAULT NULL,
  `ccity` int(10) DEFAULT NULL,
  `cemail` varchar(150) DEFAULT NULL,
  `cphone` varchar(30) DEFAULT NULL,
  `cstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers_tab`
--

LOCK TABLES `customers_tab` WRITE;
/*!40000 ALTER TABLE `customers_tab` DISABLE KEYS */;
INSERT INTO `customers_tab` VALUES (0,1,0,'NO NAME','NO ADDRESS',1,3,2,'-','-*-',1),(1,1,0,'INDOGAMERS MUPENX','IDC MAMPANG',1,3,2,'-','-*-',1),(2,0,0,'Gratcy Palma','Betawi Permai, Blok G6. No.17',1,3,2,'palmagratcy@gmail.com','08103808301*08103808301',1),(3,1,1,'Testing','',0,0,0,'','08103808301*08103808301',2),(4,1,0,'Jati Kesuma','Jalan D.I. Panjaitan No.176, Medan, Sumatera Utara\r\nMedan Petisah Kota Medan, 20119\r\nSumatera Utara',1,0,0,'','081360006634*',1),(5,1,1,'EWRETR','',0,0,0,'','76676767*76786',2),(6,1,1,'Rully Marinto','',0,0,0,'','081357889698*',1),(7,1,1,'ISWAR','',0,0,0,'','08568125440*',1),(8,1,1,'FAJAR RIFAI','',0,0,0,'','085328494415*',1),(9,1,1,'ALDO WIBOWO SALIM','',0,0,0,'','082281898902*',1),(10,1,1,'iqbal abiyasa','',0,0,0,'','085956565654*',1),(11,1,1,'Sabar','',0,0,0,'','081349607857*',1),(12,1,1,'Rikhsan Ramadhan','',0,0,0,'','081218627360*',1),(13,1,1,'RIYAN HARYADI','',0,0,0,'','081298905656*',1),(14,1,1,'RAMAYANI','',0,0,0,'','081275620656*',1),(15,1,1,'KASMAWATI RAHMAN','',0,0,0,'','08114445552*',1),(16,1,1,'Dwi Yunita Sari','',0,0,0,'','089669300739*',1),(17,1,1,'Dhamma','',0,0,0,'','082143472227*',1),(18,1,1,'Agustina','',0,0,0,'','6281288132183*',1),(19,1,1,'Syaeful Amin','',0,0,0,'','081510000801*',1),(20,1,1,'CGK2Q01897489416','',0,0,0,'','081294652239*',1),(21,1,1,'Reza Marketing Trevista Serua','',0,0,0,'','081294652239*',1),(22,1,1,'Lannywaty Budiman','',0,0,0,'','0263261142*',1),(23,1,1,'Bagus Nyoman','',0,0,0,'','081288886535*',1),(24,1,1,'Toko Restaflasher','',0,0,0,'','08989444223*',1),(25,0,0,'TOMOHIKO','',0,0,0,'','*',1),(26,1,1,'HENGKI','',0,0,0,'','089682359017*',1),(27,1,1,'NASA KARONO WIJANGKORO','',0,0,0,'','082329070884*',1),(28,1,1,'DINI NURHAIKI','',0,0,0,'','085885233756*',1),(29,1,1,'Syarfandhy Achmad','',0,0,0,'','08114445552*',1),(30,1,1,'amir hasan','',0,0,0,'','089530787887*',1),(31,1,1,'ibnu','',0,0,0,'','081278002700*',1),(32,1,1,'Nasa Karono Wijangkoro','',0,0,0,'','082329070884*',2),(33,1,1,'Andri Prima Tarigan','',0,0,0,'','085370009665*',1),(34,1,1,'Widi Wijayanto','',0,0,0,'','085921144106*',1),(35,1,1,'Rizki','',0,0,0,'','081395395205*',1),(36,1,1,'Anton sobandi','',0,0,0,'','087822938885*',1),(37,1,1,'Hazza Mahardika','',0,0,0,'','087882270081*',1),(38,1,1,'Rido Ilahi','',0,0,0,'','081364597129*',1),(39,1,1,'adrysunarto','',0,0,0,'','0817190021*',1),(40,1,1,'beny','',0,0,0,'','087734017558*',2),(41,1,1,'beny ','',0,0,0,'','087734017558*',1),(42,1,1,'Haris Atmajaya','',0,0,0,'','081234199903*',1),(43,1,1,'jefry','',0,0,0,'','083872937379*',1),(44,1,1,'matthew ricky','',0,0,0,'','081286393972*',2),(45,1,1,'ihwal','',0,0,0,'','082126009238*',1),(46,1,1,'Sherly Desnita Savio','',0,0,0,'',' 08999180924*',1),(47,1,1,'arlidona','',0,0,0,'','087724720999*',1),(48,1,1,'yuliana','',0,0,0,'','0811609766*',2),(49,1,1,'Hadriansyah','',0,0,0,'','085348622614*',1),(50,1,1,'Haris Atmajaya','',0,0,0,'','081234199903*',2);
/*!40000 ALTER TABLE `customers_tab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventory_tab`
--

DROP TABLE IF EXISTS `inventory_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventory_tab` (
  `iid` int(10) NOT NULL AUTO_INCREMENT,
  `ipid` int(10) DEFAULT '0',
  `istockbegining` int(10) DEFAULT '0',
  `istockin` int(10) DEFAULT '0',
  `istockout` int(10) DEFAULT '0',
  `istockreturn` int(10) DEFAULT '0',
  `istockreject` int(10) DEFAULT '0',
  `istock` int(10) DEFAULT '0',
  `istatus` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`iid`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory_tab`
--

LOCK TABLES `inventory_tab` WRITE;
/*!40000 ALTER TABLE `inventory_tab` DISABLE KEYS */;
INSERT INTO `inventory_tab` VALUES (1,1,0,350,0,0,0,350,1),(2,2,0,240,0,0,0,240,1),(3,3,0,160,1,0,0,159,1),(4,4,0,49,0,0,0,49,1),(5,5,0,5,0,0,0,5,1),(6,6,0,5,0,0,0,5,1),(7,7,0,5,0,0,0,5,1),(8,8,0,20,0,0,0,20,1),(9,9,0,20,0,0,0,20,1),(10,10,0,10,0,0,0,10,1),(11,11,0,0,0,0,0,0,1),(12,12,0,20,0,0,0,20,1),(13,13,0,20,0,0,0,20,1),(14,14,0,60,0,0,0,60,1),(15,15,0,100,0,0,0,100,1),(16,16,0,50,0,0,0,50,1),(17,17,0,100,0,0,0,100,1),(18,18,0,20,0,0,0,20,1),(19,19,0,10,0,0,0,10,1),(20,20,0,2,0,0,0,2,1),(21,21,0,2,0,0,0,2,1),(22,22,0,30,0,0,0,30,1),(23,23,0,50,0,0,0,50,1),(24,24,0,50,0,0,0,50,1),(25,25,0,240,0,0,0,240,1),(26,26,0,50,0,0,0,50,1),(27,27,0,100,0,0,0,100,1),(28,28,0,5,0,0,0,5,1),(29,29,0,0,0,0,0,0,1),(30,30,0,30,0,0,0,30,1),(31,31,0,20,0,0,0,20,1),(32,32,0,0,0,0,0,0,1);
/*!40000 ALTER TABLE `inventory_tab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `opname_tab`
--

DROP TABLE IF EXISTS `opname_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `opname_tab` (
  `oid` int(10) NOT NULL AUTO_INCREMENT,
  `oidid` int(10) DEFAULT NULL,
  `odate` int(10) DEFAULT NULL,
  `ostockbegining` int(10) DEFAULT NULL,
  `ostockin` int(10) DEFAULT NULL,
  `ostockout` int(10) DEFAULT NULL,
  `ostock` int(10) DEFAULT NULL,
  `oadjustmin` int(10) DEFAULT NULL,
  `oadjustplus` int(10) DEFAULT NULL,
  `odesc` varchar(350) DEFAULT NULL,
  `ostatus` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `opname_tab`
--

LOCK TABLES `opname_tab` WRITE;
/*!40000 ALTER TABLE `opname_tab` DISABLE KEYS */;
/*!40000 ALTER TABLE `opname_tab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `peticash_tab`
--

DROP TABLE IF EXISTS `peticash_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `peticash_tab` (
  `pid` int(10) NOT NULL AUTO_INCREMENT,
  `ptype` tinyint(1) DEFAULT '1',
  `pdate` int(10) DEFAULT NULL,
  `pdesc` text,
  `pnominal` int(10) DEFAULT NULL,
  `psaldo` int(10) DEFAULT NULL,
  `pstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peticash_tab`
--

LOCK TABLES `peticash_tab` WRITE;
/*!40000 ALTER TABLE `peticash_tab` DISABLE KEYS */;
/*!40000 ALTER TABLE `peticash_tab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_price_tab`
--

DROP TABLE IF EXISTS `product_price_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_price_tab` (
  `pid` int(10) NOT NULL AUTO_INCREMENT,
  `ppid` int(10) DEFAULT NULL,
  `pdate` int(10) DEFAULT NULL,
  `pprice` int(10) DEFAULT NULL,
  `ppricebase` int(10) DEFAULT NULL,
  `ppriceseller` int(10) DEFAULT NULL,
  `pstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_price_tab`
--

LOCK TABLES `product_price_tab` WRITE;
/*!40000 ALTER TABLE `product_price_tab` DISABLE KEYS */;
INSERT INTO `product_price_tab` VALUES (1,24,1476105157,90000,55541,91000,1),(2,24,1476106755,90000,55541,85000,1),(3,23,1476106763,90000,52694,85000,1),(4,13,1476373983,199000,147895,180000,1),(5,22,1476724699,365000,118416,315000,1),(6,2,1476724754,340000,205295,300000,1),(7,1,1476724815,380000,230285,340000,1),(8,3,1476724865,345000,204940,315000,1),(9,13,1476899154,180000,147895,180000,1),(10,22,1476899727,350000,118416,315000,1),(11,3,1476900037,340000,204940,315000,1);
/*!40000 ALTER TABLE `product_price_tab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products_tab`
--

DROP TABLE IF EXISTS `products_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products_tab` (
  `pid` int(10) NOT NULL AUTO_INCREMENT,
  `pcid` int(10) DEFAULT NULL,
  `pdate` int(10) DEFAULT NULL,
  `pbid` int(10) DEFAULT NULL,
  `pname` varchar(150) DEFAULT NULL,
  `pdesc` varchar(350) DEFAULT NULL,
  `ppricebase` int(10) DEFAULT NULL,
  `pprice` int(10) DEFAULT NULL,
  `ppriceseller` int(10) DEFAULT NULL,
  `ppic` varchar(150) DEFAULT NULL,
  `pstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_tab`
--

LOCK TABLES `products_tab` WRITE;
/*!40000 ALTER TABLE `products_tab` DISABLE KEYS */;
INSERT INTO `products_tab` VALUES (1,1,1475258929,1,'BOBOVR Z4','KACAMATA VR',230285,380000,340000,NULL,1),(2,1,1475259011,1,'BOBOVR Z4 MINI','KACAMATA VR',205295,340000,300000,NULL,1),(3,1,1475259147,4,'FIITVR 2N','KACAMATA VR',204940,340000,315000,NULL,1),(4,1,1475259533,2,'BAOFENG MOJING XD WHITE','WARNA PUTIH',203162,285000,285000,NULL,1),(5,1,1475259572,2,'BAOFENG MOJING XD PINK','WARNA PINK',203162,299000,299000,NULL,1),(6,1,1475259613,2,'BAOFENG MOJING XD KUNING','WARNA KUNING',203162,299000,299000,NULL,1),(7,1,1475259667,2,'BAOFENG MOJING XD BIRU','WARNA BIRU',203162,299000,299000,NULL,1),(8,1,1475260066,2,'BAOFENG MOJING 4 ANDROID','MOJING 4 ANDORID ONLY',445390,525000,525000,NULL,1),(9,1,1475260426,8,'BOSS VR','KACAMATA VR BOSS',283909,450000,450000,NULL,1),(10,1,1475260506,3,'DEEPOON V3','KACAMATA VR DEEPOON V3',351520,385000,385000,NULL,1),(11,1,1475260612,3,'DEEPOON E2','KACAMATA PC VR DEEPOON E2',3000000,3600000,3600000,NULL,1),(12,1,1475260673,7,'SPACE VR','KACAMATA VR EYE TRAVEL / SPACE VR',313464,385000,385000,NULL,1),(13,1,1475265010,9,'XIAOMI VR','KACAMATA VR XIAOMI',147895,180000,180000,NULL,1),(14,2,1475267421,2,'REMOTE BAOFENG MOJING ANDROID','REMOTE BAOFENG MOJING FOR ANDROID',63763,90000,90000,NULL,1),(15,2,1475269130,12,'TERIOS T3 -  BLACK','GAMEPAD TERIOS T3 WARNA BLACK',106053,125000,125000,NULL,1),(16,2,1475270441,6,'REMOTE SHINECON','REMOTE GAMEPAD SHINCEON',58155,90000,90000,NULL,1),(17,3,1475270573,12,'HOLDER TERIOS T3','HOLDER GAMEPAD TERIOS T3',12345,35000,35000,NULL,1),(18,1,1475270649,10,'U NOTTON VR','KACAMATA VR U NOTTON',41370,100000,100000,NULL,1),(19,1,1475270699,2,'BaoFeng Maojing 4 IOS','KACAMATA VR BAOFENG MOJING 4 IOS',248220,550000,550000,NULL,1),(20,1,1475270751,2,'BAOFENG MOJING 5','KACAMATA VR BAOFENG MOJING 5',595728,850000,850000,NULL,1),(21,1,1475270799,2,'BAOFENG MOJING 4S','KACAMATA VR BAOFENG MOJING 4S',316481,550000,550000,NULL,1),(22,1,1475270860,4,'FiitVR 2S','KACAMATA VR FIIT VR 2S',118416,350000,315000,NULL,1),(23,2,1475270913,12,'TERIOS T1','GAMEPAD TERIOS T1',52694,90000,85000,NULL,1),(24,2,1475271016,13,'REMOTE UNIVERSAL','REMOTE UNIVERSAL',55541,90000,85000,NULL,1),(25,2,1476372186,1,'REMOTE BOBOVR','ORIGINAL REMOTE BOBOVR',54218,90000,70000,NULL,1),(26,1,1476427223,5,'VR FOLD','KACAMATA VR FOLD',54296,70000,65000,NULL,1),(27,3,1476427965,14,'SC CARD','MEMORY CARD',23619,49000,40000,NULL,1),(28,2,1476428144,2,'REMOTE BAOFENG MOJING IOS','REMOTE BAOFENG MOJING FOR IOS',63763,115000,80000,NULL,1),(29,3,1476428377,15,'KACAMATA UV','DAPET GRATISAN DARI SUPPLAYER',0,0,0,NULL,1),(30,1,1476429977,6,'SHINECON 3','KACAMATA  SHINECON 3',102199,150000,120000,NULL,1),(31,1,1476432331,6,'SHINECON 1','KACAMATA SHINECON 1',147112,150000,150000,NULL,1),(32,2,1476433248,12,'TERIOS T3 - WHITE','TERIOS T3 WARNA WHITE',108172,135000,115000,NULL,1);
/*!40000 ALTER TABLE `products_tab` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`palma`@`%`*/ /*!50003 TRIGGER `vr_db`.`products_tab_AFTER_INSERT` AFTER INSERT ON `products_tab` FOR EACH ROW
BEGIN
  INSERT INTO inventory_tab (iid, ipid, istatus)
  VALUES (NEW.pid, NEW.pid, 1);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `province_tab`
--

DROP TABLE IF EXISTS `province_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `province_tab` (
  `pid` int(10) NOT NULL AUTO_INCREMENT,
  `pcid` int(10) DEFAULT NULL,
  `pname` varchar(150) DEFAULT NULL,
  `pstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `province_tab`
--

LOCK TABLES `province_tab` WRITE;
/*!40000 ALTER TABLE `province_tab` DISABLE KEYS */;
INSERT INTO `province_tab` VALUES (1,2,'GUANGZHO',1),(2,1,'JAKARTA BARAT',2),(3,1,'DKI JAKARTA',1),(4,1,'JAWA BARAT',1),(5,1,'BANTEN',1),(6,1,'JAWA TIMUR',1);
/*!40000 ALTER TABLE `province_tab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `receiving_item_tab`
--

DROP TABLE IF EXISTS `receiving_item_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `receiving_item_tab` (
  `rid` int(10) NOT NULL AUTO_INCREMENT,
  `riid` int(10) DEFAULT NULL,
  `rpid` int(10) DEFAULT NULL,
  `rqty` int(10) DEFAULT NULL,
  `rprice` int(10) DEFAULT NULL,
  `rpricebase` int(10) DEFAULT NULL,
  `tprice` int(10) DEFAULT NULL,
  `rstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receiving_item_tab`
--

LOCK TABLES `receiving_item_tab` WRITE;
/*!40000 ALTER TABLE `receiving_item_tab` DISABLE KEYS */;
INSERT INTO `receiving_item_tab` VALUES (1,1,26,50,70000,54296,NULL,1),(2,1,25,50,90000,54218,NULL,1),(3,1,1,100,425000,305850,NULL,1),(4,2,25,40,90000,54218,NULL,1),(5,2,24,50,90000,55541,NULL,1),(6,2,3,100,345000,204940,NULL,1),(7,2,1,100,425000,305850,NULL,1),(8,3,25,50,90000,54218,NULL,1),(9,3,8,20,525000,445390,NULL,1),(10,3,2,40,345000,205295,NULL,1),(11,3,1,40,425000,305850,NULL,1),(12,4,28,5,115000,63763,NULL,1),(13,4,27,100,49000,23619,NULL,1),(14,4,23,50,90000,52694,NULL,1),(15,4,17,50,35000,12345,NULL,1),(16,4,15,50,125000,106053,NULL,1),(17,4,14,60,90000,63763,NULL,1),(18,4,10,10,385000,351520,NULL,1),(19,4,7,5,299000,203162,NULL,1),(20,4,6,5,299000,203162,NULL,1),(21,4,5,5,299000,203162,NULL,1),(22,4,4,49,285000,203162,NULL,1),(23,4,29,0,0,0,NULL,1),(24,5,31,20,150000,147112,NULL,1),(25,5,30,30,150000,102199,NULL,1),(26,5,16,50,90000,58155,NULL,1),(27,5,12,20,385000,313464,NULL,1),(28,5,9,20,450000,283909,NULL,1),(29,5,2,40,345000,205295,NULL,1),(30,6,15,50,125000,106053,NULL,1),(31,0,17,0,35000,12345,NULL,1),(32,0,3,0,345000,204940,NULL,1),(33,0,1,0,425000,305850,NULL,1),(34,0,2,0,345000,205295,NULL,1),(35,0,25,0,90000,54218,NULL,1),(36,6,17,50,35000,12345,NULL,1),(37,6,3,60,345000,204940,NULL,1),(38,6,1,50,425000,305850,NULL,1),(39,6,2,60,345000,205295,NULL,1),(40,6,25,100,90000,54218,NULL,1),(41,7,13,20,199000,147895,NULL,1),(42,7,2,20,345000,205295,NULL,1),(43,7,1,20,425000,305850,NULL,1),(44,8,22,30,300000,93083,NULL,1),(45,8,21,2,550000,316481,NULL,1),(46,8,20,2,850000,595728,NULL,1),(47,8,19,10,550000,248220,NULL,1),(48,8,18,20,100000,41370,NULL,1),(49,8,2,80,345000,205295,NULL,1),(50,8,1,40,425000,305850,NULL,1),(51,9,32,50,135000,108172,NULL,1),(52,9,17,100,35000,12345,NULL,1),(53,9,3,30,345000,204940,NULL,1);
/*!40000 ALTER TABLE `receiving_item_tab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `receiving_tab`
--

DROP TABLE IF EXISTS `receiving_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `receiving_tab` (
  `rid` int(10) NOT NULL AUTO_INCREMENT,
  `rvendor` varchar(300) DEFAULT NULL,
  `rdocno` varchar(10) DEFAULT NULL,
  `rdate` int(10) DEFAULT NULL,
  `rdesc` varchar(350) DEFAULT NULL,
  `rstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receiving_tab`
--

LOCK TABLES `receiving_tab` WRITE;
/*!40000 ALTER TABLE `receiving_tab` DISABLE KEYS */;
INSERT INTO `receiving_tab` VALUES (1,'1','1',1465405200,'04 Juni 2016 - 09 Juni 2016 BY AIR',3),(2,'1','2',1467392400,'27 Juni 2016 - 02 Juli 2016 BY AIR',3),(3,'1','3',1468947600,'12 Juli 2016 - 20 Jul BY AIR',3),(4,'1','4',1475686800,'29 Juli 2016 - 06 Agus 2016 BY AIR',3),(5,'1','4',1470416400,'06 Agust 2016 BY AIR',3),(6,'1','6',1476378000,'14 Agust 2016',3),(7,'1','7',1473872400,'15 Sep 2016 BY AIR',3),(8,'1','8',1475686800,'15 Sep 2016 - 6 Oct BY SEA',3),(9,'1','9',1475168400,'30 Sep 2016 BY SEA',1);
/*!40000 ALTER TABLE `receiving_tab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaction_detail_tab`
--

DROP TABLE IF EXISTS `transaction_detail_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaction_detail_tab` (
  `tid` int(10) NOT NULL AUTO_INCREMENT,
  `ttid` int(10) DEFAULT NULL,
  `tpid` int(10) DEFAULT NULL,
  `tprice` int(10) DEFAULT NULL,
  `tpricebase` int(10) DEFAULT NULL,
  `tqty` int(10) DEFAULT NULL,
  `treject` tinyint(1) DEFAULT '0',
  `tstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction_detail_tab`
--

LOCK TABLES `transaction_detail_tab` WRITE;
/*!40000 ALTER TABLE `transaction_detail_tab` DISABLE KEYS */;
INSERT INTO `transaction_detail_tab` VALUES (1,1,25,90000,54218,1,0,1),(2,2,31,300000,147112,2,0,1),(3,2,30,240000,102199,2,0,1),(4,3,17,70000,12345,2,0,1),(5,3,15,125000,106053,1,0,1),(6,4,22,365000,118416,1,0,1),(7,5,17,35000,12345,1,0,1),(8,5,15,125000,106053,1,0,1),(9,6,13,199000,147895,1,0,1),(10,7,17,35000,12345,1,0,1),(11,7,15,125000,106053,1,0,1),(12,8,17,35000,12345,1,0,1),(13,8,15,125000,106053,1,0,1),(14,9,13,199000,147895,1,0,1),(15,10,3,345000,204940,1,0,1),(16,11,12,385000,313464,1,0,1),(17,12,13,199000,147895,1,0,1),(18,13,9,450000,283909,1,0,1),(19,14,3,345000,204940,1,0,1),(20,15,13,199000,147895,1,0,1),(21,16,13,0,147895,0,0,1),(22,17,13,199000,147895,1,0,1),(23,18,22,365000,118416,1,0,1),(24,19,2,340000,205295,1,0,1),(25,20,22,365000,118416,1,0,1),(26,21,17,35000,12345,1,0,1),(27,21,15,125000,106053,1,0,1),(28,22,17,35000,12345,1,0,1),(29,22,15,125000,106053,1,0,1),(30,23,13,180000,147895,1,0,1),(31,24,3,345000,204940,1,0,1),(32,25,2,340000,205295,1,0,1),(33,26,13,180000,147895,1,0,1),(34,27,3,345000,204940,1,0,1),(35,28,2,340000,205295,1,0,1),(36,29,1,380000,230285,1,0,1),(37,30,22,365000,118416,1,0,1),(38,31,13,180000,147895,1,0,1),(39,32,13,180000,147895,1,0,1),(40,33,14,90000,63763,1,0,1),(41,33,3,345000,204940,1,0,1),(42,34,17,35000,12345,1,0,1),(43,34,15,125000,106053,1,0,1),(44,35,2,340000,205295,1,0,1),(45,36,30,150000,102199,1,0,1),(46,37,13,180000,147895,1,0,1),(47,38,25,90000,54218,1,0,1),(48,38,1,380000,230285,1,0,1),(49,39,17,35000,12345,1,0,1),(50,40,26,140000,54296,2,0,1),(51,41,2,340000,205295,1,0,1);
/*!40000 ALTER TABLE `transaction_detail_tab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaction_tab`
--

DROP TABLE IF EXISTS `transaction_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaction_tab` (
  `tid` int(10) NOT NULL AUTO_INCREMENT,
  `titype` tinyint(1) DEFAULT '1',
  `ttype` tinyint(1) DEFAULT '1',
  `tcid` int(10) DEFAULT NULL,
  `tdate` int(10) DEFAULT NULL,
  `tno` varchar(15) DEFAULT NULL,
  `tqty` int(10) DEFAULT NULL,
  `tammount` int(10) DEFAULT NULL,
  `tdiscount` int(10) DEFAULT NULL,
  `ttotal` int(10) DEFAULT NULL,
  `tdesc` varchar(500) DEFAULT NULL,
  `tstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction_tab`
--

LOCK TABLES `transaction_tab` WRITE;
/*!40000 ALTER TABLE `transaction_tab` DISABLE KEYS */;
INSERT INTO `transaction_tab` VALUES (1,1,1,4,1476425407,'PO141016001',1,90000,0,90000,'',2),(2,1,1,2,1476716166,'PO171016001',4,540000,0,540000,'aaaaaaaaa',2),(3,1,1,7,1476724445,'PO181016001',3,195000,29200,165800,'TP',1),(4,1,1,8,1476724918,'PO181016002',1,365000,0,365000,'TP',1),(5,1,1,9,1476725073,'PO181016003',2,160000,5000,155000,'TP',1),(6,1,1,10,1476725199,'PO181016004',1,199000,0,199000,'BL',1),(7,1,1,11,1476725629,'PO181016005',2,160000,5000,155000,'BL',1),(8,1,1,12,1476725653,'PO181016006',2,160000,5000,155000,'BL',1),(9,1,1,13,1476725661,'PO181016007',1,199000,1000,198000,'TP',1),(10,1,1,14,1476725905,'PO181016008',1,345000,0,345000,'BL',1),(11,1,1,15,1476726410,'PO181016009',1,385000,10000,375000,'BL',1),(12,1,1,16,1476726906,'PO181016010',1,199000,0,199000,'BL',1),(13,1,1,17,1476727004,'PO181016011',1,450000,0,450000,'TP',1),(14,1,1,18,1476731629,'PO181016012',1,345000,0,345000,'Shopee',3),(15,1,1,19,1476729895,'PO181016013',1,199000,1000,198000,'TP',1),(16,1,1,0,1476729971,'PO181016014',0,0,1000,-1000,'TP',2),(17,1,1,21,1476730822,'PO181016015',1,199000,1000,198000,'TP',1),(18,1,1,22,1476730901,'PO181016016',1,365000,0,365000,'TP',1),(19,1,1,23,1476732152,'PO181016017',1,340000,0,340000,'BL',1),(20,1,1,24,1476682620,'PO191016001',1,365000,0,365000,'TP',1),(21,1,1,25,1476836664,'PO191016002',2,160000,30000,130000,'FAJAR AL HASANI\r\nCGKSJ00685799916',1),(22,1,1,25,1476750300,'PO191016003',2,160000,30000,130000,'AYANAMI STORE\r\nCGKSJ00685811116\r\n',1),(23,1,1,26,1476753720,'PO191016004',1,180000,1000,179000,'TP\r\nCGKSJ00685801316\r\n',1),(24,1,1,27,1476753720,'PO191016005',1,345000,0,345000,'BL\r\nCGK2Q01903054216',1),(25,1,1,28,1476753900,'PO191016006',1,340000,0,340000,'Lazada\r\nCGK2Q01903064016',1),(26,1,1,29,1476855840,'PO201016001',1,180000,0,180000,'BL',1),(27,1,1,30,1476856200,'PO201016001',1,345000,0,345000,'BL',1),(28,1,1,31,1476856380,'PO201016001',1,340000,17000,323000,'BL',1),(29,1,1,34,1476856260,'PO201016001',1,380000,0,380000,'TP',1),(30,1,1,35,1476856440,'PO201016001',1,365000,15000,350000,'TP',1),(31,1,1,36,1476899760,'PO201016001',1,180000,0,180000,'TP',1),(32,1,1,37,1476856620,'PO201016002',1,180000,0,180000,'TP',1),(33,1,1,38,1476856680,'PO201016002',2,435000,5000,430000,'TP',1),(34,1,1,39,1476933600,'PO201016002',2,160000,10000,150000,'TP',2),(35,1,0,41,1476932640,'PO211016001',1,340000,0,340000,'CL\r\nharga 350rb',1),(36,1,1,43,1476932820,'PO211016001',1,150000,0,150000,'CL\r\n150rb',1),(37,1,1,45,1477031940,'PO211016001',1,180000,0,180000,'TP',1),(38,1,1,46,1477032300,'PO211016002',2,470000,20000,450000,'TP',1),(39,1,1,47,1477035660,'PO211016003',1,35000,0,35000,'TP',1),(40,1,1,49,1476912420,'PO211016004',2,140000,0,140000,'BL JAKVR',1),(41,1,1,42,1476912600,'PO211016004',1,340000,17000,323000,'BL',1);
/*!40000 ALTER TABLE `transaction_tab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_access_tab`
--

DROP TABLE IF EXISTS `users_access_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_access_tab` (
  `uid` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `ugid` int(4) unsigned NOT NULL,
  `upid` int(10) DEFAULT NULL,
  `uaccess` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_access_tab`
--

LOCK TABLES `users_access_tab` WRITE;
/*!40000 ALTER TABLE `users_access_tab` DISABLE KEYS */;
INSERT INTO `users_access_tab` VALUES (1,1,1,1),(2,1,2,1),(3,1,3,1),(4,1,4,1),(5,1,5,1),(6,1,6,1),(7,1,7,1),(8,1,8,1),(9,1,9,1),(10,1,10,1),(11,1,11,1),(12,1,12,1),(13,1,13,1),(14,1,14,1),(15,1,15,1),(16,1,16,1),(17,1,17,1),(18,1,18,1),(19,1,19,1),(20,1,20,1),(21,1,21,1),(22,1,22,1),(23,1,23,1),(24,1,24,1),(25,1,25,1),(26,1,26,1),(27,1,27,1),(28,1,28,1),(29,1,29,1),(30,1,30,1),(31,1,31,1),(32,1,32,1),(33,1,33,1),(34,1,34,1),(35,1,35,1),(36,2,1,1),(37,2,2,1),(38,2,3,1),(39,2,4,1),(40,2,5,1),(41,2,6,1),(42,2,7,1),(43,2,8,1),(44,2,9,1),(45,2,10,1),(46,2,11,1),(47,2,12,1),(48,2,13,1),(49,2,14,1),(50,2,15,1),(51,2,16,1),(52,2,17,1),(53,2,18,1),(54,2,19,1),(55,2,20,1),(56,2,21,1),(57,2,22,1),(58,2,23,1),(59,2,24,1),(60,2,25,1),(61,2,26,1),(62,2,27,1),(63,2,28,1),(64,2,29,1),(65,2,30,0),(66,2,31,0),(67,2,32,0),(68,2,33,0),(69,2,34,0),(70,2,35,1);
/*!40000 ALTER TABLE `users_access_tab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_groups_tab`
--

DROP TABLE IF EXISTS `users_groups_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_groups_tab` (
  `uid` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `uname` varchar(50) NOT NULL,
  `udesc` text NOT NULL,
  `ustatus` int(1) DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_groups_tab`
--

LOCK TABLES `users_groups_tab` WRITE;
/*!40000 ALTER TABLE `users_groups_tab` DISABLE KEYS */;
INSERT INTO `users_groups_tab` VALUES (1,'Root','Root',1),(2,'Admin','Admin',1);
/*!40000 ALTER TABLE `users_groups_tab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_permission_tab`
--

DROP TABLE IF EXISTS `users_permission_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_permission_tab` (
  `uid` int(10) NOT NULL AUTO_INCREMENT,
  `uname` varchar(45) DEFAULT NULL,
  `udesc` varchar(150) DEFAULT NULL,
  `uurl` varchar(45) DEFAULT NULL,
  `uparent` int(10) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_permission_tab`
--

LOCK TABLES `users_permission_tab` WRITE;
/*!40000 ALTER TABLE `users_permission_tab` DISABLE KEYS */;
INSERT INTO `users_permission_tab` VALUES (1,'Product','Product','product',0),(2,'ProductExecute','Product Execute','product',1),(3,'Categories','Categories','categories',0),(4,'CategoriesExecute','Categories Execute','categories',3),(5,'Brand','Brand','brand',0),(6,'BrandExecute','Brand Execute','brand',5),(7,'Vendor','Vendor','vendor',0),(8,'VendorExecute','Vendor Execute','vendor',7),(9,'Customer','Customer','customer',0),(10,'CustomerExecute','Customer Execute','customer',9),(11,'City','City','city',0),(12,'CityExecute','City Execute','city',11),(13,'Province','Province','province',0),(14,'ProvinceExecute','Province Execute','province',13),(15,'Country','Country','country',0),(16,'CountryExecute','Country Execute','country',15),(17,'ItemReceiving','Item Receiving','receiving',0),(18,'ItemReceivingExecute','Item Receiving Execute','receiving',17),(19,'Stock','Stock','inventory',0),(20,'Opname','Opname','opname',0),(21,'OpnameExecute','Opname Execute','opname',20),(22,'Order','Order','order',0),(23,'OrderExecute','Order Execute','order',22),(24,'OrderApproved','Order Approved','order',22),(25,'Return','Return','retur',0),(26,'ReturnExecute','Return Execute','retur',25),(27,'ReturnApproved','Return Approved','retur',25),(28,'ReportTransaction','Report Transaction','reporttransaction',0),(29,'ReportOpname','Report Opname','reportopname',0),(30,'Users','Users','users',0),(31,'UsersExecute','Users Execute','users',30),(32,'UsersGroup','Users Group','users/users_group',0),(33,'UsersGroupExecute','Users Group Execute','users/users_group',32),(34,'ProductPriceBase','Product Price Base','product',1),(35,'PetiCash','Peti Cash','peti_cash',0);
/*!40000 ALTER TABLE `users_permission_tab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_tab`
--

DROP TABLE IF EXISTS `users_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_tab` (
  `uid` int(10) NOT NULL AUTO_INCREMENT,
  `ugid` int(10) DEFAULT NULL,
  `unick` varchar(30) DEFAULT NULL,
  `uemail` varchar(50) DEFAULT NULL,
  `upass` varchar(50) DEFAULT NULL,
  `ulastlogin` varchar(21) DEFAULT NULL,
  `ucreated` int(10) DEFAULT NULL,
  `ustatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_tab`
--

LOCK TABLES `users_tab` WRITE;
/*!40000 ALTER TABLE `users_tab` DISABLE KEYS */;
INSERT INTO `users_tab` VALUES (1,1,'root','root@jakvr.com','5cf558b1dca271a77a59a79a017045d7','2344687083*1477069338',1474115933,1),(2,1,'adry','adry@jakvr.com','a38223f761f7b20dd3d1b08035025ee0','2344687083*1477072184',1475730635,1),(3,2,'ronald','ronald@jakvr.com','bc140d91301e559bc3c6ddd1861d40d3','3070052766*1475734789',1475730635,1),(4,2,'fimma','fimma@jakvr.com','2713719707a72516313e2b6bbacfa46f','1893182351*1477031940',1475730635,1),(5,1,'selvia','selvia@jakvr.com','5ba89b2db818da63a8f765c117a62872',NULL,1475730635,1);
/*!40000 ALTER TABLE `users_tab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendor_tab`
--

DROP TABLE IF EXISTS `vendor_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vendor_tab` (
  `vid` int(10) NOT NULL AUTO_INCREMENT,
  `vname` varchar(150) DEFAULT NULL,
  `vaddr` text,
  `vphone` varchar(30) DEFAULT NULL,
  `vcountry` int(10) DEFAULT NULL,
  `vprovince` int(10) DEFAULT NULL,
  `vcity` int(10) DEFAULT NULL,
  `vstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`vid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendor_tab`
--

LOCK TABLES `vendor_tab` WRITE;
/*!40000 ALTER TABLE `vendor_tab` DISABLE KEYS */;
INSERT INTO `vendor_tab` VALUES (1,'JAMESS CHINA','GA TAU','0*0',2,1,1,1),(2,'JAKNOT','CP','0*0',1,2,2,1);
/*!40000 ALTER TABLE `vendor_tab` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-10-22  1:34:02
