-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: localhost    Database: pmshsm
-- ------------------------------------------------------
-- Server version	8.0.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `consultation`
--

DROP TABLE IF EXISTS `consultation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `consultation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `patid` varchar(45) NOT NULL,
  `visitid` int NOT NULL,
  `date` date DEFAULT NULL,
  `done_by` varchar(45) DEFAULT NULL,
  `description` varchar(450) DEFAULT NULL,
  `prescription` int DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `refer` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consultation`
--

LOCK TABLES `consultation` WRITE;
/*!40000 ALTER TABLE `consultation` DISABLE KEYS */;
INSERT INTO `consultation` VALUES (3,'PT0895',3,'2022-01-22','-','bla bla bla.\nHere are some notes hahaha\nI a a doctor lol',3,'active',NULL),(4,'PT0895',5,'2022-01-27','-','hahah hooo okay',0,'active','Maternity'),(5,'PT9699',7,'2022-02-05','Desy Chriss','Showing symptons of Typhoid.\nRefered to X-Ray to view if lungs okay.',5,'active','Radiograph'),(6,'PT5597',10,'2022-08-27','-','haa handina zvekutaura apa. Just go drink lots of water and do some exercises. \r\nGo to lab for some testing',0,'active','Laboratory'),(7,'PT9699',8,'2022-08-27','-','Hapana nyaya apa.',0,'active','-'),(8,'PT8806',9,'2022-08-27','-','Yah low temprature and alarming BP',9,'active','-'),(9,'PT4528',12,'2022-08-27','-','Has broken bones. Refer to Physiotherapy',0,'active','Physiotherapy'),(11,'PT8806',13,'2022-08-28','Speacialist Physio','Haa wangu',10,'active','-');
/*!40000 ALTER TABLE `consultation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `patients` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `email` varchar(95) DEFAULT NULL,
  `natid` varchar(45) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `patid` varchar(45) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `kin_name` varchar(45) DEFAULT NULL,
  `kin_email` varchar(95) DEFAULT NULL,
  `kin_phone` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `natid_UNIQUE` (`natid`),
  UNIQUE KEY `patid_UNIQUE` (`patid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patients`
--

LOCK TABLES `patients` WRITE;
/*!40000 ALTER TABLE `patients` DISABLE KEYS */;
INSERT INTO `patients` VALUES (1,'Billy','Thomas','63123456Y77','bill@gmail.com','Male','0772892710','6A Nursery Hill,\nNumber 1,\nWankie','PT4528','2022-01-20','active','Lashon James','lashon@gmail.com','0772979755'),(2,'Lashon','James','638977154R54','chimzy@test.com','Female','0772979755','3614 Hatcliffe Ext,\nBorrowdale,\nHarare','PT0895','2022-01-21','active','Chriss Desy','chris@luminsoft.com','0772892710'),(5,'Kim','Mutasa','email@abc.inc','631234578J50','Female','0774027188','54 Kambuzuma 1, Harare','PT9699','2022-02-05','active','kname','kemail','kphone'),(6,'Blessing','Nyamajiwa','bnyama@hwange.co.zw','63-098764D09','Male','0875614682','Here at where..','PT5597','2022-02-17','active','name','email','phone'),(9,'James','White','chris@luminsoft.com','2356787y54','Male','04000000','Shop 2, Sam Mujoma','PT8806','2022-08-27','active','Paul Thomas','paulthomas@gmail.com','2637791234545'),(10,'lolo','lopp','ll@kio.po','llll','Male','pp','pppppp','PT8252','2022-08-27','active','iou','oiu@il.po','pppppp');
/*!40000 ALTER TABLE `patients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `precheck`
--

DROP TABLE IF EXISTS `precheck`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `precheck` (
  `id` int NOT NULL AUTO_INCREMENT,
  `patid` varchar(45) NOT NULL,
  `visitid` int NOT NULL,
  `temprature` float DEFAULT NULL,
  `blood` varchar(45) DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `other` varchar(450) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `done_by` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `precheck`
--

LOCK TABLES `precheck` WRITE;
/*!40000 ALTER TABLE `precheck` DISABLE KEYS */;
INSERT INTO `precheck` VALUES (2,'PT0895',3,37,'107',65,'Heavy coughing.\nPale face','2022-01-22','active','-'),(3,'PT4528',4,39,'108',44,'Coughing\nExcessive Sweating','2022-01-23','active','Sister Nurse'),(4,'PT0895',5,40,'110',65,'Some notes','2022-01-23','active','Sister Nurse'),(5,'PT4528',6,37,'99',20,'Bilharzia','2022-01-23','active','Sister Nurse'),(6,'PT9699',7,34,'99',65,'Suffering from Typhoid and difficlty i breathing','2022-02-05','active','Desy Chriss'),(7,'PT9699',8,37,'120/65',65,'Good readings','2022-08-27','active','-'),(8,'PT8806',9,38,'115/50',52,'Needs attention','2022-08-27','active','-'),(9,'PT5597',10,40,'120/70',60,'Coughing vigorously','2022-08-27','active','-'),(10,'PT4528',12,37,'122/65',62,'Normal Readings','2022-08-27','active','-'),(11,'PT8806',13,0,'0',0,'none','2022-08-28','active','Speacialist Physio');
/*!40000 ALTER TABLE `precheck` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prescription`
--

DROP TABLE IF EXISTS `prescription`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prescription` (
  `id` int NOT NULL AUTO_INCREMENT,
  `patid` varchar(45) NOT NULL,
  `visitid` int NOT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `description` varchar(450) DEFAULT NULL,
  `done_by` varchar(45) DEFAULT NULL,
  `approved_by` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prescription`
--

LOCK TABLES `prescription` WRITE;
/*!40000 ALTER TABLE `prescription` DISABLE KEYS */;
INSERT INTO `prescription` VALUES (3,'PT0895',3,'2022-01-22','approve','Panado\nGrays\nContraceptives','-','-'),(4,'PT4528',4,'2022-01-23','denied','4 Flue\nParacetamol','-','Pharmacy Mr'),(5,'PT9699',7,'2022-02-05','approve','Pain Killer','Desy Chriss','Desy Chriss'),(6,'PT9699',7,'2022-02-05','denied','Breatheatemole','Desy Chriss','Desy Chriss'),(9,'PT8806',9,'2022-08-27','approve','Vapewo something','-','Speacialist Physio'),(10,'PT8806',13,'2022-08-28','active','Paracetamol 200mls','Speacialist Physio','-');
/*!40000 ALTER TABLE `prescription` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `procedures`
--

DROP TABLE IF EXISTS `procedures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `procedures` (
  `id` int NOT NULL AUTO_INCREMENT,
  `patid` varchar(45) NOT NULL,
  `visitid` int NOT NULL,
  `date` date DEFAULT NULL,
  `department` varchar(45) DEFAULT NULL,
  `done_by` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `description` varchar(450) DEFAULT NULL,
  `prescription` int DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `procedures`
--

LOCK TABLES `procedures` WRITE;
/*!40000 ALTER TABLE `procedures` DISABLE KEYS */;
INSERT INTO `procedures` VALUES (1,'PT4528',4,'2022-01-23','-','-','active','I am just testing something hahahah.\nBut you can confirm if this is visible.',4,'Testing'),(2,'PT0895',5,'2022-01-27','Maternity','Maternity Str','active','Tanga tichiona munhu',0,'Checkup'),(3,'PT9699',7,'2022-02-05','Radiograph','Desy Chriss','active','Patient Looks OK. \nMight have inhaled a lot of dust lately.\nI suggest he drinks lots of milk.\n\nWill add some pills to ease the pain in breathing.',6,'Basic Scan'),(4,'PT4528',12,'2022-08-27','Physiotherapy','-','active','Bone Massaging',0,'Massaging'),(5,'PT5597',10,'2022-08-27','Laboratory','User Admin','active','Tested saliva for infections',9,'Saliva Tests');
/*!40000 ALTER TABLE `procedures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `natid` varchar(45) DEFAULT NULL,
  `email` varchar(95) DEFAULT NULL,
  `uname` varchar(45) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `userid` varchar(45) DEFAULT NULL,
  `department` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `date` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `natid_UNIQUE` (`natid`),
  UNIQUE KEY `uname_UNIQUE` (`uname`),
  UNIQUE KEY `userid_UNIQUE` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Chriss','Desy','63-1499','chrissd@transhumantec.com','cdesy','Male','0772979755','Clerk','1234','SU4054','Admissions','active','2022-01-19'),(2,'Chriss','Desy','631499578J50','chris@luminsoft.com','qriss','Male','0772892710','Admin','qwerty','SU4688','Dental','active','2022-01-19'),(4,'Nurse','Sister','671922057Y65','nurse@yahoo.com','nurse','Female','0772000000','Nurse','1234','SU8989','Admissions','active','2022-01-22'),(5,'Doctor','Doc','123456789K09','doctor@abc.inc','doctor','Male','0773123456','Doctor','1234','SU7713','Admissions','active','2022-01-22'),(6,'Mr','Pharmacy','7612905364R65','pharmacists@zzu.com','pharmacy','Male','0765421987','Pharmacy','1234','SU1159','Pharmacy','active','2022-01-22'),(7,'Speacialist','Physio','761933528O12','physio@ert.inc','physio','Female','0712345987','Specialist','1234','SU5162','Physiotherapy','active','2022-01-23'),(8,'Str','Maternity','781033520H76','maternity@gmail.com','maternity','Female','0772000000','Specialist','1234','SU7895','Maternity','active','2022-01-23'),(9,'Admin','User','natid','email','admin','Male','phone','Admin','1234','SU7404','System','active','2022-02-05'),(10,'Test ','test','test','test@abc.inc','testing','Male','test','Clerk','1234','SU1122','Admissions','active','2022-08-24 08:15:56');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `visits`
--

DROP TABLE IF EXISTS `visits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `visits` (
  `id` int NOT NULL AUTO_INCREMENT,
  `patid` varchar(45) NOT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `stage` varchar(50) DEFAULT NULL,
  `dis_date` varchar(50) NOT NULL DEFAULT '-',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visits`
--

LOCK TABLES `visits` WRITE;
/*!40000 ALTER TABLE `visits` DISABLE KEYS */;
INSERT INTO `visits` VALUES (1,'PT4528','2022-01-20','discharged','-','2022-01-24'),(2,'PT4528','2022-01-21','discharged','-','2022-01-24'),(3,'PT0895','2022-01-22','discharged','consult','2022-01-24'),(4,'PT4528','2022-01-23','discharged','specialist','2022-01-24'),(5,'PT0895','2022-01-23','discharged','specialist','2022-01-24'),(6,'PT4528','2022-01-23','discharged','precheck','2022-01-24'),(7,'PT9699','2022-02-05','discharged','specialist','2022-02-05'),(8,'PT9699','2022-08-27','discharged','consult','2022-08-27 21:09:58'),(9,'PT8806','2022-08-27','discharged','consult','2022-08-27 21:10:02'),(10,'PT5597','2022-08-27','discharged','specialist','2022-08-27 21:10:15'),(11,'PT8252','2022-08-27','discharged','admission','2022-08-27 14:10:46'),(12,'PT4528','2022-08-27','discharged','specialist','2022-08-27 21:06:40'),(13,'PT8806','2022-08-28','active','consult','-');
/*!40000 ALTER TABLE `visits` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-29 15:54:59
