  CREATE TABLE `powerbank` (
    `ID` int(11) NOT NULL AUTO_INCREMENT,
    `status` int(11) NOT NULL DEFAULT 0,
    `type` int(11) NOT NULL,
    `wire` varchar(45) DEFAULT NULL,
    PRIMARY KEY (`ID`)
  ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;