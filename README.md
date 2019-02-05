# protector
PHP Authenticator, Session Manager and Router Controller for vanilla PHP applications.

It implements a MVC controler to manage routes, and give access to models and views predefined.

This project is a boiler plate just havin all the basic setup to:

 - Requires Authentication
 _ Generate Password token using SHA 128, 256 or 512 in the client
 - Not allow plain password from client to the server, even outside https, which guarantee a minimun security requirement
 - Manage dinamically the User Session
 - Allow access to defined public routes without authentication
 - Allow access to defined protected routes through authentication services
 - Register uses in Database
 - Not allow direct access to PHP files


Initial Setup:

1 - Create User table (Ready to MySql)
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema protector
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema protector
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `protector` DEFAULT CHARACTER SET utf8 ;
USE `protector` ;

-- -----------------------------------------------------
-- Table `php`.`USER`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `php`.`USER` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `EMAIL` VARCHAR(50) NOT NULL,
  `FIRST_NAME` VARCHAR(45) NOT NULL,
  `LAST_NAME` VARCHAR(45) NOT NULL,
  `PASSWORD` VARCHAR(255) NOT NULL,
  `BIRTHDAY` DATE NOT NULL,
  `LAST_LOGIN` DATETIME NULL,
  `LAST_LOGIN_ATTEMPT` DATETIME NULL,
  `LOGIN_ATTEMPT` INT NULL,
  `BLOCKED` VARCHAR(1) NOT NULL,
  `RECORD_CREATION` DATETIME NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `EMAIL_UNIQUE` (`EMAIL` ASC))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

2 - Edit database/database.php to setup a database connection. Future TODO: TO use a external config file.

3 - Install Apache http server and deploy the app
