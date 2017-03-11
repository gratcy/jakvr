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
-- Table structure for table `branch_tab`
--

DROP TABLE IF EXISTS `branch_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `branch_tab` (
  `bid` int(10) NOT NULL AUTO_INCREMENT,
  `bname` varchar(150) DEFAULT NULL,
  `bcountry` int(10) DEFAULT NULL,
  `bprovince` int(10) DEFAULT NULL,
  `bcity` int(10) DEFAULT NULL,
  `baddr` varchar(500) DEFAULT NULL,
  `bphone` varchar(30) DEFAULT NULL,
  `bstatus` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branch_tab`
--

LOCK TABLES `branch_tab` WRITE;
/*!40000 ALTER TABLE `branch_tab` DISABLE KEYS */;
INSERT INTO `branch_tab` VALUES (1,'Pusat',1,3,2,'wewe','0865624242*08084028402',1),(2,'Citraland',1,3,2,'Citraland','0865624242*0865624242',1);
/*!40000 ALTER TABLE `branch_tab` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brand_tab`
--

LOCK TABLES `brand_tab` WRITE;
/*!40000 ALTER TABLE `brand_tab` DISABLE KEYS */;
INSERT INTO `brand_tab` VALUES (1,'BOBOVR','KACAMATA VR BOBOVR',1),(2,'BAOFENG MOJING','KACAMATA BAOFENG MOJING',1),(3,'DEEPOON','KACAMATA DEEPOON',1),(4,'FIITVR','KACAMATA FIITVR',1),(5,'VR Fold','KACAMATA VR PORTABLE VR Fold',1),(6,'SHINECON','KACAMATA VR SHINECON',1),(7,'EYE TRAVEL','KACAMATA VR EYE TRAVEL',1),(8,'BOSS VR','KACAMATA VR BOSS',1),(9,'XIAOMI','KACAMATA VR XIAOMI',1),(10,'U NOTTON','KACAMATA VR U NOTTON',1),(11,'GOOGLE','KACAMATA VR GOOGLE CARDBOARD',1),(12,'TERIOS','GAMEPAD TERIOS',1),(13,'UNIVERSAL','UNIVERSAL GAMEPAD',1),(14,'KINGSTONE','MEMORY CARD HP',1),(15,'NO BRAND','BARANG YANG TANPA MERK',1),(16,'8 Bitdo','8 Bitdo',1),(17,'IPEGA','GAMEPAD ACC',1),(18,'Cardboard','Cardboard Virtual Reality\r\n',2),(19,'VZTEC ','VZTEC GAMEPAD',1),(20,'NYKO','NYKO GAMEPAD',1),(21,'VRBOX','VR BOX',1);
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
  `ctype` tinyint(1) DEFAULT '1',
  `cname` varchar(150) DEFAULT NULL,
  `cdesc` varchar(300) DEFAULT NULL,
  `cwarranty` int(2) DEFAULT '0',
  `cstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories_tab`
--

LOCK TABLES `categories_tab` WRITE;
/*!40000 ALTER TABLE `categories_tab` DISABLE KEYS */;
INSERT INTO `categories_tab` VALUES (1,1,'Kacamata VR','Product Kacamata VR',30,1),(2,1,'GamePad','GamePad Ramote',10,1),(3,1,'ACC GAMEPAD','HOLDER T3',7,1),(4,2,'BL KOEKMURAH','TRANSAKSI TOKO KOEKMURAH DI BUKALAPAK',0,1),(5,2,'BL RAJAONG','TRANSAKSI TOKO RAJAONG DI BUKALAPAK',0,1),(6,2,'BL JAKVR','TRANSAKSI TOKO JAKVR DI BUKALAPAK',0,1),(7,2,'TP KOEKMURAH','TRANSAKSI TOKO KOEKMURAH DI TOKOPEDIA',0,1),(8,2,'TP RAJAONG','TRANSAKSI TOKO RAJAONG DI TOKOPEDIA',0,1),(9,2,'SHOPEE','TRANSAKSI VIA SHOPEE.CO.ID',0,1),(10,2,'LAZADA','TRANSAKSI VIA LAZADA.CO.ID',0,1),(11,2,'BLIBLI','TRANSAKSI VIA BLIBLI.COM',0,1),(12,2,'ELEVENIA','TRANSAKSI VIA ELEVENIA.CO.ID',0,1),(13,2,'AKULAKU','TRANSAKSI VIA AKULAKU.COM',0,1),(14,2,'JAPRI','TRANSAKSI TIDAK MELALUI TOKO ONLINE / OFFLINE (BISA VIA CALL/SMS/WHATSAPP, DLL)\r\nJGN LUPA DI JELASKAN DI DESKRIPSI TRANSAKSI DAN TETAP MASUKAN NEW CUSTOMER+NO HP NYA)',0,1),(15,2,'RESELLER','TRANSAKSI PERMINTAAN RESELLER',0,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city_tab`
--

LOCK TABLES `city_tab` WRITE;
/*!40000 ALTER TABLE `city_tab` DISABLE KEYS */;
INSERT INTO `city_tab` VALUES (1,1,'GUANGZHO',1),(2,3,'JAKARTA SELATAN',1),(3,3,'JAKARTA BARAT',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=282 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers_tab`
--

LOCK TABLES `customers_tab` WRITE;
/*!40000 ALTER TABLE `customers_tab` DISABLE KEYS */;
INSERT INTO `customers_tab` VALUES (0,1,0,'NO NAME','NO ADDRESS',1,3,2,'-','-*-',1),(1,1,0,'INDOGAMERS MUPENX','IDC MAMPANG',1,3,2,'-','-*-',1),(2,0,0,'Gratcy Palma','Betawi Permai, Blok G6. No.17',1,3,2,'palmagratcy@gmail.com','08103808301*08103808301',1),(3,1,1,'Testing','',0,0,0,'','08103808301*08103808301',2),(4,1,0,'Jati Kesuma','Jalan D.I. Panjaitan No.176, Medan, Sumatera Utara\r\nMedan Petisah Kota Medan, 20119\r\nSumatera Utara',1,0,0,'','081360006634*',1),(5,1,1,'EWRETR','',0,0,0,'','76676767*76786',2),(6,1,1,'Rully Marinto','',0,0,0,'','081357889698*',1),(7,1,1,'ISWAR','',0,0,0,'','08568125440*',1),(8,1,1,'FAJAR RIFAI','',0,0,0,'','085328494415*',1),(9,1,1,'ALDO WIBOWO SALIM','',0,0,0,'','082281898902*',1),(10,1,1,'iqbal abiyasa','',0,0,0,'','085956565654*',1),(11,1,1,'Sabar','',0,0,0,'','081349607857*',1),(12,1,1,'Rikhsan Ramadhan','',0,0,0,'','081218627360*',1),(13,1,1,'RIYAN HARYADI','',0,0,0,'','081298905656*',1),(14,1,1,'RAMAYANI','',0,0,0,'','081275620656*',1),(15,1,1,'KASMAWATI RAHMAN','',0,0,0,'','08114445552*',1),(16,1,1,'Dwi Yunita Sari','',0,0,0,'','089669300739*',1),(17,1,1,'Dhamma','',0,0,0,'','082143472227*',1),(18,1,0,'Agustina','',0,0,0,'','081288132183*',1),(19,1,1,'Syaeful Amin','',0,0,0,'','081510000801*',1),(20,1,1,'CGK2Q01897489416','',0,0,0,'','081294652239*',1),(21,1,1,'Reza Marketing Trevista Serua','',0,0,0,'','081294652239*',1),(22,1,1,'Lannywaty Budiman','',0,0,0,'','0263261142*',1),(23,1,1,'Bagus Nyoman','',0,0,0,'','081288886535*',1),(24,1,1,'Toko Restaflasher','',0,0,0,'','08989444223*',1),(25,0,0,'TOMOHIKO','',0,0,0,'','08567315768*',1),(26,1,1,'HENGKI','',0,0,0,'','089682359017*',1),(27,1,1,'NASA KARONO WIJANGKORO','',0,0,0,'','082329070884*',1),(28,1,1,'DINI NURHAIKI','',0,0,0,'','085885233756*',1),(29,1,1,'Syarfandhy Achmad','',0,0,0,'','08114445552*',1),(30,1,1,'amir hasan','',0,0,0,'','089530787887*',1),(31,1,1,'ibnu','',0,0,0,'','081278002700*',1),(32,1,1,'Nasa Karono Wijangkoro','',0,0,0,'','082329070884*',2),(33,1,1,'Andri Prima Tarigan','',0,0,0,'','085370009665*',1),(34,1,1,'Widi Wijayanto','',0,0,0,'','085921144106*',1),(35,1,1,'Rizki','',0,0,0,'','081395395205*',1),(36,1,1,'Anton sobandi','',0,0,0,'','087822938885*',1),(37,1,1,'Hazza Mahardika','',0,0,0,'','087882270081*',1),(38,1,1,'Rido Ilahi','',0,0,0,'','081364597129*',1),(39,1,1,'adrysunarto','',0,0,0,'','0817190021*',1),(40,1,1,'beny','',0,0,0,'','087734017558*',2),(41,1,1,'beny ','',0,0,0,'','087734017558*',1),(42,1,1,'Haris Atmajaya','',0,0,0,'','081234199903*',1),(43,1,1,'jefry','',0,0,0,'','083872937379*',1),(44,1,1,'matthew ricky','',0,0,0,'','081286393972*',2),(45,1,1,'ihwal','',0,0,0,'','082126009238*',1),(46,1,1,'Sherly Desnita Savio','',0,0,0,'',' 08999180924*',1),(47,1,1,'arlidona','',0,0,0,'','087724720999*',1),(48,1,1,'yuliana','',0,0,0,'','0811609766*',2),(49,1,1,'Hadriansyah','',0,0,0,'','085348622614*',1),(50,1,1,'Haris Atmajaya','',0,0,0,'','081234199903*',2),(51,1,1,'David','',0,0,0,'','081703618822*',1),(52,1,1,'hary','',0,0,0,'','081212319995*',1),(53,1,1,'ali','',0,0,0,'','085771466202*',1),(54,1,1,'Andrew adam','',0,0,0,'','08990791545*',2),(55,1,1,'adnan wahyudin','',0,0,0,'','081282166555*',1),(56,1,1,'dr.yandra wijaya','',0,0,0,'','085694177764*',1),(57,1,1,'windar adi nugroho','',0,0,0,'','081227039004*',1),(58,1,0,'Stevanus Lauwito','',0,0,0,'','08128595968*',1),(59,1,0,'Bagus','Bogor',1,0,0,'','*',1),(60,1,0,'Bagus','',0,0,0,'','*',2),(61,1,0,'Rocky Prasetyo','',0,0,0,'','0818126811*',1),(62,1,0,'yayan yusra','',0,0,0,'','082370333636*',1),(63,1,0,'Vickrey academy','',0,0,0,'','081382480446*',1),(64,1,0,'Tomohiko','',0,0,0,'','08567315768*',2),(65,0,0,'Ayanami Store','',0,0,0,'','08567315768*',1),(66,1,0,'deny hardiyanto','',0,0,0,'','087875932808*',1),(67,1,0,'Dheny Setiawan','',0,0,0,'','082151652110*',2),(68,1,0,'Dheny Setiawan','',0,0,0,'','082151652110*',1),(69,1,0,'Wakhet','',0,0,0,'','085600202819*',1),(70,1,0,'Riyan Hidayat','',0,0,0,'','081327256700*',1),(71,1,0,'asep kurnia','',0,0,0,'','089655743669*',1),(72,1,0,'Benny Kurniawan','',0,0,0,'','087883361883*',1),(73,1,0,' Dyas','',0,0,0,'',' 081285284975*',1),(74,1,0,'MIFTAHUS SURURI','',0,0,0,'','08561827223*',1),(75,1,0,'Erna sulandari','',0,0,0,'','081250111553*',1),(76,1,0,'Hari Setianto','',0,0,0,'','081255111888*',1),(77,1,0,'Andre','',0,0,0,'andre.cliffe@yahoo.com','*',1),(78,1,0,'Feri','',0,0,0,'','*',1),(79,1,0,'Claudio Dema','Apartemen Gateway Pesanggrahan Jalan Ciledug Raya, Kebayoran Lama Jakarta Selatan Jakarta - Jakarta Selatan 12270 (Unit B 19 - 25 lantai 19)\r\nKebayoran Lama Kota Administrasi Jakarta Selatan, 12270\r\nDKI Jakarta',0,0,0,'','08882502474*',1),(80,1,0,'Rafi abdul aziz','kp.babakan smapal rt04/02 (warung pak yadi) patokan teras kota/dunia bangunan\r\nSerpong Kota Tangerang Selatan, 15310\r\nBanten',0,0,0,'','087889867621*',1),(81,1,0,'Goldy','',0,0,0,'','081320504814*',1),(82,1,0,'Jefry Azis Maulana','',0,0,0,'','089611415605*',1),(83,1,0,'Gangga zidane laxmana','',0,0,0,'','081335957454*',1),(84,1,0,'Eko Andrianto','',0,0,0,'',' 081584377756*',1),(85,1,0,'Bryan Riztama','',0,0,0,'','081288331127*',1),(86,1,0,'Basori','',0,0,0,'','081268598388*',1),(87,0,0,'Go Techno','',0,0,0,'','085891197123*',1),(88,1,0,'Adnan mahyudin','Pemerintah Kota Depok kantor bagian umum Setda Kota Depok\r\nPancoran Mas Kota Depok, 16431\r\nJawa Barat',1,0,0,'','081282166555*',1),(89,1,0,'Chris Djohari','',0,0,0,'','081296161011*',1),(90,1,0,'rizal','',0,0,0,'','085770620997*',1),(91,1,0,'beri kurnia','',0,0,0,'','085210969852*',1),(92,1,0,'Sofian eka Fahmi','',0,0,0,'','085777751470*',1),(93,1,0,'maulana fitriannoor','',0,0,0,'','08969146554*',1),(94,1,0,'Kaysar','',0,0,0,'','081293110547*',1),(95,1,0,'Muhammad Riza Zulfi Lubis','',0,0,0,'','0811770070*',1),(96,1,0,'Yuliana widya farma','',0,0,0,'','081322259949*',1),(97,1,0,' Wadi Irama','',0,0,0,'','082213269262*',1),(98,1,0,'abdul wahid syorifudin','',0,0,0,'','08121616640*',1),(99,1,0,'Dio Nevia Sandy','',0,0,0,'','08970402105*',1),(100,1,0,'Erwin Liga','',0,0,0,'','081585158511*',1),(101,1,0,'surya anugerah','',0,0,0,'','082243800532*',1),(102,1,0,'Akmelen Zulda','',0,0,0,'',' 0811103726*',1),(103,1,0,' dady hermawan','',0,0,0,'',' 082311111991*',1),(104,1,0,' Ignasius Venta Wijaya Adi','',0,0,0,'',' 081902533253*',2),(105,1,0,'M.SIDIK','',0,0,0,'','085891197123*',1),(106,1,0,'jordan','',0,0,0,'','081293664485*',1),(107,1,0,'ryan','',0,0,0,'','08111042700*',1),(108,1,0,'martino','',0,0,0,'','0818809300*',1),(109,1,0,'Adhytia','',0,0,0,'','085778629753*',1),(110,1,0,'Hutomo Dwi Putranto','',0,0,0,'','08161952159*',1),(111,1,0,'Rudy H','',0,0,0,'','08121919992*',2),(112,1,0,'Reza','',0,0,0,'','087881984600*',1),(113,1,0,'Rendy Zedyan','',0,0,0,'','085642256917*',1),(114,1,0,'ardy febrian','',0,0,0,'','089660567658*',1),(115,1,0,'Anton','',0,0,0,'','085289769979*',1),(116,1,0,'Rizki Anggoro Kurniawan','',0,0,0,'','081391837464*',1),(117,1,0,'Alvin Limbart (NIM: 1701315844)','',0,0,0,'','081288135620*',1),(118,1,0,' Bambang Indra Ismaya','',0,0,0,'','081319406616*',1),(119,1,0,' Aditya Samudra','',0,0,0,'','0818949428*',1),(120,1,0,' reza','',0,0,0,'','081288229940*',1),(121,1,0,'Winner Simanjuntak','',0,0,0,'','089522110685*',1),(122,1,0,'M. Fuad Hasan','',0,0,0,'','085770085660*',1),(123,1,0,' Asep juanda (c\'ntong)','',0,0,0,'',' 085798285746*',1),(124,1,0,'bagus ariono','',0,0,0,'','083875750415*',1),(125,1,0,'Edo fernando','',0,0,0,'','08536502350*',1),(126,1,0,'kurnia bagus pambudi (ojl)','',0,0,0,'','081382465530*',1),(127,1,0,'Rico','',0,0,0,'','0811922010*',1),(128,1,0,'Dika','',0,0,0,'','081399828202*',2),(129,1,0,'Dika','',0,0,0,'','081399828202*',1),(130,1,0,'aldi s','',0,0,0,'','081524061306*',1),(131,1,0,'Yon Anwar','',0,0,0,'','085241517879*',1),(132,1,0,'joshua','',0,0,0,'','085939103003*',1),(133,1,0,'Hendra Widiarta','',0,0,0,'','081311658804*',1),(134,1,0,'Gratcy Palma','',1,0,0,'ana_hutapea@yahoo.co.id','111*222',2),(135,1,0,'Gratcy Palma','',1,0,0,'fauzan.s@hood.id','081311658804*',2),(136,1,0,'Gratcy Palma','',1,0,0,'fauzan.s@hood.id','081311658804*',2),(137,1,0,'Gratcy Palma','',1,0,0,'fauzan.s@hood.id','081311658856*',2),(138,1,0,'Agus Riyadi','',0,0,0,'','081807903288*',1),(139,1,0,'Ryan Kurniawan','',0,0,0,'','085222274448*',1),(140,1,0,'Fitriansyah Akbar','',0,0,0,'','0226124851*',1),(141,1,0,'FAIZ JANIKA','',0,0,0,'mfaizjatnika@gmail.com','081223344656*',1),(142,1,0,'Fauzan','',0,0,0,'','0227801028*',1),(143,1,0,'kevin','',0,0,0,'','082217467094*',1),(144,1,0,'Dimas K.W','',0,0,0,'','085885813330*',1),(145,1,0,'halim','',0,0,0,'','081321958094*',1),(146,1,0,'Eftianto','',0,0,0,'','087870052848*',1),(147,1,0,'Deni Parirak (32)','',0,0,0,'','082187472966*',1),(148,1,0,'jamel','',0,0,0,'','081364788798*',1),(149,1,0,'Andri Joko Prasetio','',0,0,0,'','085790559832*',1),(150,1,0,'Budi','',0,0,0,'','081333369111*',1),(151,1,0,'hendra sudrajat','hendra sudrajat Jln. Al-hidayah 2 Rt002/04 no:63 cipadu jaya Larangan tangerang Larangan Kota Tangerang, 15155 Banten Telepon 081517181931',0,0,0,'','081517181931*',1),(152,1,0,'Dede Rudini','',0,0,0,'','087777334205*',1),(153,1,0,'aldi','',0,0,0,'','087770049026*',1),(154,1,0,'SUHARTONO ','',0,0,0,'','089675616566*',1),(155,1,0,'Nyko','',0,0,0,'','085719170470*',1),(156,1,0,'kanya','',0,0,0,'','081936203000*',1),(157,1,0,'Muhammad Qois ','Alamat  :  Jl. Rasamala Raya Gg. Langgar Rt 09 Rw 02 No.45  \r\nKecamatan  :  Tebet  \r\nKota/Kabupaten  :  Jakarta Selatan  \r\nProvinsi  :  DKI Jakarta  \r\nKode Pos  :  12870',0,0,0,'','085885442311  *',1),(158,1,0,'Ilham Nurcahyo','JL.H.Suit No.66 Rt.007/Rw.006, Gg. Al-Hikmah Kel. Semper Barat Kec. Cilincing Jakarta Utara patokan: masuk Gg.Al-hikmah lurus terus sampai mentok, belok kiri sampai mentok, rumah tembok hijau.\r\nCilincing Jakarta Utara, 14130\r\nDKI Jakarta',0,0,0,'','089628309549  *',1),(159,1,0,'Justin','',0,0,0,'','08129651976*',1),(160,1,0,'Rei','',0,0,0,'','085782044125*',1),(161,1,0,'Irawati','',0,0,0,'','082157176210*',1),(162,1,0,'Tangguh Sakti Aji','',0,0,0,'','08568064818*',1),(163,1,0,'AHMAD ARIF','',0,0,0,'','081242302602*',1),(164,1,0,'Tonny Fitriadi Utomo','',0,0,0,'','08568577005*',1),(165,1,0,'Stefanus Yuniar Ristianto','Mako Brimob Subden 4B, jalan Ahmad Yani nomor 49\r\nKecamatan:\r\nPurwokerto Utara\r\nKota:\r\nBanyumas\r\nProvinsi:\r\nJawa Tengah\r\nKode Pos:\r\n53126',1,0,0,'','085729050711*',1),(166,1,0,'hasyim firdaus','kost patrina. kamar no 105. Jl. Agung Utara 5 Blok.A28 No.30, Kel.Sunter Agung Kec.Tanjungpriok, Jakarta Utara 14350\r\nKecamatan:\r\nTanjung Priok\r\nKota:\r\nJakarta Utara\r\nProvinsi:\r\nDKI Jakarta\r\nKode Pos:\r\n14240',0,0,0,'','085695622505*',1),(167,1,0,'Hikmahdanu','Perum. Bumi Mutiara Ji.1 No.3\r\nKecamatan:\r\nGunung Putri\r\nKota:\r\nKab. Bogor\r\nProvinsi:\r\nJawa Barat\r\nKode Pos:\r\n16969',0,0,0,'','087878564888*',1),(168,1,0,'andriyo wisaksono','PT Asuransi Jasindo KP Bima. Jl Sukarno Hatta no.10 paruga\r\nKecamatan:\r\nRasanae Barat\r\nKota:\r\nBima\r\nProvinsi:\r\nNusa Tenggara Barat\r\nKode Pos:\r\n84111',0,0,0,'','081226451000*',1),(169,1,0,'Bayuh Nugraha','',0,0,0,'','081808680300*',1),(170,1,0,'Yaser Rizki Hendryan','Jl. Rambutan 2 No. 48 RT. 005/06, Pejaten Barat, Pasar Minggu, Jakarta Selatan\r\nKecamatan:\r\nPasar Minggu\r\nKota:\r\nJakarta Selatan\r\nProvinsi:\r\nDKI Jakarta\r\nKode Pos:\r\n12510',0,0,0,'','08561618576*',1),(171,1,0,'kafillah soamole','',0,0,0,'','081283701986*',1),(172,1,0,'fanny fajrillah dasni','PT. Mitrapak Eramandiri, Jl. Jababeka IV blok C No. 4 - 5, Kawasan Industri Jababeka I, Pasir Gombong, Cikarang Utara, Bekasi - Jawa Barat\r\nKecamatan:\r\nCikarang Utara\r\nKota:\r\nKab. Bekasi\r\nProvinsi:\r\nJawa Barat\r\nKode Pos:\r\n17550',0,0,0,'','081399075754*',1),(173,1,0,'ikwan felani','JL.KOSAMBI-TELAGASARI KP.TEGAL WARU DUSUN KRAJAN RT/RW 001/001 NO.31 DEKAT GANG PASIR CABE DES.BELENDUNG\r\nKecamatan:\r\nKlari\r\nKota:\r\nKarawang\r\nProvinsi:\r\nJawa Barat\r\nKode Pos:\r\n41371',0,0,0,'','08984388990*',1),(174,1,0,'Estu Budi Nugroho','',0,0,0,'','087715378185*',1),(175,1,0,'Dede Bayu Pratama','Hotel Amaris Embong Malang Surabaya Jl. Kedung doro No. 1-3\r\nKecamatan:\r\nTegalsari\r\nKota:\r\nSurabaya\r\nProvinsi:\r\nJawa Timur\r\nKode Pos:\r\n60261',0,0,0,'','089615187680*',1),(176,1,0,'Guntur','Graha Merah Putih Jalan Kemang Utara nomor 4 Jakarta Selatan\r\nMampang Prapatan, Jakarta Selatan, 12730\r\nDKI Jakarta',0,0,0,'','081295538655*',1),(177,1,0,'dena silvia','Jl. ikan belida no 46, teluk betung selatan, (PT.BPR Swadaya Anugerah Utama)\r\nKecamatan:\r\nTeluk Betung Selatan\r\nKota:\r\nBandar Lampung\r\nProvinsi:\r\nLampung\r\nKode Pos:\r\n35225',0,0,0,'','085268663886*',1),(178,1,0,'Ir. Anky Gautana','PT. Sampoerna Telekomunikasi Indonesia The Grand Sucore Blok AB No. 3, Kavling Anggrek Boulevard, Jl. PHH. Mustofa Bandung 40132\r\nJawa Barat\r\nKota Bandung\r\nCibeunying Kidul\r\nJawa Barat-Kota Bandung-Cibeunying Kidul\r\nIndonesia',0,0,0,'','081313999001  *',1),(179,1,0,'nancy','daan mogot KM 12 no 9 gedung\r\njapfa comfeed 1 cengkareng\r\nDKI Jakarta\r\nKota Jakarta Barat\r\nCengkareng\r\nDKI Jakarta­Kota Jakarta Barat',0,0,0,'','087881390301*',1),(180,1,0,'adhi bohik','JL. P BALI GANG 1 No. 05\r\nKecamatan:\r\nNegara\r\nKota:\r\nJembrana\r\nProvinsi:\r\nBali\r\nKode Pos:\r\n82251',0,0,0,'','081999096745*',1),(181,1,0,'hari iskandar','kp.sindangkarsa rt 03 rw 07 no.90 kel.sukamaju baru kec.tapos kota depok jawa barat\r\nKecamatan:\r\nTapos\r\nKota:\r\nDepok\r\nProvinsi:\r\nJawa Barat\r\nKode Pos:\r\n16462',0,0,0,'','081289406684*',1),(182,1,0,'Eunike Augie','Eunike Augie\r\nJalan alamanda 4 nomor 36, Bukit Palem. Cilegon, Bantenan\r\nPurwakarta Kota Cilegon, 42434\r\nBanten',0,0,0,'','081298057189*',1),(183,1,0,'Robet','Toko Jaya Makmur (Robet)\r\nVila Grand Tomang 2, Jl. Mutiara Pluit Raya blok G1/9A.\r\nPeriuk Kota Tangerang, 15131\r\nBanten\r\nTelp: 08129901119',0,0,0,'','08129901119*',1),(184,1,0,'Ainur Rosyid','TK INTEGRAL AL-AMIIN HIDAYATULLAH JL. PADAT KARYA NO.04\r\nKecamatan:\r\nMimika Baru\r\nKota:\r\nMimika\r\nProvinsi:\r\nPapua\r\nKode Pos:\r\n99910',0,0,0,'','081248448560*',1),(185,1,0,'johan dwiki laksono','\r\nPLN manahan jl. menteri supeno no. 16b\r\nKecamatan:\r\nBanjarsari\r\nKota:\r\nSolo\r\nProvinsi:\r\nJawa Tengah\r\nKode Pos:\r\n57139',0,0,0,'','085742604036*',1),(186,1,0,'Ferdy ardiles','',0,0,0,'','081372751315*',1),(187,1,0,'BORIS','',0,0,0,'','081283834338*',1),(188,1,0,'MARINA','',0,0,0,'','087776687223*',1),(189,1,0,'CANDRA','',0,0,0,'','08129387680*',1),(190,1,0,'P. NANANG','',0,0,0,'','08125096316*',1),(191,1,0,'hermawan(bpk sudirman)mess 13','',0,0,0,'','082221939970*',1),(192,1,0,' fahmi jefri','',0,0,0,'','087789254222*',1),(193,1,0,'Andre Kuncoroyekti','',0,0,0,'','081314721343*',1),(194,1,0,'wahyu kurniadi','',0,0,0,'','089625925990*',1),(195,1,0,'Wely','',0,0,0,'','082260293564*',1),(196,1,0,'gusti','',0,0,0,'','083898746002*',1),(197,1,0,'Hendro Prasetyo','',0,0,0,'','087899110451*',1),(198,1,0,'Randi Rakhman','',0,0,0,'','081573132342*',1),(199,1,0,'Indri Isna Kartika Sari','',0,0,0,'','082230801611*',1),(200,1,0,'fitri annisa','',0,0,0,'',' 081212293557*',1),(201,1,0,'adi','',0,0,0,'','087771193935*',1),(202,1,0,'Cesar','',0,0,0,'','08111117836*',1),(203,0,0,'BUTTON.INC','',0,0,0,'','081223355103*',1),(204,1,0,'fendy','',0,0,0,'','087880175023*',1),(205,1,0,'howard','',0,0,0,'','081141058889*',1),(206,1,0,'ARI','',0,0,0,'','081382463483*',1),(207,1,0,'agus','',0,0,0,'','085399508580*',1),(208,1,0,'wendy','',0,0,0,'','0895354682612*',1),(209,1,0,'Rachmat Susanto','',0,0,0,'','081252755339*',1),(210,1,0,' adhadianto','',0,0,0,'','085266061567*',1),(211,1,0,' Haryanto ','',0,0,0,'','081353004333*',1),(212,1,0,'Teguh','',0,0,0,'','08128973008*',1),(213,1,0,'Robby Prasetyo','Robby Prasetyo\r\nJalan Raya Tanjungsari No.191A\r\nTanjungsari - Sumedang 45362\r\nTanjungsari Kab. Sumedang, 45362\r\nJawa Barat\r\nTelp: 085624822922',0,0,0,'','085624822922*',1),(214,1,0,'Sukarno','Sukarno\r\nJln. Plaju IV no. 34 Bumi Patra Indramayu\r\nIndramayu Kab. Indramayu, 45216\r\nJawa Barat\r\nTelp: 08122302127',0,0,0,'','08122302127*',1),(215,1,0,'ricky poda','',0,0,0,'','085718167194*',1),(216,1,0,'Thio Prama','',0,0,0,'',' 0818917069*',1),(217,1,0,'Ronaldi','',0,0,0,'','082297369696*',1),(218,1,0,'Bondan','',0,0,0,'','08129771506*',1),(219,1,0,'Firdaus Eka Fadla','',0,0,0,'','089647624621*',1),(220,1,0,'Eddy','',0,0,0,'','087877388397*',1),(221,1,0,'lala','',0,0,0,'','081934381512*',1),(222,1,0,'eka','',0,0,0,'','08998273418*',1),(223,1,0,'hugo','',0,0,0,'','081908880800*',1),(224,1,0,'dafy','',0,0,0,'','097886182232*',1),(225,1,0,'nyko','',0,0,0,'','083808008516*',1),(226,1,0,'Jacky','',1,0,0,'','08130616611*',1),(227,1,0,'Oyon','',0,0,0,'','081298633656*',1),(228,1,0,'Redi','',0,0,0,'','081910535345*',1),(229,1,0,'Tatik Edgard','',0,0,0,'','08111019977*',1),(230,1,0,'Dedet','Dedet\r\nToko Larismotor Jl Pelitaraya No.65\r\nBuntok Kab. Barito Selatan, 73712\r\nKalimantan Tengah\r\nTelp: 082255675500',0,0,0,'','082255675500*',1),(231,1,0,'Hilman','\r\nHilman\r\nTelp:\r\n08558888011\r\nAlamat:\r\nJl Raya Pluit Selatan no 1 komplek Pluit Junction Blok SH no 19\r\nKecamatan:\r\nPenjaringan\r\nKota:\r\nJakarta Utara\r\nProvinsi:\r\nDKI Jakarta\r\nKode Pos:\r\n14450',0,0,0,'','08558888011*',1),(232,1,0,'asep permana',' asep permana\r\nPt.schlumberger geophysics nusantara jl.kawasan industri terpadu indonesia china (KITIC) kavling 17 & 18;\r\nKawasan industri GIIC-kota deltamas (jl.tol jakarta cikampek km37), cikarang pusat: 17530,\r\nBekasi jawabarat.\r\nCikarang pusat, kab.bekasi 17530\r\nCikarang Pusat Kab. Bekasi, 17530\r\nJawa Barat\r\nTelp: 08562295439',0,0,0,'','08562295439*',1),(233,1,0,'Novanto Yudho Susilo','Novanto Yudho Susilo\r\nJogja Amazon Green Kamar E9\r\nDepok Kab. Sleman, 55281\r\nD.I. Yogyakarta\r\nTelp: 083867831330',0,0,0,'','083867831330*',1),(234,1,0,'deddy setiawan','deddy setiawan\r\nTelp:\r\n081345756399\r\nAlamat:\r\nFany fashion jl.cempaka no.36\r\nKecamatan:\r\nNanga Pinoh\r\nKota:\r\nMelawi\r\nProvinsi:\r\nKalimantan Barat\r\nKode Pos:\r\n79672',0,0,0,'','081345756399*',1),(235,1,0,'Ritza sw','Ritza sw\r\nKantor bps Bantaeng Jl. Merpati no. 19 Bantaeng. 92411\r\nBantaeng-Pallantikang\r\nKab. Bantaeng, Sulawesi Selatan',0,0,0,'','081215680591*',1),(236,1,0,'muhammad suta','muhammad suta\r\nJl. Budi Kemulyaan III, Gambir, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10110\r\nGambir Jakarta Pusat, 10110\r\nDKI Jakarta\r\nTelp: 089690511864',0,0,0,'','089690511864*',1),(237,1,0,'Fikri Rahmansyah','Fikri Rahmansyah\r\nJl Sapta/Kelingkit No. 64 (Pagar Hitam), RT 005/RW 001, Menteng Dalam\r\nTebet Jakarta Selatan, 12870\r\nDKI Jakarta\r\nTelp: 081321139212',0,0,0,'','081321139212*',1),(238,1,0,'Mirza Thufail Muhammad','Mirza Thufail Muhammad\r\nTelp:\r\n081901163322\r\nAlamat:\r\nPONDOK RADEN PATAH BLOK K-10, RT 01 / RW 04\r\nKecamatan:\r\nSayung\r\nKota:\r\nDemak\r\nProvinsi:\r\nJawa Tengah\r\nKode Pos:\r\n59563',0,0,0,'','081901163322*',1),(239,1,0,'muchsin','muchsin\r\nJl. Nusa Indah (komp praja bhakti bpp.baru) blok 1A No.01\r\nBalikpapan Utara Kota Balikpapan, 76125\r\nKalimantan Timur\r\nTelp: 082156652250',0,0,0,'','082156652250*',1),(240,1,0,'Joni','',0,0,0,'','081212213489*',1),(241,1,0,'DEDI SARIP','',0,0,0,'','082225555253*',1),(242,1,0,'RENDY AGUNG WIGUNA','',0,0,0,'','085793444123*',1),(243,1,0,'STEADY K','',0,0,0,'','08123320955*',1),(244,1,0,'JENNIFER NOVIANY','',0,0,0,'','081311334053*',1),(245,1,0,'M.Mifbakul Munir','',0,0,0,'','083846821887*',1),(246,1,0,'UTAMI MOTO','',0,0,0,'','082131412688*',1),(247,1,0,'IZHAR NUR HUDA QLOBY','',0,0,0,'','088226109802*',1),(248,1,0,'BPK.BASUKI / IBU HENY','',0,0,0,'','081335800800*',1),(249,1,0,'tri purbiantoro','',0,0,0,'','081328211274*',1),(250,1,0,'M. ADE NUGRAHA','',0,0,0,'','082363989316*',1),(251,1,0,'YUSUF IRHAMI','',0,0,0,'','081333897158*',1),(252,1,0,'YOGIE GUNAWAN','',0,0,0,'','08119847250*',1),(253,1,0,'Irwan budi santoso','',0,0,0,'','08122660901*',1),(254,0,0,'KOVESOP','TANGERANG',0,0,0,'','082110051004*',1),(255,1,0,'iman','',0,0,0,'','082114495988*',1),(256,1,0,'Ryan Ariefasa','',0,0,0,'','081219466656*',1),(257,1,0,'Furqon Syahlani','',0,0,0,'','081265306776*',1),(258,1,0,'Fahmi','',0,0,0,'','081286055187*',1),(259,1,0,'GrosirAcc','',0,0,0,'','081320047733*',1),(260,1,0,'Haji Rohimin','',0,0,0,'','089644440327*',1),(261,1,0,'wahyu puji','',0,0,0,'','085718412585*',1),(262,1,0,'Erry Febriansyah','',0,0,0,'','08128215050*',1),(263,1,0,'agus cahyono','',0,0,0,'','081339930883*',1),(264,1,0,'rykel djingga','',0,0,0,'','081808376527*',1),(265,1,0,'ROJAK','',0,0,0,'','083870998976*',1),(266,1,0,'GALUH','',0,0,0,'','085325121072*',1),(267,1,0,'JIMMY FERDINAND MANESE','',0,0,0,'','082255337556*',1),(268,1,0,'WILLIAM','',0,0,0,'','CGK2Q02009235316*',1),(269,0,0,'CARDBOARD_ID.COM','',0,0,0,'','08118301897*',1),(270,1,0,'bripda pratama','',0,0,0,'','081332991866*',1),(271,1,0,'HANDOKO  ','',0,0,0,'','081285151510*',1),(272,1,0,'Indira','',0,0,0,'','085717871949*',1),(273,1,0,'Jeffrey Reynold Tabalujan','Jeffrey Reynold Tabalujan\r\nTelp:\r\n081586010144\r\nAlamat:\r\nKencana Indah II No.21 Pondok Indah Kelurahan : Pondok Pinang\r\nKecamatan:\r\nKebayoran Lama\r\nKota:\r\nJakarta Selatan\r\nProvinsi:\r\nDKI Jakarta\r\nKode Pos:\r\n12310',0,0,0,'','081586010144*',1),(274,1,0,'Vennie Puspita Maharani','Cluster Goodland Vilage No. 36\r\nJalan Masjid, RT/RW 05/07\r\nKel Sudimara Timur\r\nCiledug Kota Tangerang, 15151\r\nBanten',0,0,0,'','085624272399*',1),(275,1,0,'Muhammad sadik','Nama:\r\nMuhammad sadik\r\nTelp:\r\n08884202593\r\nAlamat:\r\nJl.belibis 1 no.20 komp.patompo\r\nKecamatan:\r\nMariso\r\nKota:\r\nMakasar\r\nProvinsi:\r\nSulawesi Selatan\r\nKode Pos:\r\n90124',0,0,0,'','08884202593*',1),(276,1,0,'muhroby di PT PIC','muhroby di PT PIC\r\nTelp:\r\n085726572607\r\nAlamat:\r\nPT PIC di jln kaliurang km 10 sinduharjo, Ngaglik Sleman Yogyakarta (belakang Studio greess music)\r\nKecamatan:\r\nNgaglik\r\nKota:\r\nSleman\r\nProvinsi:\r\nDaerah Istimewa Yogyakarta\r\nKode Pos:\r\n55581',0,0,0,'','085726572607*',1),(277,1,0,'Adjib Bimantoro','Adjib Bimantoro\r\nKomplek Surya Pratama Indah No.A2, Kp. Baru RT.05/RW.05, Kel. Citayam, Kec. Tajurhalang, Kab. Bogor 16320\r\nTajurhalang Kab. Bogor, 16320\r\nJawa Barat\r\nTelp: 08563339601',0,0,0,'','08563339601*',1),(278,1,0,'Herdian Deni Prayoga','Jln. Raya Pogung Dalangan, Pastika Pogung Residence D6, Kost Pondok Rayi, Kamar No.12.\r\nMlati Kab. Sleman, 55284\r\nD.I. Yogyakarta\r\nTelp: 08999263793\r\n\r\n',0,0,0,'','08999263793*',1),(279,1,0,'ALI MURTONO','DENPOM III/1 BOGOR, JL.JEND.SUDIRMAN NO.2, KELURAHAN SEMPUR, KECAMATAN BOGOR TENGAH, KOTA BOGOR, JAWA BARAT\r\nBogor Tengah Kota Bogor, 16129\r\nJawa Barat\r\nTelp: 083819742500',0,0,0,'','083819742500*',1),(280,1,0,'Ramadahan syahri','Gang H.Mahali II, Jalan Radio dalam raya Gandaria utara kebayoran baru, jakarta selatan.\r\nKebayoran Baru Jakarta Selatan, 12140\r\nDKI Jakarta\r\nTelp: 082110488004',0,0,0,'','082110488004*',1),(281,1,0,'Indra Hadi Susetya ','PT. Wijaya Karya Divisi 7 Papua dan Papua Barat\r\nJln. Raya Abepantai No.28 Tanah Hitam\r\nKamkey-Abepura, Jayapura, Papua 99351\r\n(Depan Dealer Yamaha)',0,0,0,'','0811326608*',1);
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
  `ibid` int(10) DEFAULT '1',
  `ipid` int(10) DEFAULT '0',
  `istockbegining` int(10) DEFAULT '0',
  `istockin` int(10) DEFAULT '0',
  `istockout` int(10) DEFAULT '0',
  `istockreturn` int(10) DEFAULT '0',
  `istockreject` int(10) DEFAULT '0',
  `istock` int(10) DEFAULT '0',
  `istatus` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`iid`)
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory_tab`
--

LOCK TABLES `inventory_tab` WRITE;
/*!40000 ALTER TABLE `inventory_tab` DISABLE KEYS */;
INSERT INTO `inventory_tab` VALUES (1,1,1,15,20,29,0,1,6,1),(2,1,2,57,0,36,0,3,21,1),(3,1,3,24,0,19,0,0,5,1),(4,1,4,33,0,3,0,0,30,1),(5,1,5,0,0,0,0,0,0,1),(6,1,6,1,0,0,0,0,1,1),(7,1,7,1,0,0,0,0,1,1),(8,1,8,5,0,0,0,0,5,1),(9,1,9,3,0,1,0,0,2,1),(10,1,10,3,0,0,0,0,3,1),(11,1,11,0,0,0,0,0,0,1),(12,1,12,10,0,0,0,1,10,1),(13,1,13,78,0,53,0,0,25,1),(14,1,14,28,0,13,0,0,15,1),(15,1,15,7,75,28,0,0,50,1),(16,1,16,-2,0,0,0,0,-2,1),(17,1,17,20,90,35,0,0,83,1),(18,1,18,17,0,0,0,0,17,1),(19,1,19,8,0,0,0,0,8,1),(20,1,20,0,0,0,0,0,0,1),(21,1,21,0,0,0,0,0,0,1),(22,1,22,9,0,13,0,0,-4,1),(23,1,23,10,0,2,0,2,8,1),(24,1,24,5,0,0,0,0,5,1),(25,1,25,14,0,14,0,0,0,1),(26,1,26,22,0,2,0,0,20,1),(27,1,27,0,0,0,0,0,0,1),(28,1,28,3,0,0,0,0,3,1),(29,1,29,126,0,0,0,2,126,1),(30,1,30,17,0,13,0,0,4,1),(31,1,31,14,0,5,0,0,9,1),(32,1,32,-1,0,3,0,6,0,1),(33,1,33,3,0,1,0,0,2,1),(34,1,34,4,0,0,0,0,4,1),(39,1,39,0,0,0,0,0,0,1),(40,1,40,-2,2,0,0,0,0,1),(41,1,41,-3,0,0,0,0,-3,1),(42,1,42,0,0,0,0,0,0,1),(43,1,43,-2,2,1,0,0,-1,1),(44,1,44,-1,1,0,0,0,0,1),(45,1,45,-2,0,0,0,0,-2,1),(46,1,46,-2,3,1,0,0,0,1),(47,1,47,0,1,0,0,0,1,1),(48,2,1,4,0,0,0,0,4,1),(49,2,2,4,0,0,0,0,4,1),(50,2,3,6,0,0,0,0,6,1),(51,2,4,4,0,0,0,0,4,1),(52,2,5,2,0,0,0,0,2,1),(53,2,6,1,0,0,0,0,1,1),(54,2,7,0,0,0,0,0,0,1),(55,2,8,1,0,0,0,0,1,1),(56,2,9,1,0,0,0,0,1,1),(57,2,10,2,0,0,0,0,2,1),(58,2,11,1,0,0,0,0,1,1),(59,2,12,3,0,0,0,0,3,1),(60,2,13,4,0,0,0,0,4,1),(61,2,14,7,0,0,0,0,7,1),(62,2,15,5,0,0,0,0,5,1),(63,2,16,2,0,0,0,0,2,1),(64,2,17,0,0,0,0,0,0,1),(65,2,18,1,0,0,0,0,1,1),(66,2,19,1,0,0,0,0,1,1),(67,2,20,1,0,0,0,0,1,1),(68,2,21,1,0,0,0,0,1,1),(69,2,22,5,0,0,0,0,5,1),(70,2,23,4,0,0,0,0,4,1),(71,2,24,0,0,0,0,0,0,1),(72,2,25,9,0,0,0,0,9,1),(73,2,26,3,0,0,0,0,3,1),(74,2,27,0,0,0,0,0,0,1),(75,2,28,2,0,0,0,0,2,1),(76,2,29,0,0,0,0,0,0,1),(77,2,30,3,0,0,0,0,3,1),(78,2,31,1,0,0,0,0,1,1),(79,2,32,1,0,0,0,0,1,1),(80,2,33,4,0,0,0,0,4,1),(81,2,34,4,0,0,0,0,4,1),(82,2,39,0,0,0,0,0,0,1),(83,2,40,2,0,0,0,0,2,1),(84,2,41,3,0,0,0,0,3,1),(85,2,42,0,0,0,0,0,0,1),(86,2,43,2,0,0,0,0,2,1),(87,2,44,1,0,0,0,0,1,1),(88,2,45,2,0,0,0,0,2,1),(89,2,46,2,0,0,0,0,2,1),(90,2,47,0,0,0,0,0,0,1),(111,1,48,-1,0,0,0,0,-1,1),(112,2,48,1,0,0,0,0,1,1),(113,1,49,0,0,0,0,0,0,1),(114,2,49,0,0,0,0,0,0,1),(115,1,50,0,0,0,0,0,0,1),(116,2,50,0,0,0,0,0,0,1);
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
  `obid` int(10) DEFAULT '1',
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `opname_tab`
--

LOCK TABLES `opname_tab` WRITE;
/*!40000 ALTER TABLE `opname_tab` DISABLE KEYS */;
INSERT INTO `opname_tab` VALUES (1,1,32,1477905846,0,0,0,0,0,4,'Tukar casing black ke white',1),(2,1,15,1477905865,12,0,12,0,4,0,'tukar casing black ke white',1),(3,1,17,1477932338,20,0,20,0,0,7,'Stock di CL',1),(4,1,17,1478162374,20,0,27,0,0,1,'Stock di CL msh ada ternyata',1);
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
  `pbid` int(10) DEFAULT '1',
  `ptype` tinyint(1) DEFAULT '1',
  `pdate` int(10) DEFAULT NULL,
  `pdesc` text,
  `pnominal` int(10) DEFAULT NULL,
  `psaldo` int(10) DEFAULT NULL,
  `pstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peticash_tab`
--

LOCK TABLES `peticash_tab` WRITE;
/*!40000 ALTER TABLE `peticash_tab` DISABLE KEYS */;
INSERT INTO `peticash_tab` VALUES (1,1,2,1477226929,'Peti Cash minggu 23 Oktober 2016',35000,-35000,1),(2,1,1,1477227004,'2 botol besar nestle dan 1 teh pucuk',13000,-22000,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_price_tab`
--

LOCK TABLES `product_price_tab` WRITE;
/*!40000 ALTER TABLE `product_price_tab` DISABLE KEYS */;
INSERT INTO `product_price_tab` VALUES (1,24,1476105157,90000,55541,91000,1),(2,24,1476106755,90000,55541,85000,1),(3,23,1476106763,90000,52694,85000,1),(4,13,1476373983,199000,147895,180000,1),(5,22,1476724699,365000,118416,315000,1),(6,2,1476724754,340000,205295,300000,1),(7,1,1476724815,380000,230285,340000,1),(8,3,1476724865,345000,204940,315000,1),(9,13,1476899154,180000,147895,180000,1),(10,22,1476899727,350000,118416,315000,1),(11,3,1476900037,340000,204940,315000,1),(12,34,1477158143,150000,115900,130000,1),(13,33,1477158186,90000,47200,65000,1),(14,13,1477204502,150000,147895,180000,1),(15,18,1477204578,100000,41370,125000,1),(16,18,1477204600,120005,41370,100000,1),(17,21,1477204644,650000,316481,580000,1),(18,20,1477204671,850000,595728,780000,1),(19,17,1477204688,35000,12345,30000,1),(20,13,1477204810,150000,121863,140000,1),(21,12,1477204920,375000,313464,355000,1),(22,11,1477204959,3300000,3000000,3100000,1),(23,10,1477204982,385000,351520,365000,1),(24,9,1477205030,400000,283909,350000,1),(25,3,1477205080,340000,129947,315000,1),(26,2,1477205186,340000,151341,300000,1),(27,13,1477205475,170000,121863,140000,1),(28,13,1477205574,150000,121863,140000,1),(29,19,1477205654,475000,248220,425000,1),(30,8,1477205689,450000,445390,425000,1),(31,7,1477205729,250000,203162,225000,1),(32,6,1477205755,299000,203162,275000,1),(33,5,1477205763,299000,203162,275000,1),(34,4,1477205777,250000,203162,225000,1),(35,31,1477206080,120000,94500,105000,1),(36,15,1477206177,125000,87400,110000,1),(37,12,1477225173,375000,313464,350000,1),(38,1,1477226607,400000,230285,340000,1),(39,1,1477226680,380000,230285,340000,1),(40,1,1477226774,400000,0,340000,1),(41,1,1477226809,380000,0,340000,1),(42,22,1477286713,375000,118416,315000,1),(43,22,1477286781,350000,118416,315000,1),(44,13,1477330787,170000,121863,140000,1),(45,13,1477330909,150000,121863,140000,1),(46,13,1477336211,170000,121863,140000,1),(47,13,1477336277,150000,121863,140000,1),(48,15,1477368714,125000,87400,105000,1),(49,22,1477369319,375000,118416,315000,1),(50,22,1477369399,350000,118416,315000,1),(51,1,1477457160,400000,0,360000,1),(52,3,1477496617,345000,129947,315000,1),(53,3,1477496670,340000,129947,315000,1),(54,2,1477497088,320000,151341,300000,1),(55,13,1477500105,180000,121863,140000,1),(56,1,1477506808,400000,230285,360000,1),(57,1,1477548961,380000,230285,360000,1),(58,1,1477549818,400000,230285,360000,1),(59,13,1477904755,180000,121863,160000,1),(60,22,1477930909,345000,118416,315000,1),(61,2,1477933546,331000,151341,300000,1),(62,2,1477933606,320000,151341,300000,1),(63,15,1477947282,125000,87556,105000,1),(64,2,1478796434,340000,151341,300000,1),(65,2,1478796505,315000,151341,290000,1),(66,2,1478797105,315000,151341,285000,1),(67,2,1478799399,323000,151341,285000,1),(68,2,1478799608,315000,151341,285000,1),(69,15,1478801007,130000,87556,105000,1),(70,15,1478801041,125000,87556,105000,1),(71,2,1478867026,320000,151341,285000,1),(72,2,1478867078,315000,151341,285000,1),(73,13,1478939925,150000,121863,135000,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_tab`
--

LOCK TABLES `products_tab` WRITE;
/*!40000 ALTER TABLE `products_tab` DISABLE KEYS */;
INSERT INTO `products_tab` VALUES (1,1,1475258929,1,'BOBOVR Z4','KACAMATA VR',230285,400000,360000,NULL,1),(2,1,1475259011,1,'BOBOVR Z4 MINI','KACAMATA VR',151341,315000,285000,NULL,1),(3,1,1475259147,4,'FIITVR 2N','KACAMATA VR',129947,340000,315000,NULL,1),(4,1,1475259533,2,'BAOFENG MOJING XD WHITE','WARNA PUTIH',203162,250000,225000,NULL,1),(5,1,1475259572,2,'BAOFENG MOJING XD PINK','WARNA PINK',203162,299000,275000,NULL,1),(6,1,1475259613,2,'BAOFENG MOJING XD KUNING','WARNA KUNING',203162,299000,275000,NULL,1),(7,1,1475259667,2,'BAOFENG MOJING XD BIRU','WARNA BIRU',203162,250000,225000,NULL,1),(8,1,1475260066,2,'BAOFENG MOJING 4 ANDROID','MOJING 4 ANDORID ONLY',445390,450000,425000,NULL,1),(9,1,1475260426,8,'BOSS VR','KACAMATA VR BOSS',283909,400000,350000,NULL,1),(10,1,1475260506,3,'DEEPOON V3','KACAMATA VR DEEPOON V3',351520,385000,365000,NULL,1),(11,1,1475260612,3,'DEEPOON E2','KACAMATA PC VR DEEPOON E2',3000000,3300000,3100000,NULL,1),(12,1,1475260673,7,'SPACE VR','KACAMATA VR EYE TRAVEL / SPACE VR',313464,375000,350000,NULL,1),(13,1,1475265010,9,'XIAOMI VR','KACAMATA VR XIAOMI',121863,150000,135000,NULL,1),(14,2,1475267421,2,'REMOTE BAOFENG MOJING ANDROID','REMOTE BAOFENG MOJING FOR ANDROID',63763,90000,90000,NULL,1),(15,2,1475269130,12,'TERIOS T3 -  BLACK','GAMEPAD TERIOS T3 WARNA BLACK',87556,125000,105000,NULL,1),(16,2,1475270441,6,'REMOTE SHINECON','REMOTE GAMEPAD SHINCEON',58155,90000,90000,NULL,0),(17,3,1475270573,12,'HOLDER TERIOS T3','HOLDER GAMEPAD TERIOS T3',12345,35000,30000,NULL,1),(18,1,1475270649,10,'U NOTTON VR','KACAMATA VR U NOTTON',41370,120005,100000,NULL,1),(19,1,1475270699,2,'BAOFENG MOJING 4 IOS','KACAMATA VR BAOFENG MOJING 4 IOS',248220,475000,425000,NULL,1),(20,1,1475270751,2,'BAOFENG MOJING 5','KACAMATA VR BAOFENG MOJING 5',595728,850000,780000,NULL,1),(21,1,1475270799,2,'BAOFENG MOJING 4S','KACAMATA VR BAOFENG MOJING 4S',316481,650000,580000,NULL,1),(22,1,1475270860,4,'FiitVR 2S','KACAMATA VR FIIT VR 2S',118416,345000,315000,NULL,1),(23,2,1475270913,12,'TERIOS T1','GAMEPAD TERIOS T1',52694,90000,85000,NULL,1),(24,2,1475271016,13,'REMOTE UNIVERSAL','REMOTE UNIVERSAL',55541,90000,85000,NULL,1),(25,2,1476372186,1,'REMOTE BOBOVR','ORIGINAL REMOTE BOBOVR',54218,90000,70000,NULL,1),(26,1,1476427223,5,'VR FOLD','KACAMATA VR FOLD',54296,70000,65000,NULL,1),(27,3,1476427965,14,'SD CARD','MEMORY CARD',23619,49000,40000,NULL,1),(28,2,1476428144,2,'REMOTE BAOFENG MOJING IOS','REMOTE BAOFENG MOJING FOR IOS',63763,115000,80000,NULL,1),(29,3,1476428377,15,'KACAMATA UV','DAPET GRATISAN DARI SUPPLAYER',0,0,0,NULL,1),(30,1,1476429977,6,'SHINECON 3','KACAMATA  SHINECON 3',102199,150000,120000,NULL,1),(31,1,1476432331,6,'SHINECON 1','KACAMATA SHINECON 1',94500,120000,105000,NULL,1),(32,2,1476433248,12,'TERIOS T3 - WHITE','TERIOS T3 WARNA WHITE',108172,135000,115000,NULL,1),(33,3,1477086014,13,'REMOTE UNIVERSAL BLACK','REMOTE UNIVERSAL BLACK',47200,90000,65000,NULL,1),(34,2,1477086072,16,'8 Bitdo','8 Bitdo',115900,150000,130000,NULL,1),(39,3,1477209126,2,'Indonesia','111',111,1221,111,NULL,2),(40,2,1477209291,17,'Ipega The Son of Phantom Shox Blaster Bluetooth Gun Gamepad - PG-9057','Ipega The Son of Phantom Shox Blaster Bluetooth Gun Gamepad for Smartphone - PG-9057\r\n',299900,450000,400000,NULL,1),(41,1,1477209616,11,'Cardboard Virtual Reality 2nd Generation','Cardboard Virtual Reality 2nd Generation for Smartphone',19900,50000,25000,NULL,1),(42,1,1477209814,11,'VR Hero Total Black Cardboard','VR Hero Total Black Cardboard Virtual Reality for Smartphone',47600,75000,65000,NULL,1),(43,2,1477210040,19,'VZTEC Mobile Wireless Gaming Controller','VZTEC Mobile Wireless Gaming Controller Bluetooth 3.0 for Android and iOS - VZ3004',170000,230000,200000,NULL,1),(44,2,1477210211,17,'Ipega Mobile Wireless Gaming Controller - PG-9021','Ipega Mobile Wireless Gaming Controller Bluetooth 3.0 for Android and iOS - PG-9021',232500,285000,270000,NULL,1),(45,2,1477210334,20,'Nyko PlayPad Bluetooth Gamepad','Nyko PlayPad Bluetooth Gamepad for Smartphone',199000,260000,235000,NULL,1),(46,2,1477932602,17,'Ipega Controller PG-9025','Ipega Mobile Wireless Gaming Controller Bluetooth 3.0 for Smartphone - PG-9025 ',230900,285000,245000,NULL,1),(47,2,1477932764,21,'VRBOX 2.0 Gamepad ','VRBOX 2.0 Bluetooth Wireless Gamepad Joystick for Android and iOS ',138200,185000,145000,NULL,1),(48,2,1478803865,17,'Ipega  Controller Gamepad Joystick PG-9035','Ipega 2.4G Wireless Game Controller Gamepad Joystick for Android and iOS - PG-9035',283800,340000,300000,NULL,1),(49,2,1478803993,17,'Ipega  Controller Smartphone and Tablet - PG-9023 - Black','Ipega Bluetooth Game Controller for Smartphone and Tablet - PG-9023 - Black ',338400,390000,350000,NULL,1),(50,2,1478804354,17,'Ipega Dark Knight Gamepad - PG-9067 - Black','Ipega Dark Knight Wireless Bluetooth Gamepad for Android and iOS - PG-9067 - Black \r\n',193100,250000,220000,NULL,1);
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
  INSERT INTO inventory_tab (ibid, ipid, istatus)
  VALUES (1, NEW.pid, 1);
  
  INSERT INTO inventory_tab (ibid, ipid, istatus)
  VALUES (2, NEW.pid, 1);
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receiving_item_tab`
--

LOCK TABLES `receiving_item_tab` WRITE;
/*!40000 ALTER TABLE `receiving_item_tab` DISABLE KEYS */;
INSERT INTO `receiving_item_tab` VALUES (1,1,15,2,125000,87400,NULL,1),(2,2,15,73,125000,87400,NULL,1),(3,3,47,1,185000,138200,NULL,1),(4,3,46,3,285000,230900,NULL,1),(5,3,44,1,285000,232500,NULL,1),(6,4,43,2,230000,170000,NULL,1),(7,4,40,2,450000,299900,NULL,1),(8,5,1,20,400000,230285,NULL,1),(9,6,17,90,35000,12345,NULL,1);
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
  `rtype` int(10) DEFAULT NULL,
  `rbid` int(10) DEFAULT '1',
  `rvendor` varchar(300) DEFAULT NULL,
  `rdocno` varchar(10) DEFAULT NULL,
  `rdate` int(10) DEFAULT NULL,
  `rdesc` varchar(350) DEFAULT NULL,
  `rstatus` tinyint(1) DEFAULT '0',
  `rcreatedby` varchar(350) DEFAULT NULL,
  `rmodifiedby` varchar(350) DEFAULT NULL,
  `rapprovedby` varchar(350) DEFAULT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receiving_tab`
--

LOCK TABLES `receiving_tab` WRITE;
/*!40000 ALTER TABLE `receiving_tab` DISABLE KEYS */;
INSERT INTO `receiving_tab` VALUES (1,1,1,'2','1',1477846800,'ONGKOS KIRIM VIA GOJEK Rp.3000,-',3,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477930204}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477930541}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477930541}'),(2,1,1,'3','2',1477846800,'Ongkos Kirim\r\nRp 99.000\r\nVIA SICEPAT',3,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477930512}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477930555}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477930555}'),(3,1,1,'3','3',1477846800,'Kode Transaksi Jakmall\r\n1181430952\r\n\r\nONGKOS KIRIM Rp.13.597,-',3,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477932883}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477932897}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477932897}'),(4,1,1,'3','4',1479402000,'Ongkos Kirim SiCepat\r\nRp 18.000',3,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478262614}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478262671}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478262671}'),(5,1,1,'1','5',1478278800,'BOBOVR Z4 BY AIR  20UNIT 18kG',3,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478341337}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478341343}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478341343}'),(6,1,1,'1','6',1478624400,'HOLDER PESAN 100 UNIT YG DATANG 90 UNIT',3,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478799769}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478799776}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478799776}');
/*!40000 ALTER TABLE `receiving_tab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `request_item_tab`
--

DROP TABLE IF EXISTS `request_item_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `request_item_tab` (
  `rid` int(10) NOT NULL AUTO_INCREMENT,
  `riid` int(10) NOT NULL,
  `rpid` int(10) NOT NULL,
  `rqty` int(10) NOT NULL,
  `rstatus` tinyint(1) DEFAULT '0',
  `rcreatedby` varchar(350) DEFAULT NULL,
  `rmodifiedby` varchar(350) DEFAULT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `request_item_tab`
--

LOCK TABLES `request_item_tab` WRITE;
/*!40000 ALTER TABLE `request_item_tab` DISABLE KEYS */;
/*!40000 ALTER TABLE `request_item_tab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `request_tab`
--

DROP TABLE IF EXISTS `request_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `request_tab` (
  `rid` int(10) NOT NULL AUTO_INCREMENT,
  `rno` varchar(15) DEFAULT NULL,
  `rfrom` int(10) NOT NULL,
  `rto` int(10) NOT NULL,
  `rdate` int(10) DEFAULT NULL,
  `rdesc` varchar(350) DEFAULT NULL,
  `rstatus` tinyint(1) DEFAULT '0',
  `rcreatedby` varchar(350) DEFAULT NULL,
  `rmodifiedby` varchar(350) DEFAULT NULL,
  `rapprovedby` varchar(350) DEFAULT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `request_tab`
--

LOCK TABLES `request_tab` WRITE;
/*!40000 ALTER TABLE `request_tab` DISABLE KEYS */;
/*!40000 ALTER TABLE `request_tab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `sbegin` int(10) NOT NULL,
  `sreject` int(10) NOT NULL,
  `sfinal` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock`
--

LOCK TABLES `stock` WRITE;
/*!40000 ALTER TABLE `stock` DISABLE KEYS */;
INSERT INTO `stock` VALUES (1,'BOBOVR Z4',19,1,19),(2,'U NOTTON VR',18,0,18),(3,'BaoFeng Maojing 4 IOS',9,0,9),(4,'BAOFENG MOJING 5',1,0,1),(5,'BAOFENG MOJING 4S',1,0,1),(6,'FiitVR 2S',14,0,14),(7,'TERIOS T1',14,2,14),(8,'REMOTE UNIVERSAL',5,0,5),(9,'REMOTE BOBOVR',23,0,23),(10,'VR FOLD',25,0,25),(11,'SD CARD',0,0,0),(12,'REMOTE BAOFENG MOJING IOS',5,0,5),(13,'KACAMATA UV',126,2,126),(14,'SHINECON 3',20,0,20),(15,'SHINECON 1',15,0,15),(16,'HOLDER TERIOS T3',20,0,20),(17,'REMOTE SHINECON',0,0,0),(18,'BOBOVR Z4 MINI',61,3,61),(19,'FIITVR 2N',30,0,30),(20,'BAOFENG MOJING XD WHITE',37,0,37),(21,'BAOFENG MOJING XD PINK',2,0,2),(22,'BAOFENG MOJING XD KUNING',2,0,2),(23,'BAOFENG MOJING XD BIRU',1,0,1),(24,'BAOFENG MOJING 4 ANDROID',6,0,6),(25,'BOSS VR',4,0,4),(26,'DEEPOON V3',5,0,5),(27,'DEEPOON E2',1,0,1),(28,'SPACE VR',13,1,13),(29,'XIAOMI VR',82,0,82),(30,'REMOTE BAOFENG MOJING ANDROID',35,0,35),(31,'TERIOS T3 - BLACK',12,5,12),(32,'TERIOS T3 - WHITE',0,6,0),(33,'8 Bitdo',8,0,8),(34,'REMOTE UNIVERSAL BLACK',7,0,7);
/*!40000 ALTER TABLE `stock` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=288 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction_detail_tab`
--

LOCK TABLES `transaction_detail_tab` WRITE;
/*!40000 ALTER TABLE `transaction_detail_tab` DISABLE KEYS */;
INSERT INTO `transaction_detail_tab` VALUES (1,1,3,340000,204940,1,0,1),(2,2,1,380000,230285,1,0,1),(3,3,22,375000,118416,1,0,1),(4,3,14,90000,63763,1,0,1),(5,4,17,35000,12345,1,0,2),(6,5,17,35000,12345,1,0,1),(7,6,13,180000,147895,1,0,2),(8,6,17,35000,12345,1,0,1),(9,4,13,170000,121863,1,0,1),(10,7,33,90000,47200,1,0,1),(11,7,22,350000,118416,1,0,1),(12,8,14,90000,63763,1,0,1),(13,8,1,380000,230285,1,0,2),(14,8,1,380000,230285,1,0,1),(15,9,13,150000,121863,1,0,1),(16,10,2,340000,151341,1,0,1),(17,11,13,150000,121863,1,0,1),(18,12,1,380000,230285,1,0,1),(19,13,13,140000,121863,1,0,1),(20,14,2,340000,151341,1,0,1),(21,15,13,150000,121863,1,0,1),(22,16,13,150000,121863,1,0,1),(23,17,25,90000,54218,1,0,1),(24,17,1,380000,230285,1,0,1),(25,18,2,340000,151341,1,0,1),(26,19,17,35000,12345,1,0,1),(27,20,13,170000,121863,1,0,1),(28,21,13,150000,121863,1,0,1),(29,22,22,375000,118416,1,0,1),(30,23,1,400000,230285,1,0,1),(31,24,17,30000,12345,1,0,1),(32,25,15,105000,87556,1,0,1),(33,26,13,450000,121863,3,0,1),(34,27,13,150000,121863,1,0,1),(35,28,13,150000,121863,1,0,1),(36,29,17,35000,12345,1,0,1),(37,30,22,350000,118416,1,0,1),(38,31,14,90000,63763,1,0,1),(39,31,1,380000,230285,1,0,1),(40,32,1,340000,230285,1,0,1),(41,33,13,170000,121863,1,0,1),(42,34,25,90000,54218,1,0,1),(43,34,3,340000,129947,1,0,1),(44,35,15,125000,87400,1,0,1),(45,36,25,70000,54218,1,0,1),(46,37,15,125000,87400,1,0,1),(47,37,3,340000,129947,1,0,1),(48,38,13,150000,121863,1,0,1),(49,39,1,380000,230285,1,0,1),(50,40,17,35000,12345,1,0,1),(51,41,13,150000,121863,1,0,1),(52,42,17,35000,12345,1,0,1),(53,43,13,150000,121863,1,0,1),(54,44,17,35000,12345,1,0,1),(55,44,15,125000,87400,1,0,1),(56,45,17,35000,12345,1,0,1),(57,45,15,125000,87400,1,0,1),(58,46,13,150000,121863,1,0,1),(59,47,2,300000,151341,1,0,1),(60,48,1,380000,230285,1,0,1),(61,49,13,150000,121863,1,0,1),(62,50,14,90000,63763,1,0,1),(63,51,31,120000,94500,1,0,1),(64,52,1,400000,230285,1,0,1),(65,53,13,150000,121863,1,0,1),(66,54,13,150000,121863,1,0,1),(67,55,13,150000,121863,1,0,1),(68,56,13,150000,121863,1,0,1),(69,57,17,35000,12345,1,0,1),(70,57,15,125000,87400,1,0,1),(71,58,22,350000,118416,1,0,1),(72,59,17,35000,12345,1,0,1),(73,59,15,125000,87400,1,0,1),(74,60,13,150000,121863,1,0,1),(75,61,13,150000,121863,1,0,1),(76,62,1,400000,230285,1,0,1),(77,63,2,340000,151341,1,0,1),(78,64,13,150000,121863,1,0,1),(79,65,13,150000,121863,1,0,1),(80,66,13,150000,121863,1,0,1),(81,67,3,345000,129947,1,0,1),(82,68,13,150000,121863,1,0,1),(83,69,22,350000,118416,1,0,1),(84,70,17,30000,12345,1,0,1),(85,71,1,400000,230285,1,0,1),(86,72,22,350000,118416,1,0,1),(87,72,14,90000,63763,1,0,1),(88,72,2,320000,151341,1,0,1),(89,73,14,90000,63763,1,0,1),(90,73,2,320000,151341,1,0,1),(91,74,23,90000,52694,1,0,1),(92,74,3,340000,129947,1,0,1),(93,75,13,180000,121863,1,0,1),(94,76,13,180000,121863,1,0,2),(95,76,15,125000,87400,1,0,1),(96,77,1,380000,230285,1,0,1),(97,78,1,380000,230285,1,0,1),(98,79,1,380000,230285,1,0,1),(99,80,1,400000,230285,1,0,1),(100,81,2,320000,151341,1,0,1),(101,82,14,90000,63763,1,0,1),(102,82,2,320000,151341,1,0,1),(103,83,2,320000,151341,1,0,1),(104,84,17,35000,12345,1,0,1),(105,84,15,125000,87400,1,0,1),(106,85,13,180000,121863,1,0,1),(107,86,13,180000,121863,1,0,1),(108,87,13,180000,121863,1,0,1),(109,88,13,180000,121863,1,0,1),(110,89,13,180000,121863,1,0,1),(111,90,17,30000,12345,1,0,1),(112,91,13,160000,121863,1,0,1),(113,92,2,320000,151341,1,0,1),(114,93,13,360000,121863,2,0,1),(115,94,31,120000,94500,1,0,1),(116,95,30,150000,102199,1,0,1),(117,95,15,125000,87400,1,0,1),(118,96,17,35000,12345,1,0,1),(119,97,17,30000,12345,1,0,1),(120,97,15,105000,87400,1,0,1),(121,98,17,35000,12345,1,0,1),(122,98,15,125000,87400,1,0,1),(123,99,3,340000,129947,1,0,1),(124,100,30,150000,102199,1,0,1),(125,101,3,340000,129947,1,0,1),(126,102,3,340000,129947,1,0,1),(127,103,25,90000,54218,1,0,1),(128,103,2,320000,151341,1,0,1),(129,104,17,35000,12345,1,0,1),(130,104,15,125000,87400,1,0,1),(131,105,13,180000,121863,1,0,1),(132,106,3,340000,129947,1,0,1),(133,107,15,125000,87400,1,0,1),(134,108,25,90000,54218,1,0,1),(135,108,2,320000,151341,1,0,1),(136,109,32,135000,108172,1,0,1),(137,109,17,35000,12345,1,0,1),(138,110,13,180000,121863,1,0,1),(139,111,17,35000,12345,1,0,1),(140,112,3,340000,129947,1,0,1),(141,113,25,90000,54218,1,0,1),(142,113,2,320000,151341,1,0,1),(143,114,13,180000,121863,1,0,1),(144,115,3,340000,129947,1,0,1),(145,116,2,331000,151341,1,0,1),(146,117,17,35000,12345,1,0,1),(147,117,15,125000,87400,1,0,1),(148,118,17,35000,12345,1,0,1),(149,118,15,125000,87400,1,0,1),(150,119,2,320000,151341,1,0,1),(151,120,13,180000,121863,1,0,1),(152,121,13,180000,121863,1,0,1),(153,122,3,340000,129947,1,0,1),(154,122,23,90000,52694,1,0,1),(155,123,32,135000,108172,1,0,1),(156,123,22,345000,118416,1,0,1),(157,124,22,345000,118416,1,0,1),(158,125,30,150000,102199,1,0,1),(159,126,22,345000,118416,1,0,1),(160,127,30,150000,102199,1,0,1),(161,128,17,35000,12345,1,0,1),(162,128,15,125000,87556,1,0,1),(163,129,15,125000,87556,1,0,1),(164,129,17,35000,12345,1,0,1),(165,130,3,340000,129947,1,0,1),(166,131,2,320000,151341,1,0,1),(167,132,17,30000,12345,1,0,1),(168,133,17,30000,12345,1,0,1),(169,133,15,105000,87556,1,0,1),(170,134,2,320000,151341,1,0,1),(171,135,30,150000,102199,1,0,1),(172,135,17,35000,12345,1,0,1),(173,135,15,125000,87556,1,0,1),(174,136,2,320000,151341,1,0,1),(175,137,32,135000,108172,1,0,1),(176,137,17,35000,12345,1,0,1),(177,138,2,320000,151341,1,0,1),(178,139,3,340000,129947,1,0,1),(179,140,22,345000,118416,1,0,1),(180,141,26,65000,54296,1,0,1),(181,142,14,90000,63763,1,0,1),(182,142,2,320000,151341,1,0,1),(183,143,2,320000,151341,1,0,1),(184,144,46,285000,230900,1,0,1),(185,144,30,150000,102199,1,0,1),(186,145,14,90000,63763,1,0,1),(187,146,30,150000,102199,1,0,1),(188,147,13,180000,121863,1,0,1),(189,148,4,250000,203162,1,0,1),(190,149,43,230000,170000,1,0,1),(191,149,9,400000,283909,1,0,1),(192,150,3,340000,129947,1,0,1),(193,151,3,340000,129947,1,0,1),(194,152,13,180000,121863,1,0,1),(195,153,2,320000,151341,1,0,1),(196,154,30,150000,102199,1,0,1),(197,155,13,180000,121863,1,0,1),(198,156,13,180000,121863,1,0,1),(199,157,2,320000,151341,1,0,1),(200,158,31,120000,94500,1,0,1),(201,158,30,150000,102199,1,0,1),(202,159,30,300000,102199,2,0,1),(203,160,30,150000,102199,1,0,1),(204,160,14,90000,63763,1,0,1),(205,161,31,120000,94500,1,0,2),(206,162,22,345000,118416,1,0,1),(207,163,2,300000,151341,1,0,1),(208,164,14,90000,63763,1,0,1),(209,164,2,320000,151341,1,0,1),(210,165,31,120000,94500,1,0,1),(211,166,4,250000,203162,1,0,1),(212,161,4,250000,203162,1,0,1),(213,167,2,315000,151341,1,0,1),(214,168,13,180000,121863,1,0,1),(215,169,17,35000,12345,1,0,1),(216,169,15,125000,87556,1,0,1),(217,170,32,135000,108172,1,0,2),(218,170,17,35000,12345,1,0,1),(219,171,25,90000,54218,1,0,1),(220,171,1,400000,230285,1,0,1),(221,172,2,315000,151341,1,0,1),(222,173,17,35000,12345,1,0,1),(223,173,15,130000,87556,1,0,1),(224,174,25,90000,54218,1,0,1),(225,174,2,315000,151341,1,0,1),(226,175,25,90000,54218,1,0,1),(227,175,1,400000,230285,1,0,1),(228,176,25,90000,54218,1,0,1),(229,176,1,400000,230285,1,0,1),(230,177,14,90000,63763,1,0,1),(231,177,3,340000,129947,1,0,1),(232,178,1,400000,230285,1,0,1),(233,179,13,180000,121863,1,0,1),(234,180,2,320000,151341,1,0,1),(235,181,13,180000,121863,1,0,1),(236,182,15,125000,87556,1,0,1),(237,183,1,400000,230285,1,0,1),(238,184,13,180000,121863,1,0,1),(239,185,25,90000,54218,1,0,1),(240,185,1,400000,230285,1,0,1),(241,186,1,400000,230285,1,0,1),(242,187,2,340000,151341,1,0,1),(243,188,13,180000,121863,1,0,1),(244,189,25,90000,54218,1,0,1),(245,189,2,315000,151341,1,0,1),(246,190,15,105000,87556,1,0,1),(247,191,1,1440000,230285,4,0,1),(248,192,2,315000,151341,1,0,1),(249,193,22,345000,118416,1,0,1),(250,194,31,120000,94500,1,0,1),(251,195,13,180000,121863,1,0,1),(252,196,2,323000,151341,1,0,1),(253,198,14,90000,63763,1,0,1),(254,199,14,90000,63763,1,0,1),(255,200,17,35000,12345,1,0,1),(256,201,15,125000,87556,1,0,1),(257,202,26,65000,54296,1,0,1),(258,170,15,125000,87556,1,0,1),(259,203,25,90000,54218,1,0,1),(260,203,1,400000,230285,1,0,1),(261,204,25,90000,54218,1,0,1),(262,204,2,315000,151341,1,0,1),(263,205,17,30000,12345,1,0,1),(264,206,17,30000,12345,1,0,1),(265,206,15,105000,87556,1,0,1),(266,207,17,30000,12345,1,0,1),(267,207,15,105000,87556,1,0,1),(268,208,2,315000,151341,1,0,1),(269,209,25,90000,54218,1,0,1),(270,210,3,340000,129947,1,0,1),(271,211,3,315000,129947,1,0,1),(272,212,3,340000,129947,1,0,1),(273,213,1,400000,230285,1,0,1),(274,214,22,345000,118416,1,0,1),(275,214,14,90000,63763,1,0,1),(276,215,13,150000,121863,1,0,1),(277,216,3,340000,129947,1,0,1),(278,217,15,125000,87556,1,0,1),(279,218,15,125000,87556,1,0,1),(280,219,15,125000,87556,1,0,1),(281,220,25,90000,54218,1,0,1),(282,220,2,315000,151341,1,0,1),(283,221,28,115000,63763,1,0,1),(284,221,4,250000,203162,1,0,1),(285,222,32,135000,108172,1,0,1),(286,222,17,35000,12345,1,0,1),(287,223,22,345000,118416,1,0,1);
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
  `tbid` int(10) DEFAULT '1',
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
  `treffer` int(10) DEFAULT '0',
  `tstatus` tinyint(1) DEFAULT '0',
  `tcreatedby` varchar(350) DEFAULT NULL,
  `tmodifiedby` varchar(350) DEFAULT NULL,
  `tapprovedby` varchar(350) DEFAULT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB AUTO_INCREMENT=224 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction_tab`
--

LOCK TABLES `transaction_tab` WRITE;
/*!40000 ALTER TABLE `transaction_tab` DISABLE KEYS */;
INSERT INTO `transaction_tab` VALUES (1,1,1,1,51,1477122300,'PO221016001',1,340000,0,340000,'GOMART TUNAI DI CL',0,3,NULL,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477205383}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477205383}'),(2,1,1,0,52,1477127820,'PO221016002',1,380000,10000,370000,'CL',0,3,NULL,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477286635}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477286635}'),(3,1,1,0,53,1477128060,'PO221016003',2,465000,0,465000,'CL',0,3,NULL,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477286750}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477286750}'),(4,1,1,1,55,1477128840,'PO221016004',1,170000,0,170000,'TP',0,3,NULL,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477205520}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477205520}'),(5,1,1,1,56,1477129020,'PO221016005',1,35000,0,35000,'TP',0,3,NULL,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477205383}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477205383}'),(6,1,1,1,57,1477129200,'PO221016006',1,35000,0,35000,'TP',0,3,NULL,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477205383}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477205383}'),(7,1,1,1,58,1477223340,'PO231016001',2,440000,0,440000,'TP',0,3,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477223461}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477223472}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477223472}'),(8,1,1,0,55,1477226340,'PO231016002',2,470000,0,470000,'Harga jual Z4 masih 400k',0,3,'{\"uid\":\"3\",\"unick\":\"ronald\",\"tdate\":1477226499}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477286832}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477286832}'),(9,1,1,1,61,1477286520,'PO241016001',1,150000,0,150000,'TP ',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477286709}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477289239}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477289239}'),(10,1,1,1,62,1477287000,'PO241016002',1,340000,0,340000,'BLIBLI',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477287209}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477289270}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477289270}'),(11,1,1,1,63,1477287660,'PO241016003',1,150000,0,150000,'Via wa, gojek manual.',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477287783}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477289291}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477289291}'),(12,1,1,1,25,1477287840,'PO241016004',1,380000,0,380000,'MIFTAHUS SURURI\r\n08561827223',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477288138}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477290335}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477290335}'),(13,1,1,1,65,1477288200,'PO241016005',1,140000,0,140000,'erna sulandari Telp: 081250111553',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477288483}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477290399}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477290399}'),(14,1,1,1,66,1477202220,'PO241016006',1,340000,0,340000,'TP',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477288714}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477290499}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477290499}'),(15,1,1,1,68,1477288980,'PO241016006',1,150000,0,150000,'TP',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477289045}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477290548}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477290548}'),(16,1,1,1,69,1477289100,'PO241016007',1,150000,0,150000,'TP',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477289154}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477327279}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477327279}'),(17,1,1,1,70,1477289220,'PO241016008',2,470000,20000,450000,'BL',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477289362}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477327322}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477327322}'),(18,1,1,1,71,1477289460,'PO241016009',1,340000,17000,323000,'BL',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477289554}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477327572}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477327572}'),(19,1,1,1,72,1477289580,'PO241016010',1,35000,0,35000,'BL',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477289677}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477327612}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477327612}'),(20,1,1,1,73,1477289820,'PO241016011',1,170000,0,170000,'BL',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477289952}','{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1477330884}','{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1477330884}'),(21,1,1,1,76,1477291080,'PO241016012',1,150000,0,150000,'TP',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477291331}','{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1477330995}','{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1477330995}'),(22,1,1,0,77,1477177200,'PO241016013',1,375000,0,375000,'CL harga jual masih 375',0,3,'{\"uid\":\"3\",\"unick\":\"ronald\",\"tdate\":1477294494}','{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1477369378}','{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1477369378}'),(23,1,1,0,78,1477180800,'PO241016013',1,400000,0,400000,'CL',0,3,'{\"uid\":\"3\",\"unick\":\"ronald\",\"tdate\":1477294531}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477457212}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477457212}'),(24,1,1,1,25,1477159200,'PO241016013',1,30000,0,30000,'Claudio Dema 08882502474 ',0,3,'{\"uid\":\"3\",\"unick\":\"ronald\",\"tdate\":1477294665}','{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1477368880}','{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1477368880}'),(25,1,1,1,25,1477159200,'PO241016013',1,105000,0,105000,'Rafi abdul aziz 087889867621 ',0,3,'{\"uid\":\"3\",\"unick\":\"ronald\",\"tdate\":1477294724}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478167928}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478167928}'),(26,1,1,1,81,1477306800,'PO241016013',3,450000,0,450000,'TP',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477306937}','{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1477332005}','{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1477332005}'),(27,1,1,1,82,1477307100,'PO241016014',1,150000,0,150000,'TP',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477307181}','{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1477332026}','{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1477332026}'),(28,1,1,1,83,1477307280,'PO241016015',1,150000,0,150000,'BL',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477307311}','{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1477332161}','{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1477332161}'),(29,1,1,1,84,1477309140,'PO241016016',1,35000,0,35000,'TP Rajaong',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477309254}','{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1477332248}','{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1477332248}'),(30,1,1,1,85,1477317720,'PO241016017',1,350000,0,350000,'TP',0,3,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477317781}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477317793}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477317793}'),(31,1,1,0,86,1477317840,'PO241016018',2,470000,0,470000,'CL',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477318079}','{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1477369662}','{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1477369662}'),(32,1,1,1,87,1477318080,'PO241016019',1,340000,0,340000,'M Sidik 085891197123',0,3,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477318221}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477318285}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477318285}'),(33,1,1,1,88,1477076940,'PO251016001',1,170000,0,170000,'TP',0,3,'{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1477336182}','{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1477336259}','{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1477336259}'),(34,1,1,1,89,1477372800,'PO251016001',2,430000,0,430000,'TP GOsend',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477372979}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477409930}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477409930}'),(35,1,1,1,90,1477373160,'PO251016002',1,125000,29200,95800,'TP GOsend',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477373267}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477409992}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477409992}'),(36,1,1,1,25,1477373340,'PO251016003',1,70000,0,70000,'M.SIDIK\r\n085891197123 GOsend',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477373504}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477410068}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477410068}'),(37,1,1,1,91,1477373580,'PO251016004',2,465000,24200,440800,'BL GOsend',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477373662}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477410584}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477410584}'),(38,1,1,1,92,1477373940,'PO251016005',1,150000,0,150000,'TP JNE',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477374009}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477409183}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477409183}'),(39,1,1,1,93,1477374720,'PO251016006',1,380000,0,380000,'TP JNE',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477374807}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477409743}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477409743}'),(40,1,1,1,94,1477377540,'PO251016007',1,35000,0,35000,'TP JNE',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477377659}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477409146}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477409146}'),(41,1,1,1,95,1477377840,'PO251016008',1,150000,0,150000,'BL JNE',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477377916}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477409865}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477409865}'),(42,1,1,1,96,1477378140,'PO251016009',1,35000,0,35000,'BL JNE',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477378198}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477409780}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477409780}'),(43,1,1,1,97,1477378320,'PO251016010',1,150000,0,150000,'BL JNE',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477378374}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477409316}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477409316}'),(44,1,1,1,98,1477378680,'PO251016011',2,160000,10000,150000,'BL JNE',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477378790}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477409271}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477409271}'),(45,1,1,1,99,1477378920,'PO251016012',2,160000,10000,150000,'BL JNE',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477379034}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477409818}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477409818}'),(46,1,1,1,101,1477387200,'PO251016013',1,150000,0,150000,'BL JNE',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477387259}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477409074}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477409074}'),(47,1,1,1,25,1477387260,'PO251016014',1,300000,0,300000,' GOsend jordan 081293664485',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477387424}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477410640}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477410640}'),(48,1,1,1,102,1477388340,'PO251016015',1,380000,0,380000,'LZD  JNE',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477388639}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477409427}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477409427}'),(49,1,1,1,103,1477389060,'PO251016016',1,150000,0,150000,'BL JNE',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477389095}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477409235}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477409235}'),(50,1,1,0,43,1477397700,'PO251016017',1,90000,0,90000,'CL',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477398078}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477457054}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477457054}'),(51,1,1,0,107,1477411020,'PO251016018',1,120000,0,120000,'CL',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477411101}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477457075}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477457075}'),(52,1,1,1,108,1477456980,'PO261016001',1,400000,0,400000,'TP GOsend',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477457076}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477497291}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477497291}'),(53,1,1,1,109,1477457220,'PO261016002',1,150000,0,150000,'TP GOsend',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477457307}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477497345}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477497345}'),(54,1,1,1,110,1477457400,'PO261016003',1,150000,0,150000,'TP GOsend',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477457465}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477497372}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477497372}'),(55,1,1,1,112,1477458000,'PO261016004',1,150000,0,150000,'TP GOsend',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477458120}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477497409}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477497409}'),(56,1,1,1,113,1477460760,'PO261016005',1,150000,0,150000,'TP JNE',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477460819}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477497237}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477497237}'),(57,1,1,1,114,1477461240,'PO261016006',2,160000,29200,130800,'TP JNE',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477461441}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477495542}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477495542}'),(58,1,1,1,115,1477461480,'PO261016007',1,350000,0,350000,'TP JNE',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477461567}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477496419}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477496419}'),(59,1,1,1,116,1477461900,'PO261016008',2,160000,10000,150000,'TP JNE',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477462001}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477495971}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477495971}'),(60,1,1,1,117,1477463400,'PO261016009',1,150000,0,150000,'TP GO send',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477463471}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477497431}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477497431}'),(61,1,1,1,118,1477472760,'PO261016010',1,150000,0,150000,'BL JNE',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477472803}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477496462}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477496462}'),(62,1,1,1,119,1477473300,'PO261016011',1,400000,20000,380000,'BL JNE',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477473358}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477496947}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477496947}'),(63,1,1,1,120,1477473540,'PO261016012',1,340000,20000,320000,'BL JNE',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477473605}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477497050}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477497050}'),(64,1,1,1,121,1477473960,'PO261016013',1,150000,0,150000,'BL JNE',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477474029}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477495731}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477495731}'),(65,1,1,1,122,1477474440,'PO261016014',1,150000,0,150000,'BL JNE',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477474528}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477496276}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477496276}'),(66,1,1,1,123,1477474680,'PO261016015',1,150000,0,150000,'BL JNE',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477474859}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477496036}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477496036}'),(67,1,1,1,124,1477475400,'PO261016016',1,345000,0,345000,'BL JNE',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477475478}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477496648}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477496648}'),(68,1,1,1,125,1477475760,'PO261016017',1,150000,0,150000,'SHOPE',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477475805}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477496388}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477496388}'),(69,1,1,1,126,1477475820,'PO261016018',1,350000,0,350000,'SHOPE',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477475898}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477496498}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477496498}'),(70,1,1,1,25,1477476120,'PO261016019',1,30000,0,30000,'HENDRA SUDRAJAT 081517181931 \r\nGOsend',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477476254}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477497517}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477497517}'),(71,1,1,0,127,1477476300,'PO261016020',1,400000,0,400000,'CL',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477476347}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477549945}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477549945}'),(72,1,1,0,129,1477476420,'PO261016021',3,760000,20000,740000,'CL',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477476566}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477549964}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477549964}'),(73,1,1,0,130,1477498020,'PO261016022',2,410000,0,410000,'CL',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477498131}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477549978}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477549978}'),(74,1,1,1,131,1477543260,'PO271016001',2,430000,10000,420000,'TP GOsend',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477543359}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477550027}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477550027}'),(75,1,1,1,132,1477543500,'PO271016002',1,180000,0,180000,'TP GOsend',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477543553}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477550088}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477550088}'),(76,1,1,1,133,1477543560,'PO271016003',1,125000,29200,95800,'TP GOsend',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477543643}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477550156}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477550156}'),(77,1,1,1,138,1477548780,'PO271016004',1,380000,11400,368600,'Lazada',0,3,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477548926}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477549010}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477549010}'),(78,1,1,1,139,1477419720,'PO271016005',1,380000,11400,368600,'Lazada',0,3,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477549418}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477549445}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477549445}'),(79,1,1,1,140,1477549500,'PO271016005',1,380000,11400,368600,'Lazada',0,3,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477549545}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477549563}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477549563}'),(80,1,1,1,141,1477549740,'PO271016006',1,400000,0,400000,'BL JNE',0,3,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477549833}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477549840}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477549840}'),(81,1,1,1,142,1477554840,'PO271016007',1,320000,0,320000,'BL JNE',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477554928}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477594842}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477594842}'),(82,1,1,0,143,1477583640,'PO271016008',2,410000,0,410000,'CL',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477583702}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477681175}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477681175}'),(83,1,1,0,144,1477583760,'PO271016009',1,320000,0,320000,'CL',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477583832}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477681181}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477681181}'),(84,1,1,1,145,1477636440,'PO281016001',2,160000,10000,150000,'TP GOsend',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477637088}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477671630}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477671630}'),(85,1,1,1,146,1477637160,'PO281016002',1,180000,0,180000,'TP GOsend',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477637207}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477671659}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477671659}'),(86,1,1,1,147,1477637220,'PO281016003',1,180000,0,180000,'TP GOsend',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477637315}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477671675}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477671675}'),(87,1,1,1,148,1477637700,'PO281016004',1,180000,0,180000,'TP JNE',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477638716}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477671534}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477671534}'),(88,1,1,1,149,1477642440,'PO281016005',1,180000,0,180000,'TP JNE',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477642508}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477671583}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477671583}'),(89,1,1,1,152,1477714980,'PO291016001',1,180000,0,180000,'TP GOsend',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477715028}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477904608}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477904608}'),(90,1,1,1,25,1477728060,'PO291016002',1,30000,0,30000,'Bayuh Nugraha Telp: 081808680300',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477728153}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477904677}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477904677}'),(91,1,1,1,25,1477728120,'PO291016003',1,160000,0,160000,'kafillah soamole No. Telp: 081283701986',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477728225}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477904805}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477904805}'),(92,1,1,0,153,1477731660,'PO291016004',1,320000,0,320000,'CL ',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477731752}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477904940}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477904940}'),(93,1,1,1,154,1477733220,'PO291016005',2,360000,0,360000,'GOsend',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477733306}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477904979}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477904979}'),(94,1,1,0,155,1477737300,'PO291016006',1,120000,0,120000,'CL',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477737335}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477904926}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477904926}'),(95,1,1,0,156,1477742700,'PO291016007',2,275000,5000,270000,'CL',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477742853}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477904962}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477904962}'),(96,1,1,1,157,1477808220,'PO301016001',1,35000,0,35000,'BL JAKVR Go-Send',0,3,'{\"uid\":\"3\",\"unick\":\"ronald\",\"tdate\":1477808291}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477905026}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477905026}'),(97,1,1,1,25,1477808520,'PO301016002',2,135000,0,135000,'Estu Budi Nugroho\r\nJl blimbing no 25 Kampung bulak budi bakti 07/08 kalideres\r\nKalideres Kota Administrasi Jakarta Barat, 11840\r\nDKI Jakarta\r\nTelp: 087715378185',0,3,'{\"uid\":\"3\",\"unick\":\"ronald\",\"tdate\":1477808613}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477905168}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477905168}'),(98,1,1,1,158,1477814400,'PO301016003',2,160000,10000,150000,'TP Go-Send',0,3,'{\"uid\":\"3\",\"unick\":\"ronald\",\"tdate\":1477814472}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477905240}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477905240}'),(99,1,1,0,159,1477818540,'PO301016004',1,340000,0,340000,'Booth CL',0,3,'{\"uid\":\"3\",\"unick\":\"ronald\",\"tdate\":1477818626}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477905308}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477905308}'),(100,1,1,1,160,1477832640,'PO301016005',1,150000,0,150000,'Booth CL',0,3,'{\"uid\":\"3\",\"unick\":\"ronald\",\"tdate\":1477832670}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477905344}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477905344}'),(101,1,1,1,161,1477889040,'PO311016001',1,340000,0,340000,'TP JNE',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477889094}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477905475}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477905475}'),(102,1,1,1,162,1477893120,'PO311016002',1,340000,0,340000,'TP JNE',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477893236}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477905502}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477905502}'),(103,1,1,1,163,1477897500,'PO311016003',2,410000,30000,380000,'BL JNE',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477897644}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477905577}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477905577}'),(104,1,1,1,164,1477903320,'PO311016004',2,160000,10000,150000,'TP GOsend',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477903455}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477905675}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477905675}'),(105,1,1,1,176,1477775700,'PO311016005',1,180000,0,180000,'TP JNE',0,3,'{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1477905514}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477929642}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477929642}'),(106,1,1,1,175,1477905540,'PO311016005',1,340000,0,340000,'BL JNE',0,3,'{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1477905663}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477929706}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477929706}'),(107,1,1,1,173,1477905660,'PO311016006',1,125000,29200,95800,'BL JNE',0,3,'{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1477905934}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477930958}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477930958}'),(108,1,1,1,172,1477905900,'PO311016007',2,410000,30000,380000,'BL JNE',0,3,'{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1477905991}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477929851}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477929851}'),(109,1,1,1,170,1477905960,'PO311016008',2,170000,5000,165000,'BL JNE',0,3,'{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1477906106}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477931235}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477931235}'),(110,1,1,1,168,1477906080,'PO311016009',1,180000,0,180000,'BL JNE',0,3,'{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1477906139}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477929585}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477929585}'),(111,1,1,1,167,1477906140,'PO311016010',1,35000,0,35000,'BL JNE',0,3,'{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1477906174}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477932346}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477932346}'),(112,1,1,1,165,1477906140,'PO311016011',1,340000,0,340000,'BL JNE',0,3,'{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1477906202}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477929808}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477929808}'),(113,1,1,1,166,1477906200,'PO311016012',2,410000,30000,380000,'BL JNE',0,3,'{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1477906236}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477929681}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477929681}'),(114,1,1,1,177,1477907100,'PO311016013',1,180000,0,180000,'BL JNE',0,3,'{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1477907156}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477929989}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477929989}'),(115,1,1,1,178,1477908600,'PO311016014',1,340000,21200,318800,'LAZADA',0,3,'{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1477908850}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477929765}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477929765}'),(116,1,1,1,179,1477909020,'PO311016015',1,331000,0,331000,'LAZADA',0,3,'{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1477909090}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477933583}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477933583}'),(117,1,1,1,181,1477909800,'PO311016016',2,160000,10000,150000,'BL JNE',0,3,'{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1477909875}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477930989}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477930989}'),(118,1,1,1,180,1477909860,'PO311016017',2,160000,10000,150000,'BL JNE',0,3,'{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1477909917}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477933679}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477933679}'),(119,1,1,1,182,1477910220,'PO311016018',1,320000,0,320000,'TP JNE',0,3,'{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1477910275}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477929230}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477929230}'),(120,1,1,1,183,1477911120,'PO311016019',1,180000,0,180000,'TP JNE',0,3,'{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1477911202}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477929495}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477929495}'),(121,1,1,1,185,1477914420,'PO311016020',1,180000,0,180000,'BL JNE',0,3,'{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1477914463}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477929614}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477929614}'),(122,1,1,1,184,1477914420,'PO311016021',2,430000,30000,400000,'BL JNE',0,3,'{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1477914502}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477929135}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1477929135}'),(123,1,1,0,186,1477930260,'PO311016022',2,480000,15000,465000,'CL',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477930438}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478059766}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478059766}'),(124,1,1,0,187,1477930500,'PO311016023',1,345000,0,345000,'CL',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477930609}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478059779}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478059779}'),(125,1,1,0,188,1477930680,'PO311016024',1,150000,0,150000,'CL',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477930749}','{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477931358}','{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477931358}'),(126,1,1,1,189,1477931100,'PO311016025',1,345000,0,345000,'CL',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477931290}','{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477931344}','{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477931344}'),(127,1,1,0,190,1477931760,'PO311016026',1,150000,0,150000,'CL',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477931860}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478059788}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478059788}'),(128,1,1,1,191,1477979580,'PO011116001',2,160000,10000,150000,'TP JNE',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477979622}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478059849}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478059849}'),(129,1,1,1,192,1477979760,'PO011116002',2,160000,10000,150000,'BL JNE',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477979810}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478059923}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478059923}'),(130,1,1,1,193,1477982220,'PO011116003',1,340000,0,340000,'BL JNE',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477982291}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478059726}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478059726}'),(131,1,1,1,194,1477984740,'PO011116004',1,320000,0,320000,'TP GOsend',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477984811}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478060370}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478060370}'),(132,1,1,1,25,1477992000,'PO011116005',1,30000,0,30000,'\"Hendro Prasetyo \r\nTelp: 087899110451\"',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477992050}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478060502}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478060502}'),(133,1,1,1,25,1477992000,'PO011116006',2,135000,0,135000,'\"tuti tukiyo\r\nTelp: 085773814887\"',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1477992115}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478060683}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478060683}'),(134,1,1,0,195,1478017740,'PO011116007',1,320000,0,320000,'CL',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1478017813}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478060741}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478060741}'),(135,1,1,0,196,1478017920,'PO011116008',3,310000,10000,300000,'CL',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1478018019}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478060777}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478060777}'),(136,1,1,1,198,1478065080,'PO021116001',1,320000,0,320000,'SHOPE',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1478065184}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478162175}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478162175}'),(137,1,1,1,199,1478065320,'PO021116002',2,170000,5000,165000,'SHOPE',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1478065400}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478162391}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478162391}'),(138,1,1,1,200,1478065860,'PO021116003',1,320000,0,320000,'BL SIcepat',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1478065938}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478162467}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478162467}'),(139,1,1,1,201,1478066520,'PO021116004',1,340000,0,340000,'TP JNE',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1478066574}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478162647}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478162647}'),(140,1,1,1,202,1478070480,'PO021116005',1,345000,0,345000,'TP JNE',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1478070629}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478162680}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478162680}'),(141,1,1,1,203,1478046300,'PO021116006',1,65000,0,65000,'Nama:\r\nRachmat Susanto\r\nTelp:\r\n081252755339',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1478089602}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478107317}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478107317}'),(142,1,1,0,204,1478104440,'PO021116007',2,410000,0,410000,'CL',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1478104554}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478166032}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478166032}'),(143,1,1,1,205,1478104620,'PO021116008',1,320000,0,320000,'CL',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1478104681}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478166039}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478166039}'),(144,1,1,0,206,1478104920,'PO021116009',2,435000,15000,420000,'CL',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1478104998}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478166023}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478166023}'),(145,1,1,0,207,1478105040,'PO021116010',1,90000,0,90000,'CL',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1478105117}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478166047}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478166047}'),(146,1,1,0,208,1478105160,'PO021116011',1,150000,0,150000,'CL',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1478105225}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478166056}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478166056}'),(147,1,1,1,210,1478155320,'PO031116001',1,180000,0,180000,'BL JNE',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1478155404}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478162860}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478162860}'),(148,1,1,1,211,1478173380,'PO031116002',1,250000,0,250000,'BL JNE',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1478173476}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478262714}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478262714}'),(149,1,1,0,212,1478189100,'PO031116003',2,630000,30000,600000,'CL',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1478189244}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478262699}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478262699}'),(150,1,1,1,213,1478110500,'PO041116001',1,340000,0,340000,'TP Rajaong JNE',0,3,'{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1478196993}','{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1478197012}','{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1478197012}'),(151,1,1,1,214,1478110740,'PO041116001',1,340000,0,340000,'TP JNE',0,3,'{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1478197213}','{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1478197229}','{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1478197229}'),(152,1,1,1,215,1478239560,'PO041116001',1,180000,0,180000,'TP JNE',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1478239635}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478262723}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478262723}'),(153,1,1,1,216,1478261880,'PO041116002',1,320000,0,320000,'BL JNE',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1478261969}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478262746}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478262746}'),(154,1,1,0,217,1478276160,'PO041116003',1,150000,0,150000,'CL',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1478276253}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478413426}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478413426}'),(155,1,1,1,218,1478319780,'PO051116001',1,180000,0,180000,'TP GOsend',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1478319833}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478413455}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478413455}'),(156,1,1,1,219,1478319840,'PO051116002',1,180000,0,180000,'TP GOsend',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1478319925}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478413463}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478413463}'),(157,1,1,1,220,1478319960,'PO051116003',1,320000,0,320000,'TP GOsend',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1478320007}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478413484}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478413484}'),(158,1,1,0,221,1478364480,'PO051116004',2,270000,0,270000,'CL',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1478364629}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478413573}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478413573}'),(159,1,1,0,222,1478364720,'PO051116005',2,300000,0,300000,'CL',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1478364819}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478413590}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478413590}'),(160,1,1,0,223,1478364840,'PO051116006',2,240000,40000,200000,'CL',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1478364982}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478413745}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478413745}'),(161,1,1,0,224,1478365140,'PO061116001',1,250000,0,250000,'CL , tuker sama Baofeng XD',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1478365296}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478625941}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478625941}'),(162,1,1,0,225,1478365380,'PO061116001',1,345000,0,345000,'CL',0,3,'{\"uid\":\"4\",\"unick\":\"fimma\",\"tdate\":1478365474}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478625957}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478625957}'),(163,1,1,1,25,1478409960,'PO061116002',1,300000,0,300000,'Tatik Edgard\r\ntebet barat dalam VII C no 11\r\nTebet Kota Administrasi Jakarta Selatan, 12850\r\nDKI Jakarta\r\nTelp: 08111019977',0,3,'{\"uid\":\"3\",\"unick\":\"ronald\",\"tdate\":1478410019}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478626021}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478626021}'),(164,1,1,0,226,1478425260,'PO061116003',2,410000,0,410000,'Booth CL',0,3,'{\"uid\":\"3\",\"unick\":\"ronald\",\"tdate\":1478425342}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478626050}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478626050}'),(165,1,1,0,227,1478438340,'PO061116004',1,120000,0,120000,'Booth CL',0,3,'{\"uid\":\"3\",\"unick\":\"ronald\",\"tdate\":1478438408}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478626065}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478626065}'),(166,1,1,0,228,1478507340,'PO071116001',1,250000,0,250000,'Booth CL',0,3,'{\"uid\":\"3\",\"unick\":\"ronald\",\"tdate\":1478507400}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478626074}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478626074}'),(167,1,1,1,230,1478681460,'PO091116001',1,315000,5000,310000,'TP JNE',0,3,'{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1478681560}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478800274}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478800274}'),(168,1,1,1,231,1478681580,'PO091116002',1,180000,0,180000,'BL JNE',0,3,'{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1478681623}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478800327}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478800327}'),(169,1,1,1,232,1478681640,'PO091116003',2,160000,10000,150000,'TP JNE',0,3,'{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1478681714}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478800364}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478800364}'),(170,1,1,1,233,1478681700,'PO091116004',2,160000,10000,150000,'TP JNE',0,3,'{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1478681803}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478800638}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478800638}'),(171,1,1,1,234,1478681820,'PO091116005',2,490000,10000,480000,'BL JNE',0,3,'{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1478681878}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478800852}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478800852}'),(172,1,1,1,235,1478682780,'PO091116006',1,315000,0,315000,'BLIBLI',0,3,'{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1478682873}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478800925}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478800925}'),(173,1,1,1,236,1478683020,'PO091116007',2,165000,0,165000,'TP GOJEK',0,3,'{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1478683096}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478801026}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478801026}'),(174,1,1,1,237,1478683200,'PO091116008',2,405000,20000,385000,'TP JNE',0,3,'{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1478683246}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478801083}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478801083}'),(175,1,1,1,238,1478760720,'PO101116001',2,490000,10000,480000,'BL JNE',0,3,'{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1478760808}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478801121}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478801121}'),(176,1,1,1,239,1478762100,'PO101116002',2,490000,10000,480000,'TP JNE',0,3,'{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1478762166}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478801204}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478801204}'),(177,1,1,1,240,1478788200,'PO101116003',2,430000,0,430000,'FIIT VR 2n by Transfer',0,1,'{\"uid\":\"3\",\"unick\":\"ronald\",\"tdate\":1478788257}',NULL,NULL),(178,1,1,1,241,1478451600,'PO101116004',1,400000,0,400000,'BL JNE',0,3,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478794474}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478794490}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478794490}'),(179,1,1,1,242,1478492160,'PO101116005',1,180000,0,180000,'TP JNE',0,3,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478794629}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478794635}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478794635}'),(180,1,1,1,243,1478451600,'PO101116006',1,320000,5000,315000,'TP JNE',0,3,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478794716}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478794722}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478794722}'),(181,1,1,1,244,1478451600,'PO101116007',1,180000,0,180000,'TP JNE',0,3,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478794794}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478794816}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478794816}'),(182,1,1,1,245,1478492520,'PO101116008',1,125000,0,125000,'BL JNE',0,3,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478794983}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478795000}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478795000}'),(183,1,1,1,246,1478492640,'PO101116009',1,400000,0,400000,'BL JNE',0,3,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478795094}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478795104}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478795104}'),(184,1,1,1,247,1478493120,'PO101116010',1,180000,0,180000,'TP JNE',0,3,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478795545}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478795556}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478795556}'),(185,1,1,1,248,1478493180,'PO101116011',2,490000,10000,480000,'TP JNE',0,3,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478795683}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478795707}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478795707}'),(186,1,1,1,249,1478493840,'PO101116012',1,400000,0,400000,'Lazada JNE',0,3,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478796326}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478796336}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478796336}'),(187,1,1,1,250,1478493960,'PO101116013',1,340000,0,340000,'Lazada JNE',0,3,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478796441}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478796451}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478796451}'),(188,1,1,1,251,1478581020,'PO101116014',1,180000,0,180000,'BL JNE',0,3,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478797048}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478797058}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478797058}'),(189,1,1,1,252,1478581140,'PO111116001',2,405000,25000,380000,'BL JNE',0,3,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478797215}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478797225}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478797225}'),(190,1,1,1,25,1478581560,'PO111116002',1,105000,0,105000,'Ayanami Store 08567315768\r\n\r\nIrwan budi santoso\r\nTia cell 2 jalan kapten sudibyo no 15c Belakang pasifik mall tegal\r\nTegal Kota Tegal, 52191\r\nJawa Tengah\r\nTelepon : 08122660901',0,3,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478797699}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478797710}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478797710}'),(191,1,1,1,254,1478668320,'PO111116003',4,1440000,15000,1425000,'KENA BIAYA GOJEK 15RB JADI POTONG DISKON 15RB',0,3,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478798013}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478798185}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478798185}'),(192,1,1,1,255,1478495880,'PO111116004',1,315000,0,315000,'GOJEK TP',0,3,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478798418}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478798425}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478798425}'),(193,1,1,1,256,1478755380,'PO111116005',1,345000,0,345000,'TP GOJEK',0,3,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478798677}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478798682}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478798682}'),(194,1,1,1,257,1478496360,'PO111116006',1,120000,52300,67700,'BL GOSEND RUGI SALAH KSH GAMBAR ADA REMOTE NYA JADI BELI DI JAKMALL',0,3,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478799041}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478799070}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478799070}'),(195,1,1,1,258,1478151240,'PO111116007',1,180000,0,180000,'BL GOSEND JAKVR',0,3,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478799296}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478799310}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478799310}'),(196,1,1,1,259,1478237700,'PO111116008',1,323000,0,323000,'BL GOSEND JAKVR',0,3,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478799403}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478799420}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478799420}'),(198,1,1,1,241,1478756220,'PO111116001',1,90000,0,90000,'BL JNE JAKVR',0,3,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478799488}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478799494}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478799494}'),(199,1,1,1,179,1478065080,'PO111116001',1,90000,0,90000,'BL JAKVR GOSEND',0,3,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478799584}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478799589}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478799589}'),(200,1,1,1,260,1478799600,'PO111116001',1,35000,0,35000,'BL JAKVR GOSEND',0,3,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478799682}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478799783}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478799783}'),(201,1,1,1,157,1477633440,'PO111116002',1,125000,0,125000,'BL GOSEND JAKVR',0,3,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478799890}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478799896}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478799896}'),(202,1,1,1,203,1477979220,'PO111116002',1,65000,0,65000,'JNE RESELLER',0,3,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478800111}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478800124}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478800124}'),(203,1,1,1,261,1478865000,'PO111116002',2,490000,10000,480000,'GOSEND',7,3,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478865127}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478865222}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478865222}'),(204,1,1,1,262,1478865240,'PO111116003',2,405000,15000,390000,'GOSEND',7,3,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478865305}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478865317}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478865317}'),(205,1,1,1,25,1478865540,'PO111116004',1,30000,0,30000,'GOSEND\r\nagus cahyono\r\n081339930883',15,3,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478865632}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478865651}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478865651}'),(206,1,1,1,25,1478865660,'PO111116005',2,135000,0,135000,'GOSEND rykel djingga\r\n081808376527',15,3,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478865734}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478865744}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478865744}'),(207,1,1,1,65,1478866260,'PO111116006',2,135000,5000,130000,'JNE',15,3,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478866476}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478866500}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478866500}'),(208,1,1,1,265,1478866920,'PO111116007',1,315000,0,315000,'gedung cyber lt 3A\r\nJl. kuningan barat No. 8 jakarta selatan 12710\r\n\r\na/n : ROJAK                        \r\n\r\nVIA WA SELVIA',14,3,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478867037}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478867104}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478867104}'),(209,1,1,1,266,1478841120,'PO121116001',1,90000,0,90000,'JNE',6,1,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478884403}',NULL,NULL),(210,1,1,1,267,1478884500,'PO121116001',1,340000,94000,246000,'PROMO LAZADA HARGA 315RB\r\nJNE ONGKIR 69RB',10,3,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478884610}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478884748}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478884748}'),(211,1,1,1,269,1478841840,'PO121116002',1,315000,15000,300000,'JNE VIA WA ADRY',15,3,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478885104}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478885116}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478885116}'),(212,1,1,1,270,1478842200,'PO121116002',1,340000,0,340000,'JNE',4,3,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478885491}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478885509}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478885509}'),(213,1,1,1,271,1478842380,'PO121116002',1,400000,0,400000,'JNE',7,3,'{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478885675}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478885686}','{\"uid\":\"2\",\"unick\":\"adry\",\"tdate\":1478885686}'),(214,2,1,0,272,1478937720,'PO121116001',2,435000,0,435000,'',0,1,'{\"uid\":\"3\",\"unick\":\"ronald\",\"tdate\":1478937761}',NULL,NULL),(215,1,1,1,273,1478939820,'PO121116002',1,150000,0,150000,'JNE',4,1,'{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1478939944}','{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1478939958}',NULL),(216,1,1,1,274,1478940180,'PO121116003',1,340000,0,340000,'JNE',8,1,'{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1478940250}',NULL,NULL),(217,1,1,1,275,1478940780,'PO121116004',1,125000,0,125000,'JNE',4,1,'{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1478940836}',NULL,NULL),(218,1,1,1,276,1478940840,'PO121116005',1,125000,0,125000,'JNE',4,1,'{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1478940890}',NULL,NULL),(219,1,1,1,277,1478941020,'PO121116006',1,125000,0,125000,'JNE',7,1,'{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1478941109}',NULL,NULL),(220,1,1,1,278,1478942400,'PO121116007',2,405000,15000,390000,'JNE',7,1,'{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1478942455}',NULL,NULL),(221,1,1,1,279,1478942460,'PO121116008',2,365000,5000,360000,'JNE',7,1,'{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1478942538}','{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1478942553}',NULL),(222,1,1,1,280,1478942580,'PO121116009',2,170000,5000,165000,'GOJEK',7,1,'{\"uid\":\"5\",\"unick\":\"selvia\",\"tdate\":1478942654}',NULL,NULL),(223,2,1,0,281,1478815020,'PO121116002',1,345000,0,345000,'Transfer ke Mandiri + ongkir Rp 88rb',0,1,'{\"uid\":\"3\",\"unick\":\"ronald\",\"tdate\":1478944680}',NULL,NULL);
/*!40000 ALTER TABLE `transaction_tab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transfer_tab`
--

DROP TABLE IF EXISTS `transfer_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transfer_tab` (
  `tid` int(10) NOT NULL AUTO_INCREMENT,
  `tno` varchar(15) DEFAULT NULL,
  `trid` int(10) NOT NULL,
  `tdate` int(10) DEFAULT NULL,
  `tdesc` varchar(350) DEFAULT NULL,
  `tstatus` tinyint(1) DEFAULT NULL,
  `tcreatedby` varchar(350) DEFAULT NULL,
  `tmodifiedby` varchar(350) DEFAULT NULL,
  `tapprovedby` varchar(350) DEFAULT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transfer_tab`
--

LOCK TABLES `transfer_tab` WRITE;
/*!40000 ALTER TABLE `transfer_tab` DISABLE KEYS */;
/*!40000 ALTER TABLE `transfer_tab` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_access_tab`
--

LOCK TABLES `users_access_tab` WRITE;
/*!40000 ALTER TABLE `users_access_tab` DISABLE KEYS */;
INSERT INTO `users_access_tab` VALUES (1,1,1,1),(2,1,2,1),(3,1,3,1),(4,1,4,1),(5,1,5,1),(6,1,6,1),(7,1,7,1),(8,1,8,1),(9,1,9,1),(10,1,10,1),(11,1,11,1),(12,1,12,1),(13,1,13,1),(14,1,14,1),(15,1,15,1),(16,1,16,1),(17,1,17,1),(18,1,18,1),(19,1,19,1),(20,1,20,1),(21,1,21,1),(22,1,22,1),(23,1,23,1),(24,1,24,1),(25,1,25,1),(26,1,26,1),(27,1,27,1),(28,1,28,1),(29,1,29,1),(30,1,30,1),(31,1,31,1),(32,1,32,1),(33,1,33,1),(34,1,34,1),(35,1,35,1),(36,2,1,1),(37,2,2,0),(38,2,3,1),(39,2,4,1),(40,2,5,1),(41,2,6,1),(42,2,7,1),(43,2,8,1),(44,2,9,1),(45,2,10,1),(46,2,11,1),(47,2,12,1),(48,2,13,1),(49,2,14,1),(50,2,15,1),(51,2,16,1),(52,2,17,1),(53,2,18,1),(54,2,19,1),(55,2,20,1),(56,2,21,1),(57,2,22,1),(58,2,23,1),(59,2,24,1),(60,2,25,1),(61,2,26,1),(62,2,27,1),(63,2,28,1),(64,2,29,1),(65,2,30,0),(66,2,31,0),(67,2,32,0),(68,2,33,0),(69,2,34,0),(70,2,35,1),(71,1,36,1),(72,1,37,1),(73,1,38,1),(74,1,39,1),(75,1,40,1),(76,1,41,1),(77,2,36,1),(78,2,37,1),(79,2,38,1),(80,2,39,1),(81,2,40,1),(82,2,41,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_permission_tab`
--

LOCK TABLES `users_permission_tab` WRITE;
/*!40000 ALTER TABLE `users_permission_tab` DISABLE KEYS */;
INSERT INTO `users_permission_tab` VALUES (1,'Product','Product','product',0),(2,'ProductExecute','Product Execute','product',1),(3,'Categories','Categories','categories',0),(4,'CategoriesExecute','Categories Execute','categories',3),(5,'Brand','Brand','brand',0),(6,'BrandExecute','Brand Execute','brand',5),(7,'Vendor','Vendor','vendor',0),(8,'VendorExecute','Vendor Execute','vendor',7),(9,'Customer','Customer','customer',0),(10,'CustomerExecute','Customer Execute','customer',9),(11,'City','City','city',0),(12,'CityExecute','City Execute','city',11),(13,'Province','Province','province',0),(14,'ProvinceExecute','Province Execute','province',13),(15,'Country','Country','country',0),(16,'CountryExecute','Country Execute','country',15),(17,'ItemReceiving','Item Receiving','receiving',0),(18,'ItemReceivingExecute','Item Receiving Execute','receiving',17),(19,'Stock','Stock','inventory',0),(20,'Opname','Opname','opname',0),(21,'OpnameExecute','Opname Execute','opname',20),(22,'Order','Order','order',0),(23,'OrderExecute','Order Execute','order',22),(24,'OrderApproved','Order Approved','order',22),(25,'Return','Return','retur',0),(26,'ReturnExecute','Return Execute','retur',25),(27,'ReturnApproved','Return Approved','retur',25),(28,'ReportTransaction','Report Transaction','reporttransaction',0),(29,'ReportOpname','Report Opname','reportopname',0),(30,'Users','Users','users',0),(31,'UsersExecute','Users Execute','users',30),(32,'UsersGroup','Users Group','users/users_group',0),(33,'UsersGroupExecute','Users Group Execute','users/users_group',32),(34,'ProductPriceBase','Product Price Base','product',1),(35,'PetiCash','Peti Cash','peti_cash',0),(36,'DistributionRequest','Distribution Request','request',0),(37,'DistributionRequestExecute','Distribution Request Execute','request',36),(38,'DistributionRequestApproved','Distribution Request Approved','request/request_update/',36),(39,'DistributionTransfer','Distribution Transfer','transfer',0),(40,'DistributionTransferExecute','Distribution Transfer Execute','transfer',39),(41,'DistributionTransferApproved','Distribution Transfer Approved','transfer/request_update/',39);
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
INSERT INTO `users_tab` VALUES (1,1,'root','root@jakvr.com','5cf558b1dca271a77a59a79a017045d7','2344687071*1478970164',1474115933,1),(2,1,'adry','adrysunarto@jakvr.com','a38223f761f7b20dd3d1b08035025ee0','2344687071*1478883919',1475730635,1),(3,2,'ronald','ronald@jakvr.com','bc140d91301e559bc3c6ddd1861d40d3','3393064994*1478952844',1475730635,1),(4,2,'fimma','fimma@jakvr.com','2713719707a72516313e2b6bbacfa46f','2003717985*1478807576',1475730635,1),(5,1,'selvia','selvia@jakvr.com','5ba89b2db818da63a8f765c117a62872','2344687071*1478967204',1475730635,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendor_tab`
--

LOCK TABLES `vendor_tab` WRITE;
/*!40000 ALTER TABLE `vendor_tab` DISABLE KEYS */;
INSERT INTO `vendor_tab` VALUES (1,'JAMESS CHINA','GA TAU','0*0',2,1,1,1),(2,'JAKNOT','CP','0*0',1,3,3,1),(3,'JAKMALL','CENTRAL PARK','*',1,3,3,1);
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

-- Dump completed on 2016-11-13  1:03:20
