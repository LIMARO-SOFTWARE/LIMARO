/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.21-MariaDB : Database - nuevalimaro
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `cargo` */

DROP TABLE IF EXISTS `cargo`;

CREATE TABLE `cargo` (
  `id_cargo` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `cargo` varchar(200) NOT NULL,
  `manual_funciones` varchar(200) NOT NULL,
  `estado` enum('ACTIVO','INACTIVO') NOT NULL DEFAULT 'ACTIVO',
  PRIMARY KEY (`id_cargo`),
  UNIQUE KEY `cargo` (`cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `documento` */

DROP TABLE IF EXISTS `documento`;

CREATE TABLE `documento` (
  `id_documento` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_proceso` tinyint(3) unsigned NOT NULL,
  `id_tipo_documento` tinyint(3) unsigned NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `nombre_documento` varchar(500) NOT NULL,
  `objetivo_documento` text NOT NULL,
  PRIMARY KEY (`id_documento`),
  UNIQUE KEY `codigo` (`codigo`),
  KEY `id_tipo_documento_` (`id_tipo_documento`),
  KEY `id_proceso_` (`id_proceso`),
  CONSTRAINT `id_proceso_` FOREIGN KEY (`id_proceso`) REFERENCES `proceso` (`id_proceso`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `id_tipo_documento_` FOREIGN KEY (`id_tipo_documento`) REFERENCES `tipo_documento` (`id_tipo_documento`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=417 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `empleado` */

DROP TABLE IF EXISTS `empleado`;

CREATE TABLE `empleado` (
  `id_empleado` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_completo` varchar(200) NOT NULL,
  `img_empleado` varchar(200) NOT NULL DEFAULT 'usuario.png',
  `correo_empleado` varchar(500) NOT NULL,
  `id_cargo` tinyint(3) unsigned NOT NULL,
  `id_empresa` tinyint(1) unsigned NOT NULL,
  `estado_empleado` enum('ACTIVO','INACTIVO') DEFAULT NULL,
  PRIMARY KEY (`id_empleado`),
  UNIQUE KEY `correo` (`correo_empleado`),
  KEY `id_empresa` (`id_empresa`),
  KEY `id_cargo` (`id_cargo`),
  CONSTRAINT `id_cargo` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `id_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `empresa` */

DROP TABLE IF EXISTS `empresa`;

CREATE TABLE `empresa` (
  `id_empresa` tinyint(1) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_empresa` varchar(500) DEFAULT NULL,
  `logo` varchar(500) DEFAULT NULL,
  `mision` text DEFAULT NULL,
  `vision` text DEFAULT NULL,
  `politica_calidad` text DEFAULT NULL,
  `objetivos_calidad` text DEFAULT NULL,
  `organigrama` varchar(500) DEFAULT NULL,
  `mapa_procesos` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `estado_tarea` */

DROP TABLE IF EXISTS `estado_tarea`;

CREATE TABLE `estado_tarea` (
  `id_estado_tarea` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `estado_tarea` enum('ELABORACION','REVISION','APROBACION','DEVOLUCION') NOT NULL,
  `usuario_asignado` varchar(500) NOT NULL,
  `fecha_tarea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `documento` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id_estado_tarea`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `macroproceso` */

DROP TABLE IF EXISTS `macroproceso`;

CREATE TABLE `macroproceso` (
  `id_macroproceso` tinyint(4) unsigned NOT NULL AUTO_INCREMENT,
  `macroproceso` varchar(200) NOT NULL,
  `objetivo` text NOT NULL,
  `estado` enum('ACTIVO','INACTIVO') NOT NULL DEFAULT 'ACTIVO',
  PRIMARY KEY (`id_macroproceso`),
  UNIQUE KEY `macroproceso` (`macroproceso`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `proceso` */

DROP TABLE IF EXISTS `proceso`;

CREATE TABLE `proceso` (
  `id_proceso` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `id_macroproceso` tinyint(4) unsigned NOT NULL,
  `proceso` varchar(200) NOT NULL,
  `sigla_proceso` varchar(2) NOT NULL,
  `objetivo` text NOT NULL,
  `estado` enum('ACTIVO','INACTIVO') NOT NULL DEFAULT 'ACTIVO',
  PRIMARY KEY (`id_proceso`),
  KEY `id_macroproceso` (`id_macroproceso`),
  CONSTRAINT `id_macroproceso` FOREIGN KEY (`id_macroproceso`) REFERENCES `macroproceso` (`id_macroproceso`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `rol` */

DROP TABLE IF EXISTS `rol`;

CREATE TABLE `rol` (
  `id_rol` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `rol` varchar(50) NOT NULL,
  `estado` enum('ACTIVO','INACTIVO') NOT NULL DEFAULT 'ACTIVO',
  PRIMARY KEY (`id_rol`),
  UNIQUE KEY `rol` (`rol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `solicitud` */

DROP TABLE IF EXISTS `solicitud`;

CREATE TABLE `solicitud` (
  `id_solicitud` bigint(7) unsigned NOT NULL AUTO_INCREMENT,
  `id_empleado` tinyint(3) unsigned NOT NULL,
  `prioridad` enum('IMPORTANTE - URGENTE','IMPORTANTE - NO URGENTE','NO IMPORTANTE - URGENTE','NO IMPORTANTE - NO URGENTE') NOT NULL,
  `id_tipo_documento` tinyint(3) unsigned NOT NULL,
  `tipo_solicitud` enum('CREACIÓN','ACTUALIZACIÓN','ELIMINACIÓN') NOT NULL,
  `estado_solicitud` enum('CREADA','ASIGNADA','EN DESARROLLO','FINALIZADA') NOT NULL DEFAULT 'CREADA',
  `codigo_documento` varchar(200) DEFAULT '00000',
  `solicitud` text NOT NULL,
  `ruta` varchar(200) DEFAULT NULL,
  `documento` varchar(600) DEFAULT 'null',
  `fecha_solicitud` timestamp NULL DEFAULT NULL,
  `funcionario_asignado` varchar(200) DEFAULT 'Sin Asignar',
  `fecha_asignacion` timestamp NULL DEFAULT NULL,
  `fecha_inicio_tarea` timestamp NULL DEFAULT NULL,
  `fecha_solucion` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_solicitud`),
  KEY `id_empleado_sol` (`id_empleado`),
  KEY `id_tipo_documento` (`id_tipo_documento`),
  CONSTRAINT `id_empleado_sol` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `id_tipo_documento` FOREIGN KEY (`id_tipo_documento`) REFERENCES `tipo_documento` (`id_tipo_documento`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `solicitud_comentario` */

DROP TABLE IF EXISTS `solicitud_comentario`;

CREATE TABLE `solicitud_comentario` (
  `id_solicitud_comentario` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_solicitud` bigint(7) unsigned NOT NULL,
  `comentario` varchar(500) NOT NULL,
  `usuario_comentario` varchar(100) NOT NULL,
  `fecha_comentario` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estado` enum('ACTIVO','INACTIVO') NOT NULL DEFAULT 'ACTIVO',
  PRIMARY KEY (`id_solicitud_comentario`),
  KEY `id_solicitud_` (`id_solicitud`),
  CONSTRAINT `id_solicitud_` FOREIGN KEY (`id_solicitud`) REFERENCES `solicitud` (`id_solicitud`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `tarea` */

DROP TABLE IF EXISTS `tarea`;

CREATE TABLE `tarea` (
  `id_tarea` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_solicitud` bigint(7) unsigned NOT NULL,
  PRIMARY KEY (`id_tarea`),
  KEY `solicitud` (`id_solicitud`),
  CONSTRAINT `solictud` FOREIGN KEY (`id_solicitud`) REFERENCES `solicitud` (`id_solicitud`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `tarea_estado` */

DROP TABLE IF EXISTS `tarea_estado`;

CREATE TABLE `tarea_estado` (
  `id_tarea_estado` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_tarea` bigint(20) unsigned NOT NULL,
  `usuario_tarea_estado` varchar(200) NOT NULL,
  `fecha_tarea_estado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tarea_estado` enum('CREADO','REVISION','APROBACION','DEVUELTO','FINALIZADO','CAMBIO') NOT NULL DEFAULT 'CREADO',
  `ruta` varchar(200) NOT NULL,
  `documento_tarea` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_tarea_estado`),
  KEY `id_tarea _as` (`id_tarea`),
  CONSTRAINT `id_tarea _as` FOREIGN KEY (`id_tarea`) REFERENCES `tarea` (`id_tarea`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Table structure for table `tipo_documento` */

DROP TABLE IF EXISTS `tipo_documento`;

CREATE TABLE `tipo_documento` (
  `id_tipo_documento` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `tipo_documento` varchar(200) NOT NULL,
  `sigla_tipo_documento` varchar(10) NOT NULL,
  `estado` enum('ACTIVO','INACTIVO') NOT NULL DEFAULT 'ACTIVO',
  PRIMARY KEY (`id_tipo_documento`),
  UNIQUE KEY `tipo_documento` (`tipo_documento`),
  UNIQUE KEY `sigla_tipo_documento` (`sigla_tipo_documento`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id_usuario` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `clave` varbinary(50) NOT NULL,
  `id_rol` tinyint(3) unsigned NOT NULL,
  `id_empleado` tinyint(3) unsigned NOT NULL,
  `estado` enum('ACTIVO','INACTIVO','CREADO') NOT NULL DEFAULT 'CREADO',
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `usuario` (`usuario`),
  KEY `id_rol` (`id_rol`),
  KEY `id_empleado` (`id_empleado`),
  CONSTRAINT `id_empleado` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `id_rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `versionamiento` */

DROP TABLE IF EXISTS `versionamiento`;

CREATE TABLE `versionamiento` (
  `id_versionamiento` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `numero_version` int(10) unsigned DEFAULT NULL,
  `id_documento` int(10) unsigned DEFAULT NULL,
  `descripcion_version` text DEFAULT NULL,
  `usuario_creacion` varchar(200) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT NULL,
  `usuario_revision` varchar(200) DEFAULT NULL,
  `fecha_revision` timestamp NULL DEFAULT NULL,
  `usuario_aprobacion` varchar(200) DEFAULT NULL,
  `fecha_aprobacion` timestamp NULL DEFAULT NULL,
  `documento` varchar(500) DEFAULT NULL,
  `fecha_obsoleto` timestamp NULL DEFAULT NULL,
  `estado_version` enum('OBSOLETO','CREADO','VIGENTE') DEFAULT 'CREADO',
  PRIMARY KEY (`id_versionamiento`),
  KEY `id_documento` (`id_documento`),
  CONSTRAINT `id_documentoV` FOREIGN KEY (`id_documento`) REFERENCES `documento` (`id_documento`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=466 DEFAULT CHARSET=utf8mb4;

/* Procedure structure for procedure `createDocumento` */

/*!50003 DROP PROCEDURE IF EXISTS  `createDocumento` */;

DELIMITER $$

CREATE DEFINER=CURRENT_USER  PROCEDURE `createDocumento`(iN id_documento int, id_proceso TINYINT, id_tipo_documento tinyint,
  codigo varchar(10),nombre_documento varchar(500), objetivo_documento TEXT)
BEGIN
 INSERT INTO documento VALUES (NULL, id_proceso, id_tipo_documento,codigo,nombre_documento,objetivo_documento);
    END $$
DELIMITER ;

/* Procedure structure for procedure `createVersionamiento` */

/*!50003 DROP PROCEDURE IF EXISTS  `createVersionamiento` */;

DELIMITER $$

CREATE DEFINER=CURRENT_USER  PROCEDURE `createVersionamiento`(in id_documento INT, id_proceso TINYINT, id_tipo_documento tinyint,
  codigo VARCHAR(10), nombre_documento VARCHAR(500), objetivo_documento TEXT,
  id_versionamiento int, numero_version int,
 descripcion_version text, usuario_creacion varchar(200), fecha_creacion timestamp,
 usuario_revision VARCHAR(200), fecha_revision TIMESTAMP, usuario_aprobacion VARCHAR(200), fecha_aprobacion TIMESTAMP,
 documento varchar(500), fecha_obsoleto TIMESTAMP, estado_version ENUM('OBSOLETO','VIGENTE','CREADO') )
BEGIN
DECLARE errno INT;
	DECLARE proceso VARCHAR(5);
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
	BEGIN
		GET DIAGNOSTICS @cno = NUMBER;
		GET DIAGNOSTICS CONDITION 1 @errNo = MYSQL_ERRNO, @errMsg = MESSAGE_TEXT;
		SELECT @errNo, @errMsg;
		GET CURRENT DIAGNOSTICS CONDITION 2 errno = MYSQL_ERRNO;
		SET @proceso="ERROR";
		SELECT errno AS MYSQL_ERROR,@proceso AS proceso;
		ROLLBACK;
	END;
	START TRANSACTION;
	CALL createDocumento(1,id_proceso, id_tipo_documento,codigo,nombre_documento,objetivo_documento);
	SELECT LAST_INSERT_ID() INTO @id_documento;
	INSERT INTO versionamiento VALUES(NULL,'0',@id_documento,'Se asigna Codigo al Documento',usuario_creacion, CURRENT_TIMESTAMP(),
	NULL,null,NULL,NULL,NULL,NULL,'CREADO');
	SET @proceso="OK";
	SELECT @proceso AS proceso ;
	COMMIT WORK;
    END $$
DELIMITER ;

/* Procedure structure for procedure `create_comentario_sol` */

/*!50003 DROP PROCEDURE IF EXISTS  `create_comentario_sol` */;

DELIMITER $$

 CREATE DEFINER=CURRENT_USER  PROCEDURE `create_comentario_sol`(in id_solicitud BIGINT, id_empleado TINYINT, 
    prioridad ENUM('IMPORTANTE - URGENTE','IMPORTANTE - NO URGENTE','NO IMPORTANTE - URGENTE','NO IMPORTANTE - NO URGENTE'),
    id_tipo_documento TINYINT, tipo_solicitud ENUM('CREACIÓN','ACTUALIZACIÓN','ELIMINACIÓN'), 
     estado_solicitud ENUM('CREADA','ASIGNADA','EN DESARROLLO','FINALIZADA'), codigo_documento VARCHAR(200),
     solicitud TEXT, ruta VARCHAR(200), documento VARCHAR(200), fecha_solicitud TIMESTAMP, funcionario_asignado VARCHAR(200),
     fecha_asignacion TIMESTAMP, fecha_inicio_tarea TIMESTAMP, fecha_solucion TIMESTAMP, id_solicitud_comentario bigint, 
    comentario varchar(500), usuario_comentario varchar(100), fecha_comentario timestamp, estado enum('ACTIVO','INACTIVO'))
BEGIN
	DECLARE errno INT;
	DECLARE proceso VARCHAR(5);
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
	BEGIN
	GET CURRENT DIAGNOSTICS CONDITION 1 errno = MYSQL_ERRNO;
	SET @proceso="ERROR";
	SELECT errno AS MYSQL_ERROR,@proceso AS proceso;
	ROLLBACK;
	END;
	START TRANSACTION;
	CALL create_solicitud(1,id_empleado , prioridad, id_tipo_documento , tipo_solicitud, estado_solicitud , 
	codigo_documento, solicitud , ruta, documento, CURRENT_TIMESTAMP(),'Sin Asignar',NULL,NULL,NULL);
	SELECT LAST_INSERT_ID() INTO @id_solicitud;
	INSERT INTO solicitud_comentario VALUES(NULL,@id_solicitud,"Se crea la solicitud",usuario_comentario,
	CURRENT_TIMESTAMP(), "ACTIVO");
	SET @proceso="OK";
	SELECT @proceso AS proceso ;
	COMMIT WORK;
    END $$
DELIMITER ;

/* Procedure structure for procedure `create_empleado` */

/*!50003 DROP PROCEDURE IF EXISTS  `create_empleado` */;

DELIMITER $$

CREATE DEFINER=CURRENT_USER  PROCEDURE `create_empleado`( IN id_empleado INT, nombre_completo VARCHAR(200),
img_empleado VARCHAR(200), correo_empleado VARCHAR(200), id_cargo INT, id_empresa INT, estado_empleado  ENUM('ACTIVO','INACTIVO'))
BEGIN
INSERT INTO empleado VALUES (NULL, nombre_completo,'usuario.png',correo_empleado,id_cargo,'1','ACTIVO');
    END $$
DELIMITER ;

/* Procedure structure for procedure `create_solicitud` */

/*!50003 DROP PROCEDURE IF EXISTS  `create_solicitud` */;

DELIMITER $$

 CREATE DEFINER=CURRENT_USER  PROCEDURE `create_solicitud`(IN id_solicitud bigint, id_empleado tinyint, 
    prioridad enum('IMPORTANTE - URGENTE','IMPORTANTE - NO URGENTE','NO IMPORTANTE - URGENTE','NO IMPORTANTE - NO URGENTE'),
    id_tipo_documento tinyint, tipo_solicitud enum('CREACIÓN','ACTUALIZACIÓN','ELIMINACIÓN'), 
     estado_solicitud enum('CREADA','ASIGNADA','EN DESARROLLO','FINALIZADA'), codigo_documento varchar(200),
     solicitud text, ruta VARCHAR(200), documento VARCHAR(200), fecha_solicitud TIMESTAMP, funcionario_asignado VARCHAR(200),
     fecha_asignacion TIMESTAMP, fecha_inicio_tarea TIMESTAMP, fecha_solucion TIMESTAMP)
BEGIN
	INSERT INTO solicitud VALUES (NULL , id_empleado , prioridad, id_tipo_documento , tipo_solicitud, estado_solicitud , 
	codigo_documento, solicitud , ruta, documento, CURRENT_TIMESTAMP(),'Sin Asignar',NULL,NULL,NULL);
    END $$
DELIMITER ;

/* Procedure structure for procedure `create_tarea` */

/*!50003 DROP PROCEDURE IF EXISTS  `create_tarea` */;

DELIMITER $$

CREATE DEFINER=CURRENT_USER  PROCEDURE `create_tarea`(IN id_tarea bigint(20), id_solicitud bigint(7)  )
BEGIN
    
	INSERT INTO tarea VALUES (NULL, id_solicitud );
	
    END $$
DELIMITER ;

/* Procedure structure for procedure `create_tarea_estado` */

/*!50003 DROP PROCEDURE IF EXISTS  `create_tarea_estado` */;

DELIMITER $$

 CREATE DEFINER=CURRENT_USER  PROCEDURE `create_tarea_estado`(in id_tarea BIGINT(20), id_solicitud BIGINT(7), id_tarea_estado bigint(20),  
    usuario_tarea_estado varchar(200), fecha_tarea_estado timestamp,tarea_estado enum('CREADO','REVISION','APROBACION','DEVUELTO','CAMBIO'),
     ruta VARCHAR(200), documento_tarea varchar(200) )
BEGIN
	DECLARE errno INT;
	DECLARE proceso VARCHAR(5);
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
	BEGIN
	GET CURRENT DIAGNOSTICS CONDITION 1 errno = MYSQL_ERRNO;
	SET @proceso="ERROR";
	SELECT errno AS MYSQL_ERROR,@proceso AS proceso;
	ROLLBACK;
	END;
	START TRANSACTION;
	
	CALL create_tarea(1,id_solicitud);
	SELECT LAST_INSERT_ID() INTO @id_tarea;
	INSERT INTO tarea_estado VALUES(null, @id_tarea, usuario_tarea_estado,CURRENT_TIMESTAMP(),'CREADO', ruta, null);
	
	SET @proceso="OK";
	SELECT @proceso AS proceso ;
	COMMIT WORK;
    END $$
DELIMITER ;

/* Procedure structure for procedure `create_usuario` */

/*!50003 DROP PROCEDURE IF EXISTS  `create_usuario` */;

DELIMITER $$

CREATE DEFINER=CURRENT_USER  PROCEDURE `create_usuario`(IN id_usuario INT, usuario VARCHAR(50), clave VARCHAR(50),
    id_rol INT,  estado ENUM('ACTIVO','INACTIVO','CREADO'),id_empleado INT, nombre_completo VARCHAR(200),
img_empleado VARCHAR(200), correo_empleado VARCHAR(200), id_cargo INT, id_empresa INT, estadoEmpl  ENUM('ACTIVO','INACTIVO'))
BEGIN
DECLARE errno INT;
	DECLARE proceso VARCHAR(5);
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
	BEGIN
	GET CURRENT DIAGNOSTICS CONDITION 1 errno = MYSQL_ERRNO;
	SET @proceso="ERROR";
	SELECT errno AS MYSQL_ERROR,@proceso AS proceso;
	ROLLBACK;
	END;
	START TRANSACTION;
	
	CALL create_empleado(1,nombre_completo,'usuario.png',correo_empleado,id_cargo,id_empresa,'ACTIVO');
	SELECT LAST_INSERT_ID() INTO @id_empleado;
	INSERT INTO usuario VALUES(NULL,usuario,AES_ENCRYPT(clave,'kddbjw8b3d'),id_rol,@id_empleado,'CREADO');
	
	SET @proceso="OK";
	SELECT @proceso AS proceso ;
	COMMIT WORK;
    END $$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
