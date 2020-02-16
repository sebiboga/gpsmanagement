CREATE DATABASE gps;
USE gps;
CREATE TABLE `gps`.`viatransilvanica` ( `id` VARCHAR(25) NOT NULL , `lat` VARCHAR(25) NULL , `lng` VARCHAR(25) NULL , `ord` VARCHAR(10) NULL ) ENGINE = InnoDB;
ALTER TABLE `viatransilvanica` ADD UNIQUE( `id`);