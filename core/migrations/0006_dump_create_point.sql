  CREATE TABLE `point` (
    `ID` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `address` varchar(255) NOT NULL,
    `longitude` DOUBLE,
    `latiude` FLOAT,
    PRIMARY KEY (`ID`)
  ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;