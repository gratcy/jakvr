-- MySQL dump 10.15  Distrib 10.0.25-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: vr_db
-- ------------------------------------------------------
-- Server version	10.0.25-MariaDB-0ubuntu0.15.10.1

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brand_tab`
--

LOCK TABLES `brand_tab` WRITE;
/*!40000 ALTER TABLE `brand_tab` DISABLE KEYS */;
INSERT INTO `brand_tab` VALUES (1,'BOBOVR','KACAMATA VR BOBOVR',1),(2,'BAOFENG MOJING','KACAMATA BAOFENG MOJING',1),(3,'DEEPOON','KACAMATA DEEPOON',1),(4,'FIITVR','KACAMATA FIITVR',1),(5,'VR Fold','KACAMATA VR PORTABLE VR Fold',1),(6,'SHINECON','KACAMATA VR SHINECON',1),(7,'EYE TRAVEL','KACAMATA VR EYE TRAVEL',1),(8,'BOSS VR','KACAMATA VR BOSS',1),(9,'XIAOMI','KACAMATA VR XIAOMI',1),(10,'U NOTTON','KACAMATA VR U NOTTON',1),(11,'GOOGLE','KACAMATA VR GOOGLE CARDBOARD',1),(12,'TERIOS','GAMEPAD TERIOS',1),(13,'UNIVERSAL','UNIVERSAL GAMEPAD',1);
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
  `cname` varchar(150) DEFAULT NULL,
  `caddr` text,
  `ccountry` int(10) DEFAULT NULL,
  `cprovince` int(10) DEFAULT NULL,
  `ccity` int(10) DEFAULT NULL,
  `cemail` varchar(150) DEFAULT NULL,
  `cphone` varchar(30) DEFAULT NULL,
  `cstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers_tab`
--

LOCK TABLES `customers_tab` WRITE;
/*!40000 ALTER TABLE `customers_tab` DISABLE KEYS */;
INSERT INTO `customers_tab` VALUES (0,1,'NO NAME','NO ADDRESS',1,3,2,'-','-*-',1),(1,1,'INDOGAMERS MUPENX','IDC MAMPANG',1,3,2,'-','-*-',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory_tab`
--

LOCK TABLES `inventory_tab` WRITE;
/*!40000 ALTER TABLE `inventory_tab` DISABLE KEYS */;
INSERT INTO `inventory_tab` VALUES (1,1,0,370,0,0,0,370,1),(2,2,0,240,0,0,0,240,1),(3,3,0,220,0,0,0,220,1),(4,4,0,50,0,0,0,50,1),(5,5,0,5,0,0,0,5,1),(6,6,0,5,0,0,0,5,1),(7,7,0,5,0,0,0,5,1),(8,8,0,20,0,0,0,20,1),(9,9,0,20,0,0,0,20,1),(10,10,0,10,1,0,0,9,1),(11,11,0,4,4,0,0,0,1),(12,12,0,20,2,0,1,23,1),(13,13,0,163,0,0,0,163,1),(14,14,0,0,0,0,0,0,1),(15,15,0,200,0,0,0,200,1),(16,16,0,50,0,0,0,50,1),(17,17,0,150,0,0,0,150,1),(18,18,0,20,0,0,0,20,1),(19,19,0,10,0,0,0,10,1),(20,20,0,2,0,0,0,2,1),(21,21,0,2,0,0,0,2,1),(22,22,0,20,0,0,0,20,1),(23,23,0,50,0,0,0,50,1),(24,24,0,10,0,0,0,10,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `opname_tab`
--

LOCK TABLES `opname_tab` WRITE;
/*!40000 ALTER TABLE `opname_tab` DISABLE KEYS */;
INSERT INTO `opname_tab` VALUES (1,12,1475270349,0,20,2,18,0,5,'salah',1);
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
  `pstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_price_tab`
--

LOCK TABLES `product_price_tab` WRITE;
/*!40000 ALTER TABLE `product_price_tab` DISABLE KEYS */;
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
  `ppic` varchar(150) DEFAULT NULL,
  `pstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_tab`
--

LOCK TABLES `products_tab` WRITE;
/*!40000 ALTER TABLE `products_tab` DISABLE KEYS */;
INSERT INTO `products_tab` VALUES (1,1,1475258929,1,'BOBOVR Z4','KACAMATA VR',305850,425000,NULL,1),(2,1,1475259011,1,'BOBOVR Z4 MINI','KACAMATA VR',205295,345000,NULL,1),(3,1,1475259147,4,'FIITVR 2N','KACAMATA VR',204940,345000,NULL,1),(4,1,1475259533,2,'BAOFENG MOJING XD WHITE','WARNA PUTIH',203162,285000,NULL,1),(5,1,1475259572,2,'BAOFENG MOJING XD PINK','WARNA PINK',203162,299000,NULL,1),(6,1,1475259613,2,'BAOFENG MOJING XD KUNING','WARNA KUNING',203162,299000,NULL,1),(7,1,1475259667,2,'BAOFENG MOJING XD BIRU','WARNA BIRU',203162,299000,NULL,1),(8,1,1475260066,2,'BAOFENG MOJING 4 ANDROID','MOJING 4 ANDORID ONLY',445390,525000,NULL,1),(9,1,1475260426,8,'BOSS VR','KACAMATA VR BOSS',283909,450000,NULL,1),(10,1,1475260506,3,'DEEPOON V3','KACAMATA VR DEEPOON V3',351520,385000,NULL,1),(11,1,1475260612,3,'DEEPOON E2','KACAMATA PC VR DEEPOON E2',3000000,3600000,NULL,1),(12,1,1475260673,7,'SPACE VR','KACAMATA VR EYE TRAVEL / SPACE VR',313464,385000,NULL,1),(13,1,1475265010,9,'XIAOMI VR','KACAMATA VR XIAOMI',147895,260000,NULL,1),(14,2,1475267421,2,'REMOTE BAOFENG MOJING','REMOTE BAOFENG MOJING',63763,90000,NULL,1),(15,2,1475269130,12,'TERIOS T3','GAMEPAD TERIOS T3',106053,125000,NULL,1),(16,2,1475270441,6,'REMOTE SHINECON','REMOTE GAMEPAD SHINCEON',58155,90000,NULL,1),(17,3,1475270573,12,'HOLDER TERIOS T3','HOLDER GAMEPAD TERIOS T3',12345,35000,NULL,1),(18,1,1475270649,10,'U NOTTON VR','KACAMATA VR U NOTTON',41370,100000,NULL,1),(19,1,1475270699,2,'BaoFeng Maojing 4 IOS','KACAMATA VR BAOFENG MOJING 4 IOS',248220,550000,NULL,1),(20,1,1475270751,2,'BAOFENG MOJING 5','KACAMATA VR BAOFENG MOJING 5',595728,850000,NULL,1),(21,1,1475270799,2,'BAOFENG MOJING 4S','KACAMATA VR BAOFENG MOJING 4S',316481,550000,NULL,1),(22,1,1475270860,4,'FiitVR 2S','KACAMATA VR FIIT VR 2S',93083,300000,NULL,1),(23,2,1475270913,12,'TERIOS T1','GAMEPAD TERIOS T1',52694,90000,NULL,1),(24,2,1475271016,13,'GAMEPAD UNIVERSAL','GAMEPAD UNIVERSAL',55541,90000,NULL,1);
/*!40000 ALTER TABLE `products_tab` ENABLE KEYS */;
UNLOCK TABLES;

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
  `rstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receiving_item_tab`
--

LOCK TABLES `receiving_item_tab` WRITE;
/*!40000 ALTER TABLE `receiving_item_tab` DISABLE KEYS */;
INSERT INTO `receiving_item_tab` VALUES (1,1,12,20,1),(2,2,1,20,1),(3,3,10,10,1),(4,4,9,20,1),(5,5,8,20,1),(6,6,7,5,1),(7,7,6,5,1),(8,7,5,5,1),(9,7,4,50,1),(10,7,3,220,1),(11,8,2,240,1),(12,8,1,350,1),(13,9,11,4,1),(14,10,13,163,1),(15,11,24,10,1),(16,11,23,50,1),(17,11,22,20,1),(18,11,21,2,1),(19,11,20,2,1),(20,11,19,10,1),(21,11,18,20,1),(22,11,17,150,1),(23,11,16,50,1),(24,11,15,200,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receiving_tab`
--

LOCK TABLES `receiving_tab` WRITE;
/*!40000 ALTER TABLE `receiving_tab` DISABLE KEYS */;
INSERT INTO `receiving_tab` VALUES (1,'1','1',1475254800,'TES',3),(2,'1','2',1475254800,'BOBOVR',3),(3,'1','3',1475254800,'IMPOR',3),(4,'1','4',1475254800,'IMPOR',3),(5,'1','5',1475254800,'IMPOR',3),(6,'1','6',1475254800,'IMPOR STOCK',3),(7,'1','7',1475254800,'IMPOR STOCK',3),(8,'1','8',1475254800,'IMPOR STOCK',3),(9,'1','9',1475254800,'IMPOR STOCK',3),(10,'1','10',1475254800,'KACAMATA VR XIAOMI',3),(11,'1','11',1475254800,'',3);
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction_detail_tab`
--

LOCK TABLES `transaction_detail_tab` WRITE;
/*!40000 ALTER TABLE `transaction_detail_tab` DISABLE KEYS */;
INSERT INTO `transaction_detail_tab` VALUES (1,1,12,385000,313464,1,0,1),(2,2,11,18000000,3000000,4,0,1),(3,3,12,385000,313464,1,0,1),(4,3,10,385000,351520,1,0,1),(5,4,12,385000,313464,1,1,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction_tab`
--

LOCK TABLES `transaction_tab` WRITE;
/*!40000 ALTER TABLE `transaction_tab` DISABLE KEYS */;
INSERT INTO `transaction_tab` VALUES (1,1,0,1,1475262661,'PO011016001',1,385000,385000,0,'ENDORSE',3),(2,1,0,0,1475264851,'PO011016002',4,14400000,0,14400000,'MURAH',3),(3,1,0,0,1475265024,'PO011016003',2,770000,20000,750000,'',3),(4,2,0,1,1475266280,'RO011016001',1,385000,NULL,385000,'',3);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_access_tab`
--

LOCK TABLES `users_access_tab` WRITE;
/*!40000 ALTER TABLE `users_access_tab` DISABLE KEYS */;
INSERT INTO `users_access_tab` VALUES (1,1,1,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_permission_tab`
--

LOCK TABLES `users_permission_tab` WRITE;
/*!40000 ALTER TABLE `users_permission_tab` DISABLE KEYS */;
INSERT INTO `users_permission_tab` VALUES (1,'Product','Product','product',0),(2,'ProductExecute','Product Execute','product',1),(3,'Categories','Categories','categories',0),(4,'CategoriesExecute','Categories Execute','categories',3),(5,'Brand','Brand','brand',0),(6,'BrandExecute','Brand Execute','brand',5),(7,'Vendor','Vendor','vendor',0),(8,'VendorExecute','Vendor Execute','vendor',7),(9,'Customer','Customer','customer',0),(10,'CustomerExecute','Customer Execute','customer',9),(11,'City','City','city',0),(12,'CityExecute','City Execute','city',11),(13,'Province','Province','province',0),(14,'ProvinceExecute','Province Execute','province',13),(15,'Country','Country','country',0),(16,'CountryExecute','Country Execute','country',15),(17,'ItemReceiving','Item Receiving','receiving',0),(18,'ItemReceivingExecute','Item Receiving Execute','receiving',17),(19,'Stock','Stock','inventory',0),(20,'Opname','Opname','opname',0),(21,'OpnameExecute','Opname Execute','opname',20),(22,'Order','Order','order',0),(23,'OrderExecute','Order Execute','order',22),(24,'OrderApproved','Order Approved','order',22),(25,'Return','Return','retur',0),(26,'ReturnExecute','Return Execute','retur',25),(27,'ReturnApproved','Return Approved','retur',25),(28,'ReportTransaction','Report Transaction','reporttransaction',0),(29,'ReportOpname','Report Opname','reportopname',0),(30,'Users','Users','users',0),(31,'UsersExecute','Users Execute','users',30),(32,'UsersGroup','Users Group','users/users_group',0),(33,'UsersGroupExecute','Users Group Execute','users/users_group',32),(34,'ProductPriceBase','Product Price Base','product',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_tab`
--

LOCK TABLES `users_tab` WRITE;
/*!40000 ALTER TABLE `users_tab` DISABLE KEYS */;
INSERT INTO `users_tab` VALUES (1,1,'root','root@jakvr.com','5cf558b1dca271a77a59a79a017045d7','2130706433*1475269631',1474115933,1),(2,1,'adry','adry@jakvr.com','e89591ee9b8e7018511649a2146ae279',NULL,NULL,1);
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

-- Dump completed on 2016-10-02 19:31:23
