CREATE TABLE  `customers` (
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`login` VARCHAR( 100 ) NOT NULL ,
`name` VARCHAR( 100 ) NOT NULL ,
`lastname` VARCHAR( 100 ) NOT NULL ,
`sex` ENUM ('male', 'female') NULL ,
`birthday` datetime DEFAULT NULL,
`email` VARCHAR( 100 ) NOT NULL ,
`mobile` VARCHAR( 100 ) NOT NULL,
`password` VARCHAR( 100 ) NOT NULL
) ENGINE = INNODB;
