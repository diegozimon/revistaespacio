-- MySQL Script generated by MySQL Workbench
-- Wed Jul 22 00:02:43 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Ciudad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Ciudad` (
  `idCiudad` INT NOT NULL AUTO_INCREMENT,
  `Ciudad` VARCHAR(45) NULL,
  PRIMARY KEY (`idCiudad`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Usuario` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `Username` VARCHAR(45) NOT NULL,
  `Usermail` VARCHAR(45) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `Nombre` VARCHAR(45) NOT NULL,
  `Apellido` VARCHAR(45) NOT NULL,
  `Ciudad` VARCHAR(45) NOT NULL,
  `Direccion` VARCHAR(100) NULL,
  `CreateTime` DATE NOT NULL,
  `Ciudad_idCiudad` INT NOT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE INDEX `Username_UNIQUE` (`Username` ASC) VISIBLE,
  UNIQUE INDEX `Usermail_UNIQUE` (`Usermail` ASC) VISIBLE,
  INDEX `fk_Usuario_Ciudad1_idx` (`Ciudad_idCiudad` ASC) VISIBLE,
  UNIQUE INDEX `idUsuario_UNIQUE` (`idUsuario` ASC) VISIBLE,
  CONSTRAINT `fk_Usuario_Ciudad1`
    FOREIGN KEY (`Ciudad_idCiudad`)
    REFERENCES `mydb`.`Ciudad` (`idCiudad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Perfil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Perfil` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Tipo` VARCHAR(32) NULL,
  `Descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Usuario_has_Perfil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Usuario_has_Perfil` (
  `Usuario_idUsuario` INT NOT NULL,
  `Perfil_id` INT NOT NULL,
  PRIMARY KEY (`Usuario_idUsuario`, `Perfil_id`),
  INDEX `fk_Usuario_has_Perfil_Perfil1_idx` (`Perfil_id` ASC) VISIBLE,
  INDEX `fk_Usuario_has_Perfil_Usuario1_idx` (`Usuario_idUsuario` ASC) VISIBLE,
  CONSTRAINT `fk_Usuario_has_Perfil_Usuario1`
    FOREIGN KEY (`Usuario_idUsuario`)
    REFERENCES `mydb`.`Usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuario_has_Perfil_Perfil1`
    FOREIGN KEY (`Perfil_id`)
    REFERENCES `mydb`.`Perfil` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Categoria` (
  `idClasificacion` INT NOT NULL AUTO_INCREMENT,
  `Tipo` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idClasificacion`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Entrada`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Entrada` (
  `idEntrada` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Titulo` VARCHAR(45) NULL,
  `Contenido` TEXT NULL,
  `Fecha` DATETIME NULL,
  `Imagen` VARCHAR(255) NULL,
  `Estado` TINYINT NULL,
  PRIMARY KEY (`idEntrada`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Entrada_has_Categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Entrada_has_Categoria` (
  `Entrada_idEntrada` INT NOT NULL,
  `Categoria_idClasificacion` INT NOT NULL,
  PRIMARY KEY (`Entrada_idEntrada`, `Categoria_idClasificacion`),
  INDEX `fk_Entrada_has_Categoria_Categoria1_idx` (`Categoria_idClasificacion` ASC) VISIBLE,
  INDEX `fk_Entrada_has_Categoria_Entrada1_idx` (`Entrada_idEntrada` ASC) VISIBLE,
  CONSTRAINT `fk_Entrada_has_Categoria_Entrada1`
    FOREIGN KEY (`Entrada_idEntrada`)
    REFERENCES `mydb`.`Entrada` (`idEntrada`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Entrada_has_Categoria_Categoria1`
    FOREIGN KEY (`Categoria_idClasificacion`)
    REFERENCES `mydb`.`Categoria` (`idClasificacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Usuario_has_Entrada`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Usuario_has_Entrada` (
  `Usuario_idUsuario` INT NOT NULL,
  `Entrada_idEntrada` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`Usuario_idUsuario`, `Entrada_idEntrada`),
  INDEX `fk_Usuario_has_Entrada_Entrada1_idx` (`Entrada_idEntrada` ASC) VISIBLE,
  INDEX `fk_Usuario_has_Entrada_Usuario1_idx` (`Usuario_idUsuario` ASC) VISIBLE,
  CONSTRAINT `fk_Usuario_has_Entrada_Usuario1`
    FOREIGN KEY (`Usuario_idUsuario`)
    REFERENCES `mydb`.`Usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuario_has_Entrada_Entrada1`
    FOREIGN KEY (`Entrada_idEntrada`)
    REFERENCES `mydb`.`Entrada` (`idEntrada`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
