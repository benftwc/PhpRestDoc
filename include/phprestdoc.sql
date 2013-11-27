SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `phprestdoc` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
USE `phprestdoc` ;

-- -----------------------------------------------------
-- Table `phprestdoc`.`method`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `phprestdoc`.`method` ;

CREATE TABLE IF NOT EXISTS `phprestdoc`.`method` (
  `method_id` INT(11) NOT NULL AUTO_INCREMENT,
  `method_name` VARCHAR(255) NULL,
  PRIMARY KEY (`method_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `phprestdoc`.`parameter_type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `phprestdoc`.`parameter_type` ;

CREATE TABLE IF NOT EXISTS `phprestdoc`.`parameter_type` (
  `parameter_type_id` INT(11) NOT NULL AUTO_INCREMENT,
  `parameter_type_name` VARCHAR(255) NULL,
  PRIMARY KEY (`parameter_type_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `phprestdoc`.`variable_type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `phprestdoc`.`variable_type` ;

CREATE TABLE IF NOT EXISTS `phprestdoc`.`variable_type` (
  `variable_type_id` INT(11) NOT NULL AUTO_INCREMENT,
  `variable_type_name` VARCHAR(255) NULL,
  PRIMARY KEY (`variable_type_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `phprestdoc`.`parameter`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `phprestdoc`.`parameter` ;

CREATE TABLE IF NOT EXISTS `phprestdoc`.`parameter` (
  `parameter_id` INT(11) NOT NULL,
  `parameter_name` VARCHAR(255) NULL,
  `parameter_value` VARCHAR(255) NULL,
  `parameter_required` TINYINT(1) NOT NULL DEFAULT 0,
  `parameter_description` TEXT NULL,
  `parameter_type` VARCHAR(255) NULL,
  `parameter_type_id` INT(11) NOT NULL,
  `variable_type_id` INT(11) NOT NULL,
  PRIMARY KEY (`parameter_id`),
  INDEX `fk_parameter_parameter_type1_idx` (`parameter_type_id` ASC),
  INDEX `fk_parameter_variable_type1_idx` (`variable_type_id` ASC),
  CONSTRAINT `fk_parameter_parameter_type1`
    FOREIGN KEY (`parameter_type_id`)
    REFERENCES `phprestdoc`.`parameter_type` (`parameter_type_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_parameter_variable_type1`
    FOREIGN KEY (`variable_type_id`)
    REFERENCES `phprestdoc`.`variable_type` (`variable_type_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `phprestdoc`.`setting`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `phprestdoc`.`setting` ;

CREATE TABLE IF NOT EXISTS `phprestdoc`.`setting` (
  `setting_id` INT(11) NOT NULL,
  `setting_name` VARCHAR(255) NULL,
  `seting_value` VARCHAR(255) NULL,
  PRIMARY KEY (`setting_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `phprestdoc`.`error_status_code`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `phprestdoc`.`error_status_code` ;

CREATE TABLE IF NOT EXISTS `phprestdoc`.`error_status_code` (
  `error_status_code_id` INT(11) NOT NULL AUTO_INCREMENT,
  `error_status_code_value` VARCHAR(255) NULL,
  `error_status_code_reason` TEXT NULL,
  PRIMARY KEY (`error_status_code_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `phprestdoc`.`response_content_type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `phprestdoc`.`response_content_type` ;

CREATE TABLE IF NOT EXISTS `phprestdoc`.`response_content_type` (
  `response_content_type_id` INT(11) NOT NULL AUTO_INCREMENT,
  `response_content_type_value` VARCHAR(255) NULL,
  PRIMARY KEY (`response_content_type_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `phprestdoc`.`operation`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `phprestdoc`.`operation` ;

CREATE TABLE IF NOT EXISTS `phprestdoc`.`operation` (
  `operation_id` INT(11) NOT NULL AUTO_INCREMENT,
  `operation_path` VARCHAR(255) NULL,
  `operation_implementation_note` TEXT NULL,
  PRIMARY KEY (`operation_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `phprestdoc`.`operation_parameter`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `phprestdoc`.`operation_parameter` ;

CREATE TABLE IF NOT EXISTS `phprestdoc`.`operation_parameter` (
  `operation_id` INT(11) NOT NULL,
  `parameter_id` INT(11) NOT NULL,
  INDEX `fk_operation_parameter_operation1_idx` (`operation_id` ASC),
  INDEX `fk_operation_parameter_parameter1_idx` (`parameter_id` ASC),
  CONSTRAINT `fk_operation_parameter_operation1`
    FOREIGN KEY (`operation_id`)
    REFERENCES `phprestdoc`.`operation` (`operation_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_operation_parameter_parameter1`
    FOREIGN KEY (`parameter_id`)
    REFERENCES `phprestdoc`.`parameter` (`parameter_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `phprestdoc`.`operation_error_status_code`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `phprestdoc`.`operation_error_status_code` ;

CREATE TABLE IF NOT EXISTS `phprestdoc`.`operation_error_status_code` (
  `operation_id` INT(11) NOT NULL,
  `error_status_code_id` INT(11) NOT NULL,
  INDEX `fk_operation_error_status_code_operation1_idx` (`operation_id` ASC),
  INDEX `fk_operation_error_status_code_error_status_code1_idx` (`error_status_code_id` ASC),
  CONSTRAINT `fk_operation_error_status_code_operation1`
    FOREIGN KEY (`operation_id`)
    REFERENCES `phprestdoc`.`operation` (`operation_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_operation_error_status_code_error_status_code1`
    FOREIGN KEY (`error_status_code_id`)
    REFERENCES `phprestdoc`.`error_status_code` (`error_status_code_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `phprestdoc`.`operation_method`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `phprestdoc`.`operation_method` ;

CREATE TABLE IF NOT EXISTS `phprestdoc`.`operation_method` (
  `operation_id` INT(11) NOT NULL,
  `method_id` INT(11) NOT NULL,
  INDEX `fk_operation_method_operation1_idx` (`operation_id` ASC),
  INDEX `fk_operation_method_method1_idx` (`method_id` ASC),
  CONSTRAINT `fk_operation_method_operation1`
    FOREIGN KEY (`operation_id`)
    REFERENCES `phprestdoc`.`operation` (`operation_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_operation_method_method1`
    FOREIGN KEY (`method_id`)
    REFERENCES `phprestdoc`.`method` (`method_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `phprestdoc`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `phprestdoc`.`user` ;

CREATE TABLE IF NOT EXISTS `phprestdoc`.`user` (
  `user_id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_name` VARCHAR(255) NULL,
  `user_email` VARCHAR(255) NULL,
  `user_password` VARCHAR(255) NULL,
  PRIMARY KEY (`user_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `phprestdoc`.`operation_response_content_type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `phprestdoc`.`operation_response_content_type` ;

CREATE TABLE IF NOT EXISTS `phprestdoc`.`operation_response_content_type` (
  `operation_id` INT(11) NOT NULL,
  `response_content_type_id` INT(11) NOT NULL,
  INDEX `fk_operation_response_content_type_operation1_idx` (`operation_id` ASC),
  INDEX `fk_operation_response_content_type_response_content_type1_idx` (`response_content_type_id` ASC),
  CONSTRAINT `fk_operation_response_content_type_operation1`
    FOREIGN KEY (`operation_id`)
    REFERENCES `phprestdoc`.`operation` (`operation_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_operation_response_content_type_response_content_type1`
    FOREIGN KEY (`response_content_type_id`)
    REFERENCES `phprestdoc`.`response_content_type` (`response_content_type_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `phprestdoc`.`property`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `phprestdoc`.`property` ;

CREATE TABLE IF NOT EXISTS `phprestdoc`.`property` (
  `property_id` INT(11) NOT NULL AUTO_INCREMENT,
  `property_name` VARCHAR(255) NULL,
  `property_description` TEXT NULL,
  `variable_type_id` INT(11) NOT NULL,
  PRIMARY KEY (`property_id`),
  INDEX `fk_property_variable_type1_idx` (`variable_type_id` ASC),
  CONSTRAINT `fk_property_variable_type1`
    FOREIGN KEY (`variable_type_id`)
    REFERENCES `phprestdoc`.`variable_type` (`variable_type_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `phprestdoc`.`operation_property`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `phprestdoc`.`operation_property` ;

CREATE TABLE IF NOT EXISTS `phprestdoc`.`operation_property` (
  `operation_id` INT(11) NOT NULL,
  `property_id` INT(11) NOT NULL,
  INDEX `fk_operation_property_operation1_idx` (`operation_id` ASC),
  INDEX `fk_operation_property_property1_idx` (`property_id` ASC),
  CONSTRAINT `fk_operation_property_operation1`
    FOREIGN KEY (`operation_id`)
    REFERENCES `phprestdoc`.`operation` (`operation_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_operation_property_property1`
    FOREIGN KEY (`property_id`)
    REFERENCES `phprestdoc`.`property` (`property_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `phprestdoc`.`response`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `phprestdoc`.`response` ;

CREATE TABLE IF NOT EXISTS `phprestdoc`.`response` (
  `response_id` INT(11) NOT NULL AUTO_INCREMENT,
  `response_id_sup` INT(11) NOT NULL DEFAULT 0,
  `response_name` VARCHAR(255) NULL,
  `response_optional` TINYINT(1) NOT NULL DEFAULT 0,
  `response_description` TEXT NULL,
  `variable_type_id` INT(11) NOT NULL,
  PRIMARY KEY (`response_id`),
  INDEX `fk_response_variable_type1_idx` (`variable_type_id` ASC),
  CONSTRAINT `fk_response_variable_type1`
    FOREIGN KEY (`variable_type_id`)
    REFERENCES `phprestdoc`.`variable_type` (`variable_type_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `phprestdoc`.`operation_response`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `phprestdoc`.`operation_response` ;

CREATE TABLE IF NOT EXISTS `phprestdoc`.`operation_response` (
  `operation_operation_id` INT(11) NOT NULL,
  `response_response_id` INT(11) NOT NULL,
  INDEX `fk_operation_response_operation1_idx` (`operation_operation_id` ASC),
  INDEX `fk_operation_response_response1_idx` (`response_response_id` ASC),
  CONSTRAINT `fk_operation_response_operation1`
    FOREIGN KEY (`operation_operation_id`)
    REFERENCES `phprestdoc`.`operation` (`operation_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_operation_response_response1`
    FOREIGN KEY (`response_response_id`)
    REFERENCES `phprestdoc`.`response` (`response_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
