-- MySQL Script generated by MySQL Workbench
-- Fri Jun  7 11:21:03 2019
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema inventario
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema inventario
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `inventario` DEFAULT CHARACTER SET utf8 ;
USE `inventario` ;

-- -----------------------------------------------------
-- Table `inventario`.`CLASIFICACIONES`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`CLASIFICACIONES` (
  `cla_id` INT(11) NOT NULL AUTO_INCREMENT,
  `cla_nombre` VARCHAR(45) CHARACTER SET 'latin1' NULL,
  PRIMARY KEY (`cla_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 17
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `inventario`.`DEPENDENCIAS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`DEPENDENCIAS` (
  `dep_id` INT(11) NOT NULL AUTO_INCREMENT,
  `dep_nombre` VARCHAR(45) CHARACTER SET 'latin1' NULL,
  `dep_firma_nombre` VARCHAR(255) NOT NULL,
  `dep_firma_grado` VARCHAR(255) NOT NULL,
  `dep_firma_titulo` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`dep_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 79
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `inventario`.`PROYECTOS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`PROYECTOS` (
  `pro_id` INT(11) NOT NULL AUTO_INCREMENT,
  `pro_nombre` VARCHAR(255) NULL,
  PRIMARY KEY (`pro_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `inventario`.`RESPONSABLES`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`RESPONSABLES` (
  `res_id` INT(11) NOT NULL AUTO_INCREMENT,
  `res_apellido` VARCHAR(45) NULL,
  `res_nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`res_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 111
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `inventario`.`ARTICULOS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`ARTICULOS` (
  `art_id` INT(11) NOT NULL AUTO_INCREMENT,
  `art_descripcion` VARCHAR(255) CHARACTER SET 'latin1' NOT NULL,
  `art_numeroemco` VARCHAR(45) CHARACTER SET 'latin1' NULL,
  `art_serie` VARCHAR(100) CHARACTER SET 'latin1' NULL,
  `art_factura` INT(11) NULL DEFAULT NULL,
  `art_prestamo` TINYINT(1) NULL DEFAULT '0',
  `update_time` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `create_time` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `pro_id` INT(11) NOT NULL,
  `res_id` INT(11) NOT NULL DEFAULT '0',
  `dep_id` INT(11) NOT NULL,
  `cla_id` INT(11) NOT NULL,
  PRIMARY KEY (`art_id`),
  INDEX `fk_articulos_clasificaciones_idx` (`cla_id` ASC),
  INDEX `fk_articulos_dependencias1_idx` (`dep_id` ASC),
  INDEX `fk_articulos_proyectos1_idx` (`pro_id` ASC),
  INDEX `fk_articulos_responsables1_idx` (`res_id` ASC),
  CONSTRAINT `fk_articulos_clasificaciones`
    FOREIGN KEY (`cla_id`)
    REFERENCES `inventario`.`CLASIFICACIONES` (`cla_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_articulos_dependencias1`
    FOREIGN KEY (`dep_id`)
    REFERENCES `inventario`.`DEPENDENCIAS` (`dep_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_articulos_proyectos1`
    FOREIGN KEY (`pro_id`)
    REFERENCES `inventario`.`PROYECTOS` (`pro_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_articulos_responsables1`
    FOREIGN KEY (`res_id`)
    REFERENCES `inventario`.`RESPONSABLES` (`res_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 843
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `inventario`.`USUARIOS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`USUARIOS` (
  `usu_id` INT(11) NOT NULL AUTO_INCREMENT,
  `usu_login` VARCHAR(16) CHARACTER SET 'latin1' NOT NULL,
  `usu_nombre` VARCHAR(16) CHARACTER SET 'latin1' NOT NULL,
  `usu_apellido` VARCHAR(45) CHARACTER SET 'latin1' NOT NULL,
  `usu_perfil` ENUM('Administrador','Usuario') CHARACTER SET 'latin1' NOT NULL,
  `usu_password` VARCHAR(255) CHARACTER SET 'latin1' NOT NULL,
  `create_time` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`usu_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `inventario`.`HISTORICOS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`HISTORICOS` (
  `his_id` INT(11) NOT NULL AUTO_INCREMENT,
  `his_fecha` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `art_id` INT(11) NOT NULL,
  `dep_id` INT(11) NOT NULL,
  `usu_id` INT(11) NOT NULL,
  `his_tipo` ENUM('Pase','Prestamo','Alta','Retorno','Reparacion') CHARACTER SET 'latin1' NOT NULL,
  `his_observacion` VARCHAR(255) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  PRIMARY KEY (`his_id`),
  INDEX `fk_historicos_articulos1_idx` (`art_id` ASC),
  INDEX `fk_historicos_pases_dependencias1_idx` (`dep_id` ASC),
  INDEX `fk_historico_pases_usuarios1_idx` (`usu_id` ASC),
  CONSTRAINT `fk_historico_pases_usuarios1`
    FOREIGN KEY (`usu_id`)
    REFERENCES `inventario`.`USUARIOS` (`usu_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_historicos_articulos1`
    FOREIGN KEY (`art_id`)
    REFERENCES `inventario`.`ARTICULOS` (`art_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_historicos_pases_dependencias1`
    FOREIGN KEY (`dep_id`)
    REFERENCES `inventario`.`DEPENDENCIAS` (`dep_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 991
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
