-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-09-2013 a las 07:01:28
-- Versión del servidor: 5.5.32-0ubuntu0.13.04.1
-- Versión de PHP: 5.4.9-4ubuntu2.2

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `clickandbooking`
--

--
-- Volcado de datos para la tabla `adjuntos`
--

INSERT INTO `adjuntos` (`id_adjunto`, `nombre`, `ruta`, `tipo`, `ext`) VALUES
(2, '1.jpg', '/recursos/apartamentos/78679f50e0d0afefed44c1455ab83152.jpg', 'apartamento', 'jpg'),
(3, '2.jpg', '/recursos/apartamentos/1cc95c4913f9b764a453afdf6526a29e.jpg', 'apartamento', 'jpg'),
(4, '3.jpg', '/recursos/apartamentos/9c73d53f71e0ef19abb5f54e38d07ae1.jpg', 'apartamento', 'jpg'),
(5, '9Z4Y6377.jpg', '/recursos/apartamentos/b65abd8f9f42c4d6f01e59c96ce0bbf2.jpg', 'apartamento', 'jpg'),
(6, '9Z4Y6379.jpg', '/recursos/apartamentos/c11abd59043bcc1d5d95c93493c91010.jpg', 'apartamento', 'jpg'),
(7, '9Z4Y6409.jpg', '/recursos/apartamentos/8f6cb95f8a6d81ecd7a26d8c46ac5cfd.jpg', 'apartamento', 'jpg');

--
-- Volcado de datos para la tabla `alojamientos`
--

INSERT INTO `alojamientos` (`id_alojamiento`, `nombre`, `codigo`, `pax_minimo`, `pax_maximo`, `pax_bebe_maximo`, `pax_ninios_minimo`, `pax_ninios_maximo`, `pax_adultos_maximo`, `pax_adultos_minimo`) VALUES
(1, 'Habitación privada', 'est', 2, 10, '1', '0', '2', '10', '1'),
(2, 'Habitación compartida', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Casa/apto. entero', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Volcado de datos para la tabla `apartamentos`
--

INSERT INTO `apartamentos` (`id_apartamento`, `id_empresa_contrato`, `nombre`, `id_apartamentos_tipo`, `id_direccion`, `id_moneda`, `horario_entrada`, `horario_salida`, `descripcion_corta`, `descripcion_larga`, `id_idioma`, `descripcion_servicios`, `descripcion_condiciones`, `tiempo_creacion`, `ultima_modificacion`, `estatus`, `id_usuario`, `tarifa_base`, `tarifa_semana`, `tarifa_mes`, `estadia_maxima`, `estadia_minima`, `huesped_adicional_apartir`, `huesped_adicional_costo`, `costo_limpieza`, `deposito_seguridad`, `precio_fin_semana`, `normas`, `tamanio`, `capacidad_personas`, `habitaciones`, `camas`, `tipo_cama`, `banio`, `mascotas`, `manual`, `cantidad`, `codigo`, `id_politica_cancelacion`, `id_apartamento_descripcion`) VALUES
(2, 1, 'Apartamento de prueba', 4, 4, 1, '15:00:00', '12:00:00', '', 'Esta es la descripción del apartamento de prueba', 1, '', '', '2013-08-23 05:37:37', '2013-08-23 05:39:02', '', 1, 300, 0, 0, 7, 1, 0, 0, 0, 0, 0, 'Normas de la casa', 100, 4, 2, 4, '', 1.5, 1, '123', NULL, '', NULL, NULL),
(3, 2, 'LAS DUNAS', 4, 5, 1, '15:00:00', '12:00:00', '', ' Los Apartamentos LAS DUNAS cuentan con 2 o 3 dormitorios, conexión Wi-Fi gratuita y terraza privada. Además, incluyen una cocina totalmente equipada y una zona de estar con un cómodo sofá cama y TV de pantalla plana. Y parking gratuito.\r\n\r\nLa Villa de Cambrils a tan sólo 5 min. en coche, les depara un privilegiado clima, con playas de reconocido prestigio. Su puerto pesquero hace que la gastronomía sea un referente en la cocina marinera. Dispone de una amplia oferta de ocio y cultura. Situado a 3 kms de Salou, 5 km. de Port Aventura el más importante parque temático del pais, a 20kms de la Ciudad de Tarragona conocida por sus restos arqueológicos y Monumento de la Humanidad, hacen del Complejo LAS DUNAS un referente vacacional de prestigio.', 1, '', '', '2013-08-23 08:58:00', '2013-08-26 10:45:16', '', 1, 0, 0, 0, 7, 1, 0, 0, 0, 0, 0, 'a', 70, 6, 2, 4, '', 2, 1, 'a', NULL, '', NULL, NULL);

--
-- Volcado de datos para la tabla `apartamentos_adjuntos`
--

INSERT INTO `apartamentos_adjuntos` (`id_apartamento`, `id_adjunto`, `id_apartamento_adjunto`) VALUES
(2, 2, 1),
(2, 3, 2),
(2, 4, 3),
(3, 5, 4),
(3, 6, 5),
(3, 7, 6);

--
-- Volcado de datos para la tabla `apartamentos_alojamientos`
--

INSERT INTO `apartamentos_alojamientos` (`id_apartamento`, `id_alojamiento`, `id_apartamento_alojamiento`) VALUES
(2, 1, 2),
(3, 1, 3);

--
-- Volcado de datos para la tabla `apartamentos_instalaciones`
--

INSERT INTO `apartamentos_instalaciones` (`id_apartamento`, `id_instalacion`, `id_apartamento_instalacion`) VALUES
(2, 105, 2),
(2, 106, 3),
(3, 105, 4),
(3, 111, 5),
(3, 112, 6),
(3, 114, 7),
(3, 132, 8),
(3, 141, 9),
(3, 146, 10),
(3, 154, 11),
(3, 190, 12),
(3, 195, 13),
(3, 205, 14),
(3, 206, 15),
(3, 207, 16),
(3, 208, 17),
(3, 209, 18),
(3, 211, 19),
(3, 212, 20),
(3, 213, 21),
(3, 215, 22),
(3, 217, 23),
(3, 234, 24),
(3, 235, 25),
(3, 222, 26);

--
-- Volcado de datos para la tabla `apartamentos_pagos_tipos`
--

INSERT INTO `apartamentos_pagos_tipos` (`id_apartamento`, `id_pago_tipo`, `id_apartamento_pago_tipo`) VALUES
(3, 1, 2),
(3, 2, 3),
(3, 3, 4),
(3, 4, 5),
(3, 5, 6);

--
-- Volcado de datos para la tabla `apartamentos_tipos`
--

INSERT INTO `apartamentos_tipos` (`id_apartamentos_tipo`, `nombre`) VALUES
(1, 'Estudio'),
(2, 'Adosado'),
(3, 'Chalet individual'),
(4, 'Apartamento');

--
-- Volcado de datos para la tabla `articulos_tipos`
--

INSERT INTO `articulos_tipos` (`id_articulo_tipo`, `nombre`) VALUES
(1, 'Objetos');

--
-- Volcado de datos para la tabla `ciudades`
--

INSERT INTO `ciudades` (`id_ciudad`, `nombre`, `id_provincia`, `codigo`) VALUES
(1, 'Cambrils', 1, 'cmb'),
(2, 'La pineda', 1, 'lap'),
(3, 'Salou', 1, NULL),
(4, 'Tarragona', 1, NULL);

--
-- Volcado de datos para la tabla `contratos`
--

INSERT INTO `contratos` (`id_contrato`, `nombre`, `tiempo_creacion`, `ultima_modificacion`, `precio`, `porcentaje`, `descripcion`) VALUES
(1, 'Comisionable', '2013-07-03 22:00:00', '2013-07-29 19:13:48', 20, 30, 'Este es un contrato comisionable'),
(2, 'Garantizado', '2013-07-04 23:54:27', '2013-07-04 23:54:41', 400, 0, 'Este es un contrato garantizado');

--
-- Volcado de datos para la tabla `cuentas`
--

INSERT INTO `cuentas` (`id_cuenta`, `iban`, `swif`, `id_moneda`, `titular`, `cvv`, `c_d`, `c_a`, `numero`) VALUES
(1, '12312312312', '123123213', 1, '1', '1', 1, 1, '1'),
(2, '000', '000', 1, '1', '1', 1, 1, '1');

--
-- Volcado de datos para la tabla `direcciones`
--

INSERT INTO `direcciones` (`id_direccion`, `calle`, `numero`, `provincia`, `codigo_postal`, `id_pais`, `lat`, `lon`, `id_provincia`, `referencia`) VALUES
(1, '1231', '1231', '', '12313', 1, 40.4113554, -3.7028359, 1, ''),
(2, '', '', 'Calle Lavapiés, 9, 28012 Madrid, España', '77500', 1, 40.4113554, -3.7028359, 1, 'Por algún lado...'),
(3, '', '', 'Calle Lavapiés, 9, 28012 Madrid, España', '', 1, 40.4113554, -3.7028359, 1, '123'),
(4, '', '', 'Calle Lavapiés, 9, 28012 Madrid, España', '', 1, 40.4113554, -3.7028359, 1, '123'),
(5, '', '977368810', 'Carrer Sant Jaume, 16, Cambrils, Espanya', '43850', 1, 40.4113554, -3.7028359, 1, 'a'),
(6, 'joan bautista plana', '21', '', '43005', 1, 40.4113554, -3.7028359, 1, '');

--
-- Volcado de datos para la tabla `disponibilidades`
--

INSERT INTO `disponibilidades` (`id_disponibilidad`, `fecha_inicio`, `fecha_final`, `precio`, `precio_fin_semana`, `estatus`, `id_apartamento`, `anotacion`) VALUES
(1, '2013-08-24 00:00:00', '2013-08-24 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(2, '2013-08-25 00:00:00', '2013-08-25 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(3, '2013-08-26 00:00:00', '2013-08-26 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(4, '2013-08-27 00:00:00', '2013-08-27 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(5, '2013-08-28 00:00:00', '2013-08-28 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(6, '2013-08-29 00:00:00', '2013-08-29 00:00:00', 0, 0, 'no disponible', 2, 'Tarifa'),
(7, '2013-08-30 00:00:00', '2013-08-30 00:00:00', 0, 0, 'no disponible', 2, 'Tarifa'),
(8, '2013-08-22 00:00:00', '2013-08-22 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(9, '2013-08-23 00:00:00', '2013-08-23 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(10, '2013-08-31 00:00:00', '2013-08-31 00:00:00', 0, 0, 'no disponible', 2, 'Tarifa'),
(11, '2013-09-01 00:00:00', '2013-09-01 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(12, '2013-09-02 00:00:00', '2013-09-02 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(13, '2013-09-03 00:00:00', '2013-09-03 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(14, '2013-09-04 00:00:00', '2013-09-04 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(15, '2013-09-05 00:00:00', '2013-09-05 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(16, '2013-09-06 00:00:00', '2013-09-06 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(17, '2013-09-07 00:00:00', '2013-09-07 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(18, '2013-09-08 00:00:00', '2013-09-08 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(19, '2013-09-09 00:00:00', '2013-09-09 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(20, '2013-09-10 00:00:00', '2013-09-10 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(21, '2013-09-11 00:00:00', '2013-09-11 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(22, '2013-09-12 00:00:00', '2013-09-12 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(23, '2013-09-13 00:00:00', '2013-09-13 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(24, '2013-09-14 00:00:00', '2013-09-14 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(25, '2013-09-15 00:00:00', '2013-09-15 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(26, '2013-09-16 00:00:00', '2013-09-16 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(27, '2013-09-17 00:00:00', '2013-09-17 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(28, '2013-09-18 00:00:00', '2013-09-18 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(29, '2013-09-19 00:00:00', '2013-09-19 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(30, '2013-09-20 00:00:00', '2013-09-20 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(31, '2013-09-21 00:00:00', '2013-09-21 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(32, '2013-09-22 00:00:00', '2013-09-22 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(33, '2013-09-23 00:00:00', '2013-09-23 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(34, '2013-09-24 00:00:00', '2013-09-24 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(35, '2013-09-25 00:00:00', '2013-09-25 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(36, '2013-09-26 00:00:00', '2013-09-26 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(37, '2013-09-27 00:00:00', '2013-09-27 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(38, '2013-09-28 00:00:00', '2013-09-28 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(39, '2013-09-29 00:00:00', '2013-09-29 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(40, '2013-09-30 00:00:00', '2013-09-30 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(41, '2013-10-01 00:00:00', '2013-10-01 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(42, '2013-10-02 00:00:00', '2013-10-02 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(43, '2013-10-03 00:00:00', '2013-10-03 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(44, '2013-10-04 00:00:00', '2013-10-04 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(45, '2013-10-05 00:00:00', '2013-10-05 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(46, '2013-10-06 00:00:00', '2013-10-06 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(47, '2013-10-07 00:00:00', '2013-10-07 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(48, '2013-10-08 00:00:00', '2013-10-08 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(49, '2013-10-09 00:00:00', '2013-10-09 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(50, '2013-10-10 00:00:00', '2013-10-10 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(51, '2013-10-11 00:00:00', '2013-10-11 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(52, '2013-10-12 00:00:00', '2013-10-12 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(53, '2013-10-13 00:00:00', '2013-10-13 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(54, '2013-10-14 00:00:00', '2013-10-14 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(55, '2013-10-15 00:00:00', '2013-10-15 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(56, '2013-10-16 00:00:00', '2013-10-16 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(57, '2013-10-17 00:00:00', '2013-10-17 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(58, '2013-10-18 00:00:00', '2013-10-18 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(59, '2013-10-19 00:00:00', '2013-10-19 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(60, '2013-10-20 00:00:00', '2013-10-20 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(61, '2013-10-21 00:00:00', '2013-10-21 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(62, '2013-10-22 00:00:00', '2013-10-22 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(63, '2013-10-23 00:00:00', '2013-10-23 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(64, '2013-10-24 00:00:00', '2013-10-24 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(65, '2013-10-25 00:00:00', '2013-10-25 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(66, '2013-10-26 00:00:00', '2013-10-26 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(67, '2013-10-27 00:00:00', '2013-10-27 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(68, '2013-10-28 00:00:00', '2013-10-28 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(69, '2013-10-29 00:00:00', '2013-10-29 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(70, '2013-10-30 00:00:00', '2013-10-30 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(71, '2013-10-31 00:00:00', '2013-10-31 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(72, '2013-11-01 00:00:00', '2013-11-01 00:00:00', 123, 0, 'disponible', 2, 'Tarifa'),
(73, '2013-08-27 00:00:00', '2013-08-27 00:00:00', 35, 0, 'disponible', 3, 'Tarifa'),
(74, '2013-08-28 00:00:00', '2013-08-28 00:00:00', 35, 0, 'disponible', 3, 'Tarifa'),
(75, '2013-08-29 00:00:00', '2013-08-29 00:00:00', 35, 0, 'disponible', 3, 'Tarifa'),
(76, '2013-08-30 00:00:00', '2013-08-30 00:00:00', 35, 0, 'disponible', 3, 'Tarifa'),
(77, '2013-08-31 00:00:00', '2013-08-31 00:00:00', 35, 0, 'disponible', 3, 'Tarifa');

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id_empresa`, `nombre`, `apellido_paterno`, `apellido_materno`, `nombre_fiscal`, `cif`, `id_direccion`, `tiempo_creacion`, `ultima_modificacion`, `email`, `email_facturacion`, `telefono`, `telefono_alterno`) VALUES
(1, 'Mauro', 'Barbarroja', '-', 'Clickandbooking', '123123131', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'admin@mallorca.com', '', '', ''),
(2, 'mauro', 'barbarroja', 'iriarte', 'esintesys', 'b43927284', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'mauro@esintesys.com', '', '', '');

--
-- Volcado de datos para la tabla `empresas_contratos`
--

INSERT INTO `empresas_contratos` (`id_empresa`, `id_contrato`, `id_empresa_contrato`, `fecha_inicio`, `fecha_fin`, `tiempo_creacion`, `ultima_modificacion`) VALUES
(1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-08-23 04:26:11', '2013-08-23 04:26:11'),
(2, 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-08-23 09:05:32', '2013-08-23 09:05:32');

--
-- Volcado de datos para la tabla `empresas_cuentas`
--

INSERT INTO `empresas_cuentas` (`id_empresa`, `id_cuenta`, `id_empresa_cuenta`) VALUES
(1, 1, 1),
(2, 2, 2);

--
-- Volcado de datos para la tabla `idiomas`
--

INSERT INTO `idiomas` (`id_idioma`, `nombre`) VALUES
(1, 'Español');

--
-- Volcado de datos para la tabla `instalaciones`
--

INSERT INTO `instalaciones` (`id_instalacion`, `nombre`, `id_instalacion_categoria`) VALUES
(105, 'Aire acondicionado', 1),
(106, 'Suelo de moqueta', 1),
(107, 'Chimenea', 1),
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
(134, 'Sofá', 1),
(135, 'Suelo de baldosa', 1),
(136, 'Escritorio', 1),
(137, 'Armario', 1),
(138, 'Ventilador', 1),
(140, 'Mosquitera', 1),
(141, 'Sofá cama', 1),
(143, 'Bañera', 2),
(145, 'Bañera de hidromasaje', 2),
(146, 'Ducha', 2),
(147, 'Bidé', 2),
(151, 'Bañera o ducha', 2),
(154, 'Aseo', 2),
(156, 'Secador de pelo', 2),
(157, 'Sauna', 2),
(160, 'TV por cable', 3),
(174, 'Teléfono', 3),
(177, 'Fax', 3),
(179, 'TV', 3),
(183, 'Soporte para iPod', 3),
(189, 'Caja fuerte', 3),
(190, 'TV vía satélite', 3),
(192, 'Videoconsola', 3),
(194, 'Equipo de música ', 3),
(195, 'TV de pantalla plana/de plasma/LCD', 3),
(200, 'TV de pago', 3),
(202, 'Zona de comedor', 4),
(203, 'Parrilla ', 4),
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
(217, 'Wi-Fi', 5),
(218, 'Balcón', 6),
(219, 'Vistas al lago', 6),
(220, 'Patio', 6),
(221, 'Vistas al jardín', 6),
(222, 'Vistas a la piscina', 6),
(223, 'Vistas al mar', 6),
(224, 'Vistas a la montaña', 6),
(225, 'Vistas a un lugar de interés', 6),
(226, 'Primer línea de playa', 6),
(228, 'Cuna para bebé', 5),
(229, 'Conexión usb pincho', 5),
(230, 'Silla para bebé', 5),
(231, 'Cama suplatoria', 5),
(233, 'Pack de bienvenida', 5),
(234, 'Toalla ', 5),
(235, 'Ropa de cama ', 5);

--
-- Volcado de datos para la tabla `instalaciones_categoria`
--

INSERT INTO `instalaciones_categoria` (`id_instalacion_categoria`, `nombre`) VALUES
(1, 'Complementos de la habitación'),
(2, 'Cuarto de baño'),
(3, 'Medios de comunicación'),
(4, 'Cocina'),
(5, 'Servicios adicionales'),
(6, 'Exterior / Vistas');

--
-- Volcado de datos para la tabla `lugares_cercanos`
--

INSERT INTO `lugares_cercanos` (`id_lugar_cercano`, `nombre`, `medida`, `tipo`) VALUES
(1, 'Playa', 'KM', 'global'),
(2, 'Centro', 'KM', 'global'),
(3, 'Aeropuerto', 'KM', 'global'),
(4, 'Transportes públicos', 'KM', 'global');

--
-- Volcado de datos para la tabla `monedas`
--

INSERT INTO `monedas` (`id_moneda`, `nombre`, `simbolo`, `codigo`, `tasa_cambio`) VALUES
(1, 'Euro', '€', 'EUR', 1),
(2, 'Dolar', '$', 'USD', 0.772439364);

--
-- Volcado de datos para la tabla `opiniones`
--

INSERT INTO `opiniones` (`id_opinion`, `opinion`, `puntuacion`, `fecha_creacion`, `ultima_actualizacion`, `id_apartamento`, `id_usuario`, `id_reservacion`) VALUES
(1, 'Excelente propiedad.', 10, '2013-08-23 05:40:40', '2013-08-23 05:40:40', 2, 1, NULL);

--
-- Volcado de datos para la tabla `pagos_tipos`
--

INSERT INTO `pagos_tipos` (`id_pago_tipo`, `nombre`) VALUES
(1, 'Master Card'),
(2, 'American Express'),
(3, 'Dinner'),
(4, 'Visa'),
(5, 'Paypal');

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`id_pais`, `codigo`, `nombre_completo`, `iso3`, `nombre`, `numero`) VALUES
(1, 724, 'España', 'ESP', 'ES', 724),
(2, 36, 'Australia', 'AUS', 'AU', 36),
(3, 484, 'México', 'MEX', 'MX', 484),
(4, 276, 'Alemania', 'DEU', 'DE', 276),
(5, 643, 'Russia', 'RUS', 'RU', 643);

--
-- Volcado de datos para la tabla `politicas_cancelacion`
--

INSERT INTO `politicas_cancelacion` (`id_politica_cancelacion`, `nombre`, `reembolso_dia`, `comision`, `reembolso_porcentaje`) VALUES
(1, 'Flexible: reembolso total 1 día antes de la l', 1, 0, 10),
(2, 'Moderada: reembolso del importe total 5 días ', 5, 0, 10);

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`id_provincia`, `nombre`, `codigo`, `id_pais`) VALUES
(1, 'Tarragona', 'tr', 1);

--
-- Volcado de datos para la tabla `reservaciones`
--

INSERT INTO `reservaciones` (`id_reservacion`, `tiempo_creacion`, `ultima_modificacion`, `id_apartamento`, `fecha_entrada`, `fecha_salida`, `adultos`, `estatus`, `ninios`, `bebes`, `apartamento`, `contrato`, `autorizacion`, `request`, `total`, `observaciones`, `motivo_cancelacion`, `notificacion`, `id_usuario`) VALUES
(3, '2013-08-23 00:00:00', '0000-00-00 00:00:00', 3, '2013-08-20 00:00:00', '2013-08-25 00:00:00', 4, '', 0, 0, '', '', '', '', 0, '', '', '', 5);

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `email`, `password`, `tiempo_creacion`, `ultima_modificacion`, `id_usuario_grupo`, `estatus`, `telefono`, `apellido_materno`, `apellido_paterno`, `facebook_id`, `facebook_username`) VALUES
(1, 'Admin', 'admin@mallorca.com', 'admin', '2013-05-30 04:27:11', '2013-08-23 05:41:31', 1, '', '', 'admin', 'admin', '', ''),
(5, 'mauro', 'mauro@esintesys.com', '', '2013-08-23 00:00:00', '0000-00-00 00:00:00', 2, '', '678799986', 'iriarte', 'barbarroja', '', '');

--
-- Volcado de datos para la tabla `usuarios_grupos`
--

INSERT INTO `usuarios_grupos` (`id_usuario_grupo`, `nombre`) VALUES
(1, 'admin'),
(2, 'user');

--
-- Volcado de datos para la tabla `usuarios_registros`
--

INSERT INTO `usuarios_registros` (`id_usuario_registro`, `id_usuario`, `tiempo_creacion`, `tipo`, `movimiento`) VALUES
(1, 1, '2013-08-23 04:24:27', 'politicas_cancelacion where id=1', 'insert'),
(2, 1, '2013-08-23 04:24:45', 'politicas_cancelacion where id=2', 'insert'),
(3, 1, '2013-08-23 04:26:11', 'empresas where id=1', 'insert'),
(4, 1, '2013-08-23 04:26:11', 'empresas_cuentas where id=1', 'insert'),
(5, 1, '2013-08-23 04:26:11', 'empresas_contratos where id=1', 'insert'),
(6, 1, '2013-08-23 05:36:10', 'apartamentos where id=1', 'insert'),
(7, 1, '2013-08-23 05:36:11', 'apartamentos_instalaciones where id=1', 'insert'),
(8, 1, '2013-08-23 05:36:11', 'apartamentos_alojamientos where id=1', 'insert'),
(9, 1, '2013-08-23 05:37:01', 'apartamentos where id=1', 'delete'),
(10, 1, '2013-08-23 05:37:37', 'apartamentos where id=2', 'insert'),
(11, 1, '2013-08-23 05:37:37', 'apartamentos_instalaciones where id=2', 'insert'),
(12, 1, '2013-08-23 05:37:37', 'apartamentos_instalaciones where id=3', 'insert'),
(13, 1, '2013-08-23 05:37:37', 'apartamentos_alojamientos where id=2', 'insert'),
(14, 1, '2013-08-23 05:37:43', 'apartamentos where id=2', 'update'),
(15, 1, '2013-08-23 05:37:57', 'apartamentos_adjuntos where id_apartamento=2', 'update'),
(16, 1, '2013-08-23 05:38:17', 'apartamentos_documentos where id=1', 'delete'),
(17, 1, '2013-08-23 05:38:34', 'adjuntos where id=2', 'insert'),
(18, 1, '2013-08-23 05:38:34', 'apartamentos_adjuntos where id=1', 'insert'),
(19, 1, '2013-08-23 05:38:34', 'adjuntos where id=3', 'insert'),
(20, 1, '2013-08-23 05:38:34', 'apartamentos_adjuntos where id=2', 'insert'),
(21, 1, '2013-08-23 05:38:35', 'adjuntos where id=4', 'insert'),
(22, 1, '2013-08-23 05:38:35', 'apartamentos_adjuntos where id=3', 'insert'),
(23, 1, '2013-08-23 05:39:02', 'apartamentos where id=2', 'update'),
(24, 1, '2013-08-23 05:40:40', 'opiniones where id=1', 'insert'),
(25, 1, '2013-08-23 05:41:31', 'usuarios where id=1', 'update'),
(26, 1, '2013-08-23 05:41:31', 'reservaciones where id=1', 'insert'),
(27, 1, '2013-08-23 05:43:27', 'reservaciones where id=2', 'insert'),
(28, 1, '2013-08-23 08:58:00', 'apartamentos where id=3', 'insert'),
(29, 1, '2013-08-23 08:58:00', 'apartamentos_instalaciones where id=4', 'insert'),
(30, 1, '2013-08-23 08:58:00', 'apartamentos_instalaciones where id=5', 'insert'),
(31, 1, '2013-08-23 08:58:00', 'apartamentos_instalaciones where id=6', 'insert'),
(32, 1, '2013-08-23 08:58:00', 'apartamentos_instalaciones where id=7', 'insert'),
(33, 1, '2013-08-23 08:58:00', 'apartamentos_instalaciones where id=8', 'insert'),
(34, 1, '2013-08-23 08:58:00', 'apartamentos_instalaciones where id=9', 'insert'),
(35, 1, '2013-08-23 08:58:00', 'apartamentos_instalaciones where id=10', 'insert'),
(36, 1, '2013-08-23 08:58:00', 'apartamentos_instalaciones where id=11', 'insert'),
(37, 1, '2013-08-23 08:58:00', 'apartamentos_instalaciones where id=12', 'insert'),
(38, 1, '2013-08-23 08:58:00', 'apartamentos_instalaciones where id=13', 'insert'),
(39, 1, '2013-08-23 08:58:00', 'apartamentos_instalaciones where id=14', 'insert'),
(40, 1, '2013-08-23 08:58:00', 'apartamentos_instalaciones where id=15', 'insert'),
(41, 1, '2013-08-23 08:58:00', 'apartamentos_instalaciones where id=16', 'insert'),
(42, 1, '2013-08-23 08:58:00', 'apartamentos_instalaciones where id=17', 'insert'),
(43, 1, '2013-08-23 08:58:00', 'apartamentos_instalaciones where id=18', 'insert'),
(44, 1, '2013-08-23 08:58:00', 'apartamentos_instalaciones where id=19', 'insert'),
(45, 1, '2013-08-23 08:58:00', 'apartamentos_instalaciones where id=20', 'insert'),
(46, 1, '2013-08-23 08:58:00', 'apartamentos_instalaciones where id=21', 'insert'),
(47, 1, '2013-08-23 08:58:00', 'apartamentos_instalaciones where id=22', 'insert'),
(48, 1, '2013-08-23 08:58:00', 'apartamentos_instalaciones where id=23', 'insert'),
(49, 1, '2013-08-23 08:58:00', 'apartamentos_instalaciones where id=24', 'insert'),
(50, 1, '2013-08-23 08:58:01', 'apartamentos_instalaciones where id=25', 'insert'),
(51, 1, '2013-08-23 08:58:01', 'apartamentos_instalaciones where id=26', 'insert'),
(52, 1, '2013-08-23 08:58:01', 'apartamentos_alojamientos where id=3', 'insert'),
(53, 1, '2013-08-23 09:05:32', 'empresas where id=2', 'insert'),
(54, 1, '2013-08-23 09:05:32', 'empresas_cuentas where id=2', 'insert'),
(55, 1, '2013-08-23 09:05:32', 'empresas_contratos where id=2', 'insert'),
(56, 1, '2013-08-23 09:46:09', 'reservaciones where id=3', 'insert'),
(57, 1, '2013-08-26 10:36:18', 'adjuntos where id=5', 'insert'),
(58, 1, '2013-08-26 10:36:18', 'apartamentos_adjuntos where id=4', 'insert'),
(59, 1, '2013-08-26 10:36:21', 'adjuntos where id=6', 'insert'),
(60, 1, '2013-08-26 10:36:22', 'apartamentos_adjuntos where id=5', 'insert'),
(61, 1, '2013-08-26 10:36:36', 'adjuntos where id=7', 'insert'),
(62, 1, '2013-08-26 10:36:36', 'apartamentos_adjuntos where id=6', 'insert'),
(63, 1, '2013-08-26 10:45:16', 'apartamentos where id=3', 'update');
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
