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
-- Table `mydb`.`Persona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Persona` (
  `idPersona` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NULL,
  `Apellidos` VARCHAR(45) NULL,
  `correo` VARCHAR(45) NULL,
  `contraseña` VARCHAR(45) NULL,
  `telefono` VARCHAR(45) NULL,
  PRIMARY KEY (`idPersona`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Usuario` (
  `Saldo` FLOAT NULL,
  `Persona_idPersona` INT NOT NULL,
  PRIMARY KEY (`Persona_idPersona`),
  CONSTRAINT `fk_Usuario_Persona1`
    FOREIGN KEY (`Persona_idPersona`)
    REFERENCES `mydb`.`Persona` (`idPersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Catalogo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Catalogo` (
  `idCatalogo` INT NOT NULL AUTO_INCREMENT,
  `Categoria` VARCHAR(45) NULL,
  `Stock` TINYINT NULL,
  `Unidades` INT NULL,
  PRIMARY KEY (`idCatalogo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Producto` (
  `idProducto` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NULL,
  `Descripcion` VARCHAR(45) NULL,
  `Precio` FLOAT NULL,
  `TiempoPreparacion` INT NULL,
  `Catalogo_idCatalogo` INT NOT NULL,
  PRIMARY KEY (`idProducto`),
  INDEX `fk_Producto_Catalogo1_idx` (`Catalogo_idCatalogo` ASC) VISIBLE,
  CONSTRAINT `fk_Producto_Catalogo1`
    FOREIGN KEY (`Catalogo_idCatalogo`)
    REFERENCES `mydb`.`Catalogo` (`idCatalogo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Pedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Pedido` (
  `idHistorialPedido` INT NOT NULL AUTO_INCREMENT,
  `Fecha` VARCHAR(45) NULL,
  `Total` FLOAT NULL,
  `Estado` TINYINT NULL,
  `Cantidad` INT NULL,
  `idPersona` INT NOT NULL,
  `Producto_idProducto` INT NOT NULL,
  PRIMARY KEY (`idHistorialPedido`, `idPersona`, `Producto_idProducto`),
  INDEX `fk_Pedido_Usuario1_idx` (`idPersona` ASC) VISIBLE,
  INDEX `fk_Pedido_Producto1_idx` (`Producto_idProducto` ASC) VISIBLE,
  CONSTRAINT `fk_Pedido_Usuario1`
    FOREIGN KEY (`idPersona`)
    REFERENCES `mydb`.`Usuario` (`Persona_idPersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Pedido_Producto1`
    FOREIGN KEY (`Producto_idProducto`)
    REFERENCES `mydb`.`Producto` (`idProducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
