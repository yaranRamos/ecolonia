-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-05-2014 a las 23:28:15
-- Versión del servidor: 5.6.14
-- Versión de PHP: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ecolonia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casa`
--

CREATE TABLE IF NOT EXISTS `casa` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Calle` int(11) NOT NULL,
  `Colonia` int(11) NOT NULL,
  `Familia` varchar(50) NOT NULL,
  `Numero` int(11) NOT NULL,
  `Tel_Casa` varchar(30) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_casa_colonia` (`Colonia`),
  KEY `FK_casa_calle` (`Calle`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogocalle`
--

CREATE TABLE IF NOT EXISTS `catalogocalle` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL,
  `Colonia` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_catalogocalle_colonia` (`Colonia`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogocalle_has_colono`
--

CREATE TABLE IF NOT EXISTS `catalogocalle_has_colono` (
  `catalogocalle_Id` int(11) NOT NULL,
  `colono_Id` int(11) NOT NULL,
  `comitedebarrio_Id` int(11) NOT NULL,
  `FechaNombramiento` date NOT NULL,
  `FechaSalida` date NOT NULL,
  PRIMARY KEY (`catalogocalle_Id`,`colono_Id`,`comitedebarrio_Id`),
  KEY `colono_idx` (`colono_Id`),
  KEY `comite_barrio_idx` (`comitedebarrio_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogoocupaciones`
--

CREATE TABLE IF NOT EXISTS `catalogoocupaciones` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(40) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogorolesfamiliares`
--

CREATE TABLE IF NOT EXISTS `catalogorolesfamiliares` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Rol` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogorolesfamiliares_has_colono`
--

CREATE TABLE IF NOT EXISTS `catalogorolesfamiliares_has_colono` (
  `catalogorolesfamiliares_Id` int(11) NOT NULL,
  `colono_Id` int(11) NOT NULL,
  PRIMARY KEY (`catalogorolesfamiliares_Id`,`colono_Id`),
  KEY `colono_idx` (`colono_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colonia`
--

CREATE TABLE IF NOT EXISTS `colonia` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Municipio` int(11) NOT NULL,
  `FechaFun` datetime NOT NULL,
  `NumeroHabitantes` int(11) NOT NULL DEFAULT '0',
  `Nombre` varchar(30) NOT NULL DEFAULT 'Nombre',
  `Ubicacion` varchar(100) NOT NULL DEFAULT 'Ubicacion',
  `Diagnostico_inicial` text NOT NULL,
  `Extension_Geografica` varchar(20) NOT NULL,
  `Croquis` text NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_colonia_municipio` (`Municipio`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colono`
--

CREATE TABLE IF NOT EXISTS `colono` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Casa` int(11) NOT NULL,
  `ApellidoPaterno` varchar(30) NOT NULL,
  `ApellidoMaterno` varchar(30) NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `Estatura` float NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Peso` int(11) NOT NULL DEFAULT '0',
  `Email` varchar(50) NOT NULL,
  `Sexo` char(1) NOT NULL,
  `Tel_celular` varchar(12) NOT NULL DEFAULT '000-00-00000',
  PRIMARY KEY (`Id`),
  KEY `FK_colono_casa` (`Casa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colono_has_catalogoocupaciones`
--

CREATE TABLE IF NOT EXISTS `colono_has_catalogoocupaciones` (
  `colono_Id` int(11) NOT NULL,
  `catalogoocupaciones_Id` int(11) NOT NULL,
  PRIMARY KEY (`colono_Id`,`catalogoocupaciones_Id`),
  KEY `ocupaciones_idx` (`catalogoocupaciones_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comitedebarrio`
--

CREATE TABLE IF NOT EXISTS `comitedebarrio` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Colonia` int(11) NOT NULL,
  `FechaFundacion` date NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Numero_Integrantes` int(11) NOT NULL DEFAULT '0',
  `FechaTerminacion` date NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_ComiteDeBarrio_Colonia` (`Colonia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comitedebarrio_has_colono`
--

CREATE TABLE IF NOT EXISTS `comitedebarrio_has_colono` (
  `comitedebarrio_Id` int(11) NOT NULL,
  `colono_Id` int(11) NOT NULL,
  `Puesto` varchar(45) NOT NULL,
  PRIMARY KEY (`comitedebarrio_Id`,`colono_Id`),
  KEY `colono_idx` (`colono_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL DEFAULT 'NombreEstado',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE IF NOT EXISTS `municipio` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Estado` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_municipi_estado` (`Estado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `negocios`
--

CREATE TABLE IF NOT EXISTS `negocios` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Id_UNIQUE` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `negocios_has_colono`
--

CREATE TABLE IF NOT EXISTS `negocios_has_colono` (
  `Negocios_Id` int(11) NOT NULL,
  `colono_Id` int(11) NOT NULL,
  PRIMARY KEY (`Negocios_Id`,`colono_Id`),
  KEY `colono_idx` (`colono_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `casa`
--
ALTER TABLE `casa`
  ADD CONSTRAINT `FK_casa_calle` FOREIGN KEY (`Calle`) REFERENCES `catalogocalle` (`Id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_casa_colonia` FOREIGN KEY (`Colonia`) REFERENCES `colonia` (`Id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `catalogocalle`
--
ALTER TABLE `catalogocalle`
  ADD CONSTRAINT `FK_catalogocalle_colonia` FOREIGN KEY (`Colonia`) REFERENCES `colonia` (`Id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `catalogocalle_has_colono`
--
ALTER TABLE `catalogocalle_has_colono`
  ADD CONSTRAINT `calle_colono` FOREIGN KEY (`catalogocalle_Id`) REFERENCES `catalogocalle` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `colono_calle` FOREIGN KEY (`colono_Id`) REFERENCES `colono` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `comite_barrio_calle_colono` FOREIGN KEY (`comitedebarrio_Id`) REFERENCES `comitedebarrio` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `catalogorolesfamiliares_has_colono`
--
ALTER TABLE `catalogorolesfamiliares_has_colono`
  ADD CONSTRAINT `colono_familiares` FOREIGN KEY (`colono_Id`) REFERENCES `colono` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `familiares_colono` FOREIGN KEY (`catalogorolesfamiliares_Id`) REFERENCES `catalogorolesfamiliares` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `colonia`
--
ALTER TABLE `colonia`
  ADD CONSTRAINT `FK_colonia_municipio` FOREIGN KEY (`Municipio`) REFERENCES `municipio` (`Id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `colono`
--
ALTER TABLE `colono`
  ADD CONSTRAINT `FK_colono_casa` FOREIGN KEY (`Casa`) REFERENCES `casa` (`Id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `colono_has_catalogoocupaciones`
--
ALTER TABLE `colono_has_catalogoocupaciones`
  ADD CONSTRAINT `colono` FOREIGN KEY (`colono_Id`) REFERENCES `colono` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ocupaciones` FOREIGN KEY (`catalogoocupaciones_Id`) REFERENCES `catalogoocupaciones` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `comitedebarrio`
--
ALTER TABLE `comitedebarrio`
  ADD CONSTRAINT `FK_ComiteDeBarrio_Colonia` FOREIGN KEY (`Colonia`) REFERENCES `colonia` (`Id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `comitedebarrio_has_colono`
--
ALTER TABLE `comitedebarrio_has_colono`
  ADD CONSTRAINT `colono_comite_de_barrio` FOREIGN KEY (`colono_Id`) REFERENCES `colono` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `comite_barrio` FOREIGN KEY (`comitedebarrio_Id`) REFERENCES `comitedebarrio` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `FK_municipi_estado` FOREIGN KEY (`Estado`) REFERENCES `estado` (`Id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `negocios_has_colono`
--
ALTER TABLE `negocios_has_colono`
  ADD CONSTRAINT `colono_negocios` FOREIGN KEY (`colono_Id`) REFERENCES `colono` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `negocios` FOREIGN KEY (`Negocios_Id`) REFERENCES `negocios` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
