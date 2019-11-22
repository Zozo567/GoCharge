  CREATE TABLE `address_meta` (
    `ID` int(11) NOT NULL AUTO_INCREMENT,
    `pid` int(11) NOT NULL,
    `name` varchar(255) NOT NULL,
    `value` varchar(255) NOT NULL,
    PRIMARY KEY (`ID`),
    KEY `pid` (`pid`),
    KEY `pid_name` (`pid`,`name`)
  ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;