CREATE TABLE `powerbank` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `pid` INT NOT NULL,
  `status` INT NOT NULL DEFAULT 1,
  `type` INT NOT NULL,
  `label` VARCHAR(45) NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`ID`));
