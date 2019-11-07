-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: localhost    Database: GoCharge
-- ------------------------------------------------------
-- Server version	5.7.24-0ubuntu0.16.04.1

--
-- Table structure for table `users`
--
DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
    `ID` int(11) NOT NULL AUTO_INCREMENT,
    `email` varchar(255) NOT NULL,
    `authkey` varchar(255) NOT NULL,
    `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `date_update` timestamp,
    PRIMARY KEY (`ID`)
  ) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
  /*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `powerbanks`
--

DROP TABLE IF EXISTS `powerbanks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;

CREATE TABLE `powerbanks` (
    `ID` int(11) NOT NULL AUTO_INCREMENT,
    `company_id` int(11) NOT NULL DEFAULT '0',
    `number` varchar(255) NOT NULL,
    `advert` varchar(255) NOT NULL,
    `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `use_status` int(1) NOT NULL DEFAULT '0',
    PRIMARY KEY (`ID`)
  ) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
  /*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `points`
--

DROP TABLE IF EXISTS `points`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;

  CREATE TABLE `points` (
    `ID` int(11) NOT NULL AUTO_INCREMENT,
    `address_id` int(11) NOT NULL DEFAULT '0',
    PRIMARY KEY (`ID`)
  ) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;

  CREATE TABLE `address` (
    `ID` int(11) NOT NULL AUTO_INCREMENT,
    `region_id` varchar(45) DEFAULT NULL,
    `city_id` varchar(45) DEFAULT NULL,
    `street` varchar(255) DEFAULT NULL,
    `house` varchar(20) DEFAULT NULL,
    `geo_x` varchar(100) DEFAULT NULL,
    `geo_y` varchar(100) DEFAULT NULL,
    PRIMARY KEY (`ID`)
  ) ENGINE=InnoDB AUTO_INCREMENT=291 DEFAULT CHARSET=utf8;
  /*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `advert`
--

DROP TABLE IF EXISTS `advert`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
  CREATE TABLE `advert` (
    `ID` int(11) NOT NULL AUTO_INCREMENT,
    `company_name` varchar(255) NOT NULL,
    PRIMARY KEY (`ID`)
  ) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users_meta`
--

DROP TABLE IF EXISTS `users_meta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
  CREATE TABLE `users_meta` (
    `ID` int(11) NOT NULL AUTO_INCREMENT,
    `pid` int(11) NOT NULL,
    `name` varchar(255) NOT NULL,
    `value` text NOT NULL,
    PRIMARY KEY (`ID`),
    KEY `pid` (`pid`),
    KEY `pid_name` (`pid`,`name`)
  ) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `powerbanks_meta`
--

DROP TABLE IF EXISTS `powerbanks_meta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
  CREATE TABLE `powerbanks_meta` (
    `ID` int(11) NOT NULL AUTO_INCREMENT,
    `pid` int(11) NOT NULL,
    `name` varchar(255) NOT NULL,
    `value` text NOT NULL,
    PRIMARY KEY (`ID`),
    KEY `pid` (`pid`),
    KEY `pid_name` (`pid`,`name`)
  ) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `points_meta`
--

DROP TABLE IF EXISTS `points_meta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
  CREATE TABLE `points_meta` (
    `ID` int(11) NOT NULL AUTO_INCREMENT,
    `pid` int(11) NOT NULL,
    `name` varchar(255) NOT NULL,
    `value` text NOT NULL,
    PRIMARY KEY (`ID`),
    KEY `pid` (`pid`),
    KEY `pid_name` (`pid`,`name`)
  ) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `address_meta`
--

DROP TABLE IF EXISTS `address_meta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
  CREATE TABLE `address_meta` (
    `ID` int(11) NOT NULL AUTO_INCREMENT,
    `pid` int(11) NOT NULL,
    `name` varchar(255) NOT NULL,
    `value` text NOT NULL,
    PRIMARY KEY (`ID`),
    KEY `pid` (`pid`),
    KEY `pid_name` (`pid`,`name`)
  ) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `advert_meta`
--

DROP TABLE IF EXISTS `advert_meta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
  CREATE TABLE `advert_meta` (
    `ID` int(11) NOT NULL AUTO_INCREMENT,
    `pid` int(11) NOT NULL,
    `name` varchar(255) NOT NULL,
    `value` text NOT NULL,
    PRIMARY KEY (`ID`),
    KEY `pid` (`pid`),
    KEY `pid_name` (`pid`,`name`)
  ) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping events for database 'crmloft'
--

--
-- Dumping routines for database 'crmloft'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-10-25 03:34:57