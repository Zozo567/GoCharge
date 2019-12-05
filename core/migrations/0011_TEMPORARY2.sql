CREATE TABLE `point_meta` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `pid` (`pid`),
  KEY `pid_name` (`pid`,`name`)
)