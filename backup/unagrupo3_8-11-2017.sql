-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2017 a las 04:22:44
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `unagrupo3`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `autenticarCuenta` (IN `usuario` VARCHAR(100), IN `contrasena` VARCHAR(100))  READS SQL DATA
SELECT * FROM tblogin WHERE userlogin=usuario AND passwordlogin=contrasena$$

CREATE DEFINER=`unagrupo3`@`%` PROCEDURE `consultarEstudiante` (IN `idEstudiante` INT(10))  READS SQL DATA
SELECT cedulaestudiante FROM tbestudiante WHERE idestudiante=idEstudiante$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultarEstudianteLogin` (IN `idLogin` INT)  READS SQL DATA
SELECT * FROM tbestudiante WHERE loginestudiante=idLogin$$

CREATE DEFINER=`unagrupo3`@`%` PROCEDURE `consultHorario` (IN `cedula` VARCHAR(30))  READS SQL DATA
SELECT idhorario,diahorario,horainiciohorario,horasalidahorario,descripcionhorario FROM tbhorario INNER JOIN tbestudiante ON tbestudiante.idestudiante=tbhorario.idestudiante WHERE tbestudiante.cedulaestudiante=cedula$$

CREATE DEFINER=`unagrupo3`@`%` PROCEDURE `deleteHorario` (IN `id` INT)  MODIFIES SQL DATA
DELETE FROM tbhorario WHERE idhorario=id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertEstudiante` (IN `nombreE` VARCHAR(50), IN `primerApe` VARCHAR(50), IN `segundoApe` VARCHAR(50), IN `cedulaE` VARCHAR(50), IN `cabinaE` INT(50), IN `carreraE` VARCHAR(50), IN `logE` INT, IN `confCuen` TINYINT, IN `confHora` TINYINT)  NO SQL
INSERT INTO tbestudiante(cedulaestudiante,nombreestudiante,primerapellidoestudiante,segundoapellidoestudiante,	cabinaestudiante,carreraestudiante,	loginestudiante,confirmacuetaestudiante,confirmahorarioestudiante) VALUES (cedulaE,nombreE,primerApe,segundoApe,cabinaE,carreraE,logE,confCuen,confHora)$$

CREATE DEFINER=`unagrupo3`@`%` PROCEDURE `insertHorario` (IN `idestudiante` BIGINT, IN `dia` TEXT, IN `horaInicio` VARCHAR(10), IN `horaFinal` VARCHAR(10), IN `descripcion` VARCHAR(100))  NO SQL
INSERT INTO tbhorario(idestudiante,diahorario,horainiciohorario,horasalidahorario,descripcionhorario) VALUES (idEstudiante,dia,horaInicio,horaFinal,descripcion)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertLogin` (IN `usuario` VARCHAR(100), IN `contrasena` VARCHAR(100), IN `rol` VARCHAR(30))  MODIFIES SQL DATA
INSERT INTO tblogin (userlogin,passwordlogin,rollogin) VALUES(usuario,contrasena,rol)$$

CREATE DEFINER=`unagrupo3`@`%` PROCEDURE `updateHorario` (IN `dia` TEXT, IN `horaInicio` VARCHAR(10), IN `horaFin` VARCHAR(10), IN `id` INT, IN `descripcion` VARCHAR(100))  MODIFIES SQL DATA
update tbhorario set diahorario=dia, horainiciohorario=horaInicio,horasalidahorario=horaFin,descripcionhorario=descripcion where idhorario=id$$

CREATE DEFINER=`unagrupo3`@`%` PROCEDURE `verificarHorarioEstudiante` (IN `cedula` VARCHAR(50), IN `dia` VARCHAR(50), IN `horaInicio` VARCHAR(50), IN `horaSalida` VARCHAR(50))  READS SQL DATA
SELECT * FROM tbhorario INNER JOIN tbestudiante on tbhorario.idestudiante=tbestudiante.idestudiante
WHERE tbestudiante.cedulaestudiante= cedula AND tbhorario.diahorario=dia AND
tbhorario.horainiciohorario=horaInicio AND tbhorario.horasalidahorario=horaSalida$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbareaslimpieza`
--

CREATE TABLE `tbareaslimpieza` (
  `idarea` int(11) NOT NULL,
  `nombrearea` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `cuposarea` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbareaslimpieza`
--

INSERT INTO `tbareaslimpieza` (`idarea`, `nombrearea`, `cuposarea`) VALUES
(1, 'cocina', 4),
(2, 'pasillos', 4),
(3, 'baños', 4),
(4, 'jardin', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbestudiante`
--

CREATE TABLE `tbestudiante` (
  `idestudiante` bigint(11) NOT NULL,
  `cedulaestudiante` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombreestudiante` text COLLATE utf8_spanish_ci NOT NULL,
  `primerapellidoestudiante` text COLLATE utf8_spanish_ci NOT NULL,
  `segundoapellidoestudiante` text COLLATE utf8_spanish_ci NOT NULL,
  `cabinaestudiante` int(11) DEFAULT NULL,
  `contrasenaestudiante` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `carreraestudiante` text COLLATE utf8_spanish_ci NOT NULL,
  `loginestudiante` int(11) NOT NULL,
  `confirmacuetaestudiante` tinyint(1) NOT NULL,
  `confirmahorarioestudiante` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbestudiante`
--

INSERT INTO `tbestudiante` (`idestudiante`, `cedulaestudiante`, `nombreestudiante`, `primerapellidoestudiante`, `segundoapellidoestudiante`, `cabinaestudiante`, `contrasenaestudiante`, `carreraestudiante`, `loginestudiante`, `confirmacuetaestudiante`, `confirmahorarioestudiante`) VALUES
(1, '115700773', 'Berny', 'Garro', 'Duran', 1, '1234', 'Informatica', 1, 0, 0),
(3, '702430805', 'steven', 'Cespedes', 'quiros', 12, '', 'ing en sistemas', 2, 0, 0),
(35, '7777777777', 'yyyyyyyy', 'xxxxxxxxxxxx', 'zzzzzzzzzz', 12, '', 'Administracion de oficinas', 34, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbhorario`
--

CREATE TABLE `tbhorario` (
  `idhorario` bigint(11) NOT NULL,
  `idestudiante` bigint(20) DEFAULT NULL,
  `diahorario` text COLLATE utf8_spanish_ci NOT NULL,
  `horainiciohorario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `horasalidahorario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `descripcionhorario` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbhorario`
--

INSERT INTO `tbhorario` (`idhorario`, `idestudiante`, `diahorario`, `horainiciohorario`, `horasalidahorario`, `descripcionhorario`) VALUES
(5, 1, 'MARTES', 'PM', 'AM', '-'),
(6, 1, 'JUEVES', '5PM', '9PM', 'DiseÃ±o de ambientes ultimediales-Wilber Rodriguez'),
(7, 1, 'VIERNES', '1PM', '5PM', 'Investigacion de Operaciones-Eithel Trigueros'),
(8, 1, 'SABADO', '8AM', '12PM', 'Administracion de Base de Datos-Cristian Herrera'),
(9, 1, 'VIERNES', '8AM', '12PM', 'Software Libre-Steven ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbhorariodisponible`
--

CREATE TABLE `tbhorariodisponible` (
  `idhorariodisponible` int(11) NOT NULL,
  `diadisponible` text COLLATE utf8_spanish_ci NOT NULL,
  `jornada` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `cupos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbhorariodisponible`
--

INSERT INTO `tbhorariodisponible` (`idhorariodisponible`, `diadisponible`, `jornada`, `estado`, `cupos`) VALUES
(1, 'Lunes', 'Mañana', 1, 3),
(2, 'Lunes', 'Tarde', 1, 4),
(3, 'Lunes', 'Noche', 1, 4),
(4, 'Martes', 'Mañana', 1, 4),
(5, 'Martes', 'Tarde', 1, 4),
(6, 'Martes', 'Noche', 1, 4),
(7, 'Miercoles', 'Mañana', 1, 4),
(8, 'Miercoles', 'Tarde', 1, 4),
(9, 'Miercoles', 'Noche', 1, 4),
(10, 'Jueves', 'Mañana', 1, 4),
(11, 'Jueves', 'Tarde', 1, 4),
(12, 'Jueves', 'Noche', 1, 4),
(13, 'Viernes', 'Mañana', 1, 4),
(14, 'Viernes', 'Tarde', 1, 4),
(15, 'Viernes', 'Noche', 1, 4),
(16, 'Sabado', 'Mañana', 1, 4),
(17, 'Sabado', 'Tarde', 1, 4),
(18, 'Sabado', 'Noche', 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbhorariolimpieza`
--

CREATE TABLE `tbhorariolimpieza` (
  `idhorariolimpieza` int(11) NOT NULL,
  `idestudiante` bigint(11) NOT NULL,
  `idarealimpieza` int(11) NOT NULL,
  `idhorariodisponible` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbhorariolimpieza`
--

INSERT INTO `tbhorariolimpieza` (`idhorariolimpieza`, `idestudiante`, `idarealimpieza`, `idhorariodisponible`) VALUES
(4, 1, 1, 1),
(5, 1, 1, 1),
(6, 1, 1, 1),
(7, 1, 1, 1),
(8, 1, 1, 1),
(9, 1, 1, 1),
(10, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblogin`
--

CREATE TABLE `tblogin` (
  `idlogin` int(11) NOT NULL,
  `userlogin` varchar(100) NOT NULL,
  `passwordlogin` varchar(100) NOT NULL,
  `rollogin` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblogin`
--

INSERT INTO `tblogin` (`idlogin`, `userlogin`, `passwordlogin`, `rollogin`) VALUES
(1, 'cualquiecosa@gmail.com', '12345', 'estudiante'),
(2, 'stevencespedes6@gmail.com', '1111', 'estudiante'),
(34, 'hgfh@ghjgjh', '1111', 'estudiante');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbareaslimpieza`
--
ALTER TABLE `tbareaslimpieza`
  ADD PRIMARY KEY (`idarea`);

--
-- Indices de la tabla `tbestudiante`
--
ALTER TABLE `tbestudiante`
  ADD PRIMARY KEY (`idestudiante`),
  ADD KEY `loginestudiante` (`loginestudiante`);

--
-- Indices de la tabla `tbhorario`
--
ALTER TABLE `tbhorario`
  ADD PRIMARY KEY (`idhorario`),
  ADD KEY `idestudiante` (`idestudiante`);

--
-- Indices de la tabla `tbhorariodisponible`
--
ALTER TABLE `tbhorariodisponible`
  ADD PRIMARY KEY (`idhorariodisponible`);

--
-- Indices de la tabla `tbhorariolimpieza`
--
ALTER TABLE `tbhorariolimpieza`
  ADD PRIMARY KEY (`idhorariolimpieza`),
  ADD KEY `idestudiante` (`idestudiante`),
  ADD KEY `idarealimpieza` (`idarealimpieza`),
  ADD KEY `idhorariodisponible` (`idhorariodisponible`);

--
-- Indices de la tabla `tblogin`
--
ALTER TABLE `tblogin`
  ADD PRIMARY KEY (`idlogin`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbareaslimpieza`
--
ALTER TABLE `tbareaslimpieza`
  MODIFY `idarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tbestudiante`
--
ALTER TABLE `tbestudiante`
  MODIFY `idestudiante` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT de la tabla `tbhorario`
--
ALTER TABLE `tbhorario`
  MODIFY `idhorario` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `tbhorariodisponible`
--
ALTER TABLE `tbhorariodisponible`
  MODIFY `idhorariodisponible` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `tbhorariolimpieza`
--
ALTER TABLE `tbhorariolimpieza`
  MODIFY `idhorariolimpieza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `tblogin`
--
ALTER TABLE `tblogin`
  MODIFY `idlogin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbestudiante`
--
ALTER TABLE `tbestudiante`
  ADD CONSTRAINT `tbestudiante_ibfk_1` FOREIGN KEY (`loginestudiante`) REFERENCES `tblogin` (`idlogin`) ON DELETE CASCADE ON UPDATE CASCADE;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
