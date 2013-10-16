-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 12-06-2013 a las 21:38:45
-- Versión del servidor: 5.1.44
-- Versión de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `clickandbooking`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adjuntos`
--

CREATE TABLE IF NOT EXISTS `adjuntos` (
  `id_adjunto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(95) DEFAULT NULL,
  `ruta` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `ext` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_adjunto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `adjuntos`
--

INSERT INTO `adjuntos` (`id_adjunto`, `nombre`, `ruta`, `tipo`, `ext`) VALUES
(1, 'Primera foto', '/recursos/apartamentos/1.jpg', 'apartamento', 'jpg'),
(2, 'Alguna cosa', '/recursos/apartamentos/2.jpg', 'apartamento', 'jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alojamientos`
--

CREATE TABLE IF NOT EXISTS `alojamientos` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `alojamientos`
--

INSERT INTO `alojamientos` (`id_alojamiento`, `nombre`, `codigo`, `pax_minimo`, `pax_maximo`, `pax_bebe_maximo`, `pax_ninios_minimo`, `pax_ninios_maximo`, `pax_adultos_maximo`, `pax_adultos_minimo`) VALUES
(1, 'Habitación privada', 'est', 2, 10, '1', '0', '2', '10', '1'),
(2, 'Habitación compartida', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Casa/apto. entero', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apartamentos`
--

CREATE TABLE IF NOT EXISTS `apartamentos` (
  `id_apartamento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(300) DEFAULT NULL,
  `id_apartamentos_tipo` int(11) NOT NULL,
  `id_direccion` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
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
  `id_contrato` int(11) NOT NULL,
  `tarifa_base` double DEFAULT NULL,
  `tarifa_semana` double DEFAULT NULL,
  `tarifa_mes` varchar(45) DEFAULT NULL,
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
  PRIMARY KEY (`id_apartamento`),
  KEY `fk_apartamentos_apartamentos_tipos1_idx` (`id_apartamentos_tipo`),
  KEY `fk_apartamentos_direcciones1_idx` (`id_direccion`),
  KEY `fk_apartamentos_empresas1_idx` (`id_empresa`),
  KEY `fk_apartamentos_monedas1_idx` (`id_moneda`),
  KEY `fk_apartamentos_idiomas1_idx` (`id_idioma`),
  KEY `fk_apartamentos_usuarios1_idx` (`id_usuario`),
  KEY `fk_apartamentos_contratos1_idx` (`id_contrato`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `apartamentos`
--

INSERT INTO `apartamentos` (`id_apartamento`, `nombre`, `id_apartamentos_tipo`, `id_direccion`, `id_empresa`, `id_moneda`, `horario_entrada`, `horario_salida`, `descripcion_corta`, `descripcion_larga`, `id_idioma`, `descripcion_servicios`, `descripcion_condiciones`, `tiempo_creacion`, `ultima_modificacion`, `estatus`, `id_usuario`, `id_contrato`, `tarifa_base`, `tarifa_semana`, `tarifa_mes`, `estadia_maxima`, `estadia_minima`, `huesped_adicional_apartir`, `huesped_adicional_costo`, `costo_limpieza`, `deposito_seguridad`, `precio_fin_semana`, `normas`, `tamanio`, `capacidad_personas`, `habitaciones`, `camas`, `tipo_cama`, `banio`, `mascotas`, `manual`) VALUES
(1, 'Este es un super depa', 1, 1, 1, 2, NULL, NULL, 'Esta es una descripción corta', 'Esta es una descripción larga', 1, 'Descripción de servicios', 'Descripción de condiciones', '2013-06-12 21:38:26', '2013-05-30 02:43:00', 'activo', 1, 1, 20, 1300, '5000', 30, 2, 4, 20, 10, 10, 25, 'Estas son las normas de la casa', 125, 5, 2, 3, 'Cama', 2, 1, 'Este es el manual de la casa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apartamentos_adjuntos`
--

CREATE TABLE IF NOT EXISTS `apartamentos_adjuntos` (
  `id_apartamento` int(11) NOT NULL,
  `id_adjunto` int(11) NOT NULL,
  `id_apartamento_adjunto` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_apartamento_adjunto`),
  KEY `fk_apartamentos_has_adjuntos_adjuntos1_idx` (`id_adjunto`),
  KEY `fk_apartamentos_has_adjuntos_apartamentos1_idx` (`id_apartamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `apartamentos_adjuntos`
--

INSERT INTO `apartamentos_adjuntos` (`id_apartamento`, `id_adjunto`, `id_apartamento_adjunto`) VALUES
(1, 1, 1),
(1, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apartamentos_alojamientos`
--

CREATE TABLE IF NOT EXISTS `apartamentos_alojamientos` (
  `id_apartamento` int(11) NOT NULL,
  `id_alojamiento` int(11) NOT NULL,
  `id_apartamento_alojamiento` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_apartamento_alojamiento`),
  KEY `fk_apartamentos_has_alojamientos_alojamientos1_idx` (`id_alojamiento`),
  KEY `fk_apartamentos_has_alojamientos_apartamentos1_idx` (`id_apartamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `apartamentos_alojamientos`
--

INSERT INTO `apartamentos_alojamientos` (`id_apartamento`, `id_alojamiento`, `id_apartamento_alojamiento`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apartamentos_instalaciones`
--

CREATE TABLE IF NOT EXISTS `apartamentos_instalaciones` (
  `id_apartamento` int(11) NOT NULL,
  `id_instalacion` int(11) NOT NULL,
  `id_apartamento_instalacion` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_apartamento_instalacion`),
  KEY `fk_apartamentos_has_instalaciones_instalaciones1_idx` (`id_instalacion`),
  KEY `fk_apartamentos_has_instalaciones_apartamentos1_idx` (`id_apartamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `apartamentos_instalaciones`
--

INSERT INTO `apartamentos_instalaciones` (`id_apartamento`, `id_instalacion`, `id_apartamento_instalacion`) VALUES
(1, 105, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apartamentos_lugares_cercanos`
--

CREATE TABLE IF NOT EXISTS `apartamentos_lugares_cercanos` (
  `id_apartamento` int(11) NOT NULL,
  `id_lugar_cercano` int(11) NOT NULL,
  `id_apartamento_lugar_cercano` int(11) NOT NULL AUTO_INCREMENT,
  `valor` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_apartamento_lugar_cercano`),
  KEY `fk_apartamentos_has_lugares_cercanos_lugares_cercanos1_idx` (`id_lugar_cercano`),
  KEY `fk_apartamentos_has_lugares_cercanos_apartamentos1_idx` (`id_apartamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `apartamentos_lugares_cercanos`
--

INSERT INTO `apartamentos_lugares_cercanos` (`id_apartamento`, `id_lugar_cercano`, `id_apartamento_lugar_cercano`, `valor`) VALUES
(1, 1, 1, '12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apartamentos_pagos_tipos`
--

CREATE TABLE IF NOT EXISTS `apartamentos_pagos_tipos` (
  `id_apartamento` int(11) NOT NULL,
  `id_pago_tipo` int(11) NOT NULL,
  `id_apartamento_pago_tipo` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_apartamento_pago_tipo`),
  KEY `fk_apartamentos_has_pagos_tipos_pagos_tipos1_idx` (`id_pago_tipo`),
  KEY `fk_apartamentos_has_pagos_tipos_apartamentos1_idx` (`id_apartamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `apartamentos_pagos_tipos`
--

INSERT INTO `apartamentos_pagos_tipos` (`id_apartamento`, `id_pago_tipo`, `id_apartamento_pago_tipo`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apartamentos_tipos`
--

CREATE TABLE IF NOT EXISTS `apartamentos_tipos` (
  `id_apartamentos_tipo` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_apartamentos_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `apartamentos_tipos`
--

INSERT INTO `apartamentos_tipos` (`id_apartamentos_tipo`, `nombre`) VALUES
(1, 'Apartamento'),
(2, 'Casa'),
(3, 'Bed & Breakfast'),
(4, 'Loft'),
(5, 'Cabaña'),
(6, 'Villa'),
(7, 'Dormitorio compartido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

CREATE TABLE IF NOT EXISTS `ciudades` (
  `id_ciudad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `id_provincia` int(11) NOT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_ciudad`),
  KEY `fk_ciudades_provincias1_idx` (`id_provincia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `ciudades`
--

INSERT INTO `ciudades` (`id_ciudad`, `nombre`, `id_provincia`, `codigo`) VALUES
(1, 'Cambrils', 1, 'cmb'),
(2, 'La pineda', 1, 'lap'),
(3, 'Salou', 1, NULL),
(4, 'Tarragona', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `condiciones_compra`
--

CREATE TABLE IF NOT EXISTS `condiciones_compra` (
  `id_condicion_compra` int(11) NOT NULL AUTO_INCREMENT,
  `id_apartamento` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_condicion_compra`),
  KEY `fk_condiciones_compra_apartamentos1_idx` (`id_apartamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `condiciones_compra`
--

INSERT INTO `condiciones_compra` (`id_condicion_compra`, `id_apartamento`, `nombre`, `descripcion`) VALUES
(1, 1, 'Esta es una condición de compra', 'Esta es la descripción de una condición de co');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratos`
--

CREATE TABLE IF NOT EXISTS `contratos` (
  `id_contrato` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `tiempo_creacion` timestamp NULL DEFAULT NULL,
  `ultima_modificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `porcentaje` double DEFAULT NULL,
  PRIMARY KEY (`id_contrato`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `contratos`
--

INSERT INTO `contratos` (`id_contrato`, `nombre`, `tiempo_creacion`, `ultima_modificacion`, `fecha_inicio`, `fecha_fin`, `precio`, `porcentaje`) VALUES
(1, 'contrato comisionable 2012', '2013-05-30 02:40:37', '2013-05-30 02:40:37', '2013-05-29 22:40:25', '2014-05-29 22:40:28', 123, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

CREATE TABLE IF NOT EXISTS `cuentas` (
  `id_cuenta` int(11) NOT NULL AUTO_INCREMENT,
  `iban` varchar(50) DEFAULT NULL,
  `swif` varchar(50) DEFAULT NULL,
  `id_moneda` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `titular` varchar(60) DEFAULT NULL,
  `cvv` varchar(4) DEFAULT NULL,
  `c_d` int(11) DEFAULT NULL,
  `c_a` int(11) DEFAULT NULL,
  `numero` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_cuenta`),
  KEY `fk_cuentas_monedas1_idx` (`id_moneda`),
  KEY `fk_cuentas_empresas1_idx` (`id_empresa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `cuentas`
--

INSERT INTO `cuentas` (`id_cuenta`, `iban`, `swif`, `id_moneda`, `id_empresa`, `titular`, `cvv`, `c_d`, `c_a`, `numero`) VALUES
(1, '364823648726374', '87236487236487236487', 1, 1, NULL, NULL, NULL, NULL, NULL),
(2, '123123', '123123123', 1, 2, NULL, NULL, NULL, NULL, NULL),
(3, '7777777777', '21ewqsd', 1, 3, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones`
--

CREATE TABLE IF NOT EXISTS `direcciones` (
  `id_direccion` int(11) NOT NULL AUTO_INCREMENT,
  `calle` varchar(65) DEFAULT NULL,
  `numero` varchar(45) DEFAULT NULL,
  `provincia` varchar(45) DEFAULT NULL,
  `codigo_postal` varchar(45) DEFAULT NULL,
  `id_pais` int(11) NOT NULL,
  `lat` double DEFAULT NULL,
  `lon` double DEFAULT NULL,
  `id_provincia` int(11) DEFAULT NULL,
  `referencia` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_direccion`),
  KEY `fk_direcciones_paises_idx` (`id_pais`),
  KEY `fk_direcciones_provincias1_idx` (`id_provincia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `direcciones`
--

INSERT INTO `direcciones` (`id_direccion`, `calle`, `numero`, `provincia`, `codigo_postal`, `id_pais`, `lat`, `lon`, `id_provincia`, `referencia`) VALUES
(1, 'Esta es una calle', '23D', 'España', '77500', 1, 40.423048425987, -3.65435172343746, NULL, NULL),
(2, '123123', '123', '12321', '12', 2, 40.4113554, -3.7028359, NULL, NULL),
(3, 'Calle2 ', '411', 'Cantabria', '#777777777', 1, 40.4113554, -3.7028359, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disponbilidades`
--

CREATE TABLE IF NOT EXISTS `disponbilidades` (
  `id_disponibilidad` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_final` datetime DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `precio_fin_semana` double DEFAULT NULL,
  `estatus` varchar(45) DEFAULT NULL,
  `id_apartamento` int(11) NOT NULL,
  `anotacion` text,
  PRIMARY KEY (`id_disponibilidad`),
  KEY `fk_disponbilidades_apartamentos1_idx` (`id_apartamento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `disponbilidades`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE IF NOT EXISTS `empresas` (
  `id_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido_paterno` varchar(45) DEFAULT NULL,
  `apellido_materno` varchar(45) DEFAULT NULL,
  `nombre_fiscal` varchar(65) DEFAULT NULL,
  `cif` text,
  `id_direccion` int(11) NOT NULL,
  `tiempo_creacion` timestamp NULL DEFAULT NULL,
  `ultima_modificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_empresa`),
  KEY `fk_empresa_direcciones1_idx` (`id_direccion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id_empresa`, `nombre`, `apellido_paterno`, `apellido_materno`, `nombre_fiscal`, `cif`, `id_direccion`, `tiempo_creacion`, `ultima_modificacion`, `email`) VALUES
(1, 'Rubén', 'Velázquez', 'Calva', 'Listico''s Software', '2176381726387126387', 1, '2013-05-30 02:35:19', '2013-05-30 02:35:19', NULL),
(2, 'Ruben', 'Velazquez', 'Calva', 'dsfiuhsdiufhsdiuf hsiud f', '123123', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(3, 'Ruben', 'uhiu', 'iuh', 'Hotel Fuerte Ventura Libre', '11111111111111', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `huespedes`
--

CREATE TABLE IF NOT EXISTS `huespedes` (
  `id_huesped` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_direccion` int(11) NOT NULL,
  PRIMARY KEY (`id_huesped`),
  KEY `fk_huesped_usuarios1_idx` (`id_usuario`),
  KEY `fk_huespedes_direcciones1_idx` (`id_direccion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `huespedes`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `huespedes_cuentas`
--

CREATE TABLE IF NOT EXISTS `huespedes_cuentas` (
  `huespedes_id_huesped` int(11) NOT NULL,
  `cuentas_id_cuenta` int(11) NOT NULL,
  `id_huesped_cuenta` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_huesped_cuenta`),
  KEY `fk_huespedes_has_cuentas_cuentas1_idx` (`cuentas_id_cuenta`),
  KEY `fk_huespedes_has_cuentas_huespedes1_idx` (`huespedes_id_huesped`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `huespedes_cuentas`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idiomas`
--

CREATE TABLE IF NOT EXISTS `idiomas` (
  `id_idioma` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_idioma`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `idiomas`
--

INSERT INTO `idiomas` (`id_idioma`, `nombre`) VALUES
(1, 'Español');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instalaciones`
--

CREATE TABLE IF NOT EXISTS `instalaciones` (
  `id_instalacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `id_instalacion_categoria` int(11) NOT NULL,
  PRIMARY KEY (`id_instalacion`),
  KEY `fk_instalaciones_instalaciones_categoria1_idx` (`id_instalacion_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=226 ;

--
-- Volcar la base de datos para la tabla `instalaciones`
--

INSERT INTO `instalaciones` (`id_instalacion`, `nombre`, `id_instalacion_categoria`) VALUES
(105, 'Aire acondicionado', 1),
(106, 'Suelo de moqueta', 1),
(107, 'Chimenea', 1),
(108, 'Plancha para ropa', 1),
(109, 'Entrada privada', 1),
(110, 'Insonorización', 1),
(111, 'Lavadora', 1),
(112, 'Piscina privada', 1),
(113, 'Vestidor', 1),
(114, 'Equipo de planchado', 1),
(115, 'Caja fuerte', 1),
(116, 'Zona de estar', 1),
(117, 'Suelo de madera', 1),
(118, 'Secadora', 1),
(131, 'Camas extra largas', 1),
(132, 'Calefacción', 1),
(133, 'Bañera de hidromasaje', 1),
(134, 'Sofá', 1),
(135, 'Suelo de baldosa', 1),
(136, 'Escritorio', 1),
(137, 'Armario', 1),
(138, 'Ventilador', 1),
(139, 'Habitaciones comunicadas', 1),
(140, 'Mosquitera', 1),
(141, 'Sofá cama', 1),
(142, 'Plancha para pantalones', 1),
(143, 'Bañera', 2),
(144, 'Baño', 2),
(145, 'Bañera de hidromasaje', 2),
(146, 'Ducha', 2),
(147, 'Bidé', 2),
(148, 'Artículos de aseo gratuitos', 2),
(149, 'Baño compartido', 2),
(150, 'Zapatillas', 2),
(151, 'Bañera o ducha', 2),
(152, 'Aseo adicional', 2),
(153, 'Aseo compartido', 2),
(154, 'Aseo', 2),
(155, 'Albornoz', 2),
(156, 'Secador de pelo', 2),
(157, 'Sauna', 2),
(158, 'Ordenador', 3),
(159, 'Videoconsola -  PS2', 3),
(160, 'TV por cable', 3),
(161, 'Soporte para iPod', 3),
(162, 'Radio', 3),
(163, 'Video', 3),
(164, 'iPad', 3),
(165, 'Videoconsola - PS3', 3),
(166, 'Reproductor de CD', 3),
(167, 'Caja fuerte con capacidad para ordenador port', 3),
(168, 'TV vía satélite', 3),
(169, 'Videojuegos', 3),
(170, 'Videoconsola', 3),
(171, 'Videoconsola - Nintendo Wii', 3),
(172, 'Reproductor de DVD', 3),
(173, 'TV de pantalla plana/de plasma/LCD', 3),
(174, 'Teléfono', 3),
(175, 'Videoconsola - Xbox 360', 3),
(176, 'Ordenador portátil', 3),
(177, 'Fax', 3),
(178, 'TV de pago', 3),
(179, 'TV', 3),
(180, 'Ordenador', 3),
(181, 'Videoconsola -  PS2', 3),
(182, 'TV por cable', 3),
(183, 'Soporte para iPod', 3),
(184, 'Radio', 3),
(185, 'Video', 3),
(186, 'iPad', 3),
(187, 'Videoconsola - PS3', 3),
(188, 'Reproductor de CD', 3),
(189, 'Caja fuerte', 3),
(190, 'TV vía satélite', 3),
(191, 'Videojuegos', 3),
(192, 'Videoconsola', 3),
(193, 'Videoconsola - Nintendo Wii', 3),
(194, 'Reproductor de DVD', 3),
(195, 'TV de pantalla plana/de plasma/LCD', 3),
(196, 'Teléfono', 3),
(197, 'Videoconsola - Xbox 360', 3),
(198, 'Ordenador portátil', 3),
(199, 'Fax', 3),
(200, 'TV de pago', 3),
(201, 'TV', 3),
(202, 'Zona de comedor', 4),
(203, 'Barbacoa', 4),
(204, 'Cocina', 4),
(205, 'Frigorífico', 4),
(206, 'Horno', 4),
(207, 'Lava-vajillas', 4),
(208, 'Zona de cocina', 4),
(209, 'Tetera - Cafetera', 4),
(210, 'Fogones', 4),
(211, 'Hervidor eléctrico', 4),
(212, 'Utensilios de cocina', 4),
(213, 'Tostadora', 4),
(214, 'Minibar', 4),
(215, 'Microondas', 4),
(216, 'Toallas - sábanas con suplemento', 5),
(217, 'Reloj despertador', 5),
(218, 'Balcón', 6),
(219, 'Vistas al lago', 6),
(220, 'Patio', 6),
(221, 'Vistas al jardín', 6),
(222, 'Vistas a la piscina', 6),
(223, 'Vistas al mar', 6),
(224, 'Vistas a la montaña', 6),
(225, 'Vistas a un lugar de interés', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instalaciones_categoria`
--

CREATE TABLE IF NOT EXISTS `instalaciones_categoria` (
  `id_instalacion_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_instalacion_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcar la base de datos para la tabla `instalaciones_categoria`
--

INSERT INTO `instalaciones_categoria` (`id_instalacion_categoria`, `nombre`) VALUES
(1, 'Complementos de la habitación'),
(2, 'Cuarto de baño'),
(3, 'Medios de comunicación'),
(4, 'Comida y bebida'),
(5, 'Servicios adicionales'),
(6, 'Exterior / Vistas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugares_cercanos`
--

CREATE TABLE IF NOT EXISTS `lugares_cercanos` (
  `id_lugar_cercano` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `medida` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_lugar_cercano`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `lugares_cercanos`
--

INSERT INTO `lugares_cercanos` (`id_lugar_cercano`, `nombre`, `medida`, `tipo`) VALUES
(1, 'Playa', 'KM', 'global'),
(2, 'Centro', 'KM', 'global'),
(3, 'Aeropuerto', 'KM', 'global'),
(4, 'Transportes públicos', 'KM', 'global');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monedas`
--

CREATE TABLE IF NOT EXISTS `monedas` (
  `id_moneda` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `simbolo` varchar(45) DEFAULT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `tasa_cambio` double DEFAULT NULL,
  PRIMARY KEY (`id_moneda`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `monedas`
--

INSERT INTO `monedas` (`id_moneda`, `nombre`, `simbolo`, `codigo`, `tasa_cambio`) VALUES
(1, 'Euro', '€', 'EUR', 1),
(2, 'Dolar', '$', 'USD', 0.772439364);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opiniones`
--

CREATE TABLE IF NOT EXISTS `opiniones` (
  `id_opinion` int(11) NOT NULL AUTO_INCREMENT,
  `opinion` text,
  `puntuacion` double DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT NULL,
  `ultima_actualizacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_apartamento` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_opinion`),
  KEY `fk_opiniones_apartamentos1_idx` (`id_apartamento`),
  KEY `fk_opiniones_usuarios1_idx` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `opiniones`
--

INSERT INTO `opiniones` (`id_opinion`, `opinion`, `puntuacion`, `fecha_creacion`, `ultima_actualizacion`, `id_apartamento`, `id_usuario`) VALUES
(1, 'Este es un excelente lugar! Lo recomiendo 100%.', 10, '2013-06-07 04:00:00', '2013-06-06 12:17:49', 1, 1),
(2, 'Muy mal lugar', 4, '2013-06-05 04:00:00', '2013-06-06 12:17:49', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos_tipos`
--

CREATE TABLE IF NOT EXISTS `pagos_tipos` (
  `id_pago_tipo` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_pago_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `pagos_tipos`
--

INSERT INTO `pagos_tipos` (`id_pago_tipo`, `nombre`) VALUES
(0, 'Paypal'),
(1, 'Master Card'),
(2, 'American Express'),
(3, 'Dinner'),
(4, 'Visa'),
(5, 'Paypal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE IF NOT EXISTS `paises` (
  `id_pais` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` int(11) DEFAULT NULL,
  `nombre_completo` varchar(255) DEFAULT NULL,
  `iso3` varchar(3) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `numero` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id_pais`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `paises`
--

INSERT INTO `paises` (`id_pais`, `codigo`, `nombre_completo`, `iso3`, `nombre`, `numero`) VALUES
(1, 724, 'España', 'ESP', 'ES', 724),
(2, 36, 'Australia', 'AUS', 'AU', 36),
(3, 484, 'México', 'MEX', 'MX', 484),
(4, 276, 'Alemania', 'DEU', 'DE', 276),
(5, 643, 'Russia', 'RUS', 'RU', 643);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE IF NOT EXISTS `provincias` (
  `id_provincia` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(105) DEFAULT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `id_pais` int(11) NOT NULL,
  PRIMARY KEY (`id_provincia`),
  KEY `fk_provincias_paises1_idx` (`id_pais`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`id_provincia`, `nombre`, `codigo`, `id_pais`) VALUES
(1, 'Tarragona', 'tr', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservaciones`
--

CREATE TABLE IF NOT EXISTS `reservaciones` (
  `id_reservacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_huesped` int(11) NOT NULL,
  `tiempoCreacion` timestamp NULL DEFAULT NULL,
  `ultimaModificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_apartamento` int(11) NOT NULL,
  `fecha_entrada` datetime DEFAULT NULL,
  `fecha_salida` datetime DEFAULT NULL,
  `huespedes` int(11) DEFAULT NULL,
  `estatus` varchar(45) DEFAULT NULL,
  `id_cuenta` int(11) NOT NULL,
  PRIMARY KEY (`id_reservacion`),
  KEY `fk_reservaciones_huespedes1_idx` (`id_huesped`),
  KEY `fk_reservaciones_apartamentos1_idx` (`id_apartamento`),
  KEY `fk_reservaciones_cuentas1_idx` (`id_cuenta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `reservaciones`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subscripciones`
--

CREATE TABLE IF NOT EXISTS `subscripciones` (
  `id_subscripcion` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) DEFAULT NULL,
  `estatus` varchar(45) DEFAULT NULL,
  `tiempo_creacion` timestamp NULL DEFAULT NULL,
  `ultima_modificacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_subscripcion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `subscripciones`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
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
  PRIMARY KEY (`id_usuario`),
  KEY `fk_usuarios_usuarios_grupos1_idx` (`id_usuario_grupo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `email`, `password`, `tiempo_creacion`, `ultima_modificacion`, `id_usuario_grupo`, `estatus`, `telefono`, `apellido_materno`, `apellido_paterno`) VALUES
(1, 'Rubén', 'admin', 'admin', '2013-05-30 02:27:11', '2013-05-30 02:27:11', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_grupos`
--

CREATE TABLE IF NOT EXISTS `usuarios_grupos` (
  `id_usuario_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_usuario_grupo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `usuarios_grupos`
--

INSERT INTO `usuarios_grupos` (`id_usuario_grupo`, `nombre`) VALUES
(1, 'admin'),
(2, 'user');

--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `apartamentos`
--
ALTER TABLE `apartamentos`
  ADD CONSTRAINT `fk_apartamentos_apartamentos_tipos1` FOREIGN KEY (`id_apartamentos_tipo`) REFERENCES `apartamentos_tipos` (`id_apartamentos_tipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_apartamentos_direcciones1` FOREIGN KEY (`id_direccion`) REFERENCES `direcciones` (`id_direccion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_apartamentos_empresas1` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id_empresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_apartamentos_monedas1` FOREIGN KEY (`id_moneda`) REFERENCES `monedas` (`id_moneda`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_apartamentos_idiomas1` FOREIGN KEY (`id_idioma`) REFERENCES `idiomas` (`id_idioma`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_apartamentos_usuarios1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_apartamentos_contratos1` FOREIGN KEY (`id_contrato`) REFERENCES `contratos` (`id_contrato`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `apartamentos_adjuntos`
--
ALTER TABLE `apartamentos_adjuntos`
  ADD CONSTRAINT `fk_apartamentos_has_adjuntos_apartamentos1` FOREIGN KEY (`id_apartamento`) REFERENCES `apartamentos` (`id_apartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_apartamentos_has_adjuntos_adjuntos1` FOREIGN KEY (`id_adjunto`) REFERENCES `adjuntos` (`id_adjunto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `apartamentos_alojamientos`
--
ALTER TABLE `apartamentos_alojamientos`
  ADD CONSTRAINT `fk_apartamentos_has_alojamientos_apartamentos1` FOREIGN KEY (`id_apartamento`) REFERENCES `apartamentos` (`id_apartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_apartamentos_has_alojamientos_alojamientos1` FOREIGN KEY (`id_alojamiento`) REFERENCES `alojamientos` (`id_alojamiento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `apartamentos_instalaciones`
--
ALTER TABLE `apartamentos_instalaciones`
  ADD CONSTRAINT `fk_apartamentos_has_instalaciones_apartamentos1` FOREIGN KEY (`id_apartamento`) REFERENCES `apartamentos` (`id_apartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_apartamentos_has_instalaciones_instalaciones1` FOREIGN KEY (`id_instalacion`) REFERENCES `instalaciones` (`id_instalacion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `apartamentos_lugares_cercanos`
--
ALTER TABLE `apartamentos_lugares_cercanos`
  ADD CONSTRAINT `fk_apartamentos_has_lugares_cercanos_apartamentos1` FOREIGN KEY (`id_apartamento`) REFERENCES `apartamentos` (`id_apartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_apartamentos_has_lugares_cercanos_lugares_cercanos1` FOREIGN KEY (`id_lugar_cercano`) REFERENCES `lugares_cercanos` (`id_lugar_cercano`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `apartamentos_pagos_tipos`
--
ALTER TABLE `apartamentos_pagos_tipos`
  ADD CONSTRAINT `fk_apartamentos_has_pagos_tipos_apartamentos1` FOREIGN KEY (`id_apartamento`) REFERENCES `apartamentos` (`id_apartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_apartamentos_has_pagos_tipos_pagos_tipos1` FOREIGN KEY (`id_pago_tipo`) REFERENCES `pagos_tipos` (`id_pago_tipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD CONSTRAINT `fk_ciudades_provincias1` FOREIGN KEY (`id_provincia`) REFERENCES `provincias` (`id_provincia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `condiciones_compra`
--
ALTER TABLE `condiciones_compra`
  ADD CONSTRAINT `fk_condiciones_compra_apartamentos1` FOREIGN KEY (`id_apartamento`) REFERENCES `apartamentos` (`id_apartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD CONSTRAINT `fk_cuentas_monedas1` FOREIGN KEY (`id_moneda`) REFERENCES `monedas` (`id_moneda`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cuentas_empresas1` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id_empresa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD CONSTRAINT `fk_direcciones_paises` FOREIGN KEY (`id_pais`) REFERENCES `paises` (`id_pais`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_direcciones_provincias1` FOREIGN KEY (`id_provincia`) REFERENCES `provincias` (`id_provincia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `disponbilidades`
--
ALTER TABLE `disponbilidades`
  ADD CONSTRAINT `fk_disponbilidades_apartamentos1` FOREIGN KEY (`id_apartamento`) REFERENCES `apartamentos` (`id_apartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD CONSTRAINT `fk_empresa_direcciones1` FOREIGN KEY (`id_direccion`) REFERENCES `direcciones` (`id_direccion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `huespedes`
--
ALTER TABLE `huespedes`
  ADD CONSTRAINT `fk_huesped_usuarios1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_huespedes_direcciones1` FOREIGN KEY (`id_direccion`) REFERENCES `direcciones` (`id_direccion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `huespedes_cuentas`
--
ALTER TABLE `huespedes_cuentas`
  ADD CONSTRAINT `fk_huespedes_has_cuentas_huespedes1` FOREIGN KEY (`huespedes_id_huesped`) REFERENCES `huespedes` (`id_huesped`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_huespedes_has_cuentas_cuentas1` FOREIGN KEY (`cuentas_id_cuenta`) REFERENCES `cuentas` (`id_cuenta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `instalaciones`
--
ALTER TABLE `instalaciones`
  ADD CONSTRAINT `fk_instalaciones_instalaciones_categoria1` FOREIGN KEY (`id_instalacion_categoria`) REFERENCES `instalaciones_categoria` (`id_instalacion_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `opiniones`
--
ALTER TABLE `opiniones`
  ADD CONSTRAINT `fk_opiniones_apartamentos1` FOREIGN KEY (`id_apartamento`) REFERENCES `apartamentos` (`id_apartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_opiniones_usuarios1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD CONSTRAINT `fk_provincias_paises1` FOREIGN KEY (`id_pais`) REFERENCES `paises` (`id_pais`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  ADD CONSTRAINT `fk_reservaciones_huespedes1` FOREIGN KEY (`id_huesped`) REFERENCES `huespedes` (`id_huesped`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reservaciones_apartamentos1` FOREIGN KEY (`id_apartamento`) REFERENCES `apartamentos` (`id_apartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reservaciones_cuentas1` FOREIGN KEY (`id_cuenta`) REFERENCES `cuentas` (`id_cuenta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_usuarios_grupos1` FOREIGN KEY (`id_usuario_grupo`) REFERENCES `usuarios_grupos` (`id_usuario_grupo`) ON DELETE NO ACTION ON UPDATE NO ACTION;
