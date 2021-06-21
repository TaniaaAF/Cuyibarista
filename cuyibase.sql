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
  `idPersona` INT NULL AUTO_INCREMENT,
  `tipousuario` INT NULL,
  `Nombre` VARCHAR(45) NULL,
  `Apellidos` VARCHAR(45) NULL,
  `correo` VARCHAR(45) NULL,
  `contraseña` VARCHAR(45) NULL,
  `telefono` VARCHAR(45) NULL,
  PRIMARY KEY (`idPersona`))
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
  `Catalogo` VARCHAR(45) NULL,
  `Unidades` INT NULL,
  PRIMARY KEY (`idProducto`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`DetalleOrden`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`DetalleOrden` (
  `idDetalleOrden` INT NOT NULL AUTO_INCREMENT,
  `cantidad` INT NULL,
  `precio` FLOAT NULL,
  `subtotal` FLOAT NULL,
  `Producto_idProducto` INT NOT NULL,
  PRIMARY KEY (`idDetalleOrden`, `Producto_idProducto`),
  INDEX `fk_DetalleOrden_Producto1_idx` (`Producto_idProducto` ASC) ,
  CONSTRAINT `fk_DetalleOrden_Producto1`
    FOREIGN KEY (`Producto_idProducto`)
    REFERENCES `mydb`.`Producto` (`idProducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Orden`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Orden` (
  `idOrden` INT NULL AUTO_INCREMENT,
  `Persona_idPersona` INT NOT NULL,
  `Fecha` VARCHAR(45) NULL,
  `Estado` TINYINT NULL,
  `DetalleOrden_idDetalleOrden` INT NOT NULL,
  PRIMARY KEY (`idOrden`, `Persona_idPersona`, `DetalleOrden_idDetalleOrden`),
  INDEX `fk_HistorialPedido_Persona_idx` (`Persona_idPersona` ASC) ,
  INDEX `fk_Orden_DetalleOrden1_idx` (`DetalleOrden_idDetalleOrden` ASC) ,
  CONSTRAINT `fk_HistorialPedido_Persona`
    FOREIGN KEY (`Persona_idPersona`)
    REFERENCES `mydb`.`Persona` (`idPersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Orden_DetalleOrden1`
    FOREIGN KEY (`DetalleOrden_idDetalleOrden`)
    REFERENCES `mydb`.`DetalleOrden` (`idDetalleOrden`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
