-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-04-2018 a las 17:08:21
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarDatosMensaje` (IN `id` INT, IN `estado` VARCHAR(50), IN `visible` INT)  MODIFIES SQL DATA
UPDATE tbpermisos AS p SET p.estado=estado, p.visible=visible WHERE p.idpermiso=id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarEstudianteAdmi` (IN `cedula` VARCHAR(20), IN `nombre` VARCHAR(20), IN `pApellido` VARCHAR(20), IN `sApellido` VARCHAR(20), IN `sexo` VARCHAR(10), IN `cabina` INT, IN `fecha` INT, IN `carrera` VARCHAR(50), IN `acceso` INT)  READS SQL DATA
UPDATE  tbestudiante SET nombreestudiante=nombre,primerapellidoestudiante=pApellido,segundoapellidoestudiante=sApellido,sexo=sexo,cabinaestudiante=cabina,fechaingreso=fecha,carreraestudiante=carrera,confirmacuetaestudiante=acceso WHERE cedulaestudiante=cedula$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarNoticia` (IN `creador` VARCHAR(100), IN `tema` VARCHAR(100), IN `detalle` TEXT, IN `rutaFoto` VARCHAR(100), IN `id` INT(11))  MODIFIES SQL DATA
UPDATE tbnoticias SET temanoticia =tema, descripcionnoticia=detalle,fotonoticia=rutaFoto WHERE idcreadornoticia=creador AND idnoticia =id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `autenticarCuenta` (IN `usuario` VARCHAR(100), IN `contrasena` VARCHAR(100))  READS SQL DATA
SELECT * FROM tblogin WHERE userlogin=usuario AND passwordlogin=contrasena$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `buscarFehaNoticia` (IN `fecha` DATE, IN `idCreador` VARCHAR(50))  NO SQL
SELECT * FROM tbnoticias WHERE 
fechanoticia = fecha AND idcreadornoticia=idCreador$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `busquedaAsistente` (IN `recibe` VARCHAR(20))  NO SQL
SELECT* FROM tbasistente WHERE nombreasistente like recibe or primerapellidoasistente LIKE recibe or segundoapellidoasistente like recibe or cedulaasistente like recibe$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `busquedaEstudiante` (IN `recibe` VARCHAR(20))  READS SQL DATA
SELECT* FROM tbestudiante WHERE nombreestudiante like recibe or primerapellidoestudiante LIKE recibe or segundoapellidoestudiante like recibe or cedulaestudiante like recibe$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `busquedaReportarArticuloDeficiente` (IN `cedula` VARCHAR(50), IN `palabra` VARCHAR(50))  NO SQL
SELECT ar.idarticulo as idarticulo, ar.nombrearticulo as nombreArti, ar.seriearticulo as serie,ar.tipoarticulo as tipo,ar.clasearticulo as clase

FROM tbarticulos ar  
WHERE  ar.idpropietario=cedula 
    AND ar.estadoarticulo!='Deficiente' 
    AND ar.nombrearticulo like palabra 
  OR  ar.idpropietario=cedula 
        AND ar.estadoarticulo!='Deficiente'
        AND ar.seriearticulo LIKE palabra 
   OR ar.idpropietario=cedula 
        AND ar.estadoarticulo!='Deficiente' 
        AND ar.tipoarticulo like palabra
  OR ar.idpropietario=cedula 
        AND ar.estadoarticulo!='Deficiente' 
        AND ar.clasearticulo like palabra 
  OR ar.clasearticulo='Institucional' 
    AND ar.estadoarticulo!='Deficiente'
    AND ar.nombrearticulo LIKE palabra
  OR ar.clasearticulo='Institucional' 
    AND ar.estadoarticulo!='Deficiente'
    AND ar.seriearticulo LIKE palabra
  OR ar.clasearticulo='Institucional' 
    AND ar.estadoarticulo!='Deficiente'
    AND ar.tipoarticulo LIKE palabra
  OR ar.clasearticulo='Institucional' 
    AND ar.estadoarticulo!='Deficiente'
    AND ar.clasearticulo LIKE palabra$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultarAdministradorLogin` (IN `idLogin` INT)  NO SQL
SELECT * FROM tbadministrador WHERE loginid=idLogin$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultarAsistenteLogin` (IN `idLogin` INT)  NO SQL
SELECT * FROM tbasistente WHERE loginid=idLogin$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultarEstudiante` (IN `idEstudiante` INT(10))  READS SQL DATA
SELECT cedulaestudiante FROM tbestudiante WHERE idestudiante=idEstudiante$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultarEstudianteLogin` (IN `idLogin` INT)  READS SQL DATA
SELECT cedulaestudiante FROM tbestudiante WHERE loginestudiante=idLogin$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultarHorarioLavanderia` (IN `dia` VARCHAR(50), IN `jornada` VARCHAR(50))  READS SQL DATA
SELECT*
FROM tbhorariodisponiblelavanderia h 
	WHERE h.diadisponiblelavanderia = dia AND h.jornadalavanderia = jornada$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultarHorarioLimpieza` (IN `dia` VARCHAR(50), IN `jornada` VARCHAR(50))  READS SQL DATA
SELECT*
FROM tbhorariodisponible h 
	WHERE h.diadisponible = dia AND h.jornada = jornada$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultHorario` (IN `cedula` VARCHAR(30))  READS SQL DATA
SELECT idhorario,diahorario,horainiciohorario,horasalidahorario,descripcionhorario FROM tbhorario INNER JOIN tbestudiante ON tbestudiante.idestudiante=tbhorario.idestudiante WHERE tbestudiante.cedulaestudiante=cedula$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultHorarioLavanderia` (IN `idestudiante` VARCHAR(50))  READS SQL DATA
SELECT hd.diadisponiblelavanderia, hd.jornadalavanderia FROM  tbhorariolavanderia as hl 
INNER JOIN tbhorariodisponiblelavanderia AS hd ON hd.idhorariodisponiblelavanderia =hl.idhorariodisponiblelavanderia  
AND   hl.idestudiante=idestudiante$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultHorarioLimpieza` (IN `idestudiante` VARCHAR(50))  READS SQL DATA
SELECT a.nombrearea, hd.diadisponible, hd.jornada FROM  tbhorariolimpieza as hl 
INNER JOIN tbareaslimpieza AS a ON  a.idarea = hl.idarealimpieza 
INNER JOIN tbhorariodisponible AS hd ON hd.idhorariodisponible =hl.idhorariodisponible  
AND   hl.idestudiante=idestudiante$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crearMensaje` (IN `creador` VARCHAR(50), IN `asunto` VARCHAR(100), IN `descripcion` TEXT, IN `estado` VARCHAR(100), IN `fecha` DATE, IN `visible` INT)  MODIFIES SQL DATA
INSERT INTO tbpermisos (creadorpermiso, asuntopermiso,descripcionpermiso,fechapermiso,estado,visible) VALUES(creador,asunto,descripcion,fecha,estado,visible)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `datosAdministradorReporte` (IN `cedula` VARCHAR(50))  NO SQL
SELECT adm.nombreadministrador as nombre, adm.primerapellidoadministrador as apellido FROM tbadministrador as adm WHERE adm.cedulaadministrador=cedula$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `datosAsistenteReporte` (IN `cedula` VARCHAR(50))  NO SQL
SELECT asi.nombreasistente as nombre, asi.primerapellidoasistente as apellido FROM tbasistente as asi WHERE asi.cedulaasistente=cedula$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `datosEstudianteReporte` (IN `cedula` VARCHAR(50))  NO SQL
SELECT e.nombreestudiante as nombre, e.primerapellidoestudiante as apellido FROM tbestudiante as e WHERE e.cedulaestudiante=cedula$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteArticuloDeficiente` (IN `id` INT)  NO SQL
DELETE FROM tbarticulodanado WHERE iddano=id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteHorario` (IN `id` INT)  MODIFIES SQL DATA
DELETE FROM tbhorario WHERE idhorario=id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `elimarAsistente` (IN `cedula` VARCHAR(50))  MODIFIES SQL DATA
DELETE asi, n, cn, l 
FROM tbasistente asi 
LEFT JOIN tbnoticias n 
    ON asi.cedulaasistente = n.idcreadornoticia 
LEFT JOIN tbcomentarionoticia cn 
    ON cn.cedularesponsable = asi.cedulaasistente
LEFT JOIN tblogin l 
	ON l.idlogin = e.idestudiante AND e.cedulaestudiante= cedula
WHERE e.cedulaestudiante = cedula$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `elimarEstudiante` (IN `cedula` VARCHAR(50))  MODIFIES SQL DATA
DELETE e, n, cn, h, hlp, hlv, p, l 
FROM tbestudiante e 
LEFT JOIN tbnoticias n 
    ON e.cedulaestudiante = n.idcreadornoticia 
LEFT JOIN tbcomentarionoticia cn 
    ON cn.cedularesponsable = e.cedulaestudiante 
LEFT JOIN tbhorario h 
	ON h.idestudiante = e.idestudiante AND e.cedulaestudiante= cedula
LEFT JOIN tbhorariolimpieza hlp
	ON hlp.idestudiante = e.idestudiante AND e.cedulaestudiante= cedula
LEFT JOIN tbhorariolavanderia hlv
	ON hlv.idestudiante = e.idestudiante AND e.cedulaestudiante= cedula
LEFT JOIN tbpermisos p 
	ON p.creadorpermiso = e.cedulaestudiante
LEFT JOIN tblogin l 
	ON l.idlogin = e.loginestudiante AND e.cedulaestudiante= cedula
WHERE e.cedulaestudiante = cedula$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarArticuloDeficiente` (IN `id` INT)  MODIFIES SQL DATA
DELETE t1, t2 FROM tbarticulodanado AS t1 INNER JOIN tbarticulos AS t2
WHERE  t1.idarticulo=t2.idarticulo AND t1.iddano=id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarComentariosNoticia` (IN `idnoticia` INT(11))  MODIFIES SQL DATA
DELETE FROM tbcomentarionoticia WHERE idnoticia=idnoticia$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarMensaje` (IN `idMensaje` INT)  MODIFIES SQL DATA
DELETE FROM tbpermisos WHERE idpermiso=idMensaje$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarNoticia` (IN `id` INT(11))  MODIFIES SQL DATA
DELETE n, cn
FROM tbnoticias n
LEFT JOIN tbcomentarionoticia cn 
    ON cn.idnoticia = n.idnoticia 
WHERE n.idnoticia = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `filtroClaseArticuloDeficiente` (IN `clase` VARCHAR(50))  NO SQL
SELECT ar.iddano as iddano,ar.idarticulo idarticulo,ar.cedulacreador as cedula,e.nombreestudiante as nombre,e.primerapellidoestudiante as apellido,arti.nombrearticulo as nombreArti,arti.seriearticulo as serie, arti.tipoarticulo as tipo,arti.clasearticulo AS clase, ar.descripciondano as descripcion,ar.fecha as fecha
FROM tbarticulodanado ar 
		INNER JOIN tbestudiante e  ON ar.cedulacreador= e.cedulaestudiante 
        	INNER JOIN tbarticulos arti ON ar.idarticulo= arti.idarticulo AND arti.clasearticulo=clase ORDER BY ar.fecha DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `filtroClaseInstitucionalArticulo` (IN `clase` VARCHAR(50))  NO SQL
SELECT ar.idarticulo as idarticulo, ar.nombrearticulo as nombreArti, ar.seriearticulo as serie,ar.tipoarticulo as tipo,ar.clasearticulo as clase 
FROM tbarticulos ar 
WHERE ar.clasearticulo=clase AND ar.estadoarticulo!='Deficiente'$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `filtroClasePersonalArticulo` (IN `cedula` VARCHAR(50), IN `clase` VARCHAR(50))  NO SQL
SELECT  ar.idarticulo as idarticulo, ar.nombrearticulo as nombreArti, ar.seriearticulo as serie,ar.tipoarticulo as tipo,ar.clasearticulo as clase 
FROM tbarticulos ar 
	WHERE  ar.idpropietario= cedula AND ar.estadoarticulo!='Deficiente'AND ar.clasearticulo=clase$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `filtroTipoArticuloDeficiente` (IN `cedula` VARCHAR(50), IN `tipo` VARCHAR(50))  NO SQL
SELECT ar.idarticulo as idarticulo, ar.nombrearticulo as nombreArti, ar.seriearticulo as serie,ar.tipoarticulo as tipo,ar.clasearticulo as clase 
FROM tbarticulos ar 
		WHERE ar.idpropietario=cedula AND ar.estadoarticulo!='Deficiente' AND ar.tipoarticulo=tipo OR ar.clasearticulo='Institucional' AND ar.estadoarticulo!='Deficiente'  AND ar.tipoarticulo=tipo$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `filtroTipoArticuloDeficienteAd` (IN `tipo` VARCHAR(50))  NO SQL
SELECT ar.iddano as iddano,ar.idarticulo as idarticulo,ar.cedulacreador as cedula,e.nombreestudiante as nombre,e.primerapellidoestudiante as apellido,arti.nombrearticulo as nombreArti,arti.seriearticulo as serie, arti.tipoarticulo as tipo,arti.clasearticulo AS clase, ar.descripciondano as descripcion,ar.fecha as fecha
FROM tbarticulodanado ar 
		INNER JOIN tbestudiante e  ON ar.cedulacreador= e.cedulaestudiante 
        	INNER JOIN tbarticulos arti ON ar.idarticulo= arti.idarticulo AND arti.tipoarticulo=tipo ORDER BY ar.fecha DESC$$

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

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertArticuloDanado` (IN `idarticulo` INT, IN `cedulacreador` VARCHAR(50), IN `descripciondano` VARCHAR(50), IN `fecha` DATE)  NO SQL
INSERT INTO tbarticulodanado(idarticulo,cedulacreador,descripciondano,fecha) VALUES (idarticulo,cedulacreador,descripciondano,fecha)$$

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

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrarBotonConfirmar` (IN `cedula` VARCHAR(100))  READS SQL DATA
SELECT * FROM tbhorario h INNER JOIN tbestudiante e ON e.cedulaestudiante=cedula AND e.idestudiante= h.idestudiante AND e.confirmahorarioestudiante=0$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrarComentarioAvisoAdministrador` (IN `idaviso` INT(11))  READS SQL DATA
SELECT tbcomentarionoticia.idcomentario, tbcomentarionoticia.idnoticia, tbcomentarionoticia.cedularesponsable,tbcomentarionoticia.comentario, tbadministrador.nombreadministrador,tbadministrador.primerapellidoadministrador,tbadministrador.segundoapellidoadministrador FROM tbcomentarionoticia  
INNER JOIN tbadministrador ON tbadministrador.cedulaadministrador= tbcomentarionoticia.cedularesponsable AND tbcomentarionoticia.idnoticia=idaviso ORDER BY tbcomentarionoticia.idnoticia ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrarComentarioAvisoAsitente` (IN `idaviso` INT(11))  READS SQL DATA
SELECT tbcomentarionoticia.idcomentario, tbcomentarionoticia.idnoticia, tbcomentarionoticia.cedularesponsable,tbcomentarionoticia.comentario, tbasistente.nombreasistente, tbasistente.primerapellidoasistente, tbasistente.segundoapellidoasistente FROM tbcomentarionoticia  
INNER JOIN tbasistente ON tbasistente.cedulaasistente = tbcomentarionoticia.cedularesponsable AND tbcomentarionoticia.idnoticia=idaviso ORDER BY tbcomentarionoticia.idnoticia ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrarComentarioAvisoEstudiante` (IN `idaviso` INT(11))  READS SQL DATA
SELECT tbcomentarionoticia.idcomentario, tbcomentarionoticia.idnoticia, tbcomentarionoticia.cedularesponsable,tbcomentarionoticia.comentario, tbestudiante.nombreestudiante,tbestudiante.primerapellidoestudiante,tbestudiante.segundoapellidoestudiante FROM tbcomentarionoticia  
INNER JOIN tbestudiante ON tbestudiante.cedulaestudiante= tbcomentarionoticia.cedularesponsable AND tbcomentarionoticia.idnoticia=idaviso ORDER BY tbcomentarionoticia.idnoticia ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrarMisAvisos` (IN `creador` VARCHAR(100))  MODIFIES SQL DATA
SELECT * FROM tbnoticias n WHERE idcreadornoticia=creador 
	ORDER BY n.fechanoticia DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrarTodasNoticiasAdministrador` ()  READS SQL DATA
SELECT tbnoticias.idnoticia, tbadministrador.nombreadministrador,tbadministrador.primerapellidoadministrador,tbadministrador.segundoapellidoadministrador,tbnoticias.temanoticia,tbnoticias.descripcionnoticia,tbnoticias.fotonoticia,tbnoticias.fechanoticia FROM tbnoticias  INNER JOIN  tbadministrador ON tbnoticias.idcreadornoticia = tbadministrador.cedulaadministrador  ORDER BY tbnoticias.idnoticia DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrarTodasNoticiasAsistente` ()  MODIFIES SQL DATA
SELECT tbnoticias.idnoticia, tbasistente.nombreasistente ,tbasistente.primerapellidoasistente, tbasistente.segundoapellidoasistente,tbnoticias.temanoticia,tbnoticias.descripcionnoticia,tbnoticias.fotonoticia,tbnoticias.fechanoticia FROM tbnoticias  INNER JOIN  tbasistente ON tbnoticias.idcreadornoticia = tbasistente.cedulaasistente  ORDER BY tbnoticias.idnoticia DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrarTodosPermisos` (IN `asunto` VARCHAR(50))  READS SQL DATA
SELECT p.idpermiso,e.cedulaestudiante, e.nombreestudiante, e.primerapellidoestudiante, p.asuntopermiso,p.descripcionpermiso,p.fechapermiso, p.estado,p.visible FROM tbpermisos AS p INNER JOIN tbestudiante AS e on e.cedulaestudiante=p.creadorpermiso AND p.asuntopermiso= asunto AND p.visible!=0 ORDER BY  p.estado ASC,p.fechapermiso DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ocultarMensaje` (IN `idMensaje` INT, IN `estado` INT)  MODIFIES SQL DATA
UPDATE tbpermisos AS p SET p.visible =estado WHERE p.idpermiso =idMensaje$$

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

CREATE DEFINER=`root`@`localhost` PROCEDURE `palabraBuscadaNoticia` (IN `palabra` VARCHAR(100), IN `idCreador` VARCHAR(50))  NO SQL
SELECT * FROM tbnoticias WHERE temanoticia LIKE palabra AND idcreadornoticia=idCreador OR descripcionnoticia LIKE  palabra AND idcreadornoticia=idCreador$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `palabraBuscaLavanderia` (IN `palabra` VARCHAR(50))  READS SQL DATA
SELECT e.cedulaestudiante AS cedula,e.nombreestudiante AS nombre, e.primerapellidoestudiante AS apellido, hd.diadisponiblelavanderia AS dia,hd.jornadalavanderia  FROM tbhorariolavanderia hl 

INNER JOIN tbestudiante e ON 
	hl.idestudiante = e.idestudiante

INNER JOIN tbhorariodisponiblelavanderia hd ON
 hl.idhorariodisponiblelavanderia = hd.idhorariodisponiblelavanderia

   WHERE e.cedulaestudiante LIKE palabra  
   OR e.nombreestudiante LIKE palabra 
   OR e.primerapellidoestudiante LIKE palabra 
   OR hd.diadisponiblelavanderia LIKE palabra 
   OR hd.jornadalavanderia LIKE palabra$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `palabraBuscaLimpieza` (IN `palabra` VARCHAR(50))  READS SQL DATA
SELECT a.nombrearea AS area, e.cedulaestudiante AS cedula,e.nombreestudiante AS nombre, e.primerapellidoestudiante AS apellido, hd.diadisponible AS dia,hd.jornada  FROM tbhorariolimpieza hl 

INNER JOIN tbestudiante e ON 
	hl.idestudiante = e.idestudiante

INNER JOIN tbhorariodisponible hd ON
	hl.idhorariodisponible = hd.idhorariodisponible

INNER JOIN tbareaslimpieza a ON
	hl.idarealimpieza=a.idarea 
    
    WHERE e.cedulaestudiante LIKE palabra   OR e.nombreestudiante LIKE palabra OR e.primerapellidoestudiante LIKE palabra OR
    	  hd.diadisponible 		LIKE palabra OR hd.jornada LIKE palabra OR
          a.nombrearea LIKE palabra$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ReasignarHorarioLavanderia` (IN `idestudiante` INT(11), IN `idhdl` INT(11))  MODIFIES SQL DATA
UPDATE tbhorariolavanderia h SET  h.idhorariodisponiblelavanderia = idhdl
WHERE h.idestudiante = idestudiante$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ReasignarHorarioLimpieza` (IN `idestudiante` INT(11), IN `idhorario` INT(11), IN `idarea` INT(11))  READS SQL DATA
UPDATE tbhorariolimpieza h SET  h.idarealimpieza = idarea, h.idhorariodisponible = idhorario
WHERE h.idestudiante = idestudiante$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `reportarArticulosDeficientes` (IN `cedula` VARCHAR(50))  NO SQL
SELECT ar.idarticulo as idarticulo,ar.nombrearticulo as nombreArti, ar.seriearticulo as serie,ar.tipoarticulo as tipo,ar.clasearticulo as clase 
FROM tbarticulos ar 
		WHERE ar.idpropietario=cedula AND ar.estadoarticulo!='Deficiente' OR ar.clasearticulo='Institucional' AND ar.estadoarticulo!='Deficiente'   ORDER BY ar.clasearticulo DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `reportarHorarioEstuPalabra` (IN `palabra` VARCHAR(50))  READS SQL DATA
SELECT e.cedulaestudiante AS cedula,e.nombreestudiante AS nombre,e.primerapellidoestudiante AS apellido, h.diahorario,h.horainiciohorario,h.horasalidahorario,h.descripcionhorario FROM tbhorario h INNER JOIN tbestudiante e 
	ON e.idestudiante=h.idestudiante 
  		WHERE e.cedulaestudiante LIKE palabra 
        	OR e.nombreestudiante LIKE palabra 
            OR e.primerapellidoestudiante LIKE palabra 
            OR h.diahorario LIKE palabra 
            OR h.horainiciohorario LIKE palabra 
            OR h.horasalidahorario LIKE palabra 
            OR h.descripcionhorario LIKE palabra
  ORDER BY h.diahorario ASC, h.horainiciohorario ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `reporteHorarioLavanderiaDias` (IN `dia` VARCHAR(50))  NO SQL
SELECT  e.cedulaestudiante AS cedula,e.nombreestudiante AS nombre, e.primerapellidoestudiante AS apellido, hd.diadisponiblelavanderia AS dia,hd.jornadalavanderia 
FROM tbhorariolavanderia  AS hl  
INNER JOIN tbestudiante AS e  ON  hl.idestudiante = e.idestudiante
INNER JOIN tbhorariodisponiblelavanderia AS hd on hl.idhorariodisponiblelavanderia = hd.idhorariodisponiblelavanderia AND hd.diadisponiblelavanderia=dia$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `reporteHorarioLavanderiaJornada` (IN `jornada` VARCHAR(50))  NO SQL
SELECT  e.cedulaestudiante AS cedula,e.nombreestudiante AS nombre, e.primerapellidoestudiante AS apellido, hd.diadisponiblelavanderia AS dia,hd.jornadalavanderia 
FROM tbhorariolavanderia  AS hl  
INNER JOIN tbestudiante AS e  ON  hl.idestudiante = e.idestudiante
INNER JOIN tbhorariodisponiblelavanderia AS hd on hl.idhorariodisponiblelavanderia = hd.idhorariodisponiblelavanderia AND hd.jornadalavanderia=jornada$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `reporteHorarioLimpiezaAreas` (IN `area` VARCHAR(50))  NO SQL
SELECT a.nombrearea AS area, e.cedulaestudiante AS cedula,e.nombreestudiante AS nombre, e.primerapellidoestudiante AS apellido, hd.diadisponible AS dia,hd.jornada 
FROM tbhorariolimpieza  AS hl  
INNER JOIN tbestudiante AS e  ON  hl.idestudiante = e.idestudiante
INNER JOIN tbareaslimpieza AS a ON a.nombrearea = area AND a.idarea = hl.idarealimpieza 
INNER JOIN tbhorariodisponible AS hd on hl.idhorariodisponible = hd.idhorariodisponible$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `reporteHorarioLimpiezaDias` (IN `dia` VARCHAR(50))  NO SQL
SELECT a.nombrearea AS area, e.cedulaestudiante AS cedula,e.nombreestudiante AS nombre, e.primerapellidoestudiante AS apellido, hd.diadisponible AS dia,hd.jornada 
FROM tbhorariolimpieza  AS hl  
INNER JOIN tbestudiante AS e  ON  hl.idestudiante = e.idestudiante
INNER JOIN tbareaslimpieza AS a ON a.idarea = hl.idarealimpieza 
INNER JOIN tbhorariodisponible AS hd on  hd.diadisponible=dia  AND  hl.idhorariodisponible = hd.idhorariodisponible$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `reporteHorarioLimpiezaJornada` (IN `jornada` VARCHAR(50))  NO SQL
SELECT a.nombrearea AS area, e.cedulaestudiante AS cedula,e.nombreestudiante AS nombre, e.primerapellidoestudiante AS apellido, hd.diadisponible AS dia,hd.jornada 
FROM tbhorariolimpieza  AS hl  
INNER JOIN tbestudiante AS e  ON  hl.idestudiante = e.idestudiante
INNER JOIN tbareaslimpieza AS a ON a.idarea = hl.idarealimpieza 
INNER JOIN tbhorariodisponible AS hd on  hd.jornada=jornada  AND  hl.idhorariodisponible = hd.idhorariodisponible$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `reporteHorariosClasesCarrera` (IN `carrera` VARCHAR(100))  NO SQL
SELECT e.cedulaestudiante AS cedula,e.nombreestudiante AS nombre,e.primerapellidoestudiante AS apellido, h.diahorario,h.horainiciohorario,h.horasalidahorario,h.descripcionhorario FROM tbhorario AS h INNER JOIN tbestudiante AS e ON e.idestudiante=h.idestudiante AND e.carreraestudiante = carrera ORDER BY h.diahorario ASC, h.horainiciohorario ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `reporteMensajeBucar` (IN `palabra` VARCHAR(50), IN `asunto` VARCHAR(50))  NO SQL
SELECT p.idpermiso,e.cedulaestudiante, e.nombreestudiante, e.primerapellidoestudiante, p.asuntopermiso,p.descripcionpermiso,p.fechapermiso, p.estado,p.visible FROM tbpermisos p 
INNER JOIN tbestudiante e ON
	e.cedulaestudiante=p.creadorpermiso 
    AND p.asuntopermiso= asunto 
    AND p.visible!=0
		WHERE e.cedulaestudiante LIKE palabra 
        	OR e.nombreestudiante LIKE palabra
            OR e.primerapellidoestudiante LIKE palabra
            OR p.asuntopermiso LIKE palabra
            OR p.descripcionpermiso LIKE palabra
            OR p.fechapermiso  LIKE palabra        

ORDER BY  p.estado ASC,p.fechapermiso DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `reporteMensajeEstado` (IN `estado` VARCHAR(50), IN `asunto` VARCHAR(50))  NO SQL
SELECT p.idpermiso,e.cedulaestudiante, e.nombreestudiante, e.primerapellidoestudiante, p.asuntopermiso,p.descripcionpermiso,p.fechapermiso, p.estado,p.visible FROM tbpermisos AS p INNER JOIN tbestudiante AS e on e.cedulaestudiante=p.creadorpermiso AND p.estado=estado AND p.asuntopermiso= asunto AND p.visible!=0 ORDER BY  p.estado ASC,p.fechapermiso DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `reporteMensajeFecha` (IN `fecha` DATE, IN `asunto` VARCHAR(50))  READS SQL DATA
SELECT p.idpermiso,e.cedulaestudiante, e.nombreestudiante, e.primerapellidoestudiante, p.asuntopermiso,p.descripcionpermiso,p.fechapermiso, p.estado,p.visible FROM tbpermisos AS p INNER JOIN tbestudiante AS e on e.cedulaestudiante=p.creadorpermiso AND p.fechapermiso=fecha AND p.asuntopermiso= asunto AND p.visible!=0 ORDER BY  p.estado ASC,p.fechapermiso DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `reporteMensajesEstudiante` (IN `cedula` VARCHAR(50), IN `asunto` VARCHAR(50))  NO SQL
SELECT p.idpermiso, p.asuntopermiso,p.descripcionpermiso,p.fechapermiso, p.estado,p.visible 
	FROM tbpermisos p 
    	WHERE  p.creadorpermiso=cedula 
        	AND p.asuntopermiso=asunto 
ORDER BY  p.estado ASC,p.fechapermiso DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `reporteMensajesOcultos` (IN `asunto` VARCHAR(50))  READS SQL DATA
SELECT p.idpermiso,e.cedulaestudiante, e.nombreestudiante, e.primerapellidoestudiante, p.asuntopermiso,p.descripcionpermiso,p.fechapermiso, p.estado,p.visible FROM tbpermisos AS p INNER JOIN tbestudiante AS e on e.cedulaestudiante=p.creadorpermiso AND p.visible=0 AND p.asuntopermiso= asunto ORDER BY p.fechapermiso DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateAsistente` (IN `name` VARCHAR(50), IN `primeA` VARCHAR(50), IN `segunA` VARCHAR(50), IN `cedul` VARCHAR(50), IN `sex` VARCHAR(50), IN `idAsis` INT(11))  MODIFIES SQL DATA
UPDATE tbasistente SET cedulaasistente=cedul, nombreasistente=name,primerapellidoasistente=primeA,segundoapellidoasistente=segunA,sexo=sex WHERE idasistente=idAsis$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateConfirmarHorario` (IN `cedula` VARCHAR(100))  MODIFIES SQL DATA
UPDATE tbestudiante SET confirmahorarioestudiante=1 WHERE cedulaestudiante=cedula$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateEstadoArticulo` (IN `id` INT)  MODIFIES SQL DATA
UPDATE tbarticulos SET estadoarticulo='DEFICIENTE' WHERE idarticulo=id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateEstadoArticuloDeficiente` (IN `id` INT(11))  NO SQL
UPDATE tbarticulos SET estadoarticulo='BUENO' WHERE tbarticulos.idarticulo=id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateEstudiante` (IN `name` VARCHAR(50), IN `primeA` VARCHAR(50), IN `segunA` VARCHAR(50), IN `cabina` INT(10), IN `carrera` VARCHAR(50), IN `cedul` VARCHAR(50), IN `sex` VARCHAR(50), IN `ingreso` INT(10), IN `idEst` INT(10))  MODIFIES SQL DATA
UPDATE tbestudiantee SET cedulaestudiante=cedul, nombreestudiante=name,primerapellidoestudiante=primeA,segundoapellidoestudiante=segunA,sexo=sex,cabinaestudiante=cabina,fechaingreso=ingreso,carreraestudiante=carrera WHERE idestudiante=idEst$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateHorario` (IN `dia` TEXT, IN `horaInicio` VARCHAR(10), IN `horaFin` VARCHAR(10), IN `id` INT, IN `descripcion` VARCHAR(100))  MODIFIES SQL DATA
update tbhorario set diahorario=dia, horainiciohorario=horaInicio,horasalidahorario=horaFin,descripcionhorario=descripcion where idhorario=id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verAdministrador` (IN `cedula` VARCHAR(15))  READS SQL DATA
SELECT* FROM tbadministrador WHERE cedulaadministrador=cedul$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verArticulosDeficientes` ()  NO SQL
SELECT ar.iddano as iddano,ar.idarticulo as idarticulo,ar.cedulacreador as cedula,e.nombreestudiante as nombre,e.primerapellidoestudiante as apellido,arti.nombrearticulo as nombreArti, arti.seriearticulo as serie, arti.tipoarticulo as tipo,arti.clasearticulo AS clase, ar.descripciondano as descripcion,ar.fecha as fecha
FROM tbarticulodanado ar 
		INNER JOIN tbestudiante e  ON ar.cedulacreador= e.cedulaestudiante 
        	INNER JOIN tbarticulos arti ON ar.idarticulo= arti.idarticulo ORDER BY ar.fecha DESC$$

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

SUBSTRING(tbhorario.horainiciohorario,1,2) BETWEEN SUBSTRING(horaInicio,1,2) AND SUBSTRING(horaSalida,1,2) AND 
 SUBSTRING(horaInicio,3,2) =SUBSTRING(tbhorario.horainiciohorario,3,2)
 AND 
 SUBSTRING(tbhorario.horasalidahorario,1,2) BETWEEN SUBSTRING(horaInicio,1,2) AND SUBSTRING(horaSalida,1,2)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verificarHorarioLimpieza` (IN `idestudiante` INT(50), IN `idhorariolavanderia` INT(50))  READS SQL DATA
SELECT * FROM tbhorariolimpieza 
WHERE tbhorariolimpieza.idhorariodisponible=idhorariolavanderia AND tbhorariolimpieza.idestudiante=idestudiante$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verificarHorarioModificar` (IN `cedula` VARCHAR(50), IN `dia` VARCHAR(50), IN `horaInicio` VARCHAR(50), IN `horaSalida` VARCHAR(50), IN `idHorarioActual` INT)  READS SQL DATA
SELECT * FROM tbhorario INNER JOIN tbestudiante on tbhorario.idestudiante=tbestudiante.idestudiante
WHERE tbestudiante.cedulaestudiante= cedula AND tbhorario.diahorario=dia AND
	SUBSTRING(horaInicio,1,2) BETWEEN 			SUBSTRING(tbhorario.horainiciohorario,1,2) AND 	SUBSTRING(tbhorario.horasalidahorario,1,2) AND 
 	SUBSTRING(horaInicio,3,2) =SUBSTRING(tbhorario.horainiciohorario,3,2)
        AND SUBSTRING(horaSalida,1,2)BETWEEN SUBSTRING(tbhorario.horainiciohorario,1,2) AND 		SUBSTRING(tbhorario.horasalidahorario,1,2)  AND tbhorario.idhorario!=idHorarioActual$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verificarHorarioRegistrar` (IN `cedula` VARCHAR(50), IN `dia` VARCHAR(50), IN `horaInicio` VARCHAR(50), IN `horaSalida` VARCHAR(50))  READS SQL DATA
SELECT * FROM tbhorario INNER JOIN tbestudiante on tbhorario.idestudiante=tbestudiante.idestudiante
WHERE tbestudiante.cedulaestudiante= cedula AND tbhorario.diahorario=dia AND
	SUBSTRING(horaInicio,1,2) BETWEEN 			SUBSTRING(tbhorario.horainiciohorario,1,2) AND 	SUBSTRING(tbhorario.horasalidahorario,1,2) AND 
 	SUBSTRING(horaInicio,3,2) =SUBSTRING(tbhorario.horainiciohorario,3,2)
        AND SUBSTRING(horaSalida,1,2)BETWEEN SUBSTRING(tbhorario.horainiciohorario,1,2) AND 		SUBSTRING(tbhorario.horasalidahorario,1,2)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verMisMensajesEstudiante` (IN `cedula` VARCHAR(50))  READS SQL DATA
SELECT p.idpermiso, p.asuntopermiso,p.descripcionpermiso,p.fechapermiso, p.estado,p.visible 
FROM tbpermisos p 
	WHERE  p.creadorpermiso=cedula 
ORDER BY  p.estado ASC,p.fechapermiso DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verOrdenarAccesoEstudiante` (IN `estado` INT)  READS SQL DATA
SELECT * FROM tbestudiante WHERE confirmacuetaestudiante=estado ORDER BY nombreestudiante ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verOrdenarAnioEstudiante` (IN `anio` INT)  NO SQL
SELECT* from tbestudiante WHERE fechaingreso=anio ORDER by nombreestudiante$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verOrdenarCarreraEstudiante` (IN `valor` VARCHAR(50))  READS SQL DATA
SELECT * from tbestudiante WHERE carreraestudiante=valor order by carreraestudiante$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verReporteHorarioClases` ()  NO SQL
SELECT e.cedulaestudiante AS cedula,e.nombreestudiante AS nombre,e.primerapellidoestudiante AS apellido, h.diahorario,h.horainiciohorario,h.horasalidahorario,h.descripcionhorario FROM tbhorario AS h INNER JOIN tbestudiante AS e ON e.idestudiante=h.idestudiante ORDER BY h.diahorario ASC, h.horainiciohorario ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verReporteHorarioLavanderia` ()  NO SQL
SELECT  e.cedulaestudiante AS cedula,e.nombreestudiante AS nombre, e.primerapellidoestudiante AS apellido, hd.diadisponiblelavanderia AS dia,hd.jornadalavanderia 
FROM tbhorariolavanderia  AS hl  
INNER JOIN tbestudiante AS e  ON  e.idestudiante= hl.idestudiante
INNER JOIN tbhorariodisponiblelavanderia AS hd on hl.idhorariodisponiblelavanderia = hd.idhorariodisponiblelavanderia$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `verReporteHorarioLimpieza` ()  NO SQL
SELECT A.nombrearea AS area, e.cedulaestudiante AS cedula,e.nombreestudiante AS nombre, e.primerapellidoestudiante AS apellido, hd.diadisponible AS dia,hd.jornada 
FROM tbhorariolimpieza  AS hl  
INNER JOIN tbestudiante AS e  ON  e.idestudiante= hl.idestudiante
INNER JOIN tbareaslimpieza AS a ON  a.idarea = hl.idarealimpieza 
INNER JOIN tbhorariodisponible AS hd on hl.idhorariodisponible = hd.idhorariodisponible$$

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
(1, '12345678', 'Herminia', 'Avila', 'Alfaro', 1);

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
(1, 'Baños', 4, 1),
(2, 'Cocina', 2, 1),
(3, 'Jardin', 4, 1),
(4, 'Pasillos', 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbarticulodanado`
--

CREATE TABLE `tbarticulodanado` (
  `iddano` int(11) NOT NULL,
  `idarticulo` int(11) NOT NULL,
  `cedulacreador` varchar(11) NOT NULL,
  `descripciondano` varchar(100) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbarticulos`
--

CREATE TABLE `tbarticulos` (
  `nombrearticulo` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `idarticulo` int(11) NOT NULL,
  `seriearticulo` int(11) NOT NULL,
  `idpropietario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `tipoarticulo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `descripcionarticulo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estadoarticulo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `clasearticulo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `aprobararticulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
(1, '70244080808', 'Luis', 'Parra', 'Cambronero', 'M', 2),
(2, '702080543', 'Steven', 'Cruz', 'Sancho', 'M', 5),
(3, '3434343434343', 'ffdfffff', 'fff', 'ffff', 'M', 6);

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

--
-- Volcado de datos para la tabla `tbcomentarionoticia`
--

INSERT INTO `tbcomentarionoticia` (`idcomentario`, `idnoticia`, `cedularesponsable`, `comentario`) VALUES
(11, 23, '207270826', 'asasa'),
(12, 23, '207270826', 'asas'),
(13, 23, '207270826', 'ewewew');

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
(1, '207270826', 'Jose', 'Alfaro', 'Rodriguez', 'M', 5, 2014, 'Ingenieria en sistemas', 3, 0, 0),
(2, '115700773', 'Berny', 'Garro', 'Duran', 'M', 3, 2012, 'ingenieria en sistemas', 4, 0, 1);

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
(1, 'Lunes', 'Mañana', 1, 2),
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
-- Estructura de tabla para la tabla `tbhorariodisponiblelavanderia`
--

CREATE TABLE `tbhorariodisponiblelavanderia` (
  `idhorariodisponiblelavanderia` int(11) NOT NULL,
  `diadisponiblelavanderia` varchar(100) NOT NULL,
  `jornadalavanderia` varchar(100) NOT NULL,
  `estadolavanderia` tinyint(1) NOT NULL,
  `cuposlavanderia` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbhorariodisponiblelavanderia`
--

INSERT INTO `tbhorariodisponiblelavanderia` (`idhorariodisponiblelavanderia`, `diadisponiblelavanderia`, `jornadalavanderia`, `estadolavanderia`, `cuposlavanderia`) VALUES
(1, 'Lunes', 'Mañana', 1, 10),
(2, 'Lunes', 'Tarde', 1, 8),
(3, 'Lunes', 'Noche', 1, 10),
(4, 'Martes', 'Mañana', 1, 10),
(5, 'Martes', 'Tarde', 1, 10),
(6, 'Martes', 'Noche', 1, 10),
(7, 'Miercoles', 'Mañana', 1, 10),
(8, 'Miercoles', 'Tarde', 1, 10),
(9, 'Miercoles', 'Noche', 1, 10),
(10, 'Jueves', 'Mañana', 1, 10),
(11, 'Jueves', 'Tarde', 1, 10),
(12, 'Jueves', 'Noche', 1, 10),
(13, 'Viernes', 'Mañana', 1, 10),
(14, 'Viernes', 'Tarde', 1, 10),
(15, 'Viernes', 'Noche', 1, 10),
(16, 'Sabado', 'Mañana', 1, 10),
(17, 'Sabado', 'Tarde', 1, 10),
(18, 'Sabado', 'Noche', 1, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbhorariolavanderia`
--

CREATE TABLE `tbhorariolavanderia` (
  `idhorariolavanderia` int(11) NOT NULL,
  `idestudiante` bigint(20) NOT NULL,
  `idhorariodisponiblelavanderia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'admin@gmail.com', 'admin1', 'administrador'),
(2, 'lz.parra@gmail.com', 'parra06', 'asistente'),
(3, 'jose@gmail.com', 'jose99', 'estudiante'),
(4, 'berny@gmail.com', 'berny69', 'estudiante'),
(5, 'sancho@gmail.com', 'sancho', 'asistente'),
(6, 'l@gmail.com', 'ffffff', 'asistente');

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
(23, '12345678', 'Taller Recreativo', '334343', '12345678-3jOmG1PtXpM-op.png', '2018-04-27'),
(27, '12345678', 'Simpsons', 'Noticia Familiars', '12345678-3z4SJkb5LoN-op.png', '2018-04-27');

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
  `estado` varchar(50) NOT NULL,
  `visible` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbpermisos`
--

INSERT INTO `tbpermisos` (`idpermiso`, `creadorpermiso`, `asuntopermiso`, `descripcionpermiso`, `fechapermiso`, `estado`, `visible`) VALUES
(1, '207270826', 'AVISO', 'Aviso', '2018-04-27', 'PROCESO', 1),
(2, '207270826', 'PERMISO', 'Permiso', '2018-04-27', 'NUEVO', 1),
(3, '207270826', 'QUEJA', 'Queja', '2018-04-27', 'NUEVO', 1),
(4, '207270826', 'AVISO', 'Aviso', '2018-04-27', 'RECHAZADO', 1),
(5, '207270826', 'PERMISO', 'Permiso', '2018-04-27', 'NUEVO', 1),
(6, '207270826', 'QUEJA', 'Queja', '2018-04-27', 'NUEVO', 1),
(7, '207270826', 'AVISO', 'Aviso', '2018-04-27', 'RECHAZADO', 1),
(8, '207270826', 'PERMISO', 'Permiso', '2018-04-27', 'NUEVO', 1),
(9, '207270826', 'QUEJA', 'Queja', '2018-04-27', 'NUEVO', 1),
(11, '207270826', 'PERMISO', 'Permiso', '2018-04-27', 'NUEVO', 1),
(12, '207270826', 'QUEJA', 'Queja', '2018-04-27', 'NUEVO', 1),
(13, '207270826', 'AVISO', 'Asunto Personal', '2018-04-27', 'NUEVO', 1),
(14, '207270826', 'AVISO', 'dsdsdsd', '2018-04-27', 'PROCESO', 1),
(15, '207270826', 'AVISO', 'dsds', '2018-04-27', 'NUEVO', 1),
(16, '207270826', 'AVISO', 'sas', '2018-04-27', 'NUEVO', 1),
(17, '207270826', 'AVISO', 'asas', '2018-04-27', 'NUEVO', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbadministrador`
--
ALTER TABLE `tbadministrador`
  ADD PRIMARY KEY (`idadministrador`);

--
-- Indices de la tabla `tbareaslimpieza`
--
ALTER TABLE `tbareaslimpieza`
  ADD PRIMARY KEY (`idarea`);

--
-- Indices de la tabla `tbarticulodanado`
--
ALTER TABLE `tbarticulodanado`
  ADD PRIMARY KEY (`iddano`);

--
-- Indices de la tabla `tbarticulos`
--
ALTER TABLE `tbarticulos`
  ADD PRIMARY KEY (`idarticulo`);

--
-- Indices de la tabla `tbasistente`
--
ALTER TABLE `tbasistente`
  ADD PRIMARY KEY (`idasistente`);

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
  ADD PRIMARY KEY (`idestudiante`);

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
-- Indices de la tabla `tbhorariodisponiblelavanderia`
--
ALTER TABLE `tbhorariodisponiblelavanderia`
  ADD PRIMARY KEY (`idhorariodisponiblelavanderia`);

--
-- Indices de la tabla `tbhorariolavanderia`
--
ALTER TABLE `tbhorariolavanderia`
  ADD PRIMARY KEY (`idhorariolavanderia`);

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
  MODIFY `idadministrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tbareaslimpieza`
--
ALTER TABLE `tbareaslimpieza`
  MODIFY `idarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tbarticulodanado`
--
ALTER TABLE `tbarticulodanado`
  MODIFY `iddano` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbarticulos`
--
ALTER TABLE `tbarticulos`
  MODIFY `idarticulo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbasistente`
--
ALTER TABLE `tbasistente`
  MODIFY `idasistente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tbcomentarionoticia`
--
ALTER TABLE `tbcomentarionoticia`
  MODIFY `idcomentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `tbestudiante`
--
ALTER TABLE `tbestudiante`
  MODIFY `idestudiante` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tbhorario`
--
ALTER TABLE `tbhorario`
  MODIFY `idhorario` bigint(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbhorariodisponible`
--
ALTER TABLE `tbhorariodisponible`
  MODIFY `idhorariodisponible` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `tbhorariodisponiblelavanderia`
--
ALTER TABLE `tbhorariodisponiblelavanderia`
  MODIFY `idhorariodisponiblelavanderia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `tbhorariolavanderia`
--
ALTER TABLE `tbhorariolavanderia`
  MODIFY `idhorariolavanderia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbhorariolimpieza`
--
ALTER TABLE `tbhorariolimpieza`
  MODIFY `idhorariolimpieza` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tblogin`
--
ALTER TABLE `tblogin`
  MODIFY `idlogin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `tbnoticias`
--
ALTER TABLE `tbnoticias`
  MODIFY `idnoticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `tbpermisos`
--
ALTER TABLE `tbpermisos`
  MODIFY `idpermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbhorariolimpieza`
--
ALTER TABLE `tbhorariolimpieza`
  ADD CONSTRAINT `tbhorariolimpieza_ibfk_2` FOREIGN KEY (`idarealimpieza`) REFERENCES `tbareaslimpieza` (`idarea`),
  ADD CONSTRAINT `tbhorariolimpieza_ibfk_3` FOREIGN KEY (`idhorariodisponible`) REFERENCES `tbhorariodisponible` (`idhorariodisponible`);

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `actualizarcupos` ON SCHEDULE EVERY 1 YEAR STARTS '2018-06-06 00:00:00' ENDS '2018-06-07 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE tbhorariodisponible SET cupos= 4,estado=1$$

CREATE DEFINER=`root`@`localhost` EVENT `actualizarcuposareas` ON SCHEDULE EVERY 1 YEAR STARTS '2018-06-06 00:00:00' ENDS '2018-06-07 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE tbareaslimpieza SET cuposarea= 4,estado=1$$

CREATE DEFINER=`root`@`localhost` EVENT `eliminarhorarios` ON SCHEDULE EVERY 1 YEAR STARTS '2018-06-06 00:00:00' ENDS '2018-06-07 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM tbhorario$$

CREATE DEFINER=`root`@`localhost` EVENT `eliminarhorarioslimpieza` ON SCHEDULE EVERY 1 YEAR STARTS '2018-06-06 00:00:00' ENDS '2018-06-07 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM tbhorariolimpieza$$

CREATE DEFINER=`root`@`localhost` EVENT `eliminarhorariolavanderia` ON SCHEDULE EVERY 1 YEAR STARTS '2018-06-06 00:00:00' ENDS '2018-06-07 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM tbhorariolavanderia$$

CREATE DEFINER=`root`@`localhost` EVENT `actualizarConfirmarHorario` ON SCHEDULE EVERY 6 MONTH STARTS '2018-06-15 20:00:00' ENDS '2018-06-15 20:02:00' ON COMPLETION PRESERVE ENABLE DO UPDATE tbestudiante SET confirmahorarioestudiante=0$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
