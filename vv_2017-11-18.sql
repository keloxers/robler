# ************************************************************
# Sequel Pro SQL dump
# Versión 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.20)
# Base de datos: vv
# Tiempo de Generación: 2017-11-19 00:03:07 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Volcado de tabla alertas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `alertas`;

CREATE TABLE `alertas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alerta` varchar(255) NOT NULL,
  `mensaje` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla archivos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `archivos`;

CREATE TABLE `archivos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `archivo` varchar(255) DEFAULT NULL,
  `descripcion` text,
  `padre_id` int(11) NOT NULL,
  `padre` enum('articulo','clasificado') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla articulos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `articulos`;

CREATE TABLE `articulos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `categorias_id` int(11) NOT NULL,
  `tipo` enum('principal','secundaria') DEFAULT NULL,
  `articulo` varchar(255) DEFAULT NULL,
  `copete` text,
  `texto` text,
  `estado` enum('nuevo','publicado','cancelado') DEFAULT 'nuevo',
  `visitas` int(11) DEFAULT '0',
  `url_seo` varchar(255) DEFAULT NULL,
  `tags` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `comentarios` enum('si','no') DEFAULT 'si',
  PRIMARY KEY (`id`),
  KEY `fk_blog_categorias_idx` (`categorias_id`),
  KEY `fk_articulos_users1_idx` (`users_id`),
  CONSTRAINT `fk_articulos_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_blog_categorias` FOREIGN KEY (`categorias_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla auditoriavotos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `auditoriavotos`;

CREATE TABLE `auditoriavotos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(20) DEFAULT NULL,
  `encuestas_id` int(11) DEFAULT NULL,
  `respuestas_id` int(11) DEFAULT NULL,
  `session` varchar(255) DEFAULT NULL,
  `cookie` varchar(255) DEFAULT NULL,
  `os` varchar(255) NOT NULL,
  `browser` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla banners
# ------------------------------------------------------------

DROP TABLE IF EXISTS `banners`;

CREATE TABLE `banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `posicion` enum('homebig','homesmall','homelateral','articulobig','articulosmall','articuloslateral','homeinterlinea') DEFAULT 'homesmall',
  `activo` enum('si','no') DEFAULT 'si',
  `visitas` int(11) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla categorias
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categorias`;

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla clasificados
# ------------------------------------------------------------

DROP TABLE IF EXISTS `clasificados`;

CREATE TABLE `clasificados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) DEFAULT NULL,
  `clasificadoscategorias_id` int(11) DEFAULT NULL,
  `operacion` enum('vendo','compro','permuto','ofrezco','solicito') DEFAULT NULL,
  `titulo` varchar(80) NOT NULL,
  `clasificado` text,
  `precio` varchar(75) DEFAULT '0.00',
  `telefono` varchar(25) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `visitas` int(11) DEFAULT '0',
  `url_seo` varchar(255) DEFAULT NULL,
  `estado` enum('espera','publicado') DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla clasificadoscategorias
# ------------------------------------------------------------

DROP TABLE IF EXISTS `clasificadoscategorias`;

CREATE TABLE `clasificadoscategorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clasificadoscategoria` varchar(255) DEFAULT NULL,
  `icon` varchar(45) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla contactos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `contactos`;

CREATE TABLE `contactos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(75) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `contacto` text,
  `visto` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla encuestas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `encuestas`;

CREATE TABLE `encuestas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `encuesta` varchar(255) DEFAULT NULL,
  `activo` enum('si','no') DEFAULT 'no',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla farmacias
# ------------------------------------------------------------

DROP TABLE IF EXISTS `farmacias`;

CREATE TABLE `farmacias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `farmacia` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla funebres
# ------------------------------------------------------------

DROP TABLE IF EXISTS `funebres`;

CREATE TABLE `funebres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `funebre` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla groups
# ------------------------------------------------------------

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `permissions` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;

INSERT INTO `groups` (`id`, `name`, `permissions`, `created_at`, `updated_at`)
VALUES
	(1,'Users','{\"users\":1}','2014-06-02 12:11:46','2014-06-02 12:11:46'),
	(2,'Admins','{\"admin\":1,\"users\":1}','2014-06-02 12:11:46','2014-06-02 12:11:46');

/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla mensajes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `mensajes`;

CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_remitente` int(11) DEFAULT '0',
  `id_destinatario` int(11) DEFAULT '0',
  `mensaje` text,
  `estado` enum('entrada','salida','papelera','eliminado') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla ofertas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ofertas`;

CREATE TABLE `ofertas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clasificados_id` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `oferta` decimal(10,2) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla pages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pages`;

CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page` varchar(255) DEFAULT NULL,
  `html` text,
  `url_seo` varchar(45) DEFAULT NULL,
  `activo` enum('si','no') DEFAULT 'si',
  `mostrar_menu` enum('si','no') DEFAULT 'si',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `visitas` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla profesionals
# ------------------------------------------------------------

DROP TABLE IF EXISTS `profesionals`;

CREATE TABLE `profesionals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profesionalscategorias_id` int(11) NOT NULL,
  `profesional` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `estado` enum('publicado','espera') DEFAULT 'espera',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `visitas` int(11) NOT NULL DEFAULT '0',
  `horarioatencion` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Volcado de tabla profesionalscategorias
# ------------------------------------------------------------

DROP TABLE IF EXISTS `profesionalscategorias`;

CREATE TABLE `profesionalscategorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profesionalscategoria` varchar(255) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla respuestas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `respuestas`;

CREATE TABLE `respuestas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `encuestas_id` int(11) DEFAULT NULL,
  `respuesta` varchar(255) DEFAULT NULL,
  `votos` int(11) DEFAULT '0',
  `imagen` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla throttle
# ------------------------------------------------------------

DROP TABLE IF EXISTS `throttle`;

CREATE TABLE `throttle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `attempts` int(11) DEFAULT NULL,
  `suspended` tinyint(1) DEFAULT NULL,
  `banned` tinyint(1) DEFAULT NULL,
  `last_attempt_at` timestamp NULL DEFAULT NULL,
  `suspended_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `throttle` WRITE;
/*!40000 ALTER TABLE `throttle` DISABLE KEYS */;

INSERT INTO `throttle` (`id`, `user_id`, `ip_address`, `attempts`, `suspended`, `banned`, `last_attempt_at`, `suspended_at`, `banned_at`)
VALUES
	(1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `throttle` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla turnos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `turnos`;

CREATE TABLE `turnos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `turno` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(75) DEFAULT NULL,
  `email` varchar(125) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `genero` enum('masculino','femenino','no definido') DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `telefono` varchar(75) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `newsletter` tinyint(1) DEFAULT NULL,
  `permissions` text,
  `activated` tinyint(1) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `activated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `persist_code` varchar(255) DEFAULT NULL,
  `reset_password_code` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `premium` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `genero`, `fecha_nacimiento`, `telefono`, `estado`, `newsletter`, `permissions`, `activated`, `activation_code`, `activated_at`, `last_login`, `persist_code`, `reset_password_code`, `created_at`, `updated_at`, `premium`)
VALUES
	(1,NULL,'keloxers@gmail.com','$2y$10$2EEjrAJZDhZsyNCGSNOK2uJ/nXP8.oLhFRuuvgZZ4lIBlqaCdgIKG','Miguel','Mendez',NULL,NULL,'482090',NULL,NULL,NULL,1,NULL,'2014-07-23 01:47:10','2017-11-18 19:35:48','$2y$10$CX/iZjSMOK0oIDbzGlz2tewUo1SFYPbGcWUaMg7Vm5xrh9./s2Wwa',NULL,'2014-07-22 15:46:33','2017-11-18 19:35:48',0),
	(2,NULL,'virasorovirtual@gmail.com','$2y$10$ZL.qcn7qQJYP0a4WmkbhzuO.RLNNORrqtObzp1OrAm0idhz7jxfRC','Redaccion','VirasoroVirtual.com',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'2014-09-10 19:39:33','2015-03-16 21:50:26','$2y$10$wKv.DULd2XkJEXplkPd5IO68HEbJxSC85Qa3Ll4U9zgXAehTVmobG',NULL,'2014-09-10 11:31:39','2015-03-16 17:50:26',0),
	(3,NULL,'vjyacster@gmail.com','$2y$10$rBvFOrojsmE56kUeKqy87eWZKHicHbzLRqArGepL/DY75HFxLknGu','Victor','Yaczesen',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'2014-08-29 01:19:37','2017-08-11 23:08:17','$2y$10$dxK73YVz8ThkwTFDYOFvwus8sjfHk.CR5pIXOwoka6vqoxOWTZoWW',NULL,'2014-08-28 22:19:15','2017-08-11 19:08:17',0);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla users_groups
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users_groups`;

CREATE TABLE `users_groups` (
  `user_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users_groups` WRITE;
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;

INSERT INTO `users_groups` (`user_id`, `group_id`)
VALUES
	(1,1),
	(1,2),
	(2,1),
	(2,2),
	(3,1),
	(3,2),
	(4,1),
	(4,2);

/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
