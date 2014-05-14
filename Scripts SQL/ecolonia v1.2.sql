SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema ecolonia
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `ecolonia` ;
CREATE SCHEMA IF NOT EXISTS `ecolonia` DEFAULT CHARACTER SET utf8 ;
USE `ecolonia` ;

-- -----------------------------------------------------
-- Table `ecolonia`.`estado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecolonia`.`estado` ;

CREATE TABLE IF NOT EXISTS `ecolonia`.`estado` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(30) NOT NULL DEFAULT 'NombreEstado',
  PRIMARY KEY (`Id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecolonia`.`municipio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecolonia`.`municipio` ;

CREATE TABLE IF NOT EXISTS `ecolonia`.`municipio` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Estado` INT(11) NOT NULL,
  `Nombre` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`Id`),
  INDEX `FK_municipi_estado` (`Estado` ASC),
  CONSTRAINT `FK_municipi_estado`
    FOREIGN KEY (`Estado`)
    REFERENCES `ecolonia`.`estado` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecolonia`.`colonia`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecolonia`.`colonia` ;

CREATE TABLE IF NOT EXISTS `ecolonia`.`colonia` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Municipio` INT(11) NOT NULL,
  `FechaFun` DATETIME NOT NULL,
  `NumeroHabitantes` INT(11) NOT NULL DEFAULT '0',
  `Nombre` VARCHAR(30) NOT NULL DEFAULT 'Nombre',
  `Ubicacion` VARCHAR(100) NOT NULL DEFAULT 'Ubicacion',
  `Diagnostico_inicial` TEXT NOT NULL,
  `Extension_Geografica` VARCHAR(20) NOT NULL,
  `Croquis` TEXT NOT NULL,
  PRIMARY KEY (`Id`),
  INDEX `FK_colonia_municipio` (`Municipio` ASC),
  CONSTRAINT `FK_colonia_municipio`
    FOREIGN KEY (`Municipio`)
    REFERENCES `ecolonia`.`municipio` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecolonia`.`catalogocalle`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecolonia`.`catalogocalle` ;

CREATE TABLE IF NOT EXISTS `ecolonia`.`catalogocalle` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(30) NOT NULL,
  `Colonia` INT(11) NOT NULL,
  PRIMARY KEY (`Id`),
  INDEX `FK_catalogocalle_colonia` (`Colonia` ASC),
  CONSTRAINT `FK_catalogocalle_colonia`
    FOREIGN KEY (`Colonia`)
    REFERENCES `ecolonia`.`colonia` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecolonia`.`casa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecolonia`.`casa` ;

CREATE TABLE IF NOT EXISTS `ecolonia`.`casa` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Calle` INT(11) NOT NULL,
  `Colonia` INT(11) NOT NULL,
  `Familia` VARCHAR(50) NOT NULL,
  `Numero` INT(11) NOT NULL,
  `Tel_Casa` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`Id`),
  INDEX `FK_casa_colonia` (`Colonia` ASC),
  INDEX `FK_casa_calle` (`Calle` ASC),
  CONSTRAINT `FK_casa_colonia`
    FOREIGN KEY (`Colonia`)
    REFERENCES `ecolonia`.`colonia` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `FK_casa_calle`
    FOREIGN KEY (`Calle`)
    REFERENCES `ecolonia`.`catalogocalle` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecolonia`.`colono`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecolonia`.`colono` ;

CREATE TABLE IF NOT EXISTS `ecolonia`.`colono` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Casa` INT(11) NOT NULL,
  `ApellidoPaterno` VARCHAR(30) NOT NULL,
  `ApellidoMaterno` VARCHAR(30) NOT NULL,
  `FechaNacimiento` DATETIME NOT NULL,
  `Estatura` DOUBLE NOT NULL,
  `Nombre` VARCHAR(30) NOT NULL,
  `Ocupacion` INT(11) NOT NULL,
  `Peso` FLOAT NOT NULL DEFAULT '0',
  `Email` VARCHAR(50) NOT NULL,
  `Sexo` CHAR(1) NOT NULL,
  `Tel_celular` VARCHAR(12) NOT NULL DEFAULT '000-00-00000',
  PRIMARY KEY (`Id`),
  INDEX `FK_colono_casa` (`Casa` ASC),
  CONSTRAINT `FK_colono_casa`
    FOREIGN KEY (`Casa`)
    REFERENCES `ecolonia`.`casa` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecolonia`.`comitedebarrio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecolonia`.`comitedebarrio` ;

CREATE TABLE IF NOT EXISTS `ecolonia`.`comitedebarrio` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Colonia` INT(11) NOT NULL,
  `FechaFundacion` DATE NOT NULL,
  `Nombre` VARCHAR(30) NOT NULL,
  `Numero_Integrantes` INT(11) NOT NULL DEFAULT '0',
  `FechaTerminacion` DATE NOT NULL,
  PRIMARY KEY (`Id`),
  INDEX `FK_ComiteDeBarrio_Colonia` (`Colonia` ASC),
  CONSTRAINT `FK_ComiteDeBarrio_Colonia`
    FOREIGN KEY (`Colonia`)
    REFERENCES `ecolonia`.`colonia` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecolonia`.`catalogocalle_has_colono`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecolonia`.`catalogocalle_has_colono` ;

CREATE TABLE IF NOT EXISTS `ecolonia`.`catalogocalle_has_colono` (
  `catalogocalle_Id` INT(11) NOT NULL,
  `colono_Id` INT(11) NOT NULL,
  `comitedebarrio_Id` INT(11) NOT NULL,
  `FechaNombramiento` DATE NOT NULL,
  `FechaSalida` DATE NOT NULL,
  PRIMARY KEY (`catalogocalle_Id`, `colono_Id`, `comitedebarrio_Id`),
  INDEX `colono_idx` (`colono_Id` ASC),
  INDEX `comite_barrio_idx` (`comitedebarrio_Id` ASC),
  CONSTRAINT `calle_colono`
    FOREIGN KEY (`catalogocalle_Id`)
    REFERENCES `ecolonia`.`catalogocalle` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `colono_calle`
    FOREIGN KEY (`colono_Id`)
    REFERENCES `ecolonia`.`colono` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `comite_barrio_calle_colono`
    FOREIGN KEY (`comitedebarrio_Id`)
    REFERENCES `ecolonia`.`comitedebarrio` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecolonia`.`catalogoocupaciones`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecolonia`.`catalogoocupaciones` ;

CREATE TABLE IF NOT EXISTS `ecolonia`.`catalogoocupaciones` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(40) NOT NULL,
  PRIMARY KEY (`Id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecolonia`.`catalogorolesfamiliares`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecolonia`.`catalogorolesfamiliares` ;

CREATE TABLE IF NOT EXISTS `ecolonia`.`catalogorolesfamiliares` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Rol` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`Id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecolonia`.`catalogorolesfamiliares_has_colono`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecolonia`.`catalogorolesfamiliares_has_colono` ;

CREATE TABLE IF NOT EXISTS `ecolonia`.`catalogorolesfamiliares_has_colono` (
  `catalogorolesfamiliares_Id` INT(11) NOT NULL,
  `colono_Id` INT(11) NOT NULL,
  PRIMARY KEY (`catalogorolesfamiliares_Id`, `colono_Id`),
  INDEX `colono_idx` (`colono_Id` ASC),
  CONSTRAINT `familiares_colono`
    FOREIGN KEY (`catalogorolesfamiliares_Id`)
    REFERENCES `ecolonia`.`catalogorolesfamiliares` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `colono_familiares`
    FOREIGN KEY (`colono_Id`)
    REFERENCES `ecolonia`.`colono` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecolonia`.`colono_has_catalogoocupaciones`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecolonia`.`colono_has_catalogoocupaciones` ;

CREATE TABLE IF NOT EXISTS `ecolonia`.`colono_has_catalogoocupaciones` (
  `colono_Id` INT(11) NOT NULL,
  `catalogoocupaciones_Id` INT(11) NOT NULL,
  PRIMARY KEY (`colono_Id`, `catalogoocupaciones_Id`),
  INDEX `ocupaciones_idx` (`catalogoocupaciones_Id` ASC),
  CONSTRAINT `colono`
    FOREIGN KEY (`colono_Id`)
    REFERENCES `ecolonia`.`colono` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `ocupaciones`
    FOREIGN KEY (`catalogoocupaciones_Id`)
    REFERENCES `ecolonia`.`catalogoocupaciones` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecolonia`.`comitedebarrio_has_colono`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecolonia`.`comitedebarrio_has_colono` ;

CREATE TABLE IF NOT EXISTS `ecolonia`.`comitedebarrio_has_colono` (
  `comitedebarrio_Id` INT(11) NOT NULL,
  `colono_Id` INT(11) NOT NULL,
  `Puesto` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`comitedebarrio_Id`, `colono_Id`),
  INDEX `colono_idx` (`colono_Id` ASC),
  CONSTRAINT `comite_barrio`
    FOREIGN KEY (`comitedebarrio_Id`)
    REFERENCES `ecolonia`.`comitedebarrio` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `colono_comite_de_barrio`
    FOREIGN KEY (`colono_Id`)
    REFERENCES `ecolonia`.`colono` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecolonia`.`negocios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecolonia`.`negocios` ;

CREATE TABLE IF NOT EXISTS `ecolonia`.`negocios` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE INDEX `Id_UNIQUE` (`Id` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecolonia`.`negocios_has_colono`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecolonia`.`negocios_has_colono` ;

CREATE TABLE IF NOT EXISTS `ecolonia`.`negocios_has_colono` (
  `Negocios_Id` INT(11) NOT NULL,
  `colono_Id` INT(11) NOT NULL,
  PRIMARY KEY (`Negocios_Id`, `colono_Id`),
  INDEX `colono_idx` (`colono_Id` ASC),
  CONSTRAINT `negocios`
    FOREIGN KEY (`Negocios_Id`)
    REFERENCES `ecolonia`.`negocios` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `colono_negocios`
    FOREIGN KEY (`colono_Id`)
    REFERENCES `ecolonia`.`colono` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
