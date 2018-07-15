-- MySQL dump 10.13  Distrib 5.1.57, for redhat-linux-gnu (x86_64)
--
-- Host: localhost    Database: a8095515_just
-- ------------------------------------------------------
-- Server version	5.1.57
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `categoryNAME` varchar(30) NOT NULL,
  `parentCategoryID` int(11) NOT NULL,
  `Detail` varchar(20) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES ('ALL',0,'',1),('Movies',1,'',2),('Hangout',1,'',3),('Restaurants',1,'',4),('Computers',1,'',5),('Mobiles & Gadgets',1,'',6),('Samsung',5,'',58),('Top 5',2,'',14),('Repairs',1,'',25),('Sony',5,'',57),('Bank',1,'',28),('Police Station',1,'',29),('Hospital',1,'',30),('Furnitures',1,'',32),('Education',1,'',33),('Veg',4,'',41),('Sector-6',3,'',51),('Non-Veg',4,'',43),('Civic Center',3,'',44),('NOKIA',6,'',45),('SAMSUNG',6,'',46),('SONY',6,'',47),('DELL',5,'',48),('Apple',5,'',59),('Latest',2,'',56),('extra',1,'',60),('extra1',60,'',61);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item` (
  `shopID` int(11) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  `Itemname` varchar(20) NOT NULL,
  `itemprice` int(11) NOT NULL,
  `description` varchar(30) NOT NULL,
  KEY `CategoryID` (`CategoryID`),
  KEY `shopID` (`shopID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` VALUES (3,2,2,'bikaner',56,' nczxcnzc,n'),(4,4,3,'skjjkljslkklsmklms',78987,'bbsjksbkjsk'),(4,4,4,'sbsbmjsbkjnsk',89009809,'hjsnsjnsjnsnlsk'),(5,4,5,'s nsnns,m',89898,'nsjsjsn'),(6,13,6,'sn,snmsns,m',2147483647,'nsmnsnnsm'),(2,4,7,'samosa',8900,'m,m.m,m,'),(2,4,8,'samosa2',7989,'hjkljlkjlk'),(2,4,9,'samosa3',678,'jljlk'),(2,3,10,'hhjshjhshjs',909009090,'snjsjsnkjsn'),(2,3,11,'hhjshjhshjs',909009090,'snjsjsnkjsn'),(2,3,12,'asbjbsjsjnn',7898798,'nsjsnssksn'),(2,3,13,'vbvbv',786878,'bnbj'),(2,3,14,'ghgjh',7878,'78897878'),(2,3,15,'gfggj',7879,'gfhgjhgjh'),(2,3,16,'vvvvbv',87878,'bbbbbbbbb'),(8,23,17,'bjsbssnm',898798898,'jhsskskkns'),(8,23,18,'snnsmnsmn',7979898,'skjjskjjsk'),(9,2,19,'bshshshjsh',878989,'hsjhsjhskh'),(2,27,20,'anshu',0,'undefined h'),(19,5,21,'676',67,''),(19,5,22,'676',67,'');
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop`
--

DROP TABLE IF EXISTS `shop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop` (
  `userID` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `smail` varchar(100) NOT NULL,
  `sph1` decimal(12,0) NOT NULL,
  `area` varchar(15) NOT NULL,
  `saddr` varchar(100) NOT NULL,
  `sweb` varchar(50) NOT NULL,
  `sdesc` varchar(100) NOT NULL,
  PRIMARY KEY (`sid`),
  KEY `userID` (`userID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop`
--

LOCK TABLES `shop` WRITE;
/*!40000 ALTER TABLE `shop` DISABLE KEYS */;
INSERT INTO `shop` VALUES (22,16,'regrthh','aaa@a.com','545453646','Sector2','ffgfghh ffhdfg fggfgf','http://3','ddfsgrdnhtgf grhbhbbht'),(24,17,'Tripti Restaurant','trp@gmail.com','123456','Sector1','Padmnabhpur, Durg','http://www.NoWebsite.com','Family Restaurant'),(2,3,'jljdj','MNSMNS@GMAIL.COM','99090909','779878','jhcnmnfdsldsvn','http://www.computerhope.com/issues/ch000637.htm','njscjcxzncnmxz'),(17,4,'hariraj','MNSMNS@GMAIL.COM','909908','8980','ncjzxcjahcjbjsdcjsdnclkdclc;l','http://www.computerhope.com/issues/ch000637.htm','hgghXbjNXm Xmnx'),(17,5,'vista','MNSMNS@GMAIL.COM','8900890','78709909','snnjlsnljsjjksmkssmksm','http://www.w3schools.com/php/php_sessions.asp','snnsknskmksmpsll,s;l,slsmkms'),(17,6,'cmon','asd@g.com','909908','8980','bbxbsdjknjNdklmNDklmkldm','http://www.computerhope.com/issues/ch000637.htm','nxnjlCNCjJXCCnNCKJXNCJ'),(2,7,'shadil','saransh98@gmail.com','909908','Sector6','bjczndfjldjksdbfkjKDSfhoashjcbjhcsbhascajajsf','http://www.w3schools.com/php/php_sessions.asp','bzjxcnkdjvilnsdklgbjlnklvbnklxnlkcjzjcxhhasjsodoajv;kjzdoviopxcmbk'),(19,8,'sara56','MNSMNS@GMAIL.COM','909908','Sector5','ghghgdysjsayjyjygsydhygaysgaygdyg','http://www.computerhope.com/issues/ch000637.htm','nbjnvknzx;vjzdvkzdnvaskflasjvkjz;lvzdkvjz;ljvd'),(19,9,'hira','saransh98@gmail.com','89','Sector4','njcjkzjk;mc;kszl;cm;zlmc;lkz;','http://www.w3schools.com/php/php_sessions.asp','jcjizjckkcjzsiljciznijziljncijcjzjdjfj'),(19,10,'maMNKA6','asd@g.com','89','Sector5','jkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk','http://www.w3schools.com/php/php_sessions.asp','njnjclkdnnjsndfkdjfksjdfkdfjkj'),(19,11,'maMNKA','hgs@gmail.com','89','Sector3','jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj','http://www.w3schools.com/php/php_sessions.asp','hjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj'),(19,12,'shadil','saransh98@gmail.com','89','Sector4','jlckjsdkfjksdjfksdfns','http://www.w3schools.com/php/php_sessions.asp','hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh'),(19,13,'shadil','saransh98@gmail.com','909908','Sector5','hdjahdijdkjjvjfjksj','http://www.computerhope.com/issues/ch000637.htm','nbcjndfkzdjkjfkjzkjzjfjfj'),(17,14,'mitwa','saransh98@gmail.com','21312','Sector4','njsdinsknknkznczmcklnsklcl','http://www.w3schools.com/php/php_sessions.asp','nknkzjkdncljdklcnlkdzhvkln'),(21,15,'sssd','w@w.com','98982272','Sector3','salhdasl','','sdsadj'),(31,18,'klkkk','hjj','8556','Sector1','','',''),(31,19,'klkkk','hjj','8556','Sector1','','',''),(31,20,'klkkk','hjj','8556','Sector1','','','');
/*!40000 ALTER TABLE `shop` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `authority` int(20) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'saransh','12345',1),(2,'akash','54321',0),(3,'pushpa','111',0),(4,'cho2','qqq',0),(5,'123','fff',0),(6,'rahul','56',0),(7,'kishore','56',0),(8,'ganesh','56',0),(9,'srk','56',0),(10,'pragya','56',0),(11,'abhi','56',0),(12,'gauraw','56',0),(13,'vikas','789',0),(14,'vikas77','789',0),(15,'mithun','789',0),(16,'jignesh','8888',0),(17,'akshay','akshay',0),(18,'varun','333',0),(19,'native','777',0),(20,'a','123',0),(21,'psarwa.67','67926792',0),(22,'aaa','aaa',0),(23,'abc','123',0),(24,'one','123456',0),(25,'moht','66666',0),(26,'prateek','12345',0),(27,'navdeep','abcd',0),(28,'angry','youare',0),(29,'abc','123',0),(30,'abc1','123',0),(31,'jhjhjhjh','aaaaa',0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-07-12  1:35:15
