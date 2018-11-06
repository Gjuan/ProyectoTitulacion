/*
SQLyog Enterprise - MySQL GUI v8.12 
MySQL - 5.5.5-10.1.29-MariaDB : Database - proyecto
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`proyecto` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `proyecto`;

/*Table structure for table `asignacion` */

DROP TABLE IF EXISTS `asignacion`;

CREATE TABLE `asignacion` (
  `id_asignacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_proyecto` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `detalle` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id_asignacion`),
  KEY `FK_asignacion` (`id_usuario`),
  KEY `FK_asignacion1` (`id_proyecto`),
  CONSTRAINT `FK_asignacion` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  CONSTRAINT `FK_asignacion1` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`id_proyecto`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `asignacion` */

LOCK TABLES `asignacion` WRITE;

insert  into `asignacion`(`id_asignacion`,`id_proyecto`,`id_usuario`,`estado`,`detalle`) values (1,1,12,'A','1'),(2,4,5,'A','Ninguno'),(3,5,1,'A','Ninguno'),(4,6,6,'A','Ninguno'),(5,7,1,'A','Ninguno'),(6,8,12,'A','Ninguno'),(7,9,12,'A','Ninguno'),(8,10,1,'A','Ninguno'),(9,13,6,'A','Ninguno'),(10,14,1,'A','Ninguno'),(11,15,1,'A','Ninguno'),(12,16,1,'A','Ninguno'),(13,17,1,'A','Ninguno'),(14,18,1,'A','Ninguno'),(15,19,1,'A','Ninguno'),(16,20,1,'A','Ninguno');

UNLOCK TABLES;

/*Table structure for table `categoria` */

DROP TABLE IF EXISTS `categoria`;

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(100) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `categoria` */

LOCK TABLES `categoria` WRITE;

insert  into `categoria`(`id_categoria`,`categoria`,`estado`) values (1,'prueba','A'),(2,'nueva','A');

UNLOCK TABLES;

/*Table structure for table `evidencia` */

DROP TABLE IF EXISTS `evidencia`;

CREATE TABLE `evidencia` (
  `id_evidencia` int(11) NOT NULL AUTO_INCREMENT,
  `detalle` varchar(1000) DEFAULT NULL,
  `ruta_doc` varchar(1000) DEFAULT NULL,
  `id_asignacion` int(11) DEFAULT NULL,
  `fecha_evi` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `porcentaje_evi` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id_evidencia`),
  KEY `FK_evidencia` (`id_asignacion`),
  CONSTRAINT `FK_evidencia` FOREIGN KEY (`id_asignacion`) REFERENCES `asignacion` (`id_asignacion`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

/*Data for the table `evidencia` */

LOCK TABLES `evidencia` WRITE;

insert  into `evidencia`(`id_evidencia`,`detalle`,`ruta_doc`,`id_asignacion`,`fecha_evi`,`porcentaje_evi`) values (1,'prueba1','\\detalle.pdf',1,'2018-09-17 10:41:24','1'),(2,'prueba2','\\detalle.pdf',1,'2018-09-17 10:41:24','2'),(7,'prueba5','\\detalle.pdf',1,'2018-09-17 10:41:24','3'),(8,'prueba1','\\detalle.pdf',1,'2018-09-17 10:41:24','4'),(9,'prueba1','\\detalle.pdf',1,'2018-09-17 10:41:24','5'),(10,'prueba1','\\detalle.pdf',1,'2018-09-17 10:41:24','6'),(11,'prueba1','\\detalle.pdf',1,'2018-09-17 10:41:24','7'),(12,'prueba10','\\detalle.pdf',1,'2018-09-17 10:41:24','8'),(25,'1','System.pdf',1,'2018-09-17 10:41:24','9'),(26,'111','REPORT.pdf',1,'2018-09-17 10:41:24','10'),(27,'1','REP.pdf',1,'2018-09-17 10:58:57','11'),(28,'sadsa','Sin título.png',1,'2018-09-17 11:04:23','50'),(29,'sss','Primeros Auxilios(1).xlsx',1,'2018-09-17 11:08:17','100'),(30,'111','PROGRAMMING(1).pdf',1,'2018-09-17 11:09:07','100'),(31,'ASDA','System.pdf',7,'2018-09-19 09:54:27','10'),(32,'11111','System.pdf',7,'2018-09-19 14:04:46','100'),(33,'111','System.pdf',1,'2018-09-19 15:34:35','100'),(34,'asa','System.pdf',5,'2018-09-21 19:15:10','100'),(35,'asasa','ssss.pdf',14,'2018-09-21 19:17:23','100'),(36,'caodsd skldsa dk','System.pdf',11,'2018-09-21 19:18:45','100'),(37,'1','ssss.pdf',10,'2018-09-21 19:22:53','100'),(38,'sd','ssss.pdf',13,'2018-09-21 19:28:17','100'),(39,'1','ssss.pdf',12,'2018-09-21 19:29:03','100'),(40,'hhhhhhhh','System.pdf',15,'2018-09-23 07:27:10','100');

UNLOCK TABLES;

/*Table structure for table `persona` */

DROP TABLE IF EXISTS `persona`;

CREATE TABLE `persona` (
  `id_persona` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `ceduala` varchar(10) DEFAULT NULL,
  `correo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `persona` */

LOCK TABLES `persona` WRITE;

insert  into `persona`(`id_persona`,`nombres`,`apellidos`,`estado`,`ceduala`,`correo`) values (1,'admin','admin',1,'2222222222','carlossoussa32@gmail.com'),(2,'user','user',1,'2222222222',NULL),(3,'user1','user1',1,'3333333333',NULL),(4,'user2','user2',1,'4444444444',NULL),(5,'user3','user3',1,'5555555555',NULL),(6,'user4','user4',1,'4444444444',NULL),(7,'user5','user5',1,'5555555555',NULL),(8,'user6','user6',1,'6666666666',NULL),(9,'user7','user7',1,'7777777777',NULL),(10,'leo','leo',1,'1207526797',NULL),(11,'s','s',1,'sd','car@gmail.com');

UNLOCK TABLES;

/*Table structure for table `proyecto` */

DROP TABLE IF EXISTS `proyecto`;

CREATE TABLE `proyecto` (
  `id_proyecto` int(11) NOT NULL AUTO_INCREMENT,
  `proyecto` varchar(1000) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_entrega` date DEFAULT NULL,
  `id_sub_categoria` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `observacion` varchar(1000) DEFAULT NULL,
  `detalle` varchar(1000) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `porcentaje` int(3) DEFAULT NULL,
  PRIMARY KEY (`id_proyecto`),
  KEY `FK_proyecto` (`id_sub_categoria`),
  CONSTRAINT `FK_proyecto` FOREIGN KEY (`id_sub_categoria`) REFERENCES `sub_categoria` (`id_sub_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `proyecto` */

LOCK TABLES `proyecto` WRITE;

insert  into `proyecto`(`id_proyecto`,`proyecto`,`fecha_creacion`,`fecha_entrega`,`id_sub_categoria`,`id_usuario`,`observacion`,`detalle`,`estado`,`porcentaje`) values (1,'AAAAAAAA','2018-09-11 09:05:06','0000-00-00',1,1,'edfd','bbbbbbbbbb','3',100),(4,'prueba','2018-09-13 10:46:56','2018-10-01',1,1,'prueba','prueba','1',0),(5,'NUEVO','2018-09-13 10:49:23','2018-10-01',1,1,'NUEVO','NUEVO','1',1),(6,'prueba1','2018-09-13 10:51:47','2018-10-01',1,1,'prueba','prueba','1',0),(7,'1111','2018-09-19 09:16:39','0000-00-00',1,1,'111','111','3',100),(8,'222','2018-09-19 09:41:38','2018-09-19',1,1,'22','2','3',0),(9,'333','2018-09-19 09:42:45','0000-00-00',1,1,'33','33','3',100),(10,'AAAAAAAA','2018-09-19 09:43:57','0000-00-00',1,1,'QQ','QQ','3',3),(13,'154','2018-09-19 09:52:05','2018-09-26',1,1,'554','454','1',0),(14,'jjjjj jjj jjj jjj','2018-09-21 14:32:04','2018-09-30',1,1,'jj','jjj','2',100),(15,'df','2018-09-21 14:33:10','2018-09-30',2,1,'hjh','hjhj','2',100),(16,'lll','2018-09-21 14:34:59','2018-09-30',1,1,'ll','lll','2',100),(17,'klkfdsk','2018-09-21 14:35:55','2018-09-30',1,1,'kk','kkk','2',100),(18,'AAAAAAAA','2018-09-21 14:36:42','0000-00-00',1,1,'QQ','111','3',100),(19,'ggg','2018-09-23 07:20:19','2018-10-05',1,1,'ggg','ggg','2',100),(20,'sdf','2018-09-23 07:57:49','2018-10-06',1,1,'jhjh','jhjh','1',0);

UNLOCK TABLES;

/*Table structure for table `rol` */

DROP TABLE IF EXISTS `rol`;

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `rol` */

LOCK TABLES `rol` WRITE;

insert  into `rol`(`id_rol`,`descripcion`,`estado`) values (1,'Admin','1'),(2,'User','2');

UNLOCK TABLES;

/*Table structure for table `sub_categoria` */

DROP TABLE IF EXISTS `sub_categoria`;

CREATE TABLE `sub_categoria` (
  `id_sub_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `sub_cat` varchar(100) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_sub_categoria`),
  KEY `FK_sub_categoria` (`id_categoria`),
  CONSTRAINT `FK_sub_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `sub_categoria` */

LOCK TABLES `sub_categoria` WRITE;

insert  into `sub_categoria`(`id_sub_categoria`,`sub_cat`,`estado`,`id_categoria`) values (1,'prueba','A',1),(2,'aaaa','A',2);

UNLOCK TABLES;

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nick_name` varchar(10) NOT NULL,
  `contrasena` varchar(50) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `estado` int(1) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `FK_usuario_persona` (`id_persona`),
  KEY `FK_usuario_rol` (`id_rol`),
  CONSTRAINT `FK_usuario_persona` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`),
  CONSTRAINT `FK_usuario_rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `usuario` */

LOCK TABLES `usuario` WRITE;

insert  into `usuario`(`id_usuario`,`nick_name`,`contrasena`,`id_persona`,`id_rol`,`estado`) values (1,'admin','827ccb0eea8a706c4c34a16891f84e7b',1,1,1),(2,'encuesta','827ccb0eea8a706c4c34a16891f84e7b',2,2,1),(3,'user1','827ccb0eea8a706c4c34a16891f84e7b',3,2,1),(4,'user2','827ccb0eea8a706c4c34a16891f84e7b',4,2,1),(5,'user3','827ccb0eea8a706c4c34a16891f84e7b',5,2,1),(6,'user4','827ccb0eea8a706c4c34a16891f84e7b',6,2,1),(7,'user5','827ccb0eea8a706c4c34a16891f84e7b',7,2,1),(11,'user6','827ccb0eea8a706c4c34a16891f84e7b',8,2,1),(12,'1207526797','94abde27171b3667e8501de37275fb40',10,2,1),(13,'1234567890','e807f1fcf82d132f9bb018ca6738a19f',10,1,1),(14,'sd','6226f7cbe59e99a90b5cef6f94f966fd',11,1,1);

UNLOCK TABLES;

/*Table structure for table `show_user` */

DROP TABLE IF EXISTS `show_user`;

/*!50001 DROP VIEW IF EXISTS `show_user` */;
/*!50001 DROP TABLE IF EXISTS `show_user` */;

/*!50001 CREATE TABLE `show_user` (
  `id_usuario` int(11) NOT NULL,
  `nick_name` varchar(10) CHARACTER SET utf8 NOT NULL,
  `contrasena` varchar(50) CHARACTER SET utf8 NOT NULL,
  `estado` int(1) NOT NULL,
  `estadouser` varchar(9) CHARACTER SET utf8 DEFAULT NULL,
  `nombrespersona` varchar(201) CHARACTER SET utf8 DEFAULT NULL,
  `ceduala` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `descripcion` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 */;

/*View structure for view show_user */

/*!50001 DROP TABLE IF EXISTS `show_user` */;
/*!50001 DROP VIEW IF EXISTS `show_user` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `show_user` AS (select `usuario`.`id_usuario` AS `id_usuario`,`usuario`.`nick_name` AS `nick_name`,`usuario`.`contrasena` AS `contrasena`,`usuario`.`estado` AS `estado`,(case when (`usuario`.`estado` = 1) then 'Activo' when (`usuario`.`estado` = 0) then 'Inactivo' when (`usuario`.`estado` = 3) then 'Eliminado' end) AS `estadouser`,concat(`persona`.`nombres`,' ',`persona`.`apellidos`) AS `nombrespersona`,`persona`.`ceduala` AS `ceduala`,`rol`.`descripcion` AS `descripcion`,`usuario`.`id_rol` AS `id_rol` from ((`usuario` join `persona`) join `rol`) where ((`usuario`.`id_persona` = `persona`.`id_persona`) and (`usuario`.`id_rol` = `rol`.`id_rol`))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
