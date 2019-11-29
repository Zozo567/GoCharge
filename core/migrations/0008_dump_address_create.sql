CREATE TABLE `address` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `region_id` varchar(45) DEFAULT NULL,
  `city_id` varchar(45) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `house` varchar(20) DEFAULT NULL,
  `geo_x` varchar(100) DEFAULT NULL,
  `geo_y` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;