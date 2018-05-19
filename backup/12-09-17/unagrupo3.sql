-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Servidor: 45.40.164.83
-- Tiempo de generación: 21-09-2017 a las 12:36:01
-- Versión del servidor: 5.5.51
-- Versión de PHP: 5.1.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `unagrupo3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbareaslimpieza`
--

DROP TABLE IF EXISTS `tbareaslimpieza`;
CREATE TABLE IF NOT EXISTS `tbareaslimpieza` (
  `idarea` int(11) NOT NULL AUTO_INCREMENT,
  `nombrearea` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `cuposarea` int(11) NOT NULL,
  PRIMARY KEY (`idarea`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `tbareaslimpieza`
--

INSERT INTO `tbareaslimpieza` VALUES(1, 'cocina', 4);
INSERT INTO `tbareaslimpieza` VALUES(2, 'pasillos', 4);
INSERT INTO `tbareaslimpieza` VALUES(3, 'baños', 4);
INSERT INTO `tbareaslimpieza` VALUES(4, 'jardin', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbestudiante`
--

DROP TABLE IF EXISTS `tbestudiante`;
CREATE TABLE IF NOT EXISTS `tbestudiante` (
  `idestudiante` bigint(11) NOT NULL AUTO_INCREMENT,
  `cedulaestudiante` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombreestudiante` text COLLATE utf8_spanish_ci NOT NULL,
  `primerapellidoestudiante` text COLLATE utf8_spanish_ci NOT NULL,
  `segundoapellidoestudiante` text COLLATE utf8_spanish_ci NOT NULL,
  `cabinaestudiante` int(11) DEFAULT NULL,
  `contrasenaestudiante` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `carreraestudiante` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idestudiante`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `tbestudiante`
--

INSERT INTO `tbestudiante` VALUES(1, '115700773', 'Berny', 'Garro', 'Duran', 1, '1234', 'Informatica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbhorario`
--

DROP TABLE IF EXISTS `tbhorario`;
CREATE TABLE IF NOT EXISTS `tbhorario` (
  `idhorario` bigint(11) NOT NULL AUTO_INCREMENT,
  `idestudiante` bigint(20) DEFAULT NULL,
  `diahorario` text COLLATE utf8_spanish_ci NOT NULL,
  `horainiciohorario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `horasalidahorario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `descripcionhorario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idhorario`),
  KEY `idestudiante` (`idestudiante`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=12 ;

--
-- Volcar la base de datos para la tabla `tbhorario`
--

INSERT INTO `tbhorario` VALUES(5, 1, 'MARTES', 'PM', 'AM', '-');
INSERT INTO `tbhorario` VALUES(6, 1, 'JUEVES', '5PM', '9PM', 'DiseÃ±o de ambientes ultimediales-Wilber Rodriguez');
INSERT INTO `tbhorario` VALUES(7, 1, 'VIERNES', '1PM', '5PM', 'Investigacion de Operaciones-Eithel Trigueros');
INSERT INTO `tbhorario` VALUES(8, 1, 'SABADO', '8AM', '12PM', 'Administracion de Base de Datos-Cristian Herrera');
INSERT INTO `tbhorario` VALUES(9, 1, 'VIERNES', '8AM', '12PM', 'Software Libre-Steven ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbhorariodisponible`
--

DROP TABLE IF EXISTS `tbhorariodisponible`;
CREATE TABLE IF NOT EXISTS `tbhorariodisponible` (
  `idhorariodisponible` int(11) NOT NULL AUTO_INCREMENT,
  `diadisponible` text COLLATE utf8_spanish_ci NOT NULL,
  `jornada` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `cupos` int(11) NOT NULL,
  PRIMARY KEY (`idhorariodisponible`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=19 ;

--
-- Volcar la base de datos para la tabla `tbhorariodisponible`
--

INSERT INTO `tbhorariodisponible` VALUES(1, 'Lunes', 'Mañana', 1, 3);
INSERT INTO `tbhorariodisponible` VALUES(2, 'Lunes', 'Tarde', 1, 4);
INSERT INTO `tbhorariodisponible` VALUES(3, 'Lunes', 'Noche', 1, 4);
INSERT INTO `tbhorariodisponible` VALUES(4, 'Martes', 'Mañana', 1, 4);
INSERT INTO `tbhorariodisponible` VALUES(5, 'Martes', 'Tarde', 1, 4);
INSERT INTO `tbhorariodisponible` VALUES(6, 'Martes', 'Noche', 1, 4);
INSERT INTO `tbhorariodisponible` VALUES(7, 'Miercoles', 'Mañana', 1, 4);
INSERT INTO `tbhorariodisponible` VALUES(8, 'Miercoles', 'Tarde', 1, 4);
INSERT INTO `tbhorariodisponible` VALUES(9, 'Miercoles', 'Noche', 1, 4);
INSERT INTO `tbhorariodisponible` VALUES(10, 'Jueves', 'Mañana', 1, 4);
INSERT INTO `tbhorariodisponible` VALUES(11, 'Jueves', 'Tarde', 1, 4);
INSERT INTO `tbhorariodisponible` VALUES(12, 'Jueves', 'Noche', 1, 4);
INSERT INTO `tbhorariodisponible` VALUES(13, 'Viernes', 'Mañana', 1, 4);
INSERT INTO `tbhorariodisponible` VALUES(14, 'Viernes', 'Tarde', 1, 4);
INSERT INTO `tbhorariodisponible` VALUES(15, 'Viernes', 'Noche', 1, 4);
INSERT INTO `tbhorariodisponible` VALUES(16, 'Sabado', 'Mañana', 1, 4);
INSERT INTO `tbhorariodisponible` VALUES(17, 'Sabado', 'Tarde', 1, 4);
INSERT INTO `tbhorariodisponible` VALUES(18, 'Sabado', 'Noche', 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbhorariolimpieza`
--

DROP TABLE IF EXISTS `tbhorariolimpieza`;
CREATE TABLE IF NOT EXISTS `tbhorariolimpieza` (
  `idhorariolimpieza` int(11) NOT NULL AUTO_INCREMENT,
  `idestudiante` bigint(11) NOT NULL,
  `idarealimpieza` int(11) NOT NULL,
  `idhorariodisponible` int(11) NOT NULL,
  PRIMARY KEY (`idhorariolimpieza`),
  KEY `idestudiante` (`idestudiante`),
  KEY `idarealimpieza` (`idarealimpieza`),
  KEY `idhorariodisponible` (`idhorariodisponible`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=8 ;

--
-- Volcar la base de datos para la tabla `tbhorariolimpieza`
--

INSERT INTO `tbhorariolimpieza` VALUES(4, 1, 1, 1);
INSERT INTO `tbhorariolimpieza` VALUES(5, 1, 1, 1);
INSERT INTO `tbhorariolimpieza` VALUES(6, 1, 1, 1);
INSERT INTO `tbhorariolimpieza` VALUES(7, 1, 1, 1);

--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `tbhorario`
--
ALTER TABLE `tbhorario`
  ADD CONSTRAINT `tbhorario_ibfk_1` FOREIGN KEY (`idestudiante`) REFERENCES `tbestudiante` (`idestudiante`);

--
-- Filtros para la tabla `tbhorariolimpieza`
--
ALTER TABLE `tbhorariolimpieza`
  ADD CONSTRAINT `tbhorariolimpieza_ibfk_1` FOREIGN KEY (`idestudiante`) REFERENCES `tbestudiante` (`idestudiante`),
  ADD CONSTRAINT `tbhorariolimpieza_ibfk_2` FOREIGN KEY (`idarealimpieza`) REFERENCES `tbareaslimpieza` (`idarea`),
  ADD CONSTRAINT `tbhorariolimpieza_ibfk_3` FOREIGN KEY (`idhorariodisponible`) REFERENCES `tbhorariodisponible` (`idhorariodisponible`);

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `consultarEstudiante`$$
CREATE DEFINER=`unagrupo3`@`%` PROCEDURE `consultarEstudiante`(IN `idEstudiante` INT(10))
    READS SQL DATA
SELECT cedulaestudiante FROM tbestudiante WHERE idestudiante=idEstudiante$$

DROP PROCEDURE IF EXISTS `consultHorario`$$
CREATE DEFINER=`unagrupo3`@`%` PROCEDURE `consultHorario`(IN `cedula` VARCHAR(30))
    READS SQL DATA
SELECT idhorario,diahorario,horainiciohorario,horasalidahorario,descripcionhorario FROM tbhorario INNER JOIN tbestudiante ON tbestudiante.idestudiante=tbhorario.idestudiante WHERE tbestudiante.cedulaestudiante=cedula$$

DROP PROCEDURE IF EXISTS `deleteHorario`$$
CREATE DEFINER=`unagrupo3`@`%` PROCEDURE `deleteHorario`(IN `id` INT)
    MODIFIES SQL DATA
DELETE FROM tbhorario WHERE idhorario=id$$

DROP PROCEDURE IF EXISTS `insertHorario`$$
CREATE DEFINER=`unagrupo3`@`%` PROCEDURE `insertHorario`(IN `idestudiante` BIGINT, IN `dia` TEXT, IN `horaInicio` VARCHAR(10), IN `horaFinal` VARCHAR(10), IN `descripcion` VARCHAR(100))
    NO SQL
INSERT INTO tbhorario(idestudiante,diahorario,horainiciohorario,horasalidahorario,descripcionhorario) VALUES (idEstudiante,dia,horaInicio,horaFinal,descripcion)$$

DROP PROCEDURE IF EXISTS `updateHorario`$$
CREATE DEFINER=`unagrupo3`@`%` PROCEDURE `updateHorario`(IN `dia` TEXT, IN `horaInicio` VARCHAR(10), IN `horaFin` VARCHAR(10), IN `id` INT, IN `descripcion` VARCHAR(100))
    MODIFIES SQL DATA
update tbhorario set diahorario=dia, horainiciohorario=horaInicio,horasalidahorario=horaFin,descripcionhorario=descripcion where idhorario=id$$

DROP PROCEDURE IF EXISTS `verificarHorarioEstudiante`$$
CREATE DEFINER=`unagrupo3`@`%` PROCEDURE `verificarHorarioEstudiante`(IN `cedula` VARCHAR(50), IN `dia` VARCHAR(50), IN `horaInicio` VARCHAR(50), IN `horaSalida` VARCHAR(50))
    READS SQL DATA
SELECT * FROM tbhorario INNER JOIN tbestudiante on tbhorario.idestudiante=tbestudiante.idestudiante
WHERE tbestudiante.cedulaestudiante= cedula AND tbhorario.diahorario=dia AND
tbhorario.horainiciohorario=horaInicio AND tbhorario.horasalidahorario=horaSalida$$

DELIMITER ;
