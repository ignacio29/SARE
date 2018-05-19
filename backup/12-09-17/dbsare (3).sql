-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-09-2017 a las 07:23:50
-- Versión del servidor: 5.5.36
-- Versión de PHP: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `dbsare`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `consultarEstudiante`(IN `idEstudiante` INT(10))
    READS SQL DATA
SELECT cedulaestudiante FROM tbestudiante WHERE idestudiante=idEstudiante$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultHorario`(IN `cedula` VARCHAR(30))
    READS SQL DATA
SELECT idhorario,diahorario,horainiciohorario,horasalidahorario,descripcionhorario FROM tbhorario INNER JOIN tbestudiante ON tbestudiante.idestudiante=tbhorario.idestudiante WHERE tbestudiante.cedulaestudiante=cedula$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteHorario`(IN `id` INT)
    MODIFIES SQL DATA
DELETE FROM tbhorario WHERE idhorario=id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertHorario`(IN `idestudiante` BIGINT, IN `dia` TEXT, IN `horaInicio` VARCHAR(10), IN `horaFinal` VARCHAR(10), IN `descripcion` VARCHAR(100))
    NO SQL
INSERT INTO tbhorario(idestudiante,diahorario,horainiciohorario,horasalidahorario,descripcionhorario) VALUES (idEstudiante,dia,horaInicio,horaFinal,descripcion)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateHorario`(IN `dia` TEXT, IN `horaInicio` VARCHAR(10), IN `horaFin` VARCHAR(10), IN `id` INT, IN `descripcion` VARCHAR(100))
    MODIFIES SQL DATA
update tbhorario set diahorario=dia, horainiciohorario=horaInicio,horasalidahorario=horaFin,descripcionhorario=descripcion where idhorario=id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verificarHorarioEstudiante`(IN `cedula` VARCHAR(50), IN `dia` VARCHAR(50), IN `horaInicio` VARCHAR(50), IN `horaSalida` VARCHAR(50))
    READS SQL DATA
SELECT * FROM tbhorario INNER JOIN tbestudiante on tbhorario.idestudiante=tbestudiante.idestudiante
WHERE tbestudiante.cedulaestudiante= cedula AND tbhorario.diahorario=dia AND
tbhorario.horainiciohorario=horaInicio AND tbhorario.horasalidahorario=horaSalida$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbestudiante`
--

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
-- Volcado de datos para la tabla `tbestudiante`
--

INSERT INTO `tbestudiante` (`idestudiante`, `cedulaestudiante`, `nombreestudiante`, `primerapellidoestudiante`, `segundoapellidoestudiante`, `cabinaestudiante`, `contrasenaestudiante`, `carreraestudiante`) VALUES
(1, '1234', 'Berny', 'Garro', 'Duran', 1, '1234', 'Informatica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbhorario`
--

CREATE TABLE IF NOT EXISTS `tbhorario` (
  `idhorario` bigint(11) NOT NULL AUTO_INCREMENT,
  `idestudiante` bigint(20) DEFAULT NULL,
  `diahorario` text COLLATE utf8_spanish_ci NOT NULL,
  `horainiciohorario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `horasalidahorario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `descripcionhorario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idhorario`),
  KEY `idestudiante` (`idestudiante`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tbhorario`
--

INSERT INTO `tbhorario` (`idhorario`, `idestudiante`, `diahorario`, `horainiciohorario`, `horasalidahorario`, `descripcionhorario`) VALUES
(1, 1, 'LUNES', '4PM', '6PM', ''),
(2, 1, 'Martes', '2pm', '5pm', 'tareas');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbhorario`
--
ALTER TABLE `tbhorario`
  ADD CONSTRAINT `tbhorario_ibfk_1` FOREIGN KEY (`idestudiante`) REFERENCES `tbestudiante` (`idestudiante`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
