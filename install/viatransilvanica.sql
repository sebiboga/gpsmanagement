CREATE DATABASE sebi_web;
USE sebi_web;
CREATE TABLE `sebi_web`.`viatransilvanica` ( `id` VARCHAR(36) NOT NULL , `lat` VARCHAR(25) NULL , `lng` VARCHAR(25) NULL , `ord` VARCHAR(10) NULL ) ENGINE = InnoDB;
ALTER TABLE `viatransilvanica` ADD UNIQUE( `id`);
ALTER TABLE `viatransilvanica` ADD `timestamp` VARCHAR(70) NOT NULL AFTER `ord`;