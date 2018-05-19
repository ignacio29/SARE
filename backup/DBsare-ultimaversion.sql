-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 31, 2017 at 04:51 p.m.
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `DBsare`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `consultHorario` (IN `cedula` VARCHAR(30))  READS SQL DATA
SELECT idhorario,diahorario,horainiciohorario,horasalidahorario FROM tbhorario INNER JOIN tbestudiante ON tbestudiante.idestudiante=tbhorario.idestudiante WHERE tbestudiante.cedulaestudiante=cedula$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteHorario` (IN `id` INT)  MODIFIES SQL DATA
DELETE FROM tbhorario WHERE idhorario=id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertHorario` (IN `idestudiante` BIGINT, IN `dia` TEXT, IN `horaInicio` VARCHAR(10), IN `horaFinal` VARCHAR(10))  NO SQL
INSERT INTO tbhorario (idestudiante,diahorario,horainiciohorario,horasalidahorario) VALUES (idEstudiante,dia,horaInicio,horaFinal)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateHorario` (IN `dia` TEXT, IN `horaInicio` VARCHAR(10), IN `horaFin` VARCHAR(10), IN `id` INT)  MODIFIES SQL DATA
update tbhorario set diahorario=dia, horainiciohorario=horaInicio,horasalidahorario=horaFin where idhorario=id$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbestudiante`
--

CREATE TABLE `tbestudiante` (
  `idestudiante` bigint(11) NOT NULL,
  `cedulaestudiante` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombreestudiante` text COLLATE utf8_spanish_ci NOT NULL,
  `primerapellidoestudiante` text COLLATE utf8_spanish_ci NOT NULL,
  `segundoapellidoestudiante` text COLLATE utf8_spanish_ci NOT NULL,
  `cabinaestudiante` int(11) DEFAULT NULL,
  `contrasenaestudiante` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `carreraestudiante` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `tbestudiante`
--

INSERT INTO `tbestudiante` (`idestudiante`, `cedulaestudiante`, `nombreestudiante`, `primerapellidoestudiante`, `segundoapellidoestudiante`, `cabinaestudiante`, `contrasenaestudiante`, `carreraestudiante`) VALUES
(1, '115700773', 'Berny', 'Garro', 'Duran', 1, '1234', 'Informatica');

-- --------------------------------------------------------

--
-- Table structure for table `tbhorario`
--

CREATE TABLE `tbhorario` (
  `idhorario` bigint(11) NOT NULL,
  `idestudiante` bigint(20) DEFAULT NULL,
  `diahorario` text COLLATE utf8_spanish_ci NOT NULL,
  `horainiciohorario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `horasalidahorario` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `tbhorario`
--

INSERT INTO `tbhorario` (`idhorario`, `idestudiante`, `diahorario`, `horainiciohorario`, `horasalidahorario`) VALUES
(5, 1, 'Jueves', '14am', '14pm'),
(6, 1, 'Lunes', '9am', '6pm'),
(7, 1, 'Miercoles', '8am', '9pm'),
(8, 1, 'Miercoles', '6am', '10am'),
(12, 1, 'Lunes', '11am', '4pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbestudiante`
--
ALTER TABLE `tbestudiante`
  ADD PRIMARY KEY (`idestudiante`);

--
-- Indexes for table `tbhorario`
--
ALTER TABLE `tbhorario`
  ADD PRIMARY KEY (`idhorario`),
  ADD KEY `idestudiante` (`idestudiante`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbestudiante`
--
ALTER TABLE `tbestudiante`
  MODIFY `idestudiante` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbhorario`
--
ALTER TABLE `tbhorario`
  MODIFY `idhorario` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbhorario`
--
ALTER TABLE `tbhorario`
  ADD CONSTRAINT `tbhorario_ibfk_1` FOREIGN KEY (`idestudiante`) REFERENCES `tbestudiante` (`idestudiante`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
