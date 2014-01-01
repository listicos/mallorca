CREATE DATABASE  IF NOT EXISTS `mallorcavikat` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `mallorcavikat`;
-- MySQL dump 10.13  Distrib 5.6.13, for osx10.6 (i386)
--
-- Host: localhost    Database: mallorcavikat
-- ------------------------------------------------------
-- Server version	5.5.33-cll-lve

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `adjuntos`
--

DROP TABLE IF EXISTS `adjuntos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adjuntos` (
  `id_adjunto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(95) DEFAULT NULL,
  `ruta` text,
  `tipo` varchar(45) DEFAULT NULL,
  `ext` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_adjunto`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adjuntos`
--

LOCK TABLES `adjuntos` WRITE;
/*!40000 ALTER TABLE `adjuntos` DISABLE KEYS */;
INSERT INTO `adjuntos` VALUES (44,'66494-oasis-casa-vieja-en-fuerteventura.jpg','/recursos/apartamentos/6cf21f16c312e7d946a636718c2ec89b.jpg','apartamento','jpg'),(45,'83442-hotel-boutique--villa-casa-vieja.jpg','/recursos/apartamentos/14c9c1fd8cc767749995c62479772883.jpg','apartamento','jpg'),(46,'83457-hotel-boutique--villa-casa-vieja.jpg','/recursos/apartamentos/af3893a02265c6d69afd11cb905e55ff.jpg','apartamento','jpg'),(48,'66492-oasis-casa-vieja-en-fuerteventura.jpg','/recursos/apartamentos/eb5a75e63ccbb0e1d5bb8e24cc466237.jpg','apartamento','jpg'),(49,'galeria11.jpg','/recursos/apartamentos/12c359d815af965b6b3ccdf07e673018.jpg','apartamento','jpg'),(50,'66493-oasis-casa-vieja-en-fuerteventura.jpg','/recursos/apartamentos/f0f14fc0c0a9faaa2f98ba39ec351178.jpg','apartamento','jpg'),(52,'83446-hotel-boutique--villa-casa-vieja.jpg','/recursos/apartamentos/4702fd43cba7ecafee55b5bdb0e64e08.jpg','apartamento','jpg'),(53,'marbela-casa-bonita-7-mini.jpg','/recursos/apartamentos/0f94ed247481246eece792a6a2f7233b.jpg','apartamento','jpg'),(54,'harbour-view.jpg','/recursos/apartamentos/f18e9b4ad9eb33a92335ee4bff1e57ba.jpg','apartamento','jpg'),(55,'f_73854440-3c556580.jpeg','/recursos/apartamentos/10b61518560414c90e28416c8a3a99a7.jpeg','apartamento','jpeg'),(56,'harbour-view.jpg','/recursos/apartamentos/31cd08f740b9dfa463ea8a15fbd76a6c.jpg','apartamento','jpg'),(57,'Villa_de_lujo_mo_4fcf64a074f12.jpg','/recursos/apartamentos/4639e319ad730c59021f54cc637b0769.jpg','apartamento','jpg'),(59,'34070395_1.jpg','/recursos/apartamentos/789809b395fef59cb7a7021fe36fc66c.jpg','apartamento','jpg'),(60,'f_73854440-3c556580.jpeg','/recursos/apartamentos/2aa16ed9334abf6cd45c53c0dbca6501.jpeg','apartamento','jpeg'),(61,'A-staff-cottage.jpg','/recursos/apartamentos/d43761f54e6a048ee5c366a6843c3288.jpg','apartamento','jpg'),(62,'0f94ed247481246eece792a6a2f7233b.jpg','/recursos/apartamentos/0f94ed247481246eece792a6a2f7233b.jpg','apartamento','image/jpeg'),(63,'10b61518560414c90e28416c8a3a99a7.jpeg','/recursos/apartamentos/10b61518560414c90e28416c8a3a99a7.jpeg','apartamento','image/jpeg'),(64,'6cf21f16c312e7d946a636718c2ec89b.jpg','/recursos/apartamentos/6cf21f16c312e7d946a636718c2ec89b.jpg','apartamento','image/jpeg'),(65,'complejo-calas-de-mallorca.jpg','/recursos/apartamentos/complejo-calas-de-mallorca.jpg','apartamento','image/jpeg'),(66,'complejo-calas-de-mallorca (1).jpg','/recursos/apartamentos/complejo-calas-de-mallorca (1).jpg','apartamento','image/jpeg'),(68,'complejo-calas-de-mallorca (1).jpg','/recursos/apartamentos/d4ffed604dd0a192eed2847874561ca2.jpg','apartamento','jpg');
/*!40000 ALTER TABLE `adjuntos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alojamientos`
--

DROP TABLE IF EXISTS `alojamientos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alojamientos` (
  `id_alojamiento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `pax_minimo` int(11) DEFAULT NULL,
  `pax_maximo` int(11) DEFAULT NULL,
  `pax_bebe_maximo` varchar(45) DEFAULT NULL,
  `pax_ninios_minimo` varchar(45) DEFAULT NULL,
  `pax_ninios_maximo` varchar(45) DEFAULT NULL,
  `pax_adultos_maximo` varchar(45) DEFAULT NULL,
  `pax_adultos_minimo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_alojamiento`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alojamientos`
--

LOCK TABLES `alojamientos` WRITE;
/*!40000 ALTER TABLE `alojamientos` DISABLE KEYS */;
INSERT INTO `alojamientos` VALUES (1,'Habitación privada','est',2,10,'1','0','2','10','1'),(2,'Habitación compartida',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,'Casa/apto. entero',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `alojamientos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `apartamentos`
--

DROP TABLE IF EXISTS `apartamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apartamentos` (
  `id_apartamento` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa_contrato` int(11) DEFAULT NULL,
  `nombre` varchar(300) DEFAULT NULL,
  `id_apartamentos_tipo` int(11) NOT NULL,
  `id_direccion` int(11) NOT NULL,
  `id_moneda` int(11) NOT NULL,
  `horario_entrada` time DEFAULT NULL,
  `horario_salida` time DEFAULT NULL,
  `descripcion_corta` text,
  `descripcion_larga` text,
  `id_idioma` int(11) NOT NULL,
  `descripcion_servicios` text,
  `descripcion_condiciones` text,
  `tiempo_creacion` timestamp NULL DEFAULT NULL,
  `ultima_modificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `estatus` varchar(45) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `tarifa_base` double DEFAULT NULL,
  `tarifa_semana` double DEFAULT NULL,
  `tarifa_mes` double DEFAULT NULL,
  `estadia_maxima` int(11) DEFAULT NULL,
  `estadia_minima` int(11) DEFAULT NULL,
  `huesped_adicional_apartir` int(11) DEFAULT NULL,
  `huesped_adicional_costo` double DEFAULT NULL,
  `costo_limpieza` double DEFAULT NULL,
  `deposito_seguridad` double DEFAULT NULL,
  `precio_fin_semana` double DEFAULT NULL,
  `normas` text,
  `tamanio` double DEFAULT NULL,
  `capacidad_personas` int(11) DEFAULT NULL,
  `habitaciones` int(11) DEFAULT NULL,
  `camas` int(11) DEFAULT NULL,
  `tipo_cama` varchar(45) DEFAULT NULL,
  `banio` double DEFAULT NULL,
  `mascotas` tinyint(1) DEFAULT NULL,
  `manual` text,
  `cantidad` int(11) DEFAULT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `id_politica_cancelacion` int(11) DEFAULT NULL,
  `id_apartamento_descripcion` int(11) DEFAULT NULL,
  `clave_wifi` text,
  `id_complejo` int(11) DEFAULT NULL,
  `visitas` int(11) DEFAULT NULL,
  `tpv` text,
  PRIMARY KEY (`id_apartamento`),
  KEY `fk_apartamentos_apartamentos_tipos1_idx` (`id_apartamentos_tipo`),
  KEY `fk_apartamentos_direcciones1_idx` (`id_direccion`),
  KEY `fk_apartamentos_monedas1_idx` (`id_moneda`),
  KEY `fk_apartamentos_idiomas1_idx` (`id_idioma`),
  KEY `fk_apartamentos_usuarios1_idx` (`id_usuario`),
  KEY `fk_apartamentos_empresas_contratos1_idx` (`id_empresa_contrato`),
  KEY `fk_apartamentos_politicas_cancelacion1_idx` (`id_politica_cancelacion`),
  KEY `fk_apartamentos_apartamentos_descripcion1_idx` (`id_apartamento_descripcion`),
  KEY `fk_apartamento_complejo1` (`id_complejo`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apartamentos`
--

LOCK TABLES `apartamentos` WRITE;
/*!40000 ALTER TABLE `apartamentos` DISABLE KEYS */;
INSERT INTO `apartamentos` VALUES (3,2,'Ca s\'Hereu',4,5,1,'15:00:00','12:00:00','','<p>El chalet vacacional Cala Mand&iacute;a se encuentra ubicado en una de las zonas residenciales de Cala Millor, que pertenece al municipio de Son Servera.</p>\r\n\r\n<p>Adem&aacute;s, la propiedad de encuentra a 500 de la playa de arena.</p>\r\n\r\n<p>Pueden disfrutar de una piscina privada de 6,5x4 metros completamente vallada, para la seguridad de los ni&ntilde;os y la tranquiilidad de los padres, junto con una terraza sol&aacute;rium.</p>\r\n\r\n<p>Adem&aacute;s, disponen de porche con comedor exterior y una barbacoa de carb&oacute;n en la parte trasera.</p>\r\n\r\n<p>La casa est&aacute; distribuida en dos plantas.</p>\r\n\r\n<p>En el piso inferior hay un espacio abierto formado por un gran sal&oacute;n, con Tv v&iacute;a sat&eacute;lite, equipo de m&uacute;sica y chimenea, y un gran comedor ideal para seis u ocho comensales.</p>\r\n\r\n<p>Desde la sala se accede directamente al porche y a la piscina..</p>\r\n\r\n<p>La amplia cocina est&aacute; totalmente equipada. En la planta baja tambi&eacute;n est&aacute; el aseo y el ba&ntilde;o de invitados con ducha incluida, que va genial depu&eacute;s de refrescarse en la piscina.</p>\r\n\r\n<p>Unas escaleras impresionantes nos conducen al hall del piso superior, desde donde se accede a todas las habitaciones.</p>\r\n\r\n<p>Todas las habitaciones se caracterizan por ser muy espaciosas y c&oacute;modas.</p>\r\n\r\n<p>El dormitorio principal cuenta con aire acondicionado, cama de matrimonio, un amplio armario y acceso al balc&oacute;n con vistas a la piscina.</p>\r\n\r\n<p>Hay otro dormitorio que cuenta con aire acondicionado; &eacute;ste est&aacute; adaptado para ni&ntilde;os, ya que se encuentra amueblado con litera y tiene espacio suficiente para que los ni&ntilde;os puedan jugar.</p>\r\n\r\n<p>El tercer y el cuarto dormitorio tambi&eacute;n tienen acceso al balc&oacute;n con vistas a la piscina, al igual que el dormitorio principal.</p>\r\n\r\n<p>Uno est&aacute; equipado con cama de matrimonio y el otro con dos camas individuales, este &uacute;ltimo tambi&eacute;n posee ba&ntilde;o en suite con ba&ntilde;era. El otro cuarto de ba&ntilde;o de esta planta es el m&aacute;s grande de la casa y cuenta con ba&ntilde;era y lavabo doble.</p>\r\n\r\n<p>Hay conexi&oacute;n Wi-fi en toda la casa, una caja de seguridad y garaje privado.</p>\r\n\r\n<p>Adem&aacute;s de en los dos dormitorios mencionados, hay aire acondicionado tambi&eacute;n en la sala de estar-comedor.</p>\r\n',1,'','','2013-08-23 03:58:00','2013-12-16 04:03:37','',1,0,0,0,7,1,0,0,0,0,0,' Ca s\'Hereu ',70,6,2,4,'',2,1,'',1,'',1,NULL,'12312323',NULL,232,'<p>Este es un mensaje!</p>\r\n'),(22,5,'Villa de lujo ****',1,25,1,'15:00:00','12:00:00','','<p><strong>Situado en el municipio majorero de La Oliva, este esplendido hotel rural esta reconstruido sobre las ruinas de una antigua casona de estilo r&uacute;stico de principios del S.XX. </strong></p>\r\n\r\n<p><strong>Peque&ntilde;o hotel compuesto por 10 habitaciones con amplias zonas ajardinadas y piscina Posee un patio interior con jard&iacute;n y otro exterior con terraza cubierta de estilo canario.</strong></p>\r\n',1,'','','2013-11-28 19:35:01','2013-12-16 05:48:31','',1,0,0,0,7,1,0,0,0,0,0,' Villa de lujo **** ',0,4,2,4,'',2,1,'',1,'',NULL,NULL,'',0,65,'<p><strong>Este es un mensaje de la TPV</strong></p>\r\n'),(23,6,'TEST',8,26,1,'15:00:00','12:00:00','','<p>TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST DESCRIPCION&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST DESCRIPCION&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST DESCRIPCION&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST DESCRIPCION&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST&nbsp;TEST DESCRIPCION&nbsp;</p>\r\n',1,'','','2013-12-16 18:09:08','2013-12-16 18:09:08','',1,0,0,0,7,1,0,0,0,0,0,'',0,4,2,4,'',1,1,'',NULL,'',NULL,NULL,'',1,NULL,'<p>123123</p>\r\n');
/*!40000 ALTER TABLE `apartamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `apartamentos_adjuntos`
--

DROP TABLE IF EXISTS `apartamentos_adjuntos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apartamentos_adjuntos` (
  `id_apartamento` int(11) NOT NULL,
  `id_adjunto` int(11) NOT NULL,
  `id_apartamento_adjunto` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_apartamento_adjunto`),
  KEY `fk_apartamentos_has_adjuntos_adjuntos1_idx` (`id_adjunto`),
  KEY `fk_apartamentos_has_adjuntos_apartamentos1_idx` (`id_apartamento`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apartamentos_adjuntos`
--

LOCK TABLES `apartamentos_adjuntos` WRITE;
/*!40000 ALTER TABLE `apartamentos_adjuntos` DISABLE KEYS */;
INSERT INTO `apartamentos_adjuntos` VALUES (22,44,42),(22,45,43),(22,46,44),(22,48,46),(22,49,47),(22,50,48),(22,52,50),(3,53,51),(3,54,52),(3,55,53),(22,56,54),(22,57,55),(22,59,57),(22,60,58),(22,61,59),(23,68,61);
/*!40000 ALTER TABLE `apartamentos_adjuntos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `apartamentos_alojamientos`
--

DROP TABLE IF EXISTS `apartamentos_alojamientos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apartamentos_alojamientos` (
  `id_apartamento` int(11) NOT NULL,
  `id_alojamiento` int(11) NOT NULL,
  `id_apartamento_alojamiento` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_apartamento_alojamiento`),
  KEY `fk_apartamentos_has_alojamientos_alojamientos1_idx` (`id_alojamiento`),
  KEY `fk_apartamentos_has_alojamientos_apartamentos1_idx` (`id_apartamento`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apartamentos_alojamientos`
--

LOCK TABLES `apartamentos_alojamientos` WRITE;
/*!40000 ALTER TABLE `apartamentos_alojamientos` DISABLE KEYS */;
INSERT INTO `apartamentos_alojamientos` VALUES (3,1,22);
/*!40000 ALTER TABLE `apartamentos_alojamientos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `apartamentos_articulos`
--

DROP TABLE IF EXISTS `apartamentos_articulos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apartamentos_articulos` (
  `id_apartamento` int(11) NOT NULL,
  `id_articulo` int(11) NOT NULL,
  `id_apartamento_articulo` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_apartamento_articulo`),
  KEY `fk_apartamentos_has_articulos_articulos1_idx` (`id_articulo`),
  KEY `fk_apartamentos_has_articulos_apartamentos1_idx` (`id_apartamento`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apartamentos_articulos`
--

LOCK TABLES `apartamentos_articulos` WRITE;
/*!40000 ALTER TABLE `apartamentos_articulos` DISABLE KEYS */;
INSERT INTO `apartamentos_articulos` VALUES (3,1,8);
/*!40000 ALTER TABLE `apartamentos_articulos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `apartamentos_descripcion`
--

DROP TABLE IF EXISTS `apartamentos_descripcion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apartamentos_descripcion` (
  `id_apartamento_descripcion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text,
  `descripcion_corta` text,
  `descripcion_larga` text,
  `descripcion_servicios` text,
  `descripcion_condiciones` text,
  `normas` text,
  `manual` text,
  `id_idioma` int(11) NOT NULL,
  PRIMARY KEY (`id_apartamento_descripcion`),
  KEY `fk_apartamentos_descripcion_idiomas1_idx` (`id_idioma`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apartamentos_descripcion`
--

LOCK TABLES `apartamentos_descripcion` WRITE;
/*!40000 ALTER TABLE `apartamentos_descripcion` DISABLE KEYS */;
/*!40000 ALTER TABLE `apartamentos_descripcion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `apartamentos_documentos`
--

DROP TABLE IF EXISTS `apartamentos_documentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apartamentos_documentos` (
  `id_apartamento_documento` int(11) NOT NULL AUTO_INCREMENT,
  `id_apartamento` int(11) NOT NULL,
  `id_adjunto` int(11) NOT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_apartamento_documento`),
  KEY `fk_apartamentos_documentos_apartamentos1_idx` (`id_apartamento`),
  KEY `fk_apartamentos_documentos_adjuntos1_idx` (`id_adjunto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apartamentos_documentos`
--

LOCK TABLES `apartamentos_documentos` WRITE;
/*!40000 ALTER TABLE `apartamentos_documentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `apartamentos_documentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `apartamentos_instalaciones`
--

DROP TABLE IF EXISTS `apartamentos_instalaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apartamentos_instalaciones` (
  `id_apartamento` int(11) NOT NULL,
  `id_instalacion` int(11) NOT NULL,
  `id_apartamento_instalacion` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_apartamento_instalacion`),
  KEY `fk_apartamentos_has_instalaciones_instalaciones1_idx` (`id_instalacion`),
  KEY `fk_apartamentos_has_instalaciones_apartamentos1_idx` (`id_apartamento`)
) ENGINE=InnoDB AUTO_INCREMENT=872 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apartamentos_instalaciones`
--

LOCK TABLES `apartamentos_instalaciones` WRITE;
/*!40000 ALTER TABLE `apartamentos_instalaciones` DISABLE KEYS */;
INSERT INTO `apartamentos_instalaciones` VALUES (3,105,744),(3,106,745),(3,110,746),(3,111,747),(3,112,748),(3,113,749),(3,114,750),(3,115,751),(3,116,752),(3,117,753),(3,118,754),(3,131,755),(3,132,756),(3,134,757),(3,135,758),(3,136,759),(3,137,760),(3,138,761),(3,140,762),(3,141,763),(3,145,764),(3,146,765),(3,147,766),(3,151,767),(3,154,768),(3,157,769),(3,177,770),(3,179,771),(3,189,772),(3,192,773),(3,204,774),(3,205,775),(3,206,776),(3,207,777),(3,208,778),(3,209,779),(3,210,780),(3,211,781),(3,212,782),(3,213,783),(3,215,784),(3,217,785),(3,228,786),(3,230,787),(3,231,788),(3,234,789),(3,235,790),(3,219,791),(3,222,792),(22,105,853),(22,109,854),(22,112,855),(22,115,856),(22,118,857),(22,212,858),(22,215,859),(22,217,860),(22,230,861),(22,234,862),(22,219,863),(22,222,864),(23,105,865),(23,109,866),(23,112,867),(23,113,868),(23,116,869),(23,131,870),(23,135,871);
/*!40000 ALTER TABLE `apartamentos_instalaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `apartamentos_lugares_cercanos`
--

DROP TABLE IF EXISTS `apartamentos_lugares_cercanos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apartamentos_lugares_cercanos` (
  `id_apartamento` int(11) NOT NULL,
  `id_lugar_cercano` int(11) NOT NULL,
  `id_apartamento_lugar_cercano` int(11) NOT NULL AUTO_INCREMENT,
  `valor` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_apartamento_lugar_cercano`),
  KEY `fk_apartamentos_has_lugares_cercanos_lugares_cercanos1_idx` (`id_lugar_cercano`),
  KEY `fk_apartamentos_has_lugares_cercanos_apartamentos1_idx` (`id_apartamento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apartamentos_lugares_cercanos`
--

LOCK TABLES `apartamentos_lugares_cercanos` WRITE;
/*!40000 ALTER TABLE `apartamentos_lugares_cercanos` DISABLE KEYS */;
/*!40000 ALTER TABLE `apartamentos_lugares_cercanos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `apartamentos_pagos_tipos`
--

DROP TABLE IF EXISTS `apartamentos_pagos_tipos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apartamentos_pagos_tipos` (
  `id_apartamento` int(11) NOT NULL,
  `id_pago_tipo` int(11) NOT NULL,
  `id_apartamento_pago_tipo` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_apartamento_pago_tipo`),
  KEY `fk_apartamentos_has_pagos_tipos_pagos_tipos1_idx` (`id_pago_tipo`),
  KEY `fk_apartamentos_has_pagos_tipos_apartamentos1_idx` (`id_apartamento`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apartamentos_pagos_tipos`
--

LOCK TABLES `apartamentos_pagos_tipos` WRITE;
/*!40000 ALTER TABLE `apartamentos_pagos_tipos` DISABLE KEYS */;
INSERT INTO `apartamentos_pagos_tipos` VALUES (3,1,59),(3,2,60),(3,3,61),(3,4,62),(3,5,63);
/*!40000 ALTER TABLE `apartamentos_pagos_tipos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `apartamentos_tipos`
--

DROP TABLE IF EXISTS `apartamentos_tipos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apartamentos_tipos` (
  `id_apartamentos_tipo` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_apartamentos_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apartamentos_tipos`
--

LOCK TABLES `apartamentos_tipos` WRITE;
/*!40000 ALTER TABLE `apartamentos_tipos` DISABLE KEYS */;
INSERT INTO `apartamentos_tipos` VALUES (1,'Agroturismo'),(2,'Turismo Rural'),(3,'Villa'),(4,'Villa de Lujo'),(5,'Casa'),(6,'Habitación'),(7,'Apartamento'),(8,'Bungalow');
/*!40000 ALTER TABLE `apartamentos_tipos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articulos`
--

DROP TABLE IF EXISTS `articulos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articulos` (
  `id_articulo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) DEFAULT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `id_articulo_tipo` int(11) NOT NULL,
  `precio_base` double DEFAULT NULL,
  `por_persona` tinyint(1) DEFAULT NULL,
  `configurar_por` varchar(45) DEFAULT NULL,
  `pax_minimo` varchar(45) DEFAULT NULL,
  `pax_maximo` varchar(45) DEFAULT NULL,
  `regular_stock` varchar(45) DEFAULT NULL,
  `solo_adultos` tinyint(1) DEFAULT NULL,
  `solo_ninios` tinyint(1) DEFAULT NULL,
  `consumo_obligatorio` tinyint(1) DEFAULT NULL,
  `establecer_horarios` text,
  `descripcion` text,
  `id_idioma` int(11) NOT NULL,
  PRIMARY KEY (`id_articulo`),
  KEY `fk_articulos_articulos_tipos1_idx` (`id_articulo_tipo`),
  KEY `fk_articulos_idiomas1_idx` (`id_idioma`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articulos`
--

LOCK TABLES `articulos` WRITE;
/*!40000 ALTER TABLE `articulos` DISABLE KEYS */;
INSERT INTO `articulos` VALUES (1,'Silla para bebé','200',1,100,NULL,'','','','',NULL,NULL,NULL,'','123123',1);
/*!40000 ALTER TABLE `articulos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articulos_adjuntos`
--

DROP TABLE IF EXISTS `articulos_adjuntos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articulos_adjuntos` (
  `id_articulo` int(11) NOT NULL,
  `id_adjunto` int(11) NOT NULL,
  `id_articulo_adjunto` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_articulo_adjunto`),
  KEY `fk_articulos_has_adjuntos_adjuntos1_idx` (`id_adjunto`),
  KEY `fk_articulos_has_adjuntos_articulos1_idx` (`id_articulo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articulos_adjuntos`
--

LOCK TABLES `articulos_adjuntos` WRITE;
/*!40000 ALTER TABLE `articulos_adjuntos` DISABLE KEYS */;
/*!40000 ALTER TABLE `articulos_adjuntos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articulos_tipos`
--

DROP TABLE IF EXISTS `articulos_tipos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articulos_tipos` (
  `id_articulo_tipo` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_articulo_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articulos_tipos`
--

LOCK TABLES `articulos_tipos` WRITE;
/*!40000 ALTER TABLE `articulos_tipos` DISABLE KEYS */;
INSERT INTO `articulos_tipos` VALUES (1,'Objetos');
/*!40000 ALTER TABLE `articulos_tipos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `canales`
--

DROP TABLE IF EXISTS `canales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `canales` (
  `id_canal` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `comision` double DEFAULT NULL,
  `senia` double DEFAULT NULL,
  `dias_tolerancia` int(11) DEFAULT NULL,
  `porcentaje_comision` double DEFAULT NULL,
  PRIMARY KEY (`id_canal`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `canales`
--

LOCK TABLES `canales` WRITE;
/*!40000 ALTER TABLE `canales` DISABLE KEYS */;
INSERT INTO `canales` VALUES (1,'',0,0,10,0),(2,'Clickandbooking',10,2,10,5);
/*!40000 ALTER TABLE `canales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ciudades`
--

DROP TABLE IF EXISTS `ciudades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ciudades` (
  `id_ciudad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `id_provincia` int(11) NOT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_ciudad`),
  KEY `fk_ciudades_provincias1_idx` (`id_provincia`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ciudades`
--

LOCK TABLES `ciudades` WRITE;
/*!40000 ALTER TABLE `ciudades` DISABLE KEYS */;
INSERT INTO `ciudades` VALUES (1,'Cambrils',1,'cmb'),(2,'La pineda',1,'lap'),(3,'Salou',1,NULL),(4,'Tarragona',1,NULL);
/*!40000 ALTER TABLE `ciudades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `complejos`
--

DROP TABLE IF EXISTS `complejos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `complejos` (
  `id_complejo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` text,
  PRIMARY KEY (`id_complejo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `complejos`
--

LOCK TABLES `complejos` WRITE;
/*!40000 ALTER TABLE `complejos` DISABLE KEYS */;
INSERT INTO `complejos` VALUES (1,'Complejo bonito','Lorem ipsum ad his scripta blandit partiendo, eum fastidii accumsan euripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, quo dicit ridens inciderint id. Quo mundi lobortis reformidans eu, legimus senserit definiebas an eos. Eu sit tincidunt incorrupte definitionem, vis mutat affert percipit cu, eirmod consectetuer signiferumque eu per. In usu latine equidem dolores. Quo no falli viris intellegam, ut fugit veritus placerat per.\r\nIus id vidit volumus mandamus, vide veritus democritum te nec, ei eos debet libris consulatu. No mei ferri graeco dicunt, ad cum veri accommodare. Sed at malis omnesque delicata, usu et iusto zzril meliore. Dicunt maiorum eloquentiam cum cu, sit summo dolor essent te. Ne quodsi nusquam legendos has, ea dicit voluptua eloquentiam pro, ad sit quas qualisque. Eos vocibus deserunt quaestio ei.'),(2,'Oasis Casa Vieja',NULL);
/*!40000 ALTER TABLE `complejos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `complejos_adjuntos`
--

DROP TABLE IF EXISTS `complejos_adjuntos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `complejos_adjuntos` (
  `id_complejo_adjunto` int(11) NOT NULL AUTO_INCREMENT,
  `id_complejo` int(11) DEFAULT NULL,
  `id_adjunto` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_complejo_adjunto`),
  KEY `fk_complejo_adjunto1_idx` (`id_adjunto`),
  KEY `fk_complejo_adjuntoc1_idx` (`id_complejo`),
  CONSTRAINT `fk_complejo_adjunto1` FOREIGN KEY (`id_adjunto`) REFERENCES `adjuntos` (`id_adjunto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_complejo_adjuntoc1` FOREIGN KEY (`id_complejo`) REFERENCES `complejos` (`id_complejo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `complejos_adjuntos`
--

LOCK TABLES `complejos_adjuntos` WRITE;
/*!40000 ALTER TABLE `complejos_adjuntos` DISABLE KEYS */;
INSERT INTO `complejos_adjuntos` VALUES (1,1,62),(2,1,63),(3,2,64),(4,1,65),(5,1,66);
/*!40000 ALTER TABLE `complejos_adjuntos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `complejos_apartamentos`
--

DROP TABLE IF EXISTS `complejos_apartamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `complejos_apartamentos` (
  `id_complejo` int(11) NOT NULL,
  `id_apartamento` int(11) NOT NULL,
  `id_complejo_apartamento` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_complejo_apartamento`),
  KEY `fk_complejos_has_apartamentos_apartamentos1_idx` (`id_apartamento`),
  KEY `fk_complejos_has_apartamentos_complejos1_idx` (`id_complejo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `complejos_apartamentos`
--

LOCK TABLES `complejos_apartamentos` WRITE;
/*!40000 ALTER TABLE `complejos_apartamentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `complejos_apartamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `condiciones_compra`
--

DROP TABLE IF EXISTS `condiciones_compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `condiciones_compra` (
  `id_condicion_compra` int(11) NOT NULL AUTO_INCREMENT,
  `id_apartamento` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_condicion_compra`),
  KEY `fk_condiciones_compra_apartamentos1_idx` (`id_apartamento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `condiciones_compra`
--

LOCK TABLES `condiciones_compra` WRITE;
/*!40000 ALTER TABLE `condiciones_compra` DISABLE KEYS */;
/*!40000 ALTER TABLE `condiciones_compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `configuracion`
--

DROP TABLE IF EXISTS `configuracion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `configuracion` (
  `id_configuracion` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(300) DEFAULT NULL,
  `username` varchar(300) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `servidor` varchar(300) DEFAULT NULL,
  `puerto` int(11) DEFAULT NULL,
  `id_direccion` int(11) NOT NULL,
  `nombre_empresa` text,
  `empresa_cif` varchar(20) DEFAULT NULL,
  `telefonos_contacto` text,
  `email_contacto` text,
  `facebook` varchar(100) DEFAULT NULL,
  `twitter` varchar(200) DEFAULT NULL,
  `vimeo` varchar(200) DEFAULT NULL,
  `rss` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_configuracion`),
  KEY `fk_config_direcciones1_idx` (`id_direccion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `configuracion`
--

LOCK TABLES `configuracion` WRITE;
/*!40000 ALTER TABLE `configuracion` DISABLE KEYS */;
INSERT INTO `configuracion` VALUES (2,'ruben.listico@gmail.com','ruben.listico@gmail.com','534%$DcdE23','smtp.gmail.com',465,69,'Agroturisme Ses Cases Noves SL','B57066615','(0034) 971 569785, (0034) 657 478526','info@mallorcarenthaus.com','https://www.facebook.com/SesCasesNoves','','','');
/*!40000 ALTER TABLE `configuracion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contratos`
--

DROP TABLE IF EXISTS `contratos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contratos` (
  `id_contrato` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `tiempo_creacion` timestamp NULL DEFAULT NULL,
  `ultima_modificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `precio` double DEFAULT NULL,
  `porcentaje` double DEFAULT NULL,
  `descripcion` text,
  `semana_gratis` tinyint(1) DEFAULT NULL,
  `especiales` tinyint(1) DEFAULT NULL,
  `reservas_ultimo_minuto` tinyint(1) DEFAULT NULL,
  `reservas_anticipadas` tinyint(1) DEFAULT NULL,
  `alquileres_larga_estancia` tinyint(1) DEFAULT NULL,
  `firmado` tinyint(1) DEFAULT NULL,
  `dias_larga_estancia` int(11) DEFAULT NULL,
  `porciento_larga_estancia` int(11) DEFAULT NULL,
  `meses_reservas_anticipadas` int(11) DEFAULT NULL,
  `porciento_reservas_anticipadas` int(11) DEFAULT NULL,
  `dias_reservas_ultimo_minuto` int(11) DEFAULT NULL,
  `porciento_reservas_ultimo_minuto` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_contrato`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contratos`
--

LOCK TABLES `contratos` WRITE;
/*!40000 ALTER TABLE `contratos` DISABLE KEYS */;
INSERT INTO `contratos` VALUES (1,'Comisionable','2013-07-03 17:00:00','2013-10-18 15:56:24',20,30,'Este es un contrato comisionable',0,0,1,1,1,0,28,20,9,10,10,33),(2,'Garantizado','2013-07-04 18:54:27','2013-07-04 18:54:41',400,0,'Este es un contrato garantizado',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,'','2013-11-15 08:20:16','0000-00-00 00:00:00',0,0,'',0,0,0,0,0,0,0,0,0,0,0,0),(4,'','2013-11-20 04:14:40','0000-00-00 00:00:00',0,0,'',0,0,0,0,0,0,0,0,0,0,0,0),(5,'','2013-12-14 23:00:00','0000-00-00 00:00:00',0,0,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,'','2013-12-15 23:00:00','0000-00-00 00:00:00',0,0,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `contratos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contratos_fechas`
--

DROP TABLE IF EXISTS `contratos_fechas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contratos_fechas` (
  `id_disponibilidad` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_final` datetime DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `anotacion` text,
  `id_contrato` int(11) NOT NULL,
  PRIMARY KEY (`id_disponibilidad`),
  KEY `fk_contratos_fechas_contratos1_idx` (`id_contrato`)
) ENGINE=InnoDB AUTO_INCREMENT=270 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contratos_fechas`
--

LOCK TABLES `contratos_fechas` WRITE;
/*!40000 ALTER TABLE `contratos_fechas` DISABLE KEYS */;
INSERT INTO `contratos_fechas` VALUES (1,'2013-10-30 00:00:00','2013-10-30 00:00:00',123,'',1),(2,'2013-10-31 00:00:00','2013-10-31 00:00:00',123,'',1),(3,'2013-11-07 00:00:00','2013-11-07 00:00:00',100,'',1),(4,'2013-11-08 00:00:00','2013-11-08 00:00:00',100,'',1),(5,'2013-11-09 00:00:00','2013-11-09 00:00:00',100,'',1),(6,'2013-11-10 00:00:00','2013-11-10 00:00:00',100,'',1),(7,'2013-11-11 00:00:00','2013-11-11 00:00:00',100,'',1),(8,'2013-11-12 00:00:00','2013-11-12 00:00:00',100,'',1),(9,'2013-11-13 00:00:00','2013-11-13 00:00:00',100,'',1),(10,'2013-11-14 00:00:00','2013-11-14 00:00:00',100,'',1),(11,'2013-11-15 00:00:00','2013-11-15 00:00:00',100,'',1),(12,'2013-11-16 00:00:00','2013-11-16 00:00:00',100,'',1),(13,'2013-11-17 00:00:00','2013-11-17 00:00:00',100,'',1),(14,'2013-11-18 00:00:00','2013-11-18 00:00:00',100,'',1),(15,'2013-11-19 00:00:00','2013-11-19 00:00:00',100,'',1),(16,'2013-11-20 00:00:00','2013-11-20 00:00:00',100,'',1),(17,'2013-11-21 00:00:00','2013-11-21 00:00:00',100,'',1),(18,'2013-11-22 00:00:00','2013-11-22 00:00:00',100,'',1),(19,'2013-11-23 00:00:00','2013-11-23 00:00:00',100,'',1),(20,'2013-11-24 00:00:00','2013-11-24 00:00:00',100,'',1),(21,'2013-11-25 00:00:00','2013-11-25 00:00:00',100,'',1),(22,'2013-11-26 00:00:00','2013-11-26 00:00:00',100,'',1),(23,'2013-11-27 00:00:00','2013-11-27 00:00:00',100,'',1),(24,'2013-11-28 00:00:00','2013-11-28 00:00:00',100,'',1),(25,'2013-11-29 00:00:00','2013-11-29 00:00:00',100,'',1),(26,'2013-11-30 00:00:00','2013-11-30 00:00:00',100,'',1),(27,'2013-12-01 00:00:00','2013-12-01 00:00:00',100,'',1),(28,'2013-12-02 00:00:00','2013-12-02 00:00:00',100,'',1),(29,'2013-12-03 00:00:00','2013-12-03 00:00:00',100,'',1),(30,'2013-12-04 00:00:00','2013-12-04 00:00:00',100,'',1),(31,'2013-12-05 00:00:00','2013-12-05 00:00:00',100,'',1),(32,'2013-12-06 00:00:00','2013-12-06 00:00:00',100,'',1),(33,'2013-12-07 00:00:00','2013-12-07 00:00:00',100,'',1),(34,'2013-12-08 00:00:00','2013-12-08 00:00:00',100,'',1),(35,'2013-12-09 00:00:00','2013-12-09 00:00:00',100,'',1),(36,'2013-12-10 00:00:00','2013-12-10 00:00:00',100,'',1),(37,'2013-12-11 00:00:00','2013-12-11 00:00:00',100,'',1),(38,'2013-12-12 00:00:00','2013-12-12 00:00:00',100,'',1),(39,'2013-12-13 00:00:00','2013-12-13 00:00:00',100,'',1),(40,'2013-12-14 00:00:00','2013-12-14 00:00:00',100,'',1),(41,'2013-12-15 00:00:00','2013-12-15 00:00:00',100,'',1),(42,'2013-12-16 00:00:00','2013-12-16 00:00:00',100,'',1),(43,'2013-12-17 00:00:00','2013-12-17 00:00:00',100,'',1),(44,'2013-12-18 00:00:00','2013-12-18 00:00:00',100,'',1),(45,'2013-12-19 00:00:00','2013-12-19 00:00:00',100,'',1),(46,'2013-12-20 00:00:00','2013-12-20 00:00:00',100,'',1),(47,'2013-12-21 00:00:00','2013-12-21 00:00:00',100,'',1),(48,'2013-12-22 00:00:00','2013-12-22 00:00:00',100,'',1),(49,'2013-12-23 00:00:00','2013-12-23 00:00:00',100,'',1),(50,'2013-12-24 00:00:00','2013-12-24 00:00:00',100,'',1),(51,'2013-12-25 00:00:00','2013-12-25 00:00:00',100,'',1),(52,'2013-12-26 00:00:00','2013-12-26 00:00:00',100,'',1),(53,'2013-12-27 00:00:00','2013-12-27 00:00:00',100,'',1),(54,'2013-12-28 00:00:00','2013-12-28 00:00:00',100,'',1),(55,'2013-12-29 00:00:00','2013-12-29 00:00:00',100,'',1),(56,'2013-12-30 00:00:00','2013-12-30 00:00:00',100,'',1),(57,'2013-12-31 00:00:00','2013-12-31 00:00:00',100,'',1),(58,'2014-01-01 00:00:00','2014-01-01 00:00:00',100,'',1),(59,'2014-01-02 00:00:00','2014-01-02 00:00:00',100,'',1),(60,'2014-01-03 00:00:00','2014-01-03 00:00:00',100,'',1),(61,'2014-01-04 00:00:00','2014-01-04 00:00:00',100,'',1),(62,'2014-01-05 00:00:00','2014-01-05 00:00:00',100,'',1),(63,'2014-01-06 00:00:00','2014-01-06 00:00:00',100,'',1),(64,'2014-01-07 00:00:00','2014-01-07 00:00:00',100,'',1),(65,'2014-01-08 00:00:00','2014-01-08 00:00:00',100,'',1),(66,'2014-01-09 00:00:00','2014-01-09 00:00:00',100,'',1),(67,'2014-01-10 00:00:00','2014-01-10 00:00:00',100,'',1),(68,'2014-01-11 00:00:00','2014-01-11 00:00:00',100,'',1),(69,'2014-01-12 00:00:00','2014-01-12 00:00:00',100,'',1),(70,'2014-01-13 00:00:00','2014-01-13 00:00:00',100,'',1),(71,'2014-01-14 00:00:00','2014-01-14 00:00:00',100,'',1),(72,'2014-01-15 00:00:00','2014-01-15 00:00:00',100,'',1),(73,'2014-01-16 00:00:00','2014-01-16 00:00:00',100,'',1),(74,'2014-01-17 00:00:00','2014-01-17 00:00:00',100,'',1),(75,'2014-01-18 00:00:00','2014-01-18 00:00:00',100,'',1),(76,'2014-01-19 00:00:00','2014-01-19 00:00:00',100,'',1),(77,'2014-01-20 00:00:00','2014-01-20 00:00:00',100,'',1),(78,'2014-01-21 00:00:00','2014-01-21 00:00:00',100,'',1),(79,'2014-01-22 00:00:00','2014-01-22 00:00:00',100,'',1),(80,'2014-01-23 00:00:00','2014-01-23 00:00:00',100,'',1),(81,'2014-01-24 00:00:00','2014-01-24 00:00:00',100,'',1),(82,'2014-01-25 00:00:00','2014-01-25 00:00:00',100,'',1),(83,'2014-01-26 00:00:00','2014-01-26 00:00:00',100,'',1),(84,'2014-01-27 00:00:00','2014-01-27 00:00:00',100,'',1),(85,'2014-01-28 00:00:00','2014-01-28 00:00:00',100,'',1),(86,'2014-01-29 00:00:00','2014-01-29 00:00:00',100,'',1),(87,'2014-01-30 00:00:00','2014-01-30 00:00:00',100,'',1),(88,'2014-01-31 00:00:00','2014-01-31 00:00:00',100,'',1),(89,'2014-02-01 00:00:00','2014-02-01 00:00:00',100,'',1),(90,'2014-02-02 00:00:00','2014-02-02 00:00:00',100,'',1),(91,'2014-02-03 00:00:00','2014-02-03 00:00:00',100,'',1),(92,'2014-02-04 00:00:00','2014-02-04 00:00:00',100,'',1),(93,'2014-02-05 00:00:00','2014-02-05 00:00:00',100,'',1),(94,'2014-02-06 00:00:00','2014-02-06 00:00:00',100,'',1),(95,'2014-02-07 00:00:00','2014-02-07 00:00:00',100,'',1),(96,'2014-02-08 00:00:00','2014-02-08 00:00:00',100,'',1),(97,'2014-02-09 00:00:00','2014-02-09 00:00:00',100,'',1),(98,'2014-02-10 00:00:00','2014-02-10 00:00:00',100,'',1),(99,'2014-02-11 00:00:00','2014-02-11 00:00:00',100,'',1),(100,'2014-02-12 00:00:00','2014-02-12 00:00:00',100,'',1),(101,'2014-02-13 00:00:00','2014-02-13 00:00:00',100,'',1),(102,'2014-02-14 00:00:00','2014-02-14 00:00:00',100,'',1),(103,'2014-02-15 00:00:00','2014-02-15 00:00:00',100,'',1),(104,'2014-02-16 00:00:00','2014-02-16 00:00:00',100,'',1),(105,'2014-02-17 00:00:00','2014-02-17 00:00:00',100,'',1),(106,'2014-02-18 00:00:00','2014-02-18 00:00:00',100,'',1),(107,'2014-02-19 00:00:00','2014-02-19 00:00:00',100,'',1),(108,'2014-02-20 00:00:00','2014-02-20 00:00:00',100,'',1),(109,'2014-02-21 00:00:00','2014-02-21 00:00:00',100,'',1),(110,'2014-02-22 00:00:00','2014-02-22 00:00:00',100,'',1),(111,'2014-02-23 00:00:00','2014-02-23 00:00:00',100,'',1),(112,'2014-02-24 00:00:00','2014-02-24 00:00:00',100,'',1),(113,'2014-02-25 00:00:00','2014-02-25 00:00:00',100,'',1),(114,'2014-02-26 00:00:00','2014-02-26 00:00:00',100,'',1),(115,'2014-02-27 00:00:00','2014-02-27 00:00:00',100,'',1),(116,'2014-02-28 00:00:00','2014-02-28 00:00:00',100,'',1),(117,'2014-03-01 00:00:00','2014-03-01 00:00:00',100,'',1),(118,'2014-03-02 00:00:00','2014-03-02 00:00:00',100,'',1),(119,'2014-03-03 00:00:00','2014-03-03 00:00:00',100,'',1),(120,'2014-03-04 00:00:00','2014-03-04 00:00:00',100,'',1),(121,'2014-03-05 00:00:00','2014-03-05 00:00:00',100,'',1),(122,'2014-03-06 00:00:00','2014-03-06 00:00:00',100,'',1),(123,'2014-03-07 00:00:00','2014-03-07 00:00:00',100,'',1),(124,'2014-03-08 00:00:00','2014-03-08 00:00:00',100,'',1),(125,'2014-03-09 00:00:00','2014-03-09 00:00:00',100,'',1),(126,'2014-03-10 00:00:00','2014-03-10 00:00:00',100,'',1),(127,'2014-03-11 00:00:00','2014-03-11 00:00:00',100,'',1),(128,'2014-03-12 00:00:00','2014-03-12 00:00:00',100,'',1),(129,'2014-03-13 00:00:00','2014-03-13 00:00:00',100,'',1),(130,'2014-03-14 00:00:00','2014-03-14 00:00:00',100,'',1),(131,'2014-03-15 00:00:00','2014-03-15 00:00:00',100,'',1),(132,'2014-03-16 00:00:00','2014-03-16 00:00:00',100,'',1),(133,'2014-03-17 00:00:00','2014-03-17 00:00:00',100,'',1),(134,'2014-03-18 00:00:00','2014-03-18 00:00:00',100,'',1),(135,'2014-03-19 00:00:00','2014-03-19 00:00:00',100,'',1),(136,'2014-03-20 00:00:00','2014-03-20 00:00:00',100,'',1),(137,'2014-03-21 00:00:00','2014-03-21 00:00:00',100,'',1),(138,'2014-03-22 00:00:00','2014-03-22 00:00:00',100,'',1),(139,'2014-03-23 00:00:00','2014-03-23 00:00:00',100,'',1),(140,'2014-03-24 00:00:00','2014-03-24 00:00:00',100,'',1),(141,'2014-03-25 00:00:00','2014-03-25 00:00:00',100,'',1),(142,'2014-03-26 00:00:00','2014-03-26 00:00:00',100,'',1),(143,'2014-03-27 00:00:00','2014-03-27 00:00:00',100,'',1),(144,'2014-03-28 00:00:00','2014-03-28 00:00:00',100,'',1),(145,'2014-03-29 00:00:00','2014-03-29 00:00:00',100,'',1),(146,'2014-03-30 00:00:00','2014-03-30 00:00:00',100,'',1),(147,'2014-03-31 00:00:00','2014-03-31 00:00:00',100,'',1),(148,'2014-04-01 00:00:00','2014-04-01 00:00:00',100,'',1),(149,'2014-04-02 00:00:00','2014-04-02 00:00:00',100,'',1),(150,'2014-04-03 00:00:00','2014-04-03 00:00:00',100,'',1),(151,'2014-04-04 00:00:00','2014-04-04 00:00:00',100,'',1),(152,'2014-04-05 00:00:00','2014-04-05 00:00:00',100,'',1),(153,'2014-04-06 00:00:00','2014-04-06 00:00:00',100,'',1),(154,'2014-04-07 00:00:00','2014-04-07 00:00:00',100,'',1),(155,'2014-04-08 00:00:00','2014-04-08 00:00:00',100,'',1),(156,'2014-04-09 00:00:00','2014-04-09 00:00:00',100,'',1),(157,'2014-04-10 00:00:00','2014-04-10 00:00:00',100,'',1),(158,'2014-04-11 00:00:00','2014-04-11 00:00:00',100,'',1),(159,'2014-04-12 00:00:00','2014-04-12 00:00:00',100,'',1),(160,'2014-04-13 00:00:00','2014-04-13 00:00:00',100,'',1),(161,'2014-04-14 00:00:00','2014-04-14 00:00:00',100,'',1),(162,'2014-04-15 00:00:00','2014-04-15 00:00:00',100,'',1),(163,'2014-04-16 00:00:00','2014-04-16 00:00:00',100,'',1),(164,'2014-04-17 00:00:00','2014-04-17 00:00:00',100,'',1),(165,'2014-04-18 00:00:00','2014-04-18 00:00:00',100,'',1),(166,'2014-04-19 00:00:00','2014-04-19 00:00:00',100,'',1),(167,'2014-04-20 00:00:00','2014-04-20 00:00:00',100,'',1),(168,'2014-04-21 00:00:00','2014-04-21 00:00:00',100,'',1),(169,'2014-04-22 00:00:00','2014-04-22 00:00:00',100,'',1),(170,'2014-04-23 00:00:00','2014-04-23 00:00:00',100,'',1),(171,'2014-04-24 00:00:00','2014-04-24 00:00:00',100,'',1),(172,'2014-04-25 00:00:00','2014-04-25 00:00:00',100,'',1),(173,'2014-04-26 00:00:00','2014-04-26 00:00:00',100,'',1),(174,'2014-04-27 00:00:00','2014-04-27 00:00:00',100,'',1),(175,'2014-04-28 00:00:00','2014-04-28 00:00:00',100,'',1),(176,'2014-04-29 00:00:00','2014-04-29 00:00:00',100,'',1),(177,'2014-04-30 00:00:00','2014-04-30 00:00:00',100,'',1),(178,'2014-05-01 00:00:00','2014-05-01 00:00:00',100,'',1),(179,'2014-05-02 00:00:00','2014-05-02 00:00:00',100,'',1),(180,'2014-05-03 00:00:00','2014-05-03 00:00:00',100,'',1),(181,'2014-05-04 00:00:00','2014-05-04 00:00:00',100,'',1),(182,'2014-05-05 00:00:00','2014-05-05 00:00:00',100,'',1),(183,'2014-05-06 00:00:00','2014-05-06 00:00:00',100,'',1),(184,'2014-05-07 00:00:00','2014-05-07 00:00:00',100,'',1),(185,'2014-05-08 00:00:00','2014-05-08 00:00:00',100,'',1),(186,'2014-05-09 00:00:00','2014-05-09 00:00:00',100,'',1),(187,'2014-05-10 00:00:00','2014-05-10 00:00:00',100,'',1),(188,'2014-05-11 00:00:00','2014-05-11 00:00:00',100,'',1),(189,'2014-05-12 00:00:00','2014-05-12 00:00:00',100,'',1),(190,'2014-05-13 00:00:00','2014-05-13 00:00:00',100,'',1),(191,'2014-05-14 00:00:00','2014-05-14 00:00:00',100,'',1),(192,'2014-05-15 00:00:00','2014-05-15 00:00:00',100,'',1),(193,'2014-05-16 00:00:00','2014-05-16 00:00:00',100,'',1),(194,'2014-05-17 00:00:00','2014-05-17 00:00:00',100,'',1),(195,'2014-05-18 00:00:00','2014-05-18 00:00:00',100,'',1),(196,'2014-05-19 00:00:00','2014-05-19 00:00:00',100,'',1),(197,'2014-05-20 00:00:00','2014-05-20 00:00:00',100,'',1),(198,'2014-05-21 00:00:00','2014-05-21 00:00:00',100,'',1),(199,'2014-05-22 00:00:00','2014-05-22 00:00:00',100,'',1),(200,'2014-05-23 00:00:00','2014-05-23 00:00:00',100,'',1),(201,'2014-05-24 00:00:00','2014-05-24 00:00:00',100,'',1),(202,'2014-05-25 00:00:00','2014-05-25 00:00:00',100,'',1),(203,'2014-05-26 00:00:00','2014-05-26 00:00:00',100,'',1),(204,'2014-05-27 00:00:00','2014-05-27 00:00:00',100,'',1),(205,'2014-05-28 00:00:00','2014-05-28 00:00:00',100,'',1),(206,'2014-05-29 00:00:00','2014-05-29 00:00:00',100,'',1),(207,'2014-05-30 00:00:00','2014-05-30 00:00:00',100,'',1),(208,'2014-05-31 00:00:00','2014-05-31 00:00:00',100,'',1),(209,'2014-06-01 00:00:00','2014-06-01 00:00:00',100,'',1),(210,'2014-06-02 00:00:00','2014-06-02 00:00:00',100,'',1),(211,'2014-06-03 00:00:00','2014-06-03 00:00:00',100,'',1),(212,'2014-06-04 00:00:00','2014-06-04 00:00:00',100,'',1),(213,'2014-06-05 00:00:00','2014-06-05 00:00:00',100,'',1),(214,'2014-06-06 00:00:00','2014-06-06 00:00:00',100,'',1),(215,'2014-06-07 00:00:00','2014-06-07 00:00:00',100,'',1),(216,'2014-06-08 00:00:00','2014-06-08 00:00:00',100,'',1),(217,'2014-06-09 00:00:00','2014-06-09 00:00:00',100,'',1),(218,'2014-06-10 00:00:00','2014-06-10 00:00:00',100,'',1),(219,'2014-06-11 00:00:00','2014-06-11 00:00:00',100,'',1),(220,'2014-06-12 00:00:00','2014-06-12 00:00:00',100,'',1),(221,'2014-06-13 00:00:00','2014-06-13 00:00:00',100,'',1),(222,'2014-06-14 00:00:00','2014-06-14 00:00:00',100,'',1),(223,'2014-06-15 00:00:00','2014-06-15 00:00:00',100,'',1),(224,'2014-06-16 00:00:00','2014-06-16 00:00:00',100,'',1),(225,'2014-06-17 00:00:00','2014-06-17 00:00:00',100,'',1),(226,'2014-06-18 00:00:00','2014-06-18 00:00:00',100,'',1),(227,'2014-06-19 00:00:00','2014-06-19 00:00:00',100,'',1),(228,'2014-06-20 00:00:00','2014-06-20 00:00:00',100,'',1),(229,'2014-06-21 00:00:00','2014-06-21 00:00:00',100,'',1),(230,'2014-06-22 00:00:00','2014-06-22 00:00:00',100,'',1),(231,'2014-06-23 00:00:00','2014-06-23 00:00:00',100,'',1),(232,'2014-06-24 00:00:00','2014-06-24 00:00:00',100,'',1),(233,'2014-06-25 00:00:00','2014-06-25 00:00:00',100,'',1),(234,'2014-06-26 00:00:00','2014-06-26 00:00:00',100,'',1),(235,'2014-06-27 00:00:00','2014-06-27 00:00:00',100,'',1),(236,'2014-06-28 00:00:00','2014-06-28 00:00:00',100,'',1),(237,'2014-06-29 00:00:00','2014-06-29 00:00:00',100,'',1),(238,'2014-06-30 00:00:00','2014-06-30 00:00:00',100,'',1),(239,'2014-07-01 00:00:00','2014-07-01 00:00:00',100,'',1),(240,'2014-07-02 00:00:00','2014-07-02 00:00:00',100,'',1),(241,'2014-07-03 00:00:00','2014-07-03 00:00:00',100,'',1),(242,'2014-07-04 00:00:00','2014-07-04 00:00:00',100,'',1),(243,'2014-07-05 00:00:00','2014-07-05 00:00:00',100,'',1),(244,'2014-07-06 00:00:00','2014-07-06 00:00:00',100,'',1),(245,'2014-07-07 00:00:00','2014-07-07 00:00:00',100,'',1),(246,'2014-07-08 00:00:00','2014-07-08 00:00:00',100,'',1),(247,'2014-07-09 00:00:00','2014-07-09 00:00:00',100,'',1),(248,'2014-07-10 00:00:00','2014-07-10 00:00:00',100,'',1),(249,'2014-07-11 00:00:00','2014-07-11 00:00:00',100,'',1),(250,'2014-07-12 00:00:00','2014-07-12 00:00:00',100,'',1),(251,'2014-07-13 00:00:00','2014-07-13 00:00:00',100,'',1),(252,'2014-07-14 00:00:00','2014-07-14 00:00:00',100,'',1),(253,'2014-07-15 00:00:00','2014-07-15 00:00:00',100,'',1),(254,'2014-07-16 00:00:00','2014-07-16 00:00:00',100,'',1),(255,'2014-07-17 00:00:00','2014-07-17 00:00:00',100,'',1),(256,'2014-07-18 00:00:00','2014-07-18 00:00:00',100,'',1),(257,'2014-07-19 00:00:00','2014-07-19 00:00:00',100,'',1),(258,'2014-07-20 00:00:00','2014-07-20 00:00:00',100,'',1),(259,'2014-07-21 00:00:00','2014-07-21 00:00:00',100,'',1),(260,'2014-07-22 00:00:00','2014-07-22 00:00:00',100,'',1),(261,'2014-07-23 00:00:00','2014-07-23 00:00:00',100,'',1),(262,'2014-07-24 00:00:00','2014-07-24 00:00:00',100,'',1),(263,'2014-07-25 00:00:00','2014-07-25 00:00:00',100,'',1),(264,'2014-07-26 00:00:00','2014-07-26 00:00:00',100,'',1),(265,'2014-07-27 00:00:00','2014-07-27 00:00:00',100,'',1),(266,'2014-07-28 00:00:00','2014-07-28 00:00:00',100,'',1),(267,'2014-07-29 00:00:00','2014-07-29 00:00:00',100,'',1),(268,'2014-07-30 00:00:00','2014-07-30 00:00:00',100,'',1),(269,'2014-07-31 00:00:00','2014-07-31 00:00:00',100,'',1);
/*!40000 ALTER TABLE `contratos_fechas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuentas`
--

DROP TABLE IF EXISTS `cuentas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuentas` (
  `id_cuenta` int(11) NOT NULL AUTO_INCREMENT,
  `iban` varchar(50) DEFAULT NULL,
  `swif` varchar(50) DEFAULT NULL,
  `id_moneda` int(11) NOT NULL,
  `titular` varchar(60) DEFAULT NULL,
  `cvv` varchar(4) DEFAULT NULL,
  `c_d` int(11) DEFAULT NULL,
  `c_a` int(11) DEFAULT NULL,
  `numero` text,
  `tipo_tarjeta` varchar(45) DEFAULT NULL,
  `caducidad_mes` int(11) DEFAULT NULL,
  `caducidad_anio` int(11) DEFAULT NULL,
  `paypal` text,
  `tipo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_cuenta`),
  KEY `fk_cuentas_monedas1_idx` (`id_moneda`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuentas`
--

LOCK TABLES `cuentas` WRITE;
/*!40000 ALTER TABLE `cuentas` DISABLE KEYS */;
INSERT INTO `cuentas` VALUES (1,'12312312312','123123213',1,'0','0',0,0,'0','',NULL,NULL,'',''),(2,'000','000',1,'0','0',0,0,'0','',NULL,NULL,'',''),(7,'','',1,'iosdjfiosd fosid f','123',NULL,NULL,'12312312','Visa débito',3,2016,'','tarjeta'),(8,'','',1,'123123123','123',NULL,NULL,'123123','Master Card',3,2014,'','tarjeta'),(9,'','',1,'','',NULL,NULL,'','',NULL,NULL,'ruben@gmail.com','paypal'),(10,'','',1,'wsdfsdfsd','123',NULL,NULL,'123123123','Master Card',3,2016,'','tarjeta'),(11,'','',1,'','',NULL,NULL,'','',NULL,NULL,'','efectivo'),(12,'','',1,'','',NULL,NULL,'','',NULL,NULL,'dsdsd@asdasd.com','paypal'),(13,'','',1,'','',NULL,NULL,'','',NULL,NULL,'','efectivo'),(14,'','',1,'Nombre','123',NULL,NULL,'123123123','Master Card',2,2015,'','tarjeta'),(15,'','',1,'','',NULL,NULL,'','',NULL,NULL,'ruben@hotmai.com','paypal'),(17,'','',1,'','',NULL,NULL,'','',NULL,NULL,'','efectivo'),(18,'','',1,'Ruben','',NULL,NULL,'5363807754845368','Master Card',3,2016,'','tarjeta'),(19,'','',1,'123123','123',NULL,NULL,'5386532637459335','MasterCard',4,16,'','tarjeta'),(20,'','',1,'132ewqdsa','123',NULL,NULL,'5355681123569839','MasterCard',2,16,'','tarjeta'),(21,'','',1,'maaaaaaati','433',NULL,NULL,'4716183043437020','Visa',1,15,'','tarjeta'),(22,'','',1,'maaaaaaati','433',NULL,NULL,'4716183043437020','Visa',1,15,'','tarjeta');
/*!40000 ALTER TABLE `cuentas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `direcciones`
--

DROP TABLE IF EXISTS `direcciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `direcciones` (
  `id_direccion` int(11) NOT NULL AUTO_INCREMENT,
  `calle` varchar(65) DEFAULT NULL,
  `numero` varchar(45) DEFAULT NULL,
  `provincia` text,
  `codigo_postal` varchar(45) DEFAULT NULL,
  `id_pais` int(11) NOT NULL,
  `lat` double DEFAULT NULL,
  `lon` double DEFAULT NULL,
  `id_provincia` int(11) DEFAULT NULL,
  `referencia` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_direccion`),
  KEY `fk_direcciones_paises_idx` (`id_pais`),
  KEY `fk_direcciones_provincias1_idx` (`id_provincia`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `direcciones`
--

LOCK TABLES `direcciones` WRITE;
/*!40000 ALTER TABLE `direcciones` DISABLE KEYS */;
INSERT INTO `direcciones` VALUES (1,'1231','1231','','12313',1,40,-3,1,''),(2,'','','Calle Lavapiés, 9, 28012 Madrid, España','77500',1,40.4113554,-3.7028359,1,'Por algún lado...'),(3,'','','Calle Lavapiés, 9, 28012 Madrid, España','',1,40.4113554,-3.7028359,1,'123'),(4,'','','Carrer dels Clavells, 3, 07560 Son Servera, I','',1,39.602561,3.380154,1,'123'),(5,'','977368810','PM-213, Selva, Islas Baleares, España','43850',1,39.79793591651543,2.877974646875032,1,'La casa se encuentra situada en la zona de Ca'),(6,'joan bautista plana','21','','43005',1,40,-3,1,''),(7,'','','Calle Lavapiés, 9, 28012 Madrid, España','',1,40.4113554,-3.7028359,1,'Dirección'),(8,'','19','Carrer de Colón, 17, 43840 Salou, Tarragona, ','43840',1,41.07081480395642,1.145281061376977,1,'La recogida de llaves se efectuará en la ofic'),(9,'','','PM-404, Son Servera, Islas Baleares, España','',1,39.67110791370975,3.3918021687500186,1,'avenida alvear al 3000'),(10,'','3','Calle Fuerteventura, Corralejo, España','35660',1,28.73018516296049,-13.872243856127966,1,'ew'),(11,'','3','Calle Fuerteventura, Corralejo, España','35660',1,28.73018516296049,-13.872243856127966,1,'otra vez, repido la info de la direccion'),(12,'','3','Calle Fuerteventura, Corralejo, España','35660',1,28.73018516296049,-13.872243856127966,1,'otra vez, repido la info de la direccion'),(13,'','3','Calle Fuerteventura, Corralejo, España','35660',1,28.73018516296049,-13.872243856127966,1,'otra vez, repido la info de la direccion'),(14,'','3','Calle Fuerteventura, Corralejo, España','35660',1,28.73018516296049,-13.872243856127966,1,'otra vez, repido la info de la direccion'),(15,'','3','Calle Fuerteventura, Corralejo, España','35660',1,28.73018516296049,-13.872243856127966,1,'otra vez, repido la info de la direccion'),(16,'','3','Calle Fuerteventura, Corralejo, España','35660',1,28.73018516296049,-13.872243856127966,1,'otra vez, repido la info de la direccion'),(17,'','3','Calle Fuerteventura, Corralejo, España','35660',1,28.73018516296049,-13.872243856127966,1,'otra vez, repido la info de la direccion'),(18,'','3','Calle Fuerteventura, Corralejo, España','35660',1,28.73018516296049,-13.872243856127966,1,'otra vez, repido la info de la direccion'),(19,'','3','Calle Fuerteventura, Corralejo, España','35660',1,28.73018516296049,-13.872243856127966,1,'otra vez, repido la info de la direccion'),(20,'','3','Calle Fuerteventura, Corralejo, España','35660',1,28.73018516296049,-13.872243856127966,1,'otra vez, repido la info de la direccion'),(21,'','','Calle Lavapiés, 9, 28012 Madrid, España','',1,40.4113554,-3.7028359,1,'123123'),(22,'','123','Calle Lavapiés, 9, 28012 Madrid, España','123123',1,40.4113554,-3.7028359,1,'123123'),(23,'','123','Calle Lavapiés, 9, 28012 Madrid, España','123123',1,40.4113554,-3.7028359,1,'123123'),(24,'','','Calle Fuerteventura, Corralejo, España','',1,28.72854815088081,-13.868252729113806,1,'coges un avion y ya.'),(25,'','','Avenida Colón, 07579 Arta, Islas Baleares, Es','',1,39.771302069008804,3.3691337000000203,1,''),(26,'','','Mallorca - Roger de Flor, Barcelona, España','',1,40.4113554,-3.7028359,1,'');
/*!40000 ALTER TABLE `direcciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disponibilidades`
--

DROP TABLE IF EXISTS `disponibilidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disponibilidades` (
  `id_disponibilidad` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_final` datetime DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `precio_fin_semana` double DEFAULT NULL,
  `estatus` varchar(45) DEFAULT NULL,
  `id_apartamento` int(11) NOT NULL,
  `anotacion` text,
  `precio_contrato` double DEFAULT NULL,
  `descuento` double DEFAULT NULL,
  `minimo_noches` int(11) DEFAULT NULL,
  `precio_por_consumo` double DEFAULT NULL,
  `descuento_por_consumo` double DEFAULT NULL,
  `cupon_promocional` varchar(100) DEFAULT NULL,
  `descuento_por_cupon` double DEFAULT NULL,
  PRIMARY KEY (`id_disponibilidad`),
  KEY `fk_disponbilidades_apartamentos1_idx` (`id_apartamento`)
) ENGINE=InnoDB AUTO_INCREMENT=2919 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disponibilidades`
--

LOCK TABLES `disponibilidades` WRITE;
/*!40000 ALTER TABLE `disponibilidades` DISABLE KEYS */;
INSERT INTO `disponibilidades` VALUES (2223,'2013-11-19 00:00:00','2013-11-19 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2224,'2013-11-20 00:00:00','2013-11-20 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2225,'2013-11-21 00:00:00','2013-11-21 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2226,'2013-11-22 00:00:00','2013-11-22 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2227,'2013-11-23 00:00:00','2013-11-23 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2228,'2013-11-24 00:00:00','2013-11-24 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2229,'2013-11-25 00:00:00','2013-11-25 00:00:00',100,0,'disponible',3,'Tarifa',NULL,20,5,200,10,'',0),(2230,'2013-11-26 00:00:00','2013-11-26 00:00:00',100,0,'no disponible',3,'Tarifa',NULL,0,0,0,0,'',0),(2231,'2013-11-27 00:00:00','2013-11-27 00:00:00',100,0,'no disponible',3,'Tarifa',NULL,0,0,0,0,'',0),(2232,'2013-11-28 00:00:00','2013-11-28 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2233,'2013-11-29 00:00:00','2013-11-29 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2234,'2013-11-30 00:00:00','2013-11-30 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2235,'2013-12-01 00:00:00','2013-12-01 00:00:00',300,0,'disponible',3,'Tarifa',NULL,10,4,200,10,'',0),(2236,'2013-12-02 00:00:00','2013-12-02 00:00:00',300,0,'disponible',3,'Tarifa',NULL,10,4,200,10,'',0),(2237,'2013-12-03 00:00:00','2013-12-03 00:00:00',300,0,'disponible',3,'Tarifa',NULL,10,4,200,10,'',0),(2238,'2013-12-04 00:00:00','2013-12-04 00:00:00',300,0,'disponible',3,'Tarifa',NULL,10,4,200,10,'',0),(2239,'2013-12-05 00:00:00','2013-12-05 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2240,'2013-12-06 00:00:00','2013-12-06 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2241,'2013-12-07 00:00:00','2013-12-07 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2242,'2013-12-08 00:00:00','2013-12-08 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2243,'2013-12-09 00:00:00','2013-12-09 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2244,'2013-12-10 00:00:00','2013-12-10 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2245,'2013-12-11 00:00:00','2013-12-11 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2246,'2013-12-12 00:00:00','2013-12-12 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2247,'2013-12-13 00:00:00','2013-12-13 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2248,'2013-12-14 00:00:00','2013-12-14 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2249,'2013-12-15 00:00:00','2013-12-15 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2250,'2013-12-16 00:00:00','2013-12-16 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2251,'2013-12-17 00:00:00','2013-12-17 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2252,'2013-12-18 00:00:00','2013-12-18 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2253,'2013-12-19 00:00:00','2013-12-19 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2254,'2013-12-20 00:00:00','2013-12-20 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2255,'2013-12-21 00:00:00','2013-12-21 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2256,'2013-12-22 00:00:00','2013-12-22 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2257,'2013-12-23 00:00:00','2013-12-23 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2258,'2013-12-24 00:00:00','2013-12-24 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2259,'2013-12-25 00:00:00','2013-12-25 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2260,'2013-12-26 00:00:00','2013-12-26 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2261,'2013-12-27 00:00:00','2013-12-27 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2262,'2013-12-28 00:00:00','2013-12-28 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2263,'2013-12-29 00:00:00','2013-12-29 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2264,'2013-12-30 00:00:00','2013-12-30 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2265,'2013-12-31 00:00:00','2013-12-31 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2266,'2014-01-01 00:00:00','2014-01-01 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2267,'2014-01-02 00:00:00','2014-01-02 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2268,'2014-01-03 00:00:00','2014-01-03 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2269,'2014-01-04 00:00:00','2014-01-04 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2270,'2014-01-05 00:00:00','2014-01-05 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2271,'2014-01-06 00:00:00','2014-01-06 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2272,'2014-01-07 00:00:00','2014-01-07 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2273,'2014-01-08 00:00:00','2014-01-08 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2274,'2014-01-09 00:00:00','2014-01-09 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2275,'2014-01-10 00:00:00','2014-01-10 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2276,'2014-01-11 00:00:00','2014-01-11 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2277,'2014-01-12 00:00:00','2014-01-12 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2278,'2014-01-13 00:00:00','2014-01-13 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2279,'2014-01-14 00:00:00','2014-01-14 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2280,'2014-01-15 00:00:00','2014-01-15 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2281,'2014-01-16 00:00:00','2014-01-16 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2282,'2014-01-17 00:00:00','2014-01-17 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2283,'2014-01-18 00:00:00','2014-01-18 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2284,'2014-01-19 00:00:00','2014-01-19 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2285,'2014-01-20 00:00:00','2014-01-20 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2286,'2014-01-21 00:00:00','2014-01-21 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2287,'2014-01-22 00:00:00','2014-01-22 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2288,'2014-01-23 00:00:00','2014-01-23 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2289,'2014-01-24 00:00:00','2014-01-24 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2290,'2014-01-25 00:00:00','2014-01-25 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2291,'2014-01-26 00:00:00','2014-01-26 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2292,'2014-01-27 00:00:00','2014-01-27 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2293,'2014-01-28 00:00:00','2014-01-28 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2294,'2014-01-29 00:00:00','2014-01-29 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2295,'2014-01-30 00:00:00','2014-01-30 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2296,'2014-01-31 00:00:00','2014-01-31 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2297,'2014-02-01 00:00:00','2014-02-01 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2298,'2014-02-02 00:00:00','2014-02-02 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2299,'2014-02-03 00:00:00','2014-02-03 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2300,'2014-02-04 00:00:00','2014-02-04 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2301,'2014-02-05 00:00:00','2014-02-05 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2302,'2014-02-06 00:00:00','2014-02-06 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2303,'2014-02-07 00:00:00','2014-02-07 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2304,'2014-02-08 00:00:00','2014-02-08 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2305,'2014-02-09 00:00:00','2014-02-09 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2306,'2014-02-10 00:00:00','2014-02-10 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2307,'2014-02-11 00:00:00','2014-02-11 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2308,'2014-02-12 00:00:00','2014-02-12 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2309,'2014-02-13 00:00:00','2014-02-13 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2310,'2014-02-14 00:00:00','2014-02-14 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2311,'2014-02-15 00:00:00','2014-02-15 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2312,'2014-02-16 00:00:00','2014-02-16 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2313,'2014-02-17 00:00:00','2014-02-17 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2314,'2014-02-18 00:00:00','2014-02-18 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2315,'2014-02-19 00:00:00','2014-02-19 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2316,'2014-02-20 00:00:00','2014-02-20 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2317,'2014-02-21 00:00:00','2014-02-21 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2318,'2014-02-22 00:00:00','2014-02-22 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2319,'2014-02-23 00:00:00','2014-02-23 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2320,'2014-02-24 00:00:00','2014-02-24 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2321,'2014-02-25 00:00:00','2014-02-25 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2322,'2014-02-26 00:00:00','2014-02-26 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2323,'2014-02-27 00:00:00','2014-02-27 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2324,'2014-02-28 00:00:00','2014-02-28 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2325,'2014-03-01 00:00:00','2014-03-01 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2326,'2014-03-02 00:00:00','2014-03-02 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2327,'2014-03-03 00:00:00','2014-03-03 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2328,'2014-03-04 00:00:00','2014-03-04 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2329,'2014-03-05 00:00:00','2014-03-05 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2330,'2014-03-06 00:00:00','2014-03-06 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2331,'2014-03-07 00:00:00','2014-03-07 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2332,'2014-03-08 00:00:00','2014-03-08 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2333,'2014-03-09 00:00:00','2014-03-09 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2334,'2014-03-10 00:00:00','2014-03-10 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2335,'2014-03-11 00:00:00','2014-03-11 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2336,'2014-03-12 00:00:00','2014-03-12 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2337,'2014-03-13 00:00:00','2014-03-13 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2338,'2014-03-14 00:00:00','2014-03-14 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2339,'2014-03-15 00:00:00','2014-03-15 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2340,'2014-03-16 00:00:00','2014-03-16 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2341,'2014-03-17 00:00:00','2014-03-17 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2342,'2014-03-18 00:00:00','2014-03-18 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2343,'2014-03-19 00:00:00','2014-03-19 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2344,'2014-03-20 00:00:00','2014-03-20 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2345,'2014-03-21 00:00:00','2014-03-21 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2346,'2014-03-22 00:00:00','2014-03-22 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2347,'2014-03-23 00:00:00','2014-03-23 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2348,'2014-03-24 00:00:00','2014-03-24 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2349,'2014-03-25 00:00:00','2014-03-25 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2350,'2014-03-26 00:00:00','2014-03-26 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2351,'2014-03-27 00:00:00','2014-03-27 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2352,'2014-03-28 00:00:00','2014-03-28 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2353,'2014-03-29 00:00:00','2014-03-29 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2354,'2014-03-30 00:00:00','2014-03-30 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2355,'2014-03-31 00:00:00','2014-03-31 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2356,'2014-04-01 00:00:00','2014-04-01 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2357,'2014-04-02 00:00:00','2014-04-02 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2358,'2014-04-03 00:00:00','2014-04-03 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2359,'2014-04-04 00:00:00','2014-04-04 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2360,'2014-04-05 00:00:00','2014-04-05 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2361,'2014-04-06 00:00:00','2014-04-06 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2362,'2014-04-07 00:00:00','2014-04-07 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2363,'2014-04-08 00:00:00','2014-04-08 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2364,'2014-04-09 00:00:00','2014-04-09 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2365,'2014-04-10 00:00:00','2014-04-10 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2366,'2014-04-11 00:00:00','2014-04-11 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2367,'2014-04-12 00:00:00','2014-04-12 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2368,'2014-04-13 00:00:00','2014-04-13 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2369,'2014-04-14 00:00:00','2014-04-14 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2370,'2014-04-15 00:00:00','2014-04-15 00:00:00',200,0,'disponible',3,'Tarifa',NULL,20,0,0,0,'',0),(2683,'2013-11-29 00:00:00','2013-11-29 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2684,'2013-11-30 00:00:00','2013-11-30 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2685,'2013-12-01 00:00:00','2013-12-01 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2686,'2013-12-02 00:00:00','2013-12-02 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2687,'2013-12-03 00:00:00','2013-12-03 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2688,'2013-12-04 00:00:00','2013-12-04 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2689,'2013-12-05 00:00:00','2013-12-05 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2690,'2013-12-06 00:00:00','2013-12-06 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2691,'2013-12-07 00:00:00','2013-12-07 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2692,'2013-12-08 00:00:00','2013-12-08 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2693,'2013-12-09 00:00:00','2013-12-09 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2694,'2013-12-10 00:00:00','2013-12-10 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2695,'2013-12-11 00:00:00','2013-12-11 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2696,'2013-12-12 00:00:00','2013-12-12 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2697,'2013-12-13 00:00:00','2013-12-13 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2705,'2013-12-21 00:00:00','2013-12-21 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2706,'2013-12-22 00:00:00','2013-12-22 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2707,'2013-12-23 00:00:00','2013-12-23 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2708,'2013-12-24 00:00:00','2013-12-24 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2709,'2013-12-25 00:00:00','2013-12-25 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2710,'2013-12-26 00:00:00','2013-12-26 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2711,'2013-12-27 00:00:00','2013-12-27 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2712,'2013-12-28 00:00:00','2013-12-28 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2713,'2013-12-29 00:00:00','2013-12-29 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2714,'2013-12-30 00:00:00','2013-12-30 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2715,'2013-12-31 00:00:00','2013-12-31 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2722,'2014-01-07 00:00:00','2014-01-07 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2723,'2014-01-08 00:00:00','2014-01-08 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2724,'2014-01-09 00:00:00','2014-01-09 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2725,'2014-01-10 00:00:00','2014-01-10 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2726,'2014-01-11 00:00:00','2014-01-11 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2727,'2014-01-12 00:00:00','2014-01-12 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2728,'2014-01-13 00:00:00','2014-01-13 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2729,'2014-01-14 00:00:00','2014-01-14 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2730,'2014-01-15 00:00:00','2014-01-15 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2731,'2014-01-16 00:00:00','2014-01-16 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2732,'2014-01-17 00:00:00','2014-01-17 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2733,'2014-01-18 00:00:00','2014-01-18 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2734,'2014-01-19 00:00:00','2014-01-19 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2735,'2014-01-20 00:00:00','2014-01-20 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2736,'2014-01-21 00:00:00','2014-01-21 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2737,'2014-01-22 00:00:00','2014-01-22 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2738,'2014-01-23 00:00:00','2014-01-23 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2739,'2014-01-24 00:00:00','2014-01-24 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2740,'2014-01-25 00:00:00','2014-01-25 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2741,'2014-01-26 00:00:00','2014-01-26 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2742,'2014-01-27 00:00:00','2014-01-27 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2743,'2014-01-28 00:00:00','2014-01-28 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2744,'2014-01-29 00:00:00','2014-01-29 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2745,'2014-01-30 00:00:00','2014-01-30 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2746,'2014-01-31 00:00:00','2014-01-31 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2747,'2014-02-01 00:00:00','2014-02-01 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2748,'2014-02-02 00:00:00','2014-02-02 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2749,'2014-02-03 00:00:00','2014-02-03 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2750,'2014-02-04 00:00:00','2014-02-04 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2751,'2014-02-05 00:00:00','2014-02-05 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2752,'2014-02-06 00:00:00','2014-02-06 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2753,'2014-02-07 00:00:00','2014-02-07 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2754,'2014-02-08 00:00:00','2014-02-08 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2755,'2014-02-09 00:00:00','2014-02-09 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2756,'2014-02-10 00:00:00','2014-02-10 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2757,'2014-02-11 00:00:00','2014-02-11 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2758,'2014-02-12 00:00:00','2014-02-12 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2759,'2014-02-13 00:00:00','2014-02-13 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2760,'2014-02-14 00:00:00','2014-02-14 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2761,'2014-02-15 00:00:00','2014-02-15 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2762,'2014-02-16 00:00:00','2014-02-16 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2763,'2014-02-17 00:00:00','2014-02-17 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2764,'2014-02-18 00:00:00','2014-02-18 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2765,'2014-02-19 00:00:00','2014-02-19 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2766,'2014-02-20 00:00:00','2014-02-20 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2767,'2014-02-21 00:00:00','2014-02-21 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2768,'2014-02-22 00:00:00','2014-02-22 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2769,'2014-02-23 00:00:00','2014-02-23 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2770,'2014-02-24 00:00:00','2014-02-24 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2771,'2014-02-25 00:00:00','2014-02-25 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2772,'2014-02-26 00:00:00','2014-02-26 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2773,'2014-02-27 00:00:00','2014-02-27 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2774,'2014-02-28 00:00:00','2014-02-28 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2775,'2014-03-01 00:00:00','2014-03-01 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2776,'2014-03-02 00:00:00','2014-03-02 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2777,'2014-03-03 00:00:00','2014-03-03 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2778,'2014-03-04 00:00:00','2014-03-04 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2779,'2014-03-05 00:00:00','2014-03-05 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2780,'2014-03-06 00:00:00','2014-03-06 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2781,'2014-03-07 00:00:00','2014-03-07 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2782,'2014-03-08 00:00:00','2014-03-08 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2783,'2014-03-09 00:00:00','2014-03-09 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2784,'2014-03-10 00:00:00','2014-03-10 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2785,'2014-03-11 00:00:00','2014-03-11 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2786,'2014-03-12 00:00:00','2014-03-12 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2787,'2014-03-13 00:00:00','2014-03-13 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2788,'2014-03-14 00:00:00','2014-03-14 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2789,'2014-03-15 00:00:00','2014-03-15 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2790,'2014-03-16 00:00:00','2014-03-16 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2791,'2014-03-17 00:00:00','2014-03-17 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2792,'2014-03-18 00:00:00','2014-03-18 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2793,'2014-03-19 00:00:00','2014-03-19 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2794,'2014-03-20 00:00:00','2014-03-20 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2795,'2014-03-21 00:00:00','2014-03-21 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2796,'2014-03-22 00:00:00','2014-03-22 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2797,'2014-03-23 00:00:00','2014-03-23 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2798,'2014-03-24 00:00:00','2014-03-24 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2799,'2014-03-25 00:00:00','2014-03-25 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2800,'2014-03-26 00:00:00','2014-03-26 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2801,'2014-03-27 00:00:00','2014-03-27 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2802,'2014-03-28 00:00:00','2014-03-28 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2803,'2014-03-29 00:00:00','2014-03-29 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2804,'2014-03-30 00:00:00','2014-03-30 00:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2805,'2014-03-31 01:00:00','2014-03-31 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2806,'2014-04-01 01:00:00','2014-04-01 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2807,'2014-04-02 01:00:00','2014-04-02 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2808,'2014-04-03 01:00:00','2014-04-03 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2809,'2014-04-04 01:00:00','2014-04-04 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2810,'2014-04-05 01:00:00','2014-04-05 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2811,'2014-04-06 01:00:00','2014-04-06 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2812,'2014-04-07 01:00:00','2014-04-07 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2813,'2014-04-08 01:00:00','2014-04-08 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2814,'2014-04-09 01:00:00','2014-04-09 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2815,'2014-04-10 01:00:00','2014-04-10 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2816,'2014-04-11 01:00:00','2014-04-11 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2817,'2014-04-12 01:00:00','2014-04-12 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2818,'2014-04-13 01:00:00','2014-04-13 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2819,'2014-04-14 01:00:00','2014-04-14 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2820,'2014-04-15 01:00:00','2014-04-15 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2821,'2014-04-16 01:00:00','2014-04-16 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2822,'2014-04-17 01:00:00','2014-04-17 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2823,'2014-04-18 01:00:00','2014-04-18 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2824,'2014-04-19 01:00:00','2014-04-19 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2825,'2014-04-20 01:00:00','2014-04-20 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2826,'2014-04-21 01:00:00','2014-04-21 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2827,'2014-04-22 01:00:00','2014-04-22 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2828,'2014-04-23 01:00:00','2014-04-23 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2829,'2014-04-24 01:00:00','2014-04-24 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2830,'2014-04-25 01:00:00','2014-04-25 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2831,'2014-04-26 01:00:00','2014-04-26 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2832,'2014-04-27 01:00:00','2014-04-27 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2833,'2014-04-28 01:00:00','2014-04-28 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2834,'2014-04-29 01:00:00','2014-04-29 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2835,'2014-04-30 01:00:00','2014-04-30 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2836,'2014-05-01 01:00:00','2014-05-01 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2837,'2014-05-02 01:00:00','2014-05-02 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2838,'2014-05-03 01:00:00','2014-05-03 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2839,'2014-05-04 01:00:00','2014-05-04 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2840,'2014-05-05 01:00:00','2014-05-05 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2841,'2014-05-06 01:00:00','2014-05-06 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2842,'2014-05-07 01:00:00','2014-05-07 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2843,'2014-05-08 01:00:00','2014-05-08 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2844,'2014-05-09 01:00:00','2014-05-09 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2845,'2014-05-10 01:00:00','2014-05-10 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2846,'2014-05-11 01:00:00','2014-05-11 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2847,'2014-05-12 01:00:00','2014-05-12 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2848,'2014-05-13 01:00:00','2014-05-13 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2849,'2014-05-14 01:00:00','2014-05-14 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2850,'2014-05-15 01:00:00','2014-05-15 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2851,'2014-05-16 01:00:00','2014-05-16 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2852,'2014-05-17 01:00:00','2014-05-17 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2853,'2014-05-18 01:00:00','2014-05-18 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2854,'2014-05-19 01:00:00','2014-05-19 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2855,'2014-05-20 01:00:00','2014-05-20 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2856,'2014-05-21 01:00:00','2014-05-21 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2857,'2014-05-22 01:00:00','2014-05-22 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2858,'2014-05-23 01:00:00','2014-05-23 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2859,'2014-05-24 01:00:00','2014-05-24 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2860,'2014-05-25 01:00:00','2014-05-25 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2861,'2014-05-26 01:00:00','2014-05-26 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2862,'2014-05-27 01:00:00','2014-05-27 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2863,'2014-05-28 01:00:00','2014-05-28 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2864,'2014-05-29 01:00:00','2014-05-29 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2865,'2014-05-30 01:00:00','2014-05-30 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2866,'2014-05-31 01:00:00','2014-05-31 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2867,'2014-06-01 01:00:00','2014-06-01 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2868,'2014-06-02 01:00:00','2014-06-02 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2869,'2014-06-03 01:00:00','2014-06-03 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2870,'2014-06-04 01:00:00','2014-06-04 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2871,'2014-06-05 01:00:00','2014-06-05 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2872,'2014-06-06 01:00:00','2014-06-06 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2873,'2014-06-07 01:00:00','2014-06-07 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2874,'2014-06-08 01:00:00','2014-06-08 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2875,'2014-06-09 01:00:00','2014-06-09 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2876,'2014-06-10 01:00:00','2014-06-10 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2877,'2014-06-11 01:00:00','2014-06-11 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2878,'2014-06-12 01:00:00','2014-06-12 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2879,'2014-06-13 01:00:00','2014-06-13 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2880,'2014-06-14 01:00:00','2014-06-14 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2881,'2014-06-15 01:00:00','2014-06-15 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2882,'2014-06-16 01:00:00','2014-06-16 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2883,'2014-06-17 01:00:00','2014-06-17 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2884,'2014-06-18 01:00:00','2014-06-18 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2885,'2014-06-19 01:00:00','2014-06-19 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2886,'2014-06-20 01:00:00','2014-06-20 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2887,'2014-06-21 01:00:00','2014-06-21 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2888,'2014-06-22 01:00:00','2014-06-22 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2889,'2014-06-23 01:00:00','2014-06-23 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2890,'2014-06-24 01:00:00','2014-06-24 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2891,'2014-06-25 01:00:00','2014-06-25 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2892,'2014-06-26 01:00:00','2014-06-26 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2893,'2014-06-27 01:00:00','2014-06-27 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2894,'2014-06-28 01:00:00','2014-06-28 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2895,'2014-06-29 01:00:00','2014-06-29 01:00:00',45,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2896,'2013-12-16 00:00:00','2013-12-16 00:00:00',100,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2897,'2013-12-17 00:00:00','2013-12-17 00:00:00',100,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2898,'2013-12-18 00:00:00','2013-12-18 00:00:00',100,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2899,'2013-12-19 00:00:00','2013-12-19 00:00:00',100,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2900,'2013-12-20 00:00:00','2013-12-20 00:00:00',100,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2901,'2013-12-14 00:00:00','2013-12-14 00:00:00',100,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2902,'2013-12-15 00:00:00','2013-12-15 00:00:00',100,0,'disponible',22,'Tarifa',NULL,0,NULL,0,0,'',0),(2903,'2013-12-16 00:00:00','2013-12-16 00:00:00',200,0,'disponible',23,'Tarifa',NULL,0,NULL,0,0,'',0),(2904,'2013-12-17 00:00:00','2013-12-17 00:00:00',200,0,'disponible',23,'Tarifa',NULL,0,NULL,0,0,'',0),(2905,'2013-12-18 00:00:00','2013-12-18 00:00:00',200,0,'disponible',23,'Tarifa',NULL,0,NULL,0,0,'',0),(2906,'2013-12-19 00:00:00','2013-12-19 00:00:00',200,0,'disponible',23,'Tarifa',NULL,0,NULL,0,0,'',0),(2907,'2013-12-20 00:00:00','2013-12-20 00:00:00',200,0,'disponible',23,'Tarifa',NULL,0,NULL,0,0,'',0),(2908,'2013-12-21 00:00:00','2013-12-21 00:00:00',200,0,'disponible',23,'Tarifa',NULL,0,NULL,0,0,'',0),(2909,'2013-12-22 00:00:00','2013-12-22 00:00:00',200,0,'disponible',23,'Tarifa',NULL,0,NULL,0,0,'',0),(2910,'2013-12-23 00:00:00','2013-12-23 00:00:00',200,0,'disponible',23,'Tarifa',NULL,0,NULL,0,0,'',0),(2911,'2013-12-24 00:00:00','2013-12-24 00:00:00',200,0,'disponible',23,'Tarifa',NULL,0,NULL,0,0,'',0),(2912,'2013-12-25 00:00:00','2013-12-25 00:00:00',200,0,'disponible',23,'Tarifa',NULL,0,NULL,0,0,'',0),(2913,'2013-12-26 00:00:00','2013-12-26 00:00:00',200,0,'disponible',23,'Tarifa',NULL,0,NULL,0,0,'',0),(2914,'2013-12-27 00:00:00','2013-12-27 00:00:00',200,0,'disponible',23,'Tarifa',NULL,0,NULL,0,0,'',0),(2915,'2013-12-28 00:00:00','2013-12-28 00:00:00',200,0,'disponible',23,'Tarifa',NULL,0,NULL,0,0,'',0),(2916,'2013-12-29 00:00:00','2013-12-29 00:00:00',200,0,'disponible',23,'Tarifa',NULL,0,NULL,0,0,'',0),(2917,'2013-12-30 00:00:00','2013-12-30 00:00:00',200,0,'disponible',23,'Tarifa',NULL,0,NULL,0,0,'',0),(2918,'2013-12-31 00:00:00','2013-12-31 00:00:00',200,0,'disponible',23,'Tarifa',NULL,0,NULL,0,0,'',0);
/*!40000 ALTER TABLE `disponibilidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresas`
--

DROP TABLE IF EXISTS `empresas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresas` (
  `id_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido_paterno` varchar(45) DEFAULT NULL,
  `apellido_materno` varchar(45) DEFAULT NULL,
  `nombre_fiscal` varchar(65) DEFAULT NULL,
  `cif` text,
  `id_direccion` int(11) NOT NULL,
  `tiempo_creacion` timestamp NULL DEFAULT NULL,
  `ultima_modificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(150) DEFAULT NULL,
  `email_facturacion` varchar(150) DEFAULT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  `telefono_alterno` varchar(100) DEFAULT NULL,
  `id_direccion_facturacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_empresa`),
  KEY `fk_empresa_direcciones1_idx` (`id_direccion`),
  KEY `fk_empresas_direcciones1_idx` (`id_direccion_facturacion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresas`
--

LOCK TABLES `empresas` WRITE;
/*!40000 ALTER TABLE `empresas` DISABLE KEYS */;
INSERT INTO `empresas` VALUES (1,'Matias','Barbarroja','admin','Mallorca Rent Haus','123123131',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','matias.barbarroja@gmail.com','','123123','123123',NULL),(2,'Matias','Barbarroja','iriarte','esintesys','b43927284',6,'0000-00-00 00:00:00','0000-00-00 00:00:00','matias.barbarroja@gmail.com','','','',NULL);
/*!40000 ALTER TABLE `empresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresas_contratos`
--

DROP TABLE IF EXISTS `empresas_contratos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresas_contratos` (
  `id_empresa` int(11) NOT NULL,
  `id_contrato` int(11) NOT NULL,
  `id_empresa_contrato` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `tiempo_creacion` timestamp NULL DEFAULT NULL,
  `ultima_modificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_empresa_contrato`),
  KEY `fk_empresas_has_contratos_contratos1_idx` (`id_contrato`),
  KEY `fk_empresas_has_contratos_empresas1_idx` (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresas_contratos`
--

LOCK TABLES `empresas_contratos` WRITE;
/*!40000 ALTER TABLE `empresas_contratos` DISABLE KEYS */;
INSERT INTO `empresas_contratos` VALUES (1,1,1,'1969-12-31 00:00:00','1969-12-31 00:00:00','2013-08-22 23:26:11','2013-10-18 15:56:24'),(2,2,2,'0000-00-00 00:00:00','0000-00-00 00:00:00','2013-08-23 04:05:32','2013-08-23 04:05:32'),(1,3,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),(1,4,4,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,5,5,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,6,6,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `empresas_contratos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresas_cuentas`
--

DROP TABLE IF EXISTS `empresas_cuentas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresas_cuentas` (
  `id_empresa` int(11) NOT NULL,
  `id_cuenta` int(11) NOT NULL,
  `id_empresa_cuenta` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_empresa_cuenta`),
  KEY `fk_empresas_has_cuentas_cuentas1_idx` (`id_cuenta`),
  KEY `fk_empresas_has_cuentas_empresas1_idx` (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresas_cuentas`
--

LOCK TABLES `empresas_cuentas` WRITE;
/*!40000 ALTER TABLE `empresas_cuentas` DISABLE KEYS */;
INSERT INTO `empresas_cuentas` VALUES (1,1,1),(2,2,2);
/*!40000 ALTER TABLE `empresas_cuentas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `huespedes`
--

DROP TABLE IF EXISTS `huespedes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `huespedes` (
  `id_huesped` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_direccion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_huesped`),
  KEY `fk_huesped_usuarios1_idx` (`id_usuario`),
  KEY `fk_huespedes_direcciones1_idx` (`id_direccion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `huespedes`
--

LOCK TABLES `huespedes` WRITE;
/*!40000 ALTER TABLE `huespedes` DISABLE KEYS */;
INSERT INTO `huespedes` VALUES (1,8,NULL),(2,13,NULL);
/*!40000 ALTER TABLE `huespedes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `huespedes_cuentas`
--

DROP TABLE IF EXISTS `huespedes_cuentas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `huespedes_cuentas` (
  `id_huesped` int(11) NOT NULL,
  `id_cuenta` int(11) NOT NULL,
  `id_huesped_cuenta` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_huesped_cuenta`),
  KEY `fk_huespedes_has_cuentas_cuentas1_idx` (`id_cuenta`),
  KEY `fk_huespedes_has_cuentas_huespedes1_idx` (`id_huesped`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `huespedes_cuentas`
--

LOCK TABLES `huespedes_cuentas` WRITE;
/*!40000 ALTER TABLE `huespedes_cuentas` DISABLE KEYS */;
/*!40000 ALTER TABLE `huespedes_cuentas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `idiomas`
--

DROP TABLE IF EXISTS `idiomas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idiomas` (
  `id_idioma` int(11) NOT NULL,
  `nombre` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `codigo` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_idioma`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `idiomas`
--

LOCK TABLES `idiomas` WRITE;
/*!40000 ALTER TABLE `idiomas` DISABLE KEYS */;
INSERT INTO `idiomas` VALUES (1,'Español','es'),(2,'English','en'),(3,'Deutsch','de'),(4,'Français','fr'),(5,'Italiano','it'),(7,'Русский','ru'),(8,'Čeština','cs'),(10,'Português','pt');
/*!40000 ALTER TABLE `idiomas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instalaciones`
--

DROP TABLE IF EXISTS `instalaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instalaciones` (
  `id_instalacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `id_instalacion_categoria` int(11) NOT NULL,
  PRIMARY KEY (`id_instalacion`),
  KEY `fk_instalaciones_instalaciones_categoria1_idx` (`id_instalacion_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=236 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instalaciones`
--

LOCK TABLES `instalaciones` WRITE;
/*!40000 ALTER TABLE `instalaciones` DISABLE KEYS */;
INSERT INTO `instalaciones` VALUES (105,'Aire acondicionado',1),(106,'Suelo de moqueta',1),(107,'Chimenea',1),(109,'Entrada privada',1),(110,'Insonorización',1),(111,'Lavadora',1),(112,'Piscina privada',1),(113,'Vestidor',1),(114,'Equipo de planchado',1),(115,'Caja fuerte',1),(116,'Zona de estar',1),(117,'Suelo de madera',1),(118,'Secadora',1),(131,'Camas extra largas',1),(132,'Calefacción',1),(134,'Sofá',1),(135,'Suelo de baldosa',1),(136,'Escritorio',1),(137,'Armario',1),(138,'Ventilador',1),(140,'Mosquitera',1),(141,'Sofá cama',1),(143,'Bañera',2),(145,'Bañera de hidromasaje',2),(146,'Ducha',2),(147,'Bidé',2),(151,'Bañera o ducha',2),(154,'Aseo',2),(156,'Secador de pelo',2),(157,'Sauna',2),(174,'Teléfono',3),(177,'Fax',3),(179,'TV',3),(183,'Soporte para iPod',3),(189,'Caja fuerte',3),(192,'Videoconsola',3),(194,'Equipo de música ',3),(202,'Zona de comedor',4),(203,'Parrilla ',4),(204,'Cocina',4),(205,'Frigorífico',4),(206,'Horno',4),(207,'Lava-vajillas',4),(208,'Zona de cocina',4),(209,'Tetera - Cafetera',4),(210,'Fogones',4),(211,'Hervidor eléctrico',4),(212,'Utensilios de cocina',4),(213,'Tostadora',4),(214,'Minibar',4),(215,'Microondas',4),(216,'Toallas - sábanas con suplemento',5),(217,'Wi-Fi',5),(218,'Balcón',6),(219,'Vistas al lago',6),(220,'Patio',6),(221,'Vistas al jardín',6),(222,'Vistas a la piscina',6),(223,'Vistas al mar',6),(224,'Vistas a la montaña',6),(225,'Vistas a un lugar de interés',6),(226,'Primer línea de playa',6),(228,'Cuna para bebé',5),(229,'Conexión usb pincho',5),(230,'Silla para bebé',5),(231,'Cama suplatoria',5),(233,'Pack de bienvenida',5),(234,'Toalla ',5),(235,'Ropa de cama ',5);
/*!40000 ALTER TABLE `instalaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instalaciones_categoria`
--

DROP TABLE IF EXISTS `instalaciones_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instalaciones_categoria` (
  `id_instalacion_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_instalacion_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instalaciones_categoria`
--

LOCK TABLES `instalaciones_categoria` WRITE;
/*!40000 ALTER TABLE `instalaciones_categoria` DISABLE KEYS */;
INSERT INTO `instalaciones_categoria` VALUES (1,'Complementos de la habitación'),(2,'Cuarto de baño'),(3,'Medios de comunicación'),(4,'Cocina'),(5,'Servicios adicionales'),(6,'Exterior / Vistas');
/*!40000 ALTER TABLE `instalaciones_categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lugares_cercanos`
--

DROP TABLE IF EXISTS `lugares_cercanos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lugares_cercanos` (
  `id_lugar_cercano` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `medida` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_lugar_cercano`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lugares_cercanos`
--

LOCK TABLES `lugares_cercanos` WRITE;
/*!40000 ALTER TABLE `lugares_cercanos` DISABLE KEYS */;
INSERT INTO `lugares_cercanos` VALUES (1,'Playa','KM','global'),(2,'Centro','KM','global'),(3,'Aeropuerto','KM','global'),(4,'Transportes públicos','KM','global');
/*!40000 ALTER TABLE `lugares_cercanos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mantenimientos`
--

DROP TABLE IF EXISTS `mantenimientos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mantenimientos` (
  `id_mantenimiento` int(11) NOT NULL AUTO_INCREMENT,
  `id_apartamento` int(11) NOT NULL,
  `tiempo_creacion` timestamp NULL DEFAULT NULL,
  `ultima_modificacion` timestamp NULL DEFAULT NULL,
  `ubicacion` text,
  `solicitante` text,
  `trabajos_solicitados` text,
  `informe_tecnico` text,
  `observaciones` text,
  `estatus` text,
  `fecha_cierre` date DEFAULT NULL,
  `id_reservacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_mantenimiento`),
  KEY `fk_mantenimientos_apartamentos1_idx` (`id_apartamento`),
  KEY `fk_mantenimientos_reservaciones1_idx` (`id_reservacion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mantenimientos`
--

LOCK TABLES `mantenimientos` WRITE;
/*!40000 ALTER TABLE `mantenimientos` DISABLE KEYS */;
INSERT INTO `mantenimientos` VALUES (1,3,'2013-09-18 08:55:46','2013-10-01 16:14:29','123','12','123','123','123','En curso','2013-10-02',NULL),(2,3,'2013-10-01 16:13:58','2013-10-01 16:14:31','123123','123123','123123','123123','123123','Terminado','2013-10-25',NULL);
/*!40000 ALTER TABLE `mantenimientos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mantenimientos_materiales`
--

DROP TABLE IF EXISTS `mantenimientos_materiales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mantenimientos_materiales` (
  `id_mantenimiento_marterial` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` double DEFAULT NULL,
  `descripcion` text,
  `id_mantenimiento` int(11) NOT NULL,
  PRIMARY KEY (`id_mantenimiento_marterial`),
  KEY `fk_mantenimientos_materiales_mantenimientos1_idx` (`id_mantenimiento`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mantenimientos_materiales`
--

LOCK TABLES `mantenimientos_materiales` WRITE;
/*!40000 ALTER TABLE `mantenimientos_materiales` DISABLE KEYS */;
INSERT INTO `mantenimientos_materiales` VALUES (1,123,'123',1);
/*!40000 ALTER TABLE `mantenimientos_materiales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mantenimientos_personal`
--

DROP TABLE IF EXISTS `mantenimientos_personal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mantenimientos_personal` (
  `id_mantenimiento_personal` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `inicio` time DEFAULT NULL,
  `final` time DEFAULT NULL,
  `horas` double DEFAULT NULL,
  `estatus` varchar(45) DEFAULT NULL,
  `id_mantenimiento` int(11) NOT NULL,
  PRIMARY KEY (`id_mantenimiento_personal`),
  KEY `fk_mantenimientos_personal_mantenimientos1_idx` (`id_mantenimiento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mantenimientos_personal`
--

LOCK TABLES `mantenimientos_personal` WRITE;
/*!40000 ALTER TABLE `mantenimientos_personal` DISABLE KEYS */;
/*!40000 ALTER TABLE `mantenimientos_personal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `monedas`
--

DROP TABLE IF EXISTS `monedas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `monedas` (
  `id_moneda` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `simbolo` varchar(45) DEFAULT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `tasa_cambio` double DEFAULT NULL,
  PRIMARY KEY (`id_moneda`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `monedas`
--

LOCK TABLES `monedas` WRITE;
/*!40000 ALTER TABLE `monedas` DISABLE KEYS */;
INSERT INTO `monedas` VALUES (1,'Euro','€','EUR',1),(2,'Dolar','$','USD',0.772439364);
/*!40000 ALTER TABLE `monedas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `opiniones`
--

DROP TABLE IF EXISTS `opiniones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `opiniones` (
  `id_opinion` int(11) NOT NULL AUTO_INCREMENT,
  `opinion` text,
  `puntuacion` double DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT NULL,
  `ultima_actualizacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_apartamento` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_reservacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_opinion`),
  KEY `fk_opiniones_apartamentos1_idx` (`id_apartamento`),
  KEY `fk_opiniones_usuarios1_idx` (`id_usuario`),
  KEY `fk_opiniones_reservaciones1_idx` (`id_reservacion`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `opiniones`
--

LOCK TABLES `opiniones` WRITE;
/*!40000 ALTER TABLE `opiniones` DISABLE KEYS */;
INSERT INTO `opiniones` VALUES (1,'Muy chula la casa y buen servicio! ',9,'2013-12-05 16:24:13','2013-12-05 16:24:13',3,5,NULL);
/*!40000 ALTER TABLE `opiniones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagos_tipos`
--

DROP TABLE IF EXISTS `pagos_tipos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagos_tipos` (
  `id_pago_tipo` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_pago_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagos_tipos`
--

LOCK TABLES `pagos_tipos` WRITE;
/*!40000 ALTER TABLE `pagos_tipos` DISABLE KEYS */;
INSERT INTO `pagos_tipos` VALUES (1,'Master Card'),(2,'American Express'),(3,'Dinner'),(4,'Visa'),(5,'Paypal');
/*!40000 ALTER TABLE `pagos_tipos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paises`
--

DROP TABLE IF EXISTS `paises`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paises` (
  `id_pais` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` int(11) DEFAULT NULL,
  `nombre_completo` varchar(255) DEFAULT NULL,
  `iso3` varchar(3) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `numero` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id_pais`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paises`
--

LOCK TABLES `paises` WRITE;
/*!40000 ALTER TABLE `paises` DISABLE KEYS */;
INSERT INTO `paises` VALUES (1,724,'España','ESP','ES',724),(2,36,'Australia','AUS','AU',36),(3,484,'México','MEX','MX',484),(4,276,'Alemania','DEU','DE',276),(5,643,'Russia','RUS','RU',643);
/*!40000 ALTER TABLE `paises` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `politicas_cancelacion`
--

DROP TABLE IF EXISTS `politicas_cancelacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `politicas_cancelacion` (
  `id_politica_cancelacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text,
  `reembolso_dia` int(11) DEFAULT NULL,
  `comision` double DEFAULT NULL,
  `reembolso_porcentaje` double DEFAULT NULL,
  `descripcion` text,
  PRIMARY KEY (`id_politica_cancelacion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `politicas_cancelacion`
--

LOCK TABLES `politicas_cancelacion` WRITE;
/*!40000 ALTER TABLE `politicas_cancelacion` DISABLE KEYS */;
INSERT INTO `politicas_cancelacion` VALUES (1,'Flexible: reembolso total 1 día antes de la l',1,0,10,NULL),(2,'Moderada: reembolso del importe total 5 días ',5,0,10,NULL);
/*!40000 ALTER TABLE `politicas_cancelacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provincias`
--

DROP TABLE IF EXISTS `provincias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provincias` (
  `id_provincia` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(105) DEFAULT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `id_pais` int(11) NOT NULL,
  PRIMARY KEY (`id_provincia`),
  KEY `fk_provincias_paises1_idx` (`id_pais`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provincias`
--

LOCK TABLES `provincias` WRITE;
/*!40000 ALTER TABLE `provincias` DISABLE KEYS */;
INSERT INTO `provincias` VALUES (1,'Tarragona','tr',1);
/*!40000 ALTER TABLE `provincias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservaciones`
--

DROP TABLE IF EXISTS `reservaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservaciones` (
  `id_reservacion` int(11) NOT NULL AUTO_INCREMENT,
  `tiempo_creacion` timestamp NULL DEFAULT NULL,
  `ultima_modificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_apartamento` int(11) NOT NULL,
  `fecha_entrada` datetime DEFAULT NULL,
  `fecha_salida` datetime DEFAULT NULL,
  `adultos` int(11) DEFAULT NULL,
  `estatus` varchar(45) DEFAULT NULL,
  `ninios` int(11) DEFAULT NULL,
  `bebes` int(11) DEFAULT NULL,
  `apartamento` text,
  `contrato` text,
  `autorizacion` text,
  `request` text,
  `total` double DEFAULT NULL,
  `observaciones` text,
  `motivo_cancelacion` text,
  `notificacion` varchar(45) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `hora_entrada` time DEFAULT NULL,
  `hora_salida` time DEFAULT NULL,
  `id_canal` int(11) NOT NULL,
  `id_responsable_entrada` int(11) DEFAULT NULL,
  `lugar_entrada` varchar(45) DEFAULT NULL,
  `llaves_entregadas` int(11) DEFAULT NULL,
  `llaves_devueltas` int(11) DEFAULT NULL,
  `id_responsable_salida` int(11) DEFAULT NULL,
  `fianza_estado` varchar(45) DEFAULT NULL,
  `revision_salida_comentarios` text,
  `parking_numero` text,
  `parking_llaves_entregadas` int(11) DEFAULT NULL,
  `parking_mandos_entregados` int(11) DEFAULT NULL,
  `parking_llaves_devueltas` int(11) DEFAULT NULL,
  `parking_mandos_devueltos` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_reservacion`),
  KEY `fk_reservaciones_apartamentos1_idx` (`id_apartamento`),
  KEY `fk_reservaciones_usuarios1_idx` (`id_usuario`),
  KEY `fk_reservaciones_canales1_idx` (`id_canal`),
  KEY `fk_reservaciones_usuarios2_idx` (`id_responsable_entrada`),
  KEY `fk_reservaciones_usuarios3_idx` (`id_responsable_salida`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservaciones`
--

LOCK TABLES `reservaciones` WRITE;
/*!40000 ALTER TABLE `reservaciones` DISABLE KEYS */;
INSERT INTO `reservaciones` VALUES (3,'2013-10-01 00:00:00','0000-00-00 00:00:00',3,'2013-10-15 00:00:00','2013-10-24 00:00:00',2,'Aprobado',0,0,'O:11:\"Apartamento\":41:{s:13:\"idApartamento\";s:1:\"3\";s:17:\"idEmpresaContrato\";s:1:\"2\";s:6:\"nombre\";s:9:\"LAS DUNAS\";s:18:\"idApartamentosTipo\";s:1:\"4\";s:11:\"idDireccion\";s:1:\"5\";s:8:\"idMoneda\";s:1:\"1\";s:14:\"horarioEntrada\";s:8:\"15:00:00\";s:13:\"horarioSalida\";s:8:\"12:00:00\";s:16:\"descripcionCorta\";s:0:\"\";s:16:\"descripcionLarga\";s:760:\" Los Apartamentos LAS DUNAS cuentan con 2 o 3 dormitorios, conexión Wi-Fi gratuita y terraza privada. Además, incluyen una cocina totalmente equipada y una zona de estar con un cómodo sofá cama y TV de pantalla plana. Y parking gratuito.\r\n\r\nLa Villa de Cambrils a tan sólo 5 min. en coche, les depara un privilegiado clima, con playas de reconocido prestigio. Su puerto pesquero hace que la gastronomía sea un referente en la cocina marinera. Dispone de una amplia oferta de ocio y cultura. Situado a 3 kms de Salou, 5 km. de Port Aventura el más importante parque temático del pais, a 20kms de la Ciudad de Tarragona conocida por sus restos arqueológicos y Monumento de la Humanidad, hacen del Complejo LAS DUNAS un referente vacacional de prestigio.\";s:8:\"idIdioma\";s:1:\"1\";s:20:\"descripcionServicios\";s:0:\"\";s:22:\"descripcionCondiciones\";s:0:\"\";s:14:\"tiempoCreacion\";s:19:\"2013-08-23 03:58:00\";s:18:\"ultimaModificacion\";s:19:\"2013-08-26 05:45:16\";s:7:\"estatus\";s:0:\"\";s:9:\"idUsuario\";s:1:\"1\";s:10:\"tarifaBase\";s:1:\"0\";s:12:\"tarifaSemana\";s:1:\"0\";s:9:\"tarifaMes\";s:1:\"0\";s:13:\"estadiaMaxima\";s:1:\"7\";s:13:\"estadiaMinima\";s:1:\"1\";s:23:\"huespedAdicionalApartir\";s:1:\"0\";s:21:\"huespedAdicionalCosto\";s:1:\"0\";s:13:\"costoLimpieza\";s:1:\"0\";s:17:\"depositoSeguridad\";s:1:\"0\";s:15:\"precioFinSemana\";s:1:\"0\";s:6:\"normas\";s:1:\"a\";s:7:\"tamanio\";s:2:\"70\";s:17:\"capacidadPersonas\";s:1:\"6\";s:12:\"habitaciones\";s:1:\"2\";s:5:\"camas\";s:1:\"4\";s:8:\"tipoCama\";s:0:\"\";s:5:\"banio\";s:1:\"2\";s:8:\"mascotas\";s:1:\"1\";s:6:\"manual\";s:1:\"a\";s:8:\"cantidad\";N;s:6:\"codigo\";s:0:\"\";s:21:\"idPoliticaCancelacion\";N;s:24:\"idApartamentoDescripcion\";N;s:9:\"claveWifi\";N;}','','','a:41:{s:4:\"args\";s:18:\"admin-ajax-reserva\";s:6:\"action\";s:13:\"updateReserva\";s:13:\"idReservacion\";s:1:\"3\";s:11:\"apartamento\";s:9:\"LAS DUNAS\";s:13:\"idApartamento\";s:1:\"3\";s:7:\"usuario\";s:24:\"mauro barbarroja iriarte\";s:9:\"huespedId\";s:1:\"5\";s:6:\"nombre\";s:5:\"mauro\";s:15:\"apellidoPaterno\";s:10:\"barbarroja\";s:5:\"email\";s:19:\"mauro@esintesys.com\";s:8:\"telefono\";s:9:\"678799986\";s:15:\"telefonoAlterno\";s:0:\"\";s:8:\"password\";s:0:\"\";s:11:\"fechaInicio\";s:10:\"15-10-2013\";s:10:\"fechaFinal\";s:10:\"24-10-2013\";s:12:\"totalReserva\";s:4:\"1107\";s:11:\"horaEntrada\";s:5:\"00:00\";s:10:\"horaSalida\";s:5:\"00:00\";s:7:\"idCanal\";s:1:\"1\";s:7:\"adultos\";s:1:\"2\";s:6:\"ninios\";s:1:\"0\";s:5:\"bebes\";s:1:\"0\";s:5:\"cobro\";a:1:{s:4:\"tipo\";s:8:\"efectivo\";}s:6:\"paypal\";a:2:{i:7;a:6:{s:6:\"paypal\";s:15:\"ruben@gmail.com\";s:17:\"idReservacionPago\";s:1:\"7\";s:9:\"formaPago\";s:4:\"pago\";s:7:\"importe\";s:3:\"123\";s:12:\"autorizacion\";s:9:\"123123123\";s:6:\"estado\";s:10:\"confirmada\";}s:16:\"XX_1380652945899\";a:5:{s:6:\"paypal\";s:16:\"dsdsd@asdasd.com\";s:9:\"formaPago\";s:4:\"pago\";s:7:\"importe\";s:3:\"123\";s:12:\"autorizacion\";s:9:\"123123123\";s:6:\"estado\";s:10:\"confirmada\";}}s:8:\"efectivo\";a:1:{s:16:\"XX_1380652972932\";a:4:{s:7:\"importe\";s:3:\"343\";s:9:\"formaPago\";s:6:\"fianza\";s:12:\"autorizacion\";s:9:\"124234234\";s:6:\"estado\";s:8:\"devuelto\";}}s:20:\"idResponsableEntrada\";s:1:\"5\";s:16:\"llavesEntregadas\";s:1:\"0\";s:12:\"lugarEntrada\";s:0:\"\";s:13:\"parkingNumero\";s:0:\"\";s:23:\"parkingLlavesEntregadas\";s:1:\"0\";s:23:\"parkingMandosEntregados\";s:1:\"0\";s:19:\"idResponsableSalida\";s:1:\"5\";s:15:\"llavesDevueltas\";s:1:\"0\";s:25:\"revisionSalidaComentarios\";s:0:\"\";s:22:\"parkingLlavesDevueltas\";s:1:\"0\";s:22:\"parkingMandosDevueltos\";s:1:\"0\";s:13:\"observaciones\";s:0:\"\";s:9:\"PHPSESSID\";s:32:\"231269e840c7b910ad768291fa02aff8\";s:17:\"_latitude_session\";s:32:\"776f15a3a47b42f68a52a7b6662e3b8c\";s:16:\"user_credentials\";s:132:\"38511e0fed296a4a0009408baf4e548a0f4bcdc48fe03600d02f7539ca53dcf9ff6edced60c6b757761302591ce904801358d495d6167f6283c4faa449db6156::22\";s:7:\"__atuvc\";s:26:\"13|36,7|37,53|38,1|39,3|40\";}',1107,'','','',5,'00:00:00','00:00:00',1,5,'',0,0,5,'','','',0,0,0,0),(6,'2013-10-18 00:00:00','0000-00-00 00:00:00',3,'2013-09-18 00:00:00','2013-09-26 00:00:00',2,'Aprobado',0,0,'O:11:\"Apartamento\":42:{s:13:\"idApartamento\";s:1:\"3\";s:17:\"idEmpresaContrato\";s:1:\"2\";s:6:\"nombre\";s:9:\"LAS DUNAS\";s:18:\"idApartamentosTipo\";s:1:\"4\";s:11:\"idDireccion\";s:1:\"5\";s:8:\"idMoneda\";s:1:\"1\";s:14:\"horarioEntrada\";s:8:\"15:00:00\";s:13:\"horarioSalida\";s:8:\"12:00:00\";s:16:\"descripcionCorta\";s:0:\"\";s:16:\"descripcionLarga\";s:760:\" Los Apartamentos LAS DUNAS cuentan con 2 o 3 dormitorios, conexión Wi-Fi gratuita y terraza privada. Además, incluyen una cocina totalmente equipada y una zona de estar con un cómodo sofá cama y TV de pantalla plana. Y parking gratuito.\r\n\r\nLa Villa de Cambrils a tan sólo 5 min. en coche, les depara un privilegiado clima, con playas de reconocido prestigio. Su puerto pesquero hace que la gastronomía sea un referente en la cocina marinera. Dispone de una amplia oferta de ocio y cultura. Situado a 3 kms de Salou, 5 km. de Port Aventura el más importante parque temático del pais, a 20kms de la Ciudad de Tarragona conocida por sus restos arqueológicos y Monumento de la Humanidad, hacen del Complejo LAS DUNAS un referente vacacional de prestigio.\";s:8:\"idIdioma\";s:1:\"1\";s:20:\"descripcionServicios\";s:0:\"\";s:22:\"descripcionCondiciones\";s:0:\"\";s:14:\"tiempoCreacion\";s:19:\"2013-08-23 03:58:00\";s:18:\"ultimaModificacion\";s:19:\"2013-10-18 22:25:15\";s:7:\"estatus\";s:0:\"\";s:9:\"idUsuario\";s:1:\"1\";s:10:\"tarifaBase\";s:1:\"0\";s:12:\"tarifaSemana\";s:1:\"0\";s:9:\"tarifaMes\";s:1:\"0\";s:13:\"estadiaMaxima\";s:1:\"7\";s:13:\"estadiaMinima\";s:1:\"1\";s:23:\"huespedAdicionalApartir\";s:1:\"0\";s:21:\"huespedAdicionalCosto\";s:1:\"0\";s:13:\"costoLimpieza\";s:1:\"0\";s:17:\"depositoSeguridad\";s:1:\"0\";s:15:\"precioFinSemana\";s:1:\"0\";s:6:\"normas\";s:11:\" LAS DUNAS \";s:7:\"tamanio\";s:2:\"70\";s:17:\"capacidadPersonas\";s:1:\"6\";s:12:\"habitaciones\";s:1:\"2\";s:5:\"camas\";s:1:\"4\";s:8:\"tipoCama\";s:0:\"\";s:5:\"banio\";s:1:\"2\";s:8:\"mascotas\";s:1:\"1\";s:6:\"manual\";s:1:\"a\";s:8:\"cantidad\";s:1:\"1\";s:6:\"codigo\";s:0:\"\";s:21:\"idPoliticaCancelacion\";s:1:\"1\";s:24:\"idApartamentoDescripcion\";N;s:9:\"claveWifi\";s:8:\"12312323\";s:10:\"idComplejo\";s:1:\"1\";}','','','a:38:{s:4:\"args\";s:18:\"admin-ajax-reserva\";s:6:\"action\";s:13:\"updateReserva\";s:13:\"idReservacion\";s:1:\"6\";s:11:\"apartamento\";s:9:\"LAS DUNAS\";s:13:\"idApartamento\";s:1:\"3\";s:7:\"usuario\";s:17:\"Admin admin admin\";s:9:\"huespedId\";s:1:\"1\";s:6:\"nombre\";s:5:\"Admin\";s:15:\"apellidoPaterno\";s:5:\"admin\";s:5:\"email\";s:25:\"admin@clickandbooking.com\";s:8:\"telefono\";s:6:\"123123\";s:15:\"telefonoAlterno\";s:6:\"123123\";s:8:\"password\";s:0:\"\";s:11:\"fechaInicio\";s:10:\"18-09-2013\";s:10:\"fechaFinal\";s:10:\"26-09-2013\";s:12:\"totalReserva\";s:3:\"984\";s:11:\"horaEntrada\";s:5:\"03:00\";s:10:\"horaSalida\";s:5:\"03:00\";s:7:\"idCanal\";s:1:\"1\";s:7:\"adultos\";s:1:\"2\";s:6:\"ninios\";s:1:\"0\";s:5:\"bebes\";s:1:\"0\";s:5:\"cobro\";a:1:{s:4:\"tipo\";s:7:\"tarjeta\";}s:7:\"tarjeta\";a:1:{i:12;a:12:{s:7:\"titular\";s:6:\"Nombre\";s:17:\"idReservacionPago\";s:2:\"12\";s:9:\"formaPago\";s:4:\"pago\";s:11:\"tipoTarjeta\";s:11:\"Master Card\";s:6:\"numero\";s:9:\"123123123\";s:3:\"cvv\";s:3:\"123\";s:12:\"caducidadMes\";s:1:\"2\";s:13:\"caducidadAnio\";s:4:\"2015\";s:8:\"validado\";s:1:\"1\";s:7:\"importe\";s:3:\"100\";s:12:\"autorizacion\";s:12:\"123123123123\";s:6:\"estado\";s:10:\"confirmada\";}}s:6:\"paypal\";a:1:{i:13;a:7:{s:6:\"paypal\";s:16:\"ruben@hotmai.com\";s:17:\"idReservacionPago\";s:2:\"13\";s:9:\"formaPago\";s:4:\"pago\";s:7:\"importe\";s:3:\"800\";s:12:\"autorizacion\";s:7:\"1123123\";s:6:\"estado\";s:10:\"confirmada\";s:8:\"validado\";s:1:\"1\";}}s:8:\"efectivo\";a:1:{i:15;a:5:{s:7:\"importe\";s:3:\"123\";s:9:\"formaPago\";s:6:\"fianza\";s:17:\"idReservacionPago\";s:2:\"15\";s:12:\"autorizacion\";s:9:\"123123123\";s:6:\"estado\";s:8:\"retenido\";}}s:20:\"idResponsableEntrada\";s:1:\"5\";s:16:\"llavesEntregadas\";s:1:\"2\";s:12:\"lugarEntrada\";s:18:\"Lugar de entrada!!\";s:13:\"parkingNumero\";s:11:\"12312312312\";s:23:\"parkingLlavesEntregadas\";s:1:\"3\";s:23:\"parkingMandosEntregados\";s:1:\"4\";s:19:\"idResponsableSalida\";s:1:\"5\";s:15:\"llavesDevueltas\";s:1:\"9\";s:25:\"revisionSalidaComentarios\";s:29:\"Comentarios de revisión ....\";s:22:\"parkingLlavesDevueltas\";s:1:\"6\";s:22:\"parkingMandosDevueltos\";s:1:\"0\";s:13:\"observaciones\";s:8:\"12312312\";}',984,'12312312','','',1,'03:00:00','03:00:00',1,5,'Lugar de entrada!!',2,9,5,'','Comentarios de revisión ....','12312312312',3,4,6,0),(7,'2013-09-18 00:00:00','0000-00-00 00:00:00',3,'2013-09-18 00:00:00','2013-09-21 00:00:00',2,'Pendiente',0,0,'O:11:\"Apartamento\":41:{s:13:\"idApartamento\";s:1:\"3\";s:17:\"idEmpresaContrato\";s:1:\"2\";s:6:\"nombre\";s:9:\"LAS DUNAS\";s:18:\"idApartamentosTipo\";s:1:\"4\";s:11:\"idDireccion\";s:1:\"5\";s:8:\"idMoneda\";s:1:\"1\";s:14:\"horarioEntrada\";s:8:\"15:00:00\";s:13:\"horarioSalida\";s:8:\"12:00:00\";s:16:\"descripcionCorta\";s:0:\"\";s:16:\"descripcionLarga\";s:760:\" Los Apartamentos LAS DUNAS cuentan con 2 o 3 dormitorios, conexión Wi-Fi gratuita y terraza privada. Además, incluyen una cocina totalmente equipada y una zona de estar con un cómodo sofá cama y TV de pantalla plana. Y parking gratuito.\r\n\r\nLa Villa de Cambrils a tan sólo 5 min. en coche, les depara un privilegiado clima, con playas de reconocido prestigio. Su puerto pesquero hace que la gastronomía sea un referente en la cocina marinera. Dispone de una amplia oferta de ocio y cultura. Situado a 3 kms de Salou, 5 km. de Port Aventura el más importante parque temático del pais, a 20kms de la Ciudad de Tarragona conocida por sus restos arqueológicos y Monumento de la Humanidad, hacen del Complejo LAS DUNAS un referente vacacional de prestigio.\";s:8:\"idIdioma\";s:1:\"1\";s:20:\"descripcionServicios\";s:0:\"\";s:22:\"descripcionCondiciones\";s:0:\"\";s:14:\"tiempoCreacion\";s:19:\"2013-08-23 03:58:00\";s:18:\"ultimaModificacion\";s:19:\"2013-08-26 05:45:16\";s:7:\"estatus\";s:0:\"\";s:9:\"idUsuario\";s:1:\"1\";s:10:\"tarifaBase\";s:1:\"0\";s:12:\"tarifaSemana\";s:1:\"0\";s:9:\"tarifaMes\";s:1:\"0\";s:13:\"estadiaMaxima\";s:1:\"7\";s:13:\"estadiaMinima\";s:1:\"1\";s:23:\"huespedAdicionalApartir\";s:1:\"0\";s:21:\"huespedAdicionalCosto\";s:1:\"0\";s:13:\"costoLimpieza\";s:1:\"0\";s:17:\"depositoSeguridad\";s:1:\"0\";s:15:\"precioFinSemana\";s:1:\"0\";s:6:\"normas\";s:1:\"a\";s:7:\"tamanio\";s:2:\"70\";s:17:\"capacidadPersonas\";s:1:\"6\";s:12:\"habitaciones\";s:1:\"2\";s:5:\"camas\";s:1:\"4\";s:8:\"tipoCama\";s:0:\"\";s:5:\"banio\";s:1:\"2\";s:8:\"mascotas\";s:1:\"1\";s:6:\"manual\";s:1:\"a\";s:8:\"cantidad\";N;s:6:\"codigo\";s:0:\"\";s:21:\"idPoliticaCancelacion\";N;s:24:\"idApartamentoDescripcion\";N;s:9:\"claveWifi\";N;}','','','a:41:{s:4:\"args\";s:18:\"admin-ajax-reserva\";s:6:\"action\";s:13:\"updateReserva\";s:11:\"apartamento\";s:9:\"LAS DUNAS\";s:13:\"idApartamento\";s:1:\"3\";s:7:\"usuario\";s:24:\"mauro barbarroja iriarte\";s:9:\"huespedId\";s:1:\"5\";s:6:\"nombre\";s:5:\"mauro\";s:15:\"apellidoPaterno\";s:10:\"barbarroja\";s:5:\"email\";s:19:\"mauro@esintesys.com\";s:8:\"telefono\";s:9:\"678799986\";s:15:\"telefonoAlterno\";s:0:\"\";s:8:\"password\";s:0:\"\";s:11:\"fechaInicio\";s:10:\"18-09-2013\";s:10:\"fechaFinal\";s:10:\"21-09-2013\";s:12:\"totalReserva\";s:3:\"369\";s:11:\"horaEntrada\";s:5:\"12:00\";s:10:\"horaSalida\";s:5:\"08:00\";s:7:\"idCanal\";s:1:\"1\";s:7:\"adultos\";s:1:\"2\";s:6:\"ninios\";s:1:\"0\";s:5:\"bebes\";s:1:\"0\";s:5:\"cobro\";a:1:{s:4:\"tipo\";s:7:\"tarjeta\";}s:7:\"tarjeta\";a:1:{s:2:\"XX\";a:6:{s:6:\"nombre\";s:0:\"\";s:4:\"tipo\";s:0:\"\";s:6:\"numero\";s:0:\"\";s:3:\"cvv\";s:0:\"\";s:7:\"importe\";s:0:\"\";s:12:\"autorizacion\";s:0:\"\";}}s:6:\"cuenta\";a:1:{s:2:\"XX\";a:1:{s:4:\"iban\";s:0:\"\";}}s:6:\"paypal\";a:1:{s:2:\"XX\";a:1:{s:6:\"paypal\";s:0:\"\";}}s:20:\"idResponsableEntrada\";s:1:\"5\";s:16:\"llavesEntregadas\";s:1:\"2\";s:12:\"lugarEntrada\";s:4:\"Casa\";s:13:\"parkingNumero\";s:0:\"\";s:23:\"parkingLlavesEntregadas\";s:1:\"0\";s:23:\"parkingMandosEntregados\";s:1:\"0\";s:19:\"idResponsableSalida\";s:1:\"5\";s:15:\"llavesDevueltas\";s:1:\"2\";s:25:\"revisionSalidaComentarios\";s:0:\"\";s:22:\"parkingLlavesDevueltas\";s:1:\"0\";s:22:\"parkingMandosDevueltos\";s:1:\"0\";s:13:\"observaciones\";s:8:\"dfsdfsdf\";s:9:\"PHPSESSID\";s:32:\"231269e840c7b910ad768291fa02aff8\";s:17:\"_latitude_session\";s:32:\"d6283583333ad3805595ed2569905e95\";s:16:\"user_credentials\";s:131:\"9630454fbb4992ecb7b43678bd2fffee89073d2d3132294530cf5a24ade12e9e6ac8d076d5fead60e235265043cd8782e05e93878f9a7c3be06b66eee8e5bc5d::7\";s:7:\"__atuvc\";s:26:\"0|34,4|35,13|36,7|37,47|38\";}',369,'dfsdfsdf','','',5,'12:00:00','08:00:00',1,5,'Casa',2,2,5,'','','',0,0,0,0),(8,'2013-09-20 00:00:00','0000-00-00 00:00:00',3,'2013-09-18 00:00:00','2013-09-26 00:00:00',2,'Rechazado',0,0,'O:11:\"Apartamento\":41:{s:13:\"idApartamento\";s:1:\"3\";s:17:\"idEmpresaContrato\";s:1:\"2\";s:6:\"nombre\";s:9:\"LAS DUNAS\";s:18:\"idApartamentosTipo\";s:1:\"4\";s:11:\"idDireccion\";s:1:\"5\";s:8:\"idMoneda\";s:1:\"1\";s:14:\"horarioEntrada\";s:8:\"15:00:00\";s:13:\"horarioSalida\";s:8:\"12:00:00\";s:16:\"descripcionCorta\";s:0:\"\";s:16:\"descripcionLarga\";s:760:\" Los Apartamentos LAS DUNAS cuentan con 2 o 3 dormitorios, conexión Wi-Fi gratuita y terraza privada. Además, incluyen una cocina totalmente equipada y una zona de estar con un cómodo sofá cama y TV de pantalla plana. Y parking gratuito.\r\n\r\nLa Villa de Cambrils a tan sólo 5 min. en coche, les depara un privilegiado clima, con playas de reconocido prestigio. Su puerto pesquero hace que la gastronomía sea un referente en la cocina marinera. Dispone de una amplia oferta de ocio y cultura. Situado a 3 kms de Salou, 5 km. de Port Aventura el más importante parque temático del pais, a 20kms de la Ciudad de Tarragona conocida por sus restos arqueológicos y Monumento de la Humanidad, hacen del Complejo LAS DUNAS un referente vacacional de prestigio.\";s:8:\"idIdioma\";s:1:\"1\";s:20:\"descripcionServicios\";s:0:\"\";s:22:\"descripcionCondiciones\";s:0:\"\";s:14:\"tiempoCreacion\";s:19:\"2013-08-23 03:58:00\";s:18:\"ultimaModificacion\";s:19:\"2013-08-26 05:45:16\";s:7:\"estatus\";s:0:\"\";s:9:\"idUsuario\";s:1:\"1\";s:10:\"tarifaBase\";s:1:\"0\";s:12:\"tarifaSemana\";s:1:\"0\";s:9:\"tarifaMes\";s:1:\"0\";s:13:\"estadiaMaxima\";s:1:\"7\";s:13:\"estadiaMinima\";s:1:\"1\";s:23:\"huespedAdicionalApartir\";s:1:\"0\";s:21:\"huespedAdicionalCosto\";s:1:\"0\";s:13:\"costoLimpieza\";s:1:\"0\";s:17:\"depositoSeguridad\";s:1:\"0\";s:15:\"precioFinSemana\";s:1:\"0\";s:6:\"normas\";s:1:\"a\";s:7:\"tamanio\";s:2:\"70\";s:17:\"capacidadPersonas\";s:1:\"6\";s:12:\"habitaciones\";s:1:\"2\";s:5:\"camas\";s:1:\"4\";s:8:\"tipoCama\";s:0:\"\";s:5:\"banio\";s:1:\"2\";s:8:\"mascotas\";s:1:\"1\";s:6:\"manual\";s:1:\"a\";s:8:\"cantidad\";N;s:6:\"codigo\";s:0:\"\";s:21:\"idPoliticaCancelacion\";N;s:24:\"idApartamentoDescripcion\";N;s:9:\"claveWifi\";N;}','','','a:39:{s:4:\"args\";s:18:\"admin-ajax-reserva\";s:6:\"action\";s:13:\"updateReserva\";s:13:\"idReservacion\";s:1:\"8\";s:11:\"apartamento\";s:9:\"LAS DUNAS\";s:13:\"idApartamento\";s:1:\"3\";s:7:\"usuario\";s:24:\"mauro barbarroja iriarte\";s:9:\"huespedId\";s:1:\"5\";s:6:\"nombre\";s:5:\"mauro\";s:15:\"apellidoPaterno\";s:10:\"barbarroja\";s:5:\"email\";s:19:\"mauro@esintesys.com\";s:8:\"telefono\";s:9:\"678799986\";s:15:\"telefonoAlterno\";s:0:\"\";s:8:\"password\";s:0:\"\";s:11:\"fechaInicio\";s:10:\"18-09-2013\";s:10:\"fechaFinal\";s:10:\"26-09-2013\";s:12:\"totalReserva\";s:3:\"618\";s:11:\"horaEntrada\";s:5:\"06:00\";s:10:\"horaSalida\";s:5:\"07:00\";s:7:\"idCanal\";s:1:\"1\";s:7:\"adultos\";s:1:\"2\";s:6:\"ninios\";s:1:\"0\";s:5:\"bebes\";s:1:\"0\";s:5:\"cobro\";a:1:{s:4:\"tipo\";s:7:\"tarjeta\";}s:7:\"tarjeta\";a:2:{s:16:\"XX_1379684619861\";a:10:{s:7:\"titular\";s:9:\"123123123\";s:9:\"formaPago\";s:4:\"pago\";s:11:\"tipoTarjeta\";s:11:\"Master Card\";s:6:\"numero\";s:6:\"123123\";s:3:\"cvv\";s:3:\"123\";s:12:\"caducidadMes\";s:1:\"3\";s:13:\"caducidadAnio\";s:4:\"2014\";s:7:\"importe\";s:3:\"435\";s:12:\"autorizacion\";s:9:\"123123123\";s:6:\"estado\";s:10:\"confirmada\";}i:5;a:11:{s:7:\"titular\";s:18:\"iosdjfiosd fosid f\";s:17:\"idReservacionPago\";s:1:\"5\";s:9:\"formaPago\";s:6:\"fianza\";s:11:\"tipoTarjeta\";s:12:\"Visa débito\";s:6:\"numero\";s:8:\"12312312\";s:3:\"cvv\";s:3:\"123\";s:12:\"caducidadMes\";s:1:\"3\";s:13:\"caducidadAnio\";s:4:\"2016\";s:7:\"importe\";s:3:\"123\";s:12:\"autorizacion\";s:9:\"123123123\";s:6:\"estado\";s:8:\"retenido\";}}s:20:\"idResponsableEntrada\";s:1:\"5\";s:16:\"llavesEntregadas\";s:2:\"10\";s:12:\"lugarEntrada\";s:8:\"lugar...\";s:13:\"parkingNumero\";s:10:\"parking...\";s:23:\"parkingLlavesEntregadas\";s:2:\"10\";s:23:\"parkingMandosEntregados\";s:1:\"6\";s:19:\"idResponsableSalida\";s:1:\"5\";s:15:\"llavesDevueltas\";s:1:\"8\";s:25:\"revisionSalidaComentarios\";s:11:\"comentarios\";s:22:\"parkingLlavesDevueltas\";s:1:\"5\";s:22:\"parkingMandosDevueltos\";s:1:\"8\";s:13:\"observaciones\";s:9:\"123123123\";s:9:\"PHPSESSID\";s:32:\"231269e840c7b910ad768291fa02aff8\";s:17:\"_latitude_session\";s:32:\"776f15a3a47b42f68a52a7b6662e3b8c\";s:7:\"__atuvc\";s:26:\"0|34,4|35,13|36,7|37,53|38\";}',618,'123123123','','',5,'06:00:00','07:00:00',1,5,'lugar...',10,8,5,'','comentarios','parking...',10,6,5,8),(9,'2013-10-01 00:00:00','0000-00-00 00:00:00',3,'2013-10-08 00:00:00','2013-10-10 00:00:00',2,'Aprobado',0,0,'O:11:\"Apartamento\":41:{s:13:\"idApartamento\";s:1:\"3\";s:17:\"idEmpresaContrato\";s:1:\"2\";s:6:\"nombre\";s:9:\"LAS DUNAS\";s:18:\"idApartamentosTipo\";s:1:\"4\";s:11:\"idDireccion\";s:1:\"5\";s:8:\"idMoneda\";s:1:\"1\";s:14:\"horarioEntrada\";s:8:\"15:00:00\";s:13:\"horarioSalida\";s:8:\"12:00:00\";s:16:\"descripcionCorta\";s:0:\"\";s:16:\"descripcionLarga\";s:760:\" Los Apartamentos LAS DUNAS cuentan con 2 o 3 dormitorios, conexión Wi-Fi gratuita y terraza privada. Además, incluyen una cocina totalmente equipada y una zona de estar con un cómodo sofá cama y TV de pantalla plana. Y parking gratuito.\r\n\r\nLa Villa de Cambrils a tan sólo 5 min. en coche, les depara un privilegiado clima, con playas de reconocido prestigio. Su puerto pesquero hace que la gastronomía sea un referente en la cocina marinera. Dispone de una amplia oferta de ocio y cultura. Situado a 3 kms de Salou, 5 km. de Port Aventura el más importante parque temático del pais, a 20kms de la Ciudad de Tarragona conocida por sus restos arqueológicos y Monumento de la Humanidad, hacen del Complejo LAS DUNAS un referente vacacional de prestigio.\";s:8:\"idIdioma\";s:1:\"1\";s:20:\"descripcionServicios\";s:0:\"\";s:22:\"descripcionCondiciones\";s:0:\"\";s:14:\"tiempoCreacion\";s:19:\"2013-08-23 03:58:00\";s:18:\"ultimaModificacion\";s:19:\"2013-08-26 05:45:16\";s:7:\"estatus\";s:0:\"\";s:9:\"idUsuario\";s:1:\"1\";s:10:\"tarifaBase\";s:1:\"0\";s:12:\"tarifaSemana\";s:1:\"0\";s:9:\"tarifaMes\";s:1:\"0\";s:13:\"estadiaMaxima\";s:1:\"7\";s:13:\"estadiaMinima\";s:1:\"1\";s:23:\"huespedAdicionalApartir\";s:1:\"0\";s:21:\"huespedAdicionalCosto\";s:1:\"0\";s:13:\"costoLimpieza\";s:1:\"0\";s:17:\"depositoSeguridad\";s:1:\"0\";s:15:\"precioFinSemana\";s:1:\"0\";s:6:\"normas\";s:1:\"a\";s:7:\"tamanio\";s:2:\"70\";s:17:\"capacidadPersonas\";s:1:\"6\";s:12:\"habitaciones\";s:1:\"2\";s:5:\"camas\";s:1:\"4\";s:8:\"tipoCama\";s:0:\"\";s:5:\"banio\";s:1:\"2\";s:8:\"mascotas\";s:1:\"1\";s:6:\"manual\";s:1:\"a\";s:8:\"cantidad\";N;s:6:\"codigo\";s:0:\"\";s:21:\"idPoliticaCancelacion\";N;s:24:\"idApartamentoDescripcion\";N;s:9:\"claveWifi\";N;}','','','a:41:{s:4:\"args\";s:18:\"admin-ajax-reserva\";s:6:\"action\";s:13:\"updateReserva\";s:13:\"idReservacion\";s:1:\"9\";s:11:\"apartamento\";s:9:\"LAS DUNAS\";s:13:\"idApartamento\";s:1:\"3\";s:7:\"usuario\";s:24:\"mauro barbarroja iriarte\";s:9:\"huespedId\";s:1:\"5\";s:6:\"nombre\";s:5:\"mauro\";s:15:\"apellidoPaterno\";s:10:\"barbarroja\";s:5:\"email\";s:19:\"mauro@esintesys.com\";s:8:\"telefono\";s:9:\"678799986\";s:15:\"telefonoAlterno\";s:0:\"\";s:8:\"password\";s:0:\"\";s:11:\"fechaInicio\";s:10:\"08-10-2013\";s:10:\"fechaFinal\";s:10:\"10-10-2013\";s:12:\"totalReserva\";s:3:\"246\";s:11:\"horaEntrada\";s:5:\"04:00\";s:10:\"horaSalida\";s:5:\"06:00\";s:7:\"idCanal\";s:1:\"1\";s:7:\"adultos\";s:1:\"2\";s:6:\"ninios\";s:1:\"0\";s:5:\"bebes\";s:1:\"0\";s:5:\"cobro\";a:1:{s:4:\"tipo\";s:7:\"tarjeta\";}s:7:\"tarjeta\";a:1:{i:8;a:11:{s:7:\"titular\";s:9:\"wsdfsdfsd\";s:17:\"idReservacionPago\";s:1:\"8\";s:9:\"formaPago\";s:4:\"pago\";s:11:\"tipoTarjeta\";s:11:\"Master Card\";s:6:\"numero\";s:9:\"123123123\";s:3:\"cvv\";s:3:\"123\";s:12:\"caducidadMes\";s:1:\"3\";s:13:\"caducidadAnio\";s:4:\"2016\";s:7:\"importe\";s:3:\"233\";s:12:\"autorizacion\";s:9:\"123123213\";s:6:\"estado\";s:10:\"confirmada\";}}s:8:\"efectivo\";a:1:{i:9;a:5:{s:7:\"importe\";s:4:\"3443\";s:9:\"formaPago\";s:6:\"fianza\";s:17:\"idReservacionPago\";s:1:\"9\";s:12:\"autorizacion\";s:9:\"123123123\";s:6:\"estado\";s:8:\"retenido\";}}s:20:\"idResponsableEntrada\";s:1:\"5\";s:16:\"llavesEntregadas\";s:1:\"0\";s:12:\"lugarEntrada\";s:0:\"\";s:13:\"parkingNumero\";s:0:\"\";s:23:\"parkingLlavesEntregadas\";s:1:\"0\";s:23:\"parkingMandosEntregados\";s:1:\"0\";s:19:\"idResponsableSalida\";s:1:\"5\";s:15:\"llavesDevueltas\";s:1:\"0\";s:25:\"revisionSalidaComentarios\";s:0:\"\";s:22:\"parkingLlavesDevueltas\";s:1:\"0\";s:22:\"parkingMandosDevueltos\";s:1:\"0\";s:13:\"observaciones\";s:0:\"\";s:9:\"PHPSESSID\";s:32:\"231269e840c7b910ad768291fa02aff8\";s:17:\"_latitude_session\";s:32:\"776f15a3a47b42f68a52a7b6662e3b8c\";s:16:\"user_credentials\";s:132:\"38511e0fed296a4a0009408baf4e548a0f4bcdc48fe03600d02f7539ca53dcf9ff6edced60c6b757761302591ce904801358d495d6167f6283c4faa449db6156::22\";s:7:\"__atuvc\";s:26:\"13|36,7|37,53|38,1|39,2|40\";}',246,'','','',5,'04:00:00','06:00:00',1,5,'',0,0,5,'','','',0,0,0,0),(13,'2013-11-20 00:00:00','0000-00-00 00:00:00',3,'2013-11-23 00:00:00','2013-11-28 00:00:00',1,'Pendiente',NULL,NULL,'','','','',1485,'','','',14,'00:00:00','00:00:00',1,NULL,'',NULL,NULL,NULL,'','','',NULL,NULL,NULL,NULL),(15,'2013-12-01 23:00:00','0000-00-00 00:00:00',3,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,'Pendiente',NULL,NULL,'','','','',23720,'','','',16,'00:00:00','00:00:00',1,NULL,'',NULL,NULL,NULL,'','','',NULL,NULL,NULL,NULL),(16,'2013-12-01 23:00:00','0000-00-00 00:00:00',3,'2013-12-11 00:00:00','2013-12-24 00:00:00',1,'Pendiente',NULL,NULL,'','','','',2080,'','','',17,'00:00:00','00:00:00',1,NULL,'',NULL,NULL,NULL,'','','',NULL,NULL,NULL,NULL),(17,'2013-12-01 23:00:00','0000-00-00 00:00:00',3,'2013-12-11 00:00:00','2013-12-24 00:00:00',1,'Pendiente',NULL,NULL,'','','','',2080,'','','',17,'00:00:00','00:00:00',1,NULL,'',NULL,NULL,NULL,'','','',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `reservaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservaciones_articulos`
--

DROP TABLE IF EXISTS `reservaciones_articulos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservaciones_articulos` (
  `id_reservacion` int(11) NOT NULL,
  `id_articulo` int(11) NOT NULL,
  `id_reservacion_articulo` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  PRIMARY KEY (`id_reservacion_articulo`),
  KEY `fk_reservaciones_has_articulos_articulos1_idx` (`id_articulo`),
  KEY `fk_reservaciones_has_articulos_reservaciones1_idx` (`id_reservacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservaciones_articulos`
--

LOCK TABLES `reservaciones_articulos` WRITE;
/*!40000 ALTER TABLE `reservaciones_articulos` DISABLE KEYS */;
/*!40000 ALTER TABLE `reservaciones_articulos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservaciones_pagos`
--

DROP TABLE IF EXISTS `reservaciones_pagos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservaciones_pagos` (
  `id_reservacion_pago` int(11) NOT NULL AUTO_INCREMENT,
  `id_reservacion` int(11) NOT NULL,
  `forma_pago` varchar(45) DEFAULT NULL,
  `autorizacion` text,
  `request` text,
  `importe` double DEFAULT NULL,
  `concepto` text,
  `estado` varchar(45) DEFAULT NULL,
  `tiempo_creacion` timestamp NULL DEFAULT NULL,
  `ultima_modificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `origen` varchar(45) DEFAULT NULL,
  `validada` tinyint(1) DEFAULT NULL,
  `comentario` text,
  `tipo` varchar(45) DEFAULT NULL,
  `id_cuenta` int(11) DEFAULT NULL,
  `validado` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_reservacion_pago`),
  KEY `fk_reservaciones_pagos_reservaciones1_idx` (`id_reservacion`),
  KEY `fk_reservaciones_pagos_cuentas1_idx` (`id_cuenta`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservaciones_pagos`
--

LOCK TABLES `reservaciones_pagos` WRITE;
/*!40000 ALTER TABLE `reservaciones_pagos` DISABLE KEYS */;
INSERT INTO `reservaciones_pagos` VALUES (5,8,'fianza','123123123','',123,'','retenido','2013-09-20 00:00:00','2013-09-20 00:00:00','',NULL,'','tarjeta',7,NULL),(6,8,'pago','123123123','',435,'','confirmada','2013-09-20 00:00:00','0000-00-00 00:00:00','',NULL,'','tarjeta',8,NULL),(7,3,'pago','123123123','',123,'','confirmada','2013-10-01 00:00:00','2013-10-01 00:00:00','',NULL,'','paypal',9,NULL),(8,9,'pago','123123213','',233,'','confirmada','2013-10-01 00:00:00','2013-10-01 00:00:00','',NULL,'','tarjeta',10,NULL),(9,9,'fianza','123123123','',3443,'','retenido','2013-10-01 00:00:00','2013-10-01 00:00:00','',NULL,'','efectivo',11,NULL),(10,3,'pago','123123123','',123,'','confirmada','2013-10-01 00:00:00','0000-00-00 00:00:00','',NULL,'','paypal',12,NULL),(11,3,'fianza','124234234','',343,'','devuelto','2013-10-01 00:00:00','0000-00-00 00:00:00','',NULL,'','efectivo',13,NULL),(12,6,'pago','123123123123','',100,'','confirmada','2013-10-02 00:00:00','2013-10-18 00:00:00','',NULL,'','tarjeta',14,NULL),(13,6,'pago','1123123','',800,'','confirmada','2013-10-02 00:00:00','2013-10-18 00:00:00','',NULL,'','paypal',15,NULL),(15,6,'fianza','123123123','',123,'','retenido','2013-10-02 00:00:00','2013-10-18 00:00:00','',NULL,'','efectivo',17,NULL),(16,13,'pago','','',1485,'','','2013-11-20 00:00:00','0000-00-00 00:00:00','',0,'','tarjeta',18,NULL),(18,15,'pago','','',23720,'','','2013-12-01 23:00:00','0000-00-00 00:00:00','',0,'','tarjeta',20,NULL),(19,16,'pago','','',2080,'','','2013-12-01 23:00:00','0000-00-00 00:00:00','',0,'','tarjeta',21,NULL),(20,17,'pago','','',2080,'','','2013-12-01 23:00:00','0000-00-00 00:00:00','',0,'','tarjeta',22,NULL);
/*!40000 ALTER TABLE `reservaciones_pagos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscripciones`
--

DROP TABLE IF EXISTS `subscripciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscripciones` (
  `id_subscripcion` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) DEFAULT NULL,
  `estatus` varchar(45) DEFAULT NULL,
  `tiempo_creacion` timestamp NULL DEFAULT NULL,
  `ultima_modificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_subscripcion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscripciones`
--

LOCK TABLES `subscripciones` WRITE;
/*!40000 ALTER TABLE `subscripciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `subscripciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `tiempo_creacion` timestamp NULL DEFAULT NULL,
  `ultima_modificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_usuario_grupo` int(11) NOT NULL,
  `estatus` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `apellido_materno` varchar(45) DEFAULT NULL,
  `apellido_paterno` varchar(45) DEFAULT NULL,
  `facebook_id` text,
  `facebook_username` text,
  `telefono_alterno` varchar(45) DEFAULT NULL,
  `id_cuenta` int(11) DEFAULT NULL,
  `documento` text,
  `id_direccion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `fk_usuarios_usuarios_grupos1_idx` (`id_usuario_grupo`),
  KEY `fk_usuarios_cuentas1_idx` (`id_cuenta`),
  KEY `fk_usuarios_direcciones1_idx` (`id_direccion`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Admin','admin@mallorenthaus.com','admin','2013-10-01 16:16:13','2013-10-01 16:16:13',6,'','123123','admin','admin','','','123123',NULL,'',NULL),(5,'Matias','mauro@esintesys.com','123','2013-11-20 03:42:06','2013-11-20 03:42:06',2,'','','iriarte','Barbarroja','','','',NULL,'',NULL),(6,'Prova','psoler@sescasesnoves.com','sescases','2013-10-07 00:00:00','0000-00-00 00:00:00',2,'','8998998324','','Avorp','','','',NULL,'',NULL),(7,'Ruben','ruben.listico.ds@gmail.com','0d79e11d0b11ff5a0036de901a741010','2013-10-16 18:27:05','2013-10-16 18:27:05',2,'activo','','','Velazquez','','','',NULL,'',NULL),(8,'Rubén','ruben.velazquez.calva@gmail.com','','2013-10-30 15:35:30','2013-10-30 15:35:30',2,'activo','','Calva','Velázquez','','','',NULL,'',NULL),(9,'Reservas','reservas@clickandbooking.com','123','2013-10-30 17:40:09','0000-00-00 00:00:00',3,'','123123','X','X','','','123123',NULL,'',NULL),(11,'Socio','socio@clickandbooking.com','123','2013-10-30 17:42:20','0000-00-00 00:00:00',4,'','123','X','X','','','13',NULL,'',NULL),(12,'Comercial','comercial@clickandbooking.com','123','2013-10-30 17:45:10','0000-00-00 00:00:00',5,'','123','X','X','','','123',NULL,'',NULL),(13,'Miriam','miriam_m_miranda@hotmail.com','','2013-10-31 17:33:46','2013-10-31 17:33:46',2,'activo','','Rodriguez','Miranda','','','',NULL,'',NULL),(14,'Ruben','ruben.velazquez.calva@gmail.com','','2013-11-20 00:00:00','0000-00-00 00:00:00',2,'','','','Velazquez','','','',NULL,'',NULL),(15,'Ruben','ruben.velazquez.calva@gmail.com','','2013-11-21 00:00:00','0000-00-00 00:00:00',2,'','123123','','Velázquez','','','',NULL,'',NULL),(16,'Ruben','ruben.velazquez.calva@gmail.com','','2013-12-01 23:00:00','0000-00-00 00:00:00',2,'','123123123','','Velazquez','','','',NULL,'',NULL),(17,'Matias','matias.barbarroja@gmail.com','','2013-12-01 23:00:00','0000-00-00 00:00:00',2,'','434543543534','','Barbarroja','','','',NULL,'',NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios_grupos`
--

DROP TABLE IF EXISTS `usuarios_grupos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios_grupos` (
  `id_usuario_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_usuario_grupo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios_grupos`
--

LOCK TABLES `usuarios_grupos` WRITE;
/*!40000 ALTER TABLE `usuarios_grupos` DISABLE KEYS */;
INSERT INTO `usuarios_grupos` VALUES (1,'Administrador'),(2,'Cliente'),(3,'Reserva'),(4,'Socio'),(5,'Comercial'),(6,'Mallorca');
/*!40000 ALTER TABLE `usuarios_grupos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios_registros`
--

DROP TABLE IF EXISTS `usuarios_registros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios_registros` (
  `id_usuario_registro` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `tiempo_creacion` timestamp NULL DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `movimiento` text,
  PRIMARY KEY (`id_usuario_registro`),
  KEY `fk_usuarios_registros_usuarios1_idx` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=1652 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios_registros`
--

LOCK TABLES `usuarios_registros` WRITE;
/*!40000 ALTER TABLE `usuarios_registros` DISABLE KEYS */;
INSERT INTO `usuarios_registros` VALUES (1,1,'2013-08-22 23:24:27','politicas_cancelacion where id=1','insert'),(2,1,'2013-08-22 23:24:45','politicas_cancelacion where id=2','insert'),(3,1,'2013-08-22 23:26:11','empresas where id=1','insert'),(4,1,'2013-08-22 23:26:11','empresas_cuentas where id=1','insert'),(5,1,'2013-08-22 23:26:11','empresas_contratos where id=1','insert'),(6,1,'2013-08-23 00:36:10','apartamentos where id=1','insert'),(7,1,'2013-08-23 00:36:11','apartamentos_instalaciones where id=1','insert'),(8,1,'2013-08-23 00:36:11','apartamentos_alojamientos where id=1','insert'),(9,1,'2013-08-23 00:37:01','apartamentos where id=1','delete'),(10,1,'2013-08-23 00:37:37','apartamentos where id=2','insert'),(11,1,'2013-08-23 00:37:37','apartamentos_instalaciones where id=2','insert'),(12,1,'2013-08-23 00:37:37','apartamentos_instalaciones where id=3','insert'),(13,1,'2013-08-23 00:37:37','apartamentos_alojamientos where id=2','insert'),(14,1,'2013-08-23 00:37:43','apartamentos where id=2','update'),(15,1,'2013-08-23 00:37:57','apartamentos_adjuntos where id_apartamento=2','update'),(16,1,'2013-08-23 00:38:17','apartamentos_documentos where id=1','delete'),(17,1,'2013-08-23 00:38:34','adjuntos where id=2','insert'),(18,1,'2013-08-23 00:38:34','apartamentos_adjuntos where id=1','insert'),(19,1,'2013-08-23 00:38:34','adjuntos where id=3','insert'),(20,1,'2013-08-23 00:38:34','apartamentos_adjuntos where id=2','insert'),(21,1,'2013-08-23 00:38:35','adjuntos where id=4','insert'),(22,1,'2013-08-23 00:38:35','apartamentos_adjuntos where id=3','insert'),(23,1,'2013-08-23 00:39:02','apartamentos where id=2','update'),(24,1,'2013-08-23 00:40:40','opiniones where id=1','insert'),(25,1,'2013-08-23 00:41:31','usuarios where id=1','update'),(26,1,'2013-08-23 00:41:31','reservaciones where id=1','insert'),(27,1,'2013-08-23 00:43:27','reservaciones where id=2','insert'),(28,1,'2013-08-23 03:58:00','apartamentos where id=3','insert'),(29,1,'2013-08-23 03:58:00','apartamentos_instalaciones where id=4','insert'),(30,1,'2013-08-23 03:58:00','apartamentos_instalaciones where id=5','insert'),(31,1,'2013-08-23 03:58:00','apartamentos_instalaciones where id=6','insert'),(32,1,'2013-08-23 03:58:00','apartamentos_instalaciones where id=7','insert'),(33,1,'2013-08-23 03:58:00','apartamentos_instalaciones where id=8','insert'),(34,1,'2013-08-23 03:58:00','apartamentos_instalaciones where id=9','insert'),(35,1,'2013-08-23 03:58:00','apartamentos_instalaciones where id=10','insert'),(36,1,'2013-08-23 03:58:00','apartamentos_instalaciones where id=11','insert'),(37,1,'2013-08-23 03:58:00','apartamentos_instalaciones where id=12','insert'),(38,1,'2013-08-23 03:58:00','apartamentos_instalaciones where id=13','insert'),(39,1,'2013-08-23 03:58:00','apartamentos_instalaciones where id=14','insert'),(40,1,'2013-08-23 03:58:00','apartamentos_instalaciones where id=15','insert'),(41,1,'2013-08-23 03:58:00','apartamentos_instalaciones where id=16','insert'),(42,1,'2013-08-23 03:58:00','apartamentos_instalaciones where id=17','insert'),(43,1,'2013-08-23 03:58:00','apartamentos_instalaciones where id=18','insert'),(44,1,'2013-08-23 03:58:00','apartamentos_instalaciones where id=19','insert'),(45,1,'2013-08-23 03:58:00','apartamentos_instalaciones where id=20','insert'),(46,1,'2013-08-23 03:58:00','apartamentos_instalaciones where id=21','insert'),(47,1,'2013-08-23 03:58:00','apartamentos_instalaciones where id=22','insert'),(48,1,'2013-08-23 03:58:00','apartamentos_instalaciones where id=23','insert'),(49,1,'2013-08-23 03:58:00','apartamentos_instalaciones where id=24','insert'),(50,1,'2013-08-23 03:58:01','apartamentos_instalaciones where id=25','insert'),(51,1,'2013-08-23 03:58:01','apartamentos_instalaciones where id=26','insert'),(52,1,'2013-08-23 03:58:01','apartamentos_alojamientos where id=3','insert'),(53,1,'2013-08-23 04:05:32','empresas where id=2','insert'),(54,1,'2013-08-23 04:05:32','empresas_cuentas where id=2','insert'),(55,1,'2013-08-23 04:05:32','empresas_contratos where id=2','insert'),(56,1,'2013-08-23 04:46:09','reservaciones where id=3','insert'),(57,1,'2013-08-26 05:36:18','adjuntos where id=5','insert'),(58,1,'2013-08-26 05:36:18','apartamentos_adjuntos where id=4','insert'),(59,1,'2013-08-26 05:36:21','adjuntos where id=6','insert'),(60,1,'2013-08-26 05:36:22','apartamentos_adjuntos where id=5','insert'),(61,1,'2013-08-26 05:36:36','adjuntos where id=7','insert'),(62,1,'2013-08-26 05:36:36','apartamentos_adjuntos where id=6','insert'),(63,1,'2013-08-26 05:45:16','apartamentos where id=3','update'),(64,1,'2013-09-18 02:06:52','reservaciones where id=4','insert'),(65,1,'2013-09-18 02:18:01','reservaciones where id=5','insert'),(66,1,'2013-09-18 03:25:17','reservaciones where id=6','insert'),(67,1,'2013-09-18 03:50:30','reservaciones where id=7','insert'),(68,1,'2013-09-18 08:36:11','usuarios where id=1','update'),(69,1,'2013-09-18 08:36:11','empresas where id=1','update'),(70,1,'2013-09-18 08:36:11','empresas_contratos where id=1','update'),(71,1,'2013-09-18 08:38:11','usuarios where id=1','update'),(72,1,'2013-09-18 08:38:11','empresas where id=1','update'),(73,1,'2013-09-18 08:38:11','empresas_contratos where id=1','update'),(74,1,'2013-09-18 08:55:46','mantenimientos where id=1','insert'),(75,1,'2013-09-18 16:48:21','reservaciones where id=8','insert'),(76,1,'2013-09-18 16:50:39','reservaciones where id=8','update'),(77,1,'2013-09-18 16:51:24','reservaciones where id=8','update'),(78,1,'2013-09-20 08:36:35','reservaciones where id=8','update'),(79,1,'2013-09-20 08:38:45','reservaciones where id=8','update'),(80,1,'2013-09-20 08:43:55','reservaciones where id=8','update'),(81,1,'2013-10-01 10:15:15','reservaciones where id=3','update'),(82,1,'2013-10-01 10:17:35','reservaciones where id=9','insert'),(83,1,'2013-10-01 10:18:13','reservaciones where id=9','update'),(84,1,'2013-10-01 10:18:48','reservaciones where id=9','update'),(85,NULL,'2013-10-01 13:21:15','apartamentos where id=2','update'),(86,NULL,'2013-10-01 13:42:04','reservaciones where id=3','update'),(87,NULL,'2013-10-01 13:43:00','reservaciones where id=3','update'),(88,1,'2013-10-01 16:13:58','mantenimientos where id=2','insert'),(89,1,'2013-10-01 16:16:04','usuarios where id=1','update'),(90,1,'2013-10-01 16:16:04','empresas where id=1','update'),(91,1,'2013-10-01 16:16:13','usuarios where id=1','update'),(92,1,'2013-10-01 16:16:13','empresas where id=1','update'),(93,1,'2013-10-01 16:24:04','reservaciones where id=9','update'),(94,NULL,'2013-10-02 00:06:23','mantenimientos where id=1','update'),(95,NULL,'2013-10-02 00:06:31','mantenimientos where id=2','update'),(96,NULL,'2013-10-02 00:07:08','reservaciones where id=6','update'),(97,NULL,'2013-10-02 00:07:12','reservaciones where id=4','update'),(98,NULL,'2013-10-02 00:08:02','reservaciones where id=6','update'),(99,NULL,'2013-10-02 09:23:37','reservaciones where id=6','update'),(100,NULL,'2013-10-02 09:23:54','reservaciones where id=6','update'),(101,NULL,'2013-10-02 16:44:03','apartamentos where id=3','update'),(102,NULL,'2013-10-02 16:44:03','apartamentos_instalaciones where id=27','insert'),(103,NULL,'2013-10-02 16:44:03','apartamentos_instalaciones where id=28','insert'),(104,NULL,'2013-10-02 16:44:03','apartamentos_instalaciones where id=29','insert'),(105,NULL,'2013-10-02 16:44:03','apartamentos_instalaciones where id=30','insert'),(106,NULL,'2013-10-02 16:44:03','apartamentos_instalaciones where id=31','insert'),(107,NULL,'2013-10-02 16:44:03','apartamentos_instalaciones where id=32','insert'),(108,NULL,'2013-10-02 16:44:03','apartamentos_instalaciones where id=33','insert'),(109,NULL,'2013-10-02 16:44:03','apartamentos_instalaciones where id=34','insert'),(110,NULL,'2013-10-02 16:44:03','apartamentos_instalaciones where id=35','insert'),(111,NULL,'2013-10-02 16:44:03','apartamentos_instalaciones where id=36','insert'),(112,NULL,'2013-10-02 16:44:03','apartamentos_instalaciones where id=37','insert'),(113,NULL,'2013-10-02 16:44:03','apartamentos_instalaciones where id=38','insert'),(114,NULL,'2013-10-02 16:44:03','apartamentos_instalaciones where id=39','insert'),(115,NULL,'2013-10-02 16:44:03','apartamentos_instalaciones where id=40','insert'),(116,NULL,'2013-10-02 16:44:03','apartamentos_instalaciones where id=41','insert'),(117,NULL,'2013-10-02 16:44:03','apartamentos_instalaciones where id=42','insert'),(118,NULL,'2013-10-02 16:44:03','apartamentos_instalaciones where id=43','insert'),(119,NULL,'2013-10-02 16:44:03','apartamentos_instalaciones where id=44','insert'),(120,NULL,'2013-10-02 16:44:03','apartamentos_instalaciones where id=45','insert'),(121,NULL,'2013-10-02 16:44:03','apartamentos_instalaciones where id=46','insert'),(122,NULL,'2013-10-02 16:44:03','apartamentos_instalaciones where id=47','insert'),(123,NULL,'2013-10-02 16:44:03','apartamentos_alojamientos where id_apartament','delete'),(124,NULL,'2013-10-02 16:44:03','apartamentos_alojamientos where id=4','insert'),(125,NULL,'2013-10-02 16:44:57','apartamentos where id=3','update'),(126,NULL,'2013-10-02 16:44:57','apartamentos_instalaciones where id=48','insert'),(127,NULL,'2013-10-02 16:44:57','apartamentos_instalaciones where id=49','insert'),(128,NULL,'2013-10-02 16:44:57','apartamentos_instalaciones where id=50','insert'),(129,NULL,'2013-10-02 16:44:57','apartamentos_instalaciones where id=51','insert'),(130,NULL,'2013-10-02 16:44:57','apartamentos_instalaciones where id=52','insert'),(131,NULL,'2013-10-02 16:44:57','apartamentos_instalaciones where id=53','insert'),(132,NULL,'2013-10-02 16:44:57','apartamentos_instalaciones where id=54','insert'),(133,NULL,'2013-10-02 16:44:57','apartamentos_instalaciones where id=55','insert'),(134,NULL,'2013-10-02 16:44:57','apartamentos_instalaciones where id=56','insert'),(135,NULL,'2013-10-02 16:44:57','apartamentos_instalaciones where id=57','insert'),(136,NULL,'2013-10-02 16:44:57','apartamentos_instalaciones where id=58','insert'),(137,NULL,'2013-10-02 16:44:57','apartamentos_instalaciones where id=59','insert'),(138,NULL,'2013-10-02 16:44:57','apartamentos_instalaciones where id=60','insert'),(139,NULL,'2013-10-02 16:44:57','apartamentos_instalaciones where id=61','insert'),(140,NULL,'2013-10-02 16:44:57','apartamentos_instalaciones where id=62','insert'),(141,NULL,'2013-10-02 16:44:57','apartamentos_instalaciones where id=63','insert'),(142,NULL,'2013-10-02 16:44:57','apartamentos_instalaciones where id=64','insert'),(143,NULL,'2013-10-02 16:44:57','apartamentos_instalaciones where id=65','insert'),(144,NULL,'2013-10-02 16:44:57','apartamentos_instalaciones where id=66','insert'),(145,NULL,'2013-10-02 16:44:57','apartamentos_instalaciones where id=67','insert'),(146,NULL,'2013-10-02 16:44:57','apartamentos_instalaciones where id=68','insert'),(147,NULL,'2013-10-02 16:44:57','apartamentos_alojamientos where id_apartament','delete'),(148,NULL,'2013-10-02 16:44:57','apartamentos_alojamientos where id=5','insert'),(149,NULL,'2013-10-02 16:45:56','apartamentos where id=3','update'),(150,1,'2013-10-02 21:54:44','reservaciones where id=5','update'),(151,1,'2013-10-02 21:58:53','apartamentos where id=4','insert'),(152,1,'2013-10-02 21:58:53','apartamentos_alojamientos where id=6','insert'),(153,1,'2013-10-02 21:59:48','apartamentos where id=4','update'),(154,1,'2013-10-02 22:04:29','apartamentos where id=4','delete'),(155,1,'2013-10-04 06:58:33','apartamentos where id=5','insert'),(156,1,'2013-10-04 06:58:33','apartamentos_instalaciones where id=69','insert'),(157,1,'2013-10-04 06:58:33','apartamentos_instalaciones where id=70','insert'),(158,1,'2013-10-04 06:58:33','apartamentos_instalaciones where id=71','insert'),(159,1,'2013-10-04 06:58:33','apartamentos_instalaciones where id=72','insert'),(160,1,'2013-10-04 06:58:33','apartamentos_instalaciones where id=73','insert'),(161,1,'2013-10-04 06:58:33','apartamentos_instalaciones where id=74','insert'),(162,1,'2013-10-04 06:58:33','apartamentos_instalaciones where id=75','insert'),(163,1,'2013-10-04 06:58:33','apartamentos_instalaciones where id=76','insert'),(164,1,'2013-10-04 06:58:34','apartamentos_instalaciones where id=77','insert'),(165,1,'2013-10-04 06:58:34','apartamentos_instalaciones where id=78','insert'),(166,1,'2013-10-04 06:58:34','apartamentos_instalaciones where id=79','insert'),(167,1,'2013-10-04 06:58:34','apartamentos_instalaciones where id=80','insert'),(168,1,'2013-10-04 06:58:34','apartamentos_instalaciones where id=81','insert'),(169,1,'2013-10-04 06:58:34','apartamentos_instalaciones where id=82','insert'),(170,1,'2013-10-04 06:58:34','apartamentos_instalaciones where id=83','insert'),(171,1,'2013-10-04 06:58:34','apartamentos_instalaciones where id=84','insert'),(172,1,'2013-10-04 06:58:34','apartamentos_instalaciones where id=85','insert'),(173,1,'2013-10-04 06:58:34','apartamentos_instalaciones where id=86','insert'),(174,1,'2013-10-04 06:58:34','apartamentos_instalaciones where id=87','insert'),(175,1,'2013-10-04 06:58:34','apartamentos_instalaciones where id=88','insert'),(176,1,'2013-10-04 06:58:34','apartamentos_alojamientos where id=7','insert'),(177,1,'2013-10-04 07:01:10','apartamentos where id=5','update'),(178,1,'2013-10-04 07:01:10','apartamentos_instalaciones where id=89','insert'),(179,1,'2013-10-04 07:01:10','apartamentos_instalaciones where id=90','insert'),(180,1,'2013-10-04 07:01:10','apartamentos_instalaciones where id=91','insert'),(181,1,'2013-10-04 07:01:10','apartamentos_instalaciones where id=92','insert'),(182,1,'2013-10-04 07:01:10','apartamentos_instalaciones where id=93','insert'),(183,1,'2013-10-04 07:01:10','apartamentos_instalaciones where id=94','insert'),(184,1,'2013-10-04 07:01:10','apartamentos_instalaciones where id=95','insert'),(185,1,'2013-10-04 07:01:10','apartamentos_instalaciones where id=96','insert'),(186,1,'2013-10-04 07:01:10','apartamentos_instalaciones where id=97','insert'),(187,1,'2013-10-04 07:01:10','apartamentos_instalaciones where id=98','insert'),(188,1,'2013-10-04 07:01:10','apartamentos_instalaciones where id=99','insert'),(189,1,'2013-10-04 07:01:10','apartamentos_instalaciones where id=100','insert'),(190,1,'2013-10-04 07:01:10','apartamentos_instalaciones where id=101','insert'),(191,1,'2013-10-04 07:01:10','apartamentos_instalaciones where id=102','insert'),(192,1,'2013-10-04 07:01:10','apartamentos_instalaciones where id=103','insert'),(193,1,'2013-10-04 07:01:10','apartamentos_instalaciones where id=104','insert'),(194,1,'2013-10-04 07:01:10','apartamentos_instalaciones where id=105','insert'),(195,1,'2013-10-04 07:01:10','apartamentos_instalaciones where id=106','insert'),(196,1,'2013-10-04 07:01:10','apartamentos_instalaciones where id=107','insert'),(197,1,'2013-10-04 07:01:10','apartamentos_instalaciones where id=108','insert'),(198,1,'2013-10-04 07:01:10','apartamentos_alojamientos where id_apartament','delete'),(199,1,'2013-10-04 07:01:10','apartamentos_alojamientos where id=8','insert'),(200,1,'2013-10-04 07:02:22','adjuntos where id=8','insert'),(201,1,'2013-10-04 07:02:22','apartamentos_adjuntos where id=7','insert'),(202,1,'2013-10-04 07:02:52','adjuntos where id=9','insert'),(203,1,'2013-10-04 07:02:52','apartamentos_adjuntos where id=8','insert'),(204,1,'2013-10-04 07:02:55','adjuntos where id=10','insert'),(205,1,'2013-10-04 07:02:55','apartamentos_adjuntos where id=9','insert'),(206,1,'2013-10-04 07:02:59','adjuntos where id=11','insert'),(207,1,'2013-10-04 07:02:59','apartamentos_adjuntos where id=10','insert'),(208,1,'2013-10-04 07:03:04','adjuntos where id=12','insert'),(209,1,'2013-10-04 07:03:04','apartamentos_adjuntos where id=11','insert'),(210,1,'2013-10-04 07:03:08','apartamentos_adjuntos where id=11','delete'),(211,1,'2013-10-04 07:03:08','adjuntos where id=12','delete'),(212,1,'2013-10-04 07:03:15','adjuntos where id=13','insert'),(213,1,'2013-10-04 07:03:15','apartamentos_adjuntos where id=12','insert'),(214,1,'2013-10-04 07:03:21','adjuntos where id=14','insert'),(215,1,'2013-10-04 07:03:21','apartamentos_adjuntos where id=13','insert'),(216,1,'2013-10-04 07:03:26','adjuntos where id=15','insert'),(217,1,'2013-10-04 07:03:26','apartamentos_adjuntos where id=14','insert'),(218,1,'2013-10-07 10:52:03','apartamentos_adjuntos where id_apartamento=3','update'),(219,1,'2013-10-07 11:11:40','reservaciones where id=10','insert'),(220,1,'2013-10-07 11:13:30','reservaciones where id=10','update'),(221,1,'2013-10-07 11:14:21','reservaciones where id=10','update'),(222,1,'2013-10-07 16:14:00','apartamentos where id=6','insert'),(223,1,'2013-10-07 16:14:00','apartamentos_instalaciones where id=109','insert'),(224,1,'2013-10-07 16:14:00','apartamentos_instalaciones where id=110','insert'),(225,1,'2013-10-07 16:14:00','apartamentos_instalaciones where id=111','insert'),(226,1,'2013-10-07 16:14:00','apartamentos_instalaciones where id=112','insert'),(227,1,'2013-10-07 16:14:00','apartamentos_instalaciones where id=113','insert'),(228,1,'2013-10-07 16:14:00','apartamentos_instalaciones where id=114','insert'),(229,1,'2013-10-07 16:14:00','apartamentos_instalaciones where id=115','insert'),(230,1,'2013-10-07 16:14:00','apartamentos_instalaciones where id=116','insert'),(231,1,'2013-10-07 16:14:00','apartamentos_instalaciones where id=117','insert'),(232,1,'2013-10-07 16:14:00','apartamentos_instalaciones where id=118','insert'),(233,1,'2013-10-07 16:14:00','apartamentos_instalaciones where id=119','insert'),(234,1,'2013-10-07 16:14:00','apartamentos_instalaciones where id=120','insert'),(235,1,'2013-10-07 16:14:00','apartamentos_alojamientos where id=9','insert'),(236,1,'2013-10-07 16:14:33','adjuntos where id=16','insert'),(237,1,'2013-10-07 16:14:33','apartamentos_adjuntos where id=15','insert'),(238,1,'2013-10-07 16:14:37','adjuntos where id=17','insert'),(239,1,'2013-10-07 16:14:37','apartamentos_adjuntos where id=16','insert'),(240,1,'2013-10-07 16:20:41','reservaciones where id=8','update'),(241,1,'2013-10-16 00:45:52','apartamentos where id=2','update'),(242,NULL,'2013-10-16 18:27:05','usuarios where id=7','insert'),(243,1,'2013-10-18 14:24:28','apartamentos where id=2','update'),(244,1,'2013-10-18 14:25:24','apartamentos where id=3','update'),(245,1,'2013-10-18 14:25:24','apartamentos_instalaciones where id=121','insert'),(246,1,'2013-10-18 14:25:24','apartamentos_instalaciones where id=122','insert'),(247,1,'2013-10-18 14:25:24','apartamentos_instalaciones where id=123','insert'),(248,1,'2013-10-18 14:25:24','apartamentos_instalaciones where id=124','insert'),(249,1,'2013-10-18 14:25:24','apartamentos_instalaciones where id=125','insert'),(250,1,'2013-10-18 14:25:24','apartamentos_instalaciones where id=126','insert'),(251,1,'2013-10-18 14:25:24','apartamentos_instalaciones where id=127','insert'),(252,1,'2013-10-18 14:25:25','apartamentos_instalaciones where id=128','insert'),(253,1,'2013-10-18 14:25:25','apartamentos_instalaciones where id=129','insert'),(254,1,'2013-10-18 14:25:25','apartamentos_instalaciones where id=130','insert'),(255,1,'2013-10-18 14:25:25','apartamentos_instalaciones where id=131','insert'),(256,1,'2013-10-18 14:25:25','apartamentos_instalaciones where id=132','insert'),(257,1,'2013-10-18 14:25:25','apartamentos_instalaciones where id=133','insert'),(258,1,'2013-10-18 14:25:25','apartamentos_instalaciones where id=134','insert'),(259,1,'2013-10-18 14:25:25','apartamentos_instalaciones where id=135','insert'),(260,1,'2013-10-18 14:25:25','apartamentos_instalaciones where id=136','insert'),(261,1,'2013-10-18 14:25:25','apartamentos_instalaciones where id=137','insert'),(262,1,'2013-10-18 14:25:25','apartamentos_instalaciones where id=138','insert'),(263,1,'2013-10-18 14:25:25','apartamentos_instalaciones where id=139','insert'),(264,1,'2013-10-18 14:25:25','apartamentos_instalaciones where id=140','insert'),(265,1,'2013-10-18 14:25:25','apartamentos_instalaciones where id=141','insert'),(266,1,'2013-10-18 14:25:25','apartamentos_alojamientos where id_apartament','delete'),(267,1,'2013-10-18 14:25:25','apartamentos_alojamientos where id=10','insert'),(268,1,'2013-10-18 14:26:37','apartamentos where id=3','update'),(269,1,'2013-10-18 14:26:37','apartamentos_instalaciones where id=142','insert'),(270,1,'2013-10-18 14:26:37','apartamentos_instalaciones where id=143','insert'),(271,1,'2013-10-18 14:26:37','apartamentos_instalaciones where id=144','insert'),(272,1,'2013-10-18 14:26:37','apartamentos_instalaciones where id=145','insert'),(273,1,'2013-10-18 14:26:37','apartamentos_instalaciones where id=146','insert'),(274,1,'2013-10-18 14:26:37','apartamentos_instalaciones where id=147','insert'),(275,1,'2013-10-18 14:26:37','apartamentos_instalaciones where id=148','insert'),(276,1,'2013-10-18 14:26:37','apartamentos_instalaciones where id=149','insert'),(277,1,'2013-10-18 14:26:37','apartamentos_instalaciones where id=150','insert'),(278,1,'2013-10-18 14:26:37','apartamentos_instalaciones where id=151','insert'),(279,1,'2013-10-18 14:26:37','apartamentos_instalaciones where id=152','insert'),(280,1,'2013-10-18 14:26:37','apartamentos_instalaciones where id=153','insert'),(281,1,'2013-10-18 14:26:37','apartamentos_instalaciones where id=154','insert'),(282,1,'2013-10-18 14:26:37','apartamentos_instalaciones where id=155','insert'),(283,1,'2013-10-18 14:26:37','apartamentos_instalaciones where id=156','insert'),(284,1,'2013-10-18 14:26:37','apartamentos_instalaciones where id=157','insert'),(285,1,'2013-10-18 14:26:37','apartamentos_instalaciones where id=158','insert'),(286,1,'2013-10-18 14:26:37','apartamentos_instalaciones where id=159','insert'),(287,1,'2013-10-18 14:26:37','apartamentos_instalaciones where id=160','insert'),(288,1,'2013-10-18 14:26:37','apartamentos_instalaciones where id=161','insert'),(289,1,'2013-10-18 14:26:37','apartamentos_instalaciones where id=162','insert'),(290,1,'2013-10-18 14:26:37','apartamentos_alojamientos where id_apartament','delete'),(291,1,'2013-10-18 14:26:37','apartamentos_alojamientos where id=11','insert'),(292,5,'2013-10-18 15:53:39','apartamentos where id=2','update'),(293,5,'2013-10-18 15:53:40','apartamentos_instalaciones where id=163','insert'),(294,5,'2013-10-18 15:53:40','apartamentos_instalaciones where id=164','insert'),(295,5,'2013-10-18 15:53:40','apartamentos_alojamientos where id_apartament','delete'),(296,5,'2013-10-18 15:53:40','apartamentos_alojamientos where id=12','insert'),(297,5,'2013-10-18 15:55:04','apartamentos where id=2','update'),(298,5,'2013-10-18 15:56:24','apartamentos where id=2','update'),(299,1,'2013-10-18 22:24:24','articulos where id=1','insert'),(300,1,'2013-10-18 22:24:44','apartamentos where id=2','update'),(301,1,'2013-10-18 22:24:44','apartamentos_instalaciones where id=165','insert'),(302,1,'2013-10-18 22:24:44','apartamentos_instalaciones where id=166','insert'),(303,1,'2013-10-18 22:24:45','apartamentos_articulos where idApartamento=2','delete'),(304,1,'2013-10-18 22:24:45','apartamentos_articulos where id=1','insert'),(305,1,'2013-10-18 22:24:45','apartamentos_alojamientos where id_apartament','delete'),(306,1,'2013-10-18 22:24:45','apartamentos_alojamientos where id=13','insert'),(307,1,'2013-10-18 22:25:15','apartamentos where id=3','update'),(308,1,'2013-10-18 22:25:15','apartamentos_instalaciones where id=167','insert'),(309,1,'2013-10-18 22:25:15','apartamentos_instalaciones where id=168','insert'),(310,1,'2013-10-18 22:25:15','apartamentos_instalaciones where id=169','insert'),(311,1,'2013-10-18 22:25:15','apartamentos_instalaciones where id=170','insert'),(312,1,'2013-10-18 22:25:15','apartamentos_instalaciones where id=171','insert'),(313,1,'2013-10-18 22:25:15','apartamentos_instalaciones where id=172','insert'),(314,1,'2013-10-18 22:25:15','apartamentos_instalaciones where id=173','insert'),(315,1,'2013-10-18 22:25:15','apartamentos_instalaciones where id=174','insert'),(316,1,'2013-10-18 22:25:15','apartamentos_instalaciones where id=175','insert'),(317,1,'2013-10-18 22:25:15','apartamentos_instalaciones where id=176','insert'),(318,1,'2013-10-18 22:25:15','apartamentos_instalaciones where id=177','insert'),(319,1,'2013-10-18 22:25:15','apartamentos_instalaciones where id=178','insert'),(320,1,'2013-10-18 22:25:15','apartamentos_instalaciones where id=179','insert'),(321,1,'2013-10-18 22:25:15','apartamentos_instalaciones where id=180','insert'),(322,1,'2013-10-18 22:25:15','apartamentos_instalaciones where id=181','insert'),(323,1,'2013-10-18 22:25:15','apartamentos_instalaciones where id=182','insert'),(324,1,'2013-10-18 22:25:15','apartamentos_instalaciones where id=183','insert'),(325,1,'2013-10-18 22:25:15','apartamentos_instalaciones where id=184','insert'),(326,1,'2013-10-18 22:25:15','apartamentos_instalaciones where id=185','insert'),(327,1,'2013-10-18 22:25:15','apartamentos_instalaciones where id=186','insert'),(328,1,'2013-10-18 22:25:15','apartamentos_instalaciones where id=187','insert'),(329,1,'2013-10-18 22:25:15','apartamentos_articulos where idApartamento=3','delete'),(330,1,'2013-10-18 22:25:15','apartamentos_articulos where id=2','insert'),(331,1,'2013-10-18 22:25:15','apartamentos_alojamientos where id_apartament','delete'),(332,1,'2013-10-18 22:25:15','apartamentos_alojamientos where id=14','insert'),(333,1,'2013-10-18 22:32:32','reservaciones where id=6','update'),(334,NULL,'2013-10-30 15:34:40','apartamentos where id=6','update'),(335,NULL,'2013-10-30 15:35:30','usuarios where id=8','insert'),(336,NULL,'2013-10-30 15:35:30','huespedes where id=1','insert'),(337,NULL,'2013-10-30 15:35:30','reservaciones where id=11','insert'),(338,NULL,'2013-10-30 15:39:26','apartamentos where id=2','update'),(339,NULL,'2013-10-30 15:40:07','apartamentos where id=2','update'),(340,1,'2013-10-30 17:25:17','apartamentos where id=5','update'),(341,1,'2013-10-30 17:25:58','apartamentos where id=5','update'),(342,1,'2013-10-30 17:40:09','usuarios where id=9','insert'),(343,1,'2013-10-30 17:40:42','usuarios where id=9','update'),(344,1,'2013-10-30 17:42:11','usuarios where id=10','insert'),(345,1,'2013-10-30 17:42:20','usuarios where id=11','insert'),(346,1,'2013-10-30 17:43:29','usuarios where id=10','delete'),(347,1,'2013-10-30 17:45:10','usuarios where id=12','insert'),(348,1,'2013-10-31 14:45:20','apartamentos where id=2','update'),(349,1,'2013-10-31 14:45:33','apartamentos where id=3','update'),(350,1,'2013-10-31 14:49:53','apartamentos where id=3','update'),(351,1,'2013-10-31 16:04:54','apartamentos where id=3','update'),(352,1,'2013-10-31 16:05:07','apartamentos where id=2','update'),(353,1,'2013-10-31 16:05:39','apartamentos where id=2','update'),(354,1,'2013-10-31 16:08:19','apartamentos where id=2','update'),(355,1,'2013-10-31 16:09:09','reservaciones where id=12','insert'),(356,1,'2013-10-31 16:45:18','apartamentos where id=5','update'),(357,1,'2013-10-31 17:31:43','apartamentos where id=2','update'),(358,1,'2013-10-31 17:32:22','apartamentos where id=5','update'),(359,NULL,'2013-10-31 17:33:46','usuarios where id=13','insert'),(360,NULL,'2013-10-31 17:33:46','huespedes where id=2','insert'),(361,NULL,'2013-10-31 17:33:47','reservaciones where id=13','insert'),(362,NULL,'2013-11-01 01:22:01','apartamentos where id=5','update'),(363,NULL,'2013-11-01 01:22:14','apartamentos where id=5','update'),(364,7,'2013-11-01 01:22:45','apartamentos where id=5','update'),(365,7,'2013-11-01 01:23:15','apartamentos where id=6','update'),(366,NULL,'2013-11-04 14:08:29','apartamentos where id=6','update'),(367,1,'2013-11-04 18:07:19','reservaciones where id=4','update'),(368,1,'2013-11-05 05:48:43','reservaciones where id=4','update'),(369,1,'2013-11-05 16:04:10','apartamentos where id=5','update'),(370,NULL,'2013-11-05 21:36:19','apartamentos where id=2','update'),(371,NULL,'2013-11-06 17:48:51','apartamentos where id=3','update'),(372,1,'2013-11-08 20:03:52','apartamentos_adjuntos where id=1','delete'),(373,1,'2013-11-08 20:03:52','adjuntos where id=2','delete'),(374,1,'2013-11-08 20:03:52','apartamentos_adjuntos where id=1','delete'),(375,1,'2013-11-08 20:03:52','apartamentos_adjuntos where id=2','delete'),(376,1,'2013-11-08 20:03:52','adjuntos where id=3','delete'),(377,1,'2013-11-08 20:03:52','apartamentos_adjuntos where id=3','delete'),(378,1,'2013-11-08 20:03:52','adjuntos where id=4','delete'),(379,1,'2013-11-08 21:30:34','adjuntos where id=18','insert'),(380,1,'2013-11-08 21:30:34','apartamentos_adjuntos where id=17','insert'),(381,1,'2013-11-08 21:30:40','adjuntos where id=19','insert'),(382,1,'2013-11-08 21:30:41','apartamentos_adjuntos where id=18','insert'),(383,1,'2013-11-08 21:31:07','adjuntos where id=20','insert'),(384,1,'2013-11-08 21:31:07','apartamentos_adjuntos where id=19','insert'),(385,1,'2013-11-08 21:31:12','adjuntos where id=21','insert'),(386,1,'2013-11-08 21:31:12','apartamentos_adjuntos where id=20','insert'),(387,1,'2013-11-08 21:32:31','apartamentos_adjuntos where id=17','delete'),(388,1,'2013-11-08 21:32:31','adjuntos where id=18','delete'),(389,1,'2013-11-08 21:32:34','apartamentos_adjuntos where id=18','delete'),(390,1,'2013-11-08 21:32:34','adjuntos where id=19','delete'),(391,1,'2013-11-08 21:32:46','apartamentos_adjuntos where id=19','delete'),(392,1,'2013-11-08 21:32:46','adjuntos where id=20','delete'),(393,1,'2013-11-08 21:32:50','apartamentos_adjuntos where id=20','delete'),(394,1,'2013-11-08 21:32:50','adjuntos where id=21','delete'),(395,1,'2013-11-08 21:33:29','adjuntos where id=22','insert'),(396,1,'2013-11-08 21:33:29','apartamentos_adjuntos where id=21','insert'),(397,1,'2013-11-08 21:33:34','adjuntos where id=23','insert'),(398,1,'2013-11-08 21:33:34','apartamentos_adjuntos where id=22','insert'),(399,1,'2013-11-08 21:34:05','adjuntos where id=24','insert'),(400,1,'2013-11-08 21:34:05','apartamentos_adjuntos where id=23','insert'),(401,1,'2013-11-08 21:34:06','adjuntos where id=25','insert'),(402,1,'2013-11-08 21:34:06','apartamentos_adjuntos where id=24','insert'),(403,1,'2013-11-08 21:36:20','apartamentos where id=2','update'),(404,1,'2013-11-08 21:36:20','apartamentos_instalaciones where id=188','insert'),(405,1,'2013-11-08 21:36:20','apartamentos_instalaciones where id=189','insert'),(406,1,'2013-11-08 21:36:20','apartamentos_articulos where idApartamento=2','delete'),(407,1,'2013-11-08 21:36:20','apartamentos_articulos where id=3','insert'),(408,1,'2013-11-08 21:36:20','apartamentos_alojamientos where id_apartament','delete'),(409,1,'2013-11-08 21:36:20','apartamentos_alojamientos where id=15','insert'),(410,1,'2013-11-08 21:39:01','apartamentos_adjuntos where id=4','delete'),(411,1,'2013-11-08 21:39:01','adjuntos where id=5','delete'),(412,1,'2013-11-08 21:39:03','apartamentos_adjuntos where id=5','delete'),(413,1,'2013-11-08 21:39:03','adjuntos where id=6','delete'),(414,1,'2013-11-08 21:39:05','apartamentos_adjuntos where id=6','delete'),(415,1,'2013-11-08 21:39:05','adjuntos where id=7','delete'),(416,1,'2013-11-08 21:42:07','adjuntos where id=26','insert'),(417,1,'2013-11-08 21:42:07','apartamentos_adjuntos where id=25','insert'),(418,1,'2013-11-08 21:47:13','apartamentos where id=3','update'),(419,1,'2013-11-08 21:47:14','apartamentos_instalaciones where id=190','insert'),(420,1,'2013-11-08 21:47:14','apartamentos_instalaciones where id=191','insert'),(421,1,'2013-11-08 21:47:14','apartamentos_instalaciones where id=192','insert'),(422,1,'2013-11-08 21:47:14','apartamentos_instalaciones where id=193','insert'),(423,1,'2013-11-08 21:47:14','apartamentos_instalaciones where id=194','insert'),(424,1,'2013-11-08 21:47:14','apartamentos_instalaciones where id=195','insert'),(425,1,'2013-11-08 21:47:14','apartamentos_instalaciones where id=196','insert'),(426,1,'2013-11-08 21:47:14','apartamentos_instalaciones where id=197','insert'),(427,1,'2013-11-08 21:47:14','apartamentos_instalaciones where id=198','insert'),(428,1,'2013-11-08 21:47:14','apartamentos_instalaciones where id=199','insert'),(429,1,'2013-11-08 21:47:14','apartamentos_instalaciones where id=200','insert'),(430,1,'2013-11-08 21:47:14','apartamentos_instalaciones where id=201','insert'),(431,1,'2013-11-08 21:47:14','apartamentos_instalaciones where id=202','insert'),(432,1,'2013-11-08 21:47:14','apartamentos_instalaciones where id=203','insert'),(433,1,'2013-11-08 21:47:14','apartamentos_instalaciones where id=204','insert'),(434,1,'2013-11-08 21:47:14','apartamentos_instalaciones where id=205','insert'),(435,1,'2013-11-08 21:47:14','apartamentos_instalaciones where id=206','insert'),(436,1,'2013-11-08 21:47:14','apartamentos_instalaciones where id=207','insert'),(437,1,'2013-11-08 21:47:14','apartamentos_instalaciones where id=208','insert'),(438,1,'2013-11-08 21:47:14','apartamentos_instalaciones where id=209','insert'),(439,1,'2013-11-08 21:47:14','apartamentos_instalaciones where id=210','insert'),(440,1,'2013-11-08 21:47:14','apartamentos_articulos where idApartamento=3','delete'),(441,1,'2013-11-08 21:47:14','apartamentos_articulos where id=4','insert'),(442,1,'2013-11-08 21:47:14','apartamentos_alojamientos where id_apartament','delete'),(443,1,'2013-11-08 21:47:14','apartamentos_alojamientos where id=16','insert'),(444,1,'2013-11-08 21:47:23','apartamentos_adjuntos where id=25','delete'),(445,1,'2013-11-08 21:47:23','adjuntos where id=26','delete'),(446,1,'2013-11-08 21:48:29','adjuntos where id=27','insert'),(447,1,'2013-11-08 21:48:29','apartamentos_adjuntos where id=26','insert'),(448,1,'2013-11-08 21:48:33','adjuntos where id=28','insert'),(449,1,'2013-11-08 21:48:33','apartamentos_adjuntos where id=27','insert'),(450,1,'2013-11-08 21:49:00','adjuntos where id=29','insert'),(451,1,'2013-11-08 21:49:00','apartamentos_adjuntos where id=28','insert'),(452,1,'2013-11-08 21:51:22','adjuntos where id=30','insert'),(453,1,'2013-11-08 21:51:22','apartamentos_adjuntos where id=29','insert'),(454,1,'2013-11-08 21:51:23','adjuntos where id=31','insert'),(455,1,'2013-11-08 21:51:23','apartamentos_adjuntos where id=30','insert'),(456,1,'2013-11-08 21:51:51','adjuntos where id=32','insert'),(457,1,'2013-11-08 21:51:52','apartamentos_adjuntos where id=31','insert'),(458,1,'2013-11-08 21:52:12','apartamentos where id=2','update'),(459,1,'2013-11-08 21:52:12','apartamentos_instalaciones where id=211','insert'),(460,1,'2013-11-08 21:52:12','apartamentos_instalaciones where id=212','insert'),(461,1,'2013-11-08 21:52:12','apartamentos_articulos where idApartamento=2','delete'),(462,1,'2013-11-08 21:52:12','apartamentos_articulos where id=5','insert'),(463,1,'2013-11-08 21:52:12','apartamentos_alojamientos where id_apartament','delete'),(464,1,'2013-11-08 21:52:12','apartamentos_alojamientos where id=17','insert'),(465,1,'2013-11-08 21:52:33','adjuntos where id=33','insert'),(466,1,'2013-11-08 21:52:33','apartamentos_adjuntos where id=32','insert'),(467,NULL,'2013-11-14 22:44:32','apartamentos where id=2','update'),(468,NULL,'2013-11-14 22:58:43','apartamentos where id=6','update'),(469,NULL,'2013-11-15 06:09:40','apartamentos where id=2','update'),(470,1,'2013-11-15 06:32:56','apartamentos where id=2','update'),(471,1,'2013-11-15 07:00:44','apartamentos where id=5','delete'),(472,1,'2013-11-15 08:07:21','apartamentos where id=6','update'),(473,1,'2013-11-15 08:07:21','apartamentos_instalaciones where id=213','insert'),(474,1,'2013-11-15 08:07:21','apartamentos_instalaciones where id=214','insert'),(475,1,'2013-11-15 08:07:21','apartamentos_instalaciones where id=215','insert'),(476,1,'2013-11-15 08:07:21','apartamentos_instalaciones where id=216','insert'),(477,1,'2013-11-15 08:07:21','apartamentos_instalaciones where id=217','insert'),(478,1,'2013-11-15 08:07:21','apartamentos_instalaciones where id=218','insert'),(479,1,'2013-11-15 08:07:21','apartamentos_instalaciones where id=219','insert'),(480,1,'2013-11-15 08:07:21','apartamentos_instalaciones where id=220','insert'),(481,1,'2013-11-15 08:07:21','apartamentos_instalaciones where id=221','insert'),(482,1,'2013-11-15 08:07:21','apartamentos_instalaciones where id=222','insert'),(483,1,'2013-11-15 08:07:21','apartamentos_instalaciones where id=223','insert'),(484,1,'2013-11-15 08:07:21','apartamentos_instalaciones where id=224','insert'),(485,1,'2013-11-15 08:07:21','apartamentos_alojamientos where id_apartament','delete'),(486,1,'2013-11-15 08:07:21','apartamentos_alojamientos where id=18','insert'),(487,1,'2013-11-15 08:18:52','apartamentos where id=3','update'),(488,1,'2013-11-15 08:18:52','apartamentos_instalaciones where id=225','insert'),(489,1,'2013-11-15 08:18:53','apartamentos_instalaciones where id=226','insert'),(490,1,'2013-11-15 08:18:53','apartamentos_instalaciones where id=227','insert'),(491,1,'2013-11-15 08:18:53','apartamentos_instalaciones where id=228','insert'),(492,1,'2013-11-15 08:18:53','apartamentos_instalaciones where id=229','insert'),(493,1,'2013-11-15 08:18:53','apartamentos_instalaciones where id=230','insert'),(494,1,'2013-11-15 08:18:53','apartamentos_instalaciones where id=231','insert'),(495,1,'2013-11-15 08:18:53','apartamentos_instalaciones where id=232','insert'),(496,1,'2013-11-15 08:18:53','apartamentos_instalaciones where id=233','insert'),(497,1,'2013-11-15 08:18:53','apartamentos_instalaciones where id=234','insert'),(498,1,'2013-11-15 08:18:53','apartamentos_instalaciones where id=235','insert'),(499,1,'2013-11-15 08:18:53','apartamentos_instalaciones where id=236','insert'),(500,1,'2013-11-15 08:18:53','apartamentos_instalaciones where id=237','insert'),(501,1,'2013-11-15 08:18:53','apartamentos_instalaciones where id=238','insert'),(502,1,'2013-11-15 08:18:53','apartamentos_instalaciones where id=239','insert'),(503,1,'2013-11-15 08:18:53','apartamentos_instalaciones where id=240','insert'),(504,1,'2013-11-15 08:18:53','apartamentos_instalaciones where id=241','insert'),(505,1,'2013-11-15 08:18:53','apartamentos_instalaciones where id=242','insert'),(506,1,'2013-11-15 08:18:53','apartamentos_instalaciones where id=243','insert'),(507,1,'2013-11-15 08:18:53','apartamentos_instalaciones where id=244','insert'),(508,1,'2013-11-15 08:18:53','apartamentos_instalaciones where id=245','insert'),(509,1,'2013-11-15 08:18:53','apartamentos_articulos where idApartamento=3','delete'),(510,1,'2013-11-15 08:18:53','apartamentos_articulos where id=6','insert'),(511,1,'2013-11-15 08:18:53','apartamentos_alojamientos where id_apartament','delete'),(512,1,'2013-11-15 08:18:53','apartamentos_alojamientos where id=19','insert'),(513,1,'2013-11-15 08:19:29','apartamentos where id=3','update'),(514,1,'2013-11-15 08:19:29','apartamentos_instalaciones where id=246','insert'),(515,1,'2013-11-15 08:19:29','apartamentos_instalaciones where id=247','insert'),(516,1,'2013-11-15 08:19:29','apartamentos_instalaciones where id=248','insert'),(517,1,'2013-11-15 08:19:29','apartamentos_instalaciones where id=249','insert'),(518,1,'2013-11-15 08:19:29','apartamentos_instalaciones where id=250','insert'),(519,1,'2013-11-15 08:19:29','apartamentos_instalaciones where id=251','insert'),(520,1,'2013-11-15 08:19:29','apartamentos_instalaciones where id=252','insert'),(521,1,'2013-11-15 08:19:29','apartamentos_instalaciones where id=253','insert'),(522,1,'2013-11-15 08:19:29','apartamentos_instalaciones where id=254','insert'),(523,1,'2013-11-15 08:19:29','apartamentos_instalaciones where id=255','insert'),(524,1,'2013-11-15 08:19:29','apartamentos_instalaciones where id=256','insert'),(525,1,'2013-11-15 08:19:29','apartamentos_instalaciones where id=257','insert'),(526,1,'2013-11-15 08:19:29','apartamentos_instalaciones where id=258','insert'),(527,1,'2013-11-15 08:19:29','apartamentos_instalaciones where id=259','insert'),(528,1,'2013-11-15 08:19:29','apartamentos_instalaciones where id=260','insert'),(529,1,'2013-11-15 08:19:29','apartamentos_instalaciones where id=261','insert'),(530,1,'2013-11-15 08:19:29','apartamentos_instalaciones where id=262','insert'),(531,1,'2013-11-15 08:19:29','apartamentos_instalaciones where id=263','insert'),(532,1,'2013-11-15 08:19:29','apartamentos_instalaciones where id=264','insert'),(533,1,'2013-11-15 08:19:29','apartamentos_instalaciones where id=265','insert'),(534,1,'2013-11-15 08:19:29','apartamentos_instalaciones where id=266','insert'),(535,1,'2013-11-15 08:19:29','apartamentos_instalaciones where id=267','insert'),(536,1,'2013-11-15 08:19:29','apartamentos_articulos where idApartamento=3','delete'),(537,1,'2013-11-15 08:19:29','apartamentos_articulos where id=7','insert'),(538,1,'2013-11-15 08:19:29','apartamentos_alojamientos where id_apartament','delete'),(539,1,'2013-11-15 08:19:30','apartamentos_alojamientos where id=20','insert'),(540,1,'2013-11-15 08:20:07','apartamentos where id=6','update'),(541,1,'2013-11-15 08:20:07','apartamentos_instalaciones where id=268','insert'),(542,1,'2013-11-15 08:20:07','apartamentos_instalaciones where id=269','insert'),(543,1,'2013-11-15 08:20:07','apartamentos_instalaciones where id=270','insert'),(544,1,'2013-11-15 08:20:07','apartamentos_instalaciones where id=271','insert'),(545,1,'2013-11-15 08:20:07','apartamentos_instalaciones where id=272','insert'),(546,1,'2013-11-15 08:20:07','apartamentos_instalaciones where id=273','insert'),(547,1,'2013-11-15 08:20:07','apartamentos_instalaciones where id=274','insert'),(548,1,'2013-11-15 08:20:07','apartamentos_instalaciones where id=275','insert'),(549,1,'2013-11-15 08:20:07','apartamentos_instalaciones where id=276','insert'),(550,1,'2013-11-15 08:20:07','apartamentos_instalaciones where id=277','insert'),(551,1,'2013-11-15 08:20:07','apartamentos_instalaciones where id=278','insert'),(552,1,'2013-11-15 08:20:07','apartamentos_instalaciones where id=279','insert'),(553,1,'2013-11-15 08:20:07','apartamentos_alojamientos where id_apartament','delete'),(554,1,'2013-11-15 08:20:07','apartamentos_alojamientos where id=21','insert'),(555,1,'2013-11-15 08:20:16','apartamentos where id=6','update'),(556,1,'2013-11-15 08:26:09','apartamentos where id=3','update'),(557,1,'2013-11-15 08:26:09','apartamentos_instalaciones where id=280','insert'),(558,1,'2013-11-15 08:26:09','apartamentos_instalaciones where id=281','insert'),(559,1,'2013-11-15 08:26:09','apartamentos_instalaciones where id=282','insert'),(560,1,'2013-11-15 08:26:09','apartamentos_instalaciones where id=283','insert'),(561,1,'2013-11-15 08:26:09','apartamentos_instalaciones where id=284','insert'),(562,1,'2013-11-15 08:26:09','apartamentos_instalaciones where id=285','insert'),(563,1,'2013-11-15 08:26:09','apartamentos_instalaciones where id=286','insert'),(564,1,'2013-11-15 08:26:09','apartamentos_instalaciones where id=287','insert'),(565,1,'2013-11-15 08:26:09','apartamentos_instalaciones where id=288','insert'),(566,1,'2013-11-15 08:26:09','apartamentos_instalaciones where id=289','insert'),(567,1,'2013-11-15 08:26:09','apartamentos_instalaciones where id=290','insert'),(568,1,'2013-11-15 08:26:09','apartamentos_instalaciones where id=291','insert'),(569,1,'2013-11-15 08:26:09','apartamentos_instalaciones where id=292','insert'),(570,1,'2013-11-15 08:26:09','apartamentos_instalaciones where id=293','insert'),(571,1,'2013-11-15 08:26:09','apartamentos_instalaciones where id=294','insert'),(572,1,'2013-11-15 08:26:09','apartamentos_instalaciones where id=295','insert'),(573,1,'2013-11-15 08:26:09','apartamentos_instalaciones where id=296','insert'),(574,1,'2013-11-15 08:26:09','apartamentos_instalaciones where id=297','insert'),(575,1,'2013-11-15 08:26:09','apartamentos_instalaciones where id=298','insert'),(576,1,'2013-11-15 08:26:09','apartamentos_instalaciones where id=299','insert'),(577,1,'2013-11-15 08:26:09','apartamentos_instalaciones where id=300','insert'),(578,1,'2013-11-15 08:26:09','apartamentos_instalaciones where id=301','insert'),(579,1,'2013-11-15 08:26:09','apartamentos_articulos where idApartamento=3','delete'),(580,1,'2013-11-15 08:26:09','apartamentos_articulos where id=8','insert'),(581,1,'2013-11-15 08:26:09','apartamentos_alojamientos where id_apartament','delete'),(582,1,'2013-11-15 08:26:09','apartamentos_alojamientos where id=22','insert'),(583,NULL,'2013-11-15 08:35:03','apartamentos where id=3','update'),(584,1,'2013-11-15 08:36:06','apartamentos where id=3','update'),(585,NULL,'2013-11-15 08:36:52','apartamentos where id=3','update'),(586,1,'2013-11-15 08:38:50','apartamentos where id=2','update'),(587,1,'2013-11-15 08:47:21','apartamentos where id=3','update'),(588,1,'2013-11-15 09:08:03','apartamentos where id=2','update'),(589,1,'2013-11-15 09:08:11','apartamentos where id=2','update'),(590,NULL,'2013-11-15 10:03:58','apartamentos where id=3','update'),(591,NULL,'2013-11-15 16:14:11','apartamentos where id=2','update'),(592,NULL,'2013-11-17 06:47:20','apartamentos where id=2','update'),(593,NULL,'2013-11-17 06:47:34','apartamentos where id=2','update'),(594,NULL,'2013-11-17 20:02:05','apartamentos where id=6','update'),(595,NULL,'2013-11-18 13:43:31','apartamentos where id=2','update'),(596,NULL,'2013-11-18 13:44:17','apartamentos where id=2','update'),(597,NULL,'2013-11-18 14:06:23','apartamentos where id=2','update'),(598,NULL,'2013-11-18 14:12:18','apartamentos where id=3','update'),(599,NULL,'2013-11-18 18:00:59','apartamentos where id=3','update'),(600,NULL,'2013-11-18 18:01:34','apartamentos where id=2','update'),(601,NULL,'2013-11-18 18:07:47','apartamentos where id=3','update'),(602,NULL,'2013-11-19 07:30:28','apartamentos where id=2','update'),(603,NULL,'2013-11-19 08:05:07','apartamentos where id=2','update'),(604,NULL,'2013-11-19 13:23:49','apartamentos where id=2','update'),(605,NULL,'2013-11-19 18:38:55','apartamentos where id=2','update'),(606,NULL,'2013-11-19 20:31:03','apartamentos where id=6','update'),(607,NULL,'2013-11-19 22:13:37','apartamentos where id=2','update'),(608,NULL,'2013-11-19 22:16:28','apartamentos where id=2','update'),(609,NULL,'2013-11-19 22:19:52','apartamentos where id=2','update'),(610,NULL,'2013-11-19 22:21:47','apartamentos where id=2','update'),(611,NULL,'2013-11-19 22:21:50','apartamentos where id=2','update'),(612,NULL,'2013-11-19 22:21:51','apartamentos where id=2','update'),(613,NULL,'2013-11-19 22:21:53','apartamentos where id=2','update'),(614,NULL,'2013-11-20 01:45:25','apartamentos where id=3','update'),(615,NULL,'2013-11-20 01:46:57','reservaciones where id=13','insert'),(616,1,'2013-11-20 03:42:06','usuarios where id=5','update'),(617,1,'2013-11-20 03:42:06','empresas where id=2','update'),(618,1,'2013-11-20 03:43:08','usuarios where id=0','update'),(619,1,'2013-11-20 03:43:08','empresas where id=1','update'),(620,1,'2013-11-20 04:14:21','apartamentos where id=6','update'),(621,1,'2013-11-20 04:14:21','apartamentos_instalaciones where id=302','insert'),(622,1,'2013-11-20 04:14:21','apartamentos_instalaciones where id=303','insert'),(623,1,'2013-11-20 04:14:21','apartamentos_instalaciones where id=304','insert'),(624,1,'2013-11-20 04:14:21','apartamentos_instalaciones where id=305','insert'),(625,1,'2013-11-20 04:14:21','apartamentos_instalaciones where id=306','insert'),(626,1,'2013-11-20 04:14:21','apartamentos_instalaciones where id=307','insert'),(627,1,'2013-11-20 04:14:21','apartamentos_instalaciones where id=308','insert'),(628,1,'2013-11-20 04:14:21','apartamentos_instalaciones where id=309','insert'),(629,1,'2013-11-20 04:14:21','apartamentos_instalaciones where id=310','insert'),(630,1,'2013-11-20 04:14:21','apartamentos_instalaciones where id=311','insert'),(631,1,'2013-11-20 04:14:21','apartamentos_instalaciones where id=312','insert'),(632,1,'2013-11-20 04:14:21','apartamentos_instalaciones where id=313','insert'),(633,1,'2013-11-20 04:14:21','apartamentos_instalaciones where id=314','insert'),(634,1,'2013-11-20 04:14:21','apartamentos_instalaciones where id=315','insert'),(635,1,'2013-11-20 04:14:21','apartamentos_instalaciones where id=316','insert'),(636,1,'2013-11-20 04:14:21','apartamentos_instalaciones where id=317','insert'),(637,1,'2013-11-20 04:14:21','apartamentos_instalaciones where id=318','insert'),(638,1,'2013-11-20 04:14:21','apartamentos_instalaciones where id=319','insert'),(639,1,'2013-11-20 04:14:21','apartamentos_instalaciones where id=320','insert'),(640,1,'2013-11-20 04:14:21','apartamentos_instalaciones where id=321','insert'),(641,1,'2013-11-20 04:14:21','apartamentos_instalaciones where id=322','insert'),(642,1,'2013-11-20 04:14:21','apartamentos_instalaciones where id=323','insert'),(643,1,'2013-11-20 04:14:21','apartamentos_alojamientos where id_apartament','delete'),(644,1,'2013-11-20 04:14:21','apartamentos_alojamientos where id=23','insert'),(645,1,'2013-11-20 04:14:40','apartamentos where id=6','update'),(646,1,'2013-11-20 04:39:05','apartamentos where id=2','update'),(647,1,'2013-11-20 04:39:42','apartamentos where id=2','update'),(648,1,'2013-11-20 05:01:50','apartamentos where id=6','update'),(649,1,'2013-11-20 05:02:29','apartamentos where id=2','update'),(650,NULL,'2013-11-20 08:49:01','apartamentos where id=2','update'),(651,NULL,'2013-11-20 09:43:03','apartamentos where id=2','update'),(652,NULL,'2013-11-20 09:43:05','apartamentos where id=2','update'),(653,NULL,'2013-11-20 13:16:33','apartamentos where id=3','update'),(654,NULL,'2013-11-20 14:08:23','apartamentos where id=3','update'),(655,NULL,'2013-11-20 14:34:55','apartamentos where id=2','update'),(656,1,'2013-11-20 16:23:53','apartamentos where id=3','update'),(657,1,'2013-11-20 16:30:02','apartamentos_adjuntos where id_apartamento=2','update'),(658,1,'2013-11-20 16:30:11','apartamentos_documentos where id=1','delete'),(659,1,'2013-11-20 16:45:01','apartamentos where id=20','insert'),(660,1,'2013-11-20 16:45:01','apartamentos_instalaciones where id=324','insert'),(661,1,'2013-11-20 16:45:01','apartamentos_alojamientos where id=24','insert'),(662,1,'2013-11-20 16:49:55','apartamentos where id=3','update'),(663,1,'2013-11-20 17:00:01','apartamentos where id=21','insert'),(664,1,'2013-11-20 17:00:01','apartamentos_instalaciones where id=325','insert'),(665,1,'2013-11-20 17:00:01','apartamentos_instalaciones where id=326','insert'),(666,1,'2013-11-20 17:00:01','apartamentos_instalaciones where id=327','insert'),(667,1,'2013-11-20 17:00:01','apartamentos_instalaciones where id=328','insert'),(668,1,'2013-11-20 17:00:01','apartamentos_instalaciones where id=329','insert'),(669,1,'2013-11-20 17:00:01','apartamentos_instalaciones where id=330','insert'),(670,1,'2013-11-20 17:00:01','apartamentos_instalaciones where id=331','insert'),(671,1,'2013-11-20 17:00:01','apartamentos_instalaciones where id=332','insert'),(672,1,'2013-11-20 17:00:01','apartamentos_instalaciones where id=333','insert'),(673,1,'2013-11-20 17:00:01','apartamentos_instalaciones where id=334','insert'),(674,1,'2013-11-20 17:00:01','apartamentos_instalaciones where id=335','insert'),(675,1,'2013-11-20 17:00:01','apartamentos_instalaciones where id=336','insert'),(676,1,'2013-11-20 17:00:01','apartamentos_instalaciones where id=337','insert'),(677,1,'2013-11-20 17:00:01','apartamentos_instalaciones where id=338','insert'),(678,1,'2013-11-20 17:00:01','apartamentos_instalaciones where id=339','insert'),(679,1,'2013-11-20 17:00:01','apartamentos_instalaciones where id=340','insert'),(680,1,'2013-11-20 17:00:01','apartamentos_instalaciones where id=341','insert'),(681,1,'2013-11-20 17:00:01','apartamentos_alojamientos where id=25','insert'),(682,1,'2013-11-20 17:06:11','adjuntos where id=35','insert'),(683,1,'2013-11-20 17:06:11','apartamentos_adjuntos where id=33','insert'),(684,1,'2013-11-20 17:06:15','adjuntos where id=36','insert'),(685,1,'2013-11-20 17:06:15','apartamentos_adjuntos where id=34','insert'),(686,1,'2013-11-20 17:06:25','apartamentos_adjuntos where id=34','delete'),(687,1,'2013-11-20 17:06:25','adjuntos where id=36','delete'),(688,1,'2013-11-20 17:06:29','adjuntos where id=37','insert'),(689,1,'2013-11-20 17:06:29','apartamentos_adjuntos where id=35','insert'),(690,1,'2013-11-20 17:06:33','adjuntos where id=38','insert'),(691,1,'2013-11-20 17:06:33','apartamentos_adjuntos where id=36','insert'),(692,1,'2013-11-20 17:06:39','apartamentos_adjuntos where id=36','delete'),(693,1,'2013-11-20 17:06:39','adjuntos where id=38','delete'),(694,1,'2013-11-20 17:06:55','adjuntos where id=39','insert'),(695,1,'2013-11-20 17:06:55','apartamentos_adjuntos where id=37','insert'),(696,1,'2013-11-20 17:06:58','adjuntos where id=40','insert'),(697,1,'2013-11-20 17:06:58','apartamentos_adjuntos where id=38','insert'),(698,1,'2013-11-20 17:07:04','apartamentos_adjuntos where id=35','delete'),(699,1,'2013-11-20 17:07:04','adjuntos where id=37','delete'),(700,1,'2013-11-20 17:07:06','apartamentos_adjuntos where id=38','delete'),(701,1,'2013-11-20 17:07:06','adjuntos where id=40','delete'),(702,1,'2013-11-20 17:07:44','adjuntos where id=41','insert'),(703,1,'2013-11-20 17:07:44','apartamentos_adjuntos where id=39','insert'),(704,1,'2013-11-20 17:38:19','apartamentos where id=20','delete'),(705,1,'2013-11-20 17:39:28','apartamentos where id=2','update'),(706,1,'2013-11-20 17:39:56','apartamentos where id=21','update'),(707,1,'2013-11-20 18:17:03','apartamentos where id=2','update'),(708,1,'2013-11-20 18:17:03','apartamentos_instalaciones where id=342','insert'),(709,1,'2013-11-20 18:17:03','apartamentos_instalaciones where id=343','insert'),(710,1,'2013-11-20 18:17:03','apartamentos_articulos where idApartamento=2','delete'),(711,1,'2013-11-20 18:17:03','apartamentos_articulos where id=9','insert'),(712,1,'2013-11-20 18:17:43','apartamentos where id=6','update'),(713,1,'2013-11-20 19:12:02','apartamentos where id=2','update'),(714,1,'2013-11-20 19:12:56','apartamentos where id=2','update'),(715,1,'2013-11-20 19:13:53','apartamentos where id=3','update'),(716,1,'2013-11-20 19:19:16','apartamentos where id=3','update'),(717,NULL,'2013-11-21 15:22:33','apartamentos where id=2','update'),(718,NULL,'2013-11-21 15:22:40','apartamentos where id=6','update'),(719,NULL,'2013-11-21 15:22:43','apartamentos where id=2','update'),(720,NULL,'2013-11-21 15:22:47','apartamentos where id=6','update'),(721,NULL,'2013-11-21 15:23:03','apartamentos where id=6','update'),(722,NULL,'2013-11-21 15:23:58','apartamentos where id=6','update'),(723,NULL,'2013-11-21 15:23:59','apartamentos where id=6','update'),(724,NULL,'2013-11-21 15:24:12','apartamentos where id=6','update'),(725,NULL,'2013-11-21 15:25:07','reservaciones where id=14','insert'),(726,NULL,'2013-11-21 15:25:55','apartamentos where id=21','update'),(727,NULL,'2013-11-22 09:07:21','apartamentos where id=6','update'),(728,NULL,'2013-11-22 09:07:21','apartamentos where id=2','update'),(729,NULL,'2013-11-22 09:07:43','apartamentos where id=6','update'),(730,NULL,'2013-11-22 09:08:33','apartamentos where id=6','update'),(731,1,'2013-11-22 09:08:52','apartamentos where id=2','delete'),(732,1,'2013-11-22 09:08:56','apartamentos where id=2','update'),(733,NULL,'2013-11-22 10:06:21','apartamentos where id=3','update'),(734,NULL,'2013-11-22 10:11:06','apartamentos where id=3','update'),(735,NULL,'2013-11-22 11:11:21','apartamentos where id=3','update'),(736,NULL,'2013-11-25 11:55:09','apartamentos where id=3','update'),(737,NULL,'2013-11-25 11:56:24','apartamentos where id=21','update'),(738,1,'2013-11-25 12:11:36','apartamentos where id=6','delete'),(739,1,'2013-11-25 12:11:39','apartamentos where id=21','delete'),(740,1,'2013-11-25 21:41:49','apartamentos_adjuntos where id=26','delete'),(741,1,'2013-11-25 21:41:49','adjuntos where id=27','delete'),(742,1,'2013-11-25 21:41:49','apartamentos_adjuntos where id=27','delete'),(743,1,'2013-11-25 21:41:50','adjuntos where id=28','delete'),(744,1,'2013-11-25 21:41:57','apartamentos_adjuntos where id=28','delete'),(745,1,'2013-11-25 21:41:57','adjuntos where id=29','delete'),(746,1,'2013-11-25 21:41:59','apartamentos_adjuntos where id=31','delete'),(747,1,'2013-11-25 21:41:59','adjuntos where id=32','delete'),(748,1,'2013-11-25 21:41:59','apartamentos_adjuntos where id=32','delete'),(749,1,'2013-11-25 21:41:59','adjuntos where id=33','delete'),(750,1,'2013-11-25 21:42:01','apartamentos_adjuntos where id=30','delete'),(751,1,'2013-11-25 21:42:01','adjuntos where id=31','delete'),(752,1,'2013-11-25 21:42:03','apartamentos_adjuntos where id=29','delete'),(753,1,'2013-11-25 21:42:03','adjuntos where id=30','delete'),(754,1,'2013-11-25 21:42:12','apartamentos_adjuntos where id=29','delete'),(755,1,'2013-11-25 21:44:36','apartamentos_adjuntos where id=29','delete'),(756,1,'2013-11-25 21:46:12','adjuntos where id=42','insert'),(757,1,'2013-11-25 21:46:12','apartamentos_adjuntos where id=40','insert'),(758,1,'2013-11-25 21:46:34','apartamentos where id=3','update'),(759,NULL,'2013-11-26 14:20:18','apartamentos where id=3','update'),(760,NULL,'2013-11-28 18:49:06','apartamentos where id=3','update'),(761,NULL,'2013-11-28 18:50:47','apartamentos where id=3','update'),(762,NULL,'2013-11-28 19:03:00','apartamentos where id=3','update'),(763,NULL,'2013-11-28 19:06:33','apartamentos where id=3','update'),(764,1,'2013-11-28 19:17:10','apartamentos where id=3','update'),(765,NULL,'2013-11-28 19:17:17','apartamentos where id=3','update'),(766,NULL,'2013-11-28 19:23:36','apartamentos where id=3','update'),(767,1,'2013-11-28 19:23:41','apartamentos where id=3','update'),(768,1,'2013-11-28 19:26:47','apartamentos where id=3','update'),(769,NULL,'2013-11-28 19:27:56','apartamentos where id=3','update'),(770,1,'2013-11-28 19:35:01','apartamentos where id=22','insert'),(771,1,'2013-11-28 19:35:01','apartamentos_instalaciones where id=342','insert'),(772,1,'2013-11-28 19:35:01','apartamentos_instalaciones where id=343','insert'),(773,1,'2013-11-28 19:35:01','apartamentos_instalaciones where id=344','insert'),(774,1,'2013-11-28 19:35:01','apartamentos_instalaciones where id=345','insert'),(775,1,'2013-11-28 19:35:01','apartamentos_instalaciones where id=346','insert'),(776,1,'2013-11-28 19:35:01','apartamentos_instalaciones where id=347','insert'),(777,1,'2013-11-28 19:35:01','apartamentos_instalaciones where id=348','insert'),(778,1,'2013-11-28 19:35:01','apartamentos_instalaciones where id=349','insert'),(779,1,'2013-11-28 19:35:01','apartamentos_instalaciones where id=350','insert'),(780,1,'2013-11-28 19:35:01','apartamentos_instalaciones where id=351','insert'),(781,1,'2013-11-28 19:35:01','apartamentos_instalaciones where id=352','insert'),(782,1,'2013-11-28 19:35:01','apartamentos_instalaciones where id=353','insert'),(783,1,'2013-11-28 19:37:04','adjuntos where id=43','insert'),(784,1,'2013-11-28 19:37:04','apartamentos_adjuntos where id=41','insert'),(785,1,'2013-11-28 19:37:05','adjuntos where id=44','insert'),(786,1,'2013-11-28 19:37:05','apartamentos_adjuntos where id=42','insert'),(787,1,'2013-11-28 19:37:07','adjuntos where id=45','insert'),(788,1,'2013-11-28 19:37:07','apartamentos_adjuntos where id=43','insert'),(789,1,'2013-11-28 19:37:09','adjuntos where id=46','insert'),(790,1,'2013-11-28 19:37:09','apartamentos_adjuntos where id=44','insert'),(791,1,'2013-11-28 19:37:09','adjuntos where id=47','insert'),(792,1,'2013-11-28 19:37:09','apartamentos_adjuntos where id=45','insert'),(793,1,'2013-11-28 19:37:11','adjuntos where id=48','insert'),(794,1,'2013-11-28 19:37:11','apartamentos_adjuntos where id=46','insert'),(795,1,'2013-11-28 19:37:12','adjuntos where id=49','insert'),(796,1,'2013-11-28 19:37:12','apartamentos_adjuntos where id=47','insert'),(797,1,'2013-11-28 19:37:15','adjuntos where id=50','insert'),(798,1,'2013-11-28 19:37:15','apartamentos_adjuntos where id=48','insert'),(799,1,'2013-11-28 19:37:17','adjuntos where id=51','insert'),(800,1,'2013-11-28 19:37:17','apartamentos_adjuntos where id=49','insert'),(801,1,'2013-11-28 19:37:18','adjuntos where id=52','insert'),(802,1,'2013-11-28 19:37:18','apartamentos_adjuntos where id=50','insert'),(803,1,'2013-11-28 19:38:18','apartamentos where id=22','update'),(804,1,'2013-11-28 19:38:18','apartamentos_instalaciones where id=354','insert'),(805,1,'2013-11-28 19:38:18','apartamentos_instalaciones where id=355','insert'),(806,1,'2013-11-28 19:38:18','apartamentos_instalaciones where id=356','insert'),(807,1,'2013-11-28 19:38:18','apartamentos_instalaciones where id=357','insert'),(808,1,'2013-11-28 19:38:18','apartamentos_instalaciones where id=358','insert'),(809,1,'2013-11-28 19:38:18','apartamentos_instalaciones where id=359','insert'),(810,1,'2013-11-28 19:38:18','apartamentos_instalaciones where id=360','insert'),(811,1,'2013-11-28 19:38:18','apartamentos_instalaciones where id=361','insert'),(812,1,'2013-11-28 19:38:18','apartamentos_instalaciones where id=362','insert'),(813,1,'2013-11-28 19:38:18','apartamentos_instalaciones where id=363','insert'),(814,1,'2013-11-28 19:38:18','apartamentos_instalaciones where id=364','insert'),(815,1,'2013-11-28 19:38:18','apartamentos_instalaciones where id=365','insert'),(816,1,'2013-11-28 19:38:53','apartamentos where id=22','update'),(817,1,'2013-11-28 20:17:21','apartamentos where id=22','update'),(818,1,'2013-11-28 20:17:21','apartamentos_instalaciones where id=366','insert'),(819,1,'2013-11-28 20:17:21','apartamentos_instalaciones where id=367','insert'),(820,1,'2013-11-28 20:17:21','apartamentos_instalaciones where id=368','insert'),(821,1,'2013-11-28 20:17:21','apartamentos_instalaciones where id=369','insert'),(822,1,'2013-11-28 20:17:21','apartamentos_instalaciones where id=370','insert'),(823,1,'2013-11-28 20:17:21','apartamentos_instalaciones where id=371','insert'),(824,1,'2013-11-28 20:17:21','apartamentos_instalaciones where id=372','insert'),(825,1,'2013-11-28 20:17:21','apartamentos_instalaciones where id=373','insert'),(826,1,'2013-11-28 20:17:21','apartamentos_instalaciones where id=374','insert'),(827,1,'2013-11-28 20:17:21','apartamentos_instalaciones where id=375','insert'),(828,1,'2013-11-28 20:17:21','apartamentos_instalaciones where id=376','insert'),(829,1,'2013-11-28 20:17:21','apartamentos_instalaciones where id=377','insert'),(830,NULL,'2013-11-28 21:13:59','apartamentos where id=3','update'),(831,NULL,'2013-11-28 21:18:44','apartamentos where id=3','update'),(832,NULL,'2013-11-28 21:18:44','apartamentos where id=3','update'),(833,NULL,'2013-11-28 21:20:27','apartamentos where id=3','update'),(834,NULL,'2013-11-28 21:22:15','apartamentos where id=3','update'),(835,NULL,'2013-11-28 21:22:55','apartamentos where id=3','update'),(836,NULL,'2013-11-28 21:22:55','apartamentos where id=3','update'),(837,NULL,'2013-11-28 21:22:56','apartamentos where id=3','update'),(838,NULL,'2013-11-28 21:23:26','apartamentos where id=3','update'),(839,NULL,'2013-11-28 21:27:34','apartamentos where id=3','update'),(840,NULL,'2013-11-28 21:28:46','apartamentos where id=22','update'),(841,NULL,'2013-11-28 22:14:57','apartamentos where id=3','update'),(842,NULL,'2013-11-28 22:19:00','apartamentos where id=3','update'),(843,NULL,'2013-11-29 00:11:57','apartamentos where id=22','update'),(844,NULL,'2013-11-29 07:27:26','apartamentos where id=3','update'),(845,NULL,'2013-11-29 07:27:29','apartamentos where id=3','update'),(846,NULL,'2013-11-29 07:28:11','apartamentos where id=22','update'),(847,1,'2013-11-29 07:51:45','apartamentos where id=3','update'),(848,NULL,'2013-11-29 07:54:35','apartamentos where id=3','update'),(849,1,'2013-11-29 07:55:15','apartamentos where id=','update'),(850,1,'2013-11-29 07:55:34','apartamentos where id=3','update'),(851,1,'2013-11-29 07:56:47','apartamentos where id=3','update'),(852,NULL,'2013-11-29 12:56:57','apartamentos where id=22','update'),(853,NULL,'2013-11-29 13:00:34','apartamentos where id=3','update'),(854,NULL,'2013-11-29 19:02:19','apartamentos where id=3','update'),(855,NULL,'2013-11-29 19:02:25','apartamentos where id=3','update'),(856,NULL,'2013-11-29 19:02:43','apartamentos where id=22','update'),(857,NULL,'2013-12-01 12:58:26','apartamentos where id=3','update'),(858,NULL,'2013-12-01 14:20:12','apartamentos where id=3','update'),(859,NULL,'2013-12-02 08:29:59','apartamentos where id=3','update'),(860,1,'2013-12-02 13:52:27','apartamentos where id=3','update'),(861,NULL,'2013-12-02 13:52:49','apartamentos where id=','update'),(862,NULL,'2013-12-02 13:52:56','apartamentos where id=','update'),(863,NULL,'2013-12-02 13:53:37','apartamentos where id=3','update'),(864,NULL,'2013-12-02 14:15:13','apartamentos where id=3','update'),(865,NULL,'2013-12-02 14:18:17','apartamentos where id=22','update'),(866,NULL,'2013-12-02 14:19:48','apartamentos where id=22','update'),(867,NULL,'2013-12-02 15:41:44','apartamentos where id=3','update'),(868,NULL,'2013-12-02 15:41:51','apartamentos where id=3','update'),(869,NULL,'2013-12-02 15:58:44','reservaciones where id=15','insert'),(870,NULL,'2013-12-02 15:59:42','reservaciones where id=16','insert'),(871,17,'2013-12-02 15:59:46','reservaciones where id=17','insert'),(872,NULL,'2013-12-02 16:04:08','apartamentos where id=3','update'),(873,1,'2013-12-02 16:22:44','apartamentos where id=3','update'),(874,1,'2013-12-02 17:11:33','apartamentos where id=3','update'),(875,1,'2013-12-02 17:13:33','apartamentos where id=3','update'),(876,1,'2013-12-02 17:18:40','apartamentos where id=3','update'),(877,1,'2013-12-02 17:24:02','apartamentos where id=3','update'),(878,NULL,'2013-12-02 21:35:55','apartamentos where id=22','update'),(879,NULL,'2013-12-03 11:53:12','apartamentos where id=3','update'),(880,NULL,'2013-12-03 15:32:16','apartamentos where id=3','update'),(881,NULL,'2013-12-03 15:32:21','apartamentos where id=3','update'),(882,NULL,'2013-12-03 22:04:00','apartamentos where id=3','update'),(883,NULL,'2013-12-03 22:04:05','apartamentos where id=3','update'),(884,NULL,'2013-12-04 00:30:36','apartamentos where id=3','update'),(885,NULL,'2013-12-04 04:18:04','apartamentos where id=3','update'),(886,1,'2013-12-04 04:18:18','apartamentos where id=22','update'),(887,NULL,'2013-12-04 04:18:59','apartamentos where id=22','update'),(888,1,'2013-12-04 04:19:30','apartamentos where id=22','update'),(889,1,'2013-12-04 04:19:30','apartamentos_instalaciones where id=378','insert'),(890,1,'2013-12-04 04:19:30','apartamentos_instalaciones where id=379','insert'),(891,1,'2013-12-04 04:19:30','apartamentos_instalaciones where id=380','insert'),(892,1,'2013-12-04 04:19:30','apartamentos_instalaciones where id=381','insert'),(893,1,'2013-12-04 04:19:30','apartamentos_instalaciones where id=382','insert'),(894,1,'2013-12-04 04:19:30','apartamentos_instalaciones where id=383','insert'),(895,1,'2013-12-04 04:19:30','apartamentos_instalaciones where id=384','insert'),(896,1,'2013-12-04 04:19:30','apartamentos_instalaciones where id=385','insert'),(897,1,'2013-12-04 04:19:30','apartamentos_instalaciones where id=386','insert'),(898,1,'2013-12-04 04:19:30','apartamentos_instalaciones where id=387','insert'),(899,1,'2013-12-04 04:19:30','apartamentos_instalaciones where id=388','insert'),(900,1,'2013-12-04 04:19:30','apartamentos_instalaciones where id=389','insert'),(901,1,'2013-12-04 04:19:33','apartamentos where id=22','update'),(902,NULL,'2013-12-04 04:19:52','apartamentos where id=22','update'),(903,1,'2013-12-04 04:21:12','apartamentos where id=22','update'),(904,1,'2013-12-04 04:29:04','apartamentos where id=22','update'),(905,1,'2013-12-04 04:29:42','apartamentos where id=22','update'),(906,1,'2013-12-04 04:29:42','apartamentos_instalaciones where id=390','insert'),(907,1,'2013-12-04 04:29:42','apartamentos_instalaciones where id=391','insert'),(908,1,'2013-12-04 04:29:42','apartamentos_instalaciones where id=392','insert'),(909,1,'2013-12-04 04:29:42','apartamentos_instalaciones where id=393','insert'),(910,1,'2013-12-04 04:29:42','apartamentos_instalaciones where id=394','insert'),(911,1,'2013-12-04 04:29:42','apartamentos_instalaciones where id=395','insert'),(912,1,'2013-12-04 04:29:42','apartamentos_instalaciones where id=396','insert'),(913,1,'2013-12-04 04:29:42','apartamentos_instalaciones where id=397','insert'),(914,1,'2013-12-04 04:29:42','apartamentos_instalaciones where id=398','insert'),(915,1,'2013-12-04 04:29:42','apartamentos_instalaciones where id=399','insert'),(916,1,'2013-12-04 04:29:42','apartamentos_instalaciones where id=400','insert'),(917,1,'2013-12-04 04:29:42','apartamentos_instalaciones where id=401','insert'),(918,1,'2013-12-04 04:29:48','apartamentos where id=22','update'),(919,1,'2013-12-04 04:30:35','apartamentos where id=22','update'),(920,1,'2013-12-04 04:30:35','apartamentos_instalaciones where id=402','insert'),(921,1,'2013-12-04 04:30:35','apartamentos_instalaciones where id=403','insert'),(922,1,'2013-12-04 04:30:35','apartamentos_instalaciones where id=404','insert'),(923,1,'2013-12-04 04:30:35','apartamentos_instalaciones where id=405','insert'),(924,1,'2013-12-04 04:30:35','apartamentos_instalaciones where id=406','insert'),(925,1,'2013-12-04 04:30:35','apartamentos_instalaciones where id=407','insert'),(926,1,'2013-12-04 04:30:35','apartamentos_instalaciones where id=408','insert'),(927,1,'2013-12-04 04:30:35','apartamentos_instalaciones where id=409','insert'),(928,1,'2013-12-04 04:30:35','apartamentos_instalaciones where id=410','insert'),(929,1,'2013-12-04 04:30:35','apartamentos_instalaciones where id=411','insert'),(930,1,'2013-12-04 04:30:35','apartamentos_instalaciones where id=412','insert'),(931,1,'2013-12-04 04:30:35','apartamentos_instalaciones where id=413','insert'),(932,1,'2013-12-04 04:30:37','apartamentos where id=22','update'),(933,1,'2013-12-04 04:40:49','apartamentos where id=22','update'),(934,1,'2013-12-04 04:41:10','apartamentos where id=22','update'),(935,1,'2013-12-04 04:41:10','apartamentos_instalaciones where id=414','insert'),(936,1,'2013-12-04 04:41:10','apartamentos_instalaciones where id=415','insert'),(937,1,'2013-12-04 04:41:10','apartamentos_instalaciones where id=416','insert'),(938,1,'2013-12-04 04:41:10','apartamentos_instalaciones where id=417','insert'),(939,1,'2013-12-04 04:41:10','apartamentos_instalaciones where id=418','insert'),(940,1,'2013-12-04 04:41:10','apartamentos_instalaciones where id=419','insert'),(941,1,'2013-12-04 04:41:10','apartamentos_instalaciones where id=420','insert'),(942,1,'2013-12-04 04:41:10','apartamentos_instalaciones where id=421','insert'),(943,1,'2013-12-04 04:41:10','apartamentos_instalaciones where id=422','insert'),(944,1,'2013-12-04 04:41:10','apartamentos_instalaciones where id=423','insert'),(945,1,'2013-12-04 04:41:10','apartamentos_instalaciones where id=424','insert'),(946,1,'2013-12-04 04:41:10','apartamentos_instalaciones where id=425','insert'),(947,1,'2013-12-04 04:41:13','apartamentos where id=22','update'),(948,1,'2013-12-04 04:43:35','apartamentos where id=3','update'),(949,1,'2013-12-04 05:06:29','apartamentos where id=22','update'),(950,1,'2013-12-04 05:07:48','apartamentos where id=3','update'),(951,1,'2013-12-04 05:08:24','apartamentos where id=3','update'),(952,1,'2013-12-04 05:56:53','apartamentos where id=3','update'),(953,1,'2013-12-04 05:57:10','apartamentos where id=3','update'),(954,1,'2013-12-04 05:57:19','apartamentos where id=22','update'),(955,1,'2013-12-04 05:58:16','apartamentos where id=3','update'),(956,1,'2013-12-04 05:58:50','apartamentos where id=3','update'),(957,1,'2013-12-04 05:58:55','apartamentos where id=22','update'),(958,NULL,'2013-12-04 05:59:08','apartamentos where id=22','update'),(959,1,'2013-12-04 05:59:22','apartamentos where id=22','update'),(960,NULL,'2013-12-04 06:07:40','apartamentos where id=22','update'),(961,1,'2013-12-04 06:23:34','apartamentos where id=22','update'),(962,NULL,'2013-12-04 06:23:50','apartamentos where id=22','update'),(963,1,'2013-12-04 06:39:10','apartamentos where id=22','update'),(964,1,'2013-12-04 06:39:24','apartamentos where id=22','update'),(965,NULL,'2013-12-04 06:39:38','apartamentos where id=22','update'),(966,1,'2013-12-04 06:40:53','apartamentos where id=3','update'),(967,NULL,'2013-12-04 07:50:07','apartamentos where id=3','update'),(968,NULL,'2013-12-04 07:50:15','apartamentos where id=3','update'),(969,NULL,'2013-12-04 07:50:24','apartamentos where id=22','update'),(970,NULL,'2013-12-04 07:57:59','apartamentos where id=22','update'),(971,NULL,'2013-12-04 08:17:53','apartamentos where id=3','update'),(972,NULL,'2013-12-04 08:19:12','apartamentos where id=22','update'),(973,NULL,'2013-12-04 08:31:15','apartamentos where id=22','update'),(974,NULL,'2013-12-04 08:33:52','apartamentos where id=22','update'),(975,NULL,'2013-12-04 08:36:27','apartamentos where id=3','update'),(976,NULL,'2013-12-04 08:37:01','apartamentos where id=22','update'),(977,1,'2013-12-04 08:39:21','apartamentos where id=3','update'),(978,1,'2013-12-04 08:39:21','apartamentos_instalaciones where id=426','insert'),(979,1,'2013-12-04 08:39:21','apartamentos_instalaciones where id=427','insert'),(980,1,'2013-12-04 08:39:21','apartamentos_instalaciones where id=428','insert'),(981,1,'2013-12-04 08:39:21','apartamentos_instalaciones where id=429','insert'),(982,1,'2013-12-04 08:39:21','apartamentos_instalaciones where id=430','insert'),(983,1,'2013-12-04 08:39:21','apartamentos_instalaciones where id=431','insert'),(984,1,'2013-12-04 08:39:21','apartamentos_instalaciones where id=432','insert'),(985,1,'2013-12-04 08:39:21','apartamentos_instalaciones where id=433','insert'),(986,1,'2013-12-04 08:39:21','apartamentos_instalaciones where id=434','insert'),(987,1,'2013-12-04 08:39:21','apartamentos_instalaciones where id=435','insert'),(988,1,'2013-12-04 08:39:21','apartamentos_instalaciones where id=436','insert'),(989,1,'2013-12-04 08:39:21','apartamentos_instalaciones where id=437','insert'),(990,1,'2013-12-04 08:39:21','apartamentos_instalaciones where id=438','insert'),(991,1,'2013-12-04 08:39:21','apartamentos_instalaciones where id=439','insert'),(992,1,'2013-12-04 08:39:21','apartamentos_instalaciones where id=440','insert'),(993,1,'2013-12-04 08:39:21','apartamentos_instalaciones where id=441','insert'),(994,1,'2013-12-04 08:39:21','apartamentos_instalaciones where id=442','insert'),(995,1,'2013-12-04 08:39:21','apartamentos_instalaciones where id=443','insert'),(996,1,'2013-12-04 08:39:21','apartamentos_instalaciones where id=444','insert'),(997,1,'2013-12-04 08:39:21','apartamentos_instalaciones where id=445','insert'),(998,1,'2013-12-04 08:39:21','apartamentos_instalaciones where id=446','insert'),(999,1,'2013-12-04 08:39:21','apartamentos_instalaciones where id=447','insert'),(1000,1,'2013-12-04 08:39:21','apartamentos_instalaciones where id=448','insert'),(1001,1,'2013-12-04 08:39:21','apartamentos_instalaciones where id=449','insert'),(1002,1,'2013-12-04 08:39:21','apartamentos_instalaciones where id=450','insert'),(1003,1,'2013-12-04 08:39:21','apartamentos_instalaciones where id=451','insert'),(1004,1,'2013-12-04 08:39:21','apartamentos_instalaciones where id=452','insert'),(1005,1,'2013-12-04 08:39:21','apartamentos_instalaciones where id=453','insert'),(1006,1,'2013-12-04 08:39:21','apartamentos_instalaciones where id=454','insert'),(1007,1,'2013-12-04 08:39:21','apartamentos_instalaciones where id=455','insert'),(1008,1,'2013-12-04 08:39:21','apartamentos_instalaciones where id=456','insert'),(1009,1,'2013-12-04 08:39:21','apartamentos_instalaciones where id=457','insert'),(1010,1,'2013-12-04 08:39:21','apartamentos_instalaciones where id=458','insert'),(1011,1,'2013-12-04 08:39:21','apartamentos_instalaciones where id=459','insert'),(1012,1,'2013-12-04 08:39:21','apartamentos_instalaciones where id=460','insert'),(1013,1,'2013-12-04 08:39:22','apartamentos_instalaciones where id=461','insert'),(1014,1,'2013-12-04 08:39:22','apartamentos_instalaciones where id=462','insert'),(1015,1,'2013-12-04 08:39:22','apartamentos_instalaciones where id=463','insert'),(1016,1,'2013-12-04 08:39:22','apartamentos_instalaciones where id=464','insert'),(1017,1,'2013-12-04 08:39:22','apartamentos_instalaciones where id=465','insert'),(1018,1,'2013-12-04 08:39:22','apartamentos_instalaciones where id=466','insert'),(1019,1,'2013-12-04 08:39:22','apartamentos_instalaciones where id=467','insert'),(1020,1,'2013-12-04 08:39:22','apartamentos_instalaciones where id=468','insert'),(1021,1,'2013-12-04 08:39:22','apartamentos_instalaciones where id=469','insert'),(1022,1,'2013-12-04 08:39:22','apartamentos_instalaciones where id=470','insert'),(1023,1,'2013-12-04 08:39:22','apartamentos_instalaciones where id=471','insert'),(1024,1,'2013-12-04 08:39:22','apartamentos_instalaciones where id=472','insert'),(1025,1,'2013-12-04 08:39:22','apartamentos_instalaciones where id=473','insert'),(1026,1,'2013-12-04 08:39:22','apartamentos_instalaciones where id=474','insert'),(1027,1,'2013-12-04 08:40:17','apartamentos_adjuntos where id=40','delete'),(1028,1,'2013-12-04 08:40:17','adjuntos where id=42','delete'),(1029,1,'2013-12-04 08:40:23','adjuntos where id=53','insert'),(1030,1,'2013-12-04 08:40:23','apartamentos_adjuntos where id=51','insert'),(1031,1,'2013-12-04 08:40:23','adjuntos where id=54','insert'),(1032,1,'2013-12-04 08:40:23','apartamentos_adjuntos where id=52','insert'),(1033,1,'2013-12-04 08:40:24','adjuntos where id=55','insert'),(1034,1,'2013-12-04 08:40:24','apartamentos_adjuntos where id=53','insert'),(1035,1,'2013-12-04 08:40:56','apartamentos where id=3','update'),(1036,NULL,'2013-12-04 08:41:13','apartamentos where id=22','update'),(1037,NULL,'2013-12-04 08:42:34','apartamentos where id=3','update'),(1038,1,'2013-12-04 08:43:31','apartamentos_adjuntos where id=41','delete'),(1039,1,'2013-12-04 08:43:31','adjuntos where id=43','delete'),(1040,1,'2013-12-04 08:43:33','apartamentos_adjuntos where id=49','delete'),(1041,1,'2013-12-04 08:43:33','adjuntos where id=51','delete'),(1042,1,'2013-12-04 08:43:37','apartamentos_adjuntos where id=45','delete'),(1043,1,'2013-12-04 08:43:37','adjuntos where id=47','delete'),(1044,1,'2013-12-04 08:43:45','adjuntos where id=56','insert'),(1045,1,'2013-12-04 08:43:45','apartamentos_adjuntos where id=54','insert'),(1046,1,'2013-12-04 08:43:48','adjuntos where id=57','insert'),(1047,1,'2013-12-04 08:43:48','apartamentos_adjuntos where id=55','insert'),(1048,1,'2013-12-04 08:43:48','adjuntos where id=58','insert'),(1049,1,'2013-12-04 08:43:48','apartamentos_adjuntos where id=56','insert'),(1050,1,'2013-12-04 08:43:49','adjuntos where id=59','insert'),(1051,1,'2013-12-04 08:43:49','apartamentos_adjuntos where id=57','insert'),(1052,1,'2013-12-04 08:43:50','adjuntos where id=60','insert'),(1053,1,'2013-12-04 08:43:50','apartamentos_adjuntos where id=58','insert'),(1054,1,'2013-12-04 08:43:51','adjuntos where id=61','insert'),(1055,1,'2013-12-04 08:43:51','apartamentos_adjuntos where id=59','insert'),(1056,1,'2013-12-04 08:43:55','apartamentos_adjuntos where id=56','delete'),(1057,1,'2013-12-04 08:43:55','adjuntos where id=58','delete'),(1058,NULL,'2013-12-04 08:44:54','apartamentos where id=22','update'),(1059,1,'2013-12-04 08:44:57','apartamentos where id=22','update'),(1060,NULL,'2013-12-04 08:46:08','apartamentos where id=3','update'),(1061,NULL,'2013-12-04 08:47:10','apartamentos where id=3','update'),(1062,1,'2013-12-04 08:58:01','apartamentos where id=3','update'),(1063,1,'2013-12-04 09:00:41','apartamentos where id=3','update'),(1064,NULL,'2013-12-04 13:07:05','apartamentos where id=3','update'),(1065,NULL,'2013-12-04 13:13:09','apartamentos where id=3','update'),(1066,NULL,'2013-12-04 14:06:34','apartamentos where id=22','update'),(1067,NULL,'2013-12-04 14:17:45','apartamentos where id=3','update'),(1068,NULL,'2013-12-04 14:20:32','apartamentos where id=3','update'),(1069,NULL,'2013-12-04 14:21:15','apartamentos where id=3','update'),(1070,NULL,'2013-12-04 14:24:44','apartamentos where id=3','update'),(1071,NULL,'2013-12-04 14:46:22','apartamentos where id=3','update'),(1072,NULL,'2013-12-04 15:41:39','apartamentos where id=3','update'),(1073,1,'2013-12-04 15:46:05','apartamentos where id=3','update'),(1074,NULL,'2013-12-04 15:49:28','apartamentos where id=3','update'),(1075,NULL,'2013-12-04 15:49:44','apartamentos where id=3','update'),(1076,1,'2013-12-04 15:49:44','apartamentos where id=22','update'),(1077,1,'2013-12-04 15:50:02','apartamentos where id=22','update'),(1078,1,'2013-12-04 15:50:02','apartamentos where id=22','update'),(1079,1,'2013-12-04 15:50:45','apartamentos where id=22','update'),(1080,NULL,'2013-12-04 15:50:55','apartamentos where id=3','update'),(1081,NULL,'2013-12-04 17:16:39','apartamentos where id=3','update'),(1082,NULL,'2013-12-04 19:23:46','apartamentos where id=22','update'),(1083,NULL,'2013-12-04 19:24:39','apartamentos where id=22','update'),(1084,NULL,'2013-12-04 19:25:14','apartamentos where id=22','update'),(1085,NULL,'2013-12-04 19:31:45','apartamentos where id=22','update'),(1086,NULL,'2013-12-04 19:34:04','apartamentos where id=22','update'),(1087,NULL,'2013-12-04 19:36:37','apartamentos where id=22','update'),(1088,NULL,'2013-12-04 19:37:29','apartamentos where id=22','update'),(1089,NULL,'2013-12-04 19:40:20','apartamentos where id=22','update'),(1090,NULL,'2013-12-04 19:41:37','apartamentos where id=3','update'),(1091,NULL,'2013-12-04 20:44:20','apartamentos where id=3','update'),(1092,NULL,'2013-12-04 20:46:38','apartamentos where id=3','update'),(1093,NULL,'2013-12-04 20:47:58','apartamentos where id=3','update'),(1094,NULL,'2013-12-04 20:48:19','apartamentos where id=3','update'),(1095,NULL,'2013-12-04 20:49:39','apartamentos where id=3','update'),(1096,NULL,'2013-12-04 20:51:18','apartamentos where id=3','update'),(1097,NULL,'2013-12-04 20:52:37','apartamentos where id=3','update'),(1098,NULL,'2013-12-04 20:54:40','apartamentos where id=3','update'),(1099,NULL,'2013-12-04 20:55:51','apartamentos where id=3','update'),(1100,1,'2013-12-04 21:04:07','apartamentos where id=3','update'),(1101,NULL,'2013-12-04 21:04:27','apartamentos where id=3','update'),(1102,1,'2013-12-04 21:05:26','apartamentos where id=3','update'),(1103,NULL,'2013-12-04 21:05:57','apartamentos where id=3','update'),(1104,1,'2013-12-04 21:06:32','apartamentos where id=3','update'),(1105,NULL,'2013-12-04 21:06:50','apartamentos where id=3','update'),(1106,NULL,'2013-12-04 21:07:32','apartamentos where id=3','update'),(1107,1,'2013-12-04 21:07:56','apartamentos where id=3','update'),(1108,NULL,'2013-12-04 21:10:23','apartamentos where id=3','update'),(1109,1,'2013-12-04 21:10:57','apartamentos where id=3','update'),(1110,NULL,'2013-12-04 21:11:22','apartamentos where id=3','update'),(1111,NULL,'2013-12-04 21:13:47','apartamentos where id=3','update'),(1112,1,'2013-12-04 21:13:57','apartamentos where id=3','update'),(1113,1,'2013-12-04 21:14:31','apartamentos where id=3','update'),(1114,1,'2013-12-04 21:14:46','apartamentos where id=3','update'),(1115,NULL,'2013-12-04 21:20:37','apartamentos where id=3','update'),(1116,NULL,'2013-12-04 21:21:47','apartamentos where id=3','update'),(1117,NULL,'2013-12-04 21:22:21','apartamentos where id=3','update'),(1118,NULL,'2013-12-04 21:29:33','apartamentos where id=3','update'),(1119,NULL,'2013-12-04 21:30:13','apartamentos where id=3','update'),(1120,1,'2013-12-04 21:36:59','apartamentos where id=22','update'),(1121,1,'2013-12-04 21:48:44','apartamentos where id=3','update'),(1122,1,'2013-12-04 22:00:40','apartamentos where id=3','update'),(1123,NULL,'2013-12-05 07:28:08','apartamentos where id=3','update'),(1124,NULL,'2013-12-05 07:30:15','apartamentos where id=3','update'),(1125,1,'2013-12-05 07:45:36','apartamentos where id=3','update'),(1126,1,'2013-12-05 07:47:12','apartamentos where id=3','update'),(1127,1,'2013-12-05 08:06:54','apartamentos where id=3','update'),(1128,1,'2013-12-05 08:07:08','apartamentos where id=3','update'),(1129,1,'2013-12-05 08:17:47','apartamentos where id=22','update'),(1130,1,'2013-12-05 08:23:56','apartamentos where id=3','update'),(1131,1,'2013-12-05 08:24:38','apartamentos where id=3','update'),(1132,1,'2013-12-05 08:24:38','apartamentos_instalaciones where id=475','insert'),(1133,1,'2013-12-05 08:24:38','apartamentos_instalaciones where id=476','insert'),(1134,1,'2013-12-05 08:24:38','apartamentos_instalaciones where id=477','insert'),(1135,1,'2013-12-05 08:24:38','apartamentos_instalaciones where id=478','insert'),(1136,1,'2013-12-05 08:24:38','apartamentos_instalaciones where id=479','insert'),(1137,1,'2013-12-05 08:24:38','apartamentos_instalaciones where id=480','insert'),(1138,1,'2013-12-05 08:24:38','apartamentos_instalaciones where id=481','insert'),(1139,1,'2013-12-05 08:24:38','apartamentos_instalaciones where id=482','insert'),(1140,1,'2013-12-05 08:24:38','apartamentos_instalaciones where id=483','insert'),(1141,1,'2013-12-05 08:24:38','apartamentos_instalaciones where id=484','insert'),(1142,1,'2013-12-05 08:24:38','apartamentos_instalaciones where id=485','insert'),(1143,1,'2013-12-05 08:24:38','apartamentos_instalaciones where id=486','insert'),(1144,1,'2013-12-05 08:24:38','apartamentos_instalaciones where id=487','insert'),(1145,1,'2013-12-05 08:24:38','apartamentos_instalaciones where id=488','insert'),(1146,1,'2013-12-05 08:24:38','apartamentos_instalaciones where id=489','insert'),(1147,1,'2013-12-05 08:24:38','apartamentos_instalaciones where id=490','insert'),(1148,1,'2013-12-05 08:24:38','apartamentos_instalaciones where id=491','insert'),(1149,1,'2013-12-05 08:24:38','apartamentos_instalaciones where id=492','insert'),(1150,1,'2013-12-05 08:24:38','apartamentos_instalaciones where id=493','insert'),(1151,1,'2013-12-05 08:24:38','apartamentos_instalaciones where id=494','insert'),(1152,1,'2013-12-05 08:24:38','apartamentos_instalaciones where id=495','insert'),(1153,1,'2013-12-05 08:24:38','apartamentos_instalaciones where id=496','insert'),(1154,1,'2013-12-05 08:24:38','apartamentos_instalaciones where id=497','insert'),(1155,1,'2013-12-05 08:24:38','apartamentos_instalaciones where id=498','insert'),(1156,1,'2013-12-05 08:24:38','apartamentos_instalaciones where id=499','insert'),(1157,1,'2013-12-05 08:24:38','apartamentos_instalaciones where id=500','insert'),(1158,1,'2013-12-05 08:24:38','apartamentos_instalaciones where id=501','insert'),(1159,1,'2013-12-05 08:24:38','apartamentos_instalaciones where id=502','insert'),(1160,1,'2013-12-05 08:24:38','apartamentos_instalaciones where id=503','insert'),(1161,1,'2013-12-05 08:24:38','apartamentos_instalaciones where id=504','insert'),(1162,1,'2013-12-05 08:24:38','apartamentos_instalaciones where id=505','insert'),(1163,1,'2013-12-05 08:24:38','apartamentos_instalaciones where id=506','insert'),(1164,1,'2013-12-05 08:24:38','apartamentos_instalaciones where id=507','insert'),(1165,1,'2013-12-05 08:24:38','apartamentos_instalaciones where id=508','insert'),(1166,1,'2013-12-05 08:24:38','apartamentos_instalaciones where id=509','insert'),(1167,1,'2013-12-05 08:24:38','apartamentos_instalaciones where id=510','insert'),(1168,1,'2013-12-05 08:24:38','apartamentos_instalaciones where id=511','insert'),(1169,1,'2013-12-05 08:24:39','apartamentos_instalaciones where id=512','insert'),(1170,1,'2013-12-05 08:24:39','apartamentos_instalaciones where id=513','insert'),(1171,1,'2013-12-05 08:24:39','apartamentos_instalaciones where id=514','insert'),(1172,1,'2013-12-05 08:24:39','apartamentos_instalaciones where id=515','insert'),(1173,1,'2013-12-05 08:24:39','apartamentos_instalaciones where id=516','insert'),(1174,1,'2013-12-05 08:24:39','apartamentos_instalaciones where id=517','insert'),(1175,1,'2013-12-05 08:24:39','apartamentos_instalaciones where id=518','insert'),(1176,1,'2013-12-05 08:24:39','apartamentos_instalaciones where id=519','insert'),(1177,1,'2013-12-05 08:24:39','apartamentos_instalaciones where id=520','insert'),(1178,1,'2013-12-05 08:24:39','apartamentos_instalaciones where id=521','insert'),(1179,1,'2013-12-05 08:24:39','apartamentos_instalaciones where id=522','insert'),(1180,1,'2013-12-05 08:24:39','apartamentos_instalaciones where id=523','insert'),(1181,1,'2013-12-05 08:24:39','apartamentos where id=3','update'),(1182,1,'2013-12-05 08:24:39','apartamentos_instalaciones where id=524','insert'),(1183,1,'2013-12-05 08:24:39','apartamentos_instalaciones where id=525','insert'),(1184,1,'2013-12-05 08:24:39','apartamentos_instalaciones where id=526','insert'),(1185,1,'2013-12-05 08:24:39','apartamentos_instalaciones where id=527','insert'),(1186,1,'2013-12-05 08:24:39','apartamentos_instalaciones where id=528','insert'),(1187,1,'2013-12-05 08:24:39','apartamentos_instalaciones where id=529','insert'),(1188,1,'2013-12-05 08:24:39','apartamentos_instalaciones where id=530','insert'),(1189,1,'2013-12-05 08:24:39','apartamentos_instalaciones where id=531','insert'),(1190,1,'2013-12-05 08:24:39','apartamentos_instalaciones where id=532','insert'),(1191,1,'2013-12-05 08:24:39','apartamentos_instalaciones where id=533','insert'),(1192,1,'2013-12-05 08:24:39','apartamentos_instalaciones where id=534','insert'),(1193,1,'2013-12-05 08:24:39','apartamentos_instalaciones where id=535','insert'),(1194,1,'2013-12-05 08:24:39','apartamentos_instalaciones where id=536','insert'),(1195,1,'2013-12-05 08:24:39','apartamentos_instalaciones where id=537','insert'),(1196,1,'2013-12-05 08:24:39','apartamentos_instalaciones where id=538','insert'),(1197,1,'2013-12-05 08:24:39','apartamentos_instalaciones where id=539','insert'),(1198,1,'2013-12-05 08:24:39','apartamentos_instalaciones where id=540','insert'),(1199,1,'2013-12-05 08:24:39','apartamentos_instalaciones where id=541','insert'),(1200,1,'2013-12-05 08:24:39','apartamentos_instalaciones where id=542','insert'),(1201,1,'2013-12-05 08:24:39','apartamentos_instalaciones where id=543','insert'),(1202,1,'2013-12-05 08:24:39','apartamentos_instalaciones where id=544','insert'),(1203,1,'2013-12-05 08:24:39','apartamentos_instalaciones where id=545','insert'),(1204,1,'2013-12-05 08:24:39','apartamentos_instalaciones where id=546','insert'),(1205,1,'2013-12-05 08:24:39','apartamentos_instalaciones where id=547','insert'),(1206,1,'2013-12-05 08:24:39','apartamentos_instalaciones where id=548','insert'),(1207,1,'2013-12-05 08:24:39','apartamentos_instalaciones where id=549','insert'),(1208,1,'2013-12-05 08:24:39','apartamentos_instalaciones where id=550','insert'),(1209,1,'2013-12-05 08:24:39','apartamentos_instalaciones where id=551','insert'),(1210,1,'2013-12-05 08:24:39','apartamentos_instalaciones where id=552','insert'),(1211,1,'2013-12-05 08:24:40','apartamentos_instalaciones where id=553','insert'),(1212,1,'2013-12-05 08:24:40','apartamentos_instalaciones where id=554','insert'),(1213,1,'2013-12-05 08:24:40','apartamentos_instalaciones where id=555','insert'),(1214,1,'2013-12-05 08:24:40','apartamentos_instalaciones where id=556','insert'),(1215,1,'2013-12-05 08:24:40','apartamentos_instalaciones where id=557','insert'),(1216,1,'2013-12-05 08:24:40','apartamentos_instalaciones where id=558','insert'),(1217,1,'2013-12-05 08:24:40','apartamentos_instalaciones where id=559','insert'),(1218,1,'2013-12-05 08:24:40','apartamentos_instalaciones where id=560','insert'),(1219,1,'2013-12-05 08:24:40','apartamentos_instalaciones where id=561','insert'),(1220,1,'2013-12-05 08:24:40','apartamentos_instalaciones where id=562','insert'),(1221,1,'2013-12-05 08:24:40','apartamentos_instalaciones where id=563','insert'),(1222,1,'2013-12-05 08:24:40','apartamentos_instalaciones where id=564','insert'),(1223,1,'2013-12-05 08:24:40','apartamentos_instalaciones where id=565','insert'),(1224,1,'2013-12-05 08:24:40','apartamentos_instalaciones where id=566','insert'),(1225,1,'2013-12-05 08:24:40','apartamentos_instalaciones where id=567','insert'),(1226,1,'2013-12-05 08:24:40','apartamentos_instalaciones where id=568','insert'),(1227,1,'2013-12-05 08:24:40','apartamentos_instalaciones where id=569','insert'),(1228,1,'2013-12-05 08:24:40','apartamentos_instalaciones where id=570','insert'),(1229,1,'2013-12-05 08:24:40','apartamentos_instalaciones where id=571','insert'),(1230,1,'2013-12-05 08:24:40','apartamentos_instalaciones where id=572','insert'),(1231,1,'2013-12-05 08:24:40','apartamentos where id=3','update'),(1232,1,'2013-12-05 08:24:40','apartamentos_instalaciones where id=573','insert'),(1233,1,'2013-12-05 08:24:40','apartamentos_instalaciones where id=574','insert'),(1234,1,'2013-12-05 08:24:40','apartamentos_instalaciones where id=575','insert'),(1235,1,'2013-12-05 08:24:40','apartamentos_instalaciones where id=576','insert'),(1236,1,'2013-12-05 08:24:40','apartamentos_instalaciones where id=577','insert'),(1237,1,'2013-12-05 08:24:40','apartamentos_instalaciones where id=578','insert'),(1238,1,'2013-12-05 08:24:40','apartamentos_instalaciones where id=579','insert'),(1239,1,'2013-12-05 08:24:40','apartamentos_instalaciones where id=580','insert'),(1240,1,'2013-12-05 08:24:40','apartamentos_instalaciones where id=581','insert'),(1241,1,'2013-12-05 08:24:40','apartamentos_instalaciones where id=582','insert'),(1242,1,'2013-12-05 08:24:40','apartamentos_instalaciones where id=583','insert'),(1243,1,'2013-12-05 08:24:40','apartamentos_instalaciones where id=584','insert'),(1244,1,'2013-12-05 08:24:41','apartamentos_instalaciones where id=585','insert'),(1245,1,'2013-12-05 08:24:41','apartamentos_instalaciones where id=586','insert'),(1246,1,'2013-12-05 08:24:41','apartamentos_instalaciones where id=587','insert'),(1247,1,'2013-12-05 08:24:41','apartamentos_instalaciones where id=588','insert'),(1248,1,'2013-12-05 08:24:41','apartamentos_instalaciones where id=589','insert'),(1249,1,'2013-12-05 08:24:41','apartamentos_instalaciones where id=590','insert'),(1250,1,'2013-12-05 08:24:41','apartamentos_instalaciones where id=591','insert'),(1251,1,'2013-12-05 08:24:41','apartamentos_instalaciones where id=592','insert'),(1252,1,'2013-12-05 08:24:41','apartamentos_instalaciones where id=593','insert'),(1253,1,'2013-12-05 08:24:41','apartamentos_instalaciones where id=594','insert'),(1254,1,'2013-12-05 08:24:41','apartamentos_instalaciones where id=595','insert'),(1255,1,'2013-12-05 08:24:41','apartamentos_instalaciones where id=596','insert'),(1256,1,'2013-12-05 08:24:41','apartamentos_instalaciones where id=597','insert'),(1257,1,'2013-12-05 08:24:41','apartamentos_instalaciones where id=598','insert'),(1258,1,'2013-12-05 08:24:41','apartamentos_instalaciones where id=599','insert'),(1259,1,'2013-12-05 08:24:41','apartamentos_instalaciones where id=600','insert'),(1260,1,'2013-12-05 08:24:41','apartamentos_instalaciones where id=601','insert'),(1261,1,'2013-12-05 08:24:41','apartamentos_instalaciones where id=602','insert'),(1262,1,'2013-12-05 08:24:41','apartamentos_instalaciones where id=603','insert'),(1263,1,'2013-12-05 08:24:41','apartamentos_instalaciones where id=604','insert'),(1264,1,'2013-12-05 08:24:41','apartamentos_instalaciones where id=605','insert'),(1265,1,'2013-12-05 08:24:41','apartamentos_instalaciones where id=606','insert'),(1266,1,'2013-12-05 08:24:41','apartamentos_instalaciones where id=607','insert'),(1267,1,'2013-12-05 08:24:41','apartamentos_instalaciones where id=608','insert'),(1268,1,'2013-12-05 08:24:41','apartamentos_instalaciones where id=609','insert'),(1269,1,'2013-12-05 08:24:41','apartamentos_instalaciones where id=610','insert'),(1270,1,'2013-12-05 08:24:41','apartamentos_instalaciones where id=611','insert'),(1271,1,'2013-12-05 08:24:41','apartamentos_instalaciones where id=612','insert'),(1272,1,'2013-12-05 08:24:41','apartamentos_instalaciones where id=613','insert'),(1273,1,'2013-12-05 08:24:41','apartamentos_instalaciones where id=614','insert'),(1274,1,'2013-12-05 08:24:41','apartamentos_instalaciones where id=615','insert'),(1275,1,'2013-12-05 08:24:41','apartamentos_instalaciones where id=616','insert'),(1276,1,'2013-12-05 08:24:41','apartamentos_instalaciones where id=617','insert'),(1277,1,'2013-12-05 08:24:41','apartamentos_instalaciones where id=618','insert'),(1278,1,'2013-12-05 08:24:41','apartamentos_instalaciones where id=619','insert'),(1279,1,'2013-12-05 08:24:41','apartamentos_instalaciones where id=620','insert'),(1280,1,'2013-12-05 08:24:41','apartamentos_instalaciones where id=621','insert'),(1281,1,'2013-12-05 08:24:44','apartamentos where id=3','update'),(1282,1,'2013-12-05 08:25:00','apartamentos where id=3','update'),(1283,NULL,'2013-12-05 11:59:52','apartamentos where id=3','update'),(1284,NULL,'2013-12-05 12:47:14','apartamentos where id=3','update'),(1285,NULL,'2013-12-05 14:11:18','apartamentos where id=22','update'),(1286,NULL,'2013-12-05 15:25:03','apartamentos where id=3','update'),(1287,NULL,'2013-12-05 15:25:11','apartamentos where id=3','update'),(1288,NULL,'2013-12-05 15:28:44','apartamentos where id=3','update'),(1289,NULL,'2013-12-05 15:29:30','apartamentos where id=3','update'),(1290,NULL,'2013-12-05 15:33:49','apartamentos where id=3','update'),(1291,NULL,'2013-12-05 15:34:11','apartamentos where id=3','update'),(1292,NULL,'2013-12-05 15:34:50','apartamentos where id=3','update'),(1293,NULL,'2013-12-05 15:35:15','apartamentos where id=3','update'),(1294,NULL,'2013-12-05 15:35:37','apartamentos where id=3','update'),(1295,NULL,'2013-12-05 15:43:05','apartamentos where id=22','update'),(1296,NULL,'2013-12-05 15:51:50','apartamentos where id=3','update'),(1297,NULL,'2013-12-05 15:52:14','apartamentos where id=3','update'),(1298,NULL,'2013-12-05 15:53:09','apartamentos where id=3','update'),(1299,NULL,'2013-12-05 15:54:04','apartamentos where id=3','update'),(1300,NULL,'2013-12-05 15:54:52','apartamentos where id=3','update'),(1301,NULL,'2013-12-05 16:02:46','apartamentos where id=3','update'),(1302,NULL,'2013-12-05 16:03:45','apartamentos where id=3','update'),(1303,NULL,'2013-12-05 16:05:44','apartamentos where id=3','update'),(1304,NULL,'2013-12-05 16:05:48','apartamentos where id=22','update'),(1305,NULL,'2013-12-05 16:06:59','apartamentos where id=22','update'),(1306,NULL,'2013-12-05 16:07:17','apartamentos where id=22','update'),(1307,NULL,'2013-12-05 16:07:28','apartamentos where id=3','update'),(1308,NULL,'2013-12-05 16:09:24','apartamentos where id=3','update'),(1309,NULL,'2013-12-05 16:09:32','apartamentos where id=3','update'),(1310,NULL,'2013-12-05 16:10:15','apartamentos where id=3','update'),(1311,NULL,'2013-12-05 16:12:43','apartamentos where id=3','update'),(1312,1,'2013-12-05 16:16:02','apartamentos where id=3','update'),(1313,1,'2013-12-05 16:20:45','apartamentos where id=22','update'),(1314,1,'2013-12-05 16:24:06','opiniones where id=1','insert'),(1315,1,'2013-12-05 16:24:13','opiniones where id=1','update'),(1316,1,'2013-12-05 16:24:30','apartamentos where id=3','update'),(1317,NULL,'2013-12-05 16:42:23','apartamentos where id=3','update'),(1318,1,'2013-12-05 16:50:14','apartamentos where id=3','update'),(1319,1,'2013-12-05 17:35:42','apartamentos where id=3','update'),(1320,1,'2013-12-05 17:35:42','apartamentos_instalaciones where id=622','insert'),(1321,1,'2013-12-05 17:35:42','apartamentos_instalaciones where id=623','insert'),(1322,1,'2013-12-05 17:35:42','apartamentos_instalaciones where id=624','insert'),(1323,1,'2013-12-05 17:35:42','apartamentos_instalaciones where id=625','insert'),(1324,1,'2013-12-05 17:35:42','apartamentos_instalaciones where id=626','insert'),(1325,1,'2013-12-05 17:35:42','apartamentos_instalaciones where id=627','insert'),(1326,1,'2013-12-05 17:35:42','apartamentos_instalaciones where id=628','insert'),(1327,1,'2013-12-05 17:35:42','apartamentos_instalaciones where id=629','insert'),(1328,1,'2013-12-05 17:35:42','apartamentos_instalaciones where id=630','insert'),(1329,1,'2013-12-05 17:35:43','apartamentos_instalaciones where id=631','insert'),(1330,1,'2013-12-05 17:35:43','apartamentos_instalaciones where id=632','insert'),(1331,1,'2013-12-05 17:35:43','apartamentos_instalaciones where id=633','insert'),(1332,1,'2013-12-05 17:35:43','apartamentos_instalaciones where id=634','insert'),(1333,1,'2013-12-05 17:35:43','apartamentos_instalaciones where id=635','insert'),(1334,1,'2013-12-05 17:35:43','apartamentos_instalaciones where id=636','insert'),(1335,1,'2013-12-05 17:35:43','apartamentos_instalaciones where id=637','insert'),(1336,1,'2013-12-05 17:35:43','apartamentos_instalaciones where id=638','insert'),(1337,1,'2013-12-05 17:35:43','apartamentos_instalaciones where id=639','insert'),(1338,1,'2013-12-05 17:35:43','apartamentos_instalaciones where id=640','insert'),(1339,1,'2013-12-05 17:35:43','apartamentos_instalaciones where id=641','insert'),(1340,1,'2013-12-05 17:35:43','apartamentos_instalaciones where id=642','insert'),(1341,1,'2013-12-05 17:35:43','apartamentos_instalaciones where id=643','insert'),(1342,1,'2013-12-05 17:35:43','apartamentos_instalaciones where id=644','insert'),(1343,1,'2013-12-05 17:35:43','apartamentos_instalaciones where id=645','insert'),(1344,1,'2013-12-05 17:35:43','apartamentos_instalaciones where id=646','insert'),(1345,1,'2013-12-05 17:35:43','apartamentos_instalaciones where id=647','insert'),(1346,1,'2013-12-05 17:35:43','apartamentos_instalaciones where id=648','insert'),(1347,1,'2013-12-05 17:35:43','apartamentos_instalaciones where id=649','insert'),(1348,1,'2013-12-05 17:35:43','apartamentos_instalaciones where id=650','insert'),(1349,1,'2013-12-05 17:35:43','apartamentos_instalaciones where id=651','insert'),(1350,1,'2013-12-05 17:35:43','apartamentos_instalaciones where id=652','insert'),(1351,1,'2013-12-05 17:35:43','apartamentos_instalaciones where id=653','insert'),(1352,1,'2013-12-05 17:35:43','apartamentos_instalaciones where id=654','insert'),(1353,1,'2013-12-05 17:35:43','apartamentos_instalaciones where id=655','insert'),(1354,1,'2013-12-05 17:35:43','apartamentos_instalaciones where id=656','insert'),(1355,1,'2013-12-05 17:35:43','apartamentos_instalaciones where id=657','insert'),(1356,1,'2013-12-05 17:35:43','apartamentos_instalaciones where id=658','insert'),(1357,1,'2013-12-05 17:35:43','apartamentos_instalaciones where id=659','insert'),(1358,1,'2013-12-05 17:35:43','apartamentos_instalaciones where id=660','insert'),(1359,1,'2013-12-05 17:35:43','apartamentos_instalaciones where id=661','insert'),(1360,1,'2013-12-05 17:35:43','apartamentos_instalaciones where id=662','insert'),(1361,1,'2013-12-05 17:35:43','apartamentos_instalaciones where id=663','insert'),(1362,1,'2013-12-05 17:35:43','apartamentos_instalaciones where id=664','insert'),(1363,1,'2013-12-05 17:35:43','apartamentos_instalaciones where id=665','insert'),(1364,1,'2013-12-05 17:35:43','apartamentos_instalaciones where id=666','insert'),(1365,1,'2013-12-05 17:35:43','apartamentos_instalaciones where id=667','insert'),(1366,1,'2013-12-05 17:35:43','apartamentos_instalaciones where id=668','insert'),(1367,1,'2013-12-05 17:35:43','apartamentos_instalaciones where id=669','insert'),(1368,1,'2013-12-05 17:35:43','apartamentos_instalaciones where id=670','insert'),(1369,1,'2013-12-05 17:37:26','apartamentos where id=3','update'),(1370,1,'2013-12-05 17:51:46','apartamentos where id=3','update'),(1371,1,'2013-12-05 18:34:57','apartamentos where id=3','update'),(1372,1,'2013-12-05 18:39:49','apartamentos where id=3','update'),(1373,1,'2013-12-05 18:46:07','apartamentos where id=3','update'),(1374,1,'2013-12-05 18:50:53','apartamentos where id=3','update'),(1375,1,'2013-12-05 18:51:24','apartamentos where id=3','update'),(1376,1,'2013-12-05 19:02:48','apartamentos where id=3','update'),(1377,1,'2013-12-05 19:03:28','apartamentos where id=3','update'),(1378,1,'2013-12-05 19:05:08','apartamentos where id=3','update'),(1379,1,'2013-12-05 19:05:29','apartamentos where id=3','update'),(1380,1,'2013-12-05 19:05:42','apartamentos where id=3','update'),(1381,1,'2013-12-05 19:10:16','apartamentos where id=3','update'),(1382,1,'2013-12-05 19:14:22','apartamentos where id=3','update'),(1383,1,'2013-12-05 19:14:41','apartamentos where id=3','update'),(1384,1,'2013-12-05 19:14:49','apartamentos where id=3','update'),(1385,1,'2013-12-05 19:15:08','apartamentos where id=3','update'),(1386,NULL,'2013-12-05 22:01:21','apartamentos where id=3','update'),(1387,NULL,'2013-12-06 07:41:07','apartamentos where id=3','update'),(1388,NULL,'2013-12-06 17:45:58','apartamentos where id=3','update'),(1389,NULL,'2013-12-06 17:48:21','apartamentos where id=3','update'),(1390,NULL,'2013-12-06 17:48:37','apartamentos where id=22','update'),(1391,NULL,'2013-12-06 17:49:22','apartamentos where id=3','update'),(1392,NULL,'2013-12-06 17:51:54','apartamentos where id=22','update'),(1393,NULL,'2013-12-06 20:28:27','apartamentos where id=3','update'),(1394,NULL,'2013-12-06 20:28:44','apartamentos where id=3','update'),(1395,NULL,'2013-12-06 20:36:38','apartamentos where id=3','update'),(1396,NULL,'2013-12-06 20:37:37','apartamentos where id=3','update'),(1397,NULL,'2013-12-06 20:39:25','apartamentos where id=3','update'),(1398,NULL,'2013-12-06 20:40:15','apartamentos where id=3','update'),(1399,NULL,'2013-12-06 20:41:03','apartamentos where id=3','update'),(1400,NULL,'2013-12-06 21:13:45','apartamentos where id=3','update'),(1401,NULL,'2013-12-07 00:00:45','apartamentos where id=3','update'),(1402,NULL,'2013-12-07 20:21:19','apartamentos where id=3','update'),(1403,NULL,'2013-12-09 08:04:14','apartamentos where id=3','update'),(1404,NULL,'2013-12-09 10:36:52','apartamentos where id=3','update'),(1405,NULL,'2013-12-09 10:39:59','apartamentos where id=22','update'),(1406,NULL,'2013-12-09 16:07:45','apartamentos where id=3','update'),(1407,NULL,'2013-12-09 16:08:54','apartamentos where id=3','update'),(1408,NULL,'2013-12-10 15:18:20','apartamentos where id=3','update'),(1409,NULL,'2013-12-10 15:18:51','apartamentos where id=22','update'),(1410,NULL,'2013-12-10 15:19:33','apartamentos where id=3','update'),(1411,NULL,'2013-12-10 16:39:42','apartamentos where id=3','update'),(1412,NULL,'2013-12-10 19:55:50','apartamentos where id=3','update'),(1413,NULL,'2013-12-11 07:10:15','apartamentos where id=3','update'),(1414,1,'2013-12-15 21:21:06','apartamentos where id=22','update'),(1415,1,'2013-12-15 21:21:06','apartamentos_instalaciones where id=671','insert'),(1416,1,'2013-12-15 21:21:06','apartamentos_instalaciones where id=672','insert'),(1417,1,'2013-12-15 21:21:06','apartamentos_instalaciones where id=673','insert'),(1418,1,'2013-12-15 21:21:06','apartamentos_instalaciones where id=674','insert'),(1419,1,'2013-12-15 21:21:06','apartamentos_instalaciones where id=675','insert'),(1420,1,'2013-12-15 21:21:06','apartamentos_instalaciones where id=676','insert'),(1421,1,'2013-12-15 21:21:06','apartamentos_instalaciones where id=677','insert'),(1422,1,'2013-12-15 21:21:06','apartamentos_instalaciones where id=678','insert'),(1423,1,'2013-12-15 21:21:06','apartamentos_instalaciones where id=679','insert'),(1424,1,'2013-12-15 21:21:06','apartamentos_instalaciones where id=680','insert'),(1425,1,'2013-12-15 21:21:06','apartamentos_instalaciones where id=681','insert'),(1426,1,'2013-12-15 21:21:06','apartamentos_instalaciones where id=682','insert'),(1427,1,'2013-12-15 21:21:37','apartamentos where id=22','update'),(1428,1,'2013-12-15 21:21:37','apartamentos_instalaciones where id=683','insert'),(1429,1,'2013-12-15 21:21:37','apartamentos_instalaciones where id=684','insert'),(1430,1,'2013-12-15 21:21:37','apartamentos_instalaciones where id=685','insert'),(1431,1,'2013-12-15 21:21:37','apartamentos_instalaciones where id=686','insert'),(1432,1,'2013-12-15 21:21:37','apartamentos_instalaciones where id=687','insert'),(1433,1,'2013-12-15 21:21:37','apartamentos_instalaciones where id=688','insert'),(1434,1,'2013-12-15 21:21:37','apartamentos_instalaciones where id=689','insert'),(1435,1,'2013-12-15 21:21:37','apartamentos_instalaciones where id=690','insert'),(1436,1,'2013-12-15 21:21:37','apartamentos_instalaciones where id=691','insert'),(1437,1,'2013-12-15 21:21:37','apartamentos_instalaciones where id=692','insert'),(1438,1,'2013-12-15 21:21:37','apartamentos_instalaciones where id=693','insert'),(1439,1,'2013-12-15 21:21:37','apartamentos_instalaciones where id=694','insert'),(1440,1,'2013-12-15 21:21:46','apartamentos where id=22','update'),(1441,1,'2013-12-16 04:03:36','apartamentos where id=3','update'),(1442,1,'2013-12-16 04:03:36','apartamentos_instalaciones where id=695','insert'),(1443,1,'2013-12-16 04:03:36','apartamentos_instalaciones where id=696','insert'),(1444,1,'2013-12-16 04:03:36','apartamentos_instalaciones where id=697','insert'),(1445,1,'2013-12-16 04:03:36','apartamentos_instalaciones where id=698','insert'),(1446,1,'2013-12-16 04:03:36','apartamentos_instalaciones where id=699','insert'),(1447,1,'2013-12-16 04:03:36','apartamentos_instalaciones where id=700','insert'),(1448,1,'2013-12-16 04:03:36','apartamentos_instalaciones where id=701','insert'),(1449,1,'2013-12-16 04:03:36','apartamentos_instalaciones where id=702','insert'),(1450,1,'2013-12-16 04:03:36','apartamentos_instalaciones where id=703','insert'),(1451,1,'2013-12-16 04:03:36','apartamentos_instalaciones where id=704','insert'),(1452,1,'2013-12-16 04:03:36','apartamentos_instalaciones where id=705','insert'),(1453,1,'2013-12-16 04:03:36','apartamentos_instalaciones where id=706','insert'),(1454,1,'2013-12-16 04:03:36','apartamentos_instalaciones where id=707','insert'),(1455,1,'2013-12-16 04:03:36','apartamentos_instalaciones where id=708','insert'),(1456,1,'2013-12-16 04:03:36','apartamentos_instalaciones where id=709','insert'),(1457,1,'2013-12-16 04:03:36','apartamentos_instalaciones where id=710','insert'),(1458,1,'2013-12-16 04:03:36','apartamentos_instalaciones where id=711','insert'),(1459,1,'2013-12-16 04:03:36','apartamentos_instalaciones where id=712','insert'),(1460,1,'2013-12-16 04:03:36','apartamentos_instalaciones where id=713','insert'),(1461,1,'2013-12-16 04:03:36','apartamentos_instalaciones where id=714','insert'),(1462,1,'2013-12-16 04:03:36','apartamentos_instalaciones where id=715','insert'),(1463,1,'2013-12-16 04:03:36','apartamentos_instalaciones where id=716','insert'),(1464,1,'2013-12-16 04:03:36','apartamentos_instalaciones where id=717','insert'),(1465,1,'2013-12-16 04:03:37','apartamentos_instalaciones where id=718','insert'),(1466,1,'2013-12-16 04:03:37','apartamentos_instalaciones where id=719','insert'),(1467,1,'2013-12-16 04:03:37','apartamentos_instalaciones where id=720','insert'),(1468,1,'2013-12-16 04:03:37','apartamentos_instalaciones where id=721','insert'),(1469,1,'2013-12-16 04:03:37','apartamentos_instalaciones where id=722','insert'),(1470,1,'2013-12-16 04:03:37','apartamentos_instalaciones where id=723','insert'),(1471,1,'2013-12-16 04:03:37','apartamentos_instalaciones where id=724','insert'),(1472,1,'2013-12-16 04:03:37','apartamentos_instalaciones where id=725','insert'),(1473,1,'2013-12-16 04:03:37','apartamentos_instalaciones where id=726','insert'),(1474,1,'2013-12-16 04:03:37','apartamentos_instalaciones where id=727','insert'),(1475,1,'2013-12-16 04:03:37','apartamentos_instalaciones where id=728','insert'),(1476,1,'2013-12-16 04:03:37','apartamentos_instalaciones where id=729','insert'),(1477,1,'2013-12-16 04:03:37','apartamentos_instalaciones where id=730','insert'),(1478,1,'2013-12-16 04:03:37','apartamentos_instalaciones where id=731','insert'),(1479,1,'2013-12-16 04:03:37','apartamentos_instalaciones where id=732','insert'),(1480,1,'2013-12-16 04:03:37','apartamentos_instalaciones where id=733','insert'),(1481,1,'2013-12-16 04:03:37','apartamentos_instalaciones where id=734','insert'),(1482,1,'2013-12-16 04:03:37','apartamentos_instalaciones where id=735','insert'),(1483,1,'2013-12-16 04:03:37','apartamentos_instalaciones where id=736','insert'),(1484,1,'2013-12-16 04:03:37','apartamentos_instalaciones where id=737','insert'),(1485,1,'2013-12-16 04:03:37','apartamentos_instalaciones where id=738','insert'),(1486,1,'2013-12-16 04:03:37','apartamentos_instalaciones where id=739','insert'),(1487,1,'2013-12-16 04:03:37','apartamentos_instalaciones where id=740','insert'),(1488,1,'2013-12-16 04:03:37','apartamentos_instalaciones where id=741','insert'),(1489,1,'2013-12-16 04:03:37','apartamentos_instalaciones where id=742','insert'),(1490,1,'2013-12-16 04:03:37','apartamentos_instalaciones where id=743','insert'),(1491,1,'2013-12-16 04:03:37','apartamentos where id=3','update'),(1492,1,'2013-12-16 04:03:37','apartamentos_instalaciones where id=744','insert'),(1493,1,'2013-12-16 04:03:37','apartamentos_instalaciones where id=745','insert'),(1494,1,'2013-12-16 04:03:37','apartamentos_instalaciones where id=746','insert'),(1495,1,'2013-12-16 04:03:37','apartamentos_instalaciones where id=747','insert'),(1496,1,'2013-12-16 04:03:37','apartamentos_instalaciones where id=748','insert'),(1497,1,'2013-12-16 04:03:38','apartamentos_instalaciones where id=749','insert'),(1498,1,'2013-12-16 04:03:38','apartamentos_instalaciones where id=750','insert'),(1499,1,'2013-12-16 04:03:38','apartamentos_instalaciones where id=751','insert'),(1500,1,'2013-12-16 04:03:38','apartamentos_instalaciones where id=752','insert'),(1501,1,'2013-12-16 04:03:38','apartamentos_instalaciones where id=753','insert'),(1502,1,'2013-12-16 04:03:38','apartamentos_instalaciones where id=754','insert'),(1503,1,'2013-12-16 04:03:38','apartamentos_instalaciones where id=755','insert'),(1504,1,'2013-12-16 04:03:38','apartamentos_instalaciones where id=756','insert'),(1505,1,'2013-12-16 04:03:38','apartamentos_instalaciones where id=757','insert'),(1506,1,'2013-12-16 04:03:38','apartamentos_instalaciones where id=758','insert'),(1507,1,'2013-12-16 04:03:38','apartamentos_instalaciones where id=759','insert'),(1508,1,'2013-12-16 04:03:38','apartamentos_instalaciones where id=760','insert'),(1509,1,'2013-12-16 04:03:38','apartamentos_instalaciones where id=761','insert'),(1510,1,'2013-12-16 04:03:38','apartamentos_instalaciones where id=762','insert'),(1511,1,'2013-12-16 04:03:38','apartamentos_instalaciones where id=763','insert'),(1512,1,'2013-12-16 04:03:38','apartamentos_instalaciones where id=764','insert'),(1513,1,'2013-12-16 04:03:38','apartamentos_instalaciones where id=765','insert'),(1514,1,'2013-12-16 04:03:38','apartamentos_instalaciones where id=766','insert'),(1515,1,'2013-12-16 04:03:38','apartamentos_instalaciones where id=767','insert'),(1516,1,'2013-12-16 04:03:38','apartamentos_instalaciones where id=768','insert'),(1517,1,'2013-12-16 04:03:38','apartamentos_instalaciones where id=769','insert'),(1518,1,'2013-12-16 04:03:38','apartamentos_instalaciones where id=770','insert'),(1519,1,'2013-12-16 04:03:38','apartamentos_instalaciones where id=771','insert'),(1520,1,'2013-12-16 04:03:38','apartamentos_instalaciones where id=772','insert'),(1521,1,'2013-12-16 04:03:38','apartamentos_instalaciones where id=773','insert'),(1522,1,'2013-12-16 04:03:38','apartamentos_instalaciones where id=774','insert'),(1523,1,'2013-12-16 04:03:38','apartamentos_instalaciones where id=775','insert'),(1524,1,'2013-12-16 04:03:38','apartamentos_instalaciones where id=776','insert'),(1525,1,'2013-12-16 04:03:38','apartamentos_instalaciones where id=777','insert'),(1526,1,'2013-12-16 04:03:38','apartamentos_instalaciones where id=778','insert'),(1527,1,'2013-12-16 04:03:38','apartamentos_instalaciones where id=779','insert'),(1528,1,'2013-12-16 04:03:38','apartamentos_instalaciones where id=780','insert'),(1529,1,'2013-12-16 04:03:38','apartamentos_instalaciones where id=781','insert'),(1530,1,'2013-12-16 04:03:38','apartamentos_instalaciones where id=782','insert'),(1531,1,'2013-12-16 04:03:38','apartamentos_instalaciones where id=783','insert'),(1532,1,'2013-12-16 04:03:38','apartamentos_instalaciones where id=784','insert'),(1533,1,'2013-12-16 04:03:38','apartamentos_instalaciones where id=785','insert'),(1534,1,'2013-12-16 04:03:38','apartamentos_instalaciones where id=786','insert'),(1535,1,'2013-12-16 04:03:38','apartamentos_instalaciones where id=787','insert'),(1536,1,'2013-12-16 04:03:38','apartamentos_instalaciones where id=788','insert'),(1537,1,'2013-12-16 04:03:38','apartamentos_instalaciones where id=789','insert'),(1538,1,'2013-12-16 04:03:38','apartamentos_instalaciones where id=790','insert'),(1539,1,'2013-12-16 04:03:38','apartamentos_instalaciones where id=791','insert'),(1540,1,'2013-12-16 04:03:38','apartamentos_instalaciones where id=792','insert'),(1541,1,'2013-12-16 04:08:17','adjuntos where id=62','insert'),(1542,1,'2013-12-16 04:08:21','adjuntos where id=63','insert'),(1543,1,'2013-12-16 04:14:57','adjuntos where id=64','insert'),(1544,1,'2013-12-16 05:00:07','adjuntos where id=65','insert'),(1545,1,'2013-12-16 05:01:44','adjuntos where id=66','insert'),(1546,1,'2013-12-16 05:18:32','apartamentos where id=22','update'),(1547,1,'2013-12-16 05:18:33','apartamentos_instalaciones where id=793','insert'),(1548,1,'2013-12-16 05:18:33','apartamentos_instalaciones where id=794','insert'),(1549,1,'2013-12-16 05:18:33','apartamentos_instalaciones where id=795','insert'),(1550,1,'2013-12-16 05:18:33','apartamentos_instalaciones where id=796','insert'),(1551,1,'2013-12-16 05:18:33','apartamentos_instalaciones where id=797','insert'),(1552,1,'2013-12-16 05:18:33','apartamentos_instalaciones where id=798','insert'),(1553,1,'2013-12-16 05:18:33','apartamentos_instalaciones where id=799','insert'),(1554,1,'2013-12-16 05:18:33','apartamentos_instalaciones where id=800','insert'),(1555,1,'2013-12-16 05:18:33','apartamentos_instalaciones where id=801','insert'),(1556,1,'2013-12-16 05:18:33','apartamentos_instalaciones where id=802','insert'),(1557,1,'2013-12-16 05:18:33','apartamentos_instalaciones where id=803','insert'),(1558,1,'2013-12-16 05:18:33','apartamentos_instalaciones where id=804','insert'),(1559,1,'2013-12-16 05:19:40','apartamentos where id=22','update'),(1560,1,'2013-12-16 05:19:40','apartamentos_instalaciones where id=805','insert'),(1561,1,'2013-12-16 05:19:40','apartamentos_instalaciones where id=806','insert'),(1562,1,'2013-12-16 05:19:40','apartamentos_instalaciones where id=807','insert'),(1563,1,'2013-12-16 05:19:40','apartamentos_instalaciones where id=808','insert'),(1564,1,'2013-12-16 05:19:40','apartamentos_instalaciones where id=809','insert'),(1565,1,'2013-12-16 05:19:40','apartamentos_instalaciones where id=810','insert'),(1566,1,'2013-12-16 05:19:40','apartamentos_instalaciones where id=811','insert'),(1567,1,'2013-12-16 05:19:40','apartamentos_instalaciones where id=812','insert'),(1568,1,'2013-12-16 05:19:40','apartamentos_instalaciones where id=813','insert'),(1569,1,'2013-12-16 05:19:40','apartamentos_instalaciones where id=814','insert'),(1570,1,'2013-12-16 05:19:40','apartamentos_instalaciones where id=815','insert'),(1571,1,'2013-12-16 05:19:41','apartamentos_instalaciones where id=816','insert'),(1572,1,'2013-12-16 05:20:17','apartamentos where id=22','update'),(1573,1,'2013-12-16 05:20:17','apartamentos_instalaciones where id=817','insert'),(1574,1,'2013-12-16 05:20:17','apartamentos_instalaciones where id=818','insert'),(1575,1,'2013-12-16 05:20:17','apartamentos_instalaciones where id=819','insert'),(1576,1,'2013-12-16 05:20:17','apartamentos_instalaciones where id=820','insert'),(1577,1,'2013-12-16 05:20:18','apartamentos_instalaciones where id=821','insert'),(1578,1,'2013-12-16 05:20:18','apartamentos_instalaciones where id=822','insert'),(1579,1,'2013-12-16 05:20:18','apartamentos_instalaciones where id=823','insert'),(1580,1,'2013-12-16 05:20:18','apartamentos_instalaciones where id=824','insert'),(1581,1,'2013-12-16 05:20:18','apartamentos_instalaciones where id=825','insert'),(1582,1,'2013-12-16 05:20:18','apartamentos_instalaciones where id=826','insert'),(1583,1,'2013-12-16 05:20:18','apartamentos_instalaciones where id=827','insert'),(1584,1,'2013-12-16 05:20:18','apartamentos_instalaciones where id=828','insert'),(1585,1,'2013-12-16 05:35:59','apartamentos where id=22','update'),(1586,1,'2013-12-16 05:35:59','apartamentos_instalaciones where id=829','insert'),(1587,1,'2013-12-16 05:35:59','apartamentos_instalaciones where id=830','insert'),(1588,1,'2013-12-16 05:35:59','apartamentos_instalaciones where id=831','insert'),(1589,1,'2013-12-16 05:35:59','apartamentos_instalaciones where id=832','insert'),(1590,1,'2013-12-16 05:35:59','apartamentos_instalaciones where id=833','insert'),(1591,1,'2013-12-16 05:35:59','apartamentos_instalaciones where id=834','insert'),(1592,1,'2013-12-16 05:35:59','apartamentos_instalaciones where id=835','insert'),(1593,1,'2013-12-16 05:36:00','apartamentos_instalaciones where id=836','insert'),(1594,1,'2013-12-16 05:36:00','apartamentos_instalaciones where id=837','insert'),(1595,1,'2013-12-16 05:36:00','apartamentos_instalaciones where id=838','insert'),(1596,1,'2013-12-16 05:36:00','apartamentos_instalaciones where id=839','insert'),(1597,1,'2013-12-16 05:36:00','apartamentos_instalaciones where id=840','insert'),(1598,1,'2013-12-16 05:42:20','apartamentos where id=22','update'),(1599,1,'2013-12-16 05:42:20','apartamentos_instalaciones where id=841','insert'),(1600,1,'2013-12-16 05:42:20','apartamentos_instalaciones where id=842','insert'),(1601,1,'2013-12-16 05:42:20','apartamentos_instalaciones where id=843','insert'),(1602,1,'2013-12-16 05:42:20','apartamentos_instalaciones where id=844','insert'),(1603,1,'2013-12-16 05:42:20','apartamentos_instalaciones where id=845','insert'),(1604,1,'2013-12-16 05:42:20','apartamentos_instalaciones where id=846','insert'),(1605,1,'2013-12-16 05:42:20','apartamentos_instalaciones where id=847','insert'),(1606,1,'2013-12-16 05:42:20','apartamentos_instalaciones where id=848','insert'),(1607,1,'2013-12-16 05:42:20','apartamentos_instalaciones where id=849','insert'),(1608,1,'2013-12-16 05:42:20','apartamentos_instalaciones where id=850','insert'),(1609,1,'2013-12-16 05:42:20','apartamentos_instalaciones where id=851','insert'),(1610,1,'2013-12-16 05:42:20','apartamentos_instalaciones where id=852','insert'),(1611,1,'2013-12-16 05:48:31','apartamentos where id=22','update'),(1612,1,'2013-12-16 05:48:32','apartamentos_instalaciones where id=853','insert'),(1613,1,'2013-12-16 05:48:32','apartamentos_instalaciones where id=854','insert'),(1614,1,'2013-12-16 05:48:32','apartamentos_instalaciones where id=855','insert'),(1615,1,'2013-12-16 05:48:32','apartamentos_instalaciones where id=856','insert'),(1616,1,'2013-12-16 05:48:32','apartamentos_instalaciones where id=857','insert'),(1617,1,'2013-12-16 05:48:32','apartamentos_instalaciones where id=858','insert'),(1618,1,'2013-12-16 05:48:32','apartamentos_instalaciones where id=859','insert'),(1619,1,'2013-12-16 05:48:32','apartamentos_instalaciones where id=860','insert'),(1620,1,'2013-12-16 05:48:32','apartamentos_instalaciones where id=861','insert'),(1621,1,'2013-12-16 05:48:32','apartamentos_instalaciones where id=862','insert'),(1622,1,'2013-12-16 05:48:32','apartamentos_instalaciones where id=863','insert'),(1623,1,'2013-12-16 05:48:32','apartamentos_instalaciones where id=864','insert'),(1624,1,'2013-12-16 06:02:27','apartamentos where id=3','update'),(1625,1,'2013-12-16 06:03:57','apartamentos where id=3','update'),(1626,1,'2013-12-16 06:05:37','apartamentos where id=3','update'),(1627,NULL,'2013-12-16 09:02:40','apartamentos where id=3','update'),(1628,NULL,'2013-12-16 09:08:33','apartamentos where id=3','update'),(1629,NULL,'2013-12-16 09:34:27','apartamentos where id=3','update'),(1630,NULL,'2013-12-16 09:47:17','apartamentos where id=3','update'),(1631,NULL,'2013-12-16 14:48:20','apartamentos where id=3','update'),(1632,NULL,'2013-12-16 15:14:49','apartamentos where id=3','update'),(1633,NULL,'2013-12-16 17:00:24','apartamentos where id=3','update'),(1634,1,'2013-12-16 18:07:05','apartamentos where id=3','update'),(1635,1,'2013-12-16 18:09:08','apartamentos where id=23','insert'),(1636,1,'2013-12-16 18:09:08','apartamentos_instalaciones where id=865','insert'),(1637,1,'2013-12-16 18:09:08','apartamentos_instalaciones where id=866','insert'),(1638,1,'2013-12-16 18:09:08','apartamentos_instalaciones where id=867','insert'),(1639,1,'2013-12-16 18:09:08','apartamentos_instalaciones where id=868','insert'),(1640,1,'2013-12-16 18:09:08','apartamentos_instalaciones where id=869','insert'),(1641,1,'2013-12-16 18:09:08','apartamentos_instalaciones where id=870','insert'),(1642,1,'2013-12-16 18:09:08','apartamentos_instalaciones where id=871','insert'),(1643,1,'2013-12-16 18:09:48','adjuntos where id=67','insert'),(1644,1,'2013-12-16 18:09:48','apartamentos_adjuntos where id=60','insert'),(1645,1,'2013-12-16 18:09:51','apartamentos_adjuntos where id=60','delete'),(1646,1,'2013-12-16 18:09:51','adjuntos where id=67','delete'),(1647,1,'2013-12-16 18:09:58','adjuntos where id=68','insert'),(1648,1,'2013-12-16 18:09:58','apartamentos_adjuntos where id=61','insert'),(1649,NULL,'2013-12-16 18:19:30','apartamentos where id=3','update'),(1650,NULL,'2014-01-01 15:39:13','apartamentos where id=3','update'),(1651,NULL,'2014-01-01 16:51:52','apartamentos where id=3','update');
/*!40000 ALTER TABLE `usuarios_registros` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-01-01 11:04:05
