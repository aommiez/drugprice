CREATE DATABASE  IF NOT EXISTS `drugprice` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `drugprice`;
-- MySQL dump 10.13  Distrib 5.6.13, for osx10.6 (i386)
--
-- Host: 127.0.0.1    Database: drugprice
-- ------------------------------------------------------
-- Server version	5.6.14-debug

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
-- Table structure for table `drug`
--

DROP TABLE IF EXISTS `drug`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drug` (
  `iddrug` int(11) NOT NULL AUTO_INCREMENT,
  `hospitalId` int(11) NOT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qtc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pack` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_money` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `budget_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`iddrug`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drug`
--

LOCK TABLES `drug` WRITE;
/*!40000 ALTER TABLE `drug` DISABLE KEYS */;
INSERT INTO `drug` VALUES (1,0,'2012-10-02','2556-09-30','','Clotrimazole  cream','cre',' 500 gm','10',' 500 gm','280','1','องค์การเภสัชกรรม','72112.39999999999','กรณีพิเศษ'),(2,2,'2012-10-02','2556-09-30','','Dicloxacillin    capsule','cap','250  mg','50','250  mg','550','500','องค์การเภสัชกรรม','72112.39999999999','กรณีพิเศษ'),(3,2,'2012-10-02','2556-09-30','','Dimenhydrinate ','tab',' 50 mg.','30','1000','175.58','1000','องค์การเภสัชกรรม','72112.39999999999','กรณีพิเศษ'),(4,2,'2012-10-02','2556-09-30','','Glutaraldehyde','sol','2% in 5 lit.','4','2% in 5 lit.','450','1','องค์การเภสัชกรรม','121358','กรณีพิเศษ'),(5,2,'2012-10-02','2556-09-30','','Mefenamic acid','cap','250 mg','5','250 mg','305','500','องค์การเภสัชกรรม','108575.96','กรณีพิเศษ'),(6,2,'2012-10-02','2556-09-30','','Metformin','tab','500 mg','60','500 mg','175','500','องค์การเภสัชกรรม','10500','กรณีพิเศษ'),(7,2,'2012-10-02','2556-09-30','','Morphine oral','sol','10mg / 5 ml.','30','10mg / 5 ml.','35','1','กลุ่มเงินทุนหมุนเวียนยาเสพติด','2270','ตกลงราคา'),(8,2,'2012-10-02','2556-09-30','','Morphine SO4','inj','10mg in 1ml.','120','10mg in 1ml.','6','1','กลุ่มเงินทุนหมุนเวียนยาเสพติด','2270','ตกลงราคา'),(9,2,'2012-10-02','2556-09-30','','P.T.U.','tab','50 mg','40','50 mg','210','500','องค์การเภสัชกรรม','8400','กรณีพิเศษ'),(10,2,'2012-10-02','2556-09-30','','Penicillin V  250  mg.','tab','(4แสนยูนิต)','10','(4แสนยูนิต)','379','500','องค์การเภสัชกรรม','40690','ตกลงราคา'),(11,2,'2012-10-02','2556-09-30','','แก้ไอขับเสมหะเด็ก','mix','60  ml','1500','60  ml','7','1','องค์การเภสัชกรรม','72112.39999999999','กรณีพิเศษ'),(12,2,'2012-10-05','2556-09-30','','Insulin  NPH  penfill','inj','300 u/3 ml','300','300 u/3 ml','88.81','1','บริษัท ดีเคเอสเอช (ประเทศไทย)','26643','ตกลงราคา'),(13,2,'2012-10-05','2556-09-30','','Insulin Mixtard','inj',' 30:70 in 10ml','500',' 30:70 in 10ml','65','1','บริษัท เบอร์ลินฟาร์มาซูติคอลอินดักชั่น','32500','ตกลงราคา'),(14,2,'2012-10-08','2556-09-30','','Digoxin  0.25 mg.','tab',' 0.25 mg.','10','','320','1000','บริษัท ที.โอ. เคมีคอลส์ (1976) จำกัด','3200','ตกลงราคา'),(15,2,'2012-10-08','2556-09-30','','Dopamine HCl','inj','250mg in10ml','300','250mg in10ml','12.84','1','บริษัท สยามฟาร์มาซูติคอล จำกัด','3852','ตกลงราคา'),(16,2,'2012-10-08','2556-09-30','','N.  S. S.  For  irrigate','sol','0.9% in 1000 ml','500','0.9% in 1000 ml','29','1','บริษัทซิลลิค ฟาร์ม่า จำกัด','14500','ตกลงราคา'),(17,0,'2012-11-12','2556-09-30','0000444','Acetylcysteine','pow','200 mg/ 3 gm','200','200 mg/ 3 gm','72.76000000000001','60','บริษัท เกร๊ทเตอร์มายบาซิน','14,552.00',''),(18,3,'2012-11-12','2556-09-30','0000784','Simvastatin','tab','20 mg.','50','20 mg.','642','1000','บริษัท เกร๊ทเตอร์มายบาซิน','32,100.00',''),(19,3,'2012-11-12','2556-09-30','0000512','Phenytoin Na','cap','100 mg','20','100 mg','395','1000','หจก. สุขประเสริฐ เอ แอนด์ ดับเบิลยู','7,900.00',''),(20,3,'2012-11-12','2556-09-30','0000020','Allopurinol','tab','100 mg','50','100 mg','185','500','บริษัท ชุมชนเภสัชกรรม จำกัด (มหาชน)','9,250.00',''),(21,3,'2012-11-12','2556-09-30','0000292','Glipizide','tab','5 mg.','60','5 mg.','79','500','บริษัท ชุมชนเภสัชกรรม','4,740.00',''),(22,3,'2012-11-12','2556-09-30','0000123','Ceftriaxone','inj','1 gm','1500','1 gm','13.29','1','บริษัท นิด้า ฟาร์มา อินคอร์ปอเรชั่น จำกัด','19,935.00',''),(23,3,'2012-11-12','2556-09-30','0000123','Ceftriaxone','inj','1 gm','1500','1 gm','13.29','1','บริษัท นิด้า ฟาร์มา','19,935.00',''),(24,3,'2012-11-12','2556-09-30','0000170','Dicloxacillin','cap','250 mg','50','250 mg','500','500','บริษัท นิด้า ฟาร์มา','25,000.00',''),(25,3,'2012-11-12','2556-09-30','0000356','Berodual MDI','MDI','0.02mg+0.05mg/d','250','0.02mg+0.05mg/d','214','1','องค์การเภสัชกรรม','53,500.00',''),(26,3,'2012-11-12','2556-09-30','0000752','Amlodipine','tab','10 mg','300','10 mg','110','100','บริษัท พรอส ฟาร์มา','33,000.00',''),(27,3,'2012-11-12','2556-09-30','0000231','Enalapril','tab','5 mg','200','5 mg','180','1000','บริษัท เบอร์ลินฟาร์มาซูติคอลอินดัสตรี้ จำกัด','36,000.00',''),(28,3,'2012-11-12','2556-09-30','0000653','Triamcinolone','cre','0.1% in 5 gm','30','0.1% in 5 gm','183','1','บริษัท  เวสโก ฟาร์มาซูติคอล จำกัด','5,490.00',''),(29,3,'2012-11-12','2556-09-30','0000429','Metronidazole','inj','0.5% in 100ml','500','0.5% in 100ml','18','1','บริษัท วี.แอนด์.วี. กรุงเทพฯ จำกัด','9,000.00','');
/*!40000 ALTER TABLE `drug` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-11-28 11:48:32
