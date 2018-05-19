-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-04-2018 a las 23:53:55
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarAdministrador` (IN `cedula` VARCHAR(20), IN `nombre` VARCHAR(20), IN `apellidoA` VARCHAR(20), IN `apellidoB` VARCHAR(20))  MODIFIES SQL DATA
UPDATE  tbadministrador set nombreadministrador=nombre,primerapellidoadministrador=apellidoA,segundoapellidoadministrador=apellidoB where cedulaadministrador=cedula$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarAsistenteAdmi` (IN `nombre` VARCHAR(20), IN `primerA` VARCHAR(20), IN `segundoA` VARCHAR(20), IN `sexo` VARCHAR(20), IN `cedula` VARCHAR(20))  MODIFIES SQL DATA
UPDATE tbasistente SET nombreasistente=nombre,primerapellidoasistente=primerA,segundoapellidoasistente=segundoA,sexo=sexo WHERE cedulaasistente=cedula$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarEstudianteAdmi` (IN `cedula` VARCHAR(20), IN `nombre` VARCHAR(20), IN `pApellido` VARCHAR(20), IN `sApellido` VARCHAR(20), IN `sexo` VARCHAR(10), IN `cabina` INT, IN `fecha` INT, IN `carrera` VARCHAR(50), IN `acceso` INT)  READS SQL DATA
UPDATE  tbestudiante SET nombreestudiante=nombre,primerapellidoestudiante=pApellido,segundoapellidoestudiante=sApellido,sexo=sexo,cabinaestudiante=cabina,fechaingreso=fecha,carreraestudiante=carrera,confirmacuetaestudiante=acceso WHERE cedulaestudiante=cedula$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarNoticia` (IN `creador` VARCHAR(100), IN `tema` VARCHAR(100), IN `detalle` TEXT, IN `rutaFoto` VARCHAR(100), IN `id` INT(11))  MODIFIES SQL DATA
UPDATE tbnoticias SET temanoticia =tema, descripcionnoticia=detalle,fotonoticia=rutaFoto WHERE idcreadornoticia=creador AND idnoticia =id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `autenticarCuenta` (IN `usuario` VARCHAR(100), IN `contrasena` VARCHAR(100))  READS SQL DATA
SELECT * FROM tblogin WHERE userlogin=usuario AND passwordlogin=contrasena$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `busquedaAsistente` (IN `recibe` VARCHAR(20))  NO SQL
SELECT* FROM tbasistente WHERE nombreasistente like recibe or primerapellidoasistente LIKE recibe or segundoapellidoasistente like recibe or cedulaasistente like recibe$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `busquedaEstudiante` (IN `recibe` VARCHAR(20))  READS SQL DATA
SELECT* FROM tbestudiante WHERE nombreestudiante like recibe or primerapellidoestudiante LIKE recibe or segundoapellidoestudiante like recibe or cedulaestudiante like recibe$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultarAdministradorLogin` (IN `idLogin` INT)  NO SQL
SELECT * FROM tbadministrador WHERE loginid=idLogin$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultarAsistenteLogin` (IN `idLogin` INT)  NO SQL
SELECT * FROM tbasistente WHERE loginid=idLogin$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultarEstudiante` (IN `idEstudiante` INT(10))  READS SQL DATA
SELECT cedulaestudiante FROM tbestudiante WHERE idestudiante=idEstudiante$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultarEstudianteLogin` (IN `idLogin` INT)  READS SQL DATA
SELECT cedulaestudiante FROM tbestudiante WHERE loginestudiante=idLogin$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultHorario` (IN `cedula` VARCHAR(30))  READS SQL DATA
SELECT idhorario,diahorario,horainiciohorario,horasalidahorario,descripcionhorario FROM tbhorario INNER JOIN tbestudiante ON tbestudiante.idestudiante=tbhorario.idestudiante WHERE tbestudiante.cedulaestudiante=cedula$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteHorario` (IN `id` INT)  MODIFIES SQL DATA
DELETE FROM tbhorario WHERE idhorario=id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `elimarAsistente` (IN `cedula` VARCHAR(50))  MODIFIES SQL DATA
DELETE FROM tbasistente WHERE cedulaasistente=cedula$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `elimarEstudiante` (IN `cedula` VARCHAR(50))  MODIFIES SQL DATA
DELETE FROM tbestudiante WHERE cedulaestudiante=cedula$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarComentariosNoticia` (IN `idnoticia` INT(11))  MODIFIES SQL DATA
DELETE FROM tbcomentarionoticia WHERE idnoticia=idnoticia$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarNoticia` (IN `id` INT(11))  MODIFIES SQL DATA
DELETE FROM tbnoticias WHERE idnoticia=id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getIdConfirmarHorario` (IN `cedula` VARCHAR(100))  READS SQL DATA
SELECT confirmahorarioestudiante FROM tbestudiante WHERE tbestudiante.cedulaestudiante=cedula$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getIdEstudiante` (IN `cedula` VARCHAR(100))  READS SQL DATA
SELECT tbestudiante.idestudiante FROM tbestudiante WHERE tbestudiante.cedulaestudiante=cedula$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getIndiceImagen` (IN `creador` VARCHAR(100))  READS SQL DATA
SELECT * FROM tbnoticias WHERE idcreadornoticia=creador$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarComentario` (IN `idnoticia` INT(11), IN `cedula` VARCHAR(100), IN `comentario` TEXT)  MODIFIES SQL DATA
INSERT INTO tbcomentarionoticia(idnoticia,cedularesponsable,comentario) VALUES(idnoticia,cedula,comentario)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarNoticia` (IN `creador` VARCHAR(100), IN `tema` VARCHAR(100), IN `descripcion` TEXT, IN `rutaFoto` VARCHAR(100), IN `fechaCreacion` DATE)  MODIFIES SQL DATA
INSERT INTO tbnoticias(idcreadornoticia,temanoticia,descripcionnoticia,fotonoticia,fechanoticia) VALUES (creador,tema,descripcion,rutaFoto,fechaCreacion)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarPermiso` (IN `creador` VARCHAR(50), IN `asunto` VARCHAR(100), IN `descripcion` TEXT, IN `fecha` DATE)  MODIFIES SQL DATA
INSERT INTO tbpermisos (creadorpermiso, asuntopermiso,descripcionpermiso,fechapermiso) VALUES(creador,asunto,descripcion,fecha)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertAsistente` (IN `name` VARCHAR(50), IN `primerA` VARCHAR(50), IN `segunA` VARCHAR(50), IN `cedul` VARCHAR(50), IN `idL` INT, IN `sexo` VARCHAR(50))  NO SQL
INSERT INTO tbasistente(cedulaasistente,nombreasistente,primerapellidoasistente,segundoapellidoasistente,sexo,	loginid) VALUES (cedul,name,primerA,segunA,sexo,idL)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertEstudiante` (IN `nombreE` VARCHAR(50), IN `primerApe` VARCHAR(50), IN `segundoApe` VARCHAR(50), IN `cedulaE` VARCHAR(50), IN `cabinaE` INT(50), IN `carreraE` VARCHAR(50), IN `logE` INT, IN `confCuen` TINYINT, IN `confHora` TINYINT, IN `sexo` VARCHAR(50), IN `ingreso` INT)  NO SQL
INSERT INTO tbestudiante(cedulaestudiante,nombreestudiante,primerapellidoestudiante,segundoapellidoestudiante,sexo,cabinaestudiante,fechaingreso,carreraestudiante,	loginestudiante,confirmacuetaestudiante,confirmahorarioestudiante) VALUES (cedulaE,nombreE,primerApe,segundoApe,sexo,cabinaE,ingreso,carreraE,logE,confCuen,confHora)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertHorario` (IN `idestudiante` BIGINT, IN `dia` TEXT, IN `horaInicio` VARCHAR(10), IN `horaFinal` VARCHAR(10), IN `descripcion` VARCHAR(100))  NO SQL
INSERT INTO tbhorario(idestudiante,diahorario,horainiciohorario,horasalidahorario,descripcionhorario) VALUES (idEstudiante,dia,horaInicio,horaFinal,descripcion)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertLogin` (IN `usuario` VARCHAR(100), IN `contrasena` VARCHAR(100), IN `rol` VARCHAR(30))  MODIFIES SQL DATA
INSERT INTO tblogin (userlogin,passwordlogin,rollogin) VALUES(usuario,contrasena,rol)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `marcarVisto` (IN `id` INT(11))  NO SQL
update tbpermisos set visto=1 where idpermiso=id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrarComentarioAvisoAdministrador` (IN `idaviso` INT(11))  READS SQL DATA
SELECT tbcomentarionoticia.idcomentario, tbcomentarionoticia.idnoticia, tbcomentarionoticia.cedularesponsable,tbcomentarionoticia.comentario, tbadministrador.nombreadministrador,tbadministrador.primerapellidoadministrador,tbadministrador.segundoapellidoadministrador FROM tbcomentarionoticia  
INNER JOIN tbadministrador ON tbadministrador.cedulaadministrador= tbcomentarionoticia.cedularesponsable AND tbcomentarionoticia.idnoticia=idaviso$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrarComentarioAvisoAsitente` (IN `idaviso` INT(11))  READS SQL DATA
SELECT tbcomentarionoticia.idcomentario, tbcomentarionoticia.idnoticia, tbcomentarionoticia.cedularesponsable,tbcomentarionoticia.comentario, tbasistente.nombreasistente, tbasistente.primerapellidoasistente, tbasistente.segundoapellidoasistente FROM tbcomentarionoticia  
INNER JOIN tbasistente ON tbasistente.cedulaasistente = tbcomentarionoticia.cedularesponsable AND tbcomentarionoticia.idnoticia=idaviso$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrarComentarioAvisoEstudiante` (IN `idaviso` INT(11))  READS SQL DATA
SELECT tbcomentarionoticia.idcomentario, tbcomentarionoticia.idnoticia, tbcomentarionoticia.cedularesponsable,tbcomentarionoticia.comentario, tbestudiante.nombreestudiante,tbestudiante.primerapellidoestudiante,tbestudiante.segundoapellidoestudiante FROM tbcomentarionoticia  
INNER JOIN tbestudiante ON tbestudiante.cedulaestudiante= tbcomentarionoticia.cedularesponsable AND tbcomentarionoticia.idnoticia=idaviso$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrarMisAvisos` (IN `creador` VARCHAR(100))  MODIFIES SQL DATA
SELECT * FROM tbnoticias WHERE idcreadornoticia=creador$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrarMisPermisos` (IN `cedula` VARCHAR(100))  READS SQL DATA
SELECT * FROM tbpermisos WHERE creadorpermiso=cedula ORDER BY visto ASC,fechapermiso DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrarTodasNoticiasAdministrador` ()  READS SQL DATA
SELECT tbnoticias.idnoticia, tbadministrador.nombreadministrador,tbadministrador.primerapellidoadministrador,tbadministrador.segundoapellidoadministrador,tbnoticias.temanoticia,tbnoticias.descripcionnoticia,tbnoticias.fotonoticia,tbnoticias.fechanoticia FROM tbnoticias  INNER JOIN  tbadministrador ON tbnoticias.idcreadornoticia = tbadministrador.cedulaadministrador  ORDER BY tbnoticias.idnoticia DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrarTodasNoticiasAsistente` ()  MODIFIES SQL DATA
SELECT tbnoticias.idnoticia, tbasistente.nombreasistente ,tbasistente.primerapellidoasistente, tbasistente.segundoapellidoasistente,tbnoticias.temanoticia,tbnoticias.descripcionnoticia,tbnoticias.fotonoticia,tbnoticias.fechanoticia FROM tbnoticias  INNER JOIN  tbasistente ON tbnoticias.idcreadornoticia = tbasistente.cedulaasistente  ORDER BY tbnoticias.idnoticia DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrarTodosPermisos` ()  READS SQL DATA
SELECT tbpermisos.idpermiso,tbestudiante.cedulaestudiante, tbestudiante.nombreestudiante, tbestudiante.primerapellidoestudiante, tbpermisos.asuntopermiso,tbpermisos.descripcionpermiso,tbpermisos.fechapermiso, tbpermisos.visto FROM tbpermisos INNER JOIN tbestudiante on tbestudiante.cedulaestudiante=tbpermisos.creadorpermiso ORDER BY  tbpermisos.visto ASC,tbpermisos.fechapermiso DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ordenarApellidoAsistente` ()  READS SQL DATA
SELECT * FROM tbasistente ORDER BY primerapellidoasistente ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ordenarApellidoEstudiante` ()  READS SQL DATA
SELECT * FROM tbestudiante ORDER BY primerapellidoestudiante ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ordenarApellidoParametrosAsistente` (IN `primer` VARCHAR(1), IN `segundo` VARCHAR(1))  READS SQL DATA
SELECT * FROM tbasistente WHERE substring(primerapellidoasistente,1,1) BETWEEN primer AND segundo ORDER BY primerapellidoasistente ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ordenarApellidoParametrosEstudiante` (IN `primer` VARCHAR(1), IN `segundo` VARCHAR(1))  READS SQL DATA
SELECT * FROM tbestudiante WHERE substring(primerapellidoestudiante,1,1) BETWEEN primer AND segundo ORDER BY primerapellidoestudiante ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ordenarNombreParametrosAsistente` (IN `primer` VARCHAR(1), IN `segundo` VARCHAR(1))  READS SQL DATA
SELECT * FROM tbasistente WHERE substring(nombreasistente,1,1) BETWEEN primer AND segundo ORDER BY nombreasistente ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ordenarNombreParametrosEstudiante` (IN `primer` VARCHAR(1), IN `segundo` VARCHAR(1))  READS SQL DATA
SELECT * FROM tbestudiante WHERE substring(nombreestudiante,1,1) BETWEEN primer AND segundo ORDER BY nombreestudiante ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ordenarNormbreAsistententes` ()  READS SQL DATA
SELECT * FROM tbasistente ORDER BY nombreasistente ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ordenarProviAsistente` (IN `provi` VARCHAR(10))  READS SQL DATA
SELECT* FROM tbasistente WHERE substring(cedulaasistente,1,1)=provi$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ordenarProvinciaEstudiantes` (IN `provi` VARCHAR(1))  READS SQL DATA
SELECT* FROM tbestudiante WHERE substring(cedulaestudiante,1,1)=provi ORDER BY nombreestudiante$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ordenarSexoAsistente` (IN `sex` VARCHAR(10))  READS SQL DATA
SELECT* FROM tbasistente WHERE sexo=sex ORDER by nombreasistente$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ordenarSexoEstudiantes` (IN `sex` VARCHAR(1))  READS SQL DATA
SELECT* FROM tbestudiante WHERE sexo=sex ORDER by nombreestudiante$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ordenarTodosAsistentes` ()  READS SQL DATA
SELECT* FROM tbasistente ORDER BY nombreasistente$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ordenarTodosEstudiantes` ()  READS SQL DATA
SELECT* FROM tbestudiante ORDER BY nombreestudiante$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `reportarHorarioEstuCedula` (IN `cedula` VARCHAR(50))  READS SQL DATA
SELECT e.cedulaestudiante AS cedula,e.nombreestudiante AS nombre,e.primerapellidoestudiante AS apellido, h.diahorario,h.horainiciohorario,h.horasalidahorario,h.descripcionhorario FROM tbhorario AS h INNER JOIN tbestudiante AS e ON e.idestudiante=h.idestudiante WHERE e.cedulaestudiante=cedula ORDER BY h.diahorario ASC, h.horainiciohorario ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `reporteHorarioLimpiezaAreas` (IN `area` VARCHAR(50))  NO SQL
SELECT a.nombrearea AS area, e.cedulaestudiante AS cedula,e.nombreestudiante AS nombre, e.primerapellidoestudiante AS apellido, hd.diadisponible AS dia,hd.jornada 
FROM tbhorariolimpieza  AS hl  
INNER JOIN tbestudiante AS e  ON  hl.idestudiante = e.idestudiante
INNER JOIN tbareaslimpieza AS a ON a.nombrearea = area AND a.idarea = hl.idarealimpieza 
INNER JOIN tbhorariodisponible AS hd on hl.idhorariodisponible = hd.idhorariodisponible$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `reporteHorarioLimpiezaCedula` (IN `cedula` VARCHAR(50))  READS SQL DATA
SELECT A.nombrearea AS area, e.cedulaestudiante AS cedula,e.nombreestudiante AS nombre, e.primerapellidoestudiante AS apellido, hd.diadisponible AS dia,hd.jornada 
FROM tbhorariolimpieza  AS hl  
INNER JOIN tbestudiante AS e  ON e.cedulaestudiante= cedula AND e.idestudiante= hl.idestudiante
INNER JOIN tbareaslimpieza AS a ON  a.idarea = hl.idarealimpieza 
INNER JOIN tbhorariodisponible AS hd on hl.idhorariodisponible = hd.idhorariodisponible$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateAsistente` (IN `name` VARCHAR(50), IN `primeA` VARCHAR(50), IN `segunA` VARCHAR(50), IN `cedul` VARCHAR(50), IN `sex` VARCHAR(50), IN `idAsis` INT(11))  MODIFIES SQL DATA
UPDATE tbasistente SET cedulaasistente=cedul, nombreasistente=name,primerapellidoasistente=primeA,segundoapellidoasistente=segunA,sexo=sex WHERE idasistente=idAsis$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateConfirmarHorario` (IN `cedula` VARCHAR(100))  MODIFIES SQL DATA
UPDATE tbestudiante SET confirmahorarioestudiante=1 WHERE cedulaestudiante=cedula$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateEstudiante` (IN `name` VARCHAR(50), IN `primeA` VARCHAR(50), IN `segunA` VARCHAR(50), IN `cabina` INT(10), IN `carrera` VARCHAR(50), IN `cedul` VARCHAR(50), IN `sex` VARCHAR(50), IN `ingreso` INT(10), IN `idEst` INT(10))  MODIFIES SQL DATA
UPDATE tbestudiantee SET cedulaestudiante=cedul, nombreestudiante=name,primerapellidoestudiante=primeA,segundoapellidoestudiante=segunA,sexo=sex,cabinaestudiante=cabina,fechaingreso=ingreso,carreraestudiante=carrera WHERE idestudiante=idEst$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateHorario` (IN `dia` TEXT, IN `horaInicio` VARCHAR(10), IN `horaFin` VARCHAR(10), IN `id` INT, IN `descripcion` VARCHAR(100))  MODIFIES SQL DATA
update tbhorario set diahorario=dia, horainiciohorario=horaInicio,horasalidahorario=horaFin,descripcionhorario=descripcion where idhorario=id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verAdministrador` (IN `cedula` VARCHAR(15))  READS SQL DATA
SELECT* FROM tbadministrador WHERE cedulaadministrador=cedula$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verAsistente` (IN `cedula` VARCHAR(15))  READS SQL DATA
SELECT* FROM tbasistente WHERE cedulaasistente=cedula$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verAsistentes` ()  READS SQL DATA
SELECT a.idasistente,a.cedulaasistente,a.nombreasistente,a.primerapellidoasistente,a.segundoapellidoasistente,a.sexo,l.userlogin AS correo,l.passwordlogin AS contrasena FROM tbasistente AS a INNER JOIN tblogin as l ON a.loginid= l.idlogin$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verDatosAsistente` (IN `id` INT(10))  READS SQL DATA
SELECT e.cedulaasistente, e.nombreasistente, e.primerapellidoasistente,e.segundoapellidoasistente,e.sexo, l.passwordlogin FROM tbasistente AS e INNER JOIN tblogin AS l ON e.idasistente=id AND e.loginid =l.idlogin$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verDatosEstudiante` (IN `id` INT(10))  READS SQL DATA
SELECT e.cedulaestudiante, e.nombreestudiante, e.primerapellidoestudiante,e.segundoapellidoestudiante,e.sexo,e.cabinaestudiante,e.fechaingreso,e.carreraestudiante,e.confirmacuetaestudiante, l.passwordlogin FROM tbestudiante AS e INNER JOIN tblogin AS l ON e.idestudiante=id AND e.loginestudiante =l.idlogin$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verEstudiante` (IN `cedula` VARCHAR(15))  READS SQL DATA
SELECT* FROM tbestudiante WHERE cedulaestudiante=cedula$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verEstudiantes` ()  READS SQL DATA
SELECT e.idestudiante,e.cedulaestudiante,e.nombreestudiante,e.primerapellidoestudiante,e.segundoapellidoestudiante,e.sexo,e.cabinaestudiante AS cabina,e.fechaingreso,e.carreraestudiante,e.confirmacuetaestudiante AS estadocuenta,l.userlogin AS correo,l.passwordlogin AS contrasena FROM tbestudiante AS e INNER JOIN tblogin as l ON e.loginestudiante= l.idlogin$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verficarCorreo` (IN `correo` VARCHAR(100))  READS SQL DATA
SELECT userlogin FROM tblogin  WHERE userlogin=correo$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verificarEstadoArea` (IN `idArea` INT(11))  NO SQL
Select * FROM tbareaslimpieza WHERE tbareaslimpieza.idarea=idArea and tbareaslimpieza.estado=1$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verificarHorarioEstudiante` (IN `cedula` VARCHAR(50), IN `dia` VARCHAR(50), IN `horaInicio` VARCHAR(50), IN `horaSalida` VARCHAR(50))  READS SQL DATA
SELECT * FROM tbhorario INNER JOIN tbestudiante on tbhorario.idestudiante=tbestudiante.idestudiante
WHERE tbestudiante.cedulaestudiante= cedula AND tbhorario.diahorario=dia AND
tbhorario.horainiciohorario=horaInicio AND tbhorario.horasalidahorario=horaSalida$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verOrdenarAccesoEstudiante` (IN `estado` INT)  READS SQL DATA
SELECT * FROM tbestudiante WHERE confirmacuetaestudiante=estado ORDER BY nombreestudiante ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verOrdenarAnioEstudiante` (IN `anio` INT)  NO SQL
SELECT* from tbestudiante WHERE fechaingreso=anio ORDER by nombreestudiante$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verOrdenarCarreraEstudiante` (IN `valor` VARCHAR(50))  READS SQL DATA
SELECT * from tbestudiante WHERE carreraestudiante=valor order by carreraestudiante$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbadministrador`
--

CREATE TABLE `tbadministrador` (
  `idadministrador` int(11) NOT NULL,
  `cedulaadministrador` varchar(100) NOT NULL,
  `nombreadministrador` varchar(100) NOT NULL,
  `primerapellidoadministrador` varchar(100) NOT NULL,
  `segundoapellidoadministrador` varchar(100) NOT NULL,
  `loginid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbadministrador`
--

INSERT INTO `tbadministrador` (`idadministrador`, `cedulaadministrador`, `nombreadministrador`, `primerapellidoadministrador`, `segundoapellidoadministrador`, `loginid`) VALUES
(2, '344444444', 'ssskkkk', 'ssslljjjkk', 'ssssssjjjj', 36);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbareaslimpieza`
--

CREATE TABLE `tbareaslimpieza` (
  `idarea` int(11) NOT NULL,
  `nombrearea` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `cuposarea` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbareaslimpieza`
--

INSERT INTO `tbareaslimpieza` (`idarea`, `nombrearea`, `cuposarea`, `estado`) VALUES
(1, 'cocina', 3, 1),
(2, 'pasillos', 2, 1),
(3, 'baños', 2, 1),
(4, 'jardin', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbarticulos`
--

CREATE TABLE `tbarticulos` (
  `nombrearticulo` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `idarticulo` int(11) NOT NULL,
  `seriearticulo` int(11) NOT NULL,
  `idpropietario` int(11) NOT NULL,
  `tipoarticulo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `descripcionarticulo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estadoarticulo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `clasearticulo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `aprobararticulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbarticulos`
--

INSERT INTO `tbarticulos` (`nombrearticulo`, `idarticulo`, `seriearticulo`, `idpropietario`, `tipoarticulo`, `descripcionarticulo`, `estadoarticulo`, `clasearticulo`, `aprobararticulo`) VALUES
('PC', 1, 324, 702440808, 'Electronico', 'Compu HP NoteBook', 'Buen estado', '', 0),
('arbol', 2, 32323, 702440808, 'Cuidado Personal', 'pequeÃ±o', 'Buen estado', '', 0),
('rwerwerwer', 3, 435345, 115700773, 'Cocina', 'DSDqdqwdqw', 'Buen Estado', '', 0),
('eqweqw', 4, 0, 115700773, 'Electronico', 'qweqweqwe', 'Regular', '', 0),
('Sarten', 8, 0, 115700773, 'Cocina', 'Sarten Eltrico Blak and Decker', 'Buen Estado', 'Personal', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbasistente`
--

CREATE TABLE `tbasistente` (
  `idasistente` int(11) NOT NULL,
  `cedulaasistente` varchar(50) NOT NULL,
  `nombreasistente` varchar(50) NOT NULL,
  `primerapellidoasistente` varchar(50) NOT NULL,
  `segundoapellidoasistente` varchar(50) NOT NULL,
  `sexo` varchar(50) NOT NULL,
  `loginid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbasistente`
--

INSERT INTO `tbasistente` (`idasistente`, `cedulaasistente`, `nombreasistente`, `primerapellidoasistente`, `segundoapellidoasistente`, `sexo`, `loginid`) VALUES
(88, '793333333', 'pppppp', 'ppppppggg', 'pppppppp', 'M', 10),
(89, 'rrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr', 'qqqqqqq', 'qqqqqqqqqq', 'qqqqqqqq', 'M', 67);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcomentarionoticia`
--

CREATE TABLE `tbcomentarionoticia` (
  `idcomentario` int(11) NOT NULL,
  `idnoticia` int(11) NOT NULL,
  `cedularesponsable` varchar(100) NOT NULL,
  `comentario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `sexo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cabinaestudiante` int(11) DEFAULT NULL,
  `fechaingreso` int(11) NOT NULL,
  `carreraestudiante` text COLLATE utf8_spanish_ci NOT NULL,
  `loginestudiante` int(11) NOT NULL,
  `confirmacuetaestudiante` tinyint(1) NOT NULL,
  `confirmahorarioestudiante` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbestudiante`
--

INSERT INTO `tbestudiante` (`idestudiante`, `cedulaestudiante`, `nombreestudiante`, `primerapellidoestudiante`, `segundoapellidoestudiante`, `sexo`, `cabinaestudiante`, `fechaingreso`, `carreraestudiante`, `loginestudiante`, `confirmacuetaestudiante`, `confirmahorarioestudiante`) VALUES
(1, '115700773', 'Berny', 'Garro', ' Duran', 'M', 1, 1234, 'Administracion de empresas', 1, 1, 1),
(3, '702430805', 'Steven', 'Cespedes', 'Quiros', 'M', 22, 2016, 'Ingenieria en sistemas', 2, 1, 0),
(41, '11111111111', 'ssssssss', 'sssssss', '    sssssssss', 'F', 2014, 2014, 'Ingenieria en sistemas', 60, 1, 0),
(42, '7777777777iiii', 'dddddd', 'ddddddddd', 'ddddddddddd', 'F', 4, 2017, 'Educacion rural', 68, 1, 0);

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
(3, 1, 'LUNES', '8AM', '11AM', 'moviles-ili');

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
(1, 'Lunes', 'Mañana', 0, 0),
(2, 'Lunes', 'Tarde', 0, 0),
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
(1, 1, 4, 2);

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
(1, 'cosa@gmail.com', '12345', 'estudiante'),
(2, 'stevencespedes6@gmail.com', '11111', 'estudiante'),
(10, 'asis@asis.com', '11111', 'asistente'),
(34, 'hgfh@ghjgjh', '11111', 'estudiante'),
(35, 'parra@gmail.com', '12341', 'asistente'),
(36, 'admin@gmail.com', 'admin1', 'administrador'),
(37, 'fhgkhf', '1111', 'estudiante'),
(38, 'dhkjdghqwkhdw', '1111', 'estudiante'),
(39, 'kfge', '1111', 'estudiante'),
(40, 'kfbhf', '1111', 'estudiante'),
(41, 'dbhqwh', '1111', 'estudiante'),
(42, 'fkdhfkjhf', '1111', 'estudiante'),
(43, 'dhde', '1111', 'estudiante'),
(44, 'ccc', '1111', 'estudiante'),
(45, 'kl', '2222', 'estudiante'),
(46, 'lllll', 'llll', 'estudiante'),
(47, 'kkkkk', 'kkkk', 'estudiante'),
(48, 'eeeeee', 'eeee', 'estudiante'),
(49, 'eeeeee', 'eeeee', 'estudiante'),
(50, '42424244', 'fffff', 'estudiante'),
(51, 'cncjn', '22222', 'asistente'),
(52, 'RRR', 'RRRRR', 'asistente'),
(53, 'knksndksndsk', '555555', 'asistente'),
(54, 'eeee', 'eeeee', 'estudiante'),
(55, '111111', '111111', 'asistente'),
(56, 'rrrrrr@gmail.com', '3333', 'asistente'),
(57, 'rrrrrr@gmail.com', '3333', 'asistente'),
(58, 'rrrrrr@gmail.com', '3333', 'asistente'),
(59, 'sssssss@gmail.com', 'sssssss', 'asistente'),
(60, 'stefffff@gmail.com', 'ssssssss', 'estudiante'),
(61, 'sdf@gmail.com', '1234', 'estudiante'),
(62, '1212@gmail.com', '1212', 'estudiante'),
(63, 'hjk@gmail.com', 'sscq2121', 'asistente'),
(64, 'sssss@gmail.com', 'sssssssss', 'asistente'),
(65, 'saq@gmail.com', 'qqqqqq', 'asistente'),
(66, 'sssd@gmail.com', 'sssssssss', 'asistente'),
(67, 'sssss@gmail.com', 'qqqqqq', 'asistente'),
(68, 'stevb@gmail.vom', 'qqqqqq', 'estudiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbnoticias`
--

CREATE TABLE `tbnoticias` (
  `idnoticia` int(11) NOT NULL,
  `idcreadornoticia` varchar(50) NOT NULL,
  `temanoticia` varchar(100) NOT NULL,
  `descripcionnoticia` text NOT NULL,
  `fotonoticia` varchar(100) NOT NULL,
  `fechanoticia` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbnoticias`
--

INSERT INTO `tbnoticias` (`idnoticia`, `idcreadornoticia`, `temanoticia`, `descripcionnoticia`, `fotonoticia`, `fechanoticia`) VALUES
(2, '777777777777', 'rewrwe', 'werwer', '777777777777-28Sek4gd6Qr.jpeg', '2018-03-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbpermisos`
--

CREATE TABLE `tbpermisos` (
  `idpermiso` int(11) NOT NULL,
  `creadorpermiso` varchar(50) NOT NULL,
  `asuntopermiso` varchar(100) NOT NULL,
  `descripcionpermiso` text NOT NULL,
  `fechapermiso` date NOT NULL,
  `visto` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbpermisos`
--

INSERT INTO `tbpermisos` (`idpermiso`, `creadorpermiso`, `asuntopermiso`, `descripcionpermiso`, `fechapermiso`, `visto`) VALUES
(1, '702440808', 'Salida', 'salida despues de las la 10pm', '2018-01-01', 1),
(2, '115700773', 'Salida3', 'salida despues de las la 10pm', '2018-02-01', 1),
(3, '115700773', 'Salida2', 'salida despues de las la 10pm', '2018-02-01', 1),
(4, '115700773', 'playa Jaco', 'Estamos de festejo, quienes van?', '2018-02-05', 1),
(5, '115700773', 'Prueba', 'Realizar Prueba Permiso', '2018-02-22', 1),
(6, '115700773', 'arg', 'rer', '2018-02-22', 1),
(7, '702440808', 'dds', 'sds', '2018-03-07', 0),
(8, '702440808', 'dwd', 'swsw', '2018-03-07', 0),
(9, '702440808', 'cardiac', 'bass', '2018-03-07', 0),
(10, '702440808', 'saassssss', 'ssq', '2018-03-07', 0),
(11, '702440808', 'm smds', 'kmwmdwkmd', '2018-03-07', 0),
(12, '702440808', 'Nacho', 'odldwl', '2018-03-07', 0),
(13, '702440808', 'sw', 'swdw', '2018-03-07', 0),
(14, '702440808', 'hola', 'aiiii', '2018-03-07', 0),
(15, '115700773', 'comida', 'rapido', '2018-03-07', 0),
(16, '115700773', 'fmdn', 'hambreee', '2018-03-07', 0),
(17, '115700773', 'dfd', 'fvfvf', '2018-03-07', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbadministrador`
--
ALTER TABLE `tbadministrador`
  ADD PRIMARY KEY (`idadministrador`),
  ADD KEY `idlogin` (`loginid`),
  ADD KEY `cedulaadministrador` (`cedulaadministrador`);

--
-- Indices de la tabla `tbareaslimpieza`
--
ALTER TABLE `tbareaslimpieza`
  ADD PRIMARY KEY (`idarea`);

--
-- Indices de la tabla `tbarticulos`
--
ALTER TABLE `tbarticulos`
  ADD PRIMARY KEY (`idarticulo`);

--
-- Indices de la tabla `tbasistente`
--
ALTER TABLE `tbasistente`
  ADD PRIMARY KEY (`idasistente`),
  ADD KEY `idlogin` (`loginid`);

--
-- Indices de la tabla `tbcomentarionoticia`
--
ALTER TABLE `tbcomentarionoticia`
  ADD PRIMARY KEY (`idcomentario`),
  ADD KEY `idnoticia_2` (`idnoticia`);

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
-- Indices de la tabla `tbnoticias`
--
ALTER TABLE `tbnoticias`
  ADD PRIMARY KEY (`idnoticia`);

--
-- Indices de la tabla `tbpermisos`
--
ALTER TABLE `tbpermisos`
  ADD PRIMARY KEY (`idpermiso`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbadministrador`
--
ALTER TABLE `tbadministrador`
  MODIFY `idadministrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tbareaslimpieza`
--
ALTER TABLE `tbareaslimpieza`
  MODIFY `idarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tbarticulos`
--
ALTER TABLE `tbarticulos`
  MODIFY `idarticulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `tbasistente`
--
ALTER TABLE `tbasistente`
  MODIFY `idasistente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT de la tabla `tbcomentarionoticia`
--
ALTER TABLE `tbcomentarionoticia`
  MODIFY `idcomentario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbestudiante`
--
ALTER TABLE `tbestudiante`
  MODIFY `idestudiante` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT de la tabla `tbhorario`
--
ALTER TABLE `tbhorario`
  MODIFY `idhorario` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tbhorariodisponible`
--
ALTER TABLE `tbhorariodisponible`
  MODIFY `idhorariodisponible` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `tbhorariolimpieza`
--
ALTER TABLE `tbhorariolimpieza`
  MODIFY `idhorariolimpieza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tblogin`
--
ALTER TABLE `tblogin`
  MODIFY `idlogin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT de la tabla `tbnoticias`
--
ALTER TABLE `tbnoticias`
  MODIFY `idnoticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tbpermisos`
--
ALTER TABLE `tbpermisos`
  MODIFY `idpermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbadministrador`
--
ALTER TABLE `tbadministrador`
  ADD CONSTRAINT `tbadministrador_ibfk_1` FOREIGN KEY (`loginid`) REFERENCES `tblogin` (`idlogin`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbasistente`
--
ALTER TABLE `tbasistente`
  ADD CONSTRAINT `tbasistente_ibfk_1` FOREIGN KEY (`loginid`) REFERENCES `tblogin` (`idlogin`) ON UPDATE CASCADE;

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
